<?php

namespace Aws\Tests\Common\Credentials;

use Aws\Common\Credentials\Credentials;
use Guzzle\Common\Cache\DoctrineCacheAdapter;
use Doctrine\Common\Cache\ArrayCache;

class CredentialsTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\Credentials\Credentials::__construct
     * @covers Aws\Common\Credentials\Credentials::getAccessKeyId
     * @covers Aws\Common\Credentials\Credentials::getSecretKey
     * @covers Aws\Common\Credentials\Credentials::getSecurityToken
     */
    public function testOwnsCredentials()
    {
        $c = new Credentials('abc', '123');
        $this->assertEquals('abc', $c->getAccessKeyId());
        $this->assertEquals('123', $c->getSecretKey());
        $this->assertNull($c->getSecurityToken());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     * @covers Aws\Common\Credentials\Credentials::__construct
     * @covers Aws\Common\Credentials\Credentials::getExpiration
     */
    public function testOwnsTokenAndExpiration()
    {
        $c = new Credentials('1', '2', 'a', 123);
        $this->assertEquals('a', $c->getSecurityToken());
        $this->assertEquals(123, $c->getExpiration());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::isExpired
     */
    public function testCredentialsDoNotExpireByDefault()
    {
        $c = new Credentials('abc', '123');
        $this->assertFalse($c->isExpired());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::getExpiration
     */
    public function testCredentialProvideExpirationDetails()
    {
        $c = new Credentials('abc', '123');
        $this->assertEquals('abc', $c->getAccessKeyId());
        $this->assertEquals('123', $c->getSecretKey());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::serialize
     * @covers Aws\Common\Credentials\Credentials::unserialize
     */
    public function testCredentialsCanBeSerialized()
    {
        $c = new Credentials('a', 'b', 'c');

        $json = json_decode($c->serialize(), true);
        $this->assertEquals('a', $json['key']);
        $this->assertEquals('b', $json['secret']);
        $this->assertEquals('c', $json['token']);
        $this->assertArrayHasKey('token.ttd', $json);

        $c2 = clone $c;
        $c2->unserialize($c->serialize());
        $this->assertEquals('a', $c2->getAccessKeyId());
        $this->assertEquals('b', $c2->getSecretKey());
        $this->assertEquals('c', $c2->getSecurityToken());
    }

    public function testCanSetNewValues()
    {
        $c = new Credentials('', '');
        $c->setAccessKeyId('foo')->setSecretKey('baz')->setSecurityToken('bar')->setExpiration(123);
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertEquals(123, $c->getExpiration());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::getConfigDefaults
     */
    public function testProvidesListOfCredentialsOptions()
    {
        $this->assertInternalType('array', Credentials::getConfigDefaults());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     */
    public function testFactoryCreatesBasicCredentials()
    {
        $credentials = Credentials::factory(array(
            'key'       => 'foo',
            'secret'    => 'baz',
            'token'     => 'bar',
            'token.ttd' => 123
        ));

        $this->assertInstanceOf('Aws\\Common\\Credentials\\Credentials', $credentials);
        $this->assertEquals('foo', $credentials->getAccessKeyId());
        $this->assertEquals('baz', $credentials->getSecretKey());
        $this->assertEquals('bar', $credentials->getSecurityToken());
        $this->assertEquals(123, $credentials->getExpiration());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage The "credentials.client" credentials option must be an instance of Guzzle\Service\ClientInterface
     */
    public function testFactoryValidatesClientObject()
    {
        $credentials = Credentials::factory(array(
            'credentials.client' => new \stdClass()
        ));
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     */
    public function testFactoryCreatesInstanceProfileWhenNoKeysAreProvided()
    {
        $credentials = Credentials::factory();
        $this->assertInstanceOf('Aws\\Common\\Credentials\\RefreshableInstanceProfileCredentials', $credentials);
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     */
    public function testFactoryCreatesCacheWhenSetToTrue()
    {
        $credentials = Credentials::factory(array(
            'key'               => 'foo',
            'secret'            => 'bar',
            'credentials.cache' => true
        ));

        $this->assertInstanceOf('Aws\\Common\\Credentials\\CacheableCredentials', $credentials);
        $this->assertInstanceOf('Guzzle\\Common\\Cache\\DoctrineCacheAdapter', $this->readAttribute($credentials, 'cache'));
        $this->assertEquals('credentials_foo', $this->readAttribute($credentials, 'cacheKey'));
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     */
    public function testFactoryUsesExplicitlyProvidedCache()
    {
        $cache = new DoctrineCacheAdapter(new ArrayCache());
        $credentials = Credentials::factory(array(
            'credentials.cache' => $cache
        ));
        $this->assertInstanceOf('Aws\\Common\\Credentials\\CacheableCredentials', $credentials);
        $this->assertInstanceOf('Guzzle\\Common\\Cache\\DoctrineCacheAdapter', $this->readAttribute($credentials, 'cache'));
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage Unable to utilize caching with the specified options
     */
    public function testFactoryBailsWhenCacheCannotBeDetermined()
    {
        Credentials::factory(array('credentials.cache' => 'foo'));
    }
}
