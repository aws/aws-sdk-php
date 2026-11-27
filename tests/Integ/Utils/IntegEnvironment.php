<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Integ\Utils;

use Aws\Core\Client\AwsClientConfigResolver;

/**
 * Read the AWS region and credential availability for integration tests.
 */
final class IntegEnvironment
{
    private const DEFAULT_REGION = 'us-west-2';

    private function __construct() {}

    /**
     * Return the region from `AWS_REGION` or `AWS_DEFAULT_REGION`, or us-west-2.
     */
    public static function region(): string
    {
        foreach (['AWS_REGION', 'AWS_DEFAULT_REGION'] as $name) {
            $value = \getenv($name);
            if (\is_string($value) && $value !== '') {
                return $value;
            }
        }

        return self::DEFAULT_REGION;
    }

    /**
     * Return null when the default credential chain finds credentials, or
     * the reason it found none. The reason never contains a secret.
     */
    public static function missingCredentials(): ?string
    {
        $resolver = new AwsClientConfigResolver();
        $result = $resolver
            ->resolveCredentials($resolver->buildContext([]))
            ->resolveIdentity();

        return $result->identity === null
            ? ($result->error ?? 'no credentials found')
            : null;
    }

    /**
     * Return a bucket name that is unique to this run.
     */
    public static function bucketName(): string
    {
        return 'aws-sdk-php-v4-integ-' . \bin2hex(\random_bytes(6));
    }
}
