<?php
namespace Aws\S3\Subscriber;

use Aws\Common\Signature\SignatureV4;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream;

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

    /** @var bool Whether or not to calculate optionals checksums. */
    private $calculateChecksums;

    public function __construct($calculateChecksums = true)
    {
        $this->calculateChecksums = $calculateChecksums;
    }

    public function getEvents()
    {
        return ['prepare' => ['setMd5', 'last']];
    }

    public function setMd5(PrepareEvent $event)
    {
        /** @var \Aws\AwsClientInterface $client */
        $client = $event->getClient();
        $signature = $client->getSignature();
        $command = $event->getCommand();

        // If ContentMD5 is set, there is nothing to do.
        if ($command['ContentMD5']) {
            return;
        }

        // If and MD5 is required or enabled, add one.
        $required = in_array($command->getName(), self::$requireMd5);
        $optionalAndEnabled = $this->calculateChecksums
            && in_array($command->getName(), self::$canMd5)
            && !($signature instanceof SignatureV4);
        if ($required || $optionalAndEnabled) {
            $this->addMd5($event->getRequest());
        }
    }

    private function addMd5(RequestInterface $request)
    {
        $body = $request->getBody();
        if ($body && $body->getSize() > 0) {
            if (false !== ($md5 = Stream\hash($body, 'md5', true))) {
                $request->setHeader('Content-MD5', base64_encode($md5));
            }
        }
    }
}
