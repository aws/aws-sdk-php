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
    'apiVersion' => '2010-05-08',
    'endpointPrefix' => 'iam',
    'serviceFullName' => 'AWS Identity and Access Management',
    'serviceAbbreviation' => 'IAM',
    'serviceType' => 'query',
    'globalEndpoint' => 'iam.amazonaws.com',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'Iam',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'iam.us-gov.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AddClientIDToOpenIDConnectProvider' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AddClientIDToOpenIDConnectProvider',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'OpenIDConnectProviderArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'ClientID' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'AddRoleToInstanceProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AddRoleToInstanceProfile',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'InstanceProfileName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'AddUserToGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AddUserToGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'AttachGroupPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachGroupPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'AttachRolePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachRolePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'AttachUserPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachUserPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ChangePassword' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ChangePassword',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'OldPassword' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'NewPassword' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because the type of user for the transaction was incorrect.',
                    'class' => 'InvalidUserTypeException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that is temporarily unmodifiable, such as a user name that was deleted and then recreated. The error indicates that the request is likely to succeed if you try again after waiting several minutes. The error message describes the entity.',
                    'class' => 'EntityTemporarilyUnmodifiableException',
                ),
                array(
                    'reason' => 'The request was rejected because the provided password did not meet the requirements imposed by the account password policy.',
                    'class' => 'PasswordPolicyViolationException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateAccessKey' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateAccessKeyResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateAccessKey',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateAccountAlias' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateAccountAlias',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'AccountAlias' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 63,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateGroupResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'Path' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateInstanceProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateInstanceProfileResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateInstanceProfile',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'InstanceProfileName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Path' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateLoginProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateLoginProfileResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateLoginProfile',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Password' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PasswordResetRequired' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because the provided password did not meet the requirements imposed by the account password policy.',
                    'class' => 'PasswordPolicyViolationException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateOpenIDConnectProvider' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateOpenIDConnectProviderResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateOpenIDConnectProvider',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'Url' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'ClientIDList' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ClientIDList.member',
                    'items' => array(
                        'name' => 'clientIDType',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
                'ThumbprintList' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ThumbprintList.member',
                    'items' => array(
                        'name' => 'thumbprintType',
                        'type' => 'string',
                        'minLength' => 40,
                        'maxLength' => 40,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreatePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreatePolicyResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreatePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Path' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyDocument' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 131072,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreatePolicyVersion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreatePolicyVersionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreatePolicyVersion',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'PolicyDocument' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 131072,
                ),
                'SetAsDefault' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateRole' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateRoleResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateRole',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'Path' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'AssumeRolePolicyDocument' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 131072,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateSAMLProvider' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateSAMLProviderResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateSAMLProvider',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'SAMLMetadataDocument' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1000,
                    'maxLength' => 10000000,
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateUser' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateUserResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateUser',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'Path' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'CreateVirtualMFADevice' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateVirtualMFADeviceResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateVirtualMFADevice',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'Path' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'VirtualMFADeviceName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeactivateMFADevice' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeactivateMFADevice',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'SerialNumber' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 9,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that is temporarily unmodifiable, such as a user name that was deleted and then recreated. The error indicates that the request is likely to succeed if you try again after waiting several minutes. The error message describes the entity.',
                    'class' => 'EntityTemporarilyUnmodifiableException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteAccessKey' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteAccessKey',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'AccessKeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 16,
                    'maxLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteAccountAlias' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteAccountAlias',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'AccountAlias' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 63,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteAccountPasswordPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteAccountPasswordPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to delete a resource that has attached subordinate entities. The error message describes these entities.',
                    'class' => 'DeleteConflictException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteGroupPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteGroupPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteInstanceProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteInstanceProfile',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'InstanceProfileName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to delete a resource that has attached subordinate entities. The error message describes these entities.',
                    'class' => 'DeleteConflictException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteLoginProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteLoginProfile',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that is temporarily unmodifiable, such as a user name that was deleted and then recreated. The error indicates that the request is likely to succeed if you try again after waiting several minutes. The error message describes the entity.',
                    'class' => 'EntityTemporarilyUnmodifiableException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteOpenIDConnectProvider' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteOpenIDConnectProvider',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'OpenIDConnectProviderArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeletePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeletePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to delete a resource that has attached subordinate entities. The error message describes these entities.',
                    'class' => 'DeleteConflictException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeletePolicyVersion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeletePolicyVersion',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'VersionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to delete a resource that has attached subordinate entities. The error message describes these entities.',
                    'class' => 'DeleteConflictException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteRole' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteRole',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to delete a resource that has attached subordinate entities. The error message describes these entities.',
                    'class' => 'DeleteConflictException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteRolePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteRolePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteSAMLProvider' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteSAMLProvider',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'SAMLProviderArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteServerCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteServerCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'ServerCertificateName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to delete a resource that has attached subordinate entities. The error message describes these entities.',
                    'class' => 'DeleteConflictException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteSigningCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteSigningCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'CertificateId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 24,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteUser' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteUser',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to delete a resource that has attached subordinate entities. The error message describes these entities.',
                    'class' => 'DeleteConflictException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteUserPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteUserPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DeleteVirtualMFADevice' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVirtualMFADevice',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'SerialNumber' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 9,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to delete a resource that has attached subordinate entities. The error message describes these entities.',
                    'class' => 'DeleteConflictException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DetachGroupPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachGroupPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DetachRolePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachRolePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'DetachUserPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachUserPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'EnableMFADevice' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableMFADevice',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'SerialNumber' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 9,
                    'maxLength' => 256,
                ),
                'AuthenticationCode1' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 6,
                    'maxLength' => 6,
                ),
                'AuthenticationCode2' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 6,
                    'maxLength' => 6,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that is temporarily unmodifiable, such as a user name that was deleted and then recreated. The error indicates that the request is likely to succeed if you try again after waiting several minutes. The error message describes the entity.',
                    'class' => 'EntityTemporarilyUnmodifiableException',
                ),
                array(
                    'reason' => 'The request was rejected because the authentication code was not recognized. The error message describes the specific error.',
                    'class' => 'InvalidAuthenticationCodeException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GenerateCredentialReport' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GenerateCredentialReportResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GenerateCredentialReport',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetAccountAuthorizationDetails' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetAccountAuthorizationDetailsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetAccountAuthorizationDetails',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'Filter' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter.member',
                    'items' => array(
                        'name' => 'EntityType',
                        'type' => 'string',
                    ),
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetAccountPasswordPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetAccountPasswordPolicyResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetAccountPasswordPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetAccountSummary' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetAccountSummaryResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetAccountSummary',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetCredentialReport' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetCredentialReportResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetCredentialReport',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the credential report does not exist. To generate a credential report, use GenerateCredentialReport.',
                    'class' => 'CredentialReportNotPresentException',
                ),
                array(
                    'reason' => 'The request was rejected because the most recent credential report has expired. To generate a new credential report, use GenerateCredentialReport. For more information about credential report expiration, see Getting Credential Reports in the Using IAM guide.',
                    'class' => 'CredentialReportExpiredException',
                ),
                array(
                    'reason' => 'The request was rejected because the credential report is still being generated.',
                    'class' => 'CredentialReportNotReadyException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetGroupResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetGroupPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetGroupPolicyResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetGroupPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetInstanceProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetInstanceProfileResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetInstanceProfile',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'InstanceProfileName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetLoginProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetLoginProfileResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetLoginProfile',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetOpenIDConnectProvider' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetOpenIDConnectProviderResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetOpenIDConnectProvider',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'OpenIDConnectProviderArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetPolicyResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetPolicyVersion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetPolicyVersionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetPolicyVersion',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'VersionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetRole' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetRoleResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetRole',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetRolePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetRolePolicyResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetRolePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetSAMLProvider' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetSAMLProviderResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetSAMLProvider',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'SAMLProviderArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetServerCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetServerCertificateResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetServerCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'ServerCertificateName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetUser' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetUserResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetUser',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'GetUserPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetUserPolicyResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetUserPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListAccessKeys' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListAccessKeysResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListAccessKeys',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListAccountAliases' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListAccountAliasesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListAccountAliases',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListAttachedGroupPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListAttachedGroupPoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListAttachedGroupPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListAttachedRolePolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListAttachedRolePoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListAttachedRolePolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListAttachedUserPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListAttachedUserPoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListAttachedUserPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListEntitiesForPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListEntitiesForPolicyResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListEntitiesForPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'EntityFilter' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListGroupPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListGroupPoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListGroupPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListGroupsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListGroupsForUser' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListGroupsForUserResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListGroupsForUser',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListInstanceProfiles' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListInstanceProfilesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListInstanceProfiles',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListInstanceProfilesForRole' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListInstanceProfilesForRoleResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListInstanceProfilesForRole',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListMFADevices' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListMFADevicesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListMFADevices',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListOpenIDConnectProviders' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListOpenIDConnectProvidersResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListOpenIDConnectProviders',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListPoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'Scope' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OnlyAttached' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListPolicyVersions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListPolicyVersionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListPolicyVersions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListRolePolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListRolePoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListRolePolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListRoles' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListRolesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListRoles',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListSAMLProviders' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListSAMLProvidersResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListSAMLProviders',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListServerCertificates' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListServerCertificatesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListServerCertificates',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListSigningCertificates' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListSigningCertificatesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListSigningCertificates',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListUserPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListUserPoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListUserPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListUsers' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListUsersResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListUsers',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PathPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ListVirtualMFADevices' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListVirtualMFADevicesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListVirtualMFADevices',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'AssignmentStatus' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
            ),
        ),
        'PutGroupPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutGroupPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyDocument' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 131072,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'PutRolePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutRolePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyDocument' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 131072,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'PutUserPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutUserPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PolicyDocument' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 131072,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'RemoveClientIDFromOpenIDConnectProvider' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RemoveClientIDFromOpenIDConnectProvider',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'OpenIDConnectProviderArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'ClientID' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'RemoveRoleFromInstanceProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RemoveRoleFromInstanceProfile',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'InstanceProfileName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'RemoveUserFromGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RemoveUserFromGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'ResyncMFADevice' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResyncMFADevice',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'SerialNumber' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 9,
                    'maxLength' => 256,
                ),
                'AuthenticationCode1' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 6,
                    'maxLength' => 6,
                ),
                'AuthenticationCode2' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 6,
                    'maxLength' => 6,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the authentication code was not recognized. The error message describes the specific error.',
                    'class' => 'InvalidAuthenticationCodeException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'SetDefaultPolicyVersion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetDefaultPolicyVersion',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'PolicyArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'VersionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateAccessKey' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateAccessKey',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'AccessKeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 16,
                    'maxLength' => 32,
                ),
                'Status' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateAccountPasswordPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateAccountPasswordPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'MinimumPasswordLength' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 6,
                    'maximum' => 128,
                ),
                'RequireSymbols' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'RequireNumbers' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'RequireUppercaseCharacters' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'RequireLowercaseCharacters' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AllowUsersToChangePassword' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'MaxPasswordAge' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1095,
                ),
                'PasswordReusePrevention' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 24,
                ),
                'HardExpiry' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateAssumeRolePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateAssumeRolePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'RoleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'PolicyDocument' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 131072,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because the policy document was malformed. The error message describes the specific error.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'NewPath' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'NewGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateLoginProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateLoginProfile',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Password' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'PasswordResetRequired' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that is temporarily unmodifiable, such as a user name that was deleted and then recreated. The error indicates that the request is likely to succeed if you try again after waiting several minutes. The error message describes the entity.',
                    'class' => 'EntityTemporarilyUnmodifiableException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because the provided password did not meet the requirements imposed by the account password policy.',
                    'class' => 'PasswordPolicyViolationException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateOpenIDConnectProviderThumbprint' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateOpenIDConnectProviderThumbprint',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'OpenIDConnectProviderArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'ThumbprintList' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ThumbprintList.member',
                    'items' => array(
                        'name' => 'thumbprintType',
                        'type' => 'string',
                        'minLength' => 40,
                        'maxLength' => 40,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateSAMLProvider' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateSAMLProviderResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateSAMLProvider',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'SAMLMetadataDocument' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1000,
                    'maxLength' => 10000000,
                ),
                'SAMLProviderArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because an invalid or out-of-range value was supplied for an input parameter.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateServerCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateServerCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'ServerCertificateName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'NewPath' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'NewServerCertificateName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateSigningCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateSigningCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'CertificateId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 24,
                    'maxLength' => 128,
                ),
                'Status' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UpdateUser' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateUser',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'NewPath' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'NewUserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that is temporarily unmodifiable, such as a user name that was deleted and then recreated. The error indicates that the request is likely to succeed if you try again after waiting several minutes. The error message describes the entity.',
                    'class' => 'EntityTemporarilyUnmodifiableException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UploadServerCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UploadServerCertificateResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UploadServerCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'Path' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'ServerCertificateName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'CertificateBody' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 16384,
                ),
                'PrivateKey' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 16384,
                ),
                'CertificateChain' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 2097152,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because the certificate was malformed or expired. The error message describes the specific error.',
                    'class' => 'MalformedCertificateException',
                ),
                array(
                    'reason' => 'The request was rejected because the public key certificate and the private key do not match.',
                    'class' => 'KeyPairMismatchException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
        'UploadSigningCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UploadSigningCertificateResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UploadSigningCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-08',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'CertificateBody' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 16384,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because the certificate was malformed or expired. The error message describes the specific error.',
                    'class' => 'MalformedCertificateException',
                ),
                array(
                    'reason' => 'The request was rejected because the certificate is invalid.',
                    'class' => 'InvalidCertificateException',
                ),
                array(
                    'reason' => 'The request was rejected because the same certificate is associated to another user under the account.',
                    'class' => 'DuplicateCertificateException',
                ),
                array(
                    'reason' => 'The request was rejected because it referenced an entity that does not exist. The error message describes the entity.',
                    'class' => 'NoSuchEntityException',
                ),
                array(
                    'reason' => 'The request processing has failed because of an unknown error, exception or failure.',
                    'class' => 'ServiceFailureException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CreateAccessKeyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AccessKey' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'UserName' => array(
                            'type' => 'string',
                        ),
                        'AccessKeyId' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SecretAccessKey' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreateGroupResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Group' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'GroupName' => array(
                            'type' => 'string',
                        ),
                        'GroupId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreateInstanceProfileResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceProfile' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'InstanceProfileName' => array(
                            'type' => 'string',
                        ),
                        'InstanceProfileId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'Roles' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Role',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Path' => array(
                                        'type' => 'string',
                                    ),
                                    'RoleName' => array(
                                        'type' => 'string',
                                    ),
                                    'RoleId' => array(
                                        'type' => 'string',
                                    ),
                                    'Arn' => array(
                                        'type' => 'string',
                                    ),
                                    'CreateDate' => array(
                                        'type' => 'string',
                                    ),
                                    'AssumeRolePolicyDocument' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateLoginProfileResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LoginProfile' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'UserName' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'PasswordResetRequired' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'CreateOpenIDConnectProviderResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OpenIDConnectProviderArn' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'CreatePolicyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Policy' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'PolicyName' => array(
                            'type' => 'string',
                        ),
                        'PolicyId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'DefaultVersionId' => array(
                            'type' => 'string',
                        ),
                        'AttachmentCount' => array(
                            'type' => 'numeric',
                        ),
                        'IsAttachable' => array(
                            'type' => 'boolean',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'UpdateDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreatePolicyVersionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyVersion' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Document' => array(
                            'type' => 'string',
                        ),
                        'VersionId' => array(
                            'type' => 'string',
                        ),
                        'IsDefaultVersion' => array(
                            'type' => 'boolean',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreateRoleResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Role' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'RoleName' => array(
                            'type' => 'string',
                        ),
                        'RoleId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'AssumeRolePolicyDocument' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreateSAMLProviderResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SAMLProviderArn' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'CreateUserResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'User' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'UserName' => array(
                            'type' => 'string',
                        ),
                        'UserId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'PasswordLastUsed' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreateVirtualMFADeviceResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VirtualMFADevice' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'SerialNumber' => array(
                            'type' => 'string',
                        ),
                        'Base32StringSeed' => array(
                            'type' => 'string',
                        ),
                        'QRCodePNG' => array(
                            'type' => 'string',
                        ),
                        'User' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Path' => array(
                                    'type' => 'string',
                                ),
                                'UserName' => array(
                                    'type' => 'string',
                                ),
                                'UserId' => array(
                                    'type' => 'string',
                                ),
                                'Arn' => array(
                                    'type' => 'string',
                                ),
                                'CreateDate' => array(
                                    'type' => 'string',
                                ),
                                'PasswordLastUsed' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'EnableDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GenerateCredentialReportResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'State' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetAccountAuthorizationDetailsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UserDetailList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'UserDetail',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'UserName' => array(
                                'type' => 'string',
                            ),
                            'UserId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'UserPolicyList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PolicyDetail',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'PolicyName' => array(
                                            'type' => 'string',
                                        ),
                                        'PolicyDocument' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'GroupList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'groupNameType',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'AttachedManagedPolicies' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AttachedPolicy',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'PolicyName' => array(
                                            'type' => 'string',
                                        ),
                                        'PolicyArn' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'GroupDetailList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'GroupDetail',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'GroupName' => array(
                                'type' => 'string',
                            ),
                            'GroupId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'GroupPolicyList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PolicyDetail',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'PolicyName' => array(
                                            'type' => 'string',
                                        ),
                                        'PolicyDocument' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'AttachedManagedPolicies' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AttachedPolicy',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'PolicyName' => array(
                                            'type' => 'string',
                                        ),
                                        'PolicyArn' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RoleDetailList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'RoleDetail',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'RoleName' => array(
                                'type' => 'string',
                            ),
                            'RoleId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'AssumeRolePolicyDocument' => array(
                                'type' => 'string',
                            ),
                            'InstanceProfileList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'InstanceProfile',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Path' => array(
                                            'type' => 'string',
                                        ),
                                        'InstanceProfileName' => array(
                                            'type' => 'string',
                                        ),
                                        'InstanceProfileId' => array(
                                            'type' => 'string',
                                        ),
                                        'Arn' => array(
                                            'type' => 'string',
                                        ),
                                        'CreateDate' => array(
                                            'type' => 'string',
                                        ),
                                        'Roles' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Role',
                                                'type' => 'object',
                                                'sentAs' => 'member',
                                                'properties' => array(
                                                    'Path' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'RoleName' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'RoleId' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Arn' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'CreateDate' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'AssumeRolePolicyDocument' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'RolePolicyList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PolicyDetail',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'PolicyName' => array(
                                            'type' => 'string',
                                        ),
                                        'PolicyDocument' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'AttachedManagedPolicies' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AttachedPolicy',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'PolicyName' => array(
                                            'type' => 'string',
                                        ),
                                        'PolicyArn' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Policies' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ManagedPolicyDetail',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'PolicyName' => array(
                                'type' => 'string',
                            ),
                            'PolicyId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'DefaultVersionId' => array(
                                'type' => 'string',
                            ),
                            'AttachmentCount' => array(
                                'type' => 'numeric',
                            ),
                            'IsAttachable' => array(
                                'type' => 'boolean',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'UpdateDate' => array(
                                'type' => 'string',
                            ),
                            'PolicyVersionList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PolicyVersion',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Document' => array(
                                            'type' => 'string',
                                        ),
                                        'VersionId' => array(
                                            'type' => 'string',
                                        ),
                                        'IsDefaultVersion' => array(
                                            'type' => 'boolean',
                                        ),
                                        'CreateDate' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetAccountPasswordPolicyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PasswordPolicy' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'MinimumPasswordLength' => array(
                            'type' => 'numeric',
                        ),
                        'RequireSymbols' => array(
                            'type' => 'boolean',
                        ),
                        'RequireNumbers' => array(
                            'type' => 'boolean',
                        ),
                        'RequireUppercaseCharacters' => array(
                            'type' => 'boolean',
                        ),
                        'RequireLowercaseCharacters' => array(
                            'type' => 'boolean',
                        ),
                        'AllowUsersToChangePassword' => array(
                            'type' => 'boolean',
                        ),
                        'ExpirePasswords' => array(
                            'type' => 'boolean',
                        ),
                        'MaxPasswordAge' => array(
                            'type' => 'numeric',
                        ),
                        'PasswordReusePrevention' => array(
                            'type' => 'numeric',
                        ),
                        'HardExpiry' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'GetAccountSummaryResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SummaryMap' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlMap' => array(
                            'Users',
                            'UsersQuota',
                            'Groups',
                            'GroupsQuota',
                            'ServerCertificates',
                            'ServerCertificatesQuota',
                            'UserPolicySizeQuota',
                            'GroupPolicySizeQuota',
                            'GroupsPerUserQuota',
                            'SigningCertificatesPerUserQuota',
                            'AccessKeysPerUserQuota',
                            'MFADevices',
                            'MFADevicesInUse',
                            'AccountMFAEnabled',
                            'AccountAccessKeysPresent',
                            'AccountSigningCertificatesPresent',
                            'AttachedPoliciesPerGroupQuota',
                            'AttachedPoliciesPerRoleQuota',
                            'AttachedPoliciesPerUserQuota',
                            'Policies',
                            'PoliciesQuota',
                            'PolicySizeQuota',
                            'PolicyVersionsInUse',
                            'PolicyVersionsInUseQuota',
                            'VersionsPerPolicyQuota',
                        ),
                    ),
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                            'args' => array(
                                '@value',
                                'entry',
                                'key',
                                'value',
                            ),
                        ),
                    ),
                    'items' => array(
                        'name' => 'entry',
                        'type' => 'object',
                        'sentAs' => 'entry',
                        'additionalProperties' => true,
                        'properties' => array(
                            'key' => array(
                                'type' => 'string',
                            ),
                            'value' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                    'additionalProperties' => false,
                ),
            ),
        ),
        'GetCredentialReportResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Content' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReportFormat' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'GeneratedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetGroupResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Group' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'GroupName' => array(
                            'type' => 'string',
                        ),
                        'GroupId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Users' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'User',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'UserName' => array(
                                'type' => 'string',
                            ),
                            'UserId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'PasswordLastUsed' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetGroupPolicyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GroupName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'PolicyName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'PolicyDocument' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetInstanceProfileResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceProfile' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'InstanceProfileName' => array(
                            'type' => 'string',
                        ),
                        'InstanceProfileId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'Roles' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Role',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Path' => array(
                                        'type' => 'string',
                                    ),
                                    'RoleName' => array(
                                        'type' => 'string',
                                    ),
                                    'RoleId' => array(
                                        'type' => 'string',
                                    ),
                                    'Arn' => array(
                                        'type' => 'string',
                                    ),
                                    'CreateDate' => array(
                                        'type' => 'string',
                                    ),
                                    'AssumeRolePolicyDocument' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetLoginProfileResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LoginProfile' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'UserName' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'PasswordResetRequired' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'GetOpenIDConnectProviderResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Url' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ClientIDList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'clientIDType',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'ThumbprintList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'thumbprintType',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'CreateDate' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetPolicyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Policy' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'PolicyName' => array(
                            'type' => 'string',
                        ),
                        'PolicyId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'DefaultVersionId' => array(
                            'type' => 'string',
                        ),
                        'AttachmentCount' => array(
                            'type' => 'numeric',
                        ),
                        'IsAttachable' => array(
                            'type' => 'boolean',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'UpdateDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetPolicyVersionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyVersion' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Document' => array(
                            'type' => 'string',
                        ),
                        'VersionId' => array(
                            'type' => 'string',
                        ),
                        'IsDefaultVersion' => array(
                            'type' => 'boolean',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetRoleResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Role' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'RoleName' => array(
                            'type' => 'string',
                        ),
                        'RoleId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'AssumeRolePolicyDocument' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetRolePolicyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RoleName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'PolicyName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'PolicyDocument' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetSAMLProviderResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SAMLMetadataDocument' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CreateDate' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ValidUntil' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetServerCertificateResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ServerCertificate' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ServerCertificateMetadata' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Path' => array(
                                    'type' => 'string',
                                ),
                                'ServerCertificateName' => array(
                                    'type' => 'string',
                                ),
                                'ServerCertificateId' => array(
                                    'type' => 'string',
                                ),
                                'Arn' => array(
                                    'type' => 'string',
                                ),
                                'UploadDate' => array(
                                    'type' => 'string',
                                ),
                                'Expiration' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'CertificateBody' => array(
                            'type' => 'string',
                        ),
                        'CertificateChain' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetUserResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'User' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'UserName' => array(
                            'type' => 'string',
                        ),
                        'UserId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreateDate' => array(
                            'type' => 'string',
                        ),
                        'PasswordLastUsed' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetUserPolicyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'PolicyName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'PolicyDocument' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListAccessKeysResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AccessKeyMetadata' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AccessKeyMetadata',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'UserName' => array(
                                'type' => 'string',
                            ),
                            'AccessKeyId' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListAccountAliasesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AccountAliases' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'accountAliasType',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListAttachedGroupPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AttachedPolicies' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AttachedPolicy',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'PolicyName' => array(
                                'type' => 'string',
                            ),
                            'PolicyArn' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListAttachedRolePoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AttachedPolicies' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AttachedPolicy',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'PolicyName' => array(
                                'type' => 'string',
                            ),
                            'PolicyArn' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListAttachedUserPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AttachedPolicies' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AttachedPolicy',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'PolicyName' => array(
                                'type' => 'string',
                            ),
                            'PolicyArn' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListEntitiesForPolicyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'PolicyGroup',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'GroupName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'PolicyUsers' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'PolicyUser',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'UserName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'PolicyRoles' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'PolicyRole',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'RoleName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListGroupPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyNames' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'policyNameType',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListGroupsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Groups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Group',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'GroupName' => array(
                                'type' => 'string',
                            ),
                            'GroupId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListGroupsForUserResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Groups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Group',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'GroupName' => array(
                                'type' => 'string',
                            ),
                            'GroupId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListInstanceProfilesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceProfiles' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'InstanceProfile',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'InstanceProfileName' => array(
                                'type' => 'string',
                            ),
                            'InstanceProfileId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'Roles' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Role',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Path' => array(
                                            'type' => 'string',
                                        ),
                                        'RoleName' => array(
                                            'type' => 'string',
                                        ),
                                        'RoleId' => array(
                                            'type' => 'string',
                                        ),
                                        'Arn' => array(
                                            'type' => 'string',
                                        ),
                                        'CreateDate' => array(
                                            'type' => 'string',
                                        ),
                                        'AssumeRolePolicyDocument' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListInstanceProfilesForRoleResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceProfiles' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'InstanceProfile',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'InstanceProfileName' => array(
                                'type' => 'string',
                            ),
                            'InstanceProfileId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'Roles' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Role',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Path' => array(
                                            'type' => 'string',
                                        ),
                                        'RoleName' => array(
                                            'type' => 'string',
                                        ),
                                        'RoleId' => array(
                                            'type' => 'string',
                                        ),
                                        'Arn' => array(
                                            'type' => 'string',
                                        ),
                                        'CreateDate' => array(
                                            'type' => 'string',
                                        ),
                                        'AssumeRolePolicyDocument' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListMFADevicesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MFADevices' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'MFADevice',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'UserName' => array(
                                'type' => 'string',
                            ),
                            'SerialNumber' => array(
                                'type' => 'string',
                            ),
                            'EnableDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListOpenIDConnectProvidersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OpenIDConnectProviderList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'OpenIDConnectProviderListEntry',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Arn' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Policies' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Policy',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'PolicyName' => array(
                                'type' => 'string',
                            ),
                            'PolicyId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'DefaultVersionId' => array(
                                'type' => 'string',
                            ),
                            'AttachmentCount' => array(
                                'type' => 'numeric',
                            ),
                            'IsAttachable' => array(
                                'type' => 'boolean',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'UpdateDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListPolicyVersionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Versions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'PolicyVersion',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Document' => array(
                                'type' => 'string',
                            ),
                            'VersionId' => array(
                                'type' => 'string',
                            ),
                            'IsDefaultVersion' => array(
                                'type' => 'boolean',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListRolePoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyNames' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'policyNameType',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListRolesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Roles' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Role',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'RoleName' => array(
                                'type' => 'string',
                            ),
                            'RoleId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'AssumeRolePolicyDocument' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListSAMLProvidersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SAMLProviderList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SAMLProviderListEntry',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'ValidUntil' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListServerCertificatesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ServerCertificateMetadataList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ServerCertificateMetadata',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'ServerCertificateName' => array(
                                'type' => 'string',
                            ),
                            'ServerCertificateId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'UploadDate' => array(
                                'type' => 'string',
                            ),
                            'Expiration' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListSigningCertificatesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Certificates' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SigningCertificate',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'UserName' => array(
                                'type' => 'string',
                            ),
                            'CertificateId' => array(
                                'type' => 'string',
                            ),
                            'CertificateBody' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'UploadDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListUserPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyNames' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'policyNameType',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListUsersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Users' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'User',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Path' => array(
                                'type' => 'string',
                            ),
                            'UserName' => array(
                                'type' => 'string',
                            ),
                            'UserId' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                            ),
                            'PasswordLastUsed' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListVirtualMFADevicesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VirtualMFADevices' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'VirtualMFADevice',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'SerialNumber' => array(
                                'type' => 'string',
                            ),
                            'Base32StringSeed' => array(
                                'type' => 'string',
                            ),
                            'QRCodePNG' => array(
                                'type' => 'string',
                            ),
                            'User' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Path' => array(
                                        'type' => 'string',
                                    ),
                                    'UserName' => array(
                                        'type' => 'string',
                                    ),
                                    'UserId' => array(
                                        'type' => 'string',
                                    ),
                                    'Arn' => array(
                                        'type' => 'string',
                                    ),
                                    'CreateDate' => array(
                                        'type' => 'string',
                                    ),
                                    'PasswordLastUsed' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'EnableDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'UpdateSAMLProviderResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SAMLProviderArn' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'UploadServerCertificateResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ServerCertificateMetadata' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Path' => array(
                            'type' => 'string',
                        ),
                        'ServerCertificateName' => array(
                            'type' => 'string',
                        ),
                        'ServerCertificateId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'UploadDate' => array(
                            'type' => 'string',
                        ),
                        'Expiration' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'UploadSigningCertificateResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Certificate' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'UserName' => array(
                            'type' => 'string',
                        ),
                        'CertificateId' => array(
                            'type' => 'string',
                        ),
                        'CertificateBody' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'UploadDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'GetAccountAuthorizationDetails' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'UserDetailList || GroupDetailList || RoleDetailList',
        ),
        'GetGroup' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'Users',
        ),
        'ListAccessKeys' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'AccessKeyMetadata',
        ),
        'ListAccountAliases' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'AccountAliases',
        ),
        'ListGroupPolicies' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'PolicyNames',
        ),
        'ListGroups' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'Groups',
        ),
        'ListGroupsForUser' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'Groups',
        ),
        'ListInstanceProfiles' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'InstanceProfiles',
        ),
        'ListInstanceProfilesForRole' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'InstanceProfiles',
        ),
        'ListMFADevices' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'MFADevices',
        ),
        'ListRolePolicies' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'PolicyNames',
        ),
        'ListRoles' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'Roles',
        ),
        'ListSAMLProviders' => array(
            'result_key' => 'SAMLProviderList',
        ),
        'ListServerCertificates' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'ServerCertificateMetadataList',
        ),
        'ListSigningCertificates' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'Certificates',
        ),
        'ListUserPolicies' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'PolicyNames',
        ),
        'ListUsers' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'Users',
        ),
        'ListVirtualMFADevices' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'VirtualMFADevices',
        ),
    ),
);
