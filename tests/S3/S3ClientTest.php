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
        $this->assertEquals($valid, s3Client::isBucketDnsCompatible($bucket));
        $this->assertEquals($valid, s3Client::isValidBucketName($bucket));
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
        $client = S3Client::factory([
            'region' => 'us-east-1',
            'key'    => 'foo',
            'secret' => 'bar'
        ]);
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

    public function testClearsBucket()
    {
        $s3 = $this->getTestClient('s3', ['region' => 'us-east-1']);
        $this->addMockResults($s3, [[]]);
        $s3->clearBucket('foo');
    }

    public function syncProvider()
    {
        return [['uploadDirectory'], ['downloadBucket']];
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage aws/s3-sync
     * @dataProvider syncProvider
     */
    public function testThrowsForSync($meth)
    {
        $s3 = $this->getTestClient('s3', ['region' => 'us-east-1']);
        $s3->{$meth}([]);
    }

    public function testRegistersStreamWrapper()
    {
        $s3 = $this->getTestClient('s3', ['region' => 'us-east-1']);
        $s3->registerStreamWrapper();
        $this->assertContains('s3', stream_get_wrappers());
        stream_wrapper_unregister('s3');
    }

    public function doesExistProvider()
    {
        return [
            ['foo', null, true, []],
            ['foo', 'bar', true, []],
            ['foo', null, true, $this->getS3ErrorMock('AccessDenied', 403)],
            ['foo', 'bar', true, $this->getS3ErrorMock('AccessDenied', 403)],
            ['foo', null, false, $this->getS3ErrorMock('Foo', 401)],
            ['foo', 'bar', false, $this->getS3ErrorMock('Foo', 401)],
            ['foo', null, -1, $this->getS3ErrorMock('Foo', 500)],
            ['foo', 'bar', -1, $this->getS3ErrorMock('Foo', 500)],
        ];
    }

    private function getS3ErrorMock($errCode, $statusCode)
    {
        $e = $this->getMockBuilder('Aws\S3\Exception\S3Exception')
            ->disableOriginalConstructor()
            ->setMethods(['getAwsErrorCode', 'getStatusCode'])
            ->getMock();
        $e->expects($this->any())
            ->method('getAwsErrorCode')
            ->will($this->returnValue($errCode));
        $e->expects($this->any())
            ->method('getStatusCode')
            ->will($this->returnValue($statusCode));

        return $e;
    }

    /**
     * @dataProvider doesExistProvider
     */
    public function testsIfExists($bucket, $key, $exists, $result)
    {
        $s3 = $this->getTestClient('s3', ['region' => 'us-east-1']);
        $this->addMockResults($s3, [$result]);
        try {
            if ($key) {
                $this->assertSame($exists, $s3->doesObjectExist($bucket, $key));
            } else {
                $this->assertSame($exists, $s3->doesBucketExist($bucket));
            }
        } catch (\Exception $e) {
            $this->assertEquals(-1, $exists);
        }
    }

    public function getObjectUrlProvider()
    {
        return [
            ['https://foo.s3.amazonaws.com/bar', ['foo', 'bar']],
            ['http://foo.s3.amazonaws.com/bar', ['foo', 'bar', null, ['Scheme' => 'http']]],
            ['https://foo.s3.amazonaws.com/bar?versionId=123', ['foo', 'bar', null, ['VersionId' => '123']]],
            ['https://foo.s3.amazonaws.com/bar?AWSAccessKeyId=K&Expires=492220800&Signature=NolgeXY%2FxxM9ttapuXZgeSSqmzM%3D', ['foo', 'bar', 'August 7, 1985']],
        ];
    }

    /**
     * @dataProvider getObjectUrlProvider
     */
    public function testReturnsObjectUrl($url, $args)
    {
        $s3 = $this->getTestClient('s3', [
            'region' => 'us-east-1',
            'credentials' => ['key' => 'K', 'secret' => 'S']
        ]);
        $result = call_user_func_array([$s3, 'getObjectUrl'], $args);
        $this->assertSame($url, $result);
    }
}
