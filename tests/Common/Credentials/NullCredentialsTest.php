<?php
namespace Aws\Test\Common\Credentials;

use Aws\Common\Credentials\NullCredentials;

/**
 * @covers \Aws\Common\Credentials\NullCredentials
 */
class NullCredentialsTest extends \PHPUnit_Framework_TestCase
{
    public function testIsNullish()
    {
        $n = new NullCredentials();
        $this->assertSame('', $n->getAccessKeyId());
        $this->assertSame('', $n->getSecretKey());
        $this->assertNull($n->getSecurityToken());
        $this->assertNull($n->getExpiration());
        $this->assertFalse($n->isExpired());
        $this->assertSame(
            ['key' => '', 'secret' => '', 'token' => null, 'expires' => null],
            $n->toArray()
        );
    }
}
