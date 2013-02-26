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

namespace Aws\Tests\ImportExport\Integration;

use Aws\ImportExport\Enum\JobType;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var \Aws\ImportExport\ImportExportClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('importexport');
    }

    /**
     * @expectedException \Aws\ImportExport\Exception\MissingManifestFieldException
     */
    public function testCreateJobFailsWithIncompleteManifest()
    {
        $this->client->createJob(array(
            'JobType'      => JobType::IMPORT,
            'Manifest'     => 'foo: bar',
            'ValidateOnly' => true,
        ));
    }

    /**
     * @expectedException \Aws\ImportExport\Exception\MissingManifestFieldException
     */
    public function testCreateJobFailsWithIncompleteArrayFormattedManifest()
    {
        if (!class_exists('Symfony\Component\Yaml\Yaml')) {
            $this->markTestSkipped('You must have the the Symfony YAML component installed to run this test.');
        }

        $this->client->createJob(array(
            'JobType'      => JobType::IMPORT,
            'Manifest'     => array('foo' => 'bar'),
            'ValidateOnly' => true,
        ));
    }

    public function testListJobsCommandAndIterator()
    {
        $commandResults = $this->client->listJobs()->toArray();
        $this->assertArrayHasKey('Jobs', $commandResults);

        $iteratorResults = $this->client->getIterator('ListJobs')->toArray();
        $this->assertEquals($commandResults['Jobs'], $iteratorResults);
    }
}
