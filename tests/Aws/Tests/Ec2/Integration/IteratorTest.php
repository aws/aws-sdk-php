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
use Guzzle\Service\Description\Operation;

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

    /**
     * This test is not with the other similar tests to ensure that some basic response parsing is correct
     */
    public function testDescribeReservedInstancesOfferings()
    {
        $result = $this->client->getIterator('DescribeReservedInstancesOfferings', null, array('limit' => 25));
        $this->assertLessThanOrEqual(25, iterator_count($result));
        foreach ($result as $offering) {
            $this->assertArrayHasKey('ReservedInstancesOfferingId', $offering);
            $this->assertArrayHasKey('InstanceType', $offering);
            $this->assertInternalType('array', $offering['RecurringCharges']);
            $this->assertInternalType('array', $offering['PricingDetails']);
        }
    }

    public function iteratorProvider()
    {
        $iterators = array();
        $c = self::getServiceBuilder()->get('ec2', true);
        foreach ($c->getDescription()->getOperations() as $o) {
            if (strpos($o->getName(), 'Describe') !== false) {
                if ($o->hasParam('NextToken')) {
                    continue;
                }
                foreach ($o->getParams() as $p) {
                    if ($p->getType() == 'array' && $p->getItems() && !in_array($o, $iterators, true)) {
                        $iterators[] = $o;
                    }
                }
            }
        }

        return array_map(function ($a) { return array($a); }, $iterators);
    }

    /**
     * @dataProvider iteratorProvider
     */
    public function testDescribeIteratorTest(Operation $operation)
    {
        switch ($operation->getName()) {
            case 'DescribeImages':
            case 'DescribeReservedInstancesListings':
            case 'DescribeLicenses':
                self::log('Not running ' . $operation->getName());
                return;
        }

        self::log('Testing iterator: ' . $operation->getName());
        $iterator = $this->client->getIterator($operation->getName(), null, array('limit' => 25));
        $this->assertLessThanOrEqual(25, iterator_count($iterator));
        foreach ($iterator as $result) {
            $this->assertInternalType('array', $result);
        }
    }
}
