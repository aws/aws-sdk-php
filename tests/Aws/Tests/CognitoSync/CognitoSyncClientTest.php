<?php

namespace Aws\Tests\CognitoSync;

use Aws\CognitoSync\CognitoSyncClient;

class CognitoSyncClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CognitoSync\CognitoSyncClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = CognitoSyncClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://cognito-sync.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
