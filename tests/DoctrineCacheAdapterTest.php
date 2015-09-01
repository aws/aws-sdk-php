<?php
namespace Aws\Test;

use Aws\CacheInterface;
use Aws\DoctrineCacheAdapter;
use Doctrine\Common\Cache\Cache;

class DoctrineCacheAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testProxiesCallsToDoctrine()
    {
        $wrappedCache = $this->getMock(Cache::class);

        $wrappedCache->expects($this->once())
            ->method('fetch')
            ->with('foo')
            ->willReturn('bar');
        $wrappedCache->expects($this->once())
            ->method('save')
            ->with('foo', 'bar', 0)
            ->willReturn(true);
        $wrappedCache->expects($this->once())
            ->method('delete')
            ->with('foo')
            ->willReturn(true);

        $cache = new DoctrineCacheAdapter($wrappedCache);
        $cache->set('foo', 'bar', 0);
        $cache->get('foo');
        $cache->remove('foo');
    }

    public function testAdaptsCacheToAwsAndDoctrine()
    {
        $wrappedCache = $this->getMock(Cache::class);
        $cache = new DoctrineCacheAdapter($wrappedCache);

        $this->assertInstanceOf(Cache::class, $cache);
        $this->assertInstanceOf(CacheInterface::class, $cache);
    }
}
