<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Progress\ConsoleProgressBar;
use Aws\S3\S3Transfer\Progress\MultiProgressTracker;
use Aws\S3\S3Transfer\Progress\PlainProgressBarFormat;
use Aws\S3\S3Transfer\Progress\ProgressBarFactoryInterface;
use Aws\S3\S3Transfer\Progress\SingleProgressTracker;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Closure;
use PHPUnit\Framework\TestCase;

class MultiProgressTrackerTest extends TestCase
{
    /**
     * @return void
     */
    public function testDefaultInitialization(): void
    {
        $progressTracker = new MultiProgressTracker();
        $this->assertEquals([], $progressTracker->getSingleProgressTrackers());
        $this->assertEquals(STDOUT, $progressTracker->getOutput());
        $this->assertEquals(0, $progressTracker->getTransferCount());
        $this->assertEquals(0, $progressTracker->getCompleted());
        $this->assertEquals(0, $progressTracker->getFailed());
    }

    /**
     * @dataProvider customInitializationProvider
     *
     * @param array $progressTrackers
     * @param mixed $output
     * @param int $transferCount
     * @param int $completed
     * @param int $failed
     *
     * @return void
     */
    public function testCustomInitialization(
        array $progressTrackers,
        mixed $output,
        int $transferCount,
        int $completed,
        int $failed
    ): void
    {
        $progressTracker = new MultiProgressTracker(
            $progressTrackers,
            $output,
            $transferCount,
            $completed,
            $failed
        );
        $this->assertSame($output, $progressTracker->getOutput());
        $this->assertSame($transferCount, $progressTracker->getTransferCount());
        $this->assertSame($completed, $progressTracker->getCompleted());
        $this->assertSame($failed, $progressTracker->getFailed());
    }

    /**
     * @param ProgressBarFactoryInterface $progressBarFactory
     * @param callable $eventInvoker
     * @param array $expectedOutputs
     *
     * @return void
     * @dataProvider multiProgressTrackerProvider
     *
     */
    public function testMultiProgressTracker(
        Closure $progressBarFactory,
        callable $eventInvoker,
        array $expectedOutputs,
    ): void
    {
        $output = fopen("php://temp", "w+");
        $progressTracker = new MultiProgressTracker(
            output: $output,
            progressBarFactory: $progressBarFactory
        );
        $eventInvoker($progressTracker);

        $this->assertEquals(
            $expectedOutputs['transfer_count'],
            $progressTracker->getTransferCount()
        );
        $this->assertEquals(
            $expectedOutputs['completed'],
            $progressTracker->getCompleted()
        );
        $this->assertEquals(
            $expectedOutputs['failed'],
            $progressTracker->getFailed()
        );
        $progress = $expectedOutputs['progress'];
        if (is_array($progress)) {
            $progress = join('', $progress);
        }
        rewind($output);
        $this->assertEquals(
            $progress,
            stream_get_contents($output),
        );
    }

    /**
     * @return array
     */
    public function customInitializationProvider(): array
    {
        return [
            'custom_initialization_1' => [
                'progress_trackers' => [
                    new SingleProgressTracker(),
                    new SingleProgressTracker(),
                ],
                'output' => STDOUT,
                'transfer_count' => 20,
                'completed' => 20,
                'failed' => 0,
            ],
            'custom_initialization_2' => [
                'progress_trackers' => [
                    new SingleProgressTracker(),
                ],
                'output' => STDOUT,
                'transfer_count' => 25,
                'completed' => 20,
                'failed' => 5,
            ],
            'custom_initialization_3' => [
                'progress_trackers' => [
                    new SingleProgressTracker(),
                    new SingleProgressTracker(),
                    new SingleProgressTracker(),
                    new SingleProgressTracker(),
                ],
                'output' => fopen("php://temp", "w"),
                'transfer_count' => 50,
                'completed' => 35,
                'failed' => 15,
            ]
        ];
    }

