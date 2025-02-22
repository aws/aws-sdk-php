<?php

namespace Aws\S3\S3Transfer\Progress;

final class ColoredTransferProgressBarFormat extends ProgressBarFormat
{
    public const BLACK_COLOR_CODE = '[30m';
    public const BLUE_COLOR_CODE = '[34m';
    public const GREEN_COLOR_CODE = '[32m';
    public const RED_COLOR_CODE = '[31m';

    /**
     * @inheritDoc
     */
    public function getFormatTemplate(): string
    {
        return
            "|object_name|:\n"
            ."\033|color_code|[|progress_bar|] |percent|% |transferred|/|tobe_transferred| |unit| |message|\033[0m";
    }

    /**
     * @inheritDoc
     */
    public function getFormatParameters(): array
    {
        return [
            'progress_bar',
            'percent',
            'transferred',
            'tobe_transferred',
            'unit',
            'color_code',
            'message',
            'object_name'
        ];
    }

    protected function getFormatDefaultParameterValues(): array
    {
        return [
            'color_code' => ColoredTransferProgressBarFormat::BLACK_COLOR_CODE,
        ];
    }
}