<?php
namespace Aws\Test;

use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\AwsClient;
use Aws\CommandInterface;
use Aws\Credentials\Credentials;
use Aws\Ec2\Ec2Client;
use Aws\Ses\SesClient;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Signature\SignatureV4;
use Aws\Sts\StsClient;
use Aws\WrappedHttpHandler;
use GuzzleHttp\Promise\RejectedPromise;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\AwsClient
 */
class AwsClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    private function getApiProvider()
    {
        return function () {
            return [
                'metadata' => [
                    'protocol'       => 'query',
                    'endpointPrefix' => 'foo'
                ],
                'shapes' => []
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
        $this->assertSame($config['handler'], $this->readAttribute($client->getHandlerList(), 'handler'));
        $this->assertSame($config['credentials'], $client->getCredentials()->wait());
        $this->assertSame($config['region'], $client->getRegion());
        $this->assertEquals('foo', $client->getApi()->getEndpointPrefix());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Operation not found: Foo
     */
    public function testEnsuresOperationIsFoundWhenCreatingCommands()
    {
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
            'Aws\CommandInterface',
            $client->getCommand('foo')
        );
    }

    /**
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessage Error executing "foo" on "http://us-east-1.foo.amazonaws.com"; AWS HTTP error: Baz Bar!
     */
    public function testWrapsExceptions()
    {
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
            'Aws\S3\Exception\S3Exception'
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
            'Aws\CommandInterface',
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
        $client = $this->getTestClient('s3');
        $this->assertInstanceOf(
            'Generator',
            $client->getIterator('ListObjects', ['Bucket' => 'foobar'])
        );
    }

    public function testCanGetIteratorWithoutDefinedPaginator()
    {
        $client = $this->getTestClient('ec2');
        $data = ['foo', 'bar', 'baz'];
        $this->addMockResults($client, [new Result([
            'Subnets' => [$data],
        ])]);
        $iterator = $client->getIterator('DescribeSubnets');
        $this->assertInstanceOf('Traversable', $iterator);
        foreach ($iterator as $iterated) {
            $this->assertSame($data, $iterated);
        }
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testGetIteratorFailsForMissingConfig()
    {
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
            'Aws\ResultPaginator',
            $client->getPaginator('ListObjects', ['Bucket' => 'foobar'])
        );
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testGetPaginatorFailsForMissingConfig()
    {
        $client = $this->createClient();
        $client->getPaginator('ListObjects');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Operation not found
     */
    public function testCanWaitSynchronously()
    {
        $client = $this->createClient(['waiters' => ['PigsFly' => [
            'acceptors'   => [],
            'delay'       => 1,
            'maxAttempts' => 1,
            'operation'   => 'DescribePigs',
        ]]]);

        $client->waitUntil('PigsFly');
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testGetWaiterFailsForMissingConfig()
    {
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
        $this->assertInstanceOf('Aws\Waiter', $waiter);
        $promise = $waiter->promise();
        $promise->wait();
    }

    public function testCreatesClientsFromConstructor()
    {
        $client = new StsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $this->assertInstanceOf('Aws\Sts\StsClient', $client);
        $this->assertEquals('us-west-2', $client->getRegion());
    }

    public function testCanGetEndpoint()
    {
        $client = $this->createClient();
        $this->assertEquals(
            'http://us-east-1.foo.amazonaws.com',
            $client->getEndpoint()
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
        $str = \GuzzleHttp\Psr7\str($request);
        $this->assertContains('AWS4-HMAC-SHA256', $str);
    }

    public function testAllowsFactoryMethodForBc()
    {
        Ec2Client::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
    }

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
        $this->assertTrue(is_callable($provider));
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Instances of Aws\AwsClient cannot be serialized
     */
    public function testDoesNotPermitSerialization()
    {
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
            } else {
                if (!isset($service['metadata'])) {
                    $service['metadata'] = [];
                }
                $service['metadata']['protocol'] = 'query';
                return $service;
            }
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
}
