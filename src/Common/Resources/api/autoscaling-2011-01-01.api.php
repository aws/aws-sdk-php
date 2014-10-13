<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2011-01-01',
    'endpointPrefix' => 'autoscaling',
    'serviceFullName' => 'Auto Scaling',
    'signatureVersion' => 'v4',
    'xmlNamespace' => 'http://autoscaling.amazonaws.com/doc/2011-01-01/',
    'protocol' => 'query',
  ],
  'operations' =>
  [
    'AttachInstances' =>
    [
      'name' => 'AttachInstances',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AttachInstancesQuery',
      ],
    ],
    'CompleteLifecycleAction' =>
    [
      'name' => 'CompleteLifecycleAction',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CompleteLifecycleActionType',
      ],
      'output' =>
      [
        'shape' => 'CompleteLifecycleActionAnswer',
        'resultWrapper' => 'CompleteLifecycleActionResult',
      ],
    ],
    'CreateAutoScalingGroup' =>
    [
      'name' => 'CreateAutoScalingGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateAutoScalingGroupType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AlreadyExistsFault',
          'error' =>
          [
            'code' => 'AlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededFault',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateLaunchConfiguration' =>
    [
      'name' => 'CreateLaunchConfiguration',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateLaunchConfigurationType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AlreadyExistsFault',
          'error' =>
          [
            'code' => 'AlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededFault',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateOrUpdateTags' =>
    [
      'name' => 'CreateOrUpdateTags',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateOrUpdateTagsType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededFault',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AlreadyExistsFault',
          'error' =>
          [
            'code' => 'AlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteAutoScalingGroup' =>
    [
      'name' => 'DeleteAutoScalingGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteAutoScalingGroupType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ScalingActivityInProgressFault',
          'error' =>
          [
            'code' => 'ScalingActivityInProgress',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceInUseFault',
          'error' =>
          [
            'code' => 'ResourceInUse',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteLaunchConfiguration' =>
    [
      'name' => 'DeleteLaunchConfiguration',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'LaunchConfigurationNameType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceInUseFault',
          'error' =>
          [
            'code' => 'ResourceInUse',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteLifecycleHook' =>
    [
      'name' => 'DeleteLifecycleHook',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteLifecycleHookType',
      ],
      'output' =>
      [
        'shape' => 'DeleteLifecycleHookAnswer',
        'resultWrapper' => 'DeleteLifecycleHookResult',
      ],
    ],
    'DeleteNotificationConfiguration' =>
    [
      'name' => 'DeleteNotificationConfiguration',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteNotificationConfigurationType',
      ],
    ],
    'DeletePolicy' =>
    [
      'name' => 'DeletePolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeletePolicyType',
      ],
    ],
    'DeleteScheduledAction' =>
    [
      'name' => 'DeleteScheduledAction',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteScheduledActionType',
      ],
    ],
    'DeleteTags' =>
    [
      'name' => 'DeleteTags',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteTagsType',
      ],
    ],
    'DescribeAccountLimits' =>
    [
      'name' => 'DescribeAccountLimits',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'DescribeAccountLimitsAnswer',
        'resultWrapper' => 'DescribeAccountLimitsResult',
      ],
    ],
    'DescribeAdjustmentTypes' =>
    [
      'name' => 'DescribeAdjustmentTypes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'DescribeAdjustmentTypesAnswer',
        'resultWrapper' => 'DescribeAdjustmentTypesResult',
      ],
    ],
    'DescribeAutoScalingGroups' =>
    [
      'name' => 'DescribeAutoScalingGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AutoScalingGroupNamesType',
      ],
      'output' =>
      [
        'shape' => 'AutoScalingGroupsType',
        'resultWrapper' => 'DescribeAutoScalingGroupsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeAutoScalingInstances' =>
    [
      'name' => 'DescribeAutoScalingInstances',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeAutoScalingInstancesType',
      ],
      'output' =>
      [
        'shape' => 'AutoScalingInstancesType',
        'resultWrapper' => 'DescribeAutoScalingInstancesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeAutoScalingNotificationTypes' =>
    [
      'name' => 'DescribeAutoScalingNotificationTypes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'DescribeAutoScalingNotificationTypesAnswer',
        'resultWrapper' => 'DescribeAutoScalingNotificationTypesResult',
      ],
    ],
    'DescribeLaunchConfigurations' =>
    [
      'name' => 'DescribeLaunchConfigurations',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'LaunchConfigurationNamesType',
      ],
      'output' =>
      [
        'shape' => 'LaunchConfigurationsType',
        'resultWrapper' => 'DescribeLaunchConfigurationsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeLifecycleHookTypes' =>
    [
      'name' => 'DescribeLifecycleHookTypes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'DescribeLifecycleHookTypesAnswer',
        'resultWrapper' => 'DescribeLifecycleHookTypesResult',
      ],
    ],
    'DescribeLifecycleHooks' =>
    [
      'name' => 'DescribeLifecycleHooks',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeLifecycleHooksType',
      ],
      'output' =>
      [
        'shape' => 'DescribeLifecycleHooksAnswer',
        'resultWrapper' => 'DescribeLifecycleHooksResult',
      ],
    ],
    'DescribeMetricCollectionTypes' =>
    [
      'name' => 'DescribeMetricCollectionTypes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'DescribeMetricCollectionTypesAnswer',
        'resultWrapper' => 'DescribeMetricCollectionTypesResult',
      ],
    ],
    'DescribeNotificationConfigurations' =>
    [
      'name' => 'DescribeNotificationConfigurations',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeNotificationConfigurationsType',
      ],
      'output' =>
      [
        'shape' => 'DescribeNotificationConfigurationsAnswer',
        'resultWrapper' => 'DescribeNotificationConfigurationsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribePolicies' =>
    [
      'name' => 'DescribePolicies',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribePoliciesType',
      ],
      'output' =>
      [
        'shape' => 'PoliciesType',
        'resultWrapper' => 'DescribePoliciesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeScalingActivities' =>
    [
      'name' => 'DescribeScalingActivities',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeScalingActivitiesType',
      ],
      'output' =>
      [
        'shape' => 'ActivitiesType',
        'resultWrapper' => 'DescribeScalingActivitiesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeScalingProcessTypes' =>
    [
      'name' => 'DescribeScalingProcessTypes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'ProcessesType',
        'resultWrapper' => 'DescribeScalingProcessTypesResult',
      ],
    ],
    'DescribeScheduledActions' =>
    [
      'name' => 'DescribeScheduledActions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeScheduledActionsType',
      ],
      'output' =>
      [
        'shape' => 'ScheduledActionsType',
        'resultWrapper' => 'DescribeScheduledActionsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeTags' =>
    [
      'name' => 'DescribeTags',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeTagsType',
      ],
      'output' =>
      [
        'shape' => 'TagsType',
        'resultWrapper' => 'DescribeTagsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeTerminationPolicyTypes' =>
    [
      'name' => 'DescribeTerminationPolicyTypes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'DescribeTerminationPolicyTypesAnswer',
        'resultWrapper' => 'DescribeTerminationPolicyTypesResult',
      ],
    ],
    'DetachInstances' =>
    [
      'name' => 'DetachInstances',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DetachInstancesQuery',
      ],
      'output' =>
      [
        'shape' => 'DetachInstancesAnswer',
        'resultWrapper' => 'DetachInstancesResult',
      ],
    ],
    'DisableMetricsCollection' =>
    [
      'name' => 'DisableMetricsCollection',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DisableMetricsCollectionQuery',
      ],
    ],
    'EnableMetricsCollection' =>
    [
      'name' => 'EnableMetricsCollection',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'EnableMetricsCollectionQuery',
      ],
    ],
    'EnterStandby' =>
    [
      'name' => 'EnterStandby',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'EnterStandbyQuery',
      ],
      'output' =>
      [
        'shape' => 'EnterStandbyAnswer',
        'resultWrapper' => 'EnterStandbyResult',
      ],
    ],
    'ExecutePolicy' =>
    [
      'name' => 'ExecutePolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ExecutePolicyType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ScalingActivityInProgressFault',
          'error' =>
          [
            'code' => 'ScalingActivityInProgress',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ExitStandby' =>
    [
      'name' => 'ExitStandby',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ExitStandbyQuery',
      ],
      'output' =>
      [
        'shape' => 'ExitStandbyAnswer',
        'resultWrapper' => 'ExitStandbyResult',
      ],
    ],
    'PutLifecycleHook' =>
    [
      'name' => 'PutLifecycleHook',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutLifecycleHookType',
      ],
      'output' =>
      [
        'shape' => 'PutLifecycleHookAnswer',
        'resultWrapper' => 'PutLifecycleHookResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededFault',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PutNotificationConfiguration' =>
    [
      'name' => 'PutNotificationConfiguration',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutNotificationConfigurationType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededFault',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PutScalingPolicy' =>
    [
      'name' => 'PutScalingPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutScalingPolicyType',
      ],
      'output' =>
      [
        'shape' => 'PolicyARNType',
        'resultWrapper' => 'PutScalingPolicyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededFault',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PutScheduledUpdateGroupAction' =>
    [
      'name' => 'PutScheduledUpdateGroupAction',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutScheduledUpdateGroupActionType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AlreadyExistsFault',
          'error' =>
          [
            'code' => 'AlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededFault',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RecordLifecycleActionHeartbeat' =>
    [
      'name' => 'RecordLifecycleActionHeartbeat',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RecordLifecycleActionHeartbeatType',
      ],
      'output' =>
      [
        'shape' => 'RecordLifecycleActionHeartbeatAnswer',
        'resultWrapper' => 'RecordLifecycleActionHeartbeatResult',
      ],
    ],
    'ResumeProcesses' =>
    [
      'name' => 'ResumeProcesses',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ScalingProcessQuery',
      ],
    ],
    'SetDesiredCapacity' =>
    [
      'name' => 'SetDesiredCapacity',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetDesiredCapacityType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ScalingActivityInProgressFault',
          'error' =>
          [
            'code' => 'ScalingActivityInProgress',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetInstanceHealth' =>
    [
      'name' => 'SetInstanceHealth',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetInstanceHealthQuery',
      ],
    ],
    'SuspendProcesses' =>
    [
      'name' => 'SuspendProcesses',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ScalingProcessQuery',
      ],
    ],
    'TerminateInstanceInAutoScalingGroup' =>
    [
      'name' => 'TerminateInstanceInAutoScalingGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'TerminateInstanceInAutoScalingGroupType',
      ],
      'output' =>
      [
        'shape' => 'ActivityType',
        'resultWrapper' => 'TerminateInstanceInAutoScalingGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ScalingActivityInProgressFault',
          'error' =>
          [
            'code' => 'ScalingActivityInProgress',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateAutoScalingGroup' =>
    [
      'name' => 'UpdateAutoScalingGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateAutoScalingGroupType',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ScalingActivityInProgressFault',
          'error' =>
          [
            'code' => 'ScalingActivityInProgress',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'Activities' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Activity',
      ],
    ],
    'ActivitiesType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Activities',
      ],
      'members' =>
      [
        'Activities' =>
        [
          'shape' => 'Activities',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'Activity' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ActivityId',
        1 => 'AutoScalingGroupName',
        2 => 'Cause',
        3 => 'StartTime',
        4 => 'StatusCode',
      ],
      'members' =>
      [
        'ActivityId' =>
        [
          'shape' => 'XmlString',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'Description' =>
        [
          'shape' => 'XmlString',
        ],
        'Cause' =>
        [
          'shape' => 'XmlStringMaxLen1023',
        ],
        'StartTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'EndTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'StatusCode' =>
        [
          'shape' => 'ScalingActivityStatusCode',
        ],
        'StatusMessage' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'Progress' =>
        [
          'shape' => 'Progress',
        ],
        'Details' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'ActivityIds' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlString',
      ],
    ],
    'ActivityType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Activity' =>
        [
          'shape' => 'Activity',
        ],
      ],
    ],
    'AdjustmentType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AdjustmentType' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'AdjustmentTypes' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AdjustmentType',
      ],
    ],
    'Alarm' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AlarmName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'AlarmARN' =>
        [
          'shape' => 'ResourceName',
        ],
      ],
    ],
    'Alarms' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Alarm',
      ],
    ],
    'AlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
      'error' =>
      [
        'code' => 'AlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'AsciiStringMaxLen255' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
      'pattern' => '[A-Za-z0-9\\-_\\/]+',
    ],
    'AssociatePublicIpAddress' =>
    [
      'type' => 'boolean',
    ],
    'AttachInstancesQuery' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
      ],
      'members' =>
      [
        'InstanceIds' =>
        [
          'shape' => 'InstanceIds',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
      ],
    ],
    'AutoScalingGroup' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'LaunchConfigurationName',
        2 => 'MinSize',
        3 => 'MaxSize',
        4 => 'DesiredCapacity',
        5 => 'DefaultCooldown',
        6 => 'AvailabilityZones',
        7 => 'HealthCheckType',
        8 => 'CreatedTime',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'AutoScalingGroupARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'LaunchConfigurationName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'MinSize' =>
        [
          'shape' => 'AutoScalingGroupMinSize',
        ],
        'MaxSize' =>
        [
          'shape' => 'AutoScalingGroupMaxSize',
        ],
        'DesiredCapacity' =>
        [
          'shape' => 'AutoScalingGroupDesiredCapacity',
        ],
        'DefaultCooldown' =>
        [
          'shape' => 'Cooldown',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZones',
        ],
        'LoadBalancerNames' =>
        [
          'shape' => 'LoadBalancerNames',
        ],
        'HealthCheckType' =>
        [
          'shape' => 'XmlStringMaxLen32',
        ],
        'HealthCheckGracePeriod' =>
        [
          'shape' => 'HealthCheckGracePeriod',
        ],
        'Instances' =>
        [
          'shape' => 'Instances',
        ],
        'CreatedTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'SuspendedProcesses' =>
        [
          'shape' => 'SuspendedProcesses',
        ],
        'PlacementGroup' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'VPCZoneIdentifier' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'EnabledMetrics' =>
        [
          'shape' => 'EnabledMetrics',
        ],
        'Status' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'Tags' =>
        [
          'shape' => 'TagDescriptionList',
        ],
        'TerminationPolicies' =>
        [
          'shape' => 'TerminationPolicies',
        ],
      ],
    ],
    'AutoScalingGroupDesiredCapacity' =>
    [
      'type' => 'integer',
    ],
    'AutoScalingGroupMaxSize' =>
    [
      'type' => 'integer',
    ],
    'AutoScalingGroupMinSize' =>
    [
      'type' => 'integer',
    ],
    'AutoScalingGroupNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ResourceName',
      ],
    ],
    'AutoScalingGroupNamesType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AutoScalingGroupNames' =>
        [
          'shape' => 'AutoScalingGroupNames',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
      ],
    ],
    'AutoScalingGroups' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AutoScalingGroup',
      ],
    ],
    'AutoScalingGroupsType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroups',
      ],
      'members' =>
      [
        'AutoScalingGroups' =>
        [
          'shape' => 'AutoScalingGroups',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'AutoScalingInstanceDetails' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
        1 => 'AutoScalingGroupName',
        2 => 'AvailabilityZone',
        3 => 'LifecycleState',
        4 => 'HealthStatus',
        5 => 'LaunchConfigurationName',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'XmlStringMaxLen16',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'LifecycleState' =>
        [
          'shape' => 'XmlStringMaxLen32',
        ],
        'HealthStatus' =>
        [
          'shape' => 'XmlStringMaxLen32',
        ],
        'LaunchConfigurationName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'AutoScalingInstances' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AutoScalingInstanceDetails',
      ],
    ],
    'AutoScalingInstancesType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AutoScalingInstances' =>
        [
          'shape' => 'AutoScalingInstances',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'AutoScalingNotificationTypes' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen255',
      ],
    ],
    'AvailabilityZones' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen255',
      ],
      'min' => 1,
    ],
    'BlockDeviceEbsDeleteOnTermination' =>
    [
      'type' => 'boolean',
    ],
    'BlockDeviceEbsIops' =>
    [
      'type' => 'integer',
      'min' => 100,
      'max' => 4000,
    ],
    'BlockDeviceEbsVolumeSize' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 1024,
    ],
    'BlockDeviceEbsVolumeType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'BlockDeviceMapping' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DeviceName',
      ],
      'members' =>
      [
        'VirtualName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'DeviceName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'Ebs' =>
        [
          'shape' => 'Ebs',
        ],
        'NoDevice' =>
        [
          'shape' => 'NoDevice',
        ],
      ],
    ],
    'BlockDeviceMappings' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'BlockDeviceMapping',
      ],
    ],
    'CompleteLifecycleActionAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'CompleteLifecycleActionType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LifecycleHookName',
        1 => 'AutoScalingGroupName',
        2 => 'LifecycleActionToken',
        3 => 'LifecycleActionResult',
      ],
      'members' =>
      [
        'LifecycleHookName' =>
        [
          'shape' => 'AsciiStringMaxLen255',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'LifecycleActionToken' =>
        [
          'shape' => 'LifecycleActionToken',
        ],
        'LifecycleActionResult' =>
        [
          'shape' => 'LifecycleActionResult',
        ],
      ],
    ],
    'Cooldown' =>
    [
      'type' => 'integer',
    ],
    'CreateAutoScalingGroupType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'MinSize',
        2 => 'MaxSize',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'LaunchConfigurationName' =>
        [
          'shape' => 'ResourceName',
        ],
        'InstanceId' =>
        [
          'shape' => 'XmlStringMaxLen16',
        ],
        'MinSize' =>
        [
          'shape' => 'AutoScalingGroupMinSize',
        ],
        'MaxSize' =>
        [
          'shape' => 'AutoScalingGroupMaxSize',
        ],
        'DesiredCapacity' =>
        [
          'shape' => 'AutoScalingGroupDesiredCapacity',
        ],
        'DefaultCooldown' =>
        [
          'shape' => 'Cooldown',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZones',
        ],
        'LoadBalancerNames' =>
        [
          'shape' => 'LoadBalancerNames',
        ],
        'HealthCheckType' =>
        [
          'shape' => 'XmlStringMaxLen32',
        ],
        'HealthCheckGracePeriod' =>
        [
          'shape' => 'HealthCheckGracePeriod',
        ],
        'PlacementGroup' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'VPCZoneIdentifier' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'TerminationPolicies' =>
        [
          'shape' => 'TerminationPolicies',
        ],
        'Tags' =>
        [
          'shape' => 'Tags',
        ],
      ],
    ],
    'CreateLaunchConfigurationType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LaunchConfigurationName',
      ],
      'members' =>
      [
        'LaunchConfigurationName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'ImageId' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'KeyName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'SecurityGroups' =>
        [
          'shape' => 'SecurityGroups',
        ],
        'UserData' =>
        [
          'shape' => 'XmlStringUserData',
        ],
        'InstanceId' =>
        [
          'shape' => 'XmlStringMaxLen16',
        ],
        'InstanceType' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'KernelId' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'RamdiskId' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'BlockDeviceMappings' =>
        [
          'shape' => 'BlockDeviceMappings',
        ],
        'InstanceMonitoring' =>
        [
          'shape' => 'InstanceMonitoring',
        ],
        'SpotPrice' =>
        [
          'shape' => 'SpotPrice',
        ],
        'IamInstanceProfile' =>
        [
          'shape' => 'XmlStringMaxLen1600',
        ],
        'EbsOptimized' =>
        [
          'shape' => 'EbsOptimized',
        ],
        'AssociatePublicIpAddress' =>
        [
          'shape' => 'AssociatePublicIpAddress',
        ],
        'PlacementTenancy' =>
        [
          'shape' => 'XmlStringMaxLen64',
        ],
      ],
    ],
    'CreateOrUpdateTagsType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Tags',
      ],
      'members' =>
      [
        'Tags' =>
        [
          'shape' => 'Tags',
        ],
      ],
    ],
    'DeleteAutoScalingGroupType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'ForceDelete' =>
        [
          'shape' => 'ForceDelete',
        ],
      ],
    ],
    'DeleteLifecycleHookAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'DeleteLifecycleHookType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LifecycleHookName',
        1 => 'AutoScalingGroupName',
      ],
      'members' =>
      [
        'LifecycleHookName' =>
        [
          'shape' => 'AsciiStringMaxLen255',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
      ],
    ],
    'DeleteNotificationConfigurationType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'TopicARN',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'TopicARN' =>
        [
          'shape' => 'ResourceName',
        ],
      ],
    ],
    'DeletePolicyType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PolicyName',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'PolicyName' =>
        [
          'shape' => 'ResourceName',
        ],
      ],
    ],
    'DeleteScheduledActionType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ScheduledActionName',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'ScheduledActionName' =>
        [
          'shape' => 'ResourceName',
        ],
      ],
    ],
    'DeleteTagsType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Tags',
      ],
      'members' =>
      [
        'Tags' =>
        [
          'shape' => 'Tags',
        ],
      ],
    ],
    'DescribeAccountLimitsAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MaxNumberOfAutoScalingGroups' =>
        [
          'shape' => 'MaxNumberOfAutoScalingGroups',
        ],
        'MaxNumberOfLaunchConfigurations' =>
        [
          'shape' => 'MaxNumberOfLaunchConfigurations',
        ],
      ],
    ],
    'DescribeAdjustmentTypesAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AdjustmentTypes' =>
        [
          'shape' => 'AdjustmentTypes',
        ],
      ],
    ],
    'DescribeAutoScalingInstancesType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceIds' =>
        [
          'shape' => 'InstanceIds',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'DescribeAutoScalingNotificationTypesAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AutoScalingNotificationTypes' =>
        [
          'shape' => 'AutoScalingNotificationTypes',
        ],
      ],
    ],
    'DescribeLifecycleHookTypesAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LifecycleHookTypes' =>
        [
          'shape' => 'AutoScalingNotificationTypes',
        ],
      ],
    ],
    'DescribeLifecycleHooksAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LifecycleHooks' =>
        [
          'shape' => 'LifecycleHooks',
        ],
      ],
    ],
    'DescribeLifecycleHooksType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'LifecycleHookNames' =>
        [
          'shape' => 'LifecycleHookNames',
        ],
      ],
    ],
    'DescribeMetricCollectionTypesAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Metrics' =>
        [
          'shape' => 'MetricCollectionTypes',
        ],
        'Granularities' =>
        [
          'shape' => 'MetricGranularityTypes',
        ],
      ],
    ],
    'DescribeNotificationConfigurationsAnswer' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'NotificationConfigurations',
      ],
      'members' =>
      [
        'NotificationConfigurations' =>
        [
          'shape' => 'NotificationConfigurations',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'DescribeNotificationConfigurationsType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AutoScalingGroupNames' =>
        [
          'shape' => 'AutoScalingGroupNames',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
      ],
    ],
    'DescribePoliciesType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'PolicyNames' =>
        [
          'shape' => 'PolicyNames',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
      ],
    ],
    'DescribeScalingActivitiesType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ActivityIds' =>
        [
          'shape' => 'ActivityIds',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'DescribeScheduledActionsType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'ScheduledActionNames' =>
        [
          'shape' => 'ScheduledActionNames',
        ],
        'StartTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'EndTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
      ],
    ],
    'DescribeTagsType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Filters' =>
        [
          'shape' => 'Filters',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
      ],
    ],
    'DescribeTerminationPolicyTypesAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TerminationPolicyTypes' =>
        [
          'shape' => 'TerminationPolicies',
        ],
      ],
    ],
    'DetachInstancesAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Activities' =>
        [
          'shape' => 'Activities',
        ],
      ],
    ],
    'DetachInstancesQuery' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'ShouldDecrementDesiredCapacity',
      ],
      'members' =>
      [
        'InstanceIds' =>
        [
          'shape' => 'InstanceIds',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'ShouldDecrementDesiredCapacity' =>
        [
          'shape' => 'ShouldDecrementDesiredCapacity',
        ],
      ],
    ],
    'DisableMetricsCollectionQuery' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'Metrics' =>
        [
          'shape' => 'Metrics',
        ],
      ],
    ],
    'Ebs' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SnapshotId' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'VolumeSize' =>
        [
          'shape' => 'BlockDeviceEbsVolumeSize',
        ],
        'VolumeType' =>
        [
          'shape' => 'BlockDeviceEbsVolumeType',
        ],
        'DeleteOnTermination' =>
        [
          'shape' => 'BlockDeviceEbsDeleteOnTermination',
        ],
        'Iops' =>
        [
          'shape' => 'BlockDeviceEbsIops',
        ],
      ],
    ],
    'EbsOptimized' =>
    [
      'type' => 'boolean',
    ],
    'EnableMetricsCollectionQuery' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'Granularity',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'Metrics' =>
        [
          'shape' => 'Metrics',
        ],
        'Granularity' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'EnabledMetric' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Metric' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'Granularity' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'EnabledMetrics' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'EnabledMetric',
      ],
    ],
    'EnterStandbyAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Activities' =>
        [
          'shape' => 'Activities',
        ],
      ],
    ],
    'EnterStandbyQuery' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'ShouldDecrementDesiredCapacity',
      ],
      'members' =>
      [
        'InstanceIds' =>
        [
          'shape' => 'InstanceIds',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'ShouldDecrementDesiredCapacity' =>
        [
          'shape' => 'ShouldDecrementDesiredCapacity',
        ],
      ],
    ],
    'ExecutePolicyType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PolicyName',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'PolicyName' =>
        [
          'shape' => 'ResourceName',
        ],
        'HonorCooldown' =>
        [
          'shape' => 'HonorCooldown',
        ],
      ],
    ],
    'ExitStandbyAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Activities' =>
        [
          'shape' => 'Activities',
        ],
      ],
    ],
    'ExitStandbyQuery' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
      ],
      'members' =>
      [
        'InstanceIds' =>
        [
          'shape' => 'InstanceIds',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
      ],
    ],
    'Filter' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'XmlString',
        ],
        'Values' =>
        [
          'shape' => 'Values',
        ],
      ],
    ],
    'Filters' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Filter',
      ],
    ],
    'ForceDelete' =>
    [
      'type' => 'boolean',
    ],
    'GlobalTimeout' =>
    [
      'type' => 'integer',
    ],
    'HealthCheckGracePeriod' =>
    [
      'type' => 'integer',
    ],
    'HeartbeatTimeout' =>
    [
      'type' => 'integer',
    ],
    'HonorCooldown' =>
    [
      'type' => 'boolean',
    ],
    'Instance' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
        1 => 'AvailabilityZone',
        2 => 'LifecycleState',
        3 => 'HealthStatus',
        4 => 'LaunchConfigurationName',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'XmlStringMaxLen16',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'LifecycleState' =>
        [
          'shape' => 'LifecycleState',
        ],
        'HealthStatus' =>
        [
          'shape' => 'XmlStringMaxLen32',
        ],
        'LaunchConfigurationName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'InstanceIds' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen16',
      ],
    ],
    'InstanceMonitoring' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Enabled' =>
        [
          'shape' => 'MonitoringEnabled',
        ],
      ],
    ],
    'Instances' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Instance',
      ],
    ],
    'InvalidNextToken' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidNextToken',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'LaunchConfiguration' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LaunchConfigurationName',
        1 => 'ImageId',
        2 => 'InstanceType',
        3 => 'CreatedTime',
      ],
      'members' =>
      [
        'LaunchConfigurationName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'LaunchConfigurationARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'ImageId' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'KeyName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'SecurityGroups' =>
        [
          'shape' => 'SecurityGroups',
        ],
        'UserData' =>
        [
          'shape' => 'XmlStringUserData',
        ],
        'InstanceType' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'KernelId' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'RamdiskId' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'BlockDeviceMappings' =>
        [
          'shape' => 'BlockDeviceMappings',
        ],
        'InstanceMonitoring' =>
        [
          'shape' => 'InstanceMonitoring',
        ],
        'SpotPrice' =>
        [
          'shape' => 'SpotPrice',
        ],
        'IamInstanceProfile' =>
        [
          'shape' => 'XmlStringMaxLen1600',
        ],
        'CreatedTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'EbsOptimized' =>
        [
          'shape' => 'EbsOptimized',
        ],
        'AssociatePublicIpAddress' =>
        [
          'shape' => 'AssociatePublicIpAddress',
        ],
        'PlacementTenancy' =>
        [
          'shape' => 'XmlStringMaxLen64',
        ],
      ],
    ],
    'LaunchConfigurationNameType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LaunchConfigurationName',
      ],
      'members' =>
      [
        'LaunchConfigurationName' =>
        [
          'shape' => 'ResourceName',
        ],
      ],
    ],
    'LaunchConfigurationNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ResourceName',
      ],
    ],
    'LaunchConfigurationNamesType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LaunchConfigurationNames' =>
        [
          'shape' => 'LaunchConfigurationNames',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
      ],
    ],
    'LaunchConfigurations' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'LaunchConfiguration',
      ],
    ],
    'LaunchConfigurationsType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LaunchConfigurations',
      ],
      'members' =>
      [
        'LaunchConfigurations' =>
        [
          'shape' => 'LaunchConfigurations',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'LifecycleActionResult' =>
    [
      'type' => 'string',
    ],
    'LifecycleActionToken' =>
    [
      'type' => 'string',
      'min' => 36,
      'max' => 36,
    ],
    'LifecycleHook' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LifecycleHookName' =>
        [
          'shape' => 'AsciiStringMaxLen255',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'LifecycleTransition' =>
        [
          'shape' => 'LifecycleTransition',
        ],
        'NotificationTargetARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'RoleARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'NotificationMetadata' =>
        [
          'shape' => 'XmlStringMaxLen1023',
        ],
        'HeartbeatTimeout' =>
        [
          'shape' => 'HeartbeatTimeout',
        ],
        'GlobalTimeout' =>
        [
          'shape' => 'GlobalTimeout',
        ],
        'DefaultResult' =>
        [
          'shape' => 'LifecycleActionResult',
        ],
      ],
    ],
    'LifecycleHookNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AsciiStringMaxLen255',
      ],
    ],
    'LifecycleHooks' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'LifecycleHook',
      ],
    ],
    'LifecycleState' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'Pending',
        1 => 'Pending:Wait',
        2 => 'Pending:Proceed',
        3 => 'Quarantined',
        4 => 'InService',
        5 => 'Terminating',
        6 => 'Terminating:Wait',
        7 => 'Terminating:Proceed',
        8 => 'Terminated',
        9 => 'Detaching',
        10 => 'Detached',
        11 => 'EnteringStandby',
        12 => 'Standby',
      ],
    ],
    'LifecycleTransition' =>
    [
      'type' => 'string',
    ],
    'LimitExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
      'error' =>
      [
        'code' => 'LimitExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'LoadBalancerNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen255',
      ],
    ],
    'MaxNumberOfAutoScalingGroups' =>
    [
      'type' => 'integer',
    ],
    'MaxNumberOfLaunchConfigurations' =>
    [
      'type' => 'integer',
    ],
    'MaxRecords' =>
    [
      'type' => 'integer',
    ],
    'MetricCollectionType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Metric' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'MetricCollectionTypes' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'MetricCollectionType',
      ],
    ],
    'MetricGranularityType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Granularity' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'MetricGranularityTypes' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'MetricGranularityType',
      ],
    ],
    'Metrics' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen255',
      ],
    ],
    'MinAdjustmentStep' =>
    [
      'type' => 'integer',
    ],
    'MonitoringEnabled' =>
    [
      'type' => 'boolean',
    ],
    'NoDevice' =>
    [
      'type' => 'boolean',
    ],
    'NotificationConfiguration' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'TopicARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'NotificationType' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'NotificationConfigurations' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'NotificationConfiguration',
      ],
    ],
    'PoliciesType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ScalingPolicies' =>
        [
          'shape' => 'ScalingPolicies',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'PolicyARNType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PolicyARN' =>
        [
          'shape' => 'ResourceName',
        ],
      ],
    ],
    'PolicyIncrement' =>
    [
      'type' => 'integer',
    ],
    'PolicyNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ResourceName',
      ],
    ],
    'ProcessNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen255',
      ],
    ],
    'ProcessType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ProcessName',
      ],
      'members' =>
      [
        'ProcessName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'Processes' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ProcessType',
      ],
    ],
    'ProcessesType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Processes' =>
        [
          'shape' => 'Processes',
        ],
      ],
    ],
    'Progress' =>
    [
      'type' => 'integer',
    ],
    'PropagateAtLaunch' =>
    [
      'type' => 'boolean',
    ],
    'PutLifecycleHookAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'PutLifecycleHookType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LifecycleHookName',
        1 => 'AutoScalingGroupName',
      ],
      'members' =>
      [
        'LifecycleHookName' =>
        [
          'shape' => 'AsciiStringMaxLen255',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'LifecycleTransition' =>
        [
          'shape' => 'LifecycleTransition',
        ],
        'RoleARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'NotificationTargetARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'NotificationMetadata' =>
        [
          'shape' => 'XmlStringMaxLen1023',
        ],
        'HeartbeatTimeout' =>
        [
          'shape' => 'HeartbeatTimeout',
        ],
        'DefaultResult' =>
        [
          'shape' => 'LifecycleActionResult',
        ],
      ],
    ],
    'PutNotificationConfigurationType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'TopicARN',
        2 => 'NotificationTypes',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'TopicARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'NotificationTypes' =>
        [
          'shape' => 'AutoScalingNotificationTypes',
        ],
      ],
    ],
    'PutScalingPolicyType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'PolicyName',
        2 => 'ScalingAdjustment',
        3 => 'AdjustmentType',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'PolicyName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'ScalingAdjustment' =>
        [
          'shape' => 'PolicyIncrement',
        ],
        'AdjustmentType' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'Cooldown' =>
        [
          'shape' => 'Cooldown',
        ],
        'MinAdjustmentStep' =>
        [
          'shape' => 'MinAdjustmentStep',
        ],
      ],
    ],
    'PutScheduledUpdateGroupActionType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'ScheduledActionName',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'ScheduledActionName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'Time' =>
        [
          'shape' => 'TimestampType',
        ],
        'StartTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'EndTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'Recurrence' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'MinSize' =>
        [
          'shape' => 'AutoScalingGroupMinSize',
        ],
        'MaxSize' =>
        [
          'shape' => 'AutoScalingGroupMaxSize',
        ],
        'DesiredCapacity' =>
        [
          'shape' => 'AutoScalingGroupDesiredCapacity',
        ],
      ],
    ],
    'RecordLifecycleActionHeartbeatAnswer' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'RecordLifecycleActionHeartbeatType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LifecycleHookName',
        1 => 'AutoScalingGroupName',
        2 => 'LifecycleActionToken',
      ],
      'members' =>
      [
        'LifecycleHookName' =>
        [
          'shape' => 'AsciiStringMaxLen255',
        ],
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'LifecycleActionToken' =>
        [
          'shape' => 'LifecycleActionToken',
        ],
      ],
    ],
    'ResourceInUseFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
      'error' =>
      [
        'code' => 'ResourceInUse',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ResourceName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 1600,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'ScalingActivityInProgressFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
      'error' =>
      [
        'code' => 'ScalingActivityInProgress',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ScalingActivityStatusCode' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'WaitingForSpotInstanceRequestId',
        1 => 'WaitingForSpotInstanceId',
        2 => 'WaitingForInstanceId',
        3 => 'PreInService',
        4 => 'InProgress',
        5 => 'WaitingForELBConnectionDraining',
        6 => 'MidLifecycleAction',
        7 => 'Successful',
        8 => 'Failed',
        9 => 'Cancelled',
      ],
    ],
    'ScalingPolicies' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ScalingPolicy',
      ],
    ],
    'ScalingPolicy' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'PolicyName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'ScalingAdjustment' =>
        [
          'shape' => 'PolicyIncrement',
        ],
        'AdjustmentType' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'Cooldown' =>
        [
          'shape' => 'Cooldown',
        ],
        'PolicyARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'Alarms' =>
        [
          'shape' => 'Alarms',
        ],
        'MinAdjustmentStep' =>
        [
          'shape' => 'MinAdjustmentStep',
        ],
      ],
    ],
    'ScalingProcessQuery' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'ScalingProcesses' =>
        [
          'shape' => 'ProcessNames',
        ],
      ],
    ],
    'ScheduledActionNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ResourceName',
      ],
    ],
    'ScheduledActionsType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ScheduledUpdateGroupActions' =>
        [
          'shape' => 'ScheduledUpdateGroupActions',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'ScheduledUpdateGroupAction' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'ScheduledActionName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'ScheduledActionARN' =>
        [
          'shape' => 'ResourceName',
        ],
        'Time' =>
        [
          'shape' => 'TimestampType',
        ],
        'StartTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'EndTime' =>
        [
          'shape' => 'TimestampType',
        ],
        'Recurrence' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'MinSize' =>
        [
          'shape' => 'AutoScalingGroupMinSize',
        ],
        'MaxSize' =>
        [
          'shape' => 'AutoScalingGroupMaxSize',
        ],
        'DesiredCapacity' =>
        [
          'shape' => 'AutoScalingGroupDesiredCapacity',
        ],
      ],
    ],
    'ScheduledUpdateGroupActions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ScheduledUpdateGroupAction',
      ],
    ],
    'SecurityGroups' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlString',
      ],
    ],
    'SetDesiredCapacityType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
        1 => 'DesiredCapacity',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'DesiredCapacity' =>
        [
          'shape' => 'AutoScalingGroupDesiredCapacity',
        ],
        'HonorCooldown' =>
        [
          'shape' => 'HonorCooldown',
        ],
      ],
    ],
    'SetInstanceHealthQuery' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
        1 => 'HealthStatus',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'XmlStringMaxLen16',
        ],
        'HealthStatus' =>
        [
          'shape' => 'XmlStringMaxLen32',
        ],
        'ShouldRespectGracePeriod' =>
        [
          'shape' => 'ShouldRespectGracePeriod',
        ],
      ],
    ],
    'ShouldDecrementDesiredCapacity' =>
    [
      'type' => 'boolean',
    ],
    'ShouldRespectGracePeriod' =>
    [
      'type' => 'boolean',
    ],
    'SpotPrice' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'SuspendedProcess' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ProcessName' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'SuspensionReason' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
      ],
    ],
    'SuspendedProcesses' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'SuspendedProcess',
      ],
    ],
    'Tag' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Key',
      ],
      'members' =>
      [
        'ResourceId' =>
        [
          'shape' => 'XmlString',
        ],
        'ResourceType' =>
        [
          'shape' => 'XmlString',
        ],
        'Key' =>
        [
          'shape' => 'TagKey',
        ],
        'Value' =>
        [
          'shape' => 'TagValue',
        ],
        'PropagateAtLaunch' =>
        [
          'shape' => 'PropagateAtLaunch',
        ],
      ],
    ],
    'TagDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ResourceId' =>
        [
          'shape' => 'XmlString',
        ],
        'ResourceType' =>
        [
          'shape' => 'XmlString',
        ],
        'Key' =>
        [
          'shape' => 'TagKey',
        ],
        'Value' =>
        [
          'shape' => 'TagValue',
        ],
        'PropagateAtLaunch' =>
        [
          'shape' => 'PropagateAtLaunch',
        ],
      ],
    ],
    'TagDescriptionList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'TagDescription',
      ],
    ],
    'TagKey' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'TagValue' =>
    [
      'type' => 'string',
      'min' => 0,
      'max' => 256,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'Tags' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Tag',
      ],
    ],
    'TagsType' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Tags' =>
        [
          'shape' => 'TagDescriptionList',
        ],
        'NextToken' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'TerminateInstanceInAutoScalingGroupType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
        1 => 'ShouldDecrementDesiredCapacity',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'XmlStringMaxLen16',
        ],
        'ShouldDecrementDesiredCapacity' =>
        [
          'shape' => 'ShouldDecrementDesiredCapacity',
        ],
      ],
    ],
    'TerminationPolicies' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen1600',
      ],
    ],
    'TimestampType' =>
    [
      'type' => 'timestamp',
    ],
    'UpdateAutoScalingGroupType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AutoScalingGroupName',
      ],
      'members' =>
      [
        'AutoScalingGroupName' =>
        [
          'shape' => 'ResourceName',
        ],
        'LaunchConfigurationName' =>
        [
          'shape' => 'ResourceName',
        ],
        'MinSize' =>
        [
          'shape' => 'AutoScalingGroupMinSize',
        ],
        'MaxSize' =>
        [
          'shape' => 'AutoScalingGroupMaxSize',
        ],
        'DesiredCapacity' =>
        [
          'shape' => 'AutoScalingGroupDesiredCapacity',
        ],
        'DefaultCooldown' =>
        [
          'shape' => 'Cooldown',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZones',
        ],
        'HealthCheckType' =>
        [
          'shape' => 'XmlStringMaxLen32',
        ],
        'HealthCheckGracePeriod' =>
        [
          'shape' => 'HealthCheckGracePeriod',
        ],
        'PlacementGroup' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'VPCZoneIdentifier' =>
        [
          'shape' => 'XmlStringMaxLen255',
        ],
        'TerminationPolicies' =>
        [
          'shape' => 'TerminationPolicies',
        ],
      ],
    ],
    'Values' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlString',
      ],
    ],
    'XmlString' =>
    [
      'type' => 'string',
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'XmlStringMaxLen1023' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 1023,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'XmlStringMaxLen16' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 16,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'XmlStringMaxLen1600' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 1600,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'XmlStringMaxLen255' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'XmlStringMaxLen32' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 32,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'XmlStringMaxLen64' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'XmlStringUserData' =>
    [
      'type' => 'string',
      'max' => 21847,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
  ],
];