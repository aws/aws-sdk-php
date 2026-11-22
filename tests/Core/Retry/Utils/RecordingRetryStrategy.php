<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Retry\Utils;

use Aws\Core\Retry\RetryMetadataException;
use Smithy\Client\Retry\RetryState;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Client\Retry\TokenAcquisitionFailedException;

/**
 * Retry strategy that records the retry metadata it sees and stops.
 */
final class RecordingRetryStrategy implements RetryStrategyInterface
{
    public ?RetryMetadataException $seenError = null;

    public function begin(string $scope, int $requestFlags = 0): RetryState
    {
        return new RetryState($scope, $requestFlags);
    }

    public function refresh(RetryState $state, \Throwable $error): float
    {
        if ($error instanceof RetryMetadataException) {
            $this->seenError = $error;
        }

        throw new TokenAcquisitionFailedException(
            'stop retries',
            previous: $error,
            state: $state
        );
    }

    public function recordSuccess(RetryState $state): void {}

    public function maxAttempts(): int
    {
        return 1;
    }
}
