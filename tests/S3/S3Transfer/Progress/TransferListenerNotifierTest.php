<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use PHPUnit\Framework\TestCase;

class TransferListenerNotifierTest extends TestCase
{
    /**
     * @return void
     */
    public function testListenerNotifier(): void {
        $listeners = [
            $this->getMockBuilder(TransferListener::class)
                ->getMock(),
            $this->getMockBuilder(TransferListener::class)
                ->getMock(),
            $this->getMockBuilder(TransferListener::class)
                ->getMock(),
            $this->getMockBuilder(TransferListener::class)
                ->getMock(),
            $this->getMockBuilder(TransferListener::class)
                ->getMock(),
        ];
        foreach ($listeners as $listener) {
            $listener->expects($this->once())->method('transferInitiated');
            $listener->expects($this->once())->method('bytesTransferred');
            $listener->expects($this->once())->method('transferComplete');
            $listener->expects($this->once())->method('transferFail');
        }
        $listenerNotifier = new TransferListenerNotifier($listeners);
        $listenerNotifier->transferInitiated([]);
        $listenerNotifier->bytesTransferred([]);
        $listenerNotifier->transferComplete([]);
        $listenerNotifier->transferFail([]);
    }
}
