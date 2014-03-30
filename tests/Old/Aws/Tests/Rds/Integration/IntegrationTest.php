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

namespace Aws\Tests\Rds\Integration;

use Aws\Rds\RdsClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const TEST_GROUP = 'integfoo';

    /**
     * @var RdsClient
     */
    protected $client;

    public static function setUpBeforeClass()
    {
        self::log('Cleaning up previously created security groups');
        $client = self::getServiceBuilder()->get('rds');
        try {
            $result = $client->deleteDBSecurityGroup(array(
                'DBSecurityGroupName' => self::TEST_GROUP
            ));
        } catch (\Exception $e) {
            // Ignore
        }
    }

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('rds');
    }

    public function testEnsuresListsAreParsedCorrectly()
    {
        $results = $this->client->getIterator('DescribeDBEngineVersions');
        foreach ($results as $result) {
            $this->assertArrayHasKey('DBParameterGroupFamily', $result);
        }
    }

    /**
     * @expectedException \Aws\Rds\Exception\DBInstanceNotFoundException
     * @expectedExceptionMessage DBInstance foo-123-na not found
     */
    public function testParsesErrors()
    {
        $this->client->deleteDBInstance(array(
            'DBInstanceIdentifier' => 'foo-123-na'
        ));
    }

    public function testCreatesSecurityGroup()
    {
        self::log('Creating a DB security group');
        $result = $this->client->createDBSecurityGroup(array(
            'DBSecurityGroupName' => self::TEST_GROUP,
            'DBSecurityGroupDescription' => 'Integ test'
        ));
        $this->assertArrayHasKey('OwnerId', $result->toArray());
        $this->assertArrayHasKey('EC2SecurityGroups', $result->toArray());
        $this->assertArrayHasKey('ResponseMetadata', $result->toArray());
    }

    /**
     * @depends testCreatesSecurityGroup
     */
    public function testListsSecurityGroups()
    {
        self::log('Listing security group');
        $iterator = $this->client->getIterator('DescribeDBSecurityGroups');
        $found = false;
        foreach ($iterator as $group) {
            if ($group['DBSecurityGroupName'] == self::TEST_GROUP) {
                $found = true;
                break;
            }
        }
        if (!$found) {
            $this->fail('Did not find security group ' . self::TEST_GROUP);
        }
    }

    /**
     * @depends testListsSecurityGroups
     */
    public function testDeletesSecurityGroups()
    {
        self::log('Cleaning up security group');
        $this->client->deleteDBSecurityGroup(array('DBSecurityGroupName' => self::TEST_GROUP));
    }
}
