<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum;

use Aws\Core\Checksum\RequestChecksumCalculation;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class RequestChecksumCalculationTest extends TestCase
{
    /**
     * @return iterable<string, array{string, RequestChecksumCalculation}>
     */
    public static function validValues(): iterable
    {
        yield 'when_supported' => [
            'when_supported',
            RequestChecksumCalculation::WHEN_SUPPORTED
        ];
        yield 'when_required' => [
            'when_required',
            RequestChecksumCalculation::WHEN_REQUIRED
        ];
        yield 'upper case' => [
            'WHEN_REQUIRED',
            RequestChecksumCalculation::WHEN_REQUIRED
        ];
        yield 'surrounding whitespace' => [
            "  when_supported\t",
            RequestChecksumCalculation::WHEN_SUPPORTED
        ];
    }

    #[DataProvider('validValues')]
    public function testFromStringNormalizesValidValues(
        string $value,
        RequestChecksumCalculation $expected
    ): void
    {
        $this->assertSame(
            $expected,
            RequestChecksumCalculation::fromString($value)
        );
    }

    public function testFromStringRejectsUnknownValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid request checksum calculation value "always"'
        );

        RequestChecksumCalculation::fromString('always');
    }
}
