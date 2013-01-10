<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

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
