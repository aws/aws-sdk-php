<?php

namespace Aws\Test\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\AbstractResumableTransfer;
use Aws\S3\S3Transfer\Models\ResumableDownload;
use Aws\Test\TestsUtility;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ResumableDownload::class)]
#[CoversClass(AbstractResumableTransfer::class)]
final class ResumableDownloadTest extends TestCase
{
    private string $tempDir;

    protected function setUp(): void
    {
        $this->tempDir = sys_get_temp_dir()
            . DIRECTORY_SEPARATOR
            . 'resumable-download-test'
            . DIRECTORY_SEPARATOR;
        if (!is_dir($this->tempDir)) {
            mkdir($this->tempDir, 0777, true);
        }
    }

    protected function tearDown(): void
    {
        TestsUtility::cleanUpDir($this->tempDir);
    }

    public function testConstructorAppendsResumeExtension(): void
    {
        $download = $this->createResumableDownload([
            'resumeFilePath' => $this->tempDir . 'no-ext',
        ]);
        $this->assertStringEndsWith('.resume', $download->getResumeFilePath());
    }

    public function testConstructorPreservesResumeExtension(): void
    {
        $path = $this->tempDir . 'existing.resume';
        $download = $this->createResumableDownload([
            'resumeFilePath' => $path,
        ]);
        $this->assertEquals($path, $download->getResumeFilePath());
    }

    public function testGetters(): void
    {
        $download = $this->createResumableDownload([
            'initialRequestResult' => ['ContentLength' => 9999],
            'partsCompleted' => [1 => true, 2 => true],
            'totalNumberOfParts' => 5,
            'temporaryFile' => '/tmp/dl.tmp',
            'eTag' => '"etag-val"',
            'objectSizeInBytes' => 9999,
            'fixedPartSize' => 2048,
            'destination' => '/final/path.bin',
        ]);

        $this->assertEquals(['ContentLength' => 9999], $download->getInitialRequestResult());
        $this->assertEquals([1 => true, 2 => true], $download->getPartsCompleted());
        $this->assertEquals(5, $download->getTotalNumberOfParts());
        $this->assertEquals('/tmp/dl.tmp', $download->getTemporaryFile());
        $this->assertEquals('"etag-val"', $download->getETag());
        $this->assertEquals(9999, $download->getObjectSizeInBytes());
        $this->assertEquals(2048, $download->getFixedPartSize());
        $this->assertEquals('/final/path.bin', $download->getDestination());
    }

    public function testGetBucketAndKey(): void
    {
        $download = $this->createResumableDownload([
            'requestArgs' => ['Bucket' => 'b', 'Key' => 'k'],
        ]);
        $this->assertEquals('b', $download->getBucket());
        $this->assertEquals('k', $download->getKey());
    }

    public function testGetConfigAndRequestArgs(): void
    {
        $config = ['target_part_size_bytes' => 2048];
        $args = ['Bucket' => 'b', 'Key' => 'k'];
        $download = $this->createResumableDownload([
            'config' => $config,
            'requestArgs' => $args,
        ]);
        $this->assertEquals($config, $download->getConfig());
        $this->assertEquals($args, $download->getRequestArgs());
    }

    public function testTemporaryFileCanBeNull(): void
    {
        $download = new ResumableDownload(
            $this->tempDir . 'download.resume',
            ['Bucket' => 'my-bucket', 'Key' => 'my-key'],
            ['target_part_size_bytes' => 8388608],
            ['transferred_bytes' => 0, 'total_bytes' => 5000],
            ['ContentLength' => 5000],
            [],
            3,
            null,
            '"abc123"',
            5000,
            8388608,
            '/tmp/destination.dat'
        );
        $this->assertNull($download->getTemporaryFile());
    }

    public function testUpdateCurrentSnapshot(): void
    {
        $download = $this->createResumableDownload();
        $newSnapshot = ['transferred_bytes' => 2500, 'total_bytes' => 5000];
        $download->updateCurrentSnapshot($newSnapshot);
        $this->assertEquals($newSnapshot, $download->getCurrentSnapshot());
    }

