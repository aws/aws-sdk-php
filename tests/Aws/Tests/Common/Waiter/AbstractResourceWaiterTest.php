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

use Aws\Common\InstanceMetadata\InstanceMetadataClient;

/**
 * @covers Aws\Common\Waiter\AbstractResourceWaiter
 */
class AbstractResourceWaiterTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage No client has been specified on the waiter
     */
    public function testEnsuresClientIsSetBeforeWaiting()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractResourceWaiter')
            ->getMockForAbstractClass();
        $waiter->wait();
    }

    public function testCanWait()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractResourceWaiter')
            ->setMethods(array('wait'))
            ->getMockForAbstractClass();

        $client = InstanceMetadataClient::factory();
        $waiter->setClient($client);
        $this->assertSame($client, $this->readAttribute($waiter, 'client'));

        $config = array('baz' => 'bar');
        $waiter->setConfig($config);
        $this->assertSame($config, $this->readAttribute($waiter, 'config'));

        $resource = array('foo' => 'bar');
        $waiter->setConfig($resource);
        $this->assertSame($resource, $this->readAttribute($waiter, 'config'));

        try {
            $waiter->wait();
        } catch (\Exception $e) {}
    }
}
