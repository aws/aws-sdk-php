<?php

namespace Aws\Test\S3\S3Transfer\Progress;

use Aws\S3\S3Transfer\Progress\DirectoryTransferProgressSnapshot;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(DirectoryTransferProgressSnapshot::class)]
final class DirectoryTransferProgressSnapshotTest extends TestCase
{
    public function testConstructorAndGetters(): void
    {
        $snapshot = new DirectoryTransferProgressSnapshot(
            'upload:/src->bucket/prefix',
            500,
            2000,
            3,
            10,
            ['status' => 'ok'],
            'some reason'
        );

        $this->assertEquals('upload:/src->bucket/prefix', $snapshot->getIdentifier());
        $this->assertEquals(500, $snapshot->getTransferredBytes());
        $this->assertEquals(2000, $snapshot->getTotalBytes());
        $this->assertEquals(3, $snapshot->getTransferredFiles());
        $this->assertEquals(10, $snapshot->getTotalFiles());
        $this->assertEquals(['status' => 'ok'], $snapshot->getResponse());
        $this->assertEquals('some reason', $snapshot->getReason());
    }

    public function testDefaultsForOptionalParams(): void
    {
        $snapshot = new DirectoryTransferProgressSnapshot(
            'id',
            0,
            100,
            0,
            5
        );

        $this->assertNull($snapshot->getResponse());
        $this->assertNull($snapshot->getReason());
    }

    #[DataProvider('ratioTransferredProvider')]
    public function testRatioTransferred(
        int $transferredBytes,
        int $totalBytes,
        float $expectedRatio
    ): void {
        $snapshot = new DirectoryTransferProgressSnapshot(
            'id',
            $transferredBytes,
            $totalBytes,
            0,
            0
        );
        $this->assertEqualsWithDelta($expectedRatio, $snapshot->ratioTransferred(), 0.0001);
    }

    public static function ratioTransferredProvider(): array
    {
        return [
            'zero total bytes returns zero' => [100, 0, 0.0],
            'zero transferred returns zero' => [0, 100, 0.0],
            'half transferred' => [50, 100, 0.5],
            'fully transferred' => [100, 100, 1.0],
            'partial' => [33, 200, 0.165],
        ];
    }

    public function testToArray(): void
    {
        $snapshot = new DirectoryTransferProgressSnapshot(
            'my-id',
            100,
            500,
            2,
            8,
            ['r' => 'val'],
            'error'
        );

        $array = $snapshot->toArray();

        $this->assertEquals('my-id', $array['identifier']);
        $this->assertEquals(100, $array['transferredBytes']);
        $this->assertEquals(500, $array['totalBytes']);
        $this->assertEquals(2, $array['transferredFiles']);
        $this->assertEquals(8, $array['totalFiles']);
        $this->assertEquals(['r' => 'val'], $array['response']);
        $this->assertEquals('error', $array['reason']);
    }

    public function testWithResponse(): void
    {
        $snapshot = new DirectoryTransferProgressSnapshot(
            'id', 10, 100, 1, 5
        );

        $withResponse = $snapshot->withResponse(['status' => 'done']);

        // Original is unchanged
        $this->assertNull($snapshot->getResponse());
        // New snapshot has the response
        $this->assertEquals(['status' => 'done'], $withResponse->getResponse());
        // Other fields are preserved
        $this->assertEquals('id', $withResponse->getIdentifier());
        $this->assertEquals(10, $withResponse->getTransferredBytes());
        $this->assertEquals(100, $withResponse->getTotalBytes());
        $this->assertEquals(1, $withResponse->getTransferredFiles());
        $this->assertEquals(5, $withResponse->getTotalFiles());
    }

    public function testWithTotals(): void
    {
        $snapshot = new DirectoryTransferProgressSnapshot(
            'id', 50, 100, 2, 5
        );

        $withTotals = $snapshot->withTotals(200, 10);

        // Original unchanged
        $this->assertEquals(100, $snapshot->getTotalBytes());
        $this->assertEquals(5, $snapshot->getTotalFiles());
        // New snapshot has updated totals
        $this->assertEquals(200, $withTotals->getTotalBytes());
        $this->assertEquals(10, $withTotals->getTotalFiles());
        // Progress preserved
        $this->assertEquals(50, $withTotals->getTransferredBytes());
        $this->assertEquals(2, $withTotals->getTransferredFiles());
    }

    public function testWithProgress(): void
    {
        $snapshot = new DirectoryTransferProgressSnapshot(
            'id', 50, 200, 2, 10
        );

        $withProgress = $snapshot->withProgress(150, 8);

        // Original unchanged
        $this->assertEquals(50, $snapshot->getTransferredBytes());
        $this->assertEquals(2, $snapshot->getTransferredFiles());
        // New snapshot has updated progress
        $this->assertEquals(150, $withProgress->getTransferredBytes());
        $this->assertEquals(8, $withProgress->getTransferredFiles());
        // Totals preserved
        $this->assertEquals(200, $withProgress->getTotalBytes());
        $this->assertEquals(10, $withProgress->getTotalFiles());
    }

    public function testFromArray(): void
    {
        $data = [
            'identifier' => 'from-array-id',
            'transferredBytes' => 75,
            'totalBytes' => 300,
            'transferredFiles' => 3,
            'totalFiles' => 12,
            'response' => ['ok' => true],
            'reason' => 'test reason',
        ];

        $snapshot = DirectoryTransferProgressSnapshot::fromArray($data);

        $this->assertEquals('from-array-id', $snapshot->getIdentifier());
        $this->assertEquals(75, $snapshot->getTransferredBytes());
        $this->assertEquals(300, $snapshot->getTotalBytes());
        $this->assertEquals(3, $snapshot->getTransferredFiles());
        $this->assertEquals(12, $snapshot->getTotalFiles());
        $this->assertEquals(['ok' => true], $snapshot->getResponse());
        $this->assertEquals('test reason', $snapshot->getReason());
    }

    public function testFromArrayWithDefaults(): void
    {
        $snapshot = DirectoryTransferProgressSnapshot::fromArray([]);

        $this->assertEquals('', $snapshot->getIdentifier());
        $this->assertEquals(0, $snapshot->getTransferredBytes());
        $this->assertEquals(0, $snapshot->getTotalBytes());
        $this->assertEquals(0, $snapshot->getTransferredFiles());
        $this->assertEquals(0, $snapshot->getTotalFiles());
        $this->assertNull($snapshot->getResponse());
        $this->assertNull($snapshot->getReason());
    }

    public function testFromArrayToArrayRoundTrip(): void
    {
        $data = [
            'identifier' => 'round-trip',
            'transferredBytes' => 50,
            'totalBytes' => 200,
            'transferredFiles' => 1,
            'totalFiles' => 4,
            'response' => null,
            'reason' => null,
        ];

        $snapshot = DirectoryTransferProgressSnapshot::fromArray($data);
        $this->assertEquals($data, $snapshot->toArray());
    }

    public function testReasonCanBeThrowable(): void
    {
        $exception = new \RuntimeException('fail');
        $snapshot = new DirectoryTransferProgressSnapshot(
            'id', 0, 100, 0, 1, null, $exception
        );
        $this->assertSame($exception, $snapshot->getReason());
    }
}
