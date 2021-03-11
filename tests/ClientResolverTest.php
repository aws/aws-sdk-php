<?php
namespace Aws\Test;

use Aws\Api\Service;
use Aws\ClientResolver;
use Aws\ClientSideMonitoring\Configuration;
use Aws\ClientSideMonitoring\ConfigurationProvider;
use Aws\CommandInterface;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\DynamoDb\DynamoDbClient;
use Aws\Endpoint\Partition;
use Aws\Exception\InvalidRegionException;
use Aws\LruArrayCache;
use Aws\S3\S3Client;
use Aws\HandlerList;
use Aws\Sdk;
use Aws\Result;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\ClientResolver
 */
class ClientResolverTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing required client configuration options
     */
    public function testEnsuresRequiredArgumentsAreProvided()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([], new HandlerList());
    }

    public function testAddsValidationSubscriber()
    {
        $c = new DynamoDbClient([
            'region'  => 'x',
            'version' => 'latest'
        ]);

        try {
            // CreateTable requires actual input parameters.
            $c->createTable([]);
            $this->fail('Did not validate');
        } catch (\InvalidArgumentException $e) {}
    }

    public function testCanDisableValidation()
    {
        $c = new DynamoDbClient([
            'region'   => 'x',
            'version'  => 'latest',
            'validate' => false
        ]);
        $command = $c->getCommand('CreateTable');
        $handler = \Aws\constantly(new Result([]));
        $command->getHandlerList()->setHandler($handler);
        $c->execute($command);
    }

    public function testCanDisableSpecificValidationConstraints()
    {
        $c = new DynamoDbClient([
            'region'   => 'x',
            'version'  => 'latest',
            'validate' => [
                'min' => true,
                'max' => true,
                'required' => false
            ]
        ]);
        $command = $c->getCommand('CreateTable');
        $handler = \Aws\constantly(new Result([]));
        $command->getHandlerList()->setHandler($handler);
        $c->execute($command);
    }

    public function testAppliesApiProvider()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $provider = function () {
            return ['metadata' => ['protocol' => 'query']];
        };
        $conf = $r->resolve([
            'service'      => 'dynamodb',
            'region'       => 'x',
            'api_provider' => $provider,
            'version'      => 'latest'
        ], new HandlerList());
        $this->assertArrayHasKey('api', $conf);
        $this->assertArrayHasKey('error_parser', $conf);
        $this->assertArrayHasKey('serializer', $conf);
    }

    public function testAppliesApiProviderSigningNameToConfig()
    {
        $signingName = 'foo';
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'      => 'dynamodb',
            'region'       => 'x',
            'api_provider' => function () use ($signingName) {
                return ['metadata' => [
                    'protocol' => 'query',
                    'signingName' => $signingName,
                ]];
            },
            'version'      => 'latest'
        ], new HandlerList());
        $this->assertSame($conf['config']['signing_name'], $signingName);
    }

    public function testAppliesUseAwsSharedFilesTOConfig()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'      => 'dynamodb',
            'region'       => 'x',
            'use_aws_shared_config_files' => false,
            'version'      => 'latest'
        ], new HandlerList());
        $this->assertSame($conf['use_aws_shared_config_files'], false);
    }

    public function testPrefersApiProviderNameToPartitionName()
    {
        $signingName = 'foo';
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'      => 'dynamodb',
            'region'       => 'x',
            'api_provider' => function () use ($signingName) {
                return ['metadata' => [
                    'protocol' => 'query',
                    'signingName' => $signingName,
                ]];
            },
            'endpoint_provider' => function () use ($signingName) {
                return [
                    'endpoint' => 'https://www.amazon.com',
                    'signingName' => "not_$signingName",
                ];
            },
            'version'      => 'latest'
        ], new HandlerList());
        $this->assertSame($conf['config']['signing_name'], $signingName);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid configuration value provided for "foo". Expected string, but got int(-1)
     */
    public function testValidatesInput()
    {
        $r = new ClientResolver([
            'foo' => [
                'type'  => 'value',
                'valid' => ['string']
            ]
        ]);
        $r->resolve(['foo' => -1], new HandlerList());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid configuration value provided for "foo". Expected callable, but got string(1) "c"
     */
    public function testValidatesCallables()
    {
        $r = new ClientResolver([
            'foo' => [
                'type'   => 'value',
                'valid'  => ['callable']
            ]
        ]);
        $r->resolve(['foo' => 'c'], new HandlerList());
    }

    public function testValidatesCallableClosure()
    {
        $r = new ClientResolver([
            'foo' => [
                'type' => 'value',
                'valid' => ['string'],
                'default' => function () {
                    return 'callable_test';
                }
            ]
        ]);
        $res = $r->resolve([], new HandlerList());
        $this->assertSame('callable_test', $res['foo']);
    }

    public function checkCallable()
    {
        return "testcall";
    }

    public function testValidatesNotInvokeStringCallable()
    {
        $callableFunction = '\Aws\test\ClientResolverTest::checkCallable';
        $r = new ClientResolver([
            'foo' => [
                'type'    => 'value',
                'valid'   => ['string'],
                'default' => $callableFunction
            ]
        ]);
        $res = $r->resolve([], new HandlerList());
        $this->assertInternalType('callable', $callableFunction);
        $this->assertSame(
            '\Aws\test\ClientResolverTest::checkCallable',
            $res['foo']
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Credentials must be an
     */
    public function testValidatesCredentials()
    {
        $r = new ClientResolver([
            'credentials' => ClientResolver::getDefaultArguments()['credentials']
        ]);
        $r->resolve(['credentials' => []], new HandlerList());
    }

    public function testLoadsFromDefaultChainIfNeeded()
    {
        $key = getenv(CredentialProvider::ENV_KEY);
        $secret = getenv(CredentialProvider::ENV_SECRET);
        putenv(CredentialProvider::ENV_KEY . '=foo');
        putenv(CredentialProvider::ENV_SECRET . '=bar');
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'sqs',
            'region' => 'x',
            'version' => 'latest'
        ], new HandlerList());
        $c = call_user_func($conf['credentials'])->wait();
        $this->assertInstanceOf('Aws\Credentials\CredentialsInterface', $c);
        $this->assertSame('foo', $c->getAccessKeyId());
        $this->assertSame('bar', $c->getSecretKey());
        putenv(CredentialProvider::ENV_KEY . "=$key");
        putenv(CredentialProvider::ENV_SECRET . "=$secret");
    }

    public function testCreatesFromArray()
    {
        $exp = time() + 500;
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'version'     => 'latest',
            'credentials' => [
                'key'     => 'foo',
                'secret'  => 'baz',
                'token'   => 'tok',
                'expires' => $exp
            ]
        ], new HandlerList());
        $creds = call_user_func($conf['credentials'])->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('baz', $creds->getSecretKey());
        $this->assertSame('tok', $creds->getSecurityToken());
        $this->assertSame($exp, $creds->getExpiration());
    }

    public function testCanDisableRetries()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'      => 's3',
            'region'       => 'baz',
            'version'      => 'latest',
            'retries'      => 0,
        ], new HandlerList());
    }

    public function testCanEnableRetries()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'      => 's3',
            'region'       => 'baz',
            'version'      => 'latest',
            'retries'      => 2,
        ], new HandlerList());
    }

    public function testCanEnableRetriesStandardMode()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'      => 's3',
            'region'       => 'baz',
            'version'      => 'latest',
            'retries'      => [
                'mode' => 'standard',
                'max_attempts' => 10,
            ]
        ], new HandlerList());
    }

    public function testCanEnableRetriesAdaptivedMode()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'      => 's3',
            'region'       => 'baz',
            'version'      => 'latest',
            'retries'      => [
                'mode' => 'adaptive',
                'max_attempts' => 10,
            ]
        ], new HandlerList());
    }

    public function testCanCreateNullCredentials()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'sqs',
            'region' => 'x',
            'credentials' => false,
            'version' => 'latest'
        ], new HandlerList());
        $creds = call_user_func($conf['credentials'])->wait();
        $this->assertInstanceOf('Aws\Credentials\Credentials', $creds);
        $this->assertSame('anonymous', $conf['config']['signature_version']);
    }

    public function testCanCreateCredentialsFromProvider()
    {
        $c = new Credentials('foo', 'bar');
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'credentials' => function () use ($c) {
                return \GuzzleHttp\Promise\promise_for($c);
            },
            'version'     => 'latest'
        ], new HandlerList());
        $this->assertSame($c, call_user_func($conf['credentials'])->wait());
    }

    public function testCanCreateCredentialsFromProfile()
    {
        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $ini = <<<EOT
[foo]
aws_access_key_id = foo
aws_secret_access_key = baz
aws_session_token = tok
EOT;
        file_put_contents($dir . '/credentials', $ini);
        $home = getenv('HOME');
        putenv('HOME=' . dirname($dir));
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'sqs',
            'region'  => 'x',
            'profile' => 'foo',
            'version' => 'latest'
        ], new HandlerList());
        $creds = call_user_func($conf['credentials'])->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('baz', $creds->getSecretKey());
        $this->assertSame('tok', $creds->getSecurityToken());
        unlink($dir . '/credentials');
        putenv("HOME=$home");
    }

    public function testCanUseCredentialsObject()
    {
        $c = new Credentials('foo', 'bar');
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'credentials' => $c,
            'version'     => 'latest'
        ], new HandlerList());
        $this->assertSame($c, call_user_func($conf['credentials'])->wait());
    }

    public function testCanUseCredentialsCache()
    {
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI');
        unset($_SERVER['AWS_CONTAINER_CREDENTIALS_RELATIVE_URI']);
        $credentialsEnvironment = [
            'home' => 'HOME',
            'key' => CredentialProvider::ENV_KEY,
            'secret' => CredentialProvider::ENV_SECRET,
            'session' => CredentialProvider::ENV_SESSION,
            'profile' => CredentialProvider::ENV_PROFILE,
        ];
        $envState = [];
        foreach ($credentialsEnvironment as $key => $envVariable) {
            $envState[$key] = getenv($envVariable);
            putenv("$envVariable=");
        }

        $c = new Credentials('foo', 'bar');
        $cache = new LruArrayCache;
        $cache->set('aws_cached_instance_credentials', $c);
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'credentials' => $cache,
            'version'     => 'latest'
        ], new HandlerList());

        $cached = call_user_func($conf['credentials'])->wait();

        foreach ($credentialsEnvironment as $key => $envVariable) {
            putenv("$envVariable={$envState[$key]}");
        }

        $this->assertSame($c, $cached);
    }

    public function testCanUseCsmConfigObject()
    {
        $config = new Configuration(true, 'foohost', 1111, 'barid');
        $resolver = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $resolver->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'csm'         => $config,
            'version'     => 'latest'
        ], new HandlerList());
        $this->assertEquals($config->toArray(), $conf['csm']->toArray());
    }

    public function testCanUseCsmArray()
    {
        $config = new Configuration(true, 'foohost', 1111, 'barid');
        $configArray = $config->toArray();
        $resolver = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $resolver->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'csm'         => $configArray,
            'version'     => 'latest'
        ], new HandlerList());
        $this->assertEquals($configArray, $conf['csm']);
    }

    public function testCanUseCsmFalse()
    {
        $config = new Configuration(
            false,
            ConfigurationProvider::DEFAULT_HOST,
            ConfigurationProvider::DEFAULT_PORT,
            ConfigurationProvider::DEFAULT_CLIENT_ID
        );
        $resolver = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $resolver->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'csm'         => false,
            'version'     => 'latest'
        ], new HandlerList());
        $this->assertEquals($config->toArray(), $conf['csm']->toArray());
    }

    public function testCanUseCustomEndpointProviderWithExtraData()
    {
        $p = function () {
            return [
                'endpoint' => 'http://foo.com',
                'signatureVersion' => 'v4'
            ];
        };
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'sqs',
            'region' => 'x',
            'endpoint_provider' => $p,
            'version' => 'latest'
        ], new HandlerList());
        $this->assertSame('v4', $conf['config']['signature_version']);
    }

    public function testCanPassStsRegionalEndpointsToEndpointProvider()
    {
        $data = json_decode(
            file_get_contents(__DIR__ . '/Endpoint/fixtures/sts_regional_endpoints.json'),
            true
        );
        $partition = new Partition($data['partitions'][0]);
        $resolver = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $resolver->resolve([
            'service'                   => 'sts',
            'region'                    => 'us-west-2',
            'sts_regional_endpoints'    => 'regional',
            'version'                   => 'latest',
            'endpoint_provider'         => $partition
        ], new HandlerList());

        $this->assertSame(
            'https://sts.us-west-2.amazonaws.com',
            $conf['endpoint']
        );
    }

    /**
     * @dataProvider s3EndpointCases
     *
     * @param $config
     * @param $endpoint
     */
    public function testCanPassS3RegionalEndpointToEndpointProvider($config, $endpoint)
    {
        $data = json_decode(
            file_get_contents(__DIR__ . '/Endpoint/fixtures/s3_us_east_1_regional_endpoint.json'),
            true
        );
        $partition = new Partition($data['partitions'][0]);
        $resolver = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $resolver->resolve([
            'service'                           => 's3',
            'region'                            => 'us-east-1',
            's3_us_east_1_regional_endpoint'    => $config,
            'version'                           => 'latest',
            'endpoint_provider'                 => $partition
        ], new HandlerList());
        $this->assertEquals($endpoint, $conf['endpoint']);
    }

    public function s3EndpointCases()
    {
        return [
            ['regional', 'https://s3.us-east-1.amazonaws.com'],
            ['legacy', 'https://s3.amazonaws.com'],
        ];
    }

    public function testAddsLoggerWithDebugSettings()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'      => 'sqs',
            'region'       => 'x',
            'retry_logger' => 'debug',
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'version'      => 'latest'
        ], new HandlerList());
    }

    public function testAddsDebugListener()
    {
        $em = new HandlerList();
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'  => 'sqs',
            'region'   => 'x',
            'debug'    => true,
            'endpoint' => 'http://us-east-1.foo.amazonaws.com',
            'version'  => 'latest'
        ], $em);
    }

    public function canSetDebugToFalse()
    {
        $em = new HandlerList();
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'  => 'sqs',
            'region'   => 'x',
            'debug'    => false,
            'endpoint' => 'http://us-east-1.foo.amazonaws.com',
            'version'  => 'latest'
        ], $em);
    }

    public function testCanAddHttpClientDefaultOptions()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'sqs',
            'region'  => 'x',
            'version' => 'latest',
            'http'    => ['foo' => 'bar']
        ], new HandlerList());
        $this->assertSame('bar', $conf['http']['foo']);
    }

    public function testCanAddConfigOptions()
    {
        $c = new S3Client([
            'version'         => 'latest',
            'region'          => 'us-west-2',
            'bucket_endpoint' => true,
        ]);
        $this->assertTrue($c->getConfig('bucket_endpoint'));
    }

    public function testSkipsNonRequiredKeys()
    {
        $r = new ClientResolver([
            'foo' => [
                'valid' => ['int'],
                'type'  => 'value'
            ]
        ]);
        $r->resolve([], new HandlerList());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A "version" configuration value is required
     */
    public function testHasSpecificMessageForMissingVersion()
    {
        $args = ClientResolver::getDefaultArguments()['version'];
        $r = new ClientResolver(['version' => $args]);
        $r->resolve(['service' => 'foo'], new HandlerList());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A "version" configuration value is required
     */
    public function testHasSpecificMessageForNullRequiredVersion()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $list = new HandlerList();
        $r->resolve([
            'service'     => 'foo',
            'region'      => 'x',
            'credentials' => ['key' => 'a', 'secret' => 'b'],
            'version'     => null,
        ], $list);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A "region" configuration value is required for the "foo" service
     */
    public function testHasSpecificMessageForMissingRegion()
    {
        $args = ClientResolver::getDefaultArguments()['region'];
        $r = new ClientResolver(['region' => $args]);
        $r->resolve(['service' => 'foo'], new HandlerList());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A "region" configuration value is required for the "foo" service
     */
    public function testHasSpecificMessageForNullRequiredRegion()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $list = new HandlerList();
        $r->resolve([
            'service'     => 'foo',
            'region'      => null,
            'credentials' => ['key' => 'a', 'secret' => 'b'],
            'version'     => 'latest',
        ], $list);
    }

    public function testAddsTraceMiddleware()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $list = new HandlerList();
        $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'credentials' => ['key' => 'a', 'secret' => 'b'],
            'version'     => 'latest',
            'debug'       => ['logfn' => function ($value) use (&$str) { $str .= $value; }]
        ], $list);
        $value = $this->readAttribute($list, 'interposeFn');
        $this->assertInternalType('callable', $value);
    }

    public function testAppliesUserAgent()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $list = new HandlerList();
        $conf = $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'credentials' => ['key' => 'a', 'secret' => 'b'],
            'version'     => 'latest',
            'ua_append' => 'PHPUnit/Unit',
        ], $list);
        $this->assertArrayHasKey('ua_append', $conf);
        $this->assertInternalType('array', $conf['ua_append']);
        $this->assertContains('PHPUnit/Unit', $conf['ua_append']);
        $this->assertContains('aws-sdk-php/' . Sdk::VERSION, $conf['ua_append']);
    }

    public function testUserAgentAlwaysStartsWithSdkAgentString()
    {
        $command = $this->getMockBuilder(CommandInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $request = $this->getMockBuilder(RequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $request->expects($this->once())
            ->method('getHeader')
            ->with('User-Agent')
            ->willReturn(['MockBuilder']);

        $request->expects($this->once())
            ->method('withHeader')
            ->with(
                'User-Agent',
                new \PHPUnit\Framework\Constraint\RegularExpression(
                    '/aws-sdk-php\/' . Sdk::VERSION . '.* MockBuilder/'
                )
            );

        $args = [];
        $list = new HandlerList(function () {});
        ClientResolver::_apply_user_agent([], $args, $list);
        call_user_func($list->resolve(), $command, $request);
    }

    public function malformedEndpointProvider()
    {
        return [
            ['www.amazon.com'], // missing protocol
            ['https://'], // missing host
        ];
    }

    /**
     * @dataProvider malformedEndpointProvider
     * @param $endpoint
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Endpoints must be full URIs and include a scheme and host
     */
    public function testRejectsMalformedEndpoints($endpoint)
    {
        $list = new HandlerList();
        $args = [];
        ClientResolver::_apply_endpoint($endpoint, $args, $list);
    }

    /**
     * @dataProvider statValueProvider
     * @param bool|array $userValue
     * @param array $resolvedValue
     */
    public function testAcceptsBooleansAndArraysForSelectiveStatCollection($userValue, array $resolvedValue)
    {
        $list = new HandlerList;
        $args = [];
        ClientResolver::_apply_stats($userValue, $args, $list);
        foreach ($resolvedValue as $collector => $enabled) {
            $this->assertArrayHasKey($collector, $args['stats']);
            $this->assertSame($enabled, $args['stats'][$collector]);
        }
    }

    public function statValueProvider()
    {
        return [
            [
                // Value provided for all stat collectors
                ['http' => false, 'retries' => true, 'timer' => false],
                ['http' => false, 'retries' => true, 'timer' => false],
            ],
            [
                // Value provided for a subset of stat collectors
                ['retries' => true],
                ['http' => false, 'retries' => true, 'timer' => false],
            ],
            [
                // Boolean false
                false,
                ['http' => false, 'retries' => false, 'timer' => false],
            ],
            [
                // Boolean true
                true,
                ['http' => true, 'retries' => true, 'timer' => true],
            ],
        ];
    }

    /**
     * @dataProvider endpointProviderReturnProvider
     *
     * @param array $args
     * @param string $argName
     * @param string $expected
     * @param string $override
     */
    public function testResolvesValuesReturnedByEndpointProvider(
        array $args,
        $argName,
        $expected,
        $override
    ) {
        $resolverArgs = array_intersect_key(
            ClientResolver::getDefaultArguments(),
            array_flip(['endpoint_provider', 'service', 'region', 'scheme', $argName])
        );
        $resolver = new ClientResolver($resolverArgs);

        $resolved = $resolver->resolve($args, new HandlerList);
        $this->assertSame($expected, $resolved[$argName]);

        $resolved = $resolver->resolve([$argName => $override] + $args, new HandlerList);
        $this->assertSame($override, $resolved[$argName]);
    }

    public function endpointProviderReturnProvider()
    {
        $partition = new Partition([
            'partition' => 'aws-test',
            'dnsSuffix' => 'amazonaws.com',
            'regions' => [],
            'services' => [
                'foo' => [
                    'endpoints' => [
                        'bar' => [
                            'credentialScope' => [
                                'service' => 'baz',
                                'region' => 'quux',
                            ],
                            'signatureVersions' => ['anonymous'],
                        ],
                    ],
                ],
            ],
        ]);
        $invocationArgs = [
            'endpoint_provider' => $partition,
            'service' => 'foo',
            'region' => 'bar',
        ];

        return [
            // signatureVersion
            [$invocationArgs, 'signature_version', 'anonymous', 'v4'],
            // signingName
            [$invocationArgs, 'signing_name', 'baz', 'fizz'],
            // signingRegion
            [$invocationArgs, 'signing_region', 'quux', 'buzz'],
        ];
    }


    /**
     * @dataProvider partitionReturnProvider
     *
     * @param array $args
     * @param string $argName
     * @param string $expected
     */
    public function testSigningValuesAreFetchedFromPartition(
        array $args,
        $argName,
        $expected
    ) {
        $resolverArgs = array_intersect_key(
            ClientResolver::getDefaultArguments(),
            array_flip(['endpoint_provider', 'endpoint', 'service', 'region', $argName])
        );
        $resolver = new ClientResolver($resolverArgs);

        $resolved = $resolver->resolve($args, new HandlerList);
        $this->assertSame($expected, $resolved[$argName]);
    }

    public function partitionReturnProvider()
    {
        $invocationArgs = ['endpoint' => 'https://foo.bar.amazonaws.com'];

        return [
            // signatureVersion
            [
                ['service' => 's3', 'region' => 'us-west-2'] + $invocationArgs,
                'signature_version',
                's3v4',
            ],
            // signingName
            [
                ['service' => 'iot', 'region' => 'us-west-2'] + $invocationArgs,
                'signing_name',
                'execute-api',
            ],
            // signingRegion
            [
                ['service' => 'dynamodb', 'region' => 'local'] + $invocationArgs,
                'signing_region',
                'us-east-1',
            ],
        ];
    }

    /**
     * @dataProvider idempotencyAutoFillProvider
     *
     * @param mixed $value
     * @param bool $shouldAddIdempotencyMiddleware
     */
    public function testIdempotencyTokenMiddlewareAddedAsAppropriate(
        $value,
        $shouldAddIdempotencyMiddleware
    ){
        $args = [
            'api' => new Service([], function () { return []; }),
        ];
        $list = new HandlerList;

        $this->assertCount(0, $list);
        ClientResolver::_apply_idempotency_auto_fill($value, $args, $list);
        $this->assertCount($shouldAddIdempotencyMiddleware ? 1 : 0, $list);
    }

    public function idempotencyAutoFillProvider()
    {
        return [
            [true, true],
            [false, false],
            ['truthy', false],
            ['openssl_random_pseudo_bytes', true],
            [function ($length) { return 'foo'; }, true],
        ];
    }

    /**
     * @dataProvider validateRegionProvider
     *
     * @param $region
     * @param $expected
     */
    public function testValidatesRegion($region, $expected)
    {
        $resolver = new ClientResolver(ClientResolver::getDefaultArguments());
        try {
            $result = $resolver->resolve(
                [
                    'service' => 's3',
                    'version' => 'latest',
                    'region' => $region
                ],
                new HandlerList()
            );

            if ($expected instanceof \Exception) {
                $this->fail('Expected an exception with: ' . $expected->getMessage());
            }
            $this->assertEquals($expected, $result['region']);

        } catch (InvalidRegionException $e) {
            $this->assertEquals($expected->getMessage(), $e->getMessage());
        }
    }

    public function validateRegionProvider()
    {
        return [
            [
                'us-west-2',
                'us-west-2',
            ],
            [
                'x',
                'x',
            ],
            [
                '',
                new InvalidRegionException('Region must be a valid RFC host label.'),
            ],
            [
                'hosthijack.com/',
                new InvalidRegionException('Region must be a valid RFC host label.'),
            ],
        ];
    }
}
