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

namespace Aws\Tests\Common\Waiter;

/**
 * @covers Aws\Common\Waiter\AbstractWaiter
 */
class AbstractWaiterTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIsConfigurable()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractWaiter')
            ->getMockForAbstractClass();

        $waiter->setInterval(10);
        $this->assertEquals(10, $waiter->getInterval());

        $waiter->setMaxAttempts(5);
        $this->assertEquals(5, $waiter->getMaxAttempts());
    }

    public function testPerformsWait()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractWaiter')
            ->setMethods(array('doWait'))
            ->getMockForAbstractClass();

        $count = 0;
        $waiter->expects($this->exactly(2))
            ->method('doWait')
            ->will($this->returnCallback(function () use (&$count) {
                return ++$count == 2;
            }));

        $waiter->wait();
    }

    public function testPerformsWaitWithInterval()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractWaiter')
            ->setMethods(array('doWait'))
            ->getMockForAbstractClass();

        $waiter->setInterval(0.001);

        $count = 0;
        $waiter->expects($this->exactly(2))
            ->method('doWait')
            ->will($this->returnCallback(function () use (&$count) {
                return ++$count == 2;
            }));

        $waiter->wait();
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage Wait method never resolved to true after 1 attempts
     */
    public function testPerformsWaitUntilMaxAttempts()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractWaiter')
            ->setMethods(array('doWait'))
            ->getMockForAbstractClass();

        $waiter->setMaxAttempts(1);

        $waiter->expects($this->exactly(1))
            ->method('doWait')
            ->will($this->returnValue(false));

        $waiter->wait();
    }

    public function testAllowsConfigOverrides()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractWaiter')
            ->getMockForAbstractClass();
        $waiter->setConfig(array('waiter.interval' => 100, 'waiter.max_attempts' => 50));
        $this->assertEquals(100, $waiter->getInterval());
        $this->assertEquals(50, $waiter->getMaxAttempts());
    }

    public function testPerformsWaitWithEvents()
    {
        $result = '';

        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractWaiter')
            ->setMethods(array('doWait'))
            ->getMockForAbstractClass();
        $waiter->getEventDispatcher()->addListener('waiter.before_attempt', function () use (&$result) {
            $result .= 'a';
        });
        $waiter->getEventDispatcher()->addListener('waiter.before_wait', function () use (&$result) {
            $result .= 'c';
        });

        $count = 0;
        $waiter->expects($this->exactly(3))
            ->method('doWait')
            ->will($this->returnCallback(function () use (&$count, &$result) {
                $result .= 'b';
                return ++$count == 3;
            }));

        $waiter->wait();

        $this->assertEquals('abcabcab', $result);
    }

    public function testWaiterEventConfigSettings()
    {
        $beforeAttemptCalled = 0;
        $beforeWaitCalled = 0;
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractWaiter')
            ->setMethods(array('doWait'))
            ->getMockForAbstractClass();
        $waiter->setConfig(array(
            'waiter.before_attempt' => function () use (&$beforeAttemptCalled) { $beforeAttemptCalled++; },
            'waiter.before_wait' => function () use (&$beforeWaitCalled) { $beforeWaitCalled++; },
        ));

        $iterations = 0;
        $waiter->expects($this->any())
            ->method('doWait')
            ->will($this->returnCallback(function () use (&$iterations) {
                return ++$iterations == 3;
            }));

        $waiter->wait();

        $this->assertEquals(3, $beforeAttemptCalled);
        $this->assertEquals(2, $beforeWaitCalled);
    }
}
