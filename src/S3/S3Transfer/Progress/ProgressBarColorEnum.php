<?php

namespace Aws\S3\S3Transfer\Progress;

enum ProgressBarColorEnum: string
{
    case BLACK_COLOR_CODE = '[30m';
    case BLUE_COLOR_CODE = '[34m';
    case GREEN_COLOR_CODE = '[32m';
    case RED_COLOR_CODE = '[31m';
    case PLAIN_FORMAT = 'plain';

    public static function isValid(string $color): bool {
        return self::tryFrom($color) !== null;
    }
}
