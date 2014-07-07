<?php
namespace Aws\S3\Subscriber;

use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Injects ObjectURL into the result model of the PutObject operation.
 */
class PutObjectUrl implements SubscriberInterface
{
    public function getEvents()
    {
        return ['process' => ['addObjectUrl']];
    }

    public function addObjectUrl(ProcessEvent $e)
    {
        $name = $e->getCommand()->getName();
        if ($name === 'PutObject') {
            $e->getResult()['ObjectURL'] = $e->getRequest()->getUrl();
        } elseif ($name === 'CompleteMultipartUpload') {
            $e->getResult()['ObjectURL'] =  $e->getResult()['Location'];
        }
    }
}
