<?php
namespace Aws\S3;

use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Injects ObjectURL into the result model of the PutObject operation.
 */
class PutObjectUrlListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['process' => ['addObjectUrl']];
    }

    public function addObjectUrl(ProcessEvent $e)
    {
        if ($e->getCommand()->getName() == 'PutObject') {
            $e->getResult()->offsetSet('ObjectURL', $e->getRequest()->getUrl());
        }
    }
}
