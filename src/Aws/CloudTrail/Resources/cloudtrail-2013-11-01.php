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
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.ap-southeast-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.eu-west-1.amazonaws.com',
        ),
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.us-west-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudtrail.sa-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AddTags' => array(
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
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.AddTags',
                ),
                'ResourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TagsList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the specified resource is not found.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when an operation is called with an invalid trail ARN. The format of a trail ARN is arn:aws:cloudtrail:us-east-1:123456789012:trail/MyTrail.',
                    'class' => 'CloudTrailARNInvalidException',
                ),
                array(
                    'reason' => 'This exception is thrown when the specified resource type is not supported by CloudTrail.',
                    'class' => 'ResourceTypeNotSupportedException',
                ),
                array(
                    'reason' => 'The number of tags per trail has exceeded the permitted amount. Currently, the limit is 10.',
                    'class' => 'TagsLimitExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid. Trail names must meet the following requirements:    Contain only ASCII letters (a-z, A-Z), numbers (0-9), periods (.), underscores (_), or dashes (-) Start with a letter or number, and end with a letter or number Be between 3 and 128 characters Have no adjacent periods, underscores or dashes. Names like my-_namespace and my--namespace are invalid. Not be in IP address format (for example, 192.168.5.4)',
                    'class' => 'InvalidTrailNameException',
                ),
                array(
                    'reason' => 'This exception is thrown when the key or value specified for the tag does not match the regular expression ^([\\\\p_.:/=+\\\\-@]*)$.',
                    'class' => 'InvalidTagParameterException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not supported. For example, this exception will occur if an attempt is made to tag a trail and tagging is not supported in the current region.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not permitted.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
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
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'S3BucketName' => array(
                    'required' => true,
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
                'EnableLogFileValidation' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CloudWatchLogsLogGroupArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CloudWatchLogsRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'KmsKeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
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
                    'reason' => 'This exception is thrown when the policy on the S3 bucket or KMS key is not sufficient.',
                    'class' => 'InsufficientEncryptionPolicyException',
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
                    'reason' => 'This exception is thrown when the KMS key ARN is invalid.',
                    'class' => 'InvalidKmsKeyIdException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid. Trail names must meet the following requirements:    Contain only ASCII letters (a-z, A-Z), numbers (0-9), periods (.), underscores (_), or dashes (-) Start with a letter or number, and end with a letter or number Be between 3 and 128 characters Have no adjacent periods, underscores or dashes. Names like my-_namespace and my--namespace are invalid. Not be in IP address format (for example, 192.168.5.4)',
                    'class' => 'InvalidTrailNameException',
                ),
                array(
                    'reason' => 'This exception is deprecated.',
                    'class' => 'TrailNotProvidedException',
                ),
                array(
                    'reason' => 'This exception is thrown when the KMS key does not exist, or when the S3 bucket and the KMS key are not in the same region.',
                    'class' => 'KmsKeyNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the KMS key is disabled.',
                    'class' => 'KmsKeyDisabledException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided CloudWatch log group is not valid.',
                    'class' => 'InvalidCloudWatchLogsLogGroupArnException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided role is not valid.',
                    'class' => 'InvalidCloudWatchLogsRoleArnException',
                ),
                array(
                    'reason' => 'Cannot set a CloudWatch Logs delivery for this region.',
                    'class' => 'CloudWatchLogsDeliveryUnavailableException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not supported. For example, this exception will occur if an attempt is made to tag a trail and tagging is not supported in the current region.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not permitted.',
                    'class' => 'OperationNotPermittedException',
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
                    'reason' => 'This exception is thrown when the provided trail name is not valid. Trail names must meet the following requirements:    Contain only ASCII letters (a-z, A-Z), numbers (0-9), periods (.), underscores (_), or dashes (-) Start with a letter or number, and end with a letter or number Be between 3 and 128 characters Have no adjacent periods, underscores or dashes. Names like my-_namespace and my--namespace are invalid. Not be in IP address format (for example, 192.168.5.4)',
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
                    'reason' => 'This exception is thrown when the requested operation is not supported. For example, this exception will occur if an attempt is made to tag a trail and tagging is not supported in the current region.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not permitted.',
                    'class' => 'OperationNotPermittedException',
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
                    'reason' => 'This exception is thrown when the provided trail name is not valid. Trail names must meet the following requirements:    Contain only ASCII letters (a-z, A-Z), numbers (0-9), periods (.), underscores (_), or dashes (-) Start with a letter or number, and end with a letter or number Be between 3 and 128 characters Have no adjacent periods, underscores or dashes. Names like my-_namespace and my--namespace are invalid. Not be in IP address format (for example, 192.168.5.4)',
                    'class' => 'InvalidTrailNameException',
                ),
            ),
        ),
        'ListPublicKeys' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListPublicKeysResponse',
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
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.ListPublicKeys',
                ),
                'StartTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'json',
                ),
                'EndTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'json',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Occurs if the timestamp values are invalid. Either the start time occurs after the end time or the time range is outside the range of possible values.',
                    'class' => 'InvalidTimeRangeException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not supported. For example, this exception will occur if an attempt is made to tag a trail and tagging is not supported in the current region.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not permitted.',
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'reason' => 'Reserved for future use.',
                    'class' => 'InvalidTokenException',
                ),
            ),
        ),
        'ListTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListTagsResponse',
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
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.ListTags',
                ),
                'ResourceIdList' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the specified resource is not found.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when an operation is called with an invalid trail ARN. The format of a trail ARN is arn:aws:cloudtrail:us-east-1:123456789012:trail/MyTrail.',
                    'class' => 'CloudTrailARNInvalidException',
                ),
                array(
                    'reason' => 'This exception is thrown when the specified resource type is not supported by CloudTrail.',
                    'class' => 'ResourceTypeNotSupportedException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid. Trail names must meet the following requirements:    Contain only ASCII letters (a-z, A-Z), numbers (0-9), periods (.), underscores (_), or dashes (-) Start with a letter or number, and end with a letter or number Be between 3 and 128 characters Have no adjacent periods, underscores or dashes. Names like my-_namespace and my--namespace are invalid. Not be in IP address format (for example, 192.168.5.4)',
                    'class' => 'InvalidTrailNameException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not supported. For example, this exception will occur if an attempt is made to tag a trail and tagging is not supported in the current region.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not permitted.',
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'reason' => 'Reserved for future use.',
                    'class' => 'InvalidTokenException',
                ),
            ),
        ),
        'LookupEvents' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'LookupEventsResponse',
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
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.LookupEvents',
                ),
                'LookupAttributes' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'LookupAttribute',
                        'type' => 'object',
                        'properties' => array(
                            'AttributeKey' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'AttributeValue' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'StartTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'json',
                ),
                'EndTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'json',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 50,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Occurs when an invalid lookup attribute is specified.',
                    'class' => 'InvalidLookupAttributesException',
                ),
                array(
                    'reason' => 'Occurs if the timestamp values are invalid. Either the start time occurs after the end time or the time range is outside the range of possible values.',
                    'class' => 'InvalidTimeRangeException',
                ),
                array(
                    'reason' => 'This exception is thrown if the limit specified is invalid.',
                    'class' => 'InvalidMaxResultsException',
                ),
                array(
                    'reason' => 'Invalid token or token that was previously used in a request with different parameters. This exception is thrown if the token is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'RemoveTags' => array(
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
                    'default' => 'com.amazonaws.cloudtrail.v20131101.CloudTrail_20131101.RemoveTags',
                ),
                'ResourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TagsList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the specified resource is not found.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when an operation is called with an invalid trail ARN. The format of a trail ARN is arn:aws:cloudtrail:us-east-1:123456789012:trail/MyTrail.',
                    'class' => 'CloudTrailARNInvalidException',
                ),
                array(
                    'reason' => 'This exception is thrown when the specified resource type is not supported by CloudTrail.',
                    'class' => 'ResourceTypeNotSupportedException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid. Trail names must meet the following requirements:    Contain only ASCII letters (a-z, A-Z), numbers (0-9), periods (.), underscores (_), or dashes (-) Start with a letter or number, and end with a letter or number Be between 3 and 128 characters Have no adjacent periods, underscores or dashes. Names like my-_namespace and my--namespace are invalid. Not be in IP address format (for example, 192.168.5.4)',
                    'class' => 'InvalidTrailNameException',
                ),
                array(
                    'reason' => 'This exception is thrown when the key or value specified for the tag does not match the regular expression ^([\\\\p_.:/=+\\\\-@]*)$.',
                    'class' => 'InvalidTagParameterException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not supported. For example, this exception will occur if an attempt is made to tag a trail and tagging is not supported in the current region.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not permitted.',
                    'class' => 'OperationNotPermittedException',
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
                    'reason' => 'This exception is thrown when the provided trail name is not valid. Trail names must meet the following requirements:    Contain only ASCII letters (a-z, A-Z), numbers (0-9), periods (.), underscores (_), or dashes (-) Start with a letter or number, and end with a letter or number Be between 3 and 128 characters Have no adjacent periods, underscores or dashes. Names like my-_namespace and my--namespace are invalid. Not be in IP address format (for example, 192.168.5.4)',
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
                    'reason' => 'This exception is thrown when the provided trail name is not valid. Trail names must meet the following requirements:    Contain only ASCII letters (a-z, A-Z), numbers (0-9), periods (.), underscores (_), or dashes (-) Start with a letter or number, and end with a letter or number Be between 3 and 128 characters Have no adjacent periods, underscores or dashes. Names like my-_namespace and my--namespace are invalid. Not be in IP address format (for example, 192.168.5.4)',
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
                    'required' => true,
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
                'EnableLogFileValidation' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CloudWatchLogsLogGroupArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CloudWatchLogsRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'KmsKeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
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
                    'reason' => 'This exception is thrown when the policy on the S3 bucket or KMS key is not sufficient.',
                    'class' => 'InsufficientEncryptionPolicyException',
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
                    'reason' => 'This exception is thrown when the KMS key ARN is invalid.',
                    'class' => 'InvalidKmsKeyIdException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided trail name is not valid. Trail names must meet the following requirements:    Contain only ASCII letters (a-z, A-Z), numbers (0-9), periods (.), underscores (_), or dashes (-) Start with a letter or number, and end with a letter or number Be between 3 and 128 characters Have no adjacent periods, underscores or dashes. Names like my-_namespace and my--namespace are invalid. Not be in IP address format (for example, 192.168.5.4)',
                    'class' => 'InvalidTrailNameException',
                ),
                array(
                    'reason' => 'This exception is deprecated.',
                    'class' => 'TrailNotProvidedException',
                ),
                array(
                    'reason' => 'This exception is thrown when the KMS key does not exist, or when the S3 bucket and the KMS key are not in the same region.',
                    'class' => 'KmsKeyNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the KMS key is disabled.',
                    'class' => 'KmsKeyDisabledException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided CloudWatch log group is not valid.',
                    'class' => 'InvalidCloudWatchLogsLogGroupArnException',
                ),
                array(
                    'reason' => 'This exception is thrown when the provided role is not valid.',
                    'class' => 'InvalidCloudWatchLogsRoleArnException',
                ),
                array(
                    'reason' => 'Cannot set a CloudWatch Logs delivery for this region.',
                    'class' => 'CloudWatchLogsDeliveryUnavailableException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not supported. For example, this exception will occur if an attempt is made to tag a trail and tagging is not supported in the current region.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'This exception is thrown when the requested operation is not permitted.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
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
                'TrailARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LogFileValidationEnabled' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'CloudWatchLogsLogGroupArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CloudWatchLogsRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'KmsKeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
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
                            'TrailARN' => array(
                                'type' => 'string',
                            ),
                            'LogFileValidationEnabled' => array(
                                'type' => 'boolean',
                            ),
                            'CloudWatchLogsLogGroupArn' => array(
                                'type' => 'string',
                            ),
                            'CloudWatchLogsRoleArn' => array(
                                'type' => 'string',
                            ),
                            'KmsKeyId' => array(
                                'type' => 'string',
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
                'LatestCloudWatchLogsDeliveryError' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestCloudWatchLogsDeliveryTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestDigestDeliveryTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LatestDigestDeliveryError' => array(
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
        'ListPublicKeysResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PublicKeyList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PublicKey',
                        'type' => 'object',
                        'properties' => array(
                            'Value' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_decode',
                                ),
                            ),
                            'ValidityStartTime' => array(
                                'type' => 'string',
                            ),
                            'ValidityEndTime' => array(
                                'type' => 'string',
                            ),
                            'Fingerprint' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListTagsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ResourceTagList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ResourceTag',
                        'type' => 'object',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                            ),
                            'TagsList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Tag',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'LookupEventsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Events' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Event',
                        'type' => 'object',
                        'properties' => array(
                            'EventId' => array(
                                'type' => 'string',
                            ),
                            'EventName' => array(
                                'type' => 'string',
                            ),
                            'EventTime' => array(
                                'type' => 'string',
                            ),
                            'Username' => array(
                                'type' => 'string',
                            ),
                            'Resources' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Resource',
                                    'type' => 'object',
                                    'properties' => array(
                                        'ResourceType' => array(
                                            'type' => 'string',
                                        ),
                                        'ResourceName' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'CloudTrailEvent' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
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
                'TrailARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LogFileValidationEnabled' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'CloudWatchLogsLogGroupArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CloudWatchLogsRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'KmsKeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
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
