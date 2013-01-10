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

namespace Aws\Tests\Common\Hash;

use Aws\Common\Hash\HashUtils;

/**
 * @covers \Aws\Common\Hash\HashUtils
 */
class HashUtilsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHexBinConversionsWorkCorrectly()
    {
        $hex = "5a4b";
        $bin = "ZK";

        $this->assertEquals($hex, HashUtils::binToHex($bin));
        $this->assertEquals($bin, HashUtils::hexToBin($hex));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionForInvalidAlgorithm()
    {
        HashUtils::validateAlgorithm('foobar');
    }

    public function testReturnsTrueForValidAlgorithm()
    {
        $this->assertTrue(HashUtils::validateAlgorithm('md5'));
    }
}
