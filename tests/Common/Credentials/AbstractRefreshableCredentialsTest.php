<?php
namespace Aws\Test\Common\Credentials;

use Aws\Common\Credentials\Credentials;

/**
 * @covers Aws\Common\Credentials\AbstractRefreshableCredentials
 */
class AbstractRefreshableCredentialsTest extends \PHPUnit_Framework_TestCase
{
    public function proxyMethods()
    {
        return [
            ['getAccessKeyId'],
            ['getSecretKey'],
            ['getSecurityToken'],
            ['toArray']
        ];
    }

    /**
     * @dataProvider proxyMethods
     */
    public function testRefreshesWhenProxying($method)
    {
        $creds = $this->getMockBuilder('Aws\Common\Credentials\AbstractRefreshableCredentials')
            ->setMethods(['refresh'])
            ->setConstructorArgs([new Credentials('a', 'b', 'c', time() - 100)])
            ->getMockForAbstractClass();
        $retVal = new Credentials('a', 'b', 'c', time() + 5000);
        $creds->expects($this->once())
            ->method('refresh')
            ->will($this->returnValue($creds));
        $a = $retVal->{$method}();
        $b = $creds->{$method}();
        if ($method == 'toArray') {
            unset($a['expires'], $b['expires']);
        }

        $this->assertSame($a, $b);
    }

    public function testPassesThroughExpirationMethods()
    {
        $a = new Credentials('a', 'b', 'c', time() + 5000);
        $b = $this->getMockBuilder('Aws\Common\Credentials\AbstractRefreshableCredentials')
            ->setConstructorArgs([$a])
            ->getMockForAbstractClass();
        $this->assertSame($a->isExpired(), $b->isExpired());
        $this->assertSame($a->getExpiration(), $b->getExpiration());
    }
}
