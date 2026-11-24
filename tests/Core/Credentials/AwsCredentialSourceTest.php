<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials;

use Aws\Core\Credentials\AwsCredentialSource;
use PHPUnit\Framework\TestCase;

final class AwsCredentialSourceTest extends TestCase
{
    public function testSlotOrderMatchesEnumOrder(): void
    {
        $this->assertSame(
            \array_map(static fn (AwsCredentialSource $slot): string => $slot->value, AwsCredentialSource::cases()),
            AwsCredentialSource::slotOrder(),
        );
    }

    public function testEnvironmentDetectionRequiresAccessAndSecret(): void
    {
        $lookup = static fn (string $name): ?string => match ($name) {
            'AWS_ACCESS_KEY_ID' => 'AKID',
            'AWS_SECRET_ACCESS_KEY' => 'SECRET',
            default => null,
        };

        $this->assertTrue(AwsCredentialSource::ENVIRONMENT->isDetected($lookup));
        $this->assertFalse(AwsCredentialSource::ENVIRONMENT->isDetected(static fn (string $name): ?string => 'AWS_ACCESS_KEY_ID' === $name ? 'AKID' : null));
    }

    public function testWebIdentityDetectionRequiresTokenFileAndRoleArn(): void
    {
        $lookup = static fn (string $name): ?string => match ($name) {
            'AWS_WEB_IDENTITY_TOKEN_FILE' => '/tmp/token',
            'AWS_ROLE_ARN' => 'arn:aws:iam::123456789012:role/demo',
            default => null,
        };

        $this->assertTrue(AwsCredentialSource::WEB_IDENTITY_TOKEN_ENV->isDetected($lookup));
        $this->assertFalse(AwsCredentialSource::WEB_IDENTITY_TOKEN_ENV->isDetected(static fn (string $name): ?string => null));
    }

    public function testEcsDetectionAcceptsEitherUriSignal(): void
    {
        $full = static fn (string $name): ?string => 'AWS_CONTAINER_CREDENTIALS_FULL_URI' === $name ? 'http://127.0.0.1/creds' : null;
        $relative = static fn (string $name): ?string => 'AWS_CONTAINER_CREDENTIALS_RELATIVE_URI' === $name ? '/v2/credentials/123' : null;

        $this->assertTrue(AwsCredentialSource::ECS_CONTAINER->isDetected($full));
        $this->assertTrue(AwsCredentialSource::ECS_CONTAINER->isDetected($relative));
        $this->assertFalse(AwsCredentialSource::ECS_CONTAINER->isDetected(static fn (string $name): ?string => null));
    }

    public function testProfileAndImdsSlotsDoNotExposeCheapDetection(): void
    {
        $this->assertFalse(AwsCredentialSource::SHARED_CONFIG->isDetected());
        $this->assertFalse(AwsCredentialSource::PROFILE_ASSUME_ROLE->isDetected());
        $this->assertFalse(AwsCredentialSource::EC2_INSTANCE_METADATA->isDetected());
    }

    public function testModuleSuggestionsMatchExpectedFamilies(): void
    {
        $this->assertSame('aws/aws-sdk-php-core', AwsCredentialSource::ENVIRONMENT->moduleSuggestion());
        $this->assertSame('aws/aws-sdk-php-credentials', AwsCredentialSource::PROFILE_ASSUME_ROLE->moduleSuggestion());
        $this->assertSame('aws/aws-sdk-php-credentials', AwsCredentialSource::PROFILE_SSO_SESSION->moduleSuggestion());
        $this->assertSame('aws/aws-sdk-php-core', AwsCredentialSource::ECS_CONTAINER->moduleSuggestion());
        $this->assertSame('aws/aws-sdk-php-core', AwsCredentialSource::EC2_INSTANCE_METADATA->moduleSuggestion());
        $this->assertSame('', AwsCredentialSource::PROFILE_LOGIN->moduleSuggestion());
    }
}
