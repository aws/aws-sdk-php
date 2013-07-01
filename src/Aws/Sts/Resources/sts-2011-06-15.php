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
    'apiVersion' => '2011-06-15',
    'endpointPrefix' => 'sts',
    'serviceFullName' => 'AWS Security Token Service',
    'serviceAbbreviation' => 'AWS STS',
    'serviceType' => 'query',
    'globalEndpoint' => 'sts.amazonaws.com',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'Sts',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'sts.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'sts.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'sts.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'sts.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'sts.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'sts.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'sts.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'sts.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AssumeRole' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AssumeRoleResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AssumeRole',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-06-15',
                ),
                'RoleArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'RoleSessionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 2,
                    'maxLength' => 32,
                ),
                'Policy' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 2048,
                ),
                'DurationSeconds' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 900,
                    'maximum' => 3600,
                ),
                'ExternalId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 2,
                    'maxLength' => 96,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was too large. The error message describes how big the policy document is, in packed form, as a percentage of what the API allows.',
                    'class' => 'PackedPolicyTooLargeException',
                ),
            ),
        ),
        'AssumeRoleWithWebIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AssumeRoleWithWebIdentityResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AssumeRoleWithWebIdentity',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-06-15',
                ),
                'RoleArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'RoleSessionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 2,
                    'maxLength' => 32,
                ),
                'WebIdentityToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 2048,
                ),
                'ProviderId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 2048,
                ),
                'Policy' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 2048,
                ),
                'DurationSeconds' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 900,
                    'maximum' => 129600,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was too large. The error message describes how big the policy document is, in packed form, as a percentage of what the API allows.',
                    'class' => 'PackedPolicyTooLargeException',
                ),
                array(
                    'reason' => 'The non-AWS identity provider (IDP) that was asked to verify the incoming identity token rejected the identity claim. This might be because the claim is invalid, has expired, or has been explicitly revoked by the user. The error message contains details about the response from the non-AWS identity provider.',
                    'class' => 'IDPRejectedClaimException',
                ),
                array(
                    'reason' => 'The request could not be fulfilled because the non-AWS identity provider (IDP) that was asked to verify the incoming identity token could not be reached. This is often a transient error caused by network conditions. Retry the request a limited number of times so that you don\'t exceed the request rate. If the error persists, the non-AWS identity provider might be down or not responding.',
                    'class' => 'IDPCommunicationErrorException',
                ),
                array(
                    'reason' => 'The web identity token that was passed could not be validated by AWS. Get a new identity token from the identity provider and then retry the request.',
                    'class' => 'InvalidIdentityTokenException',
                ),
                array(
                    'reason' => 'The web identity token that was passed is expired. Get a new identity token from the identity provider and then retry the request.',
                    'class' => 'ExpiredTokenException',
                ),
            ),
        ),
        'GetFederationToken' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetFederationTokenResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetFederationToken',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-06-15',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 2,
                    'maxLength' => 32,
                ),
                'Policy' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 2048,
                ),
                'DurationSeconds' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 900,
                    'maximum' => 129600,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was too large. The error message describes how big the policy document is, in packed form, as a percentage of what the API allows.',
                    'class' => 'PackedPolicyTooLargeException',
                ),
            ),
        ),
        'GetSessionToken' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetSessionTokenResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetSessionToken',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-06-15',
                ),
                'DurationSeconds' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 900,
                    'maximum' => 129600,
                ),
                'SerialNumber' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 9,
                    'maxLength' => 256,
                ),
                'TokenCode' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 6,
                    'maxLength' => 6,
                ),
            ),
        ),
    ),
    'models' => array(
        'AssumeRoleResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Credentials' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AccessKeyId' => array(
                            'type' => 'string',
                        ),
                        'SecretAccessKey' => array(
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
                'AssumedRoleUser' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AssumedRoleId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'PackedPolicySize' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
            ),
        ),
        'AssumeRoleWithWebIdentityResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Credentials' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AccessKeyId' => array(
                            'type' => 'string',
                        ),
                        'SecretAccessKey' => array(
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
                'SubjectFromWebIdentityToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'AssumedRoleUser' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AssumedRoleId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'PackedPolicySize' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetFederationTokenResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Credentials' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AccessKeyId' => array(
                            'type' => 'string',
                        ),
                        'SecretAccessKey' => array(
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
                'FederatedUser' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'FederatedUserId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'PackedPolicySize' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetSessionTokenResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Credentials' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AccessKeyId' => array(
                            'type' => 'string',
                        ),
                        'SecretAccessKey' => array(
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
    ),
);
