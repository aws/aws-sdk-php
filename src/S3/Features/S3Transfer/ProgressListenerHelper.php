<?php

namespace Aws\S3\Features\S3Transfer\Temp;

class ProgressListenerHelper
{
    const BYTES_UNIT ='B';
    const KB_UNIT ='KB';
    const MB_UNIT ='MB';

    static array $displayUnitMapping = [
        'B' => 'bytesToBytes',
        'KB' => 'bytesToKB',
        'MB' => 'bytesToMB',
    ];

    public static function getUnitValue(string $displayUnit, float $bytes): float {
        $displayUnit = self::validateDisplayUnit($displayUnit);
        if (isset(self::$displayUnitMapping[$displayUnit])) {
            return number_format(call_user_func([__CLASS__, self::$displayUnitMapping[$displayUnit]], $bytes));
        }

        throw new \RuntimeException("Unknown display unit {$displayUnit}");
    }

    private static function validateDisplayUnit(string $displayUnit): string {
        if (!isset(self::$displayUnitMapping[$displayUnit])) {
            throw new \InvalidArgumentException("Invalid display unit specified: $displayUnit");
        }

        return $displayUnit;
    }

    private static function bytesToBytes(float $bytes): float {
        return $bytes;
    }

    private static function bytesToKB(float $bytes): float {
        return $bytes / 1024;
    }

    private static function bytesToMB(float $bytes): float {
        return $bytes / 1024 / 1024;
    }
}