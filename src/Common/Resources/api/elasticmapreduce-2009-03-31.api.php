<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2009-03-31',
    'endpointPrefix' => 'elasticmapreduce',
    'jsonVersion' => '1.1',
    'serviceAbbreviation' => 'Amazon EMR',
    'serviceFullName' => 'Amazon Elastic MapReduce',
    'signatureVersion' => 'v4',
    'targetPrefix' => 'ElasticMapReduce',
    'timestampFormat' => 'unixTimestamp',
    'protocol' => 'json',
  ],
  'operations' =>
  [
    'AddInstanceGroups' =>
    [
      'name' => 'AddInstanceGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AddInstanceGroupsInput',
      ],
      'output' =>
      [
        'shape' => 'AddInstanceGroupsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerError',
          'error' =>
          [
            'code' => 'InternalFailure',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'AddJobFlowSteps' =>
    [
      'name' => 'AddJobFlowSteps',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AddJobFlowStepsInput',
      ],
      'output' =>
      [
        'shape' => 'AddJobFlowStepsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerError',
          'error' =>
          [
            'code' => 'InternalFailure',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'AddTags' =>
    [
      'name' => 'AddTags',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AddTagsInput',
      ],
      'output' =>
      [
        'shape' => 'AddTagsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerException',
          'exception' => true,
          'fault' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidRequestException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeCluster' =>
    [
      'name' => 'DescribeCluster',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeClusterInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeClusterOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerException',
          'exception' => true,
          'fault' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidRequestException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeJobFlows' =>
    [
      'name' => 'DescribeJobFlows',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeJobFlowsInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeJobFlowsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerError',
          'error' =>
          [
            'code' => 'InternalFailure',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
      'deprecated' => true,
    ],
    'DescribeStep' =>
    [
      'name' => 'DescribeStep',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeStepInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeStepOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerException',
          'exception' => true,
          'fault' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidRequestException',
          'exception' => true,
        ],
      ],
    ],
    'ListBootstrapActions' =>
    [
      'name' => 'ListBootstrapActions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListBootstrapActionsInput',
      ],
      'output' =>
      [
        'shape' => 'ListBootstrapActionsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerException',
          'exception' => true,
          'fault' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidRequestException',
          'exception' => true,
        ],
      ],
    ],
    'ListClusters' =>
    [
      'name' => 'ListClusters',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListClustersInput',
      ],
      'output' =>
      [
        'shape' => 'ListClustersOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerException',
          'exception' => true,
          'fault' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidRequestException',
          'exception' => true,
        ],
      ],
    ],
    'ListInstanceGroups' =>
    [
      'name' => 'ListInstanceGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListInstanceGroupsInput',
      ],
      'output' =>
      [
        'shape' => 'ListInstanceGroupsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerException',
          'exception' => true,
          'fault' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidRequestException',
          'exception' => true,
        ],
      ],
    ],
    'ListInstances' =>
    [
      'name' => 'ListInstances',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListInstancesInput',
      ],
      'output' =>
      [
        'shape' => 'ListInstancesOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerException',
          'exception' => true,
          'fault' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidRequestException',
          'exception' => true,
        ],
      ],
    ],
    'ListSteps' =>
    [
      'name' => 'ListSteps',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListStepsInput',
      ],
      'output' =>
      [
        'shape' => 'ListStepsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerException',
          'exception' => true,
          'fault' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidRequestException',
          'exception' => true,
        ],
      ],
    ],
    'ModifyInstanceGroups' =>
    [
      'name' => 'ModifyInstanceGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyInstanceGroupsInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerError',
          'error' =>
          [
            'code' => 'InternalFailure',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RemoveTags' =>
    [
      'name' => 'RemoveTags',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RemoveTagsInput',
      ],
      'output' =>
      [
        'shape' => 'RemoveTagsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerException',
          'exception' => true,
          'fault' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidRequestException',
          'exception' => true,
        ],
      ],
    ],
    'RunJobFlow' =>
    [
      'name' => 'RunJobFlow',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RunJobFlowInput',
      ],
      'output' =>
      [
        'shape' => 'RunJobFlowOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerError',
          'error' =>
          [
            'code' => 'InternalFailure',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetTerminationProtection' =>
    [
      'name' => 'SetTerminationProtection',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetTerminationProtectionInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerError',
          'error' =>
          [
            'code' => 'InternalFailure',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetVisibleToAllUsers' =>
    [
      'name' => 'SetVisibleToAllUsers',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetVisibleToAllUsersInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerError',
          'error' =>
          [
            'code' => 'InternalFailure',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'TerminateJobFlows' =>
    [
      'name' => 'TerminateJobFlows',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'TerminateJobFlowsInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerError',
          'error' =>
          [
            'code' => 'InternalFailure',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'ActionOnFailure' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'TERMINATE_JOB_FLOW',
        1 => 'TERMINATE_CLUSTER',
        2 => 'CANCEL_AND_WAIT',
        3 => 'CONTINUE',
      ],
    ],
    'AddInstanceGroupsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceGroups',
        1 => 'JobFlowId',
      ],
      'members' =>
      [
        'InstanceGroups' =>
        [
          'shape' => 'InstanceGroupConfigList',
        ],
        'JobFlowId' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
      ],
    ],
    'AddInstanceGroupsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'JobFlowId' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'InstanceGroupIds' =>
        [
          'shape' => 'InstanceGroupIdsList',
        ],
      ],
    ],
    'AddJobFlowStepsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'JobFlowId',
        1 => 'Steps',
      ],
      'members' =>
      [
        'JobFlowId' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Steps' =>
        [
          'shape' => 'StepConfigList',
        ],
      ],
    ],
    'AddJobFlowStepsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StepIds' =>
        [
          'shape' => 'StepIdsList',
        ],
      ],
    ],
    'AddTagsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceId',
        1 => 'Tags',
      ],
      'members' =>
      [
        'ResourceId' =>
        [
          'shape' => 'ResourceId',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'AddTagsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'Application' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Version' =>
        [
          'shape' => 'String',
        ],
        'Args' =>
        [
          'shape' => 'StringList',
        ],
        'AdditionalInfo' =>
        [
          'shape' => 'StringMap',
        ],
      ],
    ],
    'ApplicationList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Application',
      ],
    ],
    'Boolean' =>
    [
      'type' => 'boolean',
    ],
    'BootstrapActionConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
        1 => 'ScriptBootstrapAction',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'ScriptBootstrapAction' =>
        [
          'shape' => 'ScriptBootstrapActionConfig',
        ],
      ],
    ],
    'BootstrapActionConfigList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'BootstrapActionConfig',
      ],
    ],
    'BootstrapActionDetail' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'BootstrapActionConfig' =>
        [
          'shape' => 'BootstrapActionConfig',
        ],
      ],
    ],
    'BootstrapActionDetailList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'BootstrapActionDetail',
      ],
    ],
    'Cluster' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'ClusterId',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'ClusterStatus',
        ],
        'Ec2InstanceAttributes' =>
        [
          'shape' => 'Ec2InstanceAttributes',
        ],
        'LogUri' =>
        [
          'shape' => 'String',
        ],
        'RequestedAmiVersion' =>
        [
          'shape' => 'String',
        ],
        'RunningAmiVersion' =>
        [
          'shape' => 'String',
        ],
        'AutoTerminate' =>
        [
          'shape' => 'Boolean',
        ],
        'TerminationProtected' =>
        [
          'shape' => 'Boolean',
        ],
        'VisibleToAllUsers' =>
        [
          'shape' => 'Boolean',
        ],
        'Applications' =>
        [
          'shape' => 'ApplicationList',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
        'ServiceRole' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ClusterId' =>
    [
      'type' => 'string',
    ],
    'ClusterState' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'STARTING',
        1 => 'BOOTSTRAPPING',
        2 => 'RUNNING',
        3 => 'WAITING',
        4 => 'TERMINATING',
        5 => 'TERMINATED',
        6 => 'TERMINATED_WITH_ERRORS',
      ],
    ],
    'ClusterStateChangeReason' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Code' =>
        [
          'shape' => 'ClusterStateChangeReasonCode',
        ],
        'Message' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ClusterStateChangeReasonCode' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'INTERNAL_ERROR',
        1 => 'VALIDATION_ERROR',
        2 => 'INSTANCE_FAILURE',
        3 => 'BOOTSTRAP_FAILURE',
        4 => 'USER_REQUEST',
        5 => 'STEP_FAILURE',
        6 => 'ALL_STEPS_COMPLETED',
      ],
    ],
    'ClusterStateList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ClusterState',
      ],
    ],
    'ClusterStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'State' =>
        [
          'shape' => 'ClusterState',
        ],
        'StateChangeReason' =>
        [
          'shape' => 'ClusterStateChangeReason',
        ],
        'Timeline' =>
        [
          'shape' => 'ClusterTimeline',
        ],
      ],
    ],
    'ClusterSummary' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'ClusterId',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'ClusterStatus',
        ],
      ],
    ],
    'ClusterSummaryList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ClusterSummary',
      ],
    ],
    'ClusterTimeline' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CreationDateTime' =>
        [
          'shape' => 'Date',
        ],
        'ReadyDateTime' =>
        [
          'shape' => 'Date',
        ],
        'EndDateTime' =>
        [
          'shape' => 'Date',
        ],
      ],
    ],
    'Command' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'String',
        ],
        'ScriptPath' =>
        [
          'shape' => 'String',
        ],
        'Args' =>
        [
          'shape' => 'StringList',
        ],
      ],
    ],
    'CommandList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Command',
      ],
    ],
    'Date' =>
    [
      'type' => 'timestamp',
    ],
    'DescribeClusterInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterId',
      ],
      'members' =>
      [
        'ClusterId' =>
        [
          'shape' => 'ClusterId',
        ],
      ],
    ],
    'DescribeClusterOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Cluster' =>
        [
          'shape' => 'Cluster',
        ],
      ],
    ],
    'DescribeJobFlowsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CreatedAfter' =>
        [
          'shape' => 'Date',
        ],
        'CreatedBefore' =>
        [
          'shape' => 'Date',
        ],
        'JobFlowIds' =>
        [
          'shape' => 'XmlStringList',
        ],
        'JobFlowStates' =>
        [
          'shape' => 'JobFlowExecutionStateList',
        ],
      ],
    ],
    'DescribeJobFlowsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'JobFlows' =>
        [
          'shape' => 'JobFlowDetailList',
        ],
      ],
    ],
    'DescribeStepInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterId',
        1 => 'StepId',
      ],
      'members' =>
      [
        'ClusterId' =>
        [
          'shape' => 'ClusterId',
        ],
        'StepId' =>
        [
          'shape' => 'StepId',
        ],
      ],
    ],
    'DescribeStepOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Step' =>
        [
          'shape' => 'Step',
        ],
      ],
    ],
    'EC2InstanceIdsToTerminateList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'InstanceId',
      ],
    ],
    'Ec2InstanceAttributes' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Ec2KeyName' =>
        [
          'shape' => 'String',
        ],
        'Ec2SubnetId' =>
        [
          'shape' => 'String',
        ],
        'Ec2AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'IamInstanceProfile' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ErrorCode' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'ErrorMessage' =>
    [
      'type' => 'string',
    ],
    'HadoopJarStepConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Jar',
      ],
      'members' =>
      [
        'Properties' =>
        [
          'shape' => 'KeyValueList',
        ],
        'Jar' =>
        [
          'shape' => 'XmlString',
        ],
        'MainClass' =>
        [
          'shape' => 'XmlString',
        ],
        'Args' =>
        [
          'shape' => 'XmlStringList',
        ],
      ],
    ],
    'HadoopStepConfig' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Jar' =>
        [
          'shape' => 'String',
        ],
        'Properties' =>
        [
          'shape' => 'StringMap',
        ],
        'MainClass' =>
        [
          'shape' => 'String',
        ],
        'Args' =>
        [
          'shape' => 'StringList',
        ],
      ],
    ],
    'Instance' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'InstanceId',
        ],
        'Ec2InstanceId' =>
        [
          'shape' => 'InstanceId',
        ],
        'PublicDnsName' =>
        [
          'shape' => 'String',
        ],
        'PublicIpAddress' =>
        [
          'shape' => 'String',
        ],
        'PrivateDnsName' =>
        [
          'shape' => 'String',
        ],
        'PrivateIpAddress' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'InstanceStatus',
        ],
      ],
    ],
    'InstanceGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'InstanceGroupId',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Market' =>
        [
          'shape' => 'MarketType',
        ],
        'InstanceGroupType' =>
        [
          'shape' => 'InstanceGroupType',
        ],
        'BidPrice' =>
        [
          'shape' => 'String',
        ],
        'InstanceType' =>
        [
          'shape' => 'InstanceType',
        ],
        'RequestedInstanceCount' =>
        [
          'shape' => 'Integer',
        ],
        'RunningInstanceCount' =>
        [
          'shape' => 'Integer',
        ],
        'Status' =>
        [
          'shape' => 'InstanceGroupStatus',
        ],
      ],
    ],
    'InstanceGroupConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceRole',
        1 => 'InstanceType',
        2 => 'InstanceCount',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Market' =>
        [
          'shape' => 'MarketType',
        ],
        'InstanceRole' =>
        [
          'shape' => 'InstanceRoleType',
        ],
        'BidPrice' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'InstanceType' =>
        [
          'shape' => 'InstanceType',
        ],
        'InstanceCount' =>
        [
          'shape' => 'Integer',
        ],
      ],
    ],
    'InstanceGroupConfigList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'InstanceGroupConfig',
      ],
    ],
    'InstanceGroupDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Market',
        1 => 'InstanceRole',
        2 => 'InstanceType',
        3 => 'InstanceRequestCount',
        4 => 'InstanceRunningCount',
        5 => 'State',
        6 => 'CreationDateTime',
      ],
      'members' =>
      [
        'InstanceGroupId' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Name' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Market' =>
        [
          'shape' => 'MarketType',
        ],
        'InstanceRole' =>
        [
          'shape' => 'InstanceRoleType',
        ],
        'BidPrice' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'InstanceType' =>
        [
          'shape' => 'InstanceType',
        ],
        'InstanceRequestCount' =>
        [
          'shape' => 'Integer',
        ],
        'InstanceRunningCount' =>
        [
          'shape' => 'Integer',
        ],
        'State' =>
        [
          'shape' => 'InstanceGroupState',
        ],
        'LastStateChangeReason' =>
        [
          'shape' => 'XmlString',
        ],
        'CreationDateTime' =>
        [
          'shape' => 'Date',
        ],
        'StartDateTime' =>
        [
          'shape' => 'Date',
        ],
        'ReadyDateTime' =>
        [
          'shape' => 'Date',
        ],
        'EndDateTime' =>
        [
          'shape' => 'Date',
        ],
      ],
    ],
    'InstanceGroupDetailList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'InstanceGroupDetail',
      ],
    ],
    'InstanceGroupId' =>
    [
      'type' => 'string',
    ],
    'InstanceGroupIdsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen256',
      ],
    ],
    'InstanceGroupList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'InstanceGroup',
      ],
    ],
    'InstanceGroupModifyConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceGroupId',
      ],
      'members' =>
      [
        'InstanceGroupId' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'InstanceCount' =>
        [
          'shape' => 'Integer',
        ],
        'EC2InstanceIdsToTerminate' =>
        [
          'shape' => 'EC2InstanceIdsToTerminateList',
        ],
      ],
    ],
    'InstanceGroupModifyConfigList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'InstanceGroupModifyConfig',
      ],
    ],
    'InstanceGroupState' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'PROVISIONING',
        1 => 'BOOTSTRAPPING',
        2 => 'RUNNING',
        3 => 'RESIZING',
        4 => 'SUSPENDED',
        5 => 'TERMINATING',
        6 => 'TERMINATED',
        7 => 'ARRESTED',
        8 => 'SHUTTING_DOWN',
        9 => 'ENDED',
      ],
    ],
    'InstanceGroupStateChangeReason' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Code' =>
        [
          'shape' => 'InstanceGroupStateChangeReasonCode',
        ],
        'Message' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'InstanceGroupStateChangeReasonCode' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'INTERNAL_ERROR',
        1 => 'VALIDATION_ERROR',
        2 => 'INSTANCE_FAILURE',
        3 => 'CLUSTER_TERMINATED',
      ],
    ],
    'InstanceGroupStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'State' =>
        [
          'shape' => 'InstanceGroupState',
        ],
        'StateChangeReason' =>
        [
          'shape' => 'InstanceGroupStateChangeReason',
        ],
        'Timeline' =>
        [
          'shape' => 'InstanceGroupTimeline',
        ],
      ],
    ],
    'InstanceGroupTimeline' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CreationDateTime' =>
        [
          'shape' => 'Date',
        ],
        'ReadyDateTime' =>
        [
          'shape' => 'Date',
        ],
        'EndDateTime' =>
        [
          'shape' => 'Date',
        ],
      ],
    ],
    'InstanceGroupType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'MASTER',
        1 => 'CORE',
        2 => 'TASK',
      ],
    ],
    'InstanceGroupTypeList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'InstanceGroupType',
      ],
    ],
    'InstanceId' =>
    [
      'type' => 'string',
    ],
    'InstanceList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Instance',
      ],
    ],
    'InstanceRoleType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'MASTER',
        1 => 'CORE',
        2 => 'TASK',
      ],
    ],
    'InstanceState' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'AWAITING_FULFILLMENT',
        1 => 'PROVISIONING',
        2 => 'BOOTSTRAPPING',
        3 => 'RUNNING',
        4 => 'TERMINATED',
      ],
    ],
    'InstanceStateChangeReason' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Code' =>
        [
          'shape' => 'InstanceStateChangeReasonCode',
        ],
        'Message' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'InstanceStateChangeReasonCode' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'INTERNAL_ERROR',
        1 => 'VALIDATION_ERROR',
        2 => 'INSTANCE_FAILURE',
        3 => 'BOOTSTRAP_FAILURE',
        4 => 'CLUSTER_TERMINATED',
      ],
    ],
    'InstanceStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'State' =>
        [
          'shape' => 'InstanceState',
        ],
        'StateChangeReason' =>
        [
          'shape' => 'InstanceStateChangeReason',
        ],
        'Timeline' =>
        [
          'shape' => 'InstanceTimeline',
        ],
      ],
    ],
    'InstanceTimeline' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CreationDateTime' =>
        [
          'shape' => 'Date',
        ],
        'ReadyDateTime' =>
        [
          'shape' => 'Date',
        ],
        'EndDateTime' =>
        [
          'shape' => 'Date',
        ],
      ],
    ],
    'InstanceType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'Integer' =>
    [
      'type' => 'integer',
    ],
    'InternalServerError' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InternalFailure',
        'httpStatusCode' => 500,
      ],
      'exception' => true,
    ],
    'InternalServerException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
      'fault' => true,
    ],
    'InvalidRequestException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ErrorCode' =>
        [
          'shape' => 'ErrorCode',
        ],
        'Message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'JobFlowDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'JobFlowId',
        1 => 'Name',
        2 => 'ExecutionStatusDetail',
        3 => 'Instances',
      ],
      'members' =>
      [
        'JobFlowId' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Name' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'LogUri' =>
        [
          'shape' => 'XmlString',
        ],
        'AmiVersion' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'ExecutionStatusDetail' =>
        [
          'shape' => 'JobFlowExecutionStatusDetail',
        ],
        'Instances' =>
        [
          'shape' => 'JobFlowInstancesDetail',
        ],
        'Steps' =>
        [
          'shape' => 'StepDetailList',
        ],
        'BootstrapActions' =>
        [
          'shape' => 'BootstrapActionDetailList',
        ],
        'SupportedProducts' =>
        [
          'shape' => 'SupportedProductsList',
        ],
        'VisibleToAllUsers' =>
        [
          'shape' => 'Boolean',
        ],
        'JobFlowRole' =>
        [
          'shape' => 'XmlString',
        ],
        'ServiceRole' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'JobFlowDetailList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'JobFlowDetail',
      ],
    ],
    'JobFlowExecutionState' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'STARTING',
        1 => 'BOOTSTRAPPING',
        2 => 'RUNNING',
        3 => 'WAITING',
        4 => 'SHUTTING_DOWN',
        5 => 'TERMINATED',
        6 => 'COMPLETED',
        7 => 'FAILED',
      ],
    ],
    'JobFlowExecutionStateList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'JobFlowExecutionState',
      ],
    ],
    'JobFlowExecutionStatusDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'State',
        1 => 'CreationDateTime',
      ],
      'members' =>
      [
        'State' =>
        [
          'shape' => 'JobFlowExecutionState',
        ],
        'CreationDateTime' =>
        [
          'shape' => 'Date',
        ],
        'StartDateTime' =>
        [
          'shape' => 'Date',
        ],
        'ReadyDateTime' =>
        [
          'shape' => 'Date',
        ],
        'EndDateTime' =>
        [
          'shape' => 'Date',
        ],
        'LastStateChangeReason' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'JobFlowInstancesConfig' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MasterInstanceType' =>
        [
          'shape' => 'InstanceType',
        ],
        'SlaveInstanceType' =>
        [
          'shape' => 'InstanceType',
        ],
        'InstanceCount' =>
        [
          'shape' => 'Integer',
        ],
        'InstanceGroups' =>
        [
          'shape' => 'InstanceGroupConfigList',
        ],
        'Ec2KeyName' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Placement' =>
        [
          'shape' => 'PlacementType',
        ],
        'KeepJobFlowAliveWhenNoSteps' =>
        [
          'shape' => 'Boolean',
        ],
        'TerminationProtected' =>
        [
          'shape' => 'Boolean',
        ],
        'HadoopVersion' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Ec2SubnetId' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
      ],
    ],
    'JobFlowInstancesDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'MasterInstanceType',
        1 => 'SlaveInstanceType',
        2 => 'InstanceCount',
      ],
      'members' =>
      [
        'MasterInstanceType' =>
        [
          'shape' => 'InstanceType',
        ],
        'MasterPublicDnsName' =>
        [
          'shape' => 'XmlString',
        ],
        'MasterInstanceId' =>
        [
          'shape' => 'XmlString',
        ],
        'SlaveInstanceType' =>
        [
          'shape' => 'InstanceType',
        ],
        'InstanceCount' =>
        [
          'shape' => 'Integer',
        ],
        'InstanceGroups' =>
        [
          'shape' => 'InstanceGroupDetailList',
        ],
        'NormalizedInstanceHours' =>
        [
          'shape' => 'Integer',
        ],
        'Ec2KeyName' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Ec2SubnetId' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Placement' =>
        [
          'shape' => 'PlacementType',
        ],
        'KeepJobFlowAliveWhenNoSteps' =>
        [
          'shape' => 'Boolean',
        ],
        'TerminationProtected' =>
        [
          'shape' => 'Boolean',
        ],
        'HadoopVersion' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
      ],
    ],
    'KeyValue' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Key' =>
        [
          'shape' => 'XmlString',
        ],
        'Value' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'KeyValueList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'KeyValue',
      ],
    ],
    'ListBootstrapActionsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterId',
      ],
      'members' =>
      [
        'ClusterId' =>
        [
          'shape' => 'ClusterId',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListBootstrapActionsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'BootstrapActions' =>
        [
          'shape' => 'CommandList',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListClustersInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CreatedAfter' =>
        [
          'shape' => 'Date',
        ],
        'CreatedBefore' =>
        [
          'shape' => 'Date',
        ],
        'ClusterStates' =>
        [
          'shape' => 'ClusterStateList',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListClustersOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Clusters' =>
        [
          'shape' => 'ClusterSummaryList',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListInstanceGroupsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterId',
      ],
      'members' =>
      [
        'ClusterId' =>
        [
          'shape' => 'ClusterId',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListInstanceGroupsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceGroups' =>
        [
          'shape' => 'InstanceGroupList',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListInstancesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterId',
      ],
      'members' =>
      [
        'ClusterId' =>
        [
          'shape' => 'ClusterId',
        ],
        'InstanceGroupId' =>
        [
          'shape' => 'InstanceGroupId',
        ],
        'InstanceGroupTypes' =>
        [
          'shape' => 'InstanceGroupTypeList',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListInstancesOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Instances' =>
        [
          'shape' => 'InstanceList',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListStepsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterId',
      ],
      'members' =>
      [
        'ClusterId' =>
        [
          'shape' => 'ClusterId',
        ],
        'StepStates' =>
        [
          'shape' => 'StepStateList',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListStepsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Steps' =>
        [
          'shape' => 'StepSummaryList',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'Marker' =>
    [
      'type' => 'string',
    ],
    'MarketType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ON_DEMAND',
        1 => 'SPOT',
      ],
    ],
    'ModifyInstanceGroupsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceGroups' =>
        [
          'shape' => 'InstanceGroupModifyConfigList',
        ],
      ],
    ],
    'NewSupportedProductsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'SupportedProductConfig',
      ],
    ],
    'PlacementType' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AvailabilityZone',
      ],
      'members' =>
      [
        'AvailabilityZone' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'RemoveTagsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceId',
        1 => 'TagKeys',
      ],
      'members' =>
      [
        'ResourceId' =>
        [
          'shape' => 'ResourceId',
        ],
        'TagKeys' =>
        [
          'shape' => 'StringList',
        ],
      ],
    ],
    'RemoveTagsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'ResourceId' =>
    [
      'type' => 'string',
    ],
    'RunJobFlowInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
        1 => 'Instances',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'LogUri' =>
        [
          'shape' => 'XmlString',
        ],
        'AdditionalInfo' =>
        [
          'shape' => 'XmlString',
        ],
        'AmiVersion' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Instances' =>
        [
          'shape' => 'JobFlowInstancesConfig',
        ],
        'Steps' =>
        [
          'shape' => 'StepConfigList',
        ],
        'BootstrapActions' =>
        [
          'shape' => 'BootstrapActionConfigList',
        ],
        'SupportedProducts' =>
        [
          'shape' => 'SupportedProductsList',
        ],
        'NewSupportedProducts' =>
        [
          'shape' => 'NewSupportedProductsList',
        ],
        'VisibleToAllUsers' =>
        [
          'shape' => 'Boolean',
        ],
        'JobFlowRole' =>
        [
          'shape' => 'XmlString',
        ],
        'ServiceRole' =>
        [
          'shape' => 'XmlString',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'RunJobFlowOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'JobFlowId' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
      ],
    ],
    'ScriptBootstrapActionConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Path',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'XmlString',
        ],
        'Args' =>
        [
          'shape' => 'XmlStringList',
        ],
      ],
    ],
    'SetTerminationProtectionInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'JobFlowIds',
        1 => 'TerminationProtected',
      ],
      'members' =>
      [
        'JobFlowIds' =>
        [
          'shape' => 'XmlStringList',
        ],
        'TerminationProtected' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'SetVisibleToAllUsersInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'JobFlowIds',
        1 => 'VisibleToAllUsers',
      ],
      'members' =>
      [
        'JobFlowIds' =>
        [
          'shape' => 'XmlStringList',
        ],
        'VisibleToAllUsers' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'Step' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'StepId',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Config' =>
        [
          'shape' => 'HadoopStepConfig',
        ],
        'ActionOnFailure' =>
        [
          'shape' => 'ActionOnFailure',
        ],
        'Status' =>
        [
          'shape' => 'StepStatus',
        ],
      ],
    ],
    'StepConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
        1 => 'HadoopJarStep',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'ActionOnFailure' =>
        [
          'shape' => 'ActionOnFailure',
        ],
        'HadoopJarStep' =>
        [
          'shape' => 'HadoopJarStepConfig',
        ],
      ],
    ],
    'StepConfigList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'StepConfig',
      ],
    ],
    'StepDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StepConfig',
        1 => 'ExecutionStatusDetail',
      ],
      'members' =>
      [
        'StepConfig' =>
        [
          'shape' => 'StepConfig',
        ],
        'ExecutionStatusDetail' =>
        [
          'shape' => 'StepExecutionStatusDetail',
        ],
      ],
    ],
    'StepDetailList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'StepDetail',
      ],
    ],
    'StepExecutionState' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'PENDING',
        1 => 'RUNNING',
        2 => 'CONTINUE',
        3 => 'COMPLETED',
        4 => 'CANCELLED',
        5 => 'FAILED',
        6 => 'INTERRUPTED',
      ],
    ],
    'StepExecutionStatusDetail' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'State',
        1 => 'CreationDateTime',
      ],
      'members' =>
      [
        'State' =>
        [
          'shape' => 'StepExecutionState',
        ],
        'CreationDateTime' =>
        [
          'shape' => 'Date',
        ],
        'StartDateTime' =>
        [
          'shape' => 'Date',
        ],
        'EndDateTime' =>
        [
          'shape' => 'Date',
        ],
        'LastStateChangeReason' =>
        [
          'shape' => 'XmlString',
        ],
      ],
    ],
    'StepId' =>
    [
      'type' => 'string',
    ],
    'StepIdsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen256',
      ],
    ],
    'StepState' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'PENDING',
        1 => 'RUNNING',
        2 => 'COMPLETED',
        3 => 'CANCELLED',
        4 => 'FAILED',
        5 => 'INTERRUPTED',
      ],
    ],
    'StepStateChangeReason' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Code' =>
        [
          'shape' => 'StepStateChangeReasonCode',
        ],
        'Message' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'StepStateChangeReasonCode' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'NONE',
      ],
    ],
    'StepStateList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'StepState',
      ],
    ],
    'StepStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'State' =>
        [
          'shape' => 'StepState',
        ],
        'StateChangeReason' =>
        [
          'shape' => 'StepStateChangeReason',
        ],
        'Timeline' =>
        [
          'shape' => 'StepTimeline',
        ],
      ],
    ],
    'StepSummary' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'StepId',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'StepStatus',
        ],
      ],
    ],
    'StepSummaryList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'StepSummary',
      ],
    ],
    'StepTimeline' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CreationDateTime' =>
        [
          'shape' => 'Date',
        ],
        'StartDateTime' =>
        [
          'shape' => 'Date',
        ],
        'EndDateTime' =>
        [
          'shape' => 'Date',
        ],
      ],
    ],
    'String' =>
    [
      'type' => 'string',
    ],
    'StringList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
      ],
    ],
    'StringMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'String',
      ],
      'value' =>
      [
        'shape' => 'String',
      ],
    ],
    'SupportedProductConfig' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'XmlStringMaxLen256',
        ],
        'Args' =>
        [
          'shape' => 'XmlStringList',
        ],
      ],
    ],
    'SupportedProductsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlStringMaxLen256',
      ],
    ],
    'Tag' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Key' =>
        [
          'shape' => 'String',
        ],
        'Value' =>
        [
          'shape' => 'String',
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
    ],
    'TerminateJobFlowsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'JobFlowIds',
      ],
      'members' =>
      [
        'JobFlowIds' =>
        [
          'shape' => 'XmlStringList',
        ],
      ],
    ],
    'XmlString' =>
    [
      'type' => 'string',
      'min' => 0,
      'max' => 10280,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
    'XmlStringList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'XmlString',
      ],
    ],
    'XmlStringMaxLen256' =>
    [
      'type' => 'string',
      'min' => 0,
      'max' => 256,
      'pattern' => '[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDC00-\\uDBFF\\uDFFF\\r\\n\\t]*',
    ],
  ],
];