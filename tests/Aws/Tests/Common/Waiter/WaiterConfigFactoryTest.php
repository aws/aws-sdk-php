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

use Aws\Common\Waiter\WaiterConfigFactory;

/**
 * @covers Aws\Common\Waiter\WaiterConfigFactory
 */
class WaiterConfigFactoryTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected $data = array(
        '__default__' => array(
            'acceptor.path' => 'Foo/Baz',
            'acceptor.type' => 'output',
            'max_attempts' => 10
        ),
        'Test' => array(
            'success.value' => 'foo',
            'ignore_errors' => array('1', '2')
        ),
        'Extending' => array(
            'extends' => 'Test',
            'failure.value' => 'fail'
        ),
        'Overwrite' => array(
            'extends' => 'Extending',
            'max_attempts' => 20,
            'success.value' => 'abc',
            'failure.type' => 'baz'
        )
    );

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testEnsuresConfigExists()
    {
        $factory = new WaiterConfigFactory(array());
        $factory->build('bar');
    }

    public function testUsesDefaultValuesToo()
    {
        $factory = new WaiterConfigFactory($this->data);
        $config = $factory->build('Test')->getWaiterConfig();
        $this->assertEquals('Foo/Baz', $config['success.path']);
        $this->assertEquals('Foo/Baz', $config['failure.path']);
        $this->assertEquals('output', $config['success.type']);
        $this->assertEquals('output', $config['failure.type']);
        $this->assertEquals(10, $config['max_attempts']);
        $this->assertEquals('foo', $config['success.value']);
        $this->assertEquals(array('1', '2'), $config['ignore_errors']);
    }

    public function testAllowsExtending()
    {
        $factory = new WaiterConfigFactory($this->data);
        $config = $factory->build('Extending')->getWaiterConfig();
        $this->assertEquals('Foo/Baz', $config['success.path']);
        $this->assertEquals('Foo/Baz', $config['failure.path']);
        $this->assertEquals('output', $config['success.type']);
        $this->assertEquals('output', $config['failure.type']);
        $this->assertEquals(10, $config['max_attempts']);
        $this->assertEquals('foo', $config['success.value']);
        $this->assertEquals('fail', $config['failure.value']);
        $this->assertEquals(array('1', '2'), $config['ignore_errors']);
    }

    public function testAllowsExtendingToOverwrite()
    {
        $factory = new WaiterConfigFactory($this->data);
        $config = $factory->build('Overwrite')->getWaiterConfig();
        $this->assertEquals('Foo/Baz', $config['success.path']);
        $this->assertEquals('Foo/Baz', $config['failure.path']);
        $this->assertEquals('output', $config['success.type']);
        $this->assertEquals('baz', $config['failure.type']);
        $this->assertEquals(20, $config['max_attempts']);
        $this->assertEquals('abc', $config['success.value']);
        $this->assertEquals('fail', $config['failure.value']);
        $this->assertEquals(array('1', '2'), $config['ignore_errors']);
    }
}
