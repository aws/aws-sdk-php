<?php
namespace Aws\Common\Retry;

use GuzzleHttp\Event\AbstractTransferEvent;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;
use GuzzleHttp\Stream;
use GuzzleHttp\Stream\Utils;

/**
 * Retries requests based on the x-amz-crc32 response header.
 */
class Crc32Filter
{
    public function __invoke($retries, AbstractTransferEvent $event)
    {
        if (!($response = $event->getResponse())) {
            return RetrySubscriber::DEFER;
        }

        if (!$response->hasHeader('x-amz-crc32')) {
            return RetrySubscriber::DEFER;
        }

        $hash = hexdec(Utils::hash($response->getBody(), 'crc32b'));

        return (int) $response->getHeader('x-amz-crc32') !== $hash
            ? RetrySubscriber::RETRY
            : RetrySubscriber::DEFER;
    }
}
