<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\UserAgent;

use Aws\Core\UserAgent\{UserAgentInterceptor, WaiterFeaturePlugin};
use Aws\Tests\Core\UserAgent\Utils\UserAgentTestClient;
use PHPUnit\Framework\TestCase;
use Smithy\Client\RequestOverrideConfig;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class WaiterFeaturePluginTest extends TestCase
{
    public function testConfigureMarksConfigAsWaiterCall(): void
    {
        $config = UserAgentTestClient::forModel()->getConfig();

        $this->assertArrayNotHasKey(
            UserAgentInterceptor::WAITER_KEY,
            $config->context
        );
        $this->assertTrue(
            WaiterFeaturePlugin::instance()
                ->configure($config)
                ->context[UserAgentInterceptor::WAITER_KEY]
        );
    }

    public function testInstanceIsShared(): void
    {
        $this->assertSame(
            WaiterFeaturePlugin::instance(),
            WaiterFeaturePlugin::instance()
        );
    }

    public function testCallScopedPluginAddsWaiterIdOnlyToThatCall(): void
    {
        $http = (new MockHttpClient())->fallbackResponse('{}', 200);
        $client = UserAgentTestClient::forModel($http);

        $client->call('Ping', null, [
            RequestOverrideConfig::PLUGINS => [WaiterFeaturePlugin::instance()]
        ]);
        $waiterHeader = $http->getLastRequest()?->getHeaderLine('User-Agent');
        $client->call('Ping');
        $directHeader = $http->getLastRequest()?->getHeaderLine('User-Agent');

        $this->assertMatchesRegularExpression(
            '~ m/\S*,B( |$)~',
            $waiterHeader ?? ''
        );
        $this->assertStringNotContainsString(',B', $directHeader ?? '');
    }
}
