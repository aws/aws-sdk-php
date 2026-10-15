<?php

namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\Bdd\BddRuleset;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\Ruleset\Ruleset;
use Aws\Test\TestsUtility;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(EndpointDefinitionProvider::class)]
class EndpointDefinitionProviderTest extends TestCase
{
    public function testProvidesRuleset()
    {
        $rulesetDefinition = EndpointDefinitionProvider::getEndpointRuleset(
            's3', 'latest'
        );
        $this->assertIsArray($rulesetDefinition);
        $this->assertArrayHasKey('parameters', $rulesetDefinition);
    }

    public function testProvidesRulesetTests()
    {
        $testsDefinition = EndpointDefinitionProvider::getEndpointTests(
            's3', 'latest'
        );
        $this->assertIsArray($testsDefinition);
        $this->assertArrayHasKey('testCases', $testsDefinition);
    }

    public function testProvidesPartitions()
    {
        $partitions = EndpointDefinitionProvider::getPartitions();
        $this->assertIsArray($partitions);
        $this->assertArrayHasKey('partitions', $partitions);
    }

    public function testThrowsExceptionOnInvalidService()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid service name.');
        EndpointDefinitionProvider::getEndpointRuleset('foo', 'latest');
    }

    public function testThrowsExceptionOnInvalidApiVersion()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid api version.');
        EndpointDefinitionProvider::getEndpointRuleset('s3', '10-22-2022');
    }

    public static function getEndpointFileProvider(): array
    {
        return [
            ['Ruleset'],
            ['Tests']
        ];
    }

    #[DataProvider('getEndpointFileProvider')]
    public function testThrowsExceptionOnMissingFiles($type)
    {
        $method = 'getEndpoint' . $type;
        $type = strtolower($type);
        $tmpdir = sys_get_temp_dir();
        if (!is_dir($tmpdir . '/data/foo-service/08-05-1989/')) {
            mkdir($tmpdir . '/data/foo-service/08-05-1989/', 0777, true);
        }
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Specified {$type} endpoint file for foo-service with api version 08-05-1989 does not exist.");
        EndpointDefinitionProvider::$method('foo-service', '08-05-1989', $tmpdir . '/data');
        rmdir($tmpdir . 'data/' . 's3/' . '/08-05-1989');
        rmdir($tmpdir . 'data/' . 's3/');
        rmdir($tmpdir . 'data');
    }

    public function testGetParsedRulesetReturnsTreeRulesetForTreeService()
    {
        $baseDir = sys_get_temp_dir() . '/aws-tree-parsed-' . uniqid();
        $serviceDir = $baseDir . '/widget/2024-01-01';
        if (is_dir($serviceDir)) {
            // To make sure dir is clean and no bdd file is present
            TestsUtility::cleanUpDir($serviceDir);
        }
        mkdir($serviceDir, 0777, true);

        try {
            file_put_contents(
                $serviceDir . '/endpoint-rule-set-1.json',
                json_encode([
                    'version' => '1.1',
                    'parameters' => [],
                    'rules' => [],
                ])
            );

            $parsed = EndpointDefinitionProvider::getParsedRuleset(
                'widget',
                '2024-01-01',
                EndpointDefinitionProvider::getPartitions(),
                $baseDir
            );

            $this->assertInstanceOf(
                Ruleset::class,
                $parsed
            );
        } finally {
            TestsUtility::cleanUpDir($baseDir);
        }
    }

    public function testGetParsedRulesetReturnsBddRulesetWhenBddShipped()
    {
        $baseDir = sys_get_temp_dir() . '/aws-bdd-parsed-' . uniqid();
        $serviceDir = $baseDir . '/widget/2024-01-01';
        mkdir($serviceDir, 0777, true);

        try {
            file_put_contents(
                $serviceDir . '/endpoint-bdd.json',
                json_encode([
                    'version' => '1.1',
                    'parameters' => [],
                    'conditions' => [],
                    'results' => [],
                    'nodes' => '',
                    'nodeCount' => 0,
                    'root' => 1,
                ])
            );

            $parsed = EndpointDefinitionProvider::getParsedRuleset(
                'widget',
                '2024-01-01',
                EndpointDefinitionProvider::getPartitions(),
                $baseDir
            );

            $this->assertInstanceOf(
                BddRuleset::class,
                $parsed
            );
        } finally {
           TestsUtility::cleanUpDir($baseDir);
        }
    }

    public static function traversalApiVersionProvider(): array
    {
        return [
            'parent traversal to planted dir' => ['../../evil'],
            'dot dot' => ['..'],
            'single dot' => ['.'],
            'forward slash' => ['a/b'],
            'backslash' => ['a\\b'],
            'trailing newline' => ["2024-01-01\n"],
            'nul byte' => ["2024-01-01\0"],
            'empty string' => [''],
            'null' => [null],
            'array' => [['2024-01-01']],
        ];
    }

    #[DataProvider('traversalApiVersionProvider')]
    public function testRejectsTraversalInApiVersion($apiVersion)
    {
        $root = sys_get_temp_dir() . '/aws-traversal-' . uniqid();
        $baseDir = $root . '/data';
        $evilDir = $root . '/evil';
        $marker = $root . '/marker';
        mkdir($baseDir . '/widget/2024-01-01', 0777, true);
        mkdir($evilDir, 0777, true);

        try {
            $payload = '<?php file_put_contents(' . var_export($marker, true)
                . ', "pwned"); return [];';
            foreach (['endpoint-bdd', 'endpoint-rule-set-1', 'endpoint-tests-1'] as $file) {
                file_put_contents($evilDir . '/' . $file . '.json.php', $payload);
            }

            $calls = [
                fn () => EndpointDefinitionProvider::getParsedRuleset(
                    'widget',
                    $apiVersion,
                    EndpointDefinitionProvider::getPartitions(),
                    $baseDir
                ),
                fn () => EndpointDefinitionProvider::getEndpointRuleset(
                    'widget', $apiVersion, $baseDir
                ),
                fn () => EndpointDefinitionProvider::getEndpointTests(
                    'widget', $apiVersion, $baseDir
                ),
                fn () => EndpointDefinitionProvider::getEndpointBdd(
                    'widget', $apiVersion, $baseDir, false
                ),
            ];

            foreach ($calls as $i => $call) {
                try {
                    $call();
                    $this->fail("Call {$i} did not throw for an invalid api version.");
                } catch (\InvalidArgumentException $e) {
                    $this->assertSame('Invalid api version.', $e->getMessage());
                }
                $this->assertFileDoesNotExist($marker);
            }
        } finally {
            TestsUtility::cleanUpDir($root);
        }
    }

    public static function traversalServiceProvider(): array
    {
        return [
            'parent of s3' => ['../s3'],
            's3 then parent' => ['s3/..'],
            'dot dot' => ['..'],
            'backslash' => ['s3\\..'],
            'trailing newline' => ["s3\n"],
            'nul byte' => ["s3\0"],
            'empty string' => [''],
            'null' => [null],
            'array' => [['s3']],
        ];
    }

    #[DataProvider('traversalServiceProvider')]
    public function testRejectsTraversalInServiceName($service)
    {
        try {
            EndpointDefinitionProvider::getEndpointBdd(
                $service, '2006-03-01', null, false
            );
            $this->fail('getEndpointBdd did not throw for an invalid service.');
        } catch (\InvalidArgumentException $e) {
            $this->assertSame('Invalid service name.', $e->getMessage());
        }

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid service name.');
        EndpointDefinitionProvider::getEndpointRuleset($service, '2006-03-01');
    }

    public function testAcceptsEveryShippedServiceAndVersion()
    {
        $dataDir = __DIR__ . '/../../src/data';
        $checked = 0;
        foreach (glob($dataDir . '/*/*', GLOB_ONLYDIR) as $versionDir) {
            if (!file_exists($versionDir . '/endpoint-rule-set-1.json')
                && !file_exists($versionDir . '/endpoint-rule-set-1.json.php')
            ) {
                continue;
            }
            $service = basename(dirname($versionDir));
            $version = basename($versionDir);
            $ruleset = EndpointDefinitionProvider::getEndpointRuleset(
                $service, $version
            );
            $this->assertIsArray($ruleset, "{$service}/{$version}");
            $checked++;
        }
        $this->assertGreaterThan(0, $checked);
    }
}
