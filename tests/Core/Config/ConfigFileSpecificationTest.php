<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Config;

use Aws\Core\Config\ConfigFileException;
use Aws\Core\Credentials\AwsProfileFile;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Run the configuration-file specification parser and standardizer cases.
 *
 * Each case writes its config and credentials file text to a temp directory,
 * loads it with {@see AwsProfileFile::fromFiles()}, and compares profiles,
 * `sso-session` sections and `services` sections with the expected output.
 * A property whose expected value is an object is compared with that
 * property's sub-properties.
 */
final class ConfigFileSpecificationTest extends TestCase
{
    private const FIXTURES = [
        'config-file-parser-tests.json',
        'config-file-standardizer-tests.json',
    ];

    /** @var list<string> */
    private array $files = [];

    protected function tearDown(): void
    {
        foreach ($this->files as $file) {
            @\unlink($file);
        }
    }

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
        $credentials = $this->writeFile($input['credentialsFile'] ?? null);
        $config = $this->writeFile($input['configFile'] ?? null);

        if (isset($output['errorContaining'])) {
            $this->expectException(ConfigFileException::class);
            $this->expectExceptionMessage($output['errorContaining']);
        }

        $profileFile = AwsProfileFile::fromFiles($credentials, $config);

        $this->assertEquals($output['profiles'], $this->actualProfiles($profileFile));
        foreach ($output['ssoSessions'] ?? [] as $name => $session) {
            $this->assertSame($session, $profileFile->getSsoSession((string) $name));
        }
        foreach ($output['services'] ?? [] as $name => $services) {
            $this->assertEquals($services, $profileFile->getServices((string) $name));
        }
        if (($output['ssoSessions'] ?? null) === []) {
            $this->assertNoSections($profileFile, 'sso-session', $input);
        }
        if (($output['services'] ?? null) === []) {
            $this->assertNoSections($profileFile, 'services', $input);
        }
    }

    /**
     * @return array<string, array<string, string|array<string, string>>>
     */
    private function actualProfiles(AwsProfileFile $profileFile): array
    {
        $actual = [];
        foreach ($profileFile->profiles() as $name => $profile) {
            $properties = [];
            foreach ($profile->properties as $key => $value) {
                $subProperties = $profile->getSubProperties((string) $key);
                $properties[$key] = $subProperties === [] ? $value : $subProperties;
            }
            $actual[$name] = $properties;
        }

        return $actual;
    }

    /**
     * Check every section name written in the input is absent.
     *
     * @param array<string, string> $input
     */
    private function assertNoSections(
        AwsProfileFile $profileFile,
        string $kind,
        array $input
    ): void {
        $text = ($input['configFile'] ?? '') . "\n" . ($input['credentialsFile'] ?? '');
        \preg_match_all('/\[\s*' . \preg_quote($kind, '/') . '\s*([^\]]*)\]/', $text, $matches);
        foreach ($matches[1] as $name) {
            $name = \trim($name);
            $this->assertNull(
                $kind === 'services'
                    ? $profileFile->getServices($name)
                    : $profileFile->getSsoSession($name),
                $kind . ' section "' . $name . '" should be dropped'
            );
        }
    }

    private function writeFile(?string $contents): string
    {
        $file = \sys_get_temp_dir() . '/aws-config-specification-' . \bin2hex(\random_bytes(6));
        if ($contents !== null) {
            \file_put_contents($file, $contents);
            $this->files[] = $file;
        }

        return $file;
    }
}
