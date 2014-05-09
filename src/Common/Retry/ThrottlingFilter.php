<?php
namespace Aws\Common\Retry;

use GuzzleHttp\Event\AbstractTransferEvent;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * Retries throttling responses.
 */
class ThrottlingFilter
{
    /** @var array Error codes that indicate throttling */
    private static $throttlingExceptions = [
        'RequestLimitExceeded'                   => true,
        'Throttling'                             => true,
        'ThrottlingException'                    => true,
        'ProvisionedThroughputExceededException' => true,
        'RequestThrottled'                       => true,
    ];

    /** @var callable */
    private $exceptionParser;

    /**
     * @param callable $exceptionParser Exception parser to use
     */
    public function __construct(callable $exceptionParser)
    {
        $this->exceptionParser = $exceptionParser;
    }

    public function __invoke($retries, AbstractTransferEvent $event)
    {
        // Doesn't mess with networking errors.
        if (!($response = $event->getResponse())) {
            return RetrySubscriber::DEFER;
        }

        // Only works on 4xx respsonses
        if (substr($response->getStatusCode(), 0, 1) != '4') {
            return RetrySubscriber::DEFER;
        }

        $parser = $this->exceptionParser;
        $parts = $parser($response);

        return isset(self::$throttlingExceptions[$parts['code']])
            ? RetrySubscriber::RETRY
            : RetrySubscriber::DEFER;
    }
}
