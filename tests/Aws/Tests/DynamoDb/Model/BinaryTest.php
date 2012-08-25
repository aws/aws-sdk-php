<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Model\Binary;

/**
 * @covers Aws\DynamoDb\Model\Binary
 */
class BinaryTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testSettingOfBinaryDoesEncoding()
    {
        $binary = new Binary('foo');
        $this->assertSame(Type::BINARY, $binary->getType());
        $this->assertSame(base64_encode('foo'), $binary->getValue());
    }
}
