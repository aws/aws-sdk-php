<?php

require __DIR__ . '/artifacts/Burgomaster.php';
require __DIR__ . '/../vendor/autoload.php';

$stageDirectory = __DIR__ . '/artifacts/staging';
$projectRoot = __DIR__ . '/../';
$burgomaster = new \Burgomaster($stageDirectory, $projectRoot);
$autoloaderFilename = 'aws-autoloader.php';

$metaFiles = ['README.md', 'LICENSE.md', 'NOTICE.md', 'CHANGELOG.md'];
foreach ($metaFiles as $file) {
    $burgomaster->deepCopy($file, $file);
}

// If a service name has been provided as a parameter, we'll build packages for
// that service only.
if (isset($argv[1])) {
    // Acquire data from the Aws\Sdk class via reflection.
    $sdk = new ReflectionClass('Aws\\Sdk');
    $aliases = $sdk->getProperty('aliases');
    $aliases->setAccessible(true);
    $aliases = $aliases->getValue(null);
    $services = $sdk->getProperty('services');
    $services->setAccessible(true);
    $services = $services->getValue(null);

    // Determine the service name and namespace, which will be the package name.
    $namespace = $argv[1];
    $service = strtolower($argv[1]);
    $service = isset($aliases[$service]) ? $aliases[$service] : $service;
    $packageName = $service;
    if (isset($services[$service])) {
        $namespace = $services[$service];
    }

    // Copy the needed files.
    $burgomaster->recursiveCopy("src/{$namespace}", "Aws/{$namespace}");
    $burgomaster->recursiveCopy('src/Common', 'Aws/Common', ['php', 'json']);

    // Remove unneeded models.
    $burgomaster->startSection('remove_models');
    foreach (glob(realpath($stageDirectory.'/Aws/Common/Resources/api').'/*.php') as $file) {
        if (strpos(basename($file), $service) !== 0) {
            $burgomaster->debug("Removing {$file}.");
            unlink($file);
        }
    }
    $burgomaster->endSection('remove_models');
} else {
    $burgomaster->recursiveCopy('src', 'Aws', ['php', 'json']);
    $packageName = 'aws';
}

$burgomaster->recursiveCopy('vendor/guzzlehttp/guzzle/src', 'GuzzleHttp');
$burgomaster->recursiveCopy('vendor/guzzlehttp/ringphp/src', 'GuzzleHttp/Ring');
$burgomaster->recursiveCopy('vendor/guzzlehttp/streams/src', 'GuzzleHttp/Stream');
$burgomaster->recursiveCopy('vendor/guzzlehttp/Command/src', 'GuzzleHttp/Command');
$burgomaster->recursiveCopy('vendor/guzzlehttp/message-integrity-subscriber/src', 'GuzzleHttp/Subscriber/MessageIntegrity');
$burgomaster->recursiveCopy('vendor/guzzlehttp/retry-subscriber/src', 'GuzzleHttp/Subscriber/Retry');
$burgomaster->recursiveCopy('vendor/guzzlehttp/log-subscriber/src', 'GuzzleHttp/Subscriber/Log');
$burgomaster->recursiveCopy('vendor/mtdowling/jmespath.php/src', 'JmesPath');
$burgomaster->recursiveCopy('vendor/psr/log/Psr/Log', 'Psr/Log');
$burgomaster->recursiveCopy('vendor/react/promise/src/React/Promise', 'React/Promise');

$burgomaster->createAutoloader(['React/Promise/functions.php'], $autoloaderFilename);
$burgomaster->createZip(__DIR__ . "/artifacts/{$packageName}.zip");
$burgomaster->createPhar(__DIR__ . "/artifacts/{$packageName}.phar", null, $autoloaderFilename);

$burgomaster->startSection('test_phar');
if ($packageName === 'aws') {
    $burgomaster->exec('php ' . __DIR__ . '/test_phar.php');
} else {
    $burgomaster->debug('Service-specific builds are not tested.');
}
$burgomaster->endSection();