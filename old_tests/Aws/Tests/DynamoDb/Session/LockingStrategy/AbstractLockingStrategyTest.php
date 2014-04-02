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
use Aws\DynamoDb\Session\LockingStrategy\AbstractLockingStrategy;

class AbstractLockingStrategyTest extends AbstractSessionTestCase
{
    public function getTestCases()
    {
        return array(
            array('ANYTHING', true),
            array(new \Aws\DynamoDb\Exception\DynamoDbException, false)
        );
    }

    /**
     * @covers Aws\DynamoDb\Session\LockingStrategy\AbstractLockingStrategy::doDestroy
     * @covers Aws\DynamoDb\Session\LockingStrategy\AbstractLockingStrategy::__construct
     * @dataProvider getTestCases
     */
    public function testDoDestroyWorksCorrectly($commandResult, $expectedItem)
    {
        // Prepare mocks
        $client   = $this->getMockedClient();
        $config   = $this->getMockedConfig();
        $command  = $this->getMockedCommand($client);

        if ($commandResult instanceof \Exception) {
            $will = $this->throwException($commandResult);
        } else {
            $will = $this->returnValue($commandResult);
        }
        $command->expects($this->any())
            ->method('execute')
            ->will($will);

        // Test the doRead method
        $strategy = $this->getMockForAbstractClass(
            'Aws\DynamoDb\Session\LockingStrategy\AbstractLockingStrategy',
            array($client, $config)
        );
        $item = $strategy->doDestroy('test');
        $this->assertSame($expectedItem, $item);
    }

    /**
     * @covers Aws\DynamoDb\Session\LockingStrategy\AbstractLockingStrategy::doWrite
     * @dataProvider getTestCases
     */
    public function testDoWriteWorksCorrectly($commandResult, $expectedItem)
    {
        // Prepare mocks
        $client   = $this->getMockedClient();
        $config   = $this->getMockedConfig();
        $command  = $this->getMockedCommand($client);

        if ($commandResult instanceof \Exception) {
            $will = $this->throwException($commandResult);
        } else {
            $will = $this->returnValue($commandResult);
        }
        $command->expects($this->any())
            ->method('execute')
            ->will($will);

        // Test the doRead method
        $strategy = $this->getMockForAbstractClass(
            'Aws\DynamoDb\Session\LockingStrategy\AbstractLockingStrategy',
            array($client, $config)
        );
        $strategy->expects($this->any())
            ->method('getExtraAttributes')
            ->will($this->returnValue(array()));

        $item = $strategy->doWrite('test', 'ANYTHING', true);
        $this->assertSame($expectedItem, $item);
    }
}
