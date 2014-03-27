<?php

namespace Aws\Api\ErrorParser;

use Aws\Api\Error\JsonParserTrait;
use GuzzleHttp\Message\ResponseInterface;

/**
 * Parses JSON-REST errors.
 */
class JsonRestParser
{
    use JsonParserTrait;

    public function __invoke(
        $serviceName,
        $operationName,
        ResponseInterface $response
    ) {
        $data = $this->genericHandler($serviceName, $operationName, $response);

        // Merge in error data from the JSON body
        if ($data['parsed']) {
            $data = array_replace($data, $json);
        }

        // Correct error type from services like Amazon Glacier
        if (!empty($data['type'])) {
            $data['type'] = strtolower($data['type']);
        }

        // Retrieve the error code from services like Amazon Elastic Transcoder
        if ($code = $response->getHeader('x-amzn-ErrorType')) {
            $data['code'] = substr($code, 0, strpos($code, ':'));
        }

        return $data;
    }
}
