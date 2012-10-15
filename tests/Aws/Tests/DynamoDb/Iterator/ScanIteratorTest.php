<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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
