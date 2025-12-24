<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Parser\PayloadParserTrait;
use Aws\Api\Parser\XmlParser;
use Aws\Api\Service;
use Aws\Api\StructureShape;
use Aws\CommandInterface;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\ResponseInterface;

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

        $data = [
            'type' => $code[0] == '4' ? 'client' : 'server',
            'request_id' => null,
            'code' => null,
            'message' => null,
            'parsed' => null
        ];

        // Read the full payload, even in non-seekable streams
        $body = $response->getBody()->getContents();
        // Parse just if is not empty
        if (!empty($body)) {
            $this->parseBody($this->parseXml($body, $response), $data);
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
        ResponseInterface|\SimpleXMLElement|array $responseOrParsedBody,
        StructureShape $member
    ) {
        $xmlBody = $responseOrParsedBody;
        if ($responseOrParsedBody instanceof ResponseInterface) {
            $xmlBody = $this->parseXml(
                $responseOrParsedBody->getBody(),
                $responseOrParsedBody
            );
        }


        $prefix = $this->registerNamespacePrefix($xmlBody);
        $errorBody = $xmlBody->xpath("//{$prefix}Error");

        if (is_array($errorBody) && !empty($errorBody[0])) {
            return $this->parser->parse($member, $errorBody[0]);
        }

        throw new ParserException(
            "Error element not found in parsed body"
        );
    }
}
