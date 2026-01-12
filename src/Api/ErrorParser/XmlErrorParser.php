<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\Parser\PayloadParserTrait;
use Aws\Api\Parser\XmlParser;
use Aws\Api\Service;
use Aws\Api\StructureShape;
use Aws\Api\ResponseWrapper;
use Aws\CommandInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Parses XML errors.
 */
class XmlErrorParser extends AbstractErrorParser
{
    use PayloadParserTrait;

    protected $parser;

    public function __construct(?Service $api = null, ?XmlParser $parser = null)
    {
        parent::__construct($api);
        $this->parser = $parser ?: new XmlParser();
    }

    public function __invoke(
        ResponseInterface $response,
        ?CommandInterface $command = null
    ) {
        $code = (string) $response->getStatusCode();
        // To facilitate reading the body again
        // on non-seekable streams.
        $unwrappedResponse = [
            'response' => $response,
            'raw_body' => $response->getBody()->getContents()
        ];
        $data = [
            'type' => $code[0] == '4' ? 'client' : 'server',
            'request_id' => null,
            'code' => null,
            'message' => null,
            'parsed' => null,
            'unwrapped_response' => $unwrappedResponse
        ];

        // Get the full body content
        $rawBodyContent = $unwrappedResponse['raw_body'];

        // Parse just if is not empty
        if (!empty($rawBodyContent)) {
            $this->parseBody($this->parseXml($rawBodyContent, $response), $data);
        } else {
            $this->parseHeaders($response, $data);
        }

        $this->populateShape($data, $response, $command);

        return $data;
    }

    private function parseHeaders(ResponseInterface $response, array &$data)
    {
        if ($response->getStatusCode() == '404') {
            $data['code'] = 'NotFound';
        }

        $data['message'] = $response->getStatusCode() . ' '
            . $response->getReasonPhrase();

        if ($requestId = $response->getHeaderLine('x-amz-request-id')) {
            $data['request_id'] = $requestId;
            $data['message'] .= " (Request-ID: $requestId)";
        }
    }

    private function parseBody(\SimpleXMLElement $body, array &$data)
    {
        $data['parsed'] = $body;
        $prefix = $this->registerNamespacePrefix($body);

        if ($tempXml = $body->xpath("//{$prefix}Code[1]")) {
            $data['code'] = (string) $tempXml[0];
        }

        if ($tempXml = $body->xpath("//{$prefix}Message[1]")) {
            $data['message'] = (string) $tempXml[0];
        }

        $tempXml = $body->xpath("//{$prefix}RequestId[1]");
        if (isset($tempXml[0])) {
            $data['request_id'] = (string)$tempXml[0];
        }
    }

    protected function registerNamespacePrefix(\SimpleXMLElement $element)
    {
        $namespaces = $element->getDocNamespaces();
        if (!isset($namespaces[''])) {
            return '';
        } 
        
        // Account for the default namespace being defined and PHP not
        // being able to handle it :(.
        $element->registerXPathNamespace('ns', $namespaces['']);
        return 'ns:';
    }

    protected function payload(
        ResponseInterface|array $response,
        StructureShape                    $member
    ) {

        if ($response instanceof ResponseInterface) {
            $rawBodyContent = $response->getBody()->getContents();
        } else {
            $rawBodyContent = $response['raw_body'];
            $response = $response['response'];
        }

        // Avoid parsing empty bodies
        if (empty($rawBodyContent)) {
            return [];
        }

        $xmlBody = $this->parseXml(
            $rawBodyContent,
            $response
        );

        $prefix = $this->registerNamespacePrefix($xmlBody);
        $errorBody = $xmlBody->xpath("//{$prefix}Error");

        if (is_array($errorBody) && !empty($errorBody[0])) {
            return $this->parser->parse($member, $errorBody[0]);
        }

        // Fallback since we should either throw an exception or return a value
        // when the condition above is not met.
        return [];
    }
}
