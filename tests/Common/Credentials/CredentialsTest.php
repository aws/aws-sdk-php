<?php
namespace Aws\Test\Common\Credentials;

use Aws\Common\Credentials\Credentials;

/**
 * @covers Aws\Common\Credentials\Credentials
 */
class CredentialsTest extends \PHPUnit_Framework_TestCase
{
    public function testHasGetters()
    {
        $exp = time() + 500;
        $creds = new Credentials('foo', 'baz', 'tok', $exp);
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        $this->assertEquals($exp, $creds->getExpiration());
        $this->assertEquals([
            'key'     => 'foo',
            'secret'  => 'baz',
            'token'   => 'tok',
            'expires' => $exp
        ], $creds->toArray());
    }

    public function testCreatesFromArray()
    {
        $exp = time() + 500;
        $creds = Credentials::factory([
            'key'     => 'foo',
            'secret'  => 'baz',
            'token'   => 'tok',
            'expires' => $exp
        ]);
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        $this->assertEquals($exp, $creds->getExpiration());
    }

    public function testDeterminesIfExpired()
    {
        $this->assertFalse((new Credentials('foo', 'baz'))->isExpired());
        $this->assertFalse(
            (new Credentials('foo', 'baz', 'tok', time() + 100))->isExpired()
        );
        $this->assertTrue(
            (new Credentials('foo', 'baz', 'tok', time() - 1000))->isExpired()
        );
    }

    public function testLoadsFromDefaultChainIfNeeded()
    {
        $key = getenv(Credentials::ENV_KEY);
        $secret = getenv(Credentials::ENV_SECRET);
        putenv(Credentials::ENV_KEY . '=foo');
        putenv(Credentials::ENV_SECRET . '=bar');
        $c = Credentials::factory();
        $this->assertInstanceOf('Aws\Common\Credentials\CredentialsInterface', $c);
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('bar', $c->getSecretKey());
        putenv(Credentials::ENV_KEY . "=$key");
        putenv(Credentials::ENV_SECRET . "=$secret");
    }
}
