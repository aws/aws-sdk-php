<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Progress\ColoredTransferProgressBarFormat;
use Aws\S3\S3Transfer\Progress\ConsoleProgressBar;
use Aws\S3\S3Transfer\Progress\PlainProgressBarFormat;
use Aws\S3\S3Transfer\Progress\ProgressBarInterface;
use Aws\S3\S3Transfer\Progress\SingleProgressTracker;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use PHPUnit\Framework\TestCase;

class SingleProgressTrackerTest extends TestCase
{
    /**
     * @return void
     */
    public function testDefaultInitialization(): void
    {
        $progressTracker = new SingleProgressTracker();
        $this->assertInstanceOf(ConsoleProgressBar::class, $progressTracker->getProgressBar());
        $this->assertEquals(STDOUT, $progressTracker->getOutput());
        $this->assertTrue($progressTracker->isClear());
        $this->assertNull($progressTracker->getCurrentSnapshot());
    }

    /**
     * @param ProgressBarInterface $progressBar
     * @param mixed $output
     * @param bool $clear
     * @param TransferProgressSnapshot $snapshot
     *
     * @dataProvider customInitializationProvider
     *
     * @return void
     */
    public function testCustomInitialization(
        ProgressBarInterface $progressBar,
        mixed $output,
        bool $clear,
        TransferProgressSnapshot $snapshot
    ): void
    {
        $progressTracker = new SingleProgressTracker(
            $progressBar,
            $output,
            $clear,
            $snapshot,
        );
        $this->assertSame($progressBar, $progressTracker->getProgressBar());
        $this->assertSame($output, $progressTracker->getOutput());
        $this->assertSame($clear, $progressTracker->isClear());
        $this->assertSame($snapshot, $progressTracker->getCurrentSnapshot());
    }

    /**
     * @return array[]
     */
    public function customInitializationProvider(): array
    {
        return [
            'initialization_1' => [
                'progress_bar' => new ConsoleProgressBar(),
                'output' => STDOUT,
                'clear' => true,
                'snapshot' => new TransferProgressSnapshot(
                    'Foo',
                    0,
                    10
                ),
            ],
            'initialization_2' => [
                'progress_bar' => new ConsoleProgressBar(),
                'output' => fopen('php://temp', 'w'),
                'clear' => true,
                'snapshot' => new TransferProgressSnapshot(
                    'FooTest',
                    50,
                    500
                ),
            ],
        ];
    }

    /**
     * @param ProgressBarInterface $progressBar
     * @param callable $eventInvoker
     * @param array $expectedOutputs
     *
     * @dataProvider singleProgressTrackingProvider
     *
     * @return void
     */
    public function testSingleProgressTracking(
        ProgressBarInterface $progressBar,
        callable $eventInvoker,
        array $expectedOutputs,
    ): void
    {
        $output = fopen('php://temp', 'w');
        $progressTracker = new SingleProgressTracker(
            $progressBar,
            $output,
        );
        $eventInvoker($progressTracker);
        $this->assertEquals(
            $expectedOutputs['identifier'],
            $progressTracker->getCurrentSnapshot()->getIdentifier()
        );
        $this->assertEquals(
            $expectedOutputs['transferred_bytes'],
            $progressTracker->getCurrentSnapshot()->getTransferredBytes()
        );
        $this->assertEquals(
            $expectedOutputs['total_bytes'],
            $progressTracker->getCurrentSnapshot()->getTotalBytes()
        );

        $progress = $expectedOutputs['progress'];
        if (is_array($progress)) {
            $progress = join('', $expectedOutputs['progress']);
        }
        rewind($output);
        $this->assertEquals(
            $progress,
            stream_get_contents($output)
        );
    }

