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
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

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

    public function testRetrievesMetadataCredentials()
    {
        $client = InstanceMetadataClient::factory();
        $mock = $this->setMockResponse($client, array(
            'metadata/iam_security_credentials',
            'metadata/iam_security_credentials_webapp'
        ));
        $credentials = $client->getInstanceProfileCredentials();
        $this->assertEquals('AKIAIEXAMPLEEXAMPLEA', $credentials->getAccessKeyId());
        $this->assertEquals('EXAMPLErUcddCyEXAMPLEnG3vwyGTnFZ4EXAMPLE', $credentials->getSecretKey());
        $this->assertEquals('AxCusEXAMPLEFooBarBaz...', $credentials->getSecurityToken());
        $this->assertEquals(1904600140, $credentials->getExpiration());
        $mockedRequests = $mock->getReceivedRequests();
        $this->assertEquals(2, count($mockedRequests));
        $this->assertContains('/webapp', (string) $mockedRequests[1]->getUrl());
    }

    /**
     * @expectedException \Aws\Common\Exception\InstanceProfileCredentialsException
     * @expectedExceptionMessage Error retrieving credentials from the instance profile metadata server
     */
    public function testExceptionsAreWrapped()
    {
        $client = InstanceMetadataClient::factory();
        $mock = new MockPlugin(array(new Response(400)));
        $client->getEventDispatcher()->addSubscriber($mock);
        $client->getInstanceProfileCredentials();
    }

    /**
     * @expectedException \Aws\Common\Exception\InstanceProfileCredentialsException
     * @expectedExceptionMessage Unexpected response code: InstanceProfileNotFound
     */
    public function testEnsuresResponseCodeIsSuccess()
    {
        $client = InstanceMetadataClient::factory();
        $mock = new MockPlugin(array(
            $this->getMockResponse('metadata/iam_security_credentials'),
            new Response(200, null, '{ "Code": "InstanceProfileNotFound" }')
        ));
        $client->getEventDispatcher()->addSubscriber($mock);
        $client->getInstanceProfileCredentials();
    }
}
