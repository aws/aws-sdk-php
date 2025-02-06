<?php

namespace Aws\S3\Features\S3Transfer;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Closure;

class MultipartDownloadListener extends ListenerNotifier
{
    /**
     * @param Closure|null $onDownloadInitiated
     *  Parameters that will be passed when invoked:
     *  - &$commandArgs: A pointer to the initial request arguments.
     *  - $initialPart: The number of the part from where the download will start.
     *
     * @param Closure|null $onDownloadFailed
     *  Parameters that will be passed when invoked:
     *  - $reason: The throwable with the reason why the download failed.
     *  - $totalPartsDownloaded: The total of parts downloaded before failure.
     *  - $totalBytesDownloaded: The total of bytes downloaded before failure.
     *  - $lastPartDownloaded: The number of the last part that was downloaded
     *    before failure.
     *
     * @param Closure|null $onDownloadCompleted
     *  Parameters that will be passed when invoked:
     *  - $stream: The stream which holds the bytes for the file downloaded.
     *  - $totalPartsDownloaded: The number of parts that were downloaded.
     *  - $totalBytesDownloaded: The total of bytes that were downloaded.
     *
     * @param Closure|null $onPartDownloadInitiated
     *  Parameters that will be passed when invoked:
     *  - $partDownloadCommand: The command for downloading the current part.
     *  - $partNo: The part to be downloaded.
     *
     * @param Closure|null $onPartDownloadCompleted
     *  Parameters that will be passed when invoked:
     *  - $result: The result received from the service for that part download .
     *  - $partNo: The part number just downloaded.
     *  - $partTotalBytes: The size of the part just downloaded.
     *  - $totalParts: The total parts for the full object to be downloaded.
     *  - $objectBytesDownloaded: The total in bytes already downloaded.
     *  - $objectSizeInBytes: The total in bytes for the full object to be downloaded.
     *
     * @param Closure|null $onPartDownloadFailed
     *  Parameters that will be passed when invoked: 
     *  - $partDownloadCommand: The command that initiated the download request.
     *  - $reason: The throwable exception gotten which should contain why the
     *             request failed.
     *  - $partNo: The part number for which the request failed.
     */
    public function __construct(
        public ?Closure $onDownloadInitiated = null,
        public ?Closure $onDownloadFailed = null,
        public ?Closure $onDownloadCompleted = null,
        public ?Closure $onPartDownloadInitiated = null,
        public ?Closure $onPartDownloadCompleted = null,
        public ?Closure $onPartDownloadFailed = null
    ) {}


    /**
     * Event for when a download is initiated.
     * Warning: If this method is overridden, it is recommended
     *  to call parent::downloadInitiated() in order to
     *  keep the states maintained in this implementation.
     *
     * @param array &$commandArgs
     * @param int $initialPart
     *
     * @return void
     */
    public function downloadInitiated(array &$commandArgs, int $initialPart): void {
        $this->notify('onDownloadInitiated', [&$commandArgs, $initialPart]);
    }

    /**
     * Event for when a download fails.
     * Warning: If this method is overridden, it is recommended
     * to call parent::downloadFailed() in order to
     * keep the states maintained in this implementation.
     *
     * @param \Throwable $reason
     * @param int $totalPartsDownloaded
     * @param int $totalBytesDownloaded
     * @param int $lastPartDownloaded
     *
     * @return void
     */
    public function downloadFailed(\Throwable $reason, int $totalPartsDownloaded, int $totalBytesDownloaded, int $lastPartDownloaded): void {
        $this->notify('onDownloadFailed', [$reason, $totalPartsDownloaded, $totalBytesDownloaded, $lastPartDownloaded]);
    }

    /**
     * Event for when a download completes.
     * Warning: If this method is overridden, it is recommended
     * to call parent::onDownloadCompleted() in order to
     * keep the states maintained in this implementation.
     *
     * @param resource $stream
     * @param int $totalPartsDownloaded
     * @param int $totalBytesDownloaded
     *
     * @return void
     */
    public function downloadCompleted($stream, int $totalPartsDownloaded, int $totalBytesDownloaded): void {
        $this->notify('onDownloadCompleted', [$stream, $totalPartsDownloaded, $totalBytesDownloaded]);
    }

    /**
     * Event for when a part download is initiated.
     * Warning: If this method is overridden, it is recommended
     * to call parent::partDownloadInitiated() in order to
     * keep the states maintained in this implementation.
     *
     * @param mixed $partDownloadCommand
     * @param int $partNo
     *
     * @return void
     */
    public function partDownloadInitiated(CommandInterface $partDownloadCommand, int $partNo): void {
        $this->notify('onPartDownloadInitiated', [$partDownloadCommand, $partNo]);
    }

    /**
     * Event for when a part download completes.
     * Warning: If this method is overridden, it is recommended
     * to call parent::onPartDownloadCompleted() in order to
     * keep the states maintained in this implementation.
     *
     * @param ResultInterface $result
     * @param int $partNo
     * @param int $partTotalBytes
     * @param int $totalParts
     * @param int $objectBytesDownloaded
     * @param int $objectSizeInBytes
     * @return void
     */
    public function partDownloadCompleted(
        ResultInterface $result,
        int $partNo,
        int $partTotalBytes,
        int $totalParts,
        int $objectBytesDownloaded,
        int $objectSizeInBytes
    ): void
    {
        $this->notify('onPartDownloadCompleted', [
            $result,
            $partNo,
            $partTotalBytes,
            $totalParts,
            $objectBytesDownloaded,
            $objectSizeInBytes
        ]);
    }

    /**
     * Event for when a part download fails.
     * Warning: If this method is overridden, it is recommended
     * to call parent::onPartDownloadFailed() in order to
     * keep the states maintained in this implementation.
     *
     * @param CommandInterface $partDownloadCommand
     * @param \Throwable $reason
     * @param int $partNo
     *
     * @return void
     */
    public function partDownloadFailed(CommandInterface $partDownloadCommand, \Throwable $reason, int $partNo): void {
        $this->notify('onPartDownloadFailed', [$partDownloadCommand, $reason, $partNo]);
    }

    protected function notify(string $event, array $params = []): void
    {
        $listener = match ($event) {
            'onDownloadInitiated'     => $this->onDownloadInitiated,
            'onDownloadFailed'        => $this->onDownloadFailed,
            'onDownloadCompleted'     => $this->onDownloadCompleted,
            'onPartDownloadInitiated' => $this->onPartDownloadInitiated,
            'onPartDownloadCompleted' => $this->onPartDownloadCompleted,
            'onPartDownloadFailed'    => $this->onPartDownloadFailed,
            default                   => null,
        };

        if ($listener instanceof Closure) {
            $listener(...$params);
        }
    }
}