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

namespace Aws\Tests\CloudFormation\Integration;

use Guzzle\Http\Url;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var \Aws\CloudFormation\CloudFormationClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('cloudformation');
    }

    public function testEstimatingTemplateCostMarshalsDataCorrectly()
    {
        self::log('Estimate a template\'s cost.');
        $result = $this->client->estimateTemplateCost(array(
            'TemplateBody' => file_get_contents(__DIR__ . '/template.json'),
            'Parameters' => array(
                array('ParameterKey' => 'KeyName', 'ParameterValue' => 'keypair-name'),
            ),
        ));
        $url = Url::factory($result->get('Url'));
        $this->assertEquals('calculator.s3.amazonaws.com', $url->getHost());
    }

    public function testListStacksCommandAndIterator()
    {
        self::log('Execute a ListJobs command and iterator and verify that the results are the same.');
        $commandResults = $this->client->listStacks()->toArray();
        $this->assertArrayHasKey('StackSummaries', $commandResults);

        $iteratorResults = $this->client->getIterator('ListStacks')->toArray();
        $this->assertEquals($commandResults['StackSummaries'], $iteratorResults);
    }
}
