<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Progress\TransferListener;

abstract class TransferRequest
{

    /** @var array  */
    protected array $listeners;

    /** @var TransferListener|null  */
    protected ?TransferListener $progressTracker;

    /**
     * @param array $listeners
     * @param TransferListener|null $progressTracker
     */
    public function __construct(
        array $listeners,
        ?TransferListener $progressTracker
    ) {
        $this->listeners = $listeners;
        $this->progressTracker = $progressTracker;
    }

    /**
     * Get current listeners.
     *
     * @return array
     */
    public function getListeners(): array
    {
        return $this->listeners;
    }

    /**
     * Get the progress tracker.
     *
     * @return TransferListener|null
     */
    public function getProgressTracker(): ?TransferListener
    {
        return $this->progressTracker;
    }
}