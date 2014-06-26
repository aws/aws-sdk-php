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
use Aws\Ec2\Enum\InstanceType;
use Aws\Ec2\Enum\InstanceStateName;

/**
 * @group integration
 */
class BasicOperationsTest extends \Aws\Tests\IntegrationTestCase
{
    const TEST_AMI = 'ami-49ec5a20';

    /**
     * @var Ec2Client
     */
    public $client;

    public function setUp()
    {
        $this->client = self::getServiceBuilder()->get('ec2', true);
    }

    public function testBasicDescribeIteratorWithFilters()
    {
        self::log("\n[#1] Test a basic iterator and make sure deep structures like filters are marshaled correctly.");

        self::log('Set the region to US-WEST-2.');
        $this->client->setRegion(Region::US_WEST_2);

        self::log('Call DescribeImages via the iterator with some filters and a limit of 5.');
        $images = $this->client->getIterator('DescribeImages', array(
            'Owners'  => array('amazon'),
            'Filters' => array(
                array('Name' => 'architecture', 'Values' => array('x86_64')),
                array('Name' => 'image-type', 'Values' => array('machine')),
             )
        ), array(
            'limit' => 5
        ));

        self::log('Verify that the iterator returns only 5.');
        $this->assertEquals(5, iterator_count($images));

        self::log('Verify that the AMI IDs are in the right place and that items actually match the filters.');
        foreach ($images as $ami) {
            $this->assertEquals('x86_64', $ami['Architecture']);
            $this->assertRegExp('/^ami\-[a-f0-9]{8}/', $ami['ImageId']);
        }
    }

    public function testBasicInstanceOperations()
    {
        self::log("\n[#2] Test basic run and terminate operations of instances, including waiting for state changes.");

        self::log('Launch two instances.');
        $result = $this->client->getCommand('RunInstances', array(
            'ImageId'      => self::TEST_AMI,
            'MinCount'     => 2,
            'MaxCount'     => 2,
            'InstanceType' => InstanceType::T1_MICRO,
        ))->getResult();

        self::log('Get the IDs of those two instances.');
        $instanceIds = array();
        foreach ($result['Instances'] as $instance) {
            $this->assertRegExp('/^i\-[a-f0-9]{8}/', $instance['InstanceId']);
            $instanceIds[] = $instance['InstanceId'];
        }
        $this->assertCount(2, $instanceIds);

        self::log('Wait until they are running.');
        $this->client->waitUntil('InstanceRunning', array('InstanceIds' => $instanceIds));

        self::log('Terminate the instances and verify that they are shutting-down.');
        $result = $this->client->getCommand('TerminateInstances', array(
            'InstanceIds' => $instanceIds,
        ))->getResult();
        $this->assertEquals(InstanceStateName::SHUTTING_DOWN, $result->getPath('TerminatingInstances/0/CurrentState/Name'));
        $this->assertEquals(InstanceStateName::SHUTTING_DOWN, $result->getPath('TerminatingInstances/1/CurrentState/Name'));

        self::log('Wait until they are terminated.');
        $this->client->waitUntil('InstanceTerminated', array('InstanceIds' => $instanceIds));

        self::log('Verify that the instances are terminated using the DescribeInstances iterator.');
        $instances = $this->client->getIterator('DescribeInstances', array(
            'InstanceIds' => $instanceIds,
        ));
        foreach ($instances as $instance) {
            $this->assertEquals(InstanceStateName::TERMINATED, $instance['State']['Name']);
        }
    }

    public function testBasicAddressOperations()
    {
        self::log("\n[#3] Test basic operations for address.");

        $instanceId = $this->runAnInstance();

        self::log('Allocate a new Elastic IP address.');
        $result = $this->client->getCommand('AllocateAddress')->getResult();
        $publicIp = $result->get('PublicIp');

        self::log('Associate the address with the instance.');
        $this->client->getCommand('AssociateAddress', array(
            'PublicIp'   => $publicIp,
            'InstanceId' => $instanceId,
        ))->execute();

        self::log('Make sure the address and instance are associated.');
        $result = $this->client->getCommand('DescribeAddresses')->getResult();
        $publicIps = $result->getPath('Addresses/*/PublicIp');
        $instanceIds = $result->getPath('Addresses/*/InstanceId');
        $this->assertContains($publicIp, $publicIps);
        $this->assertContains($instanceId, $instanceIds);

        self::log('Disassociate the address with from instance.');
        $this->client->getCommand('DisassociateAddress', array(
            'PublicIp'   => $publicIp,
        ))->execute();

        self::log('Release the Elastic IP address.');
        $this->client->getCommand('ReleaseAddress', array(
            'PublicIp'   => $publicIp,
        ))->execute();

        $this->terminateAnInstance($instanceId);
    }

    public function testModifyingAnInstanceAttribute()
    {
        self::log("\n[#4] Modify the attributes of an instance.");

        $instanceId = $this->runAnInstance();

        self::log('Stop the instance.');
        $this->client->getCommand('StopInstances', array(
            'InstanceIds' => array($instanceId),
        ))->execute();

        self::log('Wait until the instance is stopped.');
        $this->client->waitUntil('InstanceStopped', array(
            'InstanceIds' => array($instanceId),
        ));

        self::log('Change the stopped instance from a micro to a small.');
        $this->client->getCommand('ModifyInstanceAttribute', array(
            'InstanceId' => $instanceId,
            'Attribute'  => 'instanceType',
            'Value'      => InstanceType::M1_SMALL
        ))->execute();

        self::log('Start the instance back up.');
        $this->client->getCommand('StartInstances', array(
            'InstanceIds' => array($instanceId),
        ))->execute();

        self::log('Wait until the instance is running.');
        $this->client->waitUntil('InstanceRunning', array(
            'InstanceIds' => array($instanceId),
        ));

        $this->terminateAnInstance($instanceId);
    }

    /**
     * @return string The ID of a running instance
     */
    protected function runAnInstance()
    {
        self::log('Launch an instance.');
        $result = $this->client->getCommand('RunInstances', array(
            'ImageId'      => self::TEST_AMI,
            'MinCount'     => 1,
            'MaxCount'     => 1,
            'InstanceType' => InstanceType::T1_MICRO,
        ))->getResult();
        $instanceId = current($result->getPath('Instances/*/InstanceId'));

        self::log('Wait until the instance is running.');
        $this->client->waitUntil('InstanceRunning', array('InstanceIds' => array($instanceId)));

        return $instanceId;
    }

    /**
     * @param string $instanceId The ID of a running instance to terminate
     */
    protected function terminateAnInstance($instanceId)
    {
        self::log('Terminate the instance.');
        $this->client->getCommand('TerminateInstances', array(
            'InstanceIds' => array($instanceId),
        ))->execute();

        self::log('Wait until the instance is terminated.');
        $this->client->waitUntil('InstanceTerminated', array('InstanceIds' => array($instanceId)));
    }
}
