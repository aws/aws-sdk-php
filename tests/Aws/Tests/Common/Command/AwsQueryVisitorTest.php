<?php

namespace Aws\Tests\Common\Command;

use Aws\Common\Command\AwsQueryVisitor;
use Guzzle\Service\Description\ApiParam;
use Guzzle\Http\Message\EntityEnclosingRequest;

/**
 * @covers Aws\Common\Command\AwsQueryVisitor
 */
class AwsQueryVisitorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testNormalizesQuery()
    {
        $param = new ApiParam(array(
            'name'          => 'IpPermissions',
            'location'      => 'aws.query',
            'location_args' => array('offset' => 1),
            'type'          => 'array',
            'items'         => array(
                'location_args' => array('offset' => 1),
                'type'          => 'object',
                'properties'    => array(
                    'IpProtocol' => array('type' => 'string'),
                    'FromPort'   => array('type' => 'numeric'),
                    'ToPort'     => array('type' => 'numeric'),
                    'Groups'     => array(
                        'type'          => 'array',
                        'location_args' => array('offset' => 1),
                        'items' => array(
                            'type'       => 'object',
                            'properties' => array(
                                'UserId'    => array('type' => 'string'),
                                'GroupName' => array('type' => 'string'),
                                'GroupId' => array('type' => 'string')
                            )
                        )
                    ),
                    'IpRanges' => array(
                        'type'          => 'array',
                        'location_args' => array('offset' => 1),
                        'items' => array(
                            'type'       => 'object',
                            'properties' => array(
                                'CidrIp' => array('type' => 'string')
                            )
                        )
                    ),
                    'Foo' => array(
                        'type'          => 'array',
                        'location_key'  => 'Foo.member',
                        'location_args' => array('offset' => 10),
                        'items' => array('type' => 'string')
                    )
                )
            )
        ));

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
        $param->process($value);
        $visitor->visit($param, $request, $value);

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
}
