<?php
return array (
    'name' => 'sts',
    'apiVersion' => '2011-06-15',
    'description' => 'AWS Security Token Service',
    'operations' => array(
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
                    'description' => 'The name of the federated user associated with the credentials. For information about limitations on user names, go to Limitations on IAM Entities in Using AWS Identity and Access Management.',
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 2,
                    'maxLength' => 32,
                ),
                'Policy' => array(
                    'description' => 'A policy specifying the permissions to associate with the credentials. The caller can delegate their own permissions by specifying a policy, and both policies will be checked when a service call is made. For more information about how permissions work in the context of temporary credentials, see Controlling Permissions in Temporary Credentials in Using AWS Identity and Access Management.',
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 2048,
                ),
                'DurationSeconds' => array(
                    'description' => 'The duration, in seconds, that the session should last. Acceptable durations for federation sessions range from 3600s (one hour) to 129600s (36 hours), with 43200s (12 hours) as the default.',
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 3600,
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
                    'description' => 'The duration, in seconds, that the credentials should remain valid. Acceptable durations for IAM user sessions range from 3600s (one hour) to 129600s (36 hours), with 43200s (12 hours) as the default. Sessions for AWS account owners are restricted to a maximum of 3600s (one hour).',
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 3600,
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
                            'description' => 'The ARN specifying the federated user associated with the credentials. For more information about ARNs and how to use them in policies, see Identifiers for IAM Entities in Using AWS Identity and Access Management.',
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
