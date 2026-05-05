<?php

namespace Aws\Test\Build\Command;

use Aws\Test\TestsUtility;
use AwsBuild\Command\RemoveServiceCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RemoveServiceCommand::class)]
final class RemoveServiceCommandTest extends TestCase
{
    private string $projectDir;

    protected function setUp(): void
    {
        $this->projectDir = sys_get_temp_dir() . '/' . uniqid('rsc_test_');
        mkdir($this->projectDir, 0755, true);
        mkdir($this->projectDir . '/src', 0755, true);
        mkdir($this->projectDir . '/src/data', 0755, true);
        mkdir($this->projectDir . '/.changes', 0755, true);

        $manifest = [
            'test-service' => [
                'namespace' => 'TestService',
                'serviceIdentifier' => 'Test Service',
            ],
            'other-service' => [
                'namespace' => 'OtherService',
                'serviceIdentifier' => 'Other Service',
            ],
        ];

        $this->createManifest($manifest);
        $this->createSdkPhp(['TestService', 'OtherService']);
        $this->createGrandfatheredJson(['TestService', 'OtherService']);
        $this->createGrandfatheredPhp(['TestService', 'OtherService']);
        $this->createClientFolder('TestService');
        $this->createClientFolder('OtherService');
        $this->createDataFolder('test-service');
        $this->createDataFolder('other-service');
    }

    protected function tearDown(): void
    {
        TestsUtility::cleanUpDir($this->projectDir);
    }

    public function testRemoveServiceByServiceKey(): void
    {
        $result = $this->executeCommand(['--service-id=test-service', '--commit=false']);

        $this->assertSame(0, $result['exitCode'], 'Exit code should be 0. stderr: ' . $result['stderr']);
        $this->assertServiceRemoved('test-service', 'TestService');
        $this->assertServicePreserved('other-service', 'OtherService');
    }

    public function testRemoveServiceByNamespace(): void
    {
        $result = $this->executeCommand(['--service-id=TestService', '--commit=false']);

        $this->assertSame(0, $result['exitCode'], 'Exit code should be 0. stderr: ' . $result['stderr']);
        $this->assertServiceRemoved('test-service', 'TestService');
        $this->assertServicePreserved('other-service', 'OtherService');
    }

    public function testRemoveServiceByServiceIdentifier(): void
    {
        $result = $this->executeCommand(['--service-id=Test Service', '--commit=false']);

        $this->assertSame(0, $result['exitCode'], 'Exit code should be 0. stderr: ' . $result['stderr']);
        $this->assertServiceRemoved('test-service', 'TestService');
        $this->assertServicePreserved('other-service', 'OtherService');
    }

    public function testDryRunDoesNotModifyFilesystem(): void
    {
        $before = $this->snapshotFilesystem();

        $result = $this->executeCommand(['--service-id=test-service', '--dry-run', '--commit=false']);

        $this->assertSame(0, $result['exitCode'], 'Exit code should be 0. stderr: ' . $result['stderr']);

        // Stdout should contain service info
        $this->assertStringContainsString('test-service', $result['stdout']);
        $this->assertStringContainsString('TestService', $result['stdout']);
        $this->assertStringContainsString('Test Service', $result['stdout']);

        // Filesystem should be unchanged
        $after = $this->snapshotFilesystem();
        $this->assertSame($before, $after, 'Dry run should not modify any files');
    }

    private function createManifest(array $entries): void
    {
        $jsonPath = $this->projectDir . '/src/data/manifest.json';
        file_put_contents(
            $jsonPath,
            json_encode($entries, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n"
        );

        $phpPath = $this->projectDir . '/src/data/manifest.json.php';
        file_put_contents(
            $phpPath,
            "<?php\nreturn " . var_export($entries, true) . ";\n"
        );
    }

    private function createSdkPhp(array $namespaces): void
    {
        $lines = ["<?php", "/**"];
        foreach ($namespaces as $ns) {
            $lines[] = " * @method \\Aws\\{$ns}\\{$ns}Client create{$ns}(array \$args = [])";
            $lines[] = " * @method \\Aws\\MultiRegionClient createMultiRegion{$ns}(array \$args = [])";
        }
        $lines[] = " */";
        $lines[] = "class Sdk { }";
        file_put_contents(
            $this->projectDir . '/src/Sdk.php',
            implode("\n", $lines) . "\n"
        );
    }

    private function createGrandfatheredJson(array $namespaces): void
    {
        $data = ['grandfathered-services' => $namespaces];
        file_put_contents(
            $this->projectDir . '/src/data/grandfathered-services.json',
            json_encode($data, JSON_PRETTY_PRINT) . "\n"
        );
    }

    private function createGrandfatheredPhp(array $namespaces): void
    {
        $items = implode(', ', array_map(fn($s) => "'" . $s . "'", $namespaces));
        $content = "<?php\n"
            . "// This file was auto-generated from sdk-root/src/data/grandfathered-services.json\n"
            . "return [ 'grandfathered-services' => [ " . $items . ", ],];\n";
        file_put_contents(
            $this->projectDir . '/src/data/grandfathered-services.json.php',
            $content
        );
    }

    private function createClientFolder(string $namespace): void
    {
        $dir = $this->projectDir . '/src/' . $namespace;
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        file_put_contents(
            $dir . '/' . $namespace . 'Client.php',
            "<?php\n// {$namespace} client stub\n"
        );
    }

    private function createDataFolder(string $serviceKey): void
    {
        $dir = $this->projectDir . '/src/data/' . $serviceKey;
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        file_put_contents(
            $dir . '/api-2.json',
            json_encode(['version' => '2.0'], JSON_PRETTY_PRINT) . "\n"
        );
    }

    private function executeCommand(array $args): array
    {
        $runnerPath = dirname(__DIR__, 3) . '/build/WorkflowCommandRunner.php';
        $allArgs = array_merge(
            [PHP_BINARY, $runnerPath, 'remove-service', '--project-root=' . $this->projectDir],
            $args
        );
        $cmdLine = implode(' ', array_map('escapeshellarg', $allArgs));

        $process = proc_open($cmdLine, [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ], $pipes);

        fclose($pipes[0]);
        $stdout = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[2]);
        $exitCode = proc_close($process);

        return ['exitCode' => $exitCode, 'stdout' => $stdout, 'stderr' => $stderr];
    }

