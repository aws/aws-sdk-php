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

namespace Aws\Tests\S3;

use Aws\S3\S3Signature;
use Guzzle\Http\Message\Request;

/**
 * @covers Aws\S3\S3Signature
 */
class S3SignatureTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function signatureDataProvider()
    {
        return array(
            array(
                array(
                    'verb' => 'PUT',
                    'path' => '/db-backup.dat.gz',
                    'headers' => array(
                        'User-Agent' => 'curl/7.15.5',
                        'Host' => 'static.johnsmith.net:8080',
                        'Date' => 'Tue, 27 Mar 2007 21:06:08 +0000',
                        'x-amz-acl' => 'public-read',
                        'content-type' => 'application/x-download',
                        'Content-MD5' => '4gJE4saaMU4BqNR0kLY+lw==',
                        'X-Amz-Meta-ReviewedBy' => 'joe@johnsmith.net,jane@johnsmith.net',
                        'X-Amz-Meta-FileChecksum' => '0x02661779',
                        'X-Amz-Meta-ChecksumAlgorithm' => 'crc32',
                        'Content-Disposition' => 'attachment; filename=database.dat',
                        'Content-Encoding' => 'gzip',
                        'Content-Length' => '5913339'
                    )
                ), "PUT\n4gJE4saaMU4BqNR0kLY+lw==\napplication/x-download\nTue, 27 Mar 2007 21:06:08 +0000\nx-amz-acl:public-read\nx-amz-meta-checksumalgorithm:crc32\nx-amz-meta-filechecksum:0x02661779\nx-amz-meta-reviewedby:joe@johnsmith.net,jane@johnsmith.net\n/static.johnsmith.net/db-backup.dat.gz"
            ),
            // Use two subresources to set the ACL of a specific version and
            // make sure subresources are sorted correctly
            array(
                array(
                    'verb' => 'PUT',
                    'path' => '/key?versionId=1234&acl=',
                    'headers' => array(
                        'Host' => 'test.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 21:06:08 +0000',
                        'Content-Length' => '15'
                    )
                ),
                "PUT\n\n\nTue, 27 Mar 2007 21:06:08 +0000\n/test/key?acl&versionId=1234"
            ),
            // DELETE a path hosted object with a folder prefix and custom headers
            array(
                array(
                    'verb' => 'DELETE',
                    'path' => '/johnsmith/photos/puppy.jpg',
                    'headers' => array(
                        'User-Agent' => 'dotnet',
                        'Host' => 's3.amazonaws.com',
                        'x-amz-date' => 'Tue, 27 Mar 2007 21:20:26 +0000'
                    )
                ), "DELETE\n\n\n\nx-amz-date:Tue, 27 Mar 2007 21:20:26 +0000\n/johnsmith/photos/puppy.jpg"
            ),
            // List buckets
            array(
                array(
                    'verb' => 'GET',
                    'path' => '/',
                    'headers' => array(
                        'Host' => 's3.amazonaws.com',
                        'Date' => 'Wed, 28 Mar 2007 01:29:59 +0000'
                    )
                ), "GET\n\n\nWed, 28 Mar 2007 01:29:59 +0000\n/"
            ),
            // GET the ACL of a virtual hosted bucket
            array(
                array(
                    'verb' => 'GET',
                    'path' => '/?acl=',
                    'headers' => array(
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:44:46 +0000'
                    )
                ), "GET\n\n\nTue, 27 Mar 2007 19:44:46 +0000\n/johnsmith/?acl"
            ),
            // GET the contents of a bucket using parameters
            array(
                array(
                    'verb' => 'GET',
                    'path' => '/?prefix=photos&max-keys=50&marker=puppy',
                    'headers' => array(
                        'User-Agent' => 'Mozilla/5.0',
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:42:41 +0000'
                    )
                ), "GET\n\n\nTue, 27 Mar 2007 19:42:41 +0000\n/johnsmith/"
            ),
            // PUT an object with a folder prefix from a virtual hosted bucket
            array(
                array(
                    'verb' => 'PUT',
                    'path' => '/photos/puppy.jpg',
                    'headers' => array(
                        'Content-Type' => 'image/jpeg',
                        'Content-Length' => '94328',
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 21:15:45 +0000'
                    )
                ), "PUT\n\nimage/jpeg\nTue, 27 Mar 2007 21:15:45 +0000\n/johnsmith/photos/puppy.jpg"
            ),
            // GET an object with a folder prefix from a virtual hosted bucket
            array(
                array(
                    'verb' => 'GET',
                    'path' => '/photos/puppy.jpg',
                    'headers' => array(
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    )
                ), "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith/photos/puppy.jpg"
            ),
            // Set the ACL of an object
            array(
                array(
                    'verb' => 'PUT',
                    'path' => '/photos/puppy.jpg?acl=',
                    'headers' => array(
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    )
                ), "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith/photos/puppy.jpg?acl"
            ),
            // Set the ACL of an object with no prefix
            array(
                array(
                    'verb' => 'PUT',
                    'path' => '/photos/puppy?acl=',
                    'headers' => array(
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    )
                ), "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith/photos/puppy?acl"
            ),
            // Set the ACL of an object with no prefix in a path hosted bucket
            array(
                array(
                    'verb' => 'PUT',
                    'path' => '/johnsmith/photos/puppy?acl=',
                    'headers' => array(
                        'Host' => 's3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    )
                ), "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith/photos/puppy?acl"
            ),
            // Set the ACL of a path hosted bucket
            array(
                array(
                    'verb' => 'PUT',
                    'path' => '/johnsmith?acl=',
                    'headers' => array(
                        'Host' => 's3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    )
                ), "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith?acl"
            ),
            // Set the ACL of a path hosted bucket with an erroneous path value
            array(
                array(
                    'verb' => 'PUT',
                    'path' => '/johnsmith?acl=',
                    'headers' => array(
                        'Host' => 's3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ),
                ), "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith?acl"
            ),
            // Send a request to the EU region
            array(
                array(
                    'verb' => 'GET',
                    'path' => '/johnsmith',
                    'headers' => array(
                        'Host' => 'test.s3-eu-west-1.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ),
                ), "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/test/johnsmith"
            ),
            // Use a bucket with hyphens and a region
            array(
                array(
                    'verb' => 'GET',
                    'path' => '/bar',
                    'headers' => array(
                        'Host' => 'foo-s3-test-bucket.s3-eu-west-1.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ),
                ), "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/foo-s3-test-bucket/bar"
            ),
            // Use a bucket with hyphens and the default region
            array(
                array(
                    'verb' => 'GET',
                    'path' => '/bar',
                    'headers' => array(
                        'Host' => 'foo-s3-test-bucket.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ),
                ), "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/foo-s3-test-bucket/bar"
            ),
        );
    }

    /**
     * @dataProvider signatureDataProvider
     */
    public function testCreatesCanonicalizedString($input, $result, $expires = null)
    {
        $signature = new S3Signature();
        $request = \Guzzle\Http\Message\RequestFactory::getInstance()->create(
            $input['verb'],
            'http://' . $input['headers']['Host'] . $input['path'],
            $input['headers']
        );
        $request->setClient($this->getServiceBuilder()->get('s3'));
        $this->assertEquals($result, $signature->createCanonicalizedString($request), $expires);
    }

    public function requestDataProvider()
    {
        $results = array();

        $client = $this->getServiceBuilder()->get('s3', true);
        $client->getCredentials()->setSecurityToken('foo');
        $results[] = array($client, $client->get('/', array('Date' => gmdate('r'))));

        $client = $this->getServiceBuilder()->get('s3', true);
        $results[] = array($client, $client->get('/'));

        return $results;
    }

    /**
     * @dataProvider requestDataProvider
     */
    public function testSignsGenericRequest($client, $request)
    {
        $client->getSignature()->signRequest($request, $client->getCredentials());
        $this->assertTrue($request->hasHeader('Date'));
        $this->assertTrue($request->hasHeader('Authorization'));
        $this->assertContains(
            $client->getCredentials()->getAccessKeyId() . ':',
            (string) $request->getHeader('Authorization')
        );
        if ($token = $client->getCredentials()->getSecurityToken()) {
            $this->assertEquals($token, $request->getHeader('x-amz-security-token'));
        } else {
            $this->assertFalse($request->hasHeader('x-amz-security-token'));
        }
    }

    public function testCreatesPreSignedUrlWithXAmzHeaders()
    {
        $signature = new S3Signature();
        $request = new Request('GET', 'https://s3.amazonaws.com', array(
            'X-Amz-Acl' => 'public-read'
        ));
        $c = $this->getServiceBuilder()->get('s3');
        $request->setClient($c);
        $this->assertContains(
            'x-amz-acl:public-read',
            $signature->createCanonicalizedString($request, time())
        );
        $this->assertContains(
            '&x-amz-acl=public-read',
            $signature->createPresignedUrl(
                $request,
                $c->getCredentials(),
                time()
            )
        );
    }
}
