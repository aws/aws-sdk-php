<?php
namespace Aws\Test\Api;

use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

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
        $this->assertInstanceOf(Shape::class, $s->getMember('foo'));
        $this->assertSame('string', $s->getMember('foo')->getType());
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
        $this->assertIsArray($members);
        $this->assertInstanceOf(Shape::class, $members['foo']);
        $this->assertInstanceOf(Shape::class, $members['baz']);
        $this->assertSame('string', $members['foo']->getType());
        $this->assertSame('integer', $members['baz']->getType());
    }

    public function testEnsuresMemberExists()
    {
        $this->expectException(\InvalidArgumentException::class);
        (new StructureShape([], new ShapeMap([])))->getMember('foo');
    }

    public function testReturnsOriginalDefinitionWithoutMergedProperties(): void
    {
        $shapeMap = new ShapeMap([
            'ParentStructure' => [
                'type' => 'structure',
                'members' => [
                    'nested' => [
                        'shape' => 'PayloadStructure',
                        'locationName' => 'nestedElement'  // Member adds its own locationName
                    ]
                ]
            ],
            'PayloadStructure' => [
                'type' => 'structure',
                'locationName' => 'Hello',  // Shape's own locationName
                'members' => [
                    'data' => ['shape' => 'StringType']
                ]
            ],
            'StringType' => [
                'type' => 'string'
            ]
        ]);

        $parent = $shapeMap->resolve(['shape' => 'ParentStructure']);
        // Get the nested member - this should have merged properties
        $nestedMember = $parent->getMember('nested');
        // The nested member has locationName from the member reference, not the shape
        $this->assertSame('nestedElement', $nestedMember['locationName']);
        // getOriginalDefinition returns the unmerged PayloadStructure definition
        $originalDef = $nestedMember->getOriginalDefinition('PayloadStructure');
        $this->assertSame('Hello', $originalDef['locationName']);

        $this->assertNotSame($nestedMember['locationName'], $originalDef['locationName']);
    }
}
