<?php
namespace Aws\Common\Api\Serializer;

use Aws\Common\Api\Service;
use Aws\Common\Api\StructureShape;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Message\RequestInterface;

/**
 * Serializes requests for the REST-JSON protocol.
 * @internal
 */
class RestJsonSerializer extends RestSerializer
{
    /** @var JsonBody */
    private $jsonFormatter;

    /** @var string */
    private $contentType;

    /**
     * @param Service  $api           Service API description
     * @param string   $endpoint      Endpoint to connect to
     * @param JsonBody $jsonFormatter Optional JSON formatter to use
     */
    public function __construct(
        Service $api,
        $endpoint,
        JsonBody $jsonFormatter = null
    ) {
        parent::__construct($api, $endpoint);
        $this->contentType = JsonBody::getContentType($api);
        $this->jsonFormatter = $jsonFormatter ?: new JsonBody($api);
    }

    protected function payload(
        RequestInterface $request,
        StructureShape $member,
        array $value
    ) {
        $request->setHeader('Content-Type', $this->contentType);
        $request->setBody(Stream::factory(
            $this->jsonFormatter->build($member, $value)
        ));
    }
}
