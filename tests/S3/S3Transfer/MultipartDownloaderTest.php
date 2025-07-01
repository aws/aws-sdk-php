<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Command;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\Models\DownloadResponse;
use Aws\S3\S3Transfer\MultipartDownloader;
use Aws\S3\S3Transfer\PartGetMultipartDownloader;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\RangeGetMultipartDownloader;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;

/**
 * Tests MultipartDownloader abstract class implementation.
 */
class MultipartDownloaderTest extends TestCase
{
    /**
     * Tests chooseDownloaderClass factory method.
     *
     * @return void
     */
    public function testChooseDownloaderClass(): void {
        $multipartDownloadTypes = [
            MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER => PartGetMultipartDownloader::class,
            MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER => RangeGetMultipartDownloader::class,
        ];
        foreach ($multipartDownloadTypes as $multipartDownloadType => $class) {
            $resolvedClass = MultipartDownloader::chooseDownloaderClass($multipartDownloadType);
            $this->assertEquals($class, $resolvedClass);
        }
    }

    /**
     * Tests chooseDownloaderClass throws exception for invalid type.
     *
     * @return void
     */
    public function testChooseDownloaderClassThrowsExceptionForInvalidType(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The config value for `multipart_download_type` must be one of:');

        MultipartDownloader::chooseDownloaderClass('invalidType');
    }

    /**
     * Tests constants are properly defined.
     *
     * @return void
     */
    public function testConstants(): void
    {
        $this->assertEquals('GetObject', MultipartDownloader::GET_OBJECT_COMMAND);
        $this->assertEquals('partGet', MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER);
        $this->assertEquals('rangeGet', MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER);
    }

    /**
     * @return void
     */
    public function testTransferListenerNotifierNotifiesListenersOnSuccess(): void
    {
        $listener1 = $this->getMockBuilder(TransferListener::class)->getMock();
        $listener2 = $this->getMockBuilder(TransferListener::class)->getMock();
        $listener3 = $this->getMockBuilder(TransferListener::class)->getMock();

        $listener1->expects($this->once())->method('transferInitiated');
        $listener1->expects($this->atLeastOnce())->method('bytesTransferred');
        $listener1->expects($this->once())->method('transferComplete');

        $listener2->expects($this->once())->method('transferInitiated');
        $listener2->expects($this->atLeastOnce())->method('bytesTransferred');
        $listener2->expects($this->once())->method('transferComplete');

        $listener3->expects($this->once())->method('transferInitiated');
        $listener3->expects($this->atLeastOnce())->method('bytesTransferred');
        $listener3->expects($this->once())->method('transferComplete');

        $listenerNotifier = new TransferListenerNotifier([$listener1, $listener2, $listener3]);

        $s3Client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $s3Client->method('executeAsync')
            ->willReturnCallback(function ($command) {
                if ($command->getName() === 'GetObject') {
                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor('test data'),
                        'ContentLength' => 9,
                        'ContentRange' => 'bytes 0-8/9',
                        'PartsCount' => 1,
                        'ETag' => 'TestETag'
                    ]));
                }
                return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $requestArgs = [
            'Key' => 'test-key',
            'Bucket' => 'test-bucket',
        ];

        $multipartDownloader = new PartGetMultipartDownloader(
            $s3Client,
            $requestArgs,
            [],
            0,
            0,
            0,
            '',
            null,
            null,
            $listenerNotifier
        );

        $response = $multipartDownloader->promise()->wait();
        $this->assertInstanceOf(DownloadResponse::class, $response);
    }

    /**
     * @return void
     */
    public function testTransferListenerNotifierNotifiesListenersOnFailure(): void
    {
        $listener1 = $this->getMockBuilder(TransferListener::class)->getMock();
        $listener2 = $this->getMockBuilder(TransferListener::class)->getMock();

        $listener1->expects($this->once())->method('transferInitiated');
        $listener1->expects($this->once())->method('transferFail');

        $listener2->expects($this->once())->method('transferInitiated');
        $listener2->expects($this->once())->method('transferFail');

        $listenerNotifier = new TransferListenerNotifier([$listener1, $listener2]);

        $s3Client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $s3Client->method('executeAsync')
            ->willReturnCallback(function ($command) {
                if ($command->getName() === 'GetObject') {
                    return Create::rejectionFor(new \Exception('Download failed'));
                }
                return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $requestArgs = [
            'Key' => 'test-key',
            'Bucket' => 'test-bucket',
        ];

        $multipartDownloader = new PartGetMultipartDownloader(
            $s3Client,
            $requestArgs,
            [],
            0,
            0,
            0,
            '',
            null,
            null,
            $listenerNotifier
        );

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Download failed');
        $multipartDownloader->promise()->wait();
    }

    /**
     * @return void
     */
    public function testTransferListenerNotifierWithEmptyListeners(): void
    {
        $listenerNotifier = new TransferListenerNotifier([]);

        $s3Client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $s3Client->method('executeAsync')
            ->willReturnCallback(function ($command) {
                if ($command->getName() === 'GetObject') {
                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor('test'),
                        'ContentLength' => 4,
                        'ContentRange' => 'bytes 0-3/4',
                        'PartsCount' => 1,
                        'ETag' => 'TestETag'
                    ]));
                }
                return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $requestArgs = [
            'Key' => 'test-key',
            'Bucket' => 'test-bucket',
        ];

        $multipartDownloader = new PartGetMultipartDownloader(
            $s3Client,
            $requestArgs,
            [],
            0,
            0,
            0,
            '',
            null,
            null,
            $listenerNotifier
        );

        $response = $multipartDownloader->promise()->wait();
        $this->assertInstanceOf(DownloadResponse::class, $response);
    }
}