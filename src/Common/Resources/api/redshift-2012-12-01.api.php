<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2012-12-01',
    'endpointPrefix' => 'redshift',
    'serviceFullName' => 'Amazon Redshift',
    'signatureVersion' => 'v4',
    'xmlNamespace' => 'http://redshift.amazonaws.com/doc/2012-12-01/',
    'protocol' => 'query',
  ],
  'operations' =>
  [
    'AuthorizeClusterSecurityGroupIngress' =>
    [
      'name' => 'AuthorizeClusterSecurityGroupIngress',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AuthorizeClusterSecurityGroupIngressMessage',
      ],
      'output' =>
      [
        'shape' => 'AuthorizeClusterSecurityGroupIngressResult',
        'wrapper' => true,
        'resultWrapper' => 'AuthorizeClusterSecurityGroupIngressResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidClusterSecurityGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSecurityGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationAlreadyExistsFault',
          'error' =>
          [
            'code' => 'AuthorizationAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'AuthorizationQuotaExceededFault',
          'error' =>
          [
            'code' => 'AuthorizationQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'AuthorizeSnapshotAccess' =>
    [
      'name' => 'AuthorizeSnapshotAccess',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AuthorizeSnapshotAccessMessage',
      ],
      'output' =>
      [
        'shape' => 'AuthorizeSnapshotAccessResult',
        'wrapper' => true,
        'resultWrapper' => 'AuthorizeSnapshotAccessResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AuthorizationAlreadyExistsFault',
          'error' =>
          [
            'code' => 'AuthorizationAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationQuotaExceededFault',
          'error' =>
          [
            'code' => 'AuthorizationQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CopyClusterSnapshot' =>
    [
      'name' => 'CopyClusterSnapshot',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CopyClusterSnapshotMessage',
      ],
      'output' =>
      [
        'shape' => 'CopyClusterSnapshotResult',
        'wrapper' => true,
        'resultWrapper' => 'CopyClusterSnapshotResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSnapshotAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidClusterSnapshotStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSnapshotState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ClusterSnapshotQuotaExceededFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateCluster' =>
    [
      'name' => 'CreateCluster',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateClusterMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateClusterResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateClusterResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ClusterAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InsufficientClusterCapacityFault',
          'error' =>
          [
            'code' => 'InsufficientClusterCapacity',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ClusterParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ClusterSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'ClusterQuotaExceededFault',
          'error' =>
          [
            'code' => 'ClusterQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'NumberOfNodesQuotaExceededFault',
          'error' =>
          [
            'code' => 'NumberOfNodesQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'NumberOfNodesPerClusterLimitExceededFault',
          'error' =>
          [
            'code' => 'NumberOfNodesPerClusterLimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'ClusterSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'InvalidVPCNetworkStateFault',
          'error' =>
          [
            'code' => 'InvalidVPCNetworkStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'InvalidClusterSubnetGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSubnetGroupStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'InvalidSubnet',
          'error' =>
          [
            'code' => 'InvalidSubnet',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'UnauthorizedOperation',
          'error' =>
          [
            'code' => 'UnauthorizedOperation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        12 =>
        [
          'shape' => 'HsmClientCertificateNotFoundFault',
          'error' =>
          [
            'code' => 'HsmClientCertificateNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        13 =>
        [
          'shape' => 'HsmConfigurationNotFoundFault',
          'error' =>
          [
            'code' => 'HsmConfigurationNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        14 =>
        [
          'shape' => 'InvalidElasticIpFault',
          'error' =>
          [
            'code' => 'InvalidElasticIpFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateClusterParameterGroup' =>
    [
      'name' => 'CreateClusterParameterGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateClusterParameterGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateClusterParameterGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateClusterParameterGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterParameterGroupQuotaExceededFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterParameterGroupAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateClusterSecurityGroup' =>
    [
      'name' => 'CreateClusterSecurityGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateClusterSecurityGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateClusterSecurityGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateClusterSecurityGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSecurityGroupAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ClusterSecurityGroupAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterSecurityGroupQuotaExceededFault',
          'error' =>
          [
            'code' => 'QuotaExceeded.ClusterSecurityGroup',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateClusterSnapshot' =>
    [
      'name' => 'CreateClusterSnapshot',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateClusterSnapshotMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateClusterSnapshotResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateClusterSnapshotResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSnapshotAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidClusterStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ClusterSnapshotQuotaExceededFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateClusterSubnetGroup' =>
    [
      'name' => 'CreateClusterSubnetGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateClusterSubnetGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateClusterSubnetGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateClusterSubnetGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSubnetGroupAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ClusterSubnetGroupAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterSubnetGroupQuotaExceededFault',
          'error' =>
          [
            'code' => 'ClusterSubnetGroupQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ClusterSubnetQuotaExceededFault',
          'error' =>
          [
            'code' => 'ClusterSubnetQuotaExceededFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidSubnet',
          'error' =>
          [
            'code' => 'InvalidSubnet',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'UnauthorizedOperation',
          'error' =>
          [
            'code' => 'UnauthorizedOperation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateEventSubscription' =>
    [
      'name' => 'CreateEventSubscription',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateEventSubscriptionMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateEventSubscriptionResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateEventSubscriptionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'EventSubscriptionQuotaExceededFault',
          'error' =>
          [
            'code' => 'EventSubscriptionQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'SubscriptionAlreadyExistFault',
          'error' =>
          [
            'code' => 'SubscriptionAlreadyExist',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'SNSInvalidTopicFault',
          'error' =>
          [
            'code' => 'SNSInvalidTopic',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'SNSNoAuthorizationFault',
          'error' =>
          [
            'code' => 'SNSNoAuthorization',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'SNSTopicArnNotFoundFault',
          'error' =>
          [
            'code' => 'SNSTopicArnNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'SubscriptionEventIdNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionEventIdNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'SubscriptionCategoryNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionCategoryNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'SubscriptionSeverityNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionSeverityNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'SourceNotFoundFault',
          'error' =>
          [
            'code' => 'SourceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateHsmClientCertificate' =>
    [
      'name' => 'CreateHsmClientCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateHsmClientCertificateMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateHsmClientCertificateResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateHsmClientCertificateResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'HsmClientCertificateAlreadyExistsFault',
          'error' =>
          [
            'code' => 'HsmClientCertificateAlreadyExistsFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'HsmClientCertificateQuotaExceededFault',
          'error' =>
          [
            'code' => 'HsmClientCertificateQuotaExceededFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateHsmConfiguration' =>
    [
      'name' => 'CreateHsmConfiguration',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateHsmConfigurationMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateHsmConfigurationResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateHsmConfigurationResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'HsmConfigurationAlreadyExistsFault',
          'error' =>
          [
            'code' => 'HsmConfigurationAlreadyExistsFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'HsmConfigurationQuotaExceededFault',
          'error' =>
          [
            'code' => 'HsmConfigurationQuotaExceededFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteCluster' =>
    [
      'name' => 'DeleteCluster',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteClusterMessage',
      ],
      'output' =>
      [
        'shape' => 'DeleteClusterResult',
        'wrapper' => true,
        'resultWrapper' => 'DeleteClusterResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidClusterStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ClusterSnapshotAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ClusterSnapshotQuotaExceededFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteClusterParameterGroup' =>
    [
      'name' => 'DeleteClusterParameterGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteClusterParameterGroupMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidClusterParameterGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterParameterGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteClusterSecurityGroup' =>
    [
      'name' => 'DeleteClusterSecurityGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteClusterSecurityGroupMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidClusterSecurityGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSecurityGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteClusterSnapshot' =>
    [
      'name' => 'DeleteClusterSnapshot',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteClusterSnapshotMessage',
      ],
      'output' =>
      [
        'shape' => 'DeleteClusterSnapshotResult',
        'wrapper' => true,
        'resultWrapper' => 'DeleteClusterSnapshotResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidClusterSnapshotStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSnapshotState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteClusterSubnetGroup' =>
    [
      'name' => 'DeleteClusterSubnetGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteClusterSubnetGroupMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidClusterSubnetGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSubnetGroupStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidClusterSubnetStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSubnetStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ClusterSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteEventSubscription' =>
    [
      'name' => 'DeleteEventSubscription',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteEventSubscriptionMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'SubscriptionNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidSubscriptionStateFault',
          'error' =>
          [
            'code' => 'InvalidSubscriptionStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteHsmClientCertificate' =>
    [
      'name' => 'DeleteHsmClientCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteHsmClientCertificateMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidHsmClientCertificateStateFault',
          'error' =>
          [
            'code' => 'InvalidHsmClientCertificateStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'HsmClientCertificateNotFoundFault',
          'error' =>
          [
            'code' => 'HsmClientCertificateNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteHsmConfiguration' =>
    [
      'name' => 'DeleteHsmConfiguration',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteHsmConfigurationMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidHsmConfigurationStateFault',
          'error' =>
          [
            'code' => 'InvalidHsmConfigurationStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'HsmConfigurationNotFoundFault',
          'error' =>
          [
            'code' => 'HsmConfigurationNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeClusterParameterGroups' =>
    [
      'name' => 'DescribeClusterParameterGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeClusterParameterGroupsMessage',
      ],
      'output' =>
      [
        'shape' => 'ClusterParameterGroupsMessage',
        'resultWrapper' => 'DescribeClusterParameterGroupsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeClusterParameters' =>
    [
      'name' => 'DescribeClusterParameters',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeClusterParametersMessage',
      ],
      'output' =>
      [
        'shape' => 'ClusterParameterGroupDetails',
        'resultWrapper' => 'DescribeClusterParametersResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeClusterSecurityGroups' =>
    [
      'name' => 'DescribeClusterSecurityGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeClusterSecurityGroupsMessage',
      ],
      'output' =>
      [
        'shape' => 'ClusterSecurityGroupMessage',
        'resultWrapper' => 'DescribeClusterSecurityGroupsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeClusterSnapshots' =>
    [
      'name' => 'DescribeClusterSnapshots',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeClusterSnapshotsMessage',
      ],
      'output' =>
      [
        'shape' => 'SnapshotMessage',
        'resultWrapper' => 'DescribeClusterSnapshotsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeClusterSubnetGroups' =>
    [
      'name' => 'DescribeClusterSubnetGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeClusterSubnetGroupsMessage',
      ],
      'output' =>
      [
        'shape' => 'ClusterSubnetGroupMessage',
        'resultWrapper' => 'DescribeClusterSubnetGroupsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeClusterVersions' =>
    [
      'name' => 'DescribeClusterVersions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeClusterVersionsMessage',
      ],
      'output' =>
      [
        'shape' => 'ClusterVersionsMessage',
        'resultWrapper' => 'DescribeClusterVersionsResult',
      ],
    ],
    'DescribeClusters' =>
    [
      'name' => 'DescribeClusters',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeClustersMessage',
      ],
      'output' =>
      [
        'shape' => 'ClustersMessage',
        'resultWrapper' => 'DescribeClustersResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeDefaultClusterParameters' =>
    [
      'name' => 'DescribeDefaultClusterParameters',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDefaultClusterParametersMessage',
      ],
      'output' =>
      [
        'shape' => 'DescribeDefaultClusterParametersResult',
        'wrapper' => true,
        'resultWrapper' => 'DescribeDefaultClusterParametersResult',
      ],
    ],
    'DescribeEventCategories' =>
    [
      'name' => 'DescribeEventCategories',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeEventCategoriesMessage',
      ],
      'output' =>
      [
        'shape' => 'EventCategoriesMessage',
        'resultWrapper' => 'DescribeEventCategoriesResult',
      ],
    ],
    'DescribeEventSubscriptions' =>
    [
      'name' => 'DescribeEventSubscriptions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeEventSubscriptionsMessage',
      ],
      'output' =>
      [
        'shape' => 'EventSubscriptionsMessage',
        'resultWrapper' => 'DescribeEventSubscriptionsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'SubscriptionNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeEvents' =>
    [
      'name' => 'DescribeEvents',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeEventsMessage',
      ],
      'output' =>
      [
        'shape' => 'EventsMessage',
        'resultWrapper' => 'DescribeEventsResult',
      ],
    ],
    'DescribeHsmClientCertificates' =>
    [
      'name' => 'DescribeHsmClientCertificates',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeHsmClientCertificatesMessage',
      ],
      'output' =>
      [
        'shape' => 'HsmClientCertificateMessage',
        'resultWrapper' => 'DescribeHsmClientCertificatesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'HsmClientCertificateNotFoundFault',
          'error' =>
          [
            'code' => 'HsmClientCertificateNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeHsmConfigurations' =>
    [
      'name' => 'DescribeHsmConfigurations',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeHsmConfigurationsMessage',
      ],
      'output' =>
      [
        'shape' => 'HsmConfigurationMessage',
        'resultWrapper' => 'DescribeHsmConfigurationsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'HsmConfigurationNotFoundFault',
          'error' =>
          [
            'code' => 'HsmConfigurationNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeLoggingStatus' =>
    [
      'name' => 'DescribeLoggingStatus',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeLoggingStatusMessage',
      ],
      'output' =>
      [
        'shape' => 'LoggingStatus',
        'resultWrapper' => 'DescribeLoggingStatusResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeOrderableClusterOptions' =>
    [
      'name' => 'DescribeOrderableClusterOptions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeOrderableClusterOptionsMessage',
      ],
      'output' =>
      [
        'shape' => 'OrderableClusterOptionsMessage',
        'resultWrapper' => 'DescribeOrderableClusterOptionsResult',
      ],
    ],
    'DescribeReservedNodeOfferings' =>
    [
      'name' => 'DescribeReservedNodeOfferings',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeReservedNodeOfferingsMessage',
      ],
      'output' =>
      [
        'shape' => 'ReservedNodeOfferingsMessage',
        'resultWrapper' => 'DescribeReservedNodeOfferingsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ReservedNodeOfferingNotFoundFault',
          'error' =>
          [
            'code' => 'ReservedNodeOfferingNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeReservedNodes' =>
    [
      'name' => 'DescribeReservedNodes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeReservedNodesMessage',
      ],
      'output' =>
      [
        'shape' => 'ReservedNodesMessage',
        'resultWrapper' => 'DescribeReservedNodesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ReservedNodeNotFoundFault',
          'error' =>
          [
            'code' => 'ReservedNodeNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeResize' =>
    [
      'name' => 'DescribeResize',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeResizeMessage',
      ],
      'output' =>
      [
        'shape' => 'ResizeProgressMessage',
        'resultWrapper' => 'DescribeResizeResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResizeNotFoundFault',
          'error' =>
          [
            'code' => 'ResizeNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DisableLogging' =>
    [
      'name' => 'DisableLogging',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DisableLoggingMessage',
      ],
      'output' =>
      [
        'shape' => 'LoggingStatus',
        'resultWrapper' => 'DisableLoggingResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DisableSnapshotCopy' =>
    [
      'name' => 'DisableSnapshotCopy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DisableSnapshotCopyMessage',
      ],
      'output' =>
      [
        'shape' => 'DisableSnapshotCopyResult',
        'wrapper' => true,
        'resultWrapper' => 'DisableSnapshotCopyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'SnapshotCopyAlreadyDisabledFault',
          'error' =>
          [
            'code' => 'SnapshotCopyAlreadyDisabledFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidClusterStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'UnauthorizedOperation',
          'error' =>
          [
            'code' => 'UnauthorizedOperation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'EnableLogging' =>
    [
      'name' => 'EnableLogging',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'EnableLoggingMessage',
      ],
      'output' =>
      [
        'shape' => 'LoggingStatus',
        'resultWrapper' => 'EnableLoggingResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'BucketNotFoundFault',
          'error' =>
          [
            'code' => 'BucketNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InsufficientS3BucketPolicyFault',
          'error' =>
          [
            'code' => 'InsufficientS3BucketPolicyFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidS3KeyPrefixFault',
          'error' =>
          [
            'code' => 'InvalidS3KeyPrefixFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InvalidS3BucketNameFault',
          'error' =>
          [
            'code' => 'InvalidS3BucketNameFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'EnableSnapshotCopy' =>
    [
      'name' => 'EnableSnapshotCopy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'EnableSnapshotCopyMessage',
      ],
      'output' =>
      [
        'shape' => 'EnableSnapshotCopyResult',
        'wrapper' => true,
        'resultWrapper' => 'EnableSnapshotCopyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'IncompatibleOrderableOptions',
          'error' =>
          [
            'code' => 'IncompatibleOrderableOptions',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidClusterStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'CopyToRegionDisabledFault',
          'error' =>
          [
            'code' => 'CopyToRegionDisabledFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'SnapshotCopyAlreadyEnabledFault',
          'error' =>
          [
            'code' => 'SnapshotCopyAlreadyEnabledFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'UnknownSnapshotCopyRegionFault',
          'error' =>
          [
            'code' => 'UnknownSnapshotCopyRegionFault',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'UnauthorizedOperation',
          'error' =>
          [
            'code' => 'UnauthorizedOperation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifyCluster' =>
    [
      'name' => 'ModifyCluster',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyClusterMessage',
      ],
      'output' =>
      [
        'shape' => 'ModifyClusterResult',
        'wrapper' => true,
        'resultWrapper' => 'ModifyClusterResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidClusterStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidClusterSecurityGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSecurityGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NumberOfNodesQuotaExceededFault',
          'error' =>
          [
            'code' => 'NumberOfNodesQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'ClusterSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'ClusterParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'InsufficientClusterCapacityFault',
          'error' =>
          [
            'code' => 'InsufficientClusterCapacity',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'UnsupportedOptionFault',
          'error' =>
          [
            'code' => 'UnsupportedOptionFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'UnauthorizedOperation',
          'error' =>
          [
            'code' => 'UnauthorizedOperation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'HsmClientCertificateNotFoundFault',
          'error' =>
          [
            'code' => 'HsmClientCertificateNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'HsmConfigurationNotFoundFault',
          'error' =>
          [
            'code' => 'HsmConfigurationNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'ClusterAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ClusterAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifyClusterParameterGroup' =>
    [
      'name' => 'ModifyClusterParameterGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyClusterParameterGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'ClusterParameterGroupNameMessage',
        'resultWrapper' => 'ModifyClusterParameterGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidClusterParameterGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterParameterGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifyClusterSubnetGroup' =>
    [
      'name' => 'ModifyClusterSubnetGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyClusterSubnetGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'ModifyClusterSubnetGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'ModifyClusterSubnetGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterSubnetQuotaExceededFault',
          'error' =>
          [
            'code' => 'ClusterSubnetQuotaExceededFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'SubnetAlreadyInUse',
          'error' =>
          [
            'code' => 'SubnetAlreadyInUse',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidSubnet',
          'error' =>
          [
            'code' => 'InvalidSubnet',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'UnauthorizedOperation',
          'error' =>
          [
            'code' => 'UnauthorizedOperation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifyEventSubscription' =>
    [
      'name' => 'ModifyEventSubscription',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyEventSubscriptionMessage',
      ],
      'output' =>
      [
        'shape' => 'ModifyEventSubscriptionResult',
        'wrapper' => true,
        'resultWrapper' => 'ModifyEventSubscriptionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'SubscriptionNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'SNSInvalidTopicFault',
          'error' =>
          [
            'code' => 'SNSInvalidTopic',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'SNSNoAuthorizationFault',
          'error' =>
          [
            'code' => 'SNSNoAuthorization',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'SNSTopicArnNotFoundFault',
          'error' =>
          [
            'code' => 'SNSTopicArnNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'SubscriptionEventIdNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionEventIdNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'SubscriptionCategoryNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionCategoryNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'SubscriptionSeverityNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionSeverityNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'SourceNotFoundFault',
          'error' =>
          [
            'code' => 'SourceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'InvalidSubscriptionStateFault',
          'error' =>
          [
            'code' => 'InvalidSubscriptionStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifySnapshotCopyRetentionPeriod' =>
    [
      'name' => 'ModifySnapshotCopyRetentionPeriod',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifySnapshotCopyRetentionPeriodMessage',
      ],
      'output' =>
      [
        'shape' => 'ModifySnapshotCopyRetentionPeriodResult',
        'wrapper' => true,
        'resultWrapper' => 'ModifySnapshotCopyRetentionPeriodResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'SnapshotCopyDisabledFault',
          'error' =>
          [
            'code' => 'SnapshotCopyDisabledFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'UnauthorizedOperation',
          'error' =>
          [
            'code' => 'UnauthorizedOperation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidClusterStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PurchaseReservedNodeOffering' =>
    [
      'name' => 'PurchaseReservedNodeOffering',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PurchaseReservedNodeOfferingMessage',
      ],
      'output' =>
      [
        'shape' => 'PurchaseReservedNodeOfferingResult',
        'wrapper' => true,
        'resultWrapper' => 'PurchaseReservedNodeOfferingResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ReservedNodeOfferingNotFoundFault',
          'error' =>
          [
            'code' => 'ReservedNodeOfferingNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ReservedNodeAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ReservedNodeAlreadyExists',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ReservedNodeQuotaExceededFault',
          'error' =>
          [
            'code' => 'ReservedNodeQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RebootCluster' =>
    [
      'name' => 'RebootCluster',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RebootClusterMessage',
      ],
      'output' =>
      [
        'shape' => 'RebootClusterResult',
        'wrapper' => true,
        'resultWrapper' => 'RebootClusterResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidClusterStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ResetClusterParameterGroup' =>
    [
      'name' => 'ResetClusterParameterGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ResetClusterParameterGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'ClusterParameterGroupNameMessage',
        'resultWrapper' => 'ResetClusterParameterGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidClusterParameterGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterParameterGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RestoreFromClusterSnapshot' =>
    [
      'name' => 'RestoreFromClusterSnapshot',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RestoreFromClusterSnapshotMessage',
      ],
      'output' =>
      [
        'shape' => 'RestoreFromClusterSnapshotResult',
        'wrapper' => true,
        'resultWrapper' => 'RestoreFromClusterSnapshotResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessToSnapshotDeniedFault',
          'error' =>
          [
            'code' => 'AccessToSnapshotDenied',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ClusterAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ClusterAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ClusterSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ClusterQuotaExceededFault',
          'error' =>
          [
            'code' => 'ClusterQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InsufficientClusterCapacityFault',
          'error' =>
          [
            'code' => 'InsufficientClusterCapacity',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'InvalidClusterSnapshotStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSnapshotState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'InvalidRestoreFault',
          'error' =>
          [
            'code' => 'InvalidRestore',
            'httpStatusCode' => 406,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'NumberOfNodesQuotaExceededFault',
          'error' =>
          [
            'code' => 'NumberOfNodesQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'NumberOfNodesPerClusterLimitExceededFault',
          'error' =>
          [
            'code' => 'NumberOfNodesPerClusterLimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'InvalidVPCNetworkStateFault',
          'error' =>
          [
            'code' => 'InvalidVPCNetworkStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'InvalidClusterSubnetGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSubnetGroupStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'InvalidSubnet',
          'error' =>
          [
            'code' => 'InvalidSubnet',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        12 =>
        [
          'shape' => 'ClusterSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        13 =>
        [
          'shape' => 'UnauthorizedOperation',
          'error' =>
          [
            'code' => 'UnauthorizedOperation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        14 =>
        [
          'shape' => 'HsmClientCertificateNotFoundFault',
          'error' =>
          [
            'code' => 'HsmClientCertificateNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        15 =>
        [
          'shape' => 'HsmConfigurationNotFoundFault',
          'error' =>
          [
            'code' => 'HsmConfigurationNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        16 =>
        [
          'shape' => 'InvalidElasticIpFault',
          'error' =>
          [
            'code' => 'InvalidElasticIpFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        17 =>
        [
          'shape' => 'ClusterParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        18 =>
        [
          'shape' => 'ClusterSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RevokeClusterSecurityGroupIngress' =>
    [
      'name' => 'RevokeClusterSecurityGroupIngress',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RevokeClusterSecurityGroupIngressMessage',
      ],
      'output' =>
      [
        'shape' => 'RevokeClusterSecurityGroupIngressResult',
        'wrapper' => true,
        'resultWrapper' => 'RevokeClusterSecurityGroupIngressResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AuthorizationNotFoundFault',
          'error' =>
          [
            'code' => 'AuthorizationNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidClusterSecurityGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterSecurityGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RevokeSnapshotAccess' =>
    [
      'name' => 'RevokeSnapshotAccess',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RevokeSnapshotAccessMessage',
      ],
      'output' =>
      [
        'shape' => 'RevokeSnapshotAccessResult',
        'wrapper' => true,
        'resultWrapper' => 'RevokeSnapshotAccessResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessToSnapshotDeniedFault',
          'error' =>
          [
            'code' => 'AccessToSnapshotDenied',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AuthorizationNotFoundFault',
          'error' =>
          [
            'code' => 'AuthorizationNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ClusterSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RotateEncryptionKey' =>
    [
      'name' => 'RotateEncryptionKey',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RotateEncryptionKeyMessage',
      ],
      'output' =>
      [
        'shape' => 'RotateEncryptionKeyResult',
        'wrapper' => true,
        'resultWrapper' => 'RotateEncryptionKeyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ClusterNotFoundFault',
          'error' =>
          [
            'code' => 'ClusterNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidClusterStateFault',
          'error' =>
          [
            'code' => 'InvalidClusterState',
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
    'AccessToSnapshotDeniedFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'AccessToSnapshotDenied',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'AccountWithRestoreAccess' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AccountId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'AccountsWithRestoreAccessList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AccountWithRestoreAccess',
        'locationName' => 'AccountWithRestoreAccess',
      ],
    ],
    'AuthorizationAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'AuthorizationAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'AuthorizationNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'AuthorizationNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'AuthorizationQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'AuthorizationQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'AuthorizeClusterSecurityGroupIngressMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterSecurityGroupName',
      ],
      'members' =>
      [
        'ClusterSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'CIDRIP' =>
        [
          'shape' => 'String',
        ],
        'EC2SecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'EC2SecurityGroupOwnerId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'AuthorizeSnapshotAccessMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SnapshotIdentifier',
        1 => 'AccountWithRestoreAccess',
      ],
      'members' =>
      [
        'SnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'AccountWithRestoreAccess' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'AvailabilityZone' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'AvailabilityZoneList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AvailabilityZone',
        'locationName' => 'AvailabilityZone',
      ],
    ],
    'Boolean' =>
    [
      'type' => 'boolean',
    ],
    'BooleanOptional' =>
    [
      'type' => 'boolean',
    ],
    'BucketNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'BucketNotFoundFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'Cluster' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'NodeType' =>
        [
          'shape' => 'String',
        ],
        'ClusterStatus' =>
        [
          'shape' => 'String',
        ],
        'ModifyStatus' =>
        [
          'shape' => 'String',
        ],
        'MasterUsername' =>
        [
          'shape' => 'String',
        ],
        'DBName' =>
        [
          'shape' => 'String',
        ],
        'Endpoint' =>
        [
          'shape' => 'Endpoint',
        ],
        'ClusterCreateTime' =>
        [
          'shape' => 'TStamp',
        ],
        'AutomatedSnapshotRetentionPeriod' =>
        [
          'shape' => 'Integer',
        ],
        'ClusterSecurityGroups' =>
        [
          'shape' => 'ClusterSecurityGroupMembershipList',
        ],
        'VpcSecurityGroups' =>
        [
          'shape' => 'VpcSecurityGroupMembershipList',
        ],
        'ClusterParameterGroups' =>
        [
          'shape' => 'ClusterParameterGroupStatusList',
        ],
        'ClusterSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'VpcId' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'PreferredMaintenanceWindow' =>
        [
          'shape' => 'String',
        ],
        'PendingModifiedValues' =>
        [
          'shape' => 'PendingModifiedValues',
        ],
        'ClusterVersion' =>
        [
          'shape' => 'String',
        ],
        'AllowVersionUpgrade' =>
        [
          'shape' => 'Boolean',
        ],
        'NumberOfNodes' =>
        [
          'shape' => 'Integer',
        ],
        'PubliclyAccessible' =>
        [
          'shape' => 'Boolean',
        ],
        'Encrypted' =>
        [
          'shape' => 'Boolean',
        ],
        'RestoreStatus' =>
        [
          'shape' => 'RestoreStatus',
        ],
        'HsmStatus' =>
        [
          'shape' => 'HsmStatus',
        ],
        'ClusterSnapshotCopyStatus' =>
        [
          'shape' => 'ClusterSnapshotCopyStatus',
        ],
        'ClusterPublicKey' =>
        [
          'shape' => 'String',
        ],
        'ClusterNodes' =>
        [
          'shape' => 'ClusterNodesList',
        ],
        'ElasticIpStatus' =>
        [
          'shape' => 'ElasticIpStatus',
        ],
        'ClusterRevisionNumber' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'ClusterAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Cluster',
        'locationName' => 'Cluster',
      ],
    ],
    'ClusterNode' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'NodeRole' =>
        [
          'shape' => 'String',
        ],
        'PrivateIPAddress' =>
        [
          'shape' => 'String',
        ],
        'PublicIPAddress' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ClusterNodesList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ClusterNode',
      ],
    ],
    'ClusterNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterParameterGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'ParameterGroupFamily' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'ClusterParameterGroupAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterParameterGroupAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterParameterGroupDetails' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Parameters' =>
        [
          'shape' => 'ParametersList',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ClusterParameterGroupNameMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'ParameterGroupStatus' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ClusterParameterGroupNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterParameterGroupNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterParameterGroupQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterParameterGroupQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterParameterGroupStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'ParameterApplyStatus' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ClusterParameterGroupStatusList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ClusterParameterGroupStatus',
        'locationName' => 'ClusterParameterGroup',
      ],
    ],
    'ClusterParameterGroupsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'ParameterGroups' =>
        [
          'shape' => 'ParameterGroupList',
        ],
      ],
    ],
    'ClusterQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSecurityGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'EC2SecurityGroups' =>
        [
          'shape' => 'EC2SecurityGroupList',
        ],
        'IPRanges' =>
        [
          'shape' => 'IPRangeList',
        ],
      ],
      'wrapper' => true,
    ],
    'ClusterSecurityGroupAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterSecurityGroupAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSecurityGroupMembership' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ClusterSecurityGroupMembershipList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ClusterSecurityGroupMembership',
        'locationName' => 'ClusterSecurityGroup',
      ],
    ],
    'ClusterSecurityGroupMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'ClusterSecurityGroups' =>
        [
          'shape' => 'ClusterSecurityGroups',
        ],
      ],
    ],
    'ClusterSecurityGroupNameList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
        'locationName' => 'ClusterSecurityGroupName',
      ],
    ],
    'ClusterSecurityGroupNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterSecurityGroupNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSecurityGroupQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'QuotaExceeded.ClusterSecurityGroup',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSecurityGroups' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ClusterSecurityGroup',
        'locationName' => 'ClusterSecurityGroup',
      ],
    ],
    'ClusterSnapshotAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterSnapshotAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSnapshotCopyStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DestinationRegion' =>
        [
          'shape' => 'String',
        ],
        'RetentionPeriod' =>
        [
          'shape' => 'Long',
        ],
      ],
    ],
    'ClusterSnapshotNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterSnapshotNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSnapshotQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterSnapshotQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSubnetGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'VpcId' =>
        [
          'shape' => 'String',
        ],
        'SubnetGroupStatus' =>
        [
          'shape' => 'String',
        ],
        'Subnets' =>
        [
          'shape' => 'SubnetList',
        ],
      ],
      'wrapper' => true,
    ],
    'ClusterSubnetGroupAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterSubnetGroupAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSubnetGroupMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'ClusterSubnetGroups' =>
        [
          'shape' => 'ClusterSubnetGroups',
        ],
      ],
    ],
    'ClusterSubnetGroupNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterSubnetGroupNotFoundFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSubnetGroupQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterSubnetGroupQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterSubnetGroups' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ClusterSubnetGroup',
        'locationName' => 'ClusterSubnetGroup',
      ],
    ],
    'ClusterSubnetQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ClusterSubnetQuotaExceededFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ClusterVersion' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterVersion' =>
        [
          'shape' => 'String',
        ],
        'ClusterParameterGroupFamily' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ClusterVersionList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ClusterVersion',
        'locationName' => 'ClusterVersion',
      ],
    ],
    'ClusterVersionsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'ClusterVersions' =>
        [
          'shape' => 'ClusterVersionList',
        ],
      ],
    ],
    'ClustersMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'Clusters' =>
        [
          'shape' => 'ClusterList',
        ],
      ],
    ],
    'CopyClusterSnapshotMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SourceSnapshotIdentifier',
        1 => 'TargetSnapshotIdentifier',
      ],
      'members' =>
      [
        'SourceSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SourceSnapshotClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'TargetSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CopyToRegionDisabledFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'CopyToRegionDisabledFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'CreateClusterMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
        1 => 'NodeType',
        2 => 'MasterUsername',
        3 => 'MasterUserPassword',
      ],
      'members' =>
      [
        'DBName' =>
        [
          'shape' => 'String',
        ],
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'ClusterType' =>
        [
          'shape' => 'String',
        ],
        'NodeType' =>
        [
          'shape' => 'String',
        ],
        'MasterUsername' =>
        [
          'shape' => 'String',
        ],
        'MasterUserPassword' =>
        [
          'shape' => 'String',
        ],
        'ClusterSecurityGroups' =>
        [
          'shape' => 'ClusterSecurityGroupNameList',
        ],
        'VpcSecurityGroupIds' =>
        [
          'shape' => 'VpcSecurityGroupIdList',
        ],
        'ClusterSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'PreferredMaintenanceWindow' =>
        [
          'shape' => 'String',
        ],
        'ClusterParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'AutomatedSnapshotRetentionPeriod' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Port' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'ClusterVersion' =>
        [
          'shape' => 'String',
        ],
        'AllowVersionUpgrade' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'NumberOfNodes' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'PubliclyAccessible' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'Encrypted' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'HsmClientCertificateIdentifier' =>
        [
          'shape' => 'String',
        ],
        'HsmConfigurationIdentifier' =>
        [
          'shape' => 'String',
        ],
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateClusterParameterGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ParameterGroupName',
        1 => 'ParameterGroupFamily',
        2 => 'Description',
      ],
      'members' =>
      [
        'ParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'ParameterGroupFamily' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateClusterSecurityGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterSecurityGroupName',
        1 => 'Description',
      ],
      'members' =>
      [
        'ClusterSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateClusterSnapshotMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SnapshotIdentifier',
        1 => 'ClusterIdentifier',
      ],
      'members' =>
      [
        'SnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateClusterSubnetGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterSubnetGroupName',
        1 => 'Description',
        2 => 'SubnetIds',
      ],
      'members' =>
      [
        'ClusterSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'SubnetIds' =>
        [
          'shape' => 'SubnetIdentifierList',
        ],
      ],
    ],
    'CreateEventSubscriptionMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SubscriptionName',
        1 => 'SnsTopicArn',
      ],
      'members' =>
      [
        'SubscriptionName' =>
        [
          'shape' => 'String',
        ],
        'SnsTopicArn' =>
        [
          'shape' => 'String',
        ],
        'SourceType' =>
        [
          'shape' => 'String',
        ],
        'SourceIds' =>
        [
          'shape' => 'SourceIdsList',
        ],
        'EventCategories' =>
        [
          'shape' => 'EventCategoriesList',
        ],
        'Severity' =>
        [
          'shape' => 'String',
        ],
        'Enabled' =>
        [
          'shape' => 'BooleanOptional',
        ],
      ],
    ],
    'CreateHsmClientCertificateMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HsmClientCertificateIdentifier',
      ],
      'members' =>
      [
        'HsmClientCertificateIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateHsmConfigurationMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HsmConfigurationIdentifier',
        1 => 'Description',
        2 => 'HsmIpAddress',
        3 => 'HsmPartitionName',
        4 => 'HsmPartitionPassword',
        5 => 'HsmServerPublicCertificate',
      ],
      'members' =>
      [
        'HsmConfigurationIdentifier' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'HsmIpAddress' =>
        [
          'shape' => 'String',
        ],
        'HsmPartitionName' =>
        [
          'shape' => 'String',
        ],
        'HsmPartitionPassword' =>
        [
          'shape' => 'String',
        ],
        'HsmServerPublicCertificate' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DefaultClusterParameters' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ParameterGroupFamily' =>
        [
          'shape' => 'String',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'Parameters' =>
        [
          'shape' => 'ParametersList',
        ],
      ],
      'wrapper' => true,
    ],
    'DeleteClusterMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SkipFinalClusterSnapshot' =>
        [
          'shape' => 'Boolean',
        ],
        'FinalClusterSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteClusterParameterGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ParameterGroupName',
      ],
      'members' =>
      [
        'ParameterGroupName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteClusterSecurityGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterSecurityGroupName',
      ],
      'members' =>
      [
        'ClusterSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteClusterSnapshotMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SnapshotIdentifier',
      ],
      'members' =>
      [
        'SnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteClusterSubnetGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterSubnetGroupName',
      ],
      'members' =>
      [
        'ClusterSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteEventSubscriptionMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SubscriptionName',
      ],
      'members' =>
      [
        'SubscriptionName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteHsmClientCertificateMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HsmClientCertificateIdentifier',
      ],
      'members' =>
      [
        'HsmClientCertificateIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteHsmConfigurationMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HsmConfigurationIdentifier',
      ],
      'members' =>
      [
        'HsmConfigurationIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeClusterParameterGroupsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeClusterParametersMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ParameterGroupName',
      ],
      'members' =>
      [
        'ParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'Source' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeClusterSecurityGroupsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeClusterSnapshotsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotType' =>
        [
          'shape' => 'String',
        ],
        'StartTime' =>
        [
          'shape' => 'TStamp',
        ],
        'EndTime' =>
        [
          'shape' => 'TStamp',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'OwnerAccount' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeClusterSubnetGroupsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeClusterVersionsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterVersion' =>
        [
          'shape' => 'String',
        ],
        'ClusterParameterGroupFamily' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeClustersMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeDefaultClusterParametersMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ParameterGroupFamily',
      ],
      'members' =>
      [
        'ParameterGroupFamily' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeEventCategoriesMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SourceType' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeEventSubscriptionsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SubscriptionName' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeEventsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SourceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SourceType' =>
        [
          'shape' => 'SourceType',
        ],
        'StartTime' =>
        [
          'shape' => 'TStamp',
        ],
        'EndTime' =>
        [
          'shape' => 'TStamp',
        ],
        'Duration' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeHsmClientCertificatesMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'HsmClientCertificateIdentifier' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeHsmConfigurationsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'HsmConfigurationIdentifier' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeLoggingStatusMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeOrderableClusterOptionsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterVersion' =>
        [
          'shape' => 'String',
        ],
        'NodeType' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeReservedNodeOfferingsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedNodeOfferingId' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeReservedNodesMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedNodeId' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeResizeMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DisableLoggingMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DisableSnapshotCopyMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Double' =>
    [
      'type' => 'double',
    ],
    'DoubleOptional' =>
    [
      'type' => 'double',
    ],
    'EC2SecurityGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Status' =>
        [
          'shape' => 'String',
        ],
        'EC2SecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'EC2SecurityGroupOwnerId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'EC2SecurityGroupList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'EC2SecurityGroup',
        'locationName' => 'EC2SecurityGroup',
      ],
    ],
    'ElasticIpStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'EnableLoggingMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
        1 => 'BucketName',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'BucketName' =>
        [
          'shape' => 'String',
        ],
        'S3KeyPrefix' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'EnableSnapshotCopyMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
        1 => 'DestinationRegion',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'DestinationRegion' =>
        [
          'shape' => 'String',
        ],
        'RetentionPeriod' =>
        [
          'shape' => 'IntegerOptional',
        ],
      ],
    ],
    'Endpoint' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Address' =>
        [
          'shape' => 'String',
        ],
        'Port' =>
        [
          'shape' => 'Integer',
        ],
      ],
    ],
    'Event' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SourceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SourceType' =>
        [
          'shape' => 'SourceType',
        ],
        'Message' =>
        [
          'shape' => 'String',
        ],
        'EventCategories' =>
        [
          'shape' => 'EventCategoriesList',
        ],
        'Severity' =>
        [
          'shape' => 'String',
        ],
        'Date' =>
        [
          'shape' => 'TStamp',
        ],
        'EventId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'EventCategoriesList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
        'locationName' => 'EventCategory',
      ],
    ],
    'EventCategoriesMap' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SourceType' =>
        [
          'shape' => 'String',
        ],
        'Events' =>
        [
          'shape' => 'EventInfoMapList',
        ],
      ],
      'wrapper' => true,
    ],
    'EventCategoriesMapList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'EventCategoriesMap',
        'locationName' => 'EventCategoriesMap',
      ],
    ],
    'EventCategoriesMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'EventCategoriesMapList' =>
        [
          'shape' => 'EventCategoriesMapList',
        ],
      ],
    ],
    'EventInfoMap' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'EventId' =>
        [
          'shape' => 'String',
        ],
        'EventCategories' =>
        [
          'shape' => 'EventCategoriesList',
        ],
        'EventDescription' =>
        [
          'shape' => 'String',
        ],
        'Severity' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'EventInfoMapList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'EventInfoMap',
        'locationName' => 'EventInfoMap',
      ],
    ],
    'EventList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Event',
        'locationName' => 'Event',
      ],
    ],
    'EventSubscription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CustomerAwsId' =>
        [
          'shape' => 'String',
        ],
        'CustSubscriptionId' =>
        [
          'shape' => 'String',
        ],
        'SnsTopicArn' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
        'SubscriptionCreationTime' =>
        [
          'shape' => 'TStamp',
        ],
        'SourceType' =>
        [
          'shape' => 'String',
        ],
        'SourceIdsList' =>
        [
          'shape' => 'SourceIdsList',
        ],
        'EventCategoriesList' =>
        [
          'shape' => 'EventCategoriesList',
        ],
        'Severity' =>
        [
          'shape' => 'String',
        ],
        'Enabled' =>
        [
          'shape' => 'Boolean',
        ],
      ],
      'wrapper' => true,
    ],
    'EventSubscriptionQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'EventSubscriptionQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'EventSubscriptionsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'EventSubscription',
        'locationName' => 'EventSubscription',
      ],
    ],
    'EventSubscriptionsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'EventSubscriptionsList' =>
        [
          'shape' => 'EventSubscriptionsList',
        ],
      ],
    ],
    'EventsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'Events' =>
        [
          'shape' => 'EventList',
        ],
      ],
    ],
    'HsmClientCertificate' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'HsmClientCertificateIdentifier' =>
        [
          'shape' => 'String',
        ],
        'HsmClientCertificatePublicKey' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'HsmClientCertificateAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'HsmClientCertificateAlreadyExistsFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'HsmClientCertificateList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'HsmClientCertificate',
        'locationName' => 'HsmClientCertificate',
      ],
    ],
    'HsmClientCertificateMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'HsmClientCertificates' =>
        [
          'shape' => 'HsmClientCertificateList',
        ],
      ],
    ],
    'HsmClientCertificateNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'HsmClientCertificateNotFoundFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'HsmClientCertificateQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'HsmClientCertificateQuotaExceededFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'HsmConfiguration' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'HsmConfigurationIdentifier' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'HsmIpAddress' =>
        [
          'shape' => 'String',
        ],
        'HsmPartitionName' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'HsmConfigurationAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'HsmConfigurationAlreadyExistsFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'HsmConfigurationList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'HsmConfiguration',
        'locationName' => 'HsmConfiguration',
      ],
    ],
    'HsmConfigurationMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'HsmConfigurations' =>
        [
          'shape' => 'HsmConfigurationList',
        ],
      ],
    ],
    'HsmConfigurationNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'HsmConfigurationNotFoundFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'HsmConfigurationQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'HsmConfigurationQuotaExceededFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'HsmStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'HsmClientCertificateIdentifier' =>
        [
          'shape' => 'String',
        ],
        'HsmConfigurationIdentifier' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'IPRange' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Status' =>
        [
          'shape' => 'String',
        ],
        'CIDRIP' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'IPRangeList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'IPRange',
        'locationName' => 'IPRange',
      ],
    ],
    'ImportTablesCompleted' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
      ],
    ],
    'ImportTablesInProgress' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
      ],
    ],
    'ImportTablesNotStarted' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
      ],
    ],
    'IncompatibleOrderableOptions' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'IncompatibleOrderableOptions',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InsufficientClusterCapacityFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InsufficientClusterCapacity',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InsufficientS3BucketPolicyFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InsufficientS3BucketPolicyFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'Integer' =>
    [
      'type' => 'integer',
    ],
    'IntegerOptional' =>
    [
      'type' => 'integer',
    ],
    'InvalidClusterParameterGroupStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidClusterParameterGroupState',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidClusterSecurityGroupStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidClusterSecurityGroupState',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidClusterSnapshotStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidClusterSnapshotState',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidClusterStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidClusterState',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidClusterSubnetGroupStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidClusterSubnetGroupStateFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidClusterSubnetStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidClusterSubnetStateFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidElasticIpFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidElasticIpFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidHsmClientCertificateStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidHsmClientCertificateStateFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidHsmConfigurationStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidHsmConfigurationStateFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidRestoreFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidRestore',
        'httpStatusCode' => 406,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidS3BucketNameFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidS3BucketNameFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidS3KeyPrefixFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidS3KeyPrefixFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidSubnet' =>
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
    'InvalidSubscriptionStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidSubscriptionStateFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidVPCNetworkStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidVPCNetworkStateFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'LoggingStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LoggingEnabled' =>
        [
          'shape' => 'Boolean',
        ],
        'BucketName' =>
        [
          'shape' => 'String',
        ],
        'S3KeyPrefix' =>
        [
          'shape' => 'String',
        ],
        'LastSuccessfulDeliveryTime' =>
        [
          'shape' => 'TStamp',
        ],
        'LastFailureTime' =>
        [
          'shape' => 'TStamp',
        ],
        'LastFailureMessage' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Long' =>
    [
      'type' => 'long',
    ],
    'LongOptional' =>
    [
      'type' => 'long',
    ],
    'ModifyClusterMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'ClusterType' =>
        [
          'shape' => 'String',
        ],
        'NodeType' =>
        [
          'shape' => 'String',
        ],
        'NumberOfNodes' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'ClusterSecurityGroups' =>
        [
          'shape' => 'ClusterSecurityGroupNameList',
        ],
        'VpcSecurityGroupIds' =>
        [
          'shape' => 'VpcSecurityGroupIdList',
        ],
        'MasterUserPassword' =>
        [
          'shape' => 'String',
        ],
        'ClusterParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'AutomatedSnapshotRetentionPeriod' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'PreferredMaintenanceWindow' =>
        [
          'shape' => 'String',
        ],
        'ClusterVersion' =>
        [
          'shape' => 'String',
        ],
        'AllowVersionUpgrade' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'HsmClientCertificateIdentifier' =>
        [
          'shape' => 'String',
        ],
        'HsmConfigurationIdentifier' =>
        [
          'shape' => 'String',
        ],
        'NewClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ModifyClusterParameterGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ParameterGroupName',
        1 => 'Parameters',
      ],
      'members' =>
      [
        'ParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'Parameters' =>
        [
          'shape' => 'ParametersList',
        ],
      ],
    ],
    'ModifyClusterSubnetGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterSubnetGroupName',
        1 => 'SubnetIds',
      ],
      'members' =>
      [
        'ClusterSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'SubnetIds' =>
        [
          'shape' => 'SubnetIdentifierList',
        ],
      ],
    ],
    'ModifyEventSubscriptionMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SubscriptionName',
      ],
      'members' =>
      [
        'SubscriptionName' =>
        [
          'shape' => 'String',
        ],
        'SnsTopicArn' =>
        [
          'shape' => 'String',
        ],
        'SourceType' =>
        [
          'shape' => 'String',
        ],
        'SourceIds' =>
        [
          'shape' => 'SourceIdsList',
        ],
        'EventCategories' =>
        [
          'shape' => 'EventCategoriesList',
        ],
        'Severity' =>
        [
          'shape' => 'String',
        ],
        'Enabled' =>
        [
          'shape' => 'BooleanOptional',
        ],
      ],
    ],
    'ModifySnapshotCopyRetentionPeriodMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
        1 => 'RetentionPeriod',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'RetentionPeriod' =>
        [
          'shape' => 'Integer',
        ],
      ],
    ],
    'NumberOfNodesPerClusterLimitExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'NumberOfNodesPerClusterLimitExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'NumberOfNodesQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'NumberOfNodesQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'OrderableClusterOption' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterVersion' =>
        [
          'shape' => 'String',
        ],
        'ClusterType' =>
        [
          'shape' => 'String',
        ],
        'NodeType' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZoneList',
        ],
      ],
      'wrapper' => true,
    ],
    'OrderableClusterOptionsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OrderableClusterOption',
        'locationName' => 'OrderableClusterOption',
      ],
    ],
    'OrderableClusterOptionsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OrderableClusterOptions' =>
        [
          'shape' => 'OrderableClusterOptionsList',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Parameter' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ParameterName' =>
        [
          'shape' => 'String',
        ],
        'ParameterValue' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'Source' =>
        [
          'shape' => 'String',
        ],
        'DataType' =>
        [
          'shape' => 'String',
        ],
        'AllowedValues' =>
        [
          'shape' => 'String',
        ],
        'IsModifiable' =>
        [
          'shape' => 'Boolean',
        ],
        'MinimumEngineVersion' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ParameterGroupList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ClusterParameterGroup',
        'locationName' => 'ClusterParameterGroup',
      ],
    ],
    'ParametersList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Parameter',
        'locationName' => 'Parameter',
      ],
    ],
    'PendingModifiedValues' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MasterUserPassword' =>
        [
          'shape' => 'String',
        ],
        'NodeType' =>
        [
          'shape' => 'String',
        ],
        'NumberOfNodes' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'ClusterType' =>
        [
          'shape' => 'String',
        ],
        'ClusterVersion' =>
        [
          'shape' => 'String',
        ],
        'AutomatedSnapshotRetentionPeriod' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'PurchaseReservedNodeOfferingMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ReservedNodeOfferingId',
      ],
      'members' =>
      [
        'ReservedNodeOfferingId' =>
        [
          'shape' => 'String',
        ],
        'NodeCount' =>
        [
          'shape' => 'IntegerOptional',
        ],
      ],
    ],
    'RebootClusterMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'RecurringCharge' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'RecurringChargeAmount' =>
        [
          'shape' => 'Double',
        ],
        'RecurringChargeFrequency' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'RecurringChargeList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'RecurringCharge',
        'locationName' => 'RecurringCharge',
      ],
    ],
    'ReservedNode' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedNodeId' =>
        [
          'shape' => 'String',
        ],
        'ReservedNodeOfferingId' =>
        [
          'shape' => 'String',
        ],
        'NodeType' =>
        [
          'shape' => 'String',
        ],
        'StartTime' =>
        [
          'shape' => 'TStamp',
        ],
        'Duration' =>
        [
          'shape' => 'Integer',
        ],
        'FixedPrice' =>
        [
          'shape' => 'Double',
        ],
        'UsagePrice' =>
        [
          'shape' => 'Double',
        ],
        'CurrencyCode' =>
        [
          'shape' => 'String',
        ],
        'NodeCount' =>
        [
          'shape' => 'Integer',
        ],
        'State' =>
        [
          'shape' => 'String',
        ],
        'OfferingType' =>
        [
          'shape' => 'String',
        ],
        'RecurringCharges' =>
        [
          'shape' => 'RecurringChargeList',
        ],
      ],
      'wrapper' => true,
    ],
    'ReservedNodeAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ReservedNodeAlreadyExists',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ReservedNodeList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ReservedNode',
        'locationName' => 'ReservedNode',
      ],
    ],
    'ReservedNodeNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ReservedNodeNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ReservedNodeOffering' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedNodeOfferingId' =>
        [
          'shape' => 'String',
        ],
        'NodeType' =>
        [
          'shape' => 'String',
        ],
        'Duration' =>
        [
          'shape' => 'Integer',
        ],
        'FixedPrice' =>
        [
          'shape' => 'Double',
        ],
        'UsagePrice' =>
        [
          'shape' => 'Double',
        ],
        'CurrencyCode' =>
        [
          'shape' => 'String',
        ],
        'OfferingType' =>
        [
          'shape' => 'String',
        ],
        'RecurringCharges' =>
        [
          'shape' => 'RecurringChargeList',
        ],
      ],
      'wrapper' => true,
    ],
    'ReservedNodeOfferingList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ReservedNodeOffering',
        'locationName' => 'ReservedNodeOffering',
      ],
    ],
    'ReservedNodeOfferingNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ReservedNodeOfferingNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ReservedNodeOfferingsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'ReservedNodeOfferings' =>
        [
          'shape' => 'ReservedNodeOfferingList',
        ],
      ],
    ],
    'ReservedNodeQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ReservedNodeQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ReservedNodesMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'ReservedNodes' =>
        [
          'shape' => 'ReservedNodeList',
        ],
      ],
    ],
    'ResetClusterParameterGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ParameterGroupName',
      ],
      'members' =>
      [
        'ParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'ResetAllParameters' =>
        [
          'shape' => 'Boolean',
        ],
        'Parameters' =>
        [
          'shape' => 'ParametersList',
        ],
      ],
    ],
    'ResizeNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ResizeNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ResizeProgressMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TargetNodeType' =>
        [
          'shape' => 'String',
        ],
        'TargetNumberOfNodes' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'TargetClusterType' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
        'ImportTablesCompleted' =>
        [
          'shape' => 'ImportTablesCompleted',
        ],
        'ImportTablesInProgress' =>
        [
          'shape' => 'ImportTablesInProgress',
        ],
        'ImportTablesNotStarted' =>
        [
          'shape' => 'ImportTablesNotStarted',
        ],
        'AvgResizeRateInMegaBytesPerSecond' =>
        [
          'shape' => 'DoubleOptional',
        ],
        'TotalResizeDataInMegaBytes' =>
        [
          'shape' => 'LongOptional',
        ],
        'ProgressInMegaBytes' =>
        [
          'shape' => 'LongOptional',
        ],
        'ElapsedTimeInSeconds' =>
        [
          'shape' => 'LongOptional',
        ],
        'EstimatedTimeToCompletionInSeconds' =>
        [
          'shape' => 'LongOptional',
        ],
      ],
    ],
    'RestoreFromClusterSnapshotMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
        1 => 'SnapshotIdentifier',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'Port' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'AllowVersionUpgrade' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'ClusterSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'PubliclyAccessible' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'OwnerAccount' =>
        [
          'shape' => 'String',
        ],
        'HsmClientCertificateIdentifier' =>
        [
          'shape' => 'String',
        ],
        'HsmConfigurationIdentifier' =>
        [
          'shape' => 'String',
        ],
        'ElasticIp' =>
        [
          'shape' => 'String',
        ],
        'ClusterParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'ClusterSecurityGroups' =>
        [
          'shape' => 'ClusterSecurityGroupNameList',
        ],
        'VpcSecurityGroupIds' =>
        [
          'shape' => 'VpcSecurityGroupIdList',
        ],
        'PreferredMaintenanceWindow' =>
        [
          'shape' => 'String',
        ],
        'AutomatedSnapshotRetentionPeriod' =>
        [
          'shape' => 'IntegerOptional',
        ],
      ],
    ],
    'RestoreStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Status' =>
        [
          'shape' => 'String',
        ],
        'CurrentRestoreRateInMegaBytesPerSecond' =>
        [
          'shape' => 'Double',
        ],
        'SnapshotSizeInMegaBytes' =>
        [
          'shape' => 'Long',
        ],
        'ProgressInMegaBytes' =>
        [
          'shape' => 'Long',
        ],
        'ElapsedTimeInSeconds' =>
        [
          'shape' => 'Long',
        ],
        'EstimatedTimeToCompletionInSeconds' =>
        [
          'shape' => 'Long',
        ],
      ],
    ],
    'RevokeClusterSecurityGroupIngressMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterSecurityGroupName',
      ],
      'members' =>
      [
        'ClusterSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'CIDRIP' =>
        [
          'shape' => 'String',
        ],
        'EC2SecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'EC2SecurityGroupOwnerId' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'RevokeSnapshotAccessMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SnapshotIdentifier',
        1 => 'AccountWithRestoreAccess',
      ],
      'members' =>
      [
        'SnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'AccountWithRestoreAccess' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'RotateEncryptionKeyMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ClusterIdentifier',
      ],
      'members' =>
      [
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'SNSInvalidTopicFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SNSInvalidTopic',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SNSNoAuthorizationFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SNSNoAuthorization',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SNSTopicArnNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SNSTopicArnNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'Snapshot' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'ClusterIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotCreateTime' =>
        [
          'shape' => 'TStamp',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
        'Port' =>
        [
          'shape' => 'Integer',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'ClusterCreateTime' =>
        [
          'shape' => 'TStamp',
        ],
        'MasterUsername' =>
        [
          'shape' => 'String',
        ],
        'ClusterVersion' =>
        [
          'shape' => 'String',
        ],
        'SnapshotType' =>
        [
          'shape' => 'String',
        ],
        'NodeType' =>
        [
          'shape' => 'String',
        ],
        'NumberOfNodes' =>
        [
          'shape' => 'Integer',
        ],
        'DBName' =>
        [
          'shape' => 'String',
        ],
        'VpcId' =>
        [
          'shape' => 'String',
        ],
        'Encrypted' =>
        [
          'shape' => 'Boolean',
        ],
        'EncryptedWithHSM' =>
        [
          'shape' => 'Boolean',
        ],
        'AccountsWithRestoreAccess' =>
        [
          'shape' => 'AccountsWithRestoreAccessList',
        ],
        'OwnerAccount' =>
        [
          'shape' => 'String',
        ],
        'TotalBackupSizeInMegaBytes' =>
        [
          'shape' => 'Double',
        ],
        'ActualIncrementalBackupSizeInMegaBytes' =>
        [
          'shape' => 'Double',
        ],
        'BackupProgressInMegaBytes' =>
        [
          'shape' => 'Double',
        ],
        'CurrentBackupRateInMegaBytesPerSecond' =>
        [
          'shape' => 'Double',
        ],
        'EstimatedSecondsToCompletion' =>
        [
          'shape' => 'Long',
        ],
        'ElapsedTimeInSeconds' =>
        [
          'shape' => 'Long',
        ],
        'SourceRegion' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'SnapshotCopyAlreadyDisabledFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SnapshotCopyAlreadyDisabledFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SnapshotCopyAlreadyEnabledFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SnapshotCopyAlreadyEnabledFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SnapshotCopyDisabledFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SnapshotCopyDisabledFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SnapshotList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Snapshot',
        'locationName' => 'Snapshot',
      ],
    ],
    'SnapshotMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'Snapshots' =>
        [
          'shape' => 'SnapshotList',
        ],
      ],
    ],
    'SourceIdsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
        'locationName' => 'SourceId',
      ],
    ],
    'SourceNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SourceNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SourceType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'cluster',
        1 => 'cluster-parameter-group',
        2 => 'cluster-security-group',
        3 => 'cluster-snapshot',
      ],
    ],
    'String' =>
    [
      'type' => 'string',
    ],
    'Subnet' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SubnetIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SubnetAvailabilityZone' =>
        [
          'shape' => 'AvailabilityZone',
        ],
        'SubnetStatus' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'SubnetAlreadyInUse' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SubnetAlreadyInUse',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SubnetIdentifierList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
        'locationName' => 'SubnetIdentifier',
      ],
    ],
    'SubnetList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Subnet',
        'locationName' => 'Subnet',
      ],
    ],
    'SubscriptionAlreadyExistFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SubscriptionAlreadyExist',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SubscriptionCategoryNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SubscriptionCategoryNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SubscriptionEventIdNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SubscriptionEventIdNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SubscriptionNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SubscriptionNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SubscriptionSeverityNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SubscriptionSeverityNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'TStamp' =>
    [
      'type' => 'timestamp',
    ],
    'UnauthorizedOperation' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'UnauthorizedOperation',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'UnknownSnapshotCopyRegionFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'UnknownSnapshotCopyRegionFault',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'UnsupportedOptionFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'UnsupportedOptionFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'VpcSecurityGroupIdList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
        'locationName' => 'VpcSecurityGroupId',
      ],
    ],
    'VpcSecurityGroupMembership' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'VpcSecurityGroupId' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'VpcSecurityGroupMembershipList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'VpcSecurityGroupMembership',
        'locationName' => 'VpcSecurityGroup',
      ],
    ],
    'AuthorizeClusterSecurityGroupIngressResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSecurityGroup' =>
        [
          'shape' => 'ClusterSecurityGroup',
        ],
      ],
    ],
    'AuthorizeSnapshotAccessResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Snapshot' =>
        [
          'shape' => 'Snapshot',
        ],
      ],
    ],
    'CopyClusterSnapshotResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Snapshot' =>
        [
          'shape' => 'Snapshot',
        ],
      ],
    ],
    'CreateClusterResult' =>
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
    'CreateClusterParameterGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterParameterGroup' =>
        [
          'shape' => 'ClusterParameterGroup',
        ],
      ],
    ],
    'CreateClusterSecurityGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSecurityGroup' =>
        [
          'shape' => 'ClusterSecurityGroup',
        ],
      ],
    ],
    'CreateClusterSnapshotResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Snapshot' =>
        [
          'shape' => 'Snapshot',
        ],
      ],
    ],
    'CreateClusterSubnetGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSubnetGroup' =>
        [
          'shape' => 'ClusterSubnetGroup',
        ],
      ],
    ],
    'CreateEventSubscriptionResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'EventSubscription' =>
        [
          'shape' => 'EventSubscription',
        ],
      ],
    ],
    'CreateHsmClientCertificateResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'HsmClientCertificate' =>
        [
          'shape' => 'HsmClientCertificate',
        ],
      ],
    ],
    'CreateHsmConfigurationResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'HsmConfiguration' =>
        [
          'shape' => 'HsmConfiguration',
        ],
      ],
    ],
    'DeleteClusterResult' =>
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
    'DeleteClusterSnapshotResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Snapshot' =>
        [
          'shape' => 'Snapshot',
        ],
      ],
    ],
    'DescribeDefaultClusterParametersResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DefaultClusterParameters' =>
        [
          'shape' => 'DefaultClusterParameters',
        ],
      ],
    ],
    'DisableSnapshotCopyResult' =>
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
    'EnableSnapshotCopyResult' =>
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
    'ModifyClusterResult' =>
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
    'ModifyClusterSubnetGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSubnetGroup' =>
        [
          'shape' => 'ClusterSubnetGroup',
        ],
      ],
    ],
    'ModifyEventSubscriptionResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'EventSubscription' =>
        [
          'shape' => 'EventSubscription',
        ],
      ],
    ],
    'ModifySnapshotCopyRetentionPeriodResult' =>
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
    'PurchaseReservedNodeOfferingResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedNode' =>
        [
          'shape' => 'ReservedNode',
        ],
      ],
    ],
    'RebootClusterResult' =>
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
    'RestoreFromClusterSnapshotResult' =>
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
    'RevokeClusterSecurityGroupIngressResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ClusterSecurityGroup' =>
        [
          'shape' => 'ClusterSecurityGroup',
        ],
      ],
    ],
    'RevokeSnapshotAccessResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Snapshot' =>
        [
          'shape' => 'Snapshot',
        ],
      ],
    ],
    'RotateEncryptionKeyResult' =>
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
  ],
];