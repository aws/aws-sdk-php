<?php

namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\EndpointArtifactProvider;
use Aws\EndpointV2\Ruleset\Ruleset;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class EndpointArtifactProviderTest extends TestCase
{
    public function testProvidesRuleset()
    {
        $rulesetDefinition = EndpointArtifactProvider::getEndpointRuleset(
            's3', 'latest'
        );
        $this->assertIsArray($rulesetDefinition);
        $this->assertArrayHasKey('parameters', $rulesetDefinition);
    }

    public function testProvidesRulesetTests()
    {
        $testsDefinition = EndpointArtifactProvider::getEndpointRuleset(
            's3', 'latest', true
        );
        $this->assertIsArray($testsDefinition);
        $this->assertArrayHasKey('testCases', $testsDefinition);
    }

    public function testThrowsExceptionOnInvalidService()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid service name.');
        EndpointArtifactProvider::getEndpointRuleset('foo', 'latest');
    }

    public function testThrowsExceptionOnInvalidApiVersion()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid api version.');
        EndpointArtifactProvider::getEndpointRuleset('s3', '10-22-2022');
    }
}