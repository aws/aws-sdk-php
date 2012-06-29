<?php

namespace Aws\Tests\DynamoDb\Exception;

use Aws\DynamoDb\Exception\UnprocessedWriteRequestsException;
use Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface;

/**
 * @covers Aws\DynamoDb\Exception\UnprocessedWriteRequestsException
 */
class UnprocessedWriteRequestsExceptionTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanAddAndGetItems()
    {
        $exception    = new UnprocessedWriteRequestsException();
        $unprocessed1 = $this->getMock('Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface');
        $unprocessed2 = $this->getMock('Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface');

        $exception->addItem($unprocessed1)->addItem($unprocessed2);

        try {
            throw $exception;
        } catch (UnprocessedWriteRequestsException $e) {
            $items = $e->getItems();
        }

        $this->assertSame($items[0], $unprocessed1);
        $this->assertSame($items[1], $unprocessed2);
    }
}
