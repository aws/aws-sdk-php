<?php

namespace Aws\DynamoDb\Session;

if (version_compare(phpversion(), '5.4', '>=')) {
    interface SessionHandlerInterface extends \SessionHandlerInterface {}
} else {
    interface SessionHandlerInterface {}
}
