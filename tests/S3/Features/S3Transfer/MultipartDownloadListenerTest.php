<?php

namespace Aws\Test\S3\Features\S3Transfer;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Aws\S3\Features\S3Transfer\MultipartDownloadListener;
use Exception;
use PHPUnit\Framework\TestCase;

class MultipartDownloadListenerTest extends TestCase
{
    /*
     * Tests download initiated event is propagated.
     *
     * @return void
     */
    public function testDownloadInitiated(): void
    {
        $called = false;
        $callback = function ($commandArgs, $initialPart) use (&$called) {
            $called = true;
            $this->assertIsArray($commandArgs);
            $this->assertIsInt($initialPart);
        };

        $listener = new MultipartDownloadListener(onDownloadInitiated: $callback);

        $commandArgs = ['Foo' => 'Buzz'];
        $listener->downloadInitiated($commandArgs, 1);

        $this->assertTrue($called, "Expected onDownloadInitiated to be called.");
    }

    /**
     * Tests download failed event is propagated.
     *
     * @return void
     */
    public function testDownloadFailed(): void
    {
        $called = false;
        $expectedError = new Exception('Download failed');
        $expectedTotalPartsTransferred = 5;
        $expectedTotalBytesTransferred = 1024;
        $expectedLastPartTransferred = 4;
        $callback = function (
            $reason,
            $totalPartsTransferred,
            $totalBytesTransferred,
            $lastPartTransferred
        ) use (
            &$called,
            $expectedError,
            $expectedTotalPartsTransferred,
            $expectedTotalBytesTransferred,
            $expectedLastPartTransferred
        ) {
            $called = true;
            $this->assertEquals($reason, $expectedError);
            $this->assertEquals($expectedTotalPartsTransferred, $totalPartsTransferred);
            $this->assertEquals($expectedTotalBytesTransferred, $totalBytesTransferred);
            $this->assertEquals($expectedLastPartTransferred, $lastPartTransferred);

        };
        $listener = new MultipartDownloadListener(onDownloadFailed: $callback);
        $listener->downloadFailed(
            $expectedError,
            $expectedTotalPartsTransferred,
            $expectedTotalBytesTransferred,
            $expectedLastPartTransferred
        );
        $this->assertTrue($called, "Expected onDownloadFailed to be called.");
    }

    /**
     * Tests download completed event is propagated.
     *
     * @return void
     */
    public function testDownloadCompleted(): void
    {
        $called = false;
        $expectedStream = fopen('php://temp', 'r+');
        $expectedTotalPartsDownloaded = 10;
        $expectedTotalBytesDownloaded = 2048;
        $callback = function (
            $stream,
            $totalPartsDownloaded,
            $totalBytesDownloaded
        ) use (
            &$called,
            $expectedStream,
            $expectedTotalPartsDownloaded,
            $expectedTotalBytesDownloaded
        ) {
            $called = true;
            $this->assertIsResource($stream);
            $this->assertEquals($expectedStream, $stream);
            $this->assertEquals($expectedTotalPartsDownloaded, $totalPartsDownloaded);
            $this->assertEquals($expectedTotalBytesDownloaded, $totalBytesDownloaded);
        };

        $listener = new MultipartDownloadListener(onDownloadCompleted: $callback);
        $listener->downloadCompleted(
            $expectedStream,
            $expectedTotalPartsDownloaded,
            $expectedTotalBytesDownloaded
        );
        $this->assertTrue($called, "Expected onDownloadCompleted to be called.");
    }

    /**
     * Tests part downloaded initiated event is propagated.
     *
     * @return void
     */
    public function testPartDownloadInitiated(): void
    {
        $called = false;
        $mockCommand = $this->createMock(CommandInterface::class);
        $expectedPartNo = 3;
        $callable = function ($command, $partNo)
        use (&$called, $mockCommand, $expectedPartNo) {
            $called = true;
            $this->assertEquals($expectedPartNo, $partNo);
            $this->assertEquals($mockCommand, $command);
        };
        $listener = new MultipartDownloadListener(onPartDownloadInitiated: $callable);
        $listener->partDownloadInitiated($mockCommand, $expectedPartNo);
        $this->assertTrue($called, "Expected onPartDownloadInitiated to be called.");
    }

    /**
     * Tests part download completed event is propagated.
     *
     * @return void
     */
    public function testPartDownloadCompleted(): void
    {
        $called = false;
        $mockResult = $this->createMock(ResultInterface::class);
        $expectedPartNo = 3;
        $expectedPartTotalBytes = 512;
        $expectedTotalParts = 5;
        $expectedObjectBytesTransferred = 1024;
        $expectedObjectSizeInBytes = 2048;
        $callback = function (
            $result,
            $partNo,
            $partTotalBytes,
            $totalParts,
            $objectBytesDownloaded,
            $objectSizeInBytes
        ) use (
            &$called,
            $mockResult,
            $expectedPartNo,
            $expectedPartTotalBytes,
            $expectedTotalParts,
            $expectedObjectBytesTransferred,
            $expectedObjectSizeInBytes
        ) {
            $called = true;
            $this->assertEquals($mockResult, $result);
            $this->assertEquals($expectedPartNo, $partNo);
            $this->assertEquals($expectedPartTotalBytes, $partTotalBytes);
            $this->assertEquals($expectedTotalParts, $totalParts);
            $this->assertEquals($expectedObjectBytesTransferred, $objectBytesDownloaded);
            $this->assertEquals($expectedObjectSizeInBytes, $objectSizeInBytes);
        };
        $listener = new MultipartDownloadListener(onPartDownloadCompleted: $callback);
        $listener->partDownloadCompleted(
            $mockResult,
            $expectedPartNo,
            $expectedPartTotalBytes,
            $expectedTotalParts,
            $expectedObjectBytesTransferred,
            $expectedObjectSizeInBytes
        );
        $this->assertTrue($called, "Expected onPartDownloadCompleted to be called.");
    }

    /**
     * Tests part download failed event is propagated.
     *
     * @return void
     */
    public function testPartDownloadFailed()
    {
        $called = false;
        $mockCommand = $this->createMock(CommandInterface::class);
        $expectedReason = new Exception('Part download failed');
        $expectedPartNo = 2;
        $callable = function ($command, $reason, $partNo)
        use (&$called, $mockCommand, $expectedReason, $expectedPartNo) {
            $called = true;
            $this->assertEquals($expectedReason, $reason);
            $this->assertEquals($expectedPartNo, $partNo);
            $this->assertEquals($mockCommand, $command);
        };

        $listener = new MultipartDownloadListener(onPartDownloadFailed: $callable);
        $listener->partDownloadFailed($mockCommand, $expectedReason, $expectedPartNo);
        $this->assertTrue($called, "Expected onPartDownloadFailed to be called.");
    }
}