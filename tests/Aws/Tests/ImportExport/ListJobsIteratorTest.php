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

namespace Aws\Tests\ImportExport;

class ListJobsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanGetNextToken()
    {
        /** @var \Aws\ImportExport\ImportExportClient $client */
        $client = $this->getServiceBuilder()->get('importexport', true);
        $this->setMockResponse($client, array(
            'importexport/list_jobs_1',
            'importexport/list_jobs_2',
        ));

        /** @var \Aws\Common\Iterator\AwsResourceIterator $iterator */
        $iterator = $client->getIterator('ListJobs');
        $jobs = iterator_to_array($iterator);

        $this->assertCount(4, $jobs);
        $this->assertEquals(2, $iterator->getRequestCount());
    }
}
