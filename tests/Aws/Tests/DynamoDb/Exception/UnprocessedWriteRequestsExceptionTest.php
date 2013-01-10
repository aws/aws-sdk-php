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
