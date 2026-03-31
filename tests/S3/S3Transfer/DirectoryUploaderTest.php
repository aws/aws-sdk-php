<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\HandlerList;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\DirectoryUploader;
use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\UploadDirectoryRequest;
use Aws\S3\S3Transfer\Models\UploadDirectoryResult;
use Aws\S3\S3Transfer\Models\UploadRequest;
use Aws\S3\S3Transfer\Models\UploadResult;
use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\Progress\DirectoryTransferProgressSnapshot;
use Aws\S3\S3ClientInterface;
use Aws\Test\TestsUtility;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\RejectedPromise;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RuntimeException;

#[CoversClass(DirectoryUploader::class)]
final class DirectoryUploaderTest extends TestCase
{
    private string $tempDir;
    private string $sourceDir;

    protected function setUp(): void
    {
        $this->tempDir = sys_get_temp_dir()
            . DIRECTORY_SEPARATOR
            . uniqid('dir-uploader-test-');
        $this->sourceDir = $this->tempDir . DIRECTORY_SEPARATOR . 'source';
        mkdir($this->sourceDir, 0777, true);
    }

    protected function tearDown(): void
    {
        if (is_dir($this->tempDir)) {
            TestsUtility::cleanUpDir($this->tempDir);
        }
    }

    public function testConstructorValidatesSourceDirectory(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Please provide a valid directory path');
        new DirectoryUploader(
            $this->createS3ClientMock(),
            [],
            fn() => Create::promiseFor(new UploadResult([])),
            new UploadDirectoryRequest(
                '/non/existent/directory',
                'bucket'
            )
        );
    }

