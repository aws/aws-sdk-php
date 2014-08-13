<?php
namespace Aws\Common\Api\Serializer;

use Aws\Common\Api\Service;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Serializes a query protocol request.
 * @internal
 */
class QuerySerializer implements SubscriberInterface
{
    private $endpoint;
    private $api;
    private $paramBuilder;

    public function __construct(
        Service $api,
        $endpoint,
        callable $paramBuilder = null
    ) {
        $this->api = $api;
        $this->endpoint = $endpoint;
        $this->paramBuilder = $paramBuilder ?: new QueryParamBuilder();
    }

    public function getEvents()
    {
        return ['prepare' => ['onPrepare']];
    }

    public function onPrepare(PrepareEvent $event)
    {
        /** @var \Aws\AwsCommandInterface $command */
        $command = $event->getCommand();
        $api = $command->getApi();
        $operation = $api->getOperation($command->getName());

        $body = [
            'Action'  => $command->getName(),
            'Version' => $api->getMetadata('apiVersion')
        ];

        $params = $command->toArray();
        // Only build up the parameters when there are parameters to build
        if ($params) {
            $body += call_user_func(
                $this->paramBuilder,
                $operation->getInput(),
                $params
            );
        }

        $request = $event->getClient()->getHttpClient()->createRequest(
            'POST',
            $this->endpoint,
            ['body' => $body, 'config' => ['command' => $command]]
        );

        $event->setRequest($request);
    }
}
