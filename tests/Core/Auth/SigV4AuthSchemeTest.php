<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Auth;

use Smithy\Auth\Aws\SigV4AuthScheme;
use Aws\Core\Client\AbstractAwsClientConfig;
use Smithy\Protocol\Aws\RestJsonProtocol;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Client\Endpoint\{
    EndpointResolverInterface,
    StaticEndpointResolver
};
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Tests\Utils\Http\MockHttpClient;

#[CoversClass(SigV4AuthScheme::class)]
final class SigV4AuthSchemeTest extends TestCase
{
    public function testProvidesSeparateIdentityAndSignerProperties(): void
    {
        $config = new SigV4TestClientConfig(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            signingRegion: 'us-west-2',
            useFips: true
        );
        $scheme = new SigV4AuthScheme('test', 'us-west-2');

        $this->assertSame(
            $config->getIdentityContext(),
            $scheme->getIdentityProperties($config->context)
        );
        $this->assertSame(
            [
                'signingName' => 'test',
                'signingRegion' => 'us-west-2',
            ],
            $scheme->getSignerProperties($config->context)
        );
        $this->assertSame(
            $config->credentials,
            $scheme->getIdentityResolver($config->getIdentityResolvers())
        );
        $this->assertNotSame(
            $scheme->getSigner(),
            $scheme->getSigner()
        );
    }
}

final class SigV4TestClientConfig extends AbstractAwsClientConfig
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
        return new StaticEndpointResolver(
            new Endpoint('https://example.test')
        );
    }

    protected function getSigningName(): string
    {
        return 'test';
    }
}
