<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\S3;

use Aws\Core\S3\S3ErrorInterceptor;
use Aws\Core\S3\S3ErrorPlugin;
use Aws\Core\S3\S3Http200ErrorInterceptor;
use Aws\Tests\S3\Utils\S3TestClient;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Smithy\Client\Plugin\PluginCollection;

#[CoversClass(S3ErrorPlugin::class)]
final class S3ErrorPluginTest extends TestCase
{
    public function testRegistersBothInterceptorsOnce(): void
    {
        $plugin = new S3ErrorPlugin();
        $config = S3TestClient::forModel()->getConfig();
        $config = $plugin->configure($plugin->configure($config));

        $this->assertTrue(
            $config->interceptorChain->contains(S3ErrorInterceptor::class)
        );
        $this->assertTrue(
            $config->interceptorChain->contains(
                S3Http200ErrorInterceptor::class
            )
        );
        $this->assertSame($config, $plugin->configure($config));
    }

    public function testClientAppliesThePlugin(): void
    {
        $client = S3TestClient::forModel(
            new PluginCollection(new S3ErrorPlugin())
        );

        $this->assertTrue(
            $client->getConfig()->interceptorChain->contains(
                S3ErrorInterceptor::class
            )
        );
        $this->assertTrue(
            $client->getConfig()->interceptorChain->contains(
                S3Http200ErrorInterceptor::class
            )
        );
    }
}
