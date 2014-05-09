<?php
namespace Aws\Test\Common\Api;

use Aws\Common\Api\ShapeMap;
use Aws\Common\Api\ListShape;

/**
 * @covers \Aws\Common\Api\ListShape
 */
class ListShapeTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsMember()
    {
        $s = new ListShape(
            ['member' => ['type' => 'string']],
            new ShapeMap([])
        );

        $m = $s->getMember();
        $this->assertInstanceOf('Aws\Common\Api\Shape', $m);
        $this->assertSame($m, $s->getMember());
        $this->assertEquals('string', $m->getType());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testFailsWhenMemberIsMissing()
    {
        (new ListShape([], new ShapeMap([])))->getMember();
    }
}
