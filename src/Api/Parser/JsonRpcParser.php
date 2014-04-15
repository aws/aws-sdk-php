<?php
namespace Aws\Api\Parser;

use Aws\Result;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * @internal
 */
class JsonRpcParser implements SubscriberInterface
{
    use JsonTrait;

    public function getEvents()
    {
        return ['process' => ['onProcess']];
    }

    public function onProcess(ProcessEvent $event)
    {
        // Guard against intercepted or injected results that need no parsing.
        if (!$response = $event->getResponse()) {
            return;
        }

        $operation = $this->api->getOperation($event->getCommand()->getName());
        $event->setResult(
            new Result($this->parseJson(
                $operation->getOutput(),
                $response->json()
            ))
        );
    }
}
