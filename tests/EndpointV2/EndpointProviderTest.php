<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\EndpointProvider;
use Aws\Exception\UnresolvedEndpointException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\EndpointV2\EndpointProvider
 */
class EndpointProviderTest extends TestCase
{
    public function rulesetTestCaseProvider()
    {
        $testfileNames = [
            "aws-region",
            "default-values",
            "eventbridge",
            "fns",
            "headers",
            "is-virtual-hostable-s3-bucket",
            "local-region-override",
            "parse-arn",
            "parse-url",
            "substring",
            "uri-encode",
            "valid-hostlabel"
        ];
        $partitionsPath = __DIR__ . '/partitions.json';
        $partitions = json_decode(file_get_contents($partitionsPath), true);
        $providerCases = [];

        foreach ($testfileNames as $testFile) {
            $casesPath = __DIR__ . '/test-cases/' . $testFile . '.json';
            $rulesetPath = __DIR__ . '/valid-rules/' . $testFile . '.json';
            $cases = json_decode(file_get_contents($casesPath), true);
            $ruleset = json_decode(file_get_contents($rulesetPath), true);

            foreach ($cases['testCases'] as $case) {
                $providerCase = [];
                array_push($providerCase, $ruleset, $partitions);
                $inputParams = $case['params'];
                $expected = $case['expect'];

                if (isset($expected['endpoint'])) {
                    $providerCase[] = 'true';
                } else if (isset($expected['error'])) {
                    $providerCase[] = 'false';
                }
                array_push($providerCase, $inputParams, $expected);
                $providerCases[] = $providerCase;
            }
        }
        return $providerCases;
    }

    /**
     * Iterates through test cases located in ../test-cases and
     * ../valid-rules, parses into parameters used for endpoint and error tests
     *
     * @dataProvider rulesetTestCaseProvider
     */
    public function testEndpointAndErrorCases(
        $ruleset,
        $partitions,
        $isSuccessCase,
        $inputParams,
        $expected
    )
    {
        $provider = new EndpointProvider($ruleset, $partitions);

        if ($isSuccessCase === 'false') {
            $this->expectException(UnresolvedEndpointException::class);
            $this->expectExceptionMessage($expected['error']);
            $provider->resolveEndpoint($inputParams);
        } else {
            $endpoint = $provider->resolveEndpoint($inputParams);
            $expectedEndpoint = $expected['endpoint'];
            $this->assertEquals($expectedEndpoint['url'], $endpoint->getUrl());
            if (isset($expectedEndpoint['headers'])){
                $this->assertEquals($expectedEndpoint['headers'], $endpoint->getHeaders());
            }
            if (isset($expectedEndpoint['properties'])) {
                $this->assertEquals($expectedEndpoint['properties'], $endpoint->getProperties());
            }
        }
    }
    
    public function testNoEndpointFoundException()
    {
        $rulesetPath = __DIR__ . '/valid-rules/deprecated-param.json';
        $ruleset = json_decode(file_get_contents($rulesetPath), true);
        $provider = new EndpointProvider($ruleset, []);
        
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage(
            'Unable to resolve an endpoint using the provider arguments: {"Bucket":"someBucket"}.' .
            ' Note: you can provide an "endpoint" option to a client constructor to bypass' .
             ' the use of an endpoint provider.'
        );
        $provider->resolveEndpoint(['Bucket' => 'someBucket']);
    }
}
