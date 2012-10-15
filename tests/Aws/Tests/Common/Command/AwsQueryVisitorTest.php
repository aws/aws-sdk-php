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
    public function testNormalizesQuery()
    {
        $param = new Parameter(array(
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

        $command = new OperationCommand();
        $request = new EntityEnclosingRequest('POST', 'http://foo.com');
        $visitor = new AwsQueryVisitor();

        $value = array(
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

        $visitor->visit($command, $request, $param, $value);

        $fields = $request->getPostFields()->getAll();
        asort($fields);
        $this->assertEquals(array(
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
        ), $fields);
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
}
