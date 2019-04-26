<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\DateTimeResult;
use Aws\Api\Parser\PayloadParserTrait;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractErrorParser
{
    use PayloadParserTrait;

    /**
     * @var Service
     */
    protected $api;

    /**
     * @param Service $api
     */
    public function __construct(Service $api = null)
    {
        $this->api = $api;
    }

    protected function extractPayload(
        StructureShape $member,
        ResponseInterface $response
    ) {
        if ($member instanceof StructureShape) {
            // Structure members parse top-level data into a specific key.
            return $this->payload($response, $member);
        } else {
            // Streaming data is just the stream from the response body.
            return $response->getBody();
        }
    }

    /**
     * Extract a single header from the response into the result.
     */
    protected function extractHeader(
        $name,
        Shape $shape,
        ResponseInterface $response,
        &$result
    ) {
        $value = $response->getHeaderLine($shape['locationName'] ?: $name);

        switch ($shape->getType()) {
            case 'float':
            case 'double':
                $value = (float) $value;
                break;
            case 'long':
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
                    if (!empty($shape['timestampFormat'])
                        && $shape['timestampFormat'] === 'unixTimestamp') {
                        $value = DateTimeResult::fromEpoch($value);
                    }
                    $value = new DateTimeResult($value);
                    break;
                } catch (\Exception $e) {
                    // If the value cannot be parsed, then do not add it to the
                    // output structure.
                    return;
                }
            case 'string':
                if ($shape['jsonvalue']) {
                    $value = $this->parseJson(base64_decode($value), $response);
                }
                break;
        }

        $result[$name] = $value;
    }

    /**
     * Extract a map of headers with an optional prefix from the response.
     */
    protected function extractHeaders(
        $name,
        Shape $shape,
        ResponseInterface $response,
        &$result
    ) {
        // Check if the headers are prefixed by a location name
        $result[$name] = [];
        $prefix = $shape['locationName'];
        $prefixLen = strlen($prefix);

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
    protected function extractStatus(
        $name,
        ResponseInterface $response,
        array &$result
    ) {
        $result[$name] = (int) $response->getStatusCode();
    }
}