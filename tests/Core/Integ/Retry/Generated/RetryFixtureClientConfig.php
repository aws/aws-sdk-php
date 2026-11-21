<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Generated;

use Aws\Core\Client\AbstractAwsClientConfig;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\NoAuthScheme;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Client\Auth\StaticAuthSchemeResolver;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginState;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Core\Transport\TransportInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\ProtocolInterface;

final class RetryFixtureClientConfig extends AbstractAwsClientConfig
{
    public function __construct(
        private readonly ProtocolInterface $protocolInstance,
        private readonly EndpointResolverInterface $endpointResolverInstance,
        private readonly HttpClientInterface $resolvedHttpClientInstance,
        string $region,
        IdentityResolverInterface|AwsCredentialsIdentityInterface $credentials,
        InterceptorChain $interceptors = new InterceptorChain(),
        array $supportedAuthSchemes = [],
        ?AuthSchemeResolverInterface $authSchemeResolver = null,
        ?RetryStrategyInterface $retryStrategy = null,
        string $retryScope = 'retry-fixture',
        array $context = [],
        ?PluginState $pluginState = null,
        ?TransportInterface $transport = null,
        ?ProtocolInterface $protocol = null,
        ?ProtocolResolverInterface $protocolResolver = null,
        ?string $protocolId = null,
        ?ServiceInterface $service = null,
        ?bool $protocolIsExplicit = null
    ) {
        if ($supportedAuthSchemes === []) {
            $supportedAuthSchemes = [NoAuthScheme::instance()];
        }

        $authSchemeResolver ??= StaticAuthSchemeResolver::noAuth();

        parent::__construct(
            region: $region,
            credentials: $credentials,
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            retryStrategy: $retryStrategy,
            retryScope: $retryScope,
            context: $context,
            httpClient: $resolvedHttpClientInstance,
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
        return $this->protocolInstance;
    }

    protected function getHttpClient(): HttpClientInterface {
        return $this->resolvedHttpClientInstance;
    }

    protected function getEndpointResolver(): EndpointResolverInterface
    {
        return $this->endpointResolverInstance;
    }

    protected function getSigningName(): string
    {
        return 'sqs';
    }

    protected function copyWith(array $overrides): static
    {
        return new static(
            protocolInstance: \array_key_exists('protocol', $overrides)
                ? $overrides['protocol']
                : $this->protocolInstance,
            endpointResolverInstance: \array_key_exists(
                'endpointResolver',
                $overrides
            )
                ? $overrides['endpointResolver']
                : $this->endpointResolverInstance,
            resolvedHttpClientInstance: $this->resolvedHttpClientInstance,
            region: \array_key_exists('region', $overrides)
                ? $overrides['region']
                : $this->region,
            credentials: \array_key_exists('credentials', $overrides)
                ? $overrides['credentials']
                : $this->credentials,
            interceptors: \array_key_exists('interceptors', $overrides)
                ? $overrides['interceptors']
                : $this->interceptorChain,
            supportedAuthSchemes: \array_key_exists(
                'supportedAuthSchemes',
                $overrides
            )
                ? $overrides['supportedAuthSchemes']
                : $this->supportedAuthSchemes,
            authSchemeResolver: \array_key_exists(
                'authSchemeResolver',
                $overrides
            )
                ? $overrides['authSchemeResolver']
                : $this->authSchemeResolver,
            retryStrategy: \array_key_exists('retryStrategy', $overrides)
                ? $overrides['retryStrategy']
                : $this->retryStrategy,
            retryScope: \array_key_exists('retryScope', $overrides)
                ? $overrides['retryScope']
                : $this->retryScope,
            context: \array_key_exists('context', $overrides)
                ? $overrides['context']
                : $this->context,
            pluginState: \array_key_exists('pluginState', $overrides)
                ? $overrides['pluginState']
                : $this->getPluginState(),
            transport: $this->transportForCopy($overrides),
            protocol: \array_key_exists('protocol', $overrides)
                ? $overrides['protocol']
                : $this->protocol,
            protocolResolver: $overrides['protocolResolver']
                ?? $this->protocolResolver,
            protocolId: \array_key_exists('protocolId', $overrides)
                ? $overrides['protocolId']
                : $this->protocolId,
            service: $overrides['service'] ?? $this->service,
            protocolIsExplicit: $overrides['protocolIsExplicit']
                ?? $this->hasExplicitProtocol()
        );
    }
}
