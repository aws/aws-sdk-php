<?php
namespace Aws\Api\ErrorParser;

use Psr\Http\Message\ResponseInterface;

/**
 * Provides basic JSON error parsing functionality.
 */
trait JsonParserTrait
{
    private function genericHandler(ResponseInterface $response)
    {
        $code = (string) $response->getStatusCode();

        return [
            'request_id'  => (string) $response->getHeaderLine('x-amzn-requestid'),
            'code'        => null,
            'message'     => null,
            'type'        => $code[0] == '4' ? 'client' : 'server',
            'parsed'      => json_decode($response->getBody(), true)
        ];
    }
}
