<?php
namespace Aws\Test\CloudFront;

use Aws\CloudFront\CookieSigner;
use Aws\CloudFront\Policy;
use PHPUnit\Framework\TestCase;

class CookieSignerTest extends TestCase
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

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid or missing URI scheme
     */
    public function testEnsuresUriSchemeIsPresent()
    {
        $s = new CookieSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $s->getSignedCookie('bar.com');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid or missing URI scheme
     */
    public function testEnsuresUriSchemeIsValid()
    {
        $s = new CookieSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $s->getSignedCookie('foo://bar.com', strtotime('+10 minutes'));
    }

    public function testAllowsHttpScheme()
    {
        $s = new CookieSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $cookie = $s->getSignedCookie('http://bar.com', strtotime('+10 minutes'));

        $this->assertNotEmpty($cookie);
    }

    public function testAllowsHttpsScheme()
    {
        $s = new CookieSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $cookie = $s->getSignedCookie('https://bar.com', strtotime('+10 minutes'));

        $this->assertNotEmpty($cookie);
    }

    public function testAllowsWildcardScheme()
    {
        $s = new CookieSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $cookie = $s->getSignedCookie(
            'http*://bar.com/*',
            null,
            '{"Statement":[{"Resource":"http*://bar.com/*","Condition":{"DateLessThan":{"AWS:EpochTime":'. strtotime('+10 minutes') . '}}}]}'
        );

        $this->assertNotEmpty($cookie);
    }

    public function testReturnsHashWithCookieParameterNamesForCannedPolicy()
    {
        $s = new CookieSigner('a', $_SERVER['CF_PRIVATE_KEY']);
        $cookie = $s->getSignedCookie('https://bar.com', strtotime('+10 minutes'));

        $this->assertArrayHasKey('CloudFront-Signature', $cookie);
        $this->assertArrayHasKey('CloudFront-Key-Pair-Id', $cookie);
        $this->assertArrayHasKey('CloudFront-Expires', $cookie);
        $this->assertArrayNotHasKey('CloudFront-Policy', $cookie);
    }

    public function testReturnsHashWithCookieParameterNamesForCustomPolicy()
    {
        $s = new CookieSigner('a', $_SERVER['CF_PRIVATE_KEY']);
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
