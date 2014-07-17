<?php
namespace Aws\S3\Subscriber;

use Aws\Common\Signature\SignatureV4;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Message\Request;
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
        'PutBucketTagging'
    ];

    private static $canMd5 = ['PutObject', 'UploadPart'];

    public function getEvents()
    {
        return ['prepare' => ['setMd5', 'last']];
    }

    public function setMd5(PrepareEvent $event)
    {
        $signature = $event->getClient()->getSignature();

        $command = $event->getCommand();

        if (in_array($command->getName(), self::$requireMd5)) {
            // Add the MD5 if it is a required parameter
            $this->addMd5($event->getRequest());
        } elseif (in_array($command->getName(), self::$canMd5)) {
            $value = $command['ContentMD5'];
            // Add a computed MD5 if the parameter is set to true or if
            // not using Signature V4 and the value is not set (null).
            if ($value === true ||
                ($value === null && !($signature instanceof SignatureV4))
            ) {
                $this->addMd5($event->getRequest());
            }
        }
    }

    private function addMd5(Request $request)
    {
        $body = $request->getBody();
        if ($body && $body->getSize() > 0) {
            if (false !== ($md5 = Stream\hash($body, 'md5', true))) {
                $request->setHeader('Content-MD5', base64_encode($md5));
            }
        }
    }
}
