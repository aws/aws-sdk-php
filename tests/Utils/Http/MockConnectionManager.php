<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Utils\Http;

use Smithy\Http\Client\Cancellation\CancellationInterface;
use Smithy\Http\Client\Configuration\{
    ConnectionManagerConfiguration,
    ConnectConfiguration
};
use Smithy\Http\Client\Connection\{
    ConnectionManagerInterface,
    ExchangeInterface,
    RequestContext
};

/**
 * In-memory connection manager for shared HTTP client tests.
 */
final class MockConnectionManager implements ConnectionManagerInterface
{
    public int $releaseCount = 0;
    public int $pruneCount = 0;
    public int $clearCount = 0;

    public function __construct(
        private readonly ConnectionManagerConfiguration $configuration =
            new ConnectionManagerConfiguration()
    ) {}

    /** @inheritDoc */
    public function lease(
        RequestContext $requestContext,
        ConnectConfiguration $connectConfig = new ConnectConfiguration(),
        ?CancellationInterface $cancellation = null
    ): ExchangeInterface
    {
        throw new \BadMethodCallException(
            'Mock connection manager cannot lease connections.'
        );
    }

    /** @inheritDoc */
    public function release(ExchangeInterface $exchange): void
    {
        ++$this->releaseCount;
    }

    /** @inheritDoc */
    public function prune(): void
    {
        ++$this->pruneCount;
    }

    /** @inheritDoc */
    public function clear(): void
    {
        ++$this->clearCount;
    }

    /** @inheritDoc */
    public function idleCount(): int
    {
        return 0;
    }

    /** @inheritDoc */
    public function getConfiguration(): ConnectionManagerConfiguration
    {
        return $this->configuration;
    }
}
