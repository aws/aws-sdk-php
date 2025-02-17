<?php

namespace Aws\Test\S3\S3Transfer;

use Aws\S3\S3Transfer\ConsoleProgressBar;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * Tests console progress bar.
 */
class ConsoleProgressBarTest extends TestCase
{
    /**
     * Tests progress bar rendering.
     *
     * @dataProvider progressBarPercentProvider
     *
     * @return void
     */
    public function testDefaultProgressBarRendering(
        int $percent,
        int $transferred,
        int $toBeTransferred,
        string $unit,
        string $expectedProgress
    )
    {
        $progressBar = new ConsoleProgressBar(
            progressBarChar: "#",
            progressBarWidth: 25,
            format: ConsoleProgressBar::$formats[ConsoleProgressBar::TRANSFER_FORMAT]
        );
        $progressBar->setPercentCompleted($percent);
        $progressBar->setArgs([
            'transferred' => $transferred,
            'tobe_transferred' => $toBeTransferred,
            'unit' => $unit
        ]);

        $output = $progressBar->getPaintedProgress();
        $this->assertEquals($expectedProgress, $output);
    }

    /**
     * Data provider for testing progress bar rendering.
     *
     * @return array
     */
    public function progressBarPercentProvider(): array {
        return [
            [
                'percent' => 25,
                'transferred' => 25,
                'tobe_transferred' => 100,
                'unit' => 'B',
                'expected' => '[######                   ] 25% 25/100 B'
            ],
            [
                'percent' => 50,
                'transferred' => 50,
                'tobe_transferred' => 100,
                'unit' => 'B',
                'expected' => '[#############            ] 50% 50/100 B'
            ],
            [
                'percent' => 75,
                'transferred' => 75,
                'tobe_transferred' => 100,
                'unit' => 'B',
                'expected' => '[###################      ] 75% 75/100 B'
            ],
            [
                'percent' => 100,
                'transferred' => 100,
                'tobe_transferred' => 100,
                'unit' => 'B',
                'expected' => '[#########################] 100% 100/100 B'
            ],
        ];
    }

    /**
     * Tests progress with custom char.
     *
     * @return void
     */
    public function testProgressBarWithCustomChar()
    {
        $progressBar = new ConsoleProgressBar(
            progressBarChar: '*',
            progressBarWidth: 30
        );
        $progressBar->setPercentCompleted(30);
        $progressBar->setArgs([
            'transferred' => '10',
            'tobe_transferred' => '100',
            'unit' => 'B'
        ]);

        $output = $progressBar->getPaintedProgress();
        $this->assertStringContainsString('10/100 B', $output);
        $this->assertStringContainsString(str_repeat('*', 9), $output);
    }

    /**
     * Tests progress with custom char.
     *
     * @return void
     */
    public function testProgressBarWithCustomWidth()
    {
        $progressBar = new ConsoleProgressBar(
            progressBarChar: '*',
            progressBarWidth: 100
        );
        $progressBar->setPercentCompleted(10);
        $progressBar->setArgs([
            'transferred' => '10',
            'tobe_transferred' => '100',
            'unit' => 'B'
        ]);

        $output = $progressBar->getPaintedProgress();
        $this->assertStringContainsString('10/100 B', $output);
        $this->assertStringContainsString(str_repeat('*', 10), $output);
    }

    /**
     * Tests missing parameters.
     *
     * @dataProvider progressBarMissingArgsProvider
     *
     * @return void
     */
    public function testProgressBarMissingArgsThrowsException(
        string $formatName,
        string $parameter
    )
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Missing `$parameter` parameter for progress bar.");

        $format = ConsoleProgressBar::$formats[$formatName];
        $progressBar = new ConsoleProgressBar(
            format: $format,
        );
        foreach ($format['parameters'] as $param) {
            if ($param === $parameter) {
                continue;
            }

            $progressBar->setArg($param, 'foo');
        }

        $progressBar->setPercentCompleted(20);
        $progressBar->getPaintedProgress();
    }


    /**
     * Data provider for testing exception when arguments are missing.
     *
     * @return array
     */
    public function progressBarMissingArgsProvider(): array
    {
        return [
            [
                'formatName' => ConsoleProgressBar::TRANSFER_FORMAT,
                'parameter' => 'transferred',
            ],
            [
                'formatName' => ConsoleProgressBar::TRANSFER_FORMAT,
                'parameter' => 'tobe_transferred',
            ],
            [
                'formatName' => ConsoleProgressBar::TRANSFER_FORMAT,
                'parameter' => 'unit',
            ]
        ];
    }

    /**
     * Tests the progress bar does not overflow when the percent is over 100.
     *
     * @return void
     */
    public function testProgressBarDoesNotOverflowAfter100Percent()
    {
        $progressBar = new ConsoleProgressBar(
            progressBarChar: '*',
            progressBarWidth: 10,
        );
        $progressBar->setPercentCompleted(110);
        $progressBar->setArgs([
            'transferred' => 'foo',
            'tobe_transferred' => 'foo',
            'unit' => 'MB'
        ]);
        $output = $progressBar->getPaintedProgress();
        $this->assertStringContainsString('100%', $output);
        $this->assertStringContainsString('[**********]', $output);
    }

    /**
     * Tests the progress bar sets the arguments.
     *
     * @return void
     */
    public function testProgressBarSetsArguments() {
        $progressBar = new ConsoleProgressBar(
            progressBarChar: '*',
            progressBarWidth: 25,
            format: ConsoleProgressBar::$formats[ConsoleProgressBar::TRANSFER_FORMAT]
        );
        $progressBar->setArgs([
            'transferred' => 'fooTransferred',
            'tobe_transferred' => 'fooToBeTransferred',
            'unit' => 'fooUnit',
        ]);
        $output = $progressBar->getPaintedProgress();
        $progressBar->setPercentCompleted(100);
        $this->assertStringContainsString('fooTransferred', $output);
        $this->assertStringContainsString('fooToBeTransferred', $output);
        $this->assertStringContainsString('fooUnit', $output);
    }
}
