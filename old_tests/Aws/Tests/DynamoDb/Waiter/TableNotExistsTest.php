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

namespace Aws\Tests\DynamoDb\Waiter;

use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

class TableNotExistsTest extends AbstractWaiterTestCase
{
    public function testReturnsFalseUntilTableDoesNotExist()
    {
        $client = $this->getClient();
        $this->setMockResponse($client, array('dynamodb/describe_table', 'dynamodb/describe_table_not_found'));
        $client->waitUntil('table_not_exists', array('TableName' => 'foo', 'waiter.interval' => 0));
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     */
    public function testDoesNotBufferExceptions()
    {
        $client = $this->getClient();
        $mock = new MockPlugin(array(
            new Response(404)
        ));
        $client->getEventDispatcher()->addSubscriber($mock);
        $client->waitUntil('table_not_exists', array('TableName' => 'foo'));
    }
}
