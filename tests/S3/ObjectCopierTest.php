<?php
namespace Aws\Test\S3;

use Aws\Command;
use Aws\Result;
use Aws\S3\MultipartUploader;
use Aws\S3\ObjectCopier;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;

class ObjectCopierTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider getCopyTestCases
     */
    public function testDoesCorrectOperation(
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3');
        $this->addMockResults($client, $mockedResults);
        $result = (new ObjectCopier(
            $client,
            ['Bucket' => 'sourceBucket', 'Key' => 'sourceKey'],
            ['Bucket' => 'bucket', 'Key' => 'key'],
            'private',
            $options
        ))->copy();
        $this->assertEquals('https://s3.amazonaws.com/bucket/key', $result['ObjectURL']);
        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getCopyTestCases
     */
    public function testDoesCorrectOperationAsynchronously(
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3');
        $this->addMockResults($client, $mockedResults);
        $promise = (new ObjectCopier(
            $client,
            ['Bucket' => 'sourceBucket', 'Key' => 'sourceKey'],
            ['Bucket' => 'bucket', 'Key' => 'key'],
            'private',
            $options
        ))->promise();
        $this->assertFalse($this->mockQueueEmpty());
        $result = $promise->wait();
        $this->assertEquals('https://s3.amazonaws.com/bucket/key', $result['ObjectURL']);
        $this->assertTrue($this->mockQueueEmpty());
    }

    public function getCopyTestCases()
    {
        $smallHeadObject = new Result(['ContentLength' => 1024 * 1024 * 6]);
        $putObject = new Result();
        $partCount = ceil($smallHeadObject['ContentLength'] / MultipartUploader::PART_MIN_SIZE);
        $initiate = new Result(['UploadId' => 'foo']);
        $putPart = new Result(['ETag' => 'bar']);
        $complete = new Result(['Location' => 'https://s3.amazonaws.com/bucket/key']);

        return [
            [
                [$smallHeadObject, $putObject],
                []
            ],
            [
                array_merge(
                    [$smallHeadObject, $initiate],
                    array_fill(0, $partCount, $putPart),
                    [$complete]
                ),
                ['mup_threshold' => MultipartUploader::PART_MIN_SIZE]
            ],
        ];
    }

    public function testCanCopyVersions()
    {
        $client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['getCommand', 'executeAsync'])
            ->getMock();

        $headObjectCommand = new Command('HeadObject');
        $headCommandParams = [
            'Bucket' => 'bucket',
            'Key' => 'key',
            'VersionId' => 'V+ID',
        ];
        $copyObjectCommand = new Command('CopyObject');
        $copyCommandParams = [
            'Bucket' => 'newBucket',
            'Key' => 'newKey',
            'ACL' => 'private',
            'MetadataDirective' => 'COPY',
            'CopySource' => '/bucket/key?versionId=V+ID',
        ];

        $client->expects($this->exactly(2))
            ->method('getCommand')
            ->will($this->returnValueMap([
                ['HeadObject', $headCommandParams, $headObjectCommand],
                ['CopyObject', $copyCommandParams, $copyObjectCommand],
            ]));

        $client->expects($this->exactly(2))
            ->method('executeAsync')
            ->will($this->returnValueMap([
                [
                    $headObjectCommand,
                    Promise\promise_for(new Result(['ContentLength' => 1024 * 1024 * 6]))
                ],
                [$copyObjectCommand, Promise\promise_for(new Result)],
            ]));

        (new ObjectCopier(
            $client,
            ['Bucket' => 'bucket', 'Key' => 'key', 'VersionId' => 'V+ID'],
            ['Bucket' => 'newBucket', 'Key' => 'newKey'],
            'private'
        ))->copy();
    }

}
