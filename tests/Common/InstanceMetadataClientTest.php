<?php
namespace Aws\Test\Common;

use Aws\Common\InstanceMetadataClient;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\History;
use GuzzleHttp\Subscriber\Mock;

/**
 * @covers Aws\Common\InstanceMetadataClient
 */
class InstanceMetadataClientTest extends \PHPUnit_Framework_TestCase
{
    public function testDoesNotRequireAClient()
    {
        $c = new InstanceMetadataClient();
        $this->assertNotNull($this->readAttribute($c, 'client'));
    }

    public function testSendsRequestsWithClient()
    {
        $client = $this->getMockBuilder('GuzzleHttp\ClientInterface')
            ->setMethods(['get'])
            ->getMockForAbstractClass();

        $client->expects($this->once())
            ->method('get')
            ->with('/foo')
            ->will($this->returnValue('foo'));

        $c = new InstanceMetadataClient($client);
        $c->get('/foo');
    }

    public function testRetrievesProfile()
    {
        $client = $this->getMockBuilder('GuzzleHttp\ClientInterface')
            ->setMethods(['get'])
            ->getMockForAbstractClass();

        $client->expects($this->once())
            ->method('get')
            ->with('meta-data/iam/security-credentials/')
            ->will($this->returnValue(
                new Response(200, [], Stream::factory('foo'))
            ));

        $c = new InstanceMetadataClient($client);
        $this->assertEquals('foo', $c->getInstanceProfile());
    }

    public function testRetrievesCredentialsInformation()
    {
        $client = new Client();
        $mock = new Mock([
            "HTTP/1.1 200 OK\r\n\r\nfoo",
            "HTTP/1.1 200 OK\r\n\r\n[1]"
        ]);
        $history = new History();
        $client->getEmitter()->attach($mock);
        $client->getEmitter()->attach($history);
        $c = new InstanceMetadataClient($client);
        $creds = $c->getInstanceProfileCredentials();
        $this->assertEquals([1], $creds);
        $this->assertCount(2, $history);
        $this->assertCount(0, $mock);
    }
}
