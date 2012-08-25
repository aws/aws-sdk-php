<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Model\Attribute;

/**
 * @covers Aws\DynamoDb\Model\AbstractAttribute
 */
class AbstractAttributeTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testSettersAndGettersWorkAsExpected()
    {
        /** @var $attribute \Aws\DynamoDb\Model\AbstractAttribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\AbstractAttribute');
        $this->assertSame($attribute, $attribute->setValue('100'));
        $this->assertSame($attribute, $attribute->setType(Type::NUMBER));
        $this->assertSame('100', $attribute->getValue());
        $this->assertSame(Type::NUMBER, $attribute->getType());
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testSetValueFailsOnBadValue()
    {
        /** @var $attribute \Aws\DynamoDb\Model\AbstractAttribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\AbstractAttribute');
        $attribute->setValue(100);
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testSetTypeFailsOnBadType()
    {
        /** @var $attribute \Aws\DynamoDb\Model\AbstractAttribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\AbstractAttribute');
        $attribute->setType('foo');
    }

    public function testGetFormattedProducesCorrectArrayStructure()
    {
        /** @var $attribute \Aws\DynamoDb\Model\AbstractAttribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\AbstractAttribute');
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
        /** @var $attribute \Aws\DynamoDb\Model\AbstractAttribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\AbstractAttribute');
        $attribute->setValue(array('baz', 'bar'));
        $attribute->setType(Type::STRING_SET);

        $this->assertEquals('baz, bar', (string) $attribute);
    }

    public function testCanBeCastToArray()
    {
        /** @var $attribute \Aws\DynamoDb\Model\AbstractAttribute */
        $attribute = $this->getMockForAbstractClass('Aws\DynamoDb\Model\AbstractAttribute');
        $attribute->setValue(array('baz', 'bar'));
        $attribute->setType(Type::STRING_SET);

        $this->assertEquals(array('SS' => array('baz', 'bar')), $attribute->toArray());
    }
}
