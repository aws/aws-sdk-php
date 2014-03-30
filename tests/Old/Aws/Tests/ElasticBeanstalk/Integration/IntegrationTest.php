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

namespace Aws\Tests\ElasticBeanstalk\Integration;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var \Aws\ElasticBeanstalk\ElasticBeanstalkClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('elasticbeanstalk');
    }

    public function testListsApplications()
    {
        $command = $this->client->getCommand('DescribeApplications');
        $result = $command->execute();
        $this->assertNotNull($result->getPath('ResponseMetadata/RequestId'));
        $this->assertInternalType('array', $result['Applications']);

        // Gather a list of IDs and pass them to testAllowsMemberedListsInInputs
        $ids = array();

        if (count($result['Applications'])) {
            foreach ($result['Applications'] as $app) {
                // Ensure that versions is an enumerated array and not a hash
                $this->assertInternalType('array', $app['Versions']);
                $this->assertArrayHasKey(0, $app['Versions']);
                $this->assertInternalType('string', $app['Versions'][0]);
                $this->assertInternalType('string', $app['ApplicationName']);
                $this->assertInternalType('array', $app['ConfigurationTemplates']);
                $ids[] = $app['ApplicationName'];
            }
        }

        return $ids;
    }

    /**
     * @depends testListsApplications
     */
    public function testAllowsMemberedListsInInputs(array $ids = array())
    {
        if (!count($ids)) {
            $this->markTestSkipped('No applications found on your account');
            return;
        }

        $command = $this->client->getCommand('DescribeApplications', array(
            'ApplicationNames' => $ids
        ));
        $result = $command->execute();
        $this->assertEquals(count($ids), count($result['Applications']));
    }
}
