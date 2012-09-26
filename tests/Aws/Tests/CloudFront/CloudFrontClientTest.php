<?php

namespace Aws\Tests\CloudFront;

use Aws\CloudFront\CloudFrontClient;

/**
 * @covers Aws\CloudFront\CloudFrontClient
 */
class CloudFrontClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryCreatesClient()
    {
        $client = CloudFrontClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));
        $this->assertInstanceOf('Aws\CloudFront\CloudFrontSignature', $client->getSignature());
    }
}
