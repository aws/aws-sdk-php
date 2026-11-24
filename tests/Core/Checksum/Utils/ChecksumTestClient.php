<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum\Utils;

use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AwsDynamicClientConfig;
use Aws\Tests\Utils\Http\MockHttpClient;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Client\Dynamic\DynamicClient;
use Smithy\Client\Dynamic\DynamicClientRuntime;
use Smithy\Client\Dynamic\DynamicOperation;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginCollection;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Core\Model\SmithyModel;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SchemaTraitRegistry;
use Smithy\Core\Transport\TransportInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\Aws\RestJsonProtocol;
use Smithy\Protocol\ProtocolInterface;

/**
 * Dynamic client for the checksum test model, built on the AWS client config.
 */
final class ChecksumTestClient extends DynamicClient
{
    private const MODEL = __DIR__ . '/../fixtures/checksum-model.json';

    private const RESPONSE_VALIDATION = 'test.responseChecksumValidation';

    /**
     * Create a client for the checksum test model.
     */
    public static function forModel(
        PluginCollection $plugins = new PluginCollection(),
        ?ResponseChecksumValidation $responseChecksumValidation = null
    ): self
    {
        return self::create(
            model: self::MODEL,
            protocol: new RestJsonProtocol(),
            httpClient: new MockHttpClient(),
            endpoint: 'https://example.test',
            context: $responseChecksumValidation === null
                ? []
                : [self::RESPONSE_VALIDATION => $responseChecksumValidation],
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
        $validation = $context[self::RESPONSE_VALIDATION] ?? null;
        unset($context[self::RESPONSE_VALIDATION]);

        return new AwsDynamicClientConfig(
            resolvedProtocol: $protocol,
            protocolResolver: $protocolResolver,
            protocolId: $protocolId,
            resolvedEndpointResolver: $endpointResolver,
            resolvedSigningName: 'checksum',
            enableSigV4: false,
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            authSchemePreference: $authSchemePreference,
            responseChecksumValidation:
                $validation instanceof ResponseChecksumValidation
                    ? $validation
                    : null,
            retryStrategy: $retryStrategy,
            retryScope: $retryScope,
            context: $context,
            httpClient: $httpClient,
            transport: $transport,
            endpoint: $endpoint
        );
    }

    protected static function getDefaultRuntime(): DynamicClientRuntime
    {
        $traitRegistry = new SchemaTraitRegistry();
        $traitRegistry->register(
            'aws.protocols#httpChecksum',
            Schema::T_HTTP_CHECKSUM
        );

        return parent::getDefaultRuntime()->merge(
            new DynamicClientRuntime(traitRegistry: $traitRegistry)
        );
    }
}
