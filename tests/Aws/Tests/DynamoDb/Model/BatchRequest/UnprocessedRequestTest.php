<?php

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Model\BatchRequest\UnprocessedRequest;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\UnprocessedRequest
 */
class UnprocessedRequestTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorSetsValues()
    {
        $data = array('foo' => 'bar');
        $unprocessedRequest = new UnprocessedRequest($data, 'table');

        $this->assertSame($data, $unprocessedRequest->toArray());
        $this->assertSame('table', $unprocessedRequest->getTableName());
    }
}
