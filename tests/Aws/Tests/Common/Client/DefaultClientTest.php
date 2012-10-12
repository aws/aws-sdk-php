<?php

namespace Aws\Tests\Common\Client;

use Aws\Common\Client\DefaultClient;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Enum\Region;

class DefaultClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\Client\DefaultClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $signature = $this->getMock('Aws\Common\Signature\SignatureInterface');
        $credentials = $this->getMock('Aws\Common\Credentials\CredentialsInterface');

        $client = DefaultClient::factory(array(
            Options::CREDENTIALS => $credentials,
            Options::SIGNATURE   => $signature,
            Options::SERVICE     => 'sns',
            Options::REGION      => Region::US_EAST_1,
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureInterface', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\CredentialsInterface', $client->getCredentials());
        $this->assertInstanceOf('Aws\Common\Region\EndpointProviderInterface', $client->getEndpointProvider());
        $this->assertEquals('https://sns.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
