<?php
namespace Aws\S3;

use Aws\Api\Parser\AbstractParser;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Exception;
use Psr\Http\Message\ResponseInterface;

class AmbiguousSuccessParser extends AbstractParser
{
    private static $ambiguousSuccesses = [
        'UploadPartCopy' => true,
        'CopyObject' => true,
        'CompleteMultipartUpload' => true,
    ];

    /** @var callable */
    private $parser;
    /** @var callable */
    private $errorParser;
    /** @var string */
    private $exceptionClass;

    public function __construct(
        callable $parser,
        callable $errorParser,
        $exceptionClass = AwsException::class
    ) {
        $this->parser = $parser;
        $this->errorParser = $errorParser;
        $this->exceptionClass = $exceptionClass;
    }

    public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    ) {
        if (200 === $response->getStatusCode()
            && isset(self::$ambiguousSuccesses[$command->getName()])
        ) {
            $errorParser = $this->errorParser;
            $parsed = $errorParser($response);
            if (isset($parsed['code']) && isset($parsed['message'])) {
                throw $this->parseError($parsed['message'], $command);
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
