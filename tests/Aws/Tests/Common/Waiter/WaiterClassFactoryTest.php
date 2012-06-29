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
        $f = new WaiterClassFactory('Foo');
        $f->factory('bar');
    }

    public function testCreatesWaiter()
    {
        $f = new WaiterClassFactory('Aws\\Common\\InstanceMetadata\\Waiter');
        $this->assertInstanceOf('Aws\\Common\InstanceMetadata\\Waiter\\ServiceAvailable', $f->factory('service_available'));
        $this->assertInstanceOf('Aws\\Common\InstanceMetadata\\Waiter\\ServiceAvailable', $f->factory('ServiceAvailable'));
    }
}
