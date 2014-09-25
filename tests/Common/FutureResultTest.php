<?php
namespace Aws\Test\Common;

use Aws\Common\FutureResult;
use Aws\Common\Result;

/**
 * @covers Aws\Common\FutureResult
 */
class ResultModelTest extends \PHPUnit_Framework_TestCase
{
    public function testHasData()
    {
        $called = false;
        $c = new FutureResult(function () use (&$called) {
            $called = true;
            return ['a' => 1];
        });
        $this->assertFalse($called);
        $this->assertEquals(['a' => 1], $c->deref()->toArray());
        $this->assertTrue($called);
    }

    public function testCatchesExceptionInToString()
    {
        $c = new FutureResult(function () use (&$called) {
            return null;
        });
        $output = '';
        set_error_handler(function () use (&$output) {
            $output = func_get_args()[1];
        });
        echo $c;
        restore_error_handler();
        $this->assertContains('Found NULL', $output);
    }

    public function testResultCanBeToArray()
    {
        $c = new FutureResult(function () use (&$called) {
            return new Result(['foo' => 'bar']);
        });
        $c->deref();
        $this->assertEquals('bar', $c['foo']);
        $this->assertEquals(1, count($c));
    }

    public function testResultCanBeSearched()
    {
        $c = new FutureResult(function () {
            return new Result(['foo' => ['bar' => 'baz']]);
        });
        $this->assertEquals('baz', $c->search('foo.bar'));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testValidatesResult()
    {
        $c = new FutureResult(function () use (&$called) {
            return true;
        });
        $c->deref();
    }

    public function testProxiesToUnderlyingData()
    {
        $c = new FutureResult(function () { return ['a' => 1]; });
        $this->assertEquals(1, count($c));
        $this->assertEquals(['a' => 1], $c->toArray());
        $this->assertEquals(['a' => 1], $c->getIterator()->getArrayCopy());
        $this->assertEquals(1, $c['a']);
        $this->assertEquals(1, $c->get('a'));
        $this->assertNull($c['b']);
        $this->assertTrue(isset($c['a']));
        $c['b'] = 2;
        $this->assertTrue(isset($c['b']));
        unset($c['b']);
        $this->assertFalse(isset($c['b']));
        $this->assertEquals(1, $c->getPath('a'));
        $c->setPath('foo/bar', 'baz');
        $this->assertEquals('baz', $c['foo']['bar']);
        $this->assertTrue($c->hasKey('a'));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testThrowsWhenPropertyInvalid()
    {
        $c = new FutureResult(function () { return ['a' => 1]; });
        $c->notThere;
    }

    /**
     * @expectedException \GuzzleHttp\Ring\Exception\CancelledFutureAccessException
     */
    public function testThrowsWhenAccessingCancelledFuture()
    {
        $c = new FutureResult(function () {});
        $c->cancel();
        $c['foo'];
    }
}
