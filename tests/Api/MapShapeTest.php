<?php
namespace Aws\Test\Api;

use Aws\Api\ShapeMap;
use Aws\Api\MapShape;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\MapShape
 */
class MapShapeTest extends TestCase
{
    public function testReturnsValue()
    {
        $s = new MapShape(['value' => ['type' => 'string']], new ShapeMap([]));
        $v = $s->getValue();
        $this->assertInstanceOf('Aws\Api\Shape', $v);
        $this->assertEquals('string', $v->getType());
        $this->assertSame($v, $s->getValue());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testFailsWhenValueIsMissing()
    {
        (new MapShape([], new ShapeMap([])))->getValue();
    }

    public function testReturnsKey()
    {
        $s = new MapShape(['key' => ['type' => 'string']], new ShapeMap([]));
        $k = $s->getKey();
        $this->assertInstanceOf('Aws\Api\Shape', $k);
        $this->assertEquals('string', $k->getType());
    }

    public function testReturnsEmptyKey()
    {
        $s = new MapShape([], new ShapeMap([]));
        $this->assertInstanceOf('Aws\Api\Shape', $s->getKey());
    }
}
