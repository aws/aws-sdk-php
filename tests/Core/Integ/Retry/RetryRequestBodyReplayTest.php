<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry;

use Aws\Core\Exception\AwsException;
use Aws\Tests\Core\Integ\Retry\Utils\NonSeekableTestStream;
use Aws\Tests\Core\Integ\Retry\Utils\RetryTestAwsClient;
use Aws\Tests\Core\Integ\Retry\Utils\TestInput;
use Aws\Tests\Core\Integ\Retry\Utils\TestOperation;
use Aws\Tests\Core\Integ\Retry\Utils\TestOutput;
use Aws\Tests\Core\Integ\Retry\Utils\TestRetryAwsClientConfig;
use Aws\Tests\Core\Integ\Retry\Utils\TestRetryProtocol;
use Aws\Tests\Utils\Http\RetryUploadServerFixture;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Client\Retry\StandardRetryStrategy;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Http\Client\Configuration\ConnectConfiguration;
use Smithy\Http\Client\Configuration\HTTPVersionPolicy;
use Smithy\Http\Client\CurlClient;
use Smithy\Http\Client\Exception\HttpException;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Http\Client\HttpRequestOptions;
use Smithy\Http\Message\{
    Request,
    ResourceRequestStream,
    Response,
    Uri
};
use Smithy\Protocol\ProtocolInterface;
use Smithy\Tests\Utils\Http\MockHttpClient;

/**
 * End-to-end tests for request body replay across AWS retries.
 *
 * Metadata classification is covered by StandardRetryInterceptorTest.
 */
