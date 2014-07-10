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

// Hack to override the time returned from the S3SignatureV4
namespace Aws\Common\Signature
{
    function time()
    {
        return isset($_SERVER['override_v4_time'])
            ? strtotime('December 5, 2013 00:00:00 UTC')
            : \time();
    }
}

namespace Aws\Tests\Common\Signature {

use Aws\Common\Credentials\Credentials;
use Aws\Common\Enum\DateFormat;
use Aws\Common\Signature\SignatureV4;
use Guzzle\Http\Message\EntityEnclosingRequest;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\RequestFactory;
use Guzzle\Parser\ParserRegistry;

class SignatureV4Test extends \Guzzle\Tests\GuzzleTestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';
    const DEFAULT_DATETIME = 'Mon, 09 Sep 2011 23:36:00 GMT';

    /**
     * @return SignatureV4
     */
    private function getSignature()
    {
        // Require the gmdate() hack for the namespace so that the mangled
        // gmdate value is returned.
        require_once __DIR__ . '/sigv4_hack.php';

        // Mock the timestamp function to use the test suite timestamp
        $signature = $this->getMock('Aws\Common\Signature\SignatureV4', array('getTimestamp', 'getDateTime'));

        // Hack the shared timestamp
        $signature->expects($this->any())
            ->method('getTimestamp')
            ->will($this->returnValue(strtotime(self::DEFAULT_DATETIME)));

        // Hack the date time to deal with the wrong date in the example files
        $signature->expects($this->any())
            ->method('getDateTime')
            ->will($this->returnValueMap(array(
                array(DateFormat::RFC1123, 'Mon, 09 Sep 2011 23:36:00 GMT'),
                array(DateFormat::ISO8601, '20110909T233600Z'),
                array(DateFormat::SHORT, '20110909')
            )));

        return $signature;
    }

    /**
     * @dataProvider testSuiteProvider
     * @covers Aws\Common\Signature\SignatureV4
     * @covers Aws\Common\Signature\AbstractSignature
     */
    public function testSignsRequestsProperly($group)
    {
        $parser = ParserRegistry::getInstance()->getParser('url');
        $parser->setUtf8Support(true);

        // Create a request based on the '.req' file
        $requestString = file_get_contents($group['req']);
        $request = RequestFactory::getInstance()->fromMessage($requestString);

        // Sanitize the request
        $request->removeHeader('User-Agent');
        $request->removeHeader('Content-Length');

        // Sign the request using the test credentials
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET);
        // Get a mock signature object
        $signature = $this->getSignature();

        // Sign the request
        $signature->signRequest($request, $credentials);

        // Get debug signature information
        $context = $request->getParams()->get('aws.signature');

        // Test that the canonical request is correct
        $this->assertEquals(str_replace("\r", '', trim(file_get_contents($group['creq']))), $context['canonical_request']);

        // Test that the string to sign is correct
        $this->assertEquals(str_replace("\r", '', trim(file_get_contents($group['sts']))), $context['string_to_sign']);

        // Test that the authorization header is correct
        $this->assertEquals(
            str_replace("\r", '', trim(file_get_contents($group['authz']))),
            (string) $request->getHeader('Authorization')
        );

