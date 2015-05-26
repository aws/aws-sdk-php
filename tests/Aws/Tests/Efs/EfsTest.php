<?php
namespace Aws\Tests\Efs;

use Aws\Efs\EfsClient;

class EfsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Efs\EfsClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = EfsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://elasticfilesystem.us-west-2.amazonaws.com', $client->getBaseUrl());
    }
}
