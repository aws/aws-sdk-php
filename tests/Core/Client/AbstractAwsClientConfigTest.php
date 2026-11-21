<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Credentials\AwsCredentialChain;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\Aws\StaticCredentialProvider;
use Smithy\Protocol\Aws\RestJsonProtocol;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Auth\BearerToken;
use Smithy\Auth\CachingIdentityResolver;
use Smithy\Auth\HttpBearerAuthScheme;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\StaticTokenProvider;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Tests\Utils\Http\MockHttpClient;

/**
 * Copy-on-write semantics for {@see AbstractAwsClientConfig::withXxx()} plus
 * the credentials-union normalization at construction.
 *
 * The base class is abstract; tests exercise it through
 * {@see TestAbstractAwsClientConfig}, a minimal concrete subclass that supplies
 * fixed machinery via the template methods.
 */
final class AbstractAwsClientConfigTest extends TestCase
{
    private function baseConfig(): TestAbstractAwsClientConfig
    {
        return new TestAbstractAwsClientConfig(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
        );
    }

    public function testConstructorPopulatesRequiredAwsFields(): void
    {
        $config = $this->baseConfig();

        $this->assertSame('us-east-1', $config->region);
        $this->assertSame('test', $config->signingName);
        $this->assertInstanceOf(IdentityResolverInterface::class, $config->credentials);
    }

