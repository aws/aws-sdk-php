<?php
namespace Aws\Test\CloudFront;

use Aws\CloudFront\CloudFrontClient;
use Aws\CloudFront\UrlSigner;
use GuzzleHttp\Url;

/**
 * @covers Aws\CloudFront\UrlSigner
 */
class UrlSignerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        foreach (['CF_PRIVATE_KEY', 'CF_KEY_PAIR_ID'] as $k) {
            if (!isset($_SERVER[$k]) || $_SERVER[$k] == 'change_me') {
                $this->markTestSkipped('$_SERVER[\'' . $k . '\'] not set in '
                    . 'phpunit.xml');
            }
        }
    }

    public function testCreatesUrlSignersForHttp()
    {
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $client = CloudFrontClient::factory(['region' => 'us-west-2']);
        $ts = time() + 1000;
        $key = $_SERVER['CF_PRIVATE_KEY'];
        $kp = $_SERVER['CF_KEY_PAIR_ID'];

        $url = $client->getSignedUrl([
            'url'         => 'http://abc.cloudfront.net/images/image.jpg?color=red',
            'expires'     => $ts,
            'private_key' => $key,
            'key_pair_id' => $kp
        ]);

        $urlObject = Url::fromString($url);
        $this->assertStringStartsWith(
            "http://abc.cloudfront.net/images/image.jpg?color=red&Expires={$ts}&Signature=",
            $url
        );
        $this->assertContains("Key-Pair-Id={$kp}", $url);
        $signature = $urlObject->getQuery('Signature');
        $this->assertNotContains('?', $signature);
        $this->assertNotContains('=', $signature);
        $this->assertNotContains('/', $signature);
        $this->assertNotContains('&', $signature);
        $this->assertNotContains('+', $signature);
    }

    public function testCreatesUrlSignersWithCustomPolicy()
    {
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $client = CloudFrontClient::factory(['region' => 'us-west-2']);
        $url = $client->getSignedUrl(array(
            'url'    => 'http://abc.cloudfront.net/images/image.jpg',
            'policy' => '{}',
            'private_key' => $_SERVER['CF_PRIVATE_KEY'],
            'key_pair_id' => $_SERVER['CF_KEY_PAIR_ID']
        ));
        $policy = Url::fromString($url)->getQuery()->get('Policy');
        $this->assertRegExp('/^[0-9a-zA-Z-_~]+$/', $policy);
    }

    public function testCreatesUrlSignersForRtmp()
    {
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $client = CloudFrontClient::factory(['region' => 'us-west-2']);
        $ts = time() + 1000;
        $kp = $_SERVER['CF_KEY_PAIR_ID'];
        $url = $client->getSignedUrl(array(
            'url'         => 'rtmp://foo.cloudfront.net/test.mp4?a=b',
            'expires'     => $ts,
            'private_key' => $_SERVER['CF_PRIVATE_KEY'],
            'key_pair_id' => $kp
        ));
        $this->assertStringStartsWith("test.mp4?a=b&Expires={$ts}&Signature=", $url);
        $this->assertContains("Key-Pair-Id={$kp}", $url);
    }

    public function testCreatesCannedUrlSignersForRtmpWhileStrippingFileExtension()
    {
        $s = new UrlSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $m = new \ReflectionMethod($s, 'createCannedPolicy');
        $m->setAccessible(true);
        $ts = time() + 1000;
        // Try with no leading path
        $result = $m->invoke($s, 'rtmp', 'rtmp://foo.cloudfront.net/test.mp4', $ts);
        $this->assertEquals(
            '{"Statement":[{"Resource":"test.mp4","Condition":{"DateLessThan":{"AWS:EpochTime":' . $ts . '}}}]}',
            $result
        );
        $this->assertInternalType('array', json_decode($result, true));
        // Try with nested path
        $result = $m->invoke($s, 'rtmp', 'rtmp://foo.cloudfront.net/videos/test.mp4', $ts);
        $this->assertEquals(
            '{"Statement":[{"Resource":"videos/test.mp4","Condition":{"DateLessThan":{"AWS:EpochTime":' . $ts . '}}}]}',
            $result
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage An expires option is required when using a canned policy
     */
    public function testEnsuresExpiresIsSetWhenUsingCannedPolicy()
    {
        $s = new UrlSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $s->getUrlSigner('http://foo/bar');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid URI scheme
     */
    public function testEnsuresUriSchemeIsValid()
    {
        $s = new UrlSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $s->getUrlSigner('foo://bar.com', '+10 minutes');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid URL: bar.com
     */
    public function testEnsuresUriSchemeIsPresent()
    {
        $s = new UrlSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $s->getUrlSigner('bar.com');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage PK file not found
     */
    public function testEnsuresPkFileExists()
    {
        $s = new UrlSigner('a', 'b');
        $s->getUrlSigner('http://bar.com');
    }
}
