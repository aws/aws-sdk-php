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

namespace Aws\Tests\DirectConnect\Integration;

use Aws\DirectConnect\DirectConnectClient;
use Aws\DirectConnect\Enum\ConnectionState;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var DirectConnectClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('directconnect');
    }

    public function testBasicOperations()
    {
        self::log('Get an offering ID and region to use.');
        $offerings = $this->client->describeOfferings()->get('offerings');
        $offering = $offerings[array_rand($offerings)];
        $this->client->setRegion($offering['region']);

        self::log('Create a connection and make sure it is in the requested state.');
        $result = $this->client->createConnection(array(
            'connectionName' => 'PHP Integ Test Connection',
            'offeringId'     => $offering['offeringId'],
        ));
        $connectionId = $result->get('connectionId');
        $this->assertEquals(ConnectionState::REQUESTED, $result->get('connectionState'));

        self::log('Iterate through the connections and make sure the new one is there.');
        $found = false;
        foreach ($this->client->getIterator('DescribeConnections') as $connection) {
            if ($connection['connectionId'] == $connectionId) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found);

        self::log('Delete the connection and make sure it is in the deleted state.');
        $result = $this->client->deleteConnection(array('connectionId' => $connectionId));
        $this->assertEquals(ConnectionState::DELETED, $result->get('connectionState'));
    }
}
