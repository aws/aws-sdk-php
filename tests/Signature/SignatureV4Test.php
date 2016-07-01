<?php
namespace Aws\Test\Signature;

use Aws\Credentials\Credentials;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\NoSeekStream;

require_once __DIR__ . '/sig_hack.php';

/**
 * @covers Aws\Signature\SignatureV4
 */
class SignatureV4Test extends \PHPUnit_Framework_TestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';
    const DEFAULT_DATETIME = 'Mon, 09 Sep 2011 23:36:00 GMT';

    public function setup()
    {
        $_SERVER['aws_time'] = strtotime('December 5, 2013 00:00:00 UTC');
    }

    public function testReturnsRegionAndService()
    {
        $s = new SignatureV4('foo', 'bar');
        $this->assertEquals('foo', $this->readAttribute($s, 'service'));
        $this->assertEquals('bar', $this->readAttribute($s, 'region'));
    }

    public function testAddsSecurityTokenIfPresent()
    {
        $s = new SignatureV4('foo', 'bar');
        $c = new Credentials('a', 'b', 'AddMe!');
        $r = new Request('GET', 'http://httpbin.org');
        $signed = $s->signRequest($r, $c);
        $this->assertEquals('AddMe!', $signed->getHeaderLine('X-Amz-Security-Token'));
    }

    public function testSignsRequestsWithMultiValuedHeaders()
    {
        $s = new SignatureV4('foo', 'bar');
        $r = new Request('GET', 'http://httpbin.org', ['X-amz-Foo' => ['baz', '  bar ']]);
        $methA = new \ReflectionMethod($s, 'parseRequest');
        $methA->setAccessible(true);
        $reqArray = $methA->invoke($s, $r);
        $methB = new \ReflectionMethod($s, 'createContext');
        $methB->setAccessible(true);
        $result = $methB->invoke($s, $reqArray, '123');
        $this->assertEquals('host;x-amz-foo', $result['headers']);
        $this->assertEquals("GET\n/\n\nhost:httpbin.org\nx-amz-foo:bar,baz\n\nhost;x-amz-foo\n123", $result['creq']);
    }

    public function testUsesExistingSha256HashIfPresent()
    {
        $sig = new SignatureV4('foo', 'bar');
        $req = new Request('PUT', 'http://foo.com', [
            'x-amz-content-sha256' => '123'
        ]);
        $method = new \ReflectionMethod($sig, 'getPayload');
        $method->setAccessible(true);
        $this->assertSame('123', $method->invoke($sig, $req));
    }

    public function testMaintainsCappedCache()
    {
        $sig = new SignatureV4('foo', 'bar');
        // Hack the class so that it thinks it needs 3 more entries to be full
        $p = new \ReflectionProperty($sig, 'cacheSize');
        $p->setAccessible(true);
        $p->setValue($sig, 47);

        $request = new Request('GET', 'http://www.example.com');
        $credentials = new Credentials('fizz', 'buzz');
        $sig->signRequest($request, $credentials);
        $this->assertEquals(1, count($this->readAttribute($sig, 'cache')));

        $credentials = new Credentials('fizz', 'baz');
        $sig->signRequest($request, $credentials);
        $this->assertEquals(2, count($this->readAttribute($sig, 'cache')));

        $credentials = new Credentials('fizz', 'paz');
        $sig->signRequest($request, $credentials);
        $this->assertEquals(3, count($this->readAttribute($sig, 'cache')));

        $credentials = new Credentials('fizz', 'foobar');
        $sig->signRequest($request, $credentials);
        $this->assertEquals(1, count($this->readAttribute($sig, 'cache')));
    }

    private function getFixtures()
    {
        $request = new Request('GET', 'http://foo.com');
        $credentials = new Credentials('foo', 'bar');
        $signature = new SignatureV4('service', 'region');
        $ref = new \ReflectionMethod($signature, 'convertExpires');
        $ref->setAccessible(true);

        return array($request, $credentials, $signature, $ref);
    }

    public function testCreatesPresignedDatesFromDateTime()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature, $ref) = $this->getFixtures();
        $this->assertEquals(518400, $ref->invoke($signature, new \DateTime('December 11, 2013 00:00:00 UTC')));
    }

    public function testCreatesPresignedDatesFromUnixTimestamp()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature, $ref) = $this->getFixtures();
        $this->assertEquals(518400, $ref->invoke($signature, 1386720000));
    }

    public function testCreatesPresignedDateFromStrtotime()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature, $ref) = $this->getFixtures();
        $this->assertEquals(518400, $ref->invoke($signature, 'December 11, 2013 00:00:00 UTC'));
    }

    public function testAddsSecurityTokenIfPresentInPresigned()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature) = $this->getFixtures();
        $credentials = new Credentials('foo', 'bar', '123');
        $url = (string) $signature->presign($request, $credentials, 1386720000)->getUri();
        $this->assertContains('X-Amz-Security-Token=123', $url);
        $this->assertContains('X-Amz-Expires=518400', $url);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresSigV4DurationIsLessThanOneWeek()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature) = $this->getFixtures();
        $signature->presign($request, $credentials, 'December 31, 2013 00:00:00 UTC');
    }

    public function testPresignerDowncasesSignedHeaderNames()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature) = $this->getFixtures();
        $credentials = new Credentials('foo', 'bar', '123');
        $query = Psr7\parse_query(
            $signature->presign($request, $credentials, 1386720000)
                ->getUri()
                ->getQuery()
        );
        $this->assertArrayHasKey('X-Amz-SignedHeaders', $query);
        $this->assertSame(
            strtolower($query['X-Amz-SignedHeaders']),
            $query['X-Amz-SignedHeaders']
        );
    }

    public function testConvertsPostToGet()
    {
        $request = new Request(
            'POST',
            'http://foo.com',
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            'foo=bar&baz=bam'
        );
        $request = SignatureV4::convertPostToGet($request);
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('foo=bar&baz=bam', $request->getUri()->getQuery());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresMethodIsPost()
    {
        $request = new Request('PUT', 'http://foo.com');
        SignatureV4::convertPostToGet($request);
    }

    public function testSignSpecificHeaders()
    {
        $sig = new SignatureV4('foo', 'bar');
        $creds = new Credentials('a', 'b');
        $req = new Request('PUT', 'http://foo.com', [
            'x-amz-date' => 'today',
            'host' => 'foo.com',
            'x-amz-foo' => '123',
            'content-md5' => 'bogus'
        ]);
        $signed = $sig->signRequest($req, $creds);
        $this->assertContains('content-md5;host;x-amz-date;x-amz-foo', $signed->getHeaderLine('Authorization'));
    }

    /**
     * @expectedException \Aws\Exception\CouldNotCreateChecksumException
     */
    public function testEnsuresContentSha256CanBeCalculated()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $request = $request->withBody(new NoSeekStream(Psr7\stream_for('foo')));
        $signature->signRequest($request, $credentials);
    }

    /**
     * @expectedException \Aws\Exception\CouldNotCreateChecksumException
     */
    public function testEnsuresContentSha256CanBeCalculatedWhenSeekFails()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $stream = Psr7\FnStream::decorate(Psr7\stream_for('foo'), [
            'seek' => function () {
                throw new \Exception('Could not seek');
            }
        ]);
        $request = $request->withBody($stream);
        $signature->signRequest($request, $credentials);
    }

    public function testProvider()
    {
        return [
            // POST headers should be signed.
            [
                "POST / HTTP/1.1\r\nHost: host.foo.com\r\nx-AMZ-date: 20110909T233600Z\r\nZOO:zoobar\r\n\r\n",
                "POST / HTTP/1.1\r\nHost: host.foo.com\r\nZOO: zoobar\r\nX-Amz-Date: 20110909T233600Z\r\nAuthorization: AWS4-HMAC-SHA256 Credential=AKIDEXAMPLE/20110909/us-east-1/host/aws4_request, SignedHeaders=host;x-amz-date;zoo, Signature=b28a4d452e58edf8ff150a9518b6f4135c9960e4724dc3daab4d7ccc26e90b9b\r\n\r\n",
                "POST\n/\n\nhost:host.foo.com\nzoo:zoobar\n\nhost;zoo\ne3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
            ],
            // Changing the method should change the signature.
            [
                "GET / HTTP/1.1\r\nHost: host.foo.com\r\nx-AMZ-date: 20110909T233600Z\r\nZOO:zoobar\r\n\r\n",
                "GET / HTTP/1.1\r\nHost: host.foo.com\r\nZOO: zoobar\r\nX-Amz-Date: 20110909T233600Z\r\nAuthorization: AWS4-HMAC-SHA256 Credential=AKIDEXAMPLE/20110909/us-east-1/host/aws4_request, SignedHeaders=host;x-amz-date;zoo, Signature=287deb2c1249c9c415cb4b3ef74404629fcab56a8e9ec568bff88cf093196e8e\r\n\r\n",
                "GET\n/\n\nhost:host.foo.com\nzoo:zoobar\n\nhost;zoo\ne3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
            ],
            // Duplicate header values must be sorted.
            [
                "POST / HTTP/1.1\r\nHost: host.foo.com\r\nx-AMZ-date: 20110909T233600Z\r\np: z\r\np: a\r\np: p\r\np: a\r\n\r\n",
                "POST / HTTP/1.1\r\nHost: host.foo.com\r\np: z, a, p, a\r\nX-Amz-Date: 20110909T233600Z\r\nAuthorization: AWS4-HMAC-SHA256 Credential=AKIDEXAMPLE/20110909/us-east-1/host/aws4_request, SignedHeaders=host;p;x-amz-date, Signature=faca06aa6ae71c0a24116c9a61b01346e6d9d621001bac49d38a6fdb285649ec\r\n\r\n",
                "POST\n/\n\nhost:host.foo.com\np:a,a,p,z\n\nhost;p\ne3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
            ],
            // Request with space.
            [
                "GET /%20/foo HTTP/1.1\r\nHost: host.foo.com\r\n\r\n",
                "GET /%20/foo HTTP/1.1\r\nHost: host.foo.com\r\nX-Amz-Date: 20110909T233600Z\r\nAuthorization: AWS4-HMAC-SHA256 Credential=AKIDEXAMPLE/20110909/us-east-1/host/aws4_request, SignedHeaders=host;x-amz-date, Signature=948b2292a8bcb4510013741d64c5667f75d46dd6c4896ead5d669eb8264ebe1f\r\n\r\n",
                "GET\n/%2520/foo\n\nhost:host.foo.com\n\nhost\ne3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
            ],
            // Query order key case.
            [
                "GET /?foo=Zoo&foo=aha HTTP/1.1\r\nHost: host.foo.com\r\n\r\n",
                "GET /?foo=Zoo&foo=aha HTTP/1.1\r\nHost: host.foo.com\r\nX-Amz-Date: 20110909T233600Z\r\nAuthorization: AWS4-HMAC-SHA256 Credential=AKIDEXAMPLE/20110909/us-east-1/host/aws4_request, SignedHeaders=host;x-amz-date, Signature=f08b61bce9cc3d3e070423ae098d56d0242c77142c9d5fa5613f350cec4d1925\r\n\r\n",
                "GET\n/\nfoo=Zoo&foo=aha\nhost:host.foo.com\n\nhost\ne3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
            ],
            // Query order key
            [
                "GET /?a=foo&b=foo HTTP/1.1\r\nHost: host.foo.com\r\n\r\n",
                "GET /?a=foo&b=foo HTTP/1.1\r\nHost: host.foo.com\r\nX-Amz-Date: 20110909T233600Z\r\nAuthorization: AWS4-HMAC-SHA256 Credential=AKIDEXAMPLE/20110909/us-east-1/host/aws4_request, SignedHeaders=host;x-amz-date, Signature=1cfa3132ddd1b16d824aacef668c131d9096fe52e6d5718e20e43a7e47f616c6\r\n\r\n",
                "GET\n/\na=foo&b=foo\nhost:host.foo.com\n\nhost\ne3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
            ],
            // Query order value
            [
                "GET /?foo=b&foo=a HTTP/1.1\r\nHost: host.foo.com\r\n\r\n",
                "GET /?foo=b&foo=a HTTP/1.1\r\nHost: host.foo.com\r\nX-Amz-Date: 20110909T233600Z\r\nAuthorization: AWS4-HMAC-SHA256 Credential=AKIDEXAMPLE/20110909/us-east-1/host/aws4_request, SignedHeaders=host;x-amz-date, Signature=425abc77cf8f0539e6ce3bc0a593813b1a10d71adc9067ea2d8d61db38adf11e\r\n\r\n",
                "GET\n/\nfoo=a&foo=b\nhost:host.foo.com\n\nhost\ne3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
            ],
            // POST with body
            [
                "POST / HTTP/1.1\r\nHost: host.foo.com\r\nContent-Length: 4\r\n\r\nTest",
                "POST / HTTP/1.1\r\nHost: host.foo.com\r\nContent-Length: 4\r\nX-Amz-Date: 20110909T233600Z\r\nAuthorization: AWS4-HMAC-SHA256 Credential=AKIDEXAMPLE/20110909/us-east-1/host/aws4_request, SignedHeaders=host;x-amz-date, Signature=277a7dcbb942ea6290173548feee1df1a7550354dc83e22daf5ffea86a44e0db\r\n\r\nTest",
                "POST\n/\n\nhost:host.foo.com\n\nhost\n532eaabd9574880dbf76b9b8cc00832c20a6ec113d682299550d7a6e0f345e25"
            ],
        ];
    }

    /**
     * @dataProvider testProvider
     */
    public function testSignsRequests($req, $sreq, $creq)
    {
        $_SERVER['aws_time'] = '20110909T233600Z';
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET);
        $signature = new SignatureV4('host', 'us-east-1');
        $request = Psr7\parse_request($req);
        $contextFn = new \ReflectionMethod($signature, 'createContext');
        $contextFn->setAccessible(true);
        $parseFn = new \ReflectionMethod($signature, 'parseRequest');
        $parseFn->setAccessible(true);
        $parsed = $parseFn->invoke($signature, $request);
        $payloadFn = new \ReflectionMethod($signature, 'getPayload');
        $payloadFn->setAccessible(true);
        $payload = $payloadFn->invoke($signature, $request);
        $ctx = $contextFn->invoke($signature, $parsed, $payload);
        $this->assertEquals($creq, $ctx['creq']);
        $this->assertSame($sreq, Psr7\str($signature->signRequest($request, $credentials)));
    }
}
