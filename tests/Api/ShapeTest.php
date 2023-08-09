<?php
namespace Aws\Test\Api;

use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Api\Shape
 * @covers Aws\Api\AbstractModel
 */
class ShapeTest extends TestCase
{
    public function testImplementsArray()
    {
        $s = new Shape(['metadata' => ['foo' => 'bar']], new ShapeMap([]));
        $this->assertSame(['foo' => 'bar'], $s['metadata']);
        $this->assertNull($s['missing']);
        $s['abc'] = '123';
        $this->assertSame('123', $s['abc']);
        $this->assertArrayHasKey('abc', $s);
        $this->assertEquals(
            ['metadata' => ['foo' => 'bar'], 'abc' => '123'],
            $s->toArray()
        );
        unset($s['abc']);
        $this->assertArrayNotHasKey('abc', $s);
    }

    public function testValidatesShapeAt()
    {
        $this->expectException(\InvalidArgumentException::class);
        $s = new Shape([], new ShapeMap([]));
        $m = new \ReflectionMethod($s, 'shapeAt');
        $m->setAccessible(true);
        $m->invoke($s, 'not_there');
    }

    public function testReturnsShapesFor()
    {
        $s = new Shape(['foo' => ['type' => 'string']], new ShapeMap([]));
        $m = new \ReflectionMethod($s, 'shapeAt');
        $m->setAccessible(true);
        $this->assertInstanceOf(Shape::class, $m->invoke($s, 'foo'));
    }

    public function testReturnsNestedShapeReferences()
    {
        $s = new Shape(
            ['foo' => ['shape' => 'bar']],
            new ShapeMap(['bar' => ['type' => 'string']])
        );
        $m = new \ReflectionMethod($s, 'shapeAt');
        $m->setAccessible(true);
        $result = $m->invoke($s, 'foo');
        $this->assertInstanceOf(Shape::class, $result);
        $this->assertSame('string', $result->getType());
    }

    public function testCreatesNestedShapeReferences()
    {
        $s = Shape::create(
            ['shape' => 'bar'],
            new ShapeMap(['bar' => ['type' => 'float']])
        );
        $this->assertInstanceOf(Shape::class, $s);
        $this->assertSame('float', $s->getType());
    }

    public function testValidatesShapeTypes()
    {
        $this->expectExceptionMessage("Invalid type");
        $this->expectException(\RuntimeException::class);
        $s = new Shape(
            ['foo' => ['type' => 'what?']],
            new ShapeMap([])
        );
        $m = new \ReflectionMethod($s, 'shapeAt');
        $m->setAccessible(true);
        $m->invoke($s, 'foo');
    }

    public function testGetContextParam()
    {
        $s = new Shape(
            [
                'foo' => [
                    'shape' => 'bar',
                ],
                'contextParam' => [
                    'name' => 'Baz'
                ]
            ],
            new ShapeMap(['bar' => ['type' => 'string']])
        );
        $this->assertEquals(
            ['name' => 'Baz'],
            $s->getContextParam()
        );
    }
}
