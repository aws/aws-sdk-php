<?php

namespace Aws\S3\Features\S3Transfer;

/**
 * To represent the progress of an object being transferred.
 */
class ObjectProgressTracker
{
    /**
     * @param string $objectKey
     * @param int $objectBytesTransferred
     * @param int $objectSizeInBytes
     * @param string $status
     * Possible values are:
     *  - initiated
     *  - progress
     *  - failed
     *  - completed
     * @param ?ProgressBar $progressBar
     */
    public function __construct(
        private string $objectKey,
        private int $objectBytesTransferred,
        private int $objectSizeInBytes,
        private string $status,
        private ?ProgressBar $progressBar = null
    ) {
        $this->progressBar = $progressBar ?? $this->defaultProgressBar();
    }

    /**
     * @return string
     */
    public function getObjectKey(): string
    {
        return $this->objectKey;
    }

    /**
     * @param string $objectKey
     *
     * @return void
     */
    public function setObjectKey(string $objectKey): void
    {
        $this->objectKey = $objectKey;
    }

    /**
     * @return int
     */
    public function getObjectBytesTransferred(): int
    {
        return $this->objectBytesTransferred;
    }

    /**
     * @param int $objectBytesTransferred
     *
     * @return void
     */
    public function setObjectBytesTransferred(int $objectBytesTransferred): void
    {
        $this->objectBytesTransferred = $objectBytesTransferred;
    }

    /**
     * @return int
     */
    public function getObjectSizeInBytes(): int
    {
        return $this->objectSizeInBytes;
    }

    /**
     * @param int $objectSizeInBytes
     *
     * @return void
     */
    public function setObjectSizeInBytes(int $objectSizeInBytes): void
    {
        $this->objectSizeInBytes = $objectSizeInBytes;
        // Update progress bar
        $this->progressBar->setArg('tobe_transferred', $objectSizeInBytes);
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
        $this->setProgressColor();
    }

    private function setProgressColor(): void
    {
        if ($this->status === 'progress') {
            $this->progressBar->setArg('color_code', ConsoleProgressBar::BLUE_COLOR_CODE);
        } elseif ($this->status === 'completed') {
            $this->progressBar->setArg('color_code', ConsoleProgressBar::GREEN_COLOR_CODE);
        } elseif ($this->status === 'failed') {
            $this->progressBar->setArg('color_code', ConsoleProgressBar::RED_COLOR_CODE);
        }
    }

    /**
     * Increments the object bytes transferred.
     *
     * @param int $objectBytesTransferred
     *
     * @return void
     */
    public function incrementTotalBytesTransferred(
        int $objectBytesTransferred
    ): void
    {
        $this->objectBytesTransferred += $objectBytesTransferred;
        $progressPercent = (int) floor(($this->objectBytesTransferred / $this->objectSizeInBytes) * 100);
        // Update progress bar
        $this->progressBar->setPercentCompleted($progressPercent);
        $this->progressBar->setArg('transferred', $this->objectBytesTransferred);
    }

    /**
     * @return ProgressBar|null
     */
    public function getProgressBar(): ?ProgressBar
    {
        return $this->progressBar;
    }

    /**
     * @return ProgressBar
     */
    private function defaultProgressBar(): ProgressBar
    {
        return new ConsoleProgressBar(
            format: ConsoleProgressBar::$formats[
                ConsoleProgressBar::COLORED_TRANSFER_FORMAT
            ],
            args: [
                'transferred' => 0,
                'tobe_transferred' => 0,
                'unit' => 'B',
                'color_code' => ConsoleProgressBar::BLACK_COLOR_CODE,
            ]
        );
    }
}