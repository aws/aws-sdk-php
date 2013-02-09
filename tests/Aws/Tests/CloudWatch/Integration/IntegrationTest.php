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
use Aws\CloudWatch\Enum\Unit;
use Aws\CloudWatch\Enum\Statistic;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var CloudWatchClient
     */
    protected $cloudwatch;

    public function setUp()
    {
        $this->cloudwatch = $this->getServiceBuilder()->get('cloudwatch');
    }

    public function testMetricOperations()
    {
        $namespace  = 'AWSSDKPHP';
        $metricName = 'CloudWatchTests';
        $dimensions = array(
            array('Name' => 'Prefix', 'Value' => $this->getResourcePrefix()),
        );

        self::log('Put some data to a metric.');
        $this->cloudwatch->putMetricData(array(
            'Namespace'  => $namespace,
            'MetricData' => array(
                array(
                    'MetricName' => $metricName,
                    'Timestamp'  => time(),
                    'Value'      => rand(1, 20) + rand(1, 59) / 100,
                    'Unit'       => Unit::KILOBYTES,
                    'Dimensions' => $dimensions,
                ),
            ),
        ));

        self::log('Make sure the metric exists.');
        $found = false;
        foreach ($this->cloudwatch->getIterator('ListMetrics', array('Namespace' => $namespace)) as $metric) {
            if ($found = ($metric['MetricName'] == $metricName && $metric['Dimensions'] == $dimensions)) {
                break;
            }
        }
        if (!$found) {
            $this->markTestSkipped('The CloudWatch metric you created has not yet been picked up by CloudWatch. This '
                . 'can take up to 15 minutes to occur. Please run this test again later.');
        }

        self::log('Verify the statistics of the data that has been put.');
        $result = $this->cloudwatch->getMetricStatistics(array(
            'Namespace'  => $namespace,
            'MetricName' => $metricName,
            'Dimensions' => $dimensions,
            'StartTime'  => strtotime('-1 days'),
            'EndTime'    => strtotime('now'),
            'Period'     => 3000,
            'Statistics' => array(Statistic::MAXIMUM, Statistic::MINIMUM),
        ));
        $min = min($result->getPath('Datapoints/*/Minimum'));
        $max = max($result->getPath('Datapoints/*/Maximum'));
        $this->assertGreaterThan(1, $min);
        $this->assertLessThan(22, $max);
    }
}
