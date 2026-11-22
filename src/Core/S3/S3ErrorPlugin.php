<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\S3;

use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Register S3 error response customizations.
 *
 * Installs {@see S3ErrorInterceptor} and {@see S3Http200ErrorInterceptor}.
 * Add the plugin to an S3 client so both interceptors apply to its operations.
 */
final class S3ErrorPlugin extends AbstractPlugin
{
    /** @inheritDoc */
    public function configure(AbstractClientConfig $config): AbstractClientConfig
    {
        if (!$config->interceptorChain->contains(S3ErrorInterceptor::class)) {
            $config = $config->withInterceptor(new S3ErrorInterceptor());
        }
        if (!$config->interceptorChain->contains(
            S3Http200ErrorInterceptor::class
        )) {
            $config = $config->withInterceptor(
                new S3Http200ErrorInterceptor()
            );
        }

        return $config;
    }
}
