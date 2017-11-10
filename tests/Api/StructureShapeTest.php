<?php
namespace Aws\Test\Api;

use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\StructureShape
 */
class StructureShapeTest extends TestCase
{
    public function testReturnsWhenMembersAreEmpty()
    {
        $s = new StructureShape([], new ShapeMap([]));
        $this->assertFalse($s->hasMember('foo'));
        $this->assertSame([], $s->getMembers());
    }

    public function testReturnsMember()
    {
        $s = new StructureShape([
            'members' => ['foo' => ['type' => 'string']]
        ], new ShapeMap([]));
        $this->assertTrue($s->hasMember('foo'));
        $this->assertInstanceOf('Aws\Api\Shape', $s->getMember('foo'));
        $this->assertEquals('string', $s->getMember('foo')->getType());
    }

    public function testReturnsAllMembers()
    {
        $s = new StructureShape([
            'members' => [
                'foo' => ['type' => 'string'],
                'baz' => ['type' => 'integer'],
            ]
        ], new ShapeMap([]));
        $members = $s->getMembers();
        $this->assertInternalType('array', $members);
        $this->assertInstanceOf('Aws\Api\Shape', $members['foo']);
        $this->assertInstanceOf('Aws\Api\Shape', $members['baz']);
        $this->assertEquals('string', $members['foo']->getType());
        $this->assertEquals('integer', $members['baz']->getType());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresMemberExists()
    {
        (new StructureShape([], new ShapeMap([])))->getMember('foo');
    }
}
