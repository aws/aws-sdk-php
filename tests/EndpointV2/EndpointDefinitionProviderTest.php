<?php

namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\EndpointDefinitionProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

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

    public function getEndpointFileProvider()
    {
        return [
            ['Ruleset'],
            ['Tests']
        ];
    }

    /**
     * @dataProvider getEndpointFileProvider
     *
     * @param $type
     */
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
}