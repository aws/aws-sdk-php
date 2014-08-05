<?php

error_reporting(-1);
date_default_timezone_set('UTC');

// Include the composer autoloader
$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->addPsr4('Aws\\Test\\', __DIR__);

// Clear our any JMESPath cache if necessary (e.g., COMPILE_DIR is enabled)
$runtime = JmesPath\Env::createRuntime();
$runtime->clearCache();
