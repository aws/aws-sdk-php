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

namespace Aws\Tests\ElastiCache\Integration;

use Aws\ElastiCache\ElastiCacheClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const SECURITY_GROUP_NAME = 'phpintegtestsecuritygroup';

    public static function setUpBeforeClass()
    {
        self::log('Cleaning up previously created security groups');
        /** @var $client ElastiCacheClient */
        $client = self::getServiceBuilder()->get('elasticache');
        try {
            $client->deleteCacheSecurityGroup(array('CacheSecurityGroupName' => self::SECURITY_GROUP_NAME));
        } catch (\Exception $e) {
            // Ignore
        }
    }

    /**
     * @var ElastiCacheClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('elasticache');
    }

    public function testEnsuresListsAreParsedCorrectly()
    {
        $results = $this->client->getIterator('DescribeEvents');
        foreach ($results as $result) {
            $this->assertArrayHasKey('Message', $result);
        }
    }

    /**
     * @expectedException \Aws\ElastiCache\Exception\CacheClusterNotFoundException
     */
    public function testParsesErrors()
    {
        $this->client->deleteCacheCluster(array(
            'CacheClusterId' => 'notarealcachecluster'
        ));
    }

    public function testCreatesSecurityGroup()
    {
        self::log('Create a cache security group');
        $result = $this->client->createCacheSecurityGroup(array(
            'CacheSecurityGroupName' => self::SECURITY_GROUP_NAME,
            'Description'            => 'PHP Integ Test Cache Security Group',
        ));
        $this->assertTrue($result->hasKey('OwnerId'));
        $this->assertTrue($result->hasKey('EC2SecurityGroups'));
        $this->assertTrue($result->hasKey('ResponseMetadata'));
    }

    /**
     * @depends testCreatesSecurityGroup
     */
    public function testListsSecurityGroups()
    {
        self::log('List cache security groups');
        $found = false;
        foreach ($this->client->getIterator('DescribeCacheSecurityGroups') as $group) {
            if ($group['CacheSecurityGroupName'] == self::SECURITY_GROUP_NAME) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, 'Did not find cache security group ' . self::SECURITY_GROUP_NAME);
    }

    /**
     * @depends testListsSecurityGroups
     */
    public function testDeletesSecurityGroups()
    {
        self::log('Delete cache security group');
        $this->client->deleteCacheSecurityGroup(array('CacheSecurityGroupName' => self::SECURITY_GROUP_NAME));
    }
}
