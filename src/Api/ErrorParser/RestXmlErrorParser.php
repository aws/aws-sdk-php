<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Parser\PayloadParserTrait;
use Aws\Api\StructureShape;
use Aws\CommandInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Parses XML errors.
 */
class RestXmlErrorParser extends XmlErrorParser
{
    public function __invoke(
        ResponseInterface $response,
        CommandInterface $command = null
    ) {
        $data = parent::__invoke($response, $command);

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

                // If indicated error code can't be found in model, throw exception
                if (!isset($modeledError)) {
                    throw new ParserException(
                        "Shape for error code '{$data['code']}' not defined.",
                        0,
                        null,
                        [
                            'error_code' => $data['code'],
                            'request_id' => $response->getHeaderLine('X-Amzn-Requestid'),
                            'response' => $response,
                        ]
                    );
                }
            }
        }

        return $data;

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
