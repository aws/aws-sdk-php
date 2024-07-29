<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\Credentials;
use Aws\Identity\AwsCredentialIdentity;
use Aws\Identity\AwsCredentialIdentityInterface;
use Aws\Identity\IdentityInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Credentials\Credentials
 */
class CredentialsTest extends TestCase
{
    public function testHasGetters()
    {
        $exp = time() + 500;
        $accountId = '123456789012';
        $creds = new Credentials('foo', 'baz', 'tok', $exp, $accountId);
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('baz', $creds->getSecretKey());
        $this->assertSame('tok', $creds->getSecurityToken());
        $this->assertSame($exp, $creds->getExpiration());
        $this->assertSame($accountId, $creds->getAccountId());
        $this->assertEquals([
            'key'     => 'foo',
            'secret'  => 'baz',
            'token'   => 'tok',
            'expires' => $exp,
            'accountId' => $accountId
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

    public function testSerialization()
    {
        $credentials = new Credentials('key-value', 'secret-value');
        $actual = unserialize(serialize($credentials))->toArray();
        $this->assertEquals([
            'key'     => 'key-value',
            'secret'  => 'secret-value',
            'token'   => null,
            'expires' => null,
            'accountId' => null
        ], $actual);
        $accountId = '123456789012';
        $credentials = new Credentials('key-value', 'secret-value', 'token-value', 10, $accountId);
        $actual = unserialize(serialize($credentials))->toArray();

        $this->assertEquals([
            'key'     => 'key-value',
            'secret'  => 'secret-value',
            'token'   => 'token-value',
            'expires' => 10,
            'accountId' => $accountId
        ], $actual);
    }

    public function testIsInstanceOfIdentity()
    {
        $credentials = new Credentials('key-value', 'secret-value');
        $this->assertInstanceOf(AwsCredentialIdentity::class, $credentials);
    }
}
