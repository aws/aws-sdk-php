<?php

declare(strict_types=1);

namespace Aws\Core\Checksum;

/**
 * Controls when the SDK calculates flexible request checksums.
 */
enum RequestChecksumCalculation: string
{
    case WHEN_SUPPORTED = 'when_supported';
    case WHEN_REQUIRED = 'when_required';

    public static function fromString(string $value): self
    {
        $normalized = \strtolower(\trim($value));
        $setting = self::tryFrom($normalized);
        if ($setting !== null) {
            return $setting;
        }

        throw new \InvalidArgumentException(
            'Invalid request checksum calculation value "' . $value
            . '"; expected "when_supported" or "when_required".'
        );
    }
}
