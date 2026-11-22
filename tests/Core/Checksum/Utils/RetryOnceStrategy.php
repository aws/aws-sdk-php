<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum\Utils;

use Smithy\Client\Retry\RetryState;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Client\Retry\TokenAcquisitionFailedException;

/**
 * Retry strategy that allows exactly one retry with no delay.
 */
final class RetryOnceStrategy implements RetryStrategyInterface
{
    private int $refreshCount = 0;

    public function begin(string $scope, int $requestFlags = 0): RetryState
    {
        return new RetryState($scope, $requestFlags);
    }

    public function refresh(RetryState $state, \Throwable $error): float
    {
        if ($this->refreshCount++ === 0) {
            return 0.0;
        }

        throw new TokenAcquisitionFailedException(
            'Retries exhausted.',
            previous: $error,
            state: $state
        );
    }

    public function recordSuccess(RetryState $state): void {}

    public function maxAttempts(): int
    {
        return 2;
    }
}
