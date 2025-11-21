<?php

namespace Aws\Test\S3\S3Transfer\Utils;

use Aws\S3\S3Transfer\Exception\FileDownloadException;
use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Aws\S3\S3Transfer\Utils\FileDownloadHandler;
use Aws\Test\TestsUtility;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;

class FileDownloadHandlerTest extends TestCase
{
    private string $tempDir;

    protected function setUp(): void
    {
        $this->tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'file-download-handler-test/';
        if (!is_dir($this->tempDir)) {
            mkdir($this->tempDir, 0777, true);
        }
    }

    protected function tearDown(): void
    {
        TestsUtility::cleanUpDir($this->tempDir);
    }

    public function testFailsWhenDestinationExistsAndFailOnDestinationExistsIsTrue(): void
    {
        $destination = $this->tempDir . 'existing-file.txt';
        file_put_contents($destination, 'existing content');

        $handler = new FileDownloadHandler($destination, true);

        $this->expectException(FileDownloadException::class);
        $this->expectExceptionMessage("The destination '{$destination}' already exists.");
        $handler->transferInitiated([]);
    }

    public function testFailsWhenDestinationIsDirectory(): void
    {
        $destination = $this->tempDir . 'directory/';
        mkdir($destination, 0777, true);

        $handler = new FileDownloadHandler($destination, false);

        $this->expectException(FileDownloadException::class);
        $this->expectExceptionMessage("The destination '{$destination}' can't be a directory.");
        $handler->transferInitiated([]);
    }

    public function testCreatesDestinationDirectoryWhenItDoesNotExist(): void
    {
        $destination = $this->tempDir . 'new-dir/subdir/file.txt';
        $handler = new FileDownloadHandler($destination, false);

        $handler->transferInitiated([]);

        $this->assertDirectoryExists(dirname($destination));
    }

    public function testReplacesDestinationWhenItExistsAndFailOnDestinationExistsIsFalse(): void
    {
        $destination = $this->tempDir . 'file.txt';
        file_put_contents($destination, 'old content');

        $handler = new FileDownloadHandler($destination, false);
        $handler->transferInitiated([]);

        $response = [
            'ContentLength' => 11,
            'ContentRange' => 'bytes 0-10/11',
            'Body' => Utils::streamFor('new content')
        ];
        $snapshot = new TransferProgressSnapshot('test-key', 11, 11, $response);

        $handler->bytesTransferred([AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot]);
        $handler->transferComplete([]);

        $this->assertEquals('new content', file_get_contents($destination));
    }

    public function testDoesNotDeleteTemporaryFileWhenResumeIsEnabled(): void
    {
        $destination = $this->tempDir . 'file.txt';
        $handler = new FileDownloadHandler(
            $destination,
            false,
            true
        );
        $handler->transferInitiated([]);

        $response = [
            'ContentLength' => 10,
            'ContentRange' => 'bytes 0-9/10',
            'Body' => Utils::streamFor('test data!')
        ];
        $snapshot = new TransferProgressSnapshot(
            'test-key',
            10,
            10,
            $response
        );

        $handler->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot
        ]);
        
        $tempFile = $handler->getTemporaryFilePath();
        $handler->transferFail([AbstractTransferListener::REASON_KEY => 'Test failure']);

        $this->assertFileExists($tempFile);
    }

    public function testOpensExistentFilesWhenTemporaryFileIsGiven(): void
    {
        $destination = $this->tempDir . 'file.txt';
        $tempFile = $this->tempDir . 'temp.s3tmp.12345678';
        // First 50 bytes with custom value
        file_put_contents(
            $tempFile,
            str_repeat("-", 50),
        );
        // Last 50 bytes to be filled by handler
        file_put_contents(
            $tempFile,
            str_repeat("\0", 50),
            FILE_APPEND
        );

        $handler = new FileDownloadHandler(
            $destination,
            false,
            true,
            $tempFile,
            50
        );
        $handler->transferInitiated([]);

        $response = [
            'ContentLength' => 50,
            'ContentRange' => 'bytes 50-99/100',
            'Body' => Utils::streamFor(str_repeat('x', 50))
        ];
        $snapshot = new TransferProgressSnapshot(
            'test-key',
            100,
            100,
            $response
        );

        $result = $handler->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot
        ]);
        $this->assertTrue($result);
        $this->assertFileExists($tempFile);
        $expectedContent = str_repeat('-', 50)
            . str_repeat('x', 50);
        $this->assertEquals(
            $expectedContent,
            file_get_contents($tempFile)
        );
    }

    /**
     * @dataProvider validatePartChecksumWhenWritingToDiskProvider
     *
     * @param string $checksumAlgorithm
     * @return void
     */
    public function testValidatesPartChecksumWhenWritingToDisk(
        string $checksumAlgorithm,
    ): void
    {
        $destination = $this->tempDir . 'file.txt';
        $handler = new FileDownloadHandler($destination, false);
        $handler->transferInitiated([]);

        $content = 'test content';
        $checksum = base64_encode(hash($checksumAlgorithm, $content, true));

        $response = [
            'ContentLength' => strlen($content),
            'ContentRange' => 'bytes 0-' . (strlen($content) - 1) . '/' . strlen($content),
            'Body' => Utils::streamFor($content),
            "Checksum".strtoupper($checksumAlgorithm) => $checksum
        ];
        $snapshot = new TransferProgressSnapshot(
            'test-key',
            strlen($content),
            strlen($content),
            $response
        );

        $result = $handler->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot
        ]);
        $this->assertTrue($result);
    }

    /**
     * @return array
     */
    public function validatePartChecksumWhenWritingToDiskProvider(): array
    {
        return [
            'crc32' => [
                'checksum_algorithm' => 'crc32b',
            ],
            'sha256' => [
                'checksum_algorithm' => 'sha256',
            ]
        ];
    }

    public function testFailsOnChecksumMismatch(): void
    {
        $destination = $this->tempDir . 'file.txt';
        $handler = new FileDownloadHandler($destination, false);
        $handler->transferInitiated([]);

        $content = 'test content';
        $invalidChecksum = base64_encode('invalid');

        $response = [
            'ContentLength' => strlen($content),
            'ContentRange' => 'bytes 0-' . (strlen($content) - 1) . '/' . strlen($content),
            'Body' => Utils::streamFor($content),
            'ChecksumSHA256' => $invalidChecksum
        ];
        $snapshot = new TransferProgressSnapshot('test-key', strlen($content), strlen($content), $response);

        $this->expectException(FileDownloadException::class);
        $this->expectExceptionMessage('Checksum mismatch when writing part to destination file.');
        $handler->bytesTransferred([AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot]);
    }

    public function testCleansUpResourcesAfterFailure(): void
    {
        $destination = $this->tempDir . 'file.txt';
        $handler = new FileDownloadHandler($destination, false, false);
        $handler->transferInitiated([]);

        $response = [
            'ContentLength' => 10,
            'ContentRange' => 'bytes 0-9/10',
            'Body' => Utils::streamFor('test data!')
        ];
        $snapshot = new TransferProgressSnapshot('test-key', 10, 10, $response);

        $handler->bytesTransferred([AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot]);
        
        $tempFile = $handler->getTemporaryFilePath();
        $this->assertFileExists($tempFile);

        $handler->transferFail([AbstractTransferListener::REASON_KEY => 'Test failure']);

        $this->assertFileDoesNotExist($tempFile);
    }
}
