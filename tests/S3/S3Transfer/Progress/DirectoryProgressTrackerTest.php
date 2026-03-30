<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Exception\ProgressTrackerException;
use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\Progress\ConsoleProgressBar;
use Aws\S3\S3Transfer\Progress\DirectoryProgressTracker;
use Aws\S3\S3Transfer\Progress\DirectoryTransferProgressSnapshot;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DirectoryProgressTracker::class)]
final class DirectoryProgressTrackerTest extends TestCase
{
    /** @var resource */
    private $outputStream;

    protected function setUp(): void
    {
        $this->outputStream = fopen('php://memory', 'r+');
    }

    protected function tearDown(): void
    {
        if (is_resource($this->outputStream)) {
            fclose($this->outputStream);
        }
    }

    public function testConstructorThrowsOnNonStreamOutput(): void
    {
        $this->expectException(\TypeError::class);
        new DirectoryProgressTracker(
            new ConsoleProgressBar(),
            'not-a-stream'
        );
    }

    public function testGetProgressBar(): void
    {
        $bar = new ConsoleProgressBar();
        $tracker = new DirectoryProgressTracker(
            $bar,
            $this->outputStream
        );
        $this->assertSame($bar, $tracker->getProgressBar());
    }

    public function testTransferInitiatedSetsSnapshotAndWritesOutput(): void
    {
        $tracker = $this->createTracker();
        $snapshot = $this->makeSnapshot(0, 1000, 0, 5, 'upload:/src->bucket/prefix');

        $tracker->transferInitiated([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $output = $this->readOutput();
        $this->assertNotEmpty($output);
    }

    public function testBytesTransferredUpdatesProgressAndReturnsTrue(): void
    {
        $tracker = $this->createTracker();
        $snapshot = $this->makeSnapshot(50, 100);

        $result = $tracker->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $this->assertTrue($result);
        $this->assertEquals(50, $tracker->getProgressBar()->getPercentCompleted());
    }

    public function testTransferCompleteForces100Percent(): void
    {
        $tracker = $this->createTracker();
        $snapshot = $this->makeSnapshot(90, 100);

        $tracker->transferComplete([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $this->assertEquals(100, $tracker->getProgressBar()->getPercentCompleted());
    }

    public function testTransferFailUpdatesProgress(): void
    {
        $tracker = $this->createTracker();
        $snapshot = $this->makeSnapshot(30, 100);

        $tracker->transferFail([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $this->assertEquals(30, $tracker->getProgressBar()->getPercentCompleted());
    }

    public function testShowProgressThrowsWithoutSnapshot(): void
    {
        $tracker = $this->createTracker();

        $this->expectException(ProgressTrackerException::class);
        $this->expectExceptionMessage('There is not snapshot to show progress for');
        $tracker->showProgress();
    }

    public function testShowProgressWritesOutput(): void
    {
        $tracker = $this->createTracker();
        $snapshot = $this->makeSnapshot(25, 100);

        $tracker->transferInitiated([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        // Clear the output buffer to test showProgress in isolation
        rewind($this->outputStream);
        ftruncate($this->outputStream, 0);

        $tracker->showProgress();
        $output = $this->readOutput();
        $this->assertNotEmpty($output);
    }

    public function testClearOptionWritesEscapeSequences(): void
    {
        $tracker = $this->createTracker(clear: true);
        $snapshot = $this->makeSnapshot(50, 100);

        $tracker->transferInitiated([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $output = $this->readOutput();
        $this->assertStringContainsString("\033[2J\033[H", $output);
    }

    public function testNoClearOptionDoesNotWriteEscapeSequences(): void
    {
        $tracker = $this->createTracker(clear: false);
        $snapshot = $this->makeSnapshot(50, 100);

        $tracker->transferInitiated([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $output = $this->readOutput();
        $this->assertStringNotContainsString("\033[2J\033[H", $output);
    }

    public function testShowProgressOnUpdateFalseDoesNotWriteOutput(): void
    {
        $tracker = $this->createTracker(showProgressOnUpdate: false);
        $snapshot = $this->makeSnapshot(50, 100);

        $tracker->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $output = $this->readOutput();
        $this->assertEmpty($output);
    }

    public function testProgressPercentFloors(): void
    {
        $tracker = $this->createTracker();
        // 33 / 100 = 0.33 -> floor(33) = 33%
        $snapshot = $this->makeSnapshot(33, 100);

        $tracker->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $this->assertEquals(33, $tracker->getProgressBar()->getPercentCompleted());
    }

    public function testZeroTotalBytesResultsInZeroPercent(): void
    {
        $tracker = $this->createTracker();
        $snapshot = $this->makeSnapshot(0, 0);

        $tracker->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $this->assertEquals(0, $tracker->getProgressBar()->getPercentCompleted());
    }

    public function testTransferredBytesClampedToTotalInProgressBarFormat(): void
    {
        $tracker = $this->createTracker(showProgressOnUpdate: false);
        // Transferred exceeds total (edge case)
        $snapshot = $this->makeSnapshot(150, 100);

        $tracker->bytesTransferred([
            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => $snapshot,
        ]);

        $format = $tracker->getProgressBar()->getProgressBarFormat();
        $args = $format->getArgs();
        // transferred should be clamped to min(150, 100) = 100
        $this->assertEquals(100, $args['transferred']);
        $this->assertEquals(100, $args['to_be_transferred']);
    }

    public function testInitialSnapshotInConstructor(): void
    {
        $snapshot = $this->makeSnapshot(25, 200, 1, 4, 'pre-init');
        $tracker = $this->createTracker(snapshot: $snapshot);

        // showProgress should work since snapshot was provided at construction
        $tracker->showProgress();
        $output = $this->readOutput();
        $this->assertNotEmpty($output);
    }

    private function readOutput(): string
    {
        rewind($this->outputStream);
        return stream_get_contents($this->outputStream);
    }

    private function createTracker(
        bool $clear = false,
        bool $showProgressOnUpdate = true,
        ?DirectoryTransferProgressSnapshot $snapshot = null
    ): DirectoryProgressTracker {
        return new DirectoryProgressTracker(
            new ConsoleProgressBar(),
            $this->outputStream,
            $clear,
            $snapshot,
            $showProgressOnUpdate
        );
    }

    private function makeSnapshot(
        int $transferredBytes = 0,
        int $totalBytes = 100,
        int $transferredFiles = 0,
        int $totalFiles = 1,
        string $identifier = 'test-id'
    ): DirectoryTransferProgressSnapshot {
        return new DirectoryTransferProgressSnapshot(
            $identifier,
            $transferredBytes,
            $totalBytes,
            $transferredFiles,
            $totalFiles
        );
    }
}
