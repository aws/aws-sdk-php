<?php

namespace Aws\S3\Features\S3Transfer;

use Closure;
use Throwable;

class TransferListener extends ListenerNotifier
{
    /**
     * @param Closure|null $onTransferInitiated
     * No parameters will be passed.
     *
     * @param Closure|null $onObjectTransferInitiated
     *  Parameters that will be passed when invoked:
     *  - $objectKey: The key that identifies the object being transferred.
     *  - $objectRequestArgs: The arguments that initiated the object transfer request.
     *
     * @param Closure|null $onObjectTransferProgress
     *  Parameters that will be passed when invoked:
     *  - $objectKey: The key that identifies the object being transferred.
     *  - $objectBytesTransferred: The total of bytes transferred for this object.
     *  - $objectSizeInBytes: The size in bytes of the object.
     *
     * @param Closure|null $onObjectTransferFailed
     *  Parameters that will be passed when invoked:
     *  - $objectKey: The object key for which the transfer has failed.
     *  - $objectBytesTransferred: The total of bytes transferred from
     *    this object.
     *  - $reason: The reason why the transfer failed for this object.
     *
     * @param Closure|null $onObjectTransferCompleted
     * Parameters that will be passed when invoked:
     *  - $objectKey: The object key for which the transfer was completed.
     *  - $objectBytesCompleted: The total of bytes transferred for this object.
     *
     * @param Closure|null $onTransferProgress
     * Parameters that will be passed when invoked:
     *  - $totalObjectsTransferred: The number of objects transferred.
     *  - $totalBytesTransferred: The total of bytes already transferred on this event.
     *  - $totalBytes: The total of bytes to be transferred.
     *
     * @param Closure|null $onTransferCompleted
     * Parameters that will be passed when invoked:
     *  - $objectsTransferCompleted: The number of objects that were transferred.
     *  - $objectsBytesTransferred: The total of bytes that were transferred.
     *
     * @param Closure|null $onTransferFailed
     * Parameters that will be passed when invoked:
     *  - $objectsTransferCompleted: The total of objects transferred before failure.
     *  - $objectsBytesTransferred: The total of bytes transferred before failure.
     *  - $objectsTransferFailed: The total of objects that failed in the transfer.
     *  - $reason: The throwable with the reason why the transfer failed.
     * @param int $objectsTransferCompleted
     * @param int $objectsBytesTransferred
     * @param int $objectsTransferFailed
     * @param int $objectsToBeTransferred
     */
    public function __construct(
        public ?Closure $onTransferInitiated  = null,
        public ?Closure $onObjectTransferInitiated = null,
        public ?Closure $onObjectTransferProgress = null,
        public ?Closure $onObjectTransferFailed = null,
        public ?Closure $onObjectTransferCompleted = null,
        public ?Closure $onTransferProgress = null,
        public ?Closure $onTransferCompleted = null,
        public ?Closure $onTransferFailed = null,
        private int $objectsTransferCompleted = 0,
        private int $objectsBytesTransferred = 0,
        private int $objectsTransferFailed = 0,
        private int $objectsToBeTransferred = 0
    ) {}

    /**
     * @return int
     */
    public function getObjectsTransferCompleted(): int
    {
        return $this->objectsTransferCompleted;
    }

    /**
     * @return int
     */
    public function getObjectsBytesTransferred(): int
    {
        return $this->objectsBytesTransferred;
    }

    /**
     * @return int
     */
    public function getObjectsTransferFailed(): int
    {
        return $this->objectsTransferFailed;
    }

    /**
     * @return int
     */
    public function getObjectsToBeTransferred(): int
    {
        return $this->objectsToBeTransferred;
    }

    /**
     * Transfer initiated event.
     */
    public function transferInitiated(): void
    {
        $this->notify('onTransferInitiated', []);
    }

    /**
     * Event for when an object transfer initiated.
     *
     * @param string $objectKey
     * @param array $requestArgs
     *
     * @return void
     */
    public function objectTransferInitiated(string $objectKey, array &$requestArgs): void
    {
        $this->objectsToBeTransferred++;
        if ($this->objectsToBeTransferred === 1) {
            $this->transferInitiated();
        }

        $this->notify('onObjectTransferInitiated', [$objectKey, &$requestArgs]);
    }

