<?php
namespace Aws\Common\Api\ErrorParser;

use GuzzleHttp\Message\ResponseInterface;

/**
 * Parses XML errors.
 */
class XmlErrorParser
{
    public function __invoke(ResponseInterface $response)
    {
        $code = (string) $response->getStatusCode();

        $data = [
            'type'        => $code[0] == '4' ? 'client' : 'server',
            'request_id'  => null,
            'code'        => null,
            'message'     => null,
            'parsed'      => null
        ];

        if ($body = $response->getBody()) {
            $this->parseBody(new \SimpleXMLElement($body), $data);
        } else {
            $this->parseHeaders($response, $data);
        }

        return $data;
    }

    private function parseHeaders(ResponseInterface $response, array &$data)
    {
        $data['message'] = $response->getStatusCode() . ' '
            . $response->getReasonPhrase();

        if ($requestId = $response->getHeader('x-amz-request-id')) {
            $data['request_id'] = $requestId;
            $data['message'] .= " (Request-ID: $requestId)";
        }
    }

    private function parseBody(\SimpleXMLElement $body, array &$data)
    {
        $data['parsed'] = $body;

        $namespaces = $body->getDocNamespaces();
        if (!isset($namespaces[''])) {
            $prefix = '';
        } else {
            // Account for the default namespace being defined and PHP not
            // being able to handle it :(.
            $body->registerXPathNamespace('ns', $namespaces['']);
            $prefix = 'ns:';
        }

        if ($tempXml = $body->xpath("//{$prefix}Code[1]")) {
            $data['code'] = (string) $tempXml[0];
        }

        if ($tempXml = $body->xpath("//{$prefix}Message[1]")) {
            $data['message'] = (string) $tempXml[0];
        }

        $tempXml = $body->xpath("//{$prefix}RequestId[1]");
        if (empty($tempXml)) {
            $tempXml = $body->xpath("//{$prefix}RequestID[1]");
        }

        if (isset($tempXml[0])) {
            $data['request_id'] = (string) $tempXml[0];
        }
    }
}
