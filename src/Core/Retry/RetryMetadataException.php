<?php

declare(strict_types=1);

namespace Aws\Core\Retry;

use Smithy\Core\Retry\RetryInfoInterface;
use Smithy\Core\Retry\RetrySafety;

/**
 * Carry retry metadata on top of an existing error.
 *
 * This wrapper is internal to the retry pipeline. The interceptor adds
 * it before the retry strategy runs, then unwraps it before the final
 * error is surfaced to the caller.
 */
final class RetryMetadataException extends \RuntimeException implements RetryInfoInterface
{
    public function __construct(
        \Throwable $previous,
        public readonly bool $retryable,
        public readonly bool $throttling = false,
        public readonly ?float $retryAfterSeconds = null,
    ) {
        parent::__construct($previous->getMessage(), 0, $previous);
    }

    public function getRetrySafety(): RetrySafety
    {
        return $this->retryable ? RetrySafety::Yes : RetrySafety::No;
    }

    public function isThrottle(): bool
    {
        return $this->throttling;
    }

    public function getRetryAfter(): ?float
    {
        return $this->retryAfterSeconds;
    }

    public static function wrap(
        \Throwable $error,
        bool $retryable,
        bool $throttling = false,
        ?float $retryAfterSeconds = null,
    ): self
    {
        if ($error instanceof self) {
            $mergedRetryable = $error->retryable || $retryable || $throttling;
            $mergedThrottling = $error->throttling || $throttling;
            $mergedRetryAfter = $retryAfterSeconds ?? $error->retryAfterSeconds;

            if ($mergedRetryable === $error->retryable
                && $mergedThrottling === $error->throttling
                && $mergedRetryAfter === $error->retryAfterSeconds
            ) {
                return $error;
            }

            return new self(
                self::unwrap($error),
                $mergedRetryable,
                $mergedThrottling,
                $mergedRetryAfter
            );
        }

        return new self(
            $error,
            $retryable || $throttling,
            $throttling,
            $retryAfterSeconds
        );
    }

    public static function unwrap(\Throwable $error): \Throwable
    {
        if ($error instanceof self && $error->getPrevious() !== null) {
            return $error->getPrevious();
        }

        return $error;
    }
}
