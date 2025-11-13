<?php

namespace Aws\Test\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\ResumableUpload;
use Aws\Test\TestsUtility;
use PHPUnit\Framework\TestCase;

class ResumableTransferTest extends TestCase
{
    private string $tempDir;

    protected function setUp(): void
    {
        $this->tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'resumable-transfer-test/';
        if (!is_dir($this->tempDir)) {
            mkdir($this->tempDir, 0777, true);
        }
    }

    protected function tearDown(): void
    {
        TestsUtility::cleanUpDir($this->tempDir);
    }

    public function testGeneratesChecksumCorrectlyWhenPersisting(): void
    {
        $resumeFilePath = $this->tempDir . 'test.resume';
        $resumable = new ResumableUpload(
            $resumeFilePath,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => 5242880],
            ['transferred_bytes' => 0, 'total_bytes' => 1000],
            'upload-id-123',
            [],
            '/path/to/source',
            1000,
            5242880,
            false
        );

        $resumable->toFile();

        $this->assertFileExists($resumeFilePath);
        $content = json_decode(
            file_get_contents($resumeFilePath),
            true
        );
        $this->assertArrayHasKey('signature', $content);
        $this->assertArrayHasKey('data', $content);

        $expectedSignature = hash(
            'sha256',
            json_encode(
                $content['data'],
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
            )
        );
        $this->assertEquals($expectedSignature, $content['signature']);
    }

    public function testValidatesChecksumWhenRetrieving(): void
    {
        $resumeFilePath = $this->tempDir . 'test.resume';
        $resumable = new ResumableUpload(
            $resumeFilePath,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => 5242880],
            ['transferred_bytes' => 0, 'total_bytes' => 1000],
            'upload-id-123',
            [],
            '/path/to/source',
            1000,
            5242880,
            false
        );

        $resumable->toFile();

        $content = json_decode(
            file_get_contents($resumeFilePath),
            true
        );
        $content['signature'] = 'invalid-signature';
        file_put_contents($resumeFilePath, json_encode($content));

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('Resume file integrity check failed: signature mismatch');
        ResumableUpload::fromFile($resumeFilePath);
    }

    public function testGeneratesCorrectChecksumForResumeData(): void
    {
        $resumeFilePath = $this->tempDir . 'test.resume';
        $resumable = new ResumableUpload(
            $resumeFilePath,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => 5242880],
            ['transferred_bytes' => 500, 'total_bytes' => 1000],
            'upload-id-456',
            [['PartNumber' => 1, 'ETag' => 'etag1']],
            '/path/to/source',
            1000,
            5242880,
            true
        );

        $resumable->toFile();

        $loaded = ResumableUpload::fromFile($resumeFilePath);
        $this->assertEquals('upload-id-456', $loaded->getUploadId());
        $this->assertEquals([
            [
                'PartNumber' => 1,
                'ETag' => 'etag1'
            ]
        ], $loaded->getPartsCompleted());
    }
}
