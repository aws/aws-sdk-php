<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Command;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\Models\DownloadResponse;
use Aws\S3\S3Transfer\PartGetMultipartDownloader;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;

/**
 * Tests PartGetMultipartDownloader implementation.
 */
class PartGetMultipartDownloaderTest extends TestCase
{
    /**
     * Tests part get multipart downloader.
     *
     * @param string $objectKey
     * @param int $objectSizeInBytes
     * @param int $targetPartSize
     *
     * @dataProvider partGetMultipartDownloaderProvider
     *
     * @return void
     */
    public function testPartGetMultipartDownloader(
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
                    'PartNumber' => $command['PartNumber'],
                    'ContentRange' => "bytes $from-$to/$objectSizeInBytes",
                    'ContentLength' =>  $currentPartLength
                ]));
            });
        $mockClient->method('getCommand')
            -> willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $downloader = new PartGetMultipartDownloader(
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
     * Part get multipart downloader data provider.
     *
     * @return array[]
     */
    public function partGetMultipartDownloaderProvider(): array {
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
     * Tests nextCommand method increments part number correctly.
     *
     * @return void
     */
    public function testNextCommandIncrementsPartNumber(): void
    {
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $downloader = new PartGetMultipartDownloader(
            $mockClient,
            [
                'Bucket' => 'TestBucket',
                'Key' => 'TestKey',
            ]
        );

        // Use reflection to test the protected nextCommand method
        $reflection = new \ReflectionClass($downloader);
        $nextCommandMethod = $reflection->getMethod('nextCommand');

        // First call should set part number to 1
        $command1 = $nextCommandMethod->invoke($downloader);
        $this->assertEquals(1, $command1['PartNumber']);
        $this->assertEquals(1, $downloader->getCurrentPartNo());

        // Second call should increment to 2
        $command2 = $nextCommandMethod->invoke($downloader);
        $this->assertEquals(2, $command2['PartNumber']);
        $this->assertEquals(2, $downloader->getCurrentPartNo());
    }

    /**
     * Tests computeObjectDimensions method correctly calculates object size.
     *
     * @return void
     */
    public function testComputeObjectDimensions(): void
    {
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $downloader = new PartGetMultipartDownloader(
            $mockClient,
            [
                'Bucket' => 'TestBucket',
                'Key' => 'TestKey',
            ]
        );

        // Use reflection to test the protected computeObjectDimensions method
        $reflection = new \ReflectionClass($downloader);
        $computeObjectDimensionsMethod = $reflection->getMethod('computeObjectDimensions');

        $result = new Result([
            'PartsCount' => 5,
            'ContentRange' => 'bytes 0-1023/2048'
        ]);

        $computeObjectDimensionsMethod->invoke($downloader, $result);

        $this->assertEquals(5, $downloader->getObjectPartsCount());
        $this->assertEquals(2048, $downloader->getObjectSizeInBytes());
    }
}