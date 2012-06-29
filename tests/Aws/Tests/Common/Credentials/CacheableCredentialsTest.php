<?php

namespace Aws\Tests\Common\Credentials;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\CacheableCredentials;
use Guzzle\Common\Cache\DoctrineCacheAdapter;
use Doctrine\Common\Cache\ArrayCache;

/**
 * @covers Aws\Common\Credentials\CacheableCredentials
 */
class CacheableCredentialsTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCache()
    {
        return new DoctrineCacheAdapter(new ArrayCache());
    }

    public function testCachesData()
    {
        $cache = $this->getCache();

        // Seed the cache with some credentials
        $c = new Credentials('a', 'b', 'c', time() + 100000);
        $cache->save('foo', $c, 10000);

        // Create expired credentials
        $c = new Credentials('', '', '', 1);
        $creds = new CacheableCredentials($c, $cache, 'foo');

        // Should get a cache hit
        $this->assertEquals('a', $creds->getAccessKeyId());
        $this->assertEquals('b', $creds->getSecretKey());
        $this->assertEquals('c', $creds->getSecurityToken());
    }

    public function testDiscardsExpiredCachedData()
    {
        $cache = $this->getCache();

        // Seed the cache with some credentials
        $c = new Credentials('a', 'b', 'c', 1);
        $cache->save('foo', $c, 10000);

        // Create more expired credentials
        $c = new Credentials('foo', 'baz', 'bar', 1);
        $creds = new CacheableCredentials($c, $cache, 'foo');

        // should ignore the expired cached data
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('bar', $creds->getSecurityToken());
    }

    public function testSavesCredentialsToCache()
    {
        $cache = $this->getCache();

        $mock = $this->getMockBuilder('Aws\\Common\\Credentials\\Credentials')
            ->setConstructorArgs(array('foo', 'baz', 'bar', 1))
            ->setMethods(array('isExpired'))
            ->getMock();

        $count = 0;
        $callback = function () use (&$count) {
            return ++$count == 1;
        };

        // First return true, then false
        $mock->expects($this->any())
            ->method('isExpired')
            ->will($this->returnCallback($callback));

        $creds = new CacheableCredentials($mock, $cache, 'foo');

        // should ignore the expired cached data
        $this->assertEquals('foo', $creds->getAccessKeyId());

        // Ensure that the credentials were cached
        $this->assertTrue($cache->contains('foo'));
    }
}
