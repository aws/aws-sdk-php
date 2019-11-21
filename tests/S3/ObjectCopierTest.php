<?php
namespace Aws\Test\S3;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Middleware;
use Aws\Result;
use Aws\S3\MultipartUploader;
use Aws\S3\ObjectCopier;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class ObjectCopierTest extends TestCase
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
            ['Bucket' => 'source-bucket', 'Key' => 'sourceKey'],
            ['Bucket' => 'bucket', 'Key' => 'key'],
            'private',
            $options
        ))->copy();
        $this->assertEquals('https://bucket.s3.amazonaws.com/key', $result['ObjectURL']);
        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getCopyTestCasesWithPathStyle
     */
    public function testDoesCorrectOperationWithPathStyle(
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3', [
            'use_path_style_endpoint' => true
        ]);
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
     * @param array $mockedResults
     * @param array $options
     */
    public function testDoesCorrectOperationWithAccessPointArn(
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3', [
            'region' => 'us-west-2'
        ]);
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd, RequestInterface $req) {

                switch($cmd->getName()) {
                    case 'CopyObject':
                        $this->assertEquals(
                            'mydest-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                            $req->getUri()->getHost()
                        );
                        $this->assertEquals('/destKey', $req->getUri()->getPath());
                        $this->assertEquals(
                            'arn:aws:s3:us-west-2:123456789012:accesspoint:mydest',
                            $cmd['Bucket']
                        );
                        $this->assertEquals(
                            '/arn:aws:s3:us-west-2:123456789012:accesspoint:mysource/sourceKey',
                            $cmd['CopySource']
                        );
                        $this->assertEquals(
                            '/arn:aws:s3:us-west-2:123456789012:accesspoint:mysource/sourceKey',
                            $req->getHeader('x-amz-copy-source')[0]
                        );
                        break;

                    case 'CreateMultipartUpload':
                    case 'CompleteMultipartUpload':
                        $this->assertEquals(
                            'mydest-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                            $req->getUri()->getHost()
                        );
                        $this->assertEquals('/destKey', $req->getUri()->getPath());
                        $this->assertEquals(
                            'arn:aws:s3:us-west-2:123456789012:accesspoint:mydest',
                            $cmd['Bucket']
                        );
                        break;

                    case 'UploadPartCopy':
                        $this->assertEquals(
                            'mydest-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                            $req->getUri()->getHost()
                        );
                        $this->assertEquals('/destKey', $req->getUri()->getPath());
                        $this->assertEquals(
                            'arn:aws:s3:us-west-2:123456789012:accesspoint:mydest',
                            $cmd['Bucket']
                        );
                        $this->assertEquals(
                            '/arn:aws:s3:us-west-2:123456789012:accesspoint:mysource/sourceKey',
                            $cmd['CopySource']
                        );
                        $this->assertEquals(
                            '/arn:aws:s3:us-west-2:123456789012:accesspoint:mysource/sourceKey',
                            $req->getHeader('x-amz-copy-source')[0]
                        );
                        break;

                    case 'HeadObject':
                        $this->assertEquals(
                            'mysource-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                            $req->getUri()->getHost()
                        );
                        $this->assertEquals('/sourceKey', $req->getUri()->getPath());
                        break;

                    default:
                        $this->fail('Unexpected command encountered.');

                }

                return Promise\promise_for(new Result([]));
            }
        ));
        $this->addMockResults($client, $mockedResults);
        (new ObjectCopier(
            $client,
            ['Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:mysource', 'Key' => 'sourceKey'],
            ['Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:mydest', 'Key' => 'destKey'],
            'private',
            $options
        ))->copy();
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
            ['Bucket' => 'source-bucket', 'Key' => 'sourceKey'],
            ['Bucket' => 'bucket', 'Key' => 'key'],
            'private',
            $options
        ))->promise();
        $this->assertFalse($this->mockQueueEmpty());
        $result = $promise->wait();
        $this->assertEquals('https://bucket.s3.amazonaws.com/key', $result['ObjectURL']);
        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getCopyTestCasesWithPathStyle
     */
    public function testDoesCorrectOperationAsynchronouslyWithPathStyle(
        array $mockedResults,
        array $options
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('S3', [
            'use_path_style_endpoint' => true
        ]);
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

    private function getSmallPutObjectMockResult()
    {
        $smallHeadObject = new Result(['ContentLength' => 1024 * 1024 * 6]);
        $putObject = new Result();

        return [$smallHeadObject, $putObject];
    }

    private function getMultipartMockResults()
    {
        $smallHeadObject = new Result(['ContentLength' => 1024 * 1024 * 6]);
        $partCount = ceil($smallHeadObject['ContentLength'] / MultipartUploader::PART_MIN_SIZE);
        $initiate = new Result(['UploadId' => 'foo']);
        $putPart = new Result(['ETag' => 'bar']);
        $complete = new Result(['Location' => 'https://bucket.s3.amazonaws.com/key']);

        return array_merge(
            [$smallHeadObject, $initiate],
            array_fill(0, $partCount, $putPart),
            [$complete]
        );
    }

    public function getCopyTestCases()
    {
        return [
            [
                $this->getSmallPutObjectMockResult(),
                []
            ],
            [
                $this->getMultipartMockResults(),
                ['mup_threshold' => MultipartUploader::PART_MIN_SIZE]
            ],
        ];
    }

    private function getPathStyleMultipartMockResults()
    {
        $smallHeadObject = new Result(['ContentLength' => 1024 * 1024 * 6]);
        $partCount = ceil($smallHeadObject['ContentLength'] / MultipartUploader::PART_MIN_SIZE);
        $initiate = new Result(['UploadId' => 'foo']);
        $putPart = new Result(['ETag' => 'bar']);
        $complete = new Result(['Location' => 'https://s3.amazonaws.com/bucket/key']);

        return array_merge(
            [$smallHeadObject, $initiate],
            array_fill(0, $partCount, $putPart),
            [$complete]
        );
    }

    public function getCopyTestCasesWithPathStyle()
    {
        return [
            [
                $this->getSmallPutObjectMockResult(),
                []
            ],
            [
                $this->getPathStyleMultipartMockResults(),
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

    public function testS3ObjectCopierCopyObjectParams()
    {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('s3');
        $copyOptions = [
            'params'          => ['RequestPayer' => 'test'],
            'before_lookup'   => function($command) {
                $this->assertEquals('test', $command['RequestPayer']);
            },
            'before_upload'   => function($command) {
                $this->assertEquals('test', $command['RequestPayer']);
            },
        ];
        $url = 'https://bucket.s3.amazonaws.com/key';

        $this->addMockResults(
            $client,
            $this->getSmallPutObjectMockResult()
        );

        $uploader = new ObjectCopier(
            $client,
            ['Bucket' => 'sourceBucket', 'Key' => 'sourceKey'],
            ['Bucket' => 'bucket', 'Key' => 'key'],
            'private',
            $copyOptions);
        $this->assertFalse($this->mockQueueEmpty());
        $result = $uploader->copy();

        $this->assertEquals($url, $result['ObjectURL']);
        $this->assertTrue($this->mockQueueEmpty());
    }

    public function testS3ObjectCopierMultipartParams()
    {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('s3');
        $copyOptions = [
            'mup_threshold'   => MultipartUploader::PART_MIN_SIZE,
            'params'          => ['RequestPayer' => 'test'],
            'before_lookup'   => function($command) {
                $this->assertEquals('test', $command['RequestPayer']);
            },
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
        $url = 'https://bucket.s3.amazonaws.com/key';

        $this->addMockResults(
            $client,
            $this->getMultipartMockResults()
        );

        $uploader = new ObjectCopier(
            $client,
            ['Bucket' => 'sourceBucket', 'Key' => 'sourceKey'],
            ['Bucket' => 'bucket', 'Key' => 'key'],
            'private',
            $copyOptions);
        $this->assertFalse($this->mockQueueEmpty());
        $result = $uploader->copy();

        $this->assertEquals($url, $result['ObjectURL']);
        $this->assertTrue($this->mockQueueEmpty());
    }
}
