<?php
namespace Aws\Test\EndpointV2;


use Aws\EndpointV2\EndpointArtifactProvider;
use Aws\CommandInterface;
use Aws\EndpointV2\EndpointProvider;
use Aws\Exception\UnresolvedEndpointException;
use Aws\Middleware;
use Aws\Test\UsesServiceTrait;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\EndpointV2\EndpointProvider
 */
class EndpointProviderTest extends TestCase
{
    /**
     * Iterates through test cases located in ../test-cases and
     * ../valid-rules, parses into parameters used for endpoint and error tests
     */
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

    /**
     * Iterates through test cases located in each service's endpoint test file.
     * Parses into parameters used for endpoint and error tests
     */
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
     * @dataProvider basicTestCaseProvider
     * @dataProvider serviceTestCaseProvider
     */
    public function testBasicEndpointAndErrorCases(
        $ruleset,
        $isSuccessCase,
        $inputParams,
        $expected
    )
    {
        $provider = new EndpointProvider($ruleset, $this->partitions);

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

    public function rulesetProtocolCaseProvider()
    {
        $protocolTestCases = [];
        $casesPath = __DIR__ . '/protocol/endpoint-tests.json';
        $testFile = json_decode(file_get_contents($casesPath), true);

        foreach($testFile['testCases'] as $case) {
            if (!isset($case['operationInputs']) || isset($case['expect']['error'])) {
                continue;
            }
            $caseArgs = [];
            foreach($case['operationInputs'] as $operationInput) {
                $builtInParams = $operationInput['builtInParams'];
                if (isset($builtInParams['AWS::S3::UseArnRegion'])
                    || isset($builtInParams['AWS::S3Control::UseArnRegion'])
                ) {
                    if (isset($builtInParams['AWS::S3::UseArnRegion'])) {
                        $useArnRegion = $builtInParams['AWS::S3::UseArnRegion'];
                    } else {
                        $useArnRegion = $builtInParams['AWS::S3Control::UseArnRegion'];
                    }
                }

                $clientArgs = [
                    'region' => $builtInParams['AWS::Region'],
                    'endpoint' => isset($builtInParams['SDK::Endpoint']) ? $builtInParams['SDK::Endpoint'] : null,
                    'use_fips_endpoint' => isset($builtInParams['AWS::UseFIPS']) ? $builtInParams['AWS::UseFIPS'] : null,
                    'use_dual_stack_endpoint' => isset($builtInParams['AWS::UseDualStack']) ? $builtInParams['AWS::UseDualStack'] : null,
                    's3_us_east_1_regional_endpoint' => isset($builtInParams['AWS::S3::UseGlobalEndpoint']) ? $builtInParams['AWS::S3::UseGlobalEndpoint'] === true ? 'legacy' : 'regional' : null,
                    'sts_regional_endpoints' => isset($builtInParams['AWS::STS::UseGlobalEndpoint']) ? $builtInParams['AWS::STS::UseGlobalEndpoint'] === true ? 'legacy' : 'regional' : null,
                    'use_accelerate_endpoint' => isset($builtInParams['AWS::S3::Accelerate']) ? $builtInParams['AWS::S3::Accelerate'] : null,
                    'use_path_style_endpoint' => isset($builtInParams['AWS::S3::ForcePathStyle']) ? $builtInParams['AWS::S3::ForcePathStyle'] : null,
                    'use_arn_region' => isset($useArnRegion) ? $useArnRegion : null,
                    'disable_multiregion_access_points' => isset($builtInParams['AWS::S3::DisableMultiRegionAccessPoints']) ? $builtInParams['AWS::S3::DisableMultiRegionAccessPoints'] : null
                ];
                array_push($caseArgs, $clientArgs, $operationInput, $case['expect']);
            }
            $protocolTestCases[] = $caseArgs;
        }
        return $protocolTestCases;
    }

    /**
     * Iterates through test cases located in ../test-cases and
     * ../valid-rules, parses into parameters used for endpoint and error tests
     *
     * @dataProvider rulesetProtocolCaseProvider
     */
    public function testRulesetProtocolCases($clientArgs, $operationInput, $expected)
    {
        $client = $this->getTestClient('s3', $clientArgs);
        $this->addMockResults($client, [[]]);
        $command = $client->getCommand(
            $operationInput['operationName'],
            isset($operationInput['operationParams']) ? $operationInput['operationParams'] : []
        );

        if ($clientArgs['region'] === 'us-east-1') {
            echo 'us-east-1 ' . 'on case '. 'expected: ' . $expected['endpoint']['url'];
        }

//        $command->getHandlerList()->appendSign(
//            Middleware::tap(function (
//                CommandInterface $cmd,
//                RequestInterface $req
//            ) use ($expected) {
//                $endpoint = $expected['endpoint']['url'];
//                $this->assertStringContainsString(
//                    $req->getUri()->getHost(),
//                    $endpoint
//                );
//                $this->assertSame("/{$key}", $req->getRequestTarget());
//                $this->assertEquals(
//                    $signingRegion,
//                    $cmd['@context']['signing_region']
//                );
//                if (!empty($signingService)) {
//                    $this->assertEquals(
//                        $signingService,
//                        $cmd['@context']['signing_service']
//                    );
//                }
//
//                $this->assertStringContainsString(
//                    "/{$signingRegion}/s3",
//                    $req->getHeader('Authorization')[0]
//                );
//            })
//        );

        $result = $client->execute($command);
        $returnedUri = $result->toArray()['@metadata']['effectiveUri'];
        $this->assertStringContainsString(
            $expected['endpoint']['url'],
            $returnedUri
        );
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
