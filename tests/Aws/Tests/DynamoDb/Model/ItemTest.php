<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Model\Item;
use Aws\DynamoDb\Model\Attribute;

class ItemTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getItem()
    {
        return new Item(array(
            'foo' => array('S' => 'bar'),
            'baz' => array('SS' => array('yo', 'to'))
        ));
    }

    /**
     * @covers Aws\DynamoDb\Model\Item::__construct
     * @covers Aws\DynamoDb\Model\Item::replace
     * @covers Aws\DynamoDb\Model\Item::add
     * @covers Aws\DynamoDb\Model\Item::toArray
     */
    public function testConstructorInitializesAttributes()
    {
        $item = $this->getItem();

        $this->assertEquals(array(
            'foo' => array(
                'S' => 'bar'
            ),
            'baz' => array(
                'SS' => array('yo', 'to')
            )
        ), $item->toArray());
    }

    /**
     * @covers Aws\DynamoDb\Model\Item::fromArray
     */
    public function testCanCreateFromArray()
    {
        $item = Item::fromArray(array(
            'foo'  => 'bar',
            'baz'  => array(1, 2, 3),
            'list' => array('foo', 'bar'),
            'test' => 2
        ));

        $this->assertEquals('S', $item->get('foo')->getType());
        $this->assertEquals('bar', $item['foo']);

        $this->assertEquals('NS', $item->get('baz')->getType());
        $this->assertEquals(array(1, 2, 3), $item['baz']->getValue());

        $this->assertEquals('SS', $item->get('list')->getType());
        $this->assertEquals(array('foo', 'bar'), $item['list']->getValue());

        $this->assertEquals('N', $item->get('test')->getType());
        $this->assertEquals(2, $item['test']->getValue());
    }

    /**
     * @covers Aws\DynamoDb\Model\Item::count
     * @covers Aws\DynamoDb\Model\Item::getIterator
     * @covers Aws\DynamoDb\Model\Item::offsetExists
     * @covers Aws\DynamoDb\Model\Item::offsetSet
     * @covers Aws\DynamoDb\Model\Item::offsetUnset
     * @covers Aws\DynamoDb\Model\Item::offsetGet
     */
    public function testItemCanBeUsedAsAnArray()
    {
        $item = $this->getItem();
        $this->assertEquals(2, count($item));
        $this->assertEquals(2, count($item->getIterator()));
        $this->assertEquals('bar', $item['foo']);
        $this->assertEquals(array('yo', 'to'), $item['baz']->getValue());
        $this->assertFalse($item->offsetExists('dingo'));

        $item->offsetSet('test', 'Cool');
        $this->assertEquals('Cool', $item['test']);

        $item->offsetUnset('foo');
        $this->assertNull($item['foo']);
    }

    /**
     * @covers Aws\DynamoDb\Model\Item::getTableName
     * @covers Aws\DynamoDb\Model\Item::setTableName
     */
    public function testItemOwnsTable()
    {
        $item = $this->getItem();
        $this->assertNull($item->getTableName());
        $this->assertSame($item, $item->setTableName('foo'));
        $this->assertEquals('foo', $item->getTableName());
    }

    /**
     * @covers Aws\DynamoDb\Model\Item::get
     * @covers Aws\DynamoDb\Model\Item::has
     * @covers Aws\DynamoDb\Model\Item::add
     * @covers Aws\DynamoDb\Model\Item::all
     * @covers Aws\DynamoDb\Model\Item::remove
     * @covers Aws\DynamoDb\Model\Item::keys
     */
    public function testCanAccessAttributes()
    {
        $item = $this->getItem();
        $this->assertEquals(array('foo', 'baz'), $item->keys());

        $this->assertInstanceOf('Aws\\DynamoDb\\Model\\Attribute', $item->get('foo'));
        $this->assertTrue($item->has('foo'));
        $this->assertFalse($item->has('fooooooo'));
        $this->assertNull($item->get('fooooo'));

        $all = $item->all();
        foreach ($all as $k => $v) {
            $this->assertInternalType('string', $k);
            $this->assertInstanceOf('Aws\\DynamoDb\\Model\\Attribute', $v);
        }

        $this->assertSame($item, $item->remove('foo'));
        $this->assertFalse($item->has('foo'));
    }
}
