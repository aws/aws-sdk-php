<?php

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Model\BatchRequest\AbstractWriteRequest;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\AbstractWriteRequest
 */
class AbstractWriteRequestTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanGetTable()
    {
        $writeRequest = $this->getMockForAbstractClass('Aws\DynamoDb\Model\BatchRequest\AbstractWriteRequest');
        $reflected = new \ReflectionProperty('Aws\DynamoDb\Model\BatchRequest\AbstractWriteRequest', 'tableName');
        $reflected->setAccessible(true);
        $reflected->setValue($writeRequest, 'table');

        $this->assertSame('table', $writeRequest->getTableName());
    }
}
