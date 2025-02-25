<?php
namespace Aws\Test;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\MockHandler;
use Aws\MultiRegionClient;
use Aws\Result;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class MultiRegionClientTest extends TestCase
{
    /** @var MultiRegionClient */
    private $instance;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $mockRegionalClient;

    public function set_up()
    {
        $this->mockRegionalClient = $this->getMockBuilder(AwsClient::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockRegionalClient->expects($this->any())
            ->method('getApi')
            ->with()
            ->willReturn($this->getMockApi());
        $this->instance = new MultiRegionClient([
            'service' => 'sns',
            'region' => 'us-east-1',
            'version' => 'latest',
        ]);
        $property = (new \ReflectionClass(MultiRegionClient::class))
            ->getProperty('clientPool');
        $property->setAccessible(true);
        $property->setValue($this->instance, [
            '' => $this->mockRegionalClient,
        ]);
    }

    private function getMockApi()
    {
        $api = $this->getMockBuilder(Service::class)
            ->disableOriginalConstructor()
            ->getMock();
        $api->expects($this->any())
            ->method('getWaiterConfig')
            ->withAnyParameters()
            ->willReturn([]);

        return $api;
    }

    public function testGetRegionReturnsDefaultRegion()
    {
        $instance = new MultiRegionClient([
            'service' => 'route53',
            'region' => 'us-east-1',
            'version' => 'latest',
        ]);

        $this->assertSame('us-east-1', $instance->getRegion());
    }

    public function testRegionCanBeOverriddenPerOperation()
    {
        $instance = new MultiRegionClient([
            'service' => 'sns',
            'version' => 'latest',
            'region' => 'us-east-1',
            'http_handler' => function (RequestInterface $request) {
                $this->assertSame('sns.us-west-2.amazonaws.com', $request->getUri()->getHost());
                return new FulfilledPromise(new Response(200, [], '<node></node>'));
            },
        ]);

        $instance->publish([
            'Message' => 'Message for you, sir!',
            '@region' => 'us-west-2',
        ]);
    }

    public function testProxiesArbitraryCallsToRegionalizedClient()
    {
        $mockHandler = $this->getMockBuilder(HandlerList::class)
            ->disableOriginalConstructor()
            ->getMock();
        $mockHandler->expects($this->atLeastOnce())
            ->method('resolve')
            ->willReturn(function (CommandInterface $c) {
                return new FulfilledPromise(new Result);
            });
        $this->mockRegionalClient->expects($this->once())
            ->method('getCommand')
            ->with(
                'baz',
                [
                    'foo' => 'bar',
                    '@http' => [],
                    '@context' => []
                ])
            ->willReturn(new Command('Baz', [], $mockHandler));

        $this->instance->baz(['foo' => 'bar']);
    }

    /**
     * @dataProvider clientInterfaceMethodProvider
     *
     * @param string $method
     * @param array $args
     */
    public function testProxiesCallsToRegionalizedClient($method, array $args)
    {
        $expectation = $this->mockRegionalClient->expects($this->once())
            ->method($method);
        call_user_func_array([$expectation, 'with'], $args);

        call_user_func_array([$this->instance, $method], $args);
    }

    public function clientInterfaceMethodProvider()
    {
        return [
            ['getConfig', ['someOption']],
            ['getCredentials', []],
            ['getApi', []],
            ['getEndpoint', []],
        ];
    }

    public function testDefaultsToAwsPartition()
    {
        $mrc = new MultiRegionClient([
            'service' => 'ec2',
        ]);

        $this->assertSame('aws', $mrc->getConfig('partition')->getName());
    }

    public function testRejectsUnrecognizedPartitions()
    {
        $this->expectException(\InvalidArgumentException::class);
        new MultiRegionClient([
            'service' => 'ec2',
            'partition' => 'foo',
        ]);
    }

    public function testUseCustomHandler()
    {
        $mockHandler = new MockHandler();
        $mockHandler->append(new Result(["foo" => "bar"]));
        $mockHandler->append(function (CommandInterface $cmd, RequestInterface $req) {
            return new AwsException('Mock exception', $cmd);
        });
        $s3 = new MultiRegionClient([
            'service' => 's3',
            'version' => 'latest',
            'region' => 'us-east-1'
        ]);
        $s3->useCustomHandler($mockHandler);

        $response = $s3->listBuckets();
        $this->assertEquals('bar', $response['foo']);

        if (method_exists($this, 'expectException')) {
            $this->expectException(AwsException::class);
            $this->expectExceptionMessage('Mock exception');
        } else {
            $this->setExpectedException(AwsException::class);
        }
        $s3->listBuckets();
    }
}
