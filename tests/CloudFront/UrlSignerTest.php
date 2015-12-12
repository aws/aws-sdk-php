<?php
namespace Aws\Test\CloudFront;

use Aws\CloudFront\CloudFrontClient;
use Aws\CloudFront\UrlSigner;
use GuzzleHttp\Psr7\Uri;

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
        $client = CloudFrontClient::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $ts = time() + 1000;
        $key = $_SERVER['CF_PRIVATE_KEY'];
        $kp = $_SERVER['CF_KEY_PAIR_ID'];

        $url = $client->getSignedUrl([
            'url'         => 'http://abc.cloudfront.net/images/image.jpg?color=red',
            'expires'     => $ts,
            'private_key' => $key,
            'key_pair_id' => $kp
        ]);

        $this->assertContains("Key-Pair-Id={$kp}", $url);
        $this->assertStringStartsWith(
            "http://abc.cloudfront.net/images/image.jpg?color=red&Expires={$ts}&Signature=",
            $url
        );
        $urlObject = new Uri($url);
        $query = \GuzzleHttp\Psr7\parse_query($urlObject->getQuery());
        $signature = $query['Signature'];
        $this->assertNotContains('?', $signature);
        $this->assertNotContains('=', $signature);
        $this->assertNotContains('/', $signature);
        $this->assertNotContains('&', $signature);
        $this->assertNotContains('+', $signature);
    }

    public function testCreatesUrlSignersWithSpecialCharacters()
    {
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $client = CloudFrontClient::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $ts = time() + 1000;
        $key = $_SERVER['CF_PRIVATE_KEY'];
        $kp = $_SERVER['CF_KEY_PAIR_ID'];

        $invalidUri = 'http://abc.cloudfront.net/images/éüàçµñåœŒ.jpg?query key=query value';
        $uri = new Uri($invalidUri);
        $this->assertNotEquals($invalidUri, (string) $uri);

        $url = $client->getSignedUrl([
            'url'         => $invalidUri,
            'expires'     => $ts,
            'private_key' => $key,
            'key_pair_id' => $kp
        ]);

        $this->assertContains("Key-Pair-Id={$kp}", $url);
        $this->assertContains((string) $uri, $url);
        $this->assertStringStartsWith(
            "{$uri}&Expires={$ts}&Signature=",
            $url
        );
    }

    public function testCreatesUrlSignersWithCustomPolicy()
    {
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $client = CloudFrontClient::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $url = $client->getSignedUrl(array(
            'url'    => 'http://abc.cloudfront.net/images/image.jpg',
            'policy' => '{}',
            'private_key' => $_SERVER['CF_PRIVATE_KEY'],
            'key_pair_id' => $_SERVER['CF_KEY_PAIR_ID']
        ));
        $policy = (new Uri($url))->getQuery();
        $this->assertRegExp('/Policy=[0-9a-zA-Z-_~]+/', $policy);
    }

    public function testCreatesUrlSignersForRtmp()
    {
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $client = CloudFrontClient::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
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

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid URI scheme
     */
    public function testEnsuresUriSchemeIsValid()
    {
        $s = new UrlSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $s->getSignedUrl('foo://bar.com', '+10 minutes');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid URL: bar.com
     */
    public function testEnsuresUriSchemeIsPresent()
    {
        $s = new UrlSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $s->getSignedUrl('bar.com');
    }

    /**
     * @dataProvider urlAndResourceProvider
     *
     * @param string $url
     * @param string $resource
     */
    public function testIsolatesResourceIUrls($url, $resource)
    {
        $s = new UrlSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $m = new \ReflectionMethod(get_class($s), 'createResource');
        $m->setAccessible(true);

        $scheme = parse_url($url)['scheme'];
        $this->assertSame($resource, $m->invoke($s, $scheme, $url));
    }

    public function urlAndResourceProvider()
    {
        return [
            ['rtmp://foo.cloudfront.net/videos/test.mp4', 'videos/test.mp4'],
            ['rtmp://foo.cloudfront.net/test.mp4', 'test.mp4'],
            array_fill(0, 2, 'https://aws.amazon.com/something.html'),
            array_fill(0, 2, 'http://www.foo.com/bar/baz.quux'),
        ];
    }
}
