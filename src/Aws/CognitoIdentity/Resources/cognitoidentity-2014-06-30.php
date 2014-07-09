<?php

return array (
    'apiVersion' => '2014-06-30',
    'endpointPrefix' => 'cognito-identity',
    'serviceFullName' => 'Amazon Cognito Identity',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'AWSCognitoIdentityService.',
    'signatureVersion' => 'v4',
    'namespace' => 'CognitoIdentity',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cognito-identity.us-east-1.amazonaws.com',
        ),
    ),
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
                    'maxLength' => 128,
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
                        'maxLength' => 128,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._-]+/',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'LimitExceededException',
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
                    'maxLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
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
                    'maxLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'class' => 'InternalErrorException',
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
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 15,
                ),
                'IdentityPoolId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 50,
                ),
                'Logins' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1024,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._-]+/',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'class' => 'InternalErrorException',
                ),
                array(
                    'class' => 'LimitExceededException',
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
                    'maxLength' => 50,
                ),
                'Logins' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1024,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._-]+/',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'class' => 'InternalErrorException',
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
                    'maxLength' => 50,
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
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
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
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
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
                    'maxLength' => 50,
                ),
                'Logins' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1024,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._-]+/',
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
                        'maxLength' => 128,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'class' => 'InternalErrorException',
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
                    'maxLength' => 50,
                ),
                'IdentityPoolName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
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
                        'maxLength' => 128,
                        'data' => array(
                            'shape_name' => 'IdentityProviderName',
                            'key_pattern' => '/[\\w._-]+/',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'NotAuthorizedException',
                ),
                array(
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'class' => 'InternalErrorException',
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
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
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
    ),
);
