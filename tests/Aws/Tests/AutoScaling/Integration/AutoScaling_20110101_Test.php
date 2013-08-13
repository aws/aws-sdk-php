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

namespace Aws\Tests\AutoScaling\Integration;

use Aws\AutoScaling\AutoScalingClient;
use Aws\Ec2\Enum\InstanceType;

/**
 * @group integration
 * @group example
 */
class AutoScaling_20110101_Test extends \Aws\Tests\IntegrationTestCase
{
    const TEST_AMI = 'ami-49ec5a20';
    const LAUNCH_NAME = 'php-integ-as-launch-config';

    /** @var AutoScalingClient */
    protected $autoscaling;

    public function setUp()
    {
        $this->autoscaling = $this->getServiceBuilder()->get('autoscaling');
    }

    /**
     * CreateLaunchConfiguration
     *
     * @example Aws\AutoScaling\AutoScalingClient::createLaunchConfiguration
     * @example Aws\AutoScaling\AutoScalingClient::createLaunchConfiguration
     */
    public function testCreateLaunchConfiguration()
    {
        $launchConfigName = self::LAUNCH_NAME;
        $client = $this->autoscaling;
        self::log('Create a launch configuration.');

        // @begin
        $client->createLaunchConfiguration(array(
            'LaunchConfigurationName' => $launchConfigName,
            'ImageId'                 => self::TEST_AMI,
            'InstanceType'            => InstanceType::M1_SMALL,
        ));
    }

    /**
     * Iterate over the results of DescribeLaunchConfigurations
     *
     * @example Aws\AutoScaling\AutoScalingClient::describeLaunchConfigurations
     * @depends testCreateLaunchConfiguration
     */
    public function testListsLaunchConfigs()
    {
        $client = $this->autoscaling;
        self::log('Make sure iterators work by iterating launch configurations.');
        // @begin
        $iterator = $client->getIterator('DescribeLaunchConfigurations');
        foreach ($iterator as $launchConfig) {
            var_export($launchConfig);
        }
        // end
        $iterator->rewind();
        $configs = $iterator->toArray();
        $this->assertGreaterThanOrEqual(1, $configs);
        $this->assertArrayHasKey('LaunchConfigurationName', $configs[0]);
    }

    /**
     * @depends testListsLaunchConfigs
     */
    public function testHandlesErrors()
    {
        $launchConfigName = self::LAUNCH_NAME;
        $client = $this->autoscaling;

        // @begin
        // Create a launch configuration with error handling
        try {
            $client->createLaunchConfiguration(array(
                'LaunchConfigurationName' => $launchConfigName,
                'ImageId'                 => self::TEST_AMI,
                'InstanceType'            => InstanceType::M1_SMALL,
            ));
            $this->fail('An exception should have been thrown');
        } catch (\Aws\AutoScaling\Exception\AutoScalingException $e) {
            if ($e->getCode() == 'AlreadyExists') {
                $this->assertInstanceOf('Aws\AutoScaling\Exception\AlreadyExistsException', $e);
            } else {
                throw $e;
            }
        }
    }

    /**
     * Delete a launch configuration
     *
     * @example Aws\AutoScaling\AutoScalingClient::deleteLaunchConfiguration
     * @depends testHandlesErrors
     */
    public function testDeletesLaunchConfigs()
    {
        $launchConfigName = self::LAUNCH_NAME;
        $client = $this->autoscaling;
        self::log('Delete the launch configuration.');

        // @begin
        $client->deleteLaunchConfiguration(array(
            'LaunchConfigurationName' => $launchConfigName,
        ));
    }
}
