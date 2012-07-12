<?php

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\Grant;
use Aws\S3\Enum\Permission;

/**
 * @covers Aws\S3\Model\Grant
 */
class GrantTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanSetValues()
    {
        $grantee = $this->getMockBuilder('Aws\S3\Model\Grantee')
            ->disableOriginalConstructor()
            ->getMock();

        $grant = new Grant($grantee, Permission::WRITE);
        $this->assertSame($grantee, $grant->getGrantee());
        $this->assertSame(Permission::WRITE, $grant->getPermission());

        $anotherGrantee = $this->getMockBuilder('Aws\S3\Model\Grantee')
            ->disableOriginalConstructor()
            ->getMock();

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
        $grantee = $this->getMockBuilder('Aws\S3\Model\Grantee')
            ->disableOriginalConstructor()
            ->getMock();

        $grant = new Grant($grantee, 'foo');
    }

    public function testToStringProducesExpectedXml()
    {
        $grantee = $this->getMockBuilder('Aws\S3\Model\Grantee')
            ->disableOriginalConstructor()
            ->getMock();
        $grantee->expects($this->any())
            ->method('__toString')
            ->will($this->returnValue('<Grantee/>'));

        $grant = new Grant($grantee, Permission::READ);

        $xml = '<Grant><Grantee/><Permission>READ</Permission></Grant>';
        $this->assertEquals($xml, (string) $grant);
    }

    public function testGetHeaderArrayProducesExpectedResult()
    {
        $expected = array('x-amz-grant-read' => 'id="user-id"');

        $grantee = $this->getMockBuilder('Aws\S3\Model\Grantee')
            ->disableOriginalConstructor()
            ->getMock();
        $grantee->expects($this->any())
            ->method('getHeaderValue')
            ->will($this->returnValue('id="user-id"'));

        $grant = new Grant($grantee, Permission::READ);

        $this->assertSame($expected, $grant->getHeaderArray());
    }
}
