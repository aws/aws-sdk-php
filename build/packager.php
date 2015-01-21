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

$burgomaster->recursiveCopy('src', 'Aws', ['php', 'json']);
$burgomaster->recursiveCopy('vendor/mtdowling/transducers/src', 'Transducers');
$burgomaster->recursiveCopy('vendor/guzzlehttp/guzzle/src', 'GuzzleHttp');
$burgomaster->recursiveCopy('vendor/guzzlehttp/ringphp/src', 'GuzzleHttp/Ring');
$burgomaster->recursiveCopy('vendor/guzzlehttp/streams/src', 'GuzzleHttp/Stream');
$burgomaster->recursiveCopy('vendor/guzzlehttp/Command/src', 'GuzzleHttp/Command');
$burgomaster->recursiveCopy('vendor/guzzlehttp/message-integrity-subscriber/src', 'GuzzleHttp/Subscriber/MessageIntegrity');
$burgomaster->recursiveCopy('vendor/guzzlehttp/retry-subscriber/src', 'GuzzleHttp/Subscriber/Retry');
$burgomaster->recursiveCopy('vendor/guzzlehttp/log-subscriber/src', 'GuzzleHttp/Subscriber/Log');
$burgomaster->recursiveCopy('vendor/mtdowling/jmespath.php/src', 'JmesPath');
$burgomaster->recursiveCopy('vendor/psr/log/Psr/Log', 'Psr/Log');
$burgomaster->recursiveCopy('vendor/react/promise/src', 'React/Promise');

$burgomaster->createAutoloader([
    'React/Promise/functions.php',
    'JmesPath/JmesPath.php',
    'Transducers/transducers.php'
], $autoloaderFilename);

$burgomaster->createZip(__DIR__ . "/artifacts/aws.zip");
$burgomaster->createPhar(__DIR__ . "/artifacts/aws.phar", null, $autoloaderFilename);

$burgomaster->startSection('test-phar');
$burgomaster->exec('php ' . __DIR__ . '/test-phar.php');
$burgomaster->endSection();
