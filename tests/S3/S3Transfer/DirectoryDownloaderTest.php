<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\Api\Service;
use Aws\CommandInterface;
use Aws\HandlerList;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\DirectoryDownloader;
use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadDirectoryRequest;
use Aws\S3\S3Transfer\Models\DownloadDirectoryResult;
use Aws\S3\S3Transfer\Models\DownloadFileRequest;
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

#[CoversClass(DirectoryDownloader::class)]
final class DirectoryDownloaderTest extends TestCase
{
    private string $tempDir;
    private string $destDir;

    protected function setUp(): void
    {
        $this->tempDir = sys_get_temp_dir()
            . DIRECTORY_SEPARATOR
            . uniqid('dir-downloader-test-');
        $this->destDir = $this->tempDir . DIRECTORY_SEPARATOR . 'dest';
        mkdir($this->destDir, 0777, true);
    }

    protected function tearDown(): void
    {
        if (is_dir($this->tempDir)) {
            TestsUtility::cleanUpDir($this->tempDir);
        }
    }

    public function testCreatesDestinationDirectory(): void
    {
        $newDest = $this->tempDir . DIRECTORY_SEPARATOR . 'new-dest';

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock([]),
            ['track_progress' => false],
            $this->successDownloadClosure(),
            new DownloadDirectoryRequest(
                'my-bucket',
                $newDest
            )
        );