    public function testMarkPartCompleted(): void
    {
        $download = $this->createResumableDownload();
        $this->assertEmpty($download->getPartsCompleted());

        $download->markPartCompleted(1);
        $download->markPartCompleted(3);

        $parts = $download->getPartsCompleted();
        $this->assertCount(2, $parts);
        $this->assertTrue($parts[1]);
        $this->assertTrue($parts[3]);
    }

    public function testToJsonContainsAllFields(): void
    {
        $download = $this->createResumableDownload();
        $json = $download->toJson();
        $data = json_decode($json, true);

        $this->assertEquals('1.0', $data['version']);
        $this->assertArrayHasKey('resumeFilePath', $data);
        $this->assertArrayHasKey('requestArgs', $data);
        $this->assertArrayHasKey('config', $data);
        $this->assertArrayHasKey('currentSnapshot', $data);
        $this->assertArrayHasKey('initialRequestResult', $data);
        $this->assertArrayHasKey('partsCompleted', $data);
        $this->assertArrayHasKey('totalNumberOfParts', $data);
        $this->assertArrayHasKey('temporaryFile', $data);
        $this->assertArrayHasKey('eTag', $data);
        $this->assertArrayHasKey('objectSizeInBytes', $data);
        $this->assertArrayHasKey('fixedPartSize', $data);
        $this->assertArrayHasKey('destination', $data);
    }

    public function testFromJsonRoundTrip(): void
    {
        $download = $this->createResumableDownload([
            'partsCompleted' => [1 => true, 2 => true],
            'totalNumberOfParts' => 4,
            'eTag' => '"round-trip-etag"',
            'objectSizeInBytes' => 8192,
            'fixedPartSize' => 2048,
            'destination' => '/dest/file.bin',
        ]);

        $json = $download->toJson();
        $restored = ResumableDownload::fromJson($json);

        $this->assertEquals($download->getPartsCompleted(), $restored->getPartsCompleted());
        $this->assertEquals($download->getTotalNumberOfParts(), $restored->getTotalNumberOfParts());
        $this->assertEquals($download->getETag(), $restored->getETag());
        $this->assertEquals($download->getObjectSizeInBytes(), $restored->getObjectSizeInBytes());
        $this->assertEquals($download->getFixedPartSize(), $restored->getFixedPartSize());
        $this->assertEquals($download->getDestination(), $restored->getDestination());
        $this->assertEquals($download->getTemporaryFile(), $restored->getTemporaryFile());
        $this->assertEquals($download->getInitialRequestResult(), $restored->getInitialRequestResult());
        $this->assertEquals($download->getRequestArgs(), $restored->getRequestArgs());
        $this->assertEquals($download->getConfig(), $restored->getConfig());
    }

    public function testFromJsonThrowsOnInvalidJson(): void
    {
        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('Failed to parse resume file');
        ResumableDownload::fromJson('{{invalid');
    }

    public function testFromJsonThrowsOnInvalidVersion(): void
    {
        $json = json_encode([
            'version' => '0.0',
            'resumeFilePath' => '/tmp/f.resume',
            'requestArgs' => [],
            'config' => [],
            'currentSnapshot' => [],
            'initialRequestResult' => [],
            'partsCompleted' => [],
            'totalNumberOfParts' => 0,
            'temporaryFile' => null,
            'eTag' => '',
            'objectSizeInBytes' => 0,
            'fixedPartSize' => 0,
            'destination' => '',
        ]);

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('unsupported resume file version');
        ResumableDownload::fromJson($json);
    }

    public function testFromJsonThrowsOnMissingRequiredField(): void
    {
        $json = json_encode([
            'version' => '1.0',
            'resumeFilePath' => '/tmp/f.resume',
            'requestArgs' => [],
        ]);

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage("missing required field");
        ResumableDownload::fromJson($json);
    }

    public function testFromJsonThrowsOnNonArrayData(): void
    {
        $this->expectException(S3TransferException::class);
        ResumableDownload::fromJson('"just a string"');
    }

