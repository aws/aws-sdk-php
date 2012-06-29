<?php

namespace Aws\Tests\Common;

use Aws\Common\Enum;

class ConcreteEnum extends Enum
{
    const A = 1;
    const B = 2;
    const C = 3;
}

class EnumTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\Enum
     */
    public function testAbstractEnumValuesShouldBeEmpty()
    {
        $this->assertEquals(array(), Enum::values());
    }

    /**
     * @covers Aws\Common\Enum
     */
    public function testAbstractEnumKeysShouldBeEmpty()
    {
        $this->assertEquals(array(), Enum::keys());
    }

    /**
     * @covers Aws\Common\Enum
     */
    public function testConcreteEnumValuesAreCorrect()
    {
        $expected = array(
            'A' => 1,
            'B' => 2,
            'C' => 3,
        );

        $this->assertSame($expected, ConcreteEnum::values());
    }

    /**
     * @covers Aws\Common\Enum
     */
    public function testConcreteEnumConstantNamesAreCorrect()
    {
        $expected = array('A', 'B', 'C');

        $this->assertSame($expected, ConcreteEnum::keys());
    }
}
