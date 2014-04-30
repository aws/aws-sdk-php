<?php
namespace Aws\Api\Parser;

use Aws\Api\Service;
use Aws\Api\StructureShape;
use GuzzleHttp\Message\ResponseInterface;

/**
 * @internal Implements REST-JSON parsing (e.g., Glacier)
 */
class RestJsonParser extends AbstractRestParser
{
    /** @var JsonBody */
    private $parser;

    /**
     * @param Service  $api    Service description
     * @param JsonBody $parser JSON body builder
     */
    public function __construct(Service $api, JsonBody $parser)
    {
        parent::__construct($api);
        $this->parser = $parser;
    }

    protected function payload(
        ResponseInterface $response,
        StructureShape $member,
        array &$result
    ) {
        $data = (string) $response->getBody();

        if (!$data) {
            return;
        }

        $result += $this->parser->parse($member, $response->json());
    }
}
