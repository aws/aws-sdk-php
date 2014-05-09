<?php
namespace Aws\Common\Api\ErrorParser;

use GuzzleHttp\Message\ResponseInterface;

/**
 * Provides basic JSON error parsing functionality.
 */
trait JsonParserTrait
{
    private function genericHandler(ResponseInterface $response)
    {
        $code = (string) $response->getStatusCode();

        return [
            'request_id'  => (string) $response->getHeader('x-amzn-requestid'),
            'code'        => null,
            'message'     => null,
            'type'        => $code[0] == '4' ? 'client' : 'server',
            'parsed'      => $response->json()
        ];
    }
}
