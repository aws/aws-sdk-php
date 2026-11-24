<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Services\S3\Utils;

use Aws\Core\Client\AwsDynamicClientConfig;
use Aws\Tests\Utils\Http\MockHttpClient;
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
use Smithy\Protocol\Aws\RestXmlProtocol;
use Smithy\Protocol\ProtocolInterface;

/**
 * Dynamic client for the S3 test model, built on the AWS client config.
 */
final class S3TestClient extends DynamicClient
{
    private const MODEL = __DIR__ . '/../fixtures/s3-model.json';

    /**
     * Create a client for the S3 test model.
     *
     * @param array<string, mixed> $context
     */
    public static function forModel(
        PluginCollection $plugins = new PluginCollection(),
        array $context = [],
        HttpClientInterface $httpClient = new MockHttpClient()
    ): self
    {
        return self::create(
            model: self::MODEL,
            protocol: new RestXmlProtocol(),
            httpClient: $httpClient,
            endpoint: 'https://s3.us-east-1.amazonaws.com',
            context: $context,
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
        ?EndpointResolverInterface $endpointResolver,
        InterceptorChain $interceptors,
        array $supportedAuthSchemes,
        ?AuthSchemeResolverInterface $authSchemeResolver,
        ?array $authSchemePreference,
        ?RetryStrategyInterface $retryStrategy,
        string $retryScope,
        array $context,
        ?string $endpoint = null
    ): AbstractClientConfig
    {
        return new AwsDynamicClientConfig(
            resolvedProtocol: $protocol,
            protocolResolver: $protocolResolver,
            protocolId: $protocolId,
            resolvedEndpointResolver: $endpointResolver,
            resolvedSigningName: 's3',
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
            transport: $transport,
            endpoint: $endpoint
        );
    }
}
