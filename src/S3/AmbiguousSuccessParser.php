<?php
namespace Aws\S3;

use Aws\Api\Parser\AbstractParser;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Exception;
use Psr\Http\Message\ResponseInterface;
use SimpleXMLElement;

class AmbiguousSuccessParser extends AbstractParser
{
    private static $ambiguousSuccesses = [
        'UploadPartCopy' => true,
        'CopyObject' => true,
        'CompleteMultipartUpload' => true,
    ];

    /** @var callable */
    private $parser;
    /** @var string */
    private $exceptionClass;

    public function __construct(callable $parser, $exceptionClass = AwsException::class)
    {
        $this->parser = $parser;
        $this->exceptionClass = $exceptionClass;
    }

    public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    ) {
        if (200 === $response->getStatusCode()
            && isset(self::$ambiguousSuccesses[$command->getName()])
        ) {
            $xml = new SimpleXMLElement($response->getBody());
            if ('Error' === $xml->getName()) {
                throw $this->parseError(
                    $xml->xpath('/Error/Message')[0],
                    $command
                );
            }
        }

        try {
            $fn = $this->parser;
            return $fn($command, $response);
        } catch (Exception $e) {
            throw $this->parseError(
                "Error parsing response for {$command->getName()}:"
                    . " AWS parsing error: {$e->getMessage()}",
                $command,
                $e
            );
        }
    }

    private function parseError($message, CommandInterface $command, Exception $previous = null)
    {
        $context = [];
        $context['connection_error'] = true;
        if (isset($previous)) {
            $context['exception'] = $previous;
        }

        return new $this->exceptionClass(
            $message,
            $command,
            $context,
            $previous
        );
    }
}
