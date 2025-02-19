<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\S3\S3Transfer\DefaultProgressTracker;
use Aws\S3\S3Transfer\TransferListener;
use PHPUnit\Framework\TestCase;

/**
 * Tests the default progress tracker.
 */
class DefaultProgressTrackerTest extends TestCase
{
    private DefaultProgressTracker $progressTracker;
    private $output;

    protected function setUp(): void
    {
        $this->progressTracker = new DefaultProgressTracker(
            output: $this->output = fopen('php://temp', 'r+')
        );
    }

    protected function tearDown(): void {
        fclose($this->output);
    }

    /**
     * Tests initialization is clean.
     *
     * @return void
     */
    public function testInitialization(): void
    {
        $this->assertInstanceOf(TransferListener::class, $this->progressTracker->getTransferListener());
        $this->assertEquals(0, $this->progressTracker->getTotalBytesTransferred());
        $this->assertEquals(0, $this->progressTracker->getObjectsTotalSizeInBytes());
        $this->assertEquals(0, $this->progressTracker->getObjectsInProgress());
        $this->assertEquals(0, $this->progressTracker->getObjectsCount());
        $this->assertEquals(0, $this->progressTracker->getTransferPercentCompleted());
    }

    /**
     * Tests object transfer is initiated when the event is triggered.
     *
     * @return void
     */
    public function testObjectTransferInitiated(): void
    {
        $listener = $this->progressTracker->getTransferListener();
        $fakeRequestArgs = [];
        ($listener->onObjectTransferInitiated)('FooObjectKey', $fakeRequestArgs);

        $this->assertEquals(1, $this->progressTracker->getObjectsInProgress());
        $this->assertEquals(1, $this->progressTracker->getObjectsCount());
    }

    /**
     * Tests object transfer progress is propagated correctly.
     *
     * @dataProvider objectTransferProgressProvider
     *
     * @param string $objectKey
     * @param int $objectSize
     * @param array $progressList
     *
     * @return void
     */
    public function testObjectTransferProgress(
        string $objectKey,
        int $objectSize,
        array $progressList,
    ): void
    {
        $listener = $this->progressTracker->getTransferListener();
        $fakeRequestArgs = [];
        ($listener->onObjectTransferInitiated)($objectKey, $fakeRequestArgs);
        $totalProgress = 0;
        foreach ($progressList as $progress) {
            ($listener->onObjectTransferProgress)($objectKey, $progress, $objectSize);
            $totalProgress += $progress;
        }

        $this->assertEquals($totalProgress, $this->progressTracker->getTotalBytesTransferred());
        $this->assertEquals($objectSize, $this->progressTracker->getObjectsTotalSizeInBytes());
        $percentCompleted = (int) floor($totalProgress / $objectSize) * 100;
        $this->assertEquals($percentCompleted, $this->progressTracker->getTransferPercentCompleted());

        rewind($this->output);
        $this->assertStringContainsString("$percentCompleted% $totalProgress/$objectSize B", stream_get_contents($this->output));
    }

    /**
     * Data provider for testing object progress tracker.
     *
     * @return array[]
     */
    public function objectTransferProgressProvider(): array
    {
        return [
            [
                'objectKey' => 'FooObjectKey',
                'objectSize' => 250,
                'progressList' => [
                    50, 100, 72, 28
                ]
            ],
            [
                'objectKey' => 'FooObjectKey',
                'objectSize' => 10_000,
                'progressList' => [
                    100, 500, 1_000, 2_000, 5_000, 400, 700, 300
                ]
            ],
            [
                'objectKey' => 'FooObjectKey',
                'objectSize' => 10_000,
                'progressList' => [
                    5_000, 5_000
                ]
            ]
        ];
    }

    /**
     * Tests object transfer is completed.
     *
     * @return void
     */
    public function testObjectTransferCompleted(): void
    {
        $listener = $this->progressTracker->getTransferListener();
        $fakeRequestArgs = [];
        ($listener->onObjectTransferInitiated)('FooObjectKey', $fakeRequestArgs);
        ($listener->onObjectTransferProgress)('FooObjectKey', 50, 100);
        ($listener->onObjectTransferProgress)('FooObjectKey', 50, 100);
        ($listener->onObjectTransferCompleted)('FooObjectKey', 100);

        $this->assertEquals(100, $this->progressTracker->getTotalBytesTransferred());
        $this->assertEquals(100, $this->progressTracker->getTransferPercentCompleted());

        // Validate it completed 100% at the progress bar side.
        rewind($this->output);
        $this->assertStringContainsString("[#########################] 100% 100/100 B", stream_get_contents($this->output));
    }

    /**
     * Tests object transfer failed.
     *
     * @return void
     */
    public function testObjectTransferFailed(): void
    {
        $listener = $this->progressTracker->getTransferListener();
        $fakeRequestArgs = [];
        ($listener->onObjectTransferInitiated)('FooObjectKey', $fakeRequestArgs);
        ($listener->onObjectTransferProgress)('FooObjectKey', 27, 100);
        ($listener->onObjectTransferFailed)('FooObjectKey', 27, 'Transfer error');

        $this->assertEquals(27, $this->progressTracker->getTotalBytesTransferred());
        $this->assertEquals(27, $this->progressTracker->getTransferPercentCompleted());
        $this->assertEquals(0, $this->progressTracker->getObjectsInProgress());

        rewind($this->output);
        $this->assertStringContainsString("27% 27/100 B", stream_get_contents($this->output));
    }

    /**
     * Tests state are cleared.
     *
     * @return void
     */
    public function testClearState(): void
    {
        $listener = $this->progressTracker->getTransferListener();
        $fakeRequestArgs = [];
        ($listener->onObjectTransferInitiated)('FooObjectKey', $fakeRequestArgs);
        ($listener->onObjectTransferProgress)('FooObjectKey', 10, 100);

        $this->progressTracker->clear();

        $this->assertEquals(0, $this->progressTracker->getTotalBytesTransferred());
        $this->assertEquals(0, $this->progressTracker->getObjectsTotalSizeInBytes());
        $this->assertEquals(0, $this->progressTracker->getObjectsInProgress());
        $this->assertEquals(0, $this->progressTracker->getObjectsCount());
        $this->assertEquals(0, $this->progressTracker->getTransferPercentCompleted());
    }
}

