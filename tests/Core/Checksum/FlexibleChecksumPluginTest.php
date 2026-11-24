<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum;

use Aws\Core\Checksum\FlexibleChecksumPlugin;
use Aws\Core\Checksum\FlexibleChecksumRequestInterceptor;
use Aws\Core\Checksum\FlexibleChecksumResponseInterceptor;
use Aws\Tests\Core\Checksum\Utils\ChecksumTestClient;
use Aws\Tests\Utils\Http\MockHttpClient;
use PHPUnit\Framework\TestCase;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Plugin\PluginCollection;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Protocol\Aws\RestJsonProtocol;

final class FlexibleChecksumPluginTest extends TestCase
{
    public function testClientInstallsRequestAndResponseInterceptors(): void
    {
        $config = ChecksumTestClient::forModel(
            new PluginCollection(new FlexibleChecksumPlugin())
        )->getConfig();

        $this->assertTrue(
            $config->interceptorChain->contains(
                FlexibleChecksumRequestInterceptor::class
            )
        );
        $this->assertTrue(
            $config->interceptorChain->contains(
                FlexibleChecksumResponseInterceptor::class
            )
        );
    }

    public function testClientWithoutPluginHasNoChecksumInterceptors(): void
    {
        $config = ChecksumTestClient::forModel()->getConfig();

        $this->assertFalse(
            $config->interceptorChain->contains(
                FlexibleChecksumRequestInterceptor::class
            )
        );
        $this->assertFalse(
            $config->interceptorChain->contains(
                FlexibleChecksumResponseInterceptor::class
            )
        );
    }

    public function testLeavesNonAwsConfigUnchanged(): void
    {
        $config = new ClientConfig(
            protocol: new RestJsonProtocol(),
            transport: new HttpClientTransport(new MockHttpClient()),
            endpointResolver: new StaticEndpointResolver(
                new Endpoint('https://example.test')
            )
        );

        $this->assertSame(
            $config,
            (new FlexibleChecksumPlugin())->configure($config)
        );
    }
}
