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
    'apiVersion' => '2010-12-01',
    'endpointPrefix' => 'email',
    'serviceFullName' => 'Amazon Simple Email Service',
    'serviceAbbreviation' => 'Amazon SES',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'Ses',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'email.us-east-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'email.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'email.eu-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CloneReceiptRuleSet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CloneReceiptRuleSet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OriginalRuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided receipt rule set does not exist.',
                    'class' => 'RuleSetDoesNotExistException',
                ),
                array(
                    'reason' => 'Indicates that a resource could not be created due to a naming conflict.',
                    'class' => 'AlreadyExistsException',
                ),
                array(
                    'reason' => 'Indicates that a resource could not be created due to service limits. For a list of Amazon SES limits, see the Amazon SES Developer Guide.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'CreateReceiptFilter' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateReceiptFilter',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Filter' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Name' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'IpFilter' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Policy' => array(
                                    'required' => true,
                                    'type' => 'string',
                                ),
                                'Cidr' => array(
                                    'required' => true,
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a resource could not be created due to service limits. For a list of Amazon SES limits, see the Amazon SES Developer Guide.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Indicates that a resource could not be created due to a naming conflict.',
                    'class' => 'AlreadyExistsException',
                ),
            ),
        ),
        'CreateReceiptRule' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateReceiptRule',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'After' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Rule' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Name' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'TlsPolicy' => array(
                            'type' => 'string',
                        ),
                        'Recipients' => array(
                            'type' => 'array',
                            'sentAs' => 'Recipients.member',
                            'items' => array(
                                'name' => 'Recipient',
                                'type' => 'string',
                            ),
                        ),
                        'Actions' => array(
                            'type' => 'array',
                            'sentAs' => 'Actions.member',
                            'items' => array(
                                'name' => 'ReceiptAction',
                                'type' => 'object',
                                'properties' => array(
                                    'S3Action' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'BucketName' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'ObjectKeyPrefix' => array(
                                                'type' => 'string',
                                            ),
                                            'KmsKeyArn' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'BounceAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'SmtpReplyCode' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'StatusCode' => array(
                                                'type' => 'string',
                                            ),
                                            'Message' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'Sender' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'WorkmailAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'OrganizationArn' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'LambdaAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'FunctionArn' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'InvocationType' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'StopAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Scope' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'AddHeaderAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HeaderName' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'HeaderValue' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'SNSAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'ScanEnabled' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided Amazon SNS topic is invalid, or that Amazon SES could not publish to the topic, possibly due to permissions issues. For information about giving permissions, see the Amazon SES Developer Guide.',
                    'class' => 'InvalidSnsTopicException',
                ),
                array(
                    'reason' => 'Indicates that the provided Amazon S3 bucket or AWS KMS encryption key is invalid, or that Amazon SES could not publish to the bucket, possibly due to permissions issues. For information about giving permissions, see the Amazon SES Developer Guide.',
                    'class' => 'InvalidS3ConfigurationException',
                ),
                array(
                    'reason' => 'Indicates that the provided AWS Lambda function is invalid, or that Amazon SES could not execute the provided function, possibly due to permissions issues. For information about giving permissions, see the Amazon SES Developer Guide.',
                    'class' => 'InvalidLambdaFunctionException',
                ),
                array(
                    'reason' => 'Indicates that a resource could not be created due to a naming conflict.',
                    'class' => 'AlreadyExistsException',
                ),
                array(
                    'reason' => 'Indicates that the provided receipt rule does not exist.',
                    'class' => 'RuleDoesNotExistException',
                ),
                array(
                    'reason' => 'Indicates that the provided receipt rule set does not exist.',
                    'class' => 'RuleSetDoesNotExistException',
                ),
                array(
                    'reason' => 'Indicates that a resource could not be created due to service limits. For a list of Amazon SES limits, see the Amazon SES Developer Guide.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'CreateReceiptRuleSet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateReceiptRuleSet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a resource could not be created due to a naming conflict.',
                    'class' => 'AlreadyExistsException',
                ),
                array(
                    'reason' => 'Indicates that a resource could not be created due to service limits. For a list of Amazon SES limits, see the Amazon SES Developer Guide.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'DeleteIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteIdentity',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteIdentityPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteIdentityPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                ),
            ),
        ),
        'DeleteReceiptFilter' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteReceiptFilter',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'FilterName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteReceiptRule' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteReceiptRule',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RuleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided receipt rule set does not exist.',
                    'class' => 'RuleSetDoesNotExistException',
                ),
            ),
        ),
        'DeleteReceiptRuleSet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteReceiptRuleSet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the delete operation could not be completed.',
                    'class' => 'CannotDeleteException',
                ),
            ),
        ),
        'DeleteVerifiedEmailAddress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'deprecated' => true,
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVerifiedEmailAddress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EmailAddress' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeActiveReceiptRuleSet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeActiveReceiptRuleSetResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeActiveReceiptRuleSet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
        ),
        'DescribeReceiptRule' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeReceiptRuleResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReceiptRule',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RuleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided receipt rule does not exist.',
                    'class' => 'RuleDoesNotExistException',
                ),
                array(
                    'reason' => 'Indicates that the provided receipt rule set does not exist.',
                    'class' => 'RuleSetDoesNotExistException',
                ),
            ),
        ),
        'DescribeReceiptRuleSet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeReceiptRuleSetResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReceiptRuleSet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided receipt rule set does not exist.',
                    'class' => 'RuleSetDoesNotExistException',
                ),
            ),
        ),
        'GetIdentityDkimAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetIdentityDkimAttributesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetIdentityDkimAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identities' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Identities.member',
                    'items' => array(
                        'name' => 'Identity',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetIdentityNotificationAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetIdentityNotificationAttributesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetIdentityNotificationAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identities' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Identities.member',
                    'items' => array(
                        'name' => 'Identity',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetIdentityPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetIdentityPoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetIdentityPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PolicyNames.member',
                    'items' => array(
                        'name' => 'PolicyName',
                        'type' => 'string',
                        'minLength' => 1,
                    ),
                ),
            ),
        ),
        'GetIdentityVerificationAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetIdentityVerificationAttributesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetIdentityVerificationAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identities' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Identities.member',
                    'items' => array(
                        'name' => 'Identity',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetSendQuota' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetSendQuotaResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetSendQuota',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
        ),
        'GetSendStatistics' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetSendStatisticsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetSendStatistics',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
        ),
        'ListIdentities' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListIdentitiesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListIdentities',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'IdentityType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ListIdentityPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListIdentityPoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListIdentityPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ListReceiptFilters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListReceiptFiltersResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListReceiptFilters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
        ),
        'ListReceiptRuleSets' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListReceiptRuleSetsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListReceiptRuleSets',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ListVerifiedEmailAddresses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListVerifiedEmailAddressesResponse',
            'responseType' => 'model',
            'deprecated' => true,
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListVerifiedEmailAddresses',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
        ),
        'PutIdentityPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutIdentityPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                ),
                'Policy' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided policy is invalid. Check the error stack for more information about what caused the error.',
                    'class' => 'InvalidPolicyException',
                ),
            ),
        ),
        'ReorderReceiptRuleSet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ReorderReceiptRuleSet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RuleNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'RuleNames.member',
                    'items' => array(
                        'name' => 'ReceiptRuleName',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided receipt rule set does not exist.',
                    'class' => 'RuleSetDoesNotExistException',
                ),
                array(
                    'reason' => 'Indicates that the provided receipt rule does not exist.',
                    'class' => 'RuleDoesNotExistException',
                ),
            ),
        ),
        'SendBounce' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SendBounceResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SendBounce',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'OriginalMessageId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'BounceSender' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Explanation' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MessageDsn' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'ReportingMta' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'ArrivalDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                        'ExtensionFields' => array(
                            'type' => 'array',
                            'sentAs' => 'ExtensionFields.member',
                            'items' => array(
                                'name' => 'ExtensionField',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'BouncedRecipientInfoList' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'BouncedRecipientInfoList.member',
                    'items' => array(
                        'name' => 'BouncedRecipientInfo',
                        'type' => 'object',
                        'properties' => array(
                            'Recipient' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'RecipientArn' => array(
                                'type' => 'string',
                            ),
                            'BounceType' => array(
                                'type' => 'string',
                            ),
                            'RecipientDsnFields' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'FinalRecipient' => array(
                                        'type' => 'string',
                                    ),
                                    'Action' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'RemoteMta' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'DiagnosticCode' => array(
                                        'type' => 'string',
                                    ),
                                    'LastAttemptDate' => array(
                                        'type' => array(
                                            'object',
                                            'string',
                                            'integer',
                                        ),
                                        'format' => 'date-time',
                                    ),
                                    'ExtensionFields' => array(
                                        'type' => 'array',
                                        'sentAs' => 'ExtensionFields.member',
                                        'items' => array(
                                            'name' => 'ExtensionField',
                                            'type' => 'object',
                                            'properties' => array(
                                                'Name' => array(
                                                    'required' => true,
                                                    'type' => 'string',
                                                ),
                                                'Value' => array(
                                                    'required' => true,
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'BounceSenderArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the action failed, and the message could not be sent. Check the error stack for more information about what caused the error.',
                    'class' => 'MessageRejectedException',
                ),
            ),
        ),
        'SendEmail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SendEmailResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SendEmail',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Source' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Destination' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'ToAddresses' => array(
                            'type' => 'array',
                            'sentAs' => 'ToAddresses.member',
                            'items' => array(
                                'name' => 'Address',
                                'type' => 'string',
                            ),
                        ),
                        'CcAddresses' => array(
                            'type' => 'array',
                            'sentAs' => 'CcAddresses.member',
                            'items' => array(
                                'name' => 'Address',
                                'type' => 'string',
                            ),
                        ),
                        'BccAddresses' => array(
                            'type' => 'array',
                            'sentAs' => 'BccAddresses.member',
                            'items' => array(
                                'name' => 'Address',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Message' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Subject' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Data' => array(
                                    'required' => true,
                                    'type' => 'string',
                                ),
                                'Charset' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Body' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Text' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Data' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'Charset' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'Html' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Data' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'Charset' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ReplyToAddresses' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ReplyToAddresses.member',
                    'items' => array(
                        'name' => 'Address',
                        'type' => 'string',
                    ),
                ),
                'ReturnPath' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReturnPathArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the action failed, and the message could not be sent. Check the error stack for more information about what caused the error.',
                    'class' => 'MessageRejectedException',
                ),
            ),
        ),
        'SendRawEmail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SendRawEmailResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SendRawEmail',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Source' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Destinations' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Destinations.member',
                    'items' => array(
                        'name' => 'Address',
                        'type' => 'string',
                    ),
                ),
                'RawMessage' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Data' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'FromArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReturnPathArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the action failed, and the message could not be sent. Check the error stack for more information about what caused the error.',
                    'class' => 'MessageRejectedException',
                ),
            ),
        ),
        'SetActiveReceiptRuleSet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetActiveReceiptRuleSet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided receipt rule set does not exist.',
                    'class' => 'RuleSetDoesNotExistException',
                ),
            ),
        ),
        'SetIdentityDkimEnabled' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetIdentityDkimEnabled',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DkimEnabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'SetIdentityFeedbackForwardingEnabled' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetIdentityFeedbackForwardingEnabled',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ForwardingEnabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'SetIdentityNotificationTopic' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetIdentityNotificationTopic',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NotificationType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnsTopic' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'SetReceiptRulePosition' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetReceiptRulePosition',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RuleName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'After' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided receipt rule set does not exist.',
                    'class' => 'RuleSetDoesNotExistException',
                ),
                array(
                    'reason' => 'Indicates that the provided receipt rule does not exist.',
                    'class' => 'RuleDoesNotExistException',
                ),
            ),
        ),
        'UpdateReceiptRule' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateReceiptRule',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'RuleSetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Rule' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Name' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'TlsPolicy' => array(
                            'type' => 'string',
                        ),
                        'Recipients' => array(
                            'type' => 'array',
                            'sentAs' => 'Recipients.member',
                            'items' => array(
                                'name' => 'Recipient',
                                'type' => 'string',
                            ),
                        ),
                        'Actions' => array(
                            'type' => 'array',
                            'sentAs' => 'Actions.member',
                            'items' => array(
                                'name' => 'ReceiptAction',
                                'type' => 'object',
                                'properties' => array(
                                    'S3Action' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'BucketName' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'ObjectKeyPrefix' => array(
                                                'type' => 'string',
                                            ),
                                            'KmsKeyArn' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'BounceAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'SmtpReplyCode' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'StatusCode' => array(
                                                'type' => 'string',
                                            ),
                                            'Message' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'Sender' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'WorkmailAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'OrganizationArn' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'LambdaAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'FunctionArn' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'InvocationType' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'StopAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Scope' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'AddHeaderAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HeaderName' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'HeaderValue' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'SNSAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'ScanEnabled' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the provided Amazon SNS topic is invalid, or that Amazon SES could not publish to the topic, possibly due to permissions issues. For information about giving permissions, see the Amazon SES Developer Guide.',
                    'class' => 'InvalidSnsTopicException',
                ),
                array(
                    'reason' => 'Indicates that the provided Amazon S3 bucket or AWS KMS encryption key is invalid, or that Amazon SES could not publish to the bucket, possibly due to permissions issues. For information about giving permissions, see the Amazon SES Developer Guide.',
                    'class' => 'InvalidS3ConfigurationException',
                ),
                array(
                    'reason' => 'Indicates that the provided AWS Lambda function is invalid, or that Amazon SES could not execute the provided function, possibly due to permissions issues. For information about giving permissions, see the Amazon SES Developer Guide.',
                    'class' => 'InvalidLambdaFunctionException',
                ),
                array(
                    'reason' => 'Indicates that the provided receipt rule set does not exist.',
                    'class' => 'RuleSetDoesNotExistException',
                ),
                array(
                    'reason' => 'Indicates that the provided receipt rule does not exist.',
                    'class' => 'RuleDoesNotExistException',
                ),
                array(
                    'reason' => 'Indicates that a resource could not be created due to service limits. For a list of Amazon SES limits, see the Amazon SES Developer Guide.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'VerifyDomainDkim' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'VerifyDomainDkimResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'VerifyDomainDkim',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'VerifyDomainIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'VerifyDomainIdentityResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'VerifyDomainIdentity',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'VerifyEmailAddress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'deprecated' => true,
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'VerifyEmailAddress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EmailAddress' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'VerifyEmailIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'VerifyEmailIdentity',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EmailAddress' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DescribeActiveReceiptRuleSetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Metadata' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'CreatedTimestamp' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Rules' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReceiptRule',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Enabled' => array(
                                'type' => 'boolean',
                            ),
                            'TlsPolicy' => array(
                                'type' => 'string',
                            ),
                            'Recipients' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Recipient',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'Actions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ReceiptAction',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'S3Action' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'BucketName' => array(
                                                    'type' => 'string',
                                                ),
                                                'ObjectKeyPrefix' => array(
                                                    'type' => 'string',
                                                ),
                                                'KmsKeyArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'BounceAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'SmtpReplyCode' => array(
                                                    'type' => 'string',
                                                ),
                                                'StatusCode' => array(
                                                    'type' => 'string',
                                                ),
                                                'Message' => array(
                                                    'type' => 'string',
                                                ),
                                                'Sender' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'WorkmailAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'OrganizationArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'LambdaAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'FunctionArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'InvocationType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'StopAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Scope' => array(
                                                    'type' => 'string',
                                                ),
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'AddHeaderAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'HeaderName' => array(
                                                    'type' => 'string',
                                                ),
                                                'HeaderValue' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'SNSAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'ScanEnabled' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeReceiptRuleResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Rule' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'TlsPolicy' => array(
                            'type' => 'string',
                        ),
                        'Recipients' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Recipient',
                                'type' => 'string',
                                'sentAs' => 'member',
                            ),
                        ),
                        'Actions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ReceiptAction',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'S3Action' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'BucketName' => array(
                                                'type' => 'string',
                                            ),
                                            'ObjectKeyPrefix' => array(
                                                'type' => 'string',
                                            ),
                                            'KmsKeyArn' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'BounceAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'SmtpReplyCode' => array(
                                                'type' => 'string',
                                            ),
                                            'StatusCode' => array(
                                                'type' => 'string',
                                            ),
                                            'Message' => array(
                                                'type' => 'string',
                                            ),
                                            'Sender' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'WorkmailAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'OrganizationArn' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'LambdaAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                            'FunctionArn' => array(
                                                'type' => 'string',
                                            ),
                                            'InvocationType' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'StopAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Scope' => array(
                                                'type' => 'string',
                                            ),
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'AddHeaderAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HeaderName' => array(
                                                'type' => 'string',
                                            ),
                                            'HeaderValue' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'SNSAction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'TopicArn' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'ScanEnabled' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeReceiptRuleSetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Metadata' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'CreatedTimestamp' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Rules' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReceiptRule',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Enabled' => array(
                                'type' => 'boolean',
                            ),
                            'TlsPolicy' => array(
                                'type' => 'string',
                            ),
                            'Recipients' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Recipient',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'Actions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ReceiptAction',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'S3Action' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'BucketName' => array(
                                                    'type' => 'string',
                                                ),
                                                'ObjectKeyPrefix' => array(
                                                    'type' => 'string',
                                                ),
                                                'KmsKeyArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'BounceAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'SmtpReplyCode' => array(
                                                    'type' => 'string',
                                                ),
                                                'StatusCode' => array(
                                                    'type' => 'string',
                                                ),
                                                'Message' => array(
                                                    'type' => 'string',
                                                ),
                                                'Sender' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'WorkmailAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'OrganizationArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'LambdaAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'FunctionArn' => array(
                                                    'type' => 'string',
                                                ),
                                                'InvocationType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'StopAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Scope' => array(
                                                    'type' => 'string',
                                                ),
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'AddHeaderAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'HeaderName' => array(
                                                    'type' => 'string',
                                                ),
                                                'HeaderValue' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'SNSAction' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'TopicArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'ScanEnabled' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetIdentityDkimAttributesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DkimAttributes' => array(
                    'type' => 'array',
                    'location' => 'xml',
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
                                'type' => 'object',
                                'properties' => array(
                                    'DkimEnabled' => array(
                                        'type' => 'boolean',
                                    ),
                                    'DkimVerificationStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'DkimTokens' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'VerificationToken',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'additionalProperties' => false,
                ),
            ),
        ),
        'GetIdentityNotificationAttributesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NotificationAttributes' => array(
                    'type' => 'array',
                    'location' => 'xml',
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
                                'type' => 'object',
                                'properties' => array(
                                    'BounceTopic' => array(
                                        'type' => 'string',
                                    ),
                                    'ComplaintTopic' => array(
                                        'type' => 'string',
                                    ),
                                    'DeliveryTopic' => array(
                                        'type' => 'string',
                                    ),
                                    'ForwardingEnabled' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'additionalProperties' => false,
                ),
            ),
        ),
        'GetIdentityPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Policies' => array(
                    'type' => 'array',
                    'location' => 'xml',
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
                                'type' => 'string',
                            ),
                        ),
                    ),
                    'additionalProperties' => false,
                ),
            ),
        ),
        'GetIdentityVerificationAttributesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VerificationAttributes' => array(
                    'type' => 'array',
                    'location' => 'xml',
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
                                'type' => 'object',
                                'properties' => array(
                                    'VerificationStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'VerificationToken' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'additionalProperties' => false,
                ),
            ),
        ),
        'GetSendQuotaResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Max24HourSend' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'MaxSendRate' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'SentLast24Hours' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetSendStatisticsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SendDataPoints' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SendDataPoint',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Timestamp' => array(
                                'type' => 'string',
                            ),
                            'DeliveryAttempts' => array(
                                'type' => 'numeric',
                            ),
                            'Bounces' => array(
                                'type' => 'numeric',
                            ),
                            'Complaints' => array(
                                'type' => 'numeric',
                            ),
                            'Rejects' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListIdentitiesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Identities' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Identity',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListIdentityPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyNames' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'PolicyName',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'ListReceiptFiltersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReceiptFilter',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'IpFilter' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Policy' => array(
                                        'type' => 'string',
                                    ),
                                    'Cidr' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListReceiptRuleSetsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RuleSets' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReceiptRuleSetMetadata',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'CreatedTimestamp' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListVerifiedEmailAddressesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VerifiedEmailAddresses' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Address',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'SendBounceResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MessageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'SendEmailResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MessageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'SendRawEmailResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MessageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'VerifyDomainDkimResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DkimTokens' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'VerificationToken',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'VerifyDomainIdentityResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VerificationToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListIdentities' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxItems',
            'result_key' => 'Identities',
        ),
        'ListVerifiedEmailAddresses' => array(
            'result_key' => 'VerifiedEmailAddresses',
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'interval' => 3,
            'max_attempts' => 20,
        ),
        'IdentityExists' => array(
            'operation' => 'GetIdentityVerificationAttributes',
            'success.type' => 'output',
            'success.path' => 'VerificationAttributes/*/VerificationStatus',
            'success.value' => true,
        ),
    ),
);
