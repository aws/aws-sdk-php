<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Utils\FileDownloadHandler;

final class ResumeDownloadRequest
{
    /** @var ResumableDownload|string */
    private ResumableDownload|string $resumableDownload;

    /** @var string */
    private string $downloadHandlerClass;

    /** @var array */
    private array $listeners;

    /** @var TransferListener|null */
    private ?TransferListener $progressTracker;

    /**
     * @param ResumableDownload|string $resumableDownload
     * @param string $downloadHandlerClass
     * @param array $listeners
     * @param TransferListener|null $progressTracker
     */
    public function __construct(
        string|ResumableDownload $resumableDownload,
        string $downloadHandlerClass = FileDownloadHandler::class,
        array $listeners = [],
        ?TransferListener $progressTracker = null
    ) {
        $this->resumableDownload = $resumableDownload;
        $this->downloadHandlerClass = $downloadHandlerClass;
        $this->listeners = $listeners;
        $this->progressTracker = $progressTracker;
    }

    /**
     * @return string|ResumableDownload
     */
    public function getResumableDownload(): string|ResumableDownload
    {
        return $this->resumableDownload;
    }

    /**
     * @return string
     */
    public function getDownloadHandlerClass(): string
    {
        return $this->downloadHandlerClass;
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