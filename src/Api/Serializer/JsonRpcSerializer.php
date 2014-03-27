<?php

namespace Aws\Api\Serializer;

use Aws\Api\Model;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Url;

/**
 * Prepares a JSON-RPC request for transfer.
 * @internal
 */
class JsonRpcSerializer implements SubscriberInterface
{
    /** @var JsonBody */
    private $jsonFormatter;

    /** @var Url */
    private $endpoint;

    /** @var Model */
    private $api;

    /**
     * @param string   $endpoint      Endpoint to connect to
     * @param Model    $api           Service description
     * @param JsonBody $jsonFormatter Optional JSON formatter to use
     */
    public function __construct(
        $endpoint,
        Model $api,
        JsonBody $jsonFormatter = null
    ) {
        $this->endpoint = Url::fromString($endpoint);
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
        $api = $command->getApi();
        $operation = $api->getOperation($name);

        $event->setRequest($event->getClient()->getHttpClient()->createRequest(
            $operation['http']['method'],
            $this->endpoint->combine($operation['http']['requestUri']),
            [
                'headers' => [
                    'X-Amz-Target' => $api->getMetadata('targetPrefix')
                        . '.' . $name,
                    'Content-Type' => 'application/x-amz-json-'
                        . number_format($api->getMetadata('jsonVersion'), 1)
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
