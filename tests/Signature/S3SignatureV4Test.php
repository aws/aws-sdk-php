<?php
namespace Aws\Test\Signature;

use Aws\Credentials\Credentials;
use Aws\Signature\S3SignatureV4;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use GuzzleHttp\Psr7\Request;

require_once __DIR__ . '/sig_hack.php';
/**
 * @covers Aws\Signature\S3SignatureV4
 */
class S3SignatureV4Test extends TestCase
{
    public static function set_up_before_class()
    {
        $_SERVER['aws_time'] = strtotime('December 5, 2013 00:00:00 UTC');
    }

    public static function tear_down_after_class()
    {
        unset($_SERVER['aws_time']);
    }

    private function getFixtures()
    {
        $request = new Request('GET', 'http://foo.com');
        $credentials = new Credentials('foo', 'bar');
        $signature = new S3SignatureV4('service', 'region');
        return [$request, $credentials, $signature];
    }

    public function testAlwaysAddsContentSha256()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $result = $signature->signRequest($request, $credentials);
        $this->assertSame(
            hash('sha256', ''),
            $result->getHeaderLine('x-amz-content-sha256')
        );
    }

    public function testAddsContentSha256WhenBodyIsPresent()
    {
        $request = new Request('PUT', 'http://foo.com', [], 'foo');
        $credentials = new Credentials('foo', 'bar');
        $signature = new S3SignatureV4('service', 'region');
        $result = $signature->signRequest($request, $credentials);
        $this->assertSame(
            hash('sha256', 'foo'),
            $result->getHeaderLine('x-amz-content-sha256')
        );
    }

    public function testDoesNotRemoveDotSegments()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $uri = $request->getUri()->withPath('/.././foo');
        $request = $request->withUri($uri);
        $p = new \ReflectionMethod($signature, 'parseRequest');
        $p->setAccessible(true);
        $parsed = $p->invoke($signature, $request);
        $meth = new \ReflectionMethod($signature, 'createContext');
        $meth->setAccessible(true);
        $ctx = $meth->invoke($signature, $parsed, 'foo');
        $this->assertStringStartsWith(
            "GET\n/.././foo",
            $ctx['creq']
        );
    }

    public function testDoesNotRemoveMultiplePrecedingSlashes()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $uri = $request->getUri()->withPath('//foo');
        $request = $request->withUri($uri);
        $p = new \ReflectionMethod($signature, 'parseRequest');
        $p->setAccessible(true);
        $parsed = $p->invoke($signature, $request);
        $meth = new \ReflectionMethod($signature, 'createContext');
        $meth->setAccessible(true);
        $ctx = $meth->invoke($signature, $parsed, 'foo');
        $this->assertStringStartsWith(
            "GET\n//foo",
            $ctx['creq']
        );
    }

    public function testCreatesPresignedDatesFromDateTime()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $url = (string) $signature->presign(
            $request,
            $credentials,
            new \DateTime('December 11, 2013 00:00:00 UTC')
        )->getUri();
        $this->assertStringContainsString('X-Amz-Expires=518400', $url);
    }

    public function testCreatesPresignedDatesFromUnixTimestamp()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $url = (string) $signature->presign(
            $request,
            $credentials,
            1386720000
        )->getUri();
        $this->assertStringContainsString('X-Amz-Expires=518400', $url);
    }

    public function testCreatesPresignedDateFromStrtotime()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $url = (string) $signature->presign(
            $request,
            $credentials,
            'December 11, 2013 00:00:00 UTC'
        )->getUri();
        $this->assertStringContainsString('X-Amz-Expires=518400', $url);
    }

    public function testCreatesPresignedDateFromStrtotimeRelativeTimeBase()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $url = (string) $signature->presign(
            $request,
            $credentials,
            '+6 days',
            ['start_time' => $_SERVER['aws_time']]
        )->getUri();
        $this->assertStringContainsString('X-Amz-Expires=518400', $url);
    }

    public function testAddsSecurityTokenIfPresent()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $credentials = new Credentials(
            $credentials->getAccessKeyId(),
            $credentials->getSecretKey(),
            '123'
        );
        $url = (string) $signature->presign(
            $request,
            $credentials,
            1386720000
        )->getUri();
        $this->assertStringContainsString('X-Amz-Security-Token=123', $url);
        $this->assertStringContainsString('X-Amz-Expires=518400', $url);
    }

    public function testUsesStartDateIfSpecified()
    {
        $options = ['start_time' => strtotime('December 5, 2013 00:00:00 UTC')];
        unset($_SERVER['aws_time']);

        list($request, $credentials, $signature) = $this->getFixtures();
        $credentials = new Credentials('foo', 'bar', '123');
        $url = (string) $signature->presign($request, $credentials, 1386720000, $options)->getUri();
        $this->assertStringContainsString('X-Amz-Date=20131205T000000Z', $url);
        $this->assertStringContainsString('X-Amz-Expires=518400', $url);
    }

    public function testEnsuresSigV4DurationIsLessThanOneWeek()
    {
        $this->expectException(\InvalidArgumentException::class);
        list($request, $credentials, $signature) = $this->getFixtures();
        $signature->presign(
            $request,
            $credentials,
            'December 31, 2026 00:00:00 UTC'
        )->getUri();
    }
}
