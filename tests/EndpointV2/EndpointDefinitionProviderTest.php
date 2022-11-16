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
}