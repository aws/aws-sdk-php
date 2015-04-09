<?php

namespace Aws\Tests\WorkSpaces;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Signature\SignatureV4;
use Aws\WorkSpaces\WorkSpacesClient;

class WorkSpacesClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Support\SupportClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = WorkSpacesClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://workspaces.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
