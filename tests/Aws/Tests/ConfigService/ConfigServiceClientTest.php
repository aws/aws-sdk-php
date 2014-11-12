<?php

namespace Aws\Tests\ConfigService;

use Aws\ConfigService\ConfigServiceClient;

class ConfigServiceClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\ConfigService\ConfigServiceClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = ConfigServiceClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://config.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
