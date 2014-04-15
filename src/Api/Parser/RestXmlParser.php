<?php
namespace Aws\Api\Parser;

use Aws\Result;
use Aws\Api\Service;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @internal
 */
class RestXmlParser extends RestParser
{
    public function createResult(Service $api, ProcessEvent $event)
    {
        return new Result([]);
    }
}
