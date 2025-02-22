<?php

namespace Aws\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\TransferListener;

/**
 * To track single object transfers.
 */
final class SingleProgressTracker extends TransferListener implements ProgressTrackerInterface
{
    /** @var ProgressBarInterface */
    private ProgressBarInterface $progressBar;

    /** @var resource */
    private mixed $output;

    /** @var string */
    private string $objectName;

    /** @var bool */
    private bool $clear;

    /**
     * @param ProgressBarInterface $progressBar
     * @param mixed|false|resource $output
     * @param string $objectName
     * @param bool $clear
     */
    public function __construct(
        ProgressBarInterface $progressBar = new ConsoleProgressBar(),
        mixed $output = STDOUT,
        string $objectName = '',
        bool $clear = true,
    )
    {
        $this->progressBar = $progressBar;
        if (get_resource_type($output) !== 'stream') {
            throw new \InvalidArgumentException("The type for $output must be a stream");
        }
        $this->output = $output;
        $this->objectName = $objectName;
        $this->clear = $clear;
    }

    /**
     * @return ProgressBarInterface
     */
    public function getProgressBar(): ProgressBarInterface
    {
        return $this->progressBar;
    }

    /**
     * @return mixed
     */
    public function getOutput(): mixed
    {
        return $this->output;
    }

    /**
     * @return string
     */
    public function getObjectName(): string
    {
        return $this->objectName;
    }

    /**
     * @return bool
     */
    public function isClear(): bool {
        return $this->clear;
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function transferInitiated(array $context): void
    {
        $snapshot = $context['progress_snapshot'];
        $this->objectName = $snapshot->getIdentifier();
        $progressFormat = $this->progressBar->getProgressBarFormat();
        if ($progressFormat instanceof ColoredTransferProgressBarFormat) {
            $progressFormat->setArg(
                'object_name',
                $this->objectName
            );
        }

        $this->updateProgressBar($snapshot);
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function bytesTransferred(array $context): void
    {
        $progressFormat = $this->progressBar->getProgressBarFormat();
        if ($progressFormat instanceof ColoredTransferProgressBarFormat) {
            $progressFormat->setArg(
                'color_code',
                ColoredTransferProgressBarFormat::BLUE_COLOR_CODE
            );
        }

        $this->updateProgressBar($context['progress_snapshot']);
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function transferComplete(array $context): void
    {
        $progressFormat = $this->progressBar->getProgressBarFormat();
        if ($progressFormat instanceof ColoredTransferProgressBarFormat) {
            $progressFormat->setArg(
                'color_code',
                ColoredTransferProgressBarFormat::GREEN_COLOR_CODE
            );
        }

        $snapshot = $context['progress_snapshot'];
        $this->updateProgressBar(
            $snapshot,
            $snapshot->getTotalBytes() === 0
        );
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function transferFail(array $context): void
    {
        $progressFormat = $this->progressBar->getProgressBarFormat();
        if ($progressFormat instanceof ColoredTransferProgressBarFormat) {
            $progressFormat->setArg(
                'color_code',
                ColoredTransferProgressBarFormat::RED_COLOR_CODE
            );
            $progressFormat->setArg(
                'message',
                $context['reason']
            );
        }

        $this->updateProgressBar($context['progress_snapshot']);
    }

    /**
     * Updates the progress bar with the transfer snapshot
     * and also call showProgress.
     *
     * @param TransferProgressSnapshot $snapshot
     * @param bool $forceCompletion To force the progress bar to be
     * completed. This is useful for files where its size is zero,
     * for which a ratio will return zero, and hence the percent
     * will be zero.
     *
     * @return void
     */
    private function updateProgressBar(
        TransferProgressSnapshot $snapshot,
        bool $forceCompletion = false
    ): void
    {
        if (!$forceCompletion) {
            $this->progressBar->setPercentCompleted(
                ((int)floor($snapshot->ratioTransferred() * 100))
            );
        } else {
            $this->progressBar->setPercentCompleted(100);
        }

        $this->progressBar->getProgressBarFormat()->setArgs([
            'transferred' => $snapshot->getTransferredBytes(),
            'tobe_transferred' => $snapshot->getTotalBytes(),
            'unit' => 'B',
        ]);
        // Display progress
        $this->showProgress();
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function showProgress(): void
    {
        if (empty($this->objectName)) {
            throw new \RuntimeException(
                "Progress tracker requires an object name to be set."
            );
        }

        if ($this->clear) {
            fwrite($this->output, "\033[2J\033[H");
        }

        fwrite($this->output, sprintf(
            "\r\n%s",
            $this->progressBar->render()
        ));
        fflush($this->output);
    }
}