<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Command;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\Models\DownloadResult;
use Aws\S3\S3Transfer\Models\S3TransferManagerConfig;
use Aws\S3\S3Transfer\AbstractMultipartDownloader;
use Aws\S3\S3Transfer\PartGetMultipartDownloader;
use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\RangeGetMultipartDownloader;
use Aws\S3\S3Transfer\Utils\AbstractDownloadHandler;
use Aws\S3\S3Transfer\Utils\StreamDownloadHandler;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;

/**
 * Tests MultipartDownloader abstract class implementation.
 */
class AbstractMultipartDownloaderTest extends TestCase
{
    /**
     * Tests chooseDownloaderClass factory method.
     *
     * @return void
     */
    public function testChooseDownloaderClass(): void {
        $multipartDownloadTypes = [
            AbstractMultipartDownloader::PART_GET_MULTIPART_DOWNLOADER => PartGetMultipartDownloader::class,
            AbstractMultipartDownloader::RANGED_GET_MULTIPART_DOWNLOADER => RangeGetMultipartDownloader::class,
        ];
        foreach ($multipartDownloadTypes as $multipartDownloadType => $class) {
            $resolvedClass = AbstractMultipartDownloader::chooseDownloaderClass($multipartDownloadType);
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

        AbstractMultipartDownloader::chooseDownloaderClass('invalidType');
    }

    /**
     * Tests constants are properly defined.
     *
     * @return void
     */
    public function testConstants(): void
    {
        $this->assertEquals('GetObject', AbstractMultipartDownloader::GET_OBJECT_COMMAND);
        $this->assertEquals('part', AbstractMultipartDownloader::PART_GET_MULTIPART_DOWNLOADER);
        $this->assertEquals('ranged', AbstractMultipartDownloader::RANGED_GET_MULTIPART_DOWNLOADER);
    }

    /**
     * @return void
     */
    public function testTransferListenerNotifierNotifiesListenersOnSuccess(): void
    {
        $listener1 = $this->getMockBuilder(AbstractTransferListener::class)->getMock();
        $listener2 = $this->getMockBuilder(AbstractTransferListener::class)->getMock();
        $listener3 = $this->getMockBuilder(AbstractTransferListener::class)->getMock();

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
            new StreamDownloadHandler(),
            [],
            0,
            0,
            '',
            null,
            $listenerNotifier,
        );

        $response = $multipartDownloader->promise()->wait();
        $this->assertInstanceOf(DownloadResult::class, $response);
    }

    /**
     * @return void
     */
    public function testTransferListenerNotifierNotifiesListenersOnFailure(): void
    {
        $listener1 = $this->getMockBuilder(AbstractTransferListener::class)->getMock();
        $listener2 = $this->getMockBuilder(AbstractTransferListener::class)->getMock();

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
            new StreamDownloadHandler(),
            [],
            0,
            0,
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
            new StreamDownloadHandler(),
            [],
            0,
            0,
            null,
            null,
            $listenerNotifier
        );

        $response = $multipartDownloader->promise()->wait();
        $this->assertInstanceOf(DownloadResult::class, $response);
    }

    /**
     * @return void
     */
    public function testConfigIsSetToDefaultValues(): void {
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $multipartDownloader = new PartGetMultipartDownloader(
            $mockClient,
            [],
            [],
            new StreamDownloadHandler(),
        );
        $config = $multipartDownloader->getConfig();
        $this->assertEquals(
            S3TransferManagerConfig::DEFAULT_TARGET_PART_SIZE_BYTES,
            $config['target_part_size_bytes']
        );
        $this->assertEquals(
            S3TransferManagerConfig::DEFAULT_RESPONSE_CHECKSUM_VALIDATION,
            $config['response_checksum_validation']
        );
    }

    /**
     * @return void
     */
    public function testCustomConfigIsSet(): void {
        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $multipartDownloader = new PartGetMultipartDownloader(
            $mockClient,
            [],
            [
                'target_part_size_bytes' => 1024 * 1024 * 10,
                'response_checksum_validation' => 'when_required',
            ],
            new StreamDownloadHandler(),
        );
        $config = $multipartDownloader->getConfig();
        $this->assertEquals(
            1024 * 1024 * 10,
            $config['target_part_size_bytes']
        );
        $this->assertEquals(
            'when_required',
            $config['response_checksum_validation']
        );
    }
}
