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
