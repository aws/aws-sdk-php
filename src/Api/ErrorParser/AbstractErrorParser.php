<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\DateTimeResult;
use Aws\Api\Parser\MetadataParserTrait;
use Aws\Api\Parser\PayloadParserTrait;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractErrorParser
{
    use MetadataParserTrait;
    use PayloadParserTrait;

    /**
     * @var Service
     */
    protected $api;

    /**
     * @param Service $api
     */
    public function __construct(Service $api = null)
    {
        $this->api = $api;
    }

    protected function extractPayload(
        StructureShape $member,
        ResponseInterface $response
    ) {
        if ($member instanceof StructureShape) {
            // Structure members parse top-level data into a specific key.
            return $this->payload($response, $member);
        } else {
            // Streaming data is just the stream from the response body.
            return $response->getBody();
        }
    }
}