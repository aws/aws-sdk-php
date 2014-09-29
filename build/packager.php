<?php
require __DIR__ . '/artifacts/Burgomaster.php';

$stageDirectory = __DIR__ . '/artifacts/staging';
$projectRoot = __DIR__ . '/../';
$burgomaster = new \Burgomaster($stageDirectory, $projectRoot);
$autoloaderFilename = 'aws-autoloader.php';

$metaFiles = ['README.md', 'LICENSE.md', 'NOTICE.md', 'CHANGELOG.md'];
foreach ($metaFiles as $file) {
    $burgomaster->deepCopy($file, $file);
}

// Copy each dependency to the staging directory. Copy *.php and *.pem files.
$burgomaster->recursiveCopy('src', 'Aws', ['php', 'json']);
$burgomaster->recursiveCopy('vendor/guzzlehttp/guzzle/src', 'GuzzleHttp');
$burgomaster->recursiveCopy('vendor/guzzlehttp/ring/src', 'GuzzleHttp/Ring');
$burgomaster->recursiveCopy('vendor/guzzlehttp/streams/src', 'GuzzleHttp/Stream');
$burgomaster->recursiveCopy('vendor/guzzlehttp/Command/src', 'GuzzleHttp/Command');
$burgomaster->recursiveCopy('vendor/guzzlehttp/message-integrity-subscriber/src', 'GuzzleHttp/Subscriber/MessageIntegrity');
$burgomaster->recursiveCopy('vendor/guzzlehttp/retry-subscriber/src', 'GuzzleHttp/Subscriber/Retry');
$burgomaster->recursiveCopy('vendor/guzzlehttp/log-subscriber/src', 'GuzzleHttp/Subscriber/Log');
$burgomaster->recursiveCopy('vendor/mtdowling/jmespath.php/src', 'JmesPath');
$burgomaster->recursiveCopy('vendor/psr/log/Psr/Log', 'Psr/Log');

$burgomaster->createAutoloader([], $autoloaderFilename);
$burgomaster->createZip(__DIR__ . '/artifacts/aws.zip');
$burgomaster->createPhar(__DIR__ . '/artifacts/aws.phar', null, $autoloaderFilename);

$burgomaster->startSection('test_phar');
$burgomaster->exec('php ' . __DIR__ . '/test_phar.php');
$burgomaster->endSection();
