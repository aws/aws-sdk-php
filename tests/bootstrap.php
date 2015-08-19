<?php
error_reporting(-1);
date_default_timezone_set('UTC');

// Include the composer autoloader
$loader = require __DIR__ . '/../vendor/autoload.php';

// Clear out any previously compiled JMESPath files.
JmesPath\Env::cleanCompileDir();
