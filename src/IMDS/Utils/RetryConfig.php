<?php

namespace Aws\IMDS\Utils;

/**
 * This class contains the configuration for how a request should be retried.
 */
final class RetryConfig
{
    /**
     * This is the max attempts number that an operation can be retried.
     * @var int $maxAttempts
     */
    private $maxAttempts;
    /**
     * This is for limiting the number of seconds that we can wait for a next
     * retry.
     * @var int $maxBackoffTime
     */
    private $maxBackoffTime;
    /**
     * The backoff function implementation, that will sleep until next retry.
     * @var callable $backoffStrategy
     */
    private $backoffStrategy;
    /**
     * This parameter is a function, that should decide if an error can be retried
     * or not, by returning true or false. It should accept an instance of RuntimeException
     * as parameter.
     * @var callable $retryBaseCondition
     */
    private $retryBaseCondition;

    private function __construct() {}

    /**
     * @return int
     */
    public function maxAttempts() {
        return $this->maxAttempts;
    }

    /**
     * @return int
     */
    public function maxBackoffTime() {
        return $this->maxBackoffTime;
    }

    /**
     * @return callable
     */
    public function backoffStrategy() {
        return $this->backoffStrategy;
    }

    /**
     * @return callable
     */
    public function retryBaseCondition() {
        return $this->retryBaseCondition;
    }

    /**
     * @param int $maxAttempts
     * @return RetryConfig
     */
    public function withMaxAttempts($maxAttempts) {
        $this->maxAttempts = $maxAttempts;

        return $this;
    }

    /**
     * @param int $maxBackoffTime
     * @return RetryConfig
     */
    public function withMaxBackoffTime($maxBackoffTime) {
        $this->maxBackoffTime = $maxBackoffTime;

        return $this;
    }

    /**
     * @param callable $backoffStrategy
     * @return RetryConfig
     */
    public function withBackoffStrategy($backoffStrategy) {
        $this->backoffStrategy = $backoffStrategy;

        return $this;
    }

    /**
     * @param callable $retryBaseCondition
     * @return RetryConfig
     */
    public function withRetryBaseCondition($retryBaseCondition) {
        $this->retryBaseCondition = $retryBaseCondition;

        return $this;
    }

    public function __toString() {
        return "RetryConfig={maxAttempts: $this->maxAttempts, maxBackoffTime: $this->maxBackoffTime}";
    }

    /**
     * This method creates a new instance of retry configuration, and it resolves
     * the default values if not provided as parameter.
     * @param int $maxAttempts defaulted to 3.
     * @param callable|int $backoff
     * @param callable $retryBaseCondition
     * @return RetryConfig
     */
    public static function newWithDefaults($maxAttempts, $backoff, $retryBaseCondition) {
        $retryConfig = new RetryConfig();
        $retryConfig->withMaxAttempts((is_null($maxAttempts) || $maxAttempts === 0) ? Retry::DEFAULT_MAX_ATTEMPTS : $maxAttempts);
        if (is_callable($backoff)) {
            $retryConfig->withBackoffStrategy($backoff);
        } else if (is_int($backoff) && $backoff !== 0) {
            $retryConfig->withBackoffStrategy(function () use ($backoff) {
                sleep($backoff);
            });
        } else {
            $retryConfig->withBackoffStrategy(Retry::defaultBackoffStrategy());
        }

        $retryConfig->withRetryBaseCondition($retryBaseCondition);

        return $retryConfig;
    }
}
