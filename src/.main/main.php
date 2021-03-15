<?php

use Aws\Sts\StsClient;

require __DIR__ . '/../../vendor/autoload.php';

$stsclient = new StsClient(
    [
        'profile' => 'default',
        'version' => 'latest',
        'region'  => 'us-east-1',
        'use_aws_shared_config_files' => false,
        'debug' => true
    ]
);
