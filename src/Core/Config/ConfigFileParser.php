<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Config;

/**
 * Parse the raw text of an AWS shared config or credentials file.
 *
 * This is the "config file parser" and "config file standardizer" stages of
 * the configuration-file specification, done in one pass over the lines.
 * Each section header is classified as it is read. Config file sections are
 * `[default]`, `[profile NAME]`, `[sso-session NAME]` and `[services NAME]`;
 * credentials file sections are `[NAME]`. Sections with an invalid name are
 * dropped, sections repeated in one file are merged (later properties win),
 * and `[profile default]` takes precedence over `[default]`. Property keys
 * are lower-cased, and properties with an invalid key are dropped.
 *
 * Supported line types: blank lines, `#` and `;` comment lines, section
 * definitions, property definitions, property continuations and
 * sub-properties (continuations of a property whose value is blank). Any
 * other line stops parsing with a {@see ConfigFileException} that names the
 * file and line number and leaves values out of the message.
 *
 * @phpstan-type Parsed array{
 *     profiles: array<string, array<string, string>>,
 *     subProperties: array<string, array<string, array<string, string>>>,
 *     ssoSessions: array<string, array<string, string>>,
 *     services: array<string, array<string, array<string, string>>>
 * }
 */
final class ConfigFileParser
{
    private const IDENTIFIER = '/^[A-Za-z0-9_\-\/.%@:+]+$/';
    private const SECTION_PREFIX = '/^(profile|sso-session|services)[ \t]+(.*)$/s';

    private const PROFILE = 'profile';
    private const SSO_SESSION = 'sso-session';
    private const SERVICES = 'services';

    /** Result key holding each kind's properties. */
    private const PROPERTIES = [
        self::PROFILE => 'profiles',
        self::SSO_SESSION => 'ssoSessions',
    ];

    /** Result key holding each kind's sub-properties. */
    private const SUB_PROPERTIES = [
        self::PROFILE => 'subProperties',
        self::SERVICES => 'services',
    ];

    /**
     * Parse file text into standardized profiles and sections.
     *
     * @return Parsed
     */
    public static function parse(string $contents, string $source, bool $configFile): array
    {
        $result = ['profiles' => [], 'subProperties' => [], 'ssoSessions' => [], 'services' => []];
        $inSection = false;
        $hasPrefixedDefault = false;
        $kind = null;
        $name = '';
        $key = null;
        $stored = false;
        $blank = false;
        $lines = \preg_split('/\r\n|\n|\r/', $contents);
        $lineNumber = 0;

        foreach ($lines === false ? [] : $lines as $line) {
            ++$lineNumber;
            if (\preg_match('/^[\t ]*$/', $line) === 1
                || $line[0] === '#'
                || $line[0] === ';'
            ) {
                continue;
            }

            if ($line[0] === '[') {
                $header = self::parseSectionName($line, $source, $lineNumber);
                $inSection = true;
                $key = null;
                [$kind, $name, $prefixed] = $configFile
                    ? self::classifyConfigSection($header)
                    : self::classifyCredentialsSection($header);
                if ($configFile && $kind === self::PROFILE && $name === 'default') {
                    if ($prefixed && !$hasPrefixedDefault) {
                        $hasPrefixedDefault = true;
                        unset($result['profiles']['default'], $result['subProperties']['default']);
                    } elseif (!$prefixed && $hasPrefixedDefault) {
                        $kind = null;
                    }
                }
                if ($kind === self::SERVICES) {
                    $result['services'][$name] ??= [];
                } elseif ($kind !== null) {
                    $result[self::PROPERTIES[$kind]][$name] ??= [];
                }
                continue;
            }

            if ($line[0] === ' ' || $line[0] === "\t") {
                if ($key === null) {
                    throw ConfigFileException::atLine(
                        $source,
                        $lineNumber,
                        'Expected a profile or property definition'
                    );
                }

                $value = \trim($line, " \t");
                if ($blank) {
                    [$subKey, $subValue] = self::splitProperty($value, $source, $lineNumber);
                    $subKey = \strtolower($subKey);
                    if ($stored
                        && isset(self::SUB_PROPERTIES[$kind])
                        && \preg_match(self::IDENTIFIER, $subKey) === 1
                    ) {
                        $result[self::SUB_PROPERTIES[$kind]][$name][$key][$subKey] = $subValue;
                    }
                }
                if ($stored && $kind !== self::SERVICES) {
                    $result[self::PROPERTIES[$kind]][$name][$key] .= "\n" . $value;
                }
                continue;
            }

            if (!$inSection) {
                throw ConfigFileException::atLine(
                    $source,
                    $lineNumber,
                    'Expected a profile definition'
                );
            }

            [$key, $value] = self::splitProperty(
                \trim(self::stripPropertyComment($line), " \t"),
                $source,
                $lineNumber
            );
            $key = \strtolower($key);
            $blank = $value === '';
            $stored = $kind !== null && \preg_match(self::IDENTIFIER, $key) === 1;
            if (!$stored) {
                continue;
            }

            if ($kind !== self::SERVICES) {
                $result[self::PROPERTIES[$kind]][$name][$key] = $value;
            }
            if (isset(self::SUB_PROPERTIES[$kind])) {
                $subs = self::SUB_PROPERTIES[$kind];
                unset($result[$subs][$name][$key]);
                if ($kind === self::PROFILE && ($result[$subs][$name] ?? null) === []) {
                    unset($result[$subs][$name]);
                }
            }
        }

        return $result;
    }

