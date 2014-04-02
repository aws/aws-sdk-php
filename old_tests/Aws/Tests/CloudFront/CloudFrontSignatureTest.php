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

namespace Aws\Tests\CloudFront;

use Aws\CloudFront\CloudFrontSignature;
use Aws\Common\Credentials\Credentials;
use Guzzle\Http\Message\Request;

/**
 * @covers Aws\CloudFront\CloudFrontSignature
 */
class CloudFrontSignatureTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testSignsWithDateHeader()
    {
        $request = new Request('GET', 'http://www.foo.com', array('Date' => 'Thu, 17 May 2012 17:08:48 GMT'));
        $credentials = new Credentials('foo', 'bar');
        $signature = new CloudFrontSignature();
        $signature->signRequest($request, $credentials);
        $this->assertEquals('AWS foo:H/oAmf/UKMC13D986NHtWlcWeqg=', (string) $request->getHeader('Authorization'));
    }

    public function testSignsWithXAmzDateHeader()
    {
        $request = new Request('GET', 'http://www.foo.com', array('x-amz-date' => 'Thu, 17 May 2012 17:08:48 GMT'));
        $credentials = new Credentials('foo', 'bar');
        $signature = new CloudFrontSignature();
        $signature->signRequest($request, $credentials);
        $this->assertEquals('AWS foo:H/oAmf/UKMC13D986NHtWlcWeqg=', (string) $request->getHeader('Authorization'));
    }

    public function testSignsWithInjectedDateHeader()
    {
        $request = new Request('GET', 'http://www.foo.com');
        $credentials = new Credentials('foo', 'bar');
        $signature = new CloudFrontSignature();
        $signature->signRequest($request, $credentials);
        $this->assertTrue($request->hasHeader('Date'));
    }
}
