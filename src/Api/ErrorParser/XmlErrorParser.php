<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\Parser\PayloadParserTrait;
use Aws\Api\Parser\XmlParser;
use Aws\Api\Service;
use Aws\Api\StructureShape;
use Aws\CommandInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Parses XML errors.
 */
class XmlErrorParser extends AbstractErrorParser
{
    use PayloadParserTrait;

    protected $parser;

    public function __construct(Service $api = null, XmlParser $parser = null)
    {
        parent::__construct($api);
        $this->parser = $parser ?: new XmlParser();
    }

    public function __invoke(
        ResponseInterface $response,
        CommandInterface $command = null
    ) {
        $code = (string) $response->getStatusCode();

        $data = [
            'type' => $code[0] == '4' ? 'client' : 'server',
            'request_id' => null,
            'code' => null,
            'message' => null,
            'parsed' => null
        ];

        $body = $response->getBody();
        if ($body->getSize() > 0) {
            $this->parseBody($this->parseXml($body, $response), $data);
        } else {
            $this->parseHeaders($response, $data);
        }

        if (!empty($command) && !empty($this->api)) {

            // If modeled error code is indicated, check for known error shape
            if (!empty($data['code'])) {

                $errors = $this->api->getOperation($command->getName())->getErrors();
                foreach ($errors as $key => $error) {

                    // If error code matches a known error shape, populate the body
                    if ($data['code'] == $error['name']
                        && $error instanceof StructureShape
                    ) {
                        $modeledError = $error;
                        $data['body'] = $this->extractPayload(
                            $modeledError,
                            $response
                        );

                        foreach ($error->getMembers() as $name => $member) {
                            switch ($member['location']) {
                                case 'header':
                                    $this->extractHeader($name, $member, $response, $data['body']);
                                    break;
                                case 'headers':
                                    $this->extractHeaders($name, $member, $response, $data['body']);
                                    break;
                                case 'statusCode':
                                    $this->extractStatus($name, $response, $data['body']);
                                    break;
                            }
                        }

                        break;
                    }
                }
            }
        }

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
        if (empty($tempXml)) {
            $tempXml = $body->xpath("//{$prefix}RequestID[1]");
        }

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
        ResponseInterface $response,
        StructureShape $member
    ) {
        $xmlBody = $this->parseXml($response->getBody(), $response);
        $prefix = $this->registerNamespacePrefix($xmlBody);
        $errorBody = $xmlBody->xpath("//{$prefix}Error");

        if (is_array($errorBody) && !empty($errorBody[0])) {
            return $this->parser->parse($member, $errorBody[0]);
        }
    }
}
