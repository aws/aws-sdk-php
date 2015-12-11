<?php
namespace Aws\Test;

use Aws\Command;
use Aws\HandlerList;

/**
 * @covers Aws\Command
 * @covers Aws\HasDataTrait
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{
    public function testHasName()
    {
        $c = new Command('foo');
        $this->assertEquals('foo', $c->getName());
    }

    public function testHasParam()
    {
        $c = new Command('foo', ['bar' => null, 'baz' => 'bam']);
        $this->assertTrue($c->hasParam('bar'));
        $this->assertTrue($c->hasParam('baz'));
    }

    public function testHasDefaultHandlerList()
    {
        $c = new Command('foo');
        $this->assertInstanceOf('Aws\HandlerList', $c->getHandlerList());
    }

    public function testHasSpecifricHandlerList()
    {
        $list = new HandlerList();
        $c = new Command('foo', [], $list);
        $this->assertSame($list, $c->getHandlerList());
    }

    public function testHasGetMethod()
    {
        $c = new Command('foo', ['bar' => 'baz']);
        $this->assertEquals('baz', $c->get('bar'));
    }

    public function testIsIterable()
    {
        $c = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $data = iterator_to_array($c);
        $this->assertEquals(['bar' => 'baz', 'qux' => 'boo', '@http' => []], $data);
    }

    public function testConvertToArray()
    {
        $c = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $this->assertEquals(['bar' => 'baz', 'qux' => 'boo', '@http' => []], $c->toArray());
    }

    public function testCanCount()
    {
        $c = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $this->assertCount(3, $c);
    }

    public function testCanAccessLikeArray()
    {
        $c = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $this->assertEquals('baz', $c['bar']);
        $this->assertNull($c['boo']);
        $this->assertEquals('boo', $c['qux']);
        $this->assertTrue(isset($c['qux']));
        $this->assertFalse(isset($c['boo']));

        $c['boo'] = 'hi!';
        $this->assertTrue(isset($c['boo']));
        $this->assertEquals('hi!', $c['boo']);

        unset($c['boo']);
        $this->assertFalse(isset($c['boo']));
        $this->assertNull($c['boo']);
    }
}
