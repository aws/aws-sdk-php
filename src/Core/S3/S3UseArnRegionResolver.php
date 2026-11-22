<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\S3;

use Aws\Core\Client\AwsClientConfigContext;

/**
 * Resolve the S3 `useArnRegion` setting.
 *
 * The explicit client value wins. Otherwise the `AWS_S3_USE_ARN_REGION`
 * environment variable applies, then the `s3_use_arn_region` setting of the
 * selected shared-config profile. The result is `null` when no source sets a
 * value, which leaves the endpoint rules at their default.
 */
final class S3UseArnRegionResolver
{
    public const ENV_USE_ARN_REGION = 'AWS_S3_USE_ARN_REGION';
    public const PROFILE_USE_ARN_REGION = 's3_use_arn_region';

    /**
     * Resolve the setting.
     *
     * @throws \InvalidArgumentException When the environment variable or the
     *     profile setting is neither `true` nor `false`.
     */
    public function resolve(
        AwsClientConfigContext $context,
        ?bool $explicit = null
    ): ?bool
    {
        if ($explicit !== null) {
            return $explicit;
        }

        $env = $context->env(self::ENV_USE_ARN_REGION);
        if ($env !== null) {
            return $this->parse(
                $env,
                'environment variable ' . self::ENV_USE_ARN_REGION
            );
        }

        $profile = $context->profile?->get(self::PROFILE_USE_ARN_REGION);
        if ($profile !== null) {
            return $this->parse(
                $profile,
                'shared config ' . self::PROFILE_USE_ARN_REGION
            );
        }

        return null;
    }

    private function parse(string $value, string $source): bool
    {
        return match (\strtolower(\trim($value))) {
            'true' => true,
            'false' => false,
            default => throw new \InvalidArgumentException(
                'Invalid ' . $source . ' value "' . $value
                . '". Use "true" or "false".'
            )
        };
    }
}
