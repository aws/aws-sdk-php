<?php

declare(strict_types=1);

namespace Aws\Core\Config;

/**
 * Turn raw parsed sections into standardized profiles and sections.
 *
 * This is the "config file standardizer" stage of the configuration-file
 * specification. It applies the per-file-type section rules, keeps only valid profile,
 * section and property names, merges sections repeated in one file (later
 * properties win), gives `[profile default]` precedence over `[default]` in
 * the config file, and parses sub-properties out of blank-valued properties.
 *
 * Config file sections: `[default]`, `[profile NAME]`, `[sso-session NAME]`
 * and `[services NAME]`. Credentials file sections: `[NAME]`.
 *
 * @phpstan-type Standardized array{
 *     profiles: array<string, array<string, string>>,
 *     subProperties: array<string, array<string, array<string, string>>>,
 *     ssoSessions: array<string, array<string, string>>,
 *     services: array<string, array<string, array<string, string>>>
 * }
 */
final class ConfigFileStandardizer
{
    private const IDENTIFIER = '/^[A-Za-z0-9_\-\/.%@:+]+$/';
    private const SECTION_PREFIX = '/^(profile|sso-session|services)[ \t]+(.*)$/s';

    private const PROFILE = 'profile';
    private const SSO_SESSION = 'sso-session';
    private const SERVICES = 'services';

    /**
     * Standardize the raw sections of one file.
     *
     * @param list<array{name: string, properties: array<string, string>}> $sections
     * @return Standardized
     */
    public static function standardize(array $sections, bool $configFile): array
    {
        $classified = [];
        $hasPrefixedDefault = false;
        foreach ($sections as $section) {
            $type = $configFile
                ? self::classifyConfigSection($section['name'])
                : self::classifyCredentialsSection($section['name']);
            if ($type === null) {
                continue;
            }

            if ($type[0] === self::PROFILE && $type[1] === 'default' && $type[2]) {
                $hasPrefixedDefault = true;
            }
            $classified[] = [$type, self::validProperties($section['properties'])];
        }

        $merged = [self::PROFILE => [], self::SSO_SESSION => [], self::SERVICES => []];
        foreach ($classified as [[$kind, $name, $prefixed], $properties]) {
            if ($kind === self::PROFILE && $name === 'default' && !$prefixed && $hasPrefixedDefault) {
                continue;
            }

            $merged[$kind][$name] = \array_replace($merged[$kind][$name] ?? [], $properties);
        }

        $subProperties = [];
        foreach ($merged[self::PROFILE] as $name => $properties) {
            $parsed = self::subPropertiesOf($properties);
            if ($parsed !== []) {
                $subProperties[(string) $name] = $parsed;
            }
        }

        $services = [];
        foreach ($merged[self::SERVICES] as $name => $properties) {
            $services[(string) $name] = self::subPropertiesOf($properties);
        }

        return [
            'profiles' => $merged[self::PROFILE],
            'subProperties' => $subProperties,
            'ssoSessions' => $merged[self::SSO_SESSION],
            'services' => $services,
        ];
    }

    /**
     * Parse the sub-properties held in a blank-valued property's raw value.
     *
     * A value that starts with a newline came from a blank property followed
     * by continuation lines; each continuation line is a `key = value` pair.
     *
     * @return array<string, string>
     */
    public static function parseSubProperties(string $rawValue): array
    {
        if (!\str_starts_with($rawValue, "\n")) {
            return [];
        }

        $parsed = [];
        foreach (\explode("\n", \substr($rawValue, 1)) as $line) {
            $equals = \strpos($line, '=');
            if ($equals === false) {
                continue;
            }

            $key = \strtolower(\trim(\substr($line, 0, $equals), " \t"));
            if (\preg_match(self::IDENTIFIER, $key) !== 1) {
                continue;
            }
            $parsed[$key] = \trim(\substr($line, $equals + 1), " \t");
        }

        return $parsed;
    }

    /**
     * @param array<string, string> $properties
     * @return array<string, array<string, string>>
     */
    private static function subPropertiesOf(array $properties): array
    {
        $parsed = [];
        foreach ($properties as $key => $value) {
            $values = self::parseSubProperties($value);
            if ($values !== []) {
                $parsed[(string) $key] = $values;
            }
        }

        return $parsed;
    }

    /**
     * @param array<string, string> $properties
     * @return array<string, string>
     */
    private static function validProperties(array $properties): array
    {
        $valid = [];
        foreach ($properties as $key => $value) {
            if (\preg_match(self::IDENTIFIER, (string) $key) === 1) {
                $valid[$key] = $value;
            }
        }

        return $valid;
    }

    /**
     * @return array{0: string, 1: string, 2: bool}|null
     */
    private static function classifyConfigSection(string $header): ?array
    {
        if (\preg_match(self::SECTION_PREFIX, $header, $match) === 1) {
            $name = \trim($match[2], " \t");

            return self::isIdentifier($name) ? [$match[1], $name, true] : null;
        }

        return $header === 'default' ? [self::PROFILE, 'default', false] : null;
    }

    /**
     * @return array{0: string, 1: string, 2: bool}|null
     */
    private static function classifyCredentialsSection(string $header): ?array
    {
        if (\preg_match('/^profile[ \t]/', $header) === 1 || !self::isIdentifier($header)) {
            return null;
        }

        return [self::PROFILE, $header, false];
    }

    private static function isIdentifier(string $value): bool
    {
        return \preg_match(self::IDENTIFIER, $value) === 1;
    }
}
