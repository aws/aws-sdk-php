<?php

namespace Aws\S3\S3Transfer\Progress;

final class PlainProgressBarFormat extends ProgressBarFormat
{
    public function getFormatTemplate(): string
    {
        return '[|progress_bar|] |percent|%';
    }

    public function getFormatParameters(): array
    {
        return [
            'progress_bar',
            'percent',
        ];
    }

    protected function getFormatDefaultParameterValues(): array
    {
        return [];
    }
}