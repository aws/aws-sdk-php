<?php

namespace Aws\Tests\DynamoDb\Session\LockingStrategy;

use Aws\Tests\DynamoDb\Session\AbstractSessionTestCase;
use Aws\DynamoDb\Session\LockingStrategy\NullLockingStrategy;

class NullLockingStrategyTest extends AbstractSessionTestCase
{
    public function getDoReadTestCases()
    {
        return array(
            // Test case 1
            array(
                array(
                    'Item' => array(
                        'foo' => array(
                            'S' => 'bar'
                        )
                    ),
                ),
                array(
                    'foo' => 'bar'
                )
            ),
            // Test case 2
            array(
                new \Aws\DynamoDb\Exception\DynamoDbException,
                array()
            )
        );
    }

    /**
     * @covers Aws\DynamoDb\Session\LockingStrategy\NullLockingStrategy::doRead
     * @dataProvider getDoReadTestCases
     */
    public function testDoReadWorksCorrectly($commandResult, $expectedItem)
    {
        // Prepare mocks
        $client  = $this->getMockedClient();
        $config  = $this->getMockedConfig();
        $command = $this->getMockedCommand($client);

        if ($commandResult instanceof \Exception) {
            $will = $this->throwException($commandResult);
        } else {
            $will = $this->returnValue($commandResult);
        }
        $command->expects($this->any())
            ->method('execute')
            ->will($will);

        // Test the doRead method
        $strategy = new NullLockingStrategy($client, $config);
        $item = $strategy->doRead('test');
        $this->assertSame($expectedItem, $item);
    }
}
