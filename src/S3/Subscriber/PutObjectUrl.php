<?php
namespace Aws\S3\Subscriber;

use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Injects ObjectURL into the result model of the PutObject operation.
 *
 * @internal
 */
class PutObjectUrl implements SubscriberInterface
{
    public function getEvents()
    {
        return ['process' => ['addObjectUrl', -10]];
    }

    public function addObjectUrl(ProcessEvent $e)
    {
        if ($e->getException()) {
            return;
        }

        $name = $e->getCommand()->getName();

        if ($name === 'PutObject' || $name === 'CopyObject') {
            $e->getResult()['ObjectURL'] = $e->getRequest()->getUrl();
        } elseif ($name === 'CompleteMultipartUpload') {
            $e->getResult()['ObjectURL'] = $e->getResult()['Location'];
        }
    }
}