        $downloader->promise()->wait();
        $this->assertDirectoryExists($newDest);
    }

    public function testDownloadsObjectsToDestination(): void
    {
        $objects = [
            ['Key' => 'file1.txt', 'Size' => 100],
            ['Key' => 'file2.txt', 'Size' => 200],
        ];
        $downloadedDestinations = [];

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $this->successDownloadClosure($downloadedDestinations),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir
            )
        );

        $result = $downloader->promise()->wait();
        $this->assertInstanceOf(DownloadDirectoryResult::class, $result);
        $this->assertEquals(2, $result->getObjectsDownloaded());
        $this->assertEquals(0, $result->getObjectsFailed());
        $this->assertCount(2, $downloadedDestinations);
    }

    public function testSkipsDirectoryMarkers(): void
    {
        $objects = [
            ['Key' => 'dir/', 'Size' => 0],
            ['Key' => 'dir/file.txt', 'Size' => 50],
            ['Key' => 'another/', 'Size' => 0],
        ];
        $downloadedDestinations = [];

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $this->successDownloadClosure($downloadedDestinations),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir
            )
        );

        $result = $downloader->promise()->wait();
        $this->assertEquals(1, $result->getObjectsDownloaded());
    }

    public function testAppliesS3Prefix(): void
    {
        $objects = [
            ['Key' => 'prefix/file1.txt', 'Size' => 100],
            ['Key' => 'prefix/sub/file2.txt', 'Size' => 200],
        ];
        $downloadedDestinations = [];

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $this->successDownloadClosure($downloadedDestinations),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
                [],
                ['s3_prefix' => 'prefix']
            )
        );

        $result = $downloader->promise()->wait();
        $this->assertEquals(2, $result->getObjectsDownloaded());

        // Check the prefix was stripped from destination paths
        sort($downloadedDestinations);
        $expected = [
            $this->destDir . DIRECTORY_SEPARATOR . 'file1.txt',
            $this->destDir . DIRECTORY_SEPARATOR . 'sub' . DIRECTORY_SEPARATOR . 'file2.txt',
        ];
        sort($expected);
        $this->assertEquals($expected, $downloadedDestinations);
    }

    public function testAppliesFilter(): void
    {
        $objects = [
            ['Key' => 'keep.txt', 'Size' => 100],
            ['Key' => 'skip.log', 'Size' => 50],
            ['Key' => 'also-keep.txt', 'Size' => 75],
        ];
        $downloadedDestinations = [];

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $this->successDownloadClosure($downloadedDestinations),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
                [],
                [
                    'filter' => fn($key) => str_ends_with($key, '.txt'),
                ]
            )
        );

        $result = $downloader->promise()->wait();
        $this->assertEquals(2, $result->getObjectsDownloaded());
    }

    public function testFailurePolicyIsInvoked(): void
    {
        $objects = [
            ['Key' => 'file1.txt', 'Size' => 100],
            ['Key' => 'file2.txt', 'Size' => 200],
        ];
        $failurePolicyCalls = 0;

        $failClosure = function (S3ClientInterface $client, DownloadFileRequest $request): PromiseInterface {
            return new RejectedPromise(new RuntimeException('download failed'));
        };

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $failClosure,
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
                [],
                [
                    'failure_policy' => function ($requestArgs, $context, $reason, $result) use (&$failurePolicyCalls) {
                        $failurePolicyCalls++;
                        $this->assertInstanceOf(RuntimeException::class, $reason);
                        $this->assertInstanceOf(DownloadDirectoryResult::class, $result);
                    },
                ]
            )
        );

        $result = $downloader->promise()->wait();
        $this->assertEquals(2, $failurePolicyCalls);
        $this->assertEquals(0, $result->getObjectsDownloaded());
        $this->assertEquals(2, $result->getObjectsFailed());
    }

    public function testFailureWithoutPolicyResultsInError(): void
    {
        $objects = [
            ['Key' => 'file.txt', 'Size' => 100],
        ];

        $failClosure = function (S3ClientInterface $client, DownloadFileRequest $request): PromiseInterface {
            return new RejectedPromise(new RuntimeException('download failed'));
        };

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $failClosure,
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
            )
        );

        $result = $downloader->promise()->wait();
        $this->assertNotNull($result->getReason());
        $this->assertEquals(1, $result->getObjectsFailed());
    }

    public function testNotifiesDirectoryListeners(): void
    {
        $objects = [
            ['Key' => 'file.txt', 'Size' => 100],
        ];
        $initiatedCalled = false;
        $completeCalled = false;

        $listener = new class($initiatedCalled, $completeCalled) extends AbstractTransferListener {
            private $initiatedCalled;
            private $completeCalled;
            public function __construct(&$initiatedCalled, &$completeCalled) {
                $this->initiatedCalled = &$initiatedCalled;
                $this->completeCalled = &$completeCalled;
            }
            public function transferInitiated(array $context): void {
                $this->initiatedCalled = true;
            }
            public function transferComplete(array $context): void {
                $this->completeCalled = true;
            }
        };

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $this->successDownloadClosure(),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
                [],
                [],
                [$listener]
            )
        );

        $downloader->promise()->wait();
        $this->assertTrue($initiatedCalled);
        $this->assertTrue($completeCalled);
    }

    public function testEmptyBucketProducesZeroResult(): void
    {
        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock([]),
            ['track_progress' => false],
            $this->successDownloadClosure(),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
            )
        );

        $result = $downloader->promise()->wait();
        $this->assertEquals(0, $result->getObjectsDownloaded());
        $this->assertEquals(0, $result->getObjectsFailed());
    }

    public function testResolvesOutsideTargetDirectoryResultsInFailure(): void
    {
        $objects = [
            ['Key' => '../../etc/passwd', 'Size' => 100],
        ];

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $this->successDownloadClosure(),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
            )
        );

        $result = $downloader->promise()->wait();
        $this->assertInstanceOf(DownloadDirectoryResult::class, $result);
        $this->assertNotNull($result->getReason());
        $this->assertInstanceOf(S3TransferException::class, $result->getReason());
        $this->assertStringContainsString(
            'resolves outside the parent directory',
            $result->getReason()->getMessage()
        );
    }

    public function testDownloadObjectRequestModifierIsCalled(): void
    {
        $objects = [
            ['Key' => 'file.txt', 'Size' => 100],
        ];
        $modifierCalled = false;
        $receivedBucket = null;

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $this->successDownloadClosure(),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
                ['CustomParam' => 'CustomValue'],
                [
                    'download_object_request_modifier' => function ($args) use (&$modifierCalled, &$receivedBucket) {
                        $modifierCalled = true;
                        $receivedBucket = $args['Bucket'];
                    },
                ]
            )
        );

        $downloader->promise()->wait();
        $this->assertTrue($modifierCalled);
        $this->assertEquals('my-bucket', $receivedBucket);
    }

    public function testIncrementalTotals(): void
    {
        $objects = [
            ['Key' => 'a.txt', 'Size' => 100],
            ['Key' => 'b.txt', 'Size' => 200],
            ['Key' => 'c.txt', 'Size' => 300],
        ];

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

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $this->successDownloadClosure(),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
                [],
                [],
                [$listener]
            )
        );

        $downloader->promise()->wait();
        $this->assertInstanceOf(DirectoryTransferProgressSnapshot::class, $lastSnapshot);
        $this->assertEquals(600, $lastSnapshot->getTotalBytes());
        $this->assertEquals(3, $lastSnapshot->getTotalFiles());
    }

    public function testMixedSuccessAndFailure(): void
    {
        $objects = [
            ['Key' => 'good.txt', 'Size' => 100],
            ['Key' => 'bad.txt', 'Size' => 50],
            ['Key' => 'good2.txt', 'Size' => 200],
        ];
        $failurePolicyCalls = 0;

        $downloadClosure = function (S3ClientInterface $client, DownloadFileRequest $request)
        use (&$failurePolicyCalls): PromiseInterface {
            $dest = $request->getDestination();
            if (str_contains($dest, 'bad')) {
                return new RejectedPromise(new RuntimeException('download failed'));
            }
            $dir = dirname($dest);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            file_put_contents($dest, 'ok');
            return Create::promiseFor(null);
        };

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $downloadClosure,
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
                [],
                [
                    'failure_policy' => function () use (&$failurePolicyCalls) {
                        $failurePolicyCalls++;
                    },
                ]
            )
        );

        $result = $downloader->promise()->wait();
        $this->assertEquals(2, $result->getObjectsDownloaded());
        $this->assertEquals(1, $result->getObjectsFailed());
        $this->assertEquals(1, $failurePolicyCalls);
    }

    public function testDownloadRequestArgsArePassed(): void
    {
        $objects = [
            ['Key' => 'file.txt', 'Size' => 100],
        ];
        $capturedArgs = null;

        $downloadClosure = function (S3ClientInterface $client, DownloadFileRequest $request) use (&$capturedArgs): PromiseInterface {
            $capturedArgs = $request->getDownloadRequest()->getObjectRequestArgs();
            $dest = $request->getDestination();
            $dir = dirname($dest);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            file_put_contents($dest, 'ok');
            return Create::promiseFor(null);
        };

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $downloadClosure,
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
                ['ChecksumMode' => 'ENABLED']
            )
        );

        $downloader->promise()->wait();
        $this->assertEquals('my-bucket', $capturedArgs['Bucket']);
        $this->assertEquals('file.txt', $capturedArgs['Key']);
        $this->assertEquals('ENABLED', $capturedArgs['ChecksumMode']);
    }

    public function testS3PrefixWithTrailingSlash(): void
    {
        $objects = [
            ['Key' => 'myprefix/file.txt', 'Size' => 100],
        ];
        $downloadedDestinations = [];

        $downloader = new DirectoryDownloader(
            $this->createS3ClientMock($objects),
            ['track_progress' => false],
            $this->successDownloadClosure($downloadedDestinations),
            new DownloadDirectoryRequest(
                'my-bucket',
                $this->destDir,
                [],
                ['s3_prefix' => 'myprefix/']
            )
        );

        $downloader->promise()->wait();
        $expected = $this->destDir . DIRECTORY_SEPARATOR . 'file.txt';
        $this->assertEquals([$expected], $downloadedDestinations);
    }

    /**
     * Creates a mock S3Client that returns the given objects from ListObjectsV2.
     *
     * @param array $listObjects Array of ['Key' => ..., 'Size' => ...] items
     */
    private function createS3ClientMock(array $listObjects = []): S3ClientInterface
    {
        $client = $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods([
                'getHandlerList',
                'getCommand',
                'executeAsync',
                'getApi',
            ])
            ->getMock();

        $client->method('getHandlerList')
            ->willReturn(new HandlerList());

        $client->method('getCommand')
            ->willReturnCallback(function ($name, $args) {
                return new \Aws\Command($name, $args);
            });

        $client->method('executeAsync')
            ->willReturnCallback(function (CommandInterface $command) use ($listObjects) {
                if ($command->getName() === 'ListObjectsV2') {
                    return Create::promiseFor(new Result([
                        'Contents' => $listObjects,
                    ]));
                }
                return Create::promiseFor(new Result([]));
            });

        $service = $this->getMockBuilder(Service::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getPaginatorConfig'])
            ->getMock();
        $service->method('getPaginatorConfig')
            ->willReturn([
                'input_token'  => null,
                'output_token' => null,
                'limit_key'    => null,
                'result_key'   => null,
                'more_results' => null,
            ]);
        $client->method('getApi')->willReturn($service);

        return $client;
    }

    private function successDownloadClosure(array &$downloadedDestinations = []): \Closure
    {
        return function (S3ClientInterface $client, DownloadFileRequest $request)
        use (&$downloadedDestinations): PromiseInterface {
            $dest = $request->getDestination();
            $downloadedDestinations[] = $dest;
            // Create the file to simulate download
            $dir = dirname($dest);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            file_put_contents($dest, 'downloaded');
            return Create::promiseFor(null);
        };
    }
}
