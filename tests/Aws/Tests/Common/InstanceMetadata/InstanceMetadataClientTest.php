<?php

namespace Aws\Tests\Common\InstanceMetadata;

use Aws\Common\InstanceMetadata\InstanceMetadataClient;

class InstanceMetadataClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\InstanceMetadata\InstanceMetadataClient::factory
     */
    public function testConfiguresClient()
    {
        $client = InstanceMetadataClient::factory(array(
            'version' => 'foo'
        ));

        $this->assertEquals('http://169.254.169.254/foo/', $client->getBaseUrl());
    }

    /**
     * @covers Aws\Common\InstanceMetadata\InstanceMetadataClient::getCredentials
     */
    public function testCredentialsAreNull()
    {
        $client = InstanceMetadataClient::factory();
        $this->assertNull($client->getCredentials());
    }
}
