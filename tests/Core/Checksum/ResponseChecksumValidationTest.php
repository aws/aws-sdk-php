<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum;

use Aws\Core\Checksum\ResponseChecksumValidation;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ResponseChecksumValidationTest extends TestCase
{
    /**
     * @return iterable<string, array{string, ResponseChecksumValidation}>
     */
    public static function validValues(): iterable
    {
        yield 'when_supported' => [
            'when_supported',
            ResponseChecksumValidation::WHEN_SUPPORTED
        ];
        yield 'when_required' => [
            'when_required',
            ResponseChecksumValidation::WHEN_REQUIRED
        ];
        yield 'upper case' => [
            'WHEN_REQUIRED',
            ResponseChecksumValidation::WHEN_REQUIRED
        ];
        yield 'surrounding whitespace' => [
            "  when_supported\t",
            ResponseChecksumValidation::WHEN_SUPPORTED
        ];
    }

    #[DataProvider('validValues')]
    public function testFromStringNormalizesValidValues(
        string $value,
        ResponseChecksumValidation $expected
    ): void
    {
        $this->assertSame(
            $expected,
            ResponseChecksumValidation::fromString($value)
        );
    }

    public function testFromStringRejectsUnknownValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid response checksum validation value "always"'
        );

        ResponseChecksumValidation::fromString('always');
    }
}