final class RetryRequestBodyReplayTest extends TestCase
{
    public function testSeekableStreamIsRewoundBeforeRetry(): void
    {
        $body = ResourceRequestStream::temp('payload');
        $httpClient = (new MockHttpClient())
            ->queueHandler(static function (
                RequestInterface $request
            ): ResponseInterface {
                self::assertSame('payload', (string) $request->getBody());

                return new Response(500, [], 'transient');
            })
            ->queueHandler(static function (
                RequestInterface $request
            ): ResponseInterface {
                self::assertSame('payload', (string) $request->getBody());

                return new Response(200, [], 'ok');
            });
        $client = $this->createClient(
            protocol: new TestRetryProtocol($body, failOnServerError: true),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        $output = $client->executeOperation(
            TestOperation::instance(),
            TestInput::create()
        );

        $this->assertSame(TestOutput::class, $output::class);
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    public function testReplayableResourceIsReopenedBeforeRetry(): void
    {
        $openCount = 0;
        $body = ResourceRequestStream::create(
            static function () use (&$openCount) {
                ++$openCount;
                $resource = \fopen('php://temp', 'r+');
                if ($resource === false) {
                    throw new \RuntimeException(
                        'Unable to create test resource.'
                    );
                }
                \fwrite($resource, 'payload');
                \rewind($resource);

                return $resource;
            },
            7
        );
        $httpClient = (new MockHttpClient())
            ->queueHandler(static function (
                RequestInterface $request
            ): ResponseInterface {
                self::assertSame('payload', (string) $request->getBody());

                return new Response(500, [], 'transient');
            })
            ->queueHandler(static function (
                RequestInterface $request
            ): ResponseInterface {
                self::assertSame('payload', (string) $request->getBody());

                return new Response(200, [], 'ok');
            });
        $client = $this->createClient(
            protocol: new TestRetryProtocol($body, failOnServerError: true),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        $output = $client->executeOperation(
            TestOperation::instance(),
            TestInput::create()
        );

        $this->assertSame(TestOutput::class, $output::class);
        $this->assertSame(2, $httpClient->sendCallCount);
        $this->assertSame(2, $openCount);
    }

    public function testReplayableResourceRetriesInterruptedCurlUpload(): void
    {
        if (!\extension_loaded('curl')) {
            self::markTestSkipped('The cURL extension is required.');
        }

        $payload = \str_repeat('0123456789abcdef', 256 * 1024);
        $payloadLength = \strlen($payload);
        $payloadHash = \hash('sha256', $payload);
        $path = \tempnam(\sys_get_temp_dir(), 'smithy-retry-body-');
        if ($path === false) {
            $this->fail('Unable to create retry upload payload.');
        }
        if (\file_put_contents($path, $payload) !== $payloadLength) {
            @\unlink($path);
            $this->fail('Unable to write retry upload payload.');
        }
        unset($payload);

        $server = null;
        $body = null;
        $httpClient = null;
        $openedResources = [];

        try {
            $server = RetryUploadServerFixture::start();
            $body = ResourceRequestStream::create(
                static function () use ($path, &$openedResources) {
                    $resource = \fopen($path, 'rb');
                    if ($resource === false) {
                        throw new \RuntimeException(
                            'Unable to open retry upload payload.'
                        );
                    }
                    $openedResources[] = $resource;

                    return $resource;
                },
                $payloadLength
            );
            $httpClient = new CurlClient(
                connectConfiguration: new ConnectConfiguration(
                    versionPolicy: HTTPVersionPolicy::EnforceHTTP_1_1
                ),
                defaultOptions: new HttpRequestOptions(
                    timeout: 5.0,
                    readTimeout: 5.0
                )
            );
            $client = $this->createClient(
                protocol: new TestRetryProtocol($body),
                httpClient: $httpClient,
                retryStrategy: $this->createRetryStrategy(),
                endpoint: $server->endpoint()
            );

            $output = $client->executeOperation(
                TestOperation::instance(),
                TestInput::create()
            );
            $capture = $server->capture();

            $this->assertSame(TestOutput::class, $output::class);
            $this->assertCount(2, $openedResources);
            $this->assertFalse(\is_resource($openedResources[0]));
            $this->assertTrue(\is_resource($openedResources[1]));
            $this->assertCount(2, $capture['attempts']);
            $this->assertSame(
                64 * 1024,
                $capture['attempts'][0]['body_bytes']
            );
            $this->assertLessThan(
                $payloadLength,
                $capture['attempts'][0]['body_bytes']
            );
            $this->assertSame(
                $payloadLength,
                $capture['attempts'][1]['body_bytes']
            );
            $this->assertSame(
                $payloadHash,
                $capture['attempts'][1]['sha256']
            );
            $this->assertSame('POST', $capture['attempts'][0]['method']);
            $this->assertSame('POST', $capture['attempts'][1]['method']);
            $this->assertTrue($body->started());
            $this->assertTrue($body->fullyConsumed());

            $body->close();
            $this->assertFalse(\is_resource($openedResources[1]));
        } finally {
            $body?->close();
            $httpClient?->getConnectionManager()->clear();
            $server?->stop();
            @\unlink($path);
        }
    }

    public function testNonSeekableStreamWithResponseIsNotRetried(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueResponse(new Response(500, [], 'transient'))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol(
                new NonSeekableTestStream('payload'),
                failOnServerError: true
            ),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        try {
            $client->executeOperation(
                TestOperation::instance(),
                TestInput::create()
            );
            $this->fail('Expected exception was not thrown');
        } catch (AwsException $error) {
            $this->assertSame('transient', $error->getMessage());
            $this->assertSame(1, $httpClient->sendCallCount);
        }
    }

    public function testNonSeekableStreamNotStartedTransportErrorRetries(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueException(new HttpException(
                'connect failed',
                new Request('POST', new Uri('https://example.test')),
                requestBodyStarted: false,
                requestBodyFullyConsumed: false,
                requestBodySeekable: false
            ))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol(
                new NonSeekableTestStream('payload')
            ),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        $output = $client->executeOperation(
            TestOperation::instance(),
            TestInput::create()
        );

        $this->assertSame(TestOutput::class, $output::class);
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    public function testNonSeekableStreamStartedTransportErrorIsNotRetried(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueException(new HttpException(
                'upload failed',
                new Request('POST', new Uri('https://example.test')),
                requestBodyStarted: true,
                requestBodyFullyConsumed: false,
                requestBodySeekable: false
            ))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol(
                new NonSeekableTestStream('payload')
            ),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        try {
            $client->executeOperation(
                TestOperation::instance(),
                TestInput::create()
            );
            $this->fail('Expected exception was not thrown');
        } catch (HttpException $error) {
            $this->assertSame('upload failed', $error->getMessage());
            $this->assertSame(1, $httpClient->sendCallCount);
        }
    }

    public function testUnknownNonSeekableTransportStateIsNotRetried(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueException(new HttpException(
                'unknown upload state',
                new Request('POST', new Uri('https://example.test'))
            ))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol(
                new NonSeekableTestStream('payload')
            ),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        try {
            $client->executeOperation(
                TestOperation::instance(),
                TestInput::create()
            );
            $this->fail('Expected exception was not thrown');
        } catch (HttpException $error) {
            $this->assertSame('unknown upload state', $error->getMessage());
            $this->assertSame(1, $httpClient->sendCallCount);
        }
    }

    public function testStringBodyRetriesNormally(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueResponse(new Response(500, [], 'transient'))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol('payload', failOnServerError: true),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        $output = $client->executeOperation(
            TestOperation::instance(),
            TestInput::create()
        );

        $this->assertSame(TestOutput::class, $output::class);
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    private function createClient(
        ProtocolInterface $protocol,
        HttpClientInterface $httpClient,
        RetryStrategyInterface $retryStrategy,
        string $endpoint = 'https://example.test',
    ): RetryTestAwsClient
    {
        return new RetryTestAwsClient(
            new TestRetryAwsClientConfig(
                protocolInstance: $protocol,
                endpointResolverInstance: new StaticEndpointResolver(
                    new Endpoint($endpoint)
                ),
                httpClientInstance: $httpClient,
                region: 'us-east-1',
                credentials: AnonymousIdentityResolver::instance(),
                retryStrategy: $retryStrategy
            )
        );
    }

    private function createRetryStrategy(): StandardRetryStrategy
    {
        return new StandardRetryStrategy(
            baseDelay: 0.0,
            throttlingBaseDelay: 0.0
        );
    }
}
