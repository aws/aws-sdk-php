<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2012-01-25',
    'endpointPrefix' => 'swf',
    'jsonVersion' => '1.0',
    'serviceAbbreviation' => 'Amazon SWF',
    'serviceFullName' => 'Amazon Simple Workflow Service',
    'signatureVersion' => 'v4',
    'targetPrefix' => 'SimpleWorkflowService',
    'timestampFormat' => 'unixTimestamp',
    'protocol' => 'json',
  ],
  'operations' =>
  [
    'CountClosedWorkflowExecutions' =>
    [
      'name' => 'CountClosedWorkflowExecutions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CountClosedWorkflowExecutionsInput',
      ],
      'output' =>
      [
        'shape' => 'WorkflowExecutionCount',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'CountOpenWorkflowExecutions' =>
    [
      'name' => 'CountOpenWorkflowExecutions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CountOpenWorkflowExecutionsInput',
      ],
      'output' =>
      [
        'shape' => 'WorkflowExecutionCount',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'CountPendingActivityTasks' =>
    [
      'name' => 'CountPendingActivityTasks',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CountPendingActivityTasksInput',
      ],
      'output' =>
      [
        'shape' => 'PendingTaskCount',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'CountPendingDecisionTasks' =>
    [
      'name' => 'CountPendingDecisionTasks',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CountPendingDecisionTasksInput',
      ],
      'output' =>
      [
        'shape' => 'PendingTaskCount',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'DeprecateActivityType' =>
    [
      'name' => 'DeprecateActivityType',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeprecateActivityTypeInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'TypeDeprecatedFault',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'DeprecateDomain' =>
    [
      'name' => 'DeprecateDomain',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeprecateDomainInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DomainDeprecatedFault',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'DeprecateWorkflowType' =>
    [
      'name' => 'DeprecateWorkflowType',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeprecateWorkflowTypeInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'TypeDeprecatedFault',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'DescribeActivityType' =>
    [
      'name' => 'DescribeActivityType',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeActivityTypeInput',
      ],
      'output' =>
      [
        'shape' => 'ActivityTypeDetail',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'DescribeDomain' =>
    [
      'name' => 'DescribeDomain',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDomainInput',
      ],
      'output' =>
      [
        'shape' => 'DomainDetail',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'DescribeWorkflowExecution' =>
    [
      'name' => 'DescribeWorkflowExecution',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeWorkflowExecutionInput',
      ],
      'output' =>
      [
        'shape' => 'WorkflowExecutionDetail',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'DescribeWorkflowType' =>
    [
      'name' => 'DescribeWorkflowType',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeWorkflowTypeInput',
      ],
      'output' =>
      [
        'shape' => 'WorkflowTypeDetail',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'GetWorkflowExecutionHistory' =>
    [
      'name' => 'GetWorkflowExecutionHistory',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetWorkflowExecutionHistoryInput',
      ],
      'output' =>
      [
        'shape' => 'History',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'ListActivityTypes' =>
    [
      'name' => 'ListActivityTypes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListActivityTypesInput',
      ],
      'output' =>
      [
        'shape' => 'ActivityTypeInfos',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
      ],
    ],
    'ListClosedWorkflowExecutions' =>
    [
      'name' => 'ListClosedWorkflowExecutions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListClosedWorkflowExecutionsInput',
      ],
      'output' =>
      [
        'shape' => 'WorkflowExecutionInfos',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'ListDomains' =>
    [
      'name' => 'ListDomains',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListDomainsInput',
      ],
      'output' =>
      [
        'shape' => 'DomainInfos',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'ListOpenWorkflowExecutions' =>
    [
      'name' => 'ListOpenWorkflowExecutions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListOpenWorkflowExecutionsInput',
      ],
      'output' =>
      [
        'shape' => 'WorkflowExecutionInfos',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'ListWorkflowTypes' =>
    [
      'name' => 'ListWorkflowTypes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListWorkflowTypesInput',
      ],
      'output' =>
      [
        'shape' => 'WorkflowTypeInfos',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
      ],
    ],
    'PollForActivityTask' =>
    [
      'name' => 'PollForActivityTask',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PollForActivityTaskInput',
      ],
      'output' =>
      [
        'shape' => 'ActivityTask',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededFault',
          'exception' => true,
        ],
      ],
    ],
    'PollForDecisionTask' =>
    [
      'name' => 'PollForDecisionTask',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PollForDecisionTaskInput',
      ],
      'output' =>
      [
        'shape' => 'DecisionTask',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededFault',
          'exception' => true,
        ],
      ],
    ],
    'RecordActivityTaskHeartbeat' =>
    [
      'name' => 'RecordActivityTaskHeartbeat',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RecordActivityTaskHeartbeatInput',
      ],
      'output' =>
      [
        'shape' => 'ActivityTaskStatus',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'RegisterActivityType' =>
    [
      'name' => 'RegisterActivityType',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RegisterActivityTypeInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'TypeAlreadyExistsFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededFault',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'RegisterDomain' =>
    [
      'name' => 'RegisterDomain',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RegisterDomainInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DomainAlreadyExistsFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededFault',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'RegisterWorkflowType' =>
    [
      'name' => 'RegisterWorkflowType',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RegisterWorkflowTypeInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'TypeAlreadyExistsFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededFault',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'RequestCancelWorkflowExecution' =>
    [
      'name' => 'RequestCancelWorkflowExecution',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RequestCancelWorkflowExecutionInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'RespondActivityTaskCanceled' =>
    [
      'name' => 'RespondActivityTaskCanceled',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RespondActivityTaskCanceledInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'RespondActivityTaskCompleted' =>
    [
      'name' => 'RespondActivityTaskCompleted',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RespondActivityTaskCompletedInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'RespondActivityTaskFailed' =>
    [
      'name' => 'RespondActivityTaskFailed',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RespondActivityTaskFailedInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'RespondDecisionTaskCompleted' =>
    [
      'name' => 'RespondDecisionTaskCompleted',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RespondDecisionTaskCompletedInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'SignalWorkflowExecution' =>
    [
      'name' => 'SignalWorkflowExecution',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SignalWorkflowExecutionInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
    'StartWorkflowExecution' =>
    [
      'name' => 'StartWorkflowExecution',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'StartWorkflowExecutionInput',
      ],
      'output' =>
      [
        'shape' => 'Run',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'TypeDeprecatedFault',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'WorkflowExecutionAlreadyStartedFault',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'LimitExceededFault',
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'DefaultUndefinedFault',
          'exception' => true,
        ],
      ],
    ],
    'TerminateWorkflowExecution' =>
    [
      'name' => 'TerminateWorkflowExecution',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'TerminateWorkflowExecutionInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'UnknownResourceFault',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OperationNotPermittedFault',
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'ActivityId' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'ActivityTask' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'taskToken',
        1 => 'activityId',
        2 => 'startedEventId',
        3 => 'workflowExecution',
        4 => 'activityType',
      ],
      'members' =>
      [
        'taskToken' =>
        [
          'shape' => 'TaskToken',
        ],
        'activityId' =>
        [
          'shape' => 'ActivityId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'activityType' =>
        [
          'shape' => 'ActivityType',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'ActivityTaskCancelRequestedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'decisionTaskCompletedEventId',
        1 => 'activityId',
      ],
      'members' =>
      [
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'activityId' =>
        [
          'shape' => 'ActivityId',
        ],
      ],
    ],
    'ActivityTaskCanceledEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'scheduledEventId',
        1 => 'startedEventId',
      ],
      'members' =>
      [
        'details' =>
        [
          'shape' => 'Data',
        ],
        'scheduledEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'latestCancelRequestedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ActivityTaskCompletedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'scheduledEventId',
        1 => 'startedEventId',
      ],
      'members' =>
      [
        'result' =>
        [
          'shape' => 'Data',
        ],
        'scheduledEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ActivityTaskFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'scheduledEventId',
        1 => 'startedEventId',
      ],
      'members' =>
      [
        'reason' =>
        [
          'shape' => 'FailureReason',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
        'scheduledEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ActivityTaskScheduledEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'activityType',
        1 => 'activityId',
        2 => 'taskList',
        3 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'activityType' =>
        [
          'shape' => 'ActivityType',
        ],
        'activityId' =>
        [
          'shape' => 'ActivityId',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
        'scheduleToStartTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'scheduleToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'startToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'heartbeatTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
      ],
    ],
    'ActivityTaskStartedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'scheduledEventId',
      ],
      'members' =>
      [
        'identity' =>
        [
          'shape' => 'Identity',
        ],
        'scheduledEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ActivityTaskStatus' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'cancelRequested',
      ],
      'members' =>
      [
        'cancelRequested' =>
        [
          'shape' => 'Canceled',
        ],
      ],
    ],
    'ActivityTaskTimedOutEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timeoutType',
        1 => 'scheduledEventId',
        2 => 'startedEventId',
      ],
      'members' =>
      [
        'timeoutType' =>
        [
          'shape' => 'ActivityTaskTimeoutType',
        ],
        'scheduledEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'details' =>
        [
          'shape' => 'LimitedData',
        ],
      ],
    ],
    'ActivityTaskTimeoutType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'START_TO_CLOSE',
        1 => 'SCHEDULE_TO_START',
        2 => 'SCHEDULE_TO_CLOSE',
        3 => 'HEARTBEAT',
      ],
    ],
    'ActivityType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'name',
        1 => 'version',
      ],
      'members' =>
      [
        'name' =>
        [
          'shape' => 'Name',
        ],
        'version' =>
        [
          'shape' => 'Version',
        ],
      ],
    ],
    'ActivityTypeConfiguration' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'defaultTaskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultTaskHeartbeatTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultTaskList' =>
        [
          'shape' => 'TaskList',
        ],
        'defaultTaskScheduleToStartTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultTaskScheduleToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
      ],
    ],
    'ActivityTypeDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'typeInfo',
        1 => 'configuration',
      ],
      'members' =>
      [
        'typeInfo' =>
        [
          'shape' => 'ActivityTypeInfo',
        ],
        'configuration' =>
        [
          'shape' => 'ActivityTypeConfiguration',
        ],
      ],
    ],
    'ActivityTypeInfo' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'activityType',
        1 => 'status',
        2 => 'creationDate',
      ],
      'members' =>
      [
        'activityType' =>
        [
          'shape' => 'ActivityType',
        ],
        'status' =>
        [
          'shape' => 'RegistrationStatus',
        ],
        'description' =>
        [
          'shape' => 'Description',
        ],
        'creationDate' =>
        [
          'shape' => 'Timestamp',
        ],
        'deprecationDate' =>
        [
          'shape' => 'Timestamp',
        ],
      ],
    ],
    'ActivityTypeInfoList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ActivityTypeInfo',
      ],
    ],
    'ActivityTypeInfos' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'typeInfos',
      ],
      'members' =>
      [
        'typeInfos' =>
        [
          'shape' => 'ActivityTypeInfoList',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
      ],
    ],
    'CancelTimerDecisionAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timerId',
      ],
      'members' =>
      [
        'timerId' =>
        [
          'shape' => 'TimerId',
        ],
      ],
    ],
    'CancelTimerFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'TIMER_ID_UNKNOWN',
        1 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'CancelTimerFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timerId',
        1 => 'cause',
        2 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'timerId' =>
        [
          'shape' => 'TimerId',
        ],
        'cause' =>
        [
          'shape' => 'CancelTimerFailedCause',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'CancelWorkflowExecutionDecisionAttributes' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'details' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'CancelWorkflowExecutionFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'UNHANDLED_DECISION',
        1 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'CancelWorkflowExecutionFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'cause',
        1 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'cause' =>
        [
          'shape' => 'CancelWorkflowExecutionFailedCause',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'Canceled' =>
    [
      'type' => 'boolean',
    ],
    'ChildPolicy' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'TERMINATE',
        1 => 'REQUEST_CANCEL',
        2 => 'ABANDON',
      ],
    ],
    'ChildWorkflowExecutionCanceledEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowExecution',
        1 => 'workflowType',
        2 => 'initiatedEventId',
        3 => 'startedEventId',
      ],
      'members' =>
      [
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ChildWorkflowExecutionCompletedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowExecution',
        1 => 'workflowType',
        2 => 'initiatedEventId',
        3 => 'startedEventId',
      ],
      'members' =>
      [
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'result' =>
        [
          'shape' => 'Data',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ChildWorkflowExecutionFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowExecution',
        1 => 'workflowType',
        2 => 'initiatedEventId',
        3 => 'startedEventId',
      ],
      'members' =>
      [
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'reason' =>
        [
          'shape' => 'FailureReason',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ChildWorkflowExecutionStartedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowExecution',
        1 => 'workflowType',
        2 => 'initiatedEventId',
      ],
      'members' =>
      [
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ChildWorkflowExecutionTerminatedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowExecution',
        1 => 'workflowType',
        2 => 'initiatedEventId',
        3 => 'startedEventId',
      ],
      'members' =>
      [
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ChildWorkflowExecutionTimedOutEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowExecution',
        1 => 'workflowType',
        2 => 'timeoutType',
        3 => 'initiatedEventId',
        4 => 'startedEventId',
      ],
      'members' =>
      [
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'timeoutType' =>
        [
          'shape' => 'WorkflowExecutionTimeoutType',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'CloseStatus' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'COMPLETED',
        1 => 'FAILED',
        2 => 'CANCELED',
        3 => 'TERMINATED',
        4 => 'CONTINUED_AS_NEW',
        5 => 'TIMED_OUT',
      ],
    ],
    'CloseStatusFilter' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'status',
      ],
      'members' =>
      [
        'status' =>
        [
          'shape' => 'CloseStatus',
        ],
      ],
    ],
    'CompleteWorkflowExecutionDecisionAttributes' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'result' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'CompleteWorkflowExecutionFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'UNHANDLED_DECISION',
        1 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'CompleteWorkflowExecutionFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'cause',
        1 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'cause' =>
        [
          'shape' => 'CompleteWorkflowExecutionFailedCause',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ContinueAsNewWorkflowExecutionDecisionAttributes' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'input' =>
        [
          'shape' => 'Data',
        ],
        'executionStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'taskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
        'tagList' =>
        [
          'shape' => 'TagList',
        ],
        'workflowTypeVersion' =>
        [
          'shape' => 'Version',
        ],
      ],
    ],
    'ContinueAsNewWorkflowExecutionFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'UNHANDLED_DECISION',
        1 => 'WORKFLOW_TYPE_DEPRECATED',
        2 => 'WORKFLOW_TYPE_DOES_NOT_EXIST',
        3 => 'DEFAULT_EXECUTION_START_TO_CLOSE_TIMEOUT_UNDEFINED',
        4 => 'DEFAULT_TASK_START_TO_CLOSE_TIMEOUT_UNDEFINED',
        5 => 'DEFAULT_TASK_LIST_UNDEFINED',
        6 => 'DEFAULT_CHILD_POLICY_UNDEFINED',
        7 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'ContinueAsNewWorkflowExecutionFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'cause',
        1 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'cause' =>
        [
          'shape' => 'ContinueAsNewWorkflowExecutionFailedCause',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'Count' =>
    [
      'type' => 'integer',
      'min' => 0,
    ],
    'CountClosedWorkflowExecutionsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'startTimeFilter' =>
        [
          'shape' => 'ExecutionTimeFilter',
        ],
        'closeTimeFilter' =>
        [
          'shape' => 'ExecutionTimeFilter',
        ],
        'executionFilter' =>
        [
          'shape' => 'WorkflowExecutionFilter',
        ],
        'typeFilter' =>
        [
          'shape' => 'WorkflowTypeFilter',
        ],
        'tagFilter' =>
        [
          'shape' => 'TagFilter',
        ],
        'closeStatusFilter' =>
        [
          'shape' => 'CloseStatusFilter',
        ],
      ],
    ],
    'CountOpenWorkflowExecutionsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'startTimeFilter',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'startTimeFilter' =>
        [
          'shape' => 'ExecutionTimeFilter',
        ],
        'typeFilter' =>
        [
          'shape' => 'WorkflowTypeFilter',
        ],
        'tagFilter' =>
        [
          'shape' => 'TagFilter',
        ],
        'executionFilter' =>
        [
          'shape' => 'WorkflowExecutionFilter',
        ],
      ],
    ],
    'CountPendingActivityTasksInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'taskList',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
      ],
    ],
    'CountPendingDecisionTasksInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'taskList',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
      ],
    ],
    'Data' =>
    [
      'type' => 'string',
      'max' => 32768,
    ],
    'Decision' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'decisionType',
      ],
      'members' =>
      [
        'decisionType' =>
        [
          'shape' => 'DecisionType',
        ],
        'scheduleActivityTaskDecisionAttributes' =>
        [
          'shape' => 'ScheduleActivityTaskDecisionAttributes',
        ],
        'requestCancelActivityTaskDecisionAttributes' =>
        [
          'shape' => 'RequestCancelActivityTaskDecisionAttributes',
        ],
        'completeWorkflowExecutionDecisionAttributes' =>
        [
          'shape' => 'CompleteWorkflowExecutionDecisionAttributes',
        ],
        'failWorkflowExecutionDecisionAttributes' =>
        [
          'shape' => 'FailWorkflowExecutionDecisionAttributes',
        ],
        'cancelWorkflowExecutionDecisionAttributes' =>
        [
          'shape' => 'CancelWorkflowExecutionDecisionAttributes',
        ],
        'continueAsNewWorkflowExecutionDecisionAttributes' =>
        [
          'shape' => 'ContinueAsNewWorkflowExecutionDecisionAttributes',
        ],
        'recordMarkerDecisionAttributes' =>
        [
          'shape' => 'RecordMarkerDecisionAttributes',
        ],
        'startTimerDecisionAttributes' =>
        [
          'shape' => 'StartTimerDecisionAttributes',
        ],
        'cancelTimerDecisionAttributes' =>
        [
          'shape' => 'CancelTimerDecisionAttributes',
        ],
        'signalExternalWorkflowExecutionDecisionAttributes' =>
        [
          'shape' => 'SignalExternalWorkflowExecutionDecisionAttributes',
        ],
        'requestCancelExternalWorkflowExecutionDecisionAttributes' =>
        [
          'shape' => 'RequestCancelExternalWorkflowExecutionDecisionAttributes',
        ],
        'startChildWorkflowExecutionDecisionAttributes' =>
        [
          'shape' => 'StartChildWorkflowExecutionDecisionAttributes',
        ],
      ],
    ],
    'DecisionList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Decision',
      ],
    ],
    'DecisionTask' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'taskToken',
        1 => 'startedEventId',
        2 => 'workflowExecution',
        3 => 'workflowType',
        4 => 'events',
      ],
      'members' =>
      [
        'taskToken' =>
        [
          'shape' => 'TaskToken',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'events' =>
        [
          'shape' => 'HistoryEventList',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
        'previousStartedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'DecisionTaskCompletedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'scheduledEventId',
        1 => 'startedEventId',
      ],
      'members' =>
      [
        'executionContext' =>
        [
          'shape' => 'Data',
        ],
        'scheduledEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'DecisionTaskScheduledEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'taskList',
      ],
      'members' =>
      [
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'startToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
      ],
    ],
    'DecisionTaskStartedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'scheduledEventId',
      ],
      'members' =>
      [
        'identity' =>
        [
          'shape' => 'Identity',
        ],
        'scheduledEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'DecisionTaskTimedOutEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timeoutType',
        1 => 'scheduledEventId',
        2 => 'startedEventId',
      ],
      'members' =>
      [
        'timeoutType' =>
        [
          'shape' => 'DecisionTaskTimeoutType',
        ],
        'scheduledEventId' =>
        [
          'shape' => 'EventId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'DecisionTaskTimeoutType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'START_TO_CLOSE',
      ],
    ],
    'DecisionType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ScheduleActivityTask',
        1 => 'RequestCancelActivityTask',
        2 => 'CompleteWorkflowExecution',
        3 => 'FailWorkflowExecution',
        4 => 'CancelWorkflowExecution',
        5 => 'ContinueAsNewWorkflowExecution',
        6 => 'RecordMarker',
        7 => 'StartTimer',
        8 => 'CancelTimer',
        9 => 'SignalExternalWorkflowExecution',
        10 => 'RequestCancelExternalWorkflowExecution',
        11 => 'StartChildWorkflowExecution',
      ],
    ],
    'DefaultUndefinedFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'DeprecateActivityTypeInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'activityType',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'activityType' =>
        [
          'shape' => 'ActivityType',
        ],
      ],
    ],
    'DeprecateDomainInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'name',
      ],
      'members' =>
      [
        'name' =>
        [
          'shape' => 'DomainName',
        ],
      ],
    ],
    'DeprecateWorkflowTypeInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'workflowType',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
      ],
    ],
    'DescribeActivityTypeInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'activityType',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'activityType' =>
        [
          'shape' => 'ActivityType',
        ],
      ],
    ],
    'DescribeDomainInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'name',
      ],
      'members' =>
      [
        'name' =>
        [
          'shape' => 'DomainName',
        ],
      ],
    ],
    'DescribeWorkflowExecutionInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'execution',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'execution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
      ],
    ],
    'DescribeWorkflowTypeInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'workflowType',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
      ],
    ],
    'Description' =>
    [
      'type' => 'string',
      'max' => 1024,
    ],
    'DomainAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'DomainConfiguration' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowExecutionRetentionPeriodInDays',
      ],
      'members' =>
      [
        'workflowExecutionRetentionPeriodInDays' =>
        [
          'shape' => 'DurationInDays',
        ],
      ],
    ],
    'DomainDeprecatedFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'DomainDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domainInfo',
        1 => 'configuration',
      ],
      'members' =>
      [
        'domainInfo' =>
        [
          'shape' => 'DomainInfo',
        ],
        'configuration' =>
        [
          'shape' => 'DomainConfiguration',
        ],
      ],
    ],
    'DomainInfo' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'name',
        1 => 'status',
      ],
      'members' =>
      [
        'name' =>
        [
          'shape' => 'DomainName',
        ],
        'status' =>
        [
          'shape' => 'RegistrationStatus',
        ],
        'description' =>
        [
          'shape' => 'Description',
        ],
      ],
    ],
    'DomainInfoList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DomainInfo',
      ],
    ],
    'DomainInfos' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domainInfos',
      ],
      'members' =>
      [
        'domainInfos' =>
        [
          'shape' => 'DomainInfoList',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
      ],
    ],
    'DomainName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'DurationInDays' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 8,
    ],
    'DurationInSeconds' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 8,
    ],
    'DurationInSecondsOptional' =>
    [
      'type' => 'string',
      'max' => 8,
    ],
    'ErrorMessage' =>
    [
      'type' => 'string',
    ],
    'EventId' =>
    [
      'type' => 'long',
    ],
    'EventType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'WorkflowExecutionStarted',
        1 => 'WorkflowExecutionCancelRequested',
        2 => 'WorkflowExecutionCompleted',
        3 => 'CompleteWorkflowExecutionFailed',
        4 => 'WorkflowExecutionFailed',
        5 => 'FailWorkflowExecutionFailed',
        6 => 'WorkflowExecutionTimedOut',
        7 => 'WorkflowExecutionCanceled',
        8 => 'CancelWorkflowExecutionFailed',
        9 => 'WorkflowExecutionContinuedAsNew',
        10 => 'ContinueAsNewWorkflowExecutionFailed',
        11 => 'WorkflowExecutionTerminated',
        12 => 'DecisionTaskScheduled',
        13 => 'DecisionTaskStarted',
        14 => 'DecisionTaskCompleted',
        15 => 'DecisionTaskTimedOut',
        16 => 'ActivityTaskScheduled',
        17 => 'ScheduleActivityTaskFailed',
        18 => 'ActivityTaskStarted',
        19 => 'ActivityTaskCompleted',
        20 => 'ActivityTaskFailed',
        21 => 'ActivityTaskTimedOut',
        22 => 'ActivityTaskCanceled',
        23 => 'ActivityTaskCancelRequested',
        24 => 'RequestCancelActivityTaskFailed',
        25 => 'WorkflowExecutionSignaled',
        26 => 'MarkerRecorded',
        27 => 'RecordMarkerFailed',
        28 => 'TimerStarted',
        29 => 'StartTimerFailed',
        30 => 'TimerFired',
        31 => 'TimerCanceled',
        32 => 'CancelTimerFailed',
        33 => 'StartChildWorkflowExecutionInitiated',
        34 => 'StartChildWorkflowExecutionFailed',
        35 => 'ChildWorkflowExecutionStarted',
        36 => 'ChildWorkflowExecutionCompleted',
        37 => 'ChildWorkflowExecutionFailed',
        38 => 'ChildWorkflowExecutionTimedOut',
        39 => 'ChildWorkflowExecutionCanceled',
        40 => 'ChildWorkflowExecutionTerminated',
        41 => 'SignalExternalWorkflowExecutionInitiated',
        42 => 'SignalExternalWorkflowExecutionFailed',
        43 => 'ExternalWorkflowExecutionSignaled',
        44 => 'RequestCancelExternalWorkflowExecutionInitiated',
        45 => 'RequestCancelExternalWorkflowExecutionFailed',
        46 => 'ExternalWorkflowExecutionCancelRequested',
      ],
    ],
    'ExecutionStatus' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'OPEN',
        1 => 'CLOSED',
      ],
    ],
    'ExecutionTimeFilter' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'oldestDate',
      ],
      'members' =>
      [
        'oldestDate' =>
        [
          'shape' => 'Timestamp',
        ],
        'latestDate' =>
        [
          'shape' => 'Timestamp',
        ],
      ],
    ],
    'ExternalWorkflowExecutionCancelRequestedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowExecution',
        1 => 'initiatedEventId',
      ],
      'members' =>
      [
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'ExternalWorkflowExecutionSignaledEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowExecution',
        1 => 'initiatedEventId',
      ],
      'members' =>
      [
        'workflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'FailWorkflowExecutionDecisionAttributes' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'reason' =>
        [
          'shape' => 'FailureReason',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'FailWorkflowExecutionFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'UNHANDLED_DECISION',
        1 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'FailWorkflowExecutionFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'cause',
        1 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'cause' =>
        [
          'shape' => 'FailWorkflowExecutionFailedCause',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'FailureReason' =>
    [
      'type' => 'string',
      'max' => 256,
    ],
    'GetWorkflowExecutionHistoryInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'execution',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'execution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
        'maximumPageSize' =>
        [
          'shape' => 'PageSize',
        ],
        'reverseOrder' =>
        [
          'shape' => 'ReverseOrder',
        ],
      ],
    ],
    'History' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'events',
      ],
      'members' =>
      [
        'events' =>
        [
          'shape' => 'HistoryEventList',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
      ],
    ],
    'HistoryEvent' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'eventTimestamp',
        1 => 'eventType',
        2 => 'eventId',
      ],
      'members' =>
      [
        'eventTimestamp' =>
        [
          'shape' => 'Timestamp',
        ],
        'eventType' =>
        [
          'shape' => 'EventType',
        ],
        'eventId' =>
        [
          'shape' => 'EventId',
        ],
        'workflowExecutionStartedEventAttributes' =>
        [
          'shape' => 'WorkflowExecutionStartedEventAttributes',
        ],
        'workflowExecutionCompletedEventAttributes' =>
        [
          'shape' => 'WorkflowExecutionCompletedEventAttributes',
        ],
        'completeWorkflowExecutionFailedEventAttributes' =>
        [
          'shape' => 'CompleteWorkflowExecutionFailedEventAttributes',
        ],
        'workflowExecutionFailedEventAttributes' =>
        [
          'shape' => 'WorkflowExecutionFailedEventAttributes',
        ],
        'failWorkflowExecutionFailedEventAttributes' =>
        [
          'shape' => 'FailWorkflowExecutionFailedEventAttributes',
        ],
        'workflowExecutionTimedOutEventAttributes' =>
        [
          'shape' => 'WorkflowExecutionTimedOutEventAttributes',
        ],
        'workflowExecutionCanceledEventAttributes' =>
        [
          'shape' => 'WorkflowExecutionCanceledEventAttributes',
        ],
        'cancelWorkflowExecutionFailedEventAttributes' =>
        [
          'shape' => 'CancelWorkflowExecutionFailedEventAttributes',
        ],
        'workflowExecutionContinuedAsNewEventAttributes' =>
        [
          'shape' => 'WorkflowExecutionContinuedAsNewEventAttributes',
        ],
        'continueAsNewWorkflowExecutionFailedEventAttributes' =>
        [
          'shape' => 'ContinueAsNewWorkflowExecutionFailedEventAttributes',
        ],
        'workflowExecutionTerminatedEventAttributes' =>
        [
          'shape' => 'WorkflowExecutionTerminatedEventAttributes',
        ],
        'workflowExecutionCancelRequestedEventAttributes' =>
        [
          'shape' => 'WorkflowExecutionCancelRequestedEventAttributes',
        ],
        'decisionTaskScheduledEventAttributes' =>
        [
          'shape' => 'DecisionTaskScheduledEventAttributes',
        ],
        'decisionTaskStartedEventAttributes' =>
        [
          'shape' => 'DecisionTaskStartedEventAttributes',
        ],
        'decisionTaskCompletedEventAttributes' =>
        [
          'shape' => 'DecisionTaskCompletedEventAttributes',
        ],
        'decisionTaskTimedOutEventAttributes' =>
        [
          'shape' => 'DecisionTaskTimedOutEventAttributes',
        ],
        'activityTaskScheduledEventAttributes' =>
        [
          'shape' => 'ActivityTaskScheduledEventAttributes',
        ],
        'activityTaskStartedEventAttributes' =>
        [
          'shape' => 'ActivityTaskStartedEventAttributes',
        ],
        'activityTaskCompletedEventAttributes' =>
        [
          'shape' => 'ActivityTaskCompletedEventAttributes',
        ],
        'activityTaskFailedEventAttributes' =>
        [
          'shape' => 'ActivityTaskFailedEventAttributes',
        ],
        'activityTaskTimedOutEventAttributes' =>
        [
          'shape' => 'ActivityTaskTimedOutEventAttributes',
        ],
        'activityTaskCanceledEventAttributes' =>
        [
          'shape' => 'ActivityTaskCanceledEventAttributes',
        ],
        'activityTaskCancelRequestedEventAttributes' =>
        [
          'shape' => 'ActivityTaskCancelRequestedEventAttributes',
        ],
        'workflowExecutionSignaledEventAttributes' =>
        [
          'shape' => 'WorkflowExecutionSignaledEventAttributes',
        ],
        'markerRecordedEventAttributes' =>
        [
          'shape' => 'MarkerRecordedEventAttributes',
        ],
        'recordMarkerFailedEventAttributes' =>
        [
          'shape' => 'RecordMarkerFailedEventAttributes',
        ],
        'timerStartedEventAttributes' =>
        [
          'shape' => 'TimerStartedEventAttributes',
        ],
        'timerFiredEventAttributes' =>
        [
          'shape' => 'TimerFiredEventAttributes',
        ],
        'timerCanceledEventAttributes' =>
        [
          'shape' => 'TimerCanceledEventAttributes',
        ],
        'startChildWorkflowExecutionInitiatedEventAttributes' =>
        [
          'shape' => 'StartChildWorkflowExecutionInitiatedEventAttributes',
        ],
        'childWorkflowExecutionStartedEventAttributes' =>
        [
          'shape' => 'ChildWorkflowExecutionStartedEventAttributes',
        ],
        'childWorkflowExecutionCompletedEventAttributes' =>
        [
          'shape' => 'ChildWorkflowExecutionCompletedEventAttributes',
        ],
        'childWorkflowExecutionFailedEventAttributes' =>
        [
          'shape' => 'ChildWorkflowExecutionFailedEventAttributes',
        ],
        'childWorkflowExecutionTimedOutEventAttributes' =>
        [
          'shape' => 'ChildWorkflowExecutionTimedOutEventAttributes',
        ],
        'childWorkflowExecutionCanceledEventAttributes' =>
        [
          'shape' => 'ChildWorkflowExecutionCanceledEventAttributes',
        ],
        'childWorkflowExecutionTerminatedEventAttributes' =>
        [
          'shape' => 'ChildWorkflowExecutionTerminatedEventAttributes',
        ],
        'signalExternalWorkflowExecutionInitiatedEventAttributes' =>
        [
          'shape' => 'SignalExternalWorkflowExecutionInitiatedEventAttributes',
        ],
        'externalWorkflowExecutionSignaledEventAttributes' =>
        [
          'shape' => 'ExternalWorkflowExecutionSignaledEventAttributes',
        ],
        'signalExternalWorkflowExecutionFailedEventAttributes' =>
        [
          'shape' => 'SignalExternalWorkflowExecutionFailedEventAttributes',
        ],
        'externalWorkflowExecutionCancelRequestedEventAttributes' =>
        [
          'shape' => 'ExternalWorkflowExecutionCancelRequestedEventAttributes',
        ],
        'requestCancelExternalWorkflowExecutionInitiatedEventAttributes' =>
        [
          'shape' => 'RequestCancelExternalWorkflowExecutionInitiatedEventAttributes',
        ],
        'requestCancelExternalWorkflowExecutionFailedEventAttributes' =>
        [
          'shape' => 'RequestCancelExternalWorkflowExecutionFailedEventAttributes',
        ],
        'scheduleActivityTaskFailedEventAttributes' =>
        [
          'shape' => 'ScheduleActivityTaskFailedEventAttributes',
        ],
        'requestCancelActivityTaskFailedEventAttributes' =>
        [
          'shape' => 'RequestCancelActivityTaskFailedEventAttributes',
        ],
        'startTimerFailedEventAttributes' =>
        [
          'shape' => 'StartTimerFailedEventAttributes',
        ],
        'cancelTimerFailedEventAttributes' =>
        [
          'shape' => 'CancelTimerFailedEventAttributes',
        ],
        'startChildWorkflowExecutionFailedEventAttributes' =>
        [
          'shape' => 'StartChildWorkflowExecutionFailedEventAttributes',
        ],
      ],
    ],
    'HistoryEventList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'HistoryEvent',
      ],
    ],
    'Identity' =>
    [
      'type' => 'string',
      'max' => 256,
    ],
    'LimitExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'LimitedData' =>
    [
      'type' => 'string',
      'max' => 2048,
    ],
    'ListActivityTypesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'registrationStatus',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'name' =>
        [
          'shape' => 'Name',
        ],
        'registrationStatus' =>
        [
          'shape' => 'RegistrationStatus',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
        'maximumPageSize' =>
        [
          'shape' => 'PageSize',
        ],
        'reverseOrder' =>
        [
          'shape' => 'ReverseOrder',
        ],
      ],
    ],
    'ListClosedWorkflowExecutionsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'startTimeFilter' =>
        [
          'shape' => 'ExecutionTimeFilter',
        ],
        'closeTimeFilter' =>
        [
          'shape' => 'ExecutionTimeFilter',
        ],
        'executionFilter' =>
        [
          'shape' => 'WorkflowExecutionFilter',
        ],
        'closeStatusFilter' =>
        [
          'shape' => 'CloseStatusFilter',
        ],
        'typeFilter' =>
        [
          'shape' => 'WorkflowTypeFilter',
        ],
        'tagFilter' =>
        [
          'shape' => 'TagFilter',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
        'maximumPageSize' =>
        [
          'shape' => 'PageSize',
        ],
        'reverseOrder' =>
        [
          'shape' => 'ReverseOrder',
        ],
      ],
    ],
    'ListDomainsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'registrationStatus',
      ],
      'members' =>
      [
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
        'registrationStatus' =>
        [
          'shape' => 'RegistrationStatus',
        ],
        'maximumPageSize' =>
        [
          'shape' => 'PageSize',
        ],
        'reverseOrder' =>
        [
          'shape' => 'ReverseOrder',
        ],
      ],
    ],
    'ListOpenWorkflowExecutionsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'startTimeFilter',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'startTimeFilter' =>
        [
          'shape' => 'ExecutionTimeFilter',
        ],
        'typeFilter' =>
        [
          'shape' => 'WorkflowTypeFilter',
        ],
        'tagFilter' =>
        [
          'shape' => 'TagFilter',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
        'maximumPageSize' =>
        [
          'shape' => 'PageSize',
        ],
        'reverseOrder' =>
        [
          'shape' => 'ReverseOrder',
        ],
        'executionFilter' =>
        [
          'shape' => 'WorkflowExecutionFilter',
        ],
      ],
    ],
    'ListWorkflowTypesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'registrationStatus',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'name' =>
        [
          'shape' => 'Name',
        ],
        'registrationStatus' =>
        [
          'shape' => 'RegistrationStatus',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
        'maximumPageSize' =>
        [
          'shape' => 'PageSize',
        ],
        'reverseOrder' =>
        [
          'shape' => 'ReverseOrder',
        ],
      ],
    ],
    'MarkerName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'MarkerRecordedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'markerName',
        1 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'markerName' =>
        [
          'shape' => 'MarkerName',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'Name' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'OpenDecisionTasksCount' =>
    [
      'type' => 'integer',
      'min' => 0,
      'max' => 1,
    ],
    'OperationNotPermittedFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'PageSize' =>
    [
      'type' => 'integer',
      'min' => 0,
      'max' => 1000,
    ],
    'PageToken' =>
    [
      'type' => 'string',
      'max' => 2048,
    ],
    'PendingTaskCount' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'count',
      ],
      'members' =>
      [
        'count' =>
        [
          'shape' => 'Count',
        ],
        'truncated' =>
        [
          'shape' => 'Truncated',
        ],
      ],
    ],
    'PollForActivityTaskInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'taskList',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'identity' =>
        [
          'shape' => 'Identity',
        ],
      ],
    ],
    'PollForDecisionTaskInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'taskList',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'identity' =>
        [
          'shape' => 'Identity',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
        'maximumPageSize' =>
        [
          'shape' => 'PageSize',
        ],
        'reverseOrder' =>
        [
          'shape' => 'ReverseOrder',
        ],
      ],
    ],
    'RecordActivityTaskHeartbeatInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'taskToken',
      ],
      'members' =>
      [
        'taskToken' =>
        [
          'shape' => 'TaskToken',
        ],
        'details' =>
        [
          'shape' => 'LimitedData',
        ],
      ],
    ],
    'RecordMarkerDecisionAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'markerName',
      ],
      'members' =>
      [
        'markerName' =>
        [
          'shape' => 'MarkerName',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'RecordMarkerFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'RecordMarkerFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'markerName',
        1 => 'cause',
        2 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'markerName' =>
        [
          'shape' => 'MarkerName',
        ],
        'cause' =>
        [
          'shape' => 'RecordMarkerFailedCause',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'RegisterActivityTypeInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'name',
        2 => 'version',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'name' =>
        [
          'shape' => 'Name',
        ],
        'version' =>
        [
          'shape' => 'Version',
        ],
        'description' =>
        [
          'shape' => 'Description',
        ],
        'defaultTaskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultTaskHeartbeatTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultTaskList' =>
        [
          'shape' => 'TaskList',
        ],
        'defaultTaskScheduleToStartTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultTaskScheduleToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
      ],
    ],
    'RegisterDomainInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'name',
        1 => 'workflowExecutionRetentionPeriodInDays',
      ],
      'members' =>
      [
        'name' =>
        [
          'shape' => 'DomainName',
        ],
        'description' =>
        [
          'shape' => 'Description',
        ],
        'workflowExecutionRetentionPeriodInDays' =>
        [
          'shape' => 'DurationInDays',
        ],
      ],
    ],
    'RegisterWorkflowTypeInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'name',
        2 => 'version',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'name' =>
        [
          'shape' => 'Name',
        ],
        'version' =>
        [
          'shape' => 'Version',
        ],
        'description' =>
        [
          'shape' => 'Description',
        ],
        'defaultTaskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultExecutionStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultTaskList' =>
        [
          'shape' => 'TaskList',
        ],
        'defaultChildPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
      ],
    ],
    'RegistrationStatus' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'REGISTERED',
        1 => 'DEPRECATED',
      ],
    ],
    'RequestCancelActivityTaskDecisionAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'activityId',
      ],
      'members' =>
      [
        'activityId' =>
        [
          'shape' => 'ActivityId',
        ],
      ],
    ],
    'RequestCancelActivityTaskFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ACTIVITY_ID_UNKNOWN',
        1 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'RequestCancelActivityTaskFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'activityId',
        1 => 'cause',
        2 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'activityId' =>
        [
          'shape' => 'ActivityId',
        ],
        'cause' =>
        [
          'shape' => 'RequestCancelActivityTaskFailedCause',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'RequestCancelExternalWorkflowExecutionDecisionAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowId',
      ],
      'members' =>
      [
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunIdOptional',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'RequestCancelExternalWorkflowExecutionFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'UNKNOWN_EXTERNAL_WORKFLOW_EXECUTION',
        1 => 'REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_RATE_EXCEEDED',
        2 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'RequestCancelExternalWorkflowExecutionFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowId',
        1 => 'cause',
        2 => 'initiatedEventId',
        3 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunIdOptional',
        ],
        'cause' =>
        [
          'shape' => 'RequestCancelExternalWorkflowExecutionFailedCause',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'RequestCancelExternalWorkflowExecutionInitiatedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowId',
        1 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunIdOptional',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'RequestCancelWorkflowExecutionInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'workflowId',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunIdOptional',
        ],
      ],
    ],
    'RespondActivityTaskCanceledInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'taskToken',
      ],
      'members' =>
      [
        'taskToken' =>
        [
          'shape' => 'TaskToken',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'RespondActivityTaskCompletedInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'taskToken',
      ],
      'members' =>
      [
        'taskToken' =>
        [
          'shape' => 'TaskToken',
        ],
        'result' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'RespondActivityTaskFailedInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'taskToken',
      ],
      'members' =>
      [
        'taskToken' =>
        [
          'shape' => 'TaskToken',
        ],
        'reason' =>
        [
          'shape' => 'FailureReason',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'RespondDecisionTaskCompletedInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'taskToken',
      ],
      'members' =>
      [
        'taskToken' =>
        [
          'shape' => 'TaskToken',
        ],
        'decisions' =>
        [
          'shape' => 'DecisionList',
        ],
        'executionContext' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'ReverseOrder' =>
    [
      'type' => 'boolean',
    ],
    'Run' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'runId' =>
        [
          'shape' => 'RunId',
        ],
      ],
    ],
    'RunId' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
    ],
    'RunIdOptional' =>
    [
      'type' => 'string',
      'max' => 64,
    ],
    'ScheduleActivityTaskDecisionAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'activityType',
        1 => 'activityId',
      ],
      'members' =>
      [
        'activityType' =>
        [
          'shape' => 'ActivityType',
        ],
        'activityId' =>
        [
          'shape' => 'ActivityId',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
        'scheduleToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'scheduleToStartTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'startToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'heartbeatTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
      ],
    ],
    'ScheduleActivityTaskFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ACTIVITY_TYPE_DEPRECATED',
        1 => 'ACTIVITY_TYPE_DOES_NOT_EXIST',
        2 => 'ACTIVITY_ID_ALREADY_IN_USE',
        3 => 'OPEN_ACTIVITIES_LIMIT_EXCEEDED',
        4 => 'ACTIVITY_CREATION_RATE_EXCEEDED',
        5 => 'DEFAULT_SCHEDULE_TO_CLOSE_TIMEOUT_UNDEFINED',
        6 => 'DEFAULT_TASK_LIST_UNDEFINED',
        7 => 'DEFAULT_SCHEDULE_TO_START_TIMEOUT_UNDEFINED',
        8 => 'DEFAULT_START_TO_CLOSE_TIMEOUT_UNDEFINED',
        9 => 'DEFAULT_HEARTBEAT_TIMEOUT_UNDEFINED',
        10 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'ScheduleActivityTaskFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'activityType',
        1 => 'activityId',
        2 => 'cause',
        3 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'activityType' =>
        [
          'shape' => 'ActivityType',
        ],
        'activityId' =>
        [
          'shape' => 'ActivityId',
        ],
        'cause' =>
        [
          'shape' => 'ScheduleActivityTaskFailedCause',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'SignalExternalWorkflowExecutionDecisionAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowId',
        1 => 'signalName',
      ],
      'members' =>
      [
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunIdOptional',
        ],
        'signalName' =>
        [
          'shape' => 'SignalName',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'SignalExternalWorkflowExecutionFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'UNKNOWN_EXTERNAL_WORKFLOW_EXECUTION',
        1 => 'SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_RATE_EXCEEDED',
        2 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'SignalExternalWorkflowExecutionFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowId',
        1 => 'cause',
        2 => 'initiatedEventId',
        3 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunIdOptional',
        ],
        'cause' =>
        [
          'shape' => 'SignalExternalWorkflowExecutionFailedCause',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'SignalExternalWorkflowExecutionInitiatedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowId',
        1 => 'signalName',
        2 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunIdOptional',
        ],
        'signalName' =>
        [
          'shape' => 'SignalName',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'SignalName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'SignalWorkflowExecutionInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'workflowId',
        2 => 'signalName',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunIdOptional',
        ],
        'signalName' =>
        [
          'shape' => 'SignalName',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'StartChildWorkflowExecutionDecisionAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowType',
        1 => 'workflowId',
      ],
      'members' =>
      [
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
        'executionStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'taskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
        'tagList' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'StartChildWorkflowExecutionFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'WORKFLOW_TYPE_DOES_NOT_EXIST',
        1 => 'WORKFLOW_TYPE_DEPRECATED',
        2 => 'OPEN_CHILDREN_LIMIT_EXCEEDED',
        3 => 'OPEN_WORKFLOWS_LIMIT_EXCEEDED',
        4 => 'CHILD_CREATION_RATE_EXCEEDED',
        5 => 'WORKFLOW_ALREADY_RUNNING',
        6 => 'DEFAULT_EXECUTION_START_TO_CLOSE_TIMEOUT_UNDEFINED',
        7 => 'DEFAULT_TASK_LIST_UNDEFINED',
        8 => 'DEFAULT_TASK_START_TO_CLOSE_TIMEOUT_UNDEFINED',
        9 => 'DEFAULT_CHILD_POLICY_UNDEFINED',
        10 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'StartChildWorkflowExecutionFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowType',
        1 => 'cause',
        2 => 'workflowId',
        3 => 'initiatedEventId',
        4 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'cause' =>
        [
          'shape' => 'StartChildWorkflowExecutionFailedCause',
        ],
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'initiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'StartChildWorkflowExecutionInitiatedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowId',
        1 => 'workflowType',
        2 => 'taskList',
        3 => 'decisionTaskCompletedEventId',
        4 => 'childPolicy',
      ],
      'members' =>
      [
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
        'executionStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
        'taskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'tagList' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'StartTimerDecisionAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timerId',
        1 => 'startToFireTimeout',
      ],
      'members' =>
      [
        'timerId' =>
        [
          'shape' => 'TimerId',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
        'startToFireTimeout' =>
        [
          'shape' => 'DurationInSeconds',
        ],
      ],
    ],
    'StartTimerFailedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'TIMER_ID_ALREADY_IN_USE',
        1 => 'OPEN_TIMERS_LIMIT_EXCEEDED',
        2 => 'TIMER_CREATION_RATE_EXCEEDED',
        3 => 'OPERATION_NOT_PERMITTED',
      ],
    ],
    'StartTimerFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timerId',
        1 => 'cause',
        2 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'timerId' =>
        [
          'shape' => 'TimerId',
        ],
        'cause' =>
        [
          'shape' => 'StartTimerFailedCause',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'StartWorkflowExecutionInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'workflowId',
        2 => 'workflowType',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
        'executionStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'tagList' =>
        [
          'shape' => 'TagList',
        ],
        'taskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
      ],
    ],
    'Tag' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'TagFilter' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'tag',
      ],
      'members' =>
      [
        'tag' =>
        [
          'shape' => 'Tag',
        ],
      ],
    ],
    'TagList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Tag',
      ],
      'max' => 5,
    ],
    'TaskList' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'name',
      ],
      'members' =>
      [
        'name' =>
        [
          'shape' => 'Name',
        ],
      ],
    ],
    'TaskToken' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 1024,
    ],
    'TerminateReason' =>
    [
      'type' => 'string',
      'max' => 256,
    ],
    'TerminateWorkflowExecutionInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'domain',
        1 => 'workflowId',
      ],
      'members' =>
      [
        'domain' =>
        [
          'shape' => 'DomainName',
        ],
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunIdOptional',
        ],
        'reason' =>
        [
          'shape' => 'TerminateReason',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
      ],
    ],
    'TimerCanceledEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timerId',
        1 => 'startedEventId',
        2 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'timerId' =>
        [
          'shape' => 'TimerId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'TimerFiredEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timerId',
        1 => 'startedEventId',
      ],
      'members' =>
      [
        'timerId' =>
        [
          'shape' => 'TimerId',
        ],
        'startedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'TimerId' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'TimerStartedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timerId',
        1 => 'startToFireTimeout',
        2 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'timerId' =>
        [
          'shape' => 'TimerId',
        ],
        'control' =>
        [
          'shape' => 'Data',
        ],
        'startToFireTimeout' =>
        [
          'shape' => 'DurationInSeconds',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'Timestamp' =>
    [
      'type' => 'timestamp',
    ],
    'Truncated' =>
    [
      'type' => 'boolean',
    ],
    'TypeAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'TypeDeprecatedFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'UnknownResourceFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'Version' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
    ],
    'VersionOptional' =>
    [
      'type' => 'string',
      'max' => 64,
    ],
    'WorkflowExecution' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowId',
        1 => 'runId',
      ],
      'members' =>
      [
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
        'runId' =>
        [
          'shape' => 'RunId',
        ],
      ],
    ],
    'WorkflowExecutionAlreadyStartedFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'WorkflowExecutionCancelRequestedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'CHILD_POLICY_APPLIED',
      ],
    ],
    'WorkflowExecutionCancelRequestedEventAttributes' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'externalWorkflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'externalInitiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'cause' =>
        [
          'shape' => 'WorkflowExecutionCancelRequestedCause',
        ],
      ],
    ],
    'WorkflowExecutionCanceledEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'details' =>
        [
          'shape' => 'Data',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'WorkflowExecutionCompletedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'result' =>
        [
          'shape' => 'Data',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'WorkflowExecutionConfiguration' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'taskStartToCloseTimeout',
        1 => 'executionStartToCloseTimeout',
        2 => 'taskList',
        3 => 'childPolicy',
      ],
      'members' =>
      [
        'taskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSeconds',
        ],
        'executionStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSeconds',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
      ],
    ],
    'WorkflowExecutionContinuedAsNewEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'decisionTaskCompletedEventId',
        1 => 'newExecutionRunId',
        2 => 'taskList',
        3 => 'childPolicy',
        4 => 'workflowType',
      ],
      'members' =>
      [
        'input' =>
        [
          'shape' => 'Data',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
        'newExecutionRunId' =>
        [
          'shape' => 'RunId',
        ],
        'executionStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'taskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
        'tagList' =>
        [
          'shape' => 'TagList',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
      ],
    ],
    'WorkflowExecutionCount' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'count',
      ],
      'members' =>
      [
        'count' =>
        [
          'shape' => 'Count',
        ],
        'truncated' =>
        [
          'shape' => 'Truncated',
        ],
      ],
    ],
    'WorkflowExecutionDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'executionInfo',
        1 => 'executionConfiguration',
        2 => 'openCounts',
      ],
      'members' =>
      [
        'executionInfo' =>
        [
          'shape' => 'WorkflowExecutionInfo',
        ],
        'executionConfiguration' =>
        [
          'shape' => 'WorkflowExecutionConfiguration',
        ],
        'openCounts' =>
        [
          'shape' => 'WorkflowExecutionOpenCounts',
        ],
        'latestActivityTaskTimestamp' =>
        [
          'shape' => 'Timestamp',
        ],
        'latestExecutionContext' =>
        [
          'shape' => 'Data',
        ],
      ],
    ],
    'WorkflowExecutionFailedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'decisionTaskCompletedEventId',
      ],
      'members' =>
      [
        'reason' =>
        [
          'shape' => 'FailureReason',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
        'decisionTaskCompletedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'WorkflowExecutionFilter' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowId',
      ],
      'members' =>
      [
        'workflowId' =>
        [
          'shape' => 'WorkflowId',
        ],
      ],
    ],
    'WorkflowExecutionInfo' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'execution',
        1 => 'workflowType',
        2 => 'startTimestamp',
        3 => 'executionStatus',
      ],
      'members' =>
      [
        'execution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'startTimestamp' =>
        [
          'shape' => 'Timestamp',
        ],
        'closeTimestamp' =>
        [
          'shape' => 'Timestamp',
        ],
        'executionStatus' =>
        [
          'shape' => 'ExecutionStatus',
        ],
        'closeStatus' =>
        [
          'shape' => 'CloseStatus',
        ],
        'parent' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'tagList' =>
        [
          'shape' => 'TagList',
        ],
        'cancelRequested' =>
        [
          'shape' => 'Canceled',
        ],
      ],
    ],
    'WorkflowExecutionInfoList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'WorkflowExecutionInfo',
      ],
    ],
    'WorkflowExecutionInfos' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'executionInfos',
      ],
      'members' =>
      [
        'executionInfos' =>
        [
          'shape' => 'WorkflowExecutionInfoList',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
      ],
    ],
    'WorkflowExecutionOpenCounts' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'openActivityTasks',
        1 => 'openDecisionTasks',
        2 => 'openTimers',
        3 => 'openChildWorkflowExecutions',
      ],
      'members' =>
      [
        'openActivityTasks' =>
        [
          'shape' => 'Count',
        ],
        'openDecisionTasks' =>
        [
          'shape' => 'OpenDecisionTasksCount',
        ],
        'openTimers' =>
        [
          'shape' => 'Count',
        ],
        'openChildWorkflowExecutions' =>
        [
          'shape' => 'Count',
        ],
      ],
    ],
    'WorkflowExecutionSignaledEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'signalName',
      ],
      'members' =>
      [
        'signalName' =>
        [
          'shape' => 'SignalName',
        ],
        'input' =>
        [
          'shape' => 'Data',
        ],
        'externalWorkflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'externalInitiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'WorkflowExecutionStartedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'childPolicy',
        1 => 'taskList',
        2 => 'workflowType',
      ],
      'members' =>
      [
        'input' =>
        [
          'shape' => 'Data',
        ],
        'executionStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'taskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
        'taskList' =>
        [
          'shape' => 'TaskList',
        ],
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'tagList' =>
        [
          'shape' => 'TagList',
        ],
        'continuedExecutionRunId' =>
        [
          'shape' => 'RunIdOptional',
        ],
        'parentWorkflowExecution' =>
        [
          'shape' => 'WorkflowExecution',
        ],
        'parentInitiatedEventId' =>
        [
          'shape' => 'EventId',
        ],
      ],
    ],
    'WorkflowExecutionTerminatedCause' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'CHILD_POLICY_APPLIED',
        1 => 'EVENT_LIMIT_EXCEEDED',
        2 => 'OPERATOR_INITIATED',
      ],
    ],
    'WorkflowExecutionTerminatedEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'childPolicy',
      ],
      'members' =>
      [
        'reason' =>
        [
          'shape' => 'TerminateReason',
        ],
        'details' =>
        [
          'shape' => 'Data',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
        'cause' =>
        [
          'shape' => 'WorkflowExecutionTerminatedCause',
        ],
      ],
    ],
    'WorkflowExecutionTimedOutEventAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'timeoutType',
        1 => 'childPolicy',
      ],
      'members' =>
      [
        'timeoutType' =>
        [
          'shape' => 'WorkflowExecutionTimeoutType',
        ],
        'childPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
      ],
    ],
    'WorkflowExecutionTimeoutType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'START_TO_CLOSE',
      ],
    ],
    'WorkflowId' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'WorkflowType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'name',
        1 => 'version',
      ],
      'members' =>
      [
        'name' =>
        [
          'shape' => 'Name',
        ],
        'version' =>
        [
          'shape' => 'Version',
        ],
      ],
    ],
    'WorkflowTypeConfiguration' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'defaultTaskStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultExecutionStartToCloseTimeout' =>
        [
          'shape' => 'DurationInSecondsOptional',
        ],
        'defaultTaskList' =>
        [
          'shape' => 'TaskList',
        ],
        'defaultChildPolicy' =>
        [
          'shape' => 'ChildPolicy',
        ],
      ],
    ],
    'WorkflowTypeDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'typeInfo',
        1 => 'configuration',
      ],
      'members' =>
      [
        'typeInfo' =>
        [
          'shape' => 'WorkflowTypeInfo',
        ],
        'configuration' =>
        [
          'shape' => 'WorkflowTypeConfiguration',
        ],
      ],
    ],
    'WorkflowTypeFilter' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'name',
      ],
      'members' =>
      [
        'name' =>
        [
          'shape' => 'Name',
        ],
        'version' =>
        [
          'shape' => 'VersionOptional',
        ],
      ],
    ],
    'WorkflowTypeInfo' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'workflowType',
        1 => 'status',
        2 => 'creationDate',
      ],
      'members' =>
      [
        'workflowType' =>
        [
          'shape' => 'WorkflowType',
        ],
        'status' =>
        [
          'shape' => 'RegistrationStatus',
        ],
        'description' =>
        [
          'shape' => 'Description',
        ],
        'creationDate' =>
        [
          'shape' => 'Timestamp',
        ],
        'deprecationDate' =>
        [
          'shape' => 'Timestamp',
        ],
      ],
    ],
    'WorkflowTypeInfoList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'WorkflowTypeInfo',
      ],
    ],
    'WorkflowTypeInfos' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'typeInfos',
      ],
      'members' =>
      [
        'typeInfos' =>
        [
          'shape' => 'WorkflowTypeInfoList',
        ],
        'nextPageToken' =>
        [
          'shape' => 'PageToken',
        ],
      ],
    ],
  ],
];