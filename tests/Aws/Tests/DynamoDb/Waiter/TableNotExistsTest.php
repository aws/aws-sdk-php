<?php

namespace Aws\Tests\DynamoDb\Waiter;

use Guzzle\Http\Message\Response;
use Guzzle\Http\Plugin\MockPlugin;

/**
 * @covers Aws\DynamoDb\Waiter\TableNotExists
 */
class TableNotExistsTest extends AbstractWaiter
{
    public function testReturnsFalseUntilTableDoesNotExist()
    {
        $client = $this->getClient();
        $this->setMockResponse($client, array('dynamodb/describe_table', 'dynamodb/describe_table_not_found'));
        $client->waitUntil('table_not_exists', 'foo', array(
            'interval' => 0
        ));
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage Maximum number of failures while waiting: 1
     */
    public function testDoesNotBufferExceptions()
    {
        $client = $this->getClient();
        $mock = new MockPlugin(array(
            new Response(404)
        ));
        $client->getEventDispatcher()->addSubscriber($mock);
        $client->waitUntil('table_not_exists', 'foo');
    }
}
