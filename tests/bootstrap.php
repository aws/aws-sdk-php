<?php
error_reporting(-1);
date_default_timezone_set('UTC');

// Include the composer autoloader
$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->addPsr4('Aws\\Test\\', __DIR__);

// Clear out any previously compiled json files
$compiler = new \Aws\JsonCompiler();
$compiler->purge();

// Clear out any previously compiled JMESPath files.
JmesPath\Env::cleanCompileDir();
