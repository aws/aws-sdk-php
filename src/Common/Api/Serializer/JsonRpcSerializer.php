<?php
namespace Aws\Common\Api\Serializer;

use Aws\Common\Api\Service;
use GuzzleHttp\Command\CommandTransaction;

/**
 * Prepares a JSON-RPC request for transfer.
 * @internal
 */
class JsonRpcSerializer
{
    /** @var JsonBody */
    private $jsonFormatter;

    /** @var string */
    private $endpoint;

    /** @var Service */
    private $api;

    /** @var string */
    private $contentType;

    /**
     * @param Service  $api           Service description
     * @param string   $endpoint      Endpoint to connect to
     * @param JsonBody $jsonFormatter Optional JSON formatter to use
     */
    public function __construct(
        Service $api,
        $endpoint,
        JsonBody $jsonFormatter = null
    ) {
        $this->endpoint = $endpoint;
        $this->api = $api;
        $this->jsonFormatter = $jsonFormatter ?: new JsonBody($this->api);
        $this->contentType = JsonBody::getContentType($api);
    }

    public function __invoke(CommandTransaction $trans)
    {
        $command = $trans->command;
        $name = $command->getName();
        $operation = $this->api->getOperation($name);

        return $trans->client->createRequest(
            $operation['http']['method'],
            $this->endpoint,
            [
                'headers' => [
                    'X-Amz-Target' => $this->api->getMetadata('targetPrefix') . '.' . $name,
                    'Content-Type' => $this->contentType
                ],
                'body' => $this->jsonFormatter->build(
                    $operation->getInput(),
                    $command->toArray()
                ),
                'config' => [
                    'command' => $command
                ]
            ]
        );
    }
}
