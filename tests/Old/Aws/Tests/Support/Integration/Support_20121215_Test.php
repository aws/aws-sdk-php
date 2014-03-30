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

namespace Aws\Tests\Support\Integration;

use Aws\Support\SupportClient;

/**
 * @group example
 * @group integration
 * @outputBuffering enabled
 */
class Support_20121215_Test extends \Aws\Tests\IntegrationTestCase
{
    /** @var SupportClient */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('support', true);
    }

    /**
     * Describe the services that can be referenced in AWS Support cases
     *
     * @example Aws\Support\SupportClient::describeServices
     */
    public function testDescribeServices()
    {
        $client = $this->client;
        // @begin

        $result = $client->describeServices();
        $service = $result['services'][5];

        // @end
        $this->assertArrayHasKey('name', $service);
        $this->assertArrayHasKey('categories', $service);

        return array($service);
    }

    /**
     * Describe the severity levels that can be referenced in AWS Support cases
     *
     * @depends testDescribeServices
     * @example Aws\Support\SupportClient::describeSeverityLevels
     */
    public function testDescribeSeverityLevels(array $data)
    {
        $client = $this->client;
        // @begin

        $result = $client->describeSeverityLevels();
        $level = $result['severityLevels'][0];

        // @end
        $this->assertArrayHasKey('name', $level);
        $this->assertArrayHasKey('code', $level);

        $data[] = $level;

        return $data;
    }

    /**
     * Create a support case
     *
     * @depends testDescribeSeverityLevels
     * @example Aws\Support\SupportClient::createCase
     */
    public function testCreateCase(array $data)
    {
        $client = $this->client;
        list ($service, $level) = $data;
        // @begin

        $result = $client->createCase(array(
            'subject'           => 'Test Case',
            'serviceCode'       => $service['code'], // (e.g., amazon-dynamodb)
            'severityCode'      => $level['code'], //(e.g., low)
            'categoryCode'      => $service['categories'][0]['code'], // (e.g., feature-request)
            'communicationBody' => 'Initial Message.',
        ));
        $caseId = $result['caseId'];

        // @end
        $this->assertNotEmpty($caseId);

        return $caseId;
    }

    /**
     * Add communications to a support case
     *
     * @depends testCreateCase
     * @example Aws\Support\SupportClient::addCommunicationToCase
     */
    public function testAddCommunicationToCase($caseId)
    {
        $client = $this->client;
        // @begin

        $client->addCommunicationToCase(array(
            'caseId'            => $caseId,
            'communicationBody' => 'Message one.',
        ));

        $client->addCommunicationToCase(array(
            'caseId'            => $caseId,
            'communicationBody' => 'Message two.',
        ));

        $client->addCommunicationToCase(array(
            'caseId'            => $caseId,
            'communicationBody' => 'Message three.',
        ));

        // @end
        return $caseId;
    }

    /**
     * Describe communications
     *
     * @depends testAddCommunicationToCase
     * @example Aws\Support\SupportClient::describeCommunications
     */
    public function testDescribeCommunications($caseId)
    {
        $client = $this->client;
        // @begin

        $numberOfCommunications = 0;
        $communications = $client->getIterator('DescribeCommunications', array('caseId' => $caseId));
        foreach ($communications as $communication) {
            echo $communication['body'];
            $numberOfCommunications++;
        }
        //> Message three. Message two. Message one. Initial Message.

        echo $numberOfCommunications;
        //> 4

        // @end
        $this->assertEquals(
            "Message three.\n\nMessage two.\n\nMessage one.\n\nInitial Message.\n\n4",
            $this->getActualOutput()
        );

        return $caseId;
    }

    /**
     * Resolve a support case
     *
     * @depends testDescribeCommunications
     * @example Aws\Support\SupportClient::resolveCase
     */
    public function testResolveCase($caseId)
    {
        $client = $this->client;
        // @begin

        $result = $client->resolveCase(array(
            'caseId' => $caseId
        ));
        echo "The initial case status was: {$result['initialCaseStatus']}.\n";
        echo "The final case status was: {$result['finalCaseStatus']}.\n";

        // @end
        $this->assertNotEmpty($this->getActualOutput());
    }
}
