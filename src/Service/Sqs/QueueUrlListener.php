<?php
namespace Aws\Service\Sqs;

use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Url;

/**
 * Listener used to change the endpoint to the queue URL
 */
class QueueUrlListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['prepare' => ['onPrepare', RequestEvents::LATE]];
    }

    public function onPrepare(PrepareEvent $event)
    {
        $command = $event->getCommand();

        if ($command->hasParam('QueueUrl')) {
            $request = $event->getRequest();
            $url = Url::fromString($request->getUrl());
            $request->setUrl($url->combine($command['QueueUrl']));
        }
    }
}