    /**
     * @return array
     */
    public function multiProgressTrackerProvider(): array
    {
        return [
            'multi_progress_tracker_1_single_tracking_object' => [
                'progress_bar_factory' => function() {
                    return new ConsoleProgressBar(
                        progressBarWidth: 20,
                        progressBarFormat: new PlainProgressBarFormat(),
                    );
                },
                'event_invoker' => function (MultiProgressTracker $tracker): void
                {
                    $tracker->transferInitiated([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            0,
                            1024
                        )
                    ]);
                    $tracker->bytesTransferred([
                        TransferListener::REQUEST_ARGS_KEY => [],
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            'Foo',
                            512,
                            1024
                        )
                    ]);
                },
                'expected_outputs' => [
                    'transfer_count' => 1,
                    'completed' => 0,
                    'failed' => 0,
                    'progress' => [
                        "\033[2J\033[H\r\n",
                        "Foo:\n[                    ] 0%\n",
                        "--------------------\n",
                        "[                    ] 0% Completed: 0/1, Failed: 0/1\n",
                        "\033[2J\033[H\r\n",
                        "Foo:\n[##########          ] 50%\n",
                        "--------------------\n",
                        "[##########          ] 50% Completed: 0/1, Failed: 0/1\n"
                    ]
                ],
            ],
            'multi_progress_tracker_2' => [
                'progress_bar_factory' => function() {
                    return new ConsoleProgressBar(
                        progressBarWidth: 20,
                        progressBarFormat: new PlainProgressBarFormat(),
                    );
                },
                'event_invoker' => function (MultiProgressTracker $progressTracker): void
                {
                    $events = [
                        'transfer_initiated' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024
                        ],
                        'transfer_progress_1' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024,
                            'bytes_transferred' => 342,
                        ],
                        'transfer_progress_2' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024,
                            'bytes_transferred' => 684,
                        ],
                        'transfer_progress_3' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024,
                            'bytes_transferred' => 1024,
                        ],
                        'transfer_complete' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024,
                            'bytes_transferred' => 1024,
                        ]
                    ];
                    foreach ($events as $eventName => $event) {
                        if ($eventName === 'transfer_initiated') {
                            for ($i = 0; $i < 3; $i++) {
                                $progressTracker->transferInitiated([
                                    TransferListener::REQUEST_ARGS_KEY => $event[TransferListener::REQUEST_ARGS_KEY],
                                    TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                        "FooObject_$i",
                                        0,
                                        $event['total_bytes'],
                                    )
                                ]);
                            }
                        } elseif (str_starts_with($eventName, 'transfer_progress')) {
                            for ($i = 0; $i < 3; $i++) {
                                $progressTracker->bytesTransferred([
                                    TransferListener::REQUEST_ARGS_KEY => $event[TransferListener::REQUEST_ARGS_KEY],
                                    TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                        "FooObject_$i",
                                        $event['bytes_transferred'],
                                        $event['total_bytes'],
                                    )
                                ]);
                            }
                        } elseif ($eventName === 'transfer_complete') {
                            for ($i = 0; $i < 3; $i++) {
                                $progressTracker->transferComplete([
                                    TransferListener::REQUEST_ARGS_KEY => $event[TransferListener::REQUEST_ARGS_KEY],
                                    TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                        "FooObject_$i",
                                        $event['bytes_transferred'],
                                        $event['total_bytes'],
                                    )
                                ]);
                            }
                        }
                    }
                },
                'expected_outputs' => [
                    'transfer_count' => 3,
                    'completed' => 3,
                    'failed' => 0,
                    'progress' => [
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[                    ] 0% Completed: 0/1, Failed: 0/1\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_1:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[                    ] 0% Completed: 0/2, Failed: 0/2\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_1:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_2:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[                    ] 0% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_1:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_2:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[##                  ] 11% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_1:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_2:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[####                ] 22% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_1:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_2:\n",
                        "[#######             ] 33%\n",
                        "--------------------\n",
                        "[#######             ] 33% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_1:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_2:\n",
                        "[#######             ] 33%\n",
                        "--------------------\n",
                        "[#########           ] 44% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_1:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_2:\n",
                        "[#######             ] 33%\n",
                        "--------------------\n",
                        "[###########         ] 55% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_1:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_2:\n",
                        "[#############       ] 66%\n",
                        "--------------------\n",
                        "[#############       ] 66% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_2:\n",
                        "[#############       ] 66%\n",
                        "--------------------\n",
                        "[###############     ] 77% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[#############       ] 66%\n",
                        "--------------------\n",
                        "[##################  ] 88% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\n",
                        "--------------------\n",
                        "[####################] 100% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\n",
                        "--------------------\n",
                        "[####################] 100% Completed: 1/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\n",
                        "--------------------\n",
                        "[####################] 100% Completed: 2/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\n",
                        "--------------------\n",
                        "[####################] 100% Completed: 3/3, Failed: 0/3\n",

                    ]
                ],
            ],
            'multi_progress_tracker_3' => [
                'progress_bar_factory' => function() {
                    return new ConsoleProgressBar(
                        progressBarWidth: 20,
                        progressBarFormat: new PlainProgressBarFormat(),
                    );
                },
                'event_invoker' => function (MultiProgressTracker $progressTracker): void
                {
                    $events = [
                        'transfer_initiated' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024
                        ],
                        'transfer_progress_1' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024,
                            'bytes_transferred' => 342,
                        ],
                        'transfer_progress_2' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024,
                            'bytes_transferred' => 684,
                        ],
                        'transfer_progress_3' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024,
                            'bytes_transferred' => 1024,
                        ],
                        'transfer_complete' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024,
                            'bytes_transferred' => 1024,
                        ],
                        'transfer_fail' => [
                            TransferListener::REQUEST_ARGS_KEY => [],
                            'total_bytes' => 1024,
                            'bytes_transferred' => 0,
                            'reason' => 'Transfer failed'
                        ]
                    ];
                    foreach ($events as $eventName => $event) {
                        if ($eventName === 'transfer_initiated') {
                            for ($i = 0; $i < 5; $i++) {
                                $progressTracker->transferInitiated([
                                    TransferListener::REQUEST_ARGS_KEY => $event[TransferListener::REQUEST_ARGS_KEY],
                                    TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                        "FooObject_$i",
                                        0,
                                        $event['total_bytes'],
                                    )
                                ]);
                            }
                        } elseif (str_starts_with($eventName, 'transfer_progress')) {
                            for ($i = 0; $i < 3; $i++) {
                                $progressTracker->bytesTransferred([
                                    TransferListener::REQUEST_ARGS_KEY => $event[TransferListener::REQUEST_ARGS_KEY],
                                    TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                        "FooObject_$i",
                                        $event['bytes_transferred'],
                                        $event['total_bytes'],
                                    )
                                ]);
                            }
                        } elseif ($eventName === 'transfer_complete') {
                            for ($i = 0; $i < 3; $i++) {
                                $progressTracker->transferComplete([
                                    TransferListener::REQUEST_ARGS_KEY => $event[TransferListener::REQUEST_ARGS_KEY],
                                    TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                        "FooObject_$i",
                                        $event['bytes_transferred'],
                                        $event['total_bytes'],
                                    )
                                ]);
                            }
                        } elseif ($eventName === 'transfer_fail') {
                            // Just two of them will fail
                            for ($i = 3; $i < 5; $i++) {
                                $progressTracker->transferFail([
                                    TransferListener::REQUEST_ARGS_KEY => $event[TransferListener::REQUEST_ARGS_KEY],
                                    TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                        "FooObject_$i",
                                        0,
                                        $event['total_bytes'],
                                    ),
                                    'reason' => $event['reason']
                                ]);
                            }
                        }
                    }
                },
                'expected_outputs' => [
                    'transfer_count' => 5,
                    'completed' => 3,
                    'failed' => 2,
                    'progress' => [
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[                    ] 0% Completed: 0/1, Failed: 0/1\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_1:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[                    ] 0% Completed: 0/2, Failed: 0/2\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_1:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_2:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[                    ] 0% Completed: 0/3, Failed: 0/3\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_1:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_2:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[                    ] 0% Completed: 0/4, Failed: 0/4\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_1:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_2:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[                    ] 0% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_1:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_2:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[#                   ] 6% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_1:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_2:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[###                 ] 13% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_1:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_2:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[####                ] 19% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_1:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_2:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[#####               ] 26% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_1:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_2:\n",
                        "[#######             ] 33%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[#######             ] 33% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_1:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_2:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[########            ] 39% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_2:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[#########           ] 46% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[#############       ] 66%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[###########         ] 53% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[############        ] 60% Completed: 0/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[############        ] 60% Completed: 1/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[############        ] 60% Completed: 2/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[############        ] 60% Completed: 3/5, Failed: 0/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[############        ] 60% Completed: 3/5, Failed: 1/5\n",
                        "\033[2J\033[H\r\n",
                        "FooObject_0:\n",
                        "[####################] 100%\r\n",
                        "FooObject_1:\n",
                        "[####################] 100%\r\n",
                        "FooObject_2:\n",
                        "[####################] 100%\r\n",
                        "FooObject_3:\n",
                        "[                    ] 0%\r\n",
                        "FooObject_4:\n",
                        "[                    ] 0%\n",
                        "--------------------\n",
                        "[############        ] 60% Completed: 3/5, Failed: 2/5\n",
                    ]
                ],
            ]
        ];
    }
}