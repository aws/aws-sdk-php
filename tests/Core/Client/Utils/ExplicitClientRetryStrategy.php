<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client\Utils;

use Smithy\Client\Retry\RetryState;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Client\Retry\TokenAcquisitionFailedException;

/**
 * Retry strategy a test passes explicitly to a client config.
 */
final class ExplicitClientRetryStrategy implements RetryStrategyInterface
{
    public function begin(string $scope, int $requestFlags = 0): RetryState
    {
        return new RetryState($scope, $requestFlags);
    }

    public function refresh(RetryState $state, \Throwable $error): float
    {
        throw new TokenAcquisitionFailedException(
            'Not used in this test.',
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
