<?php
error_reporting(-1);
date_default_timezone_set('UTC');

// Include the composer autoloader
$loader = require __DIR__ . '/../vendor/autoload.php';

if (!class_exists('\PHPUnit\Framework\Constraint\RegularExpression')) {
    class_alias('\PHPUnit_Framework_Constraint_PCREMatch', '\PHPUnit\Framework\Constraint\RegularExpression');
}

if (!class_exists('\PHPUnit\Framework\Constraint\Callback')) {
    class_alias('\PHPUnit_Framework_Constraint_Callback','\PHPUnit\Framework\Constraint\Callback');
}

if (!class_exists('\PHPUnit\Framework\Error\Warning')) {
    class_alias('\PHPUnit_Framework_Error_Warning', '\PHPUnit\Framework\Error\Warning');
}

// Clear out any previously compiled JMESPath files.
JmesPath\Env::cleanCompileDir();
