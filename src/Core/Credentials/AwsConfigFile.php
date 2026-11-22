<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Credentials;

use Aws\Core\Config\ConfigFileException;
use Aws\Core\Config\ConfigFileParser;

/**
 * Locate, read and parse the shared credentials and config files.
 *
 * Each file is read once and parsed with {@see ConfigFileParser}. Profiles
 * present in both files are merged, with credentials-file properties taking
 * precedence. `sso-session` and `services` sections come from the config
 * file only. The resulting object is the shared parsed view used by client
 * config resolution and by profile-backed credential providers.
 *
 * File locations come from an explicit path, then `AWS_CONFIG_FILE` or
 * `AWS_SHARED_CREDENTIALS_FILE`, then `~/.aws/config` or
 * `~/.aws/credentials`. The home directory comes from `HOME` on every
 * platform, then on Windows from `USERPROFILE`, then from `HOMEDRIVE`
 * followed by `HOMEPATH`. A path that is `~`, or starts with `~/` (or `~\`
 * on Windows), has its `~` replaced by that home directory.
 */
final class AwsConfigFile
{
    public const ENV_CONFIG_FILE = 'AWS_CONFIG_FILE';
    public const ENV_SHARED_CREDENTIALS_FILE = 'AWS_SHARED_CREDENTIALS_FILE';

    /**
     * Environment variables read to locate the files.
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
     * Create a parsed config file.
     *
     * @param array<string, AwsProfile> $profiles
     * @param array<string, array<string, string>> $ssoSessions
     * @param array<string, array<string, array<string, string>>> $services
     *     Services sections keyed by name, then by service key, e.g. `s3`.
     * @param ?string $credentialsFilePath The credentials file this view was read from.
     * @param ?string $configFilePath The config file this view was read from.
     */
    public function __construct(
        private readonly array $profiles,
        private readonly array $ssoSessions = [],
        private readonly array $services = [],
        public readonly ?string $credentialsFilePath = null,
        public readonly ?string $configFilePath = null
    ) {}

    /**
     * Load profiles from the credentials and config files at these paths.
     *
     * A file that is missing or unreadable is treated as empty.
     *
     * @throws ConfigFileException when a file has a line the specification defines
     *     as a parse failure
     */
    public static function fromFiles(?string $credentialsFile, ?string $configFile): self
    {
        $config = self::loadFile($configFile, true);
        $credentials = self::loadFile($credentialsFile, false);

        $profiles = [];
        $names = \array_keys(\array_replace($config['profiles'], $credentials['profiles']));
        foreach ($names as $name) {
            $name = (string) $name;
            $configSubProperties = \array_diff_key(
                $config['subProperties'][$name] ?? [],
                $credentials['profiles'][$name] ?? []
            );
            $profiles[$name] = new AwsProfile(
                $name,
                \array_replace(
                    $config['profiles'][$name] ?? [],
                    $credentials['profiles'][$name] ?? []
                ),
                \array_replace(
                    $configSubProperties,
                    $credentials['subProperties'][$name] ?? []
                )
            );
        }

        return new self(
            $profiles,
            $config['ssoSessions'],
            $config['services'],
            $credentialsFile,
            $configFile
        );
    }

    /**
     * Locate the files from explicit paths and the environment, then load them.
     *
     * A null or empty path falls back to the environment variable, then to
     * the default under the home directory. A file with an unresolvable
     * location is treated as missing.
     *
     * @param array<string, ?string> $env Values for the names in {@see ENV_NAMES}.
     * @throws ConfigFileException when a file has a line the specification defines
     *     as a parse failure
     */
    public static function fromEnvironment(
        array $env,
        ?string $credentialsFile = null,
        ?string $configFile = null,
        ?bool $windows = null
    ): self
    {
        return self::fromFiles(
            self::locate($credentialsFile, self::ENV_SHARED_CREDENTIALS_FILE, '~/.aws/credentials', $env, $windows),
            self::locate($configFile, self::ENV_CONFIG_FILE, '~/.aws/config', $env, $windows)
        );
    }

    /**
     * Check whether a profile exists.
     */
    public function hasProfile(string $name): bool
    {
        return isset($this->profiles[$name]);
    }

    /**
     * Return a profile by name.
     */
    public function getProfile(string $name): ?AwsProfile
    {
        return $this->profiles[$name] ?? null;
    }

    /**
     * Check whether an `sso-session` section exists.
     */
    public function hasSsoSession(string $name): bool
    {
        return isset($this->ssoSessions[$name]);
    }

    /**
     * Return an `sso-session` section by name.
     *
     * @return array<string, string>|null
     */
    public function getSsoSession(string $name): ?array
    {
        return $this->ssoSessions[$name] ?? null;
    }

    /**
     * Return a `services` section by name.
     *
     * The result maps each service key (e.g. `s3`) to its sub-properties
     * (e.g. `endpoint_url`).
     *
     * @return array<string, array<string, string>>|null
     */
    public function getServices(string $name): ?array
    {
        return $this->services[$name] ?? null;
    }

    /**
     * Return all parsed profiles.
     *
     * @return array<string, AwsProfile>
     */
    public function profiles(): array
    {
        return $this->profiles;
    }

    /**
     * @return array{
     *     profiles: array<string, array<string, string>>,
     *     subProperties: array<string, array<string, array<string, string>>>,
     *     ssoSessions: array<string, array<string, string>>,
     *     services: array<string, array<string, array<string, string>>>
     * }
     */
    private static function loadFile(?string $filename, bool $configFile): array
    {
        $contents = $filename === null || $filename === '' || !\is_file($filename) || !\is_readable($filename)
            ? false
            : @\file_get_contents($filename);

        return ConfigFileParser::parse(
            $contents === false ? '' : $contents,
            (string) $filename,
            $configFile
        );
    }

    /**
     * Resolve one file path: explicit path, then environment, then default.
     *
     * A `~username` prefix is returned as given.
     *
     * @param array<string, ?string> $env
     */
    private static function locate(
        ?string $configured,
        string $envName,
        string $default,
        array $env,
        ?bool $windows
    ): ?string
    {
        $windows ??= \PHP_OS_FAMILY === 'Windows';
        $path = $configured !== null && $configured !== ''
            ? $configured
            : self::envValue($env, $envName) ?? $default;
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
    private static function homeDirectory(array $env, bool $windows): ?string
    {
        $home = self::envValue($env, 'HOME');
        if ($home !== null || !$windows) {
            return $home;
        }

        $profile = self::envValue($env, 'USERPROFILE');
        if ($profile !== null) {
            return $profile;
        }

        $drive = self::envValue($env, 'HOMEDRIVE');
        $path = self::envValue($env, 'HOMEPATH');

        return $drive !== null && $path !== null ? $drive . $path : null;
    }

    /**
     * @param array<string, ?string> $env
     */
    private static function envValue(array $env, string $name): ?string
    {
        $value = $env[$name] ?? null;

        return $value === null || $value === '' ? null : $value;
    }
}