    /**
     * @return array[]
     */
    public function singleProgressTrackingProvider(): array
    {
        return [
            'progress_rendering_1_transfer_initiated' => [
                'progress_bar' => new ConsoleProgressBar(
                    progressBarWidth: 20,
                    progressBarFormat: new PlainProgressBarFormat()
                ),
                'event_invoker' => function (singleProgressTracker $progressTracker): void
                {
                    $progressTracker->transferInitiated([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            0,
                            1024
                        )
                    ]);
                },
                'expected_outputs' => [
                    'identifier' => 'Foo',
                    'transferred_bytes' => 0,
                    'total_bytes' => 1024,
                    'progress' => [
                        "\033[2J\033[H\r\n",
                        "Foo:\n[                    ] 0%"
                    ]
                ],
            ],
            'progress_rendering_2_transfer_progress' => [
                'progress_bar' => new ConsoleProgressBar(
                    progressBarWidth: 20,
                    progressBarFormat: new PlainProgressBarFormat()
                ),
                'event_invoker' => function (singleProgressTracker $progressTracker): void
                {
                    $progressTracker->transferInitiated([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            0,
                            1024
                        )
                    ]);
                    $progressTracker->bytesTransferred([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            256,
                            1024
                        )
                    ]);
                },
                'expected_outputs' => [
                    'identifier' => 'Foo',
                    'transferred_bytes' => 256,
                    'total_bytes' => 1024,
                    'progress' => [
                        "\033[2J\033[H\r\n",
                        "Foo:\n[                    ] 0%",
                        "\033[2J\033[H\r\n",
                        "Foo:\n[#####               ] 25%"
                    ]
                ],
            ],
            'progress_rendering_3_transfer_force_completion_when_total_bytes_zero' => [
                'progress_bar' => new ConsoleProgressBar(
                    progressBarWidth: 20,
                    progressBarFormat: new PlainProgressBarFormat()
                ),
                'event_invoker' => function (singleProgressTracker $progressTracker): void
                {
                    $progressTracker->transferInitiated([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            0,
                            0
                        )
                    ]);
                    $progressTracker->bytesTransferred([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            1024,
                            0
                        )
                    ]);
                    $progressTracker->transferComplete([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            2048,
                            0
                        )
                    ]);
                },
                'expected_outputs' => [
                    'identifier' => 'Foo',
                    'transferred_bytes' => 2048,
                    'total_bytes' => 0,
                    'progress' => [
                        "\033[2J\033[H\r\n",
                        "Foo:\n[                    ] 0%",
                        "\033[2J\033[H\r\n",
                        "Foo:\n[                    ] 0%",
                        "\033[2J\033[H\r\n",
                        "Foo:\n[####################] 100%"
                    ]
                ],
            ],
            'progress_rendering_4_transfer_fail_with_colored_transfer_format' => [
                'progress_bar' => new ConsoleProgressBar(
                    progressBarWidth: 20,
                    progressBarFormat: new ColoredTransferProgressBarFormat()
                ),
                'event_invoker' => function (singleProgressTracker $progressTracker): void
                {
                    $progressTracker->transferInitiated([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            0,
                            1024
                        )
                    ]);
                    $progressTracker->bytesTransferred([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            512,
                            1024
                        )
                    ]);
                    $progressTracker->transferFail([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            512,
                            1024
                        ),
                        'reason' => "Error transferring!"
                    ]);
                },
                'expected_outputs' => [
                    'identifier' => 'Foo',
                    'transferred_bytes' => 512,
                    'total_bytes' => 1024,
                    'progress' => [
                        "\033[2J\033[H\r\n",
                        "Foo:\n",
                        "\033[30m[                    ] 0% 0/1024 B ",
                        "\033[0m",
                        "\033[2J\033[H\r\n",
                        "Foo:\n",
                        "\033[34m[##########          ] 50% 512/1024 B ",
                        "\033[0m",
                        "\033[2J\033[H\r\n",
                        "Foo:\n",
                        "\033[31m[##########          ] 50% 512/1024 B Error transferring!",
                        "\033[0m"
                    ]
                ],
            ]
        ];
    }
}