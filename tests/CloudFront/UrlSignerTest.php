<?php

namespace Aws\Test\CloudFront;

use Aws\CloudFront\CloudFrontClient;
use Aws\CloudFront\UrlSigner;
use GuzzleHttp\Psr7\Uri;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\CloudFront\UrlSigner
 */
class UrlSignerTest extends TestCase
{

    protected $key;
    protected $kp;

    public function set_up()
    {
        openssl_pkey_export(openssl_pkey_new(),$this->key);
        $this->kp  = 'test';
    }

    public function testCreatesUrlSignersForHttp()
    {
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $client = CloudFrontClient::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $ts = time() + 1000;

        $url = $client->getSignedUrl([
            'url'         => 'http://abc.cloudfront.net/images/image.jpg?color=red',
            'expires'     => $ts,
            'private_key' => $this->key,
            'key_pair_id' => $this->kp
        ]);

        $this->assertStringContainsString("Key-Pair-Id={$this->kp}", $url);
        $this->assertStringStartsWith(
            "http://abc.cloudfront.net/images/image.jpg?color=red&Expires={$ts}&Signature=",
            $url
        );
        $urlObject = new Uri($url);
        $query = \GuzzleHttp\Psr7\Query::parse($urlObject->getQuery());
        $signature = $query['Signature'];
        $this->assertStringNotContainsString('?', $signature);
        $this->assertStringNotContainsString('=', $signature);
        $this->assertStringNotContainsString('/', $signature);
        $this->assertStringNotContainsString('&', $signature);
        $this->assertStringNotContainsString('+', $signature);
    }

    public function testCreatesUrlSignersWithSpecialCharacters()
    {
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $client = CloudFrontClient::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $ts = time() + 1000;

        $invalidUri = 'http://abc.cloudfront.net/images/éüàçµñåœŒ.jpg?query key=query value';
        $uri = new Uri($invalidUri);
        $this->assertNotEquals($invalidUri, (string) $uri);

        $url = $client->getSignedUrl([
            'url'         => $invalidUri,
            'expires'     => $ts,
            'private_key' => $this->key,
            'key_pair_id' => $this->kp
        ]);

        $this->assertStringContainsString("Key-Pair-Id={$this->kp}", $url);
        $this->assertStringContainsString((string) $uri, $url);
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
            'url' => 'http://abc.cloudfront.net/images/image.jpg',
            'policy' => '{}',
            'private_key' => $this->key,
            'key_pair_id' => $this->kp
        ));
        $policy = (new Uri($url))->getQuery();
        $this->assertMatchesRegularExpression('/Policy=[0-9a-zA-Z-_~]+/', $policy);
    }

    public function testCreatesUrlSignersForRtmp()
    {
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $client = CloudFrontClient::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $ts     = time() + 1000;
        $url    = $client->getSignedUrl(array(
            'url'         => 'rtmp://foo.cloudfront.net/test.mp4?a=b',
            'expires'     => $ts,
            'private_key' => $this->key,
            'key_pair_id' => $this->kp
        ));
        $this->assertStringStartsWith("test.mp4?a=b&Expires={$ts}&Signature=", $url);
        $this->assertStringContainsString("Key-Pair-Id={$this->kp}", $url);
    }

    public function testEnsuresUriSchemeIsValid()
    {
        $this->expectExceptionMessage("Invalid URI scheme");
        $this->expectException(\InvalidArgumentException::class);
        $s = new UrlSigner('a', $this->key);
        $s->getSignedUrl('foo://bar.com', strtotime('+10 minutes'));
    }

    public function testEnsuresUriSchemeIsPresent()
    {
        $this->expectExceptionMessage("Invalid URL: bar.com");
        $this->expectException(\InvalidArgumentException::class);
        $s = new UrlSigner('a', $this->key);
        $s->getSignedUrl('bar.com');
    }

    /**
     * @dataProvider urlAndResourceProvider
     *
     * @param  string  $url
     * @param  string  $resource
     */
    public function testIsolatesResourceIUrls($url, $resource)
    {
        $s = new UrlSigner('a', $this->key);
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
