<?php

namespace Aws\S3\S3Transfer\Progress;

class TransferListenerNotifier extends TransferListener
{
    /** @var TransferListener[] */
    private array $listeners;

    /**
     * @param array $listeners
     */
    public function __construct(array $listeners = [])
    {
        foreach ($listeners as $listener) {
            if (!$listener instanceof TransferListener) {
                throw new \InvalidArgumentException(
                    "Listener must implement " . TransferListener::class . "."
                );
            }
        }
        $this->listeners = $listeners;
    }

    /**
     * @param TransferListener $listener
     *
     * @return void
     */
    public function addListener(TransferListener $listener): void {
        $this->listeners[] = $listener;
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function transferInitiated(array $context): void
    {
        foreach ($this->listeners as $listener) {
            $listener->transferInitiated($context);
        }
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function bytesTransferred(array $context): void
    {
        foreach ($this->listeners as $listener) {
            $listener->bytesTransferred($context);
        }
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function transferComplete(array $context): void
    {
        foreach ($this->listeners as $listener) {
            $listener->transferComplete($context);
        }
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function transferFail(array $context): void
    {
        foreach ($this->listeners as $listener) {
            $listener->transferFail($context);
        }
    }
}
