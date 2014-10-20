<?php
return [
    'version' => 2,
    '*/*' => [
        'endpoint' => '{service}.{region}.amazonaws.com'
    ],
    'cn-north-*/*' => [
        'endpoint' => '{service}.{region}.amazonaws.com.cn',
        'signatureVersion' => 'v4'
    ],
    'us-gov-west-*/iam' => [
        'endpoint' => 'iam.us-gov.amazonaws.com'
    ],
    'us-gov-west-*/sts' => [
        'endpoint' => 'sts.us-gov.amazonaws.com'
    ],
    'us-gov-west-*/s3' => [
        'endpoint' => 's3-{region}.amazonaws.com'
    ],
    '*/cloudfront' => [
        'endpoint' => 'cloudfront.amazonaws.com'
    ],
    '*/iam' => [
        'endpoint' => 'iam.amazonaws.com'
    ],
    '*/importexport' => [
        'endpoint' => 'importexport.amazonaws.com'
    ],
    '*/route53' => [
        'endpoint' => 'route53.amazonaws.com'
    ],
    '*/sts' => [
        'endpoint' => 'sts.amazonaws.com'
    ],
    'us-east-*/sdb' => [
        'endpoint' => 'sdb.amazonaws.com'
    ],
    'us-east-1/s3' => [
        'endpoint' => 's3.amazonaws.com'
    ],
    'us-west-*/s3' => [
        'endpoint' => 's3-{region}.amazonaws.com'
    ],
    'eu-west-*/s3' => [
        'endpoint' => 's3-{region}.amazonaws.com'
    ],
    'ap-southeast-*/s3' => [
        'endpoint' => 's3-{region}.amazonaws.com'
    ],
    'ap-northeast-*/s3' => [
        'endpoint' => 's3-{region}.amazonaws.com'
    ],
    'sa-east-*/s3' => [
        'endpoint' => 's3-{region}.amazonaws.com'
    ]
];
