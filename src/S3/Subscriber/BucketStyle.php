<?php

namespace Aws\S3\Subscriber;

use Aws\S3\S3Client;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Used to change the style in which buckets are inserted in to the URL
 * (path or virtual style) based on the context.
 *
 * @internal
 */
class BucketStyle implements SubscriberInterface
{
    public function getEvents()
    {
        return [
            'prepare' => ['setBucketStyle', 'last']
        ];
    }

    /**
     * Changes how buckets are referenced in the HTTP request
     *
     * @param PrepareEvent $event Event emitted
     */
    public function setBucketStyle(PrepareEvent $event)
    {
        $command = $event->getCommand();
        $request = $event->getRequest();
        $bucket = $command['Bucket'];
        $key = $command['Key'];

        // Modify the command Key to account for the {/Key*} explosion into an array
        if ($key && is_array($key)) {
            $command['Key'] = $key = implode('/', $key);
        }

        // Switch to virtual if PathStyle is disabled, or not a DNS compatible bucket name,
        // or the scheme is https and there are no dots in the host header (avoids SSL issues)
        if (!$command['PathStyle'] && S3Client::isBucketDnsCompatible($bucket)
            && !($request->getScheme() == 'https' && strpos($bucket, '.'))
        ) {
            $request->setHost($bucket . '.' . $request->getHost());
            $request->setPath(substr($request->getPath(), strlen($bucket) + 2));
        }
    }
}
