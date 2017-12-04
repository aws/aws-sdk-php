<?php
namespace Aws\Test\S3;

use Aws\Result;
use Aws\S3\ObjectUploader;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\FnStream;
use Psr\Http\Message\StreamInterface;
use PHPUnit\Framework\TestCase;

class ObjectUploaderTest extends TestCase
{
    use UsesServiceTrait;

    const MB = 1048576;

    /**
     * @dataProvider getUploadTestCases
     */
    public function testDoesCorrectOperation(
        StreamInterface $body,
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3');
        $this->addMockResults($client, $mockedResults);
        $result = (new ObjectUploader($client, 'bucket', 'key', $body, 'private', $options))
            ->upload();
        $this->assertEquals('https://bucket.s3.amazonaws.com/key', $result['ObjectURL']);
        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getUploadTestCasesWithPathStyle
     */
    public function testDoesCorrectOperationWithPathStyle(
        StreamInterface $body,
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3', [
            'use_path_style_endpoint' => true
        ]);
        $this->addMockResults($client, $mockedResults);
        $result = (new ObjectUploader($client, 'bucket', 'key', $body, 'private', $options))
            ->upload();
        $this->assertEquals('https://s3.amazonaws.com/bucket/key', $result['ObjectURL']);
        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getUploadTestCases
     */
    public function testDoesCorrectOperationAsynchronously(
        StreamInterface $body,
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3');
        $this->addMockResults($client, $mockedResults);
        $promise = (new ObjectUploader($client, 'bucket', 'key', $body, 'private', $options))
            ->promise();
        $this->assertFalse($this->mockQueueEmpty());
        $result = $promise->wait();
        $this->assertEquals('https://bucket.s3.amazonaws.com/key', $result['ObjectURL']);
    }

    /**
     * @dataProvider getUploadTestCasesWithPathStyle
     */
    public function testDoesCorrectOperationAsynchronouslyWithPathStyle(
        StreamInterface $body,
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3', [
            'use_path_style_endpoint' => true
        ]);
        $this->addMockResults($client, $mockedResults);
        $promise = (new ObjectUploader($client, 'bucket', 'key', $body, 'private', $options))
            ->promise();
        $this->assertFalse($this->mockQueueEmpty());
        $result = $promise->wait();
        $this->assertEquals('https://s3.amazonaws.com/bucket/key', $result['ObjectURL']);
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
                ['mup_threshold' => 1024 * 1024 * 4]
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

    public function getUploadTestCasesWithPathStyle()
    {
        $putObject = new Result();
        $initiate = new Result(['UploadId' => 'foo']);
        $putPart = new Result(['ETag' => 'bar']);
        $complete = new Result(['Location' => 'https://s3.amazonaws.com/bucket/key']);

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
                ['mup_threshold' => 1024 * 1024 * 4]
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

    public function testS3ObjectUploaderPutObjectParams()
    {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('s3');
        $uploadOptions = [
            'params'          => ['RequestPayer' => 'test'],
            'before_upload'   => function($command) {
                $this->assertEquals('test', $command['RequestPayer']);
            },
        ];
        $url = 'https://foo.s3.amazonaws.com/bar';
        $data = str_repeat('.', 1 * self::MB);
        $source = Psr7\stream_for($data);

        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $uploader = new ObjectUploader(
            $client,
            'foo',
            'bar',
            $source,
            'private',
            $uploadOptions);
        $result = $uploader->upload();

        $this->assertEquals($url, $result['ObjectURL']);
    }

    public function testS3ObjectUploaderMultipartParams()
    {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('s3');
        $uploadOptions = [
            'mup_threshold'   => self::MB * 4,
            'params'          => ['RequestPayer' => 'test'],
            'before_initiate' => function($command) {
                $this->assertEquals('test', $command['RequestPayer']);
            },
            'before_upload'   => function($command) {
                $this->assertEquals('test', $command['RequestPayer']);
            },
            'before_complete' => function($command) {
                $this->assertEquals('test', $command['RequestPayer']);
            }
        ];
        $url = 'https://foo.s3.amazonaws.com/bar';
        $data = str_repeat('.', 12 * self::MB);
        $source = Psr7\stream_for($data);

        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $uploader = new ObjectUploader(
            $client,
            'foo',
            'bar',
            $source,
            'private',
            $uploadOptions);
        $result = $uploader->upload();

        $this->assertEquals($url, $result['ObjectURL']);
    }
}
