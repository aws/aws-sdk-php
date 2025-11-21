<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\AbstractMultipartUploader;
use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\UploadResult;
use Aws\S3\S3Transfer\MultipartUploader;
use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\Test\TestsUtility;
use Generator;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

class MultipartUploaderTest extends TestCase
{
    /** @var string */
    private string $tempDir;

    protected function setUp(): void
    {
        $this->tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'multipart-uploader-resume-test/';
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
     * @param array $sourceConfig
     * @param array $commandArgs
     * @param array $config
     * @param array $expected
     * @return void
     *
     * @dataProvider multipartUploadProvider
     */
    public function testMultipartUpload(
        array $sourceConfig,
        array $commandArgs,
        array $config,
        array $expected
    ): void
    {
        $s3Client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $s3Client->method('executeAsync')
            -> willReturnCallback(function ($command) use ($expected)
           {
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result([
                        'UploadId' => 'FooUploadId'
                    ]));
                } elseif ($command->getName() === 'UploadPart') {
                    return Create::promiseFor(new Result([
                        'ETag' => 'FooETag'
                    ]));
                }

                if (isset($expected[$command->getName()])) {
                    $expectedOperationLevel = $expected['operations'][$command->getName()] ?? [];
                    foreach ($expectedOperationLevel as $key => $value) {
                        $this->assertArrayHasKey($key, $command);
                        $this->assertEquals($value, $command[$key]);
                    }
                }

               return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            -> willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });
        $requestArgs = [
            'Key' => 'FooKey',
            'Bucket' => 'FooBucket',
            ...$commandArgs
        ];
        $tempDir = null;
        if ($sourceConfig['type'] === 'stream') {
            $source = Utils::streamFor(
                str_repeat('*', $sourceConfig['size'])
            );
        } elseif ($sourceConfig['type'] === 'no_seekable_stream') {
            $source = Utils::streamFor(
                str_repeat('*', $sourceConfig['size'])
            );
        } elseif ($sourceConfig['type'] === 'file') {
            $tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'multipart-uploader-test/';
            if (!is_dir($tempDir)) {
                mkdir($tempDir, 0777, true);
            }
            $source = $tempDir . DIRECTORY_SEPARATOR . 'temp-file.txt';
            file_put_contents($source, str_repeat('*', $sourceConfig['size']));
        } else {
            $this->fail("Unsupported Source type");
        }

