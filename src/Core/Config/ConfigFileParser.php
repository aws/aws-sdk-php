<?php

declare(strict_types=1);

namespace Aws\Core\Config;

/**
 * Parse the raw text of an AWS shared config or credentials file.
 *
 * This is the "config file parser" stage of the configuration-file specification. It
 * turns file text into an ordered list of raw sections, each holding its raw
 * header name and its properties. Property keys are stored lower-cased so
 * later stages see `REGION` and `region` as the same key. Profile prefixes,
 * name validation and merging belong to {@see ConfigFileStandardizer}.
 *
 * Supported line types: blank lines, `#` and `;` comment lines, section
 * definitions, property definitions, property continuations and
 * sub-properties (continuations of a property whose value is blank). Any
 * other line stops parsing with a {@see ConfigFileException} that names the
 * file and line number and leaves values out of the message.
 */
final class ConfigFileParser
{
    /**
     * Parse file text into raw sections in file order.
     *
     * @return list<array{name: string, properties: array<string, string>}>
     */
    public static function parse(string $contents, string $source): array
    {
        $sections = [];
        $current = null;
        $property = null;
        $subProperties = false;
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
                $sections[] = [
                    'name' => self::parseSectionName($line, $source, $lineNumber),
                    'properties' => [],
                ];
                $current = \array_key_last($sections);
                $property = null;
                continue;
            }

            if ($line[0] === ' ' || $line[0] === "\t") {
                if ($current === null || $property === null) {
                    throw ConfigFileException::atLine(
                        $source,
                        $lineNumber,
                        'Expected a profile or property definition'
                    );
                }

                $value = \trim($line, " \t");
                if ($subProperties) {
                    self::splitProperty($value, $source, $lineNumber);
                }
                $sections[$current]['properties'][$property] .= "\n" . $value;
                continue;
            }

            if ($current === null) {
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
            $sections[$current]['properties'][$key] = $value;
            $property = $key;
            $subProperties = $value === '';
        }

        return $sections;
    }

    /**
     * Split a `key = value` definition at its first `=` sign.
     *
     * @return array{0: string, 1: string}
     */
    public static function splitProperty(
        string $definition,
        string $source,
        int $lineNumber
    ): array {
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
    ): string {
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
}
