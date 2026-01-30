<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Progress\ColoredTransferProgressBarFormat;
use Aws\S3\S3Transfer\Progress\PlainProgressBarFormat;
use Aws\S3\S3Transfer\Progress\AbstractProgressBarFormat;
use Aws\S3\S3Transfer\Progress\TransferProgressBarFormat;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(AbstractProgressBarFormat::class)]
#[CoversClass(ColoredTransferProgressBarFormat::class)]
#[CoversClass(PlainProgressBarFormat::class)]
#[CoversClass(TransferProgressBarFormat::class)]
class AbstractProgressBarFormatTest extends TestCase
{
    /**
     * Tests the different implementations of
     * ProgressBarFormat. Each template and parameter
     * can be seen in each of the implementations.
     */
    #[DataProvider('progressBarFormatProvider')]
    public function testProgressBarFormat(
        string $implementationClass,
        array $args,
        string $expectedFormat
    ): void
    {
        /** @var AbstractProgressBarFormat $progressBarFormat */
        $progressBarFormat = new $implementationClass();
        $progressBarFormat->setArgs($args);

        $this->assertEquals($expectedFormat, $progressBarFormat->format());
    }

    /**
     * @return array[]
     */
    public static function progressBarFormatProvider(): array
    {
        return [
            'plain_progress_bar_format_1' => [
                'implementation_class' => PlainProgressBarFormat::class,
                'args' => [
                    'object_name' => 'foo',
                    'progress_bar' => '..........',
                    'percent' => 100,
                ],
                'expected_format' => "foo:\n[..........] 100%",
            ],
            'plain_progress_bar_format_2' => [
                'implementation_class' => PlainProgressBarFormat::class,
                'args' => [
                    'object_name' => 'foo',
                    'progress_bar' => '.....     ',
                    'percent' => 50,
                ],
                'expected_format' => "foo:\n[.....     ] 50%",
            ],
            'transfer_progress_bar_format_1' => [
                'implementation_class' => TransferProgressBarFormat::class,
                'args' => [
                    'object_name' => 'foo',
                    'progress_bar' => '..........',
                    'percent' => 100,
                    'transferred' => 100,
                    'to_be_transferred' => 100,
                    'unit' => 'B'
                ],
                'expected_format' => "foo:\n[..........] 100% 100/100 B",
            ],
            'transfer_progress_bar_format_2' => [
                'implementation_class' => TransferProgressBarFormat::class,
                'args' => [
                    'object_name' => 'foo',
                    'progress_bar' => '.....     ',
                    'percent' => 50,
                    'transferred' => 50,
                    'to_be_transferred' => 100,
                    'unit' => 'B'
                ],
                'expected_format' => "foo:\n[.....     ] 50% 50/100 B",
            ],
            'colored_transfer_progress_bar_format_1_color_code_black_defaulted' => [
                'implementation_class' => ColoredTransferProgressBarFormat::class,
                'args' => [
                    'progress_bar' => '.....     ',
                    'percent' => 50,
                    'transferred' => 50,
                    'to_be_transferred' => 100,
                    'unit' => 'B',
                    'object_name' => 'FooObject'
                ],
                'expected_format' => "FooObject:\n\033[30m[.....     ] 50% 50/100 B \033[0m",
            ],
            'colored_transfer_progress_bar_format_1' => [
                'implementation_class' => ColoredTransferProgressBarFormat::class,
                'args' => [
                    'progress_bar' => '.....     ',
                    'percent' => 50,
                    'transferred' => 50,
                    'to_be_transferred' => 100,
                    'unit' => 'B',
                    'object_name' => 'FooObject',
                    'color_code' => ColoredTransferProgressBarFormat::BLUE_COLOR_CODE
                ],
                'expected_format' => "FooObject:\n\033[34m[.....     ] 50% 50/100 B \033[0m",
            ],
            'colored_transfer_progress_bar_format_2' => [
                'implementation_class' => ColoredTransferProgressBarFormat::class,
                'args' => [
                    'progress_bar' => '.....     ',
                    'percent' => 50,
                    'transferred' => 50,
                    'to_be_transferred' => 100,
                    'unit' => 'B',
                    'object_name' => 'FooObject',
                    'color_code' => ColoredTransferProgressBarFormat::GREEN_COLOR_CODE
                ],
                'expected_format' => "FooObject:\n\033[32m[.....     ] 50% 50/100 B \033[0m",
            ],
            'colored_transfer_progress_bar_format_3' => [
                'implementation_class' => ColoredTransferProgressBarFormat::class,
                'args' => [
                    'progress_bar' => '.....     ',
                    'percent' => 50,
                    'transferred' => 50,
                    'to_be_transferred' => 100,
                    'unit' => 'B',
                    'object_name' => 'FooObject',
                    'color_code' => ColoredTransferProgressBarFormat::RED_COLOR_CODE
                ],
                'expected_format' => "FooObject:\n\033[31m[.....     ] 50% 50/100 B \033[0m",
            ],
            'colored_transfer_progress_bar_format_4' => [
                'implementation_class' => ColoredTransferProgressBarFormat::class,
                'args' => [
                    'progress_bar' => '..........',
                    'percent' => 100,
                    'transferred' => 100,
                    'to_be_transferred' => 100,
                    'unit' => 'B',
                    'object_name' => 'FooObject',
                    'color_code' => ColoredTransferProgressBarFormat::BLUE_COLOR_CODE
                ],
                'expected_format' => "FooObject:\n\033[34m[..........] 100% 100/100 B \033[0m",
            ],
        ];
    }
}
