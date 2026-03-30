<?php

namespace Aws\Test\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\AbstractResumableTransfer;
use Aws\S3\S3Transfer\Models\ResumableUpload;
use Aws\Test\TestsUtility;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ResumableUpload::class)]
#[CoversClass(AbstractResumableTransfer::class)]
final class ResumableUploadTest extends TestCase
{
    private string $tempDir;

    protected function setUp(): void
    {
        $this->tempDir = sys_get_temp_dir()
            . DIRECTORY_SEPARATOR
            . 'resumable-upload-test'
            . DIRECTORY_SEPARATOR;
        if (!is_dir($this->tempDir)) {
            mkdir($this->tempDir, 0777, true);
        }
    }

    protected function tearDown(): void
    {
        TestsUtility::cleanUpDir($this->tempDir);
    }

    private function createResumableUpload(array $overrides = []): ResumableUpload
    {
        return new ResumableUpload(
            $overrides['resumeFilePath'] ?? $this->tempDir . 'upload.resume',
            $overrides['requestArgs'] ?? ['Bucket' => 'my-bucket', 'Key' => 'my-key'],
            $overrides['config'] ?? ['target_part_size_bytes' => 5242880],
            $overrides['currentSnapshot'] ?? ['transferred_bytes' => 0, 'total_bytes' => 2000],
            $overrides['uploadId'] ?? 'upload-id-abc',
            $overrides['partsCompleted'] ?? [],
            $overrides['source'] ?? '/tmp/source-file.dat',
            $overrides['objectSize'] ?? 2000,
            $overrides['partSize'] ?? 5242880,
            $overrides['isFullObjectChecksum'] ?? false
        );
    }

    public function testConstructorAppendsResumeExtension(): void
    {
        $upload = $this->createResumableUpload([
            'resumeFilePath' => $this->tempDir . 'no-extension',
        ]);
        $this->assertStringEndsWith('.resume', $upload->getResumeFilePath());
    }

    public function testConstructorPreservesResumeExtension(): void
    {
        $path = $this->tempDir . 'already.resume';
        $upload = $this->createResumableUpload([
            'resumeFilePath' => $path,
        ]);
        $this->assertEquals($path, $upload->getResumeFilePath());
    }

    public function testGetters(): void
    {
        $upload = $this->createResumableUpload([
            'uploadId' => 'uid-123',
            'partsCompleted' => [1 => ['PartNumber' => 1, 'ETag' => 'e1']],
            'source' => '/data/file.bin',
            'objectSize' => 9999,
            'partSize' => 1024,
            'isFullObjectChecksum' => true,
        ]);

        $this->assertEquals('uid-123', $upload->getUploadId());
        $this->assertEquals(
            [1 => ['PartNumber' => 1, 'ETag' => 'e1']],
            $upload->getPartsCompleted()
        );
        $this->assertEquals('/data/file.bin', $upload->getSource());
        $this->assertEquals(9999, $upload->getObjectSize());
        $this->assertEquals(1024, $upload->getPartSize());
        $this->assertTrue($upload->isFullObjectChecksum());
    }

    public function testGetBucketAndKey(): void
    {
        $upload = $this->createResumableUpload([
            'requestArgs' => ['Bucket' => 'b', 'Key' => 'k'],
        ]);
        $this->assertEquals('b', $upload->getBucket());
        $this->assertEquals('k', $upload->getKey());
    }

    public function testGetConfigAndRequestArgs(): void
    {
        $config = ['target_part_size_bytes' => 1024];
        $args = ['Bucket' => 'b', 'Key' => 'k'];
        $upload = $this->createResumableUpload([
            'config' => $config,
            'requestArgs' => $args,
        ]);
        $this->assertEquals($config, $upload->getConfig());
        $this->assertEquals($args, $upload->getRequestArgs());
    }

    public function testUpdateCurrentSnapshot(): void
    {
        $upload = $this->createResumableUpload();
        $newSnapshot = ['transferred_bytes' => 500, 'total_bytes' => 2000];
        $upload->updateCurrentSnapshot($newSnapshot);
        $this->assertEquals($newSnapshot, $upload->getCurrentSnapshot());
    }

