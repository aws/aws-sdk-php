<?php
namespace Aws\Api\Parser;

use Aws\Api\StructureShape;
use GuzzleHttp\Message\ResponseInterface;

/**
 * @internal Implements REST-XML parsing (e.g., S3, CloudFront, etc...)
 */
class RestXmlParser extends AbstractRestParser
{
    protected function payload(
        ResponseInterface $response,
        StructureShape $member,
        array &$result
    ) {

    }
}
