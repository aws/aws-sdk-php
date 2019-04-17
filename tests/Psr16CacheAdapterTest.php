<?php
namespace Aws\Test;

use Aws\Psr16CacheAdapter;
use Psr\SimpleCache\CacheInterface;
use PHPUnit\Framework\TestCase;

class Psr16CacheAdapterTest extends TestCase
{
    /** @var CacheInterface|\PHPUnit_Framework_MockObject_MockObject $wrappedCache */
    private $wrapped;
    /** @var Psr16CacheAdapter */
    private $instance;

    public function setUp()
    {
        $this->wrapped = $this->getMockBuilder(CacheInterface::class)->getMock();
        $this->instance = new Psr16CacheAdapter($this->wrapped);
    }

    /**
     * @dataProvider cacheDataProvider
     *
     * @param string $key
     * @param mixed $value
     */
    public function testProxiesGetCallsToPsrCache($key, $value)
    {
        $this->wrapped->expects($this->once())
            ->method('get')
            ->with($key)
            ->willReturn($value);

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
        $this->wrapped->expects($this->once())
            ->method('set')
            ->with($key, $value, $ttl)
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
            ->method('delete')
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
