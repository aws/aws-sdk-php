<?php
namespace Aws\Swf;

use Aws\AwsClient;

/**
 * Amazon Simple Workflow Service (Amazon SWF) client.
 *
 * @method \Aws\Result countClosedWorkflowExecutions(array $args = [])
 * @phpstan-method \Aws\Result countClosedWorkflowExecutions(array{
 *     domain?: string,
 *     startTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     closeTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     executionFilter?: array{workflowId?: string, ...},
 *     typeFilter?: array{name?: string, version?: string, ...},
 *     tagFilter?: array{tag?: string, ...},
 *     closeStatusFilter?: array{status?: 'CANCELED'|'COMPLETED'|'CONTINUED_AS_NEW'|'FAILED'|'TERMINATED'|'TIMED_OUT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise countClosedWorkflowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise countClosedWorkflowExecutionsAsync(array{
 *     domain?: string,
 *     startTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     closeTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     executionFilter?: array{workflowId?: string, ...},
 *     typeFilter?: array{name?: string, version?: string, ...},
 *     tagFilter?: array{tag?: string, ...},
 *     closeStatusFilter?: array{status?: 'CANCELED'|'COMPLETED'|'CONTINUED_AS_NEW'|'FAILED'|'TERMINATED'|'TIMED_OUT', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result countOpenWorkflowExecutions(array $args = [])
 * @phpstan-method \Aws\Result countOpenWorkflowExecutions(array{
 *     domain?: string,
 *     startTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     typeFilter?: array{name?: string, version?: string, ...},
 *     tagFilter?: array{tag?: string, ...},
 *     executionFilter?: array{workflowId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise countOpenWorkflowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise countOpenWorkflowExecutionsAsync(array{
 *     domain?: string,
 *     startTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     typeFilter?: array{name?: string, version?: string, ...},
 *     tagFilter?: array{tag?: string, ...},
 *     executionFilter?: array{workflowId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result countPendingActivityTasks(array $args = [])
 * @phpstan-method \Aws\Result countPendingActivityTasks(array{domain?: string, taskList?: array{name?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise countPendingActivityTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise countPendingActivityTasksAsync(array{domain?: string, taskList?: array{name?: string, ...}, ...} $args = [])
 * @method \Aws\Result countPendingDecisionTasks(array $args = [])
 * @phpstan-method \Aws\Result countPendingDecisionTasks(array{domain?: string, taskList?: array{name?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise countPendingDecisionTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise countPendingDecisionTasksAsync(array{domain?: string, taskList?: array{name?: string, ...}, ...} $args = [])
 * @method \Aws\Result deleteActivityType(array $args = [])
 * @phpstan-method \Aws\Result deleteActivityType(array{domain?: string, activityType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteActivityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteActivityTypeAsync(array{domain?: string, activityType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \Aws\Result deleteWorkflowType(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflowType(array{domain?: string, workflowType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowTypeAsync(array{domain?: string, workflowType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \Aws\Result deprecateActivityType(array $args = [])
 * @phpstan-method \Aws\Result deprecateActivityType(array{domain?: string, activityType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deprecateActivityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deprecateActivityTypeAsync(array{domain?: string, activityType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \Aws\Result deprecateDomain(array $args = [])
 * @phpstan-method \Aws\Result deprecateDomain(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deprecateDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deprecateDomainAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deprecateWorkflowType(array $args = [])
 * @phpstan-method \Aws\Result deprecateWorkflowType(array{domain?: string, workflowType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deprecateWorkflowTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deprecateWorkflowTypeAsync(array{domain?: string, workflowType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \Aws\Result describeActivityType(array $args = [])
 * @phpstan-method \Aws\Result describeActivityType(array{domain?: string, activityType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActivityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActivityTypeAsync(array{domain?: string, activityType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \Aws\Result describeDomain(array $args = [])
 * @phpstan-method \Aws\Result describeDomain(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result describeWorkflowExecution(array $args = [])
 * @phpstan-method \Aws\Result describeWorkflowExecution(array{domain?: string, execution?: array{workflowId?: string, runId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkflowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkflowExecutionAsync(array{domain?: string, execution?: array{workflowId?: string, runId?: string, ...}, ...} $args = [])
 * @method \Aws\Result describeWorkflowType(array $args = [])
 * @phpstan-method \Aws\Result describeWorkflowType(array{domain?: string, workflowType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkflowTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkflowTypeAsync(array{domain?: string, workflowType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \Aws\Result getWorkflowExecutionHistory(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowExecutionHistory(array{
 *     domain?: string,
 *     execution?: array{workflowId?: string, runId?: string, ...},
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowExecutionHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowExecutionHistoryAsync(array{
 *     domain?: string,
 *     execution?: array{workflowId?: string, runId?: string, ...},
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listActivityTypes(array $args = [])
 * @phpstan-method \Aws\Result listActivityTypes(array{
 *     domain?: string,
 *     name?: string,
 *     registrationStatus?: 'DEPRECATED'|'REGISTERED',
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listActivityTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActivityTypesAsync(array{
 *     domain?: string,
 *     name?: string,
 *     registrationStatus?: 'DEPRECATED'|'REGISTERED',
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listClosedWorkflowExecutions(array $args = [])
 * @phpstan-method \Aws\Result listClosedWorkflowExecutions(array{
 *     domain?: string,
 *     startTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     closeTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     executionFilter?: array{workflowId?: string, ...},
 *     closeStatusFilter?: array{status?: 'CANCELED'|'COMPLETED'|'CONTINUED_AS_NEW'|'FAILED'|'TERMINATED'|'TIMED_OUT', ...},
 *     typeFilter?: array{name?: string, version?: string, ...},
 *     tagFilter?: array{tag?: string, ...},
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listClosedWorkflowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClosedWorkflowExecutionsAsync(array{
 *     domain?: string,
 *     startTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     closeTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     executionFilter?: array{workflowId?: string, ...},
 *     closeStatusFilter?: array{status?: 'CANCELED'|'COMPLETED'|'CONTINUED_AS_NEW'|'FAILED'|'TERMINATED'|'TIMED_OUT', ...},
 *     typeFilter?: array{name?: string, version?: string, ...},
 *     tagFilter?: array{tag?: string, ...},
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{
 *     nextPageToken?: string,
 *     registrationStatus?: 'DEPRECATED'|'REGISTERED',
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{
 *     nextPageToken?: string,
 *     registrationStatus?: 'DEPRECATED'|'REGISTERED',
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOpenWorkflowExecutions(array $args = [])
 * @phpstan-method \Aws\Result listOpenWorkflowExecutions(array{
 *     domain?: string,
 *     startTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     typeFilter?: array{name?: string, version?: string, ...},
 *     tagFilter?: array{tag?: string, ...},
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     executionFilter?: array{workflowId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpenWorkflowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOpenWorkflowExecutionsAsync(array{
 *     domain?: string,
 *     startTimeFilter?: array{oldestDate?: int|string|\DateTimeInterface, latestDate?: int|string|\DateTimeInterface, ...},
 *     typeFilter?: array{name?: string, version?: string, ...},
 *     tagFilter?: array{tag?: string, ...},
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     executionFilter?: array{workflowId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listWorkflowTypes(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowTypes(array{
 *     domain?: string,
 *     name?: string,
 *     registrationStatus?: 'DEPRECATED'|'REGISTERED',
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowTypesAsync(array{
 *     domain?: string,
 *     name?: string,
 *     registrationStatus?: 'DEPRECATED'|'REGISTERED',
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result pollForActivityTask(array $args = [])
 * @phpstan-method \Aws\Result pollForActivityTask(array{domain?: string, taskList?: array{name?: string, ...}, identity?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise pollForActivityTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pollForActivityTaskAsync(array{domain?: string, taskList?: array{name?: string, ...}, identity?: string, ...} $args = [])
 * @method \Aws\Result pollForDecisionTask(array $args = [])
 * @phpstan-method \Aws\Result pollForDecisionTask(array{
 *     domain?: string,
 *     taskList?: array{name?: string, ...},
 *     identity?: string,
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     startAtPreviousStartedEvent?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise pollForDecisionTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pollForDecisionTaskAsync(array{
 *     domain?: string,
 *     taskList?: array{name?: string, ...},
 *     identity?: string,
 *     nextPageToken?: string,
 *     maximumPageSize?: int,
 *     reverseOrder?: bool,
 *     startAtPreviousStartedEvent?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result recordActivityTaskHeartbeat(array $args = [])
 * @phpstan-method \Aws\Result recordActivityTaskHeartbeat(array{taskToken?: string, details?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise recordActivityTaskHeartbeatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise recordActivityTaskHeartbeatAsync(array{taskToken?: string, details?: string, ...} $args = [])
 * @method \Aws\Result registerActivityType(array $args = [])
 * @phpstan-method \Aws\Result registerActivityType(array{
 *     domain?: string,
 *     name?: string,
 *     version?: string,
 *     description?: string,
 *     defaultTaskStartToCloseTimeout?: string,
 *     defaultTaskHeartbeatTimeout?: string,
 *     defaultTaskList?: array{name?: string, ...},
 *     defaultTaskPriority?: string,
 *     defaultTaskScheduleToStartTimeout?: string,
 *     defaultTaskScheduleToCloseTimeout?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerActivityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerActivityTypeAsync(array{
 *     domain?: string,
 *     name?: string,
 *     version?: string,
 *     description?: string,
 *     defaultTaskStartToCloseTimeout?: string,
 *     defaultTaskHeartbeatTimeout?: string,
 *     defaultTaskList?: array{name?: string, ...},
 *     defaultTaskPriority?: string,
 *     defaultTaskScheduleToStartTimeout?: string,
 *     defaultTaskScheduleToCloseTimeout?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerDomain(array $args = [])
 * @phpstan-method \Aws\Result registerDomain(array{
 *     name?: string,
 *     description?: string,
 *     workflowExecutionRetentionPeriodInDays?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerDomainAsync(array{
 *     name?: string,
 *     description?: string,
 *     workflowExecutionRetentionPeriodInDays?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerWorkflowType(array $args = [])
 * @phpstan-method \Aws\Result registerWorkflowType(array{
 *     domain?: string,
 *     name?: string,
 *     version?: string,
 *     description?: string,
 *     defaultTaskStartToCloseTimeout?: string,
 *     defaultExecutionStartToCloseTimeout?: string,
 *     defaultTaskList?: array{name?: string, ...},
 *     defaultTaskPriority?: string,
 *     defaultChildPolicy?: 'ABANDON'|'REQUEST_CANCEL'|'TERMINATE',
 *     defaultLambdaRole?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerWorkflowTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerWorkflowTypeAsync(array{
 *     domain?: string,
 *     name?: string,
 *     version?: string,
 *     description?: string,
 *     defaultTaskStartToCloseTimeout?: string,
 *     defaultExecutionStartToCloseTimeout?: string,
 *     defaultTaskList?: array{name?: string, ...},
 *     defaultTaskPriority?: string,
 *     defaultChildPolicy?: 'ABANDON'|'REQUEST_CANCEL'|'TERMINATE',
 *     defaultLambdaRole?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result requestCancelWorkflowExecution(array $args = [])
 * @phpstan-method \Aws\Result requestCancelWorkflowExecution(array{domain?: string, workflowId?: string, runId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise requestCancelWorkflowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise requestCancelWorkflowExecutionAsync(array{domain?: string, workflowId?: string, runId?: string, ...} $args = [])
 * @method \Aws\Result respondActivityTaskCanceled(array $args = [])
 * @phpstan-method \Aws\Result respondActivityTaskCanceled(array{taskToken?: string, details?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise respondActivityTaskCanceledAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise respondActivityTaskCanceledAsync(array{taskToken?: string, details?: string, ...} $args = [])
 * @method \Aws\Result respondActivityTaskCompleted(array $args = [])
 * @phpstan-method \Aws\Result respondActivityTaskCompleted(array{taskToken?: string, result?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise respondActivityTaskCompletedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise respondActivityTaskCompletedAsync(array{taskToken?: string, result?: string, ...} $args = [])
 * @method \Aws\Result respondActivityTaskFailed(array $args = [])
 * @phpstan-method \Aws\Result respondActivityTaskFailed(array{taskToken?: string, reason?: string, details?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise respondActivityTaskFailedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise respondActivityTaskFailedAsync(array{taskToken?: string, reason?: string, details?: string, ...} $args = [])
 * @method \Aws\Result respondDecisionTaskCompleted(array $args = [])
 * @phpstan-method \Aws\Result respondDecisionTaskCompleted(array{
 *     taskToken?: string,
 *     decisions?: list<array{
 *         decisionType?: 'CancelTimer'|'CancelWorkflowExecution'|'CompleteWorkflowExecution'|'ContinueAsNewWorkflowExecution'|'FailWorkflowExecution'|'RecordMarker'|'RequestCancelActivityTask'|'RequestCancelExternalWorkflowExecution'|'ScheduleActivityTask'|'ScheduleLambdaFunction'|'SignalExternalWorkflowExecution'|'StartChildWorkflowExecution'|'StartTimer',
 *         scheduleActivityTaskDecisionAttributes?: array,
 *         requestCancelActivityTaskDecisionAttributes?: array,
 *         completeWorkflowExecutionDecisionAttributes?: array,
 *         failWorkflowExecutionDecisionAttributes?: array,
 *         cancelWorkflowExecutionDecisionAttributes?: array,
 *         continueAsNewWorkflowExecutionDecisionAttributes?: array,
 *         recordMarkerDecisionAttributes?: array,
 *         startTimerDecisionAttributes?: array,
 *         cancelTimerDecisionAttributes?: array,
 *         signalExternalWorkflowExecutionDecisionAttributes?: array,
 *         requestCancelExternalWorkflowExecutionDecisionAttributes?: array,
 *         startChildWorkflowExecutionDecisionAttributes?: array,
 *         scheduleLambdaFunctionDecisionAttributes?: array,
 *         ...,
 *     }>,
 *     executionContext?: string,
 *     taskList?: array{name?: string, ...},
 *     taskListScheduleToStartTimeout?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise respondDecisionTaskCompletedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise respondDecisionTaskCompletedAsync(array{
 *     taskToken?: string,
 *     decisions?: list<array{
 *         decisionType?: 'CancelTimer'|'CancelWorkflowExecution'|'CompleteWorkflowExecution'|'ContinueAsNewWorkflowExecution'|'FailWorkflowExecution'|'RecordMarker'|'RequestCancelActivityTask'|'RequestCancelExternalWorkflowExecution'|'ScheduleActivityTask'|'ScheduleLambdaFunction'|'SignalExternalWorkflowExecution'|'StartChildWorkflowExecution'|'StartTimer',
 *         scheduleActivityTaskDecisionAttributes?: array,
 *         requestCancelActivityTaskDecisionAttributes?: array,
 *         completeWorkflowExecutionDecisionAttributes?: array,
 *         failWorkflowExecutionDecisionAttributes?: array,
 *         cancelWorkflowExecutionDecisionAttributes?: array,
 *         continueAsNewWorkflowExecutionDecisionAttributes?: array,
 *         recordMarkerDecisionAttributes?: array,
 *         startTimerDecisionAttributes?: array,
 *         cancelTimerDecisionAttributes?: array,
 *         signalExternalWorkflowExecutionDecisionAttributes?: array,
 *         requestCancelExternalWorkflowExecutionDecisionAttributes?: array,
 *         startChildWorkflowExecutionDecisionAttributes?: array,
 *         scheduleLambdaFunctionDecisionAttributes?: array,
 *         ...,
 *     }>,
 *     executionContext?: string,
 *     taskList?: array{name?: string, ...},
 *     taskListScheduleToStartTimeout?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result signalWorkflowExecution(array $args = [])
 * @phpstan-method \Aws\Result signalWorkflowExecution(array{domain?: string, workflowId?: string, runId?: string, signalName?: string, input?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise signalWorkflowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise signalWorkflowExecutionAsync(array{domain?: string, workflowId?: string, runId?: string, signalName?: string, input?: string, ...} $args = [])
 * @method \Aws\Result startWorkflowExecution(array $args = [])
 * @phpstan-method \Aws\Result startWorkflowExecution(array{
 *     domain?: string,
 *     workflowId?: string,
 *     workflowType?: array{name?: string, version?: string, ...},
 *     taskList?: array{name?: string, ...},
 *     taskPriority?: string,
 *     input?: string,
 *     executionStartToCloseTimeout?: string,
 *     tagList?: list<string>,
 *     taskStartToCloseTimeout?: string,
 *     childPolicy?: 'ABANDON'|'REQUEST_CANCEL'|'TERMINATE',
 *     lambdaRole?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startWorkflowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWorkflowExecutionAsync(array{
 *     domain?: string,
 *     workflowId?: string,
 *     workflowType?: array{name?: string, version?: string, ...},
 *     taskList?: array{name?: string, ...},
 *     taskPriority?: string,
 *     input?: string,
 *     executionStartToCloseTimeout?: string,
 *     tagList?: list<string>,
 *     taskStartToCloseTimeout?: string,
 *     childPolicy?: 'ABANDON'|'REQUEST_CANCEL'|'TERMINATE',
 *     lambdaRole?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result terminateWorkflowExecution(array $args = [])
 * @phpstan-method \Aws\Result terminateWorkflowExecution(array{
 *     domain?: string,
 *     workflowId?: string,
 *     runId?: string,
 *     reason?: string,
 *     details?: string,
 *     childPolicy?: 'ABANDON'|'REQUEST_CANCEL'|'TERMINATE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateWorkflowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateWorkflowExecutionAsync(array{
 *     domain?: string,
 *     workflowId?: string,
 *     runId?: string,
 *     reason?: string,
 *     details?: string,
 *     childPolicy?: 'ABANDON'|'REQUEST_CANCEL'|'TERMINATE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result undeprecateActivityType(array $args = [])
 * @phpstan-method \Aws\Result undeprecateActivityType(array{domain?: string, activityType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise undeprecateActivityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise undeprecateActivityTypeAsync(array{domain?: string, activityType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \Aws\Result undeprecateDomain(array $args = [])
 * @phpstan-method \Aws\Result undeprecateDomain(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise undeprecateDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise undeprecateDomainAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result undeprecateWorkflowType(array $args = [])
 * @phpstan-method \Aws\Result undeprecateWorkflowType(array{domain?: string, workflowType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise undeprecateWorkflowTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise undeprecateWorkflowTypeAsync(array{domain?: string, workflowType?: array{name?: string, version?: string, ...}, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 */
class SwfClient extends AwsClient {}
