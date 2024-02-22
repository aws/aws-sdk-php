<?php

namespace Aws\IMDS\Utils;

use Exception;
use RuntimeException;

final class Retry
{
    public const DEFAULT_MAX_ATTEMPTS = 3;

    private function __construct() {}

    /**
     *
     * @param RetryConfig $retryConfig
     * @param callable $fnToRetry
     * @return mixed
     * @throws RuntimeException
     */
    public static function retry($retryConfig, $fnToRetry) {
        Validator::ifNullThrowException($retryConfig, "Retry config must be provided!");
        Validator::ifNullThrowException($fnToRetry, "The function to be retried must be provided!");
        Validator::ifNotInstanceOfThrowException($retryConfig, RetryConfig::class);
        if (!is_callable($fnToRetry)) {
            Validator::throwException('A function to be retried must be provided!');
        }

        // To avoid that any changes on the original retryConfig object interfere in the behavior of this execution.
        $retryConfigCopy = clone $retryConfig;
        $retryCount = 0;
        do {
            try {
                return $fnToRetry();
            } catch (RuntimeException $e) {
                $exceptionToBeThrown = $e;
                $isRetryable = $retryConfigCopy->retryBaseCondition()($e);
                if (!$isRetryable) {
                    break;
                }
                // Sleep
                $retryConfigCopy->backoffStrategy()($retryCount);
            }

            $retryCount++;
        } while ($retryCount < $retryConfigCopy->maxAttempts());

        if (!is_null($exceptionToBeThrown)) {
            throw $exceptionToBeThrown;
        }

        Validator::throwException('An unexpected error has occurred when retrying!');
    }

    /**
     * @return callable
     */
    public static function defaultBackoffStrategy() {
        return function ($numAttempts) {
            usleep((1.2 ** $numAttempts) * 1000000);
        };
    }
}
