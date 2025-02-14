<?php

namespace Aws\Test\S3\Features\S3Transfer;

use PHPUnit\Framework\TestCase;
use Aws\S3\Features\S3Transfer\TransferListener;
use stdClass;

/**
 *
 */
class TransferListenerTest extends TestCase
{
    /**
     * Tests transfer is initiated.
     *
     * @return void
     */
    public function testTransferIsInitiated(): void
    {
        $called = false;
        $listener = new TransferListener(
            onTransferInitiated: function () use (&$called) {
                $called = true;
            }
        );
        $requestArgs = [];
        $listener->objectTransferInitiated('FooObjectKey', $requestArgs);
        $this->assertEquals(1, $listener->getObjectsToBeTransferred());

        $this->assertTrue($called);
    }

    /**
     * Tests object transfer is initiated.
     *
     * @return void
     */
    public function testObjectTransferIsInitiated(): void
    {
        $called = false;
        $listener = new TransferListener(
            onObjectTransferInitiated: function () use (&$called) {
                $called = true;
            }
        );
        $requestArgs = [];
        $listener->objectTransferInitiated('FooObjectKey', $requestArgs);
        $this->assertEquals(1, $listener->getObjectsToBeTransferred());

        $this->assertTrue($called);
    }

    /**
     * Tests object transfer progress.
     *
     * @dataProvider objectTransferProgressProvider
     *
     * @param array $objects
     *
     * @return void
     */
    public function testObjectTransferProgress(
        array $objects
    ): void {
        $called = 0;
        $listener = new TransferListener(
            onObjectTransferProgress: function () use (&$called) {
                $called++;
            }
        );
        $totalTransferred = 0;
        foreach ($objects as $objectKey => $transferDetails) {
            $requestArgs = [];
            $listener->objectTransferInitiated(
                $objectKey,
                $requestArgs,
            );
            $listener->objectTransferProgress(
                $objectKey,
                $transferDetails['transferredInBytes'],
                $transferDetails['sizeInBytes']
            );
            $totalTransferred += $transferDetails['transferredInBytes'];
        }

        $this->assertEquals(count($objects), $called);
        $this->assertEquals(count($objects), $listener->getObjectsToBeTransferred());
        $this->assertEquals($totalTransferred, $listener->getObjectsBytesTransferred());
    }

    /**
     * @return array
     */
    public function objectTransferProgressProvider(): array
    {
        return [
            [
                [
                    'FooObjectKey1' => [
                        'sizeInBytes' => 100,
                        'transferredInBytes' => 95,
                    ],
                    'FooObjectKey2' => [
                        'sizeInBytes' => 500,
                        'transferredInBytes' => 345,
                    ],
                    'FooObjectKey3' => [
                        'sizeInBytes' => 1024,
                        'transferredInBytes' => 256,
                    ],
                ]
            ]
        ];
    }

    /**
     * Tests object transfer failed.
     *
     * @return void
     */
    public function testObjectTransferFailed(): void
    {
        $expectedBytesTransferred = 45;
        $expectedReason = "Transfer failed!";
        $listener = new TransferListener(
            onObjectTransferFailed: function (
                string $objectKey,
                int $objectBytesTransferred,
                string $reason
            ) use ($expectedBytesTransferred, $expectedReason) {
                $this->assertEquals($expectedBytesTransferred, $objectBytesTransferred);
                $this->assertEquals($expectedReason, $reason);
            }
        );
        $requestArgs = [];
        $listener->objectTransferInitiated('FooObjectKey', $requestArgs);
        $listener->objectTransferFailed(
            'FooObjectKey',
            $expectedBytesTransferred,
            $expectedReason
        );

        $this->assertEquals(1, $listener->getObjectsTransferFailed());
        $this->assertEquals(0, $listener->getObjectsTransferCompleted());
    }

    /**
     * Tests object transfer completed.
     *
     * @return void
     */
    public function testObjectTransferCompleted(): void
    {
        $expectedBytesTransferred = 100;
        $listener = new TransferListener(
            onObjectTransferCompleted: function ($objectKey, $objectBytesTransferred)
            use ($expectedBytesTransferred) {
                $this->assertEquals($expectedBytesTransferred, $objectBytesTransferred);
            }
        );
        $requestArgs = [];
        $listener->objectTransferInitiated('FooObjectKey', $requestArgs);
        $listener->objectTransferProgress(
            'FooObjectKey',
            $expectedBytesTransferred,
            $expectedBytesTransferred
        );
        $listener->objectTransferCompleted('FooObjectKey', $expectedBytesTransferred);

        $this->assertEquals(1, $listener->getObjectsTransferCompleted());
        $this->assertEquals($expectedBytesTransferred, $listener->getObjectsBytesTransferred());
    }

    /**
     * Tests transfer is completed once all the objects in progress are completed.
     *
     * @return void
     */
    public function testTransferCompleted(): void
    {
        $expectedObjectsTransferred = 2;
        $expectedObjectBytesTransferred = 200;
        $listener = new TransferListener(
            onTransferCompleted: function(int $objectsTransferredCompleted, int $objectsBytesTransferred)
            use ($expectedObjectsTransferred, $expectedObjectBytesTransferred) {
                $this->assertEquals($expectedObjectsTransferred, $objectsTransferredCompleted);
                $this->assertEquals($expectedObjectBytesTransferred, $objectsBytesTransferred);
            }
        );
        $requestArgs = [];
        $listener->objectTransferInitiated('FooObjectKey_1', $requestArgs);
        $listener->objectTransferInitiated('FooObjectKey_2', $requestArgs);
        $listener->objectTransferProgress(
            'FooObjectKey_1',
            100,
            100
        );
        $listener->objectTransferProgress(
            'FooObjectKey_2',
            100,
            100
        );
        $listener->objectTransferCompleted(
            'FooObjectKey_1',
            100,
        );
        $listener->objectTransferCompleted(
            'FooObjectKey_2',
            100,
        );

        $this->assertEquals($expectedObjectsTransferred, $listener->getObjectsTransferCompleted());
        $this->assertEquals($expectedObjectBytesTransferred, $listener->getObjectsBytesTransferred());
    }
}
