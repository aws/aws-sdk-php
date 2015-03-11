<?php
namespace Aws\Test;

use Aws\ResultPromise;
use Aws\Result;

/**
 * @covers Aws\ResultPromise
 */
class ResultModelTest extends \PHPUnit_Framework_TestCase
{
    public function testHasData()
    {
        $c = new ResultPromise(function () use (&$c) {
            $c->resolve(new Result(['a' => 1]));
        });
        $this->assertEquals(['a' => 1], $c->wait()->toArray());
    }

    public function testResultCanBeToArray()
    {
        $c = new ResultPromise(function () use (&$c) {
            $c->resolve(new Result(['foo' => 'bar']));
        });
        $c->wait();
        $this->assertEquals('bar', $c['foo']);
        $this->assertEquals(1, count($c));
    }

    public function testResultCanBeSearched()
    {
        $c = new ResultPromise(function () use (&$c) {
            $c->resolve(new Result(['foo' => ['bar' => 'baz']]));
        });

        $this->assertEquals('baz', $c->search('foo.bar'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesResult()
    {
        $c = new ResultPromise(function () use (&$c) { $c->resolve('abc'); });
        $c->wait();
    }

    public function testProxiesToUnderlyingData()
    {
        $c = new ResultPromise(function () use (&$c) {
            $c->resolve(new Result(['a' => 1]));
        });
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
        $this->assertTrue($c->hasKey('a'));
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testThrowsWhenPropertyInvalid()
    {
        $c = new ResultPromise(function () use (&$c) {
            $c->resolve(new Result(['a' => 1]));
        });
        $c->notThere;
    }
}
