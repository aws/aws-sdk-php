<?php
namespace Aws\Api\Parser;

use Aws\Result;
use Aws\Description\Parser\RestParser;
use GuzzleHttp\Command\Event\ProcessEvent;

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
        $event->setResult(new Result([]));
    }
}
