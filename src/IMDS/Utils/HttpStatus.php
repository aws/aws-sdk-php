<?php

namespace Aws\IMDS\Utils;

final class HttpStatus
{
    public const OK = 200;
    const MISSING_OR_INVALID_PARAMETERS = 400;
    const FORBIDDEN = 403;
    const UNAUTHORIZED = 401;
    const NOT_FOUND = 404;

    private function __construct() {}
}
