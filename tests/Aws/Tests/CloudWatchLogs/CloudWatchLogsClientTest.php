<?php

namespace Aws\Tests\CloudWatchLogs;

use Aws\CloudWatchLogs\CloudWatchLogsClient;

class CloudWatchLogsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CloudWatchLogs\CloudWatchLogsClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = CloudWatchLogsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://logs.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
