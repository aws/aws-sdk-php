<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

return array(
    'services' => array(

        'default_settings' => array(
            'params' => array()
        ),

        'cloudfront' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\CloudFront\CloudFrontClient'
        ),

        'datapipeline' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\DataPipeline\DataPipelineClient'
        ),

        'dynamodb' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\DynamoDb\DynamoDbClient'
        ),

        'glacier' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\Glacier\GlacierClient'
        ),

        'route53' => array(
            'extends' => 'default_settings',
            'class'   => 'Aws\Route53\Route53Client'
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
