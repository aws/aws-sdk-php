<?php

namespace Aws\Tests\Common\Credentials;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\AbstractCredentialsDecorator;

/**
 * @covers Aws\Common\Credentials\AbstractCredentialsDecorator
 */
class AbstractCredentialsDecoratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testProxiesToWrappedObject()
    {
        $credentials = new Credentials('a', 'b', 'c', 1000);

        $c = new AbstractCredentialsDecorator($credentials);

        $this->assertEquals('a', $c->getAccessKeyId());
        $this->assertEquals('b', $c->getSecretKey());
        $this->assertEquals('c', $c->getSecurityToken());
        $this->assertEquals(1000, $c->getExpiration());

        $this->assertSame($c, $c->setAccessKeyId('foo'));
        $this->assertSame($c, $c->setSecretKey('baz'));
        $this->assertSame($c, $c->setSecurityToken('bar'));
        $this->assertSame($c, $c->setExpiration(500));

        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertEquals('bar', $c->getSecurityToken());
        $this->assertEquals(500, $c->getExpiration());

        $this->assertTrue($c->isExpired());

        $this->assertSame($c->serialize(), $credentials->serialize());
        $this->assertEquals(unserialize(serialize($c)), $c);
    }
}
