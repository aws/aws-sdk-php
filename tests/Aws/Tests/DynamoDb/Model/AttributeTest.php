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

use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Model\Attribute;

/**
 * @covers Aws\DynamoDb\Model\Attribute
 */
class AttributeTest extends \Guzzle\Tests\GuzzleTestCase
{
    const INVALID = 'INVALID';

    public function dataForAttributeFactory()
    {
        return array(
            // Empty
            array( '',          self::INVALID ),
            array( null,        self::INVALID ),
            array( array(),     self::INVALID ),
            array( array(null), self::INVALID ),

            // Strings
            array( 'foo',        '{"S":"foo"}' ),
            array( array('foo'), '{"SS":["foo"]}' ),
            array( array('foo',  'bar', 'baz'), '{"SS":["foo","bar","baz"]}' ),

            // Numbers
            array( 1,                    '{"N":"1"}' ),
            array( 0,                    '{"N":"0"}' ),
            array( 50,                   '{"N":"50"}' ),
            array( 1.23,                 '{"N":"1.23"}' ),
            array( 1e10,                 '{"N":"10000000000"}' ),
            array( array(1),             '{"NS":["1"]}' ),
            array( array(0),             '{"NS":["0"]}' ),
            array( array(1, 2, 3),       '{"NS":["1","2","3"]}' ),
            array( array(1.2, 3.4, 5.6), '{"NS":["1.2","3.4","5.6"]}' ),

            // Numerical Strings
            array( '1',                        '{"S":"1"}' ),
            array( '0',                        '{"S":"0"}' ),
            array( '50',                       '{"S":"50"}' ),
            array( '1.23',                     '{"S":"1.23"}' ),
            array( '1e10',                     '{"S":"1e10"}' ),
            array( array('1'),                 '{"SS":["1"]}' ),
            array( array('0'),                 '{"SS":["0"]}' ),
            array( array('1', '2', '3'),       '{"SS":["1","2","3"]}' ),
            array( array('1.2', '3.4', '5.6'), '{"SS":["1.2","3.4","5.6"]}' ),

            // Boolean
            array( true,         '{"N":"1"}' ),
            array( false,        '{"N":"0"}' ),
            array( array(true),  '{"NS":["1"]}' ),
            array( array(false), '{"NS":["0"]}' ),

            // Complex Types
            array( new \stdClass(),                self::INVALID ),
            array( new Foo(),                      '{"S":"foo"}' ),
            array( fopen(__FILE__, 'r'),           self::INVALID ),
            array( new \ArrayObject(array('foo')), '{"SS":["foo"]}' ),

            // Combination
            array( array('foo', 1), self::INVALID ),

            // Deep Array
            array( array(array(1)), self::INVALID ),
        );
    }

    /**
     * @dataProvider dataForAttributeFactory
     */
    public function testAttributeFactoryProducesExpectedResults($value, $expected)
    {
        if (self::INVALID === $expected) {
            $this->setExpectedException('\\Aws\\Common\\Exception\\InvalidArgumentException');
        }

        $attribute = Attribute::factory($value);

        $this->assertSame($expected, json_encode($attribute->getFormatted()));
    }

    public function testFactoryUsesValueIfAlreadyAttribute()
    {
        $a = Attribute::factory(array(
            'foo' => 'bar'
        ));

        $this->assertSame($a, Attribute::factory($a));
    }

    public function testSettersAndGettersWorkAsExpected()
    {
        /** @var $attribute \Aws\DynamoDb\Model\Attribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\Attribute', array('foo'));
        $this->assertSame($attribute, $attribute->setValue('100'));
        $this->assertSame($attribute, $attribute->setType(Type::NUMBER));
        $this->assertSame('100', $attribute->getValue());
        $this->assertSame(Type::NUMBER, $attribute->getType());
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testSetValueFailsOnBadValue()
    {
        /** @var $attribute \Aws\DynamoDb\Model\Attribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\Attribute', array('foo'));
        $attribute->setValue(100);
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testSetTypeFailsOnBadType()
    {
        /** @var $attribute \Aws\DynamoDb\Model\Attribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\Attribute', array('foo'));
        $attribute->setType('foo');
    }

    public function testGetFormattedProducesCorrectArrayStructure()
    {
        /** @var $attribute \Aws\DynamoDb\Model\Attribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\Attribute', array('foo'));
        $attribute->setValue('100');
        $attribute->setType(Type::NUMBER);

        $putArray    = array(Type::NUMBER => '100');
        $updateArray = array('Value' => array(Type::NUMBER => '100'));

        $this->assertSame($putArray, $attribute->getFormatted());
        $this->assertSame($putArray, $attribute->getFormatted(Attribute::FORMAT_PUT));
        $this->assertSame($updateArray, $attribute->getFormatted(Attribute::FORMAT_UPDATE));
        $this->assertSame($updateArray, $attribute->getFormatted(Attribute::FORMAT_EXPECTED));
    }

    public function testCanBeCastToString()
    {
        /** @var $attribute \Aws\DynamoDb\Model\Attribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\Attribute', array('foo'));
        $attribute->setValue(array('baz', 'bar'));
        $attribute->setType(Type::STRING_SET);

        $this->assertEquals('baz, bar', (string) $attribute);
    }

    public function testCanBeCastToArray()
    {
        /** @var $attribute \Aws\DynamoDb\Model\Attribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\Attribute', array('foo'));
        $attribute->setValue(array('baz', 'bar'));
        $attribute->setType(Type::STRING_SET);
        $this->assertEquals(array('SS' => array('baz', 'bar')), $attribute->toArray());
    }
}
