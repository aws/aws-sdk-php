<?php

namespace Aws\S3\S3Transfer\Progress;

final class PlainProgressBarFormat extends ProgressBarFormat
{
    public function getFormatTemplate(): string
    {
        return "|object_name|:\n[|progress_bar|] |percent|%";
    }

    public function getFormatParameters(): array
    {
        return [
            'object_name',
            'progress_bar',
            'percent',
        ];
    }

    protected function getFormatDefaultParameterValues(): array
    {
        return [];
    }
}