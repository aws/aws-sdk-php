<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Parser\JsonParser;
use Aws\Api\Service;
use Aws\Api\StructureShape;
use Aws\CommandInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Parses JSON-REST errors.
 */
class RestJsonErrorParser extends AbstractErrorParser
{
    use JsonParserTrait;

    private $parser;

    public function __construct(Service $api = null, JsonParser $parser = null)
    {
        parent::__construct($api);
        $this->parser = $parser ?: new JsonParser();
    }

    public function __invoke(
        ResponseInterface $response,
        CommandInterface $command = null
    ) {
        $data = $this->genericHandler($response);

        // Merge in error data from the JSON body
        if ($json = $data['parsed']) {
            $data = array_replace($data, $json);
        }

        // Correct error type from services like Amazon Glacier
        if (!empty($data['type'])) {
            $data['type'] = strtolower($data['type']);
        }

        // Retrieve the error code from services like Amazon Elastic Transcoder
        if ($code = $response->getHeaderLine('x-amzn-errortype')) {
            $colon = strpos($code, ':');
            $data['code'] = $colon ? substr($code, 0, $colon) : $code;
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
        $jsonBody = $this->parseJson($response->getBody(), $response);

        if ($jsonBody) {
            return $this->parser->parse($member, $jsonBody);
        }
    }
}
