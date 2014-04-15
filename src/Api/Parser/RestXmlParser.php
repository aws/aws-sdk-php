<?php
namespace Aws\Api\Parser;

use Aws\Result;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @internal
 */
class RestXmlParser extends RestParser
{
    public function createResult(ProcessEvent $event)
    {
        return new Result([]);
    }
}
