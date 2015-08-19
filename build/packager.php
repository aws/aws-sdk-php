<?php
require __DIR__ . '/Burgomaster.php';
require __DIR__ . '/../vendor/autoload.php';

$stageDirectory = __DIR__ . '/artifacts/staging';
$projectRoot = __DIR__ . '/../';
$burgomaster = new \Burgomaster($stageDirectory, $projectRoot);
$autoloaderFilename = 'aws-autoloader.php';

$metaFiles = ['README.md', 'LICENSE.md', 'NOTICE.md', 'CHANGELOG.md'];
foreach ($metaFiles as $file) {
    $burgomaster->deepCopy($file, $file);
}

$burgomaster->recursiveCopy('src', 'Aws');
$burgomaster->recursiveCopy('vendor/mtdowling/jmespath.php/src', 'JmesPath');
$burgomaster->recursiveCopy('vendor/guzzlehttp/guzzle/src', 'GuzzleHttp');
$burgomaster->recursiveCopy('vendor/guzzlehttp/psr7/src', 'GuzzleHttp/Psr7');
$burgomaster->recursiveCopy('vendor/guzzlehttp/promises/src', 'GuzzleHttp/Promise');
$burgomaster->recursiveCopy('vendor/psr/http-message/src', 'Psr/Http/Message');

$burgomaster->createAutoloader([
    'Aws/functions.php',
    'GuzzleHttp/functions.php',
    'GuzzleHttp/Psr7/functions.php',
    'GuzzleHttp/Promise/functions.php',
    'JmesPath/JmesPath.php',
], $autoloaderFilename);

$burgomaster->createZip(__DIR__ . "/artifacts/aws.zip");
$burgomaster->createPhar(
    __DIR__ . "/artifacts/aws.phar",
    null,
    $autoloaderFilename,
    'aws-' . \Aws\Sdk::VERSION . '.phar'
);

$burgomaster->startSection('test-phar');
$burgomaster->exec('php ' . __DIR__ . '/test-phar.php');
$burgomaster->endSection();
