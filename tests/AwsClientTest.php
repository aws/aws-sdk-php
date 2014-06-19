<?php
namespace Aws\Test;

use Aws\Common\Api\Service;
use Aws\AwsClient;
use Aws\Common\Credentials\Credentials;
use Aws\AwsException;
use Aws\Common\Signature\SignatureV4;
use Aws\Common\Subscriber\Error;
use Aws\Sqs\SqsClient;
use Aws\Sts\StsClient;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Subscriber\Mock;

/**
 * @covers Aws\AwsClient
 */
class AwsClientTest extends \PHPUnit_Framework_TestCase
{
    public function testHasGetters()
    {
        $config = [
            'client'      => new Client(),
            'credentials' => new Credentials('foo', 'bar'),
            'signature'   => new SignatureV4('foo', 'bar'),
            'region'      => 'foo',
            'api'         => new Service([])
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
        $this->createClient([])->getCommand('foo');
    }

    public function testReturnsCommandForOperation()
    {
        $client = $this->createClient(['operations' => ['foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $this->assertInstanceOf(
            'Aws\AwsCommandInterface',
            $client->getCommand('foo')
        );
    }

    public function errorProvider()
    {
        return [
            [null, 'Aws\AwsException'],
            ['Aws\Ec2\Ec2Exception', 'Aws\Ec2\Ec2Exception']
        ];
    }

    /**
     * @dataProvider errorProvider
     */
    public function testThrowsSpecificErrors($value, $type)
    {
        $service = new Service(['operations' => ['foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $client = new AwsClient([
            'client'          => new Client(),
            'credentials'     => new Credentials('foo', 'bar'),
            'signature'       => new SignatureV4('foo', 'bar'),
            'region'          => 'foo',
            'exception_class' => $value,
            'api'             => $service
        ]);

        $client->getHttpClient()->getEmitter()->attach(new Mock([
            new Response(404)
        ]));

        $client->getEmitter()->attach(new Error(
            function () {
                return [
                    'code' => 'foo',
                    'type' => 'bar',
                    'request_id' => '123'
                ];
            }
        ));

        $client->getEmitter()->on('prepare', function (PrepareEvent $e) {
            $e->setRequest($e->getClient()
                ->getHttpClient()
                ->createRequest('GET', 'http://httpbin.org'));
        });

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
            ], $e->getContext()->toArray());
            $this->assertEquals('foo', $e->getAwsErrorCode());
            $this->assertEquals('bar', $e->getAwsErrorType());
            $this->assertEquals('123', $e->getAwsRequestId());
        }
    }

    public function testChecksBothLowercaseAndUppercaseOperationNames()
    {
        $client = $this->createClient(['operations' => ['Foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $this->assertInstanceOf(
            'Aws\AwsCommandInterface',
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
        $iterator = $this->getMockBuilder('Aws\Common\Paginator\ResourceIterator')
            ->disableOriginalConstructor()
            ->getMock();
        $factory = $this->getMockBuilder('Aws\Common\Paginator\PaginatorFactory')
            ->disableOriginalConstructor()
            ->setMethods(['createIterator'])
            ->getMock();
        $factory->expects($this->once())
            ->method('createIterator')
            ->with(
                $this->isInstanceOf('Aws\AwsClientInterface'),
                $this->equalTo('ListObjects'),
                $this->equalTo(['Bucket' => 'foobar'])
            )
            ->will($this->returnValue($iterator));

        $client = $this->createClient([], ['paginator_factory' => $factory]);

        $this->assertInstanceOf(
            'Aws\Common\Paginator\ResourceIterator',
            $client->getIterator('ListObjects', ['Bucket' => 'foobar'])
        );
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetIteratorRequiresPaginatorFactory()
    {
        $client = $this->createClient([]);
        $client->getIterator('ListObjects');
    }

    public function testCanGetPaginator()
    {
        $paginator = $this->getMockBuilder('Aws\Common\Paginator\ResultPaginator')
            ->disableOriginalConstructor()
            ->getMock();
        $factory = $this->getMockBuilder('Aws\Common\Paginator\PaginatorFactory')
            ->disableOriginalConstructor()
            ->setMethods(['createPaginator'])
            ->getMock();
        $factory->expects($this->once())
            ->method('createPaginator')
            ->with(
                $this->isInstanceOf('Aws\AwsClientInterface'),
                $this->equalTo('ListObjects'),
                $this->equalTo(['Bucket' => 'foobar'])
            )
            ->will($this->returnValue($paginator));

        $client = $this->createClient([], ['paginator_factory' => $factory]);

        $this->assertInstanceOf(
            'Aws\Common\Paginator\ResultPaginator',
            $client->getPaginator('ListObjects', ['Bucket' => 'foobar'])
        );
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetPaginatorRequiresPaginatorFactory()
    {
        $client = $this->createClient([]);
        $client->getPaginator('ListObjects');
    }

    public function testCansUseServiceWaiter()
    {
        $flag = false;
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\Waiter')
            ->disableOriginalConstructor()
            ->setMethods(['wait'])
            ->getMock();
        $waiter->expects($this->once())
            ->method('wait')
            ->willReturnCallback(function() use(&$flag) {$flag = true;});
        $factory = $this->getMockBuilder('Aws\Common\Waiter\ResourceWaiterFactory')
            ->disableOriginalConstructor()
            ->setMethods(['createWaiter'])
            ->getMock();
        $factory->expects($this->once())
            ->method('createWaiter')
            ->with(
                $this->isInstanceOf('Aws\AwsClientInterface'),
                $this->equalTo('BucketExists'),
                $this->equalTo(['Bucket' => 'foobar'])
            )
            ->will($this->returnValue($waiter));

        $client = $this->createClient([], ['waiter_factory' => $factory]);

        $client->waitUntil('BucketExists', ['Bucket' => 'foobar']);
        $this->assertTrue($flag);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetWaiterRequiresWaiterFactory()
    {
        $client = $this->createClient([]);
        $client->waitUntil('ListObjects');
    }

    private function createClient(array $service, array $conf = [])
    {
        return new AwsClient($conf + [
            'client'      => new Client(),
            'credentials' => new Credentials('foo', 'bar'),
            'signature'   => new SignatureV4('foo', 'bar'),
            'region'      => 'foo',
            'api'         => new Service($service)
        ]);
    }

    public function testCreatesClientsFromFactoryMethod()
    {
        $client = SqsClient::factory(['region' => 'us-west-2']);
        $this->assertInstanceOf('Aws\Sqs\SqsClient', $client);
        $this->assertEquals('us-west-2', $client->getRegion());

        $client = StsClient::factory(['region' => 'us-west-2']);
        $this->assertInstanceOf('Aws\Sts\StsClient', $client);
        $this->assertEquals('us-west-2', $client->getRegion());
    }
}
