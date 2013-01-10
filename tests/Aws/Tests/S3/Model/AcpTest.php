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

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\Acp;
use Aws\S3\Model\Grantee;
use Aws\S3\Model\Grant;
use Aws\S3\Enum\Permission;
use Aws\S3\Enum\Group;

/**
 * @covers Aws\S3\Model\Acp
 */
class AcpTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getMockedOwner()
    {
        $owner = $this->getMockBuilder('Aws\S3\Model\Grantee')
            ->disableOriginalConstructor()
            ->getMock();
        $owner->expects($this->any())
            ->method('isCanonicalUser')
            ->will($this->returnValue(true));

        return $owner;
    }

    protected function getMockedGrants($count)
    {
        $grant = $this->getMockBuilder('Aws\S3\Model\Grant')
            ->disableOriginalConstructor()
            ->getMock();
        $grant->expects($this->any())
            ->method('toArray')
            ->will($this->returnValue(array()));

        $grants = array();
        for ($i = 0; $i < $count; $i++) {
            $grants[] = clone $grant;
        }

        return $grants;
    }

    public function testCanConstructAcpAndGetValues()
    {
        $owner = $this->getMockedOwner();
        $grants = $this->getMockedGrants(3);

        $acp = new Acp($owner, $grants);
        $this->assertSame($owner, $acp->getOwner());
        $this->assertInstanceOf('SplObjectStorage', $acp->getGrants());
        $this->assertInstanceOf('SplObjectStorage', $acp->getIterator());
        $this->assertEquals(3, count($acp));
    }

    public function testCanSetGrantsWithTraversable()
    {
        $owner = $this->getMockedOwner();
        $grants = new \ArrayObject();

        for ($i = 0; $i < 3; $i++) {
            $grants->append($this->getMockBuilder('Aws\S3\Model\Grant')
                ->disableOriginalConstructor()
                ->getMock()
            );
        }

        $acp = new Acp($owner);
        $acp->setGrants($grants);

        $this->assertEquals(3, count($acp));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionWhenProvidedGrantsAreInvalid()
    {
        $owner = $this->getMockedOwner();
        $grants = 'foo';
        $acp = new Acp($owner, $grants);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionOwnerIsNotUserGrantee()
    {
        $owner = $this->getMockBuilder('Aws\S3\Model\Grantee')
            ->disableOriginalConstructor()
            ->getMock();

        $acp = new Acp($owner);
    }

    /**
     * @expectedException \OverflowException
     */
    public function testThrowsExceptionIfMoreThan100Grants()
    {
        $owner = $this->getMockedOwner();
        $grants = $this->getMockedGrants(100);
        $acp = new Acp($owner, $grants);
        $this->assertInstanceOf('Aws\S3\Model\Acp', $acp);

        $grants = array_merge($grants, $this->getMockedGrants(1));
        $acp = new Acp($owner, $grants);
    }

    public function testAcpIsTraversable()
    {
        $owner = $this->getMockedOwner();
        $grants = $this->getMockedGrants(3);

        $acp = new Acp($owner, $grants);
        $array = iterator_to_array($acp);

        $this->assertEquals(3, count($array));
    }

    public function testConvertsToAndFromArray()
    {
        $acp = new Acp(new Grantee('foo'), array(
            new Grant(new Grantee('baz'), Permission::READ),
            new Grant(new Grantee('bar'), Permission::READ),
            new Grant(new Grantee('baz'), Permission::WRITE),
            new Grant(new Grantee('baz'), Permission::READ_ACP)
        ));

        $data = array(
            'Owner' => array(
                'ID' => 'foo',
                'DisplayName' => 'foo'
            ),
            'Grants' => array(
                array (
                    'Grantee' => array(
                        'Type' => 'CanonicalUser',
                        'ID' => 'baz',
                        'DisplayName' => 'baz'
                    ),
                    'Permission' => 'READ'
                ),
                array(
                    'Grantee' => array(
                        'Type' => 'CanonicalUser',
                        'ID' => 'bar',
                        'DisplayName' => 'bar'
                    ),
                    'Permission' => 'READ'
                ),
                array(
                    'Grantee' => array(
                        'Type' => 'CanonicalUser',
                        'ID' => 'baz',
                        'DisplayName' => 'baz'
                    ),
                    'Permission' => 'WRITE'
                ),
                array(
                    'Grantee' => array(
                        'Type' => 'CanonicalUser',
                        'ID' => 'baz',
                        'DisplayName' => 'baz'
                    ),
                    'Permission' => 'READ_ACP'
                )
            )
        );

        $this->assertEquals($data, $acp->toArray());
        $acp2 = Acp::fromArray($data);
        $this->assertEquals($data, $acp2->toArray());
    }

    public function testAssumesGrantTypesFromContext()
    {
        $data = array(
            'Owner' => array(
                'ID' => 'foo',
                'DisplayName' => 'foo'
            ),
            'Grants' => array(
                array(
                    'Grantee' => array(
                        'ID' => 'baz',
                        'DisplayName' => 'baz'
                    ),
                    'Permission' => 'READ'
                ),
                array(
                    'Grantee' => array(
                        'URI' => Group::AUTHENTICATED_USERS
                    ),
                    'Permission' => 'READ'
                ),
                array(
                    'Grantee' => array(
                        'EmailAddress' => 'foo@bar.com',
                    ),
                    'Permission' => 'WRITE'
                )
            )
        );

        $acp = Acp::fromArray($data);
        $this->assertEquals(array(
            'Owner' => array(
                'ID' => 'foo',
                'DisplayName' => 'foo',
            ),
            'Grants' => array(
                array(
                    'Grantee' => array(
                        'Type' => 'CanonicalUser',
                        'ID' => 'baz',
                        'DisplayName' => 'baz',
                    ),
                    'Permission' => 'READ',
                ),
                array(
                    'Grantee' => array(
                        'Type' => 'Group',
                        'URI' => 'http://acs.amazonaws.com/groups/global/AuthenticatedUsers',
                    ),
                    'Permission' => 'READ',
                ),
                array(
                    'Grantee' => array(
                        'Type' => 'AmazonCustomerByEmail',
                        'EmailAddress' => 'foo@bar.com',
                    ),
                    'Permission' => 'WRITE',
                ),
            ),
        ), $acp->toArray());
    }

    public function testCanUpdateCommandHeaders()
    {
        // Build up mock grants via cloning
        $grant = $this->getMockBuilder('Aws\S3\Model\Grant')
            ->disableOriginalConstructor()
            ->getMock();
        $g1 = clone $grant;
        $g1->expects($this->any())
            ->method('getParameterArray')
            ->will($this->returnValue(array(
                'GrantRead' => 'id="user-id-1"'
            )));
        $g2 = clone $grant;
        $g2->expects($this->any())
            ->method('getParameterArray')
            ->will($this->returnValue(array(
                'GrantRead' => 'id="user-id-2"'
            )));
        $g3 = clone $grant;
        $g3->expects($this->any())
            ->method('getParameterArray')
            ->will($this->returnValue(array(
                'GrantWrite' => 'id="user-id-3"'
            )));

        $s3 = $this->getServiceBuilder()->get('s3');
        $acp = new Acp($this->getMockedOwner(), array($g1, $g2, $g3));
        $cmd = $s3->getCommand('PutObject');
        $acp->updateCommand($cmd);
        $this->assertEquals('id="user-id-1", id="user-id-2"', $cmd->get('GrantRead'));
        $this->assertEquals('id="user-id-3"', $cmd->get('GrantWrite'));
    }
}
