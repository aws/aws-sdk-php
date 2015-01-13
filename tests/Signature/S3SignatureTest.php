<?php
namespace Aws\Test\Signature;

use Aws\Credentials\Credentials;
use Aws\Signature\S3Signature;
use GuzzleHttp\Message\MessageFactory;
use GuzzleHttp\Message\Request;

/**
 * @covers Aws\Signature\S3Signature
 */
class S3SignatureTest extends \PHPUnit_Framework_TestCase
{
    public function testSignsRequest()
    {
        $creds = new Credentials('foo', 'bar', 'baz');
        $signature = new S3Signature();
        $request = (new MessageFactory)->createRequest(
            'PUT',
            'http://s3.amazonaws.com/bucket/key',
            [
                'body'    => 'body',
                'headers' => [
                    'Content-Type'  => 'Baz',
                    'X-Amz-Meta-Boo' => 'bam'
                ]
            ]
        );

        $signature->signRequest($request, $creds);
        $this->assertEquals('baz', $request->getHeader('X-Amz-Security-Token'));
        $this->assertTrue($request->hasHeader('Date'));
        $this->assertFalse($request->hasHeader('X-Amz-Date'));
        $this->assertTrue($request->hasHeader('Authorization'));
        $this->assertContains('AWS foo:', $request->getHeader('Authorization'));

        $creq = $request->getConfig()->get('aws.signature');
        $lines = explode("\n", $creq);
        $this->assertTrue(time() - strtotime($lines[3]) < 100);
        unset($lines[3]);

        $creq = implode("\n", $lines);
        $this->assertEquals(
            "PUT\n\nBaz\nx-amz-meta-boo:bam\nx-amz-security-token:baz\n/bucket/key",
            $creq
        );
    }

    public function presignedUrlProvider()
    {
        return [
            [
                "GET /t1234/test\r\nHost: s3.amazonaws.com\r\n\r\n",
                'http://s3.amazonaws.com/t1234/test?AWSAccessKeyId=foo&Expires=1397952000&Signature=hIZ2sBC96XAf1hiqE%2BuCC8VNKt8%3D'
            ],
            [
                "PUT /t1234/put\r\nHost: s3.amazonaws.com\r\n\r\n",
                'http://s3.amazonaws.com/t1234/put?AWSAccessKeyId=foo&Expires=1397952000&Signature=X5F%2FUBPes8Fc6vr%2Bl%2FQ5ltmKxc0%3D'
            ],
            [
                "PUT /t1234/put\r\nContent-Type: foo\r\nHost: s3.amazonaws.com\r\n\r\n",
                'http://s3.amazonaws.com/t1234/put?AWSAccessKeyId=foo&Expires=1397952000&Signature=cAUmoCjwcyKXjY2ilsGX7ghlHUI%3D'
            ],
            [
                "HEAD /test\r\nHost: test.s3.amazonaws.com\r\n\r\n",
                'http://test.s3.amazonaws.com/test?AWSAccessKeyId=foo&Expires=1397952000&Signature=1DQjgb9HhOH91oLFbwX8wze1tGs%3D'
            ],
        ];
    }

    /**
     * @dataProvider presignedUrlProvider
     */
    public function testCreatesPresignedUrls($message, $url)
    {
        $dt = 'April 20, 2014';
        $creds = new Credentials('foo', 'bar');
        $signature = new S3Signature();
        $req = (new MessageFactory())->fromMessage($message);
        // Try with string
        $res = $signature->createPresignedUrl($req, $creds, $dt);
        $this->assertSame($url, $res);
        // Try with timestamp
        $res = $signature->createPresignedUrl($req, $creds, new \DateTime($dt));
        $this->assertSame($url, $res);
    }

