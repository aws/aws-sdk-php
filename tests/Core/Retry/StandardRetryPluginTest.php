<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Retry;

use Aws\Core\Client\AwsClientConfigContext;
use Aws\Core\Client\AwsClientConfigResolver;
use Aws\Core\Credentials\AwsConfigFile;
use Aws\Core\Retry\AwsRetryRequestFlagResolver;
use Aws\Core\Retry\RetryMetadataException;
use Aws\Core\Retry\StandardRetryInterceptor;
use Aws\Core\Retry\StandardRetryPlugin;
use Aws\Tests\Core\Retry\Utils\RetryTestClient;
use PHPUnit\Framework\TestCase;
use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Dynamic\DynamicClient;
use Smithy\Client\Plugin\PluginCollection;
use Smithy\Client\Retry\{
    RetryRequestFlagResolverInterface,
    RetryState,
    RetryStrategyInterface,
    StandardRetryStrategy,
    TokenAcquisitionFailedException
};
use Smithy\Core\Shape\OperationInterface;
use Smithy\Http\Client\Exception\HttpException;
use Smithy\Http\Message\{Request, Response, Uri};
use Smithy\Tests\Utils\Http\MockHttpClient;

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
            AwsRetryRequestFlagResolver::instance(),
            $config->context[RetryRequestFlagResolverInterface::CONFIG_KEY]
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
        $client = $this->smithyClient(
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
        $client = $this->smithyClient(
            new StandardRetryStrategy(
                baseDelay: 0.0,
                throttlingBaseDelay: 0.0
            ),
            $httpClient
        );

        $client->call('Ping');

        $this->assertSame(2, $httpClient->sendCallCount);
    }

    private function client(RetryStrategyInterface $strategy): RetryTestClient
    {
        return RetryTestClient::forModel(
            retryStrategy: $strategy,
            plugins: new PluginCollection(StandardRetryPlugin::instance())
        );
    }

    private function smithyClient(
        RetryStrategyInterface $strategy,
        MockHttpClient $httpClient
    ): DynamicClient
    {
        return RetryTestClient::smithyClient(
            $httpClient,
            $strategy,
            new PluginCollection(StandardRetryPlugin::instance())
        );
    }
}

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

final class FixedFlagResolver implements RetryRequestFlagResolverInterface
{
    public function resolve(
        OperationInterface $operation,
        AbstractClientConfig $config
    ): int
    {
        return 0;
    }
}
