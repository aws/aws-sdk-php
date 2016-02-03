<?php
namespace Aws\Test;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Command;
use Aws\CommandInterface;
use Aws\HandlerList;
use Aws\MultiRegionClient;
use Aws\Result;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

class MultiRegionClientTest extends \PHPUnit_Framework_TestCase
{
    /** @var MultiRegionClient */
    private $instance;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $mockRegionalClient;

    public function setUp()
    {
        $this->mockRegionalClient = $this->getMockBuilder(AwsClient::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockRegionalClient->expects($this->any())
            ->method('getApi')
            ->with()
            ->willReturn($this->getMockApi());
        $this->instance = new MultiRegionClient('sns', [
            'region' => 'us-east-1',
            'version' => 'latest',
        ]);
        $property = (new \ReflectionClass(MultiRegionClient::class))
            ->getProperty('clientPool');
        $property->setAccessible(true);
        $property->setValue($this->instance, [
            'us-east-1' => $this->mockRegionalClient,
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

    public function testGetRegionReturnsRegionFromSession()
    {
        $instance = new MultiRegionClient('route53', [
            'region' => 'us-west-2',
            'version' => 'latest',
            'Route53' => [
                'region' => 'us-east-1',
            ],
        ]);

        $this->assertSame('us-east-1', $instance->getRegion());
    }

    public function testRegionCanBeOverriddenPerOperation()
    {
        $instance = new MultiRegionClient('sns', [
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
            ->with('baz', ['foo' => 'bar'])
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
            ['getHandlerList', []],
            ['getApi', []],
            ['getEndpoint', []],
        ];
    }
}
