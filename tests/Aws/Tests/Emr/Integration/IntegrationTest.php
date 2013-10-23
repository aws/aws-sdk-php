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

namespace Aws\Tests\Emr\Integration;

use Aws\Ec2\Enum\InstanceType;
use Aws\Emr\EmrClient;
use Aws\Emr\Enum\JobFlowExecutionState;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var EmrClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('emr');
    }

    public function testCreateAndDeleteJobFlow()
    {
        self::log('Create a job flow');
        $jobFlowName = 'php-integ-test-job-flow';
        $result = $this->client->getCommand('RunJobFlow', array(
            'Name'      => $jobFlowName,
            'Instances' => array(
                'InstanceCount'               => 2,
                'KeepJobFlowAliveWhenNoSteps' => true,
                'MasterInstanceType'          => InstanceType::M1_SMALL,
                'SlaveInstanceType'           => InstanceType::M1_SMALL,
            ),
        ))->getResult();
        $jobFlowId = $result->get('JobFlowId');

        self::log('Describe the job flows and make sure the job flow is there');
        $found = false;
        foreach ($this->client->getIterator('DescribeJobFlows', array(
            'CreatedAfter' => '-10 minutes'
        )) as $jobFlow) {
            if ($jobFlow['Name'] === $jobFlowName) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found);

        self::log('Delete the job flow');
        $this->client->getCommand('TerminateJobFlows', array(
            'JobFlowIds' => array($jobFlowId)
        ))->execute();

        self::log('Describe the job flows again and make sure the job flow is no longer there');
        $state = $this->client->getCommand('DescribeJobFlows')->getResult()->getPath('JobFlows/0/ExecutionStatusDetail/State');
        $this->assertContains($state, array(JobFlowExecutionState::SHUTTING_DOWN, JobFlowExecutionState::TERMINATED));
    }
}
