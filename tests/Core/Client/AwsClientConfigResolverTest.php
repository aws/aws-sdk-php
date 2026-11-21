<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientConfigContext;
use Aws\Core\Client\AwsClientConfigResolver;
use Aws\Core\Credentials\AwsCredentialChain;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Aws\Core\Credentials\AwsCredentialChainContext;
use Aws\Core\Retry\RetryMetadataException;
use Aws\Core\Retry\StandardRetryPlugin;
use Smithy\Protocol\Aws\RestJsonProtocol;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginState;
use Smithy\Client\Plugin\RequestCompressionPlugin as CompressionPlugin;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Client\Retry\StandardRetryStrategy;
use Smithy\Core\Transport\TransportInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class AwsClientConfigResolverTest extends TestCase
{
    public function testResolveContextSnapshotsEnvAndProfileState(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\nretry_mode = standard\nmax_attempts = 5\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([
                'AWS_PROFILE' => 'preview',
                'AWS_SHARED_CREDENTIALS_FILE' => $paths['credentials'],
                'AWS_CONFIG_FILE' => $paths['config'],
                'AWS_RETRY_MODE' => 'standard',
                'AWS_MAX_ATTEMPTS' => '7',
                'AWS_REQUEST_CHECKSUM_CALCULATION' => 'WHEN_REQUIRED',
                'AWS_RESPONSE_CHECKSUM_VALIDATION' => 'when_required'
            ], function () use ($resolver): void {
                $context = $resolver->resolveContext($this->createConfig());

                $this->assertSame('preview', $context->profileName);
                $this->assertSame(
                    'standard',
                    $context->env(AwsClientConfigResolver::ENV_RETRY_MODE)
                );
                $this->assertSame(
                    '7',
                    $context->env(AwsClientConfigResolver::ENV_MAX_ATTEMPTS)
                );
                $this->assertSame(
                    'WHEN_REQUIRED',
                    $context->env(
                        AwsClientConfigResolver::ENV_REQUEST_CHECKSUM_CALCULATION
                    )
                );
                $this->assertSame(
                    'when_required',
                    $context->env(
                        AwsClientConfigResolver::ENV_RESPONSE_CHECKSUM_VALIDATION
                    )
                );
                $this->assertSame('preview', $context->profile?->name);
                $this->assertSame('5', $context->profile?->get('max_attempts'));
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testExplicitRetryConfigBeatsEnvAndProfile(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\nretry_mode = adaptive\nmax_attempts = 5\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([
                'AWS_RETRY_MODE' => 'legacy',
                'AWS_MAX_ATTEMPTS' => '9'
            ], function () use ($resolver, $paths): void {
                $config = $this->createConfig(
                    retryMode: 'standard',
                    maxAttempts: 2,
                    context: $this->sharedConfigContext('preview', $paths)
                );
                $settings = $resolver->resolveRetrySettings(
                    $config,
                    $resolver->resolveContext($config)
                );

                $this->assertSame('standard', $settings['mode']);
                $this->assertSame(2, $settings['maxAttempts']);
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testEnvRetryConfigBeatsProfile(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\nretry_mode = legacy\nmax_attempts = 5\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([
                'AWS_RETRY_MODE' => 'standard',
                'AWS_MAX_ATTEMPTS' => '8'
            ], function () use ($resolver, $paths): void {
                $config = $this->createConfig(
                    context: $this->sharedConfigContext('preview', $paths)
                );
                $settings = $resolver->resolveRetrySettings(
                    $config,
                    $resolver->resolveContext($config)
                );

                $this->assertSame('standard', $settings['mode']);
                $this->assertSame(8, $settings['maxAttempts']);
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testProfileRetryConfigBeatsDefaults(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\nretry_mode = standard\nmax_attempts = 6\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([], function () use ($resolver, $paths): void {
                $config = $this->createConfig(
                    context: $this->sharedConfigContext('preview', $paths)
                );
                $settings = $resolver->resolveRetrySettings(
                    $config,
                    $resolver->resolveContext($config)
                );

                $this->assertSame('standard', $settings['mode']);
                $this->assertSame(6, $settings['maxAttempts']);
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testAdaptiveRetryModeIsRejected(): void
    {
        $resolver = new AwsClientConfigResolver();
        $config = $this->createConfig(retryMode: 'adaptive');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'AWS retry mode "adaptive" is outside this preview. '
            . 'Use the supported retry mode "standard".'
        );

        $resolver->resolveRetrySettings($config, $resolver->resolveContext($config));
    }

    public function testLegacyRetryModeIsRejected(): void
    {
        $resolver = new AwsClientConfigResolver();
        $config = $this->createConfig(retryMode: 'legacy');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'AWS retry mode "legacy" is not supported. '
            . 'Use the supported retry mode "standard".'
        );

        $resolver->resolveRetrySettings($config, $resolver->resolveContext($config));
    }

    public function testUnknownRetryModeNamesTheSupportedMode(): void
    {
        $resolver = new AwsClientConfigResolver();
        $config = $this->createConfig(retryMode: 'turbo');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Unsupported AWS retry mode "turbo". '
            . 'Use the supported retry mode "standard".'
        );

        $resolver->resolveRetrySettings($config, $resolver->resolveContext($config));
    }

    public function testEnvAdaptiveRetryModeIsRejected(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('outside this preview');

        $this->withAwsEnv([
            'AWS_RETRY_MODE' => 'adaptive'
        ], function () use ($resolver): void {
            $config = $this->createConfig();
            $resolver->resolveRetrySettings(
                $config,
                $resolver->resolveContext($config)
            );
        });
    }

    public function testDefaultBaseDelayIsFiftyMilliseconds(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->withAwsEnv([], function () use ($resolver): void {
            $config = $this->createConfig();
            $settings = $resolver->resolveRetrySettings(
                $config,
                $resolver->resolveContext($config)
            );

            $this->assertSame(0.05, $settings['baseDelay']);
        });
    }

    public function testDynamoDbBaseDelayIsTwentyFiveMilliseconds(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->withAwsEnv([], function () use ($resolver): void {
            $config = $this->createConfig(signingName: 'dynamodb');
            $settings = $resolver->resolveRetrySettings(
                $config,
                $resolver->resolveContext($config)
            );

            $this->assertSame(0.025, $settings['baseDelay']);
        });
    }

    public function testRetryPluginAppliesServiceBaseDelayAndMaxAttempts(): void
    {
        $this->withAwsEnv([], function (): void {
            $config = StandardRetryPlugin::instance()->configure(
                $this->createConfig(signingName: 'dynamodb')
            );
            $strategy = $config->retryStrategy;
            $this->assertInstanceOf(StandardRetryStrategy::class, $strategy);
            $this->assertSame(4, $strategy->maxAttempts());

            // The first retry waits at most the base delay (25 ms).
            for ($i = 0; $i < 50; ++$i) {
                $state = $strategy->begin('dynamodb-' . $i);
                $delay = $strategy->refresh(
                    $state,
                    RetryMetadataException::wrap(
                        new \RuntimeException('boom'),
                        true
                    )
                );
                $this->assertLessThanOrEqual(0.025, $delay);
            }
        });
    }

    public function testInvalidEnvMaxAttemptsIsRejected(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('max attempts');

        $this->withAwsEnv([
            'AWS_MAX_ATTEMPTS' => 'abc'
        ], function () use ($resolver): void {
            $config = $this->createConfig();
            $resolver->resolveRetrySettings(
                $config,
                $resolver->resolveContext($config)
            );
        });
    }

    public function testStandardDefaultMaxAttemptsIsThree(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->withAwsEnv([], function () use ($resolver): void {
            $config = $this->createConfig();
            $settings = $resolver->resolveRetrySettings(
                $config,
                $resolver->resolveContext($config)
            );

            $this->assertSame('standard', $settings['mode']);
            $this->assertSame(3, $settings['maxAttempts']);
        });
    }

    public function testDynamoDbDefaultMaxAttemptsIsFour(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->withAwsEnv([], function () use ($resolver): void {
            $config = $this->createConfig(signingName: 'dynamodb');
            $settings = $resolver->resolveRetrySettings(
                $config,
                $resolver->resolveContext($config)
            );

            $this->assertSame(4, $settings['maxAttempts']);
        });
    }

    public function testEnvAuthPreferenceBeatsProfileAndIgnoresWhitespace(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\n"
                . "auth_scheme_preference = sigv4\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([
                'AWS_AUTH_SCHEME_PREFERENCE' =>
                    "httpBearerAuth, \tsigv4, httpBearerAuth"
            ], function () use ($resolver, $paths): void {
                $context = $resolver->buildContext(
                    $this->sharedConfigContext('preview', $paths)
                );

                $this->assertSame(
                    ['httpBearerAuth', 'sigv4'],
                    $resolver->resolveAuthSchemePreference($context)
                );
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testProfileAuthPreferenceIsUsedWhenEnvIsAbsent(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\n"
                . "auth_scheme_preference = httpBearerAuth,sigv4\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([], function () use ($resolver, $paths): void {
                $context = $resolver->buildContext(
                    $this->sharedConfigContext('preview', $paths)
                );

                $this->assertSame(
                    ['httpBearerAuth', 'sigv4'],
                    $resolver->resolveAuthSchemePreference($context)
                );
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testInvalidAuthPreferenceIsRejected(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('auth scheme preference');

        $this->withAwsEnv([
            'AWS_AUTH_SCHEME_PREFERENCE' => 'sigv4,,httpBearerAuth'
        ], function () use ($resolver): void {
            $resolver->resolveAuthSchemePreference(
                $resolver->buildContext([])
            );
        });
    }

    public function testExplicitAuthPreferenceBeatsEnvironment(): void
    {
        $this->withAwsEnv([
            'AWS_AUTH_SCHEME_PREFERENCE' => 'httpBearerAuth'
        ], function (): void {
            $config = $this->createConfig(
                authSchemePreference: ['sigv4']
            );

            $this->assertSame(
                ['sigv4'],
                $config->authSchemePreference
            );
        });
    }

    public function testExplicitChecksumConfigBeatsEnvAndProfile(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\n"
                . "request_checksum_calculation = when_supported\n"
                . "response_checksum_validation = when_required\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([
                'AWS_REQUEST_CHECKSUM_CALCULATION' => 'when_supported',
                'AWS_RESPONSE_CHECKSUM_VALIDATION' => 'when_required'
            ], function () use ($resolver, $paths): void {
                $config = $this->createConfig(
                    requestChecksumCalculation: 'WHEN_REQUIRED',
                    responseChecksumValidation:
                        ResponseChecksumValidation::WHEN_SUPPORTED,
                    context: $this->sharedConfigContext('preview', $paths)
                );
                $settings = $resolver->resolveChecksumSettings(
                    $config,
                    $resolver->resolveContext($config)
                );

                $this->assertSame(
                    RequestChecksumCalculation::WHEN_REQUIRED,
                    $settings['requestChecksumCalculation']
                );
                $this->assertSame(
                    ResponseChecksumValidation::WHEN_SUPPORTED,
                    $settings['responseChecksumValidation']
                );
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testEnvChecksumConfigBeatsProfileAndIgnoresCase(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\n"
                . "request_checksum_calculation = when_supported\n"
                . "response_checksum_validation = when_supported\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([
                'AWS_REQUEST_CHECKSUM_CALCULATION' => 'WHEN_REQUIRED',
                'AWS_RESPONSE_CHECKSUM_VALIDATION' => 'WhEn_ReQuIrEd'
            ], function () use ($resolver, $paths): void {
                $config = $this->createConfig(
                    context: $this->sharedConfigContext('preview', $paths)
                );
                $settings = $resolver->resolveChecksumSettings(
                    $config,
                    $resolver->resolveContext($config)
                );

                $this->assertSame(
                    RequestChecksumCalculation::WHEN_REQUIRED,
                    $settings['requestChecksumCalculation']
                );
                $this->assertSame(
                    ResponseChecksumValidation::WHEN_REQUIRED,
                    $settings['responseChecksumValidation']
                );
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testProfileChecksumConfigBeatsDefaults(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\n"
                . "request_checksum_calculation = WHEN_REQUIRED\n"
                . "response_checksum_validation = when_required\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([], function () use ($resolver, $paths): void {
                $config = $this->createConfig(
                    context: $this->sharedConfigContext('preview', $paths)
                );
                $settings = $resolver->resolveChecksumSettings(
                    $config,
                    $resolver->resolveContext($config)
                );

                $this->assertSame(
                    RequestChecksumCalculation::WHEN_REQUIRED,
                    $settings['requestChecksumCalculation']
                );
                $this->assertSame(
                    ResponseChecksumValidation::WHEN_REQUIRED,
                    $settings['responseChecksumValidation']
                );
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testChecksumConfigDefaultsToWhenSupported(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->withAwsEnv([], function () use ($resolver): void {
            $config = $this->createConfig();
            $settings = $resolver->resolveChecksumSettings(
                $config,
                $resolver->resolveContext($config)
            );

            $this->assertSame(
                RequestChecksumCalculation::WHEN_SUPPORTED,
                $settings['requestChecksumCalculation']
            );
            $this->assertSame(
                ResponseChecksumValidation::WHEN_SUPPORTED,
                $settings['responseChecksumValidation']
            );
        });
    }

    public function testCopiesRequestCompressionEnvIntoGenericConfig(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->withAwsEnv([
            'AWS_DISABLE_REQUEST_COMPRESSION' => 'true',
            'AWS_REQUEST_MIN_COMPRESSION_SIZE_BYTES' => '2048'
        ], function () use ($resolver): void {
            $config = $this->createConfig();
            $resolved = $resolver->withRequestCompressionSettings(
                $config,
                $resolver->resolveContext($config)
            );
            $disableKey =
                CompressionPlugin::CONFIG_DISABLE_REQUEST_COMPRESSION;
            $minimumSizeKey =
                CompressionPlugin::CONFIG_REQUEST_MIN_COMPRESSION_SIZE_BYTES;

            $this->assertSame(
                'true',
                $resolved->context[$disableKey]
            );
            $this->assertSame(
                '2048',
                $resolved->context[$minimumSizeKey]
            );
        });
    }

    public function testExplicitRequestCompressionConfigBeatsEnv(): void
    {
        $resolver = new AwsClientConfigResolver();
        $disableKey =
            CompressionPlugin::CONFIG_DISABLE_REQUEST_COMPRESSION;
        $minimumSizeKey =
            CompressionPlugin::CONFIG_REQUEST_MIN_COMPRESSION_SIZE_BYTES;
        $context = [
            $disableKey => false,
            $minimumSizeKey => 4096
        ];

        $this->withAwsEnv([
            'AWS_DISABLE_REQUEST_COMPRESSION' => 'true',
            'AWS_REQUEST_MIN_COMPRESSION_SIZE_BYTES' => '2048'
        ], function () use ($resolver, $context): void {
            $config = $this->createConfig(context: $context);
            $resolved = $resolver->withRequestCompressionSettings(
                $config,
                $resolver->resolveContext($config)
            );

            $this->assertSame($context, \array_intersect_key(
                $resolved->context,
                $context
            ));
        });
    }

    public function testInvalidEnvChecksumConfigIsRejected(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('request checksum calculation');

        $this->withAwsEnv([
            'AWS_REQUEST_CHECKSUM_CALCULATION' => 'sometimes'
        ], function () use ($resolver): void {
            $config = $this->createConfig();
            $resolver->resolveChecksumSettings(
                $config,
                $resolver->resolveContext($config)
            );
        });
    }

    public function testResolveRegionPrefersAwsRegionEnvThenProfile(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\nregion = eu-west-1\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $this->withAwsEnv([
                'AWS_REGION' => 'us-west-2'
            ], function () use ($resolver, $paths): void {
                $context = $resolver->buildContext(
                    $this->sharedConfigContext('preview', $paths)
                );

                $this->assertSame('us-west-2', $resolver->resolveRegion($context));
            });

            $this->withAwsEnv([], function () use ($resolver, $paths): void {
                $context = $resolver->buildContext(
                    $this->sharedConfigContext('preview', $paths)
                );

                $this->assertSame('eu-west-1', $resolver->resolveRegion($context));
            });
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    public function testResolveRegionFallsBackToAwsDefaultRegionEnv(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->withAwsEnv([
            'AWS_DEFAULT_REGION' => 'us-east-2'
        ], function () use ($resolver): void {
            $context = $resolver->buildContext([]);

            $this->assertSame('us-east-2', $resolver->resolveRegion($context));
        });
    }

    public function testResolveRegionFailsWhenMissingEverywhere(): void
    {
        $resolver = new AwsClientConfigResolver();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('AWS region is required');

        $this->withAwsEnv([], function () use ($resolver): void {
            $resolver->resolveRegion($resolver->buildContext([]));
        });
    }

    public function testResolveCredentialsBuildsAwsCredentialChain(): void
    {
        $paths = $this->createSharedConfigFiles(
            profileName: 'preview',
            configContents: "[profile preview]\nregion = us-east-1\n"
        );
        $resolver = new AwsClientConfigResolver();

        try {
            $context = $resolver->buildContext(
                $this->sharedConfigContext('preview', $paths)
            );
            $credentials = $resolver->resolveCredentials($context);

            $this->assertInstanceOf(AwsCredentialChain::class, $credentials);
        } finally {
            $this->deleteSharedConfigFiles($paths);
        }
    }

    private function createConfig(
        ?string $region = 'us-east-1',
        IdentityResolverInterface|AwsCredentialsIdentityInterface|null
            $credentials = null,
        ?string $retryMode = null,
        ?int $maxAttempts = null,
        RequestChecksumCalculation|string|null
            $requestChecksumCalculation = null,
        ResponseChecksumValidation|string|null
            $responseChecksumValidation = null,
        array $context = [],
        string $signingName = 'test',
        ?array $authSchemePreference = null
    ): ResolverTestAwsClientConfig {
        return new ResolverTestAwsClientConfig(
            region: $region,
            credentials: $credentials ?? AnonymousIdentityResolver::instance(),
            retryMode: $retryMode,
            maxAttempts: $maxAttempts,
            requestChecksumCalculation: $requestChecksumCalculation,
            responseChecksumValidation: $responseChecksumValidation,
            context: $context,
            resolvedSigningName: $signingName,
            authSchemePreference: $authSchemePreference
        );
    }

    /**
     * @param array{dir: string, credentials: string, config: string} $paths
     * @return array<string, string>
     */
    private function sharedConfigContext(
        string $profileName,
        array $paths
    ): array {
        return [
            AwsCredentialChainContext::PROFILE_NAME_OVERRIDE => $profileName,
            AwsCredentialChainContext::CREDENTIALS_FILE_PATH =>
                $paths['credentials'],
            AwsCredentialChainContext::CONFIG_FILE_PATH => $paths['config']
        ];
    }

    /**
     * @param array<string, ?string> $overrides
     *
     * @return void
     */
    private function withAwsEnv(array $overrides, callable $callback): void
    {
        $names = [
            'AWS_PROFILE',
            'AWS_SHARED_CREDENTIALS_FILE',
            'AWS_CONFIG_FILE',
            'AWS_RETRY_MODE',
            'AWS_MAX_ATTEMPTS',
            'AWS_REGION',
            'AWS_DEFAULT_REGION',
            'AWS_AUTH_SCHEME_PREFERENCE',
            'AWS_REQUEST_CHECKSUM_CALCULATION',
            'AWS_RESPONSE_CHECKSUM_VALIDATION',
            'AWS_DISABLE_REQUEST_COMPRESSION',
            'AWS_REQUEST_MIN_COMPRESSION_SIZE_BYTES',
            'HOME',
            'HOMEDRIVE',
            'HOMEPATH'
        ];
        $values = array_fill_keys($names, null);
        foreach ($overrides as $name => $value) {
            $values[$name] = $value;
        }

        $previous = [];
        foreach ($values as $name => $value) {
            $previous[$name] = getenv($name);
            if ($value === null) {
                putenv($name);
                unset($_ENV[$name]);
                continue;
            }

            putenv($name . '=' . $value);
            $_ENV[$name] = $value;
        }

        try {
            $callback();
        } finally {
            foreach ($previous as $name => $value) {
                if ($value === false) {
                    putenv($name);
                    unset($_ENV[$name]);
                    continue;
                }

                putenv($name . '=' . $value);
                $_ENV[$name] = (string) $value;
            }
        }
    }

    /**
     * @return array{dir: string, credentials: string, config: string}
     */
    private function createSharedConfigFiles(
        string $profileName,
        string $configContents
    ): array {
        $dir = sys_get_temp_dir() . '/aws-resolver-' . uniqid('', true);
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

final class ResolverTestAwsClientConfig extends AbstractAwsClientConfig
{
    public function __construct(
        ?string $region = null,
        \Smithy\Auth\IdentityResolverInterface
            |\Smithy\Auth\Aws\AwsCredentialsIdentityInterface|null
            $credentials = null,
        ?IdentityResolverInterface $tokenProvider = null,
        ?string $signingRegion = null,
        bool $useDualStack = false,
        bool $useFips = false,
        ?string $userAgentAppId = null,
        ?string $retryMode = null,
        ?int $maxAttempts = null,
        InterceptorChain $interceptors = new InterceptorChain(),
        array $supportedAuthSchemes = [],
        ?AuthSchemeResolverInterface $authSchemeResolver = null,
        ?RetryStrategyInterface $retryStrategy = null,
        string $retryScope = '',
        RequestChecksumCalculation|string|null
            $requestChecksumCalculation = null,
        ResponseChecksumValidation|string|null
            $responseChecksumValidation = null,
        array $context = [],
        ?HttpClientInterface $httpClient = null,
        private readonly string $resolvedSigningName = 'test',
        ?array $authSchemePreference = null,
        ?PluginState $pluginState = null,
        ?TransportInterface $transport = null,
        ?ProtocolInterface $protocol = null,
        ?ProtocolResolverInterface $protocolResolver = null,
        ?string $protocolId = null,
        ?ServiceInterface $service = null,
        ?bool $protocolIsExplicit = null
    ) {
        parent::__construct(
            region: $region,
            credentials: $credentials,
            tokenProvider: $tokenProvider,
            signingRegion: $signingRegion,
            useDualStack: $useDualStack,
            useFips: $useFips,
            userAgentAppId: $userAgentAppId,
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            retryStrategy: $retryStrategy,
            retryScope: $retryScope,
            retryMode: $retryMode,
            maxAttempts: $maxAttempts,
            requestChecksumCalculation: $requestChecksumCalculation,
            responseChecksumValidation: $responseChecksumValidation,
            context: $context,
            authSchemePreference: $authSchemePreference,
            httpClient: $httpClient,
            pluginState: $pluginState,
            transport: $transport,
            protocol: $protocol,
            protocolResolver: $protocolResolver,
            protocolId: $protocolId,
            service: $service,
            protocolIsExplicit: $protocolIsExplicit
        );
    }

    protected function createProtocol(): ProtocolInterface
    {
        return new RestJsonProtocol();
    }

    protected function getHttpClient(): HttpClientInterface {
        return new MockHttpClient();
    }

    protected function getEndpointResolver(): EndpointResolverInterface
    {
        return new StaticEndpointResolver(new Endpoint('https://a.test'));
    }

    protected function getSigningName(): string
    {
        return $this->resolvedSigningName;
    }
}
