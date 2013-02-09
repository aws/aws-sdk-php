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
use Aws\AutoScaling\Exception\AlreadyExistsException;
use Aws\Ec2\Enum\InstanceType;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const TEST_AMI = 'ami-49ec5a20';

    /**
     * @var AutoScalingClient
     */
    protected $autoscaling;

    public function setUp()
    {
        $this->autoscaling = $this->getServiceBuilder()->get('autoscaling');
    }

    public function testBasicOperations()
    {
        $launchConfigName = 'php-integ-as-launch-config';

        self::log('Create a launch configuration.');
        $this->autoscaling->createLaunchConfiguration(array(
            'LaunchConfigurationName' => $launchConfigName,
            'ImageId'                 => self::TEST_AMI,
            'InstanceType'            => InstanceType::M1_SMALL,
        ));

        self::log('Make sure error handling works by trying to recreate the same launch configuration.');
        try {
            $this->autoscaling->createLaunchConfiguration(array(
                'LaunchConfigurationName' => $launchConfigName,
                'ImageId'                 => self::TEST_AMI,
                'InstanceType'            => InstanceType::M1_SMALL,
            ));
            $this->fail('An exception should have been thrown');
        } catch (AlreadyExistsException $e) {
            $this->assertInstanceOf('Aws\AutoScaling\Exception\AlreadyExistsException', $e);
        }

        self::log('Make sure iterators work by iterating launch configurations.');
        $launchConfigs = $this->autoscaling->getIterator('DescribeLaunchConfigurations')->toArray();
        $this->assertGreaterThanOrEqual(1, count($launchConfigs));
        $this->assertArrayHasKey('LaunchConfigurationName', $launchConfigs[0]);

        self::log('Delete the launch configuration.');
        $this->autoscaling->deleteLaunchConfiguration(array(
            'LaunchConfigurationName' => $launchConfigName,
        ));
    }
}
