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

namespace Aws\Tests\Common\Command;

use Aws\Common\Command\AwsQueryVisitor;
use Guzzle\Service\Client;
use Aws\Common\Command\QueryCommand;
use Guzzle\Service\Description\Operation;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Description\Parameter;
use Guzzle\Http\Message\EntityEnclosingRequest;

/**
 * @covers Aws\Common\Command\AwsQueryVisitor
 * @covers Aws\Common\Command\QueryCommand
 */
class AwsQueryVisitorTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @dataProvider dataForQueryNormalization
     */
    public function testNormalizesQuery(Parameter $param, array $value, array $result)
    {
        $command = new OperationCommand();
        $request = new EntityEnclosingRequest('POST', 'http://foo.com');
        $visitor = new AwsQueryVisitor();
        $visitor->visit($command, $request, $param, $value);

        $fields = $request->getPostFields()->getAll();
        asort($fields);

        $this->assertEquals($result, $fields);
    }

    public function testAppliesTopLevelScalarParams()
    {
        $operation = new Operation(array(
            'parameters' => array(
                'Foo' => array(
                    'location' => 'aws.query',
                    'type'     => 'string',
                )
            )
        ));
        $command = new QueryCommand(array('Foo' => 'test'), $operation);
        $command->setClient(new Client());
        $request = $command->prepare();
        $fields = $request->getPostFields()->getAll();
        $this->assertEquals(array('Foo' => 'test'), $fields);
    }

    public function dataForQueryNormalization()
    {
        $data = array();

        // Use Case 1
        $data[0] = array();
        // Parameter
        $data[0][0] = new Parameter(array(
            'name'     => 'IpPermissions',
            'location' => 'aws.query',
            'data'     => array('offset' => 1),
            'type'          => 'array',
            'items'         => array(
                'data'       => array('offset' => 1),
                'type'       => 'object',
                'properties' => array(
                    'IpProtocol' => array('type' => 'string'),
                    'FromPort'   => array('type' => 'numeric'),
                    'ToPort'     => array('type' => 'numeric'),
                    'Groups'     => array(
                        'type'   => 'array',
                        'data'   => array('offset' => 1),
                        'items'  => array(
                            'type'       => 'object',
                            'properties' => array(
                                'UserId'    => array('type' => 'string'),
                                'GroupName' => array('type' => 'string'),
                                'GroupId' => array('type' => 'string')
                            )
                        )
                    ),
                    'IpRanges' => array(
                        'type' => 'array',
                        'data' => array('offset' => 1),
                        'items' => array(
                            'type'       => 'object',
                            'properties' => array(
                                'CidrIp' => array('type' => 'string')
                            )
                        )
                    ),
                    'Foo' => array(
                        'type'   => 'array',
                        'sentAs' => 'Foo.member',
                        'data'   => array('offset' => 10),
                        'items'  => array('type' => 'string')
                    )
                )
            )
        ));
        // Value
        $data[0][1] = array(
            array(
                'IpProtocol' => 'tcp',
                'FromPort' => 20,
                'Groups' => array(
                    array('UserId' => '123', 'GroupName' => 'Foo', 'GroupId' => 'Bar'),
                    array('UserId' => '456', 'GroupName' => 'Oof', 'GroupId' => 'Rab')
                ),
                'IpRanges' => array(
                    array('CidrIp' => 'test'),
                    array('CidrIp' => 'other')
                ),
                'Foo' => array('test', 'other')
            )
        );
        // Result
        $data[0][2] = array(
            'IpPermissions.1.FromPort' => 20,
            'IpPermissions.1.Groups.1.UserId' => '123',
            'IpPermissions.1.Groups.2.UserId' => '456',
            'IpPermissions.1.Groups.1.GroupId' => 'Bar',
            'IpPermissions.1.Groups.1.GroupName' => 'Foo',
            'IpPermissions.1.Groups.2.GroupName' => 'Oof',
            'IpPermissions.1.Groups.2.GroupId' => 'Rab',
            'IpPermissions.1.Foo.member.11' => 'other',
            'IpPermissions.1.IpRanges.2.CidrIp' => 'other',
            'IpPermissions.1.IpProtocol' => 'tcp',
            'IpPermissions.1.IpRanges.1.CidrIp' => 'test',
            'IpPermissions.1.Foo.member.10' => 'test',
        );

        // Use Case 2
        $data[1] = array();
        // Parameter
        $data[1][0] = new Parameter(array(
            'name' => 'Attributes',
            'type' => 'object',
            'location' => 'aws.query',
            'sentAs' => 'Attribute',
            'data' => array(
                'keyName'   => 'Name',
                'valueName' => 'Value'
            ),
            'additionalProperties' => array(
                'type' => 'string',
            ),
        ));
        // Value
        $data[1][1] = array(
            'ReceiveMessageWaitTimeSeconds' => 50,
            'DelaySeconds'                  => 25,
        );
        // Result
        $data[1][2] = array(
            'Attribute.1.Name'  => 'ReceiveMessageWaitTimeSeconds',
            'Attribute.1.Value' => 50,
            'Attribute.2.Name'  => 'DelaySeconds',
            'Attribute.2.Value' => 25,
        );

        // Use Case 3
        $data[2] = array();
        // Parameter
        $data[2][0] = new Parameter(array(
            'name' => 'Attributes',
            'type' => 'object',
            'location' => 'aws.query',
            'sentAs' => 'Attribute',
            'data' => array(
                'keyName'   => 'Name',
                'valueName' => 'Value'
            ),
            'additionalProperties' => array(
                'type'       => 'object',
                'properties' => array(
                    'Foo' => array('type' => 'string'),
                    'Bar' => array('type' => 'string'),
                    'Baz' => array('type' => 'string'),
                )
            ),
        ));
        // Value
        $data[2][1] = array(
            'Param1' => array(
                'Foo' => 'foo1',
                'Bar' => 'bar1',
                'Baz' => 'baz1',
            ),
            'Param2' => array(
                'Foo' => 'foo2',
                'Bar' => 'bar2',
                'Baz' => 'baz2',
            ),
        );
        // Result
        $data[2][2] = array(
            'Attribute.1.Name'      => 'Param1',
            'Attribute.1.Value.Foo' => 'foo1',
            'Attribute.1.Value.Bar' => 'bar1',
            'Attribute.1.Value.Baz' => 'baz1',
            'Attribute.2.Name'      => 'Param2',
            'Attribute.2.Value.Foo' => 'foo2',
            'Attribute.2.Value.Bar' => 'bar2',
            'Attribute.2.Value.Baz' => 'baz2',
        );

        // Use Case 4
        $data[3] = array();
        // Parameter
        $data[3][0] = new Parameter(array(
            'name' => 'Attributes',
            'type' => 'object',
            'location' => 'aws.query',
            'sentAs' => 'Attribute.entry',
            'additionalProperties' => array(
                'type' => 'string',
            ),
        ));
        // Value
        $data[3][1] = array(
            'Foo' => 10,
            'Bar' => 20,
        );
        // Result
        $data[3][2] = array(
            'Attribute.entry.1.key'  => 'Foo',
            'Attribute.entry.1.value' => 10,
            'Attribute.entry.2.key'  => 'Bar',
            'Attribute.entry.2.value' => 20,
        );

        return $data;
    }

    public function testSerializesEmptyLists()
    {
        $operation = new Operation(array('name' => 'UpdateStack'));
        $command = new OperationCommand(array(), $operation);
        $request = new EntityEnclosingRequest('POST', 'http://foo.com');
        $visitor = new AwsQueryVisitor();
        $visitor->visit($command, $request, new Parameter(array(
            'name' => 'foo',
            'type' => 'object',
            'location' => 'aws.query',
            'properties' => array(
                'test' => array(
                    'type' => 'array'
                ),
                'bar' => array(
                    'type' => 'object',
                    'properties' => array(
                        'bam' => array(
                            'type' => 'array'
                        ),
                        'boo' => array(
                            'type' => 'string'
                        )
                    )
                )
            )
        )), array(
            'test' => array(),
            'bar' => array(
                'bam' => array(),
                'boo' => 'hi'
            )
        ));
        $fields = $request->getPostFields();
        $this->assertEquals('foo.test=&foo.bar.bam=&foo.bar.boo=hi', (string) $fields);
    }
}
