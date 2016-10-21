<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\Keywords;

/**
 * @covers \Aws\DynamoDb\Keywords
 */
class KeywordsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Aws\DynamoDb\Keywords::isReserved
     */
    public function testChecksIfWordIsReserved()
    {
        $this->assertFalse(Keywords::isReserved('FOO'));
        $this->assertTrue(Keywords::isReserved('NAME'));
        $this->assertTrue(Keywords::isReserved('name'));
    }

    /**
     * @covers \Aws\DynamoDb\Keywords::notReserved()
     */
    public function testChecksIfWordIsNotReserved()
    {
        $this->assertTrue(Keywords::notReserved('FOO'));
        $this->assertFalse(Keywords::notReserved('NAME'));
        $this->assertFalse(Keywords::notReserved('name'));
    }
}
