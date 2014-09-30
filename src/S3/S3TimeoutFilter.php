<?php
namespace Aws\S3;

use GuzzleHttp\Event\AbstractTransferEvent;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * Custom S3 exponential backoff checking use to retry 400 responses containing
 * the following reason phrase: "Your socket connection to the server was not
 * read from or written to within the timeout period.".
 *
 * This error has been reported as intermittent/random, and in most cases,
 * seems to occur during the middle of a transfer. This plugin will attempt to
 * retry these failed requests, and if using a local file, will clear the stat
 * cache of the file and set a new content-length header on the upload.
 */
class S3TimeoutFilter
{
    const ERR = 'Your socket connection to the server was not read from or written to within the timeout period';

    public function __invoke($retries, AbstractTransferEvent $event)
    {
        // Don't mess with networking errors.
        if (!($response = $event->getResponse())) {
            return RetrySubscriber::DEFER;
        }

        // Only retry 400 errors that contain the targeted exception message.
        if ($response->getStatusCode() != 400 ||
            strpos($response->getBody(), self::ERR) === false
        ) {
            return RetrySubscriber::DEFER;
        }

        return RetrySubscriber::RETRY;
    }
}
