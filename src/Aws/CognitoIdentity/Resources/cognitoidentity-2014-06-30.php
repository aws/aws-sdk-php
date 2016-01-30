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
    'endpointPrefix' => 'cognito-identity',
    'serviceFullName' => 'Amazon Cognito Identity',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'AWSCognitoIdentityService.',
    'signatureVersion' => 'v4',
    'namespace' => 'CognitoIdentity',
    'operations' => array(
        'CreateIdentityPool' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'IdentityPool',
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
                    'default' => 'AWSCognitoIdentityService.CreateIdentityPool',
                ),
                'IdentityPoolName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'AllowUnauthenticatedIdentities' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'SupportedLoginProviders' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._/-]+/',
                        ),
                    ),
                ),
                'DeveloperProviderName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'OpenIdConnectProviderARNs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ARNString',
                        'type' => 'string',
                        'minLength' => 20,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown when the total number of user pools has exceeded a preset limit.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'DeleteIdentities' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteIdentitiesResponse',
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
                    'default' => 'AWSCognitoIdentityService.DeleteIdentities',
                ),
                'IdentityIdsToDelete' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 60,
                    'items' => array(
                        'name' => 'IdentityId',
                        'type' => 'string',
                        'minLength' => 1,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'DeleteIdentityPool' => array(
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
                    'default' => 'AWSCognitoIdentityService.DeleteIdentityPool',
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'DescribeIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'IdentityDescription',
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
                    'default' => 'AWSCognitoIdentityService.DescribeIdentity',
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'DescribeIdentityPool' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'IdentityPool',
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
                    'default' => 'AWSCognitoIdentityService.DescribeIdentityPool',
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'GetCredentialsForIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetCredentialsForIdentityResponse',
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
                    'default' => 'AWSCognitoIdentityService.GetCredentialsForIdentity',
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Logins' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._/-]+/',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown if the identity pool has no role associated for the given auth type (auth/unauth) or if the AssumeRole fails.',
                    'class' => 'InvalidIdentityPoolConfigurationException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'An exception thrown when a dependent service such as Facebook or Twitter is not responding',
                    'class' => 'ExternalServiceException',
                ),
            ),
        ),
        'GetId' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetIdResponse',
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
                    'default' => 'AWSCognitoIdentityService.GetId',
                ),
                'AccountId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Logins' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._/-]+/',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown when the total number of user pools has exceeded a preset limit.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'An exception thrown when a dependent service such as Facebook or Twitter is not responding',
                    'class' => 'ExternalServiceException',
                ),
            ),
        ),
        'GetIdentityPoolRoles' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetIdentityPoolRolesResponse',
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
                    'default' => 'AWSCognitoIdentityService.GetIdentityPoolRoles',
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'GetOpenIdToken' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetOpenIdTokenResponse',
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
                    'default' => 'AWSCognitoIdentityService.GetOpenIdToken',
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Logins' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._/-]+/',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'An exception thrown when a dependent service such as Facebook or Twitter is not responding',
                    'class' => 'ExternalServiceException',
                ),
            ),
        ),
        'GetOpenIdTokenForDeveloperIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetOpenIdTokenForDeveloperIdentityResponse',
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
                    'default' => 'AWSCognitoIdentityService.GetOpenIdTokenForDeveloperIdentity',
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Logins' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._/-]+/',
                        ),
                    ),
                ),
                'TokenDuration' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 86400,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'The provided developer user identifier is already registered with Cognito under a different identity ID.',
                    'class' => 'DeveloperUserAlreadyRegisteredException',
                ),
            ),
        ),
        'ListIdentities' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListIdentitiesResponse',
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
                    'default' => 'AWSCognitoIdentityService.ListIdentities',
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'MaxResults' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 60,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'HideDisabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'ListIdentityPools' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListIdentityPoolsResponse',
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
                    'default' => 'AWSCognitoIdentityService.ListIdentityPools',
                ),
                'MaxResults' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 60,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'LookupDeveloperIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'LookupDeveloperIdentityResponse',
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
                    'default' => 'AWSCognitoIdentityService.LookupDeveloperIdentity',
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'IdentityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'DeveloperUserIdentifier' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 60,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'MergeDeveloperIdentities' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'MergeDeveloperIdentitiesResponse',
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
                    'default' => 'AWSCognitoIdentityService.MergeDeveloperIdentities',
                ),
                'SourceUserIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'DestinationUserIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'DeveloperProviderName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'SetIdentityPoolRoles' => array(
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
                    'default' => 'AWSCognitoIdentityService.SetIdentityPoolRoles',
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Roles' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 20,
                        'data' => array(
                            'shape_name' => 'RoleType',
                            'key_pattern' => '/(un)?authenticated/',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if there are parallel requests to modify a resource.',
                    'class' => 'ConcurrentModificationException',
                ),
            ),
        ),
        'UnlinkDeveloperIdentity' => array(
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
                    'default' => 'AWSCognitoIdentityService.UnlinkDeveloperIdentity',
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'DeveloperProviderName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'DeveloperUserIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
            ),
        ),
        'UnlinkIdentity' => array(
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
                    'default' => 'AWSCognitoIdentityService.UnlinkIdentity',
                ),
                'IdentityId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Logins' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._/-]+/',
                        ),
                    ),
                ),
                'LoginsToRemove' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'IdentityProviderName',
                        'type' => 'string',
                        'minLength' => 1,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'An exception thrown when a dependent service such as Facebook or Twitter is not responding',
                    'class' => 'ExternalServiceException',
                ),
            ),
        ),
        'UpdateIdentityPool' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'IdentityPool',
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
                    'default' => 'AWSCognitoIdentityService.UpdateIdentityPool',
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'IdentityPoolName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'AllowUnauthenticatedIdentities' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'SupportedLoginProviders' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._/-]+/',
                        ),
                    ),
                ),
                'DeveloperProviderName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'OpenIdConnectProviderARNs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ARNString',
                        'type' => 'string',
                        'minLength' => 20,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Thrown when the requested resource (for example, a dataset or record) does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Thrown when a user is not authorized to access the requested resource.',
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'reason' => 'Thrown when a user tries to use a login which is already linked to another account.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'Thrown when a request is throttled.',
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'Thrown when the service encounters an error during processing the request.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Thrown if there are parallel requests to modify a resource.',
                    'class' => 'ConcurrentModificationException',
                ),
            ),
        ),
    ),
    'models' => array(
        'IdentityPool' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPoolId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IdentityPoolName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AllowUnauthenticatedIdentities' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'SupportedLoginProviders' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'DeveloperProviderName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'OpenIdConnectProviderARNs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ARNString',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DeleteIdentitiesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UnprocessedIdentityIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'UnprocessedIdentityId',
                        'type' => 'object',
                        'properties' => array(
                            'IdentityId' => array(
                                'type' => 'string',
                            ),
                            'ErrorCode' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'IdentityDescription' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Logins' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'IdentityProviderName',
                        'type' => 'string',
                    ),
                ),
                'CreationDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastModifiedDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetCredentialsForIdentityResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Credentials' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'AccessKeyId' => array(
                            'type' => 'string',
                        ),
                        'SecretKey' => array(
                            'type' => 'string',
                        ),
                        'SessionToken' => array(
                            'type' => 'string',
                        ),
                        'Expiration' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetIdResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetIdentityPoolRolesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPoolId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Roles' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetOpenIdTokenResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Token' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetOpenIdTokenForDeveloperIdentityResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Token' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListIdentitiesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPoolId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Identities' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'IdentityDescription',
                        'type' => 'object',
                        'properties' => array(
                            'IdentityId' => array(
                                'type' => 'string',
                            ),
                            'Logins' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IdentityProviderName',
                                    'type' => 'string',
                                ),
                            ),
                            'CreationDate' => array(
                                'type' => 'string',
                            ),
                            'LastModifiedDate' => array(
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
        'ListIdentityPoolsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityPools' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'IdentityPoolShortDescription',
                        'type' => 'object',
                        'properties' => array(
                            'IdentityPoolId' => array(
                                'type' => 'string',
                            ),
                            'IdentityPoolName' => array(
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
        'LookupDeveloperIdentityResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DeveloperUserIdentifierList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DeveloperUserIdentifier',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'MergeDeveloperIdentitiesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IdentityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
);
