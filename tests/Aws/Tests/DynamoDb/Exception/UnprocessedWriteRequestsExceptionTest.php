<?php

namespace Aws\Tests\DynamoDb\Exception;

use Aws\DynamoDb\Exception\UnprocessedWriteRequestsException;
use Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface;

/**
 * @covers Aws\DynamoDb\Exception\UnprocessedWriteRequestsException
 */
class UnprocessedWriteRequestsExceptionTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanAddItemsToException()
    {
        $exception    = new UnprocessedWriteRequestsException();
        $interface    = 'Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface';
        $unprocessed1 = $this->getMock($interface);
        $unprocessed2 = $this->getMock($interface);

        $exception
            ->addItem($unprocessed1)
            ->addItem($unprocessed2);

        try {
            throw $exception;
        } catch (UnprocessedWriteRequestsException $e) {
            $this->assertEquals(2, count($e));
            $this->assertInstanceOf('\ArrayIterator', $e->getIterator());
        }
    }
}
