<?php

namespace Aws\Tests\Glacier;

use Aws\Glacier\GlacierClient;

class GlacierClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Glacier\GlacierClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = GlacierClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $this->readAttribute($client, 'signature'));
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://glacier.us-west-2.amazonaws.com', $client->getBaseUrl());
        $this->assertEquals('-', $client->getCommand('ListVaults')->get('accountId'));
    }
}
