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

namespace Aws\Tests\Common\InstanceMetadata;

use Aws\Common\InstanceMetadata\InstanceMetadataClient;

class InstanceMetadataClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\InstanceMetadata\InstanceMetadataClient::factory
     */
    public function testConfiguresClient()
    {
        $client = InstanceMetadataClient::factory(array(
            'version' => 'foo'
        ));

        $this->assertEquals('http://169.254.169.254/foo/', $client->getBaseUrl());
    }

    /**
     * @covers Aws\Common\InstanceMetadata\InstanceMetadataClient::getCredentials
     */
    public function testCredentialsAreNull()
    {
        $client = InstanceMetadataClient::factory();
        $this->assertNull($client->getCredentials());
    }
}
