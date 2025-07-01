<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Command;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadResponse;
use Aws\S3\S3Transfer\RangeGetMultipartDownloader;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;

/**
 * Tests RangeGetMultipartDownloader implementation.
 */
class RangeGetMultipartDownloaderTest extends TestCase
{
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
                'minimum_part_size' => $targetPartSize,
            ]
        );
        /** @var DownloadResponse $response */
        $response = $downloader->promise()->wait();
        $snapshot = $downloader->getCurrentSnapshot();

        $this->assertInstanceOf(DownloadResponse::class, $response);
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
     * Tests constructor throws exception when minimum_part_size is not provided.
     *
     * @return void
     */
    public function testConstructorThrowsExceptionWithoutMinimumPartSize(): void
    {
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('You must provide a valid minimum part size in bytes');

        new RangeGetMultipartDownloader(
            $mockClient,
            [
                'Bucket' => 'TestBucket',
                'Key' => 'TestKey',
            ],
            [] // Missing minimum_part_size
        );
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
                'minimum_part_size' => $partSize,
            ]
        );

        // Use reflection to test the protected nextCommand method
        $reflection = new \ReflectionClass($downloader);
        $nextCommandMethod = $reflection->getMethod('nextCommand');
        $nextCommandMethod->setAccessible(true);

        // First call should create range 0-1023
        $command1 = $nextCommandMethod->invoke($downloader);
        $this->assertEquals('bytes=0-1023', $command1['Range']);
        $this->assertEquals(1, $downloader->getCurrentPartNo());

        // Second call should create range 1024-2047
        $command2 = $nextCommandMethod->invoke($downloader);
        $this->assertEquals('bytes=1024-2047', $command2['Range']);
        $this->assertEquals(2, $downloader->getCurrentPartNo());
    }

    /**
     * Tests computeObjectDimensions method with known object size.
     *
     * @return void
     */
    public function testComputeObjectDimensionsWithKnownSize(): void
    {
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $objectSize = 5120;
        $partSize = 1024;
        $downloader = new RangeGetMultipartDownloader(
            $mockClient,
            [
                'Bucket' => 'TestBucket',
                'Key' => 'TestKey',
            ],
            [
                'minimum_part_size' => $partSize,
            ],
            0, // currentPartNo
            0, // objectPartsCount
            $objectSize // objectSizeInBytes - known at construction
        );

        // With known object size, parts count should be calculated during construction
        $this->assertEquals(5, $downloader->getObjectPartsCount());
        $this->assertEquals($objectSize, $downloader->getObjectSizeInBytes());
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
            ]
        );

        // Use reflection to test the protected computeObjectDimensions method
        $reflection = new \ReflectionClass($downloader);
        $computeObjectDimensionsMethod = $reflection->getMethod('computeObjectDimensions');
        $computeObjectDimensionsMethod->setAccessible(true);

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
     * Tests nextCommand method includes IfMatch header when ETag is present.
     *
     * @return void
     */
    public function testNextCommandIncludesIfMatchWhenETagPresent(): void
    {
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $eTag = '"abc123"';
        $downloader = new RangeGetMultipartDownloader(
            $mockClient,
            [
                'Bucket' => 'TestBucket',
                'Key' => 'TestKey',
            ],
            [
                'minimum_part_size' => 1024,
            ],
            0, // currentPartNo
            0, // objectPartsCount
            0, // objectSizeInBytes
            $eTag // eTag
        );

        // Use reflection to test the protected nextCommand method
        $reflection = new \ReflectionClass($downloader);
        $nextCommandMethod = $reflection->getMethod('nextCommand');
        $nextCommandMethod->setAccessible(true);

        $command = $nextCommandMethod->invoke($downloader);
        $this->assertEquals($eTag, $command['IfMatch']);
    }
}