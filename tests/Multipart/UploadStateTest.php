<?php
namespace Aws\Test\Multipart;

use Aws\Multipart\UploadState;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Multipart\UploadState
 */
class UploadStateTest extends TestCase
{
    public function testCanManageStatusAndUploadId()
    {
        $state = new UploadState(['a' => true]);
        $this->assertArrayHasKey('a', $state->getId());
        // Note: the state should not be initiated at first.
        $this->assertFalse($state->isInitiated());
        $this->assertFalse($state->isCompleted());

        $state->setUploadId('b', true);
        $this->assertArrayHasKey('b', $state->getId());
        $this->assertArrayHasKey('a', $state->getId());

        $state->setStatus(UploadState::INITIATED);
        $this->assertFalse($state->isCompleted());
        $this->assertTrue($state->isInitiated());

        $state->setStatus(UploadState::COMPLETED);
        $this->assertFalse($state->isInitiated());
        $this->assertTrue($state->isCompleted());
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

        $this->assertTrue($state->hasPartBeenUploaded(2));
        $this->assertFalse($state->hasPartBeenUploaded(5));

        // Note: The parts should come out sorted.
        $this->assertSame([1, 2, 3], array_keys($state->getUploadedParts()));
    }

    public function testSerializationWorks()
    {
        $state = new UploadState([]);
        $state->setPartSize(5);
        $state->markPartAsUploaded(1);
        $state->setStatus($state::INITIATED);
        $state->setUploadId('foo', 'bar');
        $serializedState = serialize($state);

        /** @var UploadState $newState */
        $newState = unserialize($serializedState);
        $this->assertEquals(5, $newState->getPartSize());
        $this->assertArrayHasKey(1, $state->getUploadedParts());
        $this->assertTrue($newState->isInitiated());
        $this->assertArrayHasKey('foo', $newState->getId());
    }
}
