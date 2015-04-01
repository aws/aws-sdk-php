<?php
require __DIR__ . '/artifacts/aws.phar';

$conf = [
    'credentials' => ['key' => 'foo', 'secret' => 'bar'],
    'region'      => 'us-west-2',
    'version'     => 'latest'
];

// Normal autoloading of real classes.
Aws\S3\S3Client::factory($conf);

// Autoloading of legacy class names.
Aws\DynamoDb\DynamoDbClient::factory($conf);

// JMESPath autolaoder
\JmesPath\search('foo', ['foo' => 'bar']);

// React autoloader
$checks = [
    'GuzzleHttp\\uri_template',
    'GuzzleHttp\\Psr7\\stream_for',
    'GuzzleHttp\\Promise\\inspect',
    'JmesPath\\search',
    'Aws\\dir_iterator',
];

foreach ($checks as $check) {
    if (!function_exists($check)) {
        echo $checks . ' not found';
        exit(1);
    }
}

echo 'Version=' . Aws\Sdk::VERSION;
