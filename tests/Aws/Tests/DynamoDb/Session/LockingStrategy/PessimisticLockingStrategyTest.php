<?php

namespace Aws\Tests\DynamoDb\Session\LockingStrategy;

use Aws\Tests\DynamoDb\Session\AbstractSessionTestCase;
use Aws\DynamoDb\Session\LockingStrategy\PessimisticLockingStrategy;

class PessimisticLockingStrategyTest extends AbstractSessionTestCase
{
    /**
     * @covers Aws\DynamoDb\Session\LockingStrategy\PessimisticLockingStrategy::doRead
     * @covers Aws\DynamoDb\Session\LockingStrategy\PessimisticLockingStrategy::__construct
     */
    public function testDoReadWorksCorrectly()
    {
        // Prepare mocks
        $client  = $this->getMockedClient();
        $config  = $this->getMockedConfig();
        $command = $this->getMockedCommand($client);

        $config->expects($this->any())
            ->method('get')
            ->will($this->returnCallback(function ($key) {
                return ($key === 'max_lock_wait_time') ? 10 : null;
            }));

        $command->expects($this->any())
            ->method('execute')
            ->will($this->returnCallback(function () {
                static $calls = 0;

                // Simulate lock acquisition failures
                if ($calls++ < 5) {
                    throw new \Aws\DynamoDb\Exception\DynamoDbException;
                } else {
                    return array(
                        'Attributes' => array(
                            'foo' => array(
                                'S' => 'bar'
                            )
                        ),
                    );
                }
            }));

        // Test the doRead method
        $strategy = new PessimisticLockingStrategy($client, $config);
        $item = $strategy->doRead('test');
        $this->assertSame(array('foo' => 'bar'), $item);
    }
}
