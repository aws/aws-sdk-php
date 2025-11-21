<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Command;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadResult;
use Aws\S3\S3Transfer\RangeGetMultipartDownloader;
use Aws\S3\S3Transfer\Utils\FileDownloadHandler;
use Aws\S3\S3Transfer\Utils\StreamDownloadHandler;
use Aws\Test\TestsUtility;
use Generator;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;

/**
 * Tests RangeGetMultipartDownloader implementation.
 */
class RangeGetMultipartDownloaderTest extends TestCase
{
    /** @var string */
    private string $tempDir;

    protected function setUp(): void
    {
        $this->tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'part-downloader-resume-test/';
        if (!is_dir($this->tempDir)) {
            mkdir($this->tempDir, 0777, true);
        }
    }

    protected function tearDown(): void
    {
        TestsUtility::cleanUpDir($this->tempDir);
    }

    /**
     * Tests range get multipart downloader.
     *
     * @param string $objectKey
     * @param int $objectSizeInBytes
     * @param int $targetPartSize
     *
     * @dataProvider rangeGetMultipartDownloaderProvider
     *
     * @return void
     */
    public function testRangeGetMultipartDownloader(
        string $objectKey,
        int $objectSizeInBytes,
        int $targetPartSize
    ): void {
        $partsCount = (int) ceil($objectSizeInBytes / $targetPartSize);
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $remainingToTransfer = $objectSizeInBytes;
        $mockClient->method('executeAsync')
            -> willReturnCallback(function ($command)
                use (
                    $objectSizeInBytes,
                    $partsCount,
                    $targetPartSize,
                    &$remainingToTransfer
                ) {
                $currentPartLength = min(
                    $targetPartSize,
                    $remainingToTransfer
                );
                $from = $objectSizeInBytes - $remainingToTransfer;
                $to = $from + $currentPartLength;
                $remainingToTransfer -= $currentPartLength;
                return Create::promiseFor(new Result([
                    'Body' => Utils::streamFor('Foo'),
                    'PartsCount' => $partsCount,
                    'PartNumber' => $command['PartNumber'] ?? 1,
                    'ContentRange' => "bytes $from-$to/$objectSizeInBytes",
                    'ContentLength' =>  $currentPartLength
                ]));
            });
        $mockClient->method('getCommand')
            -> willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $downloader = new RangeGetMultipartDownloader(
            $mockClient,
            [
                'Bucket' => 'FooBucket',
                'Key' => $objectKey,
            ],
            [
                'target_part_size_bytes' => $targetPartSize,
            ],
            new StreamDownloadHandler()
        );
        /** @var DownloadResult $response */
        $response = $downloader->promise()->wait();
        $snapshot = $downloader->getCurrentSnapshot();

        $this->assertInstanceOf(DownloadResult::class, $response);
        $this->assertEquals($objectKey, $snapshot->getIdentifier());
        $this->assertEquals($objectSizeInBytes, $snapshot->getTotalBytes());
        $this->assertEquals($objectSizeInBytes, $snapshot->getTransferredBytes());
        $this->assertEquals($partsCount, $downloader->getObjectPartsCount());
        $this->assertEquals($partsCount, $downloader->getCurrentPartNo());
    }

    /**
     * Range get multipart downloader data provider.
     *
     * @return array[]
     */
    public function rangeGetMultipartDownloaderProvider(): array {
        return [
            [
                'objectKey' => 'ObjectKey_1',
                'objectSizeInBytes' => 1024 * 10,
                'targetPartSize' => 1024 * 2,
            ],
            [
                'objectKey' => 'ObjectKey_2',
                'objectSizeInBytes' => 1024 * 100,
                'targetPartSize' => 1024 * 5,
            ],
            [
                'objectKey' => 'ObjectKey_3',
                'objectSizeInBytes' => 512,
                'targetPartSize' => 512,
            ],
            [
                'objectKey' => 'ObjectKey_4',
                'objectSizeInBytes' => 512,
                'targetPartSize' => 256,
            ],
            [
                'objectKey' => 'ObjectKey_5',
                'objectSizeInBytes' => 512,
                'targetPartSize' => 458,
            ]
        ];
    }

