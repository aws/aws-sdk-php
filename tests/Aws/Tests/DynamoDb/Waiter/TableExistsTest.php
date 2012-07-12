<?php

namespace Aws\Tests\DynamoDb\Waiter;

use Guzzle\Http\Message\Response;
use Guzzle\Http\Plugin\MockPlugin;

/**
 * @covers Aws\DynamoDb\Waiter\TableExists
 */
class TableExistsTest extends AbstractWaiter
{
    public function testReturnsTrueIfTableExists()
    {
        $client = $this->getClient();
        $this->setMockResponse($client, 'dynamodb/describe_table');
        $client->waitUntil('table_exists', 'foo');
    }

    public function testReturnsTrueIfTableExistsAndHasStatusMatching()
    {
        $client = $this->getClient();
        $this->setMockResponse($client, 'dynamodb/describe_table');
        $client->waitUntil('table_exists', 'foo', array(
            'status' => 'ACTIVE'
        ));
    }

    public function testBuffersResourceNotFoundExceptions()
    {
        $client = $this->getClient();
        $this->setMockResponse($client, array('dynamodb/describe_table_not_found', 'dynamodb/describe_table'));
        $client->waitUntil('table_exists', 'foobazbar', array(
            'interval' => 0
        ));
        $this->assertEquals(2, count($this->getMockedRequests()));
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage Maximum number of failures while waiting: 1
     */
    public function testDoesNotBufferOtherExceptions()
    {
        $client = $this->getClient();
        $mock = new MockPlugin(array(
            new Response(404)
        ));
        $client->getEventDispatcher()->addSubscriber($mock);
        $client->waitUntil('table_exists', 'foo');
    }
}
