<?php

namespace Aws\S3\Features\S3Transfer;

use Aws\CommandInterface;
use Aws\ResultInterface;
use GuzzleHttp\Psr7\Utils;

trait MultipartDownloaderTrait
{
    /**
     * Main purpose of this method is to propagate
     * the download-initiated event to listeners, but
     * also it does some computation regarding internal states
     * that need to be maintained.
     *
     * @param array $commandArgs
     * @param int|null $currentPartNo
     *
     * @return void
     */
    private function downloadInitiated(array &$commandArgs, ?int $currentPartNo): void
    {
        $this->objectKey = $commandArgs['Key'];
        $this->progressListener?->objectTransferInitiated(
            $this->objectKey,
            $commandArgs
        );
        $this->_notifyMultipartDownloadListeners('downloadInitiated', [
            &$commandArgs,
            $currentPartNo
        ]);
    }

    /**
     * Propagates download-failed event to listeners.
     * It may also do some computation in order to maintain internal states.
     *
     * @param \Throwable $reason
     * @param int $totalPartsTransferred
     * @param int $totalBytesTransferred
     * @param int $lastPartTransferred
     *
     * @return void
     */
    private function downloadFailed(
        \Throwable $reason,
        int $totalPartsTransferred,
        int $totalBytesTransferred,
        int $lastPartTransferred
    ): void {
        $this->progressListener?->objectTransferFailed(
            $this->objectKey,
            $totalBytesTransferred,
            $reason
        );
        $this->_notifyMultipartDownloadListeners('downloadFailed', [
            $reason,
            $totalPartsTransferred,
            $totalBytesTransferred,
            $lastPartTransferred
        ]);
    }

    /**
     * Propagates part-download-initiated event to listeners.
     *
     * @param CommandInterface $partDownloadCommand
     * @param int $partNo
     *
     * @return void
     */
    private function partDownloadInitiated(CommandInterface $partDownloadCommand, int $partNo): void {
        $this->_notifyMultipartDownloadListeners('partDownloadInitiated', [
            $partDownloadCommand,
            $partNo
        ]);
    }

    /**
     * Propagates part-download-completed to listeners.
     * It also does some computation in order to maintain internal states.
     * In this specific method we move each part content into an accumulative
     * stream, which is meant to hold the full object content once the download
     * is completed.
     *
     * @param ResultInterface $result
     * @param int $partNo
     *
     * @return void
     */
    private function partDownloadCompleted(ResultInterface $result, int $partNo): void {
        $this->objectCompletedPartsCount++;
        $partDownloadBytes = $result['ContentLength'];
        $this->objectBytesTransferred = $this->objectBytesTransferred + $partDownloadBytes;
        if (isset($result['ETag'])) {
            $this->eTag = $result['ETag'];
        }
        Utils::copyToStream($result['Body'], $this->stream);

        $this->progressListener?->objectTransferProgress(
            $this->objectKey,
            $partDownloadBytes,
            $this->objectSizeInBytes
        );

        $this->_notifyMultipartDownloadListeners('partDownloadCompleted', [
            $result,
            $partNo,
            $partDownloadBytes,
            $this->objectCompletedPartsCount,
            $this->objectBytesTransferred,
            $this->objectSizeInBytes
        ]);
    }

    /**
     * Propagates part-download-failed event to listeners.
     *
     * @param CommandInterface $partDownloadCommand
     * @param \Throwable $reason
     * @param int $partNo
     *
     * @return void
     */
    private function partDownloadFailed(
        CommandInterface $partDownloadCommand,
        \Throwable $reason,
        int $partNo
    ): void {
        $this->progressListener?->objectTransferFailed(
            $this->objectKey,
            $this->objectBytesTransferred,
            $reason
        );
        $this->_notifyMultipartDownloadListeners(
            'partDownloadFailed',
            [$partDownloadCommand, $reason, $partNo]);
    }

    /**
     * Propagates object-download-completed event to listeners.
     * It also resets the pointer of the stream to the first position,
     * so that the stream is ready to be consumed once returned.
     *
     * @return void
     */
    private function objectDownloadCompleted(): void
    {
        $this->stream->rewind();
        $this->progressListener?->objectTransferCompleted(
            $this->objectKey,
            $this->objectBytesTransferred
        );
        $this->_notifyMultipartDownloadListeners('downloadCompleted', [
            $this->stream,
            $this->objectCompletedPartsCount,
            $this->objectBytesTransferred
        ]);
    }

    /**
     * Internal helper method for notifying listeners of specific events.
     *
     * @param string $listenerMethod
     * @param array $args
     *
     * @return void
     */
    private function _notifyMultipartDownloadListeners(string $listenerMethod, array $args): void
    {
        $this->listener?->{$listenerMethod}(...$args);
    }
}