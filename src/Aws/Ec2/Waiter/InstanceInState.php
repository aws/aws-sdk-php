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

namespace Aws\Ec2\Waiter;

use Aws\Ec2\Enum\InstanceState;
use Aws\Common\Enum\UaString as Ua;
use Aws\Common\Waiter\AbstractResourceWaiter;

/**
 * Returns true when the instance is in a particular state(s)
 */
class InstanceInState extends AbstractResourceWaiter
{
    protected $interval = 20;
    protected $maxAttempts = 15;
    protected $maxFailures = 0;

    /**
     * Wait until an instance is in a particular state(s)
     */
    protected function doWait()
    {
        // Prepare the arguments. Allow multiple instance IDs (AND'D) and multiple states (OR'D)
        $this->resourceId = is_array($this->resourceId) ? $this->resourceId : array($this->resourceId);
        $states = isset($this->config['state']) ? $this->config['state'] : InstanceState::RUNNING;
        $states = is_array($states) ? $states : array($states);

        // Do a DescribeInstances call in order to get the instance state
        $result = $this->client->getCommand('DescribeInstances', array(
            'InstanceIds' => $this->resourceId,
            Ua::OPTION => Ua::WAITER,
        ))->getResult();

        // If the instance IDs were found check their states
        if ($ok = $result->get('Reservations')) {
            foreach ($result->get('Reservations') as $reservation) {
                foreach ($reservation['Instances'] as $instance) {
                    $ok = $ok && in_array($instance['State']['Name'], $states);
                }
            }
        }

        return $ok;
    }
}
