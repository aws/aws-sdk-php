<?php
namespace Aws\Test\Token;

use Aws\Identity\BearerTokenIdentity;
use Aws\Identity\BearerTokenIdentityInterface;
use Aws\Token\Token;
use Aws\Identity\IdentityInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Token\Token
 */
class TokenTest extends TestCase
{
    public function testHasGetters()
    {
        $exp = time() + 500;
        $token = new Token('foo', $exp);
        $this->assertSame('foo', $token->getToken());
        $this->assertSame($exp, $token->getExpiration());
        $this->assertEquals([
            'token'     => 'foo',
            'expires' => $exp,
            'source' => null
        ], $token->toArray());
    }

    public function testDeterminesIfExpired()
    {
        $this->assertFalse((new Token('foo'))->isExpired());
        $this->assertFalse(
            (new Token('foo', time() + 100))->isExpired()
        );
        $this->assertTrue(
            (new Token('foo', time() - 1000))->isExpired()
        );
    }

    public function testSerialization()
    {
        $token = new Token('token-value');
        $actual = unserialize(serialize($token))->toArray();
        $this->assertEquals([
            'token'     => 'token-value',
            'expires' => null,
            'source'   => null
        ], $actual);

        $token = new Token('token-value',  10);
        $actual = unserialize(serialize($token))->toArray();

        $this->assertEquals([
            'token'     => 'token-value',
            'expires' => 10,
            'source'   => null
        ], $actual);
    }

    public function testIsInstanceOfIdentity()
    {
        $token = new Token('token-value');
        $this->assertInstanceOf(BearerTokenIdentity::class, $token);
    }
}
