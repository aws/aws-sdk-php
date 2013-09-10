<?php

namespace Aws\DynamoDb\Session;

if (PHP_VERSION_ID >= 50400) {
    /**
     * @see http://php.net/manual/en/class.sessionhandlerinterface.php
     */
    interface SessionHandlerInterface extends \SessionHandlerInterface {}
} else {
    interface SessionHandlerInterface {}
}
