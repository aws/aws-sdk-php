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
