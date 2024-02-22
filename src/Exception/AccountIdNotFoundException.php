<?php

namespace Aws\Exception;

class AccountIdNotFoundException extends \RuntimeException
{
    public function __construct($message = "") {
        parent::__construct($message);
    }
}