    public function signatureDataProvider()
    {
        return [
            // Use two subresources to set the ACL of a specific version and
            // make sure subresources are sorted correctly
            [
                [
                    'verb' => 'PUT',
                    'path' => '/key?versionId=1234&acl=',
                    'headers' => [
                        'Host' => 'test.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 21:06:08 +0000',
                        'Content-Length' => '15'
                    ]
                ],
                "PUT\n\n\nTue, 27 Mar 2007 21:06:08 +0000\n/test/key?acl&versionId=1234"
            ],
            // DELETE a path hosted object with a folder prefix and custom headers
            [
                [
                    'verb' => 'DELETE',
                    'path' => '/johnsmith/photos/puppy.jpg',
                    'headers' => [
                        'User-Agent' => 'dotnet',
                        'Host' => 's3.amazonaws.com',
                        'x-amz-date' => 'Tue, 27 Mar 2007 21:20:26 +0000'
                    ]
                ], "DELETE\n\n\n\nx-amz-date:Tue, 27 Mar 2007 21:20:26 +0000\n/johnsmith/photos/puppy.jpg"
            ],
            // List buckets
            [
                [
                    'verb' => 'GET',
                    'path' => '/',
                    'headers' => [
                        'Host' => 's3.amazonaws.com',
                        'Date' => 'Wed, 28 Mar 2007 01:29:59 +0000'
                    ]
                ], "GET\n\n\nWed, 28 Mar 2007 01:29:59 +0000\n/"
            ],
            // GET the ACL of a virtual hosted bucket
            [
                [
                    'verb' => 'GET',
                    'path' => '/?acl=',
                    'headers' => [
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:44:46 +0000'
                    ]
                ], "GET\n\n\nTue, 27 Mar 2007 19:44:46 +0000\n/johnsmith/?acl"
            ],
            // GET the contents of a bucket using parameters
            [
                [
                    'verb' => 'GET',
                    'path' => '/?prefix=photos&max-keys=50&marker=puppy',
                    'headers' => [
                        'User-Agent' => 'Mozilla/5.0',
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:42:41 +0000'
                    ]
                ], "GET\n\n\nTue, 27 Mar 2007 19:42:41 +0000\n/johnsmith/"
            ],
            // PUT an object with a folder prefix from a virtual hosted bucket
            [
                [
                    'verb' => 'PUT',
                    'path' => '/photos/puppy.jpg',
                    'headers' => [
                        'Content-Type' => 'image/jpeg',
                        'Content-Length' => '94328',
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 21:15:45 +0000'
                    ]
                ], "PUT\n\nimage/jpeg\nTue, 27 Mar 2007 21:15:45 +0000\n/johnsmith/photos/puppy.jpg"
            ],
            // GET an object with a folder prefix from a virtual hosted bucket
            [
                [
                    'verb' => 'GET',
                    'path' => '/photos/puppy.jpg',
                    'headers' => [
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ]
                ], "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith/photos/puppy.jpg"
            ],
            // Set the ACL of an object
            [
                [
                    'verb' => 'PUT',
                    'path' => '/photos/puppy.jpg?acl=',
                    'headers' => [
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ]
                ], "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith/photos/puppy.jpg?acl"
            ],
            // Set the ACL of an object with no prefix
            [
                [
                    'verb' => 'PUT',
                    'path' => '/photos/puppy?acl=',
                    'headers' => [
                        'Host' => 'johnsmith.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ]
                ], "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith/photos/puppy?acl"
            ],
            // Set the ACL of an object with no prefix in a path hosted bucket
            [
                [
                    'verb' => 'PUT',
                    'path' => '/johnsmith/photos/puppy?acl=',
                    'headers' => [
                        'Host' => 's3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ]
                ], "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith/photos/puppy?acl"
            ],
            // Set the ACL of a path hosted bucket
            [
                [
                    'verb' => 'PUT',
                    'path' => '/johnsmith?acl=',
                    'headers' => [
                        'Host' => 's3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ]
                ], "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith?acl"
            ],
            // Set the ACL of a path hosted bucket with an erroneous path value
            [
                [
                    'verb' => 'PUT',
                    'path' => '/johnsmith?acl=',
                    'headers' => [
                        'Host' => 's3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ],
                ], "PUT\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/johnsmith?acl"
            ],
            // Send a request to the EU region
            [
                [
                    'verb' => 'GET',
                    'path' => '/johnsmith',
                    'headers' => [
                        'Host' => 'test.s3-eu-west-1.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ],
                ], "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/test/johnsmith"
            ],
            // Use a bucket with hyphens and a region
            [
                [
                    'verb' => 'GET',
                    'path' => '/bar',
                    'headers' => [
                        'Host' => 'foo-s3-test-bucket.s3-eu-west-1.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ],
                ], "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/foo-s3-test-bucket/bar"
            ],
            // Use a bucket with hyphens and the default region
            [
                [
                    'verb' => 'GET',
                    'path' => '/bar',
                    'headers' => [
                        'Host' => 'foo-s3-test-bucket.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ],
                ], "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/foo-s3-test-bucket/bar"
            ],
            [
                [
                    'verb' => 'GET',
                    'path' => '/',
                    'headers' => [
                        'Host' => 'foo.s3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ],
                ], "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/foo/"
            ],
            [
                [
                    'verb' => 'GET',
                    'path' => '/foo',
                    'headers' => [
                        'Host' => 's3.amazonaws.com',
                        'Date' => 'Tue, 27 Mar 2007 19:36:42 +0000'
                    ],
                ], "GET\n\n\nTue, 27 Mar 2007 19:36:42 +0000\n/foo"
            ],
        ];
    }

    /**
     * @dataProvider signatureDataProvider
     */
    public function testCreatesCanonicalizedString(
        $input,
        $result,
        $expires = null
    ) {
        $signature = new S3Signature();
        $meth = new \ReflectionMethod($signature, 'createCanonicalizedString');
        $meth->setAccessible(true);

        $request = (new MessageFactory())->createRequest(
            $input['verb'],
            'http://' . $input['headers']['Host'] . $input['path'],
            ['headers' => $input['headers']]
        );

        $this->assertEquals(
            $result,
            $meth->invoke($signature, $request, $expires)
        );
    }

    public function testCreatesPreSignedUrlWithXAmzHeaders()
    {
        $signature = new S3Signature();
        $meth = new \ReflectionMethod($signature, 'createCanonicalizedString');
        $meth->setAccessible(true);

        $request = new Request('GET', 'https://s3.amazonaws.com', [
            'X-Amz-Acl' => 'public-read',
            'X-Amz-Foo' => 'bar'
        ]);

        $this->assertContains(
            'x-amz-acl:public-read',
            $meth->invoke($signature, $request, time())
        );

        $result = $signature->createPresignedUrl(
            $request,
            new Credentials('foo', 'bar', 'baz'),
            time()
        );

        $this->assertContains('&x-amz-acl=public-read', $result);
        $this->assertContains('x-amz-foo=bar', $result);
    }
}
