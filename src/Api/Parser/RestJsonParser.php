<?php

namespace Aws\Api\Parser;

use Aws\Description\Parser\RestParser;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Command\Model;

/**
 * @internal
 */
class RestJsonParser extends RestParser
{
    use JsonTrait;

    public function getEvents()
    {
        return ['process' => ['onProcess']];
    }

    public function onProcess(ProcessEvent $event)
    {
        $command = $event->getCommand();
        $name = $command->getName();
        $operation = $this->api->getOperation($name);
        $event->setResult(new Model([]));
    }
}
