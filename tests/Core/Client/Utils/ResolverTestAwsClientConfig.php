<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client\Utils;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AbstractAwsClientConfig;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginState;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Core\Transport\TransportInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\Aws\RestJsonProtocol;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Tests\Utils\Http\MockHttpClient;

/**
 * AWS client config with a configurable signing name for resolver tests.
 */
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
        return $this->resolvedSigningName;
    }

    protected function copyWith(array $overrides): static
    {
        return new static(
            region: \array_key_exists('region', $overrides) ? $overrides['region'] : $this->region,
            credentials: \array_key_exists('credentials', $overrides) ? $overrides['credentials'] : $this->credentials,
            tokenProvider: \array_key_exists(
                'tokenProvider',
                $overrides
            ) ? $overrides['tokenProvider'] : $this->tokenProvider,
            signingRegion: \array_key_exists('signingRegion', $overrides) ? $overrides['signingRegion'] : $this->signingRegion,
            useDualStack: \array_key_exists('useDualStack', $overrides) ? $overrides['useDualStack'] : $this->useDualStack,
            useFips: \array_key_exists('useFips', $overrides) ? $overrides['useFips'] : $this->useFips,
            userAgentAppId: \array_key_exists('userAgentAppId', $overrides) ? $overrides['userAgentAppId'] : $this->userAgentAppId,
            retryMode: \array_key_exists('retryMode', $overrides) ? $overrides['retryMode'] : $this->retryMode,
            maxAttempts: \array_key_exists('maxAttempts', $overrides) ? $overrides['maxAttempts'] : $this->maxAttempts,
            interceptors: \array_key_exists('interceptors', $overrides) ? $overrides['interceptors'] : $this->interceptorChain,
            supportedAuthSchemes: \array_key_exists(
                'supportedAuthSchemes',
                $overrides
            ) ? $overrides['supportedAuthSchemes']
                : $this->supportedAuthSchemes,
            authSchemeResolver: \array_key_exists('authSchemeResolver', $overrides) ? $overrides['authSchemeResolver'] : $this->authSchemeResolver,
            authSchemePreference: \array_key_exists(
                'authSchemePreference',
                $overrides
            ) ? $overrides['authSchemePreference']
                : $this->authSchemePreference,
            retryStrategy: \array_key_exists('retryStrategy', $overrides) ? $overrides['retryStrategy'] : $this->retryStrategy,
            retryScope: \array_key_exists('retryScope', $overrides) ? $overrides['retryScope'] : $this->retryScope,
            context: \array_key_exists('context', $overrides)
                ? $overrides['context']
                : (\array_key_exists('additional', $overrides)
                    ? $overrides['additional']
                    : $this->context),
            httpClient: $this->httpClientForCopy($overrides),
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
