<?php
namespace Aws\S3\Subscriber;

use Aws\Common\Exception\CouldNotCreateChecksumException;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Stream\Utils;

/**
 * Adds required and optional Content-MD5 headers.
 *
 * @internal
 */
class ApplyMd5 implements SubscriberInterface
{
    private static $requireMd5 = [
        'DeleteObjects',
        'PutBucketCors',
        'PutBucketLifecycle',
    ];

    private static $canMd5 = ['PutObject', 'UploadPart'];

    public function getEvents()
    {
        return ['prepared' => ['setMd5', 'last']];
    }

    public function setMd5(PreparedEvent $event)
    {
        $client = $event->getClient();
        $command = $event->getCommand();
        $body = $event->getRequest()->getBody();

        // If ContentMD5 is set or there is no body, there is nothing to do.
        if ($command['ContentMD5'] || !$body) {
            return;
        }

        // If and MD5 is required or enabled, add one.
        $optional = $client->getConfig('calculate_md5')
            && in_array($command->getName(), self::$canMd5);
        if (in_array($command->getName(), self::$requireMd5) || $optional) {
            // Throw exception is calculating and MD5 would result in an error.
            if (!$body->isSeekable()) {
                throw new CouldNotCreateChecksumException('md5');
            }

            // Set the Content-MD5 header.
            $event->getRequest()->setHeader(
                'Content-MD5',
                base64_encode(Utils::hash($body, 'md5', true))
            );
        }
    }
}
