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

use Aws\Common\Signature\SignatureV3;
use Aws\Common\Credentials\Credentials;
use Guzzle\Http\Message\RequestFactory;
use Guzzle\Http\Message\Request;

class SignatureV3Test extends \Guzzle\Tests\GuzzleTestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';
    const DEFAULT_DATETIME = 'Fri, 09 Sep 2011 23:36:00 GMT';

    /**
     * @return SignatureV3
     */
    private function getSignature()
    {
        // Mock the timestamp function to use the test suite timestamp
        $signature = $this->getMock('Aws\Common\Signature\SignatureV3', array('getTimestamp'));

        // Hack the shared timestamp
        $signature->expects($this->any())
            ->method('getTimestamp')
            ->will($this->returnValue(strtotime(self::DEFAULT_DATETIME)));

        return $signature;
    }

    /**
     * @covers Aws\Common\Signature\SignatureV3::getHeadersToSign
     */
    public function testDeterminesWhichHeadersToSign()
    {
        $signature = $this->getSignature();
        $method = new \ReflectionMethod('Aws\Common\Signature\SignatureV3', 'getHeadersToSign');
        $method->setAccessible(true);

        $request = new Request('GET', 'http://www.example.com', array(
            'foo'        => 'bar',
            'x-amz-test' => '123',
            'host'       => 'www.example.com'
        ));

        $this->assertEquals(array(
            'host'       => 'www.example.com',
            'x-amz-test' => '123'
        ), $method->invoke($signature, $request));
    }

    /**
     * @dataProvider testSuiteProvider
     * @covers Aws\Common\Signature\SignatureV3
     */
    public function testSignsRequestsProperly($request, $stringToSign, $header)
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
        $this->assertEquals($stringToSign, $request->getParams()->get('aws.string_to_sign'));

        // Test that the signature is correct
        $this->assertEquals($header, (string) $request->getHeader('x-amzn-authorization'));
    }

    /**
     * @return array
     */
    public function testSuiteProvider()
    {
        $date = self::DEFAULT_DATETIME;

        return array(
            array(
                "GET / HTTP/1.1\r\nHost: example.com\r\n\r\n",
                "GET\n/\n\nhost:example.com\nx-amz-date:$date\n\n",
                'AWS3 AWSAccessKeyId=AKIDEXAMPLE,Algorithm=HmacSHA256,SignedHeaders=host;x-amz-date,Signature=JYuvj/5tDFCVa6NL6VotEwj6H7FKXieTjzJubf6cMxo='
            ),
            array(
                "DELETE / HTTP/1.1\r\nHost: example.com\r\nx-amz-test: foo\r\n\r\n",
                "DELETE\n/\n\nhost:example.com\nx-amz-date:$date\nx-amz-test:foo\n\n",
                'AWS3 AWSAccessKeyId=AKIDEXAMPLE,Algorithm=HmacSHA256,SignedHeaders=host;x-amz-date;x-amz-test,Signature=BraQr8lRdmItH6kGoqer5GSaQ5iYhY5jnpWsHfAVEPk='
            ),
            array(
                "POST / HTTP/1.1\r\nHost: example.com\r\nx-amz-date: Foo\r\n\r\n",
                "POST\n/\n\nhost:example.com\nx-amz-date:$date\n\n",
                'AWS3 AWSAccessKeyId=AKIDEXAMPLE,Algorithm=HmacSHA256,SignedHeaders=host;x-amz-date,Signature=jT4obXRVmgObtLBxqOmddPNW/eiMTFexs7EzudIAq20='
            ),
            array(
                "GET /./foo/.. HTTP/1.1\r\nHost: example.com\r\n\r\n",
                "GET\n/\n\nhost:example.com\nx-amz-date:$date\n\n",
                'AWS3 AWSAccessKeyId=AKIDEXAMPLE,Algorithm=HmacSHA256,SignedHeaders=host;x-amz-date,Signature=JYuvj/5tDFCVa6NL6VotEwj6H7FKXieTjzJubf6cMxo='
            ),
            array(
                "POST /path HTTP/1.1\r\nHost: example.com\r\n\r\nbody",
                "POST\n/path\n\nhost:example.com\nx-amz-date:$date\n\nbody",
                'AWS3 AWSAccessKeyId=AKIDEXAMPLE,Algorithm=HmacSHA256,SignedHeaders=host;x-amz-date,Signature=G5PSou/CPa/UzLKoIjHrxdy1xpxqYQw8TQXmmIXtbuw='
            ),
            array(
                "POST /path?a=b&c=d&e HTTP/1.1\r\nHost: example.com\r\n\r\nbody",
                "POST\n/path\na=b&c=d&e=\nhost:example.com\nx-amz-date:$date\n\nbody",
                'AWS3 AWSAccessKeyId=AKIDEXAMPLE,Algorithm=HmacSHA256,SignedHeaders=host;x-amz-date,Signature=ie+l5ggZCUqJcCp6PKN9h7RrM5LnCwr8xyMmptaHXL4='
            )
        );
    }

    /**
     * @covers Aws\Common\Signature\SignatureV3::signRequest
     */
    public function testUsesSecurityTokensWhenAvailable()
    {
        $signature = $this->getSignature();
        $request = new Request('GET', 'http://www.example.com');
        // Create a credentials object with a token
        $credentials = new Credentials('a', 'b', 'c', time() + 10000);
        $signature->signRequest($request, $credentials);
        $this->assertEquals('c', (string) $request->getHeader('x-amz-security-token'));
    }
}
