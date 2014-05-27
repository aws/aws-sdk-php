<?php
namespace Aws\Test\Common\Signature;
use Aws\Common\Credentials\Credentials;
use GuzzleHttp\Message\Request;

/**
 * @covers Aws\Common\Signature\AbstractSignature
 */
class AbstractSignatureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \BadMethodCallException
     */
    public function testThrowsWhenNotImplemented()
    {
        $mock = $this->getMockBuilder('Aws\Common\Signature\AbstractSignature')
            ->getMockForAbstractClass();
        $request = new Request('GET', 'http://foo.com');
        $credentials = new Credentials('foo', 'bar');
        $mock->createPresignedUrl($request, $credentials, '+10 minutes');
    }
}
