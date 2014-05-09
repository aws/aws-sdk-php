<?php
namespace Aws\Test\Common\Waiter;

use Aws\Common\Waiter\WaitEvent;

/**
 * @covers Aws\Common\Waiter\WaitEvent
 */
class WaitEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCanConfigAndAttempts()
    {
        $event = new WaitEvent(['foo' => 'bar'], 5);

        $this->assertEquals(5, $event->getAttempts());
        $this->assertEquals(['foo' => 'bar'], $event->getConfig());
    }
}
