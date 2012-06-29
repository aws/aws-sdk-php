<?php

namespace Aws\Tests\Common\Waiter;

use Aws\Common\Waiter\CallableWaiter;

/**
 * @covers Aws\Common\Waiter\CallableWaiter
 */
class CallableWaiterTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testEnsuresMethodIsCallable()
    {
        $w = new CallableWaiter();
        $w->setCallable('foo');
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     */
    public function testEnsureCallableIsSetBeforeWaiting()
    {
        $w = new CallableWaiter();
        $w->wait();
    }

    public function testUsesCallbackForWaiter()
    {
        $total = 0;
        $f = function () use (&$total) {
            return ++$total == 3;
        };

        $w = new CallableWaiter();
        $w->setCallable($f);
        $w->wait();
        $this->assertEquals(3, $total);
    }
}
