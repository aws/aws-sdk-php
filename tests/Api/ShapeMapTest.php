<?php
namespace Aws\Test\Api;

use Aws\Api\ShapeMap;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\ShapeMap
 */
class ShapeMapTest extends TestCase
{
    public function testReturnsShapeName()
    {
        $sm = new ShapeMap(['foo' => [], 'baz' => []]);
        $this->assertEquals(['foo', 'baz'], $sm->getShapeNames());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresShapeExists()
    {
        $sm = new ShapeMap([]);
        $sm->resolve(['shape' => 'missing']);
    }

    public function testReturnsShapes()
    {
        $sm = new ShapeMap(['foo' => ['type' => 'string']]);
        $s = $sm->resolve(['shape' => 'foo']);
        $this->assertInstanceOf('Aws\Api\Shape', $s);
        $this->assertArrayNotHasKey('shape', $s->toArray());
        $this->assertSame($s, $sm->resolve(['shape' => 'foo']));
    }
}
