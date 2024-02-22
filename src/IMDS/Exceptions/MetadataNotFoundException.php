<?php

namespace Aws\IMDS\Exceptions;

use Throwable;

class MetadataNotFoundException extends RequestNotFoundException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
