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

use Aws\Common\Signature\SignatureV2;
use Aws\Common\Credentials\Credentials;
use Guzzle\Http\Message\RequestFactory;
use Guzzle\Http\Message\Request;

class SignatureV2Test extends \Guzzle\Tests\GuzzleTestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';
    const DEFAULT_DATETIME = 'Fri, 09 Sep 2011 23:36:00 GMT';

    /**
     * @return SignatureV2
     */
    private function getSignature()
    {
        // Mock the timestamp function to use the test suite timestamp
        $signature = $this->getMock('Aws\Common\Signature\SignatureV2', array('getTimestamp'));

        // Hack the shared timestamp
        $signature->expects($this->any())
            ->method('getTimestamp')
            ->will($this->returnValue(strtotime(self::DEFAULT_DATETIME)));

        return $signature;
    }

    public function testSignsRequestsWithSecurityToken()
    {
        $request = RequestFactory::getInstance()->create('POST', 'http://foo.com');
        $request->addPostFields(array('Test' => '123'));
        $request->removeHeader('User-Agent')->removeHeader('Content-Length');
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET, 'foo');
        $signature = $this->getSignature();
        $signature->signRequest($request, $credentials);
        $this->assertEquals(
            "POST\nfoo.com\n/\nAWSAccessKeyId=AKIDEXAMPLE&SecurityToken=foo&SignatureMethod=HmacSHA256&SignatureVersion=2&Test=123&Timestamp=2011-09-09T23%3A36%3A00%2B00%3A00",
            $request->getParams()->get('aws.string_to_sign')
        );
    }

    /**
     * @dataProvider testSuiteProvider
     * @covers Aws\Common\Signature\SignatureV2
     */
    public function testSignsRequestsProperly($request, $stringToSign, $postFields, $mocksignature)
    {
        // Create a request based on the request
        $request = RequestFactory::getInstance()->fromMessage($request);
        if (!empty($postFields)) {
            $request->addPostFields($postFields);
        }

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
        if (!empty($postFields)) {
            $this->assertEquals($mocksignature, $request->getPostField('Signature'));
        } else {
            $this->assertEquals($mocksignature, $request->getQuery()->get('Signature'));
        }
    }

    /**
     * @return array
     */
    public function testSuiteProvider()
    {
        $date = self::DEFAULT_DATETIME;
        $timestamp = rawurlencode(gmdate('c', strtotime($date)));
        $key = self::DEFAULT_KEY;

        return array(
            array(
                "POST / HTTP/1.1\r\nHost: sdb.us-west-2.amazonaws.com\r\nContent-Length: 155\r\nContent-Type: application/x-www-form-urlencoded\r\n\r\nSignatureVersion=2&AWSAccessKeyId=$key&Action=ListDomains&Version=2009-04-15&SignatureMethod=HmacSHA256&Timestamp=$timestamp",
                "POST\nsdb.us-west-2.amazonaws.com\n/\nAWSAccessKeyId=$key&Action=ListDomains&SignatureMethod=HmacSHA256&SignatureVersion=2&Timestamp=$timestamp&Version=2009-04-15",
                array(
                    'Version' => '2009-04-15',
                    'Action'  => 'ListDomains'
                ),
                "f69jqJCuCMIhB8TiQhWGsEVxa8cs4Yrxw4IhK/yZa68="
            ),
            array(
                "GET /?SignatureVersion=2&AWSAccessKeyId=$key&Action=ListDomains&Version=2009-04-15&SignatureMethod=HmacSHA256&Timestamp=$timestamp HTTP/1.1\r\nHost: sdb.us-west-2.amazonaws.com",
                "GET\nsdb.us-west-2.amazonaws.com\n/\nAWSAccessKeyId=$key&Action=ListDomains&SignatureMethod=HmacSHA256&SignatureVersion=2&Timestamp=$timestamp&Version=2009-04-15",
                array(),
                "74xJjWQP2QHN4C7c+NoYqGaBQEfjm3FEzAJXJMh78HI="
            )
        );
    }
}
