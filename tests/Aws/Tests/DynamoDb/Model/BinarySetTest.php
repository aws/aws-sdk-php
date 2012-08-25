<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Model\BinarySet;

/**
 * @covers Aws\DynamoDb\Model\BinarySet
 */
class BinarySetTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testSettingOfBinaryDoesEncoding()
    {
        $binary = new BinarySet(array('foo'));
        $this->assertSame(Type::BINARY_SET, $binary->getType());
        $this->assertSame(array(base64_encode('foo')), $binary->getValue());
    }
}
