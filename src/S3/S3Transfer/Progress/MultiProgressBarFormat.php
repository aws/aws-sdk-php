<?php

namespace Aws\S3\S3Transfer\Progress;

class MultiProgressBarFormat extends ProgressBarFormat
{
    /**
     * @return string
     */
    public function getFormatTemplate(): string
    {
        return "[|progress_bar|] |percent|% Completed: |completed|/|total|, Failed: |failed|/|total|";
    }

    /**
     * @return array
     */
    public function getFormatParameters(): array
    {
        return [
            'completed',
            'failed',
            'total',
            'percent',
            'progress_bar'
        ];
    }

    /**
     * @return array
     */
    protected function getFormatDefaultParameterValues(): array
    {
        return [];
    }
}