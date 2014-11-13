<?php

namespace Aws\Tests\Lambda;

use Aws\Lambda\LambdaClient;

class LambdaClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Lambda\LambdaClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = LambdaClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://lambda.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
