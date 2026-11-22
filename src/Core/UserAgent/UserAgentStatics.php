<?php

declare(strict_types=1);

namespace Aws\Core\UserAgent;

use Composer\InstalledVersions;

/**
 * Compute the User-Agent tokens that stay constant for the process.
 *
 * Each value is built once and kept in a static memo.
 */
final class UserAgentStatics
{
    private const CORE_PACKAGE = 'aws/aws-sdk-php-core';
    private const ROOT_PACKAGE = 'aws/aws-sdk-php-v4';
    private const FALLBACK_VERSION = '4.0.0-dev';
    private const ILLEGAL = '/[^!#$%&\'*+\-.^_`|~0-9A-Za-z\/]/';

    private static ?string $sdkToken = null;
    private static ?string $osAndLanguage = null;

    /** @var array<string, string|null> */
    private static array $packageVersions = [];

    /**
     * Return `aws-sdk-php/<version> ua/2.1`.
     */
    public static function sdkToken(): string
    {
        return self::$sdkToken ??= 'aws-sdk-php/'
            . self::sanitize(
                self::packageVersion(self::CORE_PACKAGE)
                    ?? self::packageVersion(self::ROOT_PACKAGE)
                    ?? self::FALLBACK_VERSION
            )
            . ' ua/2.1';
    }

    /**
     * Return `os/<family>#<version> lang/php#<version>`.
     */
    public static function osAndLanguage(): string
    {
        return self::$osAndLanguage ??= 'os/' . match (\PHP_OS_FAMILY) {
            'Linux' => 'linux',
            'Darwin' => 'macos',
            'Windows' => 'windows',
            default => 'other'
        }
            . '#' . self::sanitize(\php_uname('r'))
            . ' lang/php#' . self::sanitize(\PHP_VERSION);
    }

    /**
     * Return the installed version of a Composer package, or null.
     */
    public static function packageVersion(string $package): ?string
    {
        if (\array_key_exists($package, self::$packageVersions)) {
            return self::$packageVersions[$package];
        }

        $version = null;
        if (\class_exists(InstalledVersions::class)
            && InstalledVersions::isInstalled($package)
        ) {
            $version = InstalledVersions::getPrettyVersion($package);
        }

        if ($package === self::ROOT_PACKAGE && $version === null) {
            $version = InstalledVersions::getRootPackage()['pretty_version']
                ?? null;
        }

        return self::$packageVersions[$package] = $version;
    }

    /**
     * Replace characters outside the User-Agent token set with `-`.
     */
    public static function sanitize(string $value): string
    {
        return \preg_replace(self::ILLEGAL, '-', $value) ?? '';
    }

    /**
     * Return the `api/` token value for a service ID.
     *
     * Spaces become underscores and letters become lower case.
     */
    public static function serviceToken(string $sdkId): string
    {
        return self::sanitize(\strtolower(\str_replace(' ', '_', $sdkId)));
    }
}
