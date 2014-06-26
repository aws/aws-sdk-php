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

use Aws\DirectConnect\Enum\ConnectionState;
use Guzzle\Plugin\Log\LogPlugin;

/**
 * @group integration
 * @group example
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * CreateConnection operation example
     *
     * @example Aws\DirectConnect\DirectConnectClient::createConnection
     */
    public function testCreatesConnection()
    {
        $client = $this->getServiceBuilder()->get('directconnect', true);
        $client->getEventDispatcher()->addSubscriber(LogPlugin::getDebugPlugin());

        self::log('Create a connection');

        // @begin
        $result = $client->createConnection(array(
            'bandwidth'      => '1Gbps',
            'connectionName' => 'PHPTest',
            'location'       => 'EqDC2'
        ));

        $connectionId = $result['connectionId'];
        // @end

        $this->assertEquals(ConnectionState::REQUESTED, $result['connectionState']);

        return $connectionId;
    }

    /**
     * DescribeConnections operation example
     *
     * @depends testCreatesConnection
     * @example Aws\DirectConnect\DirectConnectClient::describeConnections
     */
    public function testDescribesConnections($connectionId)
    {
        self::log('Iterate through the connections and make sure the new one is there.');
        $client = $this->getServiceBuilder()->get('directconnect', true);

        // @begin
        $iterator = $client->getIterator('DescribeConnections');

        foreach ($iterator as $connection) {
            echo $connection['connectionId'] . "\n";
        }
        // @end
        $this->assertContains($connectionId, $this->getActualOutput());

        return $connectionId;
    }

    /**
     * DeleteConnection operation example
     *
     * @depends testDescribesConnections
     * @example Aws\DirectConnect\DirectConnectClient::deleteConnection
     */
    public function testDeletesConnection($connectionId)
    {
        $client = $this->getServiceBuilder()->get('directconnect', true);
        self::log('Delete the connection and make sure it is in the deleted state.');

        // @begin
        $result = $client->deleteConnection(array(
            'connectionId' => $connectionId
        ));

        echo $result['connectionState'];
        // @end

        $this->assertEquals('deleted', $this->getActualOutput());
    }
}
