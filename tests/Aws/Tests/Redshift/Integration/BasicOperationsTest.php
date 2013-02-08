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
class BasicOperationsTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var RedshiftClient
     */
    public $redshift;

    public function setUp()
    {
        $this->redshift = $this->getServiceBuilder()->get('redshift');
    }

    public function testBasicInstanceOperations()
    {
//        self::log('Launch a cluster.');
//        $clusterId = 'php-integ-redshift-cluster';
//        $this->redshift->getCommand('CreateCluster', array(
//            'ClusterIdentifier'  => $clusterId,
//            'ClusterType'        => 'multi-node',
//            'MasterUsername'     => 'phpinteguser',
//            'MasterUserPassword' => 'PHPint3gu$er',
//            'NodeType'           => 'dw.hs1.xlarge',
//            'NumberOfNodes'      => 2,
//        ))->execute();
//        $this->redshift->waitUntilClusterAvailable(array('ClusterIdentifier' => $clusterId));
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
        $this->assertEquals(ceil($total / $maxRecords), $events->getRequestCount());
    }
}
