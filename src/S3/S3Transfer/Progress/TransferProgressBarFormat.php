<?php

namespace Aws\S3\S3Transfer\Progress;

final class TransferProgressBarFormat extends ProgressBarFormat
{
    /**
     * @inheritDoc
     */
    public function getFormatTemplate(): string
    {
        return "|object_name|:\n[|progress_bar|] |percent|% |transferred|/|to_be_transferred| |unit|";
    }

    /**
     * @inheritDoc
     */
    public function getFormatParameters(): array
    {
        return [
            'object_name',
            'progress_bar',
            'percent',
            'transferred',
            'to_be_transferred',
            'unit',
        ];
    }

    protected function getFormatDefaultParameterValues(): array
    {
        return [];
    }
}