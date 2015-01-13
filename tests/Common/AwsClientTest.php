<?php
namespace Aws\Test\Common;

use Aws\Test\UsesServiceTrait;
use Aws\Common\Api\Service;
use Aws\Common\AwsClient;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Exception\AwsException;
use Aws\Common\Signature\SignatureV4;
use Aws\Sqs\SqsClient;
use Aws\Sts\StsClient;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Subscriber\Mock;

/**
 * @covers Aws\Common\AwsClient
 */
class AwsClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testHasGetters()
    {
        $config = [
            'client'       => new Client(),
            'credentials'  => new Credentials('foo', 'bar'),
            'signature'    => new SignatureV4('foo', 'bar'),
            'region'       => 'foo',
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'serializer'   => function () {},
            'api'          => new Service(function () {}, 'foo', 'bar'),
            'error_parser' => function () {},
            'version'      => 'latest'
        ];

        $client = new AwsClient($config);
        $this->assertSame($config['client'], $client->getHttpClient());
        $this->assertSame($config['credentials'], $client->getCredentials());
        $this->assertSame($config['signature'], $client->getSignature());
        $this->assertSame($config['region'], $client->getRegion());
        $this->assertSame($config['api'], $client->getApi());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage is a required option
     */
    public function testEnsuresRequiredArgumentsArePresent()
    {
        new AwsClient([]);
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
        $client = $this->createClient(['operations' => ['foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $this->assertInstanceOf(
            'GuzzleHttp\Command\CommandInterface',
            $client->getCommand('foo')
        );
    }

    public function testMergesDefaultCommandParameters()
    {
        $client = $this->createClient(
            ['operations' => ['foo' => ['http' => ['method' => 'POST']]]],
            ['defaults' => ['test' => '123']]
        );
        $command = $client->getCommand('foo', ['bam' => 'boozled']);
        $this->assertEquals('123', $command['test']);
        $this->assertEquals('boozled', $command['bam']);
    }

    public function errorProvider()
    {
        return [
            [null, 'Aws\Common\Exception\AwsException'],
            ['Aws\Ec2\Exception\Ec2Exception', 'Aws\Ec2\Exception\Ec2Exception']
        ];
    }

    /**
     * @dataProvider errorProvider
     */
    public function testThrowsSpecificErrors($value, $type)
    {
        $apiProvider = function () {
            return ['operations' => ['foo' => [
                'http' => ['method' => 'POST']
            ]]];
        };
        $service = new Service($apiProvider, 'foo', 'bar');

        $c = new Client();
        $client = new AwsClient([
            'client'          => $c,
            'credentials'     => new Credentials('foo', 'bar'),
            'signature'       => new SignatureV4('foo', 'bar'),
            'endpoint'        => 'http://us-east-1.foo.amazonaws.com',
            'region'          => 'foo',
            'exception_class' => $value,
            'api'             => $service,
            'version'         => 'latest',
            'serializer'   => function () use ($c) {
                return $c->createRequest('GET', 'http://httpbin.org');
            },
            'error_parser'    => function () {
                return [
                    'code' => 'foo',
                    'type' => 'bar',
                    'request_id' => '123'
                ];
            }
        ]);

        $client->getHttpClient()->getEmitter()->attach(new Mock([
            new Response(404)
        ]));

        try {
            $client->foo();
            $this->fail('Did not throw an exception');
        } catch (AwsException $e) {
            $this->assertInstanceOf($type, $e);
            $this->assertEquals([
                'aws_error' => [
                    'code' => 'foo',
                    'type' => 'bar',
                    'request_id' => '123'
                ]
            ], $e->getTransaction()->context->toArray());
            $this->assertEquals('foo', $e->getAwsErrorCode());
            $this->assertEquals('bar', $e->getAwsErrorType());
            $this->assertEquals('123', $e->getAwsRequestId());
        }
    }

    /**
     * @expectedException \Aws\Common\Exception\AwsException
     * @expectedExceptionMessage Uncaught exception while executing Aws\Common\AwsClient::foo - Baz Bar!
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
     * @expectedException \Aws\Common\Exception\AwsException
     * @expectedExceptionMessage Error executing Aws\Common\AwsClient::foo() on "http://foo.com"; Baz Bar!
     */
    public function testHandlesNetworkingErrorsGracefully()
    {
        $r = new Request('GET', 'http://foo.com');
        $client = $this->createClient(
            ['operations' => ['foo' => ['http' => ['method' => 'POST']]]],
            ['serializer' => function () use ($r) { return $r; }]
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

    public function testCanSpecifyDefaultCommandOptions()
    {
        $client = $this->createClient(['operations' => ['foo' => [
            'http' => ['method' => 'POST']
        ]]], ['defaults' => ['baz' => 'bam']]);

        $c = $client->getCommand('foo');
        $this->assertEquals('bam', $c['baz']);
    }

    public function testCanGetIterator()
    {
        $client = $this->getTestClient('s3');
        $this->assertInstanceOf(
            'Aws\Common\FlatMapIterator',
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
            'Aws\Common\ResultPaginator',
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
        $client = SqsClient::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $this->assertInstanceOf('Aws\Sqs\SqsClient', $client);
        $this->assertEquals('us-west-2', $client->getRegion());

        $client = StsClient::factory([
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
                return $service;
            }
        };

        $api = new Service($apiProvider, 'service', 'region');

        return new AwsClient($config + [
            'client'       => new Client(),
            'credentials'  => new Credentials('foo', 'bar'),
            'signature'    => new SignatureV4('foo', 'bar'),
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'region'       => 'foo',
            'api'          => $api,
            'serializer'   => function () {},
            'error_parser' => function () {},
            'version'      => 'latest'
        ]);
    }
}
