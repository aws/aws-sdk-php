<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AwsDynamicClientConfig;
use Aws\Core\Credentials\AwsCredentialChain;
use Aws\Tests\Core\Integ\Retry\Utils\{
    TestInput,
    TestOperation
};
use PHPUnit\Framework\TestCase;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\Aws\SigV4AuthScheme;
use Smithy\Auth\Aws\StaticCredentialProvider;
use Smithy\Auth\BearerToken;
use Smithy\Auth\CachingIdentityResolver;
use Smithy\Auth\HttpBearerAuthScheme;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\StaticTokenProvider;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Protocol\ProtocolResolver;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Http\Client\CurlClient;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Protocol\Aws\RestJsonProtocol;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class AwsDynamicClientConfigTest extends TestCase
{
    public function testExposesResolvedMachinery(): void
    {
        $protocol = new RestJsonProtocol();
        $endpointResolver = $this->endpointResolver();
        $config = $this->createConfig(
            protocol: $protocol,
            endpointResolver: $endpointResolver
        );

        $this->assertSame('us-east-1', $config->region);
        $this->assertSame('example', $config->signingName);
        $this->assertSame($protocol, $config->protocol);
        $this->assertSame($endpointResolver, $config->endpointResolver);
    }

    public function testEmptySigningNameIsRejected(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('signing name');

        $this->createConfig(signingName: '');
    }

    public function testEnableSigV4RegistersSchemeForSigningNameAndRegion(): void
    {
        $config = $this->createConfig(signingRegion: 'us-west-2');

        $schemes = $this->sigV4Schemes($config);
        $this->assertCount(1, $schemes);
        $this->assertSame(
            [
                'signingName' => 'example',
                'signingRegion' => 'us-west-2',
            ],
            $schemes[0]->getSignerProperties($config->context)
        );
    }

    public function testEnableSigV4SignsForClientRegionByDefault(): void
    {
        $config = $this->createConfig();

        $schemes = $this->sigV4Schemes($config);
        $this->assertCount(1, $schemes);
        $this->assertSame(
            'us-east-1',
            $schemes[0]->getSignerProperties($config->context)['signingRegion']
        );
    }

    public function testEnableSigV4KeepsSuppliedSigV4Scheme(): void
    {
        $supplied = new SigV4AuthScheme('custom', 'eu-west-1');
        $config = $this->createConfig(supportedAuthSchemes: [$supplied]);

        $this->assertSame([$supplied], $this->sigV4Schemes($config));
    }

    public function testSigV4StaysOffWhenDisabled(): void
    {
        $config = $this->createConfig(enableSigV4: false);

        $this->assertSame([], $this->sigV4Schemes($config));
    }

    public function testRetryScopeDefaultsToSigningName(): void
    {
        $this->assertSame('example', $this->createConfig()->retryScope);
    }

    public function testExplicitRetryScopeIsKept(): void
    {
        $config = $this->createConfig(retryScope: 'shared');

        $this->assertSame('shared', $config->retryScope);
    }

    public function testDefaultHttpClientIsCurlClient(): void
    {
        $config = new AwsDynamicClientConfig(
            resolvedProtocol: new RestJsonProtocol(),
            protocolResolver: new ProtocolResolver(),
            protocolId: null,
            resolvedEndpointResolver: $this->endpointResolver(),
            resolvedSigningName: 'example',
            enableSigV4: true,
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance()
        );

        $this->assertInstanceOf(HttpClientTransport::class, $config->transport);
        $this->assertInstanceOf(
            CurlClient::class,
            $config->transport->httpClient
        );
    }

    public function testCopyKeepsMachineryAndSigV4Scheme(): void
    {
        $protocol = new RestJsonProtocol();
        $endpointResolver = $this->endpointResolver();
        $config = $this->createConfig(
            protocol: $protocol,
            endpointResolver: $endpointResolver
        );

        $copy = $config->withRegion('eu-central-1');

        $this->assertNotSame($config, $copy);
        $this->assertInstanceOf(AwsDynamicClientConfig::class, $copy);
        $this->assertSame('eu-central-1', $copy->region);
        $this->assertSame('us-east-1', $config->region);
        $this->assertSame('example', $copy->signingName);
        $this->assertSame('example', $copy->retryScope);
        $this->assertSame($protocol, $copy->protocol);
        $this->assertSame($endpointResolver, $copy->endpointResolver);
        $this->assertCount(1, $this->sigV4Schemes($copy));
    }

    public function testCopyKeepsInjectedHttpClient(): void
    {
        $httpClient = new MockHttpClient();
        $config = $this->createConfig(httpClient: $httpClient);

        $copy = $config->withUseFips(true);

        $this->assertInstanceOf(HttpClientTransport::class, $copy->transport);
        $this->assertSame($httpClient, $copy->transport->httpClient);
        $this->assertTrue($copy->useFips);
    }

    public function testConstructorAppliesAwsDefaults(): void
    {
        $config = $this->createConfig();

        $this->assertInstanceOf(
            IdentityResolverInterface::class,
            $config->credentials
        );
        $this->assertNull($config->signingRegion);
        $this->assertFalse($config->useDualStack);
        $this->assertFalse($config->useFips);
        $this->assertNull($config->userAgentAppId);
        $this->assertNull($config->retryMode);
        $this->assertNull($config->maxAttempts);
        $this->assertNull($config->requestChecksumCalculation);
        $this->assertNull($config->responseChecksumValidation);
    }

    public function testPublishesGenericEndpointParameters(): void
    {
        $config = $this->configWith([
            'region' => 'us-west-2',
            'useDualStack' => true,
            'useFips' => true,
        ]);

        $this->assertSame(
            [
                'Region' => 'us-west-2',
                'UseFIPS' => true,
                'UseDualStack' => true,
            ],
            $config->context[
                EndpointResolverInterface::CONTEXT_PARAMETERS
            ]
        );

        $copy = $config->withRegion('eu-west-1')->withUseFips(false);
        $this->assertSame(
            [
                'Region' => 'eu-west-1',
                'UseFIPS' => false,
                'UseDualStack' => true,
            ],
            $copy->context[
                EndpointResolverInterface::CONTEXT_PARAMETERS
            ]
        );
    }

    public function testEndpointWithoutResolverBuildsStaticResolver(): void
    {
        $config = $this->configWith([
            'resolvedEndpointResolver' => null,
            'endpoint' => 'https://endpoint.test',
        ]);

        $this->assertInstanceOf(
            StaticEndpointResolver::class,
            $config->endpointResolver
        );
        $this->assertSame(
            'https://endpoint.test',
            $config->endpointResolver->resolveEndpoint(
                TestOperation::instance(),
                TestInput::create(),
                $config
            )->url
        );
        $this->assertArrayNotHasKey(
            'Endpoint',
            $config->context[EndpointResolverInterface::CONTEXT_PARAMETERS]
        );
    }

    public function testCopyKeepsEndpointResolverBuiltFromEndpoint(): void
    {
        $config = $this->configWith([
            'resolvedEndpointResolver' => null,
            'endpoint' => 'https://endpoint.test',
        ]);

        $copy = $config->withRegion('eu-west-1');

        $this->assertSame($config->endpointResolver, $copy->endpointResolver);
    }

    public function testRejectsEndpointWithEndpointResolver(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Provide either an endpoint resolver or a static endpoint, '
            . 'not both.'
        );

        $this->configWith(['endpoint' => 'https://endpoint.test']);
    }

    public function testRequiresEndpointOrEndpointResolver(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Client config requires an endpoint resolver or endpoint.'
        );

        $this->configWith(['resolvedEndpointResolver' => null]);
    }

    public function testConstructorAcceptsProviderCredentials(): void
    {
        $provider = $this->createStub(IdentityResolverInterface::class);
        $config = $this->configWith(['credentials' => $provider]);

        $this->assertInstanceOf(
            CachingIdentityResolver::class,
            $config->credentials
        );
        $this->assertSame($provider, $config->credentials->getInner());
    }

    public function testConstructorWrapsRawCredentialsInStaticProvider(): void
    {
        $raw = new AwsCredentials('AKIA-test', 'secret');
        $config = $this->configWith(['credentials' => $raw]);

        $this->assertInstanceOf(
            CachingIdentityResolver::class,
            $config->credentials
        );
        $this->assertInstanceOf(
            StaticCredentialProvider::class,
            $config->credentials->getInner()
        );
        // The wrapped provider returns the same AwsCredentials.
        $this->assertSame(
            $raw,
            $config->credentials->resolveIdentity()->unwrap()
        );
    }

    public function testConstructorKeepsIdentityChainCredentials(): void
    {
        $chain = new AwsCredentialChain();
        $config = $this->configWith(['credentials' => $chain]);

        $this->assertSame($chain, $config->credentials);
    }

    public function testConstructorBuildsDefaultCredentialsChainWhenNull(): void
    {
        $config = $this->configWith(['credentials' => null]);

        $this->assertInstanceOf(
            AwsCredentialChain::class,
            $config->credentials
        );
    }

    public function testTokenProviderRegistersBearerAuthScheme(): void
    {
        $provider = new StaticTokenProvider('token');
        $config = $this->configWith(['tokenProvider' => $provider]);

        $this->assertInstanceOf(
            CachingIdentityResolver::class,
            $config->tokenProvider
        );
        $this->assertSame(
            $provider,
            $config->tokenProvider->getInner()
        );
        $identity = $this->bearerScheme($config)
            ->getIdentityResolver($config->getIdentityResolvers())
            ->resolveIdentity()->unwrap();

        $this->assertInstanceOf(BearerToken::class, $identity);
        $this->assertSame('token', $identity->getToken());
    }

    public function testConfigCopyPreservesTokenProvider(): void
    {
        $config = $this->configWith([
            'tokenProvider' => new StaticTokenProvider('token'),
        ]);

        $copy = $config->withRegion('us-west-2');
        $identity = $this->bearerScheme($copy)
            ->getIdentityResolver($copy->getIdentityResolvers())
            ->resolveIdentity()->unwrap();

        $this->assertSame($config->tokenProvider, $copy->tokenProvider);
        $this->assertInstanceOf(BearerToken::class, $identity);
        $this->assertSame('token', $identity->getToken());
    }

    public function testConstructorResolvesRegionFromEnvWhenNull(): void
    {
        $this->withEnv('AWS_REGION', 'us-west-2', function (): void {
            $config = $this->configWith(['region' => null]);

            $this->assertSame('us-west-2', $config->region);
        });
    }

    public function testDefaultCredentialsHelperBuildsAwsCredentialChain(): void
    {
        $chain = AwsDynamicClientConfig::defaultCredentials();

        $this->assertInstanceOf(AwsCredentialChain::class, $chain);
    }

    public function testEffectiveSigningRegionFallsBackToRegion(): void
    {
        $config = $this->createConfig();
        $this->assertSame('us-east-1', $config->getEffectiveSigningRegion());

        $override = $config->withSigningRegion('us-west-2');
        $this->assertSame(
            'us-west-2',
            $override->getEffectiveSigningRegion()
        );
    }

    public function testWithCredentialsAcceptsProvider(): void
    {
        $orig = $this->createConfig();
        $stubProvider = $this->createStub(IdentityResolverInterface::class);
        $new = $orig->withCredentials($stubProvider);

        $this->assertInstanceOf(
            CachingIdentityResolver::class,
            $new->credentials
        );
        $this->assertSame($stubProvider, $new->credentials->getInner());
        $this->assertNotSame($orig->credentials, $new->credentials);
    }

    public function testWithCredentialsAcceptsRawCredentials(): void
    {
        $orig = $this->createConfig();
        $raw = new AwsCredentials('AKIA-new', 'newsecret');
        $new = $orig->withCredentials($raw);

        $this->assertInstanceOf(
            CachingIdentityResolver::class,
            $new->credentials
        );
        $this->assertInstanceOf(
            StaticCredentialProvider::class,
            $new->credentials->getInner()
        );
        $this->assertSame(
            $raw,
            $new->credentials->resolveIdentity()->unwrap()
        );
    }

    public function testWithSigningRegionSetsAndResetsToNull(): void
    {
        $orig = $this->createConfig();

        $set = $orig->withSigningRegion('us-west-2');
        $this->assertSame('us-west-2', $set->signingRegion);

        // Passing null resets the value through the array_key_exists
        // path in copyWith().
        $reset = $set->withSigningRegion(null);
        $this->assertNull($reset->signingRegion);
    }

    public function testWithUseDualStackToggle(): void
    {
        $orig = $this->createConfig();
        $this->assertFalse($orig->useDualStack);

        $on = $orig->withUseDualStack(true);
        $this->assertTrue($on->useDualStack);
        $this->assertFalse($orig->useDualStack);

        $off = $on->withUseDualStack(false);
        $this->assertFalse($off->useDualStack);
    }

    public function testWithUseFipsToggle(): void
    {
        $orig = $this->createConfig();
        $on = $orig->withUseFips(true);

        $this->assertTrue($on->useFips);
        $this->assertFalse($orig->useFips);
    }

    public function testWithUserAgentAppIdSetsAndResetsToNull(): void
    {
        $orig = $this->createConfig();

        $set = $orig->withUserAgentAppId('my-app');
        $this->assertSame('my-app', $set->userAgentAppId);

        $reset = $set->withUserAgentAppId(null);
        $this->assertNull($reset->userAgentAppId);
    }

    public function testWithRetryModeSetsAndResetsToNull(): void
    {
        $orig = $this->createConfig();

        $set = $orig->withRetryMode('standard');
        $this->assertSame('standard', $set->retryMode);

        $reset = $set->withRetryMode(null);
        $this->assertNull($reset->retryMode);
    }

    public function testWithMaxAttemptsSetsAndResetsToNull(): void
    {
        $orig = $this->createConfig();

        $set = $orig->withMaxAttempts(5);
        $this->assertSame(5, $set->maxAttempts);

        $reset = $set->withMaxAttempts(null);
        $this->assertNull($reset->maxAttempts);
    }

    public function testWithChecksumSettingsNormalizesAndResets(): void
    {
        $original = $this->createConfig();

        $request = $original->withRequestChecksumCalculation(
            'WHEN_REQUIRED'
        );
        $this->assertSame(
            RequestChecksumCalculation::WHEN_REQUIRED,
            $request->requestChecksumCalculation
        );
        $this->assertNull($original->requestChecksumCalculation);

        $response = $request->withResponseChecksumValidation(
            ResponseChecksumValidation::WHEN_REQUIRED
        );
        $this->assertSame(
            ResponseChecksumValidation::WHEN_REQUIRED,
            $response->responseChecksumValidation
        );

        $reset = $response
            ->withRequestChecksumCalculation(null)
            ->withResponseChecksumValidation(null);
        $this->assertNull($reset->requestChecksumCalculation);
        $this->assertNull($reset->responseChecksumValidation);
    }

    public function testInvalidExplicitChecksumSettingIsRejected(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('request checksum calculation');

        $this->createConfig()->withRequestChecksumCalculation('sometimes');
    }

    public function testInheritedWithXxxPreservesAwsFields(): void
    {
        $orig = $this->createConfig()
            ->withRegion('eu-west-1')
            ->withUseFips(true)
            ->withRetryMode('standard')
            ->withMaxAttempts(4)
            ->withRequestChecksumCalculation('when_required')
            ->withResponseChecksumValidation('when_required')
            ->withUserAgentAppId('my-app');

        // Every inherited base-class withXxx() preserves every
        // AWS-specific field through copyWith().
        $modified = $orig->withRetryScope('scope')
            ->withInterceptor(new class extends AbstractInterceptor {})
            ->withContext('trace', 'abc');

        $this->assertSame('eu-west-1', $modified->region);
        $this->assertTrue($modified->useFips);
        $this->assertSame('standard', $modified->retryMode);
        $this->assertSame(4, $modified->maxAttempts);
        $this->assertSame(
            RequestChecksumCalculation::WHEN_REQUIRED,
            $modified->requestChecksumCalculation
        );
        $this->assertSame(
            ResponseChecksumValidation::WHEN_REQUIRED,
            $modified->responseChecksumValidation
        );
        $this->assertSame('my-app', $modified->userAgentAppId);
        $this->assertSame('scope', $modified->retryScope);
        $this->assertTrue(
            $modified->interceptorChain->contains(AbstractInterceptor::class)
        );
        $this->assertSame('abc', $modified->context['trace']);
    }

    public function testCopyKeepsExplicitTransport(): void
    {
        $transport = new HttpClientTransport(new MockHttpClient());
        $config = $this->configWith([
            'httpClient' => null,
            'transport' => $transport,
        ]);

        $copy = $config->withRegion('us-west-2');

        $this->assertSame($transport, $copy->transport);
    }

    /**
     * @param list<\Smithy\Auth\AuthSchemeInterface> $supportedAuthSchemes
     */
    private function createConfig(
        ?ProtocolInterface $protocol = null,
        ?EndpointResolverInterface $endpointResolver = null,
        string $signingName = 'example',
        bool $enableSigV4 = true,
        ?string $signingRegion = null,
        array $supportedAuthSchemes = [],
        string $retryScope = '',
        ?MockHttpClient $httpClient = null
    ): AwsDynamicClientConfig
    {
        return new AwsDynamicClientConfig(
            resolvedProtocol: $protocol ?? new RestJsonProtocol(),
            protocolResolver: new ProtocolResolver(),
            protocolId: null,
            resolvedEndpointResolver: $endpointResolver
                ?? $this->endpointResolver(),
            resolvedSigningName: $signingName,
            enableSigV4: $enableSigV4,
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            signingRegion: $signingRegion,
            supportedAuthSchemes: $supportedAuthSchemes,
            retryScope: $retryScope,
            httpClient: $httpClient ?? new MockHttpClient()
        );
    }

    /**
     * Build a config from named constructor arguments over test defaults.
     *
     * @param array<string, mixed> $arguments
     */
    private function configWith(array $arguments): AwsDynamicClientConfig
    {
        return new AwsDynamicClientConfig(...[
            'resolvedProtocol' => new RestJsonProtocol(),
            'protocolResolver' => new ProtocolResolver(),
            'protocolId' => null,
            'resolvedEndpointResolver' => $this->endpointResolver(),
            'resolvedSigningName' => 'example',
            'enableSigV4' => true,
            'region' => 'us-east-1',
            'credentials' => AnonymousIdentityResolver::instance(),
            'httpClient' => new MockHttpClient(),
            ...$arguments,
        ]);
    }

    private function withEnv(
        string $name,
        ?string $value,
        callable $callback
    ): void
    {
        $originalEnv = \getenv($name);
        $originalServer = $_SERVER[$name] ?? null;
        $hadServer = \array_key_exists($name, $_SERVER);
        $originalArrayEnv = $_ENV[$name] ?? null;
        $hadArrayEnv = \array_key_exists($name, $_ENV);

        try {
            if ($value === null) {
                \putenv($name);
                unset($_ENV[$name], $_SERVER[$name]);
            } else {
                \putenv($name . '=' . $value);
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }

            $callback();
        } finally {
            if ($originalEnv === false) {
                \putenv($name);
            } else {
                \putenv($name . '=' . $originalEnv);
            }

            if ($hadServer) {
                $_SERVER[$name] = $originalServer;
            } else {
                unset($_SERVER[$name]);
            }

            if ($hadArrayEnv) {
                $_ENV[$name] = $originalArrayEnv;
            } else {
                unset($_ENV[$name]);
            }
        }
    }

    private function bearerScheme(
        AwsDynamicClientConfig $config
    ): HttpBearerAuthScheme
    {
        foreach ($config->supportedAuthSchemes as $scheme) {
            if ($scheme instanceof HttpBearerAuthScheme) {
                return $scheme;
            }
        }

        $this->fail('Expected HTTP bearer auth scheme.');
    }

    private function endpointResolver(): StaticEndpointResolver
    {
        return new StaticEndpointResolver(
            new Endpoint('https://example.test')
        );
    }

    /**
     * @return list<SigV4AuthScheme>
     */
    private function sigV4Schemes(AwsDynamicClientConfig $config): array
    {
        return \array_values(\array_filter(
            $config->supportedAuthSchemes,
            static fn ($scheme): bool => $scheme instanceof SigV4AuthScheme
        ));
    }
}