    public function testConstructorAppliesAwsDefaults(): void
    {
        $config = $this->baseConfig();

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
        $config = new TestAbstractAwsClientConfig(
            region: 'us-west-2',
            credentials: AnonymousIdentityResolver::instance(),
            useDualStack: true,
            useFips: true,
        );

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

    public function testConstructorAcceptsProviderCredentials(): void
    {
        $provider = $this->createStub(IdentityResolverInterface::class);
        $config = new TestAbstractAwsClientConfig(
            region: 'us-east-1',
            credentials: $provider,
        );

        $this->assertInstanceOf(CachingIdentityResolver::class, $config->credentials);
        $this->assertSame($provider, $config->credentials->getInner());
    }

    public function testConstructorWrapsRawCredentialsInStaticProvider(): void
    {
        $raw = new AwsCredentials('AKIA-test', 'secret');
        $config = new TestAbstractAwsClientConfig(
            region: 'us-east-1',
            credentials: $raw,
        );

        $this->assertInstanceOf(CachingIdentityResolver::class, $config->credentials);
        $this->assertInstanceOf(StaticCredentialProvider::class, $config->credentials->getInner());
        // The wrapped provider returns the same AwsCredentials.
        $this->assertSame($raw, $config->credentials->resolveIdentity()->unwrap());
    }

    public function testConstructorDoesNotWrapIdentityChainCredentials(): void
    {
        $chain = new AwsCredentialChain();
        $config = new TestAbstractAwsClientConfig(
            region: 'us-east-1',
            credentials: $chain,
        );

        $this->assertSame($chain, $config->credentials);
    }

    public function testConstructorBuildsDefaultCredentialsChainWhenNull(): void
    {
        $config = new TestAbstractAwsClientConfig(region: 'us-east-1');

        $this->assertInstanceOf(AwsCredentialChain::class, $config->credentials);
    }

    public function testTokenProviderRegistersBearerAuthScheme(): void
    {
        $provider = new StaticTokenProvider('token');
        $config = new TestAbstractAwsClientConfig(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            tokenProvider: $provider
        );

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
        $config = new TestAbstractAwsClientConfig(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            tokenProvider: new StaticTokenProvider('token')
        );

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
            $config = new TestAbstractAwsClientConfig(
                region: null,
                credentials: AnonymousIdentityResolver::instance(),
            );

            $this->assertSame('us-west-2', $config->region);
        });
    }

    public function testDefaultCredentialsHelperBuildsAwsCredentialChain(): void
    {
        $chain = TestAbstractAwsClientConfig::defaultCredentials();

        $this->assertInstanceOf(AwsCredentialChain::class, $chain);
    }

    public function testEffectiveSigningRegionFallsBackToRegion(): void
    {
        $config = $this->baseConfig();
        $this->assertSame('us-east-1', $config->getEffectiveSigningRegion());

        $override = $config->withSigningRegion('us-west-2');
        $this->assertSame('us-west-2', $override->getEffectiveSigningRegion());
    }

    public function testWithRegionReplacesOnlyRegion(): void
    {
        $orig = $this->baseConfig();
        $new = $orig->withRegion('eu-central-1');

        $this->assertSame('eu-central-1', $new->region);
        $this->assertSame('us-east-1', $orig->region);
        $this->assertSame($orig->credentials, $new->credentials);
        $this->assertSame($orig->signingName, $new->signingName);
    }

    public function testWithCredentialsAcceptsProvider(): void
    {
        $orig = $this->baseConfig();
        $stubProvider = $this->createStub(IdentityResolverInterface::class);
        $new = $orig->withCredentials($stubProvider);

        $this->assertInstanceOf(CachingIdentityResolver::class, $new->credentials);
        $this->assertSame($stubProvider, $new->credentials->getInner());
        $this->assertNotSame($orig->credentials, $new->credentials);
    }

    public function testWithCredentialsAcceptsRawCredentials(): void
    {
        $orig = $this->baseConfig();
        $raw = new AwsCredentials('AKIA-new', 'newsecret');
        $new = $orig->withCredentials($raw);

        $this->assertInstanceOf(CachingIdentityResolver::class, $new->credentials);
        $this->assertInstanceOf(StaticCredentialProvider::class, $new->credentials->getInner());
        $this->assertSame($raw, $new->credentials->resolveIdentity()->unwrap());
    }

    public function testWithSigningRegionSetsAndResetsToNull(): void
    {
        $orig = $this->baseConfig();

        $set = $orig->withSigningRegion('us-west-2');
        $this->assertSame('us-west-2', $set->signingRegion);

        // Passing null must reset — array_key_exists path in copyWith().
        $reset = $set->withSigningRegion(null);
        $this->assertNull($reset->signingRegion);
    }

    public function testWithUseDualStackToggle(): void
    {
        $orig = $this->baseConfig();
        $this->assertFalse($orig->useDualStack);

        $on = $orig->withUseDualStack(true);
        $this->assertTrue($on->useDualStack);
        $this->assertFalse($orig->useDualStack);

        $off = $on->withUseDualStack(false);
        $this->assertFalse($off->useDualStack);
    }

    public function testWithUseFipsToggle(): void
    {
        $orig = $this->baseConfig();
        $on = $orig->withUseFips(true);

        $this->assertTrue($on->useFips);
        $this->assertFalse($orig->useFips);
    }

    public function testWithUserAgentAppIdSetsAndResetsToNull(): void
    {
        $orig = $this->baseConfig();

        $set = $orig->withUserAgentAppId('my-app');
        $this->assertSame('my-app', $set->userAgentAppId);

        $reset = $set->withUserAgentAppId(null);
        $this->assertNull($reset->userAgentAppId);
    }

    public function testWithRetryModeSetsAndResetsToNull(): void
    {
        $orig = $this->baseConfig();

        $set = $orig->withRetryMode('standard');
        $this->assertSame('standard', $set->retryMode);

        $reset = $set->withRetryMode(null);
        $this->assertNull($reset->retryMode);
    }

    public function testWithMaxAttemptsSetsAndResetsToNull(): void
    {
        $orig = $this->baseConfig();

        $set = $orig->withMaxAttempts(5);
        $this->assertSame(5, $set->maxAttempts);

        $reset = $set->withMaxAttempts(null);
        $this->assertNull($reset->maxAttempts);
    }

    public function testWithChecksumSettingsNormalizesAndResets(): void
    {
        $original = $this->baseConfig();

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

        $this->baseConfig()->withRequestChecksumCalculation('sometimes');
    }

    public function testInheritedWithXxxPreservesAwsFields(): void
    {
        $orig = $this->baseConfig()
            ->withRegion('eu-west-1')
            ->withUseFips(true)
            ->withRetryMode('standard')
            ->withMaxAttempts(4)
            ->withRequestChecksumCalculation('when_required')
            ->withResponseChecksumValidation('when_required')
            ->withUserAgentAppId('my-app');

        // Every inherited base-class withXxx() must preserve every
        // AWS-specific field through `copyWith()` -> `new static(...)`.
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

    public function testOrdinaryCopyPreservesInjectedHttpClient(): void
    {
        $httpClient = new MockHttpClient();
        $config = new TestAbstractAwsClientConfig(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            httpClient: $httpClient
        );

        $copy = $config->withRegion('us-west-2');

        $this->assertInstanceOf(
            HttpClientTransport::class,
            $copy->transport
        );
        $this->assertSame($httpClient, $copy->transport->httpClient);
    }

    public function testOrdinaryCopyPreservesExplicitTransport(): void
    {
        $transport = new HttpClientTransport(new MockHttpClient());
        $config = new TestAbstractAwsClientConfig(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            transport: $transport
        );

        $copy = $config->withRegion('us-west-2');

        $this->assertSame($transport, $copy->transport);
    }

    public function testAbstractBaseCannotBeInstantiated(): void
    {
        $this->expectException(\Error::class);
        $this->expectExceptionMessage('Cannot instantiate abstract class');

        // @phpstan-ignore-next-line
        new AbstractAwsClientConfig(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
        );
    }

    /**
     * @return void
     */
    private function withEnv(
        string $name,
        ?string $value,
        callable $callback
    ): void {
        $originalEnv = getenv($name);
        $originalServer = $_SERVER[$name] ?? null;
        $hadServer = array_key_exists($name, $_SERVER);
        $originalArrayEnv = $_ENV[$name] ?? null;
        $hadArrayEnv = array_key_exists($name, $_ENV);

        try {
            if ($value === null) {
                putenv($name);
                unset($_ENV[$name], $_SERVER[$name]);
            } else {
                putenv($name . '=' . $value);
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }

            $callback();
        } finally {
            if ($originalEnv === false) {
                putenv($name);
            } else {
                putenv($name . '=' . $originalEnv);
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
        AbstractAwsClientConfig $config
    ): HttpBearerAuthScheme {
        foreach ($config->supportedAuthSchemes as $scheme) {
            if ($scheme instanceof HttpBearerAuthScheme) {
                return $scheme;
            }
        }

        $this->fail('Expected HTTP bearer auth scheme.');
    }
}

/**
 * Minimal concrete subclass of {@see AbstractAwsClientConfig} for tests.
 *
 * Every generated per-service config (e.g. `S3ClientConfig`) will look
 * roughly like this: fixed machinery via template methods, service
 * knobs as constructor parameters that route into `parent::__construct`.
 */
final class TestAbstractAwsClientConfig extends AbstractAwsClientConfig
{
    protected function createProtocol(): ProtocolInterface
    {
        return new RestJsonProtocol();
    }

    protected function getHttpClient(): HttpClientInterface
    {
        return new MockHttpClient();
    }

    protected function getEndpointResolver(): EndpointResolverInterface
    {
        return new StaticEndpointResolver(new Endpoint('https://a.test'));
    }

    protected function getSigningName(): string
    {
        return 'test';
    }
}
