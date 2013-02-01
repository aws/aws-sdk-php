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

use Aws\Common\Waiter\WaiterClassFactory;

/**
 * @covers Aws\Common\Waiter\WaiterClassFactory
 */
class WaiterClassFactoryTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testEnsuresClassExists()
    {
        $factory = new WaiterClassFactory();
        $factory->registerNamespace('Foo');
        $factory->build('bar');
    }

    public function testCreatesWaiter()
    {
        $factory = new WaiterClassFactory();
        $factory->registerNamespace('Aws\Common\InstanceMetadata\Waiter');
        $factory->registerNamespace('Foo\Bar');

        $expectedClass = 'Aws\Common\InstanceMetadata\Waiter\ServiceAvailable';
        $this->assertTrue($factory->canBuild('service_available'));
        $this->assertInstanceOf($expectedClass, $factory->build('service_available'));
        $this->assertInstanceOf($expectedClass, $factory->build('ServiceAvailable'));
    }
}
