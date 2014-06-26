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

namespace Aws\Tests\Redshift\Integration;

use Aws\Redshift\RedshiftClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const SECURITY_GROUP_NAME = 'phpintegtestsecuritygroup';

    /**
     * @var RedshiftClient
     */
    public $redshift;

    public function setUp()
    {
        $this->redshift = $this->getServiceBuilder()->get('redshift');
    }

    public function testCreatesSecurityGroup()
    {
        self::log('Create a cluster security group');
        $result = $this->redshift->createClusterSecurityGroup(array(
            'ClusterSecurityGroupName' => self::SECURITY_GROUP_NAME,
            'Description'              => 'PHP Integ Test Cluster Security Group',
        ));
        $this->assertEquals(self::SECURITY_GROUP_NAME, $result->get('ClusterSecurityGroupName'));
        $this->assertTrue($result->hasKey('EC2SecurityGroups'));
        $this->assertTrue($result->hasKey('ResponseMetadata'));
    }

    /**
     * @depends testCreatesSecurityGroup
     */
    public function testListsSecurityGroups()
    {
        self::log('List cluster security groups');
        $found = false;
        foreach ($this->redshift->getIterator('DescribeClusterSecurityGroups') as $group) {
            if ($group['ClusterSecurityGroupName'] == self::SECURITY_GROUP_NAME) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, 'Did not find cluster security group ' . self::SECURITY_GROUP_NAME);
    }

    /**
     * @depends testListsSecurityGroups
     */
    public function testDeletesSecurityGroups()
    {
        self::log('Delete cluster security group');
        $this->redshift->deleteClusterSecurityGroup(array('ClusterSecurityGroupName' => self::SECURITY_GROUP_NAME));
    }

    public function testDescribeEventsIterator()
    {
        $maxRecords = 25;
        $events = $this->redshift->getIterator('DescribeEvents', array(
            'StartTime'  => strtotime('-13 days'),
            'EndTime'    => strtotime('now'),
            'MaxRecords' => $maxRecords,
        ));
        $total = iterator_count($events);
        $expected = ceil($total / $maxRecords);
        $this->assertEquals($expected ?: 1, $events->getRequestCount());
    }

    public function exampleTestBasicClusterOperations()
    {
        $clusterId = 'php-integ-redshift-cluster-' . time();
        $snapshotId = 'php-integ-redshift-snapshot-' . time();

        self::log('Launch a cluster.');
        $this->redshift->getCommand('CreateCluster', array(
            'ClusterIdentifier'  => $clusterId,
            'ClusterType'        => 'multi-node',
            'MasterUsername'     => 'phpinteguser',
            'MasterUserPassword' => 'PHPint3gu$er',
            'NodeType'           => 'dw.hs1.xlarge',
            'NumberOfNodes'      => 2,
        ))->execute();

        self::log('Get a list of all of the clusters and make sure there is at least one.');
        $clusters = $this->redshift->getIterator('DescribeClusters');
        $this->assertGreaterThanOrEqual(1, iterator_count($clusters));

        self::log('Make sure the new cluster exists.');
        $result = $this->redshift->getCommand('DescribeClusters', array(
            'ClusterIdentifier' => $clusterId,
        ))->getResult();
        $this->assertCount(1, $result->get('Clusters'));

        self::log('Wait until the cluster exists. This can take around 20 minutes.');
        $this->redshift->waitUntil('ClusterAvailable', array(
            'ClusterIdentifier' => $clusterId
        ));

        self::log('Create a snapshot of the cluster and wait until it is available.');
        $this->redshift->getCommand('CreateClusterSnapshot', array(
            'ClusterIdentifier'  => $clusterId,
            'SnapshotIdentifier' => $snapshotId,
        ))->execute();
        $this->redshift->waitUntil('SnapshotAvailable', array(
            'SnapshotIdentifier' => $snapshotId
        ));

        self::log('Delete the snapshot.');
        $this->redshift->getCommand('DeleteClusterSnapshot', array(
            'SnapshotIdentifier' => $snapshotId,
        ))->execute();

        self::log('Delete the cluster.');
        $this->redshift->getCommand('DeleteCluster', array(
            'ClusterIdentifier'        => $clusterId,
            'SkipFinalClusterSnapshot' => true,
        ))->execute();

        self::log('Wait until the cluster is deleted.');
        $this->redshift->waitUntil('ClusterDeleted', array(
            'ClusterIdentifier' => $clusterId,
        ));
    }
}
