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

namespace Aws\Tests\Ec2;

use Aws\Ec2\Ec2Client;
use Aws\Ec2\Enum\InstanceStateName;

class WaiterTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @var Ec2Client
     */
    public $client;

    public function setUp()
    {
        $this->client = self::getServiceBuilder()->get('ec2', true);
    }

    public function testIteratesUntilInSpecifiedState()
    {
        $this->client = $this->getServiceBuilder()->get('ec2', true);
        $this->setMockResponse($this->client, array(
            'ec2/describe_instances_no_reservations',
            'ec2/describe_instances_two_instances_different_state',
            'ec2/describe_instances_two_instances_same_state'
        ));
        $this->client->waitUntil('__InstanceState', array(
            'InstanceIds'          => array('i-xxxxxxx1', 'i-xxxxxxx2'),
            'waiter.success.value' => InstanceStateName::RUNNING,
            'waiter.interval'      => 0
        ));
        $this->assertEquals(3, count($this->getMockedRequests()));
    }

    public function testWaitsForSnapshots()
    {
        $this->setMockResponse($this->client, array(
            'ec2/describe_snapshots_pending',
            'ec2/describe_snapshots_completed',
            'ec2/describe_instances_two_instances_same_state'
        ));
        $this->client->waitUntil('SnapshotCompleted', array(
            'SnapshotIds'     => array('snap-1a2b3c4d'),
            'waiter.interval' => 0
        ));
        $this->assertEquals(2, count($this->getMockedRequests()));
    }
}
