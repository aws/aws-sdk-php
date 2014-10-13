<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2012-06-01',
    'endpointPrefix' => 'elasticloadbalancing',
    'serviceFullName' => 'Elastic Load Balancing',
    'signatureVersion' => 'v4',
    'xmlNamespace' => 'http://elasticloadbalancing.amazonaws.com/doc/2012-06-01/',
    'protocol' => 'query',
  ],
  'operations' =>
  [
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
        'resultWrapper' => 'AddTagsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'TooManyTagsException',
          'error' =>
          [
            'code' => 'TooManyTags',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DuplicateTagKeysException',
          'error' =>
          [
            'code' => 'DuplicateTagKeys',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ApplySecurityGroupsToLoadBalancer' =>
    [
      'name' => 'ApplySecurityGroupsToLoadBalancer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ApplySecurityGroupsToLoadBalancerInput',
      ],
      'output' =>
      [
        'shape' => 'ApplySecurityGroupsToLoadBalancerOutput',
        'resultWrapper' => 'ApplySecurityGroupsToLoadBalancerResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidSecurityGroupException',
          'error' =>
          [
            'code' => 'InvalidSecurityGroup',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'AttachLoadBalancerToSubnets' =>
    [
      'name' => 'AttachLoadBalancerToSubnets',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AttachLoadBalancerToSubnetsInput',
      ],
      'output' =>
      [
        'shape' => 'AttachLoadBalancerToSubnetsOutput',
        'resultWrapper' => 'AttachLoadBalancerToSubnetsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'SubnetNotFoundException',
          'error' =>
          [
            'code' => 'SubnetNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidSubnetException',
          'error' =>
          [
            'code' => 'InvalidSubnet',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ConfigureHealthCheck' =>
    [
      'name' => 'ConfigureHealthCheck',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ConfigureHealthCheckInput',
      ],
      'output' =>
      [
        'shape' => 'ConfigureHealthCheckOutput',
        'resultWrapper' => 'ConfigureHealthCheckResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateAppCookieStickinessPolicy' =>
    [
      'name' => 'CreateAppCookieStickinessPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateAppCookieStickinessPolicyInput',
      ],
      'output' =>
      [
        'shape' => 'CreateAppCookieStickinessPolicyOutput',
        'resultWrapper' => 'CreateAppCookieStickinessPolicyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DuplicatePolicyNameException',
          'error' =>
          [
            'code' => 'DuplicatePolicyName',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'TooManyPoliciesException',
          'error' =>
          [
            'code' => 'TooManyPolicies',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateLBCookieStickinessPolicy' =>
    [
      'name' => 'CreateLBCookieStickinessPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateLBCookieStickinessPolicyInput',
      ],
      'output' =>
      [
        'shape' => 'CreateLBCookieStickinessPolicyOutput',
        'resultWrapper' => 'CreateLBCookieStickinessPolicyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DuplicatePolicyNameException',
          'error' =>
          [
            'code' => 'DuplicatePolicyName',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'TooManyPoliciesException',
          'error' =>
          [
            'code' => 'TooManyPolicies',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateLoadBalancer' =>
    [
      'name' => 'CreateLoadBalancer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateAccessPointInput',
      ],
      'output' =>
      [
        'shape' => 'CreateAccessPointOutput',
        'resultWrapper' => 'CreateLoadBalancerResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DuplicateAccessPointNameException',
          'error' =>
          [
            'code' => 'DuplicateLoadBalancerName',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'TooManyAccessPointsException',
          'error' =>
          [
            'code' => 'TooManyLoadBalancers',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'CertificateNotFoundException',
          'error' =>
          [
            'code' => 'CertificateNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'SubnetNotFoundException',
          'error' =>
          [
            'code' => 'SubnetNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'InvalidSubnetException',
          'error' =>
          [
            'code' => 'InvalidSubnet',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'InvalidSecurityGroupException',
          'error' =>
          [
            'code' => 'InvalidSecurityGroup',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'InvalidSchemeException',
          'error' =>
          [
            'code' => 'InvalidScheme',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'TooManyTagsException',
          'error' =>
          [
            'code' => 'TooManyTags',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'DuplicateTagKeysException',
          'error' =>
          [
            'code' => 'DuplicateTagKeys',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateLoadBalancerListeners' =>
    [
      'name' => 'CreateLoadBalancerListeners',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateLoadBalancerListenerInput',
      ],
      'output' =>
      [
        'shape' => 'CreateLoadBalancerListenerOutput',
        'resultWrapper' => 'CreateLoadBalancerListenersResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DuplicateListenerException',
          'error' =>
          [
            'code' => 'DuplicateListener',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'CertificateNotFoundException',
          'error' =>
          [
            'code' => 'CertificateNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateLoadBalancerPolicy' =>
    [
      'name' => 'CreateLoadBalancerPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateLoadBalancerPolicyInput',
      ],
      'output' =>
      [
        'shape' => 'CreateLoadBalancerPolicyOutput',
        'resultWrapper' => 'CreateLoadBalancerPolicyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'PolicyTypeNotFoundException',
          'error' =>
          [
            'code' => 'PolicyTypeNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DuplicatePolicyNameException',
          'error' =>
          [
            'code' => 'DuplicatePolicyName',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'TooManyPoliciesException',
          'error' =>
          [
            'code' => 'TooManyPolicies',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteLoadBalancer' =>
    [
      'name' => 'DeleteLoadBalancer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteAccessPointInput',
      ],
      'output' =>
      [
        'shape' => 'DeleteAccessPointOutput',
        'resultWrapper' => 'DeleteLoadBalancerResult',
      ],
    ],
    'DeleteLoadBalancerListeners' =>
    [
      'name' => 'DeleteLoadBalancerListeners',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteLoadBalancerListenerInput',
      ],
      'output' =>
      [
        'shape' => 'DeleteLoadBalancerListenerOutput',
        'resultWrapper' => 'DeleteLoadBalancerListenersResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteLoadBalancerPolicy' =>
    [
      'name' => 'DeleteLoadBalancerPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteLoadBalancerPolicyInput',
      ],
      'output' =>
      [
        'shape' => 'DeleteLoadBalancerPolicyOutput',
        'resultWrapper' => 'DeleteLoadBalancerPolicyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeregisterInstancesFromLoadBalancer' =>
    [
      'name' => 'DeregisterInstancesFromLoadBalancer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeregisterEndPointsInput',
      ],
      'output' =>
      [
        'shape' => 'DeregisterEndPointsOutput',
        'resultWrapper' => 'DeregisterInstancesFromLoadBalancerResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidEndPointException',
          'error' =>
          [
            'code' => 'InvalidInstance',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeInstanceHealth' =>
    [
      'name' => 'DescribeInstanceHealth',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeEndPointStateInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeEndPointStateOutput',
        'resultWrapper' => 'DescribeInstanceHealthResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidEndPointException',
          'error' =>
          [
            'code' => 'InvalidInstance',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeLoadBalancerAttributes' =>
    [
      'name' => 'DescribeLoadBalancerAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeLoadBalancerAttributesInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeLoadBalancerAttributesOutput',
        'resultWrapper' => 'DescribeLoadBalancerAttributesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LoadBalancerAttributeNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerAttributeNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeLoadBalancerPolicies' =>
    [
      'name' => 'DescribeLoadBalancerPolicies',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeLoadBalancerPoliciesInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeLoadBalancerPoliciesOutput',
        'resultWrapper' => 'DescribeLoadBalancerPoliciesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'PolicyNotFoundException',
          'error' =>
          [
            'code' => 'PolicyNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeLoadBalancerPolicyTypes' =>
    [
      'name' => 'DescribeLoadBalancerPolicyTypes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeLoadBalancerPolicyTypesInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeLoadBalancerPolicyTypesOutput',
        'resultWrapper' => 'DescribeLoadBalancerPolicyTypesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'PolicyTypeNotFoundException',
          'error' =>
          [
            'code' => 'PolicyTypeNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeLoadBalancers' =>
    [
      'name' => 'DescribeLoadBalancers',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeAccessPointsInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeAccessPointsOutput',
        'resultWrapper' => 'DescribeLoadBalancersResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
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
        'shape' => 'DescribeTagsInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeTagsOutput',
        'resultWrapper' => 'DescribeTagsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DetachLoadBalancerFromSubnets' =>
    [
      'name' => 'DetachLoadBalancerFromSubnets',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DetachLoadBalancerFromSubnetsInput',
      ],
      'output' =>
      [
        'shape' => 'DetachLoadBalancerFromSubnetsOutput',
        'resultWrapper' => 'DetachLoadBalancerFromSubnetsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DisableAvailabilityZonesForLoadBalancer' =>
    [
      'name' => 'DisableAvailabilityZonesForLoadBalancer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RemoveAvailabilityZonesInput',
      ],
      'output' =>
      [
        'shape' => 'RemoveAvailabilityZonesOutput',
        'resultWrapper' => 'DisableAvailabilityZonesForLoadBalancerResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'EnableAvailabilityZonesForLoadBalancer' =>
    [
      'name' => 'EnableAvailabilityZonesForLoadBalancer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AddAvailabilityZonesInput',
      ],
      'output' =>
      [
        'shape' => 'AddAvailabilityZonesOutput',
        'resultWrapper' => 'EnableAvailabilityZonesForLoadBalancerResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifyLoadBalancerAttributes' =>
    [
      'name' => 'ModifyLoadBalancerAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyLoadBalancerAttributesInput',
      ],
      'output' =>
      [
        'shape' => 'ModifyLoadBalancerAttributesOutput',
        'resultWrapper' => 'ModifyLoadBalancerAttributesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LoadBalancerAttributeNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerAttributeNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RegisterInstancesWithLoadBalancer' =>
    [
      'name' => 'RegisterInstancesWithLoadBalancer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RegisterEndPointsInput',
      ],
      'output' =>
      [
        'shape' => 'RegisterEndPointsOutput',
        'resultWrapper' => 'RegisterInstancesWithLoadBalancerResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidEndPointException',
          'error' =>
          [
            'code' => 'InvalidInstance',
            'httpStatusCode' => 400,
            'senderFault' => true,
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
        'resultWrapper' => 'RemoveTagsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetLoadBalancerListenerSSLCertificate' =>
    [
      'name' => 'SetLoadBalancerListenerSSLCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetLoadBalancerListenerSSLCertificateInput',
      ],
      'output' =>
      [
        'shape' => 'SetLoadBalancerListenerSSLCertificateOutput',
        'resultWrapper' => 'SetLoadBalancerListenerSSLCertificateResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'CertificateNotFoundException',
          'error' =>
          [
            'code' => 'CertificateNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ListenerNotFoundException',
          'error' =>
          [
            'code' => 'ListenerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetLoadBalancerPoliciesForBackendServer' =>
    [
      'name' => 'SetLoadBalancerPoliciesForBackendServer',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetLoadBalancerPoliciesForBackendServerInput',
      ],
      'output' =>
      [
        'shape' => 'SetLoadBalancerPoliciesForBackendServerOutput',
        'resultWrapper' => 'SetLoadBalancerPoliciesForBackendServerResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'PolicyNotFoundException',
          'error' =>
          [
            'code' => 'PolicyNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetLoadBalancerPoliciesOfListener' =>
    [
      'name' => 'SetLoadBalancerPoliciesOfListener',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetLoadBalancerPoliciesOfListenerInput',
      ],
      'output' =>
      [
        'shape' => 'SetLoadBalancerPoliciesOfListenerOutput',
        'resultWrapper' => 'SetLoadBalancerPoliciesOfListenerResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessPointNotFoundException',
          'error' =>
          [
            'code' => 'LoadBalancerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'PolicyNotFoundException',
          'error' =>
          [
            'code' => 'PolicyNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ListenerNotFoundException',
          'error' =>
          [
            'code' => 'ListenerNotFound',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidConfigurationRequestException',
          'error' =>
          [
            'code' => 'InvalidConfigurationRequest',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'AccessLog' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Enabled',
      ],
      'members' =>
      [
        'Enabled' =>
        [
          'shape' => 'AccessLogEnabled',
        ],
        'S3BucketName' =>
        [
          'shape' => 'S3BucketName',
        ],
        'EmitInterval' =>
        [
          'shape' => 'AccessLogInterval',
        ],
        'S3BucketPrefix' =>
        [
          'shape' => 'AccessLogPrefix',
        ],
      ],
    ],
    'AccessLogEnabled' =>
    [
      'type' => 'boolean',
    ],
    'AccessLogInterval' =>
    [
      'type' => 'integer',
    ],
    'AccessLogPrefix' =>
    [
      'type' => 'string',
    ],
    'AccessPointName' =>
    [
      'type' => 'string',
    ],
    'AccessPointNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'LoadBalancerNotFound',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'AccessPointPort' =>
    [
      'type' => 'integer',
    ],
    'AddAvailabilityZonesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'AvailabilityZones',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZones',
        ],
      ],
    ],
    'AddAvailabilityZonesOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZones',
        ],
      ],
    ],
    'AddTagsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerNames',
        1 => 'Tags',
      ],
      'members' =>
      [
        'LoadBalancerNames' =>
        [
          'shape' => 'LoadBalancerNames',
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
    'AppCookieStickinessPolicies' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AppCookieStickinessPolicy',
      ],
    ],
    'AppCookieStickinessPolicy' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PolicyName' =>
        [
          'shape' => 'PolicyName',
        ],
        'CookieName' =>
        [
          'shape' => 'CookieName',
        ],
      ],
    ],
    'ApplySecurityGroupsToLoadBalancerInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'SecurityGroups',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'SecurityGroups' =>
        [
          'shape' => 'SecurityGroups',
        ],
      ],
    ],
    'ApplySecurityGroupsToLoadBalancerOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SecurityGroups' =>
        [
          'shape' => 'SecurityGroups',
        ],
      ],
    ],
    'AttachLoadBalancerToSubnetsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'Subnets',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'Subnets' =>
        [
          'shape' => 'Subnets',
        ],
      ],
    ],
    'AttachLoadBalancerToSubnetsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Subnets' =>
        [
          'shape' => 'Subnets',
        ],
      ],
    ],
    'AttributeName' =>
    [
      'type' => 'string',
    ],
    'AttributeType' =>
    [
      'type' => 'string',
    ],
    'AttributeValue' =>
    [
      'type' => 'string',
    ],
    'AvailabilityZone' =>
    [
      'type' => 'string',
    ],
    'AvailabilityZones' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AvailabilityZone',
      ],
    ],
    'BackendServerDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstancePort' =>
        [
          'shape' => 'InstancePort',
        ],
        'PolicyNames' =>
        [
          'shape' => 'PolicyNames',
        ],
      ],
    ],
    'BackendServerDescriptions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'BackendServerDescription',
      ],
    ],
    'Cardinality' =>
    [
      'type' => 'string',
    ],
    'CertificateNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'CertificateNotFound',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ConfigureHealthCheckInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'HealthCheck',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'HealthCheck' =>
        [
          'shape' => 'HealthCheck',
        ],
      ],
    ],
    'ConfigureHealthCheckOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'HealthCheck' =>
        [
          'shape' => 'HealthCheck',
        ],
      ],
    ],
    'ConnectionDraining' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Enabled',
      ],
      'members' =>
      [
        'Enabled' =>
        [
          'shape' => 'ConnectionDrainingEnabled',
        ],
        'Timeout' =>
        [
          'shape' => 'ConnectionDrainingTimeout',
        ],
      ],
    ],
    'ConnectionDrainingEnabled' =>
    [
      'type' => 'boolean',
    ],
    'ConnectionDrainingTimeout' =>
    [
      'type' => 'integer',
    ],
    'ConnectionSettings' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'IdleTimeout',
      ],
      'members' =>
      [
        'IdleTimeout' =>
        [
          'shape' => 'IdleTimeout',
        ],
      ],
    ],
    'CookieExpirationPeriod' =>
    [
      'type' => 'long',
    ],
    'CookieName' =>
    [
      'type' => 'string',
    ],
    'CreateAccessPointInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'Listeners',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'Listeners' =>
        [
          'shape' => 'Listeners',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZones',
        ],
        'Subnets' =>
        [
          'shape' => 'Subnets',
        ],
        'SecurityGroups' =>
        [
          'shape' => 'SecurityGroups',
        ],
        'Scheme' =>
        [
          'shape' => 'LoadBalancerScheme',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'CreateAccessPointOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DNSName' =>
        [
          'shape' => 'DNSName',
        ],
      ],
    ],
    'CreateAppCookieStickinessPolicyInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'PolicyName',
        2 => 'CookieName',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'PolicyName' =>
        [
          'shape' => 'PolicyName',
        ],
        'CookieName' =>
        [
          'shape' => 'CookieName',
        ],
      ],
    ],
    'CreateAppCookieStickinessPolicyOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'CreateLBCookieStickinessPolicyInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'PolicyName',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'PolicyName' =>
        [
          'shape' => 'PolicyName',
        ],
        'CookieExpirationPeriod' =>
        [
          'shape' => 'CookieExpirationPeriod',
        ],
      ],
    ],
    'CreateLBCookieStickinessPolicyOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'CreateLoadBalancerListenerInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'Listeners',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'Listeners' =>
        [
          'shape' => 'Listeners',
        ],
      ],
    ],
    'CreateLoadBalancerListenerOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'CreateLoadBalancerPolicyInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'PolicyName',
        2 => 'PolicyTypeName',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'PolicyName' =>
        [
          'shape' => 'PolicyName',
        ],
        'PolicyTypeName' =>
        [
          'shape' => 'PolicyTypeName',
        ],
        'PolicyAttributes' =>
        [
          'shape' => 'PolicyAttributes',
        ],
      ],
    ],
    'CreateLoadBalancerPolicyOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'CreatedTime' =>
    [
      'type' => 'timestamp',
    ],
    'CrossZoneLoadBalancing' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Enabled',
      ],
      'members' =>
      [
        'Enabled' =>
        [
          'shape' => 'CrossZoneLoadBalancingEnabled',
        ],
      ],
    ],
    'CrossZoneLoadBalancingEnabled' =>
    [
      'type' => 'boolean',
    ],
    'DNSName' =>
    [
      'type' => 'string',
    ],
    'DefaultValue' =>
    [
      'type' => 'string',
    ],
    'DeleteAccessPointInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
      ],
    ],
    'DeleteAccessPointOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'DeleteLoadBalancerListenerInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'LoadBalancerPorts',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'LoadBalancerPorts' =>
        [
          'shape' => 'Ports',
        ],
      ],
    ],
    'DeleteLoadBalancerListenerOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'DeleteLoadBalancerPolicyInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'PolicyName',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'PolicyName' =>
        [
          'shape' => 'PolicyName',
        ],
      ],
    ],
    'DeleteLoadBalancerPolicyOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'DeregisterEndPointsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'Instances',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'Instances' =>
        [
          'shape' => 'Instances',
        ],
      ],
    ],
    'DeregisterEndPointsOutput' =>
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
    'DescribeAccessPointsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LoadBalancerNames' =>
        [
          'shape' => 'LoadBalancerNames',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
        'PageSize' =>
        [
          'shape' => 'PageSize',
        ],
      ],
    ],
    'DescribeAccessPointsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LoadBalancerDescriptions' =>
        [
          'shape' => 'LoadBalancerDescriptions',
        ],
        'NextMarker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'DescribeEndPointStateInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'Instances' =>
        [
          'shape' => 'Instances',
        ],
      ],
    ],
    'DescribeEndPointStateOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceStates' =>
        [
          'shape' => 'InstanceStates',
        ],
      ],
    ],
    'DescribeLoadBalancerAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
      ],
    ],
    'DescribeLoadBalancerAttributesOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LoadBalancerAttributes' =>
        [
          'shape' => 'LoadBalancerAttributes',
        ],
      ],
    ],
    'DescribeLoadBalancerPoliciesInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'PolicyNames' =>
        [
          'shape' => 'PolicyNames',
        ],
      ],
    ],
    'DescribeLoadBalancerPoliciesOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PolicyDescriptions' =>
        [
          'shape' => 'PolicyDescriptions',
        ],
      ],
    ],
    'DescribeLoadBalancerPolicyTypesInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PolicyTypeNames' =>
        [
          'shape' => 'PolicyTypeNames',
        ],
      ],
    ],
    'DescribeLoadBalancerPolicyTypesOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PolicyTypeDescriptions' =>
        [
          'shape' => 'PolicyTypeDescriptions',
        ],
      ],
    ],
    'DescribeTagsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerNames',
      ],
      'members' =>
      [
        'LoadBalancerNames' =>
        [
          'shape' => 'LoadBalancerNamesMax20',
        ],
      ],
    ],
    'DescribeTagsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TagDescriptions' =>
        [
          'shape' => 'TagDescriptions',
        ],
      ],
    ],
    'Description' =>
    [
      'type' => 'string',
    ],
    'DetachLoadBalancerFromSubnetsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'Subnets',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'Subnets' =>
        [
          'shape' => 'Subnets',
        ],
      ],
    ],
    'DetachLoadBalancerFromSubnetsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Subnets' =>
        [
          'shape' => 'Subnets',
        ],
      ],
    ],
    'DuplicateAccessPointNameException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DuplicateLoadBalancerName',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DuplicateListenerException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DuplicateListener',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DuplicatePolicyNameException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DuplicatePolicyName',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DuplicateTagKeysException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DuplicateTagKeys',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'EndPointPort' =>
    [
      'type' => 'integer',
    ],
    'HealthCheck' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Target',
        1 => 'Interval',
        2 => 'Timeout',
        3 => 'UnhealthyThreshold',
        4 => 'HealthyThreshold',
      ],
      'members' =>
      [
        'Target' =>
        [
          'shape' => 'HealthCheckTarget',
        ],
        'Interval' =>
        [
          'shape' => 'HealthCheckInterval',
        ],
        'Timeout' =>
        [
          'shape' => 'HealthCheckTimeout',
        ],
        'UnhealthyThreshold' =>
        [
          'shape' => 'UnhealthyThreshold',
        ],
        'HealthyThreshold' =>
        [
          'shape' => 'HealthyThreshold',
        ],
      ],
    ],
    'HealthCheckInterval' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 300,
    ],
    'HealthCheckTarget' =>
    [
      'type' => 'string',
    ],
    'HealthCheckTimeout' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 300,
    ],
    'HealthyThreshold' =>
    [
      'type' => 'integer',
      'min' => 2,
      'max' => 10,
    ],
    'IdleTimeout' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 3600,
    ],
    'Instance' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'InstanceId',
        ],
      ],
    ],
    'InstanceId' =>
    [
      'type' => 'string',
    ],
    'InstancePort' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 65535,
    ],
    'InstanceState' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InstanceId' =>
        [
          'shape' => 'InstanceId',
        ],
        'State' =>
        [
          'shape' => 'State',
        ],
        'ReasonCode' =>
        [
          'shape' => 'ReasonCode',
        ],
        'Description' =>
        [
          'shape' => 'Description',
        ],
      ],
    ],
    'InstanceStates' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'InstanceState',
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
    'InvalidConfigurationRequestException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidConfigurationRequest',
        'httpStatusCode' => 409,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidEndPointException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidInstance',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidSchemeException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidScheme',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidSecurityGroupException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidSecurityGroup',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidSubnetException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidSubnet',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'LBCookieStickinessPolicies' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'LBCookieStickinessPolicy',
      ],
    ],
    'LBCookieStickinessPolicy' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PolicyName' =>
        [
          'shape' => 'PolicyName',
        ],
        'CookieExpirationPeriod' =>
        [
          'shape' => 'CookieExpirationPeriod',
        ],
      ],
    ],
    'Listener' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Protocol',
        1 => 'LoadBalancerPort',
        2 => 'InstancePort',
      ],
      'members' =>
      [
        'Protocol' =>
        [
          'shape' => 'Protocol',
        ],
        'LoadBalancerPort' =>
        [
          'shape' => 'AccessPointPort',
        ],
        'InstanceProtocol' =>
        [
          'shape' => 'Protocol',
        ],
        'InstancePort' =>
        [
          'shape' => 'InstancePort',
        ],
        'SSLCertificateId' =>
        [
          'shape' => 'SSLCertificateId',
        ],
      ],
    ],
    'ListenerDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Listener' =>
        [
          'shape' => 'Listener',
        ],
        'PolicyNames' =>
        [
          'shape' => 'PolicyNames',
        ],
      ],
    ],
    'ListenerDescriptions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ListenerDescription',
      ],
    ],
    'ListenerNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ListenerNotFound',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'Listeners' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Listener',
      ],
    ],
    'LoadBalancerAttributeNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'LoadBalancerAttributeNotFound',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'LoadBalancerAttributes' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CrossZoneLoadBalancing' =>
        [
          'shape' => 'CrossZoneLoadBalancing',
        ],
        'AccessLog' =>
        [
          'shape' => 'AccessLog',
        ],
        'ConnectionDraining' =>
        [
          'shape' => 'ConnectionDraining',
        ],
        'ConnectionSettings' =>
        [
          'shape' => 'ConnectionSettings',
        ],
      ],
    ],
    'LoadBalancerDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'DNSName' =>
        [
          'shape' => 'DNSName',
        ],
        'CanonicalHostedZoneName' =>
        [
          'shape' => 'DNSName',
        ],
        'CanonicalHostedZoneNameID' =>
        [
          'shape' => 'DNSName',
        ],
        'ListenerDescriptions' =>
        [
          'shape' => 'ListenerDescriptions',
        ],
        'Policies' =>
        [
          'shape' => 'Policies',
        ],
        'BackendServerDescriptions' =>
        [
          'shape' => 'BackendServerDescriptions',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZones',
        ],
        'Subnets' =>
        [
          'shape' => 'Subnets',
        ],
        'VPCId' =>
        [
          'shape' => 'VPCId',
        ],
        'Instances' =>
        [
          'shape' => 'Instances',
        ],
        'HealthCheck' =>
        [
          'shape' => 'HealthCheck',
        ],
        'SourceSecurityGroup' =>
        [
          'shape' => 'SourceSecurityGroup',
        ],
        'SecurityGroups' =>
        [
          'shape' => 'SecurityGroups',
        ],
        'CreatedTime' =>
        [
          'shape' => 'CreatedTime',
        ],
        'Scheme' =>
        [
          'shape' => 'LoadBalancerScheme',
        ],
      ],
    ],
    'LoadBalancerDescriptions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'LoadBalancerDescription',
      ],
    ],
    'LoadBalancerNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AccessPointName',
      ],
    ],
    'LoadBalancerNamesMax20' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AccessPointName',
      ],
      'min' => 1,
      'max' => 20,
    ],
    'LoadBalancerScheme' =>
    [
      'type' => 'string',
    ],
    'Marker' =>
    [
      'type' => 'string',
    ],
    'ModifyLoadBalancerAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'LoadBalancerAttributes',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'LoadBalancerAttributes' =>
        [
          'shape' => 'LoadBalancerAttributes',
        ],
      ],
    ],
    'ModifyLoadBalancerAttributesOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'LoadBalancerAttributes' =>
        [
          'shape' => 'LoadBalancerAttributes',
        ],
      ],
    ],
    'PageSize' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 400,
    ],
    'Policies' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AppCookieStickinessPolicies' =>
        [
          'shape' => 'AppCookieStickinessPolicies',
        ],
        'LBCookieStickinessPolicies' =>
        [
          'shape' => 'LBCookieStickinessPolicies',
        ],
        'OtherPolicies' =>
        [
          'shape' => 'PolicyNames',
        ],
      ],
    ],
    'PolicyAttribute' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AttributeName' =>
        [
          'shape' => 'AttributeName',
        ],
        'AttributeValue' =>
        [
          'shape' => 'AttributeValue',
        ],
      ],
    ],
    'PolicyAttributeDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AttributeName' =>
        [
          'shape' => 'AttributeName',
        ],
        'AttributeValue' =>
        [
          'shape' => 'AttributeValue',
        ],
      ],
    ],
    'PolicyAttributeDescriptions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'PolicyAttributeDescription',
      ],
    ],
    'PolicyAttributeTypeDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AttributeName' =>
        [
          'shape' => 'AttributeName',
        ],
        'AttributeType' =>
        [
          'shape' => 'AttributeType',
        ],
        'Description' =>
        [
          'shape' => 'Description',
        ],
        'DefaultValue' =>
        [
          'shape' => 'DefaultValue',
        ],
        'Cardinality' =>
        [
          'shape' => 'Cardinality',
        ],
      ],
    ],
    'PolicyAttributeTypeDescriptions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'PolicyAttributeTypeDescription',
      ],
    ],
    'PolicyAttributes' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'PolicyAttribute',
      ],
    ],
    'PolicyDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PolicyName' =>
        [
          'shape' => 'PolicyName',
        ],
        'PolicyTypeName' =>
        [
          'shape' => 'PolicyTypeName',
        ],
        'PolicyAttributeDescriptions' =>
        [
          'shape' => 'PolicyAttributeDescriptions',
        ],
      ],
    ],
    'PolicyDescriptions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'PolicyDescription',
      ],
    ],
    'PolicyName' =>
    [
      'type' => 'string',
    ],
    'PolicyNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'PolicyName',
      ],
    ],
    'PolicyNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'PolicyNotFound',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'PolicyTypeDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PolicyTypeName' =>
        [
          'shape' => 'PolicyTypeName',
        ],
        'Description' =>
        [
          'shape' => 'Description',
        ],
        'PolicyAttributeTypeDescriptions' =>
        [
          'shape' => 'PolicyAttributeTypeDescriptions',
        ],
      ],
    ],
    'PolicyTypeDescriptions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'PolicyTypeDescription',
      ],
    ],
    'PolicyTypeName' =>
    [
      'type' => 'string',
    ],
    'PolicyTypeNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'PolicyTypeName',
      ],
    ],
    'PolicyTypeNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'PolicyTypeNotFound',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'Ports' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AccessPointPort',
      ],
    ],
    'Protocol' =>
    [
      'type' => 'string',
    ],
    'ReasonCode' =>
    [
      'type' => 'string',
    ],
    'RegisterEndPointsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'Instances',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'Instances' =>
        [
          'shape' => 'Instances',
        ],
      ],
    ],
    'RegisterEndPointsOutput' =>
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
    'RemoveAvailabilityZonesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'AvailabilityZones',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZones',
        ],
      ],
    ],
    'RemoveAvailabilityZonesOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZones',
        ],
      ],
    ],
    'RemoveTagsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerNames',
        1 => 'Tags',
      ],
      'members' =>
      [
        'LoadBalancerNames' =>
        [
          'shape' => 'LoadBalancerNames',
        ],
        'Tags' =>
        [
          'shape' => 'TagKeyList',
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
    'S3BucketName' =>
    [
      'type' => 'string',
    ],
    'SSLCertificateId' =>
    [
      'type' => 'string',
    ],
    'SecurityGroupId' =>
    [
      'type' => 'string',
    ],
    'SecurityGroupName' =>
    [
      'type' => 'string',
    ],
    'SecurityGroupOwnerAlias' =>
    [
      'type' => 'string',
    ],
    'SecurityGroups' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'SecurityGroupId',
      ],
    ],
    'SetLoadBalancerListenerSSLCertificateInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'LoadBalancerPort',
        2 => 'SSLCertificateId',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'LoadBalancerPort' =>
        [
          'shape' => 'AccessPointPort',
        ],
        'SSLCertificateId' =>
        [
          'shape' => 'SSLCertificateId',
        ],
      ],
    ],
    'SetLoadBalancerListenerSSLCertificateOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'SetLoadBalancerPoliciesForBackendServerInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'InstancePort',
        2 => 'PolicyNames',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'InstancePort' =>
        [
          'shape' => 'EndPointPort',
        ],
        'PolicyNames' =>
        [
          'shape' => 'PolicyNames',
        ],
      ],
    ],
    'SetLoadBalancerPoliciesForBackendServerOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'SetLoadBalancerPoliciesOfListenerInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoadBalancerName',
        1 => 'LoadBalancerPort',
        2 => 'PolicyNames',
      ],
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'LoadBalancerPort' =>
        [
          'shape' => 'AccessPointPort',
        ],
        'PolicyNames' =>
        [
          'shape' => 'PolicyNames',
        ],
      ],
    ],
    'SetLoadBalancerPoliciesOfListenerOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'SourceSecurityGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OwnerAlias' =>
        [
          'shape' => 'SecurityGroupOwnerAlias',
        ],
        'GroupName' =>
        [
          'shape' => 'SecurityGroupName',
        ],
      ],
    ],
    'State' =>
    [
      'type' => 'string',
    ],
    'SubnetId' =>
    [
      'type' => 'string',
    ],
    'SubnetNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SubnetNotFound',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'Subnets' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'SubnetId',
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
        'Key' =>
        [
          'shape' => 'TagKey',
        ],
        'Value' =>
        [
          'shape' => 'TagValue',
        ],
      ],
    ],
    'TagDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LoadBalancerName' =>
        [
          'shape' => 'AccessPointName',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'TagDescriptions' =>
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
      'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*]$',
    ],
    'TagKeyList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'TagKeyOnly',
      ],
      'min' => 1,
    ],
    'TagKeyOnly' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Key' =>
        [
          'shape' => 'TagKey',
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
      'min' => 1,
    ],
    'TagValue' =>
    [
      'type' => 'string',
      'min' => 0,
      'max' => 256,
      'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*]$',
    ],
    'TooManyAccessPointsException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'TooManyLoadBalancers',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'TooManyPoliciesException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'TooManyPolicies',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'TooManyTagsException' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'TooManyTags',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'UnhealthyThreshold' =>
    [
      'type' => 'integer',
      'min' => 2,
      'max' => 10,
    ],
    'VPCId' =>
    [
      'type' => 'string',
    ],
  ],
];