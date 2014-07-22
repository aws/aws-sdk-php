<?php

namespace Aws\Tests\Route53Domains;

use Aws\Route53Domains\Route53DomainsClient;

class Route53DomainsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Route53Domains\Route53DomainsClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = Route53DomainsClient::factory(array(
            'key'     => 'foo',
            'secret'  => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://route53domains.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
