<?php
require __DIR__ . '/artifacts/aws.phar';

$conf = [
    'credentials' => ['key' => 'foo', 'secret' => 'bar'],
    'region'      => 'us-west-2',
    'version'     => 'latest'
];

// Ensure that a client can be created.
$s3 = new Aws\S3\S3Client($conf);
// Ensure that waiters can be found.
$s3->getPaginator('ListObjects');

// Legacy factory instantiation.
Aws\DynamoDb\DynamoDbClient::factory($conf);

// JMESPath autoloader
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
