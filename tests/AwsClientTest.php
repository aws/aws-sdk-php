<?php
namespace Aws\Test;

use Aws\Api\ApiProvider;
use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\AwsClient;
use Aws\CommandInterface;
use Aws\Credentials\Credentials;
use Aws\Ec2\Ec2Client;
use Aws\Endpoint\UseFipsEndpoint\Configuration as FipsConfiguration;
use Aws\Endpoint\UseDualStackEndpoint\Configuration as DualStackConfiguration;
use Aws\EndpointV2\EndpointProviderV2;
use Aws\Middleware;
use Aws\ResultPaginator;
use Aws\S3\Exception\S3Exception;
use Aws\Ses\SesClient;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Signature\SignatureV4;
use Aws\Sts\StsClient;
use Aws\Token\Token;
use Aws\Waiter;
use Aws\WrappedHttpHandler;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\AwsClient
 */
class AwsClientTest extends TestCase
{
    use UsesServiceTrait;
    use TestServiceTrait;
    use MetricsBuilderTestTrait;

    private function getApiProvider()
    {
        return function () {
            return [
                'metadata' => [
                    'protocol'       => 'query',
                    'endpointPrefix' => 'foo'
                ],
                'shapes' => [],
            ];
        };
    }

    public function testHasGetters()
    {
        $config = [
            'handler'      => function () {},
            'credentials'  => new Credentials('foo', 'bar'),
            'region'       => 'foo',
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'serializer'   => function () {},
            'api_provider' => $this->getApiProvider(),
            'service'      => 'foo',
            'error_parser' => function () {},
            'version'      => 'latest'
        ];

        $client = new AwsClient($config);
        $this->assertSame($config['handler'], $this->getPropertyValue($client->getHandlerList(), 'handler'));
        $this->assertSame($config['credentials'], $client->getCredentials()->wait());
        $this->assertSame($config['region'], $client->getRegion());
        $this->assertSame('foo', $client->getApi()->getEndpointPrefix());
        $this->assertisArray($client->getClientBuiltIns());
        $this->assertIsArray($client->getClientContextParams());
        $this->assertisArray($client->getEndpointProviderArgs());
    }

    public function testEnsuresOperationIsFoundWhenCreatingCommands()
    {
        $this->expectExceptionMessage("Operation not found: Foo");
        $this->expectException(\InvalidArgumentException::class);
        $this->createClient()->getCommand('foo');
    }

    public function testReturnsCommandForOperation()
    {
        $client = $this->createClient([
            'operations' => [
                'foo' => [
                    'http' => ['method' => 'POST']
                ]
            ]
        ]);

        $this->assertInstanceOf(
            CommandInterface::class,
            $client->getCommand('foo')
        );
    }

    public function testWrapsExceptions()
    {
        $this->expectExceptionMessage("Error executing \"foo\" on \"http://us-east-1.foo.amazonaws.com/\"; AWS HTTP error: Baz Bar!");
        $this->expectException(\Aws\S3\Exception\S3Exception::class);
        $parser = function () {};
        $errorParser = new JsonRpcErrorParser();
        $h = new WrappedHttpHandler(
            function () {
                return new RejectedPromise([
                    'exception'        => new \Exception('Baz Bar!'),
                    'connection_error' => true,
                    'response'         => null
                ]);
            },
            $parser,
            $errorParser,
            S3Exception::class
        );

        $client = $this->createClient(
            ['operations' => ['foo' => ['http' => ['method' => 'POST']]]],
            ['handler' => $h]
        );

        $command = $client->getCommand('foo');
        $client->execute($command);
    }

