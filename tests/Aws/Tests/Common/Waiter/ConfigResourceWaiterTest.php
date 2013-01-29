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

use Aws\Common\Waiter\WaiterConfig;
use Aws\Common\Waiter\ConfigResourceWaiter;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Waiter\ConfigResourceWaiter
 */
class ConfigResourceWaiterTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorAddsWaiterSettings()
    {
        $c = new WaiterConfig(array(
            'max_attempts' => 3,
            'interval'     => 5
        ));
        $w = new ConfigResourceWaiter($c);
        $this->assertSame($c, $w->getWaiterConfig());
        $this->assertEquals(3, $w->getMaxAttempts());
        $this->assertEquals(5, $w->getInterval());
    }

    public function testWaiterConfigsCanBeSetInSetConfig()
    {
        $c = new WaiterConfig();
        $w = new ConfigResourceWaiter($c);
        $w->setConfig(array(
            'waiter.foo' => 'baz',
            'waiter.success.path' => 'test/*'
        ));
        $this->assertEquals('baz', $c->get('foo'));
        $this->assertEquals('test/*', $c->get('success.path'));
    }

    public function testWaiterCanIgnoreExceptions()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array('s3/head_failure', 's3/head_success'));
        $client->waitUntil('bucket_exists', array('Bucket' => 'foo', 'waiter.interval' => 0));
        $this->assertEquals(2, count($this->getMockedRequests()));
    }

    /**
     * @expectedException \Aws\S3\Exception\S3Exception
     */
    public function testWaiterDoesNotIgnoreAllExceptions()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array(new Response(409)));
        $client->waitUntil('bucket_not_exists', array('Bucket' => 'foo', 'waiter.interval' => 0));
    }

    public function testWaiterCanSucceedOnException()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array('s3/head_failure'));
        $client->waitUntil('bucket_not_exists', array('Bucket' => 'foo'));
    }

    public function testWaiterCanSucceedOnOutput()
    {
        $client = $this->getServiceBuilder()->get('ec2', true);
        $this->setMockResponse($client, array(
            'ec2/describe_instances_no_reservations',
            'ec2/describe_instances_two_instances_different_state',
            'ec2/describe_instances_two_instances_same_state'
        ));
        $client->waitUntil('instance_running', array('InstanceIds' => array('i-xxxxxxx1'), 'waiter.interval' => 0));
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage A resource entered into an invalid state of "pending" while waiting with the "InstanceStopped" waiter.
     */
    public function testWaiterCanFastFailOnOutputResult()
    {
        $client = $this->getServiceBuilder()->get('ec2', true);
        $this->setMockResponse($client, array('ec2/describe_instances_two_instances_different_state'));
        $client->waitUntil('instance_stopped', array('InstanceIds' => array('i-xxxxxxx1'), 'waiter.interval' => 0));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage InstanceStopped waiter validation failed:  Validation errors: [InstanceIds] must be of type array
     */
    public function testWaiterProvidesHelpfulMessageWhenValidationFails()
    {
        $client = $this->getServiceBuilder()->get('ec2', true);
        $client->waitUntil('instance_stopped', array('InstanceIds' => 'i-xxxxxxx1'));
    }
}
