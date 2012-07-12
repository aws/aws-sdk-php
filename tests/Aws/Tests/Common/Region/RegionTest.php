<?php

namespace Aws\Tests\Common\Region;

use Aws\Common\Region\Region;

/**
 * @covers Aws\Common\Region\Region
 */
class RegionTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasName()
    {
        $region = new Region('foo');
        $this->assertEquals('foo', $region->getName());
    }

    public function testConvertsToString()
    {
        $region = new Region('foo');
        $this->assertEquals('foo', (string) $region);
    }
}
