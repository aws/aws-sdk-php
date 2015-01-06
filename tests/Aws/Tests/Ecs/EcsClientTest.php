<?php
namespace Aws\Tests\Ecs;

use Aws\Ecs\EcsClient;

class EcsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInitializesClient()
    {
        $client = EcsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://ecs.us-west-2.amazonaws.com', $client->getBaseUrl());
    }
}
