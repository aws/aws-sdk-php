<?php
namespace Aws\Test\Common\Api;

use Aws\Common\Api\ShapeMap;
use Aws\Common\Api\StructureShape;

/**
 * @covers \Aws\Common\Api\StructureShape
 */
class StructureShapeTest extends \PHPUnit_Framework_TestCase
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
        $this->assertInstanceOf('Aws\Common\Api\Shape', $s->getMember('foo'));
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
        $this->assertInstanceOf('Aws\Common\Api\Shape', $members['foo']);
        $this->assertInstanceOf('Aws\Common\Api\Shape', $members['baz']);
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
