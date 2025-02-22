<?php

namespace Aws\S3\S3Transfer\Progress;

final class TransferProgressBarFormat extends ProgressBarFormat
{
    /**
     * @inheritDoc
     */
    public function getFormatTemplate(): string
    {
        return '[|progress_bar|] |percent|% |transferred|/|tobe_transferred| |unit|';
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
        ];
    }

    protected function getFormatDefaultParameterValues(): array
    {
        return [];
    }
}