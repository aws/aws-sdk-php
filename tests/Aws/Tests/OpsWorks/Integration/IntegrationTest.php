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

namespace Aws\Tests\OpsWorks\Integration;

use Aws\OpsWorks\OpsWorksClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var OpsWorksClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('opsworks');
    }

    public function testDescribesStacks()
    {
        self::log('Describing stacks');
        $result = $this->client->describeStacks()->toArray();
        $this->assertArrayHasKey('Stacks', $result);
    }

    public function testListsStacks()
    {
        self::log('Iterating stacks');
        $stacks = $this->client->getIterator('DescribeStacks')->toArray();
        $this->assertInternalType('array', $stacks);
        foreach ($stacks as $stack) {
            $this->assertArrayHasKey('Name', $stack);
        }
    }

    /**
     * @expectedException \Aws\OpsWorks\Exception\ResourceNotFoundException
     */
    public function testParsesErrors()
    {
        self::log('Ensuring errors are parsed correctly');
        $this->client->deleteApp(array('AppId' => 'does-not-exist-foo-123'));
    }
}
