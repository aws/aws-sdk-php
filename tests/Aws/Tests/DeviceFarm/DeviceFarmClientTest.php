<?php

namespace Aws\Tests\DeviceFarm;

use Aws\DeviceFarm\DeviceFarmClient;

class DeviceFarmClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\DirectoryService\DirectoryServiceClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = DeviceFarmClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://devicefarm.us-west-2.amazonaws.com', $client->getBaseUrl());
    }
}
