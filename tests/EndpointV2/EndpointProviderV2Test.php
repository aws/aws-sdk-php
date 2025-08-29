<?php
namespace Aws\Test\EndpointV2;

use Aws\Api\Service;
use Aws\Auth\Exception\UnresolvedAuthSchemeException;
use Aws\AwsClient;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\EndpointProviderV2;
use Aws\EndpointV2\Ruleset\Ruleset;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use Aws\Exception\CommonRuntimeException;
use Aws\Exception\UnresolvedEndpointException;
use Aws\Middleware;
use Aws\Test\UsesServiceTrait;
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
    public function basicTestCaseProvider(): \Generator
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
            "valid-hostlabel",
            "string-array"
        ];

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

                yield $providerCase;
            }
        }
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
    public function serviceTestCaseProvider(): \Generator
    {
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

                yield $testCase;
            }
        }
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

    public function rulesetProtocolEndpointAndErrorCaseProvider(): \Generator
    {
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
                        'region' => $builtInParams['AWS::Region'] ?? 'us-east-1',
                        'endpoint' => $builtInParams['SDK::Endpoint'] ?? null,
                        'use_fips_endpoint' => $builtInParams['AWS::UseFIPS'] ?? null,
                        'use_dual_stack_endpoint' => $builtInParams['AWS::UseDualStack'] ?? null,
                        's3_us_east_1_regional_endpoint' => isset($builtInParams['AWS::S3::UseGlobalEndpoint']) ? ($builtInParams['AWS::S3::UseGlobalEndpoint'] === true ? 'legacy' : 'regional') : null,
                        'sts_regional_endpoints' => isset($builtInParams['AWS::STS::UseGlobalEndpoint']) ? ($builtInParams['AWS::STS::UseGlobalEndpoint'] === true ? 'legacy' : 'regional') : null,
                        'use_accelerate_endpoint' => $builtInParams['AWS::S3::Accelerate'] ?? null,
                        'use_path_style_endpoint' => $builtInParams['AWS::S3::ForcePathStyle'] ?? null,
                        'use_arn_region' => $useArnRegion ?? null,
                        'disable_multiregion_access_points' => $builtInParams['AWS::S3::DisableMultiRegionAccessPoints'] ?? null,
                        'account_id_endpoint_mode' => $builtInParams['AWS::Auth::AccountIdEndpointMode'] ?? null
                    ];
                    if (isset($builtInParams['AWS::Auth::AccountId'])) {
                        $clientArgs['credentials'] = [
                            'key' => 'foo',
                            'secret' => 'foo',
                            'token' => 'foo',
                            'expires' => null,
                            'accountId' => $builtInParams['AWS::Auth::AccountId']
                        ];
                    }

                    yield [
                        $service,
                        $clientArgs,
                        $operationInput,
                        $case['expect'],
                        isset($case['expect']['error'])
                    ];
                }
            }
        }
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
        } else {
            //accounts for legacy global endpoint behavior
            if (strpos($expected['endpoint']['url'], 's3.us-east-1.amazonaws.com') !== false
                && $clientArgs['s3_us_east_1_regional_endpoint'] !== true
            ) {
                $this->markTestSkipped();
            }
            if ($service == 's3') {
                $clientArgs['disable_express_session_auth'] = true;
            }
        }

        $client = $this->getTestClient($service, $clientArgs);
        $this->addMockResults($client, [[]]);
        $command = $client->getCommand(
            $operationInput['operationName'],
            isset($operationInput['operationParams']) ? $operationInput['operationParams'] : []
        );
        $list = $client->getHandlerList();

        if (!$errorCase) {
            $list->appendSign(Middleware::tap(function($cmd, $req) use ($service, $expected) {
                $expectedEndpoint = $expected['endpoint'];
                $expectedUri = new Uri($expected['endpoint']['url']);
                $expectedPath = $expectedUri->getPath();

                $this->assertStringContainsString(
                    $expectedUri->getHost(),
                    $req->getUri()->getHost()
                );

                if (!empty($expectedPath)) {
                    $this->assertStringStartsWith($expectedPath, $req->getUri()->getPath());
                }

                if (isset($expectedEndpoint['properties']['authSchemes'])) {
                    $expectedAuthScheme = null;
                    foreach ($expectedEndpoint['properties']['authSchemes'] as $authScheme) {
                        // Skip sigv4a if awscrt extension is not loaded
                        if ($authScheme['name'] === 'sigv4a' && !extension_loaded('awscrt')) {
                            continue;
                        }

                        $expectedAuthScheme = $authScheme;
                        break;
                    }

                    if ($expectedAuthScheme) {
                        if ((isset($expectedAuthScheme['disableDoubleEncoding'])
                                && $expectedAuthScheme['disableDoubleEncoding'] === true)
                            && $expectedAuthScheme['name'] !== 'sigv4a'
                        ) {
                            $expectedVersion = 's3v4';
                        } else {
                            $expectedVersion = str_replace('sig', '', $expectedAuthScheme['name']);
                        }
                        $this->assertEquals(
                            $cmd['@context']['signature_version'],
                            $expectedVersion
                        );
                        $this->assertEquals(
                            $cmd['@context']['signing_service'],
                            $expectedAuthScheme['signingName']
                        );
                        if (isset($cmd['@context']['signing_region'])) {
                            $this->assertEquals(
                                $cmd['@context']['signing_region'],
                                $expectedAuthScheme['signingRegion']
                            );
                        } elseif (isset($cmd['@context']['signing_region_set'])) {
                            $this->assertEquals(
                                $cmd['@context']['signing_region_set'],
                                $expectedAuthScheme['signingRegionSet']);
                        }
                    }
                }
                if (isset($expectedEndpoint['headers'])) {
                    $expectedHeaders = $expectedEndpoint['headers'];
                    $returnedHeaders = $req->getHeaders();

                    foreach($expectedHeaders as $headerKey => $headerValue) {
                        $this->assertArrayHasKey($headerKey, $returnedHeaders);
                        $this->assertEquals(
                            $headerValue[0],
                            $returnedHeaders[$headerKey][0]
                        );
                    }
                }
            }));
        }

        $handler = $list->resolve();
        try {
            $handler($command)->wait();
        } catch (CommonRuntimeException | UnresolvedAuthSchemeException $e) {
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

    /**
     * @dataProvider stringArrayOperationInputsProvider
     * @return void
     */
    public function testStringArrayOperationInputs(
        $params,
        $expected,
        $operationInputs
    )
    {
        if (isset($expected['error'])) {
            $this->expectException(UnresolvedEndpointException::class);
            $this->expectExceptionMessage($expected['error']);
        }

        $serviceDefinition = json_decode(file_get_contents(
            __DIR__ . '/service-models/string-array.json'
        ), true);
        $service = new Service($serviceDefinition, function () {
            return [];
        });
        $client = new AwsClient([
            'service' => 'foo',
            'api_provider' => function () use ($service) {
                return $service->toArray();
            },
            'region' => 'bar',
            'endpoint_provider' => new EndpointProviderV2(
                json_decode(
                    file_get_contents(
                    __DIR__ . '/valid-rules/string-array.json'),
                    true
                    ),
                EndpointDefinitionProvider::getPartitions()
            )
        ]);

        $list = $client->getHandlerList();
        if (!isset($expected['error'])) {
            $list->appendSign(Middleware::tap(function($cmd, $req) use ($service, $expected) {
                $this->assertStringStartsWith(
                    $expected['endpoint']['url'],
                    (string) $req->getUri()
                );
            }));
        }

        foreach($operationInputs as $operation) {
            $this->addMockResults($client, [[]]);
            $command = $client->getCommand(
                $operation['operationName'],
                $operation['operationParams'] ?? []
            );
            $client->execute($command);
        }
    }

    public function stringArrayOperationInputsProvider(): \Generator
    {
        $cases = json_decode(
            file_get_contents(__DIR__ . '/test-cases/string-array.json'),
            true
        );

        foreach ($cases['testCases'] as $case) {
            unset($case['documentation']);

            yield $case;
        }
    }
}
