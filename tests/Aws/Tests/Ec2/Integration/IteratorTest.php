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

namespace Aws\Tests\Ec2\Integration;

use Aws\Ec2\Ec2Client;
use Aws\Common\Enum\Region;

/**
 * @group integration
 */
class IteratorTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var Ec2Client
     */
    public $client;

    public function setUp()
    {
        $this->client = self::getServiceBuilder()->get('ec2', true);
    }

    public function testBasicDescribeInstanceStatusWithFilters()
    {
        $statuses = $this->client->getIterator('DescribeInstanceStatus', array(
            'Owners'  => array('amazon'),
            'Filters' => array(
                array('Name' => 'system-status.reachability', 'Values' => array('passed')),
                array('Name' => 'instance-status.status', 'Values' => array('ok')),
            )
        ), array(
            'limit' => 5
        ));

        self::log('Verify that the iterator returns less than or equal to 5.');
        $this->assertLessThanOrEqual(5, iterator_count($statuses));

        self::log('Verify that the status is in the right place and filters applied.');
        foreach ($statuses as $status) {
            $this->assertEquals('passed', $status['InstanceStatus']['Details'][0]['Status']);
        }
    }
}
