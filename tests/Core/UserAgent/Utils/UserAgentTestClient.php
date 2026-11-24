<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\UserAgent\Utils;

use Aws\Core\Client\AwsDynamicClientConfig;
use Aws\Core\UserAgent\UserAgentPlugin;
use Aws\Tests\Utils\Http\MockHttpClient;
use Smithy\Auth\Aws\AwsCredentials;
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

/**
 * Dynamic client for the user agent test model, built on a SigV4 AWS
 * client config.
 */
final class UserAgentTestClient extends DynamicClient
{
    public const MODEL = __DIR__ . '/../fixtures/user-agent-model.json';

    private const SETTINGS = 'test.userAgentSettings';

    /**
     * Create a client for the user agent test model.
     *
     * @param array<string, mixed> $settings Named AwsDynamicClientConfig
     *        arguments. Credentials default to static test keys.
     * @param array<string, mixed> $context Client context.
     * @param PluginCollection|null $plugins Client plugins; the user agent
     *        plugin alone when null.
     */
    public static function forModel(
        HttpClientInterface $httpClient = new MockHttpClient(),
        array $settings = [],
        ?RetryStrategyInterface $retryStrategy = null,
        array $context = [],
        ?PluginCollection $plugins = null
    ): self
    {
        return self::create(
            model: self::MODEL,
            protocol: new RestJsonProtocol(),
            httpClient: $httpClient,
            endpoint: 'https://example.test',
            retryStrategy: $retryStrategy,
            context: [
                ...$context,
                self::SETTINGS => [
                    'credentials' => new AwsCredentials('AKID', 'SECRET'),
                    ...$settings
                ]
            ],
            plugins: $plugins
                ?? new PluginCollection(UserAgentPlugin::instance())
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
        /** @var array<string, mixed> $settings */
        $settings = $context[self::SETTINGS] ?? [];
        unset($context[self::SETTINGS]);

        return new AwsDynamicClientConfig(...[
            'resolvedProtocol' => $protocol,
            'protocolResolver' => $protocolResolver,
            'protocolId' => $protocolId,
            'resolvedEndpointResolver' => $endpointResolver,
            'resolvedSigningName' => 'useragent',
            'enableSigV4' => true,
            'region' => 'us-east-1',
            'interceptors' => $interceptors,
            'supportedAuthSchemes' => $supportedAuthSchemes,
            'authSchemeResolver' => $authSchemeResolver,
            'authSchemePreference' => $authSchemePreference,
            'retryStrategy' => $retryStrategy,
            'retryScope' => $retryScope,
            'context' => $context,
            'httpClient' => $httpClient,
            'transport' => $transport,
            'endpoint' => $endpoint,
            ...$settings
        ]);
    }
}
