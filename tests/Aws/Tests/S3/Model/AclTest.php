<?php

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\Acl;

/**
 * @covers Aws\S3\Model\Acl
 */
class AclTest extends \Guzzle\Tests\GuzzleTestCase
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
            ->method('__toString')
            ->will($this->returnValue('<Grant/>'));

        $grants = array();
        for ($i = 0; $i < $count; $i++) {
            $grants[] = clone $grant;
        }

        return $grants;
    }

    public function testCanConstructAclAndGetValues()
    {
        $owner = $this->getMockedOwner();
        $grants = $this->getMockedGrants(3);

        $acl = new Acl($owner, $grants);
        $this->assertSame($owner, $acl->getOwner());
        $this->assertInstanceOf('SplObjectStorage', $acl->getGrants());
        $this->assertInstanceOf('SplObjectStorage', $acl->getIterator());
        $this->assertEquals(3, count($acl));
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

        $acl = new Acl($owner);
        $acl->setGrants($grants);

        $this->assertEquals(3, count($acl));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionWhenProvidedGrantsAreInvalid()
    {
        $owner = $this->getMockedOwner();
        $grants = 'foo';

        $acl = new Acl($owner, $grants);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionOwnerIsNotUserGrantee()
    {
        $owner = $this->getMockBuilder('Aws\S3\Model\Grantee')
            ->disableOriginalConstructor()
            ->getMock();

        $acl = new Acl($owner);
    }

    /**
     * @expectedException \OverflowException
     */
    public function testThrowsExceptionIfMoreThan100Grants()
    {
        $owner = $this->getMockedOwner();
        $grants = $this->getMockedGrants(100);
        $acl = new Acl($owner, $grants);
        $this->assertInstanceOf('Aws\S3\Model\Acl', $acl);

        $grants = array_merge($grants, $this->getMockedGrants(1));
        $acl = new Acl($owner, $grants);
    }

    public function testAclIsTraversable()
    {
        $owner = $this->getMockedOwner();
        $grants = $this->getMockedGrants(3);

        $acl = new Acl($owner, $grants);
        $array = iterator_to_array($acl);

        $this->assertEquals(3, count($array));
    }

    public function testToStringProducesExpectedXml()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?><AccessControlPolicy xmln'
            . 's="http://s3.amazonaws.com/doc/latest/"><Owner><ID></ID><Display'
            . 'Name></DisplayName></Owner><AccessControlList><Grant/><Grant/><G'
            . 'rant/></AccessControlList></AccessControlPolicy>';

        $owner = $this->getMockedOwner();
        $grants = $this->getMockedGrants(3);
        $acl = new Acl($owner, $grants);

        $this->assertEquals($xml, (string) $acl);
    }

    public function testGetHeadersProducesExpectedResult()
    {
        // Set expected headers
        $headers = array(
            'x-amz-grant-read'  => 'id="user-id-1", id="user-id-2"',
            'x-amz-grant-write' => 'id="user-id-3"'
        );

        // Build up mock grants via cloning
        $grant = $this->getMockBuilder('Aws\S3\Model\Grant')
            ->disableOriginalConstructor()
            ->getMock();
        $g1 = clone $grant;
        $g1->expects($this->any())
            ->method('getHeaderArray')
            ->will($this->returnValue(array(
                'x-amz-grant-read' => 'id="user-id-1"'
            )));
        $g2 = clone $grant;
        $g2->expects($this->any())
            ->method('getHeaderArray')
            ->will($this->returnValue(array(
                'x-amz-grant-read' => 'id="user-id-2"'
            )));
        $g3 = clone $grant;
        $g3->expects($this->any())
            ->method('getHeaderArray')
            ->will($this->returnValue(array(
                'x-amz-grant-write' => 'id="user-id-3"'
            )));

        $acl = new Acl($this->getMockedOwner(), array($g1, $g2, $g3));
        $this->assertSame($headers, $acl->getGrantHeaders());
    }

    public function testCreatesFromXml()
    {
        $xml = file_get_contents(dirname(__DIR__) . '/Integration/AccessControlPolicySample.xml');
        $element = new \SimpleXMLElement($xml);
        $acl = Acl::fromXml($element);
        $this->assertEquals('owner-id', $acl->getOwner()->getId());
        $this->assertEquals('owner-display-name', $acl->getOwner()->getDisplayName());
        $this->assertEquals(3, count($acl->getGrants()));
        $grants = iterator_to_array($acl->getIterator());

        $this->assertEquals('CanonicalUser', $grants[0]->getGrantee()->getType());
        $this->assertEquals('AmazonCustomerByEmail', $grants[1]->getGrantee()->getType());
        $this->assertEquals('Group', $grants[2]->getGrantee()->getType());

        $this->assertEquals('READ', $grants[0]->getPermission());
        $this->assertEquals('WRITE', $grants[1]->getPermission());
        $this->assertEquals('FULL_CONTROL', $grants[2]->getPermission());
    }
}