    public function testMarkPartCompleted(): void
    {
        $upload = $this->createResumableUpload();
        $this->assertEmpty($upload->getPartsCompleted());

        $upload->markPartCompleted(1, ['PartNumber' => 1, 'ETag' => 'etag1']);
        $upload->markPartCompleted(2, ['PartNumber' => 2, 'ETag' => 'etag2']);

        $parts = $upload->getPartsCompleted();
        $this->assertCount(2, $parts);
        $this->assertEquals(['PartNumber' => 1, 'ETag' => 'etag1'], $parts[1]);
        $this->assertEquals(['PartNumber' => 2, 'ETag' => 'etag2'], $parts[2]);
    }

    public function testToJsonContainsAllFields(): void
    {
        $upload = $this->createResumableUpload([
            'uploadId' => 'uid-json',
            'isFullObjectChecksum' => true,
        ]);

        $json = $upload->toJson();
        $data = json_decode($json, true);

        $this->assertEquals('1.0', $data['version']);
        $this->assertArrayHasKey('resumeFilePath', $data);
        $this->assertArrayHasKey('requestArgs', $data);
        $this->assertArrayHasKey('config', $data);
        $this->assertArrayHasKey('currentSnapshot', $data);
        $this->assertEquals('uid-json', $data['uploadId']);
        $this->assertArrayHasKey('partsCompleted', $data);
        $this->assertArrayHasKey('source', $data);
        $this->assertArrayHasKey('objectSize', $data);
        $this->assertArrayHasKey('partSize', $data);
        $this->assertTrue($data['isFullObjectChecksum']);
    }

    public function testFromJsonRoundTrip(): void
    {
        $upload = $this->createResumableUpload([
            'uploadId' => 'round-trip',
            'partsCompleted' => [1 => ['PartNumber' => 1, 'ETag' => 'e1']],
            'source' => '/src/file.bin',
            'objectSize' => 4096,
            'partSize' => 1024,
            'isFullObjectChecksum' => true,
        ]);

        $json = $upload->toJson();
        $restored = ResumableUpload::fromJson($json);

        $this->assertEquals($upload->getUploadId(), $restored->getUploadId());
        $this->assertEquals($upload->getPartsCompleted(), $restored->getPartsCompleted());
        $this->assertEquals($upload->getSource(), $restored->getSource());
        $this->assertEquals($upload->getObjectSize(), $restored->getObjectSize());
        $this->assertEquals($upload->getPartSize(), $restored->getPartSize());
        $this->assertEquals($upload->isFullObjectChecksum(), $restored->isFullObjectChecksum());
        $this->assertEquals($upload->getRequestArgs(), $restored->getRequestArgs());
        $this->assertEquals($upload->getConfig(), $restored->getConfig());
        $this->assertEquals($upload->getCurrentSnapshot(), $restored->getCurrentSnapshot());
    }

    public function testFromJsonThrowsOnInvalidJson(): void
    {
        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('Failed to parse resume file');
        ResumableUpload::fromJson('not-json{{{');
    }

    public function testFromJsonThrowsOnMissingRequiredField(): void
    {
        $json = json_encode([
            'version' => '1.0',
            'resumeFilePath' => '/tmp/f.resume',
        ]);

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage("missing required field");
        ResumableUpload::fromJson($json);
    }

    public function testToFileAndFromFileRoundTrip(): void
    {
        $path = $this->tempDir . 'persist.resume';
        $upload = $this->createResumableUpload([
            'resumeFilePath' => $path,
            'uploadId' => 'persist-trip',
        ]);

        $upload->toFile();
        $this->assertFileExists($path);

        $restored = ResumableUpload::fromFile($path);
        $this->assertEquals('persist-trip', $restored->getUploadId());
        $this->assertEquals($upload->getConfig(), $restored->getConfig());
    }