    /**
     * Event for when an object transfer made some progress.
     *
     * @param string $objectKey
     * @param int $objectBytesTransferred
     * @param int $objectSizeInBytes
     *
     * @return void
     */
    public function objectTransferProgress(
        string $objectKey,
        int $objectBytesTransferred,
        int $objectSizeInBytes
    ): void
    {
        $this->objectsBytesTransferred += $objectBytesTransferred;
        $this->notify('onObjectTransferProgress', [
            $objectKey,
            $objectBytesTransferred,
            $objectSizeInBytes
        ]);
        // Needs state management
        $this->notify('onTransferProgress', [
            $this->objectsTransferCompleted,
            $this->objectsBytesTransferred,
            $this->objectsToBeTransferred
        ]);
    }

    /**
     * Event for when an object transfer failed.
     *
     * @param string $objectKey
     * @param int $objectBytesTransferred
     * @param \Throwable|string $reason
     *
     * @return void
     */
    public function objectTransferFailed(
        string $objectKey,
        int $objectBytesTransferred,
        \Throwable | string $reason
    ): void
    {
        $this->objectsTransferFailed++;
        $this->validateTransferComplete();
        $this->notify('onObjectTransferFailed', [
            $objectKey,
            $objectBytesTransferred,
            $reason
        ]);
    }

    /**
     * Event for when an object transfer is completed.
     *
     * @param string $objectKey
     * @param int $objectBytesCompleted
     *
     * @return void
     */
    public function objectTransferCompleted (
        string $objectKey,
        int $objectBytesCompleted
    ): void
    {
        $this->objectsTransferCompleted++;
        $this->validateTransferComplete();
        $this->notify('onObjectTransferCompleted', [
            $objectKey,
            $objectBytesCompleted
        ]);
    }

    /**
     * Event for when a transfer is completed.
     *
     * @param int $objectsTransferCompleted
     * @param int $objectsBytesTransferred
     *
     * @return void
     */
    public function transferCompleted (
        int $objectsTransferCompleted,
        int $objectsBytesTransferred,
    ): void
    {
        $this->notify('onTransferCompleted', [
            $objectsTransferCompleted,
            $objectsBytesTransferred
        ]);
    }

    /**
     * Event for when a transfer is completed.
     *
     * @param int $objectsTransferCompleted
     * @param int $objectsBytesTransferred
     * @param int $objectsTransferFailed
     *
     * @return void
     */
    public function transferFailed (
        int $objectsTransferCompleted,
        int $objectsBytesTransferred,
        int $objectsTransferFailed,
        Throwable | string $reason
    ): void
    {
        $this->notify('onTransferFailed', [
            $objectsTransferCompleted,
            $objectsBytesTransferred,
            $objectsTransferFailed,
            $reason
        ]);
    }

    /**
     * Validates if a transfer is completed, and if so then the event is propagated
     * to the subscribed listeners.
     *
     * @return void
     */
    private function validateTransferComplete(): void
    {
        if ($this->objectsToBeTransferred === ($this->objectsTransferCompleted + $this->objectsTransferFailed)) {
            if ($this->objectsTransferFailed > 0) {
                $this->transferFailed(
                    $this->objectsTransferCompleted,
                    $this->objectsBytesTransferred,
                    $this->objectsTransferFailed,
                    "Transfer could not have been completed successfully."
                );
            } else {
                $this->transferCompleted(
                    $this->objectsTransferCompleted,
                    $this->objectsBytesTransferred
                );
            }
        }
    }

    protected function notify(string $event, array $params = []): void
    {
        $listener = match ($event) {
            'onTransferInitiated'        => $this->onTransferInitiated,
            'onObjectTransferInitiated'  => $this->onObjectTransferInitiated,
            'onObjectTransferProgress'   => $this->onObjectTransferProgress,
            'onObjectTransferFailed'     => $this->onObjectTransferFailed,
            'onObjectTransferCompleted'  => $this->onObjectTransferCompleted,
            'onTransferProgress'         => $this->onTransferProgress,
            'onTransferCompleted'        => $this->onTransferCompleted,
            'onTransferFailed'           => $this->onTransferFailed,
            default                      => null,
        };

        if ($listener instanceof Closure) {
            $listener(...$params);
        }
    }
}