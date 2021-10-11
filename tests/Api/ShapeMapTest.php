<?php
namespace Aws\Test\Api;

use Aws\Api\ShapeMap;
use Aws\Test\Polyfill\PHPUnit\PHPUnitCompatTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\ShapeMap
 */
class ShapeMapTest extends TestCase
{
    use PHPUnitCompatTrait;

    public function testReturnsShapeName()
    {
        $sm = new ShapeMap(['foo' => [], 'baz' => []]);
        $this->assertEquals(['foo', 'baz'], $sm->getShapeNames());
    }

    public function testEnsuresShapeExists()
    {
        $this->expectException(\InvalidArgumentException::class);
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