    /**
     * Tests nextCommand method generates correct range headers.
     *
     * @return void
     */
    public function testNextCommandGeneratesCorrectRangeHeaders(): void
    {
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $partSize = 1024;
        $downloader = new RangeGetMultipartDownloader(
            $mockClient,
            [
                'Bucket' => 'TestBucket',
                'Key' => 'TestKey',
            ],
            [
                'target_part_size_bytes' => $partSize,
            ],
            new StreamDownloadHandler()
        );

        // Use reflection to test the protected nextCommand method
        $reflection = new \ReflectionClass($downloader);
        $nextCommandMethod = $reflection->getMethod('getFetchCommandArgs');

        // First call should create range 0-1023
        $command1 = $nextCommandMethod->invoke($downloader);
        $this->assertEquals('bytes=0-1023', $command1['Range']);
        $this->assertEquals(1, $downloader->getCurrentPartNo());
    }

    /**
     * Tests computeObjectDimensions method for single part download.
     *
     * @return void
     */
    public function testComputeObjectDimensionsForSinglePart(): void
    {
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $partSize = 2048;
        $downloader = new RangeGetMultipartDownloader(
            $mockClient,
            [
                'Bucket' => 'TestBucket',
                'Key' => 'TestKey',
            ],
            [
                'minimum_part_size' => $partSize,
            ],
            new StreamDownloadHandler(),
        );

        // Use reflection to test the protected computeObjectDimensions method
        $reflection = new \ReflectionClass($downloader);
        $computeObjectDimensionsMethod = $reflection->getMethod('computeObjectDimensions');

        // Simulate object smaller than part size
        $result = new Result([
            'ContentRange' => 'bytes 0-511/512'
        ]);

        $computeObjectDimensionsMethod->invoke($downloader, $result);

        // Should be single part download
        $this->assertEquals(1, $downloader->getObjectPartsCount());
        $this->assertEquals(512, $downloader->getObjectSizeInBytes());
    }

