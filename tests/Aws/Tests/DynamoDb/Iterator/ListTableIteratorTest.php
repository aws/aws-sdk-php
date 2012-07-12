<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Iterator\ListTablesIterator;

/**
 * @covers Aws\DynamoDb\Iterator\ListTablesIterator
 */
class ListTableIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesListTableCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamodb');
        $mock = $this->setMockResponse($client, array(
            'dynamodb/list_tables_has_more',
            'dynamodb/list_tables_final'
        ));

        $iterator = new ListTablesIterator($client->getCommand('ListTables'));

        $this->assertEquals(array('Table1', 'Table2', 'Table3', 'Table4', 'Table5'), $iterator->toArray());

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(2, count($requests));
        $json = json_decode((string) $requests[1]->getBody(), true);
        $this->assertEquals('Table3', $json['ExclusiveStartTableName']);
    }
}
