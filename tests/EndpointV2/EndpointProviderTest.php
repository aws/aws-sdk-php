<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\EndpointArtifactProvider;
use Aws\EndpointV2\EndpointProvider;
use Aws\Exception\UnresolvedEndpointException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\EndpointV2\EndpointProvider
 */
class EndpointProviderTest extends TestCase
{
    public function basicTestCaseProvider()
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
        $providerCases = [];
        $partitions = EndpointArtifactProvider::getPartitions();

        foreach ($testfileNames as $testFile) {
            $casesPath = __DIR__ . '/test-cases/' . $testFile . '.json';
            $rulesetPath = __DIR__ . '/valid-rules/' . $testFile . '.json';
            $cases = json_decode(file_get_contents($casesPath), true);
            $ruleset = json_decode(file_get_contents($rulesetPath), true);

            foreach ($cases['testCases'] as $case) {
                $providerCase = [$ruleset, $partitions];
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

    public function serviceTestCaseProvider()
    {
        $serviceTestCases = [];

        $services = \Aws\Manifest();
        $partitions = EndpointArtifactProvider::getPartitions();

        foreach($services as $service => $data) {
            $serviceTests = EndpointArtifactProvider::getEndpointRuleset(
                $service, 'latest', true
            );
            $ruleset = EndpointArtifactProvider::getEndpointRuleset($service, 'latest');

            foreach($serviceTests['testCases'] as $case) {
                $testCase = [$ruleset, $partitions];

                $inputParams = isset($case['params']) ? $case['params'] : [];
                $expected = $case['expect'];
                if (isset($expected['endpoint'])) {
                    $testCase[] = 'true';
                } else if (isset($expected['error'])) {
                    $testCase[] = 'false';
                }
                array_push($testCase, $inputParams, $expected);
                $serviceTestCases[] = $testCase;
            }
        }
        return $serviceTestCases;
    }

    /**
     * Iterates through test cases located in ../test-cases and
     * ../valid-rules, parses into parameters used for endpoint and error tests
     *
     * @dataProvider basicTestCaseProvider
     * @dataProvider serviceTestCaseProvider
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
            'Unable to resolve an endpoint using the provider arguments: {"Bucket":"someBucket"}'
        );
        $provider->resolveEndpoint(['Bucket' => 'someBucket']);
    }
}
