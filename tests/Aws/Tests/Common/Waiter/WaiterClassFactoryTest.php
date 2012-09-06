<?php

namespace Aws\Tests\Common\Waiter;

use Aws\Common\Waiter\WaiterClassFactory;

/**
 * @covers Aws\Common\Waiter\WaiterClassFactory
 */
class WaiterClassFactoryTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testEnsuresClassExists()
    {
        $factory = new WaiterClassFactory();
        $factory->registerNamespace('Foo');
        $factory->factory('bar');
    }

    public function testCreatesWaiter()
    {
        $factory = new WaiterClassFactory();
        $factory->registerNamespace('Aws\Common\InstanceMetadata\Waiter');
        $factory->registerNamespace('Foo\Bar');

        $expectedClass = 'Aws\Common\InstanceMetadata\Waiter\ServiceAvailable';
        $this->assertInstanceOf($expectedClass, $factory->factory('service_available'));
        $this->assertInstanceOf($expectedClass, $factory->factory('ServiceAvailable'));
    }
}
