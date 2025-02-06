<?php

namespace Aws\Test\S3\Features\S3Transfer;

use Aws\Command;
use Aws\Result;
use Aws\S3\Features\S3Transfer\MultipartDownloader;
use Aws\S3\S3Client;
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
     * @return void
     * @dataProvider partGetMultipartDownloaderProvider
     *
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
        $downloader = MultipartDownloader::chooseDownloader(
            $mockClient,
            $multipartDownloadType,
            [
                'Bucket' => 'FooBucket',
                'Key' => $objectKey,
            ],
            [
                'minimumPartSize' => $targetPartSize,
            ]
        );
        $stream = $downloader->promise()->wait();

        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertEquals($objectKey, $downloader->getObjectKey());
        $this->assertEquals($objectSizeInBytes, $downloader->getObjectSizeInBytes());
        $this->assertEquals($objectSizeInBytes, $downloader->getObjectBytesTransferred());
        $this->assertEquals($partsCount, $downloader->getObjectPartsCount());
        $this->assertEquals($partsCount, $downloader->getObjectCompletedPartsCount());
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