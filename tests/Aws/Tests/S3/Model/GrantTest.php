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

use Aws\S3\Model\Grant;
use Aws\S3\Enum\Permission;
use Aws\S3\Model\Grantee;

/**
 * @covers Aws\S3\Model\Grant
 */
class GrantTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanSetValues()
    {
        $grantee = $this->getMockBuilder('Aws\S3\Model\Grantee')->disableOriginalConstructor()->getMock();
        $grant = new Grant($grantee, Permission::WRITE);
        $this->assertSame($grantee, $grant->getGrantee());
        $this->assertSame(Permission::WRITE, $grant->getPermission());

        $anotherGrantee = $this->getMockBuilder('Aws\S3\Model\Grantee')->disableOriginalConstructor()->getMock();
        $this->assertSame($grant, $grant->setGrantee($anotherGrantee));
        $this->assertSame($grant, $grant->setPermission(Permission::READ));

        $this->assertSame($anotherGrantee, $grant->getGrantee());
        $this->assertSame(Permission::READ, $grant->getPermission());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testPermissionSetterFailsOnInvalidValue()
    {
        $grantee = $this->getMockBuilder('Aws\S3\Model\Grantee')->disableOriginalConstructor()->getMock();
        $grant = new Grant($grantee, 'foo');
    }

    public function testKnowsCommandParameters()
    {
        $grantee = new Grantee('foo@example.com');
        $grant = new Grant($grantee, Permission::WRITE);
        $this->assertEquals(array (
            'GrantWrite' => 'emailAddress="foo@example.com"',
        ), $grant->getParameterArray());
    }

    public function testCanConvertToArray()
    {
        $grantee = new Grantee('foo@example.com');
        $grant = new Grant($grantee, Permission::WRITE);
        $this->assertEquals(array(
            'Grantee' => array(
                'Type'         => 'AmazonCustomerByEmail',
                'EmailAddress' => 'foo@example.com'
            ),
            'Permission' => 'WRITE'
        ), $grant->toArray());
    }
}
