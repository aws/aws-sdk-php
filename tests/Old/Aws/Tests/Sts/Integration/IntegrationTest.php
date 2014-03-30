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

namespace Aws\Tests\Sts\Integration;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var \Aws\Sts\StsClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $client = $this->getServiceBuilder()->get('sts');
    }

    public function testRetrievesFederatedToken()
    {
        $command = $this->client->getCommand('GetFederationToken', array(
            'DurationSeconds' => 3609,
            'Name'            => 'foo',
            'Policy'          => json_encode(array(
                'Statement' => array(
                    array(
                        'Effect'   => 'Deny',
                        'Action'   => 's3:GetObject',
                        'Resource' => 'arn:aws:s3:::mybucket/federated/Jill/*'
                    )
                )
            ))
        ));

        try {
            $command->execute();
        } catch (\Aws\Sts\Exception\StsException $e) {
            echo $e->getMessage() . "\n";
            echo var_export($e->getResponse()->getRequest()->getParams()->get('aws.signed_headers'), true). "\n";
            echo $e->getResponse()->getRequest()->getParams()->get('aws.canonical_request') . "\n";
            echo $e->getResponse()->getRequest()->getParams()->get('aws.string_to_sign') . "\n";
            die();
        }

        // Ensure the query string variables were set correctly
        $this->assertEquals('foo', $command->getRequest()->getPostField('Name'));
        $this->assertEquals('GetFederationToken', $command->getRequest()->getPostField('Action'));
        $this->assertNotEmpty($command->getRequest()->getPostField('Policy'));
        $this->assertEquals(3609, $command->getRequest()->getPostField('DurationSeconds'));

        // Ensure that the result is an array
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $command->getResult());
        $this->assertNotNull($command->getResult()->get('Credentials'));
        $this->assertNotNull($command->getResult()->get('ResponseMetadata'));
    }

    public function testRetrievesSessionTokenWithDefaultDuration()
    {
        $command = $this->client->getCommand('GetSessionToken');
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $command->getResult());
    }

    public function testRetrievesSessionTokenWithCustomDuration()
    {
        $command = $this->client->getCommand('GetSessionToken', array(
            'DurationSeconds' => 5000
        ));

        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $command->getResult());
        $this->assertEquals('GetSessionToken', $command->getRequest()->getPostField('Action'));
        $this->assertEquals(5000, $command->getRequest()->getPostField('DurationSeconds'));
    }

    /**
     * @expectedException \Aws\Sts\Exception\StsException
     * @expectedExceptionMessage Not authorized to perform sts:AssumeRoleWithWebIdentity
     */
    public function testFailsOnBadWebIdentity()
    {
        $this->client->assumeRoleWithWebIdentity(array(
            'RoleArn'          => 'arn:aws:iam::123123123123:role/DummyRole.',
            'RoleSessionName'  => 'dummy-session-name',
            'WebIdentityToken' => 'dummy-oauth-token',
            'ProviderId'       => 'dummy-provider-name',
            'Policy'           => json_encode(array(
                'Statement' => array(
                    array(
                        'Effect'   => 'Deny',
                        'Action'   => 's3:GetObject',
                        'Resource' => 'arn:aws:s3:::mybucket/dummy/*'
                    )
                )
            )),
        ));
    }
}
