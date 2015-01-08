<?php
namespace Aws\Tests\CloudHsm;

use Aws\CloudHsm\CloudHsmClient;

class CloudHsmClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInitializesClient()
    {
        $client = CloudHsmClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://cloudhsm.us-west-2.amazonaws.com', $client->getBaseUrl());
    }
}
