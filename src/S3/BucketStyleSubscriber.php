<?php

namespace Aws\S3;

use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Listener used to change the way in which buckets are referenced (path/virtual style) based on context
 */
class BucketStyleSubscriber implements SubscriberInterface
{
    public function getEvents()
    {
        return array('prepare' => array('onPrepare', 'last'));
    }

    /**
     * Changes how buckets are referenced in the HTTP request
     *
     * @param PrepareEvent $event Event emitted
     */
    public function onPrepare(PrepareEvent $event)
    {
        $command = $event->getCommand();
        $bucket = $command['Bucket'];
        $request = $event->getRequest();
        $pathStyle = false;

        if ($key = $command['Key']) {
            // Modify the command Key to account for the {/Key*} explosion into an array
            if (is_array($key)) {
                $command['Key'] = $key = implode('/', $key);
            }
        }

        // Set the key and bucket on the request
        $request->getConfig()->set('bucket', $bucket)->set('key', $key);

        // Switch to virtual if PathStyle is disabled, or not a DNS compatible bucket name, or the scheme is
        // http, or the scheme is https and there are no dots in the host header (avoids SSL issues)
        if (!$command['PathStyle'] && S3Client::isBucketDnsCompatible($bucket)
            && !($request->getScheme() == 'https' && strpos($bucket, '.'))
        ) {
            // Switch to virtual hosted bucket
            $request->setHost($bucket . '.' . $request->getHost());
            $request->setPath(preg_replace("#^/{$bucket}#", '', $request->getPath()));
        } else {
            $pathStyle = true;
        }

        if (!$bucket) {
            $request->getConfig()->set('s3.resource', '/');
        } elseif ($pathStyle) {
            // Path style does not need a trailing slash
            $request->getConfig()->set(
                's3.resource',
                '/' . rawurlencode($bucket) . ($key ? ('/' . S3Client::encodeKey($key)) : '')
            );
        } else {
            // Bucket style needs a trailing slash
            $request->getConfig()->set(
                's3.resource',
                '/' . rawurlencode($bucket) . ($key ? ('/' . S3Client::encodeKey($key)) : '/')
            );
        }
    }
}
