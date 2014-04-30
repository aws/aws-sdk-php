<?php
namespace Aws\Api\Serializer;

use Aws\Api\Service;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Prepares a JSON-RPC request for transfer.
 * @internal
 */
class JsonRpcSerializer implements SubscriberInterface
{
    /** @var JsonBody */
    private $jsonFormatter;

    /** @var string */
    private $endpoint;

    /** @var Service */
    private $api;

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
    }

    public function getEvents()
    {
        return ['prepare' => ['onPrepare']];
    }

    public function onPrepare(PrepareEvent $event)
    {
        /** @var \Aws\AwsCommandInterface $command */
        $command = $event->getCommand();
        $name = $command->getName();
        $operation = $this->api->getOperation($name);

        $event->setRequest($event->getClient()->getHttpClient()->createRequest(
            $operation['http']['method'],
            $this->endpoint,
            [
                'headers' => [
                    'X-Amz-Target' => $this->api->getMetadata('targetPrefix')
                        . '.' . $name,
                    'Content-Type' => 'application/x-amz-json-'
                        . number_format(
                            $this->api->getMetadata('jsonVersion'),
                            1
                        )
                ],
                'body' => $this->jsonFormatter->build(
                    $operation->getInput(),
                    $command->toArray()
                ),
                'config' => ['command' => $command]
            ]
        ));
    }
}
