<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials;

use Aws\Core\Credentials\AwsCredentialProviderRegistry;
use Aws\Core\Credentials\Provider\ContainerCredentialProvider;
use Aws\Core\Credentials\Provider\EnvCredentialProvider;
use Aws\Core\Credentials\Provider\InstanceProfileProvider;
use Aws\Core\Credentials\Provider\ProfileCredentialProvider;
use Aws\Core\Credentials\Provider\SharedConfigProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\ChainIdentityProviderInterface;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\OrderingConstraint;

final class AwsCredentialProviderRegistryTest extends TestCase
{
    public function testStandardRegistryHoldsOnlyServiceFreeProviders(): void
    {
        $registry = AwsCredentialProviderRegistry::standard();

        // The service-backed providers (STS AssumeRole/WebIdentity, SSO
        // session, legacy SSO) now live in the aws/aws-sdk-php-credentials
        // package, so core's standard chain carries only the five providers
        // that resolve credentials without calling a service.
        $this->assertCount(5, $registry->providers());
        $this->assertInstanceOf(EnvCredentialProvider::class, $registry->providers()[0]);
        $this->assertInstanceOf(SharedConfigProvider::class, $registry->providers()[1]);
        $this->assertInstanceOf(ProfileCredentialProvider::class, $registry->providers()[2]);
        $this->assertInstanceOf(ContainerCredentialProvider::class, $registry->providers()[3]);
        $this->assertInstanceOf(InstanceProfileProvider::class, $registry->providers()[4]);
    }

    public function testWithProviderReturnsExtendedRegistry(): void
    {
        $registry = AwsCredentialProviderRegistry::standard();
        $extra = new class implements ChainIdentityProviderInterface {
            public function name(): string { return 'custom'; }
            public function ordering(): OrderingConstraint { return OrderingConstraint::after('ENVIRONMENT'); }
            public function featureIds(): array { return []; }
            public function setup(ChainSetup $setup): void {}
        };

        $updated = $registry->withProvider($extra);

        $this->assertCount(5, $registry->providers());
        $this->assertCount(6, $updated->providers());
        $this->assertSame($extra, $updated->providers()[5]);
    }
}
