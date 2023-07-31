<?php
namespace Aws\Test\Api;

use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Api\ListShape;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Api\ListShape
 */
class ListShapeTest extends TestCase
{
    public function testReturnsMember()
    {
        $s = new ListShape(
            ['member' => ['type' => 'string']],
            new ShapeMap([])
        );

        $m = $s->getMember();
        $this->assertInstanceOf(Shape::class, $m);
        $this->assertSame($m, $s->getMember());
        $this->assertSame('string', $m->getType());
    }

    public function testFailsWhenMemberIsMissing()
    {
        $this->expectException(\RuntimeException::class);
        (new ListShape([], new ShapeMap([])))->getMember();
    }
}
