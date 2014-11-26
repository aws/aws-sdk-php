<?php
namespace Aws\Test\Common\Credentials;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\RefreshableCredentials;

/**
 * @covers Aws\Common\Credentials\RefreshableCredentials
 */
class RefreshableCredentialsTest extends \PHPUnit_Framework_TestCase
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
        $retVal = new Credentials('a', 'b', 'c', time() + 5000);

        $old = $this->getMockBuilder('Aws\Common\Credentials\Credentials')
            ->setConstructorArgs(['a', 'b', 'c'])
            ->setMethods(['isExpired'])
            ->getMock();
        $old->expects($this->exactly(2))
            ->method('isExpired')
            ->will($this->returnCallback(function () {
                static $i = 0;
                return ++$i == 2;
            }));

        $queue = [$old, $retVal];
        $creds = new RefreshableCredentials(function () use (&$queue) {
            return array_shift($queue);
        });

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
        $b = new RefreshableCredentials(function () use ($a) {
            return $a;
        });
        $this->assertSame($a->isExpired(), $b->isExpired());
        $this->assertSame($a->getExpiration(), $b->getExpiration());
    }

    /**
     * @expectedException \Aws\Common\Exception\CredentialsException
     */
    public function testEnsuresCredentialsAreValid()
    {
        new RefreshableCredentials(function () { return 'foo'; });
    }

    /**
     * @expectedException \Aws\Common\Exception\CredentialsException
     */
    public function testEnsuresCredentialsAreRefreshed()
    {
        new RefreshableCredentials(function () {
            return new Credentials('a', 'b', 'c', time() - 1000);
        });
    }
}
