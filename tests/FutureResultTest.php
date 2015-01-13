<?php
namespace Aws\Test\Common;

use Aws\FutureResult;
use Aws\Result;
use React\Promise\FulfilledPromise;

/**
 * @covers Aws\FutureResult
 */
class ResultModelTest extends \PHPUnit_Framework_TestCase
{
    public function testHasData()
    {
        $c = new FutureResult(new FulfilledPromise(new Result(['a' => 1])));
        $this->assertEquals(['a' => 1], $c->wait()->toArray());
    }

    public function testResultCanBeToArray()
    {
        $c = new FutureResult(new FulfilledPromise(new Result(['foo' => 'bar'])));
        $c->wait();
        $this->assertEquals('bar', $c['foo']);
        $this->assertEquals(1, count($c));
    }

    public function testResultCanBeSearched()
    {
        $c = new FutureResult(
            new FulfilledPromise(
                new Result(['foo' => ['bar' => 'baz']])
            )
        );
        $this->assertEquals('baz', $c->search('foo.bar'));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testValidatesResult()
    {
        $c = new FutureResult(new FulfilledPromise('foo'));
        $c->wait();
    }

    public function testProxiesToUnderlyingData()
    {
        $c = new FutureResult(new FulfilledPromise(new Result(['a' => 1])));
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
        $c = new FutureResult(new FulfilledPromise(new Result(['a' => 1])));
        $c->notThere;
    }

    /**
     * @expectedException \GuzzleHttp\Ring\Exception\CancelledFutureAccessException
     */
    public function testThrowsWhenAccessingCancelledFuture()
    {
        $c = new FutureResult(new FulfilledPromise(new Result([])));
        $c->cancel();
        $c['foo'];
    }
}
