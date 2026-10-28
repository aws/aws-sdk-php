<?php
namespace Aws\Api\Serializer;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Service;
use Aws\Api\Serde\Http\HttpRequestBindingPlan as Plan;
use Aws\Api\Serde\Http\HttpRequestBindingPlanProvider;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Aws\Api\TimestampShape;
use Aws\CommandInterface;
use Aws\EndpointV2\EndpointV2SerializerTrait;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use DateTimeInterface;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriResolver;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Serializes HTTP locations like header, uri, payload, etc...
 * @internal
 */
abstract class RestSerializer
{
    use EndpointV2SerializerTrait;

    /** @var Service */
    private Service $api;

    /** @var Uri */
    private $endpoint;

    /** @var bool */
    private $isUseEndpointV2;

    /** @var HttpRequestBindingPlanProvider */
    private $bindingPlanProvider;

    /**
     * @param Service $api Service API description
     * @param string $endpoint Endpoint to connect to
     */
    public function __construct(Service $api, $endpoint)
    {
        $this->api = $api;
        $this->endpoint = Psr7\Utils::uriFor($endpoint);
        $this->bindingPlanProvider = new HttpRequestBindingPlanProvider($api);
    }

    /**
     * @param CommandInterface $command Command to serialize into a request.
     * @param mixed|null $endpoint
     * @return RequestInterface
     */
    public function __invoke(
        CommandInterface $command,
        mixed $endpoint = null
    ) {
        $operation = $this->api->getOperation($command->getName());
        $plan = $this->bindingPlanProvider->get($operation);
        $commandArgs = $command->toArray();
        $opts = $this->serialize($plan, $commandArgs);
        $headers = $opts['headers'] ?? [];

        if ($endpoint instanceof RulesetEndpoint) {
            $this->isUseEndpointV2 = true;
            $this->setEndpointV2RequestOptions($endpoint, $headers);
        }

        $uri = $this->buildEndpoint($plan, $commandArgs, $opts);

        return new Request(
            $plan->method,
            $uri,
            $headers,
            $opts['body'] ?? null
        );
    }

    /**
     * Modifies a hash of request options for a payload body.
     *
     * @param StructureShape $member Member to serialize
     * @param array $value Value to serialize
     * @param array $opts Request options to modify.
     */
    abstract protected function payload(
        StructureShape $member,
        array $value,
        array &$opts
    );

    private function serialize(Plan $plan, array $args)
    {
        $opts = [];
        $bindings = $plan->bindings;

        // Apply the payload trait if present
        if ($plan->payloadKind !== Plan::PAYLOAD_NONE) {
            $this->applyPayload($plan, $args, $opts);
        }

        foreach ($args as $name => $value) {
            if (!isset($bindings[$name])) {
                continue;
            }

            $binding = $bindings[$name];
            switch ($binding[Plan::D_TAG]) {
                case Plan::BODY:
                    $bodyMembers[$name] = $value;
                    break;

                case Plan::HEADER:
                    if ($value === null) {
                        break;
                    }
                    if ($binding[Plan::D_CONVERT] === Plan::CONVERT_TIMESTAMP) {
                        $value = $this->formatTimestamp($value, $binding[Plan::D_TSFORMAT]);
                    } elseif ($binding[Plan::D_CONVERT] === Plan::CONVERT_BOOLEAN) {
                        $value = $value ? 'true' : 'false';
                    }
                    if ($binding[Plan::D_JSONVALUE]) {
                        $value = self::encodeJsonValue($value);
                    }
                    $opts['headers'][$binding[Plan::D_NAME]] = is_string($value)
                        ? $value
                        : self::prepareHeaderValue($value);
                    break;

                case Plan::QUERY:
                    if ($value === null) {
                        break;
                    }
                    if ($binding[Plan::D_CONVERT] === Plan::CONVERT_TIMESTAMP) {
                        $value = $this->formatTimestamp($value, $binding[Plan::D_TSFORMAT]);
                    } elseif ($binding[Plan::D_CONVERT] === Plan::CONVERT_BOOLEAN) {
                        $value = $value ? 'true' : 'false';
                    }
                    $opts['query'][$binding[Plan::D_NAME]] = $value;
                    break;

                case Plan::HEADER_LIST:
                    $this->applyHeaderList($binding, $value, $opts);
                    break;

                case Plan::QUERY_LIST:
                    $this->applyQueryList($binding, $value, $opts);
                    break;

                case Plan::HEADER_MAP:
                    $this->applyHeaderMap($name, $binding[Plan::D_NAME], $value, $opts);
                    break;

                case Plan::QUERY_MAP:
                    $opts['query'] = isset($opts['query']) && is_array($opts['query'])
                        ? $opts['query'] + $value
                        : $value;
                    break;

                case Plan::HEADER_SHAPE:
                    $this->applyHeader($name, $binding[Plan::D_SHAPE], $value, $opts);
                    break;

                case Plan::QUERY_SHAPE:
                    $this->applyQuery($name, $binding[Plan::D_SHAPE], $value, $opts);
                    break;
            }
        }

        if (isset($bodyMembers)) {
            $this->payload($plan->input, $bodyMembers, $opts);
        } elseif (!isset($opts['body'])) {
            if ($plan->payloadKind === Plan::PAYLOAD_MISSING) {
                // Throws, as legacy did when checking for an empty payload.
                $plan->input->getMember($plan->payloadName);
            } elseif ($plan->hasPayloadParam) {
                $this->payload($plan->input, [], $opts);
            }
        }

        return $opts;
    }

