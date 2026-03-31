<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TransferListenerNotifier::class)]
final class TransferListenerNotifierTest extends TestCase
{
    /**
     * @return void
     */
    public function testListenerNotifier(): void {
        $listeners = [
            $this->getMockBuilder(AbstractTransferListener::class)
                ->getMock(),
            $this->getMockBuilder(AbstractTransferListener::class)
                ->getMock(),
            $this->getMockBuilder(AbstractTransferListener::class)
                ->getMock(),
            $this->getMockBuilder(AbstractTransferListener::class)
                ->getMock(),
            $this->getMockBuilder(AbstractTransferListener::class)
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
