<?php return array(
    'services' => array(

        'default_settings' => array(
            'params' => array()
        ),

        'cloudfront' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\CloudFront\CloudFrontClient'
        ),

        'dynamodb' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\DynamoDb\DynamoDbClient'
        ),

        'glacier' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\Glacier\GlacierClient'
        ),

        's3' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\S3\S3Client'
        ),

        'sts' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\Sts\StsClient'
        )

    )
);
