<?php
namespace Aws\Test\Multipart;

use Aws\Multipart\UploadState;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

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
        $this->assertSame(50000000, $state->getPartSize());
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
        $this->assertSame(5, $newState->getPartSize());
        $this->assertArrayHasKey(1, $state->getUploadedParts());
        $this->assertTrue($newState->isInitiated());
        $this->assertArrayHasKey('foo', $newState->getId());
    }

    public function testEmptyUploadStateOutputWithConfigFalse()
    {
        $state = new UploadState([], ['display_progress' => false]);
        $state->getDisplayProgress(13);
        $this->expectOutputString('');
    }

    /**
     * @dataProvider getDisplayProgressCases
     */
    public function testGetDisplayProgressPrintsProgress(
        $totalSize,
        $totalUploaded,
        $progressBar
    ) {
        $state = new UploadState([], ['display_progress' => true]);
        $state->setProgressThresholds($totalSize);
        $state->getDisplayProgress($totalUploaded);

        $this->expectOutputString($progressBar);
    }

    public function getDisplayProgressCases()
    {
        $progressBar = ["Transfer initiated...\n|                    | 0.0%\n",
                        "|==                  | 12.5%\n",
                        "|=====               | 25.0%\n",
                        "|=======             | 37.5%\n",
                        "|==========          | 50.0%\n",
                        "|============        | 62.5%\n",
                        "|===============     | 75.0%\n",
                        "|=================   | 87.5%\n",
                        "|====================| 100.0%\nTransfer complete!\n"];
        return [
            [100000, 0, $progressBar[0]],
            [100000, 12499, $progressBar[0]],
            [100000, 12500, "{$progressBar[0]}{$progressBar[1]}"],
            [100000, 24999, "{$progressBar[0]}{$progressBar[1]}"],
            [100000, 25000, "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}"],
            [100000, 37499, "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}"],
            [
                100000,
                37500,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}"
            ],
            [
                100000,
                49999,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}"
            ],
            [
                100000,
                50000,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}" .
                "{$progressBar[4]}"
            ],
            [
                100000,
                62499,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}" .
                "{$progressBar[4]}"
            ],
            [
                100000,
                62500,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}" .
                "{$progressBar[4]}{$progressBar[5]}"
            ],
            [
                100000,
                74999,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}" .
                "{$progressBar[4]}{$progressBar[5]}"
            ],
            [
                100000,
                75000,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}" .
                "{$progressBar[4]}{$progressBar[5]}{$progressBar[6]}"
            ],
            [
                100000,
                87499,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}" .
                "{$progressBar[4]}{$progressBar[5]}{$progressBar[6]}"
            ],
            [
                100000,
                87500,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}" .
                "{$progressBar[4]}{$progressBar[5]}{$progressBar[6]}{$progressBar[7]}"
            ],
            [
                100000,
                99999,
                "{$progressBar[0]}{$progressBar[1]}{$progressBar[2]}{$progressBar[3]}" .
                "{$progressBar[4]}{$progressBar[5]}{$progressBar[6]}{$progressBar[7]}"
            ],
            [100000, 100000, implode($progressBar)]
        ];
    }

    /**
     * @dataProvider getThresholdCases
     */
    public function testUploadThresholds($totalSize)
    {
        $state = new UploadState([]);
        $threshold = $state->setProgressThresholds($totalSize);

        $this->assertIsArray($threshold);
        $this->assertCount(9, $threshold);
    }

    public function getThresholdCases()
    {
        return [
            [0],
            [100000],
            [100001]
        ];
    }

    /**
     * @dataProvider getInvalidIntCases
     */
    public function testSetProgressThresholdsThrowsException($totalSize)
    {
        $state = new UploadState([]);
        $this->expectExceptionMessage('The total size of the upload must be a number.');
        $this->expectException(\InvalidArgumentException::class);

        $state->setProgressThresholds($totalSize);
    }

    /**
     * @dataProvider getInvalidIntCases
     */
    public function testDisplayProgressThrowsException($totalUploaded)
    {
        $state = new UploadState([]);
        $this->expectExceptionMessage('The size of the bytes being uploaded must be a number.');
        $this->expectException(\InvalidArgumentException::class);
        $state->getDisplayProgress($totalUploaded);
    }

    public function getInvalidIntCases()
    {
        return [
            [''],
            [null],
            ['aws']
        ];
    }
}
