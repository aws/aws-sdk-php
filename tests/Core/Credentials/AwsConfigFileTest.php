<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials;

use Aws\Core\Credentials\AwsConfigFile;
use PHPUnit\Framework\TestCase;

final class AwsConfigFileTest extends TestCase
{
    public function testMergesConfigAndCredentialsFilesByProfile(): void
    {
        $dir = $this->makeTempDir();
        $credentials = $dir . '/credentials';
        $config = $dir . '/config';

        file_put_contents($credentials, "[testing]\naws_access_key_id = AKID\naws_secret_access_key = SECRET\n");
        file_put_contents($config, "[profile testing]\nregion = us-west-2\ncredential_process = demo\n");

        $profiles = AwsConfigFile::fromFiles($credentials, $config);
        $profile = $profiles->getProfile('testing');

        $this->assertNotNull($profile);
        $this->assertSame('AKID', $profile->get('aws_access_key_id'));
        $this->assertSame('SECRET', $profile->get('aws_secret_access_key'));
        $this->assertSame('us-west-2', $profile->get('region'));
        $this->assertSame('demo', $profile->get('credential_process'));
    }

    public function testCredentialsFileOverridesConflictingConfigKeys(): void
    {
        $dir = $this->makeTempDir();
        $credentials = $dir . '/credentials';
        $config = $dir . '/config';

        file_put_contents($credentials, "[default]\naws_access_key_id = AKID\n");
        file_put_contents($config, "[default]\naws_access_key_id = OTHER\n");

        $profiles = AwsConfigFile::fromFiles($credentials, $config);

        $this->assertSame('AKID', $profiles->getProfile('default')?->get('aws_access_key_id'));
    }

    public function testProfileRemembersWhichPropertiesCameFromTheCredentialsFile(): void
    {
        $dir = $this->makeTempDir();
        $credentials = $dir . '/credentials';
        $config = $dir . '/config';

        file_put_contents($credentials, "[testing]\naws_access_key_id = AKID\n");
        file_put_contents($config, "[profile testing]\nregion = us-west-2\ncredential_process = demo\n");

        $profile = AwsConfigFile::fromFiles($credentials, $config)->getProfile('testing');

        $this->assertSame(['aws_access_key_id' => 'AKID'], $profile?->credentialsFileProperties);
    }

    public function testMissingFilesYieldEmptyProfileFile(): void
    {
        $profiles = AwsConfigFile::fromFiles('/no/such/credentials', '/no/such/config');

        $this->assertSame([], $profiles->profiles());
    }

    public function testParsesSsoSessionSectionsSeparatelyFromProfiles(): void
    {
        $dir = $this->makeTempDir();
        $config = $dir . '/config';

        file_put_contents($config, <<<CFG
[profile default]
sso_session = dev

[sso-session dev]
sso_region = us-east-1
sso_start_url = https://example.awsapps.com/start
CFG);

        $profiles = AwsConfigFile::fromFiles($dir . '/credentials', $config);

        $this->assertNotNull($profiles->getProfile('default'));
        $this->assertFalse($profiles->hasProfile('sso-session dev'));
        $this->assertSame([
            'sso_region' => 'us-east-1',
            'sso_start_url' => 'https://example.awsapps.com/start',
        ], $profiles->getSsoSession('dev'));
    }

    public function testHomeIsUsedFirstOnEveryPlatform(): void
    {
        $env = ['HOME' => '/home/a', 'USERPROFILE' => 'C:\\Users\\b', 'HOMEDRIVE' => 'D:', 'HOMEPATH' => '\\c'];

        $this->assertSame('/home/a/.aws/config', AwsConfigFile::fromEnvironment($env, null, null, false)->configFilePath);
        $this->assertSame('/home/a/.aws/config', AwsConfigFile::fromEnvironment($env, null, null, true)->configFilePath);
    }