    private function assertServiceRemoved(string $serviceKey, string $namespace): void
    {
        // Client folder deleted
        $this->assertDirectoryDoesNotExist(
            $this->projectDir . '/src/' . $namespace,
            "Client folder src/{$namespace}/ should have been deleted"
        );

        // Data folder deleted
        $this->assertDirectoryDoesNotExist(
            $this->projectDir . '/src/data/' . $serviceKey,
            "Data folder src/data/{$serviceKey}/ should have been deleted"
        );

        // Sdk.php annotations removed
        $sdkContent = file_get_contents($this->projectDir . '/src/Sdk.php');
        $this->assertStringNotContainsString(
            'create' . $namespace . '(',
            $sdkContent,
            "Sdk.php should not contain create{$namespace}( annotation"
        );
        $this->assertStringNotContainsString(
            'createMultiRegion' . $namespace . '(',
            $sdkContent,
            "Sdk.php should not contain createMultiRegion{$namespace}( annotation"
        );

        // Grandfathered JSON entry removed
        $gfJson = json_decode(
            file_get_contents($this->projectDir . '/src/data/grandfathered-services.json'),
            true
        );
        $this->assertNotContains(
            $namespace,
            $gfJson['grandfathered-services'],
            "grandfathered-services.json should not contain {$namespace}"
        );

        // Grandfathered PHP entry removed
        $gfPhp = include $this->projectDir . '/src/data/grandfathered-services.json.php';
        $this->assertNotContains(
            $namespace,
            $gfPhp['grandfathered-services'],
            "grandfathered-services.json.php should not contain {$namespace}"
        );

        // Manifest entry removed
        $manifest = json_decode(
            file_get_contents($this->projectDir . '/src/data/manifest.json'),
            true
        );
        $this->assertArrayNotHasKey(
            $serviceKey,
            $manifest,
            "manifest.json should not contain key {$serviceKey}"
        );

        // Changelog entry created
        $changelogPath = $this->projectDir . '/.changes/nextrelease/remove-' . $serviceKey . '.json';
        $this->assertFileExists($changelogPath, "Changelog entry should exist");
        $changelog = json_decode(file_get_contents($changelogPath), true);
        $this->assertSame('api-change', $changelog[0]['type']);
        $this->assertSame($namespace, $changelog[0]['category']);
        $this->assertStringContainsString($namespace, $changelog[0]['description']);
    }

    private function assertServicePreserved(string $serviceKey, string $namespace): void
    {
        // Client folder exists
        $this->assertDirectoryExists(
            $this->projectDir . '/src/' . $namespace,
            "Client folder src/{$namespace}/ should still exist"
        );

        // Data folder exists
        $this->assertDirectoryExists(
            $this->projectDir . '/src/data/' . $serviceKey,
            "Data folder src/data/{$serviceKey}/ should still exist"
        );

        // Sdk.php annotations present
        $sdkContent = file_get_contents($this->projectDir . '/src/Sdk.php');
        $this->assertStringContainsString(
            'create' . $namespace . '(',
            $sdkContent,
            "Sdk.php should still contain create{$namespace}( annotation"
        );

        // Grandfathered JSON entry present
        $gfJson = json_decode(
            file_get_contents($this->projectDir . '/src/data/grandfathered-services.json'),
            true
        );
        $this->assertContains(
            $namespace,
            $gfJson['grandfathered-services'],
            "grandfathered-services.json should still contain {$namespace}"
        );

        // Manifest entry present
        $manifest = json_decode(
            file_get_contents($this->projectDir . '/src/data/manifest.json'),
            true
        );
        $this->assertArrayHasKey(
            $serviceKey,
            $manifest,
            "manifest.json should still contain key {$serviceKey}"
        );
    }

    private function snapshotFilesystem(): array
    {
        $snapshot = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($this->projectDir, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $item) {
            $relativePath = substr($item->getPathname(), strlen($this->projectDir));
            if ($item->isDir()) {
                $snapshot[$relativePath] = 'DIR';
            } else {
                $snapshot[$relativePath] = md5_file($item->getPathname());
            }
        }
        ksort($snapshot);

        return $snapshot;
    }
}
