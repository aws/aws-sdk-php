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

namespace Aws\Tests\Ec2\Waiter;

use Aws\Ec2\Enum\InstanceStateName;

/**
 * @covers Aws\Ec2\Waiter\InstanceInState
 */
class InstanceInStateTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesUntilInSpecifiedState()
    {
        $client = $this->getServiceBuilder()->get('ec2', true);
        $this->setMockResponse($client, array(
            'ec2/describe_instances_no_reservations',
            'ec2/describe_instances_two_instances_different_state',
            'ec2/describe_instances_two_instances_same_state'
        ));
        $client->waitUntil('__InstanceState', array(
            'InstanceIds'          => array('i-xxxxxxx1', 'i-xxxxxxx2'),
            'waiter.success.value' => InstanceStateName::RUNNING,
            'waiter.interval'      => 0
        ));
        $this->assertEquals(3, count($this->getMockedRequests()));
    }
}
