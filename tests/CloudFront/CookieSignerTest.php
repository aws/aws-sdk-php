<?php
namespace Aws\Test\CloudFront;

use Aws\CloudFront\CookieSigner;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class CookieSignerTest extends TestCase
{
    protected $key;
    protected $kp;

    public function set_up()
    {
        openssl_pkey_export(openssl_pkey_new(),$this->key);
        $this->kp  = 'test';
    }

    public function testEnsuresUriSchemeIsPresent()
    {
        $this->expectExceptionMessage("Invalid or missing URI scheme");
        $this->expectException(\InvalidArgumentException::class);
        $s = new CookieSigner('a', $this->key);
        $s->getSignedCookie('bar.com');
    }

    public function testEnsuresUriSchemeIsValid()
    {
        $this->expectExceptionMessage("Invalid or missing URI scheme");
        $this->expectException(\InvalidArgumentException::class);
        $s = new CookieSigner('a', $this->key);
        $s->getSignedCookie('foo://bar.com', strtotime('+10 minutes'));
    }

    public function testAllowsHttpScheme()
    {
        $s = new CookieSigner('a', $this->key);
        $cookie = $s->getSignedCookie('http://bar.com', strtotime('+10 minutes'));

        $this->assertNotEmpty($cookie);
    }

    public function testAllowsHttpsScheme()
    {
        $s = new CookieSigner('a', $this->key);
        $cookie = $s->getSignedCookie('https://bar.com', strtotime('+10 minutes'));

        $this->assertNotEmpty($cookie);
    }

    public function testAllowsWildcardScheme()
    {
        $s = new CookieSigner('a', $this->key);
        $cookie = $s->getSignedCookie(
            'http*://bar.com/*',
            null,
            '{"Statement":[{"Resource":"http*://bar.com/*","Condition":{"DateLessThan":{"AWS:EpochTime":'. strtotime('+10 minutes') . '}}}]}'
        );

        $this->assertNotEmpty($cookie);
    }

    public function testReturnsHashWithCookieParameterNamesForCannedPolicy()
    {
        $s = new CookieSigner('a', $this->key);
        $cookie = $s->getSignedCookie('https://bar.com', strtotime('+10 minutes'));

        $this->assertArrayHasKey('CloudFront-Signature', $cookie);
        $this->assertArrayHasKey('CloudFront-Key-Pair-Id', $cookie);
        $this->assertArrayHasKey('CloudFront-Expires', $cookie);
        $this->assertArrayNotHasKey('CloudFront-Policy', $cookie);
    }

    public function testReturnsHashWithCookieParameterNamesForCustomPolicy()
    {
        $s = new CookieSigner('a', $this->key);
        $cookie = $s->getSignedCookie(
            'http*://bar.com/*',
            null,
            '{"Statement":[{"Resource":"http*://bar.com/*","Condition":{"DateLessThan":{"AWS:EpochTime":'. strtotime('+10 minutes') . '}}}]}'
        );

        $this->assertArrayHasKey('CloudFront-Signature', $cookie);
        $this->assertArrayHasKey('CloudFront-Key-Pair-Id', $cookie);
        $this->assertArrayNotHasKey('CloudFront-Expires', $cookie);
        $this->assertArrayHasKey('CloudFront-Policy', $cookie);
    }
}
