<?php
namespace Aws\Tests\Common\Credentials;

use Aws\Credentials\NullCredentials;

/**
 * @covers \Aws\Credentials\NullCredentials
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
