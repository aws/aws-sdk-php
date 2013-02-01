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

use Aws\Common\Waiter\CallableWaiter;

/**
 * @covers Aws\Common\Waiter\CallableWaiter
 */
class CallableWaiterTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testEnsuresMethodIsCallable()
    {
        $w = new CallableWaiter();
        $w->setCallable('foo');
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     */
    public function testEnsureCallableIsSetBeforeWaiting()
    {
        $w = new CallableWaiter();
        $w->wait();
    }

    public function testUsesCallbackForWaiter()
    {
        $total = 0;
        $f = function ($attempts, $data) use (&$total) {
            $data['object']->value = 2;
            return ++$total == 3;
        };

        $o = new \StdClass();
        $o->value = 1;
        $c = array('object' => $o);

        $w = new CallableWaiter();
        $w->setCallable($f);
        $w->setContext($c);
        $w->wait();
        $this->assertEquals(3, $total);
        $this->assertEquals(2, $o->value);
    }
}
