<?php
namespace Aws\Test\Signature;

use Aws\Credentials\Credentials;
use Aws\Signature\S3SignatureV4;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Stream\Stream;

require __DIR__ . '/sig_hack.php';

/**
 * @covers Aws\Signature\S3SignatureV4
 */
class S3SignatureV4Test extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        $_SERVER['aws_time'] = strtotime('December 5, 2013 00:00:00 UTC');
    }

    private function getFixtures()
    {
        $request = new Request('GET', 'http://foo.com');
        $credentials = new Credentials('foo', 'bar');
        $signature = new S3SignatureV4('service', 'region');

        return array($request, $credentials, $signature);
    }

    public function testAlwaysAddsContentSha256()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $signature->signRequest($request, $credentials);
        $this->assertEquals(
            hash('sha256', ''),
            $request->getHeader('x-amz-content-sha256')
        );
    }

    public function testAddsContentSha256WhenBodyIsPresent()
    {
        $request = new Request('PUT', 'http://foo.com');
        $request->setBody(Stream::factory('foo'));
        $credentials = new Credentials('foo', 'bar');
        $signature = new S3SignatureV4('service', 'region');
        $signature->signRequest($request, $credentials);
        $this->assertEquals(
            hash('sha256', 'foo'),
            $request->getHeader('x-amz-content-sha256')
        );
    }

    public function testDoesNotRemoveDotSegments()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $request->setPath('/.././foo');
        $signature->signRequest($request, $credentials);
        $context = $request->getConfig()->get('aws.signature');
        $this->assertStringStartsWith(
            "GET\n/.././foo",
            $context['creq']
        );
    }

    public function testCreatesPresignedDatesFromDateTime()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $url = $signature->createPresignedUrl(
            $request,
            $credentials,
            new \DateTime('December 11, 2013 00:00:00 UTC')
        );
        $this->assertContains('X-Amz-Expires=518400', $url);
    }

    public function testCreatesPresignedDatesFromUnixTimestamp()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $url = $signature->createPresignedUrl(
            $request,
            $credentials,
            1386720000
        );
        $this->assertContains('X-Amz-Expires=518400', $url);
    }

    public function testCreatesPresignedDateFromStrtotime()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $url = $signature->createPresignedUrl(
            $request,
            $credentials,
            'December 11, 2013 00:00:00 UTC'
        );
        $this->assertContains('X-Amz-Expires=518400', $url);
    }

    public function testAddsSecurityTokenIfPresent()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $credentials = new Credentials(
            $credentials->getAccessKeyId(),
            $credentials->getSecretKey(),
            '123'
        );
        $url = $signature->createPresignedUrl(
            $request,
            $credentials,
            1386720000
        );
        $this->assertContains('X-Amz-Security-Token=123', $url);
        $this->assertContains('X-Amz-Expires=518400', $url);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresSigV4DurationIsLessThanOneWeek()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $signature->createPresignedUrl(
            $request,
            $credentials,
            'December 31, 2026 00:00:00 UTC'
        );
    }
}
