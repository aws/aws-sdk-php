<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Progress\ColoredTransferProgressBarFormat;
use Aws\S3\S3Transfer\Progress\ConsoleProgressBar;
use Aws\S3\S3Transfer\Progress\PlainProgressBarFormat;
use Aws\S3\S3Transfer\Progress\AbstractProgressBarFormat;
use Aws\S3\S3Transfer\Progress\TransferProgressBarFormat;
use PHPUnit\Framework\TestCase;

/**
 * Tests console progress bar.
 */
class ConsoleProgressBarTest extends TestCase
{
    /**
     * Tests each instance of ConsoleProgressBar defaults to the
     * default values the parameters no provided.
     *
     * @return void
     */
    public function testDefaultValues(): void
    {
        $progressBar = new ConsoleProgressBar();
        $this->assertEquals(
            ConsoleProgressBar::DEFAULT_PROGRESS_BAR_WIDTH,
            $progressBar->getProgressBarWidth()
        );
        $this->assertEquals(
            ConsoleProgressBar::DEFAULT_PROGRESS_BAR_CHAR,
            $progressBar->getProgressBarChar()
        );
        $this->assertEquals(
            0,
            $progressBar->getPercentCompleted()
        );
        $this->assertInstanceOf(
            ColoredTransferProgressBarFormat::class,
            $progressBar->getProgressBarFormat()
        );
    }

    /**
     * Tests the percent is updated properly.
     *
     * @return void
     */
    public function testSetPercentCompleted(): void
    {
        $progressBar = new ConsoleProgressBar();
        $progressBar->setPercentCompleted(10);
        $this->assertEquals(10, $progressBar->getPercentCompleted());
        $progressBar->setPercentCompleted(100);
        $this->assertEquals(100, $progressBar->getPercentCompleted());
    }

    /**
     * @return void
     */
    public function testSetCustomValues(): void
    {
        $progressBar = new ConsoleProgressBar(
            progressBarChar: '-',
            progressBarWidth: 10,
            percentCompleted: 25,
            progressBarFormat: new PlainProgressBarFormat()
        );
        $this->assertEquals('-', $progressBar->getProgressBarChar());
        $this->assertEquals(10, $progressBar->getProgressBarWidth());
        $this->assertEquals(25, $progressBar->getPercentCompleted());
        $this->assertInstanceOf(
            PlainProgressBarFormat::class,
            $progressBar->getProgressBarFormat()
        );
    }

    /**
     * To make sure the percent is not over 100.
     *
     * @return void
     */
    public function testPercentIsNotOverOneHundred(): void
    {
        $progressBar = new ConsoleProgressBar();
        $progressBar->setPercentCompleted(150);
        $this->assertEquals(100, $progressBar->getPercentCompleted());
    }

    /**
     * @param string $progressBarChar
     * @param int $progressBarWidth
     * @param int $percentCompleted
     * @param AbstractProgressBarFormatTest $progressBarFormat
     * @param array $progressBarFormatArgs
     * @param string $expectedOutput
     *
     * @return void
     * @dataProvider progressBarRenderingProvider
     *
     */
    public function testProgressBarRendering(
        string                    $progressBarChar,
        int                       $progressBarWidth,
        int                       $percentCompleted,
        AbstractProgressBarFormat $progressBarFormat,
        array                     $progressBarFormatArgs,
        string                    $expectedOutput
    ): void
    {
        $progressBarFormat->setArgs($progressBarFormatArgs);
        $progressBar = new ConsoleProgressBar(
            $progressBarChar,
            $progressBarWidth,
            $percentCompleted,
            $progressBarFormat,
        );

        $this->assertEquals($expectedOutput, $progressBar->render());
    }

