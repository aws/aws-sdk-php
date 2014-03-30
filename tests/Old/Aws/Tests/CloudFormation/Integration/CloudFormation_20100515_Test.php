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
 * @group example
 */
class CloudFormation_20100515_Test extends \Aws\Tests\IntegrationTestCase
{
    /** @var \Aws\CloudFormation\CloudFormationClient */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('cloudformation', true);
    }

    /**
     * Ensures that the client marshals correctly
     *
     * @example Aws\CloudFormation\CloudFormationClient::estimateTemplateCost
     */
    public function testEstimatesTemplateCosts()
    {
        self::log('Estimate a template\'s cost.');
        $client = $this->client;
        $templateBody = file_get_contents(__DIR__ . '/template.json');

        // @begin
        $result = $client->estimateTemplateCost(array(
            'TemplateBody' => $templateBody,
            'Parameters' => array(
                array('ParameterKey' => 'KeyName', 'ParameterValue' => 'keypair-name'),
            ),
        ));

        echo 'Result URL: ' . $result['Url'] . "\n";
        // @end

        $url = Url::factory($result['Url']);
        $this->assertEquals('calculator.s3.amazonaws.com', $url->getHost());
    }

    /**
     * Iterate over the results of a ListStacks operation
     *
     * @example Aws\CloudFormation\CloudFormationClient::listStacks
     */
    public function testListStacksCommandAndIterator()
    {
        self::log('Execute a ListJobs command and iterator and verify that the results are the same.');
        $client = $this->client;
        // @begin
        $result = $this->client->listStacks();
        $stacks = $result['StackSummaries'];

        // Or load the stacks as an iterator
        $iterator = $client->getIterator('ListStacks');
        $stacks = $iterator->toArray();
        // @end
        $this->assertNotNull($stacks);
        $this->assertEquals($result['StackSummaries'], $stacks);
    }
}
