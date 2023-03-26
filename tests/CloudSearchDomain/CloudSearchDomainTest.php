<?php
namespace Aws\Test\CloudSearchDomain;

use Aws\CloudSearchDomain\CloudSearchDomainClient;
use GuzzleHttp\Psr7\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\CloudSearchDomain\CloudSearchDomainClient
 */
class CloudSearchDomainTest extends TestCase
{
    public function testRequiresEndpoint()
    {
        $this->expectException(\InvalidArgumentException::class);
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
        $this->assertSame('us-west-2', $client->getRegion());
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
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('application/x-www-form-urlencoded', $request->getHeaderLine('Content-Type'));
        $this->assertSame('7', $request->getHeaderLine('Content-Length'));
        $this->assertSame('foo=bar', (string)$request->getBody());
        $this->assertSame('', $request->getUri()->getQuery());
    }
}
