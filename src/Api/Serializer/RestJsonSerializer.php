<?php
namespace Aws\Api\Serializer;

use Aws\Api\Service;
use Aws\Api\StructureShape;
use GuzzleHttp\Stream;
use GuzzleHttp\Message\RequestInterface;

/**
 * Serializes requests for the REST-JSON protocol.
 * @internal
 */
class RestJsonSerializer extends RestSerializer
{
    /** @var JsonBody */
    private $jsonFormatter;

    /**
     * @param Service    $api         Service API description
     * @param string   $endpoint      Endpoint to connect to
     * @param JsonBody $jsonFormatter Optional JSON formatter to use
     */
    public function __construct(
        Service $api,
        $endpoint,
        JsonBody $jsonFormatter = null
    ) {
        parent::__construct($api, $endpoint);
        $this->jsonFormatter = $jsonFormatter ?: new JsonBody($api);
    }

    protected function payload(
        RequestInterface $request,
        StructureShape $member,
        array $value
    ) {
        $request->setHeader('Content-Type', 'application/json');
        $request->setBody(Stream\create(
            $this->jsonFormatter->build($member, $value)
        ));
    }
}