    private function applyPayload(Plan $plan, array $args, array &$opts)
    {
        $name = $plan->payloadName;
        if (!isset($args[$name])) {
            return;
        }

        if ($plan->payloadKind === Plan::PAYLOAD_MISSING) {
            // Throws "Unknown member", as legacy did.
            $plan->input->getMember($name);
        }

        if ($plan->payloadKind === Plan::PAYLOAD_STRUCTURE) {
            $this->payload($plan->payloadMember, $args[$name], $opts);
            return;
        }

        // This path skips setting the content-type header usually done in
        // RestJsonSerializer and RestXmlSerializer. Certain S3 and Glacier
        // operations determine content type in Middleware::ContentType().
        if ($plan->payloadContentType !== null) {
            $opts['headers']['Content-Type'] = $plan->payloadContentType;
        }

        $body = $args[$name];
        if (!$plan->payloadStreaming && is_string($body)) {
            $opts['headers']['Content-Length'] = (string) strlen($body);
        }

        // Streaming bodies or payloads that are strings are
        // always just a stream of data.
        $stream = Psr7\Utils::streamFor($body);
        // User-owned resource which should be detached instead of closed
        // during garbage-collection
        if (is_resource($body)) {
            $stream = \Aws\detach_on_close_stream($stream);
        }
        $opts['body'] = $stream;
    }

    /**
     * Serializes a header list whose items are scalars, timestamps or
     * booleans. Matches the legacy per-item recursion through applyHeader().
     */
    private function applyHeaderList(array $binding, $value, array &$opts)
    {
        if ($value === null) {
            return;
        }

        if (!is_array($value)) {
            throw new \InvalidArgumentException('Header values must be scalar or an array of scalars.');
        }

        $convert = $binding[Plan::D_ITEM_CONVERT];
        $tsFormat = $binding[Plan::D_ITEM_TSFORMAT];
        $itemJson = $binding[Plan::D_ITEM_JSONVALUE];
        $headerValues = [];
        foreach ($value as $item) {
            if ($item === null) {
                throw new \InvalidArgumentException('Header values must be scalar or an array of scalars.');
            }
            if ($convert === Plan::CONVERT_TIMESTAMP) {
                $item = $this->formatTimestamp($item, $tsFormat);
            } elseif ($convert === Plan::CONVERT_BOOLEAN) {
                $item = $item ? 'true' : 'false';
            }
            if ($itemJson) {
                $item = self::encodeJsonValue($item);
            }
            $headerValues[] = self::prepareHeaderValue($item);
        }

        $value = $headerValues;
        if ($binding[Plan::D_JSONVALUE]) {
            $value = self::encodeJsonValue($value);
        }

        $opts['headers'][$binding[Plan::D_NAME]] = self::prepareHeaderValue($value);
    }

    /**
     * Serializes a query list whose items are scalars, timestamps or
     * booleans. Matches the legacy per-item recursion through applyQuery().
     */
    private function applyQueryList(array $binding, $value, array &$opts)
    {
        $paramName = $binding[Plan::D_NAME];
        $convert = $binding[Plan::D_ITEM_CONVERT];
        $tsFormat = $binding[Plan::D_ITEM_TSFORMAT];
        foreach ($value as $item) {
            if ($item === null) {
                // Legacy recursion set nothing for a null item and then read
                // the missing "temp" key, appending null with a warning.
                $temp = [];
                $opts['query'][$paramName][] = $temp['temp'];
                continue;
            }
            if ($convert === Plan::CONVERT_TIMESTAMP) {
                $item = $this->formatTimestamp($item, $tsFormat);
            } elseif ($convert === Plan::CONVERT_BOOLEAN) {
                $item = $item ? 'true' : 'false';
            }
            $opts['query'][$paramName][] = $item;
        }
    }

