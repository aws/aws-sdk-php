<?php
namespace Aws\Common\Api\Parser;

use Aws\Common\Api\Service;
use Aws\Common\Api\StructureShape;
use GuzzleHttp\Message\ResponseInterface;

/**
 * @internal Implements REST-JSON parsing (e.g., Glacier, Elastic Transcoder)
 */
class RestJsonParser extends AbstractRestParser
{
    /** @var JsonParser */
    private $parser;

    /**
     * @param Service    $api    Service description
     * @param JsonParser $parser JSON body builder
     */
    public function __construct(Service $api, JsonParser $parser = null)
    {
        parent::__construct($api);
        $this->parser = $parser ?: new JsonParser();
    }

    protected function payload(
        ResponseInterface $response,
        StructureShape $member,
        array &$result
    ) {
        if ($jsonBody = $response->json()) {
            $result += $this->parser->parse($member, $jsonBody);
        }
    }
}
