<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials\Provider;

use Aws\Core\Credentials\Provider\EnvCredentialProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\ChainSetup;

/**
 * Tests for {@see EnvCredentialProvider}.
 *
 * Snapshots the three env vars before each test and restores them after.
 * These tests mutate the real process env in-process, so each test restores
 * it afterwards.
 */
final class EnvCredentialProviderTest extends TestCase
{
    private const VARS = [
        EnvCredentialProvider::ACCESS_KEY_ENV,
        EnvCredentialProvider::SECRET_KEY_ENV,
        EnvCredentialProvider::SESSION_TOKEN_ENV,
    ];

    /** @var array<string, string|false> */
    private array $originalEnv = [];

    protected function setUp(): void
    {
        foreach (self::VARS as $name) {
            $this->originalEnv[$name] = getenv($name);
            putenv($name);
            unset($_ENV[$name]);
        }
    }

    protected function tearDown(): void
    {
        foreach (self::VARS as $name) {
            $prior = $this->originalEnv[$name] ?? false;
            if ($prior === false) {
                putenv($name);
                unset($_ENV[$name]);
            } else {
                putenv("{$name}={$prior}");
                $_ENV[$name] = $prior;
            }
        }
    }

    public function testResolvesFromAccessAndSecretOnly(): void
    {
        putenv('AWS_ACCESS_KEY_ID=AKID_FROM_ENV');
        putenv('AWS_SECRET_ACCESS_KEY=SECRET_FROM_ENV');

        $identity = (new EnvCredentialProvider())->resolveIdentity()->unwrap();

        $this->assertInstanceOf(AwsCredentials::class, $identity);
        $this->assertSame('AKID_FROM_ENV', $identity->getAccessKeyId());
        $this->assertSame('SECRET_FROM_ENV', $identity->getSecretAccessKey());
        $this->assertNull($identity->getSessionToken());
    }

    public function testIncludesSessionTokenWhenSet(): void
    {
        putenv('AWS_ACCESS_KEY_ID=AKID');
        putenv('AWS_SECRET_ACCESS_KEY=SECRET');
        putenv('AWS_SESSION_TOKEN=TOKEN_XYZ');

        $identity = (new EnvCredentialProvider())->resolveIdentity()->unwrap();

        $this->assertSame('TOKEN_XYZ', $identity->getSessionToken());
    }

    public function testThrowsWhenAccessKeyMissing(): void
    {
        putenv('AWS_SECRET_ACCESS_KEY=SECRET');

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('AWS credentials not found in environment');
        (new EnvCredentialProvider())->resolveIdentity()->unwrap();
    }

    public function testThrowsWhenSecretKeyMissing(): void
    {
        putenv('AWS_ACCESS_KEY_ID=AKID');

        $this->expectException(\RuntimeException::class);
        (new EnvCredentialProvider())->resolveIdentity()->unwrap();
    }

    public function testTreatsEmptyStringAsMissing(): void
    {
        putenv('AWS_ACCESS_KEY_ID=');
        putenv('AWS_SECRET_ACCESS_KEY=SECRET');

        $this->expectException(\RuntimeException::class);
        (new EnvCredentialProvider())->resolveIdentity()->unwrap();
    }

    public function testReReadsEnvOnEachCall(): void
    {
        $provider = new EnvCredentialProvider();

        putenv('AWS_ACCESS_KEY_ID=FIRST');
        putenv('AWS_SECRET_ACCESS_KEY=SECRET');
        $first = $provider->resolveIdentity()->unwrap();
        $this->assertSame('FIRST', $first->getAccessKeyId());

        putenv('AWS_ACCESS_KEY_ID=SECOND');
        $second = $provider->resolveIdentity()->unwrap();
        $this->assertSame('SECOND', $second->getAccessKeyId());
    }

    public function testSetupSnapshotsEnvironmentAtRegistrationTime(): void
    {
        putenv('AWS_ACCESS_KEY_ID=FIRST');
        putenv('AWS_SECRET_ACCESS_KEY=SECRET');

        $provider = new EnvCredentialProvider();
        $setup = new ChainSetup();
        $setup->setCurrentProvider($provider);
        $provider->setup($setup);

        putenv('AWS_ACCESS_KEY_ID=SECOND');

        $identity = $setup->registrations()[0]['resolver']
            ->resolveIdentity()
            ->unwrap();

        $this->assertSame('FIRST', $identity->getAccessKeyId());
    }
}
