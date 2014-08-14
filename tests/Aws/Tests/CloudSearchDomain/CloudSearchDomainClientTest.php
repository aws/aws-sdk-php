<?php

namespace Aws\Tests\CloudSearchDomain;

use Aws\CloudSearchDomain\CloudSearchDomainClient;
use Aws\Common\Enum\ClientOptions as Opt;
use Aws\Common\Credentials\Credentials;
use Guzzle\Common\Event;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

/**
 * @covers Aws\CloudSearchDomain\CloudSearchDomainClient
 * @covers Aws\CloudSearchDomain\CloudSearchDomainClientBuilder
 */
class CloudSearchDomainClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInitializesClient()
    {
        $client = CloudSearchDomainClient::factory(array(
            Opt::BASE_URL   => 'foo.us-east-1.cloudsearch.amazonaws.com',
            Opt::VALIDATION => false,
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

    public function testThrowsExceptionWhenAttemptingToMutateRegion()
    {
        $client = CloudSearchDomainClient::factory(array('base_url' => 'example.com'));
        $this->setExpectedException('BadMethodCallException');
        $client->setRegion('us-west-2');
    }

    public function testThrowsExceptionWhenAttemptingToMutateCredentials()
    {
        $client = CloudSearchDomainClient::factory(array('base_url' => 'example.com'));
        $this->setExpectedException('BadMethodCallException');
        $client->setCredentials(new Credentials('foo', 'bar'));
    }

    public function testSignsRequests()
    {
        $mock = new MockPlugin(array(new Response(200), new Response(200)));
        $config = array(
            Opt::BASE_URL    => 'foo.us-east-1.cloudsearch.amazonaws.com',
            Opt::VALIDATION  => false,
            Opt::CREDENTIALS => new Credentials('foo', 'bar'),
        );
        $getAuthorizationHeader = function(Event $event) use (&$auth) {
            $auth = (string) $event['request']->getHeader('Authorization');
        };

        $client1 = CloudSearchDomainClient::factory($config);
        $client1->addSubscriber($mock);
        $client1->getEventDispatcher()->addListener('request.before_send', $getAuthorizationHeader, -999);
        $client1->search();

        $this->assertNotEmpty($auth);

        $config[Opt::CREDENTIALS] = false;
        $client2 = CloudSearchDomainClient::factory($config);
        $client2->addSubscriber($mock);
        $client2->getEventDispatcher()->addListener('request.before_send', $getAuthorizationHeader, -999);
        $client2->search();

        $this->assertEmpty($auth);
    }
}
