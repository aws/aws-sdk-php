<?php
namespace Aws\Test\Common\Api;

use Aws\Common\Api\Shape;
use Aws\Common\Api\ShapeMap;

/**
 * @covers \Aws\Common\Api\Shape
 * @covers \Aws\Common\Api\AbstractModel
 */
class ShapeTest extends \PHPUnit_Framework_TestCase
{
    public function testImplementsArray()
    {
        $s = new Shape(['metadata' => ['foo' => 'bar']], new ShapeMap([]));
        $this->assertSame(['foo' => 'bar'], $s['metadata']);
        $this->assertNull($s['missing']);
        $s['abc'] = '123';
        $this->assertEquals('123', $s['abc']);
        $this->assertTrue(isset($s['abc']));
        $this->assertEquals(
            ['metadata' => ['foo' => 'bar'], 'abc' => '123'],
            $s->toArray()
        );
        unset($s['abc']);
        $this->assertFalse(isset($s['abc']));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesShapeAt()
    {
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
        $this->assertInstanceOf('Aws\Common\Api\Shape', $m->invoke($s, 'foo'));
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
        $this->assertInstanceOf('Aws\Common\Api\Shape', $result);
        $this->assertEquals('string', $result->getType());
    }

    public function testCreatesNestedShapeReferences()
    {
        $s = Shape::create(
            ['shape' => 'bar'],
            new ShapeMap(['bar' => ['type' => 'float']])
        );
        $this->assertInstanceOf('Aws\Common\Api\Shape', $s);
        $this->assertEquals('float', $s->getType());
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Invalid type
     */
    public function testValidatesShapeTypes()
    {
        $s = new Shape(
            ['foo' => ['type' => 'what?']],
            new ShapeMap([])
        );
        $m = new \ReflectionMethod($s, 'shapeAt');
        $m->setAccessible(true);
        $m->invoke($s, 'foo');
    }
}
