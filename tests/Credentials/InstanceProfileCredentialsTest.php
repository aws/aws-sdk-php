<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\Credentials;
use Aws\Credentials\InstanceProfileCredentials;

/**
 * @covers Aws\Credentials\InstanceProfileCredentials
 */
class InstanceProfileCredentialsTest extends \PHPUnit_Framework_TestCase
{
    public function testSeedsInitialCredentials()
    {
        $t = time() + 1000;
        $creds = [
            'Code' => 'Success',
            'AccessKeyId' => 'foo',
            'SecretAccessKey' => 'baz',
            'Token' => null,
            'Expiration' => $t
        ];

        $client = $this->getMockBuilder('Aws\Service\InstanceMetadataClient')
            ->setMethods(['getInstanceProfileCredentials'])
            ->getMock();
        $client->expects($this->once())
            ->method('getInstanceProfileCredentials')
            ->will($this->returnValue($creds));

        $c = new InstanceProfileCredentials($client);
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertEquals(null, $c->getSecurityToken());
        $this->assertEquals($t, $c->getExpiration());
    }

    public function testRefreshesCredentials()
    {
        $t = time() + 1000;
        $creds1 = $this->getMockBuilder('Aws\Credentials\Credentials')
            ->setConstructorArgs(['foo1', 'baz1'])
            ->setMethods(['isExpired'])
            ->getMock();
        $creds1->expects($this->once())
            ->method('isExpired')
            ->will($this->returnValue(true));
        $creds2 = new Credentials('foo2', 'baz2', 't2', $t);

        $client = $this->getMockBuilder('Aws\Service\InstanceMetadataClient')
            ->setMethods(['getInstanceProfileCredentials'])
            ->getMock();
        $client->expects($this->once())
            ->method('getInstanceProfileCredentials')
            ->will($this->returnValue($creds2));

        $c = new InstanceProfileCredentials($client, $creds1);
        $this->assertEquals('foo2', $c->getAccessKeyId());
        $this->assertEquals('baz2', $c->getSecretKey());
        $this->assertEquals('t2', $c->getSecurityToken());
        $this->assertEquals($t, $c->getExpiration());
    }
}
