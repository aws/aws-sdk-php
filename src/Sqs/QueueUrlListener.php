<?php
namespace Aws\Sqs;

use GuzzleHttp\Command\Event\PreparedEvent;
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
        return ['prepared' => ['onPrepared', RequestEvents::LATE]];
    }

    public function onPrepare(PreparedEvent $event)
    {
        $command = $event->getCommand();

        if ($command->hasParam('QueueUrl')) {
            $request = $event->getRequest();
            $url = Url::fromString($request->getUrl());
            $request->setUrl($url->combine($command['QueueUrl']));
        }
    }
}
