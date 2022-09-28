<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\Parser\PayloadParserTrait;
use Aws\Api\StructureShape;
use Psr\Http\Message\ResponseInterface;

/**
 * Provides basic JSON error parsing functionality.
 */
trait JsonParserTrait
{
    use PayloadParserTrait;

    private function genericHandler(ResponseInterface $response)
    {
        $code = (string) $response->getStatusCode();
        if ($queryError = $response->getHeaderLine('x-amzn-query-error')) {
            $parts = explode(';', $queryError);
            $error = (isset($parts) and !empty(trim($parts[0]))) ? $parts[0] : null;
        }

        return [
            'request_id'  => (string) $response->getHeaderLine('x-amzn-requestid'),
            'code'        => isset($error) ? $error : null,
            'message'     => null,
            'type'        => $code[0] == '4' ? 'client' : 'server',
            'parsed'      => $this->parseJson($response->getBody(), $response)
        ];
    }

    protected function payload(
        ResponseInterface $response,
        StructureShape $member
    ) {
        $jsonBody = $this->parseJson($response->getBody(), $response);

        if ($jsonBody) {
            return $this->parser->parse($member, $jsonBody);
        }
    }
}
