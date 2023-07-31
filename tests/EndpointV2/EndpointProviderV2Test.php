<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\CommandInterface;
use Aws\EndpointV2\EndpointProviderV2;
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
 * @covers Aws\EndpointV2\EndpointProviderV2
 */
class EndpointProviderV2Test extends TestCase
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

        foreach ($testfileNames as $testFile) {
            $casesPath = __DIR__ . '/test-cases/' . $testFile . '.json';
            $rulesetPath = __DIR__ . '/valid-rules/' . $testFile . '.json';
            $cases = json_decode(file_get_contents($casesPath), true);
            $ruleset = json_decode(file_get_contents($rulesetPath), true);

            foreach ($cases['testCases'] as $case) {
                $providerCase = [$ruleset];
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
     * @dataProvider basicTestCaseProvider
     */
    public function testBasicEndpointAndErrorCases(
        $ruleset,
        $isSuccessCase,
        $inputParams,
        $expected
    )
    {
        $provider = new EndpointProviderV2(
            $ruleset,
            EndpointDefinitionProvider::getPartitions()
        );

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

    /**
     * Iterates through test cases located in each service's endpoint test file.
     * Parses into parameters used for endpoint and error tests
     */
    public function serviceTestCaseProvider()
    {
        $serviceTestCases = [];
        $services = \Aws\Manifest();

        foreach($services as $service => $data) {
            $serviceTests = EndpointDefinitionProvider::getEndpointTests(
                $service, 'latest'
            );

            foreach($serviceTests['testCases'] as $case) {
                $testCase = [$service];

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
     * @dataProvider serviceTestCaseProvider
     */
    public function testServiceEndpointAndErrorCases(
        $service,
        $isSuccessCase,
        $inputParams,
        $expected
    )
    {
        $provider = new EndpointProviderV2(
            EndpointDefinitionProvider::getEndpointRuleset($service, 'latest'),
            EndpointDefinitionProvider::getPartitions()
        );

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

    public function rulesetProtocolEndpointAndErrorCaseProvider()
    {
        $protocolTestCases = [];
        $serviceList = \Aws\manifest();

        forEach($serviceList as $service => $serviceValue) {
            $testFile = EndpointDefinitionProvider::getEndpointTests($service, 'latest');

            foreach($testFile['testCases'] as $case) {
                if (!isset($case['operationInputs'])) {
                    continue;
                }

                foreach($case['operationInputs'] as $operationInput) {
                    $caseArgs = [$service];
                    $builtInParams = $operationInput['builtInParams'];

                    if ($service === 's3' && isset($builtInParams['AWS::S3::UseArnRegion'])) {
                        $useArnRegion = $builtInParams['AWS::S3::UseArnRegion'];
                    } elseif ($service === 's3control' && isset($builtInParams['AWS::S3Control::UseArnRegion'])) {
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
                    array_push($caseArgs, $clientArgs, $operationInput, $case['expect'], isset($case['expect']['error']));
                    $protocolTestCases[] = $caseArgs;
                }

            }
        }
        return $protocolTestCases;
    }

    /**
     * End-to-end tests which ensure the correct values are resolved
     * before being passed into the endpoint provider and after other
     * middleware has acted upon the request.
     *
     * @dataProvider rulesetProtocolEndpointAndErrorCaseProvider
     */
    public function testRulesetProtocolEndpointAndErrorCases($service, $clientArgs, $operationInput, $expected, $errorCase)
    {
        if ($errorCase) {
            $this->expectException(UnresolvedEndpointException::class);
            $this->expectExceptionMessage($expected['error']);
            goto clientInstantiation;
        }

        //accounts for legacy global endpoint behavior
        if (strpos($expected['endpoint']['url'], 's3.us-east-1.amazonaws.com') !== false
            && $clientArgs['s3_us_east_1_regional_endpoint'] !== true
        ) {
            $this->markTestSkipped();
        }

        clientInstantiation:

        $client = $this->getTestClient($service, $clientArgs);
        $this->addMockResults($client, [[]]);
        $command = $client->getCommand(
            $operationInput['operationName'],
            isset($operationInput['operationParams']) ? $operationInput['operationParams'] : []
        );
        $list = $client->getHandlerList();

        if ($errorCase) {
            goto resolveHandler;
        }

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
                    && $expectedAuthSchemes['name'] !== 'sigv4a'
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
                if (isset($cmd->getAuthSchemes()['region'])) {
                    $this->assertEquals(
                        $cmd->getAuthSchemes()['region'],
                        $expectedAuthSchemes['signingRegion']
                    );
                } elseif (isset($cmd->getAuthSchemes['signingRegionSet'])) {
                    $this->assertEquals(
                        $cmd->getAuthSchemes()['region'],
                        $expectedAuthSchemes['signingRegionSet']
                    );
                }
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
        resolveHandler:

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
        $provider = new EndpointProviderV2($ruleset, []);

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
        $partitions = EndpointDefinitionProvider::getPartitions();

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

        $reflectionEndpointProvider = new \ReflectionClass(EndpointProviderV2::class);
        $endpointProvider = new EndpointProviderV2($rulesetDefinition, $partitions);
        $reflectionRuleset = $reflectionEndpointProvider->getproperty('ruleset');
        $reflectionRuleset->setAccessible(true);
        $reflectionRuleset->setValue($endpointProvider, $rulesetMock);

        $endpointProvider->resolveEndpoint(['Region' => 'us-west-2']);
        $endpointProvider->resolveEndpoint(['Region' => 'us-west-2']);
        $endpointProvider->resolveEndpoint(['Region' => 'us-west-2']);
    }
}
