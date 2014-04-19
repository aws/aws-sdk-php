<?php
namespace Aws\Test\Waiter;

use Aws\Waiter\WaitEvent;

/**
 * @covers Aws\Waiter\WaitEvent
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
