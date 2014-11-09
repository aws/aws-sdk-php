<?php
namespace Aws\Test\Common;

use Aws\Common\FlatMapIterator;

/**
 * @covers Aws\Common\FlatMapIterator
 */
class FlatMapIteratorTest extends \PHPUnit_Framework_TestCase
{
     public function testIterates()
     {
         $iter = new \ArrayIterator([[1, 2], [3, 4]]);
         $flat = new FlatMapIterator($iter, function ($value) {
             return array_map(function ($value) {
                 return $value + 1;
             }, $value);
         });
         $this->assertEquals([2, 3, 4, 5], iterator_to_array($flat));
     }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Each value returned by the map function must be an array or instance of \Iterator. Found string(1) on iteration #2
     */
    public function testEnsuresMapResultIsValid()
    {
        $iter = new \ArrayIterator([[1, 2], "A"]);
        $flat = new FlatMapIterator($iter, function ($v) { return $v; });
        iterator_to_array($flat);
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Each value returned by the map function must be an array or instance of \Iterator. Found object(stdClass) on iteration #2
     */
    public function testEnsuresMapResultIsValidObject()
    {
        $iter = new \ArrayIterator([[1, 2], new \stdClass()]);
        $flat = new FlatMapIterator($iter, function ($v) { return $v; });
        iterator_to_array($flat);
    }

    public function testCanIterateManuallyWithCurrentFirst()
    {
        $iter = new \ArrayIterator([[1, 2], [3, 4]]);
        $flat = new FlatMapIterator($iter, function ($value) {
            return array_map(function ($value) {
                return $value + 1;
            }, $value);
        });
        $this->assertEquals(2, $flat->current());
        $flat->next();
        $this->assertTrue($flat->valid());
        $this->assertEquals(3, $flat->current());
        $flat->next();
        $this->assertTrue($flat->valid());
        $this->assertEquals(4, $flat->current());
        $flat->next();
        $this->assertTrue($flat->valid());
        $this->assertEquals(5, $flat->current());
        $flat->next();
        $this->assertFalse($flat->valid());
    }

    public function testCanIterateWithValidFirst()
    {
        $iter = new \ArrayIterator([[1], [2]]);
        $flat = new FlatMapIterator($iter, function ($value) { return $value; });
        $this->assertTrue($iter->valid());
        $this->assertEquals(1, $flat->current());
        $flat->next();
        $this->assertTrue($flat->valid());
        $this->assertEquals(2, $flat->current());
        $flat->next();
        $this->assertFalse($flat->valid());
    }

    public function testCanIterateWithRewindFirst()
    {
        $iter = new \ArrayIterator([[1], [2]]);
        $flat = new FlatMapIterator($iter, function ($value) { return $value; });
        $iter->rewind();
        $this->assertEquals(1, $flat->current());
        $flat->next();
        $this->assertTrue($flat->valid());
        $this->assertEquals(2, $flat->current());
        $flat->next();
        $this->assertFalse($flat->valid());
    }

    public function testCanRewind()
    {
        $iter = new \ArrayIterator([[1], [2]]);
        $flat = new FlatMapIterator($iter, function ($value) { return $value; });
        $this->assertEquals([1, 2], iterator_to_array($flat));
        $this->assertEquals([1, 2], iterator_to_array($flat));
    }

    public function testCanRewindMidIter()
    {
        $iter = new \ArrayIterator([[1, 2, 3, 4], [2]]);
        $flat = new FlatMapIterator($iter, function ($value) { return $value; });
        $flat->next();
        $flat->next();
        $flat->rewind();
        $this->assertEquals([1, 2, 3, 4, 2], iterator_to_array($flat));
    }

    public function testCanHandleEmptyArrays()
    {
        $iter = new \ArrayIterator([[1], [], [], [2], [], [3], []]);
        $flat = new FlatMapIterator($iter, function ($value) { return $value; });
        $this->assertEquals([1, 2, 3], iterator_to_array($flat));
    }

    public function testCanHandleEmptyArraysWithPos()
    {
        $iter = new \ArrayIterator([[1], [], [], [2], [], [3], []]);
        $flat = new FlatMapIterator($iter, function ($value) { return $value; });
        $this->assertEquals(1, $flat->current());
        $this->assertEquals(0, $flat->key());
        $flat->next();
        $this->assertTrue($flat->valid());
        $this->assertEquals(2, $flat->current());
        $this->assertEquals(1, $flat->key());
        $flat->next();
        $this->assertTrue($flat->valid());
        $this->assertEquals(3, $flat->current());
        $this->assertEquals(2, $flat->key());
        $flat->next();
        $this->assertFalse($flat->valid());
    }
}
