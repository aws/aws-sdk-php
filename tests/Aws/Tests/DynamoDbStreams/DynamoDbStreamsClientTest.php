<?php

namespace Aws\Tests\DynamoDbStreams;

use Aws\DynamoDbStreams\DynamoDbStreamsClient;

class DynamoDbStreamsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\DynamoDbStreams\DynamoDbStreamsClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = DynamoDbStreamsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://streams.dynamodb.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
