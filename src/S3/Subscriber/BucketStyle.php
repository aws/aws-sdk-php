<?php
namespace Aws\S3\Subscriber;

use Aws\S3\S3Client;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Used to change the style in which buckets are inserted in to the URL
 * (path or virtual style) based on the context.
 *
 * @internal
 */
class BucketStyle implements SubscriberInterface
{
    private static $exclusions = ['GetBucketLocation' => true];

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

        if (isset(self::$exclusions[$command->getName()])) {
            return;
        }

        // Switch to virtual if PathStyle is disabled, or not a DNS compatible
        // bucket name, or the scheme is https and there are no dots in the host
        // header (avoids SSL issues).
        if (!$command['PathStyle'] && S3Client::isBucketDnsCompatible($bucket)
            && !($request->getScheme() == 'https' && strpos($bucket, '.'))
        ) {
            $request->setHost($bucket . '.' . $request->getHost());
            $path = substr($path, strlen($bucket) + 2);
        }

        // Modify the Key to make sure the key is encoded, but slashes are not.
        if ($command['Key']) {
            $path = S3Client::encodeKey(rawurldecode($path));
        }

        $request->setPath($path);
    }
}
