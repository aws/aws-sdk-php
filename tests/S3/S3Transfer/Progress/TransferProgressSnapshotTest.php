<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TransferProgressSnapshot::class)]
final class TransferProgressSnapshotTest extends TestCase
{
    /**
     * @return void
     */
    public function testInitialization(): void
    {
        $snapshot = new TransferProgressSnapshot(
            'FooObject',
            0,
            10,
            ['Foo' => 'Bar']
        );

        $this->assertEquals($snapshot->getIdentifier(), 'FooObject');
        $this->assertEquals($snapshot->getTransferredBytes(), 0);
        $this->assertEquals($snapshot->getTotalBytes(), 10);
        $this->assertEquals($snapshot->getResponse(), ['Foo' => 'Bar']);
    }

    /**
     * @param int $transferredBytes
     * @param int $totalBytes
     * @param float $expectedRatio
     *
     * @return void
     */
    #[DataProvider('ratioTransferredProvider')]
    public function testRatioTransferred(
        int $transferredBytes,
        int $totalBytes,
        float $expectedRatio
    ): void
    {
        $snapshot = new TransferProgressSnapshot(
            'FooObject',
            $transferredBytes,
            $totalBytes
        );
        $this->assertEquals($expectedRatio, $snapshot->ratioTransferred());
    }

    /**
     * @return array
     */
    public static function ratioTransferredProvider(): array
    {
        return [
            'ratio_1' => [
                'transferred_bytes' => 10,
                'total_bytes' => 100,
                'expected_ratio' => 10 / 100,
            ],
            'ratio_2_transferred_bytes_zero' => [
                'transferred_bytes' => 0,
                'total_bytes' => 100,
                'expected_ratio' => 0,
            ],
            'ratio_3_unknown_total_bytes' => [
                'transferred_bytes' => 100,
                'total_bytes' => 0,
                'expected_ratio' => 0,
            ],
            'ratio_4' => [
                'transferred_bytes' => 50,
                'total_bytes' => 256,
                'expected_ratio' => 50 / 256,
            ],
            'ratio_5' => [
                'transferred_bytes' => 250,
                'total_bytes' => 256,
                'expected_ratio' => 250 / 256,
            ],
        ];
    }
}
