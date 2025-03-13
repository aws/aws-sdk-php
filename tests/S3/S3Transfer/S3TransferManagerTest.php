<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Command;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Transfer\Models\UploadDirectoryResponse;
use Aws\S3\S3Transfer\MultipartUploader;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Aws\S3\S3Transfer\S3TransferManager;
use Exception;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response;
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
        $client = $this->getS3ClientMock();;
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
                $snapshot = $context['progress_snapshot'];
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
                $snapshot = $context['progress_snapshot'];
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
        $client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getCommand', 'executeAsync'])
            ->getMock();
        $manager = new S3TransferManager(
            $client,
        );
        $client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) use (
                $expectedChecksum
            ) {
                $this->assertEquals(
                    strtoupper($expectedChecksum),
                    strtoupper($args['ChecksumAlgorithm'])
                );

                return new Command($commandName, $args);
            });
        $client->method('executeAsync')
            ->willReturnCallback(function ($command) {
                return Create::promiseFor(new Result([]));
            });
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
                    ) use (&$called) {
                        $called = true;
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
                    $snapshot = $context['progress_snapshot'];
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
     * @return S3Client
     */
    private function getS3ClientMock(): S3Client
    {
        $client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getCommand', 'executeAsync'])
            ->getMock();
        $client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });
        $client->method('executeAsync')->willReturnCallback(
            function ($command) {
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
            }
        );

        return $client;
    }
}
