<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Progress\TransferListener;

final class ResumeUploadRequest
{
    /** @var ResumableUpload|string */
    private ResumableUpload|string $resumableUpload;

    /** @var array */
    private array $listeners;

    /** @var TransferListener|null */
    private ?TransferListener $progressTracker;

    /**
     * @param ResumableUpload|string $resumableUpload
     * @param array $listeners
     * @param TransferListener|null $progressTracker
     */
    public function __construct(
        string|ResumableUpload $resumableUpload,
        array $listeners = [],
        ?TransferListener $progressTracker = null
    ) {
        $this->resumableUpload = $resumableUpload;
        $this->listeners = $listeners;
        $this->progressTracker = $progressTracker;
    }

    /**
     * @return string|ResumableUpload
     */
    public function getResumableUpload(): string|ResumableUpload
    {
        return $this->resumableUpload;
    }

    /**
     * @return array
     */
    public function getListeners(): array
    {
        return $this->listeners;
    }

    /**
     * @return TransferListener|null
     */
    public function getProgressTracker(): ?TransferListener
    {
        return $this->progressTracker;
    }
}