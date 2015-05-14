<?php

namespace Aws\Tests\DirectoryService;

use Aws\DirectoryService\DirectoryServiceClient;

class DirectoryServiceClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\DirectoryService\DirectoryServiceClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = DirectoryServiceClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://ds.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
