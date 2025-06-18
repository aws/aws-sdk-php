<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Transfer\Models\UploadResponse;
use Aws\S3\S3Transfer\MultipartUploader;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\Test\TestsUtility;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

class MultipartUploaderTest extends TestCase
{
    /**
     * @param array $sourceConfig
     * @param array $config
     * @param array $expected
     * @return void
     *
     * @dataProvider multipartUploadProvider
     *
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
        $cleanUpFns = [];
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
            $cleanUpFns[] = function () use ($tempDir, $source) {
                TestsUtility::cleanUpDir($tempDir);
            };
        } else {
            $this->fail("Unsupported Source type");
        }

        if ($sourceConfig['type'] !== 'file') {
            $cleanUpFns[] = function () use ($source) {
                $source->close();
            };
        }

        try {
            $multipartUploader = new MultipartUploader(
                $s3Client,
                $requestArgs,
                $config + [
                    'concurrency' => 3,
                ],
                $source,
            );
            /** @var UploadResponse $response */
            $response = $multipartUploader->promise()->wait();
            $snapshot = $multipartUploader->getCurrentSnapshot();

            $this->assertInstanceOf(UploadResponse::class, $response);
            $this->assertCount($expected['parts'], $multipartUploader->getParts());
            $this->assertEquals($expected['bytesUploaded'], $snapshot->getTransferredBytes());
            $this->assertEquals($expected['bytesUploaded'], $snapshot->getTotalBytes());
        } finally {
            foreach ($cleanUpFns as $fn) {
                $fn();
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
                    'part_size' => 10240000
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
                    'part_size' => 10240000
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
                    'part_size' => 10240000
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
                    'part_size' => 10240000
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
                    'part_size' => 10240000
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
                "The config `part_size` value must be between "
                . MultipartUploader::PART_MIN_SIZE . " and " . MultipartUploader::PART_MAX_SIZE
                . " but ${partSize} given."
            );
        } else {
            $this->assertTrue(true);
        }

        new MultipartUploader(
            $this->getMultipartUploadS3Client(),
            ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
            [
                'part_size' => $partSize,
            ],
            Utils::streamFor('')
        );
    }

    /**
     * @return array
     */
    public function validatePartSizeProvider(): array {
        return [
            'part_size_over_max' => [
                'part_size' => MultipartUploader::PART_MAX_SIZE + 1,
                'expectError' => true,
            ],
            'part_size_under_min' => [
                'part_size' => MultipartUploader::PART_MIN_SIZE - 1,
                'expectError' => true,
            ],
            'part_size_between_valid_range_1' => [
                'part_size' => MultipartUploader::PART_MAX_SIZE - 1,
                'expectError' => false,
            ],
            'part_size_between_valid_range_2' => [
                'part_size' => MultipartUploader::PART_MIN_SIZE + 1,
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
        $cleanUpFns = [];
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
            $cleanUpFns[] = function () use ($tempDir) {
                TestsUtility::cleanUpDir($tempDir);
            };
        }

        try {
            new MultipartUploader(
                $this->getMultipartUploadS3Client(),
                ['Bucket' => 'test-bucket', 'Key' => 'test-key'],
                [],
                $source
            );
        } finally {
            foreach ($cleanUpFns as $cleanUpFn) {
                $cleanUpFn();
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
        $listener1 = $this->getMockBuilder(TransferListener::class)->getMock();
        $listener2 = $this->getMockBuilder(TransferListener::class)->getMock();
        $listener3 = $this->getMockBuilder(TransferListener::class)->getMock();

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
            [
                'part_size' => 5242880, // 5MB
                'concurrency' => 1,
            ],
            $stream,
            null,
            [],
            null,
            $listenerNotifier
        );

        $response = $multipartUploader->promise()->wait();
        $this->assertInstanceOf(UploadResponse::class, $response);
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
            [
                'concurrency' => 1,
            ],
            $stream
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
        $cleanUpFns = [];
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
            $cleanUpFns[] = function () use ($tempDir, $source) {
                TestsUtility::cleanUpDir($tempDir);
            };
        } else {
            $this->fail("Unsupported Source type");
        }

        if ($sourceConfig['type'] !== 'file') {
            $cleanUpFns[] = function () use ($source) {
                $source->close();
            };
        }

        try {
            $multipartUploader = new MultipartUploader(
                $s3Client,
                $requestArgs,
                [
                    'concurrency' => 3,
                ],
                $source,
            );
            /** @var UploadResponse $response */
            $response = $multipartUploader->promise()->wait();
            foreach ($operationsCalled as $key => $value) {
                $this->assertTrue($value, 'Operation {' . $key . '} was not called');
            }
            $this->assertInstanceOf(UploadResponse::class, $response);
        } finally {
            foreach ($cleanUpFns as $fn) {
                $fn();
            }
        }
    }

    /**
     * @return array
     */
    public function multipartUploadWithCustomChecksumProvider(): array {
        return [
            'custom_checksum_sha256_1' => [
                'source_config' => [
                    'type' => 'stream',
                    'size' => 1024 * 1024 * 20,
                    'char' => '*'
                ],
                'checksum_config' => [
                    'ChecksumSHA256' => '0c58gNl31EVxhClRWw5+WHiAUp2B3/3g1zQDCvY4bmQ=',
                ],
                'expected_operation_headers' => [
                    'CreateMultipartUpload' => [
                        'has' => [
                            'x-amz-checksum-algorithm' => 'SHA256',
                            'x-amz-checksum-type' => 'FULL_OBJECT'
                        ]
                    ],
                    'UploadPart' => [
                        'has_not' => [
                            'x-amz-checksum-algorithm',
                            'x-amz-checksum-type',
                            'x-amz-checksum-sha256'
                        ]
                    ],
                    'CompleteMultipartUpload' => [
                        'has' => [
                            'x-amz-checksum-sha256' => '0c58gNl31EVxhClRWw5+WHiAUp2B3/3g1zQDCvY4bmQ=',
                            'x-amz-checksum-type' => 'FULL_OBJECT',
                        ],
                    ]
                ]
            ],
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
                            'x-amz-checksum-algorithm' => 'CRC32',
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
                    if ($command['PartNumber'] == 3) {
                        return Create::rejectionFor(new S3TransferException('Upload failed'));
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
                [
                    'concurrency' => 3,
                ],
                $source,
            );
            $multipartUploader->upload();
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

        $listener1 = $this->getMockBuilder(TransferListener::class)->getMock();
        $listener2 = $this->getMockBuilder(TransferListener::class)->getMock();

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
            [
                'part_size' => 5242880, // 5MB
                'concurrency' => 1,
            ],
            $stream,
            null,
            [],
            null,
            $listenerNotifier
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
            [
                'part_size' => 5242880,
                'concurrency' => 1,
            ],
            $stream,
            null,
            [],
            null,
            $listenerNotifier
        );

        $response = $multipartUploader->promise()->wait();
        $this->assertInstanceOf(UploadResponse::class, $response);
    }
}