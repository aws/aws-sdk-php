<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Model\Attribute;

class AttributeTest extends \Guzzle\Tests\GuzzleTestCase
{
    const INVALID = 'INVALID';

    /**
     * @covers Aws\DynamoDb\Model\Attribute::__construct
     * @covers Aws\DynamoDb\Model\Attribute::getValue
     * @covers Aws\DynamoDb\Model\Attribute::getType
     */
    public function testConstructorAndGettersWorkAsExpected()
    {
        $attribute = new Attribute('100', Type::NUMBER);

        $this->assertInstanceOf('Aws\DynamoDb\Model\Attribute', $attribute);
        $this->assertSame('100', $attribute->getValue());
        $this->assertSame(Type::NUMBER, $attribute->getType());
    }

    /**
     * @covers Aws\DynamoDb\Model\Attribute::__construct
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testConstructorFailsOnBadValue()
    {
        $attribute = new Attribute(100, Type::NUMBER);
    }

    /**
     * @covers Aws\DynamoDb\Model\Attribute::__construct
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testConstructorFailsOnBadType()
    {
        $attribute = new Attribute('100', 'foo');
    }

    /**
     * @covers Aws\DynamoDb\Model\Attribute::getFormatted
     */
    public function testGetFormattedProducesCorrectArrayStructure()
    {
        $attribute   = new Attribute('100', Type::NUMBER);
        $putArray    = array(Type::NUMBER => '100');
        $updateArray = array('Value' => array(Type::NUMBER => '100'));

        $this->assertSame($putArray, $attribute->getFormatted());
        $this->assertSame($putArray, $attribute->getFormatted(Attribute::FORMAT_PUT));
        $this->assertSame($updateArray, $attribute->getFormatted(Attribute::FORMAT_UPDATE));
    }

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
     * @covers Aws\DynamoDb\Model\Attribute::factory
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

    /**
     * @covers Aws\DynamoDb\Model\Attribute::factory
     */
    public function testFactoryUsesValueIfAlreadyAttribute()
    {
        $a = Attribute::factory(array(
            'foo' => 'bar'
        ));

        $this->assertSame($a, Attribute::factory($a));
    }

    /**
     * @covers Aws\DynamoDb\Model\Attribute::__toString
     */
    public function testCanBeCastToString()
    {
        $a = new Attribute(array('baz', 'bar'), 'SS');
        $this->assertEquals('baz, bar', (string) $a);
    }

    /**
     * @covers Aws\DynamoDb\Model\Attribute::toArray
     */
    public function testCanBeCastToArray()
    {
        $a = new Attribute(array('baz', 'bar'), 'SS');
        $this->assertEquals(array('SS' => array('baz', 'bar')), $a->toArray());
    }
}
