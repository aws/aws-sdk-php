<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials\Provider;

use Aws\Core\Credentials\AwsConfigFile;
use Aws\Core\Credentials\AwsCredentialChainContext;
use Aws\Core\Credentials\AwsProfile;
use Aws\Core\Credentials\Provider\SharedConfigProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\ChainSetup;

final class SharedConfigProviderTest extends TestCase
{
    private const VARS = [
        SharedConfigProvider::ENV_PROFILE,
        SharedConfigProvider::ENV_SHARED_CREDENTIALS_FILE,
        SharedConfigProvider::ENV_CONFIG_FILE,
        'HOME',
        'HOMEDRIVE',
        'HOMEPATH'
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

    public function testSetupLoadsProfileFileAndSelectedProfile(): void
    {
        $dir = $this->makeTempDir();
        file_put_contents($dir . '/config', <<<CFG
[profile default]
aws_access_key_id = AKID
aws_secret_access_key = SECRET
CFG);

        $provider = new SharedConfigProvider();
        $setup = new ChainSetup([
            AwsCredentialChainContext::CONFIG_FILE_PATH => $dir . '/config',
            AwsCredentialChainContext::CREDENTIALS_FILE_PATH => $dir . '/credentials'
        ]);
        $setup->setCurrentProvider($provider);

        $provider->setup($setup);

        $this->assertInstanceOf(
            AwsConfigFile::class,
            $setup->getProperty(AwsCredentialChainContext::PROFILE_FILE)
        );
        $this->assertInstanceOf(
            AwsProfile::class,
            $setup->getProperty(AwsCredentialChainContext::PROFILE)
        );
        $this->assertSame(
            'AKID',
            $setup->getProperty(AwsCredentialChainContext::PROFILE)?->get(
                'aws_access_key_id'
            )
        );
    }

    public function testSetupHonorsExplicitProfileNameOverride(): void
    {
        $dir = $this->makeTempDir();
        file_put_contents($dir . '/config', <<<CFG
[profile default]
aws_access_key_id = DEFAULT
aws_secret_access_key = SECRET

[profile testing]
aws_access_key_id = TESTING
aws_secret_access_key = SECRET
CFG);

        $provider = new SharedConfigProvider();
        $setup = new ChainSetup([
            AwsCredentialChainContext::CONFIG_FILE_PATH => $dir . '/config',
            AwsCredentialChainContext::CREDENTIALS_FILE_PATH => $dir . '/credentials',
            AwsCredentialChainContext::PROFILE_NAME_OVERRIDE => 'testing'
        ]);
        $setup->setCurrentProvider($provider);

        $provider->setup($setup);

        $this->assertSame(
            'TESTING',
            $setup->getProperty(AwsCredentialChainContext::PROFILE)?->get(
                'aws_access_key_id'
            )
        );
    }

    public function testSetupMarksDetectedSourcesFromProfile(): void
    {
        $dir = $this->makeTempDir();
        file_put_contents($dir . '/config', <<<CFG
[profile default]
role_arn = arn:aws:iam::123456789012:role/demo
web_identity_token_file = /tmp/token
CFG);

        $provider = new SharedConfigProvider();
        $setup = new ChainSetup([
            AwsCredentialChainContext::CONFIG_FILE_PATH => $dir . '/config',
            AwsCredentialChainContext::CREDENTIALS_FILE_PATH => $dir . '/credentials'
        ]);
        $setup->setCurrentProvider($provider);

        $provider->setup($setup);

        $this->assertSame(
            ['PROFILE_WEB_IDENTITY'],
            $setup->detectedSlots()
        );
    }

    public function testSetupLeavesExistingProfileUnchanged(): void
    {
        $profile = new AwsProfile('manual', ['aws_access_key_id' => 'MANUAL']);

        $provider = new SharedConfigProvider();
        $setup = new ChainSetup([
            AwsCredentialChainContext::PROFILE => $profile
        ]);
        $setup->setCurrentProvider($provider);

        $provider->setup($setup);

        $this->assertSame($profile, $setup->getProperty(AwsCredentialChainContext::PROFILE));
        $this->assertNull($setup->getProperty(AwsCredentialChainContext::PROFILE_FILE));
    }

    private function makeTempDir(): string
    {
        $dir = sys_get_temp_dir() . '/aws-shared-config-test-' . bin2hex(random_bytes(6));
        mkdir($dir, 0777, true);

        return $dir;
    }
}
