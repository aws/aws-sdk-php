<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Retry;

use Aws\Core\Client\AwsClientConfigContext;
use Aws\Core\Client\AwsClientConfigResolver;
use Aws\Core\Credentials\AwsConfigFile;
use Aws\Core\Retry\RetryMetadataException;
use Aws\Core\Retry\StandardRetryInterceptor;
use Aws\Core\Retry\StandardRetryPlugin;
use Aws\Tests\Core\Retry\Utils\FixedFlagResolver;
use Aws\Tests\Core\Retry\Utils\RecordingRetryStrategy;
use Aws\Tests\Core\Retry\Utils\RetryTestClient;
use Aws\Tests\Utils\Http\MockHttpClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Plugin\PluginCollection;
use Smithy\Client\Retry\{
    RetryRequestFlagResolverInterface,
    RetryRequestFlags,
    RetryStrategyInterface,
    StandardRetryStrategy
};
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Core\Exception\ApiException;
use Smithy\Core\Retry\RetrySafety;
use Smithy\Http\Client\Exception\HttpException;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Http\Message\{Request, Response, Uri};
use Smithy\Protocol\Aws\RestJsonProtocol;

final class StandardRetryPluginTest extends TestCase
{
    public function testClientInstallsInterceptorAndFlagResolver(): void
    {
        $config = $this->client(new RecordingRetryStrategy())->getConfig();

        $this->assertTrue(
            $config->interceptorChain->contains(
                StandardRetryInterceptor::class
            )
        );
        $this->assertSame(
            StandardRetryPlugin::instance(),
            $config->context[RetryRequestFlagResolverInterface::CONFIG_KEY]
        );
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function longPollingProvider(): array
    {
        return [
            'sqs ReceiveMessage' => ['sqs', 'ReceiveMessage'],
            'states GetActivityTask' => ['states', 'GetActivityTask'],
            'swf PollForActivityTask' => ['swf', 'PollForActivityTask'],
            'swf PollForDecisionTask' => ['swf', 'PollForDecisionTask'],
            'kinesis ReceiveQueueRecords' => [
                'kinesis',
                'ReceiveQueueRecords'
            ],
            'kinesis ReceiveDeadLetterQueueRecords' => [
                'kinesis',
                'ReceiveDeadLetterQueueRecords'
            ],
        ];
    }

    #[DataProvider('longPollingProvider')]
    public function testResolvesLongPollingOperations(
        string $signingName,
        string $operationName
    ): void
    {
        $client = RetryTestClient::forModel($signingName);

        $this->assertSame(
            RetryRequestFlags::LONG_POLLING,
            StandardRetryPlugin::instance()->resolve(
                $client->operation($operationName),
                $client->getConfig()
            )
        );
    }

    public function testResolvesZeroForOtherOperation(): void
    {
        $client = RetryTestClient::forModel('sqs');

        $this->assertSame(
            0,
            StandardRetryPlugin::instance()->resolve(
                $client->operation('Ping'),
                $client->getConfig()
            )
        );
    }

    public function testResolvesZeroForLongPollingNameOnOtherService(): void
    {
        $client = RetryTestClient::forModel('s3');

        $this->assertSame(
            0,
            StandardRetryPlugin::instance()->resolve(
                $client->operation('ReceiveMessage'),
                $client->getConfig()
            )
        );
    }

    public function testResolvesZeroForNonAwsConfig(): void
    {
        $config = new ClientConfig(
            protocol: new RestJsonProtocol(),
            transport: new HttpClientTransport(new MockHttpClient()),
            endpointResolver: new StaticEndpointResolver(
                new Endpoint('https://example.test')
            )
        );

        $this->assertSame(
            0,
            StandardRetryPlugin::instance()->resolve(
                RetryTestClient::forModel('sqs')->operation('ReceiveMessage'),
                $config
            )
        );
    }

    public function testConfigureIsIdempotent(): void
    {
        $config = $this->client(new RecordingRetryStrategy())->getConfig();

        $this->assertSame(
            $config,
            StandardRetryPlugin::instance()->configure($config)
        );
    }

    public function testKeepsExplicitRetryStrategy(): void
    {
        $strategy = new RecordingRetryStrategy();

        $this->assertSame(
            $strategy,
            $this->client($strategy)->getConfig()->retryStrategy
        );
    }

    public function testResolvesStandardStrategyFromStoredContext(): void
    {
        $resolver = new AwsClientConfigResolver();
        $config = $resolver->withContext(
            RetryTestClient::forModel()->getConfig(),
            new AwsClientConfigContext(
                env: ['AWS_MAX_ATTEMPTS' => '5'],
                profileName: 'default',
                credentialsFilePath: null,
                configFilePath: null,
                profileFile: new AwsConfigFile([]),
                profile: null
            )
        );

        $strategy = StandardRetryPlugin::instance()
            ->configure($config)
            ->retryStrategy;

        $this->assertInstanceOf(StandardRetryStrategy::class, $strategy);
        $this->assertSame(5, $strategy->maxAttempts());
    }

    public function testKeepsConfiguredFlagResolver(): void
    {
        $flagResolver = new FixedFlagResolver();
        $config = RetryTestClient::forModel(
            retryStrategy: new RecordingRetryStrategy()
        )->getConfig()->withContext(
            RetryRequestFlagResolverInterface::CONFIG_KEY,
            $flagResolver
        );

        $this->assertSame(
            $flagResolver,
            StandardRetryPlugin::instance()->configure($config)->context[
                RetryRequestFlagResolverInterface::CONFIG_KEY
            ]
        );
    }

    public function testTransportFailureIsWrappedForStrategyAndUnwrappedForCaller(): void
    {
        $strategy = new RecordingRetryStrategy();
        $error = new HttpException(
            'transport failed',
            new Request('POST', new Uri('https://example.test'))
        );
        $client = $this->awsClient(
            $strategy,
            (new MockHttpClient())->queueException($error)
        );

        try {
            $client->call('Ping');
            $this->fail('Expected exception was not thrown');
        } catch (HttpException $thrown) {
            $this->assertSame($error, $thrown);
            $this->assertInstanceOf(
                RetryMetadataException::class,
                $strategy->seenError
            );
            $this->assertTrue($strategy->seenError->retryable);
            $this->assertSame(
                $error,
                RetryMetadataException::unwrap($strategy->seenError)
            );
        }
    }

    public function testRetryAfterResponseIsRetried(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueResponse(
                new Response(400, ['x-amz-retry-after' => '0'], '{}')
            )
            ->queueResponse(new Response(200, [], '{}'));
        $client = $this->awsClient(
            new StandardRetryStrategy(
                baseDelay: 0.0,
                throttlingBaseDelay: 0.0
            ),
            $httpClient
        );

        $client->call('Ping');

        $this->assertSame(2, $httpClient->sendCallCount);
    }

    public function testRetrySafetyInterceptorClassifiesRetryableError(): void
    {
        $httpClient = new MockHttpClient();
        for ($attempt = 0; $attempt < 2; ++$attempt) {
            $httpClient->queueResponse(
                new Response(
                    400,
                    ['x-amzn-errortype' => 'ThrottledError'],
                    '{}'
                )
            );
        }
        $client = $this->awsClient(
            new StandardRetryStrategy(
                maxAttempts: 2,
                baseDelay: 0.0,
                throttlingBaseDelay: 0.0
            ),
            $httpClient
        );

        try {
            $client->call('Throttle');
            $this->fail('Expected exception was not thrown');
        } catch (ApiException $thrown) {
        }

        $this->assertSame(2, $httpClient->sendCallCount);
        $this->assertSame(RetrySafety::Yes, $thrown->getRetrySafety());
        $this->assertTrue($thrown->isThrottle());
    }

    private function client(RetryStrategyInterface $strategy): RetryTestClient
    {
        return RetryTestClient::forModel(
            retryStrategy: $strategy,
            plugins: new PluginCollection(StandardRetryPlugin::instance())
        );
    }

    private function awsClient(
        RetryStrategyInterface $strategy,
        MockHttpClient $httpClient
    ): RetryTestClient
    {
        return RetryTestClient::forModel(
            httpClient: $httpClient,
            retryStrategy: $strategy,
            plugins: new PluginCollection(StandardRetryPlugin::instance())
        );
    }
}
