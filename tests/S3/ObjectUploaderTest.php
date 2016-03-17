<?php
namespace Aws\Test\S3;

use Aws\Result;
use Aws\S3\ObjectUploader;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\FnStream;
use Psr\Http\Message\StreamInterface;

class ObjectUploaderTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

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
        $this->assertEquals('https://s3.amazonaws.com/bucket/key', $result['ObjectURL']);
    }

    public function getUploadTestCases()
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
}