    /**
     * Test IfMatch is properly called in each part get operation.
     *
     * @param int $objectSizeInBytes
     * @param int $targetPartSize
     * @param string $eTag
     *
     * @dataProvider ifMatchIsPresentInEachRangeRequestAfterFirstProvider
     *
     * @return void
     */
    public function testIfMatchIsPresentInEachRangeRequestAfterFirst(
        int $objectSizeInBytes,
        int $targetPartSize,
        string $eTag
    ): void
    {
        $firstRequestCalled = false;
        $ifMatchCalledTimes = 0;
        $partsCount = ceil($objectSizeInBytes / $targetPartSize);
        $remainingToTransfer = $objectSizeInBytes;
        $s3Client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args)
            use ($eTag, &$ifMatchCalledTimes) {
                if (isset($args['IfMatch'])) {
                    $ifMatchCalledTimes++;
                    $this->assertEquals(
                        $eTag,
                        $args['IfMatch']
                    );
                }

                return new Command($commandName, $args);
            });
        $s3Client->method('executeAsync')
            -> willReturnCallback(function ($command)
            use (
                $eTag,
                $objectSizeInBytes,
                $partsCount,
                $targetPartSize,
                &$remainingToTransfer,
                &$firstRequestCalled
            ) {
                $firstRequestCalled = true;
                $currentPartLength = min(
                    $targetPartSize,
                    $remainingToTransfer
                );
                $from = $objectSizeInBytes - $remainingToTransfer;
                $to = $from + $currentPartLength;
                $remainingToTransfer -= $currentPartLength;
                return Create::promiseFor(new Result([
                    'Body' => Utils::streamFor('Foo'),
                    'ContentRange' => "bytes $from-$to/$objectSizeInBytes",
                    'ContentLength' =>  $currentPartLength,
                    'ETag' => $eTag,
                ]));
            });
        $requestArgs = [
            'Bucket' => 'TestBucket',
            'Key' => 'TestKey',
        ];
        $rangeGetMultipartDownloader = new RangeGetMultipartDownloader(
            $s3Client,
            $requestArgs,
            [
                'target_part_size_bytes' => $targetPartSize,
            ]
        );
        $rangeGetMultipartDownloader->download();
        $this->assertTrue($firstRequestCalled);
        $this->assertEquals(
            $partsCount - 1,
            $ifMatchCalledTimes
        );
    }

    /**
     * @return Generator
     */
    public function ifMatchIsPresentInEachRangeRequestAfterFirstProvider(): Generator
    {
        yield 'multipart_download_with_3_parts_1' => [
            'object_size_in_bytes' => 1024 * 1024 * 20,
            'target_part_size_bytes' => 8 * 1024 * 1024,
            'eTag' => 'ETag1234',
        ];

        yield 'multipart_download_with_2_parts_1' => [
            'object_size_in_bytes' => 1024 * 1024 * 16,
            'target_part_size_bytes' => 8 * 1024 * 1024,
            'eTag' => 'ETag12345678',
        ];

        yield 'multipart_download_with_5_parts_1' => [
            'object_size_in_bytes' => 1024 * 1024 * 40,
            'target_part_size_bytes' => 8 * 1024 * 1024,
            'eTag' => 'ETag12345678',
        ];
    }

    /**
     * @return void
     */
    public function testGeneratesResumeFileWhenDownloadFailsAndResumeIsEnabled(): void
    {
        $destination = $this->tempDir . 'download.txt';
        $objectSize = 1000;
        $partSize = 500;

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $callCount = 0;
        $mockClient->method('executeAsync')
            ->willReturnCallback(function () use (&$callCount, $objectSize, $partSize) {
                $callCount++;
                if ($callCount === 1) {
                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(str_repeat('a', $partSize)),
                        'ContentRange' => "bytes 0-499/$objectSize",
                        'ContentLength' => $partSize,
                        'ETag' => 'test-etag'
                    ]));
                }

                return new RejectedPromise(new \Exception('Download failed'));
            });

        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $handler = new FileDownloadHandler(
            $destination,
            false,
            true,
            null,
            $partSize
        );
        $downloader = new RangeGetMultipartDownloader(
            $mockClient,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => $partSize, 'resume_enabled' => true],
            $handler
        );

        try {
            $downloader->promise()->wait();
        } catch (\Exception $e) {
            // Expected to fail
        }

        $this->assertFileExists($handler->getResumeFilePath());
    }

    /**
     * @return void
     */
    public function testGeneratesResumeFileWithCustomPath(): void
    {
        $destination = $this->tempDir . 'download.txt';
        $customResumePath = $this->tempDir . 'custom-resume.resume';
        $objectSize = 1000;
        $partSize = 500;

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $callCount = 0;
        $mockClient->method('executeAsync')
            ->willReturnCallback(function () use (&$callCount, $objectSize, $partSize) {
                $callCount++;
                if ($callCount === 1) {
                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(str_repeat('a', $partSize)),
                        'ContentRange' => "bytes 0-499/$objectSize",
                        'ContentLength' => $partSize,
                        'ETag' => 'test-etag'
                    ]));
                }
                return new RejectedPromise(new \Exception('Download failed'));
            });

        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $handler = new FileDownloadHandler(
            $destination,
            false,
            true,
            null,
            $partSize
        );
        $downloader = new RangeGetMultipartDownloader(
            $mockClient,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            [
                'target_part_size_bytes' => $partSize,
                'resume_enabled' => true,
                'resume_file_path' => $customResumePath
            ],
            $handler
        );

        try {
            $downloader->promise()->wait();
        } catch (\Exception $e) {
            // Expected to fail
        }

        $this->assertFileExists($customResumePath);
    }

    /**
     * @return void
     */
    public function testRemovesResumeFileAfterSuccessfulCompletion(): void
    {
        $destination = $this->tempDir . 'download.txt';
        $objectSize = 1000;
        $partSize = 500;

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockClient->method('executeAsync')
            ->willReturnCallback(function () use ($objectSize, $partSize) {
                static $callCount = 0;
                $callCount++;

                $from = ($callCount - 1) * $partSize;
                $to = min($from + $partSize - 1, $objectSize - 1);
                $length = $to - $from + 1;

                return Create::promiseFor(new Result([
                    'Body' => Utils::streamFor(str_repeat('a', $length)),
                    'ContentRange' => "bytes $from-$to/$objectSize",
                    'ContentLength' => $length,
                    'ETag' => 'test-etag'
                ]));
            });

        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $handler = new FileDownloadHandler($destination, false, true, null, $partSize);
        $downloader = new RangeGetMultipartDownloader(
            $mockClient,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => $partSize, 'resume_enabled' => true],
            $handler
        );

        $resumeFile = $handler->getResumeFilePath();
        $downloader->promise()->wait();

        $this->assertFileDoesNotExist($resumeFile);
    }

}