    public function testWindowsFallsBackToUserProfileThenHomeDriveAndPath(): void
    {
        $userProfile = ['USERPROFILE' => 'C:\\Users\\b', 'HOMEDRIVE' => 'D:', 'HOMEPATH' => '\\c'];

        $this->assertSame(
            'C:\\Users\\b/.aws/config',
            AwsConfigFile::fromEnvironment($userProfile, null, null, true)->configFilePath
        );
        $this->assertSame(
            'D:\\c/.aws/config',
            AwsConfigFile::fromEnvironment(['HOMEDRIVE' => 'D:', 'HOMEPATH' => '\\c'], null, null, true)->configFilePath
        );
        $this->assertNull(AwsConfigFile::fromEnvironment(['HOMEDRIVE' => 'D:'], null, null, true)->configFilePath);
    }

    public function testNonWindowsReadsOnlyHome(): void
    {
        $env = ['USERPROFILE' => 'C:\\Users\\b', 'HOMEDRIVE' => 'D:', 'HOMEPATH' => '\\c'];

        $this->assertNull(AwsConfigFile::fromEnvironment($env, null, null, false)->configFilePath);
    }

    public function testDefaultsLiveUnderTheHomeDirectory(): void
    {
        $file = AwsConfigFile::fromEnvironment(['HOME' => '/home/a'], null, null, false);

        $this->assertSame('/home/a/.aws/config', $file->configFilePath);
        $this->assertSame('/home/a/.aws/credentials', $file->credentialsFilePath);
        $this->assertNull(AwsConfigFile::fromEnvironment([], null, null, false)->credentialsFilePath);
    }

    public function testEnvironmentOverridesAreHomeExpanded(): void
    {
        $file = AwsConfigFile::fromEnvironment([
            'HOME' => '/home/a',
            AwsConfigFile::ENV_CONFIG_FILE => '~/custom/config',
            AwsConfigFile::ENV_SHARED_CREDENTIALS_FILE => '/abs/credentials',
        ], null, null, false);

        $this->assertSame('/home/a/custom/config', $file->configFilePath);
        $this->assertSame('/abs/credentials', $file->credentialsFilePath);
    }

    public function testConfiguredPathWinsOverEnvironment(): void
    {
        $env = ['HOME' => '/home/a', AwsConfigFile::ENV_CONFIG_FILE => '/env/config'];

        $this->assertSame(
            '/home/a/explicit',
            AwsConfigFile::fromEnvironment($env, null, '~/explicit', false)->configFilePath
        );
    }

    public function testTildeExpansionRules(): void
    {
        $env = ['HOME' => '/home/a', 'USERPROFILE' => 'C:\\Users\\b'];
        $expand = static fn (string $path, array $env, bool $windows): ?string
            => AwsConfigFile::fromEnvironment($env, null, $path, $windows)->configFilePath;

        $this->assertSame('/home/a', $expand('~', $env, false));
        $this->assertSame('/home/a/x', $expand('~/x', $env, false));
        $this->assertSame('~\\x', $expand('~\\x', $env, false));
        $this->assertSame('C:\\Users\\b\\x', $expand('~\\x', ['USERPROFILE' => 'C:\\Users\\b'], true));
        $this->assertSame('~other/x', $expand('~other/x', $env, false));
        $this->assertSame('/x/~/y', $expand('/x/~/y', $env, false));
        $this->assertNull($expand('~/x', [], false));
    }

    public function testFromEnvironmentReadsTheLocatedFiles(): void
    {
        $dir = $this->makeTempDir();
        file_put_contents($dir . '/config', "[profile located]\nregion = eu-west-1\n");

        $file = AwsConfigFile::fromEnvironment(
            [AwsConfigFile::ENV_CONFIG_FILE => $dir . '/config'],
            null,
            null,
            false
        );

        $this->assertSame('eu-west-1', $file->getProfile('located')?->get('region'));
    }

    private function makeTempDir(): string
    {
        $dir = sys_get_temp_dir() . '/aws-profile-test-' . bin2hex(random_bytes(6));
        mkdir($dir, 0777, true);
        return $dir;
    }
}
