<?php
return array(
    'version' => 2,
    'endpoints' => array(
        '*/*' => array(
            'endpoint' => '{service}.{region}.amazonaws.com'
        ),
        'cn-north-1/*' => array(
            'endpoint' => '{service}.{region}.amazonaws.com.cn',
            'signatureVersion' => 'v4'
        ),
        'us-gov-west-1/iam' => array(
            'endpoint' => 'iam.us-gov.amazonaws.com'
        ),
        'us-gov-west-1/sts' => array(
            'endpoint' => 'sts.us-gov-west-1.amazonaws.com'
        ),
        'us-gov-west-1/s3' => array(
            'endpoint' => 's3-{region}.amazonaws.com'
        ),
        'eu-central-1/autoscaling' => array(
            'endpoint' => 'autoscaling.eu-central-1.amazonaws.com'
        ),
        '*/cloudfront' => array(
            'endpoint' => 'cloudfront.amazonaws.com',
            'credentialScope' => array(
                'region' => 'us-east-1'
            )
        ),
        '*/iam' => array(
            'endpoint' => 'iam.amazonaws.com',
            'credentialScope' => array(
                'region' => 'us-east-1'
            )
        ),
        '*/importexport' => array(
            'endpoint' => 'importexport.amazonaws.com',
            'credentialScope' => array(
                'region' => 'us-east-1'
            )
        ),
        '*/route53' => array(
            'endpoint' => 'route53.amazonaws.com',
            'credentialScope' => array(
                'region' => 'us-east-1'
            )
        ),
        '*/sts' => array(
            'endpoint' => 'sts.amazonaws.com',
            'credentialScope' => array(
                'region' => 'us-east-1'
            )
        ),
        'us-east-1/sdb' => array(
            'endpoint' => 'sdb.amazonaws.com'
        ),
        'us-east-1/s3' => array(
            'endpoint' => 's3.amazonaws.com'
        ),
        'us-west-1/s3' => array(
            'endpoint' => 's3-{region}.amazonaws.com'
        ),
        'us-west-2/s3' => array(
            'endpoint' => 's3-{region}.amazonaws.com'
        ),
        'eu-west-1/s3' => array(
            'endpoint' => 's3-{region}.amazonaws.com'
        ),
        'ap-southeast-1/s3' => array(
            'endpoint' => 's3-{region}.amazonaws.com'
        ),
        'ap-southeast-2/s3' => array(
            'endpoint' => 's3-{region}.amazonaws.com'
        ),
        'ap-northeast-1/s3' => array(
            'endpoint' => 's3-{region}.amazonaws.com'
        ),
        'sa-east-1/s3' => array(
            'endpoint' => 's3-{region}.amazonaws.com'
        )
    )
);
