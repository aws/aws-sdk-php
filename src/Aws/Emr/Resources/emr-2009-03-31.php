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
    'apiVersion' => '2009-03-31',
    'endpointPrefix' => 'elasticmapreduce',
    'serviceFullName' => 'Amazon Elastic MapReduce',
    'serviceAbbreviation' => 'Amazon EMR',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'ElasticMapReduce.',
    'signatureVersion' => 'v4',
    'namespace' => 'Emr',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.sa-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AddInstanceGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AddInstanceGroupsOutput',
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
                    'default' => 'ElasticMapReduce.AddInstanceGroups',
                ),
                'InstanceGroups' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'InstanceGroupConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'Market' => array(
                                'type' => 'string',
                                'enum' => array(
                                    'ON_DEMAND',
                                    'SPOT',
                                ),
                            ),
                            'InstanceRole' => array(
                                'required' => true,
                                'type' => 'string',
                                'enum' => array(
                                    'MASTER',
                                    'CORE',
                                    'TASK',
                                ),
                            ),
                            'BidPrice' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'InstanceType' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 256,
                            ),
                            'InstanceCount' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'JobFlowId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'AddJobFlowSteps' => array(
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
                    'default' => 'ElasticMapReduce.AddJobFlowSteps',
                ),
                'JobFlowId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'Steps' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'StepConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'ActionOnFailure' => array(
                                'type' => 'string',
                                'enum' => array(
                                    'TERMINATE_JOB_FLOW',
                                    'CANCEL_AND_WAIT',
                                    'CONTINUE',
                                ),
                            ),
                            'HadoopJarStep' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'Properties' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeyValue',
                                            'type' => 'object',
                                            'properties' => array(
                                                'Key' => array(
                                                    'type' => 'string',
                                                    'maxLength' => 10280,
                                                ),
                                                'Value' => array(
                                                    'type' => 'string',
                                                    'maxLength' => 10280,
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Jar' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'MainClass' => array(
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'Args' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'XmlString',
                                            'type' => 'string',
                                            'maxLength' => 10280,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeJobFlows' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeJobFlowsOutput',
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
                    'default' => 'ElasticMapReduce.DescribeJobFlows',
                ),
                'CreatedAfter' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'json',
                ),
                'CreatedBefore' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'json',
                ),
                'JobFlowIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                        'maxLength' => 10280,
                    ),
                ),
                'JobFlowStates' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'JobFlowExecutionState',
                        'type' => 'string',
                        'enum' => array(
                            'COMPLETED',
                            'FAILED',
                            'TERMINATED',
                            'RUNNING',
                            'SHUTTING_DOWN',
                            'STARTING',
                            'WAITING',
                            'BOOTSTRAPPING',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ModifyInstanceGroups' => array(
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
                    'default' => 'ElasticMapReduce.ModifyInstanceGroups',
                ),
                'InstanceGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'InstanceGroupModifyConfig',
                        'type' => 'object',
                        'properties' => array(
                            'InstanceGroupId' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'InstanceCount' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'RunJobFlow' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RunJobFlowOutput',
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
                    'default' => 'ElasticMapReduce.RunJobFlow',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'LogUri' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 10280,
                ),
                'AdditionalInfo' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 10280,
                ),
                'AmiVersion' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'Instances' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'MasterInstanceType' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'SlaveInstanceType' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'InstanceCount' => array(
                            'type' => 'numeric',
                        ),
                        'InstanceGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'InstanceGroupConfig',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                        'maxLength' => 256,
                                    ),
                                    'Market' => array(
                                        'type' => 'string',
                                        'enum' => array(
                                            'ON_DEMAND',
                                            'SPOT',
                                        ),
                                    ),
                                    'InstanceRole' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'enum' => array(
                                            'MASTER',
                                            'CORE',
                                            'TASK',
                                        ),
                                    ),
                                    'BidPrice' => array(
                                        'type' => 'string',
                                        'maxLength' => 256,
                                    ),
                                    'InstanceType' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'InstanceCount' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'Ec2KeyName' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                        'Placement' => array(
                            'type' => 'object',
                            'properties' => array(
                                'AvailabilityZone' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'maxLength' => 10280,
                                ),
                            ),
                        ),
                        'KeepJobFlowAliveWhenNoSteps' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'TerminationProtected' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'HadoopVersion' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                        'Ec2SubnetId' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'Steps' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'StepConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'ActionOnFailure' => array(
                                'type' => 'string',
                                'enum' => array(
                                    'TERMINATE_JOB_FLOW',
                                    'CANCEL_AND_WAIT',
                                    'CONTINUE',
                                ),
                            ),
                            'HadoopJarStep' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'Properties' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeyValue',
                                            'type' => 'object',
                                            'properties' => array(
                                                'Key' => array(
                                                    'type' => 'string',
                                                    'maxLength' => 10280,
                                                ),
                                                'Value' => array(
                                                    'type' => 'string',
                                                    'maxLength' => 10280,
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Jar' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'MainClass' => array(
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'Args' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'XmlString',
                                            'type' => 'string',
                                            'maxLength' => 10280,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'BootstrapActions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'BootstrapActionConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'ScriptBootstrapAction' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'Path' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'Args' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'XmlString',
                                            'type' => 'string',
                                            'maxLength' => 10280,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'SupportedProducts' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlStringMaxLen256',
                        'type' => 'string',
                        'maxLength' => 256,
                    ),
                ),
                'NewSupportedProducts' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'SupportedProductConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'Args' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'XmlString',
                                    'type' => 'string',
                                    'maxLength' => 10280,
                                ),
                            ),
                        ),
                    ),
                ),
                'VisibleToAllUsers' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'JobFlowRole' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 10280,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'SetTerminationProtection' => array(
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
                    'default' => 'ElasticMapReduce.SetTerminationProtection',
                ),
                'JobFlowIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                        'maxLength' => 10280,
                    ),
                ),
                'TerminationProtected' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'SetVisibleToAllUsers' => array(
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
                    'default' => 'ElasticMapReduce.SetVisibleToAllUsers',
                ),
                'JobFlowIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                        'maxLength' => 10280,
                    ),
                ),
                'VisibleToAllUsers' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'TerminateJobFlows' => array(
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
                    'default' => 'ElasticMapReduce.TerminateJobFlows',
                ),
                'JobFlowIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                        'maxLength' => 10280,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
    ),
    'models' => array(
        'AddInstanceGroupsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobFlowId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceGroupIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlStringMaxLen256',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DescribeJobFlowsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobFlows' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'JobFlowDetail',
                        'type' => 'object',
                        'properties' => array(
                            'JobFlowId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'LogUri' => array(
                                'type' => 'string',
                            ),
                            'AmiVersion' => array(
                                'type' => 'string',
                            ),
                            'ExecutionStatusDetail' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'State' => array(
                                        'type' => 'string',
                                    ),
                                    'CreationDateTime' => array(
                                        'type' => 'string',
                                    ),
                                    'StartDateTime' => array(
                                        'type' => 'string',
                                    ),
                                    'ReadyDateTime' => array(
                                        'type' => 'string',
                                    ),
                                    'EndDateTime' => array(
                                        'type' => 'string',
                                    ),
                                    'LastStateChangeReason' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Instances' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'MasterInstanceType' => array(
                                        'type' => 'string',
                                    ),
                                    'MasterPublicDnsName' => array(
                                        'type' => 'string',
                                    ),
                                    'MasterInstanceId' => array(
                                        'type' => 'string',
                                    ),
                                    'SlaveInstanceType' => array(
                                        'type' => 'string',
                                    ),
                                    'InstanceCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'InstanceGroups' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'InstanceGroupDetail',
                                            'type' => 'object',
                                            'properties' => array(
                                                'InstanceGroupId' => array(
                                                    'type' => 'string',
                                                ),
                                                'Name' => array(
                                                    'type' => 'string',
                                                ),
                                                'Market' => array(
                                                    'type' => 'string',
                                                ),
                                                'InstanceRole' => array(
                                                    'type' => 'string',
                                                ),
                                                'BidPrice' => array(
                                                    'type' => 'string',
                                                ),
                                                'InstanceType' => array(
                                                    'type' => 'string',
                                                ),
                                                'InstanceRequestCount' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'InstanceRunningCount' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'State' => array(
                                                    'type' => 'string',
                                                ),
                                                'LastStateChangeReason' => array(
                                                    'type' => 'string',
                                                ),
                                                'CreationDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'StartDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'ReadyDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'EndDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'NormalizedInstanceHours' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Ec2KeyName' => array(
                                        'type' => 'string',
                                    ),
                                    'Ec2SubnetId' => array(
                                        'type' => 'string',
                                    ),
                                    'Placement' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'AvailabilityZone' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'KeepJobFlowAliveWhenNoSteps' => array(
                                        'type' => 'boolean',
                                    ),
                                    'TerminationProtected' => array(
                                        'type' => 'boolean',
                                    ),
                                    'HadoopVersion' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Steps' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StepDetail',
                                    'type' => 'object',
                                    'properties' => array(
                                        'StepConfig' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                ),
                                                'ActionOnFailure' => array(
                                                    'type' => 'string',
                                                ),
                                                'HadoopJarStep' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Properties' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'KeyValue',
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
                                                        'Jar' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MainClass' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Args' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'XmlString',
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'ExecutionStatusDetail' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'State' => array(
                                                    'type' => 'string',
                                                ),
                                                'CreationDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'StartDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'EndDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'LastStateChangeReason' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'BootstrapActions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BootstrapActionDetail',
                                    'type' => 'object',
                                    'properties' => array(
                                        'BootstrapActionConfig' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                ),
                                                'ScriptBootstrapAction' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Path' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Args' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'XmlString',
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
                            'SupportedProducts' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'XmlStringMaxLen256',
                                    'type' => 'string',
                                ),
                            ),
                            'VisibleToAllUsers' => array(
                                'type' => 'boolean',
                            ),
                            'JobFlowRole' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RunJobFlowOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobFlowId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'operations' => array(
            'DescribeJobFlows' => array(
                'result_key' => 'JobFlows',
            ),
        ),
    ),
);
