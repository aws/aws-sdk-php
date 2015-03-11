<?php
namespace Aws\Test;

use Aws\Command;
use Aws\CommandInterface;
use Aws\HandlerList;

/**
 * @covers Aws\HandlerList
 */
class HandlerListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \LogicException
     */
    public function testEnsuresHandlerIsSet()
    {
        $list = new HandlerList();
        $this->assertFalse($list->hasHandler());
        $list->resolve();
    }

    public function testHandlerCanBeSetInCtor()
    {
        $handler = function () {};
        $list = new HandlerList($handler);
        $this->assertTrue($list->hasHandler());
        $this->assertSame($handler, $list->resolve());
    }

    public function testHandlerCanBeSetInSetter()
    {
        $handler = function () {};
        $list = new HandlerList();
        $list->setHandler($handler);
        $this->assertTrue($list->hasHandler());
        $this->assertSame($handler, $list->resolve());
    }

    public function testCanRemoveByInstance()
    {
        $handler = function () {};
        $list = new HandlerList($handler);
        $middleware = function () { return function () {}; };
        $list->append($middleware);
        $this->assertNotSame($handler, $list->resolve());
        $list->remove($middleware);
        $this->assertSame($handler, $list->resolve());
    }

    private function createMiddleware(array &$history, $name)
    {
        return function (callable $next) use (&$history, $name) {
            return function (CommandInterface $cmd, $request = null) use ($next, &$history, $name) {
                $history[] = $name;
                return $next($cmd, $request);
            };
        };
    }

    public function testWrapsInStepOrderWithAppend()
    {
        $handler = function (CommandInterface $cmd, $request = null) {
            return 'baz';
        };
        $list = new HandlerList($handler);
        $h = [];
        $steps = ['init', 'validate', 'build', 'sign'];
        foreach ($steps as $step) {
            $m = $this->createMiddleware($h, $step);
            $list->append($m, ['step' => $step]);
        }
        $built = $list->resolve();
        $cmd = new Command('foo');
        $this->assertEquals('baz', $built($cmd));
        $this->assertEquals($steps, $h);
    }

    public function testWrapsInStepOrderWithPrepend()
    {
        $handler = function (CommandInterface $cmd, $request = null) {
            return 'baz';
        };
        $list = new HandlerList($handler);
        $h = [];
        $steps = ['init', 'validate', 'build', 'sign'];
        foreach ($steps as $step) {
            $m = $this->createMiddleware($h, $step);
            $list->prepend($m, ['step' => $step]);
        }
        $built = $list->resolve();
        $cmd = new Command('foo');
        $this->assertEquals('baz', $built($cmd));
        $this->assertEquals($steps, $h);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesStep()
    {
        $list = new HandlerList();
        $list->append(function () {}, ['step' => 'nope']);
    }

    public function testCanStickToFront()
    {
        $handler = function (CommandInterface $cmd, $request = null) {
            return 'baz';
        };
        $list = new HandlerList($handler);
        $h = [];

        $m = $this->createMiddleware($h, 'a');
        $list->prepend($m, ['step' => 'init', 'sticky' => true]);

        $m = $this->createMiddleware($h, 'b');
        $list->prepend($m, ['step' => 'init']);

        $m = $this->createMiddleware($h, 'c');
        $list->append($m, ['step' => 'init', 'sticky' => true]);

        $m = $this->createMiddleware($h, 'd');
        $list->append($m, ['step' => 'init']);

        $m = $this->createMiddleware($h, '0');
        $list->prepend($m);

        $m = $this->createMiddleware($h, '-1');
        $list->prepend($m, ['sticky' => true]);

        $m = $this->createMiddleware($h, '999');
        $list->append($m, ['sticky' => true]);

        $m = $this->createMiddleware($h, '998');
        $list->append($m, ['sticky']);

        $built = $list->resolve();
        $cmd = new Command('foo');
        $this->assertEquals('baz', $built($cmd));

        $this->assertEquals(['-1', '0', 'a', 'b', 'd', 'c', '998', '999'], $h);
    }
}