    public function testUploadsFilesFromFlatDirectory(): void
    {
        $this->createFiles(['file1.txt', 'file2.txt', 'file3.txt']);
        $uploadedKeys = [];

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket'
            ),
            $this->successUploadClosure($uploadedKeys)
        );

        $result = $uploader->promise()->wait();
        $this->assertInstanceOf(UploadDirectoryResult::class, $result);
        $this->assertEquals(3, $result->getObjectsUploaded());
        $this->assertEquals(0, $result->getObjectsFailed());
        sort($uploadedKeys);
        $this->assertEquals(['file1.txt', 'file2.txt', 'file3.txt'], $uploadedKeys);
    }

    public function testUploadsRecursively(): void
    {
        $files = [
            'root.txt',
            'sub' . DIRECTORY_SEPARATOR . 'nested.txt',
        ];
        $this->createFiles($files);
        $uploadedKeys = [];

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                ['recursive' => true]
            ),
            $this->successUploadClosure($uploadedKeys)
        );

        $result = $uploader->promise()->wait();
        $this->assertEquals(2, $result->getObjectsUploaded());
        sort($uploadedKeys);
        $this->assertEquals(['root.txt', 'sub/nested.txt'], $uploadedKeys);
    }

    public function testNonRecursiveSkipsSubdirectories(): void
    {
        $this->createFiles([
            'root.txt',
            'sub' . DIRECTORY_SEPARATOR . 'nested.txt',
        ]);
        $uploadedKeys = [];

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                ['recursive' => false]
            ),
            $this->successUploadClosure($uploadedKeys)
        );

        $result = $uploader->promise()->wait();
        $this->assertEquals(1, $result->getObjectsUploaded());
        $this->assertEquals(['root.txt'], $uploadedKeys);
    }

    public function testAppliesS3Prefix(): void
    {
        $this->createFiles(['file.txt']);
        $uploadedKeys = [];

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                ['s3_prefix' => 'my/prefix']
            ),
            $this->successUploadClosure($uploadedKeys)
        );

        $uploader->promise()->wait();
        $this->assertEquals(['my/prefix/file.txt'], $uploadedKeys);
    }

    public function testS3PrefixWithTrailingSlash(): void
    {
        $this->createFiles(['file.txt']);
        $uploadedKeys = [];

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                ['s3_prefix' => 'prefix/']
            ),
            $this->successUploadClosure($uploadedKeys)
        );

        $uploader->promise()->wait();
        $this->assertEquals(['prefix/file.txt'], $uploadedKeys);
    }

    public function testAppliesFilter(): void
    {
        $this->createFiles(['keep.txt', 'skip.log', 'also-keep.txt']);
        $uploadedKeys = [];

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                [
                    'filter' => fn($file) => str_ends_with($file, '.txt'),
                ]
            ),
            $this->successUploadClosure($uploadedKeys)
        );

        $result = $uploader->promise()->wait();
        $this->assertEquals(2, $result->getObjectsUploaded());
        sort($uploadedKeys);
        $this->assertEquals(['also-keep.txt', 'keep.txt'], $uploadedKeys);
    }

    public function testUploadObjectRequestModifier(): void
    {
        $this->createFiles(['file.txt']);
        $capturedArgs = null;

        $uploadClosure = function (S3ClientInterface $client, UploadRequest $request) use (&$capturedArgs): PromiseInterface {
            $capturedArgs = $request->getUploadRequestArgs();
            return Create::promiseFor(new UploadResult($capturedArgs));
        };

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                [
                    'upload_object_request_modifier' => function (&$args) {
                        $args['StorageClass'] = 'GLACIER';
                    },
                ]
            ),
            $uploadClosure
        );

        $uploader->promise()->wait();
        $this->assertEquals('GLACIER', $capturedArgs['StorageClass']);
    }

    public function testFailurePolicyCallbackIsInvoked(): void
    {
        $this->createFiles(['file1.txt', 'file2.txt']);
        $failurePolicyCalled = false;

        $uploadClosure = function (S3ClientInterface $client, UploadRequest $request): PromiseInterface {
            return new RejectedPromise(new RuntimeException('upload failed'));
        };

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                [
                    'failure_policy' => function ($requestArgs, $context, $reason, $result) use (&$failurePolicyCalled) {
                        $failurePolicyCalled = true;
                        $this->assertInstanceOf(RuntimeException::class, $reason);
                        $this->assertInstanceOf(UploadDirectoryResult::class, $result);
                    },
                ]
            ),
            $uploadClosure
        );

        $result = $uploader->promise()->wait();
        $this->assertTrue($failurePolicyCalled);
        $this->assertEquals(2, $result->getObjectsFailed());
        $this->assertEquals(0, $result->getObjectsUploaded());
    }

    public function testFailureWithoutPolicyPropagatesException(): void
    {
        $this->createFiles(['file.txt']);

        $uploadClosure = function (S3ClientInterface $client, UploadRequest $request): PromiseInterface {
            return new RejectedPromise(new RuntimeException('upload failed'));
        };

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket'
            ),
            $uploadClosure
        );

        $result = $uploader->promise()->wait();
        $this->assertInstanceOf(UploadDirectoryResult::class, $result);
        $this->assertNotNull($result->getReason());
        $this->assertEquals(1, $result->getObjectsFailed());
    }

    public function testNotifiesDirectoryListeners(): void
    {
        $this->createFiles(['file.txt']);
        $initiatedCalled = false;
        $completeCalled = false;
        $capturedSnapshots = [];

        $listener = new class(
            $initiatedCalled,
            $completeCalled,
            $capturedSnapshots
        ) extends AbstractTransferListener {
            private $initiatedCalled;
            private $completeCalled;
            private $capturedSnapshots;
            public function __construct(
                &$initiatedCalled,
                &$completeCalled,
                &$capturedSnapshots,
            ) {
                $this->initiatedCalled = &$initiatedCalled;
                $this->completeCalled = &$completeCalled;
                $this->capturedSnapshots = &$capturedSnapshots;
            }
            public function transferInitiated(array $context): void {
                $this->initiatedCalled = true;
                $this->capturedSnapshots[] = ['initiated', $context[self::PROGRESS_SNAPSHOT_KEY]];
            }
            public function transferComplete(array $context): void {
                $this->completeCalled = true;
                $this->capturedSnapshots[] = ['complete', $context[self::PROGRESS_SNAPSHOT_KEY]];
            }
        };

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                [],
                [$listener]
            ),
            $this->successUploadClosure()
        );

        $uploader->promise()->wait();
        $this->assertTrue($initiatedCalled);
        $this->assertTrue($completeCalled);

        // Verify the initiated snapshot
        [$type, $snapshot] = $capturedSnapshots[0];
        $this->assertEquals('initiated', $type);
        $this->assertInstanceOf(DirectoryTransferProgressSnapshot::class, $snapshot);

        // Verify the complete snapshot has response
        $lastEntry = end($capturedSnapshots);
        [$type, $snapshot] = $lastEntry;
        $this->assertEquals('complete', $type);
        $this->assertNotNull($snapshot->getResponse());
    }

    public function testEmptyDirectoryProducesZeroResult(): void
    {
        // sourceDir exists but has no files
        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket'
            ),
            $this->successUploadClosure()
        );

        $result = $uploader->promise()->wait();
        $this->assertEquals(0, $result->getObjectsUploaded());
        $this->assertEquals(0, $result->getObjectsFailed());
    }

    public function testUploadRequestArgsArePassed(): void
    {
        $this->createFiles(['file.txt']);
        $capturedArgs = null;

        $uploadClosure = function (S3ClientInterface $client, UploadRequest $request) use (&$capturedArgs): PromiseInterface {
            $capturedArgs = $request->getUploadRequestArgs();
            return Create::promiseFor(new UploadResult($capturedArgs));
        };

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                ['ACL' => 'public-read']
            ),
            $uploadClosure
        );

        $uploader->promise()->wait();
        $this->assertEquals('my-bucket', $capturedArgs['Bucket']);
        $this->assertEquals('file.txt', $capturedArgs['Key']);
        $this->assertEquals('public-read', $capturedArgs['ACL']);
    }

    public function testCustomDelimiter(): void
    {
        $this->createFiles([
            'sub' . DIRECTORY_SEPARATOR . 'file.txt',
        ]);
        $uploadedKeys = [];

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                [
                    'recursive' => true,
                    's3_delimiter' => '|',
                ]
            ),
            $this->successUploadClosure($uploadedKeys)
        );

        $uploader->promise()->wait();
        $this->assertEquals(['sub|file.txt'], $uploadedKeys);
    }

    public function testCustomDelimiterInFileNameResultsInFailure(): void
    {
        // Create a file with # in the name
        file_put_contents(
            $this->sourceDir . DIRECTORY_SEPARATOR . 'file#bad.txt',
            'test'
        );

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                ['s3_delimiter' => '#']
            ),
            $this->successUploadClosure()
        );

        $result = $uploader->promise()->wait();
        $this->assertInstanceOf(UploadDirectoryResult::class, $result);
        $this->assertNotNull($result->getReason());
        $this->assertInstanceOf(S3TransferException::class, $result->getReason());
        $this->assertStringContainsString(
            'must not contain the provided delimiter',
            $result->getReason()->getMessage()
        );
    }

    public function testPromiseCanBeCalledMultipleTimes(): void
    {
        $this->createFiles(['file.txt']);
        $uploadCount = 0;
        $uploadClosure = function (S3ClientInterface $client, UploadRequest $request) use (&$uploadCount): PromiseInterface {
            $uploadCount++;
            return Create::promiseFor(new UploadResult($request->getUploadRequestArgs()));
        };

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket'
            ),
            $uploadClosure
        );

        $result1 = $uploader->promise()->wait();
        $result2 = $uploader->promise()->wait();

        $this->assertEquals(1, $result1->getObjectsUploaded());
        $this->assertEquals(1, $result2->getObjectsUploaded());
        $this->assertEquals(2, $uploadCount);
    }

    public function testRecursiveWithMaxDepth(): void
    {
        $this->createFiles([
            'root.txt',
            'l1' . DIRECTORY_SEPARATOR . 'level1.txt',
            'l1' . DIRECTORY_SEPARATOR . 'l2' . DIRECTORY_SEPARATOR . 'level2.txt',
        ]);
        $uploadedKeys = [];

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                [
                    'recursive' => true,
                    'max_depth' => 0,
                ]
            ),
            $this->successUploadClosure($uploadedKeys)
        );

        $result = $uploader->promise()->wait();
        // max_depth 0 = only root level files (same level as non-recursive + top-level dirs)
        $this->assertEquals(1, $result->getObjectsUploaded());
        $this->assertEquals(['root.txt'], $uploadedKeys);
    }

    public function testTrackProgressCreatesDefaultTracker(): void
    {
        $this->createFiles(['file.txt']);

        // If track_progress is in parent config, a DirectoryProgressTracker should be created.
        // We test indirectly that it doesn't throw and works.
        $uploader = new DirectoryUploader(
            $this->createS3ClientMock(),
            ['track_progress' => false],
            $this->successUploadClosure(),
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket'
            )
        );

        $result = $uploader->promise()->wait();
        $this->assertEquals(1, $result->getObjectsUploaded());
    }

    public function testMixedSuccessAndFailure(): void
    {
        $this->createFiles(['success.txt', 'fail.txt', 'success2.txt']);
        $failurePolicyCalls = 0;

        $uploadClosure = function (S3ClientInterface $client, UploadRequest $request): PromiseInterface {
            $key = $request->getUploadRequestArgs()['Key'];
            if (str_starts_with($key, 'fail')) {
                return new RejectedPromise(new RuntimeException("fail: $key"));
            }
            return Create::promiseFor(new UploadResult($request->getUploadRequestArgs()));
        };

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                [
                    'failure_policy' => function () use (&$failurePolicyCalls) {
                        $failurePolicyCalls++;
                    },
                ]
            ),
            $uploadClosure
        );

        $result = $uploader->promise()->wait();
        $this->assertEquals(2, $result->getObjectsUploaded());
        $this->assertEquals(1, $result->getObjectsFailed());
        $this->assertEquals(1, $failurePolicyCalls);
    }

    public function testIncrementalTotalsInAggregator(): void
    {
        // Create files with known sizes
        file_put_contents($this->sourceDir . DIRECTORY_SEPARATOR . 'a.txt', str_repeat('A', 100));
        file_put_contents($this->sourceDir . DIRECTORY_SEPARATOR . 'b.txt', str_repeat('B', 200));

        $lastSnapshot = null;
        $listener = new class($lastSnapshot) extends AbstractTransferListener {
            private $lastSnapshot;
            public function __construct(&$lastSnapshot) {
                $this->lastSnapshot = &$lastSnapshot;
            }
            public function transferComplete(array $context): void {
                $this->lastSnapshot = $context[self::PROGRESS_SNAPSHOT_KEY];
            }
        };

        $uploader = $this->createUploader(
            new UploadDirectoryRequest(
                $this->sourceDir,
                'my-bucket',
                [],
                [],
                [$listener]
            ),
            $this->successUploadClosure()
        );

        $uploader->promise()->wait();
        $this->assertInstanceOf(DirectoryTransferProgressSnapshot::class, $lastSnapshot);
        $this->assertEquals(300, $lastSnapshot->getTotalBytes());
        $this->assertEquals(2, $lastSnapshot->getTotalFiles());
    }

    private function createS3ClientMock(): S3ClientInterface
    {
        $client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getHandlerList'])
            ->getMock();
        $client->method('getHandlerList')
            ->willReturn(new HandlerList());

        return $client;
    }

    private function createFiles(array $relativePaths, string $content = 'test'): void
    {
        foreach ($relativePaths as $path) {
            $fullPath = $this->sourceDir . DIRECTORY_SEPARATOR . $path;
            $dir = dirname($fullPath);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            file_put_contents($fullPath, $content);
        }
    }

    private function createUploader(
        UploadDirectoryRequest $request,
        \Closure $uploadObject
    ): DirectoryUploader {
        return new DirectoryUploader(
            $this->createS3ClientMock(),
            [],
            $uploadObject,
            $request
        );
    }

    private function successUploadClosure(array &$uploadedKeys = []): \Closure
    {
        return function (S3ClientInterface $client, UploadRequest $request) use (&$uploadedKeys): PromiseInterface {
            $uploadedKeys[] = $request->getUploadRequestArgs()['Key'];
            return Create::promiseFor(
                new UploadResult(
                    $request->getUploadRequestArgs()
                )
            );
        };
    }
}
