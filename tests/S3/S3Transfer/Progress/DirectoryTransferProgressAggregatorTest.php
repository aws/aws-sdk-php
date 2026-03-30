<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\Progress\DirectoryTransferProgressAggregator;
use Aws\S3\S3Transfer\Progress\DirectoryTransferProgressSnapshot;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DirectoryTransferProgressAggregator::class)]
final class DirectoryTransferProgressAggregatorTest extends TestCase
{
    public function testInitialSnapshotHasZeroProgress(): void
    {
        $aggregator = $this->createAggregator(1000, 5);
        $snapshot = $aggregator->getSnapshot();

        $this->assertInstanceOf(DirectoryTransferProgressSnapshot::class, $snapshot);
        $this->assertEquals(0, $snapshot->getTransferredBytes());
        $this->assertEquals(1000, $snapshot->getTotalBytes());
        $this->assertEquals(0, $snapshot->getTransferredFiles());
        $this->assertEquals(5, $snapshot->getTotalFiles());
    }

    public function testIncrementTotals(): void
    {
        $aggregator = $this->createAggregator(0, 0);

        $aggregator->incrementTotals(500);
        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(500, $snapshot->getTotalBytes());
        $this->assertEquals(1, $snapshot->getTotalFiles());

        $aggregator->incrementTotals(300, 2);
        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(800, $snapshot->getTotalBytes());
        $this->assertEquals(3, $snapshot->getTotalFiles());
    }

    public function testBytesTransferredAggregatesProgress(): void
    {
        $aggregator = $this->createAggregator(1000, 2);

        // First object: 100 bytes
        $aggregator->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 100, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(100, $snapshot->getTransferredBytes());
        $this->assertEquals(0, $snapshot->getTransferredFiles());

        // First object: 300 bytes (delta = 200)
        $aggregator->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 300, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(300, $snapshot->getTransferredBytes());

        // Second object: 200 bytes
        $aggregator->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-2', 200, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(500, $snapshot->getTransferredBytes());
    }

    public function testBytesTransferredReturnsTrueAlways(): void
    {
        $aggregator = $this->createAggregator();
        $result = $aggregator->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj', 10, 100),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);
        $this->assertTrue($result);
    }

    public function testNegativeDeltaIsIgnored(): void
    {
        $aggregator = $this->createAggregator(1000, 1);

        $aggregator->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 200, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        // Same object reports fewer bytes (should not happen, but guarded)
        $aggregator->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 100, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(200, $snapshot->getTransferredBytes());
    }

