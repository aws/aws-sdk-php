<?php
namespace Aws\Test;

use Aws\Command;
use Aws\CommandInterface;
use Aws\HandlerList;
use Aws\Middleware;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\HandlerList
 */
class HandlerListTest extends TestCase
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

    public function testCanPrependWithName()
    {
        $list = new HandlerList();
        $list->prependInit(function () {}, 'foo');
        $this->assertCount(1, $list);
    }

    public function testCanRemoveByInstance()
    {
        $handler = function () {};
        $list = new HandlerList($handler);
        $middleware = function () { return function () {}; };
        $list->appendInit($middleware);
        $this->assertCount(1, $list);
        $this->assertNotSame($handler, $list->resolve());
        $list->remove($middleware);
        $this->assertCount(0, $list);
        $this->assertSame($handler, $list->resolve());
    }

    public function testIgnoreWhenNameNotFound()
    {
        $list = new HandlerList();
        $list->remove('foo');
    }

    public function testCanRemoveByName()
    {
        $handler = function () {};
        $list = new HandlerList($handler);
        $middleware = function () { return function () {}; };
        $list->appendInit($middleware, 'foo');
        $this->assertCount(1, $list);
        $this->assertNotSame($handler, $list->resolve());
        $list->remove('foo');
        $this->assertCount(0, $list);
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
        $steps = ['Init', 'Validate', 'Build', 'Sign', 'Attempt'];
        foreach ($steps as $step) {
            $m = $this->createMiddleware($h, $step);
            $list->{'append' . $step}($m);
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
        $steps = ['Init', 'Validate', 'Build', 'Sign', 'Attempt'];
        foreach ($steps as $step) {
            $m = $this->createMiddleware($h, $step);
            $list->{'prepend' . $step}($m);
        }
        $built = $list->resolve();
        $cmd = new Command('foo');
        $this->assertEquals('baz', $built($cmd));
        $this->assertEquals($steps, $h);
    }

    public function testCanPrintStack()
    {
        $list = new HandlerList();
        $list->appendInit(function () {}, 'foo');
        $list->appendInit([$this, 'bar'], 'bar');
        $list->appendValidate(__CLASS__ . '::foo');
        $list->appendSign([Middleware::class, 'tap'], 'baz');
        $list->setHandler(function () {});
        $lines = explode("\n", (string) $list);
        $this->assertCount(6, $lines);
        $this->assertContains('0) Step: init, Name: foo, Function: callable(', $lines[0]);
        $this->assertEquals("1) Step: init, Name: bar, Function: callable(['Aws\\Test\\HandlerListTest', 'bar'])", $lines[1]);
        $this->assertEquals('2) Step: validate, Function: callable(Aws\Test\HandlerListTest::foo)', $lines[2]);
        $this->assertEquals("3) Step: sign, Name: baz, Function: callable(['Aws\\Middleware', 'tap'])", $lines[3]);
        $this->assertContains('4) Handler: callable(', $lines[4]);
    }

    public static function foo() {}
    public function bar() {}

    public function testCanAddBefore()
    {
        $list = new HandlerList();
        $list->appendInit(function () {});
        $list->appendBuild(function () {}, 'test');
        $list->before('test', 'a', function () {});
        $lines = explode("\n", (string) $list);
        $this->assertContains("1) Step: build, Name: a", $lines[1]);
        $this->assertContains("2) Step: build, Name: test", $lines[2]);
    }

    public function testCanAddAfter()
    {
        $list = new HandlerList();
        $list->appendBuild(function () {}, 'test');
        $list->appendBuild(function () {}, 'after_test');
        $list->appendInit(function () {});
        $list->after('test', 'a', function () {});
        $lines = explode("\n", (string) $list);
        $this->assertContains("1) Step: build, Name: test", $lines[1]);
        $this->assertContains("2) Step: build, Name: a", $lines[2]);
        $this->assertContains("3) Step: build, Name: after_test", $lines[3]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMustExistByNameToPrependOrAppend()
    {
        $list = new HandlerList();
        $list->before('foo', '', function () {});
    }

    public function testCanInterposeMiddleware()
    {
        $list = new HandlerList(function () {});
        $list->appendInit(Middleware::tap(function () {}), 'a');
        $list->appendValidate(Middleware::tap(function () {}), 'b');
        $list->appendBuild(Middleware::tap(function () {}), 'c');
        $list->appendSign(Middleware::tap(function () {}), 'd');
        $list->appendAttempt(Middleware::tap(function (){}), 'e');

        $list->interpose(function ($step, $name) use (&$res) {
            return function (callable $h) use ($step, $name, &$res) {
                return function ($c, $r) use ($h, $step, $name, &$res) {
                    $res[] = "$step:$name";
                    return $h($c, $r);
                };
            };
        });

        $handler = $list->resolve();
        $handler(new Command('foo'), new Request('GET', 'http://foo.com'));
        $this->assertEquals(['init:a', 'validate:b', 'build:c', 'sign:d', 'attempt:e'], $res);
    }
}
