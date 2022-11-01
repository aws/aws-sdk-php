<?php
namespace Aws\Test\EndpointV2;


use Aws\EndpointV2\EndpointArtifactProvider;
use Aws\CommandInterface;
use Aws\EndpointV2\EndpointProvider;
use Aws\EndpointV2\Ruleset\Ruleset;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use Aws\Exception\CommonRuntimeException;
use Aws\Exception\UnresolvedEndpointException;
use Aws\Middleware;
use Aws\Test\UsesServiceTrait;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Uri;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\EndpointV2\EndpointProvider
 */
class EndpointProviderTest extends TestCase
{
    use UsesServiceTrait;
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

    public function rulesetProtocolSuccessCaseProvider()
    {
        $protocolTestCases = [];
        $serviceList = \Aws\manifest();

        forEach($serviceList as $service => $serviceValue) {
            $testFile = EndpointArtifactProvider::getEndpointRuleset($service, 'latest', true);

            foreach($testFile['testCases'] as $case) {
                if (!isset($case['operationInputs']) || isset($case['expect']['error'])) {
                    continue;
                }
                foreach($case['operationInputs'] as $operationInput) {
                    $caseArgs = [$service];
                    $builtInParams = $operationInput['builtInParams'];

                    if ($service === 's3' && isset($builtInParams['AWS::S3::UseArnRegion'])) {
                        $useArnRegion = $builtInParams['AWS::S3::UseArnRegion'];
                    } elseif ($service === 's3control' && isset($builtInParams['AWS::S3::UseArnRegion'])) {
                        $useArnRegion = $builtInParams['AWS::S3Control::UseArnRegion'];
                    } else {
                        $useArnRegion = null;
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
                    array_push($caseArgs, $clientArgs, $operationInput, $case['expect'], $case['documentation']);
                    $protocolTestCases[] = $caseArgs;
                }

            }
        }
        return $protocolTestCases;
    }

    /**
     * Iterates through test cases located in ../test-cases and
     * ../valid-rules, parses into parameters used for endpoint and error tests
     *
     * @dataProvider rulesetProtocolSuccessCaseProvider
     */
    public function testRulesetProtocolSuccessCases($service, $clientArgs, $operationInput, $expected, $documentation)
    {
        //accounts for legacy global endpoint behavior
        if (strpos($expected['endpoint']['url'], 's3.us-east-1.amazonaws.com') !== false
            && $clientArgs['s3_us_east_1_regional_endpoint'] !== true
        ) {
            $this->markTestSkipped();
        }

        $client = $this->getTestClient($service, $clientArgs);
        $this->addMockResults($client, [[]]);
        $command = $client->getCommand(
            $operationInput['operationName'],
            isset($operationInput['operationParams']) ? $operationInput['operationParams'] : []
        );
        $list = $client->getHandlerList();

        $list->appendSign(Middleware::tap(function($cmd, $req) use ($service, $expected) {
            $expectedEndpoint = $expected['endpoint'];
            $expectedUri = new Uri($expected['endpoint']['url']);
            $this->assertStringContainsString(
                $expectedUri->getHost(),
                $req->getUri()->getHost()
            );

            if (isset($expectedEndpoint['properties']['authSchemes'])) {
                $expectedAuthSchemes = $expectedEndpoint['properties']['authSchemes'][0];
                if ((isset($expectedAuthSchemes['disableDoubleEncoding'])
                    && $expectedAuthSchemes['disableDoubleEncoding'] === true)
                ) {
                    $expectedVersion = 's3v4';
                } else {
                    $expectedVersion = str_replace('sig', '', $expectedAuthSchemes['name']);
                }
                $this->assertEquals(
                    $cmd->getAuthSchemes()['version'],
                    $expectedVersion
                );
                $this->assertEquals(
                    $cmd->getAuthSchemes()['name'],
                    $expectedAuthSchemes['signingName']
                );
                $this->assertEquals(
                    $cmd->getAuthSchemes()['region'],
                    $expectedAuthSchemes['signingRegion']
                );
            }
            if (isset($expectedEndpoint['headers'])) {
                $expectedHeaders = $expectedEndpoint['headers'];
                $returnedHeaders = $req->getHeaders();

                foreach($expectedHeaders as $headerKey => $headerValue) {
                    $this->assertArrayHasKey($headerKey, $returnedHeaders);
                    $this->assertEquals(
                        $returnedHeaders[$headerKey][0],
                        $headerValue[0]
                    );
                }

            }
        }));

        $handler = $list->resolve();
        try {
            $handler($command)->wait();
        } catch (CommonRuntimeException $e) {
            $this->markTestSkipped();
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

    public function testCachesEndpointObject()
    {
        $rulesetPath = __DIR__ . '/valid-rules/aws-region.json';
        $rulesetDefinition = json_decode(file_get_contents($rulesetPath), true);
        $partitions = EndpointArtifactProvider::getPartitions();

        $endpointMock = $this->getMockBuilder(RulesetEndpoint::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $rulesetMock = $this->getMockBuilder(Ruleset::class)
            ->setConstructorArgs([$rulesetDefinition, $partitions])
            ->getMock();
        $rulesetMock->expects($this->once())
            ->method('evaluate')
            ->with(
                ['Region' => 'us-west-2']
            )
            ->willReturn(
                $endpointMock
            );

        $reflectionEndpointProvider = new \ReflectionClass(EndpointProvider::class);
        $endpointProvider = new EndpointProvider($rulesetDefinition, $partitions);
        $reflectionRuleset = $reflectionEndpointProvider->getproperty('ruleSet');
        $reflectionRuleset->setAccessible(true);
        $reflectionRuleset->setValue($endpointProvider, $rulesetMock);

        $endpointProvider->resolveEndpoint(['Region' => 'us-west-2']);
        $endpointProvider->resolveEndpoint(['Region' => 'us-west-2']);
        $endpointProvider->resolveEndpoint(['Region' => 'us-west-2']);
    }
}