        $parser->setUtf8Support(false);
    }

    /**
     * @return array
     */
    public function testSuiteProvider()
    {
        // Gather a list of files sorted by name
        $files = glob(__DIR__ . DIRECTORY_SEPARATOR . 'aws4_testsuite' . DIRECTORY_SEPARATOR . '*');
        sort($files);

        // Skip the get-header-key-duplicate.* and get-header-value-order.authz.* test files for now;
        // they are believed to be invalid tests. See https://github.com/aws/aws-sdk-php/issues/161
        $files = array_filter($files, function($file) {
            return ((strpos($file, 'get-header-key-duplicate.') === false) &&
                    (strpos($file, 'get-header-value-order.'  ) === false));
        });
        sort($files);

        $groups = array();

        // Break the files up into groups of five for each test case
        $group = array();
        for ($i = 0, $c = count($files); $i < $c; $i++) {
            $types = explode('.', $files[$i]);
            $type = end($types);
            $group[$type] = $files[$i];
            if (count($group) == 5) {
                $groups[] = array($group);
                $group = array();
            }
        }

        return $groups;
    }

    /**
     * @covers Aws\Common\Signature\SignatureV4::signRequest
     * @covers Aws\Common\Signature\SignatureV4::createSigningContext
     * @covers Aws\Common\Signature\SignatureV4::getSigningKey
     */
    public function testSignsRequestsWithContentHashCorrectly()
    {
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET);
        $signature = $this->getSignature();
        $request = RequestFactory::getInstance()->fromMessage("GET / HTTP/1.1\r\nx-amz-date: Mon, 09 Sep 2011 23:36:00 GMT\r\nHost: foo.com\r\n\r\n");

        $contentHash = hash('sha256', 'foobar');
        $request->setHeader('x-amz-content-sha256', $contentHash);

        $signature->signRequest($request, $credentials);
        $context = $request->getParams()->get('aws.signature');
        $this->assertContains($contentHash, $context['canonical_request']);
    }

    /**
     * @covers Aws\Common\Signature\SignatureV4::signRequest
     */
    public function testSignsRequestsThatUseXamzdateHeaders()
    {
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET);
        $signature = $this->getSignature();
        $request = RequestFactory::getInstance()->fromMessage("GET / HTTP/1.1\r\nx-amz-date: Mon, 09 Sep 2011 23:36:00 GMT\r\nHost: foo.com\r\n\r\n");

        $signature->signRequest($request, $credentials);
        $context = $request->getParams()->get('aws.signature');
        $this->assertContains("\nx-amz-date:20110909T233600Z", $context['canonical_request']);
        $this->assertNotContains("\ndate:20110909T233600Z", $context['canonical_request']);
    }

    /**
     * @covers Aws\Common\Signature\SignatureV4::signRequest
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

    /**
     * @covers Aws\Common\Signature\SignatureV4::setServiceName
     * @covers Aws\Common\Signature\SignatureV4::setRegionName
     */
    public function testCanExplicitlySetServiceAndRegionName()
    {
        $signature = $this->getSignature();
        $signature->setServiceName('foo');
        $signature->setRegionName('bar');
        $request = new Request('GET', 'http://www.example.com');
        $credentials = new Credentials('fizz', 'buzz');
        $signature->signRequest($request, $credentials);
        $context = $request->getParams()->get('aws.signature');
        $this->assertContains('/foo/aws4_request', $context['string_to_sign']);
    }

    /**
     * @covers Aws\Common\Signature\SignatureV4::setMaxCacheSize
     * @covers Aws\Common\Signature\SignatureV4::signRequest
     * @covers Aws\Common\Signature\SignatureV4::getSigningKey
     */
    public function testMaintainsCappedCache()
    {
        $signature = $this->getSignature();
        $signature->setMaxCacheSize(3);
        $request = new Request('GET', 'http://www.example.com');

        $credentials = new Credentials('fizz', 'buzz');
        $signature->signRequest($request, $credentials);
        $this->assertEquals(1, count($this->readAttribute($signature, 'hashCache')));

        $credentials = new Credentials('fizz', 'baz');
        $signature->signRequest($request, $credentials);
        $this->assertEquals(2, count($this->readAttribute($signature, 'hashCache')));

        $credentials = new Credentials('fizz', 'paz');
        $signature->signRequest($request, $credentials);
        $this->assertEquals(3, count($this->readAttribute($signature, 'hashCache')));

        $credentials = new Credentials('fizz', 'foobar');
        $signature->signRequest($request, $credentials);
        $this->assertEquals(1, count($this->readAttribute($signature, 'hashCache')));
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
     * @covers Aws\Common\Signature\SignatureV4::getCanonicalizedQueryString
     * @dataProvider queryStringProvider
     */
    public function testCreatesCanonicalizedQueryString($headers, $string)
    {
        // Make the method publicly callable
        $method = new \ReflectionMethod('Aws\Common\Signature\SignatureV4', 'getCanonicalizedQueryString');
        $method->setAccessible(true);

        // Create a request and replace the headers with the test headers
        $request = new Request('GET', 'http://www.example.com');
        $request->getQuery()->replace($headers);

        $signature = $this->getMockBuilder('Aws\Common\Signature\SignatureV4')
            ->getMockForAbstractClass();

        $this->assertEquals($string, $method->invoke($signature, $request));
    }

    private function getFixtures()
    {
        $request = new Request('GET', 'http://foo.com');
        $credentials = new Credentials('foo', 'bar');
        $signature = new SignatureV4('service', 'region');
        $ref = new \ReflectionMethod($signature, 'convertExpires');
        $ref->setAccessible(true);

        return array($request, $credentials, $signature, $ref);
    }

    public function testCreatesPresignedDatesFromDateTime()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature, $ref) = $this->getFixtures();
        $this->assertEquals(518400, $ref->invoke($signature, new \DateTime('December 11, 2013 00:00:00 UTC')));
    }

    public function testCreatesPresignedDatesFromUnixTimestamp()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature, $ref) = $this->getFixtures();
        $this->assertEquals(518400, $ref->invoke($signature, 1386720000));
    }

    public function testCreatesPresignedDateFromStrtotime()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature, $ref) = $this->getFixtures();
        $this->assertEquals(518400, $ref->invoke($signature, 'December 11, 2013 00:00:00 UTC'));
    }

    public function testAddsSecurityTokenIfPresent()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature) = $this->getFixtures();
        $credentials->setSecurityToken('123');
        $url = $signature->createPresignedUrl($request, $credentials, 1386720000);
        $this->assertContains('X-Amz-Security-Token=123', $url);
        $this->assertContains('X-Amz-Expires=518400', $url);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresSigV4DurationIsLessThanOneWeek()
    {
        $_SERVER['override_v4_time'] = true;
        list($request, $credentials, $signature) = $this->getFixtures();
        $signature->createPresignedUrl($request, $credentials, 'December 31, 2013 00:00:00 UTC');
    }

    public function testConvertsPostToGet()
    {
        $request = new EntityEnclosingRequest('POST', 'http://foo.com');
        $request->setPostField('foo', 'bar');
        $request->setPostField('baz', 'bam');
        $request = SignatureV4::convertPostToGet($request);
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('bar', $request->getQuery()->get('foo'));
        $this->assertEquals('bam', $request->getQuery()->get('baz'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresMethodIsPost()
    {
        $request = new EntityEnclosingRequest('PUT', 'http://foo.com');
        SignatureV4::convertPostToGet($request);
    }
}
}
