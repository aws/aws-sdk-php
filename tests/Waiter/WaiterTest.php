<?php
namespace Aws\Test\Waiter;

require_once 'wait_hack.php';

use Aws\Waiter\Waiter;
use Aws\Waiter\WaitEvent;

/**
 * @covers Aws\Waiter\Waiter
 */
class WaiterTest extends \PHPUnit_Framework_TestCase
{
    public function testWaitsForCallbackToBeTrue()
    {
        \Aws\Waiter\usleep(0);
        $returns = [false, false, true];
        $attempts = 0;
        $waiter = new Waiter(
            function() use(&$returns, &$attempts) {
                $attempts++;
                return array_shift($returns);
            },
            [
                'delay'        => 5,
                'interval'     => 2,
                'max_attempts' => 3,
            ]
        );

        $waiter->wait();
        $this->assertEquals(3, $attempts);
        $this->assertEquals(9000000, \Aws\Waiter\usleep(0));
    }

    public function testErrorWhenWaiterExceedsMaxAttempts()
    {
        $returns = [false, false, false];
        $attempts = 0;
        $waiter = new Waiter(
            function() use(&$returns, &$attempts) {
                $attempts++;
                return array_shift($returns);
            },
            [
                'max_attempts' => 3,
            ]
        );

        $this->setExpectedException('RuntimeException');
        $waiter->wait();
    }
}
