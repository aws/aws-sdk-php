<?php
namespace Aws\Test;

use Aws\CacheInterface;
use Aws\DoctrineCacheAdapter;
use Doctrine\Common\Cache\Cache;
use PHPUnit\Framework\TestCase;

class DoctrineCacheAdapterTest extends TestCase
{
    public function testProxiesCallsToDoctrine()
    {
        $wrappedCache = $this->getMockBuilder(Cache::class)->getMock();

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
        $wrappedCache = $this->getMockBuilder(Cache::class)->getMock();
        $cache = new DoctrineCacheAdapter($wrappedCache);

        $this->assertInstanceOf(Cache::class, $cache);
        $this->assertInstanceOf(CacheInterface::class, $cache);
    }
}