    /**
     * Split a `key = value` definition at its first `=` sign.
     *
     * @return array{0: string, 1: string}
     */
    private static function splitProperty(
        string $definition,
        string $source,
        int $lineNumber
    ): array
    {
        $equals = \strpos($definition, '=');
        if ($equals === false) {
            throw ConfigFileException::atLine(
                $source,
                $lineNumber,
                "Expected an '=' sign defining a property"
            );
        }

        $key = \trim(\substr($definition, 0, $equals), " \t");
        if ($key === '') {
            throw ConfigFileException::atLine(
                $source,
                $lineNumber,
                'Property did not have a name'
            );
        }

        return [$key, \trim(\substr($definition, $equals + 1), " \t")];
    }

    private static function parseSectionName(
        string $line,
        string $source,
        int $lineNumber
    ): string
    {
        $commentStart = \strcspn($line, '#;');
        $definition = \rtrim(\substr($line, 0, $commentStart), " \t");
        if (!\str_ends_with($definition, ']')) {
            throw ConfigFileException::atLine(
                $source,
                $lineNumber,
                "Section definition must end with ']'"
            );
        }

        return \trim(\substr($definition, 1, -1), " \t");
    }

    /**
     * Remove a trailing comment that is preceded by whitespace.
     */
    private static function stripPropertyComment(string $line): string
    {
        if (\preg_match('/[ \t][#;]/', $line, $match, \PREG_OFFSET_CAPTURE) === 1) {
            return \substr($line, 0, $match[0][1]);
        }

        return $line;
    }

    /**
     * Return the kind, name and whether the header carried a prefix.
     * A dropped section has a null kind.
     *
     * @return array{0: ?string, 1: string, 2: bool}
     */
    private static function classifyConfigSection(string $header): array
    {
        if (\preg_match(self::SECTION_PREFIX, $header, $match) === 1) {
            $name = \trim($match[2], " \t");

            return \preg_match(self::IDENTIFIER, $name) === 1
                ? [$match[1], $name, true]
                : [null, '', false];
        }

        return $header === 'default' ? [self::PROFILE, 'default', false] : [null, '', false];
    }

    /**
     * @return array{0: ?string, 1: string, 2: bool}
     */
    private static function classifyCredentialsSection(string $header): array
    {
        if (\preg_match('/^profile[ \t]/', $header) === 1
            || \preg_match(self::IDENTIFIER, $header) !== 1
        ) {
            return [null, '', false];
        }

        return [self::PROFILE, $header, false];
    }
}
