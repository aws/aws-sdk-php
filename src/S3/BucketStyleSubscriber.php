<?php
namespace Aws\S3;

use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Used to change the style in which buckets are inserted in to the URL
 * (path or virtual style) based on the context.
 *
 * @internal
 */
class BucketStyleSubscriber implements SubscriberInterface
{
    private static $exclusions = ['GetBucketLocation' => true];
    private $bucketEndpoint;

    /**
     * @param bool $bucketEndpoint Set to true to send requests to a bucket
     *                             specific endpoint and not inject a bucket
     *                             in the request host or path.
     */
    public function __construct($bucketEndpoint = false)
    {
        $this->bucketEndpoint = $bucketEndpoint;
    }

    public function getEvents()
    {
        return ['prepared' => ['setBucketStyle', 'last']];
    }

    /**
     * Changes how buckets are referenced in the HTTP request
     *
     * @param PreparedEvent $event Event emitted
     */
    public function setBucketStyle(PreparedEvent $event)
    {
        $command = $event->getCommand();
        $request = $event->getRequest();
        $bucket = $command['Bucket'];
        $path = $request->getPath();

        if (!$bucket || isset(self::$exclusions[$command->getName()])) {
            return;
        }

        if ($this->bucketEndpoint) {
            $path = $this->removeBucketFromPath($path, $bucket);
        } elseif (!$command['PathStyle']
            && S3Client::isBucketDnsCompatible($bucket)
            && !($request->getScheme() == 'https' && strpos($bucket, '.'))
        ) {
            // Switch to virtual if PathStyle is disabled, or not a DNS
            // compatible bucket name, or the scheme is https and there are no
            // dots in the hostheader (avoids SSL issues).
            $request->setHost($bucket . '.' . $request->getHost());
            $path = $this->removeBucketFromPath($path, $bucket);
        }

        // Modify the Key to make sure the key is encoded, but slashes are not.
        if ($command['Key']) {
            $path = S3Client::encodeKey(rawurldecode($path));
        }

        $request->setPath($path);
    }

    private function removeBucketFromPath($path, $bucket)
    {
        return substr($path, strlen($bucket) + 2);
    }
}
