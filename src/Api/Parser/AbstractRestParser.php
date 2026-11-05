<?php
namespace Aws\Api\Parser;

use Aws\Api\DateTimeResult;
use Aws\Api\Serde\Http\HttpResponseBindingPlan;
use Aws\Api\Serde\Http\HttpResponseBindingPlanProvider;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Aws\Result;
use Aws\CommandInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
abstract class AbstractRestParser extends AbstractParser
{
    use PayloadParserTrait;

    /** @var HttpResponseBindingPlanProvider */
    private $bindingPlanProvider;

    public function __construct(Service $api)
    {
        parent::__construct($api);
        $this->bindingPlanProvider = new HttpResponseBindingPlanProvider();
    }

    /**
     * Parses a payload from a response.
     *
     * @param ResponseInterface $response Response to parse.
     * @param StructureShape    $member   Member to parse
     * @param array             $result   Result value
     *
     * @return mixed
     */
    abstract protected function payload(
        ResponseInterface $response,
        StructureShape $member,
        array &$result
    );

    public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    ) {
        $operation = $this->api->getOperation($command->getName());
        $plan = $this->bindingPlanProvider->getCached($operation);
        $implicitBodyIsEmpty = null;

        if ($plan === null) {
            $output = $operation->getOutput();
            if (!$output['payload']) {
                // Preserve the legacy cold-path order: unknown-size implicit
                // bodies are consumed before top-level member resolution.
                $response = AbstractParser::getResponseWithCachingStream(
                    $response
                );
                $implicitBodyIsEmpty = self::isEmptyResponseBody($response);
            }

            $plan = $this->bindingPlanProvider->get($operation);
        }

        $result = [];

        switch ($plan->payloadKind) {
            case HttpResponseBindingPlan::PAYLOAD_EVENT_STREAM:
                $result[$plan->payloadName] = new EventParsingIterator(
                    $response->getBody(),
                    $plan->payloadMember,
                    $this
                );
                break;
            case HttpResponseBindingPlan::PAYLOAD_RAW:
                $result[$plan->payloadName] = $response->getBody();
                break;
            case HttpResponseBindingPlan::PAYLOAD_STRUCTURE:
                $response = AbstractParser::getResponseWithCachingStream(
                    $response
                );
                $isEmpty = self::isEmptyResponseBody($response);

                if (!$plan->payloadUnion || !$isEmpty) {
                    $result[$plan->payloadName] = [];
                    $this->payload(
                        $response,
                        $plan->payloadMember,
                        $result[$plan->payloadName]
                    );
                }
                break;
            case HttpResponseBindingPlan::PAYLOAD_IMPLICIT:
                if ($implicitBodyIsEmpty === null) {
                    $response = AbstractParser::getResponseWithCachingStream(
                        $response
                    );
                    $implicitBodyIsEmpty = self::isEmptyResponseBody($response);
                }

                if (!$implicitBodyIsEmpty && $plan->hasMembers) {
                    $this->payload($response, $plan->output, $result);
                }
                break;
        }

        foreach ($plan->bindings as $binding) {
            switch ($binding[HttpResponseBindingPlan::B_TAG]) {
                case HttpResponseBindingPlan::HEADER:
                    $this->extractPlannedHeader(
                        $binding,
                        $response,
                        $result
                    );
                    break;
                case HttpResponseBindingPlan::HEADER_SHAPE:
                    $this->extractHeader(
                        $binding[HttpResponseBindingPlan::B_NAME],
                        $binding[HttpResponseBindingPlan::H_SHAPE],
                        $response,
                        $result
                    );
                    break;
                case HttpResponseBindingPlan::PREFIX_HEADERS:
                    $this->extractPrefixHeaders(
                        $binding,
                        $response,
                        $result
                    );
                    break;
                case HttpResponseBindingPlan::PREFIX_HEADERS_SHAPE:
                    $this->extractHeaders(
                        $binding[HttpResponseBindingPlan::B_NAME],
                        $binding[HttpResponseBindingPlan::P_SHAPE],
                        $response,
                        $result
                    );
                    break;
                case HttpResponseBindingPlan::STATUS_CODE:
                    $result[$binding[HttpResponseBindingPlan::B_NAME]] =
                        (int) $response->getStatusCode();
                    break;
            }
        }

        return new Result($result);
    }

    private static function isEmptyResponseBody(
        ResponseInterface $response
    ): bool
    {
        if ($response->getBody()->getSize() === null) {
            $rawBody = AbstractParser::getBodyContents($response);

            return empty($rawBody);
        }

        return $response->getBody()->getSize() === 0;
    }

    /**
     * Extract a fast exact-header binding without consulting its model shape.
     */
    private function extractPlannedHeader(
        array $binding,
        ResponseInterface $response,
        array &$result
    ): void
    {
        $value = $response->getHeaderLine(
            $binding[HttpResponseBindingPlan::H_WIRE]
        );

        // Empty headers should not be deserialized.
        if ($value === '') {
            return;
        }

        switch ($binding[HttpResponseBindingPlan::H_CONVERT]) {
            case HttpResponseBindingPlan::CONVERT_FLOAT:
                $value = match ($value) {
                    'NaN', 'Infinity', '-Infinity' => $value,
                    default => (float) $value,
                };
                break;
            case HttpResponseBindingPlan::CONVERT_INT:
                $value = (int) $value;
                break;
            case HttpResponseBindingPlan::CONVERT_BOOLEAN:
                $value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                break;
            case HttpResponseBindingPlan::CONVERT_BLOB:
                $value = base64_decode($value);
                break;
            case HttpResponseBindingPlan::CONVERT_TIMESTAMP:
                try {
                    $value = DateTimeResult::fromTimestamp(
                        $value,
                        $binding[HttpResponseBindingPlan::H_TSFORMAT]
                    );
                } catch (\Exception $e) {
                    // Invalid timestamps are omitted from the result.
                    return;
                }
                break;
            case HttpResponseBindingPlan::CONVERT_JSONVALUE:
                try {
                    $value = $this->parseJson(
                        base64_decode($value),
                        $response
                    );

                    if (!isset($value)) {
                        return;
                    }
                } catch (\Exception $e) {
                    // Invalid JSON values are omitted from the result.
                    return;
                }
                break;
            case HttpResponseBindingPlan::CONVERT_BOOLEAN_LIST:
                $items = array_map('trim', explode(',', $value));
                $value = array_map(
                    static fn($item) => filter_var(
                        $item,
                        FILTER_VALIDATE_BOOLEAN
                    ),
                    $items
                );
                break;
        }

        $result[$binding[HttpResponseBindingPlan::B_NAME]] = $value;
    }

    /**
     * Extract a compiled prefix-header binding.
     */
    private function extractPrefixHeaders(
        array $binding,
        ResponseInterface $response,
        array &$result
    ): void
    {
        $name = $binding[HttpResponseBindingPlan::B_NAME];
        $prefix = $binding[HttpResponseBindingPlan::P_PREFIX];
        $prefixLen = $binding[HttpResponseBindingPlan::P_PREFIX_LEN];
        $result[$name] = [];

        foreach ($response->getHeaders() as $key => $values) {
            if (!$prefixLen) {
                $result[$name][$key] = implode(', ', $values);
            } elseif (stripos($key, $prefix) === 0) {
                $result[$name][substr($key, $prefixLen)] = implode(
                    ', ',
                    $values
                );
            }
        }
    }

    /**
     * Extract a single header from the response into the result.
     */
    private function extractHeader(
        $name,
        Shape $shape,
        ResponseInterface $response,
        &$result
    ) {
        $value = $response->getHeaderLine($shape['locationName'] ?: $name);
        // Empty headers should not be deserialized
        if ($value === null || $value === '') {
            return;
        }

        switch ($shape->getType()) {
            case 'float':
            case 'double':
                $value = match ($value) {
                    'NaN', 'Infinity', '-Infinity' => $value,
                    default => (float) $value
                };
                break;
            case 'long':
            case 'integer':
                $value = (int) $value;
                break;
            case 'boolean':
                $value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                break;
            case 'blob':
                $value = base64_decode($value);
                break;
            case 'timestamp':
                try {
                    $value = DateTimeResult::fromTimestamp(
                        $value,
                        !empty($shape['timestampFormat']) ? $shape['timestampFormat'] : null
                    );
                    break;
                } catch (\Exception $e) {
                    // If the value cannot be parsed, then do not add it to the
                    // output structure.
                    return;
                }
            case 'string':
                try {
                    if ($shape['jsonvalue']) {
                        $value = $this->parseJson(base64_decode($value), $response);
                    }

                    // If value is not set, do not add to output structure.
                    if (!isset($value)) {
                        return;
                    }
                    break;
                } catch (\Exception $e) {
                    //If the value cannot be parsed, then do not add it to the
                    //output structure.
                    return;
                }
            case 'list':
                $listMember = $shape->getMember();
                $type = $listMember->getType();

                // Only boolean lists require special handling
                // other types can be returned as-is
                if ($type !== 'boolean') {
                    break;
                }

                $items = array_map('trim', explode(',', $value));
                $value = array_map(
                    static fn($item) => filter_var($item, FILTER_VALIDATE_BOOLEAN),
                    $items
                );

                break;
        }

        $result[$name] = $value;
    }

    /**
     * Extract a map of headers with an optional prefix from the response.
     */
    private function extractHeaders(
        $name,
        Shape $shape,
        ResponseInterface $response,
        &$result
    ) {
        // Check if the headers are prefixed by a location name
        $result[$name] = [];
        $prefix = $shape['locationName'];
        $prefixLen = $prefix !== null ? strlen($prefix) : 0;

        foreach ($response->getHeaders() as $k => $values) {
            if (!$prefixLen) {
                $result[$name][$k] = implode(', ', $values);
            } elseif (stripos($k, $prefix) === 0) {
                $result[$name][substr($k, $prefixLen)] = implode(', ', $values);
            }
        }
    }

    /**
     * Places the status code of the response into the result array.
     */
    private function extractStatus(
        $name,
        ResponseInterface $response,
        array &$result
    ) {
        $result[$name] = (int) $response->getStatusCode();
    }
}
