<?php
namespace Aws\Test;

use Aws\Result;

/**
 * @covers Aws\Result
 */
class ResultTest extends \PHPUnit_Framework_TestCase
{
    public function testHasData()
    {
        $c = new Result(['a' => 'b', 'c' => 'd']);
        $this->assertEquals('b', $c['a']);
        $this->assertEquals('d', $c['c']);
        $this->assertEquals('d', $c->get('c'));
        $this->assertTrue($c->hasKey('c'));
        $this->assertFalse($c->hasKey('f'));
        $this->assertEquals('b', $c->search('a'));
        $this->assertContains('Model Data', (string) $c);
    }
}
