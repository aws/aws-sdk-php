<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Model\Key;

/**
 * @covers Aws\DynamoDb\Model\Key
 */
class KeyTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorSetsValues()
    {
        $key = new Key('foo');
        $this->assertEquals('foo', $key->getHashKey());
        $this->assertNull($key->getRangeKey());

        $key = new Key('foo', 'bar');
        $this->assertEquals('foo', $key->getHashKey());
        $this->assertEquals('bar', $key->getRangeKey());
    }

    public function testConstructorSetsValuesWithRawKeys()
    {
        $key = new Key(array(
            'HashKeyElement'  => array('S' => 'foo'),
        ));
        $this->assertEquals('foo', $key->getHashKey());
        $this->assertNull($key->getRangeKey());

        $key = new Key(array(
            'HashKeyElement'  => array('S' => 'foo'),
            'RangeKeyElement' => array('N' => '123'),
        ));
        $this->assertEquals('foo', $key->getHashKey());
        $this->assertEquals(123, $key->getRangeKey());
    }

    public function testCanSetAndRetrieveValues()
    {
        $key = new Key('foo');
        $key->setHashKey('baz');
        $key->setRangeKey(array(1, 2, 3));
        $this->assertEquals('baz', $key->getHashKey());
        $this->assertEquals(array(1, 2, 3), $key->getRangeKey());
    }

    public function testCanConvertToArray()
    {
        $key = new Key('foo', 123);
        $this->assertEquals(array(
            'HashKeyElement'  => array('S' => 'foo'),
            'RangeKeyElement' => array('N' => '123'),
        ), $key->toArray());
    }

    public function testCanConvertToArrayWithoutRangeKey()
    {
        $key = new Key('foo');
        $this->assertEquals(array(
            'HashKeyElement'  => array('S' => 'foo')
        ), $key->toArray());
    }
}
