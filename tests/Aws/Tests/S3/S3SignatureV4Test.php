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
namespace Aws\S3
{
    function time()
    {
        return $_SERVER['override_s3_time'] ? strtotime('December 5, 2013 00:00:00 UTC') : \time();
    }
}

namespace Aws\Tests\S3
{
    use Aws\Common\Credentials\Credentials;
    use Aws\S3\S3SignatureV4;
    use Guzzle\Http\Message\EntityEnclosingRequest;
    use Guzzle\Http\Message\Request;

    /**
     * @covers Aws\S3\S3SignatureV4
     */
    class S3SignatureV4Test extends \Guzzle\Tests\GuzzleTestCase
    {
        public static function setUpBeforeClass()
        {
            $_SERVER['override_s3_time'] = true;
        }

        public static function tearDownAfterClass()
        {
            $_SERVER['override_s3_time'] = false;
        }

        private function getFixtures()
        {
            $request = new Request('GET', 'http://foo.com');
            $credentials = new Credentials('foo', 'bar');
            $signature = new S3SignatureV4('service', 'region');

            return array($request, $credentials, $signature);
        }

        public function testAddsContentSha256WhenBodyIsPresent()
        {
            $request = new EntityEnclosingRequest('PUT', 'http://foo.com');
            $request->setBody('foo');
            $credentials = new Credentials('foo', 'bar');
            $signature = new S3SignatureV4('service', 'region');
            $signature->signRequest($request, $credentials);
            $this->assertEquals(hash('sha256', 'foo'), $request->getHeader('x-amz-content-sha256'));
        }

        public function testDoesNotRemoveDotSegments()
        {
            list($request, $credentials, $signature) = $this->getFixtures();
            $request->setPath('/.././foo');
            $signature->signRequest($request, $credentials);
            $context = $request->getParams()->get('aws.signature');
            $this->assertStringStartsWith("GET\n/.././foo", $context['canonical_request']);
        }
    }
}
