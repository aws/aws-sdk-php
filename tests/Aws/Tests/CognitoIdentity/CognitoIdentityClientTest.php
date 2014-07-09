<?php

namespace Aws\Tests\CognitoIdentity;

use Aws\CognitoIdentity\CognitoIdentityClient;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

class CognitoIdentityClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CognitoIdentity\CognitoIdentityClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = CognitoIdentityClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://cognito-identity.us-east-1.amazonaws.com', $client->getBaseUrl());
    }

    public function testThatAssumeRoleWithWebIdentityRequestsDoNotGetSigned()
    {
        $client = CognitoIdentityClient::factory(array('region' => 'us-east-1'));

        $mock = new MockPlugin();
        $mock->addResponse(new Response(200));
        $client->addSubscriber($mock);

        $command = $client->getCommand('GetId', array(
            'AccountId'      => '1234567890',
            'IdentityPoolId' => 'abc:abc'
        ));
        $request = $command->prepare();
        $command->execute();

        $this->assertFalse($request->hasHeader('Authorization'));
    }
}