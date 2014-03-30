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

use Aws\Common\Signature\SignatureV3Https;
use Aws\Common\Credentials\Credentials;
use Guzzle\Http\Message\RequestFactory;
use Guzzle\Http\Message\Request;

class SignatureV3HttpsTest extends \Guzzle\Tests\GuzzleTestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';
    const DEFAULT_DATETIME = 'Fri, 09 Sep 2011 23:36:00 GMT';

    /**
     * @return SignatureV3Https
     */
    private function getSignature()
    {
        // Mock the timestamp function to use the test suite timestamp
        $signature = $this->getMock('Aws\Common\Signature\SignatureV3Https', array('getTimestamp'));

        // Hack the shared timestamp
        $signature->expects($this->any())
            ->method('getTimestamp')
            ->will($this->returnValue(strtotime(self::DEFAULT_DATETIME)));

        return $signature;
    }

    /**
     * @dataProvider testSuiteProvider
     * @covers Aws\Common\Signature\SignatureV3Https
     */
    public function testSignsRequestsProperly($request)
    {
        // Create a request based on the request
        $request = RequestFactory::getInstance()->fromMessage($request);

        // Sanitize the request
        $request->removeHeader('User-Agent')->removeHeader('Content-Length');

        // Sign the request using the test credentials
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET);

        // Get a mock signature object
        $signature = $this->getSignature();

        // Sign the request
        $signature->signRequest($request, $credentials);

        // Test that the string to sign is correct
        $stringToSign = self::DEFAULT_DATETIME;
        $this->assertEquals($stringToSign, $request->getParams()->get('aws.string_to_sign'));

        // Test that the signature is correct
        $expectedHeader = 'AWS3-HTTPS AWSAccessKeyId=AKIDEXAMPLE,Algorithm=HmacSHA256,Signature=2xkne78+c4e7JzUxDAADvn9vECImgCcEaBDkYw3Wk+w=';
        $this->assertEquals($expectedHeader, $request->getHeader('x-amzn-authorization', true));
    }

    /**
     * @return array
     */
    public function testSuiteProvider()
    {
        $date = self::DEFAULT_DATETIME;
        return array(
            array("GET / HTTP/1.1\r\nHost: example.com\r\n\r\n"),
            array("GET / HTTP/1.1\r\nHost: example.com\r\nDate: {$date}\r\n\r\n"),
            array("GET / HTTP/1.1\r\nHost: example.com\r\nx-amz-date: {$date}\r\n\r\n"),
        );
    }

    /**
     * @covers Aws\Common\Signature\SignatureV3Https::signRequest
     */
    public function testUsesSecurityTokensWhenAvailable()
    {
        $signature = $this->getSignature();
        $request = new Request('GET', 'http://www.example.com');

        // Create a credentials object with a token
        $credentials = new Credentials('a', 'b', 'c', time() + 10000);

        $signature->signRequest($request, $credentials);
        $this->assertEquals('c', $request->getHeader('x-amz-security-token', true));
    }
}
