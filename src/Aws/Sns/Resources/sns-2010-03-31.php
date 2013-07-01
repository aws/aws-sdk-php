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
    'apiVersion' => '2010-03-31',
    'endpointPrefix' => 'sns',
    'serviceFullName' => 'Amazon Simple Notification Service',
    'serviceAbbreviation' => 'Amazon SNS',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'Sns',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sns.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sns.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sns.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sns.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sns.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sns.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sns.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sns.sa-east-1.amazonaws.com',
        ),
        'us-gov-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sns.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AddPermission' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AddPermission',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'TopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Label' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AWSAccountId' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AWSAccountId.member',
                    'items' => array(
                        'name' => 'delegate',
                        'type' => 'string',
                    ),
                ),
                'ActionName' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ActionName.member',
                    'items' => array(
                        'name' => 'action',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
            ),
        ),
        'ConfirmSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ConfirmSubscriptionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ConfirmSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'TopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Token' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AuthenticateOnUnsubscribe' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the customer already owns the maximum allowed number of subscriptions.',
                    'class' => 'SubscriptionLimitExceededException',
                ),
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'CreateTopic' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateTopicResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateTopic',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates that the customer already owns the maximum allowed number of topics.',
                    'class' => 'TopicLimitExceededException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'DeleteTopic' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteTopic',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'TopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
            ),
        ),
        'GetSubscriptionAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetSubscriptionAttributesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetSubscriptionAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'SubscriptionArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'GetTopicAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetTopicAttributesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetTopicAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'TopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'ListSubscriptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListSubscriptionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListSubscriptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'ListSubscriptionsByTopic' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListSubscriptionsByTopicResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListSubscriptionsByTopic',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'TopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'ListTopics' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListTopicsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListTopics',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'Publish' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'PublishResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'Publish',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'TopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Message' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Subject' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MessageStructure' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'RemovePermission' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RemovePermission',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'TopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Label' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
            ),
        ),
        'SetSubscriptionAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetSubscriptionAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'SubscriptionArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AttributeName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AttributeValue' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'SetTopicAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetTopicAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'TopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AttributeName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AttributeValue' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'Subscribe' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SubscribeResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'Subscribe',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'TopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Protocol' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Endpoint' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the customer already owns the maximum allowed number of subscriptions.',
                    'class' => 'SubscriptionLimitExceededException',
                ),
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
            ),
        ),
        'Unsubscribe' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'Unsubscribe',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-03-31',
                ),
                'SubscriptionArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request parameter does not comply with the associated constraints.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Indicates an internal service error.',
                    'class' => 'InternalErrorException',
                ),
                array(
                    'reason' => 'Indicates that the user has been denied access to the requested resource.',
                    'class' => 'AuthorizationErrorException',
                ),
                array(
                    'reason' => 'Indicates that the requested resource does not exist.',
                    'class' => 'NotFoundException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'ConfirmSubscriptionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SubscriptionArn' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'CreateTopicResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TopicArn' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetSubscriptionAttributesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Attributes' => array(
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
        'GetTopicAttributesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Attributes' => array(
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
        'ListSubscriptionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Subscriptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Subscription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'SubscriptionArn' => array(
                                'type' => 'string',
                            ),
                            'Owner' => array(
                                'type' => 'string',
                            ),
                            'Protocol' => array(
                                'type' => 'string',
                            ),
                            'Endpoint' => array(
                                'type' => 'string',
                            ),
                            'TopicArn' => array(
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
        'ListSubscriptionsByTopicResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Subscriptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Subscription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'SubscriptionArn' => array(
                                'type' => 'string',
                            ),
                            'Owner' => array(
                                'type' => 'string',
                            ),
                            'Protocol' => array(
                                'type' => 'string',
                            ),
                            'Endpoint' => array(
                                'type' => 'string',
                            ),
                            'TopicArn' => array(
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
        'ListTopicsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Topics' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Topic',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'TopicArn' => array(
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
        'PublishResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MessageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'SubscribeResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SubscriptionArn' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'operations' => array(
            'ListSubscriptions' => array(
                'token_param' => 'NextToken',
                'token_key' => 'NextToken',
                'result_key' => 'Subscriptions',
            ),
            'ListSubscriptionsByTopic' => array(
                'token_param' => 'NextToken',
                'token_key' => 'NextToken',
                'result_key' => 'Subscriptions',
            ),
            'ListTopics' => array(
                'token_param' => 'NextToken',
                'token_key' => 'NextToken',
                'result_key' => 'Topics/*/TopicArn',
            ),
        ),
    ),
);
