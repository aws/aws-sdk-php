<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Model\ListTablesIterator;

class ListTableIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesListTableCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamo_db');
        $client->getCredentials()->unserialize(json_encode(array(
            'key'       => 'foo',
            'secret'    => 'bar',
            'token'     => 'baz',
            'token.ttd' => time() + 1000
        )));

        $mock = $this->setMockResponse($client, array(
            'dynamo_db/list_tables_has_more',
            'dynamo_db/list_tables_final'
        ));

        $iterator = new ListTablesIterator($client->getCommand('ListTables'));

        $this->assertEquals(array('Table1', 'Table2', 'Table3', 'Table4', 'Table5'), $iterator->toArray());

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(2, count($requests));
        $json = json_decode((string) $requests[1]->getBody(), true);
        $this->assertEquals('Table3', $json['ExclusiveStartTableName']);
    }
}
