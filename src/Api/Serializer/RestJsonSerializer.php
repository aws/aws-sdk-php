<?php
namespace Aws\Api\Serializer;

use Aws\Api\Service;
use Aws\Api\Operation;
use Aws\Api\StructureShape;

/**
 * Serializes requests for the REST-JSON protocol.
 * @internal
 */
class RestJsonSerializer extends RestSerializer
{
    /** @var JsonBody */
    private $jsonFormatter;

    /**
     * @param string   $endpoint      Endpoint to connect to
     * @param Service    $api           Service API description
     * @param JsonBody $jsonFormatter Optional JSON formatter to use
     */
    public function __construct(
        $endpoint,
        Service $api,
        JsonBody $jsonFormatter = null
    ) {
        parent::__construct($endpoint, $api);
        $this->jsonFormatter = $jsonFormatter ?: new JsonBody($api);
    }

    protected function payload(StructureShape $member, array $value)
    {
        return $this->jsonFormatter->build($member, $value);
    }

    protected function structBody(
        Operation $operation,
        array $bodyMembers
    ) {
        return $this->jsonFormatter->build(
            $operation->getInput(),
            $bodyMembers
        );
    }
}