    public function testToFileCreatesDirectory(): void
    {
        $nestedDir = $this->tempDir . 'nested' . DIRECTORY_SEPARATOR . 'dir' . DIRECTORY_SEPARATOR;
        $path = $nestedDir . 'upload.resume';
        $upload = $this->createResumableUpload([
            'resumeFilePath' => $path,
        ]);

        $upload->toFile();
        $this->assertFileExists($path);
    }

    public function testToFileWithExplicitPath(): void
    {
        $upload = $this->createResumableUpload();
        $explicitPath = $this->tempDir . 'explicit.resume';
        $upload->toFile($explicitPath);
        $this->assertFileExists($explicitPath);
    }

    public function testFromFileThrowsOnNonExistentFile(): void
    {
        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('Resume file does not exist');
        ResumableUpload::fromFile('/non/existent/path.resume');
    }

    public function testFromFileDetectsTamperedSignature(): void
    {
        $path = $this->tempDir . 'tampered.resume';
        $upload = $this->createResumableUpload([
            'resumeFilePath' => $path,
        ]);
        $upload->toFile();

        $content = json_decode(file_get_contents($path), true);
        $content['data']['uploadId'] = 'tampered-id';
        file_put_contents($path, json_encode($content));

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('signature mismatch');
        ResumableUpload::fromFile($path);
    }

    public function testFromFileLegacyFormatWithoutSignature(): void
    {
        $path = $this->tempDir . 'legacy.resume';
        $upload = $this->createResumableUpload([
            'resumeFilePath' => $path,
        ]);

        // Write raw JSON without signature wrapper
        file_put_contents($path, $upload->toJson());

        $restored = ResumableUpload::fromFile($path);
        $this->assertEquals($upload->getUploadId(), $restored->getUploadId());
    }

    public function testDeleteResumeFile(): void
    {
        $path = $this->tempDir . 'to-delete.resume';
        $upload = $this->createResumableUpload([
            'resumeFilePath' => $path,
        ]);
        $upload->toFile();
        $this->assertFileExists($path);

        $upload->deleteResumeFile();
        $this->assertFileDoesNotExist($path);
    }

    public function testDeleteResumeFileWithExplicitPath(): void
    {
        $path = $this->tempDir . 'explicit-delete.resume';
        $upload = $this->createResumableUpload();
        $upload->toFile($path);
        $this->assertFileExists($path);

        $upload->deleteResumeFile($path);
        $this->assertFileDoesNotExist($path);
    }

    public function testDeleteResumeFileDoesNothingIfNotExists(): void
    {
        $upload = $this->createResumableUpload([
            'resumeFilePath' => '/non/existent.resume',
        ]);
        // Should not throw
        $upload->deleteResumeFile();
        $this->assertTrue(true);
    }

    public function testIsResumeFileReturnsTrueForValidFile(): void
    {
        $path = $this->tempDir . 'valid.resume';
        $upload = $this->createResumableUpload([
            'resumeFilePath' => $path,
        ]);
        $upload->toFile();

        $this->assertTrue(ResumableUpload::isResumeFile($path));
    }

    public function testIsResumeFileReturnsFalseForWrongExtension(): void
    {
        $this->assertFalse(ResumableUpload::isResumeFile('/tmp/file.json'));
    }

    public function testIsResumeFileReturnsFalseForNonExistentFile(): void
    {
        $this->assertFalse(ResumableUpload::isResumeFile('/non/existent.resume'));
    }

    public function testIsResumeFileReturnsFalseForInvalidContent(): void
    {
        $path = $this->tempDir . 'invalid-content.resume';
        file_put_contents($path, 'not-json');
        $this->assertFalse(ResumableUpload::isResumeFile($path));
    }

    public function testIsResumeFileReturnsFalseForJsonWithoutSignature(): void
    {
        $path = $this->tempDir . 'no-sig.resume';
        file_put_contents($path, json_encode(['foo' => 'bar']));
        $this->assertFalse(ResumableUpload::isResumeFile($path));
    }
}
