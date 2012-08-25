<?php

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
}