    public function testToFileAndFromFileRoundTrip(): void
    {
        $path = $this->tempDir . 'persist.resume';
        $download = $this->createResumableDownload([
            'resumeFilePath' => $path,
            'eTag' => '"persist-etag"',
        ]);

        $download->toFile();
        $this->assertFileExists($path);

        $restored = ResumableDownload::fromFile($path);
        $this->assertEquals('"persist-etag"', $restored->getETag());
        $this->assertEquals($download->getDestination(), $restored->getDestination());
    }

    public function testToFileCreatesDirectory(): void
    {
        $nestedDir = $this->tempDir . 'nested' . DIRECTORY_SEPARATOR . 'dir' . DIRECTORY_SEPARATOR;
        $path = $nestedDir . 'download.resume';
        $download = $this->createResumableDownload([
            'resumeFilePath' => $path,
        ]);

        $download->toFile();
        $this->assertFileExists($path);
    }

    public function testFromFileThrowsOnNonExistentFile(): void
    {
        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('Resume file does not exist');
        ResumableDownload::fromFile('/non/existent/path.resume');
    }

    public function testFromFileDetectsTamperedSignature(): void
    {
        $path = $this->tempDir . 'tampered.resume';
        $download = $this->createResumableDownload([
            'resumeFilePath' => $path,
        ]);
        $download->toFile();

        $content = json_decode(file_get_contents($path), true);
        $content['data']['eTag'] = '"tampered"';
        file_put_contents($path, json_encode($content));

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('signature mismatch');
        ResumableDownload::fromFile($path);
    }

    public function testFromFileLegacyFormatWithoutSignature(): void
    {
        $path = $this->tempDir . 'legacy.resume';
        $download = $this->createResumableDownload([
            'resumeFilePath' => $path,
        ]);

        file_put_contents($path, $download->toJson());

        $restored = ResumableDownload::fromFile($path);
        $this->assertEquals($download->getETag(), $restored->getETag());
    }

    public function testDeleteResumeFile(): void
    {
        $path = $this->tempDir . 'to-delete.resume';
        $download = $this->createResumableDownload([
            'resumeFilePath' => $path,
        ]);
        $download->toFile();
        $this->assertFileExists($path);

        $download->deleteResumeFile();
        $this->assertFileDoesNotExist($path);
    }

    public function testDeleteResumeFileDoesNothingIfNotExists(): void
    {
        $download = $this->createResumableDownload([
            'resumeFilePath' => '/non/existent.resume',
        ]);
        $download->deleteResumeFile();
        $this->assertTrue(true);
    }

    public function testIsResumeFileReturnsTrueForValidFile(): void
    {
        $path = $this->tempDir . 'valid.resume';
        $download = $this->createResumableDownload([
            'resumeFilePath' => $path,
        ]);
        $download->toFile();

        $this->assertTrue(ResumableDownload::isResumeFile($path));
    }

    public function testIsResumeFileReturnsFalseForWrongExtension(): void
    {
        $this->assertFalse(ResumableDownload::isResumeFile('/tmp/file.json'));
    }

    public function testIsResumeFileReturnsFalseForNonExistentFile(): void
    {
        $this->assertFalse(ResumableDownload::isResumeFile('/non/existent.resume'));
    }

    private function createResumableDownload(array $overrides = []): ResumableDownload
    {
        return new ResumableDownload(
            $overrides['resumeFilePath'] ?? $this->tempDir . 'download.resume',
            $overrides['requestArgs'] ?? ['Bucket' => 'my-bucket', 'Key' => 'my-key'],
            $overrides['config'] ?? ['target_part_size_bytes' => 8388608],
            $overrides['currentSnapshot'] ?? ['transferred_bytes' => 0, 'total_bytes' => 5000],
            $overrides['initialRequestResult'] ?? ['ContentLength' => 5000, 'ETag' => '"abc123"'],
            $overrides['partsCompleted'] ?? [],
            $overrides['totalNumberOfParts'] ?? 3,
            $overrides['temporaryFile'] ?? '/tmp/download.tmp',
            $overrides['eTag'] ?? '"abc123"',
            $overrides['objectSizeInBytes'] ?? 5000,
            $overrides['fixedPartSize'] ?? 8388608,
            $overrides['destination'] ?? '/tmp/destination.dat'
        );
    }
}
