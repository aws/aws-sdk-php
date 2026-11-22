<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry;

use Aws\Tests\Core\Integ\Retry\Generated\Input\RetryFixtureInput;
use Aws\Tests\Core\Integ\Retry\Generated\Protocol\RetryFixtureProtocol;
use Aws\Tests\Core\Integ\Retry\Generated\RetryFixtureClient;
use Aws\Tests\Core\Integ\Retry\Generated\RetryFixtureClientConfig;
use Aws\Tests\Core\Integ\Retry\Utils\IntegEventLoop;
use PHPUnit\Framework\TestCase;
use Smithy\Async\Async;
use Smithy\Async\EventLoopInterface;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Retry\StandardRetryStrategy;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Http\Message\Response;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class StandardRetryStrategyTest extends TestCase
{
    private EventLoopInterface $previousLoop;

    protected function setUp(): void
    {
        $this->previousLoop = Async::eventLoop();
    }

    protected function tearDown(): void
    {
        Async::configure($this->previousLoop);
    }

    public function testLongPollingQuotaExhaustionBacksOffBeforeFailure(): void
    {
        $loop = $this->installEventLoop();
        $http = (new MockHttpClient())->queueResponse(
            new Response(429, [], 'throttle')
        );
        $client = $this->createClient(
            $http,
            $this->createStrategy(initialRetryTokens: 0)
        );

        $this->expectException(\Smithy\Core\Exception\ApiException::class);
        $this->expectExceptionMessage('throttle');

        try {
            $client->receiveMessage(new RetryFixtureInput());
        } finally {
            $this->assertSame([1.0], $loop->delays);
            $this->assertSame(1, $http->sendCallCount);
        }
    }

    public function testNonLongPollingQuotaExhaustionDoesNotBackOff(): void
    {
        $loop = $this->installEventLoop();
        $http = (new MockHttpClient())->queueResponse(
            new Response(429, [], 'throttle')
        );
        $client = $this->createClient(
            $http,
            $this->createStrategy(initialRetryTokens: 0)
        );

        $this->expectException(\Smithy\Core\Exception\ApiException::class);
        $this->expectExceptionMessage('throttle');

        try {
            $client->putObject(new RetryFixtureInput());
        } finally {
            $this->assertSame([], $loop->delays);
            $this->assertSame(1, $http->sendCallCount);
        }
    }

    public function testModeledRetryableErrorRetriesAndSucceeds(): void
    {
        $loop = $this->installEventLoop();
        $http = (new MockHttpClient())
            ->queueResponse(new Response(400, [], 'modeled-retryable'))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient($http, $this->createStrategy());

        $output = $client->putObject(new RetryFixtureInput());

        $this->assertSame('ok', $output->result);
        $this->assertSame([0.05], $loop->delays);
        $this->assertSame(2, $http->sendCallCount);
    }

    public function testModeledThrottlingErrorRetriesAndSucceeds(): void
    {
        $loop = $this->installEventLoop();
        $http = (new MockHttpClient())
            ->queueResponse(new Response(400, [], 'modeled-throttling'))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient($http, $this->createStrategy());

        $output = $client->putObject(new RetryFixtureInput());

        $this->assertSame('ok', $output->result);
        $this->assertSame([1.0], $loop->delays);
        $this->assertSame(2, $http->sendCallCount);
    }

    public function testRetryAfterHeaderIsHonoredAndClamped(): void
    {
        $loop = $this->installEventLoop();
        $http = (new MockHttpClient())
            ->queueResponse(new Response(
                500,
                ['x-amz-retry-after' => '10000'],
                'transient'
            ))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient($http, $this->createStrategy());

        $output = $client->putObject(new RetryFixtureInput());

        $this->assertSame('ok', $output->result);
        $this->assertSame([5.05], $loop->delays);
        $this->assertSame(2, $http->sendCallCount);
    }

    private function createClient(
        MockHttpClient $http,
        StandardRetryStrategy $strategy,
    ): RetryFixtureClient
    {
        return new RetryFixtureClient(
            new RetryFixtureClientConfig(
                protocolInstance: new RetryFixtureProtocol(),
                endpointResolverInstance: new StaticEndpointResolver(
                    new Endpoint('https://example.test')
                ),
                resolvedHttpClientInstance: $http,
                region: 'us-east-1',
                credentials: AnonymousIdentityResolver::instance(),
                retryStrategy: $strategy
            )
        );
    }

    private function createStrategy(
        int $initialRetryTokens = StandardRetryStrategy::INITIAL_RETRY_TOKENS,
    ): StandardRetryStrategy
    {
        return new StandardRetryStrategy(
            initialRetryTokens: $initialRetryTokens,
            random: static fn(): float => 0.0
        );
    }

    private function installEventLoop(): IntegEventLoop
    {
        $loop = new IntegEventLoop();
        Async::configure($loop);

        return $loop;
    }
}
