<?php

namespace Aws\Tests\Sts;

use Aws\Sts\StsClient;

/**
 * @covers Aws\Sts\StsClient
 */
class StsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInitializesClient()
    {
        $client = StsClient::factory(array(
            'access_key_id'     => 'foo',
            'secret_access_key' => 'bar'
        ));

        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://sts.amazonaws.com', $client->getBaseUrl());
        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $this->readAttribute($client, 'signature'));
        $this->assertTrue($client->getDescription()->hasCommand('GetSessionToken'));
    }
}