    public function testChecksBothLowercaseAndUppercaseOperationNames()
    {
        $client = $this->createClient(['operations' => ['Foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $this->assertInstanceOf(
            CommandInterface::class,
            $client->getCommand('foo')
        );
    }

    public function testReturnsAsyncResultsUsingMagicCall()
    {
        $client = $this->createClient(['operations' => ['Foo' => [
            'http' => ['method' => 'POST']
        ]]]);
        $client->getHandlerList()->setHandler(new MockHandler([new Result()]));
        $result = $client->fooAsync();
        $this->assertInstanceOf('GuzzleHttp\Promise\PromiseInterface', $result);
    }

    public function testCanGetIterator()
    {
        $provider = ApiProvider::filesystem(__DIR__ . '/fixtures/aws_client_test');
        $client = $this->getTestClient('ec2', ['api_provider' => $provider]);
        $this->assertInstanceOf(
            'Generator',
            $client->getIterator('DescribePaginatedExamples')
        );
    }

    public function testCanGetIteratorWithoutFullyDefinedPaginator()
    {
        $provider = ApiProvider::filesystem(__DIR__ . '/fixtures/aws_client_test');
        $client = $this->getTestClient('ec2', ['api_provider' => $provider]);
        $data = ['foo', 'bar', 'baz'];
        $this->addMockResults($client, [new Result([
            'Examples' => [$data, $data],
        ])]);
        $iterator = $client->getIterator('DescribeExamples');
        $this->assertInstanceOf('Traversable', $iterator);
        foreach ($iterator as $iterated) {
            $this->assertSame($iterated, $data);
        }
    }

    public function testGetIteratorFailsForMissingConfig()
    {
        $this->expectException(\UnexpectedValueException::class);
        $client = $this->createClient();
        $client->getIterator('ListObjects');
    }

    public function testCanGetPaginator()
    {
        $client = $this->createClient(['pagination' => [
            'ListObjects' => [
                'input_token' => 'foo',
                'output_token' => 'foo',
            ]
        ]]);

        $this->assertInstanceOf(
            ResultPaginator::class,
            $client->getPaginator('ListObjects', ['Bucket' => 'foobar'])
        );
    }

    public function testGetPaginatorFailsForMissingConfig()
    {
        $this->expectException(\UnexpectedValueException::class);
        $client = $this->createClient();
        $client->getPaginator('ListObjects');
    }

    public function testCanWaitSynchronously()
    {
        $this->expectExceptionMessage("Operation not found");
        $this->expectException(\InvalidArgumentException::class);
        $client = $this->createClient(['waiters' => ['PigsFly' => [
            'acceptors'   => [],
            'delay'       => 1,
            'maxAttempts' => 1,
            'operation'   => 'DescribePigs',
        ]]]);

        $client->waitUntil('PigsFly');
    }

    public function testGetWaiterFailsForMissingConfig()
    {
        $this->expectException(\UnexpectedValueException::class);
        $client = $this->createClient();
        $client->waitUntil('PigsFly');
    }

    public function testGetWaiterPromisor()
    {
        $s3 = new S3Client(['region' => 'us-east-1', 'version' => 'latest']);
        $s3->getHandlerList()->setHandler(new MockHandler([
            new Result(['@metadata' => ['statusCode' => '200']])
        ]));
        $waiter = $s3->getWaiter('BucketExists', ['Bucket' => 'foo']);
        $this->assertInstanceOf(Waiter::class, $waiter);
        $promise = $waiter->promise();
        $promise->wait();
    }

    public function testGetToken(): void
    {
        $client = $this->createClient();
        $tokenPromise = $client->getToken();
        $this->assertInstanceOf(PromiseInterface::class, $tokenPromise);
    }

    public function testCreatesClientsFromConstructor()
    {
        $client = new StsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $this->assertInstanceOf(StsClient::class, $client);
        $this->assertSame('us-west-2', $client->getRegion());
    }

    public function testCanGetEndpoint()
    {
        $client = $this->createClient();
        $this->assertSame(
            'http://us-east-1.foo.amazonaws.com',
            (string)$client->getEndpoint()
        );
    }

    public function testSignsRequestsUsingSigner()
    {
        $mock = new MockHandler([new Result([])]);
        $conf = [
            'region'  => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => 'foo',
                'secret' => 'bar'
            ],
            'handler' => $mock
        ];

        $client = new Ec2Client($conf);
        $client->describeInstances();
        $request = $mock->getLastRequest();
        $str = \GuzzleHttp\Psr7\Message::toString($request);
        $this->assertStringContainsString('AWS4-HMAC-SHA256', $str);
    }

    /** @doesNotPerformAssertions */
    public function testAllowsFactoryMethodForBc()
    {
        Ec2Client::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
    }

    /** @doesNotPerformAssertions */
    public function testCanInstantiateAliasedClients()
    {
        new SesClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
    }

    public function testCanGetSignatureProvider()
    {
        $client = $this->createClient([]);
        $ref = new \ReflectionMethod($client, 'getSignatureProvider');
        $ref->setAccessible(true);
        $provider = $ref->invoke($client);
        $this->assertIsCallable($provider);
    }

    public function testDoesNotPermitSerialization()
    {
        $this->expectExceptionMessage("Instances of Aws\AwsClient cannot be serialized");
        $this->expectException(\RuntimeException::class);
        $client = $this->createClient();
        \serialize($client);
    }

    public function testDoesNotSignOperationsWithAnAuthTypeOfNone()
    {
        $client = $this->createClient(
            [
                'metadata' => [
                    'signatureVersion' => 'v4',
                ],
                'operations' => [
                    'Foo' => [
                        'http' => ['method' => 'POST'],
                    ],
                    'Bar' => [
                        'http' => ['method' => 'POST'],
                        'authtype' => 'none',
                    ],
                ],
            ],
            [
                'handler' => function (
                    CommandInterface $command,
                    RequestInterface $request
                ) {
                    foreach (['Authorization', 'X-Amz-Date'] as $signatureHeader) {
                        if ('Bar' === $command->getName()) {
                            $this->assertFalse($request->hasHeader($signatureHeader));
                        } else {
                            $this->assertTrue($request->hasHeader($signatureHeader));
                        }
                    }

                    return new Result;
                }
            ]
        );

        $client->foo();
        $client->bar();
    }

    /**
     * @param $service
     * @param $clientConfig
     *
     * @dataProvider signOperationsWithAnAuthTypeProvider
     */
    public function testSignOperationsWithAnAuthType($service, $clientConfig)
    {
        $client = $this->createHttpsEndpointClient($service, $clientConfig);
        $client->bar();
    }

    public function signOperationsWithAnAuthTypeProvider()
    {
        return [
            [
                [
                    'metadata' => [
                        'signatureVersion' => 'v4',
                    ],
                    'operations' => [
                        'Bar' => [
                            'http' => ['method' => 'POST'],
                            'authtype' => 'v4-unsigned-body',
                        ],
                    ],
                ],
                [
                    'handler' => function (
                        CommandInterface $command,
                        RequestInterface $request
                    ) {
                        foreach (['Authorization','X-Amz-Content-Sha256', 'X-Amz-Date'] as $signatureHeader) {
                            $this->assertTrue($request->hasHeader($signatureHeader));
                        }
                        $this->assertSame('UNSIGNED-PAYLOAD', $request->getHeader('X-Amz-Content-Sha256')[0]);
                        return new Result;
                    }
                ]
            ],
            [
                [
                    'metadata' => [
                        'signatureVersion' => 'v4',
                    ],
                    'operations' => [
                        'Bar' => [
                            'http' => ['method' => 'POST'],
                            'authtype' => 'bearer',
                        ],
                    ],
                ],
                [
                    'handler' => function (
                        CommandInterface $command,
                        RequestInterface $request
                    ) {

                        $this->assertTrue($request->hasHeader('Authorization'));
                        $this->assertSame('Bearer foo', $request->getHeader('Authorization')[0]);
                        return new Result;
                    },
                    'token' => new Token('foo', time() + 1000)
                ]
            ]
        ];
    }

    public function testUsesCommandContextSigningRegionAndService()
    {
        $client = $this->createHttpsEndpointClient(
            [
                'metadata' => [
                    'signatureVersion' => 'v4',
                ],
                'operations' => [
                    'Bar' => [
                        'http' => ['method' => 'POST'],
                        'authtype' => 'v4-unsigned-body',
                    ],
                ],
            ],
            [
                'handler' => function (
                    CommandInterface $command,
                    RequestInterface $request
                ) {
                    $this->assertStringContainsString(
                        'ap-southeast-1/custom-service',
                        $request->getHeader('Authorization')[0]
                    );
                    return new Result;
                }
            ]
        );
        $list = $client->getHandlerList();
        $list->appendBuild(function ($handler) {
            return function (CommandInterface $cmd, RequestInterface $req)
                use ($handler)
            {
                $cmd['@context']['signing_region'] = 'ap-southeast-1';
                $cmd['@context']['signing_service'] = 'custom-service';
                return $handler($cmd, $req);
            };
        });
        $client->bar();
    }

    public function testLoadsAliases()
    {
        $client = $this->createClient([
            'metadata' => [
                'serviceId' => 'TestService',
                'apiVersion' => '2019-05-23'
            ]
        ]);
        $ref = new \ReflectionClass(AwsClient::class);
        $method = $ref->getMethod('loadAliases');
        $method->setAccessible(true);
        $property = $ref->getProperty('aliases');
        $property->setAccessible(true);
        $method->invokeArgs(
            $client,
            [__DIR__ . '/fixtures/aws_client_test/aliases.json']
        );
        $this->assertEquals(
            ['GetConfigAlias' => 'GetConfig'],
            $property->getValue($client)
        );
    }

    public function testCallsAliasedFunction()
    {
        $this->expectExceptionMessage("Operation not found: GetConfig");
        $this->expectException(\InvalidArgumentException::class);
        $client = $this->createClient([
            'metadata' => [
                'serviceId' => 'TestService',
                'apiVersion' => '2019-05-23'
            ]
        ]);
        $ref = new \ReflectionClass(AwsClient::class);
        $method = $ref->getMethod('loadAliases');
        $method->setAccessible(true);
        $method->invokeArgs(
            $client,
            [__DIR__ . '/fixtures/aws_client_test/aliases.json']
        );

        $client->getConfigAlias();
    }

    public function testVerifyGetConfig()
    {
        $client = $this->createClient([
            'metadata' => [
                'serviceId' => 'TestService',
                'apiVersion' => '2019-05-23'
            ]
        ]);
        $this->assertEquals(
            [
                'signature_version' => 'v4',
                'signing_name' => 'foo',
                'signing_region' => 'foo',
                'use_fips_endpoint' => new FipsConfiguration(false),
                'use_dual_stack_endpoint' => new DualStackConfiguration(false, "foo"),
                'disable_request_compression' => false,
                'request_min_compression_size_bytes' => 10240,
                'ignore_configured_endpoint_urls' => false,
                'auth_scheme_preference' => null
            ],
            $client->getConfig()
        );
    }

    public function testUsesV2EndpointProviderByDefault()
    {
        $client = new StsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $this->assertInstanceOf(
            EndpointProviderV2::class,
            $client->getEndpointProvider()
        );
    }

    public function testGetClientBuiltins()
    {
        $client = new StsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $expected = [
            'SDK::Endpoint' => null,
            'AWS::Region' => 'us-west-2',
            'AWS::UseFIPS' => false,
            'AWS::UseDualStack' => false,
            'AWS::STS::UseGlobalEndpoint' => false,
            'AWS::Auth::AccountIdEndpointMode' => 'preferred',
        ];
        $builtIns = $client->getClientBuiltIns();
        $this->assertEquals(
            $expected,
            $builtIns
        );
    }

    public function testGetEndpointProviderArgs()
    {
        $client = new StsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $expected = [
            'Endpoint' => null,
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'UseGlobalEndpoint' => false,
            'AccountIdEndpointMode' => 'preferred'
        ];
        $providerArgs = $client->getEndpointProviderArgs();
        $this->assertEquals(
            $expected,
            $providerArgs
        );
    }

    public function testIsUseGlobalEndpoint() {
        $client = new StsClient([
            'region'  => 'us-west-2',
            'version' => 'latest',
            'sts_regional_endpoints' => 'legacy'
        ]);
        $providerArgs = $client->getEndpointProviderArgs();
        $this->assertTrue(
            $providerArgs['UseGlobalEndpoint']
        );

        $client = new S3Client([
            'region'  => 'us-east-1',
            'version' => 'latest',
            's3_us_east_1_regional_endpoint' => 'regional'
        ]);
        $providerArgs = $client->getEndpointProviderArgs();
        $this->assertFalse(
            $providerArgs['UseGlobalEndpoint']
        );
    }

    /** @dataProvider configuredEndpointUrlProvider */
    public function testAppliesConfiguredEndpointUrl($ini, $env, $expected)
    {
        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        file_put_contents($dir . '/config', $ini);
        $home = getenv('HOME');
        putenv('HOME=' . dirname($dir));

        if ($env) {
            putenv($env['key'] . '=' . $env['value']);
        }

       $client = new StsClient([
           'region' => 'us-west-2'
       ]);

        $this->assertTrue($client->getConfig()['configured_endpoint_url']);
        $this->assertEquals($expected, $client->getClientBuiltIns()['SDK::Endpoint']);
        $this->assertEquals($expected, $client->getEndpointProviderArgs()['Endpoint']);

        unlink($dir . '/config');
        putenv("HOME=$home");

        if ($env) {
            putenv($env['key'] . '=');
        }
    }

    /** @dataProvider configuredEndpointUrlProvider */
    public function testDoesNotApplyConfiguredEndpointWhenConfiguredUrlsIgnored($ini, $env)
    {
        putenv('AWS_IGNORE_CONFIGURED_ENDPOINT_URLS=true');

        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        file_put_contents($dir . '/config', $ini);
        $home = getenv('HOME');
        putenv('HOME=' . dirname($dir));

        if ($env) {
            putenv($env['key'] . '=' . $env['value']);
        }

        $client = new StsClient([
            'region' => 'us-west-2'
        ]);

        $this->assertFalse(isset($client->getConfig()['configured_endpoint_url']));
        $this->assertNull( $client->getClientBuiltIns()['SDK::Endpoint']);
        $this->assertNull($client->getEndpointProviderArgs()['Endpoint']);

        unlink($dir . '/config');
        putenv("HOME=$home");

        if ($env) {
            putenv($env['key'] . '=');
        }

        putenv('AWS_IGNORE_CONFIGURED_ENDPOINT_URLS=');
    }

    public function configuredEndpointUrlProvider()
    {
        return [
            [
                <<<EOT
[default]
endpoint_url = https://foo-bar.com
services = my-services
[services my-services]
sts =
  endpoint_url = https://test-foo.com
EOT
                ,
                ['key' => 'AWS_ENDPOINT_URL_STS', 'value' => 'https://test.com'],
                'https://test.com',
            ],
            [
                <<<EOT
[default]
endpoint_url = https://foo-bar.com
services = my-services
[services my-services]
sts =
  endpoint_url = https://test-foo.com
EOT
                ,
                null,
                'https://test-foo.com',
            ],
            [
                <<<EOT
[default]
endpoint_url = https://foo-bar.com
EOT
                ,
                ['key' => 'AWS_ENDPOINT_URL', 'value' => 'https://baz.com'],
                'https://baz.com',
            ],
            [
                <<<EOT
[default]
endpoint_url = https://foo-bar.com
EOT
                ,
                null,
                'https://foo-bar.com',
            ]
        ];
    }

    public function testAppliesConfiguredSignatureVersionViaFalseCredentials()
    {
        $client = new S3Client([
            'region' => 'us-west-2',
            'handler' => new MockHandler([new Result([])]),
            'credentials' => false
        ]);

        $this->assertTrue($client->getConfig('configured_signature_version'));

        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
            foreach (['Authorization', 'X-Amz-Date'] as $signatureHeader) {
                $this->assertFalse($req->hasHeader($signatureHeader));
            }
        }));

        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test'
        ]);
    }

    public function testAppliesConfiguredSignatureVersionViaClientConfig() {
        $client = $this->createClient(
            [
                'metadata' => [
                    'signatureVersion' => 'v4',
                ],
                'operations' => [
                    'Foo' => [
                        'http' => ['method' => 'POST'],
                        'authtype' => 'none',
                    ],
                ],
            ],
            [
                'handler' => function (
                    CommandInterface $command,
                    RequestInterface $request
                ) {
                    foreach (['Authorization', 'X-Amz-Date'] as $signatureHeader) {
                        $this->assertTrue($request->hasHeader($signatureHeader));
                    }

                    return new Result;
                },
                'signature_version' => 'v4'
            ]
        );

        $client->foo();
    }


    public function testCallingEmitDeprecationWarningEmitsDeprecationWarning()
    {
        $this->expectDeprecation();
        $this->expectDeprecationMessage(
            "This method is deprecated. It will be removed in an upcoming release."
        );
        $client = $this->createClient();
        $client::emitDeprecationWarning();
    }

    /**
     * @dataProvider signingRegionSetProvider
     * @runInSeparateProcess
     */
    public function testSigningRegionSetResolution(
        $command,
        $env,
        $ini,
        $clientSetting,
        $expected
    ){
        if (!extension_loaded('awscrt')) {
            $this->markTestSkipped();
        }

        if ($env) {
            putenv('AWS_SIGV4A_SIGNING_REGION_SET=' . $env);
        }

        if ($ini) {
            $dir = sys_get_temp_dir() . '/.aws';
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            file_put_contents($dir . '/config', $ini);
            $home = getenv('HOME');
            putenv('HOME=' . dirname($dir));
        }

        $client = $this->createClient(
            [
                'metadata' => [
                    'signatureVersion' => 'v4a',
                ],
                'operations' => [
                    'Foo' => [
                        'http' => ['method' => 'POST'],
                    ],
                ],
            ],
            [
                'handler' => function (
                    CommandInterface $command,
                    RequestInterface $request
                ) use ($expected) {
                    $this->assertEquals($expected, $request->getHeaderLine('x-amz-region-set'));
                    return new Result;
                },
                'signature_version' => 'v4a',
                'region' => 'us-west-2',
                'sigv4a_signing_region_set' => $clientSetting ?? null
            ]
        );

        $client->foo([
            '@context' => [
                'signing_region_set' => $command ?? null
            ]
        ]);

        if ($ini) {
            unlink($dir . '/config');
            putenv("HOME=$home");
        }

        putenv('AWS_SIGV4A_SIGNING_REGION_SET=');
    }

    public function signingRegionSetProvider()
    {
        return [
            [null, null, null, null, 'us-west-2'],
            [['*'], null, null, null, '*'],
            [null, '*', null, null, '*'],
            [
                null,
                null,
                <<<EOT
[default]
sigv4a_signing_region_set = *
EOT
                ,
                null,
                '*'
            ],
            [
                null, null, null, '*', '*'
            ],
            [null, 'us-west-2', null, null, 'us-west-2'],
            [
                null,
                null,
                <<<EOT
[default]
sigv4a_signing_region_set = us-west-2
EOT
                ,
                null,
                'us-west-2'
            ],
            [null, null, null, 'us-west-2', 'us-west-2'],
            [null, '*', null, 'us-west-2', 'us-west-2'],
            [
                null,
                null,
                <<<EOT
[default]
sigv4a_signing_region_set = *
EOT
                ,
                'us-west-2',
                'us-west-2'
            ],
            [['us-west-2', 'us-east-1'], null, null, null, 'us-west-2, us-east-1'],
            [null, "us-west-2, us-east-1", null , null, 'us-west-2, us-east-1'],
            [
                null,
                null,
                <<<EOT
[default]
sigv4a_signing_region_set = us-west-2, us-east-1
EOT
                ,
                null,
                'us-west-2, us-east-1'
            ],
            [null, null, null, 'us-west-2, us-east-1', 'us-west-2, us-east-1']
        ];
    }

    private function createHttpsEndpointClient(array $service = [], array $config = [])
    {
        $apiProvider = function () use ($service) {
            $service['metadata']['protocol'] = 'query';
            return $service;
        };

        return new AwsClient($config + [
            'handler'      => new MockHandler(),
            'credentials'  => new Credentials('foo', 'bar'),
            'signature'    => new SignatureV4('foo', 'bar'),
            'endpoint'     => 'https://us-east-1.foo.amazonaws.com',
            'region'       => 'foo',
            'service'      => 'foo',
            'api_provider' => $apiProvider,
            'error_parser' => function () {},
            'version'      => 'latest'
        ]);
    }

    private function createClient(array $service = [], array $config = [])
    {
        $apiProvider = function ($type) use ($service, $config) {
            if ($type == 'paginator') {
                return isset($service['pagination'])
                    ? ['pagination' => $service['pagination']]
                    : ['pagination' => []];
            } elseif ($type == 'waiter') {
                return isset($service['waiters'])
                    ? ['waiters' => $service['waiters'], 'version' => 2]
                    : ['waiters' => [], 'version' => 2];
            }

            if (!isset($service['metadata'])) {
                $service['metadata'] = [];
            }
            $service['metadata']['protocol'] = 'query';
            return $service;
        };

        return new AwsClient($config + [
            'handler'      => new MockHandler(),
            'credentials'  => new Credentials('foo', 'bar'),
            'signature'    => new SignatureV4('foo', 'bar'),
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'region'       => 'foo',
            'service'      => 'foo',
            'api_provider' => $apiProvider,
            'error_parser' => function () {},
            'version'      => 'latest'
        ]);
    }

    public function testClientDefaultsAccountIdEndpointModeBuiltInsToPreferred()
    {
        $client = new S3Client([
            'region' => 'us-east-1'
        ]);
        $builtIns = $client->getClientBuiltIns();

        self::assertEquals('preferred', $builtIns['AWS::Auth::AccountIdEndpointMode']);
    }

    public function testClientParameterOverridesDefaultAccountIdEndpointModeBuiltIns()
    {
        $expectedAccountIdEndpointMode = 'required';
        $client = new S3Client([
            'region' => 'us-east-1',
            'account_id_endpoint_mode' => $expectedAccountIdEndpointMode
        ]);
        $builtIns = $client->getClientBuiltIns();

        self::assertEquals($expectedAccountIdEndpointMode, $builtIns['AWS::Auth::AccountIdEndpointMode']);
    }

    public function testQueryModeHeaderAdded(): void
    {
        $service = $this->generateTestService('json', ['awsQueryCompatible' => true]);
        $client = $this->generateTestClient($service);
        $list = $client->getHandlerList();
        $list->setHandler(new MockHandler([new Result()]));
        $list->appendSign(Middleware::tap(function ($cmd, $req) {
            $this->assertTrue($req->hasHeader('x-amzn-query-mode'));
            $this->assertEquals("true", $req->getHeaderLine('x-amzn-query-mode'));
        }));
        $client->TestOperation();
    }

    public function testAppendsUserAgentMiddleware()
    {
        $client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (RequestInterface $request) {
                $userAgentValue = $request->getHeaderLine('User-Agent');

                $this->assertNotEmpty($userAgentValue);

                return new Response();
            }
        ]);
        $client->listBuckets();
    }
}
