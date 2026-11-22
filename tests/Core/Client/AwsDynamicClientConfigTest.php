<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Client\AwsDynamicClientConfig;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Auth\Aws\SigV4AuthScheme;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Endpoint\StaticEndpointResolver;
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
