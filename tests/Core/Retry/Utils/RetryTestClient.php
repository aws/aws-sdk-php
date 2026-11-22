<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Retry\Utils;

use Aws\Core\Client\AwsDynamicClientConfig;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Client\Dynamic\DynamicClient;
use Smithy\Client\Dynamic\DynamicOperation;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginCollection;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Core\Model\SmithyModel;
use Smithy\Core\Transport\TransportInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\Aws\RestJsonProtocol;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Tests\Utils\Http\MockHttpClient;

/**
 * Dynamic client for the retry test model, built on the AWS client config.
 */
final class RetryTestClient extends DynamicClient
{
    private const MODEL = __DIR__ . '/../fixtures/retry-model.json';

    private const SIGNING_NAME = 'test.signingName';

    /**
     * Create a client for the retry test model.
     */
    public static function forModel(
        string $signingName = 'retry',
        HttpClientInterface $httpClient = new MockHttpClient(),
        ?RetryStrategyInterface $retryStrategy = null,
        PluginCollection $plugins = new PluginCollection()
    ): self
    {
        return self::create(
            model: self::MODEL,
            protocol: new RestJsonProtocol(),
            httpClient: $httpClient,
            endpoint: 'https://example.test',
            retryStrategy: $retryStrategy,
            context: [self::SIGNING_NAME => $signingName],
            plugins: $plugins
        );
    }

    /**
     * Return a modeled operation by name.
     */
    public function operation(string $name): DynamicOperation
    {
        return $this->getOperation($name)
            ?? throw new \InvalidArgumentException(
                "Unknown test operation {$name}."
            );
    }

    /**
     * @param list<\Smithy\Auth\AuthSchemeInterface> $supportedAuthSchemes
     * @param list<string>|null $authSchemePreference
     * @param array<string, mixed> $context
     */
    public static function createClientConfig(
        SmithyModel $model,
        string $serviceId,
        ?string $protocolId,
        ?ProtocolInterface $protocol,
        ProtocolResolverInterface $protocolResolver,
        ?HttpClientInterface $httpClient,
        ?TransportInterface $transport,
        EndpointResolverInterface $endpointResolver,
        InterceptorChain $interceptors,
        array $supportedAuthSchemes,
        ?AuthSchemeResolverInterface $authSchemeResolver,
        ?array $authSchemePreference,
        ?RetryStrategyInterface $retryStrategy,
        string $retryScope,
        array $context
    ): AbstractClientConfig
    {
        $signingName = $context[self::SIGNING_NAME] ?? 'retry';
        unset($context[self::SIGNING_NAME]);

        return new AwsDynamicClientConfig(
            resolvedProtocol: $protocol,
            protocolResolver: $protocolResolver,
            protocolId: $protocolId,
            resolvedEndpointResolver: $endpointResolver,
            resolvedSigningName: \is_string($signingName)
                ? $signingName
                : 'retry',
            enableSigV4: false,
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            authSchemePreference: $authSchemePreference,
            retryStrategy: $retryStrategy,
            retryScope: $retryScope,
            context: $context,
            httpClient: $httpClient,
            transport: $transport
        );
    }
}