        try {
            $multipartUploader = new MultipartUploader(
                $s3Client,
                $requestArgs,
                $source,
                $config,
            );
            /** @var UploadResult $response */
            $response = $multipartUploader->promise()->wait();
            $snapshot = $multipartUploader->getCurrentSnapshot();

            $this->assertInstanceOf(UploadResult::class, $response);
            $this->assertCount($expected['parts'], $multipartUploader->getPartsCompleted());
            $this->assertEquals($expected['bytesUploaded'], $snapshot->getTransferredBytes());
            $this->assertEquals($expected['bytesUploaded'], $snapshot->getTotalBytes());
        } finally {
            if ($source instanceof StreamInterface) {
                $source->close();
            }

            if (!is_null($tempDir)) {
                TestsUtility::cleanUpDir($tempDir);
            }
        }
    }

    /**
     * @return array[]
     */
    public function multipartUploadProvider(): array {
        return [
            '5_parts_upload' => [
                'source_config' => [
                    'type' => 'stream',
                    'size' => 10240000 * 5
                ],
                'command_args' => [],
                'config' => [
                    'target_part_size_bytes' => 10240000,
                    'concurrency' => 1,
                    'request_checksum_calculation' => 'when_supported'
                ],
                'expected' => [
                    'succeed' => true,
                    'parts' => 5,
                    'bytesUploaded' => 10240000 * 5,
                ]
            ],
            '100_parts_upload' => [
                'source_config' => [
                    'type' => 'stream',
                    'size' => 10240000 * 100
                ],
                'command_args' => [],
                'config' => [
                    'target_part_size_bytes' => 10240000,
                    'concurrency' => 1,
                    'request_checksum_calculation' => 'when_supported'
                ],
                'expected' => [
                    'succeed' => true,
                    'parts' => 100,
                    'bytesUploaded' => 10240000 * 100,
                ]
            ],
            '5_parts_no_seekable_stream' => [
                'source_config' => [
                    'type' => 'no_seekable_stream',
                    'size' => 10240000 * 5
                ],
                'command_args' => [],
                'config' => [
                    'target_part_size_bytes' => 10240000,
                    'concurrency' => 1,
                    'request_checksum_calculation' => 'when_supported'
                ],
                'expected' => [
                    'succeed' => true,
                    'parts' => 5,
                    'bytesUploaded' => 10240000 * 5,
                ]
            ],
            '100_parts_no_seekable_stream' => [
                'source_config' => [
                    'type' => 'no_seekable_stream',
                    'size' => 10240000 * 100
                ],
                'command_args' => [],
                'config' => [
                    'target_part_size_bytes' => 10240000,
                    'concurrency' => 1,
                    'request_checksum_calculation' => 'when_supported'
                ],
                'expected' => [
                    'succeed' => true,
                    'parts' => 100,
                    'bytesUploaded' => 10240000 * 100,
                ]
            ],
            '100_parts_with_custom_checksum' => [
                'source_config' => [
                    'type' => 'file',
                    'size' => 10240000 * 100
                ],
                'command_args' => [
                    'ChecksumCRC32' => 'FooChecksum',
                ],
                'config' => [
                    'target_part_size_bytes' => 10240000,
                    'concurrency' => 1,
                    'request_checksum_calculation' => 'when_supported'
                ],
                'expected' => [
                    'succeed' => true,
                    'parts' => 100,
                    'bytesUploaded' => 10240000 * 100,
                    'CreateMultipartUpload' => [
                        'ChecksumType' => 'FULL_OBJECT',
                        'ChecksumAlgorithm' => 'CRC32'
                    ],
                    'CompleteMultipartUpload' => [
                        'ChecksumType' => 'FULL_OBJECT',
                        'ChecksumAlgorithm' => 'CRC32',
                        'ChecksumCRC32' => 'FooChecksum',
                    ]
                ]
            ],
        ];
    }

    /**
     * @return S3ClientInterface
     */
    private function getMultipartUploadS3Client(): S3ClientInterface
    {
        return new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (RequestInterface $request) {
                $uri = $request->getUri();
                // Create multipart upload
                if ($uri->getQuery() === 'uploads') {
                    $body = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<InitiateMultipartUploadResult>
    <Bucket>Foo</Bucket>
    <Key>Test file</Key>
    <UploadId>FooUploadId</UploadId>
</InitiateMultipartUploadResult>
EOF;
                    return new Response(200, [], $body);
                }

                // Parts upload
                if (str_starts_with($request->getUri(), 'uploadId=') && str_contains($request->getUri(), 'partNumber=')) {
                    return new Response(200, ['ETag' => random_bytes(16)]);
                }

                // Complete multipart upload
                return new Response(200, [], null);
            }
        ]);
    }


    /**
     * @param int $partSize
     * @param bool $expectError
     *
     * @dataProvider validatePartSizeProvider
     *
     * @return void
     */
    public function testValidatePartSize(
        int $partSize,
        bool $expectError
    ): void {
        if ($expectError) {
            $this->expectException(\InvalidArgumentException::class);
            $this->expectExceptionMessage(
                "Part size config must be between " . AbstractMultipartUploader::PART_MIN_SIZE
                ." and " . AbstractMultipartUploader::PART_MAX_SIZE . " bytes "
                ."but it is configured to $partSize"
            );
        } else {
            $this->assertTrue(true);
        }

        new MultipartUploader(
            $this->getMultipartUploadS3Client(),
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            Utils::streamFor(),
            [
                'target_part_size_bytes' => $partSize,
                'concurrency' => 1,
                'request_checksum_calculation' => 'when_supported'
            ],
        );
    }

    /**
     * @return array
     */
    public function validatePartSizeProvider(): array {
        return [
            'part_size_over_max' => [
                'part_size' => AbstractMultipartUploader::PART_MAX_SIZE + 1,
                'expectError' => true,
            ],
            'part_size_under_min' => [
                'part_size' => AbstractMultipartUploader::PART_MIN_SIZE - 1,
                'expectError' => true,
            ],
            'part_size_between_valid_range_1' => [
                'part_size' => AbstractMultipartUploader::PART_MAX_SIZE - 1,
                'expectError' => false,
            ],
            'part_size_between_valid_range_2' => [
                'part_size' => AbstractMultipartUploader::PART_MIN_SIZE + 1,
                'expectError' => false,
            ]
        ];
    }

    /**
     * @param string|int $source
     * @param bool $expectError
     *
     * @dataProvider invalidSourceStringProvider
     *
     * @return void
     */
    public function testInvalidSourceStringThrowsException(
        string|int $source,
        bool $expectError
    ): void
    {
        $tempDir = null;
        if ($expectError) {
            $this->expectException(\InvalidArgumentException::class);
            $this->expectExceptionMessage(
                "The source for this upload must be either a readable file path or a valid stream."
            );
        } else {
            $this->assertTrue(true);
            $tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'multipart-upload-test';
            if (!is_dir($tempDir)) {
                mkdir($tempDir, 0777, true);
            }

            $source = $tempDir . DIRECTORY_SEPARATOR . $source;
            file_put_contents($source, 'foo');
        }

        try {
            new MultipartUploader(
                $this->getMultipartUploadS3Client(),
                ([
                    'Bucket' => 'test-bucket',
                    'Key' => 'test-key'
                ]),
                $source,
                [
                    'target_part_size_bytes' => 1024 * 1024 * 5,
                    'concurrency' => 1,
                    'request_checksum_calculation' => 'when_supported'
                ]
            );
        } finally {
            if (!is_null($tempDir)) {
                TestsUtility::cleanUpDir($tempDir);
            }
        }
    }

    /**
     * @return array[]
     */
    public function invalidSourceStringProvider(): array {
        return [
            'invalid_source_file_path_1' => [
                'source' => 'invalid',
                'expectError' => true,
            ],
            'invalid_source_file_path_2' => [
                'source' => 'invalid_2',
                'expectError' => true,
            ],
            'invalid_source_3' => [
                'source' => 12345,
                'expectError' => true,
            ],
            'valid_source' => [
                'source' => 'myfile.txt',
                'expectError' => false,
            ],
        ];
    }

    /**
     * @return void
     */
    public function testTransferListenerNotifierNotifiesListenersOnSuccess(): void
    {
        $noOfListeners = 3;
        $listeners = [];
        for ($i = 0; $i < $noOfListeners; $i++) {
            $listener = $this->getMockBuilder(
                AbstractTransferListener::class
            )->getMock();
            $listener->method('bytesTransferred')->willReturn(true);
            $listener->expects($this->once())->method('transferInitiated');
            $listener->expects($this->atLeastOnce())->method('bytesTransferred');
            $listener->expects($this->once())->method('transferComplete');
            $listeners[] = $listener;
        }

        $listenerNotifier = new TransferListenerNotifier($listeners);

        $s3Client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $s3Client->method('executeAsync')
            ->willReturnCallback(function ($command) {
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result([
                        'UploadId' => 'TestUploadId'
                    ]));
                } elseif ($command->getName() === 'UploadPart') {
                    return Create::promiseFor(new Result([
                        'ETag' => 'TestETag'
                    ]));
                }
                return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $stream = Utils::streamFor(str_repeat('*', 10240000)); // 10MB
        $requestArgs = [
            'Key' => 'test-key',
            'Bucket' => 'test-bucket',
        ];

        $multipartUploader = new MultipartUploader(
            $s3Client,
            $requestArgs,
            $stream,
            [
                'target_part_size_bytes' => 5242880, // 5MB
                'concurrency' => 1,
                'request_checksum_calculation' => 'when_supported'
            ],
            $listenerNotifier,
            null,
        );

        $response = $multipartUploader->promise()->wait();
        $this->assertInstanceOf(UploadResult::class, $response);
    }

    /**
     * Test to make sure createMultipart, uploadPart, and completeMultipart
     * operations are called.
     *
     * @return void
     */
    public function testMultipartOperationsAreCalled(): void {
        $operationsCalled = [
            'CreateMultipartUpload' => false,
            'UploadPart' => false,
            'CompleteMultipartUpload' => false,
        ];
        $s3Client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $s3Client->method('executeAsync')
            ->willReturnCallback(function ($command) use (&$operationsCalled) {
                $operationsCalled[$command->getName()] = true;
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result([
                        'UploadId' => 'TestUploadId'
                    ]));
                } elseif ($command->getName() === 'UploadPart') {
                    return Create::promiseFor(new Result([
                        'ETag' => 'TestETag'
                    ]));
                }
                return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $stream = Utils::streamFor(str_repeat('*', 1024 * 1024 * 5));
        $requestArgs = [
            'Key' => 'test-key',
            'Bucket' => 'test-bucket',
        ];

        $multipartUploader = new MultipartUploader(
            $s3Client,
            $requestArgs,
            $stream,
            [
                'target_part_size_bytes' => 5242880, // 5MB
                'concurrency' => 1,
                'request_checksum_calculation' => 'when_supported'
            ]
        );

        $multipartUploader->promise()->wait();
        foreach ($operationsCalled as $key => $value) {
            $this->assertTrue($value, 'Operation {' . $key . '} was not called');
        }
    }

    /**
     * @param array $sourceConfig
     * @param array $checksumConfig
     * @param array $expectedOperationHeaders
     *
     * @dataProvider multipartUploadWithCustomChecksumProvider
     *
     * @return void
     */
    public function testMultipartUploadWithCustomChecksum(
        array $sourceConfig,
        array $checksumConfig,
        array $expectedOperationHeaders,
    ): void {
        // $operationsCalled: To make sure each expected operation is invoked.
        $operationsCalled = [];
        foreach (array_keys($expectedOperationHeaders) as $key) {
            $operationsCalled[$key] = false;
        }

        $s3Client = $this->getMultipartUploadS3Client();
        $s3Client->getHandlerList()->appendSign(
            function (callable $handler) use (&$operationsCalled, $expectedOperationHeaders) {
                return function (
                    CommandInterface $command,
                    RequestInterface $request
                ) use ($handler, &$operationsCalled, $expectedOperationHeaders) {
                    $operationsCalled[$command->getName()] = true;
                    $expectedHeaders = $expectedOperationHeaders[$command->getName()] ?? [];
                    $has = $expectedHeaders['has'] ?? [];
                    $hasNot = $expectedHeaders['has_not'] ?? [];
                    foreach ($has as $key => $value) {
                        $this->assertArrayHasKey($key, $request->getHeaders());
                        $this->assertEquals($value, $request->getHeader($key)[0]);
                    }

                    foreach ($hasNot as $value) {
                        $this->assertArrayNotHasKey($value, $request->getHeaders());
                    }

                    return $handler($command, $request);
                };
            }
        );
        $requestArgs = [
            'Key' => 'FooKey',
            'Bucket' => 'FooBucket',
            ...$checksumConfig,
        ];
        $tempDir = null;
        if ($sourceConfig['type'] === 'stream') {
            $source = Utils::streamFor(
                str_repeat($sourceConfig['char'], $sourceConfig['size'])
            );
        } elseif ($sourceConfig['type'] === 'no_seekable_stream') {
            $source = Utils::streamFor(
                str_repeat($sourceConfig['char'], $sourceConfig['size'])
            );
        } elseif ($sourceConfig['type'] === 'file') {
            $tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'multipart-uploader-test/';
            if (!is_dir($tempDir)) {
                mkdir($tempDir, 0777, true);
            }
            $source = $tempDir . DIRECTORY_SEPARATOR . 'temp-file.txt';
            file_put_contents($source, str_repeat($sourceConfig['char'], $sourceConfig['size']));
        } else {
            $this->fail("Unsupported Source type");
        }

        try {
            $multipartUploader = new MultipartUploader(
                $s3Client,
                $requestArgs,
                $source,
                [
                    'target_part_size_bytes' => 5242880, // 5MB
                    'concurrency' => 3,
                    'request_checksum_calculation' => 'when_supported'
                ]
            );
            /** @var UploadResult $response */
            $response = $multipartUploader->promise()->wait();
            foreach ($operationsCalled as $key => $value) {
                $this->assertTrue($value, 'Operation {' . $key . '} was not called');
            }
            $this->assertInstanceOf(UploadResult::class, $response);
        } finally {
            if ($source instanceof StreamInterface) {
                $source->close();
            }

            if (!is_null($tempDir)) {
                TestsUtility::cleanUpDir($tempDir);
            }
        }
    }

    /**
     * @return array
     */
    public function multipartUploadWithCustomChecksumProvider(): array {
        return [
            'custom_checksum_crc32_1' => [
                'source_config' => [
                    'type' => 'stream',
                    'size' => 1024 * 1024 * 20,
                    'char' => '*'
                ],
                'checksum_config' => [
                    'ChecksumCRC32' => '+IIKcQ==',
                ],
                'expected_operation_headers' => [
                    'CreateMultipartUpload' => [
                        'has' => [
                            'x-amz-checksum-algorithm' => 'crc32',
                            'x-amz-checksum-type' => 'FULL_OBJECT'
                        ]
                    ],
                    'UploadPart' => [
                        'has_not' => [
                            'x-amz-checksum-algorithm',
                            'x-amz-checksum-type',
                            'x-amz-checksum-crc32'
                        ]
                    ],
                    'CompleteMultipartUpload' => [
                        'has' => [
                            'x-amz-checksum-crc32' => '+IIKcQ==',
                            'x-amz-checksum-type' => 'FULL_OBJECT',
                        ],
                    ]
                ]
            ]
        ];
    }

    /**
     * @return void
     */
    public function testMultipartUploadAbort() {
        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage('Upload failed');
        $abortMultipartCalled = false;
        $abortMultipartCalledTimes = 0;
        $s3Client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $s3Client->method('executeAsync')
            ->willReturnCallback(function ($command)
                use (&$abortMultipartCalled, &$abortMultipartCalledTimes) {
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result([
                        'UploadId' => 'TestUploadId'
                    ]));
                } elseif ($command->getName() === 'UploadPart') {
                    if ($command['PartNumber'] === 3) {
                        return Create::rejectionFor(
                            new S3TransferException('Upload failed')
                        );
                    }
                } elseif ($command->getName() === 'AbortMultipartUpload') {
                    $abortMultipartCalled = true;
                    $abortMultipartCalledTimes++;
                }

                return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });
        $requestArgs = [
            'Bucket' => 'test-bucket',
            'Key' => 'test-key',
        ];
        $source = Utils::streamFor(str_repeat('*', 1024 * 1024 * 20));
        try {
            $multipartUploader = new MultipartUploader(
                $s3Client,
                $requestArgs,
                $source,
                [
                    'target_part_size_bytes' => 5242880, // 5MB
                    'concurrency' => 1,
                    'request_checksum_calculation' => 'when_supported'
                ]
            );
            $multipartUploader->promise()->wait();
        } finally {
            $this->assertTrue($abortMultipartCalled);
            $this->assertEquals(1, $abortMultipartCalledTimes);
            $source->close();
        }
    }

    /**
     * @return void
     */
    public function testTransferListenerNotifierNotifiesListenersOnFailure(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Upload failed');

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
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result([
                        'UploadId' => 'TestUploadId'
                    ]));
                } elseif ($command->getName() === 'UploadPart') {
                    return Create::rejectionFor(new \Exception('Upload failed'));
                }
                return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $stream = Utils::streamFor(str_repeat('*', 10240000));
        $requestArgs = [
            'Key' => 'test-key',
            'Bucket' => 'test-bucket',
        ];

        $multipartUploader = new MultipartUploader(
            $s3Client,
            $requestArgs,
            $stream,
            [
                'target_part_size_bytes' => 5242880, // 5MB
                'concurrency' => 1,
                'request_checksum_calculation' => 'when_supported'
            ],
            $listenerNotifier,
            null,
        );

        $multipartUploader->promise()->wait();
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
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result([
                        'UploadId' => 'TestUploadId'
                    ]));
                } elseif ($command->getName() === 'UploadPart') {
                    return Create::promiseFor(new Result([
                        'ETag' => 'TestETag'
                    ]));
                }
                return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $stream = Utils::streamFor(str_repeat('*', 1024));
        $requestArgs = [
            'Key' => 'test-key',
            'Bucket' => 'test-bucket',
        ];

        $multipartUploader = new MultipartUploader(
            $s3Client,
            $requestArgs,
            $stream,
            [
                'target_part_size_bytes' => 5242880, // 5MB
                'concurrency' => 1,
            ],
            $listenerNotifier,
            null,
        );

        $response = $multipartUploader->promise()->wait();
        $this->assertInstanceOf(UploadResult::class, $response);
    }

    /**
     * This test makes sure that when full object checksum type is resolved
     * then, if a custom algorithm provide is not CRC family then it should fail.
     *
     * @param array $checksumConfig
     * @param bool $expectsError
     *
     * @dataProvider fullObjectChecksumWorksJustWithCRCProvider
     *
     * @return void
     */
    public function testFullObjectChecksumWorksJustWithCRC(
        array $checksumConfig,
        bool $expectsError
    ): void
    {
        $s3Client = $this->getMultipartUploadS3Client();
        $requestArgs = [
            'Key' => 'FooKey',
            'Bucket' => 'FooBucket',
            ...$checksumConfig,
        ];

        try {
            $multipartUploader = new MultipartUploader(
                $s3Client,
                $requestArgs,
                Utils::streamFor(''),
                [
                    'target_part_size_bytes' => 5242880, // 5MB
                    'concurrency' => 3,
                    'request_checksum_calculation' => 'when_supported'
                ]
            );
            $response = $multipartUploader->promise()->wait();
            if ($expectsError) {
                $this->fail("An expected exception has not been raised");
            } else {
                $this->assertInstanceOf(UploadResult::class, $response);
            }
        } catch (S3TransferException $exception) {
            if ($expectsError) {
                $this->assertEquals(
                    "Full object checksum algorithm must be `CRC` family base.",
                    $exception->getMessage()
                );
            } else {
                $this->fail("An exception has been thrown when not expected");
            }
        }
    }

    /**
     * @return Generator
     */
    public function fullObjectChecksumWorksJustWithCRCProvider(): Generator {
        yield 'sha_256_should_fail' => [
            'checksum_config' => [
                'ChecksumSHA256' => '47DEQpj8HBSa+/TImW+5JCeuQeRkm5NMpJWZG3hSuFU='
            ],
            'expects_error' => true,
        ];

        yield 'sha_1_should_fail' => [
            'checksum_config' => [
                'ChecksumSHA1' => '2jmj7l5rSw0yVb/vlWAYkK/YBwk='
            ],
            'expects_error' => true,
        ];

        yield 'crc32_should_fail' => [
            'checksum_config' => [
                'ChecksumCRC32' => 'AAAAAA=='
            ],
            'expects_error' => false,
        ];
    }

    /**
     * @param array $sourceConfig
     * @param array $requestArgs
     * @param array $expectedInputArgs
     * @param bool $expectsError
     * @param int|null $errorOnPartNumber
     * @return void
     * @dataProvider inputArgumentsPerOperationProvider
     */
    public function testInputArgumentsPerOperation(
        array $sourceConfig,
        array $requestArgs,
        array $expectedInputArgs,
        bool $expectsError,
        ?int $errorOnPartNumber = null
    ): void
    {
        try {
            $calledCommands = array_map(function () {
                return 1;
            }, $expectedInputArgs);
            $this->assertNotEmpty(
                $calledCommands,
                "Expected input arguments should not be empty"
            );
            $s3Client = $this->getMockBuilder(S3Client::class)
                ->disableOriginalConstructor()
                ->getMock();
            $s3Client->method(
                'getCommand'
            )->willReturnCallback(
                function ($commandName, $args)
                use (&$calledCommands, $expectedInputArgs) {
                if (isset($expectedInputArgs[$commandName])) {
                    $calledCommands[$commandName] = 0;
                    $expected = $expectedInputArgs[$commandName];
                    foreach ($expected as $key => $value) {
                        $this->assertArrayHasKey($key, $args);
                        $this->assertEquals(
                            $value,
                            $args[$key]
                        );
                    }
                }

                return new Command($commandName, $args);
            });
            $s3Client->method('executeAsync')
                ->willReturnCallback(function ($command)
                use ($errorOnPartNumber, $expectsError) {
                    if ($command->getName() === 'UploadPart') {
                        if ($expectsError && $command['PartNumber'] === $errorOnPartNumber) {
                            return Create::rejectionFor(
                                new S3TransferException('Upload failed')
                            );
                        }

                        return Create::promiseFor(new Result([]));
                    }

                    return match ($command->getName()) {
                        'CreateMultipartUpload' => Create::promiseFor(new Result([
                            'UploadId' => 'FooUploadId',
                        ])),
                        'CompleteMultipartUpload',
                        'AbortMultipartUpload',
                        'PutObject' => Create::promiseFor(new Result([])),
                        default => null,
                    };
                });
            $source = Utils::streamFor(
                str_repeat(
                    $sourceConfig['char'],
                    $sourceConfig['size']
                )
            );
            $multipartUploader = new MultipartUploader(
                $s3Client,
                $requestArgs,
                Utils::streamFor($source)
            );
            $multipartUploader->upload();
            foreach ($calledCommands as $key => $value) {
                $this->assertEquals(
                    0,
                    $value,
                    "$key not called"
                );
            }
            $this->assertFalse(
                $expectsError,
                "Expected error while uploading"
            );
        } catch (S3TransferException $exception) {
            $this->assertTrue(
                $expectsError,
                "Unexpected error while uploading" . "\n" . $exception->getMessage()
            );
        }
    }

    /**
     * @return Generator
     */
    public function inputArgumentsPerOperationProvider(): Generator
    {
        yield 'test_input_fields_are_copied_without_custom_checksums' => [
            // Source config to generate a stub body
            'source_config' => [
                'size' => 1024 * 1024 * 10,
                'char' => '#'
            ],
            'request_args' => [
                "ACL" => 'private',
                "Bucket" => 'test-bucket',
                "BucketKeyEnabled" => 'test-bucket-key-enabled',
                "CacheControl" => 'test-cache-control',
                "ContentDisposition" => 'test-content-disposition',
                "ContentEncoding" => 'test-content-encoding',
                "ContentLanguage" => 'test-content-language',
                "ContentType" => 'test-content-type',
                "ExpectedBucketOwner" => 'test-bucket-owner',
                "Expires" => 'test-expires',
                "GrantFullControl" => 'test-grant-control',
                "GrantRead" => 'test-grant-control',
                "GrantReadACP" => 'test-grant-control',
                "GrantWriteACP" => 'test-grant-control',
                "Key" => 'test-key',
                "Metadata" => [
                    'metadata-1' => 'test-metadata-1',
                    'metadata-2' => 'test-metadata-2',
                ],
                "ObjectLockLegalHoldStatus" => 'test-object-lock-legal-hold',
                "ObjectLockMode" => 'test-object-lock-mode',
                "ObjectLockRetainUntilDate" => 'test-object-lock-retain-until',
                "RequestPayer" => 'test-request-payer',
                "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                "SSECustomerKey" => 'test-sse-customer-key',
                "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                "SSEKMSEncryptionContext" => 'test-sse-kms-encryption-context',
                "SSEKMSKeyId" => 'test-sse-kms-key-id',
                "ServerSideEncryption" => 'test-server-side-encryption',
                "StorageClass" => 'test-storage-class',
                "Tagging" => 'test-tagging',
                "WebsiteRedirectLocation" => 'test-website-redirect-location',
            ],
            'expected_input_args' => [
                'CreateMultipartUpload' => [
                    "ACL" => 'private',
                    "Bucket" => 'test-bucket',
                    "BucketKeyEnabled" => 'test-bucket-key-enabled',
                    "CacheControl" => 'test-cache-control',
                    "ContentDisposition" => 'test-content-disposition',
                    "ContentEncoding" => 'test-content-encoding',
                    "ContentLanguage" => 'test-content-language',
                    "ContentType" => 'test-content-type',
                    "ExpectedBucketOwner" => 'test-bucket-owner',
                    "Expires" => 'test-expires',
                    "GrantFullControl" => 'test-grant-control',
                    "GrantRead" => 'test-grant-control',
                    "GrantReadACP" => 'test-grant-control',
                    "GrantWriteACP" => 'test-grant-control',
                    "Key" => 'test-key',
                    "Metadata" => [
                        'metadata-1' => 'test-metadata-1',
                        'metadata-2' => 'test-metadata-2',
                    ],
                    "ObjectLockLegalHoldStatus" => 'test-object-lock-legal-hold',
                    "ObjectLockMode" => 'test-object-lock-mode',
                    "ObjectLockRetainUntilDate" => 'test-object-lock-retain-until',
                    "RequestPayer" => 'test-request-payer',
                    "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                    "SSECustomerKey" => 'test-sse-customer-key',
                    "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                    "SSEKMSEncryptionContext" => 'test-sse-kms-encryption-context',
                    "SSEKMSKeyId" => 'test-sse-kms-key-id',
                    "ServerSideEncryption" => 'test-server-side-encryption',
                    "StorageClass" => 'test-storage-class',
                    "Tagging" => 'test-tagging',
                    "WebsiteRedirectLocation" => 'test-website-redirect-location',
                ],
                'UploadPart' => [
                    "Bucket" => 'test-bucket',
                    "UploadId" => "FooUploadId", // Fixed from test
                    "ExpectedBucketOwner" => 'test-bucket-owner',
                    "Key" => 'test-key',
                    "RequestPayer" => 'test-request-payer',
                    "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                    "SSECustomerKey" => 'test-sse-customer-key',
                    "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                ],
                'CompleteMultipartUpload' => [
                    "Bucket" => 'test-bucket',
                    "UploadId" => "FooUploadId", // Fixed from test
                    "ExpectedBucketOwner" => 'test-bucket-owner',
                    "Key" => 'test-key',
                    "RequestPayer" => 'test-request-payer',
                    "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                    "SSECustomerKey" => 'test-sse-customer-key',
                    "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                ],
            ],
            'expects_error' => false,
        ];

        yield 'test_input_fields_are_copied_with_custom_checksum_crc32' => [
            // Source config to generate a stub body
            'source_config' => [
                'size' => 1024 * 1024 * 10,
                'char' => '#'
            ],
            'request_args' => [
                'ChecksumCRC32' => 'tx0IFA==',
                "ACL" => 'private',
                "Bucket" => 'test-bucket',
                "BucketKeyEnabled" => 'test-bucket-key-enabled',
                "CacheControl" => 'test-cache-control',
                "ContentDisposition" => 'test-content-disposition',
                "ContentEncoding" => 'test-content-encoding',
                "ContentLanguage" => 'test-content-language',
                "ContentType" => 'test-content-type',
                "ExpectedBucketOwner" => 'test-bucket-owner',
                "Expires" => 'test-expires',
                "GrantFullControl" => 'test-grant-control',
                "GrantRead" => 'test-grant-control',
                "GrantReadACP" => 'test-grant-control',
                "GrantWriteACP" => 'test-grant-control',
                "Key" => 'test-key',
                "Metadata" => [
                    'metadata-1' => 'test-metadata-1',
                    'metadata-2' => 'test-metadata-2',
                ],
                "ObjectLockLegalHoldStatus" => 'test-object-lock-legal-hold',
                "ObjectLockMode" => 'test-object-lock-mode',
                "ObjectLockRetainUntilDate" => 'test-object-lock-retain-until',
                "RequestPayer" => 'test-request-payer',
                "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                "SSECustomerKey" => 'test-sse-customer-key',
                "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                "SSEKMSEncryptionContext" => 'test-sse-kms-encryption-context',
                "SSEKMSKeyId" => 'test-sse-kms-key-id',
                "ServerSideEncryption" => 'test-server-side-encryption',
                "StorageClass" => 'test-storage-class',
                "Tagging" => 'test-tagging',
                "WebsiteRedirectLocation" => 'test-website-redirect-location',
            ],
            'expected_input_args' => [
                'CreateMultipartUpload' => [
                    "ACL" => 'private',
                    "Bucket" => 'test-bucket',
                    "BucketKeyEnabled" => 'test-bucket-key-enabled',
                    "CacheControl" => 'test-cache-control',
                    "ContentDisposition" => 'test-content-disposition',
                    "ContentEncoding" => 'test-content-encoding',
                    "ContentLanguage" => 'test-content-language',
                    "ContentType" => 'test-content-type',
                    "ExpectedBucketOwner" => 'test-bucket-owner',
                    "Expires" => 'test-expires',
                    "GrantFullControl" => 'test-grant-control',
                    "GrantRead" => 'test-grant-control',
                    "GrantReadACP" => 'test-grant-control',
                    "GrantWriteACP" => 'test-grant-control',
                    "Key" => 'test-key',
                    "Metadata" => [
                        'metadata-1' => 'test-metadata-1',
                        'metadata-2' => 'test-metadata-2',
                    ],
                    "ObjectLockLegalHoldStatus" => 'test-object-lock-legal-hold',
                    "ObjectLockMode" => 'test-object-lock-mode',
                    "ObjectLockRetainUntilDate" => 'test-object-lock-retain-until',
                    "RequestPayer" => 'test-request-payer',
                    "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                    "SSECustomerKey" => 'test-sse-customer-key',
                    "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                    "SSEKMSEncryptionContext" => 'test-sse-kms-encryption-context',
                    "SSEKMSKeyId" => 'test-sse-kms-key-id',
                    "ServerSideEncryption" => 'test-server-side-encryption',
                    "StorageClass" => 'test-storage-class',
                    "Tagging" => 'test-tagging',
                    "WebsiteRedirectLocation" => 'test-website-redirect-location',
                    'ChecksumType' => 'FULL_OBJECT',
                    'ChecksumAlgorithm' => 'crc32',
                ],
                'UploadPart' => [
                    "Bucket" => 'test-bucket',
                    "UploadId" => "FooUploadId", // Fixed from test
                    "ExpectedBucketOwner" => 'test-bucket-owner',
                    "Key" => 'test-key',
                    "RequestPayer" => 'test-request-payer',
                    "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                    "SSECustomerKey" => 'test-sse-customer-key',
                    "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                ],
                'CompleteMultipartUpload' => [
                    "Bucket" => 'test-bucket',
                    "UploadId" => "FooUploadId", // Fixed from test
                    "ExpectedBucketOwner" => 'test-bucket-owner',
                    "Key" => 'test-key',
                    "RequestPayer" => 'test-request-payer',
                    "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                    "SSECustomerKey" => 'test-sse-customer-key',
                    "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                    'ChecksumType' => 'FULL_OBJECT',
                    'ChecksumCRC32' => 'tx0IFA==', // From default algorithm used
                ],
            ],
            'expects_error' => false,
        ];

        yield 'test_input_fields_are_copied_with_error' => [
            // Source config to generate a stub body
            'source_config' => [
                'size' => 1024 * 1024 * 10,
                'char' => '#'
            ],
            'request_args' => [
                'ChecksumCRC32' => 'tx0IFA==',
                "ACL" => 'private',
                "Bucket" => 'test-bucket',
                "BucketKeyEnabled" => 'test-bucket-key-enabled',
                "CacheControl" => 'test-cache-control',
                "ContentDisposition" => 'test-content-disposition',
                "ContentEncoding" => 'test-content-encoding',
                "ContentLanguage" => 'test-content-language',
                "ContentType" => 'test-content-type',
                "ExpectedBucketOwner" => 'test-bucket-owner',
                "Expires" => 'test-expires',
                "GrantFullControl" => 'test-grant-control',
                "GrantRead" => 'test-grant-control',
                "GrantReadACP" => 'test-grant-control',
                "GrantWriteACP" => 'test-grant-control',
                "Key" => 'test-key',
                "Metadata" => [
                    'metadata-1' => 'test-metadata-1',
                    'metadata-2' => 'test-metadata-2',
                ],
                "ObjectLockLegalHoldStatus" => 'test-object-lock-legal-hold',
                "ObjectLockMode" => 'test-object-lock-mode',
                "ObjectLockRetainUntilDate" => 'test-object-lock-retain-until',
                "RequestPayer" => 'test-request-payer',
                "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                "SSECustomerKey" => 'test-sse-customer-key',
                "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                "SSEKMSEncryptionContext" => 'test-sse-kms-encryption-context',
                "SSEKMSKeyId" => 'test-sse-kms-key-id',
                "ServerSideEncryption" => 'test-server-side-encryption',
                "StorageClass" => 'test-storage-class',
                "Tagging" => 'test-tagging',
                "WebsiteRedirectLocation" => 'test-website-redirect-location',
            ],
            'expected_input_args' => [
                'CreateMultipartUpload' => [
                    "ACL" => 'private',
                    "Bucket" => 'test-bucket',
                    "BucketKeyEnabled" => 'test-bucket-key-enabled',
                    "CacheControl" => 'test-cache-control',
                    "ContentDisposition" => 'test-content-disposition',
                    "ContentEncoding" => 'test-content-encoding',
                    "ContentLanguage" => 'test-content-language',
                    "ContentType" => 'test-content-type',
                    "ExpectedBucketOwner" => 'test-bucket-owner',
                    "Expires" => 'test-expires',
                    "GrantFullControl" => 'test-grant-control',
                    "GrantRead" => 'test-grant-control',
                    "GrantReadACP" => 'test-grant-control',
                    "GrantWriteACP" => 'test-grant-control',
                    "Key" => 'test-key',
                    "Metadata" => [
                        'metadata-1' => 'test-metadata-1',
                        'metadata-2' => 'test-metadata-2',
                    ],
                    "ObjectLockLegalHoldStatus" => 'test-object-lock-legal-hold',
                    "ObjectLockMode" => 'test-object-lock-mode',
                    "ObjectLockRetainUntilDate" => 'test-object-lock-retain-until',
                    "RequestPayer" => 'test-request-payer',
                    "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                    "SSECustomerKey" => 'test-sse-customer-key',
                    "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                    "SSEKMSEncryptionContext" => 'test-sse-kms-encryption-context',
                    "SSEKMSKeyId" => 'test-sse-kms-key-id',
                    "ServerSideEncryption" => 'test-server-side-encryption',
                    "StorageClass" => 'test-storage-class',
                    "Tagging" => 'test-tagging',
                    "WebsiteRedirectLocation" => 'test-website-redirect-location',
                    'ChecksumType' => 'FULL_OBJECT',
                    'ChecksumAlgorithm' => 'crc32',
                ],
                'UploadPart' => [
                    "Bucket" => 'test-bucket',
                    "UploadId" => "FooUploadId", // Fixed from test
                    "ExpectedBucketOwner" => 'test-bucket-owner',
                    "Key" => 'test-key',
                    "RequestPayer" => 'test-request-payer',
                    "SSECustomerAlgorithm" => 'test-sse-customer-algorithm',
                    "SSECustomerKey" => 'test-sse-customer-key',
                    "SSECustomerKeyMD5" => 'test-sse-customer-key-md5',
                ],
                'AbortMultipartUpload' => [
                    "Bucket" => 'test-bucket',
                    "UploadId" => "FooUploadId", // Fixed from test
                    "ExpectedBucketOwner" => 'test-bucket-owner',
                    "Key" => 'test-key',
                    "RequestPayer" => 'test-request-payer',
                ],
            ],
            'expects_error' => true,
            'error_on_part_number' => 2
        ];
    }

    /**
     * @return void
     */
    public function testGeneratesResumeFileWhenUploadFailsAndResumeIsEnabled(): void
    {
        $sourceFile = $this->tempDir . 'upload.txt';
        file_put_contents($sourceFile, str_repeat('a', 10485760));

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $callCount = 0;
        $mockClient->method('executeAsync')
            ->willReturnCallback(function ($command) use (&$callCount) {
                $callCount++;
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result(['UploadId' => 'test-upload-id']));
                }
                if ($command->getName() === 'UploadPart' && $callCount <= 2) {
                    return Create::promiseFor(new Result(['ETag' => 'test-etag-' . $callCount]));
                }
                return new RejectedPromise(new \Exception('Upload failed'));
            });

        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $uploader = new MultipartUploader(
            $mockClient,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            $sourceFile,
            ['target_part_size_bytes' => 5242880, 'resume_enabled' => true]
        );

        try {
            $uploader->promise()->wait();
        } catch (\Exception $e) {
            // Expected to fail
        }

        $resumeFile = $sourceFile . '.resume';
        $this->assertFileExists($resumeFile);
    }

    /**
     * @return void
     */
    public function testGeneratesResumeFileWithCustomPath(): void
    {
        $sourceFile = $this->tempDir . 'upload.txt';
        $customResumePath = $this->tempDir . 'custom-resume.resume';
        file_put_contents($sourceFile, str_repeat('a', 10485760));

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $callCount = 0;
        $mockClient->method('executeAsync')
            ->willReturnCallback(function ($command) use (&$callCount) {
                $callCount++;
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result(['UploadId' => 'test-upload-id']));
                }
                if ($command->getName() === 'UploadPart' && $callCount <= 2) {
                    return Create::promiseFor(new Result(['ETag' => 'test-etag-' . $callCount]));
                }
                return new RejectedPromise(new \Exception('Upload failed'));
            });

        $mockClient->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });

        $uploader = new MultipartUploader(
            $mockClient,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            $sourceFile,
            [
                'target_part_size_bytes' => 5242880,
                'resume_enabled' => true,
                'resume_file_path' => $customResumePath
            ]
        );

        try {
            $uploader->promise()->wait();
        } catch (\Exception $e) {
            // Expected to fail
        }

        $this->assertFileExists($customResumePath);
    }

    /**
     * @return void
     */
    public function testRemovesResumeFileAfterSuccessfulCompletion(): void
    {
        $sourceFile = $this->tempDir . 'upload.txt';
        file_put_contents($sourceFile, str_repeat('a', 10485760));

        $mockClient = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockClient->method('executeAsync')
            ->willReturnCallback(function ($command) {
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result(['UploadId' => 'test-upload-id']));
                }
                if ($command->getName() === 'UploadPart') {
                    return Create::promiseFor(new Result(['ETag' => 'test-etag']));
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

        $uploader = new MultipartUploader(
            $mockClient,
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            $sourceFile,
            ['target_part_size_bytes' => 5242880, 'resume_enabled' => true]
        );

        $resumeFile = $sourceFile . '.resume';

        $uploader->promise()->wait();

        $this->assertFileDoesNotExist($resumeFile);

    }

    public function testAbortMultipartUploadShowsWarning(): void
    {
        // Convert the warning to an exception
        $this->expectException(S3TransferException::class);
        $this->expectExceptionMessage("Upload failed");
        set_error_handler(function ($errno, $errstr) {
            $this->assertStringContainsString(
                "Multipart Upload with id: ",
                $errstr,
            );
        });

        $abortMultipartCalled = false;
        $abortMultipartCalledTimes = 0;
        $s3Client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $s3Client->method('executeAsync')
            ->willReturnCallback(function ($command)
            use (&$abortMultipartCalled, &$abortMultipartCalledTimes) {
                if ($command->getName() === 'CreateMultipartUpload') {
                    return Create::promiseFor(new Result([
                        'UploadId' => 'TestUploadId'
                    ]));
                } elseif ($command->getName() === 'UploadPart') {
                    if ($command['PartNumber'] === 3) {
                        return Create::rejectionFor(
                            new S3TransferException('Upload failed')
                        );
                    }
                } elseif ($command->getName() === 'AbortMultipartUpload') {
                    $abortMultipartCalled = true;
                    $abortMultipartCalledTimes++;
                }

                return Create::promiseFor(new Result([]));
            });
        $s3Client->method('getCommand')
            ->willReturnCallback(function ($commandName, $args) {
                return new Command($commandName, $args);
            });
        $requestArgs = [
            'Bucket' => 'test-bucket',
            'Key' => 'test-key',
        ];
        $source = Utils::streamFor(str_repeat('*', 1024 * 1024 * 20));
        try {
            $multipartUploader = new MultipartUploader(
                $s3Client,
                $requestArgs,
                $source,
                [
                    'target_part_size_bytes' => 5242880, // 5MB
                    'concurrency' => 1,
                    'request_checksum_calculation' => 'when_supported'
                ]
            );
            $multipartUploader->promise()->wait();
        } finally {
            $this->assertTrue($abortMultipartCalled);
            $source->close();
        }
    }
}
