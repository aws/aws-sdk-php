<?php

declare(strict_types=1);

namespace Aws\Core\Credentials;

use Aws\Core\Config\ConfigFileException;
use Aws\Core\Config\ConfigFileParser;
use Aws\Core\Config\ConfigFileStandardizer;

/**
 * Parse shared credentials and config files.
 *
 * Each file is read once, parsed with {@see ConfigFileParser} and
 * standardized with {@see ConfigFileStandardizer}. Profiles present in both
 * files are merged, with credentials-file properties taking precedence.
 * `sso-session` and `services` sections come from the config file only. The
 * resulting object is the shared parsed view used by client config
 * resolution and by profile-backed credential providers.
 */
final class AwsProfileFile
{
    /**
     * Create a parsed profile file.
     *
     * @param array<string, AwsProfile> $profiles
     * @param array<string, array<string, string>> $ssoSessions
     * @param array<string, array<string, array<string, string>>> $services
     *     Services sections keyed by name, then by service key, e.g. `s3`.
     */
    public function __construct(
        private readonly array $profiles,
        private readonly array $ssoSessions = [],
        private readonly array $services = []
    ) {}

    /**
     * Load profiles from the standard AWS config files.
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

        return new self($profiles, $config['ssoSessions'], $config['services']);
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

        return ConfigFileStandardizer::standardize(
            ConfigFileParser::parse($contents === false ? '' : $contents, (string) $filename),
            $configFile
        );
    }
}
