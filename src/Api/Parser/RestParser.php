<?php
namespace Aws\Description\Parser;

use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * @internal
 */
abstract class RestParser implements SubscriberInterface
{
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
    }
}
