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

use Aws\DynamoDb\Model\BatchRequest\DeleteRequest;
use Aws\DynamoDb\Model\Attribute;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\DeleteRequest
 */
class DeleteRequestTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorSetsValues()
    {
        $key = array('HashKeyElement' => array('S' => 'foo'));

        $deleteRequest = new DeleteRequest($key, 'table');

        $this->assertSame($key, $deleteRequest->getKey());
    }

    public function testCanConvertToArray()
    {
        $key = array(
            'HashKeyElement'  => Attribute::factory('foo'),
            'RangeKeyElement' => Attribute::factory(123)
        );

        $deleteRequest = new DeleteRequest($key, 'table');
        $this->assertEquals(array(
            'DeleteRequest' => array(
                'Key' => array(
                    'HashKeyElement'  => array('S' => 'foo'),
                    'RangeKeyElement' => array('N' => '123')
                )
            )
        ), $deleteRequest->toArray());
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
                $client->getCommand('DeleteItem', array(
                    'TableName' => 'foo',
                    'Key' => array('HashKeyElement' => array('S' => 'foo'))
                )),
                'Aws\DynamoDb\Model\BatchRequest\DeleteRequest'
            )
        );
    }

    /**
     * @dataProvider getTestCasesForCreateFromCommandTest
     */
    public function testCanCreateFromCommand($command, $expectedObjectType)
    {
        try {
            $result = DeleteRequest::fromCommand($command);
        } catch (\InvalidArgumentException $e) {
            $result = $e;
        }

        $this->assertEquals($expectedObjectType, get_class($result));
    }
}
