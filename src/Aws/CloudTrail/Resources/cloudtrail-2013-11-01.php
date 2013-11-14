<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

return array (
    'apiVersion' => '2013-11-01',
    'endpointPrefix' => 'cloudtrail',
    'serviceFullName' => 'AWS CloudTrail',
    'serviceAbbreviation' => 'CloudTrail',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.',
    'signatureVersion' => 'v4',
    'namespace' => 'CloudTrail',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.us-east-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.us-west-2.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CreateTrail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateTrailResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.CreateTrail',
                ),
                'trail' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'S3BucketName' => array(
                            'type' => 'string',
                        ),
                        'S3KeyPrefix' => array(
                            'type' => 'string',
                        ),
                        'SnsTopicName' => array(
                            'type' => 'string',
                        ),
                        'IncludeGlobalServiceEvents' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'MaximumNumberOfTrailsExceededException',
                ),
                array(
                    'class' => 'TrailAlreadyExistsException',
                ),
                array(
                    'class' => 'S3BucketDoesNotExistException',
                ),
                array(
                    'class' => 'InsufficientS3BucketPolicyException',
                ),
                array(
                    'class' => 'InsufficientSnsTopicPolicyException',
                ),
                array(
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'InvalidS3BucketNameException',
                ),
                array(
                    'class' => 'InvalidS3PrefixException',
                ),
                array(
                    'class' => 'InvalidSnsTopicNameException',
                ),
                array(
                    'class' => 'InvalidTrailNameException',
                ),
                array(
                    'class' => 'TrailNotProvidedException',
                ),
            ),
        ),
        'DeleteTrail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.DeleteTrail',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'InvalidTrailNameException',
                ),
            ),
        ),
        'DescribeTrails' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTrailsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.DescribeTrails',
                ),
                'trailNameList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'GetTrailStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetTrailStatusResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.GetTrailStatus',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'InvalidTrailNameException',
                ),
            ),
        ),
        'StartLogging' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.StartLogging',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'S3BucketDoesNotExistException',
                ),
                array(
                    'class' => 'InsufficientS3BucketPolicyException',
                ),
                array(
                    'class' => 'InsufficientSnsTopicPolicyException',
                ),
                array(
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'InvalidTrailNameException',
                ),
            ),
        ),
        'StopLogging' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.StopLogging',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'InvalidTrailNameException',
                ),
            ),
        ),
        'UpdateTrail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateTrailResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.UpdateTrail',
                ),
                'trail' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'S3BucketName' => array(
                            'type' => 'string',
                        ),
                        'S3KeyPrefix' => array(
                            'type' => 'string',
                        ),
                        'SnsTopicName' => array(
                            'type' => 'string',
                        ),
                        'IncludeGlobalServiceEvents' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'S3BucketDoesNotExistException',
                ),
                array(
                    'class' => 'InsufficientS3BucketPolicyException',
                ),
                array(
                    'class' => 'InsufficientSnsTopicPolicyException',
                ),
                array(
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'InvalidS3BucketNameException',
                ),
                array(
                    'class' => 'InvalidS3PrefixException',
                ),
                array(
                    'class' => 'InvalidSnsTopicNameException',
                ),
                array(
                    'class' => 'InvalidTrailNameException',
                ),
                array(
                    'class' => 'TrailNotProvidedException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CreateTrailResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'trail' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'S3BucketName' => array(
                            'type' => 'string',
                        ),
                        'S3KeyPrefix' => array(
                            'type' => 'string',
                        ),
                        'SnsTopicName' => array(
                            'type' => 'string',
                        ),
                        'IncludeGlobalServiceEvents' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DescribeTrailsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'trailList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Trail',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'S3BucketName' => array(
                                'type' => 'string',
                            ),
                            'S3KeyPrefix' => array(
                                'type' => 'string',
                            ),
                            'SnsTopicName' => array(
                                'type' => 'string',
                            ),
                            'IncludeGlobalServiceEvents' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetTrailStatusResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IsLogging' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'LatestDeliveryError' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestNotificationError' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestDeliveryAttemptTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestDeliveryAttemptSucceeded' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestNotificationAttemptTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestNotificationAttemptSucceeded' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TimeLoggingStarted' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TimeLoggingStopped' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateTrailResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'trail' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'S3BucketName' => array(
                            'type' => 'string',
                        ),
                        'S3KeyPrefix' => array(
                            'type' => 'string',
                        ),
                        'SnsTopicName' => array(
                            'type' => 'string',
                        ),
                        'IncludeGlobalServiceEvents' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'operations' => array(
            'DescribeTrails' => array(
                'result_key' => 'trailList',
            ),
        ),
    ),
);
