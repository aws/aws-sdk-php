<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Client;

use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Resolve AWS-wide client settings once during client construction.
 */
final class AwsClientConfigPlugin extends AbstractPlugin
{
    private static ?self $instance = null;

    private readonly AwsClientConfigResolver $resolver;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct()
    {
        $this->resolver = new AwsClientConfigResolver();
    }

    public function configure(AbstractClientConfig $config): AbstractClientConfig
    {
        if (!$config instanceof AbstractAwsClientConfig) {
            return $config;
        }

        $context = $this->resolver->storedContext($config);
        if ($context === null) {
            $context = $this->resolver->resolveContext($config);
            $config = $this->resolver->withContext($config, $context);
        }
        if (!$config->interceptorChain->contains(
            InvalidateCredentialsInterceptor::class
        )) {
            $config = $config->withInterceptor(
                InvalidateCredentialsInterceptor::instance()
            );
        }
        $config = $this->resolver->withRequestCompressionSettings(
            $config,
            $context
        );
        if (!$config->supportsFlexibleChecksums()) {
            return $config;
        }

        $settings = $this->resolver->resolveChecksumSettings(
            $config,
            $context
        );

        return $config->withResolvedChecksumSettings(
            $settings['requestChecksumCalculation'],
            $settings['responseChecksumValidation']
        );
    }
}
