<?php

declare(strict_types=1);

namespace Aws\Core\Config;

/**
 * Resolve the locations of the shared config and credentials files.
 *
 * The home directory comes from `HOME` on every platform, then on Windows
 * from `USERPROFILE`, then from `HOMEDRIVE` followed by `HOMEPATH`. A path
 * that is `~`, or starts with `~/` (or `~\` on Windows), has its `~`
 * replaced by that home directory.
 */
final class ConfigFileLocation
{
    public const ENV_CONFIG_FILE = 'AWS_CONFIG_FILE';
    public const ENV_SHARED_CREDENTIALS_FILE = 'AWS_SHARED_CREDENTIALS_FILE';

    /**
     * Environment variables read by this class.
     */
    public const ENV_NAMES = [
        self::ENV_CONFIG_FILE,
        self::ENV_SHARED_CREDENTIALS_FILE,
        'HOME',
        'USERPROFILE',
        'HOMEDRIVE',
        'HOMEPATH',
    ];

    /**
     * Resolve the shared credentials file path.
     *
     * @param array<string, ?string> $env
     */
    public static function credentialsFile(
        ?string $configured,
        array $env,
        ?bool $windows = null
    ): ?string {
        return self::resolve(
            $configured,
            self::ENV_SHARED_CREDENTIALS_FILE,
            '~/.aws/credentials',
            $env,
            $windows
        );
    }

    /**
     * Resolve the shared config file path.
     *
     * @param array<string, ?string> $env
     */
    public static function configFile(
        ?string $configured,
        array $env,
        ?bool $windows = null
    ): ?string {
        return self::resolve(
            $configured,
            self::ENV_CONFIG_FILE,
            '~/.aws/config',
            $env,
            $windows
        );
    }

    /**
     * Resolve the user's home directory.
     *
     * @param array<string, ?string> $env
     */
    public static function homeDirectory(array $env, ?bool $windows = null): ?string
    {
        $home = self::value($env, 'HOME');
        if ($home !== null) {
            return $home;
        }

        if (!($windows ?? \PHP_OS_FAMILY === 'Windows')) {
            return null;
        }

        $profile = self::value($env, 'USERPROFILE');
        if ($profile !== null) {
            return $profile;
        }

        $drive = self::value($env, 'HOMEDRIVE');
        $path = self::value($env, 'HOMEPATH');

        return $drive !== null && $path !== null ? $drive . $path : null;
    }

    /**
     * Replace a leading `~` with the user's home directory.
     *
     * A `~username` prefix is returned as given.
     *
     * @param array<string, ?string> $env
     */
    public static function expandHome(
        string $path,
        array $env,
        ?bool $windows = null
    ): ?string {
        $windows ??= \PHP_OS_FAMILY === 'Windows';
        $isHomePath = $path === '~'
            || \str_starts_with($path, '~/')
            || ($windows && \str_starts_with($path, '~\\'));
        if (!$isHomePath) {
            return $path;
        }

        $home = self::homeDirectory($env, $windows);

        return $home === null ? null : $home . \substr($path, 1);
    }

    /**
     * @param array<string, ?string> $env
     */
    private static function resolve(
        ?string $configured,
        string $envName,
        string $default,
        array $env,
        ?bool $windows
    ): ?string {
        $path = $configured !== null && $configured !== ''
            ? $configured
            : self::value($env, $envName) ?? $default;

        return self::expandHome($path, $env, $windows);
    }

    /**
     * @param array<string, ?string> $env
     */
    private static function value(array $env, string $name): ?string
    {
        $value = $env[$name] ?? null;

        return $value === null || $value === '' ? null : $value;
    }
}
