<?php
namespace Aws\Test\CloudSearchDomain;

use Aws\CloudSearchDomain\CloudSearchDomainClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;

/**
 * @covers Aws\CloudSearchDomain\CloudSearchDomainClient
 */
class CloudSearchDomainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRequiresEndpoint()
    {
        new CloudSearchDomainClient([
            'service'   => 'cloudsearchdomain',
            'version'   => 'latest'
        ]);
    }

    public function testGetsRegionFromEndpoint()
    {
        $client = new CloudSearchDomainClient([
            'service'   => 'cloudsearchdomain',
            'endpoint'  => 'https://search-foo.us-west-2.cloudsearch.amazon.com',
            'signature' => 'v4',
            'version'   => 'latest'
        ]);
        $this->assertEquals('us-west-2', $client->getRegion());
    }

    public function testConvertGetToPost()
    {
        $request = new Request(
            'GET',
            'http://foo.com?foo=bar',
            [],
            ''
        );
        $request = CloudSearchDomainClient::convertGetToPost($request);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('application/x-www-form-urlencoded', $request->getHeaderLine('Content-Type'));
        $this->assertEquals(7, $request->getHeaderLine('Content-Length'));
        $this->assertEquals('foo=bar', $request->getBody());
        $this->assertSame('', $request->getUri()->getQuery());
    }
}
