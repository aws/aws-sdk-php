<?php

namespace Aws\S3\S3Transfer\Models;

abstract class TransferRequestConfig
{
    /**
     * Override the default option for enabling progress tracking.
     * If this option is resolved as true and a progressTracker parameter
     * is not provided, a default implementation will be resolved.
     *
     * @var bool|null
     */
    protected ?bool $trackProgress;

    /**
     * @param bool|null $trackProgress
     */
    public function __construct(?bool $trackProgress)
    {
        $this->trackProgress = $trackProgress;
    }

    /**
     * @return bool|null
     */
    public function getTrackProgress(): ?bool
    {
        return $this->trackProgress;
    }
}