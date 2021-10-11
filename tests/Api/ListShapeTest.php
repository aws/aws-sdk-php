<?php
namespace Aws\Test\Api;

use Aws\Api\ShapeMap;
use Aws\Api\ListShape;
use Aws\Test\Polyfill\PHPUnit\PHPUnitCompatTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\ListShape
 */
class ListShapeTest extends TestCase
{
    use PHPUnitCompatTrait;

    public function testReturnsMember()
    {
        $s = new ListShape(
            ['member' => ['type' => 'string']],
            new ShapeMap([])
        );

        $m = $s->getMember();
        $this->assertInstanceOf('Aws\Api\Shape', $m);
        $this->assertSame($m, $s->getMember());
        $this->assertSame('string', $m->getType());
    }

    public function testFailsWhenMemberIsMissing()
    {
        $this->expectException(\RuntimeException::class);
        (new ListShape([], new ShapeMap([])))->getMember();
    }
}
