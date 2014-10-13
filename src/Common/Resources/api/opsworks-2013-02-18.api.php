<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2013-02-18',
    'endpointPrefix' => 'opsworks',
    'jsonVersion' => '1.1',
    'serviceFullName' => 'AWS OpsWorks',
    'signatureVersion' => 'v4',
    'targetPrefix' => 'OpsWorks_20130218',
    'protocol' => 'json',
  ],
  'operations' =>
  [
    'AssignVolume' =>
    [
      'name' => 'AssignVolume',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AssignVolumeRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'AssociateElasticIp' =>
    [
      'name' => 'AssociateElasticIp',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AssociateElasticIpRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'AttachElasticLoadBalancer' =>
    [
      'name' => 'AttachElasticLoadBalancer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AttachElasticLoadBalancerRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'CloneStack' =>
    [
      'name' => 'CloneStack',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CloneStackRequest',
      ],
      'output' =>
      [
        'shape' => 'CloneStackResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'CreateApp' =>
    [
      'name' => 'CreateApp',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateAppRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateAppResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'CreateDeployment' =>
    [
      'name' => 'CreateDeployment',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateDeploymentRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateDeploymentResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'CreateInstance' =>
    [
      'name' => 'CreateInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateInstanceRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateInstanceResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'CreateLayer' =>
    [
      'name' => 'CreateLayer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateLayerRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateLayerResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'CreateStack' =>
    [
      'name' => 'CreateStack',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateStackRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateStackResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
      ],
    ],
    'CreateUserProfile' =>
    [
      'name' => 'CreateUserProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateUserProfileRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateUserProfileResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
      ],
    ],
    'DeleteApp' =>
    [
      'name' => 'DeleteApp',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteAppRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DeleteInstance' =>
    [
      'name' => 'DeleteInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteInstanceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DeleteLayer' =>
    [
      'name' => 'DeleteLayer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteLayerRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DeleteStack' =>
    [
      'name' => 'DeleteStack',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteStackRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DeleteUserProfile' =>
    [
      'name' => 'DeleteUserProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteUserProfileRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DeregisterElasticIp' =>
    [
      'name' => 'DeregisterElasticIp',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeregisterElasticIpRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DeregisterRdsDbInstance' =>
    [
      'name' => 'DeregisterRdsDbInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeregisterRdsDbInstanceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DeregisterVolume' =>
    [
      'name' => 'DeregisterVolume',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeregisterVolumeRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeApps' =>
    [
      'name' => 'DescribeApps',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeAppsRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeAppsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeCommands' =>
    [
      'name' => 'DescribeCommands',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeCommandsRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeCommandsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeDeployments' =>
    [
      'name' => 'DescribeDeployments',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDeploymentsRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeDeploymentsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeElasticIps' =>
    [
      'name' => 'DescribeElasticIps',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeElasticIpsRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeElasticIpsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeElasticLoadBalancers' =>
    [
      'name' => 'DescribeElasticLoadBalancers',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeElasticLoadBalancersRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeElasticLoadBalancersResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeInstances' =>
    [
      'name' => 'DescribeInstances',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeInstancesRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeInstancesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeLayers' =>
    [
      'name' => 'DescribeLayers',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeLayersRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeLayersResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeLoadBasedAutoScaling' =>
    [
      'name' => 'DescribeLoadBasedAutoScaling',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeLoadBasedAutoScalingRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeLoadBasedAutoScalingResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeMyUserProfile' =>
    [
      'name' => 'DescribeMyUserProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'DescribeMyUserProfileResult',
      ],
    ],
    'DescribePermissions' =>
    [
      'name' => 'DescribePermissions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribePermissionsRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribePermissionsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeRaidArrays' =>
    [
      'name' => 'DescribeRaidArrays',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeRaidArraysRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeRaidArraysResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeRdsDbInstances' =>
    [
      'name' => 'DescribeRdsDbInstances',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeRdsDbInstancesRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeRdsDbInstancesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeServiceErrors' =>
    [
      'name' => 'DescribeServiceErrors',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeServiceErrorsRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeServiceErrorsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeStackSummary' =>
    [
      'name' => 'DescribeStackSummary',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeStackSummaryRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeStackSummaryResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeStacks' =>
    [
      'name' => 'DescribeStacks',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeStacksRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeStacksResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeTimeBasedAutoScaling' =>
    [
      'name' => 'DescribeTimeBasedAutoScaling',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeTimeBasedAutoScalingRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeTimeBasedAutoScalingResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeUserProfiles' =>
    [
      'name' => 'DescribeUserProfiles',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeUserProfilesRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeUserProfilesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeVolumes' =>
    [
      'name' => 'DescribeVolumes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeVolumesRequest',
      ],
      'output' =>
      [
        'shape' => 'DescribeVolumesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DetachElasticLoadBalancer' =>
    [
      'name' => 'DetachElasticLoadBalancer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DetachElasticLoadBalancerRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'DisassociateElasticIp' =>
    [
      'name' => 'DisassociateElasticIp',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DisassociateElasticIpRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'GetHostnameSuggestion' =>
    [
      'name' => 'GetHostnameSuggestion',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetHostnameSuggestionRequest',
      ],
      'output' =>
      [
        'shape' => 'GetHostnameSuggestionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'RebootInstance' =>
    [
      'name' => 'RebootInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RebootInstanceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'RegisterElasticIp' =>
    [
      'name' => 'RegisterElasticIp',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RegisterElasticIpRequest',
      ],
      'output' =>
      [
        'shape' => 'RegisterElasticIpResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'RegisterRdsDbInstance' =>
    [
      'name' => 'RegisterRdsDbInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RegisterRdsDbInstanceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'RegisterVolume' =>
    [
      'name' => 'RegisterVolume',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RegisterVolumeRequest',
      ],
      'output' =>
      [
        'shape' => 'RegisterVolumeResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'SetLoadBasedAutoScaling' =>
    [
      'name' => 'SetLoadBasedAutoScaling',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetLoadBasedAutoScalingRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'SetPermission' =>
    [
      'name' => 'SetPermission',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetPermissionRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'SetTimeBasedAutoScaling' =>
    [
      'name' => 'SetTimeBasedAutoScaling',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetTimeBasedAutoScalingRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'StartInstance' =>
    [
      'name' => 'StartInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'StartInstanceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'StartStack' =>
    [
      'name' => 'StartStack',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'StartStackRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'StopInstance' =>
    [
      'name' => 'StopInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'StopInstanceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'StopStack' =>
    [
      'name' => 'StopStack',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'StopStackRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'UnassignVolume' =>
    [
      'name' => 'UnassignVolume',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UnassignVolumeRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateApp' =>
    [
      'name' => 'UpdateApp',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateAppRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateElasticIp' =>
    [
      'name' => 'UpdateElasticIp',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateElasticIpRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateInstance' =>
    [
      'name' => 'UpdateInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateInstanceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateLayer' =>
    [
      'name' => 'UpdateLayer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateLayerRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateMyUserProfile' =>
    [
      'name' => 'UpdateMyUserProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateMyUserProfileRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateRdsDbInstance' =>
    [
      'name' => 'UpdateRdsDbInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateRdsDbInstanceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateStack' =>
    [
      'name' => 'UpdateStack',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateStackRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateUserProfile' =>
    [
      'name' => 'UpdateUserProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateUserProfileRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateVolume' =>
    [
      'name' => 'UpdateVolume',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateVolumeRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ValidationException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'App' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AppId' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'Shortname' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'DataSources' =>
        [
          'shape' => 'DataSources',
        ],
        'Type' =>
        [
          'shape' => 'AppType',
        ],
        'AppSource' =>
        [
          'shape' => 'Source',
        ],
        'Domains' =>
        [
          'shape' => 'Strings',
        ],
        'EnableSsl' =>
        [
          'shape' => 'Boolean',
        ],
        'SslConfiguration' =>
        [
          'shape' => 'SslConfiguration',
        ],
        'Attributes' =>
        [
          'shape' => 'AppAttributes',
        ],
        'CreatedAt' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'AppAttributes' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AppAttributesKeys',
      ],
      'value' =>
      [
        'shape' => 'String',
      ],
    ],
    'AppAttributesKeys' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'DocumentRoot',
        1 => 'RailsEnv',
        2 => 'AutoBundleOnDeploy',
      ],
    ],
    'AppType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'rails',
        1 => 'php',
        2 => 'nodejs',
        3 => 'static',
        4 => 'other',
      ],
    ],
    'Apps' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'App',
      ],
    ],
    'Architecture' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'x86_64',
        1 => 'i386',
      ],
    ],
    'AssignVolumeRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'VolumeId',
      ],
      'members' =>
      [
        'VolumeId' =>
        [
          'shape' => 'String',
        ],
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'AssociateElasticIpRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ElasticIp',
      ],
      'members' =>
      [
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'AttachElasticLoadBalancerRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ElasticLoadBalancerName',
        1 => 'LayerId',
      ],
      'members' =>
      [
        'ElasticLoadBalancerName' =>
        [
          'shape' => 'String',
        ],
        'LayerId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'AutoScalingThresholds' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceCount' =>
        [
          'shape' => 'Integer',
        ],
        'ThresholdsWaitTime' =>
        [
          'shape' => 'Minute',
        ],
        'IgnoreMetricsTime' =>
        [
          'shape' => 'Minute',
        ],
        'CpuThreshold' =>
        [
          'shape' => 'Double',
        ],
        'MemoryThreshold' =>
        [
          'shape' => 'Double',
        ],
        'LoadThreshold' =>
        [
          'shape' => 'Double',
        ],
      ],
    ],
    'AutoScalingType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'load',
        1 => 'timer',
      ],
    ],
    'Boolean' =>
    [
      'type' => 'boolean',
      'box' => true,
    ],
    'ChefConfiguration' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ManageBerkshelf' =>
        [
          'shape' => 'Boolean',
        ],
        'BerkshelfVersion' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CloneStackRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SourceStackId',
        1 => 'ServiceRoleArn',
      ],
      'members' =>
      [
        'SourceStackId' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Region' =>
        [
          'shape' => 'String',
        ],
        'VpcId' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'StackAttributes',
        ],
        'ServiceRoleArn' =>
        [
          'shape' => 'String',
        ],
        'DefaultInstanceProfileArn' =>
        [
          'shape' => 'String',
        ],
        'DefaultOs' =>
        [
          'shape' => 'String',
        ],
        'HostnameTheme' =>
        [
          'shape' => 'String',
        ],
        'DefaultAvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'DefaultSubnetId' =>
        [
          'shape' => 'String',
        ],
        'CustomJson' =>
        [
          'shape' => 'String',
        ],
        'ConfigurationManager' =>
        [
          'shape' => 'StackConfigurationManager',
        ],
        'ChefConfiguration' =>
        [
          'shape' => 'ChefConfiguration',
        ],
        'UseCustomCookbooks' =>
        [
          'shape' => 'Boolean',
        ],
        'UseOpsworksSecurityGroups' =>
        [
          'shape' => 'Boolean',
        ],
        'CustomCookbooksSource' =>
        [
          'shape' => 'Source',
        ],
        'DefaultSshKeyName' =>
        [
          'shape' => 'String',
        ],
        'ClonePermissions' =>
        [
          'shape' => 'Boolean',
        ],
        'CloneAppIds' =>
        [
          'shape' => 'Strings',
        ],
        'DefaultRootDeviceType' =>
        [
          'shape' => 'RootDeviceType',
        ],
      ],
    ],
    'CloneStackResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Command' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CommandId' =>
        [
          'shape' => 'String',
        ],
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'DeploymentId' =>
        [
          'shape' => 'String',
        ],
        'CreatedAt' =>
        [
          'shape' => 'DateTime',
        ],
        'AcknowledgedAt' =>
        [
          'shape' => 'DateTime',
        ],
        'CompletedAt' =>
        [
          'shape' => 'DateTime',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
        'ExitCode' =>
        [
          'shape' => 'Integer',
        ],
        'LogUrl' =>
        [
          'shape' => 'String',
        ],
        'Type' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Commands' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Command',
      ],
    ],
    'CreateAppRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
        1 => 'Name',
        2 => 'Type',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'Shortname' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'DataSources' =>
        [
          'shape' => 'DataSources',
        ],
        'Type' =>
        [
          'shape' => 'AppType',
        ],
        'AppSource' =>
        [
          'shape' => 'Source',
        ],
        'Domains' =>
        [
          'shape' => 'Strings',
        ],
        'EnableSsl' =>
        [
          'shape' => 'Boolean',
        ],
        'SslConfiguration' =>
        [
          'shape' => 'SslConfiguration',
        ],
        'Attributes' =>
        [
          'shape' => 'AppAttributes',
        ],
      ],
    ],
    'CreateAppResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AppId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateDeploymentRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
        1 => 'Command',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'AppId' =>
        [
          'shape' => 'String',
        ],
        'InstanceIds' =>
        [
          'shape' => 'Strings',
        ],
        'Command' =>
        [
          'shape' => 'DeploymentCommand',
        ],
        'Comment' =>
        [
          'shape' => 'String',
        ],
        'CustomJson' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateDeploymentResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DeploymentId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateInstanceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
        1 => 'LayerIds',
        2 => 'InstanceType',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'LayerIds' =>
        [
          'shape' => 'Strings',
        ],
        'InstanceType' =>
        [
          'shape' => 'String',
        ],
        'AutoScalingType' =>
        [
          'shape' => 'AutoScalingType',
        ],
        'Hostname' =>
        [
          'shape' => 'String',
        ],
        'Os' =>
        [
          'shape' => 'String',
        ],
        'AmiId' =>
        [
          'shape' => 'String',
        ],
        'SshKeyName' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'VirtualizationType' =>
        [
          'shape' => 'String',
        ],
        'SubnetId' =>
        [
          'shape' => 'String',
        ],
        'Architecture' =>
        [
          'shape' => 'Architecture',
        ],
        'RootDeviceType' =>
        [
          'shape' => 'RootDeviceType',
        ],
        'InstallUpdatesOnBoot' =>
        [
          'shape' => 'Boolean',
        ],
        'EbsOptimized' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'CreateInstanceResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateLayerRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
        1 => 'Type',
        2 => 'Name',
        3 => 'Shortname',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'Type' =>
        [
          'shape' => 'LayerType',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Shortname' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'LayerAttributes',
        ],
        'CustomInstanceProfileArn' =>
        [
          'shape' => 'String',
        ],
        'CustomSecurityGroupIds' =>
        [
          'shape' => 'Strings',
        ],
        'Packages' =>
        [
          'shape' => 'Strings',
        ],
        'VolumeConfigurations' =>
        [
          'shape' => 'VolumeConfigurations',
        ],
        'EnableAutoHealing' =>
        [
          'shape' => 'Boolean',
        ],
        'AutoAssignElasticIps' =>
        [
          'shape' => 'Boolean',
        ],
        'AutoAssignPublicIps' =>
        [
          'shape' => 'Boolean',
        ],
        'CustomRecipes' =>
        [
          'shape' => 'Recipes',
        ],
        'InstallUpdatesOnBoot' =>
        [
          'shape' => 'Boolean',
        ],
        'UseEbsOptimizedInstances' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'CreateLayerResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LayerId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateStackRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
        1 => 'Region',
        2 => 'ServiceRoleArn',
        3 => 'DefaultInstanceProfileArn',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Region' =>
        [
          'shape' => 'String',
        ],
        'VpcId' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'StackAttributes',
        ],
        'ServiceRoleArn' =>
        [
          'shape' => 'String',
        ],
        'DefaultInstanceProfileArn' =>
        [
          'shape' => 'String',
        ],
        'DefaultOs' =>
        [
          'shape' => 'String',
        ],
        'HostnameTheme' =>
        [
          'shape' => 'String',
        ],
        'DefaultAvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'DefaultSubnetId' =>
        [
          'shape' => 'String',
        ],
        'CustomJson' =>
        [
          'shape' => 'String',
        ],
        'ConfigurationManager' =>
        [
          'shape' => 'StackConfigurationManager',
        ],
        'ChefConfiguration' =>
        [
          'shape' => 'ChefConfiguration',
        ],
        'UseCustomCookbooks' =>
        [
          'shape' => 'Boolean',
        ],
        'UseOpsworksSecurityGroups' =>
        [
          'shape' => 'Boolean',
        ],
        'CustomCookbooksSource' =>
        [
          'shape' => 'Source',
        ],
        'DefaultSshKeyName' =>
        [
          'shape' => 'String',
        ],
        'DefaultRootDeviceType' =>
        [
          'shape' => 'RootDeviceType',
        ],
      ],
    ],
    'CreateStackResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateUserProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'IamUserArn',
      ],
      'members' =>
      [
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
        'SshUsername' =>
        [
          'shape' => 'String',
        ],
        'SshPublicKey' =>
        [
          'shape' => 'String',
        ],
        'AllowSelfManagement' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'CreateUserProfileResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DailyAutoScalingSchedule' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'Hour',
      ],
      'value' =>
      [
        'shape' => 'Switch',
      ],
    ],
    'DataSource' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Type' =>
        [
          'shape' => 'String',
        ],
        'Arn' =>
        [
          'shape' => 'String',
        ],
        'DatabaseName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DataSources' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DataSource',
      ],
    ],
    'DateTime' =>
    [
      'type' => 'string',
    ],
    'DeleteAppRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AppId',
      ],
      'members' =>
      [
        'AppId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteInstanceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'DeleteElasticIp' =>
        [
          'shape' => 'Boolean',
        ],
        'DeleteVolumes' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'DeleteLayerRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LayerId',
      ],
      'members' =>
      [
        'LayerId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteStackRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteUserProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'IamUserArn',
      ],
      'members' =>
      [
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Deployment' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DeploymentId' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'AppId' =>
        [
          'shape' => 'String',
        ],
        'CreatedAt' =>
        [
          'shape' => 'DateTime',
        ],
        'CompletedAt' =>
        [
          'shape' => 'DateTime',
        ],
        'Duration' =>
        [
          'shape' => 'Integer',
        ],
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
        'Comment' =>
        [
          'shape' => 'String',
        ],
        'Command' =>
        [
          'shape' => 'DeploymentCommand',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
        'CustomJson' =>
        [
          'shape' => 'String',
        ],
        'InstanceIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DeploymentCommand' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'DeploymentCommandName',
        ],
        'Args' =>
        [
          'shape' => 'DeploymentCommandArgs',
        ],
      ],
    ],
    'DeploymentCommandArgs' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'String',
      ],
      'value' =>
      [
        'shape' => 'Strings',
      ],
    ],
    'DeploymentCommandName' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'install_dependencies',
        1 => 'update_dependencies',
        2 => 'update_custom_cookbooks',
        3 => 'execute_recipes',
        4 => 'deploy',
        5 => 'rollback',
        6 => 'start',
        7 => 'stop',
        8 => 'restart',
        9 => 'undeploy',
      ],
    ],
    'Deployments' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Deployment',
      ],
    ],
    'DeregisterElasticIpRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ElasticIp',
      ],
      'members' =>
      [
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeregisterRdsDbInstanceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RdsDbInstanceArn',
      ],
      'members' =>
      [
        'RdsDbInstanceArn' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeregisterVolumeRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'VolumeId',
      ],
      'members' =>
      [
        'VolumeId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeAppsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'AppIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeAppsResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Apps' =>
        [
          'shape' => 'Apps',
        ],
      ],
    ],
    'DescribeCommandsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DeploymentId' =>
        [
          'shape' => 'String',
        ],
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'CommandIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeCommandsResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Commands' =>
        [
          'shape' => 'Commands',
        ],
      ],
    ],
    'DescribeDeploymentsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'AppId' =>
        [
          'shape' => 'String',
        ],
        'DeploymentIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeDeploymentsResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Deployments' =>
        [
          'shape' => 'Deployments',
        ],
      ],
    ],
    'DescribeElasticIpsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'Ips' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeElasticIpsResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ElasticIps' =>
        [
          'shape' => 'ElasticIps',
        ],
      ],
    ],
    'DescribeElasticLoadBalancersRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'LayerIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeElasticLoadBalancersResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ElasticLoadBalancers' =>
        [
          'shape' => 'ElasticLoadBalancers',
        ],
      ],
    ],
    'DescribeInstancesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'LayerId' =>
        [
          'shape' => 'String',
        ],
        'InstanceIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeInstancesResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Instances' =>
        [
          'shape' => 'Instances',
        ],
      ],
    ],
    'DescribeLayersRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'LayerIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeLayersResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Layers' =>
        [
          'shape' => 'Layers',
        ],
      ],
    ],
    'DescribeLoadBasedAutoScalingRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LayerIds',
      ],
      'members' =>
      [
        'LayerIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeLoadBasedAutoScalingResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LoadBasedAutoScalingConfigurations' =>
        [
          'shape' => 'LoadBasedAutoScalingConfigurations',
        ],
      ],
    ],
    'DescribeMyUserProfileResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UserProfile' =>
        [
          'shape' => 'SelfUserProfile',
        ],
      ],
    ],
    'DescribePermissionsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribePermissionsResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Permissions' =>
        [
          'shape' => 'Permissions',
        ],
      ],
    ],
    'DescribeRaidArraysRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'RaidArrayIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeRaidArraysResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'RaidArrays' =>
        [
          'shape' => 'RaidArrays',
        ],
      ],
    ],
    'DescribeRdsDbInstancesRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'RdsDbInstanceArns' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeRdsDbInstancesResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'RdsDbInstances' =>
        [
          'shape' => 'RdsDbInstances',
        ],
      ],
    ],
    'DescribeServiceErrorsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'ServiceErrorIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeServiceErrorsResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ServiceErrors' =>
        [
          'shape' => 'ServiceErrors',
        ],
      ],
    ],
    'DescribeStackSummaryRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeStackSummaryResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackSummary' =>
        [
          'shape' => 'StackSummary',
        ],
      ],
    ],
    'DescribeStacksRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeStacksResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Stacks' =>
        [
          'shape' => 'Stacks',
        ],
      ],
    ],
    'DescribeTimeBasedAutoScalingRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceIds',
      ],
      'members' =>
      [
        'InstanceIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeTimeBasedAutoScalingResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TimeBasedAutoScalingConfigurations' =>
        [
          'shape' => 'TimeBasedAutoScalingConfigurations',
        ],
      ],
    ],
    'DescribeUserProfilesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'IamUserArns' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeUserProfilesResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UserProfiles' =>
        [
          'shape' => 'UserProfiles',
        ],
      ],
    ],
    'DescribeVolumesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'RaidArrayId' =>
        [
          'shape' => 'String',
        ],
        'VolumeIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'DescribeVolumesResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Volumes' =>
        [
          'shape' => 'Volumes',
        ],
      ],
    ],
    'DetachElasticLoadBalancerRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ElasticLoadBalancerName',
        1 => 'LayerId',
      ],
      'members' =>
      [
        'ElasticLoadBalancerName' =>
        [
          'shape' => 'String',
        ],
        'LayerId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DisassociateElasticIpRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ElasticIp',
      ],
      'members' =>
      [
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Double' =>
    [
      'type' => 'double',
      'box' => true,
    ],
    'ElasticIp' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Ip' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Domain' =>
        [
          'shape' => 'String',
        ],
        'Region' =>
        [
          'shape' => 'String',
        ],
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ElasticIps' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ElasticIp',
      ],
    ],
    'ElasticLoadBalancer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ElasticLoadBalancerName' =>
        [
          'shape' => 'String',
        ],
        'Region' =>
        [
          'shape' => 'String',
        ],
        'DnsName' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'LayerId' =>
        [
          'shape' => 'String',
        ],
        'VpcId' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'Strings',
        ],
        'SubnetIds' =>
        [
          'shape' => 'Strings',
        ],
        'Ec2InstanceIds' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'ElasticLoadBalancers' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ElasticLoadBalancer',
      ],
    ],
    'GetHostnameSuggestionRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LayerId',
      ],
      'members' =>
      [
        'LayerId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'GetHostnameSuggestionResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LayerId' =>
        [
          'shape' => 'String',
        ],
        'Hostname' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Hour' =>
    [
      'type' => 'string',
    ],
    'Instance' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'Ec2InstanceId' =>
        [
          'shape' => 'String',
        ],
        'VirtualizationType' =>
        [
          'shape' => 'String',
        ],
        'Hostname' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'LayerIds' =>
        [
          'shape' => 'Strings',
        ],
        'SecurityGroupIds' =>
        [
          'shape' => 'Strings',
        ],
        'InstanceType' =>
        [
          'shape' => 'String',
        ],
        'InstanceProfileArn' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
        'Os' =>
        [
          'shape' => 'String',
        ],
        'AmiId' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'SubnetId' =>
        [
          'shape' => 'String',
        ],
        'PublicDns' =>
        [
          'shape' => 'String',
        ],
        'PrivateDns' =>
        [
          'shape' => 'String',
        ],
        'PublicIp' =>
        [
          'shape' => 'String',
        ],
        'PrivateIp' =>
        [
          'shape' => 'String',
        ],
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
        'AutoScalingType' =>
        [
          'shape' => 'AutoScalingType',
        ],
        'SshKeyName' =>
        [
          'shape' => 'String',
        ],
        'SshHostRsaKeyFingerprint' =>
        [
          'shape' => 'String',
        ],
        'SshHostDsaKeyFingerprint' =>
        [
          'shape' => 'String',
        ],
        'CreatedAt' =>
        [
          'shape' => 'DateTime',
        ],
        'LastServiceErrorId' =>
        [
          'shape' => 'String',
        ],
        'Architecture' =>
        [
          'shape' => 'Architecture',
        ],
        'RootDeviceType' =>
        [
          'shape' => 'RootDeviceType',
        ],
        'RootDeviceVolumeId' =>
        [
          'shape' => 'String',
        ],
        'InstallUpdatesOnBoot' =>
        [
          'shape' => 'Boolean',
        ],
        'EbsOptimized' =>
        [
          'shape' => 'Boolean',
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
    'InstancesCount' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Booting' =>
        [
          'shape' => 'Integer',
        ],
        'ConnectionLost' =>
        [
          'shape' => 'Integer',
        ],
        'Online' =>
        [
          'shape' => 'Integer',
        ],
        'Pending' =>
        [
          'shape' => 'Integer',
        ],
        'Rebooting' =>
        [
          'shape' => 'Integer',
        ],
        'Requested' =>
        [
          'shape' => 'Integer',
        ],
        'RunningSetup' =>
        [
          'shape' => 'Integer',
        ],
        'SetupFailed' =>
        [
          'shape' => 'Integer',
        ],
        'ShuttingDown' =>
        [
          'shape' => 'Integer',
        ],
        'StartFailed' =>
        [
          'shape' => 'Integer',
        ],
        'Stopped' =>
        [
          'shape' => 'Integer',
        ],
        'Stopping' =>
        [
          'shape' => 'Integer',
        ],
        'Terminated' =>
        [
          'shape' => 'Integer',
        ],
        'Terminating' =>
        [
          'shape' => 'Integer',
        ],
      ],
    ],
    'Integer' =>
    [
      'type' => 'integer',
      'box' => true,
    ],
    'Layer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'LayerId' =>
        [
          'shape' => 'String',
        ],
        'Type' =>
        [
          'shape' => 'LayerType',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Shortname' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'LayerAttributes',
        ],
        'CustomInstanceProfileArn' =>
        [
          'shape' => 'String',
        ],
        'CustomSecurityGroupIds' =>
        [
          'shape' => 'Strings',
        ],
        'DefaultSecurityGroupNames' =>
        [
          'shape' => 'Strings',
        ],
        'Packages' =>
        [
          'shape' => 'Strings',
        ],
        'VolumeConfigurations' =>
        [
          'shape' => 'VolumeConfigurations',
        ],
        'EnableAutoHealing' =>
        [
          'shape' => 'Boolean',
        ],
        'AutoAssignElasticIps' =>
        [
          'shape' => 'Boolean',
        ],
        'AutoAssignPublicIps' =>
        [
          'shape' => 'Boolean',
        ],
        'DefaultRecipes' =>
        [
          'shape' => 'Recipes',
        ],
        'CustomRecipes' =>
        [
          'shape' => 'Recipes',
        ],
        'CreatedAt' =>
        [
          'shape' => 'DateTime',
        ],
        'InstallUpdatesOnBoot' =>
        [
          'shape' => 'Boolean',
        ],
        'UseEbsOptimizedInstances' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'LayerAttributes' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'LayerAttributesKeys',
      ],
      'value' =>
      [
        'shape' => 'String',
      ],
    ],
    'LayerAttributesKeys' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'EnableHaproxyStats',
        1 => 'HaproxyStatsUrl',
        2 => 'HaproxyStatsUser',
        3 => 'HaproxyStatsPassword',
        4 => 'HaproxyHealthCheckUrl',
        5 => 'HaproxyHealthCheckMethod',
        6 => 'MysqlRootPassword',
        7 => 'MysqlRootPasswordUbiquitous',
        8 => 'GangliaUrl',
        9 => 'GangliaUser',
        10 => 'GangliaPassword',
        11 => 'MemcachedMemory',
        12 => 'NodejsVersion',
        13 => 'RubyVersion',
        14 => 'RubygemsVersion',
        15 => 'ManageBundler',
        16 => 'BundlerVersion',
        17 => 'RailsStack',
        18 => 'PassengerVersion',
        19 => 'Jvm',
        20 => 'JvmVersion',
        21 => 'JvmOptions',
        22 => 'JavaAppServer',
        23 => 'JavaAppServerVersion',
      ],
    ],
    'LayerType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'lb',
        1 => 'web',
        2 => 'php-app',
        3 => 'rails-app',
        4 => 'nodejs-app',
        5 => 'memcached',
        6 => 'db-master',
        7 => 'monitoring-master',
        8 => 'custom',
      ],
    ],
    'Layers' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Layer',
      ],
    ],
    'LoadBasedAutoScalingConfiguration' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LayerId' =>
        [
          'shape' => 'String',
        ],
        'Enable' =>
        [
          'shape' => 'Boolean',
        ],
        'UpScaling' =>
        [
          'shape' => 'AutoScalingThresholds',
        ],
        'DownScaling' =>
        [
          'shape' => 'AutoScalingThresholds',
        ],
      ],
    ],
    'LoadBasedAutoScalingConfigurations' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'LoadBasedAutoScalingConfiguration',
      ],
    ],
    'Minute' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 100,
    ],
    'Permission' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
        'AllowSsh' =>
        [
          'shape' => 'Boolean',
        ],
        'AllowSudo' =>
        [
          'shape' => 'Boolean',
        ],
        'Level' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Permissions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Permission',
      ],
    ],
    'RaidArray' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'RaidArrayId' =>
        [
          'shape' => 'String',
        ],
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'RaidLevel' =>
        [
          'shape' => 'Integer',
        ],
        'NumberOfDisks' =>
        [
          'shape' => 'Integer',
        ],
        'Size' =>
        [
          'shape' => 'Integer',
        ],
        'Device' =>
        [
          'shape' => 'String',
        ],
        'MountPoint' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'CreatedAt' =>
        [
          'shape' => 'DateTime',
        ],
        'VolumeType' =>
        [
          'shape' => 'String',
        ],
        'Iops' =>
        [
          'shape' => 'Integer',
        ],
      ],
    ],
    'RaidArrays' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'RaidArray',
      ],
    ],
    'RdsDbInstance' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'RdsDbInstanceArn' =>
        [
          'shape' => 'String',
        ],
        'DbInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'DbUser' =>
        [
          'shape' => 'String',
        ],
        'DbPassword' =>
        [
          'shape' => 'String',
        ],
        'Region' =>
        [
          'shape' => 'String',
        ],
        'Address' =>
        [
          'shape' => 'String',
        ],
        'Engine' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'MissingOnRds' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'RdsDbInstances' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'RdsDbInstance',
      ],
    ],
    'RebootInstanceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Recipes' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Setup' =>
        [
          'shape' => 'Strings',
        ],
        'Configure' =>
        [
          'shape' => 'Strings',
        ],
        'Deploy' =>
        [
          'shape' => 'Strings',
        ],
        'Undeploy' =>
        [
          'shape' => 'Strings',
        ],
        'Shutdown' =>
        [
          'shape' => 'Strings',
        ],
      ],
    ],
    'RegisterElasticIpRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ElasticIp',
        1 => 'StackId',
      ],
      'members' =>
      [
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'RegisterElasticIpResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'RegisterRdsDbInstanceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
        1 => 'RdsDbInstanceArn',
        2 => 'DbUser',
        3 => 'DbPassword',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'RdsDbInstanceArn' =>
        [
          'shape' => 'String',
        ],
        'DbUser' =>
        [
          'shape' => 'String',
        ],
        'DbPassword' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'RegisterVolumeRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
      ],
      'members' =>
      [
        'Ec2VolumeId' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'RegisterVolumeResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'VolumeId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ResourceNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'String',
        ],
      ],
      'exception' => true,
    ],
    'RootDeviceType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ebs',
        1 => 'instance-store',
      ],
    ],
    'SelfUserProfile' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'SshUsername' =>
        [
          'shape' => 'String',
        ],
        'SshPublicKey' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ServiceError' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ServiceErrorId' =>
        [
          'shape' => 'String',
        ],
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'Type' =>
        [
          'shape' => 'String',
        ],
        'Message' =>
        [
          'shape' => 'String',
        ],
        'CreatedAt' =>
        [
          'shape' => 'DateTime',
        ],
      ],
    ],
    'ServiceErrors' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ServiceError',
      ],
    ],
    'SetLoadBasedAutoScalingRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LayerId',
      ],
      'members' =>
      [
        'LayerId' =>
        [
          'shape' => 'String',
        ],
        'Enable' =>
        [
          'shape' => 'Boolean',
        ],
        'UpScaling' =>
        [
          'shape' => 'AutoScalingThresholds',
        ],
        'DownScaling' =>
        [
          'shape' => 'AutoScalingThresholds',
        ],
      ],
    ],
    'SetPermissionRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
        1 => 'IamUserArn',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
        'AllowSsh' =>
        [
          'shape' => 'Boolean',
        ],
        'AllowSudo' =>
        [
          'shape' => 'Boolean',
        ],
        'Level' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'SetTimeBasedAutoScalingRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'AutoScalingSchedule' =>
        [
          'shape' => 'WeeklyAutoScalingSchedule',
        ],
      ],
    ],
    'Source' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Type' =>
        [
          'shape' => 'SourceType',
        ],
        'Url' =>
        [
          'shape' => 'String',
        ],
        'Username' =>
        [
          'shape' => 'String',
        ],
        'Password' =>
        [
          'shape' => 'String',
        ],
        'SshKey' =>
        [
          'shape' => 'String',
        ],
        'Revision' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'SourceType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'git',
        1 => 'svn',
        2 => 'archive',
        3 => 's3',
      ],
    ],
    'SslConfiguration' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Certificate',
        1 => 'PrivateKey',
      ],
      'members' =>
      [
        'Certificate' =>
        [
          'shape' => 'String',
        ],
        'PrivateKey' =>
        [
          'shape' => 'String',
        ],
        'Chain' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Stack' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Arn' =>
        [
          'shape' => 'String',
        ],
        'Region' =>
        [
          'shape' => 'String',
        ],
        'VpcId' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'StackAttributes',
        ],
        'ServiceRoleArn' =>
        [
          'shape' => 'String',
        ],
        'DefaultInstanceProfileArn' =>
        [
          'shape' => 'String',
        ],
        'DefaultOs' =>
        [
          'shape' => 'String',
        ],
        'HostnameTheme' =>
        [
          'shape' => 'String',
        ],
        'DefaultAvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'DefaultSubnetId' =>
        [
          'shape' => 'String',
        ],
        'CustomJson' =>
        [
          'shape' => 'String',
        ],
        'ConfigurationManager' =>
        [
          'shape' => 'StackConfigurationManager',
        ],
        'ChefConfiguration' =>
        [
          'shape' => 'ChefConfiguration',
        ],
        'UseCustomCookbooks' =>
        [
          'shape' => 'Boolean',
        ],
        'UseOpsworksSecurityGroups' =>
        [
          'shape' => 'Boolean',
        ],
        'CustomCookbooksSource' =>
        [
          'shape' => 'Source',
        ],
        'DefaultSshKeyName' =>
        [
          'shape' => 'String',
        ],
        'CreatedAt' =>
        [
          'shape' => 'DateTime',
        ],
        'DefaultRootDeviceType' =>
        [
          'shape' => 'RootDeviceType',
        ],
      ],
    ],
    'StackAttributes' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'StackAttributesKeys',
      ],
      'value' =>
      [
        'shape' => 'String',
      ],
    ],
    'StackAttributesKeys' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'Color',
      ],
    ],
    'StackConfigurationManager' =>
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
      ],
    ],
    'StackSummary' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Arn' =>
        [
          'shape' => 'String',
        ],
        'LayersCount' =>
        [
          'shape' => 'Integer',
        ],
        'AppsCount' =>
        [
          'shape' => 'Integer',
        ],
        'InstancesCount' =>
        [
          'shape' => 'InstancesCount',
        ],
      ],
    ],
    'Stacks' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Stack',
      ],
    ],
    'StartInstanceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'StartStackRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'StopInstanceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'StopStackRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'String' =>
    [
      'type' => 'string',
    ],
    'Strings' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
      ],
    ],
    'Switch' =>
    [
      'type' => 'string',
    ],
    'TimeBasedAutoScalingConfiguration' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'AutoScalingSchedule' =>
        [
          'shape' => 'WeeklyAutoScalingSchedule',
        ],
      ],
    ],
    'TimeBasedAutoScalingConfigurations' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'TimeBasedAutoScalingConfiguration',
      ],
    ],
    'UnassignVolumeRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'VolumeId',
      ],
      'members' =>
      [
        'VolumeId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'UpdateAppRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AppId',
      ],
      'members' =>
      [
        'AppId' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'DataSources' =>
        [
          'shape' => 'DataSources',
        ],
        'Type' =>
        [
          'shape' => 'AppType',
        ],
        'AppSource' =>
        [
          'shape' => 'Source',
        ],
        'Domains' =>
        [
          'shape' => 'Strings',
        ],
        'EnableSsl' =>
        [
          'shape' => 'Boolean',
        ],
        'SslConfiguration' =>
        [
          'shape' => 'SslConfiguration',
        ],
        'Attributes' =>
        [
          'shape' => 'AppAttributes',
        ],
      ],
    ],
    'UpdateElasticIpRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ElasticIp',
      ],
      'members' =>
      [
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'UpdateInstanceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceId',
      ],
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'LayerIds' =>
        [
          'shape' => 'Strings',
        ],
        'InstanceType' =>
        [
          'shape' => 'String',
        ],
        'AutoScalingType' =>
        [
          'shape' => 'AutoScalingType',
        ],
        'Hostname' =>
        [
          'shape' => 'String',
        ],
        'Os' =>
        [
          'shape' => 'String',
        ],
        'AmiId' =>
        [
          'shape' => 'String',
        ],
        'SshKeyName' =>
        [
          'shape' => 'String',
        ],
        'Architecture' =>
        [
          'shape' => 'Architecture',
        ],
        'InstallUpdatesOnBoot' =>
        [
          'shape' => 'Boolean',
        ],
        'EbsOptimized' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'UpdateLayerRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LayerId',
      ],
      'members' =>
      [
        'LayerId' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Shortname' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'LayerAttributes',
        ],
        'CustomInstanceProfileArn' =>
        [
          'shape' => 'String',
        ],
        'CustomSecurityGroupIds' =>
        [
          'shape' => 'Strings',
        ],
        'Packages' =>
        [
          'shape' => 'Strings',
        ],
        'VolumeConfigurations' =>
        [
          'shape' => 'VolumeConfigurations',
        ],
        'EnableAutoHealing' =>
        [
          'shape' => 'Boolean',
        ],
        'AutoAssignElasticIps' =>
        [
          'shape' => 'Boolean',
        ],
        'AutoAssignPublicIps' =>
        [
          'shape' => 'Boolean',
        ],
        'CustomRecipes' =>
        [
          'shape' => 'Recipes',
        ],
        'InstallUpdatesOnBoot' =>
        [
          'shape' => 'Boolean',
        ],
        'UseEbsOptimizedInstances' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'UpdateMyUserProfileRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SshPublicKey' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'UpdateRdsDbInstanceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RdsDbInstanceArn',
      ],
      'members' =>
      [
        'RdsDbInstanceArn' =>
        [
          'shape' => 'String',
        ],
        'DbUser' =>
        [
          'shape' => 'String',
        ],
        'DbPassword' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'UpdateStackRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StackId',
      ],
      'members' =>
      [
        'StackId' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'StackAttributes',
        ],
        'ServiceRoleArn' =>
        [
          'shape' => 'String',
        ],
        'DefaultInstanceProfileArn' =>
        [
          'shape' => 'String',
        ],
        'DefaultOs' =>
        [
          'shape' => 'String',
        ],
        'HostnameTheme' =>
        [
          'shape' => 'String',
        ],
        'DefaultAvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'DefaultSubnetId' =>
        [
          'shape' => 'String',
        ],
        'CustomJson' =>
        [
          'shape' => 'String',
        ],
        'ConfigurationManager' =>
        [
          'shape' => 'StackConfigurationManager',
        ],
        'ChefConfiguration' =>
        [
          'shape' => 'ChefConfiguration',
        ],
        'UseCustomCookbooks' =>
        [
          'shape' => 'Boolean',
        ],
        'CustomCookbooksSource' =>
        [
          'shape' => 'Source',
        ],
        'DefaultSshKeyName' =>
        [
          'shape' => 'String',
        ],
        'DefaultRootDeviceType' =>
        [
          'shape' => 'RootDeviceType',
        ],
        'UseOpsworksSecurityGroups' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'UpdateUserProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'IamUserArn',
      ],
      'members' =>
      [
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
        'SshUsername' =>
        [
          'shape' => 'String',
        ],
        'SshPublicKey' =>
        [
          'shape' => 'String',
        ],
        'AllowSelfManagement' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'UpdateVolumeRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'VolumeId',
      ],
      'members' =>
      [
        'VolumeId' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'MountPoint' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'UserProfile' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'IamUserArn' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'SshUsername' =>
        [
          'shape' => 'String',
        ],
        'SshPublicKey' =>
        [
          'shape' => 'String',
        ],
        'AllowSelfManagement' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'UserProfiles' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'UserProfile',
      ],
    ],
    'ValidationException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'String',
        ],
      ],
      'exception' => true,
    ],
    'Volume' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'VolumeId' =>
        [
          'shape' => 'String',
        ],
        'Ec2VolumeId' =>
        [
          'shape' => 'String',
        ],
        'Name' =>
        [
          'shape' => 'String',
        ],
        'RaidArrayId' =>
        [
          'shape' => 'String',
        ],
        'InstanceId' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
        'Size' =>
        [
          'shape' => 'Integer',
        ],
        'Device' =>
        [
          'shape' => 'String',
        ],
        'MountPoint' =>
        [
          'shape' => 'String',
        ],
        'Region' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'VolumeType' =>
        [
          'shape' => 'String',
        ],
        'Iops' =>
        [
          'shape' => 'Integer',
        ],
      ],
    ],
    'VolumeConfiguration' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'MountPoint',
        1 => 'NumberOfDisks',
        2 => 'Size',
      ],
      'members' =>
      [
        'MountPoint' =>
        [
          'shape' => 'String',
        ],
        'RaidLevel' =>
        [
          'shape' => 'Integer',
        ],
        'NumberOfDisks' =>
        [
          'shape' => 'Integer',
        ],
        'Size' =>
        [
          'shape' => 'Integer',
        ],
        'VolumeType' =>
        [
          'shape' => 'String',
        ],
        'Iops' =>
        [
          'shape' => 'Integer',
        ],
      ],
    ],
    'VolumeConfigurations' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'VolumeConfiguration',
      ],
    ],
    'Volumes' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Volume',
      ],
    ],
    'WeeklyAutoScalingSchedule' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Monday' =>
        [
          'shape' => 'DailyAutoScalingSchedule',
        ],
        'Tuesday' =>
        [
          'shape' => 'DailyAutoScalingSchedule',
        ],
        'Wednesday' =>
        [
          'shape' => 'DailyAutoScalingSchedule',
        ],
        'Thursday' =>
        [
          'shape' => 'DailyAutoScalingSchedule',
        ],
        'Friday' =>
        [
          'shape' => 'DailyAutoScalingSchedule',
        ],
        'Saturday' =>
        [
          'shape' => 'DailyAutoScalingSchedule',
        ],
        'Sunday' =>
        [
          'shape' => 'DailyAutoScalingSchedule',
        ],
      ],
    ],
  ],
];