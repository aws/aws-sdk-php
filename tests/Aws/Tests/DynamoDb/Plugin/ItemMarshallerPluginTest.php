<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Plugin\ItemMarshallerPlugin;

class ItemMarshallerPluginTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\DynamoDb\Plugin\ItemMarshallerPlugin::getSubscribedEvents
     */
    public function testSubscribesToEvents()
    {
        $this->assertInternalType('array', ItemMarshallerPlugin::getSubscribedEvents());
    }

    /**
     * @covers Aws\DynamoDb\Plugin\ItemMarshallerPlugin::onCommandSent
     */
    public function testMarshalsGetItemResponses()
    {
        $client = $this->getClient();
        $this->setMockResponse($client, 'dynamodb/get_item');
        $result = $client->getItem(array(
            'TableName' => 'foo',
            'Key' => array(
                'HashKeyElement'  => 'baz',
                'RangeKeyElement' => 'bar'
            )
        ));
        $this->assertInstanceOf('Aws\\DynamoDb\\Model\\Item', $result);
    }

    /**
     * @covers Aws\DynamoDb\Plugin\ItemMarshallerPlugin::onCommandSent
     */
    public function testMarshalsBatchGetItem()
    {
        $client = $this->getClient();
        $this->setMockResponse($client, 'dynamodb/batch_get_item_final');

        // Note: This is a dummy request that might not match exactly the
        // request that would return the mock response
        $result = $client->batchGetItem(array(
            'RequestItems' => array(
                'comp2' => array(
                    'keys' => array(
                        array(
                            'HashKeyElement' => array('S' => 'Bar')
                        )
                    )
                )
            )
        ));

        foreach ($result['Responses']['comp2']['Items'] as $item) {
            $this->assertInstanceOf('Aws\\DynamoDb\\Model\\Item', $item);
        }
    }

    /**
     * @covers Aws\DynamoDb\Plugin\ItemMarshallerPlugin::onCommandSent
     */
    public function testMarshalsScan()
    {
        $client = $this->getClient();
        $this->setMockResponse($client, 'dynamodb/scan_final');
        $result = $client->scan(array(
            'TableName' => 'foo'
        ));
        foreach ($result['Items'] as $item) {
            $this->assertInstanceOf('Aws\\DynamoDb\\Model\\Item', $item);
        }
    }

    /**
     * @covers Aws\DynamoDb\Plugin\ItemMarshallerPlugin::onCommandSent
     */
    public function testMarshalsQuery()
    {
        $client = $this->getClient();
        $this->setMockResponse($client, 'dynamodb/query_final');
        $result = $client->query(array(
            'TableName'     => 'foo',
            'HashKeyValue' => array(
                'S' => 'bar'
            )
        ));
        foreach ($result['Items'] as $item) {
            $this->assertInstanceOf('Aws\\DynamoDb\\Model\\Item', $item);
        }
    }

    /**
     * @return DynamoDbClient
     */
    protected function getClient()
    {
        $client = DynamoDbClient::factory(array(
            'key'       => 'foo',
            'secret'    => 'bar',
            'region'    => 'us-west-1',
            'token'     => 'baz',
            'token.ttd' => time() + 1000
        ));
        $client->addSubscriber(new ItemMarshallerPlugin());

        return $client;
    }
}