    /**
     * Data provider for testing progress bar rendering.
     *
     * @return array
     */
    public static function progressBarRenderingProvider(): array
    {
        return [
            'plain_progress_bar_format_1' => [
                'progress_bar_char' => '#',
                'progress_bar_width' => 50,
                'percent_completed' => 15,
                'progress_bar_format' => new PlainProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'FooObject',
                ],
                'expected_output' => "FooObject:\n[########                                          ] 15%"
            ],
            'plain_progress_bar_format_2' => [
                'progress_bar_char' => '#',
                'progress_bar_width' => 50,
                'percent_completed' => 45,
                'progress_bar_format' => new PlainProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'FooObject',
                ],
                'expected_output' => "FooObject:\n[#######################                           ] 45%"
            ],
            'plain_progress_bar_format_3' => [
                'progress_bar_char' => '#',
                'progress_bar_width' => 50,
                'percent_completed' => 100,
                'progress_bar_format' => new PlainProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'FooObject',
                ],
                'expected_output' => "FooObject:\n[##################################################] 100%"
            ],
            'plain_progress_bar_format_4' => [
                'progress_bar_char' => '.',
                'progress_bar_width' => 50,
                'percent_completed' => 100,
                'progress_bar_format' => new PlainProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'FooObject',
                ],
                'expected_output' => "FooObject:\n[..................................................] 100%"
            ],
            'transfer_progress_bar_format_1' => [
                'progress_bar_char' => '#',
                'progress_bar_width' => 50,
                'percent_completed' => 23,
                'progress_bar_format' => new TransferProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'FooObject',
                    'transferred' => 23,
                    'to_be_transferred' => 100,
                    'unit' => 'B'
                ],
                'expected_output' => "FooObject:\n[############                                      ] 23% 23/100 B"
            ],
            'transfer_progress_bar_format_2' => [
                'progress_bar_char' => '#',
                'progress_bar_width' => 25,
                'percent_completed' => 75,
                'progress_bar_format' => new TransferProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'FooObject',
                    'transferred' => 75,
                    'to_be_transferred' => 100,
                    'unit' => 'B'
                ],
                'expected_output' => "FooObject:\n[###################      ] 75% 75/100 B"
            ],
            'transfer_progress_bar_format_3' => [
                'progress_bar_char' => '#',
                'progress_bar_width' => 30,
                'percent_completed' => 100,
                'progress_bar_format' => new TransferProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'FooObject',
                    'transferred' => 100,
                    'to_be_transferred' => 100,
                    'unit' => 'B'
                ],
                'expected_output' => "FooObject:\n[##############################] 100% 100/100 B"
            ],
            'transfer_progress_bar_format_4' => [
                'progress_bar_char' => '*',
                'progress_bar_width' => 30,
                'percent_completed' => 100,
                'progress_bar_format' => new TransferProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'FooObject',
                    'transferred' => 100,
                    'to_be_transferred' => 100,
                    'unit' => 'B'
                ],
                'expected_output' => "FooObject:\n[******************************] 100% 100/100 B"
            ],
            'colored_progress_bar_format_1' => [
                'progress_bar_char' => '#',
                'progress_bar_width' => 20,
                'percent_completed' => 10,
                'progress_bar_format' => new ColoredTransferProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'ObjectName_1',
                    'transferred' => 10,
                    'to_be_transferred' => 100,
                    'unit' => 'B'
                ],
                'expected_output' => "ObjectName_1:\n\033[30m[##                  ] 10% 10/100 B \033[0m"
            ],
            'colored_progress_bar_format_2' => [
                'progress_bar_char' => '#',
                'progress_bar_width' => 20,
                'percent_completed' => 50,
                'progress_bar_format' => new ColoredTransferProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'ObjectName_2',
                    'transferred' => 50,
                    'to_be_transferred' => 100,
                    'unit' => 'B',
                    'color_code' => ColoredTransferProgressBarFormat::BLUE_COLOR_CODE
                ],
                'expected_output' => "ObjectName_2:\n\033[34m[##########          ] 50% 50/100 B \033[0m"
            ],
            'colored_progress_bar_format_3' => [
                'progress_bar_char' => '#',
                'progress_bar_width' => 25,
                'percent_completed' => 100,
                'progress_bar_format' => new ColoredTransferProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'ObjectName_3',
                    'transferred' => 100,
                    'to_be_transferred' => 100,
                    'unit' => 'B',
                    'color_code' => ColoredTransferProgressBarFormat::GREEN_COLOR_CODE
                ],
                'expected_output' => "ObjectName_3:\n\033[32m[#########################] 100% 100/100 B \033[0m"
            ],
            'colored_progress_bar_format_4' => [
                'progress_bar_char' => '=',
                'progress_bar_width' => 25,
                'percent_completed' => 100,
                'progress_bar_format' => new ColoredTransferProgressBarFormat(),
                'progress_bar_format_args' => [
                    'object_name' => 'ObjectName_3',
                    'transferred' => 100,
                    'to_be_transferred' => 100,
                    'unit' => 'B',
                    'color_code' => ColoredTransferProgressBarFormat::GREEN_COLOR_CODE
                ],
                'expected_output' => "ObjectName_3:\n\033[32m[=========================] 100% 100/100 B \033[0m"
            ]
        ];
    }
}
