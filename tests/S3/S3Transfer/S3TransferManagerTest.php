<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Api\Service;
use Aws\Command;
use Aws\CommandInterface;
use Aws\HandlerList;
use Aws\Result;
use Aws\S3\ApplyChecksumMiddleware;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadDirectoryRequest;
use Aws\S3\S3Transfer\Models\DownloadDirectoryResult;
use Aws\S3\S3Transfer\Models\DownloadRequest;
use Aws\S3\S3Transfer\Models\DownloadResult;
use Aws\S3\S3Transfer\Models\ResumableDownload;
use Aws\S3\S3Transfer\Models\ResumableUpload;
use Aws\S3\S3Transfer\Models\ResumeDownloadRequest;
use Aws\S3\S3Transfer\Models\ResumeUploadRequest;
use Aws\S3\S3Transfer\Models\UploadDirectoryRequest;
use Aws\S3\S3Transfer\Models\UploadDirectoryResult;
use Aws\S3\S3Transfer\Models\UploadRequest;
use Aws\S3\S3Transfer\Models\UploadResult;
use Aws\S3\S3Transfer\AbstractMultipartDownloader;
use Aws\S3\S3Transfer\MultipartUploader;
use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Aws\S3\S3Transfer\S3TransferManager;
use Aws\Test\TestsUtility;
use Closure;
use Exception;
use Generator;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

class S3TransferManagerTest extends TestCase
{
    private const DOWNLOAD_BASE_CASES = __DIR__ . '/test-cases/download-single-object.json';
    private const UPLOAD_BASE_CASES = __DIR__ . '/test-cases/upload-single-object.json';
    private const UPLOAD_DIRECTORY_BASE_CASES = __DIR__ . '/test-cases/upload-directory.json';
    private const DOWNLOAD_DIRECTORY_BASE_CASES = __DIR__ . '/test-cases/download-directory.json';
    private static array $s3BodyTemplates = [
        'CreateMultipartUpload' => <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<InitiateMultipartUploadResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Bucket>{Bucket}</Bucket>
    <Key>{Key}</Key>
    <UploadId>{UploadId}</UploadId>
</InitiateMultipartUploadResult>
EOF,
        'ListObjectsV2' => <<<EOF
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Name>{Bucket}</Name>
    <Prefix>{Prefix}</Prefix>
    <KeyCount>3</KeyCount>
    <MaxKeys>1000</MaxKeys>
    <IsTruncated>false</IsTruncated>
    {Contents}
</ListBucketResult>
EOF,
        'ListObjectsV2::Contents' => <<<EOF
    <Contents>
        <Key>{Key}</Key>
        <Size>{Size}</Size>
        <LastModified>2025-05-20T14:45:08.000Z</LastModified>
        <ETag>FixedETag</ETag>
        <ChecksumAlgorithm>CRC64NVME</ChecksumAlgorithm>
        <ChecksumType>FULL_OBJECT</ChecksumType>
        <StorageClass>STANDARD</StorageClass>
    </Contents>
EOF
    ];

    /** @var string */
    private string $tempDir;

    protected function setUp(): void
    {
        $this->tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 's3-transfer-manager-resume-test/';
        if (!is_dir($this->tempDir)) {
            mkdir($this->tempDir, 0777, true);
        }

        set_error_handler(function ($errno, $errstr) {
            // Ignore trigger_error logging
        });
    }

    protected function tearDown(): void
    {
        TestsUtility::cleanUpDir($this->tempDir);
        restore_error_handler();
    }

