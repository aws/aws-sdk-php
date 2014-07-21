<?php
namespace Aws\Test\S3;

use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\S3\S3Client
 */
class S3ClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function bucketNameProvider()
    {
        return [
            ['.bucket', false],
            ['bucket.', false],
            ['192.168.1.1', false],
            ['1.1.1.100', false],
            ['test@42!@$5_', false],
            ['ab', false],
            ['12', false],
            ['bucket_name', false],
            ['bucket-name', true],
            ['bucket', true],
            ['my.bucket.com', true],
            ['test-fooCaps', false],
            ['w-w', true],
            ['w------', false]
        ];
    }

    /**
     * @dataProvider bucketNameProvider
     */
    public function testValidatesDnsBucketNames($bucket, $valid)
    {
        $this->assertEquals(
            $valid,
            s3Client::isBucketDnsCompatible($bucket)
        );
    }

    /**
     * @covers Aws\S3\S3Client::createPresignedUrl
     */
    public function testCreatesPresignedUrls()
    {
        $client = $this->getTestClient('s3', [
            'region' => 'us-east-1',
            'key'    => 'foo',
            'secret' => 'bar'
        ]);
        $request = $client->getHttpClient()
            ->createRequest('GET', 'https://s3.amazonaws.com/foo/bar');
        $original = (string) $request;
        $url = $client->createPresignedUrl($request, 1342138769);
        $this->assertContains(
            'https://s3.amazonaws.com/foo/bar?AWSAccessKeyId=',
            $url
        );
        $this->assertContains('Expires=', $url);
        $this->assertContains('Signature=', $url);
        $this->assertSame($original, (string) $request);
    }

    /**
     * @covers Aws\S3\S3Client::createPresignedUrl
     */
    public function testCreatesPresignedUrlsWithSpecialCharacters()
    {
        $client = S3Client::factory(array(
            'region' => 'us-east-1',
            'key'    => 'foo',
            'secret' => 'bar'
        ));
        $request = $client->getHttpClient()->createRequest(
            'GET',
            'https://foo.s3.amazonaws.com/foobar test: abc/+%.a'
        );
        $url = $client->createPresignedUrl($request, 1342138769);
        $this->assertContains(
            'https://foo.s3.amazonaws.com/foobar%20test%3A%20abc/%2B%25.a?AWSAccessKeyId=',
            $url
        );
    }
}
