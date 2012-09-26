<?php

namespace Aws\Tests\CloudFront;

use Aws\CloudFront\CloudFrontSignature;
use Aws\Common\Credentials\Credentials;
use Guzzle\Http\Message\Request;

/**
 * @covers Aws\CloudFront\CloudFrontSignature
 */
class CloudFrontSignatureTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testSignsWithDateHeader()
    {
        $request = new Request('GET', 'http://www.foo.com', array('Date' => 'Thu, 17 May 2012 17:08:48 GMT'));
        $credentials = new Credentials('foo', 'bar');
        $signature = new CloudFrontSignature();
        $signature->signRequest($request, $credentials);
        $this->assertEquals('AWS foo:H/oAmf/UKMC13D986NHtWlcWeqg=', (string) $request->getHeader('Authorization'));
    }

    public function testSignsWithXAmzDateHeader()
    {
        $request = new Request('GET', 'http://www.foo.com', array('x-amz-date' => 'Thu, 17 May 2012 17:08:48 GMT'));
        $credentials = new Credentials('foo', 'bar');
        $signature = new CloudFrontSignature();
        $signature->signRequest($request, $credentials);
        $this->assertEquals('AWS foo:H/oAmf/UKMC13D986NHtWlcWeqg=', (string) $request->getHeader('Authorization'));
    }

    public function testSignsWithInjectedDateHeader()
    {
        $request = new Request('GET', 'http://www.foo.com');
        $credentials = new Credentials('foo', 'bar');
        $signature = new CloudFrontSignature();
        $signature->signRequest($request, $credentials);
        $this->assertTrue($request->hasHeader('Date'));
    }
}
