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

namespace Aws\Tests\CloudWatch\Integration;

use Aws\CloudWatch\CloudWatchClient;

/**
 * @group integration
 * @group example
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var CloudWatchClient */
    protected $cloudwatch;

    public function setUp()
    {
        $this->cloudwatch = $this->getServiceBuilder()->get('cloudwatch');
    }

    /**
     * Execute the PutMetricData operation
     *
     * @example Aws\CloudWatch\CloudWatchClient::putMetricData
     */
    public function testPutsMetricData()
    {
        $prefix = $this->getResourcePrefix();
        $client = $this->cloudwatch;
        self::log('Put some data to a metric.');

        // @begin
        $dimensions = array(
            array('Name' => 'Prefix', 'Value' => $prefix),
        );

        $client->putMetricData(array(
            'Namespace'  => 'AWSSDKPHP',
            'MetricData' => array(
                array(
                    'MetricName' => 'CloudWatchTests',
                    'Timestamp'  => time(),
                    'Value'      => rand(1, 20) + rand(1, 59) / 100,
                    'Unit'       => 'Kilobytes',
                    'Dimensions' => $dimensions
                ),
            ),
        ));
    }

    /**
     * Lists metrics
     *
     * @example Aws\CloudWatch\CloudWatchClient::listMetrics
     * @depends testPutsMetricData
     */
    public function testListsMetrics()
    {
        self::log('Make sure the metric exists.');
        $client = $this->cloudwatch;

        // @begin
        $iterator = $client->getIterator('ListMetrics', array(
            'Namespace' => 'AWSSDKPHP'
        ));

        foreach ($iterator as $metric) {
            echo $metric['MetricName'] . ' - '
                . $metric['Dimensions'][0]['Name'] . ' - '
                . $metric['Dimensions'][0]['Value'] . "\n";
        }

        // @end

        echo 'CloudWatchTests - Prefix - ' . $this->getResourcePrefix() . "\n";
        $found = false !== strpos('CloudWatchTests - Prefix - ' . $this->getResourcePrefix(), $this->getActualOutput());

        return $found;
    }

    /**
     * GetMetricStatistics
     *
     * @depends testListsMetrics
     * @example Aws\CloudWatch\CloudWatchClient::getMetricStatistics
     */
    public function testGetsMetricStatistics($found)
    {
        if (!$found) {
            $this->markTestSkipped('The CloudWatch metric you created has not yet been picked up by CloudWatch. This '
            . 'can take up to 15 minutes to occur. Please run this test again later.');
        }

        $prefix = $this->getResourcePrefix();
        $client = $this->cloudwatch;
        self::log('Verify the statistics of the data that has been put.');

        // @begin
        $dimensions = array(
            array('Name' => 'Prefix', 'Value' => $prefix),
        );

        $result = $client->getMetricStatistics(array(
            'Namespace'  => 'AWSSDKPHP',
            'MetricName' => 'CloudWatchTests',
            'Dimensions' => $dimensions,
            'StartTime'  => strtotime('-1 days'),
            'EndTime'    => strtotime('now'),
            'Period'     => 3000,
            'Statistics' => array('Maximum', 'Minimum'),
        ));
        // @end

        $min = min($result->getPath('Datapoints/*/Minimum'));
        $max = max($result->getPath('Datapoints/*/Maximum'));
        $this->assertGreaterThan(1, $min);
        $this->assertLessThan(22, $max);
    }
}
