<?php

namespace Aws\IMDS\Exceptions;

use RuntimeException;

class RequestFailedException extends RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
