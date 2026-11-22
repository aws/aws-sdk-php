<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Utils;

use Aws\Core\Client\AbstractAwsClientConfig;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginState;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\ProtocolInterface;

/**
 * AWS client config with a fixed protocol, endpoint and HTTP client.
 */
final class TestRetryAwsClientConfig extends AbstractAwsClientConfig
{
    public function __construct(
        private readonly ProtocolInterface $protocolInstance,
        private readonly StaticEndpointResolver $endpointResolverInstance,
        private readonly HttpClientInterface $httpClientInstance,
        string $region,
        \Smithy\Auth\IdentityResolverInterface
            |\Smithy\Auth\Aws\AwsCredentialsIdentityInterface $credentials,
        InterceptorChain $interceptors = new InterceptorChain(),
        array $supportedAuthSchemes = [],
        ?\Smithy\Client\Auth\AuthSchemeResolverInterface
            $authSchemeResolver = null,
        ?string $retryMode = null,
        ?int $maxAttempts = null,
        ?RetryStrategyInterface $retryStrategy = null,
        string $retryScope = '',
        array $context = [],
        ?PluginState $pluginState = null,
        ?ProtocolResolverInterface $protocolResolver = null,
        ?string $protocolId = null,
        ?ServiceInterface $service = null,
        ?bool $protocolIsExplicit = null
    ) {
        parent::__construct(
            region: $region,
            credentials: $credentials,
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            retryMode: $retryMode,
            maxAttempts: $maxAttempts,
            retryStrategy: $retryStrategy,
            retryScope: $retryScope,
            context: $context,
            httpClient: $httpClientInstance,
            pluginState: $pluginState,
            protocol: $protocolInstance,
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

    protected function getHttpClient(): HttpClientInterface
    {
        return $this->httpClientInstance;
    }

    protected function getEndpointResolver(): StaticEndpointResolver
    {
        return $this->endpointResolverInstance;
    }

    protected function getSigningName(): string
    {
        return 'test';
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
            httpClientInstance: $this->httpClientInstance,
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
            retryMode: \array_key_exists('retryMode', $overrides)
                ? $overrides['retryMode']
                : $this->retryMode,
            maxAttempts: \array_key_exists('maxAttempts', $overrides)
                ? $overrides['maxAttempts']
                : $this->maxAttempts,
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
            protocolResolver: \array_key_exists(
                'protocolResolver',
                $overrides
            )
                ? $overrides['protocolResolver']
                : $this->protocolResolver,
            protocolId: \array_key_exists('protocolId', $overrides)
                ? $overrides['protocolId']
                : $this->protocolId,
            service: \array_key_exists('service', $overrides)
                ? $overrides['service']
                : $this->service,
            protocolIsExplicit: \array_key_exists(
                'protocolIsExplicit',
                $overrides
            )
                ? $overrides['protocolIsExplicit']
                : null
        );
    }
}
