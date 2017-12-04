<?php
namespace Aws\Test;

use Aws\Result;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Result
 */
class ResultTest extends TestCase
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

    public function testCanIndirectlyModifyLikeAnArray()
    {
        $result = new Result([
            'foo' => ['baz' => 'bar'],
            'qux' => 0
        ]);
        $this->assertNull($result['missing']);
        $this->assertEquals(['baz' => 'bar'], $result['foo']);
        $result['foo']['lorem'] = 'ipsum';
        $this->assertEquals(['baz' => 'bar', 'lorem' => 'ipsum'], $result['foo']);
        unset($result['foo']['baz']);
        $this->assertEquals(['lorem' => 'ipsum'], $result['foo']);
        $q = $result['qux'];
        $q = 100;
        $this->assertSame(0, $result['qux']);
    }

    public function testCanGetByPath()
    {
        $r = new Result(['bar' => ['baz' => 'qux']]);
        $this->assertEquals('qux', $r->getPath('bar/baz'));
    }
}
