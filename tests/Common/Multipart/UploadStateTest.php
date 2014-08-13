<?php

namespace Aws\Test\Common\Multipart;

use Aws\Common\Multipart\UploadState;

/**
 * @covers Aws\Common\Multipart\UploadState
 */
class UploadStateTest extends \PHPUnit_Framework_TestCase
{
    public function testCanManageStatusAndUploadId()
    {
        $state = new UploadState(['a' => true]);
        $this->assertArrayHasKey('a', $state->getUploadId());
        // Note: the state should not be initiated at first.
        $this->assertFalse($state->isInitiated());

        $state->setStatus(UploadState::INITIATED, ['b' => true]);
        // Note: Specified uploadId data should wholly replace the current data.
        $this->assertArrayHasKey('b', $state->getUploadId());
        $this->assertArrayNotHasKey('a', $state->getUploadId());
        $this->assertTrue($state->isInitiated());

        $state->setStatus(UploadState::COMPLETED);
        $this->assertTrue($state->isInitiated());
        $this->assertTrue($state->isCompleted());

        $state->setStatus(UploadState::ABORTED);
        $this->assertTrue($state->isInitiated());
        $this->assertTrue($state->isAborted());
        $this->assertFalse($state->isCompleted());
    }

    public function testCanStorePartSize()
    {
        $state = new UploadState([]);
        $this->assertNull($state->getPartSize());
        $state->setPartSize(50000000);
        $this->assertEquals(50000000, $state->getPartSize());
    }

    public function testCanTrackUploadedParts()
    {
        $state = new UploadState([]);
        $this->assertEmpty($state->getUploadedParts());

        $state->markPartAsUploaded(1, ['foo' => 1]);
        $state->markPartAsUploaded(3, ['foo' => 3]);
        $state->markPartAsUploaded(2, ['foo' => 2]);
        // Note: The parts should come out sorted.
        $this->assertSame([1, 2, 3], array_keys($state->getUploadedParts()));
    }

    public function testSerializationWorks()
    {
        $state = new UploadState([]);
        $state->setPartSize(5);
        $state->markPartAsUploaded(1);
        $state->setStatus($state::INITIATED, ['foo' => 'bar']);
        $serializedState = serialize($state);

        /** @var UploadState $newState */
        $newState = unserialize($serializedState);
        $this->assertEquals(5, $newState->getPartSize());
        $this->assertArrayHasKey(1, $state->getUploadedParts());
        $this->assertTrue($newState->isInitiated());
        $this->assertArrayHasKey('foo', $newState->getUploadId());
    }
}
