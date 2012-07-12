<?php

namespace Aws\Tests\Common\Client;

use Aws\Common\Client\DefaultClient;

class DefaultClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\Client\DefaultClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $signature   = $this->getMock('Aws\Common\Signature\SignatureInterface');
        $credentials = $this->getMock('Aws\Common\Credentials\CredentialsInterface');

        $client = DefaultClient::factory(array(
            'credentials'  => $credentials,
            'signature'    => $signature,
            'base_url'     => 'https://{service}.{region}.amazonaws.com',
            'service'      => 'foo',
            'region'       => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureInterface', $this->readAttribute($client, 'signature'));
        $this->assertInstanceOf('Aws\Common\Credentials\CredentialsInterface', $client->getCredentials());
        $this->assertEquals('https://foo.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
