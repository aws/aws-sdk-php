<?php

namespace Aws\Tests\Kms;

use Aws\Kms\KmsClient;

class KmsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Kms\KmsClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = KmsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://kms.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
