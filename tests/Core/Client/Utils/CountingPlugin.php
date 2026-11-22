<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client\Utils;

use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Plugin that counts how often it configures a client config.
 */
final class CountingPlugin extends AbstractPlugin
{
    public int $calls = 0;

    public function configure(AbstractClientConfig $config): AbstractClientConfig
    {
        $this->calls++;

        return $config;
    }
}
