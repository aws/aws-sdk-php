<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Model\ScanIterator;

class ScanIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesQueryCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamo_db');

        $client->getCredentials()->unserialize(json_encode(array(
            'key'       => 'foo',
            'secret'    => 'bar',
            'token'     => 'baz',
            'token.ttd' => time() + 1000
        )));

        $mock = $this->setMockResponse($client, array(
            'dynamo_db/scan_has_more',
            'dynamo_db/scan_empty_has_more',
            'dynamo_db/scan_final',
        ));

        $iterator = new ScanIterator($client->getCommand('Scan', array(
            'TableName' => 'foo'
        )));

        $data = $iterator->toArray();
        $this->assertEquals(3, count($data));

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(3, count($requests));
        $json = json_decode((string) $requests[1]->getBody(), true);
        $this->assertArrayHasKey('ExclusiveStartKey', $json);

        $this->assertEquals(207, $iterator->getScannedCount());
    }
}
