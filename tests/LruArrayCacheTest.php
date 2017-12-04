<?php
namespace Aws\Test;

use Aws\LruArrayCache;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\LruArrayCache
 */
class LruArrayCacheTest extends TestCase
{
    public function testSetRemoveAndRetrieve()
    {
        $c = new LruArrayCache();
        $c->set('foo', 'baz');
        $this->assertSame('baz', $c->get('foo'));
        $this->assertSame('baz', $c->get('foo'));
        $c->remove('foo');
        $this->assertNull($c->get('foo'));
    }

    public function testLimitsSize()
    {
        $c = new LruArrayCache(3);
        $c->set('a', 1);
        $c->set('b', 2);
        $c->set('c', 3);
        $c->set('d', 4);
        $c->set('e', 5);
        $this->assertNull($c->get('a'));
        $this->assertNull($c->get('b'));
        $this->assertSame(3, $c->get('c'));
        $this->assertSame(4, $c->get('d'));
        $this->assertSame(5, $c->get('e'));
    }

    public function testRemovesLru()
    {
        $c = new LruArrayCache(3);
        $c->set('a', 1);
        $c->set('b', 2);
        $c->set('c', 3);
        $c->get('a'); // Puts a back on the end
        $c->set('d', 4);
        $c->set('e', 5);
        $this->assertNull($c->get('b'));
        $this->assertNull($c->get('c'));
        $this->assertSame(1, $c->get('a'));
        $this->assertSame(4, $c->get('d'));
        $this->assertSame(5, $c->get('e'));
    }

    public function testFiltersBasedOnTtl()
    {
        $c = new LruArrayCache();
        // Create a cache item with an expired TTL
        $c->set('a', 1, -1);
        $this->assertNull($c->get('a'));
    }
}
