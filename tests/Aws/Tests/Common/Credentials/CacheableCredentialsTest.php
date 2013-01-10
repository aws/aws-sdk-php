<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\Common\Credentials;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\CacheableCredentials;
use Guzzle\Cache\DoctrineCacheAdapter;
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
