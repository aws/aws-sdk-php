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

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Model\BatchRequest\PutRequest;
use Aws\DynamoDb\Model\Item;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\PutRequest
 */
class PutRequestTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorSetsValues()
    {
        $item = $this->getMock('Aws\DynamoDb\Model\Item');

        $putRequest = new PutRequest($item, 'table');

        $this->assertSame($item, $putRequest->getItem());
    }

    public function testConstructorSetsValuesWhenItemContainsTable()
    {
        $item = $this->getMock('Aws\DynamoDb\Model\Item');
        $item->expects($this->any())
            ->method('getTableName')
            ->will($this->returnValue('table'));

        $putRequest = new PutRequest($item);

        $this->assertSame($item, $putRequest->getItem());
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testConstructorThrowsExceptionWithoutTable()
    {
        $item = $this->getMock('Aws\DynamoDb\Model\Item');

        $putRequest = new PutRequest($item);;
    }

    public function testCanConvertToArray()
    {
        $putRequest = new PutRequest(Item::fromArray(array(
            'foo' => 'bar',
            'baz' => 123,
        )), 'table');

        $this->assertEquals(array(
            'PutRequest' => array(
                'Item' => array(
                    'foo' => array('S' => 'bar'),
                    'baz' => array('N' => '123')
                )
            )
        ), $putRequest->toArray());
    }

    public function getTestCasesForCreateFromCommandTest()
    {
        /** @var $client \Aws\DynamoDb\DynamoDbClient */
        $client = self::getServiceBuilder()->get('dynamodb');

        return array(
            array(
                $client->getCommand('ListTables'),
                'Aws\Common\Exception\InvalidArgumentException'
            ),
            array(
                $client->getCommand('PutItem', array(
                    'TableName' => 'foo',
                    'Item' => array('foo' => array('S' => 'bar'))
                )),
                'Aws\DynamoDb\Model\BatchRequest\PutRequest'
            )
        );
    }

    /**
     * @dataProvider getTestCasesForCreateFromCommandTest
     */
    public function testCanCreateFromCommand($command, $expectedObjectType)
    {
        try {
            $result = PutRequest::fromCommand($command);
        } catch (\InvalidArgumentException $e) {
            $result = $e;
        }

        $this->assertEquals($expectedObjectType, get_class($result));
    }
}
