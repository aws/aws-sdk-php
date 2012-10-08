<?php

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

    public function testCrc32WorksCorrectly()
    {
        $this->assertEquals(crc32(1), HashUtils::crc32(1));
    }
}
