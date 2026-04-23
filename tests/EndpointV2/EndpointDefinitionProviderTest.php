<?php

namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\EndpointDefinitionProvider;
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

    public function testGetEndpointBddReturnsNullWhenAbsentAndSuppressed()
    {
        $this->assertNull(
            EndpointDefinitionProvider::getEndpointBdd('s3', 'latest', null, false)
        );
    }

    public function testGetEndpointDefinitionFallsBackToTreeRuleset()
    {
        $definition = EndpointDefinitionProvider::getEndpointDefinition(
            's3',
            'latest'
        );
        $this->assertIsArray($definition);
        $this->assertArrayHasKey('rules', $definition);
        $this->assertArrayNotHasKey('nodes', $definition);
    }

    public function testGetParsedRulesetReturnsTreeRulesetForTreeService()
    {
        $parsed = EndpointDefinitionProvider::getParsedRuleset(
            's3',
            'latest',
            EndpointDefinitionProvider::getPartitions()
        );
        $this->assertInstanceOf(\Aws\EndpointV2\Ruleset\Ruleset::class, $parsed);
    }

    public function testGetParsedRulesetReturnsBddRulesetWhenBddShipped()
    {
        $baseDir = sys_get_temp_dir() . '/aws-bdd-parsed-' . uniqid();
        $serviceDir = $baseDir . '/widget/2024-01-01';
        mkdir($serviceDir, 0777, true);

        try {
            file_put_contents(
                $serviceDir . '/endpoint-bdd-1.json',
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
                \Aws\EndpointV2\Bdd\BddRuleset::class,
                $parsed
            );
        } finally {
           TestsUtility::cleanUpDir($baseDir);;
        }
    }

    public function testGetEndpointDefinitionPrefersBddWhenPresent()
    {
        $baseDir = sys_get_temp_dir() . '/aws-bdd-test-' . uniqid();
        $serviceDir = $baseDir . '/widget/2024-01-01';
        mkdir($serviceDir, 0777, true);

        try {
            file_put_contents(
                $serviceDir . '/endpoint-rule-set-1.json',
                json_encode(['version' => '1.0', 'parameters' => [], 'rules' => []])
            );
            file_put_contents(
                $serviceDir . '/endpoint-bdd-1.json',
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

            $definition = EndpointDefinitionProvider::getEndpointDefinition(
                'widget',
                '2024-01-01',
                $baseDir
            );

            $this->assertArrayHasKey('nodes', $definition);
            $this->assertArrayHasKey('root', $definition);
        } finally {
           TestsUtility::cleanUpDir($baseDir);;
        }
    }
}
