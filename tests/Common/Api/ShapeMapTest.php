<?php
namespace Aws\Test\Common\Api;

use Aws\Common\Api\ShapeMap;

/**
 * @covers \Aws\Common\Api\ShapeMap
 */
class ShapeMapTest extends \PHPUnit_Framework_TestCase
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
        $this->assertInstanceOf('Aws\Common\Api\Shape', $s);
        $this->assertArrayNotHasKey('shape', $s->toArray());
        $this->assertSame($s, $sm->resolve(['shape' => 'foo']));
    }
}
