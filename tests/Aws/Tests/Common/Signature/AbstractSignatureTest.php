<?php

namespace Aws\Tests\Common\Signature;

use Guzzle\Http\Message\Request;

class AbstractSignatureTest extends \Guzzle\Tests\GuzzleTestCase
{
    private $signature;

    public function setup()
    {
        $this->signature = $this->getMockBuilder('Aws\Common\Signature\AbstractSignature')
            ->getMockForAbstractClass();
    }

    /**
     * @covers Aws\Common\Signature\AbstractSignature::getTimestamp
     */
    public function testGetTimestampReturnsConsistentTimestamp()
    {
        $method = new \ReflectionMethod('Aws\Common\Signature\AbstractSignature', 'getTimestamp');
        $method->setAccessible(true);

        // Ensure that the timestamp is the same when cached
        $t = $method->invoke($this->signature);
        $this->assertEquals($t, $method->invoke($this->signature));
    }

    /**
     * @covers Aws\Common\Signature\AbstractSignature::getDateTime
     */
    public function testGetDatetimeUsesInternalTimestamp()
    {
        $method = new \ReflectionMethod('Aws\Common\Signature\AbstractSignature', 'getDateTime');
        $method->setAccessible(true);

        $d = gmdate('F, Y');
        $this->assertEquals($d, $method->invoke($this->signature, 'F, Y'));
    }

    public function queryStringProvider()
    {
        return array(

            array(array(), ''),

            array(array(
                'X-Amz-Signature' => 'foo'
            ), ''),

            array(array(
                'Foo' => '123',
                'Bar' => '456'
            ), 'Bar=456&Foo=123'),

            array(array(
                'Foo' => array('b', 'a'),
                'a' => 'bc'
            ), 'Foo=a&Foo=b&a=bc'),

            array(array(
                'Foo' => '',
                'a' => 'b'
            ), 'Foo=&a=b')
        );
    }

    /**
     * @covers Aws\Common\Signature\AbstractSignature::getCanonicalizedQueryString
     * @dataProvider queryStringProvider
     */
    public function testCreatesCanonicalizedQueryString($headers, $string)
    {
        // Make the method publicly callable
        $method = new \ReflectionMethod('Aws\Common\Signature\AbstractSignature', 'getCanonicalizedQueryString');
        $method->setAccessible(true);

        // Create a request and replace the headers with the test headers
        $request = new Request('GET', 'http://www.example.com');
        $request->getQuery()->replace($headers);

        $this->assertEquals($string, $method->invoke($this->signature, $request));
    }
}
