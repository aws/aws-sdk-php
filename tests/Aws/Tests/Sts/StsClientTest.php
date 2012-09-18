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
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-1'
        ));

        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://sts.amazonaws.com', $client->getBaseUrl());
        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $this->readAttribute($client, 'signature'));
        $this->assertTrue($client->getDescription()->hasOperation('GetSessionToken'));
    }
}
