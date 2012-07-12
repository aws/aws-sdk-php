<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Iterator\ScanIterator;

/**
 * @covers Aws\DynamoDb\Iterator\ScanIterator
 */
class ScanIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesQueryCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamodb');
        $mock = $this->setMockResponse($client, array(
            'dynamodb/scan_has_more',
            'dynamodb/scan_empty_has_more',
            'dynamodb/scan_final',
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
