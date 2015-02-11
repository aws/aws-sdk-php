<?php
namespace Aws\Test;

use Aws\AwsClient;
use Aws\Credentials\Credentials;
use Aws\Ec2\Ec2Client;
use Aws\Signature\SignatureV4;
use Aws\Sqs\SqsClient;
use Aws\Sts\StsClient;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

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
                ]
            ];
        };
    }

    public function testHasGetters()
    {
        $config = [
            'client'       => new Client(),
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
        $this->assertSame($config['client'], $client->getHttpClient());
        $this->assertSame($config['credentials'], $client->getCredentials());
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
            'GuzzleHttp\Command\CommandInterface',
            $client->getCommand('foo')
        );
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     * @expectedExceptionMessage Uncaught exception while executing Aws\AwsClient::foo - Baz Bar!
     */
    public function testWrapsUncaughtExceptions()
    {
        $client = $this->createClient(
            ['operations' => ['foo' => ['http' => ['method' => 'POST']]]]
        );
        $command = $client->getCommand('foo');
        $command->getEmitter()->on('init', function () {
            throw new \RuntimeException('Baz Bar!');
        });
        $client->execute($command);
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     * @expectedExceptionMessage Error executing Aws\AwsClient::foo() on "http://foo.com"; Baz Bar!
     */
    public function testHandlesNetworkingErrorsGracefully()
    {
        $r = new Request('GET', 'http://foo.com');
        $client = $this->createClient(
            ['operations' => ['foo' => ['http' => ['method' => 'POST']]]],
            [
                'serializer' => function () use ($r) { return $r; },
                'endpoint'   => 'http://foo.com'
            ]
        );
        $command = $client->getCommand('foo');
        $command->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $e->getRequest()->getEmitter()->on('before', function () {
                throw new \RuntimeException('Baz Bar!');
            });
        });
        $client->execute($command);
    }

    public function testChecksBothLowercaseAndUppercaseOperationNames()
    {
        $client = $this->createClient(['operations' => ['Foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $this->assertInstanceOf(
            'GuzzleHttp\Command\CommandInterface',
            $client->getCommand('foo')
        );
    }

    public function testCanGetIterator()
    {
        $client = $this->getTestClient('s3');
        $this->assertInstanceOf(
            'Generator',
            $client->getIterator('ListObjects', ['Bucket' => 'foobar'])
        );
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

    public function testCreatesClientsFromFactoryMethod()
    {
        $client = new SqsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $this->assertInstanceOf('Aws\Sqs\SqsClient', $client);
        $this->assertEquals('us-west-2', $client->getRegion());

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

    private function createClient(array $service = [], array $config = [])
    {
        $apiProvider = function ($type) use ($service, $config) {
            if ($type == 'paginator') {
                return isset($service['pagination'])
                    ? ['pagination' => $service['pagination']]
                    : ['pagination' => []];
            } elseif ($type == 'waiter') {
                return isset($service['waiters'])
                    ? ['waiters' => $service['waiters']]
                    : ['waiters' => []];
            } else {
                if (!isset($service['metadata'])) {
                    $service['metadata'] = [];
                }
                $service['metadata']['protocol'] = 'query';
                return $service;
            }
        };

        return new AwsClient($config + [
            'client'       => new Client(),
            'credentials'  => new Credentials('foo', 'bar'),
            'signature'    => new SignatureV4('foo', 'bar'),
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'region'       => 'foo',
            'service'      => 'foo',
            'api_provider' => $apiProvider,
            'serializer'   => function () {},
            'error_parser' => function () {},
            'version'      => 'latest'
        ]);
    }

    public function signerProvider()
    {
        return [
            [null, 'AWS4-HMAC-SHA256'],
            ['v2', 'SignatureVersion']
        ];
    }

    /**
     * @dataProvider signerProvider
     */
    public function testSignsRequestsUsingSigner($version, $search)
    {
        $conf = [
            'region'  => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => 'foo',
                'secret' => 'bar'
            ]
        ];

        if ($version) {
            $conf['signature_version'] = $version;
        }

        $client = new Ec2Client($conf);
        $client->getHttpClient()->getEmitter()->on(
            'before',
            function (BeforeEvent $e) use ($search) {
                $str = (string) $e->getRequest();
                $this->assertContains($search, $str);
                $e->intercept(new Response(200));
            },
            RequestEvents::SIGN_REQUEST - 1
        );
        $client->describeInstances();
    }

    public function testAllowsFactoryMethodForBc()
    {
        Ec2Client::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
    }
}
