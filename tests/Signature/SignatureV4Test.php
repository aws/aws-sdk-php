<?php
namespace Aws\Test\Signature;

use Aws\Credentials\Credentials;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;

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
        $this->assertEquals('AddMe!', $signed->getHeader('X-Amz-Security-Token'));
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

    /**
     * @dataProvider testSuiteProvider
     */
    public function testSignsRequestsProperly($group)
    {
        // Create a request based on the '.req' file
        $requestString = file_get_contents($group['req']);
        $request = Utils::parseRequest($requestString);
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET);
        $signature = new SignatureV4('host', 'us-east-1');

        $contextFn = new \ReflectionMethod($signature, 'createContext');
        $contextFn->setAccessible(true);
        $parseFn = new \ReflectionMethod($signature, 'parseRequest');
        $parseFn->setAccessible(true);
        $parsed = $parseFn->invoke($signature, $request);
        $payloadFn = new \ReflectionMethod($signature, 'getPayload');
        $payloadFn->setAccessible(true);
        $payload = $payloadFn->invoke($signature, $request);
        $ctx = $contextFn->invoke($signature, $parsed, $payload);

        // Test that the canonical request is correct
        $this->assertEquals(
            str_replace("\r", '', file_get_contents($group['creq'])),
            $ctx['creq']
        );

        $signed = $signature->signRequest($request, $credentials);
        $this->assertEquals(
            str_replace("\r", '', file_get_contents($group['authz'])),
            $signed->getHeader('Authorization')
        );
    }

    /**
     * @return array
     */
    public function testSuiteProvider()
    {
        // Gather a list of files sorted by name
        $files = glob(__DIR__ . DIRECTORY_SEPARATOR
            . 'aws4_testsuite' . DIRECTORY_SEPARATOR . '*');

        // Skip the get-header-key-duplicate.* and
        // get-header-value-order.authz.* test files for now; they are believed
        // to be invalid tests. See https://github.com/aws/aws-sdk-php/issues/161
        $files = array_filter($files, function($file) {
            return ((strpos($file, 'get-header-key-duplicate.') === false) &&
                (strpos($file, 'get-header-value-order.'  ) === false));
        });
        sort($files);

        // Break the files up into groups of five for each test case
        $groups = $group = [];
        for ($i = 0, $c = count($files); $i < $c; $i++) {
            $types = explode('.', $files[$i]);
            $type = end($types);
            $group[$type] = $files[$i];
            if (count($group) == 5) {
                $groups[] = [$group];
                $group = [];
            }
        }

        return $groups;
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
        $url = $signature->createPresignedUrl($request, $credentials, 1386720000);
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
        $signature->createPresignedUrl($request, $credentials, 'December 31, 2013 00:00:00 UTC');
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
            'date' => 'today',
            'host' => 'foo.com',
            'x-amz-foo' => '123',
            'content-md5' => 'bogus'
        ]);
        $signed = $sig->signRequest($req, $creds);
        $this->assertContains('content-md5;date;host;x-amz-foo', $signed->getHeader('Authorization'));
    }
}
