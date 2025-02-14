<?php

namespace Aws\S3\Features\S3Transfer;

use Closure;

class DefaultProgressTracker
{
    /** @var ObjectProgressTracker[] */
    private array $objects;

    /** @var int */
    private int $totalBytesTransferred;

    /** @var int */
    private int $objectsTotalSizeInBytes;

    /** @var int */
    private int $objectsInProgress;

    /** @var int */
    private int $objectsCount;

    /** @var int */
    private int $transferPercentCompleted;

    /** @var TransferListener */
    private TransferListener $transferListener;

    /** @var Closure|ProgressBarFactory|null */
    private Closure|ProgressBarFactory|null $progressBarFactory;

    /** @var resource */
    private $output;

    /**
     * @param Closure|ProgressBarFactory|null $progressBarFactory
     */
    public function __construct(
        Closure | ProgressBarFactory | null $progressBarFactory = null,
        $output = STDOUT
    ) {
        $this->clear();
        $this->initializeListener();
        $this->progressBarFactory = $progressBarFactory ?? $this->defaultProgressBarFactory();
        if (get_resource_type($output) !== 'stream') {
            throw new \InvalidArgumentException("The type for $output must be a stream");
        }

        $this->output = $output;
    }

    private function initializeListener(): void {
        $this->transferListener = new TransferListener();
        // Object transfer initialized
        $this->transferListener->onObjectTransferInitiated = $this->objectTransferInitiated();
        // Object transfer made progress
        $this->transferListener->onObjectTransferProgress = $this->objectTransferProgress();
        $this->transferListener->onObjectTransferFailed = $this->objectTransferFailed();
        $this->transferListener->onObjectTransferCompleted = $this->objectTransferCompleted();
    }

    /**
     * @return TransferListener
     */
    public function getTransferListener(): TransferListener {
        return $this->transferListener;
    }

    /**
     * @return int
     */
    public function getTotalBytesTransferred(): int
    {
        return $this->totalBytesTransferred;
    }

    /**
     * @return int
     */
    public function getObjectsTotalSizeInBytes(): int
    {
        return $this->objectsTotalSizeInBytes;
    }

    /**
     * @return int
     */
    public function getObjectsInProgress(): int
    {
        return $this->objectsInProgress;
    }

    /**
     * @return int
     */
    public function getObjectsCount(): int
    {
        return $this->objectsCount;
    }

    /**
     * @return int
     */
    public function getTransferPercentCompleted(): int
    {
        return $this->transferPercentCompleted;
    }

    /**
     *
     * @return Closure
     */
    private function objectTransferInitiated(): Closure
    {
        return function (string $objectKey, array &$requestArgs) {
            $progressBarFactoryFn = $this->progressBarFactory;
            $this->objects[$objectKey] = new ObjectProgressTracker(
                objectKey: $objectKey,
                objectBytesTransferred: 0,
                objectSizeInBytes: 0,
                status: 'initiated',
                progressBar: $progressBarFactoryFn()
            );
            $this->objectsInProgress++;
            $this->objectsCount++;

            $this->showProgress();
        };
    }

    /**
     * @return Closure
     */
    private function objectTransferProgress(): Closure
    {
        return function (
            string $objectKey,
            int $objectBytesTransferred,
            int $objectSizeInBytes
        ): void {
            $objectProgressTracker = $this->objects[$objectKey];
            if ($objectProgressTracker->getObjectSizeInBytes() === 0) {
                $objectProgressTracker->setObjectSizeInBytes($objectSizeInBytes);
                // Increment objectsTotalSizeInBytes just the first time we set
                // the object total size.
                $this->objectsTotalSizeInBytes =
                    $this->objectsTotalSizeInBytes + $objectSizeInBytes;
            }
            $objectProgressTracker->incrementTotalBytesTransferred(
                $objectBytesTransferred
            );
            $objectProgressTracker->setStatus('progress');

            $this->increaseBytesTransferred($objectBytesTransferred);

            $this->showProgress();
        };
    }

    /**
     * @return Closure
     */
    public function objectTransferFailed(): Closure
    {
        return function (
            string $objectKey,
            int $totalObjectBytesTransferred,
            \Throwable | string $reason
        ): void {
            $objectProgressTracker = $this->objects[$objectKey];
            $objectProgressTracker->setStatus('failed');

            $this->objectsInProgress--;

            $this->showProgress();
        };
    }

    /**
     * @return Closure
     */
    public function objectTransferCompleted(): Closure
    {
        return function (
            string $objectKey,
            int $objectBytesTransferred,
        ): void {
            $objectProgressTracker = $this->objects[$objectKey];
            $objectProgressTracker->setStatus('completed');
            $this->showProgress();
        };
    }

    /**
     * Clear the internal state holders.
     *
     * @return void
     */
    public function clear(): void
    {
        $this->objects = [];
        $this->totalBytesTransferred = 0;
        $this->objectsTotalSizeInBytes = 0;
        $this->objectsInProgress = 0;
        $this->objectsCount = 0;
        $this->transferPercentCompleted = 0;
    }

    /**
     * @param int $bytesTransferred
     *
     * @return void
     */
    private function increaseBytesTransferred(int $bytesTransferred): void {
        $this->totalBytesTransferred += $bytesTransferred;
        if ($this->objectsTotalSizeInBytes !== 0) {
            $this->transferPercentCompleted = floor(($this->totalBytesTransferred / $this->objectsTotalSizeInBytes) * 100);
        }
    }

    /**
     * @return void
     */
    private function showProgress(): void {
        // Clear screen
        fwrite($this->output, "\033[2J\033[H");

        // Display progress header
        fwrite($this->output, sprintf(
            "\r%d%% [%s/%s]\n",
            $this->transferPercentCompleted,
            $this->objectsInProgress,
            $this->objectsCount
        ));

        foreach ($this->objects as $name => $object) {
            fwrite($this->output, sprintf(
                "\r%s:\n%s\n",
                $name,
                $object->getProgressBar()->getPaintedProgress()
            ));
        }
    }

    /**
     * @return Closure|ProgressBarFactory
     */
    private function defaultProgressBarFactory(): Closure| ProgressBarFactory {
        return function () {
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
        };
    }

}