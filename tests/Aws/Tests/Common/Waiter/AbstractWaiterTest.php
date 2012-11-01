<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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
        $this->assertEquals(10, $this->readAttribute($waiter, 'interval'));

        $waiter->setMaxAttempts(5);
        $this->assertEquals(5, $this->readAttribute($waiter, 'maxAttempts'));

        $waiter->setMaxFailures(2);
        $this->assertEquals(2, $this->readAttribute($waiter, 'maxFailures'));
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
     * @expectedException Aws\Common\Exception\RuntimeException
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

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage Maximum number of failures while waiting: 2
     */
    public function testPerformsWaitUntilMaxFailures()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractWaiter')
            ->setMethods(array('doWait'))
            ->getMockForAbstractClass();

        $waiter->setMaxFailures(2);

        $waiter->expects($this->exactly(2))
            ->method('doWait')
            ->will($this->throwException(new \Exception('Foo')));

        $waiter->wait();
    }

    public function testAllowsConfigOverrides()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractWaiter')
            ->getMockForAbstractClass();
        $waiter->setConfig(array(
            'interval'     => 100,
            'max_attempts' => 50,
            'max_failures' => 25
        ));

        $this->assertEquals(100, $this->readAttribute($waiter, 'interval'));
        $this->assertEquals(50, $this->readAttribute($waiter, 'maxAttempts'));
        $this->assertEquals(25, $this->readAttribute($waiter, 'maxFailures'));
    }
}
