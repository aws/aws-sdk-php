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
    'apiVersion' => '2012-01-25',
    'endpointPrefix' => 'swf',
    'serviceFullName' => 'Amazon Simple Workflow Service',
    'serviceAbbreviation' => 'Amazon SWF',
    'serviceType' => 'json',
    'jsonVersion' => '1.0',
    'targetPrefix' => 'SimpleWorkflowService.',
    'timestampFormat' => 'unixTimestamp',
    'signatureVersion' => 'v3',
    'namespace' => 'Swf',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.sa-east-1.amazonaws.com',
        ),
        'us-gov-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.us-gov-west-1.amazonaws.com'
        )
    ),
    'operations' => array(
        'CountClosedWorkflowExecutions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionCount',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns the number of closed workflow executions within the given domain that meet the specified filtering criteria.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.CountClosedWorkflowExecutions',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain containing the workflow executions to count.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'startTimeFilter' => array(
                    'description' => 'If specified, only workflow executions that meet the start time criteria of the filter are counted.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                    ),
                ),
                'closeTimeFilter' => array(
                    'description' => 'If specified, only workflow executions that meet the close time criteria of the filter are counted.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                    ),
                ),
                'executionFilter' => array(
                    'description' => 'If specified, only workflow executions matching the WorkflowId in the filter are counted.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'typeFilter' => array(
                    'description' => 'If specified, indicates the type of the workflow executions to be counted.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'type' => 'string',
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'tagFilter' => array(
                    'description' => 'If specified, only executions that have a tag that matches the filter are counted.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'tag' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'closeStatusFilter' => array(
                    'description' => 'If specified, only workflow executions that match this close status are counted. This filter has an affect only if executionStatus is specified as CLOSED.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'status' => array(
                            'required' => true,
                            'type' => 'string',
                            'enum' => array(
                                'COMPLETED',
                                'FAILED',
                                'CANCELED',
                                'TERMINATED',
                                'CONTINUED_AS_NEW',
                                'TIMED_OUT',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'CountOpenWorkflowExecutions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionCount',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns the number of open workflow executions within the given domain that meet the specified filtering criteria.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.CountOpenWorkflowExecutions',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain containing the workflow executions to count.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'startTimeFilter' => array(
                    'required' => true,
                    'description' => 'Specifies the start time criteria that workflow executions must meet in order to be counted.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                    ),
                ),
                'typeFilter' => array(
                    'description' => 'Specifies the type of the workflow executions to be counted.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'type' => 'string',
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'tagFilter' => array(
                    'description' => 'If specified, only executions that have a tag that matches the filter are counted.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'tag' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'executionFilter' => array(
                    'description' => 'If specified, only workflow executions matching the WorkflowId in the filter are counted.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'CountPendingActivityTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PendingTaskCount',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns the estimated number of activity tasks in the specified task list. The count returned is an approximation and is not guaranteed to be exact. If you specify a task list that no activity task was ever scheduled in then 0 will be returned.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.CountPendingActivityTasks',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain that contains the task list.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'taskList' => array(
                    'required' => true,
                    'description' => 'The name of the task list.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'CountPendingDecisionTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PendingTaskCount',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns the estimated number of decision tasks in the specified task list. The count returned is an approximation and is not guaranteed to be exact. If you specify a task list that no decision task was ever scheduled in then 0 will be returned.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.CountPendingDecisionTasks',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain that contains the task list.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'taskList' => array(
                    'required' => true,
                    'description' => 'The name of the task list.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DeprecateActivityType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Deprecates the specified activity type. After an activity type has been deprecated, you cannot create new tasks of that activity type. Tasks of this type that were scheduled before the type was deprecated will continue to run.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DeprecateActivityType',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain in which the activity type is registered.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'activityType' => array(
                    'required' => true,
                    'description' => 'The activity type to deprecate.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'TypeDeprecatedException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DeprecateDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Deprecates the specified domain. After a domain has been deprecated it cannot be used to create new workflow executions or register new types. However, you can still use visibility actions on this domain. Deprecating a domain also deprecates all activity and workflow types registered in the domain. Executions that were started before the domain was deprecated will continue to run.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DeprecateDomain',
                ),
                'name' => array(
                    'required' => true,
                    'description' => 'The name of the domain to deprecate.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'DomainDeprecatedException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DeprecateWorkflowType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Deprecates the specified workflow type. After a workflow type has been deprecated, you cannot create new executions of that type. Executions that were started before the type was deprecated will continue to run. A deprecated workflow type may still be used when calling visibility actions.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DeprecateWorkflowType',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain in which the workflow type is registered.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowType' => array(
                    'required' => true,
                    'description' => 'The workflow type to deprecate.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'TypeDeprecatedException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DescribeActivityType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ActivityTypeDetail',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns information about the specified activity type. This includes configuration settings provided at registration time as well as other general information about the type.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DescribeActivityType',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain in which the activity type is registered.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'activityType' => array(
                    'required' => true,
                    'description' => 'The activity type to describe.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DescribeDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DomainDetail',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns information about the specified domain including description and status.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DescribeDomain',
                ),
                'name' => array(
                    'required' => true,
                    'description' => 'The name of the domain to describe.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DescribeWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionDetail',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns information about the specified workflow execution including its type and some statistics.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DescribeWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain containing the workflow execution.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'execution' => array(
                    'required' => true,
                    'description' => 'The workflow execution to describe.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'runId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DescribeWorkflowType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowTypeDetail',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns information about the specified workflow type. This includes configuration settings specified when the type was registered and other information such as creation date, current status, etc.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DescribeWorkflowType',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain in which this workflow type is registered.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowType' => array(
                    'required' => true,
                    'description' => 'The workflow type to describe.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'GetWorkflowExecutionHistory' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'History',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns the history of the specified workflow execution. The results may be split into multiple pages. To retrieve subsequent pages, make the call again using the nextPageToken returned by the initial call.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.GetWorkflowExecutionHistory',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain containing the workflow execution.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'execution' => array(
                    'required' => true,
                    'description' => 'Specifies the workflow execution for which to return the history.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'runId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'description' => 'If a NextPageToken is returned, the result has more than one pages. To get the next page, repeat the call and specify the nextPageToken with all other arguments unchanged.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'description' => 'Specifies the maximum number of history events returned in one page. The next page in the result is identified by the NextPageToken returned. By default 100 history events are returned in a page but the caller can override this value to a page size smaller than the default. You cannot specify a page size larger than 100. Note that the number of events may be less than the maxiumum page size, in which case, the returned page will have fewer results than the maximumPageSize specified.',
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'description' => 'When set to true, returns the events in reverse order. By default the results are returned in ascending order of the eventTimeStamp of the events.',
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'ListActivityTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ActivityTypeInfos',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns information about all activities registered in the specified domain that match the specified name and registration status. The result includes information like creation date, current status of the activity, etc. The results may be split into multiple pages. To retrieve subsequent pages, make the call again using the nextPageToken returned by the initial call.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListActivityTypes',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain in which the activity types have been registered.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'name' => array(
                    'description' => 'If specified, only lists the activity types that have this name.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'registrationStatus' => array(
                    'required' => true,
                    'description' => 'Specifies the registration status of the activity types to list.',
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'REGISTERED',
                        'DEPRECATED',
                    ),
                ),
                'nextPageToken' => array(
                    'description' => 'If on a previous call to this method a NextResultToken was returned, the results have more than one page. To get the next page of results, repeat the call with the nextPageToken and keep all other arguments unchanged.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'description' => 'The maximum number of results returned in each page. The default is 100, but the caller can override this value to a page size smaller than the default. You cannot specify a page size greater than 100. Note that the number of types may be less than the maxiumum page size, in which case, the returned page will have fewer results than the maximumPageSize specified.',
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'description' => 'When set to true, returns the results in reverse order. By default the results are returned in ascending alphabetical order of the name of the activity types.',
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'class' => 'UnknownResourceException',
                ),
            ),
        ),
        'ListClosedWorkflowExecutions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionInfos',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns a list of closed workflow executions in the specified domain that meet the filtering criteria. The results may be split into multiple pages. To retrieve subsequent pages, make the call again using the nextPageToken returned by the initial call.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListClosedWorkflowExecutions',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain that contains the workflow executions to list.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'startTimeFilter' => array(
                    'description' => 'If specified, the workflow executions are included in the returned results based on whether their start times are within the range specified by this filter. Also, if this parameter is specified, the returned results are ordered by their start times.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                    ),
                ),
                'closeTimeFilter' => array(
                    'description' => 'If specified, the workflow executions are included in the returned results based on whether their close times are within the range specified by this filter. Also, if this parameter is specified, the returned results are ordered by their close times.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                    ),
                ),
                'executionFilter' => array(
                    'description' => 'If specified, only workflow executions matching the workflow id specified in the filter are returned.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'closeStatusFilter' => array(
                    'description' => 'If specified, only workflow executions that match this close status are listed. For example, if TERMINATED is specified, then only TERMINATED workflow executions are listed.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'status' => array(
                            'required' => true,
                            'type' => 'string',
                            'enum' => array(
                                'COMPLETED',
                                'FAILED',
                                'CANCELED',
                                'TERMINATED',
                                'CONTINUED_AS_NEW',
                                'TIMED_OUT',
                            ),
                        ),
                    ),
                ),
                'typeFilter' => array(
                    'description' => 'If specified, only executions of the type specified in the filter are returned.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'type' => 'string',
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'tagFilter' => array(
                    'description' => 'If specified, only executions that have the matching tag are listed.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'tag' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'description' => 'If on a previous call to this method a NextPageToken was returned, the results are being paginated. To get the next page of results, repeat the call with the returned token and all other arguments unchanged.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'description' => 'The maximum number of results returned in each page. The default is 100, but the caller can override this value to a page size smaller than the default. You cannot specify a page size greater than 100. Note that the number of executions may be less than the maxiumum page size, in which case, the returned page will have fewer results than the maximumPageSize specified.',
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'description' => 'When set to true, returns the results in reverse order. By default the results are returned in descending order of the start or the close time of the executions.',
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'ListDomains' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DomainInfos',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns the list of domains registered in the account. The results may be split into multiple pages. To retrieve subsequent pages, make the call again using the nextPageToken returned by the initial call.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListDomains',
                ),
                'nextPageToken' => array(
                    'description' => 'If on a previous call to this method a NextPageToken was returned, the result has more than one page. To get the next page of results, repeat the call with the returned token and all other arguments unchanged.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'registrationStatus' => array(
                    'required' => true,
                    'description' => 'Specifies the registration status of the domains to list.',
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'REGISTERED',
                        'DEPRECATED',
                    ),
                ),
                'maximumPageSize' => array(
                    'description' => 'The maximum number of results returned in each page. The default is 100, but the caller can override this value to a page size smaller than the default. You cannot specify a page size greater than 100. Note that the number of domains may be less than the maxiumum page size, in which case, the returned page will have fewer results than the maximumPageSize specified.',
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'description' => 'When set to true, returns the results in reverse order. By default the results are returned in ascending alphabetical order of the name of the domains.',
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'ListOpenWorkflowExecutions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionInfos',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns a list of open workflow executions in the specified domain that meet the filtering criteria. The results may be split into multiple pages. To retrieve subsequent pages, make the call again using the nextPageToken returned by the initial call.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListOpenWorkflowExecutions',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain that contains the workflow executions to list.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'startTimeFilter' => array(
                    'required' => true,
                    'description' => 'Workflow executions are included in the returned results based on whether their start times are within the range specified by this filter.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                        ),
                    ),
                ),
                'typeFilter' => array(
                    'description' => 'If specified, only executions of the type specified in the filter are returned.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'type' => 'string',
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'tagFilter' => array(
                    'description' => 'If specified, only executions that have the matching tag are listed.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'tag' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'description' => 'If on a previous call to this method a NextPageToken was returned, the results are being paginated. To get the next page of results, repeat the call with the returned token and all other arguments unchanged.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'description' => 'The maximum number of results returned in each page. The default is 100, but the caller can override this value to a page size smaller than the default. You cannot specify a page size greater than 100. Note that the number of executions may be less than the maxiumum page size, in which case, the returned page will have fewer results than the maximumPageSize specified.',
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'description' => 'When set to true, returns the results in reverse order. By default the results are returned in descending order of the start time of the executions.',
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'executionFilter' => array(
                    'description' => 'If specified, only workflow executions matching the workflow id specified in the filter are returned.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'ListWorkflowTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowTypeInfos',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns information about workflow types in the specified domain. The results may be split into multiple pages that can be retrieved by making the call repeatedly.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListWorkflowTypes',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain in which the workflow types have been registered.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'name' => array(
                    'description' => 'If specified, lists the workflow type with this name.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'registrationStatus' => array(
                    'required' => true,
                    'description' => 'Specifies the registration status of the workflow types to list.',
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'REGISTERED',
                        'DEPRECATED',
                    ),
                ),
                'nextPageToken' => array(
                    'description' => 'If on a previous call to this method a NextPageToken was returned, the results are being paginated. To get the next page of results, repeat the call with the returned token and all other arguments unchanged.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'description' => 'The maximum number of results returned in each page. The default is 100, but the caller can override this value to a page size smaller than the default. You cannot specify a page size greater than 100. Note that the number of types may be less than the maxiumum page size, in which case, the returned page will have fewer results than the maximumPageSize specified.',
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'description' => 'When set to true, returns the results in reverse order. By default the results are returned in ascending alphabetical order of the name of the workflow types.',
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'class' => 'UnknownResourceException',
                ),
            ),
        ),
        'PollForActivityTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ActivityTask',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Used by workers to get an ActivityTask from the specified activity taskList. This initiates a long poll, where the service holds the HTTP connection open and responds as soon as a task becomes available. The maximum time the service holds on to the request before responding is 60 seconds. If no task is available within 60 seconds, the poll will return an empty result. An empty result, in this context, means that an ActivityTask is returned, but that the value of taskToken is an empty string. If a task is returned, the worker should use its type to identify and process it correctly.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.PollForActivityTask',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain that contains the task lists being polled.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'taskList' => array(
                    'required' => true,
                    'description' => 'Specifies the task list to poll for activity tasks.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'identity' => array(
                    'description' => 'Identity of the worker making the request, which is recorded in the ActivityTaskStarted event in the workflow history. This enables diagnostic tracing when problems arise. The form of this identity is user defined.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'PollForDecisionTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DecisionTask',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Used by deciders to get a DecisionTask from the specified decision taskList. A decision task may be returned for any open workflow execution that is using the specified task list. The task includes a paginated view of the history of the workflow execution. The decider should use the workflow type and the history to determine how to properly handle the task.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.PollForDecisionTask',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain containing the task lists to poll.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'taskList' => array(
                    'required' => true,
                    'description' => 'Specifies the task list to poll for decision tasks.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'identity' => array(
                    'description' => 'Identity of the decider making the request, which is recorded in the DecisionTaskStarted event in the workflow history. This enables diagnostic tracing when problems arise. The form of this identity is user defined.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'nextPageToken' => array(
                    'description' => 'If on a previous call to this method a NextPageToken was returned, the results are being paginated. To get the next page of results, repeat the call with the returned token and all other arguments unchanged.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'description' => 'The maximum number of history events returned in each page. The default is 100, but the caller can override this value to a page size smaller than the default. You cannot specify a page size greater than 100. Note that the number of events may be less than the maxiumum page size, in which case, the returned page will have fewer results than the maximumPageSize specified.',
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'description' => 'When set to true, returns the events in reverse order. By default the results are returned in ascending order of the eventTimestamp of the events.',
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'RecordActivityTaskHeartbeat' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ActivityTaskStatus',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Used by activity workers to report to the service that the ActivityTask represented by the specified taskToken is still making progress. The worker can also (optionally) specify details of the progress, for example percent complete, using the details parameter. This action can also be used by the worker as a mechanism to check if cancellation is being requested for the activity task. If a cancellation is being attempted for the specified task, then the boolean cancelRequested flag returned by the service is set to true.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RecordActivityTaskHeartbeat',
                ),
                'taskToken' => array(
                    'required' => true,
                    'description' => 'The taskToken of the ActivityTask.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'details' => array(
                    'description' => 'If specified, contains details about the progress of the task.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RegisterActivityType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Registers a new activity type along with its configuration settings in the specified domain.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RegisterActivityType',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain in which this activity is to be registered.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'name' => array(
                    'required' => true,
                    'description' => 'The name of the activity type within the domain.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'version' => array(
                    'required' => true,
                    'description' => 'The version of the activity type.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'description' => array(
                    'description' => 'A textual description of the activity type.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'defaultTaskStartToCloseTimeout' => array(
                    'description' => 'If set, specifies the default maximum duration that a worker can take to process tasks of this activity type. This default can be overridden when scheduling an activity task using the ScheduleActivityTask Decision.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultTaskHeartbeatTimeout' => array(
                    'description' => 'If set, specifies the default maximum time before which a worker processing a task of this type must report progress by calling RecordActivityTaskHeartbeat. If the timeout is exceeded, the activity task is automatically timed out. This default can be overridden when scheduling an activity task using the ScheduleActivityTask Decision. If the activity worker subsequently attempts to record a heartbeat or returns a result, the activity worker receives an UnknownResource fault. In this case, Amazon SWF no longer considers the activity task to be valid; the activity worker should clean up the activity task.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultTaskList' => array(
                    'description' => 'If set, specifies the default task list to use for scheduling tasks of this activity type. This default task list is used if a task list is not provided when a task is scheduled through the ScheduleActivityTask Decision.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'defaultTaskScheduleToStartTimeout' => array(
                    'description' => 'If set, specifies the default maximum duration that a task of this activity type can wait before being assigned to a worker. This default can be overridden when scheduling an activity task using the ScheduleActivityTask Decision.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultTaskScheduleToCloseTimeout' => array(
                    'description' => 'If set, specifies the default maximum duration for a task of this activity type. This default can be overridden when scheduling an activity task using the ScheduleActivityTask Decision.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'TypeAlreadyExistsException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RegisterDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Registers a new domain.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RegisterDomain',
                ),
                'name' => array(
                    'required' => true,
                    'description' => 'Name of the domain to register. The name must be unique.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'description' => array(
                    'description' => 'Textual description of the domain.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'workflowExecutionRetentionPeriodInDays' => array(
                    'required' => true,
                    'description' => 'Specifies the duration--in days--for which the record (including the history) of workflow executions in this domain should be kept by the service. After the retention period, the workflow execution will not be available in the results of visibility calls. If a duration of NONE is specified, the records for workflow executions in this domain are not retained at all.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 8,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'DomainAlreadyExistsException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RegisterWorkflowType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Registers a new workflow type and its configuration settings in the specified domain.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RegisterWorkflowType',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain in which to register the workflow type.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'name' => array(
                    'required' => true,
                    'description' => 'The name of the workflow type.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'version' => array(
                    'required' => true,
                    'description' => 'The version of the workflow type.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'description' => array(
                    'description' => 'Textual description of the workflow type.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'defaultTaskStartToCloseTimeout' => array(
                    'description' => 'If set, specifies the default maximum duration of decision tasks for this workflow type. This default can be overridden when starting a workflow execution using the StartWorkflowExecution action or the StartChildWorkflowExecution Decision.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultExecutionStartToCloseTimeout' => array(
                    'description' => 'If set, specifies the default maximum duration for executions of this workflow type. You can override this default when starting an execution through the StartWorkflowExecution Action or StartChildWorkflowExecution Decision.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultTaskList' => array(
                    'description' => 'If set, specifies the default task list to use for scheduling decision tasks for executions of this workflow type. This default is used only if a task list is not provided when starting the execution through the StartWorkflowExecution Action or StartChildWorkflowExecution Decision.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'defaultChildPolicy' => array(
                    'description' => 'If set, specifies the default policy to use for the child workflow executions when a workflow execution of this type is terminated, by calling the TerminateWorkflowExecution action explicitly or due to an expired timeout. This default can be overridden when starting a workflow execution using the StartWorkflowExecution action or the StartChildWorkflowExecution Decision. The supported child policies are:',
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'TERMINATE',
                        'REQUEST_CANCEL',
                        'ABANDON',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'TypeAlreadyExistsException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RequestCancelWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Records a WorkflowExecutionCancelRequested event in the currently running workflow execution identified by the given domain, workflowId, and runId. This logically requests the cancellation of the workflow execution as a whole. It is up to the decider to take appropriate actions when it receives an execution history with this event.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RequestCancelWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain containing the workflow execution to cancel.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowId' => array(
                    'required' => true,
                    'description' => 'The workflowId of the workflow execution to cancel.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'runId' => array(
                    'description' => 'The runId of the workflow execution to cancel.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RespondActivityTaskCanceled' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Used by workers to tell the service that the ActivityTask identified by the taskToken was successfully canceled. Additional details can be optionally provided using the details argument.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RespondActivityTaskCanceled',
                ),
                'taskToken' => array(
                    'required' => true,
                    'description' => 'The taskToken of the ActivityTask.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'details' => array(
                    'description' => 'Optional information about the cancellation.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RespondActivityTaskCompleted' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Used by workers to tell the service that the ActivityTask identified by the taskToken completed successfully with a result (if provided). The result appears in the ActivityTaskCompleted event in the workflow history.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RespondActivityTaskCompleted',
                ),
                'taskToken' => array(
                    'required' => true,
                    'description' => 'The taskToken of the ActivityTask.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'result' => array(
                    'description' => 'The result of the activity task. It is a free form string that is implementation specific.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RespondActivityTaskFailed' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Used by workers to tell the service that the ActivityTask identified by the taskToken has failed with reason (if specified). The reason and details appear in the ActivityTaskFailed event added to the workflow history.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RespondActivityTaskFailed',
                ),
                'taskToken' => array(
                    'required' => true,
                    'description' => 'The taskToken of the ActivityTask.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'reason' => array(
                    'description' => 'Description of the error that may assist in diagnostics.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'details' => array(
                    'description' => 'Optional detailed information about the failure.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RespondDecisionTaskCompleted' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Used by deciders to tell the service that the DecisionTask identified by the taskToken has successfully completed. The decisions argument specifies the list of decisions made while processing the task.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RespondDecisionTaskCompleted',
                ),
                'taskToken' => array(
                    'required' => true,
                    'description' => 'The taskToken from the DecisionTask.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'decisions' => array(
                    'description' => 'The list of decisions (possibly empty) made by the decider while processing this decision task. See the docs for the Decision structure for details.',
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Decision',
                        'type' => 'object',
                        'properties' => array(
                            'decisionType' => array(
                                'required' => true,
                                'type' => 'string',
                                'enum' => array(
                                    'ScheduleActivityTask',
                                    'RequestCancelActivityTask',
                                    'CompleteWorkflowExecution',
                                    'FailWorkflowExecution',
                                    'CancelWorkflowExecution',
                                    'ContinueAsNewWorkflowExecution',
                                    'RecordMarker',
                                    'StartTimer',
                                    'CancelTimer',
                                    'SignalExternalWorkflowExecution',
                                    'RequestCancelExternalWorkflowExecution',
                                    'StartChildWorkflowExecution',
                                ),
                            ),
                            'scheduleActivityTaskDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                            'version' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 64,
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'scheduleToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                        ),
                                    ),
                                    'scheduleToStartTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'heartbeatTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                ),
                            ),
                            'requestCancelActivityTaskDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                ),
                            ),
                            'completeWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'failWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                        'maxLength' => 256,
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'cancelWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'continueAsNewWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                        ),
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                        'enum' => array(
                                            'TERMINATE',
                                            'REQUEST_CANCEL',
                                            'ABANDON',
                                        ),
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'maxItems' => 5,
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 256,
                                        ),
                                    ),
                                    'workflowTypeVersion' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 64,
                                    ),
                                ),
                            ),
                            'recordMarkerDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'startTimerDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'startToFireTimeout' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 8,
                                    ),
                                ),
                            ),
                            'cancelTimerDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                        'maxLength' => 64,
                                    ),
                                    'signalName' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                        'maxLength' => 64,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowType' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                            'version' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 64,
                                            ),
                                        ),
                                    ),
                                    'workflowId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                        ),
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                        'enum' => array(
                                            'TERMINATE',
                                            'REQUEST_CANCEL',
                                            'ABANDON',
                                        ),
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'maxItems' => 5,
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 256,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'executionContext' => array(
                    'description' => 'User defined context to add to workflow execution.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'SignalWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Records a WorkflowExecutionSignaled event in the workflow execution history and creates a decision task for the workflow execution identified by the given domain, workflowId and runId. The event is recorded with the specified user defined signalName and input (if provided).',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.SignalWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain containing the workflow execution to signal.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowId' => array(
                    'required' => true,
                    'description' => 'The workflowId of the workflow execution to signal.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'runId' => array(
                    'description' => 'The runId of the workflow execution to signal.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 64,
                ),
                'signalName' => array(
                    'required' => true,
                    'description' => 'The name of the signal. This name must be meaningful to the target workflow.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'input' => array(
                    'description' => 'Data to attach to the WorkflowExecutionSignaled event in the target workflow execution\'s history.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'StartWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'Run',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Starts an execution of the workflow type in the specified domain using the provided workflowId and input data.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.StartWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The name of the domain in which the workflow execution is created.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowId' => array(
                    'required' => true,
                    'description' => 'The user defined identifier associated with the workflow execution. You can use this to associate a custom identifier with the workflow execution. You may specify the same identifier if a workflow execution is logically a restart of a previous execution. You cannot have two open workflow executions with the same workflowId at the same time.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowType' => array(
                    'required' => true,
                    'description' => 'The type of the workflow to start.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'taskList' => array(
                    'description' => 'The task list to use for the decision tasks generated for this workflow execution. This overrides the defaultTaskList specified when registering the workflow type.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'input' => array(
                    'description' => 'The input for the workflow execution. This is a free form string which should be meaningful to the workflow you are starting. This input is made available to the new workflow execution in the WorkflowExecutionStarted history event.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
                'executionStartToCloseTimeout' => array(
                    'description' => 'The total duration for this workflow execution. This overrides the defaultExecutionStartToCloseTimeout specified when registering the workflow type.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'tagList' => array(
                    'description' => 'The list of tags to associate with the workflow execution. You can specify a maximum of 5 tags. You can list workflow executions with a specific tag by calling ListOpenWorkflowExecutions or ListClosedWorkflowExecutions and specifying a TagFilter.',
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 5,
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 256,
                    ),
                ),
                'taskStartToCloseTimeout' => array(
                    'description' => 'Specifies the maximum duration of decision tasks for this workflow execution. This parameter overrides the defaultTaskStartToCloseTimout specified when registering the workflow type using RegisterWorkflowType.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'childPolicy' => array(
                    'description' => 'If set, specifies the policy to use for the child workflow executions of this workflow execution if it is terminated, by calling the TerminateWorkflowExecution action explicitly or due to an expired timeout. This policy overrides the default child policy specified when registering the workflow type using RegisterWorkflowType. The supported child policies are:',
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'TERMINATE',
                        'REQUEST_CANCEL',
                        'ABANDON',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'TypeDeprecatedException',
                ),
                array(
                    'class' => 'WorkflowExecutionAlreadyStartedException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'class' => 'DefaultUndefinedException',
                ),
            ),
        ),
        'TerminateWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Records a WorkflowExecutionTerminated event and forces closure of the workflow execution identified by the given domain, runId, and workflowId. The child policy, registered with the workflow type or specified when starting this execution, is applied to any open child workflow executions of this workflow execution.',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.TerminateWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'description' => 'The domain of the workflow execution to terminate.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowId' => array(
                    'required' => true,
                    'description' => 'The workflowId of the workflow execution to terminate.',
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'runId' => array(
                    'description' => 'The runId of the workflow execution to terminate.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 64,
                ),
                'reason' => array(
                    'description' => 'An optional descriptive reason for terminating the workflow execution.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'details' => array(
                    'description' => 'Optional details for terminating the workflow execution.',
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
                'childPolicy' => array(
                    'description' => 'If set, specifies the policy to use for the child workflow executions of the workflow execution being terminated. This policy overrides the child policy specified for the workflow execution at registration time or when starting the execution. The supported child policies are:',
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'TERMINATE',
                        'REQUEST_CANCEL',
                        'ABANDON',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
    ),
    'models' => array(
        'WorkflowExecutionCount' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'count' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'truncated' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'PendingTaskCount' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'count' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'truncated' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'ActivityTypeDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'typeInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'activityType' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'description' => array(
                            'type' => 'string',
                        ),
                        'creationDate' => array(
                            'type' => 'string',
                        ),
                        'deprecationDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'configuration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'defaultTaskStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultTaskHeartbeatTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultTaskList' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'defaultTaskScheduleToStartTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultTaskScheduleToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DomainDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'domainInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'description' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'configuration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowExecutionRetentionPeriodInDays' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'WorkflowExecutionDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'executionInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'execution' => array(
                            'type' => 'object',
                            'properties' => array(
                                'workflowId' => array(
                                    'type' => 'string',
                                ),
                                'runId' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'workflowType' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'startTimestamp' => array(
                            'type' => 'string',
                        ),
                        'closeTimestamp' => array(
                            'type' => 'string',
                        ),
                        'executionStatus' => array(
                            'type' => 'string',
                        ),
                        'closeStatus' => array(
                            'type' => 'string',
                        ),
                        'parent' => array(
                            'type' => 'object',
                            'properties' => array(
                                'workflowId' => array(
                                    'type' => 'string',
                                ),
                                'runId' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'tagList' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Tag',
                                'type' => 'string',
                            ),
                        ),
                        'cancelRequested' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
                'executionConfiguration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'taskStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'executionStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'taskList' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'childPolicy' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'openCounts' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'openActivityTasks' => array(
                            'type' => 'numeric',
                        ),
                        'openDecisionTasks' => array(
                            'type' => 'numeric',
                        ),
                        'openTimers' => array(
                            'type' => 'numeric',
                        ),
                        'openChildWorkflowExecutions' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'latestActivityTaskTimestamp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'latestExecutionContext' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'WorkflowTypeDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'typeInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowType' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'description' => array(
                            'type' => 'string',
                        ),
                        'creationDate' => array(
                            'type' => 'string',
                        ),
                        'deprecationDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'configuration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'defaultTaskStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultExecutionStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultTaskList' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'defaultChildPolicy' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'History' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'events' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HistoryEvent',
                        'type' => 'object',
                        'properties' => array(
                            'eventTimestamp' => array(
                                'type' => 'string',
                            ),
                            'eventType' => array(
                                'type' => 'string',
                            ),
                            'eventId' => array(
                                'type' => 'numeric',
                            ),
                            'workflowExecutionStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'continuedExecutionRunId' => array(
                                        'type' => 'string',
                                    ),
                                    'parentWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'parentInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'completeWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'failWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'cancelWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionContinuedAsNewEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'newExecutionRunId' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'continueAsNewWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionTerminatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'externalWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'externalInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'decisionTaskScheduledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'decisionTaskStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'identity' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'decisionTaskCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'executionContext' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'decisionTaskTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskScheduledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduleToStartTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduleToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'heartbeatTimeout' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'activityTaskStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'identity' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'activityTaskCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'latestCancelRequestedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionSignaledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'signalName' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'externalWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'externalInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'markerRecordedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'recordMarkerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'startToFireTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerFiredEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionTerminatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'signalName' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'externalWorkflowExecutionSignaledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'externalWorkflowExecutionCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'scheduleActivityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'requestCancelActivityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startTimerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'cancelTimerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ActivityTypeInfos' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'typeInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ActivityTypeInfo',
                        'type' => 'object',
                        'properties' => array(
                            'activityType' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'version' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                            'creationDate' => array(
                                'type' => 'string',
                            ),
                            'deprecationDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'WorkflowExecutionInfos' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'executionInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'WorkflowExecutionInfo',
                        'type' => 'object',
                        'properties' => array(
                            'execution' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowType' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'version' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'startTimestamp' => array(
                                'type' => 'string',
                            ),
                            'closeTimestamp' => array(
                                'type' => 'string',
                            ),
                            'executionStatus' => array(
                                'type' => 'string',
                            ),
                            'closeStatus' => array(
                                'type' => 'string',
                            ),
                            'parent' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'tagList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Tag',
                                    'type' => 'string',
                                ),
                            ),
                            'cancelRequested' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DomainInfos' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'domainInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DomainInfo',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'WorkflowTypeInfos' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'typeInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'WorkflowTypeInfo',
                        'type' => 'object',
                        'properties' => array(
                            'workflowType' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'version' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                            'creationDate' => array(
                                'type' => 'string',
                            ),
                            'deprecationDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ActivityTask' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'activityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'startedEventId' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'workflowExecution' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'type' => 'string',
                        ),
                        'runId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'activityType' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                        ),
                        'version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'input' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DecisionTask' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'startedEventId' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'workflowExecution' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'type' => 'string',
                        ),
                        'runId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'workflowType' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                        ),
                        'version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'events' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HistoryEvent',
                        'type' => 'object',
                        'properties' => array(
                            'eventTimestamp' => array(
                                'type' => 'string',
                            ),
                            'eventType' => array(
                                'type' => 'string',
                            ),
                            'eventId' => array(
                                'type' => 'numeric',
                            ),
                            'workflowExecutionStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'continuedExecutionRunId' => array(
                                        'type' => 'string',
                                    ),
                                    'parentWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'parentInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'completeWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'failWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'cancelWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionContinuedAsNewEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'newExecutionRunId' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'continueAsNewWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionTerminatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'externalWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'externalInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'decisionTaskScheduledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'decisionTaskStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'identity' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'decisionTaskCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'executionContext' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'decisionTaskTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskScheduledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduleToStartTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduleToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'heartbeatTimeout' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'activityTaskStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'identity' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'activityTaskCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'latestCancelRequestedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionSignaledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'signalName' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'externalWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'externalInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'markerRecordedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'recordMarkerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'startToFireTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerFiredEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionTerminatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'signalName' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'externalWorkflowExecutionSignaledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'externalWorkflowExecutionCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'scheduleActivityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'requestCancelActivityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startTimerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'cancelTimerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'previousStartedEventId' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
        ),
        'ActivityTaskStatus' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'cancelRequested' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'Run' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'runId' => array(
                    'description' => 'The runId of a workflow execution. This Id is generated by the service and can be used to uniquely identify the workflow execution within a domain.',
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'operations' => array(
            'GetWorkflowExecutionHistory' => array(
                'token_param' => 'nextPageToken',
                'token_key' => 'nextPageToken',
                'limit_key' => 'maximumPageSize',
                'result_key' => 'events',
            ),
            'ListActivityTypes' => array(
                'token_param' => 'nextPageToken',
                'token_key' => 'nextPageToken',
                'limit_key' => 'maximumPageSize',
                'result_key' => 'typeInfos',
            ),
            'ListClosedWorkflowExecutions' => array(
                'token_param' => 'nextPageToken',
                'token_key' => 'nextPageToken',
                'limit_key' => 'maximumPageSize',
                'result_key' => 'executionInfos',
            ),
            'ListDomains' => array(
                'token_param' => 'nextPageToken',
                'token_key' => 'nextPageToken',
                'limit_key' => 'maximumPageSize',
                'result_key' => 'domainInfos',
            ),
            'ListOpenWorkflowExecutions' => array(
                'token_param' => 'nextPageToken',
                'token_key' => 'nextPageToken',
                'limit_key' => 'maximumPageSize',
                'result_key' => 'executionInfos',
            ),
            'ListWorkflowTypes' => array(
                'token_param' => 'nextPageToken',
                'token_key' => 'nextPageToken',
                'limit_key' => 'maximumPageSize',
                'result_key' => 'typeInfos',
            ),
            'PollForDecisionTask' => array(
                'token_param' => 'nextPageToken',
                'token_key' => 'nextPageToken',
                'limit_key' => 'maximumPageSize',
                'result_key' => 'events',
            ),
        ),
    ),
);
