<?php
namespace Aws\Api\Parser;

use Aws\Result;
use Aws\Api\Service;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @internal
 */
class RestJsonParser extends RestParser
{
    use JsonTrait;

    public function createResult(Service $api, ProcessEvent $event)
    {
        $command = $event->getCommand();
        $name = $command->getName();
        $operation = $api->getOperation($name);
        return new Result([]);
    }
}
