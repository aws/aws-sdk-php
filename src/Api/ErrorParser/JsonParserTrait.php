<?php

namespace Aws\Api\Error;

use GuzzleHttp\Message\ResponseInterface;

/**
 * Provides basic JSON error parsing functionality.
 */
trait JsonParserTrait
{
    private function genericHandler(
        $serviceName,
        $operationName,
        ResponseInterface $response
    ) {
        $code = (string) $response->getStatusCode();

        return [
            'operation'   => $operationName,
            'service'     => $serviceName,
            'status_code' => $code,
            'request_id'  => (string) $response->getHeader('x-amzn-RequestId'),
            'code'        => null,
            'message'     => null,
            'type'        => $code[0] == '4' ? 'client' : 'server',
            'parsed'      => $response->json()
        ];
    }
}