    private static function encodeJsonValue($value): string
    {
        $value = json_encode($value);
        if (empty($value) && JSON_ERROR_NONE !== json_last_error()) {
            throw new \InvalidArgumentException('Unable to encode the provided value'
                . ' with \'json_encode\'. ' . json_last_error_msg());
        }

        return base64_encode($value);
    }

    private function applyHeader($name, Shape $member, $value, array &$opts)
    {
        if ($value === null) {
            return;
        }

        // Handle lists by applying header logic to each element
        if ($member instanceof ListShape) {
            if (!is_array($value)) {
                throw new \InvalidArgumentException('Header values must be scalar or an array of scalars.');
            }

            $listMember = $member->getMember();
            $headerValues = [];

            foreach ($value as $listValue) {
                if ($listValue === null) {
                    throw new \InvalidArgumentException('Header values must be scalar or an array of scalars.');
                }

                $tempOpts = ['headers' => []];
                $this->applyHeader('temp', $listMember, $listValue, $tempOpts);
                if (!array_key_exists('temp', $tempOpts['headers'])) {
                    throw new \InvalidArgumentException('Header values must be scalar or an array of scalars.');
                }

                $convertedValue = $tempOpts['headers']['temp'];
                $headerValues[] = $convertedValue;
            }

            $value = $headerValues;
        } else {
            switch ($member->getType()) {
                case 'timestamp':
                    $timestampFormat = $member['timestampFormat'] ?? 'rfc822';
                    $value = $this->formatTimestamp($value, $timestampFormat);
                    break;
                case 'boolean':
                    $value = $this->formatBoolean($value);
                    break;
            }
        }

        if ($member['jsonvalue']) {
            $value = self::encodeJsonValue($value);
        }

        $opts['headers'][$member['locationName'] ?: $name] = self::prepareHeaderValue($value);
    }

    /**
     * Note: This is currently only present in the Amazon S3 model.
     */
    private function applyHeaderMap($name, $prefix, array $value, array &$opts)
    {
        // $name is unused. It keeps $value as argument #3, so the TypeError
        // for a non-array value reads the same as before.
        foreach ($value as $k => $v) {
            if ($v === null) {
                continue;
            }

            $opts['headers'][$prefix . $k] = self::prepareHeaderValue($v);
        }
    }

    /**
     * @return string|string[]
     */
    private static function prepareHeaderValue($value)
    {
        if (is_scalar($value)) {
            return (string) $value;
        }

        if (is_array($value)) {
            if ($value === []) {
                return '';
            }

            foreach ($value as $key => $item) {
                if (!is_scalar($item)) {
                    throw new \InvalidArgumentException('Header values must be scalar or an array of scalars.');
                }

                $value[$key] = (string) $item;
            }

            return $value;
        }

        throw new \InvalidArgumentException('Header values must be scalar or an array of scalars.');
    }

    private function applyQuery($name, Shape $member, $value, array &$opts)
    {
        if ($member instanceof MapShape) {
            $opts['query'] = isset($opts['query']) && is_array($opts['query'])
                ? $opts['query'] + $value
                : $value;
        } elseif ($member instanceof ListShape) {
            $listMember = $member->getMember();
            $paramName = $member['locationName'] ?: $name;

            foreach ($value as $listValue) {
                // Recursively call applyQuery for each list element
                $tempOpts = ['query' => []];
                $this->applyQuery('temp', $listMember, $listValue, $tempOpts);
                $opts['query'][$paramName][] = $tempOpts['query']['temp'];
            }
        } elseif (!is_null($value)) {
            switch ($member->getType()) {
                case 'timestamp':
                    $timestampFormat = $member['timestampFormat'] ?? 'iso8601';
                    $value = $this->formatTimestamp($value, $timestampFormat);
                    break;
                case 'boolean':
                    $value = $this->formatBoolean($value);
                    break;
            }

            $opts['query'][$member['locationName'] ?: $name] = $value;
        }
    }

