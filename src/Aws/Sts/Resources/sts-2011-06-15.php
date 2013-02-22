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
            'summary' => 'The AssumeRole action returns a set of temporary security credentials that you can use to access resources that are defined in the role\'s policy. The returned credentials consist of an Access Key ID, a Secret Access Key, and a security token.',
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
                    'description' => 'The Amazon Resource Name (ARN) of the role that the caller is assuming.',
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 20,
                    'maxLength' => 2048,
                ),
                'RoleSessionName' => array(
                    'required' => true,
                    'description' => 'An identifier for the assumed role session. The session name is included as part of the AssumedRoleUser.',
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 2,
                    'maxLength' => 32,
                ),
                'Policy' => array(
                    'description' => 'A supplemental policy that can be associated with the temporary security credentials. The caller can restrict the permissions that are available on the role\'s temporary security credentials to maintain the least amount of privileges. When a service call is made with the temporary security credentials, both the role\'s permission policy and supplemental policy are checked. For more information about how permissions work in the context of temporary credentials, see Controlling Permissions in Temporary Credentials.',
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 2048,
                ),
                'DurationSeconds' => array(
                    'description' => 'The duration, in seconds, of the role session. The value can range from 900 seconds (15 minutes) to 3600 seconds (1 hour). By default, the value is set to 3600 seconds (1 hour).',
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 900,
                    'maximum' => 3600,
                ),
                'ExternalId' => array(
                    'description' => 'A unique identifier that is generated by a third party for each of their customers. For each role that the third party can assume, they should instruct their customers to create a role with the external ID that was generated by the third party. Each time the third party assumes the role, they must pass the customer\'s correct external ID. The external ID is useful in order to help third parties bind a role to the customer who created it. For more information about the external ID, see About the External ID in Using Temporary Security Credentials.',
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
        'GetFederationToken' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetFederationTokenResponse',
            'responseType' => 'model',
            'summary' => 'The GetFederationToken action returns a set of temporary credentials for a federated user with the user name and policy specified in the request. The credentials consist of an Access Key ID, a Secret Access Key, and a security token. Credentials created by IAM users are valid for the specified duration, between 15 minutes and 36 hours; credentials created using account credentials have a maximum duration of one hour.',
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
                    'description' => 'The name of the federated user associated with the credentials. For information about limitations on user names, go to Limitations on IAM Entities in Using IAM.',
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 2,
                    'maxLength' => 32,
                ),
                'Policy' => array(
                    'description' => 'A policy specifying the permissions to associate with the credentials. The caller can delegate their own permissions by specifying a policy, and both policies will be checked when a service call is made. For more information about how permissions work in the context of temporary credentials, see Controlling Permissions in Temporary Credentials in Using IAM.',
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 2048,
                ),
                'DurationSeconds' => array(
                    'description' => 'The duration, in seconds, that the session should last. Acceptable durations for federation sessions range from 900s (15 minutes) to 129600s (36 hours), with 43200s (12 hours) as the default. Sessions for AWS account owners are restricted to a maximum of 3600s (one hour). If the duration is longer than one hour, the session for AWS account owners defaults to one hour.',
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
            'summary' => 'The GetSessionToken action returns a set of temporary credentials for an AWS account or IAM user. The credentials consist of an Access Key ID, a Secret Access Key, and a security token. These credentials are valid for the specified duration only. The session duration for IAM users can be between 15 minutes and 36 hours, with a default of 12 hours. The session duration for AWS account owners is restricted to a maximum of one hour. Providing the AWS Multi-Factor Authentication (MFA) device serial number and the token code is optional.',
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
                    'description' => 'The duration, in seconds, that the credentials should remain valid. Acceptable durations for IAM user sessions range from 900s (15 minutes) to 129600s (36 hours), with 43200s (12 hours) as the default. Sessions for AWS account owners are restricted to a maximum of 3600s (one hour). If the duration is longer than one hour, the session for AWS account owners defaults to one hour.',
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 900,
                    'maximum' => 129600,
                ),
                'SerialNumber' => array(
                    'description' => 'The identification number of the MFA device for the user. If the IAM user has a policy requiring MFA authentication (or is in a group requiring MFA authentication) to access resources, provide the device value here.',
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 9,
                    'maxLength' => 256,
                ),
                'TokenCode' => array(
                    'description' => 'The value provided by the MFA device. If the user has an access policy requiring an MFA code (or is in a group requiring an MFA code), provide the value here to get permission to resources as specified in the access policy. If MFA authentication is required, and the user does not provide a code when requesting a set of temporary security credentials, the user will receive an "access denied" response when requesting resources that require MFA authentication. For more information, see Using Multi-Factor Authentication (MFA) Devices with AWS in Using IAM.',
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
                    'description' => 'The temporary security credentials, which includes an Access Key ID, a Secret Access Key, and a security token.',
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AccessKeyId' => array(
                            'description' => 'AccessKeyId ID that identifies the temporary credentials.',
                            'type' => 'string',
                        ),
                        'SecretAccessKey' => array(
                            'description' => 'The Secret Access Key to sign requests.',
                            'type' => 'string',
                        ),
                        'SessionToken' => array(
                            'description' => 'The security token that users must pass to the service API to use the temporary credentials.',
                            'type' => 'string',
                        ),
                        'Expiration' => array(
                            'description' => 'The date on which these credentials expire.',
                            'type' => 'string',
                        ),
                    ),
                ),
                'AssumedRoleUser' => array(
                    'description' => 'The Amazon Resource Name (ARN) and the assumed role ID for the temporary security credentials. The ARN and the role ID are identifiers for the temporary security credentials so that you can refer to the temporary credentials in a policy. For example, if you want to build a policy that applies to these temporary credentials, you would specify the AssumedRoleUser ARN or role ID in that policy.',
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AssumedRoleId' => array(
                            'description' => 'A unique identifier that contains the role ID and the role session name of the role that is being assumed. The role ID was generated by AWS when the role was created.',
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'description' => 'The ARN of the temporary security credentials that are returned from the AssumeRole action. For more information about ARNs and how to use them in policies, see Identifiers for IAM Entities in Using IAM.',
                            'type' => 'string',
                        ),
                    ),
                ),
                'PackedPolicySize' => array(
                    'description' => 'A percentage value that indicates the size of the policy in packed form. The service rejects any policy with a packed size greater than 100 percent, which means the policy exceeded the allowed space.',
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
                    'description' => 'Credentials for the service API authentication.',
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AccessKeyId' => array(
                            'description' => 'AccessKeyId ID that identifies the temporary credentials.',
                            'type' => 'string',
                        ),
                        'SecretAccessKey' => array(
                            'description' => 'The Secret Access Key to sign requests.',
                            'type' => 'string',
                        ),
                        'SessionToken' => array(
                            'description' => 'The security token that users must pass to the service API to use the temporary credentials.',
                            'type' => 'string',
                        ),
                        'Expiration' => array(
                            'description' => 'The date on which these credentials expire.',
                            'type' => 'string',
                        ),
                    ),
                ),
                'FederatedUser' => array(
                    'description' => 'Identifiers for the federated user associated with the credentials. You can use the federated user\'s ARN in your resource policies.',
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'FederatedUserId' => array(
                            'description' => 'The string identifying the federated user associated with the credentials, similar to the UserId of an IAM user.',
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'description' => 'The ARN specifying the federated user associated with the credentials. For more information about ARNs and how to use them in policies, see Identifiers for IAM Entities in Using IAM.',
                            'type' => 'string',
                        ),
                    ),
                ),
                'PackedPolicySize' => array(
                    'description' => 'A percentage value indicating the size of the policy in packed form. Policies for which the packed size is greater than 100% of the allowed value are rejected by the service.',
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
                    'description' => 'The session credentials for API authentication.',
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'AccessKeyId' => array(
                            'description' => 'AccessKeyId ID that identifies the temporary credentials.',
                            'type' => 'string',
                        ),
                        'SecretAccessKey' => array(
                            'description' => 'The Secret Access Key to sign requests.',
                            'type' => 'string',
                        ),
                        'SessionToken' => array(
                            'description' => 'The security token that users must pass to the service API to use the temporary credentials.',
                            'type' => 'string',
                        ),
                        'Expiration' => array(
                            'description' => 'The date on which these credentials expire.',
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
