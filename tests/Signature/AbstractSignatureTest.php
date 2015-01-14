<?php
namespace Aws\Test\Signature;

use Aws\Credentials\Credentials;
use GuzzleHttp\Message\Request;

/**
 * @covers Aws\Signature\AbstractSignature
 */
class AbstractSignatureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \BadMethodCallException
     */
    public function testThrowsWhenNotImplemented()
    {
        $mock = $this->getMockBuilder('Aws\Signature\AbstractSignature')
            ->getMockForAbstractClass();
        $request = new Request('GET', 'http://foo.com');
        $credentials = new Credentials('foo', 'bar');
        $mock->createPresignedUrl($request, $credentials, '+10 minutes');
    }
}
