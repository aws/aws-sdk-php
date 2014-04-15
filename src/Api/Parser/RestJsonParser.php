<?php
namespace Aws\Api\Parser;

use Aws\Result;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @internal
 */
class RestJsonParser extends RestParser
{
    use JsonTrait;

    public function createResult(ProcessEvent $event)
    {
        $command = $event->getCommand();
        $name = $command->getName();
        $operation = $this->api->getOperation($name);
        return new Result([]);
    }
}
