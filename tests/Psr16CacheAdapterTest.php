<?php
namespace Aws\Test;

use Aws\Psr16CacheAdapter;
use Psr\SimpleCache\CacheInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class Psr16CacheAdapterTest extends TestCase
{
    /** @var CacheInterface|\PHPUnit_Framework_MockObject_MockObject $wrappedCache */
    private $wrapped;
    /** @var Psr16CacheAdapter */
    private $instance;

    public function set_up()
    {
        $this->wrapped = $this->getMockBuilder(CacheInterface::class)->getMock();
        $this->instance = new Psr16CacheAdapter($this->wrapped);
    }

    /**
     *
     * @param string $key
     * @param mixed $value

 */
    #[DataProvider('cacheDataProvider')]
    public function testProxiesGetCallsToPsrCache($key, $value)
    {
        $this->wrapped->expects($this->once())
            ->method('get')
            ->with($key)
            ->willReturn($value);

        $this->assertSame($value, $this->instance->get($key));
    }

    /**
     *
     * @param string $key
     * @param mixed $value
     * @param int|\DateInterval $ttl

 */
    #[DataProvider('cacheDataProvider')]
    public function testProxiesSetCallsToPsrCache($key, $value, $ttl)
    {
        $this->wrapped->expects($this->once())
            ->method('set')
            ->with($key, $value, $ttl)
            ->willReturn(true);

        $this->instance->set($key, $value, $ttl);
    }

    /**
     *
     * @param string $key

 */
    #[DataProvider('cacheDataProvider')]
    public function testProxiesRemoveCallsToPsrCache($key)
    {
        $this->wrapped->expects($this->once())
            ->method('delete')
            ->with($key)
            ->willReturn(true);

        $this->instance->remove($key);
    }

    public static function cacheDataProvider()
    {
        return [
            ['foo', 'bar', 300],
        ];
    }
}
