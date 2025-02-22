<?php

namespace Aws\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\TransferListener;

final class MultiProgressTracker extends TransferListener implements ProgressTrackerInterface
{
    /** @var array */
    private array $singleProgressTrackers;

    /** @var resource */
    private mixed $output;

    /** @var int */
    private int $transferCount;

    /** @var int */
    private int $completed;

    /** @var int */
    private int $failed;

    /**
     * @param array $singleProgressTrackers
     * @param mixed|false|resource $output
     * @param int $transferCount
     * @param int $completed
     * @param int $failed
     */
    public function __construct(
        array $singleProgressTrackers = [],
        mixed $output = STDOUT,
        int $transferCount = 0,
        int $completed = 0,
        int $failed = 0,
    )
    {
        $this->singleProgressTrackers = $singleProgressTrackers;
        $this->output = $output;
        $this->transferCount = $transferCount;
        $this->completed = $completed;
        $this->failed = $failed;
    }

    /**
     * @return array
     */
    public function getSingleProgressTrackers(): array
    {
        return $this->singleProgressTrackers;
    }

    /**
     * @return mixed
     */
    public function getOutput(): mixed
    {
        return $this->output;
    }

    /**
     * @return int
     */
    public function getTransferCount(): int
    {
        return $this->transferCount;
    }

    /**
     * @return int
     */
    public function getCompleted(): int
    {
        return $this->completed;
    }

    /**
     * @return int
     */
    public function getFailed(): int
    {
        return $this->failed;
    }

    /**
     * @inheritDoc
     */
    public function transferInitiated(array $context): void
    {
        $this->transferCount++;
        $snapshot = $context['progress_snapshot'];
        $progressTracker = new SingleProgressTracker(
            clear: false,
        );
        $progressTracker->transferInitiated($context);
        $this->singleProgressTrackers[$snapshot->getIdentifier()] = $progressTracker;
        $this->showProgress();
    }

    /**
     * @inheritDoc
     */
    public function bytesTransferred(array $context): void
    {
        $snapshot = $context['progress_snapshot'];
        $progressTracker = $this->singleProgressTrackers[$snapshot->getIdentifier()];
        $progressTracker->bytesTransferred($context);
        $this->showProgress();
    }

    /**
     * @inheritDoc
     */
    public function transferComplete(array $context): void
    {
        $this->completed++;
        $snapshot = $context['progress_snapshot'];
        $progressTracker = $this->singleProgressTrackers[$snapshot->getIdentifier()];
        $progressTracker->transferComplete($context);
        $this->showProgress();
    }

    /**
     * @inheritDoc
     */
    public function transferFail(array $context): void
    {
        $this->failed++;
        $snapshot = $context['progress_snapshot'];
        $progressTracker = $this->singleProgressTrackers[$snapshot->getIdentifier()];
        $progressTracker->transferFail($context);
        $this->showProgress();
    }

    /**
     * @inheritDoc
     */
    public function showProgress(): void
    {
        fwrite($this->output, "\033[2J\033[H");
        $percentsSum = 0;
        foreach ($this->singleProgressTrackers as $_ => $progressTracker) {
            $progressTracker->showProgress();
            $percentsSum += $progressTracker->getProgressBar()->getPercentCompleted();
        }

        $percent = (int) floor($percentsSum / $this->transferCount);
        $allTransferProgressBar = new ConsoleProgressBar(
            percentCompleted: $percent,
            progressBarFormat: new PlainProgressBarFormat()
        );
        fwrite($this->output, "\n" . str_repeat(
                '-',
                $allTransferProgressBar->getProgressBarWidth())
        );
        fwrite(
            $this->output,
            sprintf(
                "\n%s Completed: %d/%d, Failed: %d/%d\n",
                $allTransferProgressBar->render(),
                $this->completed,
                $this->transferCount,
                $this->failed,
                $this->transferCount
            )
        );
    }
}