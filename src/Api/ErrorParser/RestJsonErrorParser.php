<?php
namespace Aws\Api\ErrorParser;

use Aws\CommandInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Parses JSON-REST errors.
 */
class RestJsonErrorParser extends AbstractErrorParser
{
    use JsonParserTrait;

    public function __invoke(
        ResponseInterface $response,
        CommandInterface $command = null
    ) {
        $data = $this->genericHandler($response);

        if (!empty($command) && !empty($this->api)) {
            $errors = $this->api->getOperation($command->getName())->getErrors();
            $data['body'] = [];
        }

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

        return $data;
    }
}
