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
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'S3BucketName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'S3KeyPrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SnsTopicName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IncludeGlobalServiceEvents' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
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
                    'reason' => 'This exception is thrown when the maximum number of trails is reached.',
                    'class' => 'MaximumNumberOfTrailsExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the specified trail already exists.',
                    'class' => 'TrailAlreadyExistsException',
                ),
                array(
                    'reason' => 'This exception is thrown when the specified S3 bucket does not exist.',
                    'class' => 'S3BucketDoesNotExistException',
                ),
                array(
                    'reason' => 'This exception is thrown when the policy on the S3 bucket is not sufficient.',
                    'class' => 'InsufficientS3BucketPolicyException',
                ),
                array(
                    'reason' => 'This exception is thrown when the policy on the SNS topic is not sufficient.',
                    'class' => 'InsufficientSnsTopicPolicyException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided S3 bucket name is not valid.',
                    'class' => 'InvalidS3BucketNameException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided S3 prefix is not valid.',
                    'class' => 'InvalidS3PrefixException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided SNS topic name is not valid.',
                    'class' => 'InvalidSnsTopicNameException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid.',
                    'class' => 'InvalidTrailNameException',
                ),
                array(
                    'reason' => 'This exception is thrown when no trail is provided.',
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
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the trail with the given name is not found.',
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid.',
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
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the trail with the given name is not found.',
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid.',
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
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the trail with the given name is not found.',
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid.',
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
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the trail with the given name is not found.',
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid.',
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
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'S3BucketName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'S3KeyPrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SnsTopicName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IncludeGlobalServiceEvents' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
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
                    'reason' => 'This exception is thrown when the specified S3 bucket does not exist.',
                    'class' => 'S3BucketDoesNotExistException',
                ),
                array(
                    'reason' => 'This exception is thrown when the policy on the S3 bucket is not sufficient.',
                    'class' => 'InsufficientS3BucketPolicyException',
                ),
                array(
                    'reason' => 'This exception is thrown when the policy on the SNS topic is not sufficient.',
                    'class' => 'InsufficientSnsTopicPolicyException',
                ),
                array(
                    'reason' => 'This exception is thrown when the trail with the given name is not found.',
                    'class' => 'TrailNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided S3 bucket name is not valid.',
                    'class' => 'InvalidS3BucketNameException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided S3 prefix is not valid.',
                    'class' => 'InvalidS3PrefixException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided SNS topic name is not valid.',
                    'class' => 'InvalidSnsTopicNameException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid.',
                    'class' => 'InvalidTrailNameException',
                ),
                array(
                    'reason' => 'This exception is thrown when no trail is provided.',
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
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'S3BucketName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'S3KeyPrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SnsTopicName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IncludeGlobalServiceEvents' => array(
                    'type' => 'boolean',
                    'location' => 'json',
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
                'LatestDeliveryTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestNotificationTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StartLoggingTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StopLoggingTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestDeliveryAttemptTime' => array(
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
                'LatestDeliveryAttemptSucceeded' => array(
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
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'S3BucketName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'S3KeyPrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SnsTopicName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IncludeGlobalServiceEvents' => array(
                    'type' => 'boolean',
                    'location' => 'json',
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
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeTrails' => array(
            'result_key' => 'trailList',
        ),
    ),
);
