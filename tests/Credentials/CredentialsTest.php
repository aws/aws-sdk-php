<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\Credentials;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Credentials\Credentials
 */
class CredentialsTest extends TestCase
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
}
