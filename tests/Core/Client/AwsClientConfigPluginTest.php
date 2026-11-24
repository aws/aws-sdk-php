<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Checksum\{
    RequestChecksumCalculation,
    ResponseChecksumValidation
};
use Aws\Core\Client\{
    AwsClientConfigContext,
    AwsClientConfigPlugin,
    AwsClientConfigResolver,
    InvalidateCredentialsInterceptor
};
use Aws\Core\Credentials\{
    AwsConfigFile,
    AwsProfile
};
use Aws\Tests\Core\Client\Utils\TestAbstractAwsClientConfigForClient;
use Aws\Tests\Utils\Http\MockHttpClient;
use Aws\Tests\Utils\TemporaryAwsEnvironment;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Protocol\Aws\RestJsonProtocol;

final class AwsClientConfigPluginTest extends TestCase
{
    public function testInstanceIsShared(): void
    {
        $this->assertSame(
            AwsClientConfigPlugin::instance(),
            AwsClientConfigPlugin::instance()
        );
    }

    public function testLeavesNonAwsConfigUnchanged(): void
    {
        $config = new ClientConfig(
            transport: new HttpClientTransport(new MockHttpClient()),
            protocol: new RestJsonProtocol(),
            endpointResolver: new StaticEndpointResolver(
                new Endpoint('https://a.test')
            )
        );

        $this->assertSame(
            $config,
            AwsClientConfigPlugin::instance()->configure($config)
        );
    }

    public function testResolvesAndStoresTheClientConfigContext(): void
    {
        $configured = TemporaryAwsEnvironment::run(
            fn() => AwsClientConfigPlugin::instance()->configure(
                $this->config()
            ),
            ['AWS_PROFILE' => 'preview'],
            "[profile preview]\nregion = us-west-2\n"
        );

        $context = $configured->context[AwsClientConfigResolver::CONTEXT_KEY]
            ?? null;
        $this->assertInstanceOf(AwsClientConfigContext::class, $context);
        $this->assertSame('preview', $context->profileName);
    }

    public function testReusesAStoredClientConfigContext(): void
    {
        $context = $this->context([]);

        $configured = AwsClientConfigPlugin::instance()->configure(
            $this->config(context: [
                AwsClientConfigResolver::CONTEXT_KEY => $context
            ])
        );

        $this->assertSame(
            $context,
            $configured->context[AwsClientConfigResolver::CONTEXT_KEY]
        );
    }

    public function testAddsTheInvalidateCredentialsInterceptorOnce(): void
    {
        $plugin = AwsClientConfigPlugin::instance();

        $once = $plugin->configure(
            $this->config(context: [
                AwsClientConfigResolver::CONTEXT_KEY => $this->context([])
            ])
        );
        $twice = $plugin->configure($once);

        $this->assertTrue($once->interceptorChain->contains(
            InvalidateCredentialsInterceptor::class
        ));
        $this->assertSame($once->interceptorChain, $twice->interceptorChain);
    }

    public function testResolvesChecksumSettingsWhenTheServiceSupportsThem(): void
    {
        $configured = AwsClientConfigPlugin::instance()->configure(
            $this->config(
                supportsFlexibleChecksums: true,
                context: [
                    AwsClientConfigResolver::CONTEXT_KEY => $this->context([
                        'request_checksum_calculation' => 'when_required',
                        'response_checksum_validation' => 'when_required'
                    ])
                ]
            )
        );

        $this->assertSame(
            RequestChecksumCalculation::WHEN_REQUIRED,
            $configured->requestChecksumCalculation
        );
        $this->assertSame(
            ResponseChecksumValidation::WHEN_REQUIRED,
            $configured->responseChecksumValidation
        );
    }

    public function testSkipsChecksumSettingsWhenTheServiceLacksThem(): void
    {
        $configured = AwsClientConfigPlugin::instance()->configure(
            $this->config(context: [
                AwsClientConfigResolver::CONTEXT_KEY => $this->context([
                    'request_checksum_calculation' => 'when_required'
                ])
            ])
        );

        $this->assertNull($configured->requestChecksumCalculation);
        $this->assertNull($configured->responseChecksumValidation);
    }

    /**
     * @param array<string, mixed> $context
     */
    private function config(
        bool $supportsFlexibleChecksums = false,
        array $context = []
    ): TestAbstractAwsClientConfigForClient
    {
        return new TestAbstractAwsClientConfigForClient(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            supportsFlexibleChecksums: $supportsFlexibleChecksums,
            context: $context
        );
    }

    /**
     * @param array<string, string> $settings
     */
    private function context(array $settings): AwsClientConfigContext
    {
        $profile = new AwsProfile('preview', $settings);

        return new AwsClientConfigContext(
            env: [],
            profileName: 'preview',
            credentialsFilePath: null,
            configFilePath: null,
            profileFile: new AwsConfigFile(['preview' => $profile]),
            profile: $profile
        );
    }
}
