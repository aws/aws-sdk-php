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
    'apiVersion' => '2010-05-15',
    'endpointPrefix' => 'cloudformation',
    'serviceFullName' => 'AWS CloudFormation',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'CloudFormation',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudformation.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudformation.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudformation.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudformation.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudformation.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudformation.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudformation.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudformation.sa-east-1.amazonaws.com',
        ),
        'us-gov-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudformation.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CancelUpdateStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CancelUpdateStack',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateStackOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateStack',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TemplateBody' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 51200,
                ),
                'TemplateURL' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'Parameters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Parameters.member',
                    'items' => array(
                        'name' => 'Parameter',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterKey' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'DisableRollback' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'TimeoutInMinutes' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                ),
                'NotificationARNs' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'NotificationARNs.member',
                    'maxItems' => 5,
                    'items' => array(
                        'name' => 'NotificationARN',
                        'type' => 'string',
                    ),
                ),
                'Capabilities' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Capabilities.member',
                    'items' => array(
                        'name' => 'Capability',
                        'type' => 'string',
                        'enum' => array(
                            'CAPABILITY_IAM',
                        ),
                    ),
                ),
                'OnFailure' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'enum' => array(
                        'DO_NOTHING',
                        'ROLLBACK',
                        'DELETE',
                    ),
                ),
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tags.member',
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
            'errorResponses' => array(
                array(
                    'reason' => 'Quota for the resource has already been reached.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Resource with the name requested already exists.',
                    'class' => 'AlreadyExistsException',
                ),
                array(
                    'reason' => 'The template contains resources with capabilities that were not specified in the Capabilities parameter.',
                    'class' => 'InsufficientCapabilitiesException',
                ),
            ),
        ),
        'DeleteStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteStack',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeStackEvents' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeStackEventsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeStackEvents',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
            ),
        ),
        'DescribeStackResource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeStackResourceOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeStackResource',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LogicalResourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeStackResources' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeStackResourcesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeStackResources',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LogicalResourceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PhysicalResourceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeStacks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeStacksOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeStacks',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
            ),
        ),
        'EstimateTemplateCost' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EstimateTemplateCostOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EstimateTemplateCost',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'TemplateBody' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 51200,
                ),
                'TemplateURL' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'Parameters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Parameters.member',
                    'items' => array(
                        'name' => 'Parameter',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterKey' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetTemplate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetTemplateOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetTemplate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ListStackResources' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListStackResourcesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListStackResources',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
            ),
        ),
        'ListStacks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListStacksOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListStacks',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'StackStatusFilter' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'StackStatusFilter.member',
                    'items' => array(
                        'name' => 'StackStatus',
                        'type' => 'string',
                        'enum' => array(
                            'CREATE_IN_PROGRESS',
                            'CREATE_FAILED',
                            'CREATE_COMPLETE',
                            'ROLLBACK_IN_PROGRESS',
                            'ROLLBACK_FAILED',
                            'ROLLBACK_COMPLETE',
                            'DELETE_IN_PROGRESS',
                            'DELETE_FAILED',
                            'DELETE_COMPLETE',
                            'UPDATE_IN_PROGRESS',
                            'UPDATE_COMPLETE_CLEANUP_IN_PROGRESS',
                            'UPDATE_COMPLETE',
                            'UPDATE_ROLLBACK_IN_PROGRESS',
                            'UPDATE_ROLLBACK_FAILED',
                            'UPDATE_ROLLBACK_COMPLETE_CLEANUP_IN_PROGRESS',
                            'UPDATE_ROLLBACK_COMPLETE',
                        ),
                    ),
                ),
            ),
        ),
        'UpdateStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateStackOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateStack',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'StackName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TemplateBody' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 51200,
                ),
                'TemplateURL' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'Parameters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Parameters.member',
                    'items' => array(
                        'name' => 'Parameter',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterKey' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Capabilities' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Capabilities.member',
                    'items' => array(
                        'name' => 'Capability',
                        'type' => 'string',
                        'enum' => array(
                            'CAPABILITY_IAM',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The template contains resources with capabilities that were not specified in the Capabilities parameter.',
                    'class' => 'InsufficientCapabilitiesException',
                ),
            ),
        ),
        'ValidateTemplate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ValidateTemplateOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ValidateTemplate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-05-15',
                ),
                'TemplateBody' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 51200,
                ),
                'TemplateURL' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CreateStackOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'DescribeStackEventsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackEvents' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'StackEvent',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'EventId' => array(
                                'type' => 'string',
                            ),
                            'StackName' => array(
                                'type' => 'string',
                            ),
                            'LogicalResourceId' => array(
                                'type' => 'string',
                            ),
                            'PhysicalResourceId' => array(
                                'type' => 'string',
                            ),
                            'ResourceType' => array(
                                'type' => 'string',
                            ),
                            'Timestamp' => array(
                                'type' => 'string',
                            ),
                            'ResourceStatus' => array(
                                'type' => 'string',
                            ),
                            'ResourceStatusReason' => array(
                                'type' => 'string',
                            ),
                            'ResourceProperties' => array(
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
        'DescribeStackResourceOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackResourceDetail' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'StackName' => array(
                            'type' => 'string',
                        ),
                        'StackId' => array(
                            'type' => 'string',
                        ),
                        'LogicalResourceId' => array(
                            'type' => 'string',
                        ),
                        'PhysicalResourceId' => array(
                            'type' => 'string',
                        ),
                        'ResourceType' => array(
                            'type' => 'string',
                        ),
                        'LastUpdatedTimestamp' => array(
                            'type' => 'string',
                        ),
                        'ResourceStatus' => array(
                            'type' => 'string',
                        ),
                        'ResourceStatusReason' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Metadata' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeStackResourcesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackResources' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'StackResource',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'StackName' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'LogicalResourceId' => array(
                                'type' => 'string',
                            ),
                            'PhysicalResourceId' => array(
                                'type' => 'string',
                            ),
                            'ResourceType' => array(
                                'type' => 'string',
                            ),
                            'Timestamp' => array(
                                'type' => 'string',
                            ),
                            'ResourceStatus' => array(
                                'type' => 'string',
                            ),
                            'ResourceStatusReason' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeStacksOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Stacks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Stack',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'StackName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Parameters' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Parameter',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'ParameterKey' => array(
                                            'type' => 'string',
                                        ),
                                        'ParameterValue' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'CreationTime' => array(
                                'type' => 'string',
                            ),
                            'LastUpdatedTime' => array(
                                'type' => 'string',
                            ),
                            'StackStatus' => array(
                                'type' => 'string',
                            ),
                            'StackStatusReason' => array(
                                'type' => 'string',
                            ),
                            'DisableRollback' => array(
                                'type' => 'boolean',
                            ),
                            'NotificationARNs' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NotificationARN',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'TimeoutInMinutes' => array(
                                'type' => 'numeric',
                            ),
                            'Capabilities' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Capability',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'Outputs' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Output',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'OutputKey' => array(
                                            'type' => 'string',
                                        ),
                                        'OutputValue' => array(
                                            'type' => 'string',
                                        ),
                                        'Description' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Tag',
                                    'type' => 'object',
                                    'sentAs' => 'member',
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
                    'location' => 'xml',
                ),
            ),
        ),
        'EstimateTemplateCostOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Url' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetTemplateOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TemplateBody' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListStackResourcesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackResourceSummaries' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'StackResourceSummary',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'LogicalResourceId' => array(
                                'type' => 'string',
                            ),
                            'PhysicalResourceId' => array(
                                'type' => 'string',
                            ),
                            'ResourceType' => array(
                                'type' => 'string',
                            ),
                            'LastUpdatedTimestamp' => array(
                                'type' => 'string',
                            ),
                            'ResourceStatus' => array(
                                'type' => 'string',
                            ),
                            'ResourceStatusReason' => array(
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
        'ListStacksOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackSummaries' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'StackSummary',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'StackName' => array(
                                'type' => 'string',
                            ),
                            'TemplateDescription' => array(
                                'type' => 'string',
                            ),
                            'CreationTime' => array(
                                'type' => 'string',
                            ),
                            'LastUpdatedTime' => array(
                                'type' => 'string',
                            ),
                            'DeletionTime' => array(
                                'type' => 'string',
                            ),
                            'StackStatus' => array(
                                'type' => 'string',
                            ),
                            'StackStatusReason' => array(
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
        'UpdateStackOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ValidateTemplateOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Parameters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'TemplateParameter',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'ParameterKey' => array(
                                'type' => 'string',
                            ),
                            'DefaultValue' => array(
                                'type' => 'string',
                            ),
                            'NoEcho' => array(
                                'type' => 'boolean',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Capabilities' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Capability',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'CapabilitiesReason' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'operations' => array(
            'DescribeStackEvents' => array(
                'token_param' => 'NextToken',
                'token_key' => 'NextToken',
                'result_key' => 'StackEvents',
            ),
            'DescribeStacks' => array(
                'token_param' => 'NextToken',
                'token_key' => 'NextToken',
                'result_key' => 'Stacks',
            ),
            'ListStackResources' => array(
                'token_param' => 'NextToken',
                'token_key' => 'NextToken',
                'result_key' => 'StackResourceSummaries',
            ),
            'ListStacks' => array(
                'token_param' => 'NextToken',
                'token_key' => 'NextToken',
                'result_key' => 'StackSummaries',
            ),
        ),
    ),
);
