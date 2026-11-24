<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Checksum\FlexibleChecksumRequestInterceptor;
use Aws\Core\Checksum\FlexibleChecksumResponseInterceptor;
use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AbstractAwsClient;
use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientConfigContext;
use Aws\Core\Client\AwsClientConfigResolver;
use Aws\Core\Client\AwsClientInterface;
use Aws\Core\Client\InvalidateCredentialsInterceptor;
use Aws\Core\Credentials\AwsConfigFile;
use Aws\Core\Credentials\AwsCredentialChainContext;
use Aws\Core\Credentials\AwsProfile;
use Aws\Core\Retry\StandardRetryInterceptor;
use Aws\Core\Retry\StandardRetryPlugin;
use Aws\Tests\Core\Client\Utils\BareAwsClient;
use Aws\Tests\Core\Client\Utils\CountingPlugin;
use Aws\Tests\Core\Client\Utils\ExplicitClientRetryStrategy;
use Aws\Tests\Core\Client\Utils\NoopAwsClient;
use Aws\Tests\Core\Client\Utils\TestAbstractAwsClientConfigForClient;
use Aws\Tests\Utils\Http\MockHttpClient;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Client\ClientInterface;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\RequestOverrideConfig;
use Smithy\Client\Retry\NoRetryStrategy;
use Smithy\Client\Retry\RetryRequestFlagResolverInterface;
use Smithy\Client\Retry\StandardRetryStrategy;
use Smithy\Client\Waiter\WaiterConfig;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Core\Model\SmithyModel;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Protocol\Aws\RestJsonProtocol;

/**
 * Behavioural tests for {@see AbstractAwsClient}.
 *
 * These tests pin the narrowed constructor and `getConfig()`, the AWS
 * plugin pipeline, the service SDK ID and the waiter metric through the
 * concrete {@see NoopAwsClient}.
 */
final class AbstractAwsClientTest extends TestCase
{
    private function baseConfig(): TestAbstractAwsClientConfigForClient
    {
        return new TestAbstractAwsClientConfigForClient(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
        );
    }

    public function testClientImplementsAwsClientInterface(): void
    {
        $client = new NoopAwsClient($this->baseConfig());

        $this->assertInstanceOf(AwsClientInterface::class, $client);
        $this->assertInstanceOf(ClientInterface::class, $client);
    }

    public function testGetConfigReturnsNarrowedAbstractAwsClientConfig(): void
    {
        $config = $this->baseConfig();
        $client = new NoopAwsClient($config);

        $returned = $client->getConfig();

        $this->assertInstanceOf(AbstractAwsClientConfig::class, $returned);
        $this->assertNotSame($config, $returned);
        // AWS-specific fields visible without casting.
        $this->assertSame('us-east-1', $returned->region);
        $this->assertSame('test', $returned->signingName);
        $this->assertInstanceOf(
            StandardRetryStrategy::class,
            $returned->retryStrategy
        );
        $this->assertTrue(
            $returned->interceptorChain->contains(
                StandardRetryInterceptor::class
            )
        );
        $this->assertTrue(
            $returned->interceptorChain->contains(
                InvalidateCredentialsInterceptor::class
            )
        );
        $this->assertInstanceOf(
            StandardRetryPlugin::class,
            $returned->context[
                RetryRequestFlagResolverInterface::CONFIG_KEY
            ] ?? null
        );
        $this->assertFalse($returned->supportsFlexibleChecksums());
        $this->assertNull($returned->requestChecksumCalculation);
        $this->assertNull($returned->responseChecksumValidation);
    }

    public function testExplicitRetryStrategyIsPreserved(): void
    {
        $strategy = new ExplicitClientRetryStrategy();
        $config = new TestAbstractAwsClientConfigForClient(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            retryStrategy: $strategy
        );
        $client = new NoopAwsClient($config);

        $this->assertSame($strategy, $client->getConfig()->retryStrategy);
    }

    public function testExplicitNoRetryStrategyIsPreserved(): void
    {
        $config = new TestAbstractAwsClientConfigForClient(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            retryStrategy: NoRetryStrategy::instance()
        );
        $client = new NoopAwsClient($config);

        $this->assertSame(
            NoRetryStrategy::instance(),
            $client->getConfig()->retryStrategy
        );
    }

    public function testDefaultRetryStrategyBuildsAndStoresClientConfigContext(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\nretry_mode = standard\nmax_attempts = 6\n"
        );
        $config = new TestAbstractAwsClientConfigForClient(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            context: [
                AwsCredentialChainContext::PROFILE_NAME_OVERRIDE => 'preview',
                AwsCredentialChainContext::CREDENTIALS_FILE_PATH =>
                    $paths['credentials'],
                AwsCredentialChainContext::CONFIG_FILE_PATH => $paths['config']
            ]
        );

        try {
            $client = new NoopAwsClient($config);
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }

        $context = $client->getConfig()->context[
            AwsClientConfigResolver::CONTEXT_KEY
        ] ?? null;

