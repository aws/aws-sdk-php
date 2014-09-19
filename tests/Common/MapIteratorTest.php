<?php

namespace Aws\Test\Common;

use Aws\Common\MapIterator;

/**
 * @covers Aws\Common\MapIterator
 */
class MapIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testMapsValues()
    {
        $i = new MapIterator(new \ArrayIterator([1, 2]), function ($value) {
            return $value + 1;
        });

        $i->rewind();
        $this->assertTrue($i->valid());
        $this->assertEquals([2, 3], iterator_to_array($i, false));
    }
}
