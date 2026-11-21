<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Config;

use Aws\Core\Config\ConfigFileException;
use Aws\Core\Config\ConfigFileParser;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Run the configuration-file specification cases against ConfigFileParser.
 *
 * Each case parses its config and credentials file text and compares the
 * profiles, `sso-session` sections and `services` sections with the
 * expected output. A property whose expected value is an object is compared
 * with that property's sub-properties.
 */
final class ConfigFileParserTest extends TestCase
{
    private const FIXTURES = [
        'config-file-parser-tests.json',
        'config-file-standardizer-tests.json',
    ];

    /**
     * @return iterable<string, array{array<string, string>, array<string, mixed>}>
     */
    public static function specificationCases(): iterable
    {
        foreach (self::FIXTURES as $fixture) {
            $suite = \json_decode(
                (string) \file_get_contents(__DIR__ . '/fixtures/' . $fixture),
                true,
                flags: \JSON_THROW_ON_ERROR
            );
            foreach ($suite['tests'] as $case) {
                yield $fixture . ': ' . $case['name'] => [$case['input'], $case['output']];
            }
        }
    }

    /**
     * @param array<string, string> $input
     * @param array<string, mixed> $output
     */
    #[DataProvider('specificationCases')]
    public function testSpecificationCase(array $input, array $output): void
    {
        if (isset($output['errorContaining'])) {
            $this->expectException(ConfigFileException::class);
            $this->expectExceptionMessage($output['errorContaining']);
        }

        $config = ConfigFileParser::parse($input['configFile'] ?? '', 'config', true);
        $credentials = ConfigFileParser::parse($input['credentialsFile'] ?? '', 'credentials', false);

        $this->assertEquals($output['profiles'], $this->mergedProfiles($config, $credentials));
        if (isset($output['ssoSessions'])) {
            $this->assertEquals($output['ssoSessions'], $config['ssoSessions']);
        }
        if (isset($output['services'])) {
            $this->assertEquals($output['services'], $config['services']);
        }
    }

    public function testParseSectionsFromSingleFile(): void
    {
        $parsed = ConfigFileParser::parse(
            "[profile a]\nregion = us-west-2\nsub =\n  x = 1\n[sso-session s]\nk = v\n[services svc]\ns3 =\n  endpoint_url = u\n",
            'config',
            true
        );

        $this->assertSame(['a' => ['region' => 'us-west-2', 'sub' => "\nx = 1"]], $parsed['profiles']);
        $this->assertSame(['a' => ['sub' => ['x' => '1']]], $parsed['subProperties']);
        $this->assertSame(['s' => ['k' => 'v']], $parsed['ssoSessions']);
        $this->assertSame(['svc' => ['s3' => ['endpoint_url' => 'u']]], $parsed['services']);
    }

    public function testErrorNamesFileAndLineWithoutValues(): void
    {
        try {
            ConfigFileParser::parse("[profile a]\nsecret_key = hunter2\nno equals sign here\n", '/home/u/.aws/config', true);
            $this->fail('Expected a ConfigFileException.');
        } catch (ConfigFileException $e) {
            $this->assertStringContainsString('/home/u/.aws/config', $e->getMessage());
            $this->assertStringContainsString('line 3', $e->getMessage());
            $this->assertStringNotContainsString('hunter2', $e->getMessage());
            $this->assertStringNotContainsString('no equals sign here', $e->getMessage());
        }
    }

    public function testRedefinedPropertyDropsEarlierSubProperties(): void
    {
        $parsed = ConfigFileParser::parse(
            "[profile a]\nsub =\n  x = 1\n[profile a]\nsub = plain\n",
            'config',
            true
        );

        $this->assertSame(['a' => ['sub' => 'plain']], $parsed['profiles']);
        $this->assertSame([], $parsed['subProperties']);
    }

    public function testDuplicateServicesSectionsMergeWithLaterValueWinning(): void
    {
        $parsed = ConfigFileParser::parse(
            "[services s]\ns3 =\n  endpoint_url = old\n  region = r\n[services s]\ns3 =\n  endpoint_url = new\n",
            'config',
            true
        );

        $this->assertSame(['s' => ['s3' => ['endpoint_url' => 'new']]], $parsed['services']);
    }

    /**
     * Merge both files like AwsConfigFile: credentials file properties win.
     *
     * @param array<string, mixed> $config
     * @param array<string, mixed> $credentials
     * @return array<string, array<string, mixed>>
     */
    private function mergedProfiles(array $config, array $credentials): array
    {
        $merged = [];
        $names = \array_keys(\array_replace($config['profiles'], $credentials['profiles']));
        foreach ($names as $name) {
            $name = (string) $name;
            $properties = \array_replace(
                $config['profiles'][$name] ?? [],
                $credentials['profiles'][$name] ?? []
            );
            $subProperties = \array_replace(
                \array_diff_key($config['subProperties'][$name] ?? [], $credentials['profiles'][$name] ?? []),
                $credentials['subProperties'][$name] ?? []
            );
            foreach ($properties as $key => $value) {
                $properties[$key] = $subProperties[(string) $key] ?? $value;
            }
            $merged[$name] = $properties;
        }

        return $merged;
    }
}
