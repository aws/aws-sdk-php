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

namespace Aws\Tests\Sts;

use Aws\Sts\StsClient;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Service\Resource\Model;

/**
 * @covers Aws\Sts\StsClient
 */
class StsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInitializesClient()
    {
        $client = StsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-1'
        ));

        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://sts.amazonaws.com', $client->getBaseUrl());
        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertTrue($client->getDescription()->hasOperation('GetSessionToken'));
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testRequiresLongTermCredentials()
    {
        StsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'token'  => 'foo',
            'region' => 'us-west-1'
        ));
    }

    public function testCanCreateCredentialsObjectFromStsResult()
    {
        $result = new Model(array(
            'Credentials' => array(
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken' => 'baz',
                'Expiration' => 30,
            )
        ));

        $client = StsClient::factory();
        $credentials = $client->createCredentials($result);

        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $credentials);
        $this->assertEquals('foo', $credentials->getAccessKeyId());
        $this->assertEquals('bar', $credentials->getSecretKey());
        $this->assertEquals('baz', $credentials->getSecurityToken());
        $this->assertEquals(30, $credentials->getExpiration());
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testThrowsExceptionWhenCreatingCredentialsFromInvalidInput()
    {
        $client = StsClient::factory();
        $credentials = $client->createCredentials(new Model(array()));
    }

    public function testThatAssumeRoleWithWebIdentityRequestsDoNotGetSigned()
    {
        $client = StsClient::factory();

        $mock = new MockPlugin();
        $mock->addResponse(new Response(200));
        $client->addSubscriber($mock);

        $command = $client->getCommand('AssumeRoleWithWebIdentity', array(
            'RoleArn'          => 'xxxxxxxxxxxxxxxxxxxxxx',
            'RoleSessionName'  => 'xx',
            'WebIdentityToken' => 'xxxx'
        ));
        $request = $command->prepare();
        $command->execute();

        $this->assertFalse($request->hasHeader('Authorization'));
    }
}
