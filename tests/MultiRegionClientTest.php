<?php
namespace Aws\Test;

use Aws\AwsClient;
use Aws\AwsClientInterface;
use Aws\CommandInterface;
use Aws\MultiRegionClient;
use Aws\Waiter;
use GuzzleHttp\Promise\FulfilledPromise;

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
        $usWestClient = $this->getMockBuilder(AwsClient::class)
            ->disableOriginalConstructor()
            ->getMock();
        $property = (new \ReflectionClass(MultiRegionClient::class))
            ->getProperty('clientPool');
        $property->setAccessible(true);
        $property->setValue($this->instance, [
            'us-east-1' => $this->mockRegionalClient,
            'us-west-2' => $usWestClient,
        ]);

        $usWestClient->expects($this->once())
            ->method('__call')
            ->with('publish', [['Message' => 'Message for you, sir!']]);
        $this->mockRegionalClient->expects($this->never())
            ->method('__call');

        $this->instance->publish([
            'Message' => 'Message for you, sir!',
            '@region' => 'us-west-2',
        ]);
    }

    public function testProxiesArbitraryCallsToRegionalizedClient()
    {
        $this->mockRegionalClient->expects($this->once())
            ->method('__call')
            ->with('baz', [['foo' => 'bar']]);

        $this->instance->baz(['foo' => 'bar']);
    }

    public function testProxiesWaitUntilToRegionalizedGetWaiter()
    {
        $mockWaiter = $this->getMockBuilder(Waiter::class)
            ->disableOriginalConstructor()
            ->getMock();
        $mockWaiter->expects($this->any())
            ->method('promise')
            ->willReturn(new FulfilledPromise('Fulfilled'));
        $this->mockRegionalClient->expects($this->once())
            ->method('getWaiter')
            ->with('waiter', ['foo' => 'bar'])
            ->willReturn($mockWaiter);

        $this->instance->waitUntil('waiter', ['foo' => 'bar']);
    }

    public function testProxiesExecuteToRegionalizedExecuteAsync()
    {
        /** @var CommandInterface $command */
        $command = $this->getMock(CommandInterface::class);
        $this->mockRegionalClient->expects($this->once())
            ->method('executeAsync')
            ->willReturn(new FulfilledPromise('Fulfilled!'));
        $this->mockRegionalClient->expects($this->once())
            ->method('executeAsync')
            ->with($command);

        $this->instance->execute($command);
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
        $excludedMethods = [
            '__call',
            'execute',
            'waitUntil',
            'getRegion',
        ];
        $methods = [];
        foreach ((new \ReflectionClass(AwsClientInterface::class))->getMethods() as $method) {
            if (in_array($method->getName(), $excludedMethods)) {
                continue;
            }

            $methods []= [
                $method->getName(),
                array_map(function (\ReflectionParameter $param) {
                    if ($param->isDefaultValueAvailable()) {
                        return $param->getDefaultValue();
                    }
                    if (!$param->allowsNull()) {
                        if ($param->isArray()) {
                            return [];
                        }
                        if ($param->isCallable()) {
                            return 'strval';
                        }
                        if ($param->getClass()) {
                            return $this
                                ->getMockBuilder($param->getClass()->getName())
                                ->disableOriginalConstructor()
                                ->getMock();
                        }
                    }
                    return null;
                }, $method->getParameters()),
            ];
        }

        return $methods;
    }
}
