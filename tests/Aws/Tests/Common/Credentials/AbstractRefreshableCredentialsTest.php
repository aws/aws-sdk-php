<?php

namespace Aws\Tests\Common\Credentials;

use Aws\Common\Credentials\Credentials;

/**
 * @covers Aws\Common\Credentials\AbstractRefreshableCredentials
 */
class AbstractRefreshableCredentialsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCallsRefreshWhenExpired()
    {
        $c = new Credentials('a', 'b', 'c', 10);

        $mock = $this->getMockBuilder('Aws\\Common\\Credentials\\AbstractRefreshableCredentials')
            ->setConstructorArgs(array($c))
            ->setMethods(array('refresh'))
            ->getMock();

        $mock->expects($this->exactly(3))
            ->method('refresh');

        $mock->getAccessKeyId();
        $mock->getSecretKey();
        $mock->getSecurityToken();
    }
}
