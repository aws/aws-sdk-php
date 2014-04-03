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
        $operation = $this->api->getOperation($event->getCommand()->getName());
        $event->setResult(
            new Result($this->parseJson(
                $operation->getOutput(),
                $event->getResponse()->json()
            ))
        );
    }
}
