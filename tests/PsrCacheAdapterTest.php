<?php
namespace Aws\Test;

use Aws\PsrCacheAdapter;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

class PsrCacheAdapterTest extends \PHPUnit_Framework_TestCase
{
    /** @var CacheItemPoolInterface|\PHPUnit_Framework_MockObject_MockObject $wrappedCache */
    private $wrapped;
    /** @var PsrCacheAdapter */
    private $instance;

    public function setUp()
    {
        $this->wrapped = $this->getMockBuilder(CacheItemPoolInterface::class)->getMock();
        $this->instance = new PsrCacheAdapter($this->wrapped);
    }

    /**
     * @dataProvider cacheDataProvider
     *
     * @param string $key
     * @param mixed $value
     */
    public function testProxiesGetCallsToPsrCache($key, $value)
    {
        $item = $this->getMockBuilder(CacheItemInterface::class)->getMock();
        $item->expects($this->once())
            ->method('isHit')
            ->willReturn(true);
        $item->expects($this->once())
            ->method('get')
            ->willReturn($value);

        $this->wrapped->expects($this->once())
            ->method('getItem')
            ->with($key)
            ->willReturn($item);

        $this->assertSame($value, $this->instance->get($key));
    }

    /**
     * @dataProvider cacheDataProvider
     *
     * @param string $key
     * @param mixed $value
     * @param int|\DateInterval $ttl
     */
    public function testProxiesSetCallsToPsrCache($key, $value, $ttl)
    {
        $item = $this->getMockBuilder(CacheItemInterface::class)->getMock();
        $item->expects($this->once())
            ->method('set')
            ->with($value)
            ->willReturnSelf();
        $item->expects($this->once())
            ->method('expiresAfter')
            ->with($ttl)
            ->willReturnSelf();

        $this->wrapped->expects($this->once())
            ->method('getItem')
            ->with($key)
            ->willReturn($item);
        $this->wrapped->expects($this->once())
            ->method('save')
            ->with($item)
            ->willReturn(true);

        $this->instance->set($key, $value, $ttl);
    }

    /**
     * @dataProvider cacheDataProvider
     *
     * @param string $key
     */
    public function testProxiesRemoveCallsToPsrCache($key)
    {
        $this->wrapped->expects($this->once())
            ->method('deleteItem')
            ->with($key)
            ->willReturn(true);

        $this->instance->remove($key);
    }

    public function cacheDataProvider()
    {
        return [
            ['foo', 'bar', 300],
        ];
    }
}
