<?php return array(
    'services' => array(
        'default_settings' => array(
            'params' => array()
        ),
        'dynamodb' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\DynamoDb\DynamoDbClient'
        ),
        'dynamodb.session_handler' => array(
            'class'  => 'Aws\DynamoDb\Session\SessionHandler',
            'params' => array(
                'dynamodb_client' => '{dynamodb}'
            )
        ),
        'sts' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\Sts\StsClient'
        ),
        's3' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\S3\S3Client'
        )
    )
);