    public function testTransferCompleteIncrementsFiles(): void
    {
        $aggregator = $this->createAggregator(1000, 2);

        $aggregator->transferComplete([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 500, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(500, $snapshot->getTransferredBytes());
        $this->assertEquals(1, $snapshot->getTransferredFiles());

        $aggregator->transferComplete([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-2', 500, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(1000, $snapshot->getTransferredBytes());
        $this->assertEquals(2, $snapshot->getTransferredFiles());
    }

    public function testTransferCompleteIsIdempotentForSameObject(): void
    {
        $aggregator = $this->createAggregator(1000, 2);

        $aggregator->transferComplete([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 500, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        // Calling complete again for the same object should not double-count
        $aggregator->transferComplete([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 500, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(1, $snapshot->getTransferredFiles());
    }

    public function testTransferFailIncrementsFiles(): void
    {
        $aggregator = $this->createAggregator(1000, 2);

        $aggregator->transferFail([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 200, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
            AbstractTransferListener::REASON_KEY => new \RuntimeException('fail'),
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(200, $snapshot->getTransferredBytes());
        $this->assertEquals(1, $snapshot->getTransferredFiles());
    }

    public function testTransferFailIsIdempotentForSameObject(): void
    {
        $aggregator = $this->createAggregator(500, 1);

        $aggregator->transferFail([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 100, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $aggregator->transferFail([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 100, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $this->assertEquals(1, $aggregator->getSnapshot()->getTransferredFiles());
    }

    public function testNotifyDirectoryInitiatedForwardsToListeners(): void
    {
        $initiated = false;
        $capturedSnapshot = null;
        $listener = new class($initiated, $capturedSnapshot) extends AbstractTransferListener {
            private $initiated;
            private $capturedSnapshot;
            public function __construct(&$initiated, &$capturedSnapshot) {
                $this->initiated = &$initiated;
                $this->capturedSnapshot = &$capturedSnapshot;
            }
            public function transferInitiated(array $context): void {
                $this->initiated = true;
                $this->capturedSnapshot = $context[self::PROGRESS_SNAPSHOT_KEY];
            }
        };

        $aggregator = $this->createAggregator(100, 2, [$listener]);
        $aggregator->notifyDirectoryInitiated([
            'source_directory' => '/src',
            'bucket' => 'my-bucket',
        ]);

        $this->assertTrue($initiated);
        $this->assertInstanceOf(DirectoryTransferProgressSnapshot::class, $capturedSnapshot);
        $this->assertEquals(100, $capturedSnapshot->getTotalBytes());
    }

    public function testNotifyDirectoryCompleteForwardsToListeners(): void
    {
        $completed = false;
        $capturedSnapshot = null;
        $listener = new class($completed, $capturedSnapshot) extends AbstractTransferListener {
            private $completed;
            private $capturedSnapshot;
            public function __construct(&$completed, &$capturedSnapshot) {
                $this->completed = &$completed;
                $this->capturedSnapshot = &$capturedSnapshot;
            }
            public function transferComplete(array $context): void {
                $this->completed = true;
                $this->capturedSnapshot = $context[self::PROGRESS_SNAPSHOT_KEY];
            }
        };

        $aggregator = $this->createAggregator(100, 1, [$listener]);
        $aggregator->notifyDirectoryComplete(['objects_uploaded' => 1]);

        $this->assertTrue($completed);
        $this->assertEquals(['objects_uploaded' => 1], $capturedSnapshot->getResponse());
    }

    public function testNotifyDirectoryCompleteWithoutResponse(): void
    {
        $capturedSnapshot = null;
        $listener = new class($capturedSnapshot) extends AbstractTransferListener {
            private $capturedSnapshot;
            public function __construct(&$capturedSnapshot) {
                $this->capturedSnapshot = &$capturedSnapshot;
            }
            public function transferComplete(array $context): void {
                $this->capturedSnapshot = $context[self::PROGRESS_SNAPSHOT_KEY];
            }
        };

        $aggregator = $this->createAggregator(100, 1, [$listener]);
        $aggregator->notifyDirectoryComplete();

        $this->assertNull($capturedSnapshot->getResponse());
    }

    public function testNotifyDirectoryFailForwardsToListeners(): void
    {
        $failed = false;
        $capturedReason = null;
        $listener = new class($failed, $capturedReason) extends AbstractTransferListener {
            private $failed;
            private $capturedReason;
            public function __construct(&$failed, &$capturedReason) {
                $this->failed = &$failed;
                $this->capturedReason = &$capturedReason;
            }
            public function transferFail(array $context): void {
                $this->failed = true;
                $this->capturedReason = $context[self::REASON_KEY];
            }
        };

        $exception = new \RuntimeException('directory fail');
        $aggregator = $this->createAggregator(100, 1, [$listener]);
        $aggregator->notifyDirectoryFail($exception);

        $this->assertTrue($failed);
        $this->assertSame($exception, $capturedReason);
    }

    public function testProgressTrackerIsAddedAsListener(): void
    {
        $initiated = false;
        $tracker = new class($initiated) extends AbstractTransferListener {
            private $initiated;
            public function __construct(&$initiated) {
                $this->initiated = &$initiated;
            }
            public function transferInitiated(array $context): void {
                $this->initiated = true;
            }
        };

        $aggregator = new DirectoryTransferProgressAggregator(
            'id',
            100,
            1,
            [],
            $tracker
        );
        $aggregator->notifyDirectoryInitiated(['source_directory' => '/src']);

        $this->assertTrue($initiated);
    }

    public function testBytesTransferredForwardsDirectorySnapshotToListeners(): void
    {
        $capturedSnapshot = null;
        $listener = new class($capturedSnapshot) extends AbstractTransferListener {
            private $capturedSnapshot;
            public function __construct(&$capturedSnapshot) {
                $this->capturedSnapshot = &$capturedSnapshot;
            }
            public function bytesTransferred(array $context): bool {
                $this->capturedSnapshot = $context[self::PROGRESS_SNAPSHOT_KEY];
                return true;
            }
        };

        $aggregator = $this->createAggregator(1000, 2, [$listener]);
        $aggregator->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 100, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $this->assertInstanceOf(DirectoryTransferProgressSnapshot::class, $capturedSnapshot);
        $this->assertEquals(100, $capturedSnapshot->getTransferredBytes());
    }

    public function testMultipleObjectProgressAggregation(): void
    {
        $aggregator = $this->createAggregator(0, 0);

        // Simulate incremental totals (streaming discovery)
        $aggregator->incrementTotals(500);
        $aggregator->incrementTotals(300);
        $aggregator->incrementTotals(200);

        // Object 1 progress
        $aggregator->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 250, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        // Object 2 progress
        $aggregator->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-2', 150, 300),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(1000, $snapshot->getTotalBytes());
        $this->assertEquals(3, $snapshot->getTotalFiles());
        $this->assertEquals(400, $snapshot->getTransferredBytes());
        $this->assertEquals(0, $snapshot->getTransferredFiles());

        // Complete objects
        $aggregator->transferComplete([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-1', 500, 500),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $aggregator->transferFail([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-2', 150, 300),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $aggregator->transferComplete([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY =>
                $this->makeObjectSnapshot('obj-3', 200, 200),
            AbstractTransferListener::REQUEST_ARGS_KEY => [],
        ]);

        $snapshot = $aggregator->getSnapshot();
        $this->assertEquals(850, $snapshot->getTransferredBytes());
        $this->assertEquals(3, $snapshot->getTransferredFiles());
    }

    private function createAggregator(
        int $totalBytes = 1000,
        int $totalFiles = 5,
        array $directoryListeners = [],
        ?AbstractTransferListener $progressTracker = null
    ): DirectoryTransferProgressAggregator {
        return new DirectoryTransferProgressAggregator(
            'test-dir-id',
            $totalBytes,
            $totalFiles,
            $directoryListeners,
            $progressTracker
        );
    }

    private function makeObjectSnapshot(
        string $identifier,
        int $transferredBytes,
        int $totalBytes
    ): TransferProgressSnapshot {
        return new TransferProgressSnapshot(
            $identifier,
            $transferredBytes,
            $totalBytes
        );
    }
}