    /**
     * @return void
     */
    public function testDefaultConfigIsSet(): void
    {
        $manager = new S3TransferManager(null, [
            'default_region' => 'us-east-1',
        ]);
        $this->assertArrayHasKey(
            'target_part_size_bytes',
            $manager->getConfig()->toArray()
        );
        $this->assertArrayHasKey(
            'multipart_upload_threshold_bytes',
            $manager->getConfig()->toArray()
        );
        $this->assertArrayHasKey(
            'request_checksum_calculation',
            $manager->getConfig()->toArray()
        );
        $this->assertArrayHasKey(
            'response_checksum_validation',
            $manager->getConfig()->toArray()
        );
        $this->assertArrayHasKey(
            'multipart_download_type',
            $manager->getConfig()->toArray()
        );
        $this->assertArrayHasKey(
            'concurrency',
            $manager->getConfig()->toArray()
        );
        $this->assertArrayHasKey(
            'track_progress',
            $manager->getConfig()->toArray()
        );
        $this->assertArrayHasKey(
            'default_region',
            $manager->getConfig()->toArray()
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
                'request_checksum_calculation' => 'when_required',
                'response_checksum_validation' => 'when_required',
                'checksum_algorithm' => 'sha256',
                'multipart_download_type' => 'partGet',
                'concurrency' => 20,
                'track_progress' => true,
                'default_region' => 'us-west-1',
            ]
        );
        $config = $manager->getConfig()->toArray();
        $this->assertEquals(1024, $config['target_part_size_bytes']);
        $this->assertEquals(1024, $config['multipart_upload_threshold_bytes']);
        $this->assertEquals('when_required', $config['request_checksum_calculation']);
        $this->assertEquals('when_required', $config['response_checksum_validation']);
        $this->assertEquals('partGet', $config['multipart_download_type']);
        $this->assertEquals(20, $config['concurrency']);
        $this->assertTrue($config['track_progress']);
        $this->assertEquals('us-west-1', $config['default_region']);
    }

    /**
     * @return void
     */
    public function testUploadExpectsAReadableSource(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Please provide a valid readable file path or a valid stream as source.");
        $manager = new S3TransferManager(null, [
            'default_region' => 'us-east-1',
        ]);
        $manager->upload(
            new UploadRequest(
                "noreadablefile",
                []
            ),
        )->wait();
    }

    /**
     * @dataProvider uploadBucketAndKeyProvider
     *
     * @param array $bucketKeyArgs
     * @param string $missingProperty
     *
     * @return void
     */
    public function testUploadFailsWhenBucketAndKeyAreNotProvided(
        array  $bucketKeyArgs,
        string $missingProperty
    ): void
    {
        $manager = new S3TransferManager(null, [
            'default_region' => 'us-east-1',
        ]);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The `$missingProperty` parameter must be provided as part of the request arguments.");
        $manager->upload(
            new UploadRequest(
                Utils::streamFor(),
                $bucketKeyArgs
            )
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
        $manager = new S3TransferManager(null, [
            'default_region' => 'us-east-1',
        ]);
        $manager->upload(
            new UploadRequest(
                Utils::streamFor(),
                [
                    'Bucket' => 'Bucket',
                    'Key' => 'Key',
                ],
                [
                    'multipart_upload_threshold_bytes' => MultipartUploader::PART_MIN_SIZE - 1
                ]
            )
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
        $transferListener = $this->createMock(AbstractTransferListener::class);
        $expectedPartCount = 2;
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');
        $manager->upload(
            new UploadRequest(
                Utils::streamFor(
                    str_repeat("#", MultipartUploader::PART_MIN_SIZE * $expectedPartCount)
                ),
                [
                    'Bucket' => 'Bucket',
                    'Key' => 'Key',
                ],
                [
                    'target_part_size_bytes' =>  MultipartUploader::PART_MIN_SIZE,
                    'multipart_upload_threshold_bytes' => MultipartUploader::PART_MIN_SIZE,
                ],
                [
                    $transferListener,
                ]
            )
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
        $transferListener = $this->createMock(AbstractTransferListener::class);
        $transferListener->expects($this->once())
            ->method('bytesTransferred');
        $manager->upload(
            new UploadRequest(
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
            )
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
        $transferListener = $this->createMock(AbstractTransferListener::class);
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');
        $manager->upload(
            new UploadRequest(
                Utils::streamFor(
                    str_repeat("#", $manager->getConfig()->toArray()['multipart_upload_threshold_bytes'])
                ),
                [
                    'Bucket' => 'Bucket',
                    'Key' => 'Key',
                ],
                [
                    'target_part_size_bytes' =>  intval(
                        $manager->getConfig()->toArray()['multipart_upload_threshold_bytes'] / $expectedPartCount
                    ),
                ],
                [
                    $transferListener,
                ]
            )
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
        $transferListener = $this->createMock(AbstractTransferListener::class);
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');
        $expectedIncrementalPartSize = $expectedPartSize;
        $transferListener->method('bytesTransferred')
            -> willReturnCallback(function ($context) use ($expectedPartSize, &$expectedIncrementalPartSize) {
                /** @var TransferProgressSnapshot $snapshot */
                $snapshot = $context[AbstractTransferListener::PROGRESS_SNAPSHOT_KEY];
                $this->assertEquals($expectedIncrementalPartSize, $snapshot->getTransferredBytes());
                $expectedIncrementalPartSize += $expectedPartSize;
            });
        $manager->upload(
            new UploadRequest(
                Utils::streamFor(
                    str_repeat("#", $expectedPartSize * $expectedPartCount)
                ),
                [
                    'Bucket' => 'Bucket',
                    'Key' => 'Key',
                ],
                [
                    'multipart_upload_threshold_bytes' => $mupThreshold,
                    'target_part_size_bytes' => $expectedPartSize,
                ],
                [
                    $transferListener,
                ]
            )
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
                'multipart_upload_threshold_bytes' => 1024 * 1024 * 7,
                'expected_part_count' => 3,
                'expected_part_size' => 1024 * 1024 * 7,
                'is_multipart_upload' => true,
            ],
            'mup_threshold_single_upload' => [
                'multipart_upload_threshold_bytes' => 1024 * 1024 * 7,
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
        $transferListener = $this->createMock(AbstractTransferListener::class);
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');
        $manager->upload(
            new UploadRequest(
                Utils::streamFor(
                    str_repeat("#", $manager->getConfig()->toArray()['target_part_size_bytes'] * $expectedPartCount)
                ),
                [
                    'Bucket' => 'Bucket',
                    'Key' => 'Key',
                ],
                [
                    'multipart_upload_threshold_bytes' => $manager->getConfig()->toArray()['target_part_size_bytes'],
                ],
                [
                    $transferListener,
                ]
            )
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
        $transferListener = $this->getMockBuilder(AbstractTransferListener::class)
        ->onlyMethods(['bytesTransferred'])
        ->getMock();
        $expectedIncrementalPartSize = $expectedPartSize;
        $transferListener->method('bytesTransferred')
            ->willReturnCallback(function ($context) use (
                $expectedPartSize,
                &$expectedIncrementalPartSize
            ) {
                /** @var TransferProgressSnapshot $snapshot */
                $snapshot = $context[AbstractTransferListener::PROGRESS_SNAPSHOT_KEY];
                $this->assertEquals($expectedIncrementalPartSize, $snapshot->getTransferredBytes());
                $expectedIncrementalPartSize += $expectedPartSize;

                return true;
            });
        $transferListener->expects($this->exactly($expectedPartCount))
            ->method('bytesTransferred');

        $manager->upload(
            new UploadRequest(
                Utils::streamFor(
                    str_repeat("#", $expectedPartSize * $expectedPartCount)
                ),
                [
                    'Bucket' => 'Bucket',
                    'Key' => 'Key',
                ],
                [
                    'target_part_size_bytes' => $expectedPartSize,
                    'multipart_upload_threshold_bytes' => $expectedPartSize,
                ],
                [
                    $transferListener,
                ]
            )
        )->wait();
    }

    /**
     * @return void
     */
    public function testUploadUsesDefaultChecksumAlgorithm(): void
    {
        $manager = new S3TransferManager(null, [
            'default_region' => 'us-east-1',
        ]);
        $this->testUploadResolvedChecksum(
            null, // No checksum provided
            MultipartUploader::DEFAULT_CHECKSUM_CALCULATION_ALGORITHM,
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
            $checksumAlgorithm,
            $checksumAlgorithm
        );
    }

    /**
     * @return array[]
     */
    public function uploadUsesCustomChecksumAlgorithmProvider(): array
    {
        return [
            'checksum_crc32c' => [
                'checksum_algorithm' => 'crc32c',
            ],
            'checksum_crc32' => [
                'checksum_algorithm' => 'crc32',
            ]
        ];
    }

    /**
     * @param string|null $checksumAlgorithm
     * @param string $expectedChecksum
     *
     * @return void
     */
    private function testUploadResolvedChecksum(
        ?string $checksumAlgorithm,
        string $expectedChecksum
    ): void {
        $client = $this->getS3ClientMock([
            'getCommand' => function (
                string $commandName,
                array $args
            ) use (
                $expectedChecksum
            ) {
                if ($commandName !== 'CompleteMultipartUpload') {
                    $this->assertEquals(
                        strtoupper($expectedChecksum),
                        strtoupper($args['ChecksumAlgorithm'])
                    );
                } else {
                    $this->assertTrue(true);
                }

                return new Command($commandName, $args);
            },
            'executeAsync' => function () {
                return Create::promiseFor(new Result([]));
            }
        ]);
        $putObjectRequestArgs = [
            'Bucket' => 'Bucket',
            'Key' => 'Key',
        ];
        if ($checksumAlgorithm !== null) {
            $putObjectRequestArgs['ChecksumAlgorithm'] = $checksumAlgorithm;
        }

        $manager = new S3TransferManager(
            $client,
        );
        $manager->upload(
            new UploadRequest(
                Utils::streamFor(),
                $putObjectRequestArgs,
            )
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

       try {
           $manager = new S3TransferManager(
               $this->getS3ClientMock(),
           );
           $manager->uploadDirectory(
               new UploadDirectoryRequest(
                   $directory,
                   "Bucket",
               )
           )->wait();
       } finally {
           // Clean up resources
           if ($isDirectoryValid && is_dir($directory)) {
               TestsUtility::cleanUpDir($directory);
           }
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

        $invalidDirectory = sys_get_temp_dir() . "/invalid-directory-test";
        if (is_dir($invalidDirectory)) {
            rmdir($invalidDirectory);
        }

        return [
            'valid_directory' => [
                'directory' => $validDirectory,
                'is_valid_directory' => true,
            ],
            'invalid_directory' => [
                'directory' => $invalidDirectory,
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
            'The provided config `filter` must be callable'
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'filter' => 'invalid_filter',
                    ]
                )
            )->wait();
        } finally {
            TestsUtility::cleanUpDir($directory);
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'filter' => function (string $objectKey) {
                            return str_ends_with($objectKey, "-valid.txt");
                        },
                        'upload_object_request_modifier' => function ($requestArgs) use (&$calledTimes) {
                            $this->assertStringContainsString(
                                'valid.txt',
                                $requestArgs["Key"]
                            );
                            $calledTimes++;
                        }
                    ]
                )
            )->wait();
            $this->assertEquals($validFilesCount, $calledTimes);
        } finally {
            TestsUtility::cleanUpDir($directory);
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'recursive' => true,
                    ]
                )
            )->wait();
            foreach ($objectKeys as $key => $validated) {
                $this->assertTrue($validated);
            }
        } finally {
            TestsUtility::cleanUpDir($directory);
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'recursive' => false,
                    ]
                )
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
            TestsUtility::cleanUpDir($directory);
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'recursive' => true,
                        'follow_symbolic_links' => false,
                    ]
                )
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'recursive' => true,
                        'follow_symbolic_links' => true,
                    ]
                )
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
    public function testUploadDirectoryFailsOnCircularSymbolicLinkTraversal() {
        $parentDirectory = sys_get_temp_dir() . "/upload-directory-test";
        $linkToParent = $parentDirectory . "/link_to_parent";
        if (is_dir($parentDirectory)) {
            TestsUtility::cleanUpDir($parentDirectory);
        }

        mkdir($parentDirectory, 0777, true);
        symlink($parentDirectory, $linkToParent);
        $operationCompleted = false;
        try {
            $s3Client = new S3Client([
                'region' => 'us-west-2',
            ]);
            $s3TransferManager = new S3TransferManager(
                $s3Client,
            );
            $s3TransferManager->uploadDirectory(
                new UploadDirectoryRequest(
                    $parentDirectory,
                    "Bucket",
                    [],
                    [
                        'recursive' => true,
                        'follow_symbolic_links' => true
                    ]
                )
            )->wait();
            $operationCompleted = true;
            $this->fail(
                "Upload directory should have been failed!"
            );
        } catch (RuntimeException $exception) {
            if (!$operationCompleted) {
                $this->assertStringContainsString(
                    "A circular symbolic link traversal has been detected at",
                    $exception->getMessage()
                );
            }
        } finally {
            unlink($linkToParent);
            rmdir($parentDirectory);
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        's3_prefix' => $s3Prefix
                    ]
                )
            )->wait();

            foreach ($objectKeys as $key => $validated) {
                $this->assertTrue($validated, "Key {$key} should have been validated");
            }
        } finally {
            TestsUtility::cleanUpDir($directory);
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        's3_prefix' => $s3Prefix,
                        's3_delimiter' => $s3Delimiter,
                    ]
                )
            )->wait();

            foreach ($objectKeys as $key => $validated) {
                $this->assertTrue($validated, "Key {$key} should have been validated");
            }
        } finally {
            TestsUtility::cleanUpDir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryFailsOnInvalidPutObjectRequestCallback(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The provided config `upload_object_request_modifier` must be callable.");
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'upload_object_request_modifier' => false,
                    ]
                )
            )->wait();
        } finally {
            TestsUtility::cleanUpDir($directory);
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'upload_object_request_modifier' => function (
                            &$requestArgs
                        ) use (&$called) {
                            $requestArgs["FooParameter"] = "Test";
                            $called++;
                        },
                    ]
                )
            )->wait();
            $this->assertEquals(count($files), $called);
        } finally {
            TestsUtility::cleanUpDir($directory);
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'failure_policy' => function (
                            array $requestArgs,
                            array $uploadDirectoryRequestArgs,
                            \Throwable $reason,
                            UploadDirectoryResult $uploadDirectoryResponse
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
                )
            )->wait();
            $this->assertTrue($called);
        } finally {
            TestsUtility::cleanUpDir($directory);
        }
    }

    /**
     * @return void
     */
    public function testUploadDirectoryFailsOnInvalidFailurePolicy(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The provided config `failure_policy` must be callable.");
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [
                        'failure_policy' => false,
                    ]
                )
            )->wait();
        } finally {
            TestsUtility::cleanUpDir($directory);
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
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    ['s3_delimiter' => $s3Delimiter]
                )
            )->wait();
        } finally {
            TestsUtility::cleanUpDir($directory);
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
            $transferListener = $this->getMockBuilder(AbstractTransferListener::class)
                ->disableOriginalConstructor()
                ->getMock();
            $transferListener->expects($this->exactly(count($files)))
                ->method('transferInitiated');
            $transferListener->expects($this->exactly(count($files)))
                ->method('transferComplete');
            $transferListener->method('bytesTransferred')
                ->willReturnCallback(function(array $context) use (&$objectKeys) {
                    /** @var TransferProgressSnapshot $snapshot */
                    $snapshot = $context[AbstractTransferListener::PROGRESS_SNAPSHOT_KEY];
                    $objectKeys[$snapshot->getIdentifier()] = true;

                    return true;
                });
            $manager->uploadDirectory(
                new UploadDirectoryRequest(
                    $directory,
                    "Bucket",
                    [],
                    [],
                    [
                        $transferListener
                    ]
                )
            )->wait();
            foreach ($objectKeys as $key => $validated) {
                $this->assertTrue(
                    $validated,
                    "The object key `$key` should have been validated."
                );
            }
        } finally {
            TestsUtility::cleanUpDir($directory);
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
            new DownloadRequest(
                $invalidS3Uri
            )
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
            new DownloadRequest($sourceAsArray)
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
                'expected_exception' => "`Key` is required but not provided"
            ],
            'missing_bucket' => [
                'source' => [
                    'Key' => 'key',
                ],
                'expected_exception' => "`Bucket` is required but not provided"
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
                    'PartsCount' => 1,
                    'ContentLength' => random_int(0, 100),
                    'ContentRange' => 'bytes 0-1/1',
                    '@metadata' => []
                ]));
            },
        ]);
        $manager = new S3TransferManager(
            $client
        );
        $manager->download(
            new DownloadRequest($sourceAsArray)
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
                    'PartsCount' => 1,
                    'ContentLength' => random_int(0, 100),
                    '@metadata' => []
                ]));
            },
        ]);
        $manager = new S3TransferManager(
            $client
        );
        $manager->download(
            new DownloadRequest(
                $sourceAsS3Uri
            ),
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
                        'ENABLED',
                        $command['ChecksumMode'],
                    );
                } else {
                    $this->assertArrayNotHasKey('ChecksumMode', $command);
                }

                if ($command->getName() === AbstractMultipartDownloader::GET_OBJECT_COMMAND) {
                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(),
                        'PartsCount' => 1,
                        'ContentLength' => random_int(0, 100),
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
            new DownloadRequest(
                "s3://bucket/key",
                $downloadArgs,
                $downloadConfig
            )
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
                'expected_checksum_mode' => true,
            ],
            'checksum_mode_enabled_by_transfer_manager_config' => [
                'transfer_manager_config' => [
                    'response_checksum_validation' => 'when_supported'
                ],
                'download_config' => [],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => true,
            ],
            'checksum_mode_disabled_by_transfer_manager_config' => [
                'transfer_manager_config' => [
                    'response_checksum_validation' => 'when_required'
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
                    'response_checksum_validation' => 'when_supported'
                ],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => true,
            ],
            'checksum_mode_disabled_by_download_config' => [
                'transfer_manager_config' => [],
                'download_config' => [
                    'response_checksum_validation' => 'when_required'
                ],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => false,
            ],
            'checksum_mode_download_config_overrides_transfer_manager_config' => [
                'transfer_manager_config' => [
                    'response_checksum_validation' => 'when_required'
                ],
                'download_config' => [
                    'response_checksum_validation' => 'when_supported'
                ],
                'download_args' => [
                    'PartNumber' => 1
                ],
                'expected_checksum_mode' => true,
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
                    'PartsCount' => 1,
                    'ContentLength' => random_int(0, 100),
                    '@metadata' => []
                ]));
            }
        ]);
        $manager = new S3TransferManager(
            $client,
        );
        $manager->download(
            new DownloadRequest(
                "s3://bucket/key",
                [],
                ['multipart_download_type' => $multipartDownloadType]
            )
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
                'multipart_download_type' => AbstractMultipartDownloader::PART_GET_MULTIPART_DOWNLOADER,
                'expected_parameter' => 'PartNumber'
            ],
            'range_get_multipart_download' => [
                'multipart_download_type' => AbstractMultipartDownloader::RANGED_GET_MULTIPART_DOWNLOADER,
                'expected_parameter' => 'Range'
            ]
        ];
    }

    /**
     * @param int $minimumPartSize
     * @param int $objectSize
     * @param array $expectedRangeSizes
     *
     * @return void
     *
     * @dataProvider rangeGetMultipartDownloadMinimumPartSizeProvider
     *
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
                    'ContentRange' => "0-$objectSize/$objectSize",
                    'ETag' => 'TestEtag',
                    'ContentLength' => random_int(0, 100),
                    '@metadata' => []
                ]));
            }
        ]);
        $manager = new S3TransferManager(
            $client,
        );
        $manager->download(
            new DownloadRequest(
                "s3://bucket/key",
                [],
                [
                    'multipart_download_type' => AbstractMultipartDownloader::RANGED_GET_MULTIPART_DOWNLOADER,
                    'target_part_size_bytes' => $minimumPartSize,
                ]
            )
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
    public function testDownloadDirectoryCreatesDestinationDirectory(): void
    {
        $destinationDirectory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid();
        if (is_dir($destinationDirectory)) {
            rmdir($destinationDirectory);
        }

        try {
            $client = $this->getS3ClientMock([
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
                },
                'executeAsync' => function (CommandInterface $command) {
                   return Create::promiseFor(new Result([]));
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                new DownloadDirectoryRequest(
                    "Bucket",
                    $destinationDirectory
                )
            )->wait();
            $this->assertFileExists($destinationDirectory);
        } finally {
            TestsUtility::cleanUpDir($destinationDirectory);
        }
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
                new DownloadDirectoryRequest(
                    "Bucket",
                    $destinationDirectory,
                    [],
                    $config
                )
            )->wait();

            $this->assertTrue($called);
            $this->assertTrue($listObjectsCalled);
        } finally {
            TestsUtility::cleanUpDir($destinationDirectory);
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
            's3_prefix_from_list_objects_v2_args' => [
                'config' => [
                    'list_objects_v2_args' => [
                        'Prefix' => 'PrefixFromArgs'
                    ],
                ],
                'expected_s3_prefix' => 'PrefixFromArgs'
            ],
            's3_prefix_from_config_is_ignored_when_present_in_list_object_args' => [
                'config' => [
                    's3_prefix' => 'TestPrefix',
                    'list_objects_v2_args' => [
                        'Prefix' => 'PrefixFromArgs'
                    ],
                ],
                'expected_s3_prefix' => 'PrefixFromArgs'
            ],
        ];
    }

    /**
     * @return void
     */
    public function testDownloadDirectoryFailsOnInvalidFilter(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The provided config `filter` must be callable.");
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
                new DownloadDirectoryRequest(
                    "Bucket",
                    $destinationDirectory,
                    [],
                    ['filter' => false]
                )
            )->wait();
            $this->assertTrue($called);
        } finally {
            TestsUtility::cleanUpDir($destinationDirectory);
        }
    }

    /**
     * @return void
     */
    public function testDownloadDirectoryFailsOnInvalidFailurePolicy(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The provided config `failure_policy` must be callable.");
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
                new DownloadDirectoryRequest(
                    "Bucket",
                    $destinationDirectory,
                    [],
                    ['failure_policy' => false]
                )
            )->wait();
            $this->assertTrue($called);
        } finally {
            TestsUtility::cleanUpDir($destinationDirectory);
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
                        'PartsCount' => 1,
                        'ContentLength' => random_int(1, 100),
                        '@metadata' => []
                    ]));
                }
            ]);
            $manager = new S3TransferManager(
                $client,
            );
            $manager->downloadDirectory(
                new DownloadDirectoryRequest(
                    "Bucket",
                    $destinationDirectory,
                    [],
                    ['failure_policy' => function (
                        array $requestArgs,
                        array $uploadDirectoryRequestArgs,
                        \Throwable $reason,
                        DownloadDirectoryResult $downloadDirectoryResponse
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
                )
            )->wait();
            $this->assertTrue($called);
        } finally {
            TestsUtility::cleanUpDir($destinationDirectory);
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
                        'PartsCount' => 1,
                        'ContentLength' => random_int(1, 100),
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
                new DownloadDirectoryRequest(
                    "Bucket",
                    $destinationDirectory,
                    [],
                    ['filter' => $filter]
                )
            )->wait();

            $this->assertTrue($called);
            foreach ($downloadObjectKeys as $key => $validated) {
                $this->assertTrue(
                    $validated,
                    "The key `$key` should have been validated"
                );
            }
        } finally {
            TestsUtility::cleanUpDir($destinationDirectory);
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
            "The provided config `download_object_request_modifier` must be callable."
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
                new DownloadDirectoryRequest(
                    "Bucket",
                    $destinationDirectory,
                    [],
                    ['download_object_request_modifier' => false]
                )
            )->wait();
        } finally {
            TestsUtility::cleanUpDir($destinationDirectory);
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
                        'PartsCount' => 1,
                        'ContentLength' => random_int(1, 100),
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
                new DownloadDirectoryRequest(
                    "Bucket",
                    $destinationDirectory,
                    [
                        'CustomParameter' => 'CustomParameterValue'
                    ],
                    ['download_object_request_modifier' => $getObjectRequestCallback]
                )
            )->wait();
            $this->assertTrue($called);
        } finally {
            TestsUtility::cleanUpDir($destinationDirectory);
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
                        'PartsCount' => 1,
                        'ContentLength' => random_int(1, 100),
                        'ContentRange' => 'bytes 0-1/1',
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
                new DownloadDirectoryRequest(
                    "Bucket",
                    $destinationDirectory,
                )
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
            TestsUtility::cleanUpDir($destinationDirectory);
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
     * @param string|null $prefix
     * @param array $objects
     * @param array $expectedOutput
     *
     * @return void
     * @dataProvider resolvesOutsideTargetDirectoryProvider
     */
    public function testResolvesOutsideTargetDirectory(
        ?string $prefix,
        array $objects,
        array $expectedOutput
    ): void
    {
        if ($expectedOutput['success'] === false) {
            $this->expectException(S3TransferException::class);
            $this->expectExceptionMessageMatches(
                '/Cannot download key [^\s]+ its relative path'
                .' resolves outside the parent directory\./'
            );
        }

        $bucket = "test-bucket";
        $directory = "test-directory";
        try {
            $fullDirectoryPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $directory;
            if (is_dir($fullDirectoryPath)) {
                TestsUtility::cleanUpDir($fullDirectoryPath);
            }
            mkdir($fullDirectoryPath, 0777, true);
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

                    $body = Utils::streamFor(
                        "Test file " . $command['Key']
                    );
                    return Create::promiseFor(new Result([
                        'Body' => $body,
                        'PartsCount' => 1,
                        'ContentLength' => $body->getSize(),
                        'ContentRange' => 'bytes 0-' . $body->getSize() . "/" . $body->getSize(),
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
                new DownloadDirectoryRequest(
                    $bucket,
                    $fullDirectoryPath,
                    [],
                    [
                        's3_prefix' => $prefix,
                    ]
                )
            )->wait();
            $this->assertTrue($called);
            // Validate the expected file output
            if ($expectedOutput['success']) {
                $this->assertFileExists(
                    $fullDirectoryPath
                    . DIRECTORY_SEPARATOR
                    . $expectedOutput['filename']
                );
            }
        } finally {
            TestsUtility::cleanUpDir($directory);
        }
    }

    /**
     * @return array
     */
    public function resolvesOutsideTargetDirectoryProvider(): array
    {
        return [
            'download_directory_1_linux' => [
                'prefix' => null,
                'objects' => [
                    [
                        'Key' => '2023/Jan/1.png'
                    ],
                ],
                'expected_output' => [
                    'success' => true,
                    'filename' => '2023/Jan/1.png',
                ]
            ],
            'download_directory_2' => [
                'prefix' => '2023/Jan/',
                'objects' => [
                    [
                        'Key' => '2023/Jan/1.png'
                    ]
                ],
                'expected_output' => [
                    'success' => true,
                    'filename' => '1.png',
                ]
            ],
            'download_directory_3' => [
                'prefix' => '2023/Jan',
                'objects' => [
                    [
                        'Key' => '2023/Jan/1.png'
                    ]
                ],
                'expected_output' => [
                    'success' => true,
                    'filename' => '1.png',
                ]
            ],
            'download_directory_6' => [
                'prefix' => '2023',
                'objects' => [
                    [
                        'Key' => '2023/Jan/1.png'
                    ]
                ],
                'expected_output' => [
                    'success' => true,
                    'filename' => 'Jan/1.png',
                ]
            ],
            'download_directory_7_fails' => [
                'prefix' => null,
                'objects' => [
                    [
                        'Key' => '../2023/Jan/1.png'
                    ]
                ],
                'expected_output' => [
                    'success' => false,
                ]
            ],
            'download_directory_9_fails' => [
                'prefix' => null,
                'objects' => [
                    [
                        'Key' => 'foo/../2023/../../Jan/1.png'
                    ]
                ],
                'expected_output' => [
                    'success' => false,
                ]
            ],
            'download_directory_10_fails' => [
                'prefix' => null,
                'objects' => [
                    [
                        'Key' => '../test-2/object.dat'
                    ]
                ],
                'expected_output' => [
                    'success' => false,
                ]
            ],
        ];
    }

    /**
     * @param string $testId
     * @param array $config
     * @param array $requestArgs
     * @param array $expectations
     * @param array $outcomes
     *
     * @return void
     * @dataProvider modeledDownloadCasesProvider
     *
     */
    public function testModeledCasesForDownload(
        string $testId,
        array $config,
        array $requestArgs,
        array $expectations,
        array $outcomes
    ): void
    {
        $testsToSkip = [
            "Test download with part GET - validation failure when part count mismatch" => true,
        ];
        if ($testsToSkip[$testId] ?? false) {
            $this->markTestSkipped(
                "The test `" . $testId . "` is not supported yet."
            );
        }

        // Outcomes has only one item for now
        $outcome = $outcomes[0];
        // Standardize config
        $this->parseConfigFromCamelCaseToSnakeCase($config);
        // Standardize request
        $this->parseRequestArgsFromCamelCaseToPascalCase($requestArgs);

        if (isset($config['multipart_download_type']) && $config['multipart_download_type'] === 'RANGE') {
            $config['multipart_download_type'] = 'RANGED';
        }

        // Operational values
        $totalBytesReceived = 0;
        $totalPartsReceived = 0;
        // Mock client to validate expected requests
        $s3Client = $this->getS3ClientWithSequentialResponses(
            array_map(function ($expectation) {
                $operation = $expectation['request']['operation'];

                return array_merge(
                    $expectation['response'],
                    ['operation' => $operation]
                );
            }, $expectations),
            function (
                string $operation,
                array|string|null $body,
                ?array &$headers
            ): StreamInterface
            {
                $fixedBody = Utils::streamFor(
                    str_repeat(
                        '*',
                        $headers['Content-Length']
                    )
                );

                if (isset($headers['ChecksumAlgorithm'])) {
                    // Checksum injection when expected to succeed at checksum validation
                    // This is needed because the checksum in the test is wrong
                    $algorithm = strtolower($headers['ChecksumAlgorithm']);
                    $checksumValue = ApplyChecksumMiddleware::getEncodedValue(
                        $algorithm,
                        $fixedBody
                    );
                    $headers['Checksum'.strtoupper($algorithm)] = $checksumValue;
                    $fixedBody->rewind();
                }

                // If body was provided then we override the fixed one
                if ($body !== null) {
                    $fixedBody = Utils::streamFor($body);
                }

                return $fixedBody;
            },
        );
        $s3TransferManager = new S3TransferManager(
            $s3Client,
        );
        try {
            $response = $s3TransferManager->download(
                new DownloadRequest(
                    [
                        'Bucket' => 'test-bucket',
                        'Key' => 'test-key',
                    ],
                    downloadRequestArgs: $requestArgs,
                    config: $config,
                    listeners: [
                        new class($totalBytesReceived, $totalPartsReceived)
                            extends AbstractTransferListener {
                            private int $totalBytesReceived;
                            private int $totalPartsReceived;

                            public function __construct(
                                int &$totalBytesReceived,
                                int &$totalPartsReceived
                            )
                            {
                                $this->totalBytesReceived =& $totalBytesReceived;
                                $this->totalPartsReceived =& $totalPartsReceived;
                            }

                            /**
                             * @inheritDoc
                             */
                            public function bytesTransferred(array $context): bool {
                                $snapshot = $context[
                                AbstractTransferListener::PROGRESS_SNAPSHOT_KEY
                                ];
                                $this->totalBytesReceived = $snapshot->getTransferredBytes();
                                $this->totalPartsReceived++;

                                return true;
                            }
                        }
                    ]
                )
            )->wait();
            $this->assertEquals(
                "success",
                $outcome['result'],
                "Operation should have failed at this point"
            );
            $this->assertInstanceOf(
                DownloadResult::class,
                $response,
            );
            if (isset($outcome['totalBytes'])) {
                $this->assertEquals(
                    $outcome['totalBytes'],
                    $totalBytesReceived
                );
            }
            if (isset($outcome['totalParts'])) {
                $this->assertEquals(
                    $outcome['totalParts'],
                    $totalPartsReceived
                );
            }
            if (isset($outcome['checksumValidated'])) {
                $this->assertArrayHasKey(
                    'ChecksumValidated',
                    $response
                );
                $this->assertEquals(
                    $outcome['checksumAlgorithm'],
                    $response['ChecksumValidated']
                );
            }
        } catch (S3TransferException | S3Exception $e) {
            $this->assertEquals(
                "error",
                $outcome['result'],
                "Operation did not expect a failure"
            );

            $this->assertStringContainsString(
                $outcome['errorMessage'],
                $e->getMessage()
            );
        }
    }

    /**
     * @param string $testId
     * @param array $config
     * @param array $requestArgs
     * @param array $expectations
     * @param array $outcomes
     *
     * @return void
     * @dataProvider modeledUploadCasesProvider
     *
     */
    public function testModeledCasesForUpload(
        string $testId,
        array $config,
        array $requestArgs,
        array $expectations,
        array $outcomes
    ): void
    {
        $testsToSkip = [
            "Test upload with multipart upload - validation failure when part size mismatch" => true,
            "Test upload with multipart upload - validation failure when part count mismatch" => true
        ];
        if ($testsToSkip[$testId] ?? false) {
            $this->markTestSkipped(
                "The test `" . $testId . "` is not supported yet."
            );
        }

        // Outcomes has only one item for now
        $outcome = $outcomes[0];
        // Standardize config
        $this->parseConfigFromCamelCaseToSnakeCase($config);
        // Standardize request
        $this->parseRequestArgsFromCamelCaseToPascalCase($requestArgs);

        // Operational values
        $contentLength = $requestArgs['ContentLength'];
        $totalBytesReceived = 0;
        $totalPartsReceived = 0;
        // Mock client to validate expected requests
        $s3Client = $this->getS3ClientWithSequentialResponses(
            array_map(function ($expectation) {
                $operation = $expectation['request']['operation'];

                return array_merge(
                    $expectation['response'],
                    ['operation' => $operation]
                );
            }, $expectations),
            function (string $operation, ?array $body): StreamInterface {
                $template = self::$s3BodyTemplates[$operation] ?? "";
                if ($body === null) {
                    $body = [];
                }

                foreach ($body as $key => $value) {
                    $template = str_replace("{{$key}}", $value, $template);
                }

                return Utils::streamFor(
                    $template,
                );
            }
        );

        $s3TransferManager = new S3TransferManager(
            $s3Client,
        );
        try {
            $response = $s3TransferManager->upload(
                new UploadRequest(
                    Utils::streamFor(
                        str_repeat('#', $contentLength),
                    ),
                    uploadRequestArgs: $requestArgs,
                    config: array_merge(
                        $config,
                        ['concurrency' => 1],
                    ),
                    listeners: [
                        new class($totalBytesReceived, $totalPartsReceived)
                            extends AbstractTransferListener {
                            private int $totalBytesReceived;
                            private int $totalPartsReceived;

                            public function __construct(
                                int &$totalBytesReceived,
                                int &$totalPartsReceived
                            )
                            {
                                $this->totalBytesReceived =& $totalBytesReceived;
                                $this->totalPartsReceived =& $totalPartsReceived;
                            }

                            /**
                             * @inheritDoc
                             */
                            public function bytesTransferred(array $context): bool {
                                $snapshot = $context[
                                AbstractTransferListener::PROGRESS_SNAPSHOT_KEY
                                ];
                                $this->totalBytesReceived = $snapshot->getTransferredBytes();
                                $this->totalPartsReceived++;

                                return true;
                            }
                        }
                    ]
                )
            )->wait();
            $this->assertEquals(
                "success",
                $outcome['result'],
                "Operation should have failed at this point"
            );
            $this->assertInstanceOf(
                UploadResult::class,
                $response,
            );
            if (isset($outcome['totalBytes'])) {
                $this->assertEquals(
                    $outcome['totalBytes'],
                    $totalBytesReceived
                );
            }
            if (isset($outcome['totalParts'])) {
                $this->assertEquals(
                    $outcome['totalParts'],
                    $totalPartsReceived
                );
            }
        } catch (S3TransferException | S3Exception $e) {
            $this->assertEquals(
                "error",
                $outcome['result'],
                "Operation did not expect a failure"
            );

            $this->assertStringContainsString(
                $outcome['errorMessage'],
                $e->getMessage()
            );
        }
    }

    /**
     * @param string $testId
     * @param array $config
     * @param array $uploadDirectoryRequestArgs
     * @param array|null $sourceStructure
     * @param array $expectations
     * @param array $outcomes
     *
     * @return void
     * @dataProvider modeledUploadDirectoryCasesProvider
     */
    public function testModeledCasesForUploadDirectory(
        string $testId,
        array $config,
        array $uploadDirectoryRequestArgs,
        ?array $sourceStructure,
        array $expectations,
        array $outcomes
    ) {
        $testsToSkip = [
            "Test upload directory - S3 directory bucket" => true,
        ];
        if ($testsToSkip[$testId] ?? false) {
            $this->markTestSkipped(
                "The test `" . $testId . "` is not supported yet."
            );
        }
        // Parse config and request args
        $this->parseConfigFromCamelCaseToSnakeCase($config);
        $this->parseConfigFromCamelCaseToSnakeCase($uploadDirectoryRequestArgs);
        // Extract bucket and source
        $bucket = $uploadDirectoryRequestArgs['bucket'];
        unset($uploadDirectoryRequestArgs['bucket']);
        $source = $uploadDirectoryRequestArgs['source'];
        unset($uploadDirectoryRequestArgs['source']);
        // Now lets merge what is remaining in $uploadDirectoryRequestArgs into config
        $config = array_merge(
            $config,
            $uploadDirectoryRequestArgs,
        );
        // Now let`s convert filter into its proper type
        if (isset($config['filter'])) {
            $filterExpression = $config['filter'];
            $config['filter'] = function ($file) use ($filterExpression) {
                return fnmatch($filterExpression, $file) == true;
            };
        }

        // Now let`s convert failure policy into is proper type
        if (isset($config['failure_policy'])) {
            if ($config['failure_policy'] === 'CONTINUE_ON_FAILURE') {
                $config['failure_policy'] = function () {
                    return true;
                };
            }
        }

        // Prepare source directory
        $sourceDirectory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "upload-directory-test";
        $source = $sourceDirectory . DIRECTORY_SEPARATOR . $source;
        if ($sourceStructure !== null) {
            // Create source folder first
            if (is_dir($source)) {
                TestsUtility::cleanUpDir($source);
            }

            mkdir($source, 0777, true);

            // Populate source folder with test files
            foreach ($sourceStructure as $src) {
                $sourcePath = $sourceDirectory . $src['path'];
                $sourceParent = dirname($sourcePath);
                if (!is_dir($sourceParent)) {
                    mkdir($sourceParent, 0777, true);
                }

                $remaining = $src['size'];
                $chunkLimit = 1024;
                // Populate the source
                while ($remaining > 0) {
                    $chunkSize = min($chunkLimit, $remaining);
                    file_put_contents(
                        $sourcePath,
                        str_repeat(
                            '#',
                            $chunkSize
                        ),
                        FILE_APPEND
                    );

                    $remaining -= $chunkSize;
                }
            }
        }

        // Now lets orchestrate request-response
        $s3Client = $this->getS3ClientWithSequentialResponses(
            array_map(function ($expectation) {
                $operation = $expectation['request']['operation'];

                return array_merge(
                    $expectation['response'],
                    ['operation' => $operation]
                );
            }, $expectations),
            function (string $operation, ?array $body): StreamInterface {
                $template = self::$s3BodyTemplates[$operation] ?? "";
                if ($body === null) {
                    $body = [];
                }

                foreach ($body as $key => $value) {
                    $template = str_replace("{{$key}}", $value, $template);
                }

                return Utils::streamFor(
                    $template,
                );
            }
        );
        // Get outcome
        $outcome = $outcomes[0];
        try {
            $s3TransferManager = new S3TransferManager(
                $s3Client,
            );
            $result = $s3TransferManager->uploadDirectory(
                new UploadDirectoryRequest(
                    $source,
                    $bucket,
                    [],
                    $config,
                )
            )->wait();

            if ($outcome['result'] === 'failure') {
                $this->fail(
                    "A failure was expected on this test"
                );
            }
            // Evaluate outcome
            $this->assertEquals(
                $outcome['objectsUploaded'],
                $result->getObjectsUploaded()
            );
            $this->assertEquals(
                $outcome['objectsFailed'],
                $result->getObjectsFailed()
            );
        } catch (Exception $exception) {
            if ($outcome['result'] !== 'failure') {
                $this->fail(
                    "A failure was not expected on this test but got: " . $exception->getMessage()
                );
            }
            $this->assertTrue(true);
        } finally {
            TestsUtility::cleanUpDir($sourceDirectory);
        }
    }

    /**
     * @param string $testId
     * @param array $config
     * @param array $downloadDirectoryRequestArgs
     * @param array $s3Objects
     * @param array $expectations
     * @param array $expectedFiles
     * @param array $outcomes
     *
     * @return void
     * @dataProvider modeledDownloadDirectoryCasesProvider
     *
     */
    public function testModeledCasesForDownloadDirectory(
        string $testId,
        array $config,
        array $downloadDirectoryRequestArgs,
        array $s3Objects,
        array $expectations,
        array $expectedFiles,
        array $outcomes
    ) {
        $testsToSkip = [
            "Test download directory - S3 directory bucket" => true,
        ];
        if ($testsToSkip[$testId] ?? false) {
            $this->markTestSkipped(
                "The test `" . $testId . "` is not supported yet."
            );
        }
        // Parse config and request args
        $this->parseConfigFromCamelCaseToSnakeCase($config);
        $this->parseConfigFromCamelCaseToSnakeCase($downloadDirectoryRequestArgs);
        // Extract bucket and destination
        $bucket = $downloadDirectoryRequestArgs['bucket'];
        unset($downloadDirectoryRequestArgs['bucket']);
        $destination = $downloadDirectoryRequestArgs['destination'];
        unset($downloadDirectoryRequestArgs['destination']);
        // Now lets merge what is remaining in $downloadDirectoryRequestArgs into config
        $config = array_merge(
            $config,
            $downloadDirectoryRequestArgs,
        );
        // Now let`s convert filter into its proper type
        if (isset($config['filter'])) {
            $filterExpression = $config['filter'];
            $config['filter'] = function ($file) use ($filterExpression) {
                return fnmatch($filterExpression, $file) == true;
            };
        }
        // Prepare destination directory
        $baseDirectory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "download-directory-test";
        $targetDirectory = $baseDirectory . DIRECTORY_SEPARATOR . $destination;
        if (is_dir($targetDirectory)) {
            TestsUtility::cleanUpDir($targetDirectory);
        }

        mkdir($targetDirectory, 0777, true);

        // Get prefix so it can be used in body creation for ListObjectsV2
        $prefix = $config['prefix'] ?? '';
        // Prepare the pool of responses
        $s3Client = $this->getS3ClientWithSequentialResponses(
            array_map(function ($expectation) {
                $operation = $expectation['request']['operation'];

                return array_merge(
                    $expectation['response'],
                    ['operation' => $operation]
                );
            }, $expectations),
            function (
                string $operation,
                array|string|null $body,
                ?array &$headers
            ) use ($prefix, $bucket): StreamInterface
            {
                if ($operation === 'ListObjectsV2') {
                    $listObjectsV2Template = self::$s3BodyTemplates[$operation];
                    $listObjectsV2ContentsTemplate = self::$s3BodyTemplates[
                        $operation . "::Contents"
                    ];
                    $bodyBuilder = str_replace(
                        "{{Bucket}}",
                        $bucket,
                        $listObjectsV2Template
                    );
                    $bodyBuilder = str_replace(
                        "{{Prefix}}",
                        $prefix,
                        $bodyBuilder
                    );


                    $itemBuilder = "";
                    foreach ($body as $item) {
                        $itemBuilder = $itemBuilder . "\n$listObjectsV2ContentsTemplate";
                        $itemBuilder = str_replace(
                            ['{Key}', '{Size}'],
                            [$item['key'], $item['size']],
                            $itemBuilder
                        );
                    }

                    $bodyBuilder = str_replace(
                        ['{Contents}'],
                        [$itemBuilder],
                        $bodyBuilder
                    );

                    $fixedBody = Utils::streamFor($bodyBuilder);
                    $body = null;
                } else {
                    $fixedBody = Utils::streamFor(
                        str_repeat(
                            '*',
                            $headers['Content-Length']
                        )
                    );
                    $body = null;
                }

                if (isset($headers['ChecksumAlgorithm'])) {
                    // Checksum injection when expected to succeed at checksum validation
                    // This is needed because the checksum in the test is wrong
                    $algorithm = strtolower($headers['ChecksumAlgorithm']);
                    $checksumValue = ApplyChecksumMiddleware::getEncodedValue(
                        $algorithm,
                        $fixedBody
                    );
                    $headers['Checksum'.strtoupper($algorithm)] = $checksumValue;
                    $fixedBody->rewind();
                }

                // If body was provided then we override the fixed one
                if ($body !== null) {
                    $fixedBody = Utils::streamFor($body);
                }

                return $fixedBody;
            },
        );
        $outcome = $outcomes[0];
        try {
            $s3TransferManager = new S3TransferManager(
                $s3Client,
            );
            $result = $s3TransferManager->downloadDirectory(
                new DownloadDirectoryRequest(
                    $bucket,
                    $targetDirectory,
                    [],
                    $config,
                )
            )->wait();
            if ($outcome['result'] !== 'success') {
                $this->fail(
                    "A failure was expected on this test"
                );
            }
            foreach ($expectedFiles as $expectedFile) {
                $filePath = $baseDirectory . DIRECTORY_SEPARATOR . $expectedFile['path'];
                $this->assertFileExists(
                    $filePath,
                );
                $this->assertEquals(
                    $expectedFile['size'],
                    filesize($filePath),
                );
            }
            $this->assertEquals(
                $outcome['objectsDownloaded'],
                $result->getObjectsDownloaded()
            );
            $this->assertEquals(
                $outcome['objectsFailed'],
                $result->getObjectsFailed()
            );
        } catch (Exception $exception) {
            if ($outcome['result'] === 'success') {
                $this->fail(
                    "A failure was not expected on this test and got: " . $exception->getMessage()
                );
            }
            $this->assertTrue(true);
        } finally {
            TestsUtility::cleanUpDir($targetDirectory);
        }
    }

    /**
     * @param array $responses
     * @param callable $bodyBuilder
     *  A callable to build the body of the response. It receives as
     *  parameter:
     *  - The operation that the response is for.
     *  - The body given in the expectation.
     *  - The headers given in the expectation.
     *
     * @return S3Client
     */
    private function getS3ClientWithSequentialResponses(
        array $responses,
        callable $bodyBuilder
    ): S3Client
    {
        $index = 0;
        return new S3Client([
            'region' => 'eu-west-1',
            'http_handler' => function (RequestInterface $request)
            use ($bodyBuilder, $responses, &$index) {
                $response = $responses[$index++];
                if ($response['status'] < 400) {
                    $headers = $response['headers'] ?? [];
                    $body = call_user_func_array(
                        $bodyBuilder,
                            [
                                $response['operation'],
                                $response['body']
                                ?? $response['contents']
                                ?? null,
                                &$headers
                            ]
                    );

                    $this->parseCaseHeadersToAmzHeaders($headers);

                    return new Response(
                        $response['status'],
                        $headers,
                        $body
                    );
                } else {
                    return new RejectedPromise(
                        new S3TransferException(
                            $response['errorMessage'] ?? ""
                        )
                    );
                }
            },
        ]);
    }

    /**
     * @param array $config
     *
     * @return void
     */
    private function parseConfigFromCamelCaseToSnakeCase(
        array &$config
    ): void
    {
        foreach ($config as $key => $value) {
            // Searches for lowercaseUPPERCASE occurrences
            // Then it is replaced by using group1_group2 found.
            $newKey = strtolower(
                preg_replace(
                    "/([a-z0-9])([A-Z])/",
                    "$1_$2",
                    $key
                )
            );
            unset($config[$key]);
            $config[$newKey] = $value;
        }
    }

    /**
     * @return Generator
     */
    public function modeledDownloadCasesProvider(): Generator
    {
        $downloadCases = json_decode(
            file_get_contents(
                self::DOWNLOAD_BASE_CASES
            ),
            true
        );
        foreach ($downloadCases as $case) {
            yield $case['summary'] => [
                'test_id' => $case['summary'],
                'config' => $case['config'],
                'download_request' => $case['downloadRequest'],
                'expectations' => $case['expectations'],
                'outcomes' => $case['outcomes'],
            ];
        }
    }

    /**
     * @return Generator
     */
    public function modeledUploadCasesProvider(): Generator
    {
        $downloadCases = json_decode(
            file_get_contents(
                self::UPLOAD_BASE_CASES
            ),
            true
        );
        foreach ($downloadCases as $case) {
            yield $case['summary'] => [
                'test_id' => $case['summary'],
                'config' => $case['config'],
                'upload_request' => $case['uploadRequest'],
                'expectations' => $case['expectations'],
                'outcomes' => $case['outcomes'],
            ];
        }
    }

    /**
     * @return Generator
     */
    public function modeledUploadDirectoryCasesProvider(): Generator
    {
        $downloadCases = json_decode(
            file_get_contents(
                self::UPLOAD_DIRECTORY_BASE_CASES
            ),
            true
        );
        foreach ($downloadCases as $case) {
            yield $case['summary'] => [
                'test_id' => $case['summary'],
                'config' => $case['config'],
                'upload_directory_request' => $case['uploadDirectoryRequest'],
                'source_structure' => $case['sourceStructure'] ?? null,
                'expectations' => $case['expectations'],
                'outcomes' => $case['outcomes'],
            ];
        }
    }

    /**
     * @return Generator
     */
    public function modeledDownloadDirectoryCasesProvider(): Generator
    {
        $downloadCases = json_decode(
            file_get_contents(
                self::DOWNLOAD_DIRECTORY_BASE_CASES
            ),
            true
        );
        foreach ($downloadCases as $case) {
            yield $case['summary'] => [
                'test_id' => $case['summary'],
                'config' => $case['config'],
                'download_directory_request' => $case['downloadDirectoryRequest'],
                's3_objects' => $case['s3Objects'],
                'expectations' => $case['expectations'],
                'expected_files' => $case['expectedFiles'],
                'outcomes' => $case['outcomes'],
            ];
        }
    }

    /**
     * @param array $requestArgs
     *
     * @return void
     */
    private function parseRequestArgsFromCamelCaseToPascalCase(
        array &$requestArgs
    ): void
    {
        foreach ($requestArgs as $key => $value) {
            $newKey = ucfirst($key);
            unset($requestArgs[$key]);
            $requestArgs[$newKey] = $value;
        }
    }

    /**
     * @param array $caseHeaders
     *
     * @return void
     */
    private function parseCaseHeadersToAmzHeaders(array &$caseHeaders): void
    {
        foreach ($caseHeaders as $key => $value) {
            $newKey = $key;
            switch ($key) {
                case 'PartsCount':
                    $newKey = 'x-amz-mp-parts-count';
                    break;
                case 'ChecksumAlgorithm':
                    $newKey = 'x-amz-checksum-algorithm';
                    break;
                default:
                    if (preg_match('/Checksum[A-Z]+/', $key)) {
                        $newKey = 'x-amz-checksum-' . str_replace(
                            'Checksum',
                            '',
                            $key
                        );
                    }
            }

            if ($newKey !== $key) {
                $caseHeaders[$newKey] = $value;
                unset($caseHeaders[$key]);
            }
        }
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

    /**
     * @return void
     */
    public function testResumeDownloadFailsWithInvalidResumeFile(): void
    {
        $invalidResumeFile = $this->tempDir . 'invalid.resume';
        file_put_contents($invalidResumeFile, 'invalid json content');

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $manager = new S3TransferManager($mockClient);
        $request = new ResumeDownloadRequest($invalidResumeFile);

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage(
            "Resume file `$invalidResumeFile` is not a valid resumable file."
        );
        $manager->resumeDownload($request)->wait();
    }

    /**
     * @return void
     */
    public function testResumeDownloadFailsWhenTemporaryFileNoLongerExists(): void
    {
        $destination = $this->tempDir . 'download.txt';
        $tempFile = $this->tempDir . 'temp.s3tmp.12345678';
        $resumeFile = $this->tempDir . 'test.resume';

        $resumable = new ResumableDownload(
            $resumeFile,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => 5242880],
            ['transferred_bytes' => 500, 'total_bytes' => 1000],
            ['ETag' => 'test-etag', 'ContentLength' => 1000],
            [1 => true],
            2,
            $tempFile,
            'test-etag',
            1000,
            500,
            $destination
        );
        $resumable->toFile();

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $manager = new S3TransferManager($mockClient);
        $request = new ResumeDownloadRequest($resumeFile);

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage(
            "Cannot resume download: temporary file does not exist: " . $tempFile
        );
        $manager->resumeDownload($request)->wait();
    }

    /**
     * @return void
     */
    public function testResumeUploadFailsWithInvalidResumeFile(): void
    {
        $invalidResumeFile = $this->tempDir . 'invalid.resume';
        file_put_contents($invalidResumeFile, 'invalid json content');

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $manager = new S3TransferManager($mockClient);
        $request = new ResumeUploadRequest($invalidResumeFile);

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage(
            "Resume file `$invalidResumeFile` is not a valid resumable file."
        );
        $manager->resumeUpload($request)->wait();
    }

    /**
     * @return void
     */
    public function testResumeUploadFailsWhenSourceFileNoLongerExists(): void
    {
        $sourceFile = $this->tempDir . 'upload.txt';
        $resumeFile = $this->tempDir . 'test.resume';

        $resumable = new ResumableUpload(
            $resumeFile,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => 5242880],
            ['transferred_bytes' => 500, 'total_bytes' => 1000],
            'upload-id-123',
            [1 => ['PartNumber' => 1, 'ETag' => 'etag1']],
            $sourceFile,
            1000,
            500,
            false
        );
        $resumable->toFile();

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $manager = new S3TransferManager($mockClient);
        $request = new ResumeUploadRequest($resumeFile);

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage(
            "Cannot resume upload: source file does not exist: " . $sourceFile
        );
        $manager->resumeUpload($request)->wait();
    }

    /**
     * @return void
     */
    public function testResumeUploadFailsWhenUploadIdNotFoundInS3(): void
    {
        $sourceFile = $this->tempDir . 'upload.txt';
        file_put_contents($sourceFile, str_repeat('a', 1000));
        $resumeFile = $this->tempDir . 'test.resume';
        $uploadId = 'test-upload-id-123';
        $resumable = new ResumableUpload(
            $resumeFile,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => 500],
            ['transferred_bytes' => 500, 'total_bytes' => 1000],
            $uploadId,
            [1 => ['PartNumber' => 1, 'ETag' => 'etag1']],
            $sourceFile,
            1000,
            500,
            false
        );
        $resumable->toFile();

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockClient->method('executeAsync')
            ->willReturnCallback(function ($command) {
                if ($command->getName() === 'ListMultipartUploads') {
                    return Create::promiseFor(new Result(['Uploads' => []]));
                }
                return Create::promiseFor(new Result([]));
            });

        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $manager = new S3TransferManager($mockClient);
        $request = new ResumeUploadRequest($resumeFile);

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage(
            "Cannot resume upload: multipart upload no longer exists (UploadId: " . $uploadId. ")"
        );
        $manager->resumeUpload($request)->wait();
    }

    public function testResumeDownloadFailsWhenETagNoLongerMatches(): void
    {
        $destination = $this->tempDir . 'download.txt';
        $tempFile = $this->tempDir . 'temp.s3tmp.12345678';
        file_put_contents($tempFile, str_repeat("\0", 1000));
        $resumeFile = $this->tempDir . 'test.resume';

        $resumable = new ResumableDownload(
            $resumeFile,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => 500],
            ['transferred_bytes' => 500, 'total_bytes' => 1000],
            ['ETag' => 'old-etag', 'ContentLength' => 500],
            [1 => true],
            2,
            $tempFile,
            'old-etag',
            1000,
            500,
            $destination
        );
        $resumable->toFile();

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['__call'])
            ->getMock();

        $mockClient->method('__call')
            ->willReturnCallback(function ($name, $args) {
                if ($name === 'headObject') {
                    return new Result(['ETag' => 'new-etag']);
                }
                return new Result([]);
            });

        $manager = new S3TransferManager($mockClient);
        $request = new ResumeDownloadRequest($resumeFile);

        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('ETag mismatch');
        $manager->resumeDownload($request)->wait();
    }

    /**
     * @return void
     */
    public function testSuccessfullyResumesFailedDownload(): void
    {
        $destination = $this->tempDir . 'download.txt';
        $tempFile = $this->tempDir . 'temp.s3tmp.12345678';
        file_put_contents($tempFile, str_repeat('a', 500) . str_repeat("\0", 500));
        $resumeFile = $this->tempDir . 'test.resume';

        $resumable = new ResumableDownload(
            $resumeFile,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            [
                'target_part_size_bytes' => 500,
                'resume_enabled' => true,
                'multipart_download_type' => 'ranged'
            ],
            ['transferred_bytes' => 500, 'total_bytes' => 1000, 'identifier' => 'test-key'],
            ['ETag' => 'test-etag', 'ContentLength' => 500],
            [1 => true],
            2,
            $tempFile,
            'test-etag',
            1000,
            500,
            $destination
        );
        $resumable->toFile();

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['__call', 'getCommand', 'executeAsync'])
            ->getMock();

        $mockClient->method('__call')
            ->willReturnCallback(function ($name, $args) {
                if ($name === 'headObject') {
                    return new Result(['ETag' => 'test-etag']);
                }
                return new Result([]);
            });

        $mockClient->method('executeAsync')
            ->willReturnCallback(function ($command) {
                if ($command->getName() === 'GetObject') {
                    return Create::promiseFor(new Result([
                        'Body' => Utils::streamFor(str_repeat('b', 500)),
                        'ContentRange' => 'bytes 500-999/1000',
                        'ContentLength' => 500
                    ]));
                }
                return Create::promiseFor(new Result([]));
            });

        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $manager = new S3TransferManager($mockClient);
        $request = new ResumeDownloadRequest($resumeFile);

        $manager->resumeDownload($request)->wait();
        $this->assertFileExists($destination);
        $this->assertEquals(
            str_repeat('a', 500).str_repeat('b', 500),
            file_get_contents($destination)
        );
    }

    /**
     * @return void
     */
    public function testSuccessfullyResumesFailedUpload(): void
    {
        $sourceFile = $this->tempDir . 'upload.txt';
        file_put_contents($sourceFile, str_repeat('a', 10485760));
        $resumeFile = $this->tempDir . 'test.resume';

        $resumable = new ResumableUpload(
            $resumeFile,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            ['target_part_size_bytes' => 5242880, 'resume_enabled' => true],
            ['transferred_bytes' => 5242880, 'total_bytes' => 10485760, 'identifier' => 'test-key'],
            'test-upload-id',
            [1 => ['PartNumber' => 1, 'ETag' => 'etag1']],
            $sourceFile,
            10485760,
            5242880,
            false
        );
        $resumable->toFile();

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['__call', 'getCommand', 'executeAsync'])
            ->getMock();

        $mockClient->method('__call')
            ->willReturnCallback(function ($name, $args) {
                if ($name === 'listMultipartUploads') {
                    return new Result([
                        'Uploads' => [
                            ['UploadId' => 'test-upload-id', 'Key' => 'test-key']
                        ]
                    ]);
                }
                return new Result([]);
            });

        $mockClient->method('executeAsync')
            ->willReturnCallback(function ($command) {
                if ($command->getName() === 'UploadPart') {
                    return Create::promiseFor(new Result(['ETag' => 'etag2']));
                }
                if ($command->getName() === 'CompleteMultipartUpload') {
                    return Create::promiseFor(new Result(['Location' => 's3://test-bucket/test-key']));
                }
                return Create::promiseFor(new Result([]));
            });

        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $manager = new S3TransferManager($mockClient);
        $request = new ResumeUploadRequest($resumeFile);

        $manager->resumeUpload($request)->wait();
        $this->assertFileDoesNotExist($resumeFile);
    }

    public function testDefaultRegionIsRequiredWhenUsingDefaultS3Client(): void
    {
        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage("When using the default S3 Client you must define a default region."
            . "\nThe config parameter is `default_region`.`");
        new S3TransferManager();
    }
}