        $this->assertInstanceOf(AwsClientConfigContext::class, $context);
        $this->assertSame('preview', $context->profileName);
        $this->assertSame(6, $client->getConfig()->retryStrategy->maxAttempts());
    }

    public function testPreseededClientConfigContextIsReused(): void
    {
        $profile = new AwsProfile('preview', [
            'retry_mode' => 'standard',
            'max_attempts' => '8',
            'request_checksum_calculation' => 'when_required',
            'response_checksum_validation' => 'WHEN_REQUIRED'
        ]);
        $context = new AwsClientConfigContext(
            env: [],
            profileName: 'preview',
            credentialsFilePath: null,
            configFilePath: null,
            profileFile: new AwsConfigFile(['preview' => $profile]),
            profile: $profile
        );
        $config = new TestAbstractAwsClientConfigForClient(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            supportsFlexibleChecksums: true,
            context: [
                AwsClientConfigResolver::CONTEXT_KEY => $context
            ]
        );
        $client = new NoopAwsClient($config);

        $this->assertSame(
            $context,
            $client->getConfig()->context[
                AwsClientConfigResolver::CONTEXT_KEY
            ]
        );
        $this->assertSame(8, $client->getConfig()->retryStrategy->maxAttempts());
        $this->assertSame(
            RequestChecksumCalculation::WHEN_REQUIRED,
            $client->getConfig()->requestChecksumCalculation
        );
        $this->assertSame(
            ResponseChecksumValidation::WHEN_REQUIRED,
            $client->getConfig()->responseChecksumValidation
        );
        $this->assertTrue(
            $client->getConfig()->interceptorChain->contains(
                FlexibleChecksumRequestInterceptor::class
            )
        );
        $this->assertTrue(
            $client->getConfig()->interceptorChain->contains(
                FlexibleChecksumResponseInterceptor::class
            )
        );
    }

    public function testSdkIdReturnsTheModeledServiceSdkId(): void
    {
        $client = new NoopAwsClient($this->baseConfig());

        $this->assertSame('Client Test', $client->sdkId());
    }

    public function testSdkIdFallsBackToTheServiceName(): void
    {
        $client = new NoopAwsClient(
            $this->baseConfig(),
            service: NoopAwsClient::service(SmithyModel::fromArray([
                'smithy' => '2.0',
                'shapes' => [
                    'example#Plain' => [
                        'type' => 'service',
                        'version' => '2020-01-01',
                        'traits' => ['aws.protocols#restJson1' => []]
                    ]
                ]
            ]))
        );

        $this->assertSame('Plain', $client->sdkId());
    }

    public function testRequestsCarryTheAwsUserAgent(): void
    {
        $http = (new MockHttpClient())->fallbackResponse('{}', 200);
        $client = new NoopAwsClient($this->configWithHttpClient($http));

        $client->waitUntilPingReady();

        $this->assertMatchesRegularExpression(
            '~^aws-sdk-php/\S+ ua/2\.1 api/client_test#\S+ ~',
            $http->getLastRequest()?->getHeaderLine('User-Agent') ?? ''
        );
    }

    public function testWaiterPollsCarryTheWaiterMetric(): void
    {
        $http = (new MockHttpClient())->fallbackResponse('{}', 200);
        $client = new NoopAwsClient($this->configWithHttpClient($http));

        $client->waitUntilPingReady();

        $this->assertMatchesRegularExpression(
            '~ m/\S*,B( |$)~',
            $http->getLastRequest()?->getHeaderLine('User-Agent') ?? ''
        );
    }

    public function testWaiterKeepsCallerRequestOverrides(): void
    {
        $http = (new MockHttpClient())->fallbackResponse('{}', 200);
        $client = new NoopAwsClient($this->configWithHttpClient($http));

        $client->waitUntilPingReady(new WaiterConfig(
            requestOverrides: RequestOverrideConfig::fromArray([
                RequestOverrideConfig::PLUGINS => [$plugin = new CountingPlugin()]
            ])
        ));

        $this->assertMatchesRegularExpression(
            '~ m/\S*,B( |$)~',
            $http->getLastRequest()?->getHeaderLine('User-Agent') ?? ''
        );
        $this->assertSame(1, $plugin->calls);
    }

    public function testConstructorRejectsPlainClientConfig(): void
    {
        $this->expectException(\TypeError::class);

        // BareAwsClient inherits AbstractAwsClient's constructor, which is
        // typed `AbstractAwsClientConfig` and rejects a plain ClientConfig.
        new BareAwsClient(
            new \Smithy\Client\ClientConfig(
                transport: new HttpClientTransport(new MockHttpClient()),
                protocol: new RestJsonProtocol(),
                endpointResolver: new StaticEndpointResolver(new Endpoint('https://a.test')),
            )
        );
    }

    private function configWithHttpClient(
        MockHttpClient $http
    ): TestAbstractAwsClientConfigForClient
    {
        return new TestAbstractAwsClientConfigForClient(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            httpClient: $http
        );
    }

    /**
     * @return array{dir: string, credentials: string, config: string}
     */
    private function createSharedConfigFiles(
        string $profileName,
        string $configContents
    ): array
    {
        $dir = sys_get_temp_dir() . '/aws-client-config-' . uniqid('', true);
        if (!mkdir($dir) && !is_dir($dir)) {
            throw new \RuntimeException('Failed to create temp dir.');
        }

        $credentialsPath = $dir . '/credentials';
        $configPath = $dir . '/config';

        file_put_contents(
            $credentialsPath,
            '[' . $profileName . "]\naws_access_key_id = test\naws_secret_access_key = secret\n"
        );
        file_put_contents($configPath, $configContents);

        return [
            'dir' => $dir,
            'credentials' => $credentialsPath,
            'config' => $configPath
        ];
    }

    /**
     * @param array{dir: string, credentials: string, config: string} $paths
     *
     * @return void
     */
    private function deleteSharedConfigFiles(array $paths): void
    {
        @unlink($paths['credentials']);
        @unlink($paths['config']);
        @rmdir($paths['dir']);
    }
}
