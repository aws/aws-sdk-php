<?php
require __DIR__ . '/artifacts/Burgomaster.php';

$stageDirectory = __DIR__ . '/artifacts/staging';
$projectRoot = __DIR__ . '/../';
$burgomaster = new \Burgomaster($stageDirectory, $projectRoot);

$metaFiles = ['README.md', 'LICENSE.md', 'NOTICE.md', 'CHANGELOG.md'];
foreach ($metaFiles as $file) {
    $burgomaster->deepCopy($file, $file);
}

// Copy each dependency to the staging directory. Copy *.php and *.pem files.
$burgomaster->recursiveCopy('src', 'Aws', ['php', 'json']);
$burgomaster->recursiveCopy('vendor/guzzlehttp/guzzle/src', 'GuzzleHttp', ['php', 'pem']);
$burgomaster->recursiveCopy('vendor/guzzlehttp/Command/src', 'GuzzleHttp/Command');
$burgomaster->recursiveCopy('vendor/guzzlehttp/message-integrity-subscriber/src', 'GuzzleHttp/Subscriber/MessageIntegrity');
$burgomaster->recursiveCopy('vendor/guzzlehttp/retry-subscriber/src', 'GuzzleHttp/Subscriber/Retry');
$burgomaster->recursiveCopy('vendor/guzzlehttp/log-subscriber/src', 'GuzzleHttp/Subscriber/Log');
$burgomaster->recursiveCopy('vendor/guzzlehttp/streams/src', 'GuzzleHttp/Streams');
$burgomaster->recursiveCopy('vendor/mtdowling/jmespath.php/src', 'JmesPath');

$burgomaster->createAutoloader();
$burgomaster->createZip(__DIR__ . '/artifacts/aws.zip');
$burgomaster->createPhar(__DIR__ . '/artifacts/aws.phar');
