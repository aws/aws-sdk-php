<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Api\Service;
use Aws\Command;
use Aws\CommandInterface;
use Aws\HandlerList;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadDirectoryResponse;
use Aws\S3\S3Transfer\Models\UploadDirectoryResponse;
use Aws\S3\S3Transfer\MultipartDownloader;
use Aws\S3\S3Transfer\MultipartUploader;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Aws\S3\S3Transfer\S3TransferManager;
use Aws\Test\TestsUtility;
use Closure;
use Exception;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Utils;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class S3TransferManagerTest extends TestCase
{
    /**
     * @return void
     */
    public function testDefaultConfigIsSet(): void
    {
        $manager = new S3TransferManager();
        $this->assertArrayHasKey(
            'target_part_size_bytes',
            $manager->getConfig()
        );
        $this->assertArrayHasKey(
            'multipart_upload_threshold_bytes',
            $manager->getConfig()
        );
        $this->assertArrayHasKey(
            'checksum_validation_enabled',
            $manager->getConfig()
        );
        $this->assertArrayHasKey(
            'checksum_algorithm',
            $manager->getConfig()
        );
        $this->assertArrayHasKey(
            'multipart_download_type',
            $manager->getConfig()
        );
        $this->assertArrayHasKey(
            'concurrency',
            $manager->getConfig()
        );
        $this->assertArrayHasKey(
            'track_progress',
            $manager->getConfig()
        );
        $this->assertArrayHasKey(
            'region',
            $manager->getConfig()
        );
        $this->assertInstanceOf(
            S3Client::class,
            $manager->getS3Client()
        );
    }

    /**
     * @return void
     */
    public function testCustomConfigIsSet(): void
    {
        $manager = new S3TransferManager(
            null,
            [
                'target_part_size_bytes' => 1024,
                'multipart_upload_threshold_bytes' => 1024,
                'checksum_validation_enabled' => false,
                'checksum_algorithm' => 'sha256',
                'multipart_download_type' => 'partGet',
                'concurrency' => 20,
                'track_progress' => true,
                'region' => 'us-west-1',
            ]
        );
        $config = $manager->getConfig();
        $this->assertEquals(1024, $config['target_part_size_bytes']);
        $this->assertEquals(1024, $config['multipart_upload_threshold_bytes']);
        $this->assertFalse($config['checksum_validation_enabled']);
        $this->assertEquals('sha256', $config['checksum_algorithm']);
        $this->assertEquals('partGet', $config['multipart_download_type']);
        $this->assertEquals(20, $config['concurrency']);
        $this->assertTrue($config['track_progress']);
        $this->assertEquals('us-west-1', $config['region']);
    }

    /**
     * @return void
     */
    public function testUploadExpectsAReadableSource(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Please provide a valid readable file path or a valid stream as source.");
        $manager = new S3TransferManager();
        $manager->upload(
            "noreadablefile",
        )->wait();
    }

    /**
     * @dataProvider uploadBucketAndKeyProvider
     *
     * @return void
     */
    public function testUploadFailsWhenBucketAndKeyAreNotProvided(
        array  $bucketKeyArgs,
        string $missingProperty
    ): void
    {
        $manager = new S3TransferManager();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The `$missingProperty` parameter must be provided as part of the request arguments.");
        $manager->upload(
            Utils::streamFor(),
            $bucketKeyArgs
        )->wait();
    }

    /**
     * @return array[]
     */
    public function uploadBucketAndKeyProvider(): array
    {
        return [
            'bucket_missing' => [
                'bucket_key_args' => [
                    'Key' => 'Key',
                ],
                'missing_property' => 'Bucket',
            ],
            'key_missing' => [
                'bucket_key_args' => [
                    'Bucket' => 'Bucket',
                ],
                'missing_property' => 'Key',
            ],
        ];
    }

    /**
     * @return void
     */
    public function testUploadFailsWhenMultipartThresholdIsLessThanMinSize(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The provided config `multipart_upload_threshold_bytes`"
            . "must be greater than or equal to " . MultipartUploader::PART_MIN_SIZE);
        $manager = new S3TransferManager();
        $manager->upload(
            Utils::streamFor(),
            [
                'Bucket' => 'Bucket',
                'Key' => 'Key',
            ],
            [
                'multipart_upload_threshold_bytes' => MultipartUploader::PART_MIN_SIZE - 1
            ]
        )->wait();
    }

    /**
     * This tests takes advantage of the transfer listeners to validate
     * if a multipart upload was done. How?, it will check if bytesTransfer
     * event happens more than once, which only will occur in a multipart upload.
     *
     * @return void
     */
    public function testDoesMultipartUploadWhenApplicable(): void
    {
        $client = $this->getS3ClientMock();
        $manager = new S3TransferManager(
            $client,
        );
        $transferListener = $this->createMock(TransferListener::class);
        $expectedPartCount = 2;
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');
        $manager->upload(
            Utils::streamFor(
                str_repeat("#", MultipartUploader::PART_MIN_SIZE * $expectedPartCount)
            ),
            [
                'Bucket' => 'Bucket',
                'Key' => 'Key',
            ],
            [
                'part_size' => MultipartUploader::PART_MIN_SIZE,
                'multipart_upload_threshold_bytes' => MultipartUploader::PART_MIN_SIZE,
            ],
            [
                $transferListener,
            ]
        )->wait();
    }

    /**
     * @return void
     */
    public function testDoesSingleUploadWhenApplicable(): void
    {
        $client = $this->getS3ClientMock();
        $manager = new S3TransferManager(
            $client,
        );
        $transferListener = $this->createMock(TransferListener::class);
        $transferListener->expects($this->once())
            ->method('bytesTransferred');
        $manager->upload(
            Utils::streamFor(
                str_repeat("#", MultipartUploader::PART_MIN_SIZE - 1)
            ),
            [
                'Bucket' => 'Bucket',
                'Key' => 'Key',
            ],
            [
                'multipart_upload_threshold_bytes' => MultipartUploader::PART_MIN_SIZE,
            ],
            [
                $transferListener,
            ]
        )->wait();
    }

    /**
     * @return void
     */
    public function testUploadUsesTransferManagerConfigDefaultMupThreshold(): void
    {
        $client = $this->getS3ClientMock();
        $manager = new S3TransferManager(
            $client,
        );
        $expectedPartCount = 2;
        $transferListener = $this->createMock(TransferListener::class);
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');
        $manager->upload(
            Utils::streamFor(
                str_repeat("#", $manager->getConfig()['multipart_upload_threshold_bytes'])
            ),
            [
                'Bucket' => 'Bucket',
                'Key' => 'Key',
            ],
            [
                'part_size' => intval(
                    $manager->getConfig()['multipart_upload_threshold_bytes'] / $expectedPartCount
                ),
            ],
            [
                $transferListener,
            ]
        )->wait();
    }

    /**
     *
     * @param int $mupThreshold
     * @param int $expectedPartCount
     * @param int $expectedPartSize
     * @param bool $isMultipartUpload
     *
     * @dataProvider uploadUsesCustomMupThresholdProvider
     *
     * @return void
     */
    public function testUploadUsesCustomMupThreshold(
        int $mupThreshold,
        int $expectedPartCount,
        int $expectedPartSize,
        bool $isMultipartUpload
    ): void
    {
        $client = $this->getS3ClientMock();
        $manager = new S3TransferManager(
            $client,
        );
        $transferListener = $this->createMock(TransferListener::class);
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');
        $expectedIncrementalPartSize = $expectedPartSize;
        $transferListener->method('bytesTransferred')
            -> willReturnCallback(function ($context) use ($expectedPartSize, &$expectedIncrementalPartSize) {
                /** @var TransferProgressSnapshot $snapshot */
                $snapshot = $context[TransferListener::PROGRESS_SNAPSHOT_KEY];
                $this->assertEquals($expectedIncrementalPartSize, $snapshot->getTransferredBytes());
                $expectedIncrementalPartSize += $expectedPartSize;
            });
        $manager->upload(
            Utils::streamFor(
                str_repeat("#", $expectedPartSize * $expectedPartCount)
            ),
            [
                'Bucket' => 'Bucket',
                'Key' => 'Key',
            ],
            [
                'multipart_upload_threshold_bytes' => $mupThreshold,
                'part_size' => $expectedPartSize,
            ],
            [
                $transferListener,
            ]
        )->wait();
        if ($isMultipartUpload) {
            $this->assertGreaterThan(1, $expectedPartCount);
        }
    }

    /**
     * @return array
     */
    public function uploadUsesCustomMupThresholdProvider(): array
    {
        return [
            'mup_threshold_multipart_upload' => [
                'mup_threshold' => 1024 * 1024 * 7,
                'expected_part_count' => 3,
                'expected_part_size' => 1024 * 1024 * 7,
                'is_multipart_upload' => true,
            ],
            'mup_threshold_single_upload' => [
                'mup_threshold' => 1024 * 1024 * 7,
                'expected_part_count' => 1,
                'expected_part_size' => 1024 * 1024 * 5,
                'is_multipart_upload' => false,
            ]
        ];
    }

    /**
     * @return void
     */
    public function testUploadUsesTransferManagerConfigDefaultTargetPartSize(): void
    {
        $client = $this->getS3ClientMock();
        $manager = new S3TransferManager(
            $client,
        );
        $expectedPartCount = 2;
        $transferListener = $this->createMock(TransferListener::class);
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');
        $manager->upload(
            Utils::streamFor(
                str_repeat("#", $manager->getConfig()['target_part_size_bytes'] * $expectedPartCount)
            ),
            [
                'Bucket' => 'Bucket',
                'Key' => 'Key',
            ],
            [
                'multipart_upload_threshold_bytes' => $manager->getConfig()['target_part_size_bytes'],
            ],
            [
                $transferListener,
            ]
        )->wait();
    }

    /**
     * @return void
     */
    public function testUploadUsesCustomPartSize(): void
    {
        $client = $this->getS3ClientMock();
        $manager = new S3TransferManager(
            $client,
        );
        $expectedPartCount = 2;
        $expectedPartSize = 6 * 1024 * 1024; // 6 MBs
        $transferListener = $this->getMockBuilder(TransferListener::class)
        ->onlyMethods(['bytesTransferred'])
        ->getMock();
        $expectedIncrementalPartSize = $expectedPartSize;
        $transferListener->method('bytesTransferred')
            ->willReturnCallback(function ($context) use (
                $expectedPartSize,
                &$expectedIncrementalPartSize
            ) {
                /** @var TransferProgressSnapshot $snapshot */
                $snapshot = $context[TransferListener::PROGRESS_SNAPSHOT_KEY];
                $this->assertEquals($expectedIncrementalPartSize, $snapshot->getTransferredBytes());
                $expectedIncrementalPartSize += $expectedPartSize;
            });
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');

        $manager->upload(
            Utils::streamFor(
                str_repeat("#", $expectedPartSize * $expectedPartCount)
            ),
            [
                'Bucket' => 'Bucket',
                'Key' => 'Key',
            ],
            [
                'part_size' => $expectedPartSize,
                'multipart_upload_threshold_bytes' => $expectedPartSize,
            ],
            [
                $transferListener,
            ]
        )->wait();
    }

    /**
     * @return void
     */
    public function testUploadUsesDefaultChecksumAlgorithm(): void
    {
        $manager = new S3TransferManager();
        $this->testUploadResolvedChecksum(
            [], // No checksum provided
            $manager->getConfig()['checksum_algorithm'] // default checksum algo
        );
    }

    /**
     * @param string $checksumAlgorithm
     *
     * @dataProvider uploadUsesCustomChecksumAlgorithmProvider
     *
     * @return void
     */
    public function testUploadUsesCustomChecksumAlgorithm(
        string $checksumAlgorithm,
    ): void
    {
        $this->testUploadResolvedChecksum(
            ['checksum_algorithm' => $checksumAlgorithm],
            $checksumAlgorithm
        );
    }

    /**
     * @return array[]
     */
    public function uploadUsesCustomChecksumAlgorithmProvider(): array
    {
        return [
            'checksum_sha256' => [
                'checksum_algorithm' => 'sha256',
            ],
            'checksum_sha1' => [
                'checksum_algorithm' => 'sha1',
            ],
            'checksum_crc32c' => [
                'checksum_algorithm' => 'crc32c',
            ],
            'checksum_crc32' => [
                'checksum_algorithm' => 'crc32',
            ]
        ];
    }

    /**
     * @param array $config
     * @param string $expectedChecksum
     *
     * @return void
     */
    private function testUploadResolvedChecksum(
        array $config,
        string $expectedChecksum
    ): void {
        $client = $this->getS3ClientMock([
            'getCommand' => function (
                string $commandName,
                array $args
            ) use (
                $expectedChecksum
            ) {
                $this->assertEquals(
                    strtoupper($expectedChecksum),
                    strtoupper($args['ChecksumAlgorithm'])
                );

                return new Command($commandName, $args);
            },
            'executeAsync' => function () {
                return Create::promiseFor(new Result([]));
            }
        ]);
        $manager = new S3TransferManager(
            $client,
        );
        $manager->upload(
            Utils::streamFor(),
            [
                'Bucket' => 'Bucket',
                'Key' => 'Key',
            ],
            $config
        )->wait();
    }

    /**
     * @param string $directory
     * @param bool $isDirectoryValid
     *
     * @dataProvider uploadDirectoryValidatesProvidedDirectoryProvider
     *
     * @return void
     */
    public function testUploadDirectoryValidatesProvidedDirectory(
        string $directory,
        bool $isDirectoryValid
    ): void
    {
        if (!$isDirectoryValid) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectExceptionMessage(
                "Please provide a valid directory path. "
            . "Provided = " . $directory);
        } else {
            $this->assertTrue(true);
        }

        $manager = new S3TransferManager(
            $this->getS3ClientMock(),
        );
        $manager->uploadDirectory(
            $directory,
            "Bucket",
        )->wait();
        // Clean up resources
        if ($isDirectoryValid) {
            rmdir($directory);
        }
    }

    /**
     * @return array[]
     */
    public function uploadDirectoryValidatesProvidedDirectoryProvider(): array
    {
        $validDirectory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($validDirectory)) {
            mkdir($validDirectory, 0777, true);
        }

        return [
            'valid_directory' => [
                'directory' => $validDirectory,
                'is_valid_directory' => true,
            ],
            'invalid_directory' => [
                'directory' => 'invalid-directory',
                'is_valid_directory' => false,
            ]
        ];
    }

    /**
     * @return void
     */
    public function testUploadDirectoryFailsOnInvalidFilter(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The parameter $config[\'filter\'] must be callable'
        );
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        try {
            $client = $this->getMockBuilder(S3Client::class)
                ->disableOriginalConstructor()
                ->onlyMethods(['getCommand', 'executeAsync'])
                ->getMock();
            $manager = new S3TransferManager(
                $client,
            );
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'filter' => 'invalid_filter',
                ]
            )->wait();
        } finally {
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryFileFilter(): void
    {
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $filesCreated = [];
        $validFilesCount = 0;
        for ($i = 0; $i < 10; $i++) {
            $fileName = "file-$i";
            if ($i % 2 === 0) {
                $fileName .= "-valid";
                $validFilesCount++;
            }

            $filePathName = $directory . "/" . $fileName . ".txt";
            file_put_contents($filePathName, "test");
            $filesCreated[] = $filePathName;
        }
        try {
            $client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getCommand', 'executeAsync'])
            ->getMock();
            $client->method('getCommand')
                ->willReturnCallback(function ($commandName, $args) {
                    return new Command($commandName, $args);
                });
            $client->method('executeAsync')
                ->willReturnCallback(function () {
                    return Create::promiseFor(new Result([]));
                });
            $manager = new S3TransferManager(
                $client,
            );
            $calledTimes = 0;
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'filter' => function (string $objectKey) {
                        return str_ends_with($objectKey, "-valid.txt");
                    },
                    'put_object_request_callback' => function ($requestArgs) use (&$calledTimes) {
                        $this->assertStringContainsString(
                            'valid.txt',
                            $requestArgs["Key"]
                        );
                        $calledTimes++;
                    }
                ]
            )->wait();
            $this->assertEquals($validFilesCount, $calledTimes);
        } finally {
            foreach ($filesCreated as $filePathName) {
                unlink($filePathName);
            }
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryRecursive(): void
    {
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        $subDirectory = $directory . "/sub-directory";
        if (!is_dir($subDirectory)) {
            mkdir($subDirectory, 0777, true);
        }
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
            $subDirectory . "/subdir-file-1.txt",
            $subDirectory . "/subdir-file-2.txt",
        ];
        $objectKeys = [];
        foreach ($files as $file) {
            file_put_contents($file, "test");
            // Remove the directory from the file path to leave
            // just what will be the object key
            $objectKey = str_replace($directory . "/", "", $file);
            $objectKeys[$objectKey] = false;
        }
        try {
            $client = $this->getMockBuilder(S3Client::class)
                ->disableOriginalConstructor()
                ->onlyMethods(['getCommand', 'executeAsync'])
                ->getMock();
            $client->method('getCommand')
                ->willReturnCallback(function ($commandName, $args) use (&$objectKeys) {
                    $objectKeys[$args["Key"]] = true;
                    return new Command($commandName, $args);
                });
            $client->method('executeAsync')
                ->willReturnCallback(function () {
                    return Create::promiseFor(new Result([]));
                });
            $manager = new S3TransferManager(
                $client,
            );
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'recursive' => true,
                ]
            )->wait();
            foreach ($objectKeys as $key => $validated) {
                $this->assertTrue($validated);
            }
        } finally {
            foreach ($files as $file) {
                unlink($file);
            }

            rmdir($subDirectory);
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryNonRecursive(): void
    {
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        $subDirectory = $directory . "/sub-directory";
        if (!is_dir($subDirectory)) {
            mkdir($subDirectory, 0777, true);
        }
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
            $subDirectory . "/subdir-file-1.txt",
            $subDirectory . "/subdir-file-2.txt",
        ];
        $objectKeys = [];
        foreach ($files as $file) {
            file_put_contents($file, "test");
            // Remove the directory from the file path to leave
            // just what will be the object key
            $objectKey = str_replace($directory . "/", "", $file);
            $objectKeys[$objectKey] = false;
        }
        try {
            $client = $this->getMockBuilder(S3Client::class)
                ->disableOriginalConstructor()
                ->onlyMethods(['getCommand', 'executeAsync'])
                ->getMock();
            $client->method('getCommand')
                ->willReturnCallback(function ($commandName, $args) use (&$objectKeys) {
                    $objectKeys[$args["Key"]] = true;
                    return new Command($commandName, $args);
                });
            $client->method('executeAsync')
                ->willReturnCallback(function () {
                    return Create::promiseFor(new Result([]));
                });
            $manager = new S3TransferManager(
                $client,
            );
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'recursive' => false,
                ]
            )->wait();
            $subDirPrefix = str_replace($directory . "/", "", $subDirectory);
            foreach ($objectKeys as $key => $validated) {
                if (str_starts_with($key, $subDirPrefix)) {
                    // Files in subdirectory should have been ignored
                    $this->assertFalse($validated, "Key {$key} should have not been considered");
                } else {
                    $this->assertTrue($validated, "Key {$key} should have been considered");
                }
            }
        } finally {
            foreach ($files as $file) {
                unlink($file);
            }

            rmdir($subDirectory);
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryFollowsSymbolicLink(): void
    {
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        $linkDirectory = sys_get_temp_dir() . "/link-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        if (!is_dir($linkDirectory)) {
            mkdir($linkDirectory, 0777, true);
        }
        $symLinkDirectory = $directory . "/upload-directory-test-link";
        if (is_link($symLinkDirectory)) {
            unlink($symLinkDirectory);
        }
        symlink($linkDirectory, $symLinkDirectory);
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
            $linkDirectory . "/symlink-file-1.txt",
            $linkDirectory . "/symlink-file-2.txt",
        ];
        $objectKeys = [];
        foreach ($files as $file) {
            file_put_contents($file, "test");
            // Remove the directory from the file path to leave
            // just what will be the object key
            $objectKey = str_replace($directory . "/", "", $file);
            $objectKey = str_replace($linkDirectory . "/", "", $objectKey);
            if (str_contains($objectKey, 'symlink-file')) {
                $objectKey = "upload-directory-test-link/" . $objectKey;
            }

            $objectKeys[$objectKey] = false;
        }
        try {
            $client = $this->getMockBuilder(S3Client::class)
                ->disableOriginalConstructor()
                ->onlyMethods(['getCommand', 'executeAsync'])
                ->getMock();
            $client->method('getCommand')
                ->willReturnCallback(function ($commandName, $args) use (&$objectKeys) {
                    $objectKeys[$args["Key"]] = true;
                    return new Command($commandName, $args);
                });
            $client->method('executeAsync')
                ->willReturnCallback(function () {
                    return Create::promiseFor(new Result([]));
                });
            $manager = new S3TransferManager(
                $client,
            );
            // First lets make sure that when follows_symbolic_link is false
            // the directory in the link will not be traversed.
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'recursive' => true,
                    'follow_symbolic_links' => false,
                ]
            )->wait();
            foreach ($objectKeys as $key => $validated) {
                if (str_contains($key, "symlink")) {
                    // Files in subdirectory should have been ignored
                    $this->assertFalse($validated, "Key {$key} should have not been considered");
                } else {
                    $this->assertTrue($validated, "Key {$key} should have been considered");
                }
            }
            // Now let's enable follow_symbolic_links and all files should have
            // been considered, included the ones in the symlink directory.
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'recursive' => true,
                    'follow_symbolic_links' => true,
                ]
            )->wait();
            foreach ($objectKeys as $key => $validated) {
                $this->assertTrue($validated, "Key {$key} should have been considered");
            }
        } finally {
            foreach ($files as $file) {
                unlink($file);
            }

            unlink($symLinkDirectory);
            rmdir($linkDirectory);
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryUsesProvidedPrefix(): void
    {
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
            $directory . "/dir-file-3.txt",
            $directory . "/dir-file-4.txt",
            $directory . "/dir-file-5.txt",
        ];
        $s3Prefix = 'expenses-files/';
        $objectKeys = [];
        foreach ($files as $file) {
            file_put_contents($file, "test");
            $objectKey = str_replace($directory . "/", "", $file);
            $objectKeys[$s3Prefix . $objectKey] = false;
        }
        try {
            $client = $this->getMockBuilder(S3Client::class)
                ->disableOriginalConstructor()
                ->onlyMethods(['getCommand', 'executeAsync'])
                ->getMock();
            $client->method('getCommand')
                ->willReturnCallback(function ($commandName, $args) use (&$objectKeys) {
                    $objectKeys[$args["Key"]] = true;
                    return new Command($commandName, $args);
                });
            $client->method('executeAsync')
                ->willReturnCallback(function () {
                    return Create::promiseFor(new Result([]));
                });
            $manager = new S3TransferManager(
                $client,
            );
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    's3_prefix' => $s3Prefix
                ]
            )->wait();

            foreach ($objectKeys as $key => $validated) {
                $this->assertTrue($validated, "Key {$key} should have been validated");
            }
        } finally {
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryUsesProvidedDelimiter(): void
    {
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
            $directory . "/dir-file-3.txt",
            $directory . "/dir-file-4.txt",
            $directory . "/dir-file-5.txt",
        ];
        $s3Prefix = 'expenses-files/today/records/';
        $s3Delimiter = '|';
        $objectKeys = [];
        foreach ($files as $file) {
            file_put_contents($file, "test");
            $objectKey = str_replace($directory . "/", "", $file);
            $objectKey = $s3Prefix . $objectKey;
            $objectKey = str_replace("/", $s3Delimiter, $objectKey);
            $objectKeys[$objectKey] = false;
        }
        try {
            $client = $this->getMockBuilder(S3Client::class)
                ->disableOriginalConstructor()
                ->onlyMethods(['getCommand', 'executeAsync'])
                ->getMock();
            $client->method('getCommand')
                ->willReturnCallback(function ($commandName, $args) use (&$objectKeys) {
                    $objectKeys[$args["Key"]] = true;
                    return new Command($commandName, $args);
                });
            $client->method('executeAsync')
                ->willReturnCallback(function () {
                    return Create::promiseFor(new Result([]));
                });
            $manager = new S3TransferManager(
                $client,
            );
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    's3_prefix' => $s3Prefix,
                    's3_delimiter' => $s3Delimiter,
                ]
            )->wait();

            foreach ($objectKeys as $key => $validated) {
                $this->assertTrue($validated, "Key {$key} should have been validated");
            }
        } finally {
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryFailsOnInvalidPutObjectRequestCallback(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The parameter \$config['put_object_request_callback'] must be callable.");
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        try {
            $client = $this->getS3ClientMock();
            $manager = new S3TransferManager(
                $client,
            );
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'put_object_request_callback' => false,
                ]
            )->wait();
        } finally {
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryPutObjectRequestCallbackWorks(): void
    {
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
        ];
        foreach ($files as $file) {
            file_put_contents($file, "test");
        }
        try {
            $client = $this->getMockBuilder(S3Client::class)
                ->disableOriginalConstructor()
                ->onlyMethods(['getCommand', 'executeAsync'])
                ->getMock();
            $client->method('getCommand')
                ->willReturnCallback(function ($commandName, $args) use (&$objectKeys) {
                    return new Command($commandName, $args);
                });
            $client->method('executeAsync')
                ->willReturnCallback(function ($command) {
                    $this->assertEquals("Test", $command['FooParameter']);

                    return Create::promiseFor(new Result([]));
                });
            $manager = new S3TransferManager(
                $client,
            );
            $called = 0;
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'put_object_request_callback' => function (
                        &$requestArgs
                    ) use (&$called) {
                        $requestArgs["FooParameter"] = "Test";
                        $called++;
                    },
                ]
            )->wait();
            $this->assertEquals(count($files), $called);
        } finally {
            foreach ($files as $file) {
                unlink($file);
            }

            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryUsesFailurePolicy(): void
    {
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
        ];
        foreach ($files as $file) {
            file_put_contents($file, "test");
        }
        try {
            $client = new S3Client([
                'region' => 'us-east-2',
                'handler' => function ($command) {
                    if (str_contains($command['Key'], "dir-file-2.txt")) {
                        return Create::rejectionFor(
                            new Exception("Failed uploading second file")
                        );
                    }

                    return Create::promiseFor(new Result([]));
                }
            ]);
            $manager = new S3TransferManager(
                $client,
                [
                    'concurrency' => 1, // To make uploads to be one after the other
                ]
            );
            $called = false;
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'failure_policy' => function (
                        array $requestArgs,
                        array $uploadDirectoryRequestArgs,
                        \Throwable $reason,
                        UploadDirectoryResponse $uploadDirectoryResponse
                    ) use ($directory, &$called) {
                        $called = true;
                        $this->assertEquals(
                            $directory,
                            $uploadDirectoryRequestArgs["source_directory"]
                        );
                        $this->assertEquals(
                            "Bucket",
                            $uploadDirectoryRequestArgs["bucket_to"]
                        );
                        $this->assertEquals(
                            "Failed uploading second file",
                            $reason->getMessage()
                        );
                        $this->assertEquals(
                            1,
                            $uploadDirectoryResponse->getObjectsUploaded()
                        );
                        $this->assertEquals(
                            1,
                            $uploadDirectoryResponse->getObjectsFailed()
                        );
                    },
                ]
            )->wait();
            $this->assertTrue($called);
        } finally {
            foreach ($files as $file) {
                unlink($file);
            }

            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryFailsOnInvalidFailurePolicy(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The parameter \$config['failure_policy'] must be callable.");
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        try {
            $client = $this->getS3ClientMock();
            $manager = new S3TransferManager(
                $client
            );
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [
                    'failure_policy' => false,
                ]
            )->wait();
        } finally {
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryFailsWhenFileContainsProvidedDelimiter(): void
    {
        $s3Delimiter = "*";
        $fileNameWithDelimiter = "dir-file-$s3Delimiter.txt";
        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage(
            "The filename `$fileNameWithDelimiter` must not contain the provided delimiter `$s3Delimiter`"
        );
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
            $directory . "/dir-file-3.txt",
            $directory . "/dir-file-4.txt",
            $directory . "/$fileNameWithDelimiter",
        ];
        foreach ($files as $file) {
            file_put_contents($file, "test");
        }
        try {
            $client = $this->getS3ClientMock();
            $manager = new S3TransferManager(
                $client
            );
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                ['s3_delimiter' => $s3Delimiter]
            )->wait();
        } finally {
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryTracksMultipleFiles(): void
    {
        $directory = sys_get_temp_dir() . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
            $directory . "/dir-file-3.txt",
            $directory . "/dir-file-4.txt",
        ];
        $objectKeys = [];
        foreach ($files as $file) {
            file_put_contents($file, "test");
            $objectKey = str_replace($directory . "/", "", $file);
            $objectKeys[$objectKey] = false;
        }

        try {
            $client = $this->getS3ClientMock();
            $manager = new S3TransferManager(
                $client
            );
            $transferListener = $this->getMockBuilder(TransferListener::class)
                ->disableOriginalConstructor()
                ->getMock();
            $transferListener->expects($this->exactly(count($files)))
                ->method('transferInitiated');
            $transferListener->expects($this->exactly(count($files)))
                ->method('transferComplete');
            $transferListener->method('bytesTransferred')
                ->willReturnCallback(function(array $context) use (&$objectKeys) {
                    /** @var TransferProgressSnapshot $snapshot */
                    $snapshot = $context[TransferListener::PROGRESS_SNAPSHOT_KEY];
                    $objectKeys[$snapshot->getIdentifier()] = true;
                });
            $manager->uploadDirectory(
                $directory,
                "Bucket",
                [],
                [],
                [
                    $transferListener
                ]
            )->wait();
            foreach ($objectKeys as $key => $validated) {
                $this->assertTrue(
                    $validated,
                    "The object key `$key` should have been validated."
                );
            }
        } finally {
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir($directory);
        }
    }

    /**
     * @return void
     */
    public function testDownloadFailsOnInvalidS3UriSource(): void
    {
        $invalidS3Uri = "invalid-s3-uri";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid URI: `$invalidS3Uri` provided. "
            . "\nA valid S3 URI looks as `s3://bucket/key`");
        $client = $this->getS3ClientMock();
        $manager = new S3TransferManager(
            $client
        );
        $manager->download(
            $invalidS3Uri
        );
    }

    /**
     * @dataProvider downloadFailsWhenSourceAsArrayMissesBucketOrKeyPropertyProvider
     *
     * @param array $sourceAsArray
     * @param string $expectedExceptionMessage
     *
     * @return void
     */
    public function testDownloadFailsWhenSourceAsArrayMissesBucketOrKeyProperty(
        array $sourceAsArray,
        string $expectedExceptionMessage,
    ): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);
        $client = $this->getS3ClientMock();
        $manager = new S3TransferManager(
            $client
        );
        $manager->download(
            $sourceAsArray
        );
    }

    /**
     * @return array
     */
    public function downloadFailsWhenSourceAsArrayMissesBucketOrKeyPropertyProvider(): array
    {
        return [
            'missing_key' => [
                'source' => [
                    'Bucket' => 'bucket',
                ],
                'expected_exception' => "A valid key must be provided."
            ],
            'missing_bucket' => [
                'source' => [
                    'Key' => 'key',
                ],
                'expected_exception' => "A valid bucket must be provided."
            ]
        ];
    }

    /**
     * @return void
     */
    public function testDownloadWorksWithS3UriAsSource(): void
    {
        $sourceAsArray = [
            'Bucket' => 'bucket',
            'Key' => 'key',
        ];
        $called = false;
        $client = $this->getS3ClientMock([
            'executeAsync' => function(CommandInterface $command) use (
                $sourceAsArray,
                &$called
            ) {
                $called = true;
                $this->assertEquals($sourceAsArray['Bucket'], $command['Bucket']);
                $this->assertEquals($sourceAsArray['Key'], $command['Key']);

                return Create::promiseFor(new Result([
                    'Body' => Utils::streamFor(),
                    '@metadata' => []
                ]));
            },
        ]);
        $manager = new S3TransferManager(
            $client
        );
        $manager->download(
            $sourceAsArray,
        )->wait();
        $this->assertTrue($called);
    }

    /**
     * @return void
     */
    public function testDownloadWorksWithBucketAndKeyAsSource(): void
    {
        $bucket = 'bucket';
        $key = 'key';
        $sourceAsS3Uri = "s3://$bucket/$key";
        $called = false;
        $client = $this->getS3ClientMock([
            'executeAsync' => function(CommandInterface $command) use (
                $bucket,
                $key,
                &$called
            ) {
                $called = true;
                $this->assertEquals($bucket, $command['Bucket']);
                $this->assertEquals($key, $command['Key']);

                return Create::promiseFor(new Result([
                    'Body' => Utils::streamFor(),
                    '@metadata' => []
                ]));
            },
        ]);
        $manager = new S3TransferManager(
            $client
        );
        $manager->download(
            $sourceAsS3Uri,
        )->wait();
        $this->assertTrue($called);
    }

    /**
     *
     * @param array $transferManagerConfig
     * @param array $downloadConfig
     * @param array $downloadArgs
     * @param bool $expectedChecksumMode
     *
     * @return void
     * @dataProvider downloadAppliesChecksumProvider
     *
     */
    public function testDownloadAppliesChecksumMode(
        array $transferManagerConfig,
        array $downloadConfig,
        array $downloadArgs,
        bool $expectedChecksumMode,
    ): void
    {
        $called = false;
        $client = $this->getS3ClientMock([
            'executeAsync' => function (CommandInterface $command) use (
                $expectedChecksumMode,
                &$called
            ) {
                $called = true;
                if ($expectedChecksumMode) {
                    $this->assertEquals(
                        'enabled',
                        $command['ChecksumMode'],
                    );
                } else {
                    if (isset($command['ChecksumMode'])) {
                        $this->assertEquals(
                            'disabled',
                            $command['ChecksumMode'],
                        );
                    }
                }

                if ($command->getName() === MultipartDownloader::GET_OBJECT_COMMAND) {
                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(),
                        '@metadata' => []
                    ]));
                }

                return Create::promiseFor(new Result([]));
            }
        ]);
        $manager = new S3TransferManager(
            $client,
            $transferManagerConfig,
        );
        $manager->download(
            "s3://bucket/key",
            $downloadArgs,
            $downloadConfig
        )->wait();
        $this->assertTrue($called);
    }

    /**
     * @return array
     */
    public function downloadAppliesChecksumProvider(): array
    {
        return [
            'checksum_mode_from_default_transfer_manager_config' => [
                'transfer_manager_config' => [],
                'download_config' => [],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => S3TransferManager::getDefaultConfig()[
                'checksum_validation_enabled'
                ],
            ],
            'checksum_mode_enabled_by_transfer_manager_config' => [
                'transfer_manager_config' => [
                    'checksum_validation_enabled' => true
                ],
                'download_config' => [],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => true,
            ],
            'checksum_mode_disabled_by_transfer_manager_config' => [
                'transfer_manager_config' => [
                    'checksum_validation_enabled' => false
                ],
                'download_config' => [],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => false,
            ],
            'checksum_mode_enabled_by_download_config' => [
                'transfer_manager_config' => [],
                'download_config' => [
                    'checksum_validation_enabled' => true
                ],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => true,
            ],
            'checksum_mode_disabled_by_download_config' => [
                'transfer_manager_config' => [],
                'download_config' => [
                    'checksum_validation_enabled' => false
                ],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => false,
            ],
            'checksum_mode_download_config_overrides_transfer_manager_config' => [
                'transfer_manager_config' => [
                    'checksum_validation_enabled' => false
                ],
                'download_config' => [
                    'checksum_validation_enabled' => true
                ],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => true,
            ]
        ];
    }

    /**
     * @param array $downloadArgs
     *
     * @dataProvider singleDownloadWhenPartNumberOrRangeArePresentProvider
     *
     * @return void
     */
    public function testDoesSingleDownloadWhenPartNumberOrRangeArePresent(
        array $downloadArgs,
    ): void
    {
        $calledOnce = false;
        $client = $this->getS3ClientMock([
            'executeAsync' => function (CommandInterface $command) use (&$calledOnce) {
                if ($command->getName() === MultipartDownloader::GET_OBJECT_COMMAND) {
                    if ($calledOnce) {
                        $this->fail(MultipartDownloader::GET_OBJECT_COMMAND . " should have been called once.");
                    }

                    $calledOnce = true;
                    return Create::promiseFor(new Result([
                        'PartsCount' => 2,
                        'ContentRange' => 10240000,
                        'Body' => Utils::streamFor(
                            str_repeat("*", 1024 * 1024 * 20)
                        ),
                        '@metadata' => []
                    ]));
                } else {
                    $this->fail("Unexpected command execution `" . $command->getName() . "`.");
                }
            }
        ]);
        $manager = new S3TransferManager(
            $client,
        );
        $manager->download(
            "s3://bucket/key",
            $downloadArgs,
        )->wait();
        $this->assertTrue($calledOnce);
    }

    /**
     * @return array
     */
    public function singleDownloadWhenPartNumberOrRangeArePresentProvider(): array
    {
        return [
            'part_number_present' => [
                'download_args' => [
                    'PartNumber' => 1
                ]
            ],
            'range_present' => [
                'download_args' => [
                    'Range' => '100-1024'
                ]
            ]
        ];
    }

    /**
     * @param string $multipartDownloadType
     * @param string $expectedParameter
     *
     * @dataProvider downloadChoosesMultipartDownloadTypeProvider
     *
     * @return void
     */
    public function testDownloadChoosesMultipartDownloadType(
        string $multipartDownloadType,
        string $expectedParameter
    ): void
    {
        $calledOnce = false;
        $client = $this->getS3ClientMock([
            'executeAsync' => function (CommandInterface $command) use (
                &$calledOnce,
                $expectedParameter
            ) {
                $this->assertTrue(
                    isset($command[$expectedParameter]),
                );
                $calledOnce = true;

                return Create::promiseFor(new Result([
                    'Body' => Utils::streamFor(),
                    '@metadata' => []
                ]));
            }
        ]);
        $manager = new S3TransferManager(
            $client,
        );
        $manager->download(
            "s3://bucket/key",
            [],
            ['multipart_download_type' => $multipartDownloadType]
        )->wait();
        $this->assertTrue($calledOnce);
    }

    /**
     * @return array
     */
    public function downloadChoosesMultipartDownloadTypeProvider(): array
    {
        return [
            'part_get_multipart_download' => [
                'multipart_download_type' => MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER,
                'expected_parameter' => 'PartNumber'
            ],
            'range_get_multipart_download' => [
                'multipart_download_type' => MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER,
                'expected_parameter' => 'Range'
            ]
        ];
    }

    /**
     * @param int $minimumPartSize
     * @param int $objectSize
     * @param array $expectedPartsSize
     *
     * @dataProvider rangeGetMultipartDownloadMinimumPartSizeProvider
     *
     * @return void
     */
    public function testRangeGetMultipartDownloadMinimumPartSize(
        int $minimumPartSize,
        int $objectSize,
        array $expectedRangeSizes
    ): void
    {
        $calledTimes = 0;
        $client = $this->getS3ClientMock([
            'executeAsync' => function (CommandInterface $command) use (
                $objectSize,
                $expectedRangeSizes,
                &$calledTimes,
            ) {
                $this->assertTrue(isset($command['Range']));
                $range = str_replace("bytes=", "", $command['Range']);
                $rangeParts = explode("-", $range);
                $this->assertEquals(
                    (intval($rangeParts[1]) - intval($rangeParts[0])) + 1,
                    $expectedRangeSizes[$calledTimes]
                );
                $calledTimes++;

                return Create::promiseFor(new Result([
                    'Body' => Utils::streamFor(),
                    'ContentRange' => $objectSize,
                    '@metadata' => []
                ]));
            }
        ]);
        $manager = new S3TransferManager(
            $client,
        );
        $manager->download(
            "s3://bucket/key",
            [],
            [
                'multipart_download_type' => MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER,
                'minimum_part_size' => $minimumPartSize,
            ]
        )->wait();
        $this->assertEquals(count($expectedRangeSizes), $calledTimes);
    }

    /**
     * @return array
     */
    public function rangeGetMultipartDownloadMinimumPartSizeProvider(): array
    {
        return [
            'minimum_part_size_1' => [
                'minimum_part_size' => 1024,
                'object_size' => 3072,
                'expected_range_sizes' => [
                    1024,
                    1024,
                    1024
                ]
            ],
            'minimum_part_size_2' => [
                'minimum_part_size' => 1024,
                'object_size' => 2000,
                'expected_range_sizes' => [
                    1024,
                    977,
                ]
            ],
            'minimum_part_size_3' => [
                'minimum_part_size' => 1024 * 1024 * 10,
                'object_size' => 1024 * 1024 * 25,
                'expected_range_sizes' => [
                    1024 * 1024 * 10,
                    1024 * 1024 * 10,
                    (1024 * 1024 * 5) + 1
                ]
            ],
            'minimum_part_size_4' => [
                'minimum_part_size' => 1024 * 1024 * 25,
                'object_size' => 1024 * 1024 * 100,
                'expected_range_sizes' => [
                    1024 * 1024 * 25,
                    1024 * 1024 * 25,
                    1024 * 1024 * 25,
                    1024 * 1024 * 25,
                ]
            ]
        ];
    }

    /**
     * @return void
     */
    public function testDownloadDirectoryValidatesDestinationDirectory(): void
    {
        $destinationDirectory = "invalid-directory";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Destination directory `$destinationDirectory` MUST exists.");
        $client = $this->getS3ClientMock();
        $manager = new S3TransferManager(
            $client,
        );
        $manager->downloadDirectory(
            "Bucket",
            $destinationDirectory
        );
    }

    /**
     * @param array $config
     * @param string $expectedS3Prefix
     *
     * @dataProvider downloadDirectoryAppliesS3PrefixProvider
     *
     * @return void
     */
    public function testDownloadDirectoryAppliesS3Prefix(
        array $config,
        string $expectedS3Prefix
    ): void
    {
        $destinationDirectory = sys_get_temp_dir() . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }
        try {
            $called = false;
            $listObjectsCalled = false;
            $client = $this->getS3ClientMock([
                'executeAsync' => function (CommandInterface $command) use (
                    $expectedS3Prefix,
                    &$called,
                    &$listObjectsCalled,
                ) {
                    $called = true;
                    if ($command->getName() === "ListObjectsV2") {
                        $listObjectsCalled = true;
                        $this->assertEquals(
                            $expectedS3Prefix,
                            $command['Prefix']
                        );
                    }

                    return Create::promiseFor(new Result([]));
                },
                'getApi' => function () {
                    $service = $this->getMockBuilder(Service::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(["getPaginatorConfig"])
                        ->getMock();
                    $service->method('getPaginatorConfig')
                        ->willReturn([
                            'input_token'  => null,
                            'output_token' => null,
                            'limit_key'    => null,
                            'result_key'   => null,
                            'more_results' => null,
                        ]);

                    return $service;
                },
                'getHandlerList' => function () {
                    return new HandlerList();
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                "Bucket",
                $destinationDirectory,
                [],
                $config
            )->wait();

            $this->assertTrue($called);
            $this->assertTrue($listObjectsCalled);
        } finally {
            rmdir($destinationDirectory);
        }
    }

    /**
     * @return array
     */
    public function downloadDirectoryAppliesS3PrefixProvider(): array
    {
        return [
            's3_prefix_from_config' => [
                'config' => [
                    's3_prefix' => 'TestPrefix',
                ],
                'expected_s3_prefix' => 'TestPrefix'
            ],
            's3_prefix_from_list_object_v2_args' => [
                'config' => [
                    'list_object_v2_args' => [
                        'Prefix' => 'PrefixFromArgs'
                    ],
                ],
                'expected_s3_prefix' => 'PrefixFromArgs'
            ],
            's3_prefix_from_config_is_ignored_when_present_in_list_object_args' => [
                'config' => [
                    's3_prefix' => 'TestPrefix',
                    'list_object_v2_args' => [
                        'Prefix' => 'PrefixFromArgs'
                    ],
                ],
                'expected_s3_prefix' => 'PrefixFromArgs'
            ],
        ];
    }

    /**
     * @param array $config
     * @param string $expectedS3Delimiter
     *
     * @dataProvider downloadDirectoryAppliesDelimiterProvider
     *
     * @return void
     */
    public function testDownloadDirectoryAppliesDelimiter(
        array $config,
        string $expectedS3Delimiter
    ): void
    {
        $destinationDirectory = sys_get_temp_dir() . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }
        try {
            $called = false;
            $listObjectsCalled = false;
            $client = $this->getS3ClientMock([
                'executeAsync' => function (CommandInterface $command) use (
                    $expectedS3Delimiter,
                    &$called,
                    &$listObjectsCalled,
                ) {
                    $called = true;
                    if ($command->getName() === "ListObjectsV2") {
                        $listObjectsCalled = true;
                        $this->assertEquals(
                            $expectedS3Delimiter,
                            $command['Delimiter']
                        );
                    }

                    return Create::promiseFor(new Result([]));
                },
                'getApi' => function () {
                    $service = $this->getMockBuilder(Service::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(["getPaginatorConfig"])
                        ->getMock();
                    $service->method('getPaginatorConfig')
                        ->willReturn([
                            'input_token'  => null,
                            'output_token' => null,
                            'limit_key'    => null,
                            'result_key'   => null,
                            'more_results' => null,
                        ]);

                    return $service;
                },
                'getHandlerList' => function () {
                    return new HandlerList();
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                "Bucket",
                $destinationDirectory,
                [],
                $config
            )->wait();

            $this->assertTrue($called);
            $this->assertTrue($listObjectsCalled);
        } finally {
            rmdir($destinationDirectory);
        }
    }

    /**
     * @return array
     */
    public function downloadDirectoryAppliesDelimiterProvider(): array
    {
        return [
            's3_delimiter_from_config' => [
                'config' => [
                    's3_delimiter' => 'FooDelimiter',
                ],
                'expected_s3_delimiter' => 'FooDelimiter'
            ],
            's3_delimiter_from_list_object_v2_args' => [
                'config' => [
                    'list_object_v2_args' => [
                        'Delimiter' => 'DelimiterFromArgs'
                    ],
                ],
                'expected_s3_delimiter' => 'DelimiterFromArgs'
            ],
            's3_delimiter_from_config_is_ignored_when_present_in_list_object_args' => [
                'config' => [
                    's3_delimiter' => 'TestDelimiter',
                    'list_object_v2_args' => [
                        'Delimiter' => 'DelimiterFromArgs'
                    ],
                ],
                'expected_s3_delimiter' => 'DelimiterFromArgs'
            ],
        ];
    }

    /**
     * @return void
     */
    public function testDownloadDirectoryFailsOnInvalidFilter(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The parameter \$config['filter'] must be callable.");
        $destinationDirectory = sys_get_temp_dir() . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }
        try {
            $called = false;
            $client = $this->getS3ClientMock([
                'executeAsync' => function (CommandInterface $command) use (
                    &$called,
                ) {
                    $called = true;
                    return Create::promiseFor(new Result([]));
                },
                'getApi' => function () {
                    $service = $this->getMockBuilder(Service::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(["getPaginatorConfig"])
                        ->getMock();
                    $service->method('getPaginatorConfig')
                        ->willReturn([
                            'input_token'  => null,
                            'output_token' => null,
                            'limit_key'    => null,
                            'result_key'   => null,
                            'more_results' => null,
                        ]);

                    return $service;
                },
                'getHandlerList' => function () {
                    return new HandlerList();
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                "Bucket",
                $destinationDirectory,
                [],
                ['filter' => false]
            )->wait();
            $this->assertTrue($called);
        } finally {
            rmdir($destinationDirectory);
        }
    }

    /**
     * @return void
     */
    public function testDownloadDirectoryFailsOnInvalidFailurePolicy(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The parameter \$config['failure_policy'] must be callable.");
        $destinationDirectory = sys_get_temp_dir() . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }
        try {
            $called = false;
            $client = $this->getS3ClientMock([
                'executeAsync' => function (CommandInterface $command) use (
                    &$called,
                ) {
                    $called = true;
                    return Create::promiseFor(new Result([]));
                },
                'getApi' => function () {
                    $service = $this->getMockBuilder(Service::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(["getPaginatorConfig"])
                        ->getMock();
                    $service->method('getPaginatorConfig')
                        ->willReturn([
                            'input_token'  => null,
                            'output_token' => null,
                            'limit_key'    => null,
                            'result_key'   => null,
                            'more_results' => null,
                        ]);

                    return $service;
                },
                'getHandlerList' => function () {
                    return new HandlerList();
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                "Bucket",
                $destinationDirectory,
                [],
                ['failure_policy' => false]
            )->wait();
            $this->assertTrue($called);
        } finally {
            rmdir($destinationDirectory);
        }
    }

    /**
     * @return void
     */
    public function testDownloadDirectoryUsesFailurePolicy(): void
    {
        $destinationDirectory = sys_get_temp_dir() . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }

        try {
            $client = new S3Client([
                'region' => 'us-west-2',
                'handler' => function (CommandInterface $command) {
                    if ($command->getName() === 'ListObjectsV2') {
                        return Create::promiseFor(new Result([
                            'Contents' => [
                                [
                                    'Key' => 'file1.txt',
                                ],
                                [
                                    'Key' => 'file2.txt',
                                ]
                            ]
                        ]));
                    } elseif ($command->getName() === 'GetObject') {
                        if ($command['Key'] === 'file2.txt') {
                            return Create::rejectionFor(
                                new Exception("Failed downloading file")
                            );
                        }
                    }

                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(),
                        '@metadata' => []
                    ]));
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                "Bucket",
                $destinationDirectory,
                [],
                ['failure_policy' => function (
                    array $requestArgs,
                    array $uploadDirectoryRequestArgs,
                    \Throwable $reason,
                    DownloadDirectoryResponse $downloadDirectoryResponse
                ) use ($destinationDirectory, &$called) {
                    $called = true;
                    $this->assertEquals(
                        $destinationDirectory,
                        $uploadDirectoryRequestArgs['destination_directory']
                    );
                    $this->assertEquals(
                        "Failed downloading file",
                        $reason->getMessage()
                    );
                    $this->assertEquals(
                        1,
                        $downloadDirectoryResponse->getObjectsDownloaded()
                    );
                    $this->assertEquals(
                        1,
                        $downloadDirectoryResponse->getObjectsFailed()
                    );
                }]
            )->wait();
            $this->assertTrue($called);
        } finally {
            unlink($destinationDirectory . '/file1.txt');
            rmdir($destinationDirectory);
        }
    }

    /**
     * @param Closure $filter
     * @param array $objectList
     * @param array $expectedObjectList
     *
     * @dataProvider downloadDirectoryAppliesFilter
     *
     * @return void
     */
    public function testDownloadDirectoryAppliesFilter(
        Closure $filter,
        array $objectList,
        array $expectedObjectList,
    ): void
    {
        $destinationDirectory = sys_get_temp_dir() . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }
        try {
            $called = false;
            $downloadObjectKeys = [];
            foreach ($expectedObjectList as $objectKey) {
                $downloadObjectKeys[$objectKey] = false;
            }
            $client = $this->getS3ClientMock([
                'executeAsync' => function (CommandInterface $command) use (
                    $objectList,
                    &$called,
                    &$downloadObjectKeys
                ) {
                    $called = true;
                    if ($command->getName() === 'ListObjectsV2') {
                        return Create::promiseFor(new Result([
                            'Contents' => $objectList,
                        ]));
                    } elseif ($command->getName() === 'GetObject') {
                        $downloadObjectKeys[$command['Key']] = true;
                    }

                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(),
                        '@metadata' => []
                    ]));
                },
                'getApi' => function () {
                    $service = $this->getMockBuilder(Service::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(["getPaginatorConfig"])
                        ->getMock();
                    $service->method('getPaginatorConfig')
                        ->willReturn([
                            'input_token'  => null,
                            'output_token' => null,
                            'limit_key'    => null,
                            'result_key'   => null,
                            'more_results' => null,
                        ]);

                    return $service;
                },
                'getHandlerList' => function () {
                    return new HandlerList();
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                "Bucket",
                $destinationDirectory,
                [],
                ['filter' => $filter]
            )->wait();

            $this->assertTrue($called);
            foreach ($downloadObjectKeys as $key => $validated) {
                $this->assertTrue(
                    $validated,
                    "The key `$key` should have been validated"
                );
            }
        } finally {
            $dirs = [];
            foreach ($objectList as $object) {
                if (file_exists($destinationDirectory . "/" . $object['Key'])) {
                    unlink($destinationDirectory . "/" . $object['Key']);
                }

                $dirs [dirname($destinationDirectory . "/" . $object['Key'])] = true;
            }

            foreach ($dirs as $dir => $_) {
                if (is_dir($dir)) {
                    rmdir($dir);
                }
            }

            rmdir($destinationDirectory);
        }
    }

    /**
     * @return array[]
     */
    public function downloadDirectoryAppliesFilter(): array
    {
        return [
            'filter_1' => [
                'filter' => function (string $objectKey) {
                    return str_starts_with($objectKey, "folder_2/");
                },
                'object_list' => [
                    [
                        'Key' => 'folder_1/key_1.txt',
                    ],
                    [
                        'Key' => 'folder_1/key_2.txt'
                    ],
                    [
                        'Key' => 'folder_2/key_1.txt'
                    ],
                    [
                        'Key' => 'folder_2/key_2.txt'
                    ]
                ],
                'expected_object_list' => [
                    "folder_2/key_1.txt",
                    "folder_2/key_2.txt",
                ]
            ],
            'filter_2' => [
                'filter' => function (string $objectKey) {
                    return $objectKey === "folder_2/key_1.txt";
                },
                'object_list' => [
                    [
                        'Key' => 'folder_1/key_1.txt',
                    ],
                    [
                        'Key' => 'folder_1/key_2.txt'
                    ],
                    [
                        'Key' => 'folder_2/key_1.txt'
                    ],
                    [
                        'Key' => 'folder_2/key_2.txt'
                    ]
                ],
                'expected_object_list' => [
                    "folder_2/key_1.txt",
                ]
            ],
            'filter_3' => [
                'filter' => function (string $objectKey) {
                    return $objectKey !== "folder_2/key_1.txt";
                },
                'object_list' => [
                    [
                        'Key' => 'folder_1/key_1.txt',
                    ],
                    [
                        'Key' => 'folder_1/key_2.txt'
                    ],
                    [
                        'Key' => 'folder_2/key_1.txt'
                    ],
                    [
                        'Key' => 'folder_2/key_2.txt'
                    ]
                ],
                'expected_object_list' => [
                    "folder_2/key_2.txt",
                    "folder_1/key_1.txt",
                    "folder_1/key_1.txt",
                ]
            ]
        ];
    }

    /**
     * @return void
     */
    public function testDownloadDirectoryFailsOnInvalidGetObjectRequestCallback(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "The parameter \$config['get_object_request_callback'] must be callable."
        );
        $destinationDirectory = sys_get_temp_dir() . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }
        try {
            $client = $this->getS3ClientMock([
                'executeAsync' => function (CommandInterface $command) {
                    if ($command->getName() === 'ListObjectsV2') {
                        return Create::promiseFor(new Result([
                            'Contents' => [],
                        ]));
                    }

                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(),
                        '@metadata' => []
                    ]));
                },
                'getApi' => function () {
                    $service = $this->getMockBuilder(Service::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(["getPaginatorConfig"])
                        ->getMock();
                    $service->method('getPaginatorConfig')
                        ->willReturn([
                            'input_token'  => null,
                            'output_token' => null,
                            'limit_key'    => null,
                            'result_key'   => null,
                            'more_results' => null,
                        ]);

                    return $service;
                },
                'getHandlerList' => function () {
                    return new HandlerList();
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                "Bucket",
                $destinationDirectory,
                [],
                ['get_object_request_callback' => false]
            )->wait();
        } finally {
            rmdir($destinationDirectory);
        }
    }

    /**
     * @return void
     */
    public function testDownloadDirectoryGetObjectRequestCallbackWorks(): void
    {
        $destinationDirectory = sys_get_temp_dir() . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }
        try {
            $called = false;
            $listObjectsContent = [
                [
                    'Key' => 'folder_1/key_1.txt',
                ]
            ];
            $client = $this->getS3ClientMock([
                'executeAsync' => function (CommandInterface $command) use ($listObjectsContent) {
                    if ($command->getName() === 'ListObjectsV2') {
                        return Create::promiseFor(new Result([
                            'Contents' => $listObjectsContent,
                        ]));
                    }

                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(),
                        '@metadata' => []
                    ]));
                },
                'getApi' => function () {
                    $service = $this->getMockBuilder(Service::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(["getPaginatorConfig"])
                        ->getMock();
                    $service->method('getPaginatorConfig')
                        ->willReturn([
                            'input_token'  => null,
                            'output_token' => null,
                            'limit_key'    => null,
                            'result_key'   => null,
                            'more_results' => null,
                        ]);

                    return $service;
                },
                'getHandlerList' => function () {
                    return new HandlerList();
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $getObjectRequestCallback = function($requestArgs) use (&$called) {
                $called = true;
                $this->assertTrue(isset($requestArgs['CustomParameter']));
                $this->assertEquals(
                    'CustomParameterValue',
                    $requestArgs['CustomParameter']
                );
            };
            $manager->downloadDirectory(
                "Bucket",
                $destinationDirectory,
                [
                    'CustomParameter' => 'CustomParameterValue'
                ],
                ['get_object_request_callback' => $getObjectRequestCallback]
            )->wait();
            $this->assertTrue($called);
        } finally {
            $dirs = [];
            foreach ($listObjectsContent as $object) {
                $file = $destinationDirectory . "/" . $object['Key'];
                if (file_exists($file)) {
                    $dirs[dirname($file)] = true;
                    unlink($file);
                }
            }

            foreach (array_keys($dirs) as $dir) {
                if (is_dir($dir)) {
                    rmdir($dir);
                }
            }

            rmdir($destinationDirectory);
        }
    }

    /**
     * @param array $listObjectsContent
     * @param array $expectedFileKeys
     *
     * @dataProvider downloadDirectoryCreateFilesProvider
     *
     * @return void
     */
    public function testDownloadDirectoryCreateFiles(
        array $listObjectsContent,
        array $expectedFileKeys,
    ): void
    {
        $destinationDirectory = sys_get_temp_dir() . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }
        try {
            $called = false;
            $client = $this->getS3ClientMock([
                'executeAsync' => function (CommandInterface $command) use (
                    $listObjectsContent,
                    &$called
                ) {
                    $called = true;
                    if ($command->getName() === 'ListObjectsV2') {
                        return Create::promiseFor(new Result([
                            'Contents' => $listObjectsContent,
                        ]));
                    }

                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(
                            "Test file " . $command['Key']
                        ),
                        '@metadata' => []
                    ]));
                },
                'getApi' => function () {
                    $service = $this->getMockBuilder(Service::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(["getPaginatorConfig"])
                        ->getMock();
                    $service->method('getPaginatorConfig')
                        ->willReturn([
                            'input_token'  => null,
                            'output_token' => null,
                            'limit_key'    => null,
                            'result_key'   => null,
                            'more_results' => null,
                        ]);

                    return $service;
                },
                'getHandlerList' => function () {
                    return new HandlerList();
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                "Bucket",
                $destinationDirectory,
            )->wait();
            $this->assertTrue($called);
            foreach ($expectedFileKeys as $key) {
                $file = $destinationDirectory . "/" . $key;
                $this->assertFileExists($file);
                $this->assertEquals(
                    "Test file " . $key,
                    file_get_contents($file)
                );
            }
        } finally {
            $dirs = [];
            foreach ($expectedFileKeys as $key) {
                $file = $destinationDirectory . "/" . $key;
                if (file_exists($file)) {
                    unlink($file);
                }

                $dirs [dirname($file)] = true;
            }

            foreach ($dirs as $dir => $_) {
                if (is_dir($dir)) {
                    rmdir($dir);
                }
            }

            if (is_dir($destinationDirectory)) {
                rmdir($destinationDirectory);
            }
        }
    }

    /**
     * @return array
     */
    public function downloadDirectoryCreateFilesProvider(): array
    {
        return [
            'files_1' => [
                'list_objects_content' => [
                    [
                        'Key' => 'file1.txt'
                    ],
                    [
                        'Key' => 'file2.txt'
                    ],
                    [
                        'Key' => 'file3.txt'
                    ],
                    [
                        'Key' => 'file4.txt'
                    ],
                    [
                        'Key' => 'file5.txt'
                    ]
                ],
                'expected_file_keys' => [
                    'file1.txt',
                    'file2.txt',
                    'file3.txt',
                    'file4.txt',
                    'file5.txt'
                ]
            ]
        ];
    }

    /**
     * @param array $objects
     *
     * @dataProvider failsWhenKeyResolvesOutsideTargetDirectoryProvider
     *
     * @return void
     */
    public function testFailsWhenKeyResolvesOutsideTargetDirectory(
        string $prefix,
        array $objects,
    ) {
        $bucket = "test-bucket";
        $directory = "test-directory";
        try {
            $fullDirectoryPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $directory;
            if (is_dir($fullDirectoryPath)) {
                TestsUtility::cleanUpDir($fullDirectoryPath);
            }
            mkdir($fullDirectoryPath, 0777, true);
            $this->expectException(S3TransferException::class);
            $called = false;
            $client = $this->getS3ClientMock([
                'executeAsync' => function (CommandInterface $command) use (
                    $objects,
                    &$called
                ) {
                    $called = true;
                    if ($command->getName() === 'ListObjectsV2') {
                        return Create::promiseFor(new Result([
                            'Contents' => $objects,
                        ]));
                    }

                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(
                            "Test file " . $command['Key']
                        ),
                        '@metadata' => []
                    ]));
                },
                'getApi' => function () {
                    $service = $this->getMockBuilder(Service::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(["getPaginatorConfig"])
                        ->getMock();
                    $service->method('getPaginatorConfig')
                        ->willReturn([
                            'input_token'  => null,
                            'output_token' => null,
                            'limit_key'    => null,
                            'result_key'   => null,
                            'more_results' => null,
                        ]);

                    return $service;
                },
                'getHandlerList' => function () {
                    return new HandlerList();
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                $bucket,
                $fullDirectoryPath,
                [],
                [
                    's3_prefix' => $prefix,
                ]
            )->wait();
            $this->assertTrue($called);
        } finally {
            TestsUtility::cleanUpDir($directory);
        }
    }

    /**
     * @return array
     */
    public function failsWhenKeyResolvesOutsideTargetDirectoryProvider(): array {
        return [
            'resolves_outside_target_directory_1' => [
                'prefix' => 'foo-objects/',
                'objects' => [
                    [
                        'Key' => '../outside/key1.txt'
                    ],
                ],
            ],
            'resolves_outside_target_directory_2' => [
                'prefix' => 'foo-objects/',
                'objects' => [
                    [
                        'Key' => '../../foo/key2.txt'
                    ]
                ]
            ],
            'resolves_outside_target_directory_3' => [
                'prefix' => 'buzz/',
                'objects' => [
                    [
                        'Key' => '..//inner//key3.txt'
                    ]
                ]
            ],
            'resolves_outside_target_directory_4' => [
                'prefix' => 'test/',
                'objects' => [
                    [
                        'Key' => './../../key4.txt'
                    ]
                ]
            ],
            'resolves_outside_target_directory_5' => [
                'prefix' => 'test/',
                'objects' => [
                    [
                        'Key' => './../another_dir/.././key1.txt',
                    ],
                ]
            ],
        ];
    }

    /**
     * @param array $methodsCallback If any from the callbacks below
     *  is not provided then a default implementation will be provided.
     * - getCommand: (Closure, optional) This callable will
     *   receive as parameters:
     *   - $commandName: (string, optional)
     *   - $args: (array, optional)
     * - executeAsync: (Closure, optional) This callable will
     *   receive as parameter:
     *   - $command: (CommandInterface, optional)
     *
     * @return S3Client
     */
    private function getS3ClientMock(
        array $methodsCallback = []
    ): S3Client
    {
        if (isset($methodsCallback['getCommand']) && !is_callable($methodsCallback['getCommand'])) {
            throw new InvalidArgumentException("getCommand should be callable");
        } elseif (!isset($methodsCallback['getCommand'])) {
            $methodsCallback['getCommand'] = function (
                string $commandName,
                array $args
            ) {
                return new Command($commandName, $args);
            };
        }

        if (isset($methodsCallback['executeAsync']) && !is_callable($methodsCallback['executeAsync'])) {
            throw new InvalidArgumentException("getObject should be callable");
        } elseif (!isset($methodsCallback['executeAsync'])) {
            $methodsCallback['executeAsync'] = function ($command) {
                return match ($command->getName()) {
                    'CreateMultipartUpload' => Create::promiseFor(new Result([
                        'UploadId' => 'FooUploadId',
                    ])),
                    'UploadPart',
                    'CompleteMultipartUpload',
                    'AbortMultipartUpload',
                    'PutObject' => Create::promiseFor(new Result([])),
                    default => null,
                };
            };
        }

        $client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods(array_keys($methodsCallback))
            ->getMock();
        foreach ($methodsCallback as $name => $callback) {
            $client->method($name)->willReturnCallback($callback);
        }

        return $client;
    }
}
