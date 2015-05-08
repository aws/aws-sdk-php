<?php
namespace Aws\Test\S3;

use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\FnStream;
use Psr\Http\Message\StreamInterface;

/**
 * @covers Aws\S3\S3Client
 */
class S3ClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCanForcePathStyleOnAllOperations()
    {
        $mock = new MockHandler([new Result()]);
        $c = new S3Client([
            'region'           => 'us-standard',
            'version'          => 'latest',
            'force_path_style' => true,
            'handler'          => $mock
        ]);
        $command = $c->getCommand('GetObject', [
            'Bucket' => 'foo',
            'Key'    => 'baz'
        ]);
        $c->execute($command);
        $this->assertEquals(
            'https://s3.amazonaws.com/foo/baz',
            (string) $mock->getLastRequest()->getUri()
        );
    }

    public function testCanUseBucketEndpoint()
    {
        $c = new S3Client([
            'region'          => 'us-standard',
            'version'         => 'latest',
            'endpoint'        => 'http://test.domain.com',
            'bucket_endpoint' => true
        ]);
        $this->assertEquals(
            'http://test.domain.com/key',
            $c->getObjectUrl('test', 'key')
        );
    }

    public function testAddsMd5ToConfig()
    {
        $c = new S3Client([
            'region'          => 'us-standard',
            'version'         => 'latest',
            'calculate_md5'   => true
        ]);
        $this->assertTrue($c->getConfig('calculate_md5'));
    }

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
        $this->assertEquals($valid, S3Client::isBucketDnsCompatible($bucket));
    }

    public function testCreatesPresignedRequests()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => ['key' => 'foo', 'secret' => 'bar']
        ]);
        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $url = (string) $client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertContains(
            'https://foo.s3.amazonaws.com/bar?AWSAccessKeyId=',
            $url
        );
        $this->assertContains('Expires=', $url);
        $this->assertContains('Signature=', $url);
    }

    public function testCreatesPresignedUrlsWithSpecialCharacters()
    {
        $client = S3Client::factory([
            'region'      => 'us-east-1',
            'version'     => 'latest',
            'credentials' => ['key' => 'foo', 'secret'  => 'bar']
        ]);
        $command = $client->getCommand('GetObject', [
            'Bucket' => 'foobar test: abc',
            'Key'    => '+%.a'
        ]);
        $url = (string) $client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertContains(
            'https://s3.amazonaws.com/foobar%20test%3A%20abc/%2B%25.a?AWSAccessKeyId=',
            $url
        );
    }

    public function testRegistersStreamWrapper()
    {
        $s3 = $this->getTestClient('S3', ['region' => 'us-east-1']);
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
        /** @var S3Client $s3 */
        $s3 = $this->getTestClient('S3', ['region' => 'us-east-1']);
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

    public function testReturnsObjectUrl()
    {
        $s3 = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => false
        ]);
        $this->assertEquals('https://foo.s3.amazonaws.com/bar', $s3->getObjectUrl('foo', 'bar'));
    }

    public function testReturnsObjectUrlViaPath()
    {
        /** @var S3Client $s3 */
        $s3 = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => false
        ]);
        $this->assertEquals(
            'https://s3.amazonaws.com/foo.baz/bar',
            $s3->getObjectUrl('foo.baz', 'bar')
        );
    }

    /**
     * @dataProvider getUploadTestCases
     */
    public function testUploadHelperDoesCorrectOperation(
        StreamInterface $body,
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3');
        $this->addMockResults($client, $mockedResults);
        $result = $client->upload('bucket', 'key', $body, 'private', $options);
        $this->assertEquals('https://bucket.s3.amazonaws.com/key', $result['ObjectURL']);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testEnsuresPrefixOrRegexSuppliedForDeleteMatchingObjects()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3');
        $client->deleteMatchingObjects('foo');
    }

    public function testDeletesMatchingObjectsByPrefixAndRegex()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3');
        $client->getHandlerList()->setHandler(function ($c, $r) {
            $this->assertEquals('bucket', $c['Bucket']);
            return Promise\promise_for(new Result([
                'IsTruncated' => false,
                'Marker' => '',
                'Contents' => [
                    ['Key' => 'foo/bar'],
                    ['Key' => 'foo/bar/baz'],
                    ['Key' => 'foo/test'],
                    ['Key' => 'foo/bar/bam'],
                    ['Key' => 'foo/bar/001'],
                    ['Key' => 'foo/other']
                ]
            ]));
        });

        $agg = [];
        $client->deleteMatchingObjects('bucket', 'foo/bar/', '/^foo\/bar\/[a-z]+$/', [
            'before' => function ($cmd) use (&$agg) {
                foreach ($cmd['Delete']['Objects'] as $k) {
                    $agg[] = $k['Key'];
                }
            }
        ]);

        $this->assertEquals(['foo/bar/baz', 'foo/bar/bam'], $agg);
    }

    public function getUploadTestCases()
    {
        $putObject = new Result();
        $initiate = new Result(['UploadId' => 'foo']);
        $putPart = new Result(['ETag' => 'bar']);
        $complete = new Result(['Location' => 'https://bucket.s3.amazonaws.com/key']);

        return [
            [
                // 3 MB, known-size stream (put)
                $this->generateStream(1024 * 1024 * 3),
                [$putObject],
                ['before_upload' => function () {}]
            ],
            [
                // 3 MB, unknown-size stream (put)
                $this->generateStream(1024 * 1024 * 3, false),
                [$putObject],
                []
            ],
            [
                // 6 MB, known-size stream (put)
                $this->generateStream(1024 * 1024 * 6),
                [$putObject],
                []
            ],
            [
                // 6 MB, known-size stream, above threshold (mup)
                $this->generateStream(1024 * 1024 * 6),
                [$initiate, $putPart, $putPart, $complete],
                ['threshold' => 1024 * 1024 * 4]
            ],
            [
                // 6 MB, unknown-size stream (mup)
                $this->generateStream(1024 * 1024 * 6, false),
                [$initiate, $putPart, $putPart, $complete],
                []
            ],
            [
                // 6 MB, unknown-size, non-seekable stream (mup)
                $this->generateStream(1024 * 1024 * 6, false, false),
                [$initiate, $putPart, $putPart, $complete],
                []
            ]
        ];
    }

    private function generateStream($size, $sizeKnown = true, $seekable = true)
    {
        return FnStream::decorate(Psr7\stream_for(str_repeat('.', $size)), [
            'getSize' => function () use ($sizeKnown, $size) {
                return $sizeKnown ? $size : null;
            },
            'isSeekable' => function () use ($seekable) {
                return (bool) $seekable;
            }
        ]);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Mock queue is empty. Trying to send a PutObject
     */
    public function testProxiesToTransferObjectPut()
    {
        $client = $this->getTestClient('S3');
        $client->uploadDirectory(__DIR__, 'test');
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Mock queue is empty. Trying to send a ListObjects
     */
    public function testProxiesToTransferObjectGet()
    {
        $client = $this->getTestClient('S3');
        $client->downloadBucket(__DIR__, 'test');
    }
}
