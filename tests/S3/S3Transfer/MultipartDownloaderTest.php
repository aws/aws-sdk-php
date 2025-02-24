<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Command;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\DownloadResponse;
use Aws\S3\S3Transfer\MultipartDownloader;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;

/**
 * Tests multipart download implementation.
 */
class MultipartDownloaderTest extends TestCase
{

    /**
     * Tests part and range get multipart downloader.
     *
     * @param string $multipartDownloadType
     * @param string $objectKey
     * @param int $objectSizeInBytes
     * @param int $targetPartSize
     *
     * @dataProvider partGetMultipartDownloaderProvider
     *
     * @return void
     */
    public function testMultipartDownloader(
        string $multipartDownloadType,
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
        $downloaderClassName = MultipartDownloader::chooseDownloaderClassName(
            $multipartDownloadType
        );
        /** @var MultipartDownloader $downloader */
        $downloader = new $downloaderClassName(
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
                'multipartDownloadType' => MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_1',
                'objectSizeInBytes' => 1024 * 10,
                'targetPartSize' => 1024 * 2,
            ],
            [
                'multipartDownloadType' => MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_2',
                'objectSizeInBytes' => 1024 * 100,
                'targetPartSize' => 1024 * 5,
            ],
            [
                'multipartDownloadType' => MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_3',
                'objectSizeInBytes' => 512,
                'targetPartSize' => 512,
            ],
            [
                'multipartDownloadType' => MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_4',
                'objectSizeInBytes' => 512,
                'targetPartSize' => 256,
            ],
            [
                'multipartDownloadType' => MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_5',
                'objectSizeInBytes' => 512,
                'targetPartSize' => 458,
            ],
            [
                'multipartDownloadType' => MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_1',
                'objectSizeInBytes' => 1024 * 10,
                'targetPartSize' => 1024 * 2,
            ],
            [
                'multipartDownloadType' => MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_2',
                'objectSizeInBytes' => 1024 * 100,
                'targetPartSize' => 1024 * 5,
            ],
            [
                'multipartDownloadType' => MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_3',
                'objectSizeInBytes' => 512,
                'targetPartSize' => 512,
            ],
            [
                'multipartDownloadType' => MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_4',
                'objectSizeInBytes' => 512,
                'targetPartSize' => 256,
            ],
            [
                'multipartDownloadType' => MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER,
                'objectKey' => 'ObjectKey_5',
                'objectSizeInBytes' => 512,
                'targetPartSize' => 458,
            ]
        ];
    }
}