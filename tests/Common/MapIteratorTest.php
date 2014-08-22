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
        $i = new MapIterator(new \ArrayIterator(range(0, 100)), function ($value) {
            return $value * 10;
        });

        $this->assertEquals(range(0, 1000, 10), iterator_to_array($i, false));
    }
}
