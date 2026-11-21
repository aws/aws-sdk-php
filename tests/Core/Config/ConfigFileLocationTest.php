<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Config;

use Aws\Core\Config\ConfigFileLocation;
use PHPUnit\Framework\TestCase;

final class ConfigFileLocationTest extends TestCase
{
    public function testHomeIsUsedFirstOnEveryPlatform(): void
    {
        $env = ['HOME' => '/home/a', 'USERPROFILE' => 'C:\\Users\\b', 'HOMEDRIVE' => 'D:', 'HOMEPATH' => '\\c'];

        $this->assertSame('/home/a', ConfigFileLocation::homeDirectory($env, false));
        $this->assertSame('/home/a', ConfigFileLocation::homeDirectory($env, true));
    }

    public function testWindowsFallsBackToUserProfileThenHomeDriveAndPath(): void
    {
        $this->assertSame(
            'C:\\Users\\b',
            ConfigFileLocation::homeDirectory(['USERPROFILE' => 'C:\\Users\\b', 'HOMEDRIVE' => 'D:', 'HOMEPATH' => '\\c'], true)
        );
        $this->assertSame(
            'D:\\c',
            ConfigFileLocation::homeDirectory(['HOMEDRIVE' => 'D:', 'HOMEPATH' => '\\c'], true)
        );
        $this->assertNull(ConfigFileLocation::homeDirectory(['HOMEDRIVE' => 'D:'], true));
    }

    public function testNonWindowsReadsOnlyHome(): void
    {
        $this->assertNull(
            ConfigFileLocation::homeDirectory(['USERPROFILE' => 'C:\\Users\\b', 'HOMEDRIVE' => 'D:', 'HOMEPATH' => '\\c'], false)
        );
    }

    public function testDefaultsLiveUnderTheHomeDirectory(): void
    {
        $env = ['HOME' => '/home/a'];

        $this->assertSame('/home/a/.aws/config', ConfigFileLocation::configFile(null, $env, false));
        $this->assertSame('/home/a/.aws/credentials', ConfigFileLocation::credentialsFile(null, $env, false));
        $this->assertNull(ConfigFileLocation::configFile(null, [], false));
    }

    public function testEnvironmentOverridesAreHomeExpanded(): void
    {
        $env = [
            'HOME' => '/home/a',
            'AWS_CONFIG_FILE' => '~/custom/config',
            'AWS_SHARED_CREDENTIALS_FILE' => '/abs/credentials',
        ];

        $this->assertSame('/home/a/custom/config', ConfigFileLocation::configFile(null, $env, false));
        $this->assertSame('/abs/credentials', ConfigFileLocation::credentialsFile(null, $env, false));
    }

    public function testConfiguredPathWinsOverEnvironment(): void
    {
        $env = ['HOME' => '/home/a', 'AWS_CONFIG_FILE' => '/env/config'];

        $this->assertSame('/home/a/explicit', ConfigFileLocation::configFile('~/explicit', $env, false));
    }

    public function testTildeExpansionRules(): void
    {
        $env = ['HOME' => '/home/a', 'USERPROFILE' => 'C:\\Users\\b'];

        $this->assertSame('/home/a', ConfigFileLocation::expandHome('~', $env, false));
        $this->assertSame('/home/a/x', ConfigFileLocation::expandHome('~/x', $env, false));
        $this->assertSame('~\\x', ConfigFileLocation::expandHome('~\\x', $env, false));
        $this->assertSame('C:\\Users\\b\\x', ConfigFileLocation::expandHome('~\\x', ['USERPROFILE' => 'C:\\Users\\b'], true));
        $this->assertSame('~other/x', ConfigFileLocation::expandHome('~other/x', $env, false));
        $this->assertSame('/x/~/y', ConfigFileLocation::expandHome('/x/~/y', $env, false));
        $this->assertNull(ConfigFileLocation::expandHome('~/x', [], false));
    }
}