    private function buildEndpoint(
        Plan $plan,
        array $args,
        array $opts
    ): UriInterface
    {
        // Expand `requestUri` field members
        $relativeUri = $plan->uriLiteral ?? $this->expandUriTemplate($plan, $args);

        // Add query members to relativeUri
        if (!empty($opts['query'])) {
            $relativeUri = $this->appendQuery($opts['query'], $relativeUri);
        }

        // Special case - S3 keys that need path preservation
        if ($plan->isS3
            && isset($args['Key'])
            && $this->shouldPreservePath($args['Key'])
        ) {
            return new Uri($this->endpoint . $relativeUri);
        }

        return $this->resolveUri($relativeUri, $opts);
    }

    /**
     * Expands `requestUri` members from the precompiled template parts.
     *
     * @param Plan $plan
     * @param array $args
     *
     * @return string
     */
    private function expandUriTemplate(Plan $plan, array $args): string
    {
        // Format every URI member first, in member order, so the same
        // member wins a shared label and the same invalid value throws.
        $varDefinitions = [];
        foreach ($plan->uriMembers as $member) {
            $value = $args[$member[Plan::U_NAME]] ?? null;
            if ($value !== null) {
                if ($member[Plan::U_CONVERT] === Plan::CONVERT_TIMESTAMP) {
                    $value = $this->formatTimestamp($value, $member[Plan::U_TSFORMAT]);
                } elseif ($member[Plan::U_CONVERT] === Plan::CONVERT_BOOLEAN) {
                    $value = $value ? 'true' : 'false';
                }
            }
            $varDefinitions[$member[Plan::U_LABEL]] = $value;
        }

        $uri = '';
        foreach ($plan->uriParts as $part) {
            if (is_string($part)) {
                $uri .= $part;
            } elseif (isset($varDefinitions[$part[Plan::P_LABEL]])) {
                $value = rawurlencode($varDefinitions[$part[Plan::P_LABEL]]);
                $uri .= $part[Plan::P_GREEDY] ? str_replace('%2F', '/', $value) : $value;
            }
        }

        return $uri;
    }

    /**
     * Checks for path-like key names. If detected, traditional
     * URI resolution is bypassed.
     *
     * @param string $key
     * @return bool
     */
    private function shouldPreservePath(string $key): bool
    {
        // Keys with dot segments
        if (str_contains($key, '.')) {
            $segments = explode('/', $key);
            foreach ($segments as $segment) {
                if ($segment === '.' || $segment === '..') {
                    return true;
                }
            }
        }

        // Keys starting with slash
        if (str_starts_with($key, '/')) {
            return true;
        }

        return false;
    }

    /**
     * @param string $relativeUri
     * @param array $opts
     *
     * @return UriInterface
     */
    private function resolveUri(string $relativeUri, array $opts): UriInterface
    {
        $basePath = $this->endpoint->getPath();

        // Only process if we have a non-empty base path
        if (!empty($basePath) && $basePath !== '/') {
            // if relative is just '/', we want just the base path without trailing slash
            if ($relativeUri === '/' || empty($relativeUri)) {
                // Remove trailing slash if present
                return $this->endpoint->withPath(rtrim($basePath, '/'));
            }

            // if relative is '/?query', we want base path without trailing slash + query
            // for now, this is only seen with S3 GetBucketLocation after processing the model
            if (empty($opts['query'])
                && str_starts_with($relativeUri, '/?')
            ) {
                $query = substr($relativeUri, 2); // Remove '/?'
                return $this->endpoint->withQuery($query);
            }

            // Ensure base path has trailing slash
            if (!str_ends_with($basePath, '/')) {
                $this->endpoint = $this->endpoint->withPath($basePath . '/');
            }

            // Remove leading slash from relative path to make it relative
            if (str_starts_with($relativeUri, '/')) {
                $relativeUri = substr($relativeUri, 1);
            }
        }

        return UriResolver::resolve($this->endpoint, new Uri($relativeUri));
    }

    /**
     * @param $query
     * @param $relativeUri
     *
     * @return string
     */
    private function appendQuery($query, $relativeUri): string
    {
        $append = Psr7\Query::build($query);
        return $relativeUri
            . (str_contains($relativeUri, '?') ? "&{$append}" : "?{$append}");
    }

    /**
     * @param DateTimeInterface|string|int|float $value
     * @param string $timestampFormat
     *
     * @return string
     */
    private function formatTimestamp(
        DateTimeInterface|string|int|float $value,
        string $timestampFormat
    ): string
    {
        return TimestampShape::formatAsString($value, $timestampFormat);
    }

    /**
     * @param $value
     *
     * @return string
     */
    private function formatBoolean($value): string
    {
        return $value ? 'true' : 'false';
    }
}
