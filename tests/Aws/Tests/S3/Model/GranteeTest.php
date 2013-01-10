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

use Aws\S3\Model\Grantee;
use Aws\S3\Enum\Group;
use Aws\S3\Enum\GranteeType;

/**
 * @covers Aws\S3\Model\Grantee
 */
class GranteeTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanCreateCanonicalUserGrantee()
    {
        $grantee = new Grantee('1234567890', 'foo');

        $this->assertEquals('1234567890', $grantee->getId());
        $this->assertEquals('foo', $grantee->getDisplayName());
        $this->assertTrue($grantee->isCanonicalUser());
        $this->assertFalse($grantee->isAmazonCustomerByEmail());
        $this->assertFalse($grantee->isGroup());
        $this->assertEquals(GranteeType::USER, $grantee->getType());
    }

    public function testCanCreateEmailAddressGrantee()
    {
        $grantee = new Grantee('foo@example.com');

        $this->assertEquals('foo@example.com', $grantee->getId());
        $this->assertEquals('foo@example.com', $grantee->getEmailAddress());
        $this->assertNull($grantee->getDisplayName());
        $this->assertFalse($grantee->isCanonicalUser());
        $this->assertTrue($grantee->isAmazonCustomerByEmail());
        $this->assertFalse($grantee->isGroup());
        $this->assertEquals(GranteeType::EMAIL, $grantee->getType());
    }

    public function testCanCreateGroupGrantee()
    {
        $grantee = new Grantee(Group::ALL_USERS);

        $this->assertEquals(Group::ALL_USERS, $grantee->getId());
        $this->assertEquals(Group::ALL_USERS, $grantee->getGroupUri());
        $this->assertNull($grantee->getDisplayName());
        $this->assertFalse($grantee->isCanonicalUser());
        $this->assertFalse($grantee->isAmazonCustomerByEmail());
        $this->assertTrue($grantee->isGroup());
        $this->assertEquals(GranteeType::GROUP, $grantee->getType());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionWhenGranteeIdNotValid()
    {
        $grantee = new Grantee(100);
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testThrowsExceptionWhenTypeDoesntMatch()
    {
        $grantee = new Grantee('foo@example.com', null, GranteeType::GROUP);
    }

    /**
     * @expectedException \LogicException
     */
    public function testThrowsExceptionWhenSettingDisplayNameForWrongTypes()
    {
        $grantee = new Grantee('foo@example.com');
        $grantee->setDisplayName('FooBar');
    }

    public function testDisplayNameSetToIdWhenNotSpecified()
    {
        $grantee = new Grantee('1234567890');
        $this->assertEquals('1234567890', $grantee->getId());
        $this->assertEquals('1234567890', $grantee->getDisplayName());
    }

    public function getDataForHeaderValueTest()
    {
        return array(
            array('user-id',         'id="user-id"'),
            array('foo@example.com', 'emailAddress="foo@example.com"'),
            array(GROUP::ALL_USERS,  'uri="' . GROUP::ALL_USERS . '"'),
        );
    }

    /**
     * @dataProvider getDataForHeaderValueTest
     */
    public function testGetHeaderValueProducesExpectedResult($id, $value)
    {
        $grant = new Grantee($id);
        $this->assertSame($value, $grant->getHeaderValue());
    }

    public function testCanConvertToArray()
    {
        $grantee = new Grantee('foo@example.com');
        $this->assertEquals(array(
            'Type'         => 'AmazonCustomerByEmail',
            'EmailAddress' => 'foo@example.com',
        ), $grantee->toArray());

        $grantee = new Grantee('12345');
        $this->assertEquals(array(
            'Type'        => 'CanonicalUser',
            'ID'          => '12345',
            'DisplayName' => '12345',
        ), $grantee->toArray());

        $grantee = new Grantee(Group::ALL_USERS);
        $this->assertEquals(array(
            'Type' => 'Group',
            'URI'  => 'http://acs.amazonaws.com/groups/global/AllUsers',
        ), $grantee->toArray());
    }
}
