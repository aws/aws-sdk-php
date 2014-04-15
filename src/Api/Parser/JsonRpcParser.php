<?php
namespace Aws\Api\Parser;

use Aws\Api\Service;
use Aws\Result;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @internal
 */
class JsonRpcParser extends AbstractParser
{
    use JsonTrait;

    public function createResult(Service $api, ProcessEvent $event)
    {
        $operation = $api->getOperation($event->getCommand()->getName());

        return new Result($this->parseJson(
            $operation->getOutput(),
            $event->getResponse()->json()
        ));
    }
}
