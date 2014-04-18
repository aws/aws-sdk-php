<?php
namespace Aws\Test\Waiter;

use Aws\Waiter\WaitEvent;

/**
 * @covers Aws\Waiter\WaitEvent
 */
class WaitEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCanUpdateConfig()
    {
        $event = new WaitEvent(['foo' => 'bar'], 5);

        $this->assertEquals(5, $event->getAttempts());
        $this->assertEquals(['foo' => 'bar'], $event->getConfig());
        $this->assertFalse($event->isConfigUpdated());

        $event->setConfig(['foo' => 'baz']);
        $this->assertEquals(['foo' => 'baz'], $event->getConfig());
        $this->assertTrue($event->isConfigUpdated());

        $event->setConfig('foo', 'BAZ');
        $this->assertEquals(['foo' => 'BAZ'], $event->getConfig());
    }
}
