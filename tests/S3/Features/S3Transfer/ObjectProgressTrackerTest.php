<?php

namespace Aws\Test\S3\Features\S3Transfer;

use Aws\S3\Features\S3Transfer\ConsoleProgressBar;
use Aws\S3\Features\S3Transfer\ProgressBar;
use PHPUnit\Framework\TestCase;
use Aws\S3\Features\S3Transfer\ObjectProgressTracker;

/**
 * Tests the object progress tracker.
 */
class ObjectProgressTrackerTest extends TestCase
{
    private ProgressBar $mockProgressBar;

    protected function setUp(): void
    {
        $this->mockProgressBar = $this->createMock(ProgressBar::class);
    }

    /**
     * Tests getter and setters.
     *
     * @return void
     */
    public function testGettersAndSetters(): void
    {
        $tracker = new ObjectProgressTracker(
            '',
            0,
            0,
            ''
        );
        $tracker->setObjectKey('FooKey');
        $this->assertEquals('FooKey', $tracker->getObjectKey());

        $tracker->setObjectBytesTransferred(100);
        $this->assertEquals(100, $tracker->getObjectBytesTransferred());

        $tracker->setObjectSizeInBytes(100);
        $this->assertEquals(100, $tracker->getObjectSizeInBytes());

        $tracker->setStatus('initiated');
        $this->assertEquals('initiated', $tracker->getStatus());
    }

    /**
     * Tests bytes transferred increments.
     *
     * @return void
     */
    public function testIncrementTotalBytesTransferred(): void
    {
        $percentProgress = 0;
        $this->mockProgressBar->expects($this->atLeast(4))
            ->method('setPercentCompleted')
            ->willReturnCallback(function ($percent) use (&$percentProgress) {
                $this->assertEquals($percentProgress +=25, $percent);
            });

        $tracker = new ObjectProgressTracker(
            objectKey: 'FooKey',
            objectBytesTransferred: 0,
            objectSizeInBytes: 100,
            status: 'initiated',
            progressBar: $this->mockProgressBar
        );

        $tracker->incrementTotalBytesTransferred(25);
        $tracker->incrementTotalBytesTransferred(25);
        $tracker->incrementTotalBytesTransferred(25);
        $tracker->incrementTotalBytesTransferred(25);

        $this->assertEquals(100, $tracker->getObjectBytesTransferred());
    }


    /**
     * Tests progress status color based on states.
     *
     * @return void
     */
    public function testSetStatusUpdatesProgressBarColor()
    {
        $statusColorMapping = [
            'progress' => ConsoleProgressBar::BLUE_COLOR_CODE,
            'completed' => ConsoleProgressBar::GREEN_COLOR_CODE,
            'failed' => ConsoleProgressBar::RED_COLOR_CODE,
        ];
        $values = array_values($statusColorMapping);
        $valueIndex = 0;
        $this->mockProgressBar->expects($this->exactly(3))
            ->method('setArg')
            ->willReturnCallback(function ($_, $argValue) use ($values, &$valueIndex) {
                $this->assertEquals($argValue, $values[$valueIndex++]);
            });

        $tracker = new ObjectProgressTracker(
            objectKey: 'FooKey',
            objectBytesTransferred: 0,
            objectSizeInBytes: 100,
            status: 'initiated',
            progressBar: $this->mockProgressBar
        );

        foreach ($statusColorMapping as $status => $value) {
            $tracker->setStatus($status);
        }
    }

    /**
     * Tests the default progress bar is initialized when not provided.
     *
     * @return void
     */
    public function testDefaultProgressBarIsInitialized()
    {
        $tracker = new ObjectProgressTracker(
            objectKey: 'FooKey',
            objectBytesTransferred: 0,
            objectSizeInBytes: 100,
            status: 'initiated'
        );
        $this->assertInstanceOf(ProgressBar::class, $tracker->getProgressBar());
    }
}
