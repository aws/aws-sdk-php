<?php
namespace Aws\S3;

use Aws\Api\Parser\AbstractParser;
use Aws\CommandInterface;
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

    public function __construct(callable $parser)
    {
        $this->parser = $parser;
    }

    public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    ) {
        $fn = $this->parser;

        if (200 === $response->getStatusCode()
            && isset(self::$ambiguousSuccesses[$command->getName()])
        ) {
            $xml = new \SimpleXMLElement($response->getBody());
            if ('Error' === $xml->getName()) {
                throw new \DomainException($xml->xpath('/Error/Message')[0]);
            }
        }

        return $fn($command, $response);
    }
}
