<?php

namespace Aws\Tests\CloudSearchDomain;

use Aws\CloudSearchDomain\CloudSearchDomainClient;
use Aws\Common\Enum\ClientOptions as OPT;
use Aws\Credentials\Credentials;

/**
 * @covers Aws\CloudSearchDomain\CloudSearchDomainClient
 * @covers Aws\CloudSearchDomain\CloudSearchDomainClientBuilder
 */
class CloudSearchDomainClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInitializesClient()
    {
        $client = CloudSearchDomainClient::factory(array(
            OPT::BASE_URL   => 'foo.us-east-1.cloudsearch.amazonaws.com',
            OPT::VALIDATION => false,
        ));

        $this->assertEquals('https://foo.us-east-1.cloudsearch.amazonaws.com', $client->getBaseUrl());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFailsWithoutBaseUrl()
    {
        CloudSearchDomainClient::factory();
    }

    public function testThrowsExceptionWhenAttemptingToMutateCredentialsOrRegion()
    {
        $client = CloudSearchDomainClient::factory(array('base_url' => 'example.com'));

        $this->setExpectedException('BadMethodCallException');
        $client->setRegion('us-west-2');

        $this->setExpectedException('BadMethodCallException');
        $client->setCredentaisl(new Credentials('foo', 'bar'));
    }
}
