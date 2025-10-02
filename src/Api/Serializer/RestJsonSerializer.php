<?php
namespace Aws\Api\Serializer;

use Aws\Api\Service;
use Aws\Api\StructureShape;

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
        ?JsonBody $jsonFormatter = null
    ) {
        parent::__construct($api, $endpoint);
        $this->contentType = JsonBody::getContentType($api);
        $this->jsonFormatter = $jsonFormatter ?: new JsonBody($api);
    }

    protected function payload(StructureShape $member, array|string $value, array &$opts)
    {
        $opts['headers']['Content-Type'] = $this->contentType;
        $body = $this->jsonFormatter->build($member, $value);
        $opts['headers']['Content-Length'] = strlen($body);
        $opts['body'] = $body;
    }
}
