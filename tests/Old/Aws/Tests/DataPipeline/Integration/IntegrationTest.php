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

namespace Aws\Tests\DataPipeline\Integration;

use Aws\DataPipeline\DataPipelineClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var DataPipelineClient
     */
    public $dataPipeline;

    public static function setUpBeforeClass()
    {
        self::log('Delete existing PHP test pipelines.');
        $dp = self::getServiceBuilder()->get('datapipeline');
        foreach ($dp->getIterator('ListPipelines') as $pipeline) {
            if (strpos($pipeline['name'], 'php-test-pipeline') === 0) {
                $dp->getCommand('DeletePipeline', array('pipelineId' => $pipeline['id']))->execute();
            }
        }
        sleep(3);
    }

    public function setUp()
    {
        $this->dataPipeline = self::getServiceBuilder()->get('datapipeline');
    }

    public function testCrudOperationsForPipelines()
    {
        self::log('Create 3 pipelines.');
        $pipelineIds = array();
        foreach (range(1, 3) as $index) {
            $name = "php-test-pipeline-{$index}";
            $result = $this->dataPipeline->getCommand('CreatePipeline', array(
                'name'     => $name,
                'uniqueId' => $name,
            ))->getResult();
            $pipelineIds[] = $result['pipelineId'];
        }

        self::log('List the pipelines and make sure the ones we added are there.');
        foreach ($this->dataPipeline->getIterator('ListPipelines') as $pipeline) {
            if (strpos($pipeline['name'], 'php-test-pipeline') === 0) {
                $this->assertContains($pipeline['id'], $pipelineIds);
            }
        }

        self::log('Describe the pipelines and make sure the ones we added are still there.');
        $result = $this->dataPipeline->getCommand('DescribePipelines', array(
            'pipelineIds' => $pipelineIds,
        ))->getResult();
        $this->assertCount(3, $result['pipelineDescriptionList']);
        foreach ($result['pipelineDescriptionList'] as $pipeline) {
            $this->assertContains($pipeline['pipelineId'], $pipelineIds);
        }

        self::log('Test putting a pipeline definition.');
        $definition = array(
            'pipelineId' => $pipelineIds[0],
            'pipelineObjects' => array(
                array(
                    'id'     => 'Default',
                    'name'   => 'Default',
                    'fields' => array(
                        array(
                            'key'         => 'workerGroup',
                            'stringValue' => 'workerGroup'
                        )
                    )
                ),
                array(
                    'id'     => 'Schedule',
                    'name'   => 'Schedule',
                    'fields' => array(
                        array(
                            'key'         => 'startDateTime',
                            'stringValue' => '2012-12-12T00:00:00'
                        ),
                        array(
                            'key'         => 'type',
                            'stringValue' => 'Schedule'
                        ),
                        array(
                            'key'         => 'period',
                            'stringValue' => '1 hour'
                        ),
                        array(
                            'key'         => 'endDateTime',
                            'stringValue' => '2012-12-21T18:00:00'
                        ),
                    )
                ),
                array(
                    'id'     => 'SayHello',
                    'name'   => 'SayHello',
                    'fields' => array(
                        array(
                            'key'         => 'type',
                            'stringValue' => 'ShellCommandActivity'
                        ),
                        array(
                            'key'         => 'command',
                            'stringValue' => 'echo hello'
                        ),
                        array(
                            'key'      => 'parent',
                            'refValue' => 'Default'
                        ),
                        array(
                            'key'      => 'schedule',
                            'refValue' => 'Schedule'
                        )
                    )
                )
            )
        );
        $result = $this->dataPipeline->getCommand('ValidatePipelineDefinition', $definition)->getResult();
        $this->assertFalse($result->get('errored'));
        $result = $this->dataPipeline->getCommand('PutPipelineDefinition', $definition)->getResult();
        $this->assertFalse($result->get('errored'));

        self::log('Get a pipeline definition.');
        $response = $this->dataPipeline->getCommand('GetPipelineDefinition', array(
            'pipelineId' => $pipelineIds[0],
        ))->getResponse();
        $this->assertEquals(200, $response->getStatusCode());

        self::log('Delete the pipelines we created.');
        foreach ($pipelineIds as $pipelineId) {
            $response = $this->dataPipeline->getCommand('DeletePipeline', array(
                'pipelineId' => $pipelineId,
            ))->getResponse();
            $this->assertEquals(200, $response->getStatusCode());
        }

        self::log('Sleep to let delete calls propagate.');
        sleep(5);

        self::log('List the pipelines and make sure the ones we deleted are gone.');
        foreach ($this->dataPipeline->getIterator('ListPipelines') as $pipeline) {
            if (strpos($pipeline['name'], 'php-test-pipeline') === 0) {
                $this->fail("The pipeline {$pipeline['name']} was not deleted.");
            }
        }
    }
}
