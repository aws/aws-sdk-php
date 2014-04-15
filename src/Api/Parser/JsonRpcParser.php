<?php
namespace Aws\Api\Parser;

use Aws\Result;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * @internal
 */
class JsonRpcParser extends AbstractParser
{
    use JsonTrait;

    public function createResult(ProcessEvent $event)
    {
        $operation = $this->api->getOperation($event->getCommand()->getName());
        return new Result($this->parseJson(
            $operation->getOutput(),
            $event->getResponse()->json()
        ));
    }
}
