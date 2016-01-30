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
    'apiVersion' => '2014-06-30',
    'endpointPrefix' => 'cognito-sync',
    'serviceFullName' => 'Amazon Cognito Sync',
    'serviceType' => 'rest-json',
    'jsonVersion' => '1.1',
    'signatureVersion' => 'v4',
    'namespace' => 'CognitoSync',
    'operations' => array(
        'BulkPublish' => array(
            'httpMethod' => 'POST',
            'uri' => '/identitypools/{IdentityPoolId}/bulkpublish',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'BulkPublishResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'An exception thrown when there is an IN_PROGRESS bulk publish operation for the given identity pool.',
                    'class' => 'DuplicateRequestException',
                ),
                array(
                    'reason' => 'An exception thrown when a bulk publish operation is requested less than 24 hours after a previous bulk publish operation completed successfully.',
                    'class' => 'AlreadyStreamedException',
                ),
            ),
        ),
        'DeleteDataset' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/identitypools/{IdentityPoolId}/identities/{IdentityId}/datasets/{DatasetName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteDatasetResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'DatasetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown if an update can\'t be applied because the resource was changed by another call and this would result in a conflict.',
                    'class' => 'ResourceConflictException',
                ),
            ),
        ),
        'DescribeDataset' => array(
            'httpMethod' => 'GET',
            'uri' => '/identitypools/{IdentityPoolId}/identities/{IdentityId}/datasets/{DatasetName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DescribeDatasetResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'DatasetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'DescribeIdentityPoolUsage' => array(
            'httpMethod' => 'GET',
            'uri' => '/identitypools/{IdentityPoolId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DescribeIdentityPoolUsageResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'DescribeIdentityUsage' => array(
            'httpMethod' => 'GET',
            'uri' => '/identitypools/{IdentityPoolId}/identities/{IdentityId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DescribeIdentityUsageResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'GetBulkPublishDetails' => array(
            'httpMethod' => 'POST',
            'uri' => '/identitypools/{IdentityPoolId}/getBulkPublishDetails',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetBulkPublishDetailsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'GetCognitoEvents' => array(
            'httpMethod' => 'GET',
            'uri' => '/identitypools/{IdentityPoolId}/events',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetCognitoEventsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'GetIdentityPoolConfiguration' => array(
            'httpMethod' => 'GET',
            'uri' => '/identitypools/{IdentityPoolId}/configuration',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetIdentityPoolConfigurationResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'ListDatasets' => array(
            'httpMethod' => 'GET',
            'uri' => '/identitypools/{IdentityPoolId}/identities/{IdentityId}/datasets',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListDatasetsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'nextToken',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'maxResults',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'ListIdentityPoolUsage' => array(
            'httpMethod' => 'GET',
            'uri' => '/identitypools',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListIdentityPoolUsageResponse',
            'responseType' => 'model',
            'parameters' => array(
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'nextToken',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'maxResults',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'ListRecords' => array(
            'httpMethod' => 'GET',
            'uri' => '/identitypools/{IdentityPoolId}/identities/{IdentityId}/datasets/{DatasetName}/records',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListRecordsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'DatasetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'LastSyncCount' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'lastSyncCount',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'nextToken',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'maxResults',
                ),
                'SyncSessionToken' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'syncSessionToken',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'RegisterDevice' => array(
            'httpMethod' => 'POST',
            'uri' => '/identitypools/{IdentityPoolId}/identity/{IdentityId}/device',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'RegisterDeviceResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Platform' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Token' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'InvalidConfigurationException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'SetCognitoEvents' => array(
            'httpMethod' => 'POST',
            'uri' => '/identitypools/{IdentityPoolId}/events',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Events' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'CognitoEventType',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'SetIdentityPoolConfiguration' => array(
            'httpMethod' => 'POST',
            'uri' => '/identitypools/{IdentityPoolId}/configuration',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'SetIdentityPoolConfigurationResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'PushSync' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ApplicationArns' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ApplicationArn',
                                'type' => 'string',
                            ),
                        ),
                        'RoleArn' => array(
                            'type' => 'string',
                            'minLength' => 20,
                        ),
                    ),
                ),
                'CognitoStreams' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'StreamName' => array(
                            'type' => 'string',
                            'minLength' => 1,
                        ),
                        'RoleArn' => array(
                            'type' => 'string',
                            'minLength' => 20,
                        ),
                        'StreamingStatus' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown if there are parallel requests to modify a resource.',
                    'class' => 'ConcurrentModificationException',
                ),
            ),
        ),
        'SubscribeToDataset' => array(
            'httpMethod' => 'POST',
            'uri' => '/identitypools/{IdentityPoolId}/identities/{IdentityId}/datasets/{DatasetName}/subscriptions/{DeviceId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'DatasetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'DeviceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'InvalidConfigurationException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'UnsubscribeFromDataset' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/identitypools/{IdentityPoolId}/identities/{IdentityId}/datasets/{DatasetName}/subscriptions/{DeviceId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'DatasetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'DeviceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'InvalidConfigurationException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'UpdateRecords' => array(
            'httpMethod' => 'POST',
            'uri' => '/identitypools/{IdentityPoolId}/identities/{IdentityId}/datasets/{DatasetName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdateRecordsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'DatasetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'DeviceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'RecordPatches' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RecordPatch',
                        'type' => 'object',
                        'properties' => array(
                            'Op' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                            'SyncCount' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                            'DeviceLastModifiedDate' => array(
                                'type' => array(
                                    'object',
                                    'string',
                                    'integer',
                                ),
                                'format' => 'date-time',
                            ),
                        ),
                    ),
                ),
                'SyncSessionToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ClientContext' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-Client-Context',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown when a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the limit on the number of objects or operations has been exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown if the resource doesn\'t exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown if an update can\'t be applied because the resource was changed by another call and this would result in a conflict.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'The AWS Lambda function returned invalid output or an exception.',
                    'class' => 'InvalidLambdaFunctionOutputException',
                ),
                array(
                    'reason' => 'AWS Lambda throttled your account, please contact AWS Support',
                    'class' => 'LambdaThrottledException',
                ),
                array(
                    'reason' => 'Thrown if the request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
    ),
    'models' => array(
        'BulkPublishResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPoolId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteDatasetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Dataset' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'IdentityId' => array(
                            'type' => 'string',
                        ),
                        'DatasetName' => array(
                            'type' => 'string',
                        ),
                        'CreationDate' => array(
                            'type' => 'string',
                        ),
                        'LastModifiedDate' => array(
                            'type' => 'string',
                        ),
                        'LastModifiedBy' => array(
                            'type' => 'string',
                        ),
                        'DataStorage' => array(
                            'type' => 'numeric',
                        ),
                        'NumRecords' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDatasetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Dataset' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'IdentityId' => array(
                            'type' => 'string',
                        ),
                        'DatasetName' => array(
                            'type' => 'string',
                        ),
                        'CreationDate' => array(
                            'type' => 'string',
                        ),
                        'LastModifiedDate' => array(
                            'type' => 'string',
                        ),
                        'LastModifiedBy' => array(
                            'type' => 'string',
                        ),
                        'DataStorage' => array(
                            'type' => 'numeric',
                        ),
                        'NumRecords' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeIdentityPoolUsageResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPoolUsage' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'IdentityPoolId' => array(
                            'type' => 'string',
                        ),
                        'SyncSessionsCount' => array(
                            'type' => 'numeric',
                        ),
                        'DataStorage' => array(
                            'type' => 'numeric',
                        ),
                        'LastModifiedDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeIdentityUsageResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityUsage' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'IdentityId' => array(
                            'type' => 'string',
                        ),
                        'IdentityPoolId' => array(
                            'type' => 'string',
                        ),
                        'LastModifiedDate' => array(
                            'type' => 'string',
                        ),
                        'DatasetCount' => array(
                            'type' => 'numeric',
                        ),
                        'DataStorage' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'GetBulkPublishDetailsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPoolId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'BulkPublishStartTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'BulkPublishCompleteTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'BulkPublishStatus' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FailureMessage' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetCognitoEventsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Events' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetIdentityPoolConfigurationResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPoolId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'PushSync' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ApplicationArns' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ApplicationArn',
                                'type' => 'string',
                            ),
                        ),
                        'RoleArn' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'CognitoStreams' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'StreamName' => array(
                            'type' => 'string',
                        ),
                        'RoleArn' => array(
                            'type' => 'string',
                        ),
                        'StreamingStatus' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ListDatasetsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Datasets' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Dataset',
                        'type' => 'object',
                        'properties' => array(
                            'IdentityId' => array(
                                'type' => 'string',
                            ),
                            'DatasetName' => array(
                                'type' => 'string',
                            ),
                            'CreationDate' => array(
                                'type' => 'string',
                            ),
                            'LastModifiedDate' => array(
                                'type' => 'string',
                            ),
                            'LastModifiedBy' => array(
                                'type' => 'string',
                            ),
                            'DataStorage' => array(
                                'type' => 'numeric',
                            ),
                            'NumRecords' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'Count' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListIdentityPoolUsageResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPoolUsages' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'IdentityPoolUsage',
                        'type' => 'object',
                        'properties' => array(
                            'IdentityPoolId' => array(
                                'type' => 'string',
                            ),
                            'SyncSessionsCount' => array(
                                'type' => 'numeric',
                            ),
                            'DataStorage' => array(
                                'type' => 'numeric',
                            ),
                            'LastModifiedDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'Count' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListRecordsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Records' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Record',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                            'SyncCount' => array(
                                'type' => 'numeric',
                            ),
                            'LastModifiedDate' => array(
                                'type' => 'string',
                            ),
                            'LastModifiedBy' => array(
                                'type' => 'string',
                            ),
                            'DeviceLastModifiedDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Count' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'DatasetSyncCount' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'LastModifiedBy' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'MergedDatasetNames' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'DatasetExists' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'DatasetDeletedAfterRequestedSyncCount' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'SyncSessionToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'RegisterDeviceResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DeviceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'SetIdentityPoolConfigurationResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPoolId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'PushSync' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ApplicationArns' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ApplicationArn',
                                'type' => 'string',
                            ),
                        ),
                        'RoleArn' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'CognitoStreams' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'StreamName' => array(
                            'type' => 'string',
                        ),
                        'RoleArn' => array(
                            'type' => 'string',
                        ),
                        'StreamingStatus' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'UpdateRecordsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Records' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Record',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                            'SyncCount' => array(
                                'type' => 'numeric',
                            ),
                            'LastModifiedDate' => array(
                                'type' => 'string',
                            ),
                            'LastModifiedBy' => array(
                                'type' => 'string',
                            ),
                            'DeviceLastModifiedDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
