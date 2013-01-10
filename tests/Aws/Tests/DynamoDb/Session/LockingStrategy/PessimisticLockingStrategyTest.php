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
                    throw new \Aws\DynamoDb\Exception\ConditionalCheckFailedException;
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

    /**
     * @covers Aws\DynamoDb\Session\LockingStrategy\PessimisticLockingStrategy::doRead
     * @expectedException Aws\DynamoDb\Exception/AccessDeniedException
     */
    public function testReadFailsForOther400Errors()
    {
        // Prepare mocks
        $client  = $this->getMockedClient();
        $config  = $this->getMockedConfig();
        $command = $this->getMockedCommand($client);
        $command->expects($this->any())
            ->method('execute')
            ->will($this->throwException(new \Aws\DynamoDb\Exception\AccessDeniedException()));

        // Test the doRead method
        $strategy = new PessimisticLockingStrategy($client, $config);
        $strategy->doRead('test');
    }
}
