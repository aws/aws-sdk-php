<?php

namespace Aws\Tests\Common\Waiter;

use Aws\Common\Waiter\CompositeWaiterFactory;
use Aws\Common\Waiter\WaiterConfigFactory;

/**
 * @covers Aws\Common\Waiter\CompositeWaiterFactory
 */
class CompositeWaiterFactoryTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Waiter was not found matching foo
     */
    public function testEnsuresWaiterExists()
    {
        $factory = new CompositeWaiterFactory(array(
            new WaiterConfigFactory(array())
        ));
        $this->assertFalse($factory->canBuild('foo'));
        $factory->build('foo');
    }

    public function testBuildsWaiters()
    {
        $f1 = new WaiterConfigFactory(array('Boo' => array('test')));
        $f2 = new WaiterConfigFactory(array('foo' => array('max_attempts' => 10)));
        $factory = new CompositeWaiterFactory(array($f1));
        $factory->addFactory($f2);
        $this->assertInstanceOf('Aws\Common\Waiter\ConfigResourceWaiter', $factory->build('foo'));
        $this->assertInstanceOf('Aws\Common\Waiter\ConfigResourceWaiter', $factory->build('Boo'));
    }
}
