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

namespace Aws\Tests\Common\Credentials;

use Aws\Common\InstanceMetadata\InstanceMetadataClient;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\RefreshableInstanceProfileCredentials;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;

class RefreshableInstanceProfileCredentialsTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getMetadataCredentials()
    {
        $client = InstanceMetadataClient::factory(array());
        $credentials = new RefreshableInstanceProfileCredentials(new Credentials('foo', 'baz', 'bar', 1), $client);

        return array($client, $credentials);
    }

    public function testDoesNotRequireClient()
    {
        $credentials = new RefreshableInstanceProfileCredentials(new Credentials('foo', 'baz', 'bar', 1));
        $this->assertInstanceOf('Aws\\Common\\InstanceMetadata\\InstanceMetadataClient', $this->readAttribute($credentials, 'client'));
    }

    public function testMetadataCredentialsCanBeRefreshed()
    {
        list($client, $credentials) = $this->getMetadataCredentials();
        $mock = $this->setMockResponse($client, array(
            'metadata/iam_security_credentials',
            'metadata/iam_security_credentials_webapp'
        ));

        $credentials->getSecurityToken();

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
        list($client, $credentials) = $this->getMetadataCredentials();
        $mock = new MockPlugin(array(
            new Response(400)
        ));
        $client->getEventDispatcher()->addSubscriber($mock);
        $credentials->getSecurityToken();
    }

    /**
     * @expectedException \Aws\Common\Exception\InstanceProfileCredentialsException
     * @expectedExceptionMessage Unexpected response code: InstanceProfileNotFound
     */
    public function testEnsuresResponseCodeIsSuccess()
    {
        list($client, $credentials) = $this->getMetadataCredentials();
        $mock = new MockPlugin(array(
            $this->getMockResponse('metadata/iam_security_credentials'),
            new Response(200, null, '{ "Code": "InstanceProfileNotFound" }')
        ));
        $client->getEventDispatcher()->addSubscriber($mock);
        $credentials->getSecurityToken();
    }
}
