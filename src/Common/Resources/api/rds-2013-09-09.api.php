<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2013-09-09',
    'endpointPrefix' => 'rds',
    'serviceAbbreviation' => 'Amazon RDS',
    'serviceFullName' => 'Amazon Relational Database Service',
    'signatureVersion' => 'v4',
    'xmlNamespace' => 'http://rds.amazonaws.com/doc/2013-09-09/',
    'protocol' => 'query',
  ],
  'operations' =>
  [
    'AddSourceIdentifierToSubscription' =>
    [
      'name' => 'AddSourceIdentifierToSubscription',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AddSourceIdentifierToSubscriptionMessage',
      ],
      'output' =>
      [
        'shape' => 'AddSourceIdentifierToSubscriptionResult',
        'wrapper' => true,
        'resultWrapper' => 'AddSourceIdentifierToSubscriptionResult',
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
    'AddTagsToResource' =>
    [
      'name' => 'AddTagsToResource',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AddTagsToResourceMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'DBSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'AuthorizeDBSecurityGroupIngress' =>
    [
      'name' => 'AuthorizeDBSecurityGroupIngress',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AuthorizeDBSecurityGroupIngressMessage',
      ],
      'output' =>
      [
        'shape' => 'AuthorizeDBSecurityGroupIngressResult',
        'wrapper' => true,
        'resultWrapper' => 'AuthorizeDBSecurityGroupIngressResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidDBSecurityGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidDBSecurityGroupState',
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
    'CopyDBSnapshot' =>
    [
      'name' => 'CopyDBSnapshot',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CopyDBSnapshotMessage',
      ],
      'output' =>
      [
        'shape' => 'CopyDBSnapshotResult',
        'wrapper' => true,
        'resultWrapper' => 'CopyDBSnapshotResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSnapshotAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBSnapshotAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'DBSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidDBSnapshotStateFault',
          'error' =>
          [
            'code' => 'InvalidDBSnapshotState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'SnapshotQuotaExceededFault',
          'error' =>
          [
            'code' => 'SnapshotQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateDBInstance' =>
    [
      'name' => 'CreateDBInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateDBInstanceMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateDBInstanceResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateDBInstanceResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBInstanceAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InsufficientDBInstanceCapacityFault',
          'error' =>
          [
            'code' => 'InsufficientDBInstanceCapacity',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DBParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'DBSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InstanceQuotaExceededFault',
          'error' =>
          [
            'code' => 'InstanceQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'StorageQuotaExceededFault',
          'error' =>
          [
            'code' => 'StorageQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'DBSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
          'error' =>
          [
            'code' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        8 =>
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
          'shape' => 'ProvisionedIopsNotAvailableInAZFault',
          'error' =>
          [
            'code' => 'ProvisionedIopsNotAvailableInAZFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'OptionGroupNotFoundFault',
          'error' =>
          [
            'code' => 'OptionGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateDBInstanceReadReplica' =>
    [
      'name' => 'CreateDBInstanceReadReplica',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateDBInstanceReadReplicaMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateDBInstanceReadReplicaResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateDBInstanceReadReplicaResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBInstanceAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InsufficientDBInstanceCapacityFault',
          'error' =>
          [
            'code' => 'InsufficientDBInstanceCapacity',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DBParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'DBSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InstanceQuotaExceededFault',
          'error' =>
          [
            'code' => 'InstanceQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'StorageQuotaExceededFault',
          'error' =>
          [
            'code' => 'StorageQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'InvalidDBInstanceStateFault',
          'error' =>
          [
            'code' => 'InvalidDBInstanceState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'DBSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
          'error' =>
          [
            'code' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
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
          'shape' => 'InvalidVPCNetworkStateFault',
          'error' =>
          [
            'code' => 'InvalidVPCNetworkStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        12 =>
        [
          'shape' => 'ProvisionedIopsNotAvailableInAZFault',
          'error' =>
          [
            'code' => 'ProvisionedIopsNotAvailableInAZFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        13 =>
        [
          'shape' => 'OptionGroupNotFoundFault',
          'error' =>
          [
            'code' => 'OptionGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        14 =>
        [
          'shape' => 'DBSubnetGroupNotAllowedFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupNotAllowedFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        15 =>
        [
          'shape' => 'InvalidDBSubnetGroupFault',
          'error' =>
          [
            'code' => 'InvalidDBSubnetGroupFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateDBParameterGroup' =>
    [
      'name' => 'CreateDBParameterGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateDBParameterGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateDBParameterGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateDBParameterGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBParameterGroupQuotaExceededFault',
          'error' =>
          [
            'code' => 'DBParameterGroupQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBParameterGroupAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBParameterGroupAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateDBSecurityGroup' =>
    [
      'name' => 'CreateDBSecurityGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateDBSecurityGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateDBSecurityGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateDBSecurityGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSecurityGroupAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBSecurityGroupAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSecurityGroupQuotaExceededFault',
          'error' =>
          [
            'code' => 'QuotaExceeded.DBSecurityGroup',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DBSecurityGroupNotSupportedFault',
          'error' =>
          [
            'code' => 'DBSecurityGroupNotSupported',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateDBSnapshot' =>
    [
      'name' => 'CreateDBSnapshot',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateDBSnapshotMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateDBSnapshotResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateDBSnapshotResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSnapshotAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBSnapshotAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidDBInstanceStateFault',
          'error' =>
          [
            'code' => 'InvalidDBInstanceState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'SnapshotQuotaExceededFault',
          'error' =>
          [
            'code' => 'SnapshotQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateDBSubnetGroup' =>
    [
      'name' => 'CreateDBSubnetGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateDBSubnetGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateDBSubnetGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateDBSubnetGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSubnetGroupAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSubnetGroupQuotaExceededFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DBSubnetQuotaExceededFault',
          'error' =>
          [
            'code' => 'DBSubnetQuotaExceededFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
          'error' =>
          [
            'code' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
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
    'CreateOptionGroup' =>
    [
      'name' => 'CreateOptionGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateOptionGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'CreateOptionGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'CreateOptionGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'OptionGroupAlreadyExistsFault',
          'error' =>
          [
            'code' => 'OptionGroupAlreadyExistsFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OptionGroupQuotaExceededFault',
          'error' =>
          [
            'code' => 'OptionGroupQuotaExceededFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteDBInstance' =>
    [
      'name' => 'DeleteDBInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteDBInstanceMessage',
      ],
      'output' =>
      [
        'shape' => 'DeleteDBInstanceResult',
        'wrapper' => true,
        'resultWrapper' => 'DeleteDBInstanceResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidDBInstanceStateFault',
          'error' =>
          [
            'code' => 'InvalidDBInstanceState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DBSnapshotAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBSnapshotAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'SnapshotQuotaExceededFault',
          'error' =>
          [
            'code' => 'SnapshotQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteDBParameterGroup' =>
    [
      'name' => 'DeleteDBParameterGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteDBParameterGroupMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidDBParameterGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidDBParameterGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteDBSecurityGroup' =>
    [
      'name' => 'DeleteDBSecurityGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteDBSecurityGroupMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidDBSecurityGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidDBSecurityGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteDBSnapshot' =>
    [
      'name' => 'DeleteDBSnapshot',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteDBSnapshotMessage',
      ],
      'output' =>
      [
        'shape' => 'DeleteDBSnapshotResult',
        'wrapper' => true,
        'resultWrapper' => 'DeleteDBSnapshotResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidDBSnapshotStateFault',
          'error' =>
          [
            'code' => 'InvalidDBSnapshotState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'DBSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteDBSubnetGroup' =>
    [
      'name' => 'DeleteDBSubnetGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteDBSubnetGroupMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidDBSubnetGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidDBSubnetGroupStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidDBSubnetStateFault',
          'error' =>
          [
            'code' => 'InvalidDBSubnetStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DBSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupNotFoundFault',
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
      'output' =>
      [
        'shape' => 'DeleteEventSubscriptionResult',
        'wrapper' => true,
        'resultWrapper' => 'DeleteEventSubscriptionResult',
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
          'shape' => 'InvalidEventSubscriptionStateFault',
          'error' =>
          [
            'code' => 'InvalidEventSubscriptionState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteOptionGroup' =>
    [
      'name' => 'DeleteOptionGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteOptionGroupMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'OptionGroupNotFoundFault',
          'error' =>
          [
            'code' => 'OptionGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidOptionGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidOptionGroupStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeDBEngineVersions' =>
    [
      'name' => 'DescribeDBEngineVersions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDBEngineVersionsMessage',
      ],
      'output' =>
      [
        'shape' => 'DBEngineVersionMessage',
        'resultWrapper' => 'DescribeDBEngineVersionsResult',
      ],
    ],
    'DescribeDBInstances' =>
    [
      'name' => 'DescribeDBInstances',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDBInstancesMessage',
      ],
      'output' =>
      [
        'shape' => 'DBInstanceMessage',
        'resultWrapper' => 'DescribeDBInstancesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeDBLogFiles' =>
    [
      'name' => 'DescribeDBLogFiles',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDBLogFilesMessage',
      ],
      'output' =>
      [
        'shape' => 'DescribeDBLogFilesResponse',
        'resultWrapper' => 'DescribeDBLogFilesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeDBParameterGroups' =>
    [
      'name' => 'DescribeDBParameterGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDBParameterGroupsMessage',
      ],
      'output' =>
      [
        'shape' => 'DBParameterGroupsMessage',
        'resultWrapper' => 'DescribeDBParameterGroupsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeDBParameters' =>
    [
      'name' => 'DescribeDBParameters',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDBParametersMessage',
      ],
      'output' =>
      [
        'shape' => 'DBParameterGroupDetails',
        'resultWrapper' => 'DescribeDBParametersResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeDBSecurityGroups' =>
    [
      'name' => 'DescribeDBSecurityGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDBSecurityGroupsMessage',
      ],
      'output' =>
      [
        'shape' => 'DBSecurityGroupMessage',
        'resultWrapper' => 'DescribeDBSecurityGroupsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeDBSnapshots' =>
    [
      'name' => 'DescribeDBSnapshots',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDBSnapshotsMessage',
      ],
      'output' =>
      [
        'shape' => 'DBSnapshotMessage',
        'resultWrapper' => 'DescribeDBSnapshotsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'DBSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeDBSubnetGroups' =>
    [
      'name' => 'DescribeDBSubnetGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeDBSubnetGroupsMessage',
      ],
      'output' =>
      [
        'shape' => 'DBSubnetGroupMessage',
        'resultWrapper' => 'DescribeDBSubnetGroupsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeEngineDefaultParameters' =>
    [
      'name' => 'DescribeEngineDefaultParameters',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeEngineDefaultParametersMessage',
      ],
      'output' =>
      [
        'shape' => 'DescribeEngineDefaultParametersResult',
        'wrapper' => true,
        'resultWrapper' => 'DescribeEngineDefaultParametersResult',
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
    'DescribeOptionGroupOptions' =>
    [
      'name' => 'DescribeOptionGroupOptions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeOptionGroupOptionsMessage',
      ],
      'output' =>
      [
        'shape' => 'OptionGroupOptionsMessage',
        'resultWrapper' => 'DescribeOptionGroupOptionsResult',
      ],
    ],
    'DescribeOptionGroups' =>
    [
      'name' => 'DescribeOptionGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeOptionGroupsMessage',
      ],
      'output' =>
      [
        'shape' => 'OptionGroups',
        'resultWrapper' => 'DescribeOptionGroupsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'OptionGroupNotFoundFault',
          'error' =>
          [
            'code' => 'OptionGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeOrderableDBInstanceOptions' =>
    [
      'name' => 'DescribeOrderableDBInstanceOptions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeOrderableDBInstanceOptionsMessage',
      ],
      'output' =>
      [
        'shape' => 'OrderableDBInstanceOptionsMessage',
        'resultWrapper' => 'DescribeOrderableDBInstanceOptionsResult',
      ],
    ],
    'DescribeReservedDBInstances' =>
    [
      'name' => 'DescribeReservedDBInstances',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeReservedDBInstancesMessage',
      ],
      'output' =>
      [
        'shape' => 'ReservedDBInstanceMessage',
        'resultWrapper' => 'DescribeReservedDBInstancesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ReservedDBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'ReservedDBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeReservedDBInstancesOfferings' =>
    [
      'name' => 'DescribeReservedDBInstancesOfferings',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeReservedDBInstancesOfferingsMessage',
      ],
      'output' =>
      [
        'shape' => 'ReservedDBInstancesOfferingMessage',
        'resultWrapper' => 'DescribeReservedDBInstancesOfferingsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ReservedDBInstancesOfferingNotFoundFault',
          'error' =>
          [
            'code' => 'ReservedDBInstancesOfferingNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DownloadDBLogFilePortion' =>
    [
      'name' => 'DownloadDBLogFilePortion',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DownloadDBLogFilePortionMessage',
      ],
      'output' =>
      [
        'shape' => 'DownloadDBLogFilePortionDetails',
        'resultWrapper' => 'DownloadDBLogFilePortionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListTagsForResource' =>
    [
      'name' => 'ListTagsForResource',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListTagsForResourceMessage',
      ],
      'output' =>
      [
        'shape' => 'TagListMessage',
        'resultWrapper' => 'ListTagsForResourceResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'DBSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifyDBInstance' =>
    [
      'name' => 'ModifyDBInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyDBInstanceMessage',
      ],
      'output' =>
      [
        'shape' => 'ModifyDBInstanceResult',
        'wrapper' => true,
        'resultWrapper' => 'ModifyDBInstanceResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidDBInstanceStateFault',
          'error' =>
          [
            'code' => 'InvalidDBInstanceState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidDBSecurityGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidDBSecurityGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DBInstanceAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBInstanceAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'DBSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSecurityGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'DBParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'InsufficientDBInstanceCapacityFault',
          'error' =>
          [
            'code' => 'InsufficientDBInstanceCapacity',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'StorageQuotaExceededFault',
          'error' =>
          [
            'code' => 'StorageQuotaExceeded',
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
          'shape' => 'ProvisionedIopsNotAvailableInAZFault',
          'error' =>
          [
            'code' => 'ProvisionedIopsNotAvailableInAZFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'OptionGroupNotFoundFault',
          'error' =>
          [
            'code' => 'OptionGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'DBUpgradeDependencyFailureFault',
          'error' =>
          [
            'code' => 'DBUpgradeDependencyFailure',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifyDBParameterGroup' =>
    [
      'name' => 'ModifyDBParameterGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyDBParameterGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'DBParameterGroupNameMessage',
        'resultWrapper' => 'ModifyDBParameterGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidDBParameterGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidDBParameterGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifyDBSubnetGroup' =>
    [
      'name' => 'ModifyDBSubnetGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyDBSubnetGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'ModifyDBSubnetGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'ModifyDBSubnetGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSubnetQuotaExceededFault',
          'error' =>
          [
            'code' => 'DBSubnetQuotaExceededFault',
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
          'shape' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
          'error' =>
          [
            'code' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
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
          'shape' => 'SubscriptionNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionNotFound',
            'httpStatusCode' => 404,
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
          'shape' => 'SubscriptionCategoryNotFoundFault',
          'error' =>
          [
            'code' => 'SubscriptionCategoryNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ModifyOptionGroup' =>
    [
      'name' => 'ModifyOptionGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ModifyOptionGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'ModifyOptionGroupResult',
        'wrapper' => true,
        'resultWrapper' => 'ModifyOptionGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidOptionGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidOptionGroupStateFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'OptionGroupNotFoundFault',
          'error' =>
          [
            'code' => 'OptionGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PromoteReadReplica' =>
    [
      'name' => 'PromoteReadReplica',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PromoteReadReplicaMessage',
      ],
      'output' =>
      [
        'shape' => 'PromoteReadReplicaResult',
        'wrapper' => true,
        'resultWrapper' => 'PromoteReadReplicaResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidDBInstanceStateFault',
          'error' =>
          [
            'code' => 'InvalidDBInstanceState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PurchaseReservedDBInstancesOffering' =>
    [
      'name' => 'PurchaseReservedDBInstancesOffering',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PurchaseReservedDBInstancesOfferingMessage',
      ],
      'output' =>
      [
        'shape' => 'PurchaseReservedDBInstancesOfferingResult',
        'wrapper' => true,
        'resultWrapper' => 'PurchaseReservedDBInstancesOfferingResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ReservedDBInstancesOfferingNotFoundFault',
          'error' =>
          [
            'code' => 'ReservedDBInstancesOfferingNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ReservedDBInstanceAlreadyExistsFault',
          'error' =>
          [
            'code' => 'ReservedDBInstanceAlreadyExists',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ReservedDBInstanceQuotaExceededFault',
          'error' =>
          [
            'code' => 'ReservedDBInstanceQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RebootDBInstance' =>
    [
      'name' => 'RebootDBInstance',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RebootDBInstanceMessage',
      ],
      'output' =>
      [
        'shape' => 'RebootDBInstanceResult',
        'wrapper' => true,
        'resultWrapper' => 'RebootDBInstanceResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidDBInstanceStateFault',
          'error' =>
          [
            'code' => 'InvalidDBInstanceState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RemoveSourceIdentifierFromSubscription' =>
    [
      'name' => 'RemoveSourceIdentifierFromSubscription',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RemoveSourceIdentifierFromSubscriptionMessage',
      ],
      'output' =>
      [
        'shape' => 'RemoveSourceIdentifierFromSubscriptionResult',
        'wrapper' => true,
        'resultWrapper' => 'RemoveSourceIdentifierFromSubscriptionResult',
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
    'RemoveTagsFromResource' =>
    [
      'name' => 'RemoveTagsFromResource',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RemoveTagsFromResourceMessage',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'DBSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ResetDBParameterGroup' =>
    [
      'name' => 'ResetDBParameterGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ResetDBParameterGroupMessage',
      ],
      'output' =>
      [
        'shape' => 'DBParameterGroupNameMessage',
        'resultWrapper' => 'ResetDBParameterGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidDBParameterGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidDBParameterGroupState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBParameterGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBParameterGroupNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RestoreDBInstanceFromDBSnapshot' =>
    [
      'name' => 'RestoreDBInstanceFromDBSnapshot',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RestoreDBInstanceFromDBSnapshotMessage',
      ],
      'output' =>
      [
        'shape' => 'RestoreDBInstanceFromDBSnapshotResult',
        'wrapper' => true,
        'resultWrapper' => 'RestoreDBInstanceFromDBSnapshotResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBInstanceAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBSnapshotNotFoundFault',
          'error' =>
          [
            'code' => 'DBSnapshotNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InstanceQuotaExceededFault',
          'error' =>
          [
            'code' => 'InstanceQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InsufficientDBInstanceCapacityFault',
          'error' =>
          [
            'code' => 'InsufficientDBInstanceCapacity',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InvalidDBSnapshotStateFault',
          'error' =>
          [
            'code' => 'InvalidDBSnapshotState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'StorageQuotaExceededFault',
          'error' =>
          [
            'code' => 'StorageQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
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
        7 =>
        [
          'shape' => 'InvalidRestoreFault',
          'error' =>
          [
            'code' => 'InvalidRestoreFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'DBSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
          'error' =>
          [
            'code' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
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
          'shape' => 'ProvisionedIopsNotAvailableInAZFault',
          'error' =>
          [
            'code' => 'ProvisionedIopsNotAvailableInAZFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        12 =>
        [
          'shape' => 'OptionGroupNotFoundFault',
          'error' =>
          [
            'code' => 'OptionGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RestoreDBInstanceToPointInTime' =>
    [
      'name' => 'RestoreDBInstanceToPointInTime',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RestoreDBInstanceToPointInTimeMessage',
      ],
      'output' =>
      [
        'shape' => 'RestoreDBInstanceToPointInTimeResult',
        'wrapper' => true,
        'resultWrapper' => 'RestoreDBInstanceToPointInTimeResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBInstanceAlreadyExistsFault',
          'error' =>
          [
            'code' => 'DBInstanceAlreadyExists',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DBInstanceNotFoundFault',
          'error' =>
          [
            'code' => 'DBInstanceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InstanceQuotaExceededFault',
          'error' =>
          [
            'code' => 'InstanceQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InsufficientDBInstanceCapacityFault',
          'error' =>
          [
            'code' => 'InsufficientDBInstanceCapacity',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InvalidDBInstanceStateFault',
          'error' =>
          [
            'code' => 'InvalidDBInstanceState',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'PointInTimeRestoreNotEnabledFault',
          'error' =>
          [
            'code' => 'PointInTimeRestoreNotEnabled',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'StorageQuotaExceededFault',
          'error' =>
          [
            'code' => 'StorageQuotaExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        7 =>
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
        8 =>
        [
          'shape' => 'InvalidRestoreFault',
          'error' =>
          [
            'code' => 'InvalidRestoreFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'DBSubnetGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSubnetGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
          'error' =>
          [
            'code' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
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
          'shape' => 'ProvisionedIopsNotAvailableInAZFault',
          'error' =>
          [
            'code' => 'ProvisionedIopsNotAvailableInAZFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        13 =>
        [
          'shape' => 'OptionGroupNotFoundFault',
          'error' =>
          [
            'code' => 'OptionGroupNotFoundFault',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RevokeDBSecurityGroupIngress' =>
    [
      'name' => 'RevokeDBSecurityGroupIngress',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RevokeDBSecurityGroupIngressMessage',
      ],
      'output' =>
      [
        'shape' => 'RevokeDBSecurityGroupIngressResult',
        'wrapper' => true,
        'resultWrapper' => 'RevokeDBSecurityGroupIngressResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'DBSecurityGroupNotFoundFault',
          'error' =>
          [
            'code' => 'DBSecurityGroupNotFound',
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
          'shape' => 'InvalidDBSecurityGroupStateFault',
          'error' =>
          [
            'code' => 'InvalidDBSecurityGroupState',
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
    'AddSourceIdentifierToSubscriptionMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SubscriptionName',
        1 => 'SourceIdentifier',
      ],
      'members' =>
      [
        'SubscriptionName' =>
        [
          'shape' => 'String',
        ],
        'SourceIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'AddTagsToResourceMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceName',
        1 => 'Tags',
      ],
      'members' =>
      [
        'ResourceName' =>
        [
          'shape' => 'String',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'ApplyMethod' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'immediate',
        1 => 'pending-reboot',
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
    'AuthorizeDBSecurityGroupIngressMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBSecurityGroupName',
      ],
      'members' =>
      [
        'DBSecurityGroupName' =>
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
        'EC2SecurityGroupId' =>
        [
          'shape' => 'String',
        ],
        'EC2SecurityGroupOwnerId' =>
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
        'ProvisionedIopsCapable' =>
        [
          'shape' => 'Boolean',
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
    'CharacterSet' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CharacterSetName' =>
        [
          'shape' => 'String',
        ],
        'CharacterSetDescription' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CopyDBSnapshotMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SourceDBSnapshotIdentifier',
        1 => 'TargetDBSnapshotIdentifier',
      ],
      'members' =>
      [
        'SourceDBSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'TargetDBSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'CreateDBInstanceMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBInstanceIdentifier',
        1 => 'AllocatedStorage',
        2 => 'DBInstanceClass',
        3 => 'Engine',
        4 => 'MasterUsername',
        5 => 'MasterUserPassword',
      ],
      'members' =>
      [
        'DBName' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'AllocatedStorage' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'DBInstanceClass' =>
        [
          'shape' => 'String',
        ],
        'Engine' =>
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
        'DBSecurityGroups' =>
        [
          'shape' => 'DBSecurityGroupNameList',
        ],
        'VpcSecurityGroupIds' =>
        [
          'shape' => 'VpcSecurityGroupIdList',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'DBSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'PreferredMaintenanceWindow' =>
        [
          'shape' => 'String',
        ],
        'DBParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'BackupRetentionPeriod' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'PreferredBackupWindow' =>
        [
          'shape' => 'String',
        ],
        'Port' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'MultiAZ' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'EngineVersion' =>
        [
          'shape' => 'String',
        ],
        'AutoMinorVersionUpgrade' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'LicenseModel' =>
        [
          'shape' => 'String',
        ],
        'Iops' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'CharacterSetName' =>
        [
          'shape' => 'String',
        ],
        'PubliclyAccessible' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'CreateDBInstanceReadReplicaMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBInstanceIdentifier',
        1 => 'SourceDBInstanceIdentifier',
      ],
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SourceDBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceClass' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'Port' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'AutoMinorVersionUpgrade' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'Iops' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'PubliclyAccessible' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
        'DBSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreateDBParameterGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBParameterGroupName',
        1 => 'DBParameterGroupFamily',
        2 => 'Description',
      ],
      'members' =>
      [
        'DBParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'DBParameterGroupFamily' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'CreateDBSecurityGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBSecurityGroupName',
        1 => 'DBSecurityGroupDescription',
      ],
      'members' =>
      [
        'DBSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'DBSecurityGroupDescription' =>
        [
          'shape' => 'String',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'CreateDBSnapshotMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBSnapshotIdentifier',
        1 => 'DBInstanceIdentifier',
      ],
      'members' =>
      [
        'DBSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'CreateDBSubnetGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBSubnetGroupName',
        1 => 'DBSubnetGroupDescription',
        2 => 'SubnetIds',
      ],
      'members' =>
      [
        'DBSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'DBSubnetGroupDescription' =>
        [
          'shape' => 'String',
        ],
        'SubnetIds' =>
        [
          'shape' => 'SubnetIdentifierList',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
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
        'EventCategories' =>
        [
          'shape' => 'EventCategoriesList',
        ],
        'SourceIds' =>
        [
          'shape' => 'SourceIdsList',
        ],
        'Enabled' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'CreateOptionGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OptionGroupName',
        1 => 'EngineName',
        2 => 'MajorEngineVersion',
        3 => 'OptionGroupDescription',
      ],
      'members' =>
      [
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'EngineName' =>
        [
          'shape' => 'String',
        ],
        'MajorEngineVersion' =>
        [
          'shape' => 'String',
        ],
        'OptionGroupDescription' =>
        [
          'shape' => 'String',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'DBEngineVersion' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Engine' =>
        [
          'shape' => 'String',
        ],
        'EngineVersion' =>
        [
          'shape' => 'String',
        ],
        'DBParameterGroupFamily' =>
        [
          'shape' => 'String',
        ],
        'DBEngineDescription' =>
        [
          'shape' => 'String',
        ],
        'DBEngineVersionDescription' =>
        [
          'shape' => 'String',
        ],
        'DefaultCharacterSet' =>
        [
          'shape' => 'CharacterSet',
        ],
        'SupportedCharacterSets' =>
        [
          'shape' => 'SupportedCharacterSetsList',
        ],
      ],
    ],
    'DBEngineVersionList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DBEngineVersion',
        'locationName' => 'DBEngineVersion',
      ],
    ],
    'DBEngineVersionMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'DBEngineVersions' =>
        [
          'shape' => 'DBEngineVersionList',
        ],
      ],
    ],
    'DBInstance' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceClass' =>
        [
          'shape' => 'String',
        ],
        'Engine' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceStatus' =>
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
        'AllocatedStorage' =>
        [
          'shape' => 'Integer',
        ],
        'InstanceCreateTime' =>
        [
          'shape' => 'TStamp',
        ],
        'PreferredBackupWindow' =>
        [
          'shape' => 'String',
        ],
        'BackupRetentionPeriod' =>
        [
          'shape' => 'Integer',
        ],
        'DBSecurityGroups' =>
        [
          'shape' => 'DBSecurityGroupMembershipList',
        ],
        'VpcSecurityGroups' =>
        [
          'shape' => 'VpcSecurityGroupMembershipList',
        ],
        'DBParameterGroups' =>
        [
          'shape' => 'DBParameterGroupStatusList',
        ],
        'AvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'DBSubnetGroup' =>
        [
          'shape' => 'DBSubnetGroup',
        ],
        'PreferredMaintenanceWindow' =>
        [
          'shape' => 'String',
        ],
        'PendingModifiedValues' =>
        [
          'shape' => 'PendingModifiedValues',
        ],
        'LatestRestorableTime' =>
        [
          'shape' => 'TStamp',
        ],
        'MultiAZ' =>
        [
          'shape' => 'Boolean',
        ],
        'EngineVersion' =>
        [
          'shape' => 'String',
        ],
        'AutoMinorVersionUpgrade' =>
        [
          'shape' => 'Boolean',
        ],
        'ReadReplicaSourceDBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'ReadReplicaDBInstanceIdentifiers' =>
        [
          'shape' => 'ReadReplicaDBInstanceIdentifierList',
        ],
        'LicenseModel' =>
        [
          'shape' => 'String',
        ],
        'Iops' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'OptionGroupMemberships' =>
        [
          'shape' => 'OptionGroupMembershipList',
        ],
        'CharacterSetName' =>
        [
          'shape' => 'String',
        ],
        'SecondaryAvailabilityZone' =>
        [
          'shape' => 'String',
        ],
        'PubliclyAccessible' =>
        [
          'shape' => 'Boolean',
        ],
        'StatusInfos' =>
        [
          'shape' => 'DBInstanceStatusInfoList',
        ],
      ],
      'wrapper' => true,
    ],
    'DBInstanceAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBInstanceAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBInstanceList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DBInstance',
        'locationName' => 'DBInstance',
      ],
    ],
    'DBInstanceMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'DBInstances' =>
        [
          'shape' => 'DBInstanceList',
        ],
      ],
    ],
    'DBInstanceNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBInstanceNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBInstanceStatusInfo' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StatusType' =>
        [
          'shape' => 'String',
        ],
        'Normal' =>
        [
          'shape' => 'Boolean',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
        'Message' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DBInstanceStatusInfoList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DBInstanceStatusInfo',
        'locationName' => 'DBInstanceStatusInfo',
      ],
    ],
    'DBParameterGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'DBParameterGroupFamily' =>
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
    'DBParameterGroupAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBParameterGroupAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBParameterGroupDetails' =>
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
    'DBParameterGroupList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DBParameterGroup',
        'locationName' => 'DBParameterGroup',
      ],
    ],
    'DBParameterGroupNameMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBParameterGroupName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DBParameterGroupNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBParameterGroupNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBParameterGroupQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBParameterGroupQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBParameterGroupStatus' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'ParameterApplyStatus' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DBParameterGroupStatusList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DBParameterGroupStatus',
        'locationName' => 'DBParameterGroup',
      ],
    ],
    'DBParameterGroupsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'DBParameterGroups' =>
        [
          'shape' => 'DBParameterGroupList',
        ],
      ],
    ],
    'DBSecurityGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OwnerId' =>
        [
          'shape' => 'String',
        ],
        'DBSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'DBSecurityGroupDescription' =>
        [
          'shape' => 'String',
        ],
        'VpcId' =>
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
    'DBSecurityGroupAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSecurityGroupAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSecurityGroupMembership' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DBSecurityGroupMembershipList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DBSecurityGroupMembership',
        'locationName' => 'DBSecurityGroup',
      ],
    ],
    'DBSecurityGroupMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'DBSecurityGroups' =>
        [
          'shape' => 'DBSecurityGroups',
        ],
      ],
    ],
    'DBSecurityGroupNameList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
        'locationName' => 'DBSecurityGroupName',
      ],
    ],
    'DBSecurityGroupNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSecurityGroupNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSecurityGroupNotSupportedFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSecurityGroupNotSupported',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSecurityGroupQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'QuotaExceeded.DBSecurityGroup',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSecurityGroups' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DBSecurityGroup',
        'locationName' => 'DBSecurityGroup',
      ],
    ],
    'DBSnapshot' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotCreateTime' =>
        [
          'shape' => 'TStamp',
        ],
        'Engine' =>
        [
          'shape' => 'String',
        ],
        'AllocatedStorage' =>
        [
          'shape' => 'Integer',
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
        'VpcId' =>
        [
          'shape' => 'String',
        ],
        'InstanceCreateTime' =>
        [
          'shape' => 'TStamp',
        ],
        'MasterUsername' =>
        [
          'shape' => 'String',
        ],
        'EngineVersion' =>
        [
          'shape' => 'String',
        ],
        'LicenseModel' =>
        [
          'shape' => 'String',
        ],
        'SnapshotType' =>
        [
          'shape' => 'String',
        ],
        'Iops' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'PercentProgress' =>
        [
          'shape' => 'Integer',
        ],
        'SourceRegion' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'DBSnapshotAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSnapshotAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSnapshotList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DBSnapshot',
        'locationName' => 'DBSnapshot',
      ],
    ],
    'DBSnapshotMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'DBSnapshots' =>
        [
          'shape' => 'DBSnapshotList',
        ],
      ],
    ],
    'DBSnapshotNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSnapshotNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSubnetGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'DBSubnetGroupDescription' =>
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
    'DBSubnetGroupAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSubnetGroupAlreadyExists',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSubnetGroupDoesNotCoverEnoughAZs' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSubnetGroupDoesNotCoverEnoughAZs',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSubnetGroupMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'DBSubnetGroups' =>
        [
          'shape' => 'DBSubnetGroups',
        ],
      ],
    ],
    'DBSubnetGroupNotAllowedFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSubnetGroupNotAllowedFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSubnetGroupNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSubnetGroupNotFoundFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSubnetGroupQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSubnetGroupQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBSubnetGroups' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DBSubnetGroup',
        'locationName' => 'DBSubnetGroup',
      ],
    ],
    'DBSubnetQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBSubnetQuotaExceededFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DBUpgradeDependencyFailureFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'DBUpgradeDependencyFailure',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DeleteDBInstanceMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBInstanceIdentifier',
      ],
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SkipFinalSnapshot' =>
        [
          'shape' => 'Boolean',
        ],
        'FinalDBSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteDBParameterGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBParameterGroupName',
      ],
      'members' =>
      [
        'DBParameterGroupName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteDBSecurityGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBSecurityGroupName',
      ],
      'members' =>
      [
        'DBSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteDBSnapshotMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBSnapshotIdentifier',
      ],
      'members' =>
      [
        'DBSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteDBSubnetGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBSubnetGroupName',
      ],
      'members' =>
      [
        'DBSubnetGroupName' =>
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
    'DeleteOptionGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OptionGroupName',
      ],
      'members' =>
      [
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeDBEngineVersionsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Engine' =>
        [
          'shape' => 'String',
        ],
        'EngineVersion' =>
        [
          'shape' => 'String',
        ],
        'DBParameterGroupFamily' =>
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
        'DefaultOnly' =>
        [
          'shape' => 'Boolean',
        ],
        'ListSupportedCharacterSets' =>
        [
          'shape' => 'BooleanOptional',
        ],
      ],
    ],
    'DescribeDBInstancesMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'Filters' =>
        [
          'shape' => 'FilterList',
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
    'DescribeDBLogFilesDetails' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LogFileName' =>
        [
          'shape' => 'String',
        ],
        'LastWritten' =>
        [
          'shape' => 'Long',
        ],
        'Size' =>
        [
          'shape' => 'Long',
        ],
      ],
    ],
    'DescribeDBLogFilesList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DescribeDBLogFilesDetails',
        'locationName' => 'DescribeDBLogFilesDetails',
      ],
    ],
    'DescribeDBLogFilesMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBInstanceIdentifier',
      ],
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'FilenameContains' =>
        [
          'shape' => 'String',
        ],
        'FileLastWritten' =>
        [
          'shape' => 'Long',
        ],
        'FileSize' =>
        [
          'shape' => 'Long',
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
    'DescribeDBLogFilesResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DescribeDBLogFiles' =>
        [
          'shape' => 'DescribeDBLogFilesList',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeDBParameterGroupsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'Filters' =>
        [
          'shape' => 'FilterList',
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
    'DescribeDBParametersMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBParameterGroupName',
      ],
      'members' =>
      [
        'DBParameterGroupName' =>
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
    'DescribeDBSecurityGroupsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSecurityGroupName' =>
        [
          'shape' => 'String',
        ],
        'Filters' =>
        [
          'shape' => 'FilterList',
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
    'DescribeDBSnapshotsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'DBSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'SnapshotType' =>
        [
          'shape' => 'String',
        ],
        'Filters' =>
        [
          'shape' => 'FilterList',
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
    'DescribeDBSubnetGroupsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'Filters' =>
        [
          'shape' => 'FilterList',
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
    'DescribeEngineDefaultParametersMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBParameterGroupFamily',
      ],
      'members' =>
      [
        'DBParameterGroupFamily' =>
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
        'Filters' =>
        [
          'shape' => 'FilterList',
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
        'EventCategories' =>
        [
          'shape' => 'EventCategoriesList',
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
    'DescribeOptionGroupOptionsMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'EngineName',
      ],
      'members' =>
      [
        'EngineName' =>
        [
          'shape' => 'String',
        ],
        'MajorEngineVersion' =>
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
    'DescribeOptionGroupsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'Filters' =>
        [
          'shape' => 'FilterList',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'MaxRecords' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'EngineName' =>
        [
          'shape' => 'String',
        ],
        'MajorEngineVersion' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DescribeOrderableDBInstanceOptionsMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Engine',
      ],
      'members' =>
      [
        'Engine' =>
        [
          'shape' => 'String',
        ],
        'EngineVersion' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceClass' =>
        [
          'shape' => 'String',
        ],
        'LicenseModel' =>
        [
          'shape' => 'String',
        ],
        'Vpc' =>
        [
          'shape' => 'BooleanOptional',
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
    'DescribeReservedDBInstancesMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedDBInstanceId' =>
        [
          'shape' => 'String',
        ],
        'ReservedDBInstancesOfferingId' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceClass' =>
        [
          'shape' => 'String',
        ],
        'Duration' =>
        [
          'shape' => 'String',
        ],
        'ProductDescription' =>
        [
          'shape' => 'String',
        ],
        'OfferingType' =>
        [
          'shape' => 'String',
        ],
        'MultiAZ' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'Filters' =>
        [
          'shape' => 'FilterList',
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
    'DescribeReservedDBInstancesOfferingsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedDBInstancesOfferingId' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceClass' =>
        [
          'shape' => 'String',
        ],
        'Duration' =>
        [
          'shape' => 'String',
        ],
        'ProductDescription' =>
        [
          'shape' => 'String',
        ],
        'OfferingType' =>
        [
          'shape' => 'String',
        ],
        'MultiAZ' =>
        [
          'shape' => 'BooleanOptional',
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
    'Double' =>
    [
      'type' => 'double',
    ],
    'DownloadDBLogFilePortionDetails' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LogFileData' =>
        [
          'shape' => 'String',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'AdditionalDataPending' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'DownloadDBLogFilePortionMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBInstanceIdentifier',
        1 => 'LogFileName',
      ],
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'LogFileName' =>
        [
          'shape' => 'String',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'NumberOfLines' =>
        [
          'shape' => 'Integer',
        ],
      ],
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
        'EC2SecurityGroupId' =>
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
    'EngineDefaults' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBParameterGroupFamily' =>
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
        'Date' =>
        [
          'shape' => 'TStamp',
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
        'EventCategories' =>
        [
          'shape' => 'EventCategoriesList',
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
          'shape' => 'String',
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
    'Filter' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'FilterName',
        1 => 'FilterValue',
      ],
      'members' =>
      [
        'FilterName' =>
        [
          'shape' => 'String',
        ],
        'FilterValue' =>
        [
          'shape' => 'FilterValueList',
        ],
      ],
    ],
    'FilterList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Filter',
        'locationName' => 'Filter',
      ],
    ],
    'FilterValueList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
        'locationName' => 'Value',
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
    'InstanceQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InstanceQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InsufficientDBInstanceCapacityFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InsufficientDBInstanceCapacity',
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
    'InvalidDBInstanceStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidDBInstanceState',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidDBParameterGroupStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidDBParameterGroupState',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidDBSecurityGroupStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidDBSecurityGroupState',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidDBSnapshotStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidDBSnapshotState',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidDBSubnetGroupFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidDBSubnetGroupFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidDBSubnetGroupStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidDBSubnetGroupStateFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidDBSubnetStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidDBSubnetStateFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidEventSubscriptionStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidEventSubscriptionState',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidOptionGroupStateFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'InvalidOptionGroupStateFault',
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
        'code' => 'InvalidRestoreFault',
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
    'KeyList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
      ],
    ],
    'ListTagsForResourceMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceName',
      ],
      'members' =>
      [
        'ResourceName' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'Long' =>
    [
      'type' => 'long',
    ],
    'ModifyDBInstanceMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBInstanceIdentifier',
      ],
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'AllocatedStorage' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'DBInstanceClass' =>
        [
          'shape' => 'String',
        ],
        'DBSecurityGroups' =>
        [
          'shape' => 'DBSecurityGroupNameList',
        ],
        'VpcSecurityGroupIds' =>
        [
          'shape' => 'VpcSecurityGroupIdList',
        ],
        'ApplyImmediately' =>
        [
          'shape' => 'Boolean',
        ],
        'MasterUserPassword' =>
        [
          'shape' => 'String',
        ],
        'DBParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'BackupRetentionPeriod' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'PreferredBackupWindow' =>
        [
          'shape' => 'String',
        ],
        'PreferredMaintenanceWindow' =>
        [
          'shape' => 'String',
        ],
        'MultiAZ' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'EngineVersion' =>
        [
          'shape' => 'String',
        ],
        'AllowMajorVersionUpgrade' =>
        [
          'shape' => 'Boolean',
        ],
        'AutoMinorVersionUpgrade' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'Iops' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'NewDBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ModifyDBParameterGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBParameterGroupName',
        1 => 'Parameters',
      ],
      'members' =>
      [
        'DBParameterGroupName' =>
        [
          'shape' => 'String',
        ],
        'Parameters' =>
        [
          'shape' => 'ParametersList',
        ],
      ],
    ],
    'ModifyDBSubnetGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBSubnetGroupName',
        1 => 'SubnetIds',
      ],
      'members' =>
      [
        'DBSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'DBSubnetGroupDescription' =>
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
        'EventCategories' =>
        [
          'shape' => 'EventCategoriesList',
        ],
        'Enabled' =>
        [
          'shape' => 'BooleanOptional',
        ],
      ],
    ],
    'ModifyOptionGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OptionGroupName',
      ],
      'members' =>
      [
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'OptionsToInclude' =>
        [
          'shape' => 'OptionConfigurationList',
        ],
        'OptionsToRemove' =>
        [
          'shape' => 'OptionNamesList',
        ],
        'ApplyImmediately' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'Option' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OptionName' =>
        [
          'shape' => 'String',
        ],
        'OptionDescription' =>
        [
          'shape' => 'String',
        ],
        'Persistent' =>
        [
          'shape' => 'Boolean',
        ],
        'Permanent' =>
        [
          'shape' => 'Boolean',
        ],
        'Port' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'OptionSettings' =>
        [
          'shape' => 'OptionSettingConfigurationList',
        ],
        'DBSecurityGroupMemberships' =>
        [
          'shape' => 'DBSecurityGroupMembershipList',
        ],
        'VpcSecurityGroupMemberships' =>
        [
          'shape' => 'VpcSecurityGroupMembershipList',
        ],
      ],
    ],
    'OptionConfiguration' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OptionName',
      ],
      'members' =>
      [
        'OptionName' =>
        [
          'shape' => 'String',
        ],
        'Port' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'DBSecurityGroupMemberships' =>
        [
          'shape' => 'DBSecurityGroupNameList',
        ],
        'VpcSecurityGroupMemberships' =>
        [
          'shape' => 'VpcSecurityGroupIdList',
        ],
        'OptionSettings' =>
        [
          'shape' => 'OptionSettingsList',
        ],
      ],
    ],
    'OptionConfigurationList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OptionConfiguration',
        'locationName' => 'OptionConfiguration',
      ],
    ],
    'OptionGroup' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'OptionGroupDescription' =>
        [
          'shape' => 'String',
        ],
        'EngineName' =>
        [
          'shape' => 'String',
        ],
        'MajorEngineVersion' =>
        [
          'shape' => 'String',
        ],
        'Options' =>
        [
          'shape' => 'OptionsList',
        ],
        'AllowsVpcAndNonVpcInstanceMemberships' =>
        [
          'shape' => 'Boolean',
        ],
        'VpcId' =>
        [
          'shape' => 'String',
        ],
      ],
      'wrapper' => true,
    ],
    'OptionGroupAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'OptionGroupAlreadyExistsFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'OptionGroupMembership' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'Status' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'OptionGroupMembershipList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OptionGroupMembership',
        'locationName' => 'OptionGroupMembership',
      ],
    ],
    'OptionGroupNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'OptionGroupNotFoundFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'OptionGroupOption' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'EngineName' =>
        [
          'shape' => 'String',
        ],
        'MajorEngineVersion' =>
        [
          'shape' => 'String',
        ],
        'MinimumRequiredMinorEngineVersion' =>
        [
          'shape' => 'String',
        ],
        'PortRequired' =>
        [
          'shape' => 'Boolean',
        ],
        'DefaultPort' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'OptionsDependedOn' =>
        [
          'shape' => 'OptionsDependedOn',
        ],
        'Persistent' =>
        [
          'shape' => 'Boolean',
        ],
        'Permanent' =>
        [
          'shape' => 'Boolean',
        ],
        'OptionGroupOptionSettings' =>
        [
          'shape' => 'OptionGroupOptionSettingsList',
        ],
      ],
    ],
    'OptionGroupOptionSetting' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SettingName' =>
        [
          'shape' => 'String',
        ],
        'SettingDescription' =>
        [
          'shape' => 'String',
        ],
        'DefaultValue' =>
        [
          'shape' => 'String',
        ],
        'ApplyType' =>
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
      ],
    ],
    'OptionGroupOptionSettingsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OptionGroupOptionSetting',
        'locationName' => 'OptionGroupOptionSetting',
      ],
    ],
    'OptionGroupOptionsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OptionGroupOption',
        'locationName' => 'OptionGroupOption',
      ],
    ],
    'OptionGroupOptionsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OptionGroupOptions' =>
        [
          'shape' => 'OptionGroupOptionsList',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'OptionGroupQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'OptionGroupQuotaExceededFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'OptionGroups' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OptionGroupsList' =>
        [
          'shape' => 'OptionGroupsList',
        ],
        'Marker' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'OptionGroupsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OptionGroup',
        'locationName' => 'OptionGroup',
      ],
    ],
    'OptionNamesList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
      ],
    ],
    'OptionSetting' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Value' =>
        [
          'shape' => 'String',
        ],
        'DefaultValue' =>
        [
          'shape' => 'String',
        ],
        'Description' =>
        [
          'shape' => 'String',
        ],
        'ApplyType' =>
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
        'IsCollection' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'OptionSettingConfigurationList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OptionSetting',
        'locationName' => 'OptionSetting',
      ],
    ],
    'OptionSettingsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OptionSetting',
        'locationName' => 'OptionSetting',
      ],
    ],
    'OptionsDependedOn' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
        'locationName' => 'OptionName',
      ],
    ],
    'OptionsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Option',
        'locationName' => 'Option',
      ],
    ],
    'OrderableDBInstanceOption' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Engine' =>
        [
          'shape' => 'String',
        ],
        'EngineVersion' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceClass' =>
        [
          'shape' => 'String',
        ],
        'LicenseModel' =>
        [
          'shape' => 'String',
        ],
        'AvailabilityZones' =>
        [
          'shape' => 'AvailabilityZoneList',
        ],
        'MultiAZCapable' =>
        [
          'shape' => 'Boolean',
        ],
        'ReadReplicaCapable' =>
        [
          'shape' => 'Boolean',
        ],
        'Vpc' =>
        [
          'shape' => 'Boolean',
        ],
      ],
      'wrapper' => true,
    ],
    'OrderableDBInstanceOptionsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OrderableDBInstanceOption',
        'locationName' => 'OrderableDBInstanceOption',
      ],
    ],
    'OrderableDBInstanceOptionsMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OrderableDBInstanceOptions' =>
        [
          'shape' => 'OrderableDBInstanceOptionsList',
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
        'ApplyType' =>
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
        'ApplyMethod' =>
        [
          'shape' => 'ApplyMethod',
        ],
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
        'DBInstanceClass' =>
        [
          'shape' => 'String',
        ],
        'AllocatedStorage' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'MasterUserPassword' =>
        [
          'shape' => 'String',
        ],
        'Port' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'BackupRetentionPeriod' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'MultiAZ' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'EngineVersion' =>
        [
          'shape' => 'String',
        ],
        'Iops' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'PointInTimeRestoreNotEnabledFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'PointInTimeRestoreNotEnabled',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'PromoteReadReplicaMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBInstanceIdentifier',
      ],
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'BackupRetentionPeriod' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'PreferredBackupWindow' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ProvisionedIopsNotAvailableInAZFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ProvisionedIopsNotAvailableInAZFault',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'PurchaseReservedDBInstancesOfferingMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ReservedDBInstancesOfferingId',
      ],
      'members' =>
      [
        'ReservedDBInstancesOfferingId' =>
        [
          'shape' => 'String',
        ],
        'ReservedDBInstanceId' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceCount' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'ReadReplicaDBInstanceIdentifierList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'String',
        'locationName' => 'ReadReplicaDBInstanceIdentifier',
      ],
    ],
    'RebootDBInstanceMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBInstanceIdentifier',
      ],
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'ForceFailover' =>
        [
          'shape' => 'BooleanOptional',
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
    'RemoveSourceIdentifierFromSubscriptionMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SubscriptionName',
        1 => 'SourceIdentifier',
      ],
      'members' =>
      [
        'SubscriptionName' =>
        [
          'shape' => 'String',
        ],
        'SourceIdentifier' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'RemoveTagsFromResourceMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceName',
        1 => 'TagKeys',
      ],
      'members' =>
      [
        'ResourceName' =>
        [
          'shape' => 'String',
        ],
        'TagKeys' =>
        [
          'shape' => 'KeyList',
        ],
      ],
    ],
    'ReservedDBInstance' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedDBInstanceId' =>
        [
          'shape' => 'String',
        ],
        'ReservedDBInstancesOfferingId' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceClass' =>
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
        'DBInstanceCount' =>
        [
          'shape' => 'Integer',
        ],
        'ProductDescription' =>
        [
          'shape' => 'String',
        ],
        'OfferingType' =>
        [
          'shape' => 'String',
        ],
        'MultiAZ' =>
        [
          'shape' => 'Boolean',
        ],
        'State' =>
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
    'ReservedDBInstanceAlreadyExistsFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ReservedDBInstanceAlreadyExists',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ReservedDBInstanceList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ReservedDBInstance',
        'locationName' => 'ReservedDBInstance',
      ],
    ],
    'ReservedDBInstanceMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'ReservedDBInstances' =>
        [
          'shape' => 'ReservedDBInstanceList',
        ],
      ],
    ],
    'ReservedDBInstanceNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ReservedDBInstanceNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ReservedDBInstanceQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ReservedDBInstanceQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ReservedDBInstancesOffering' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedDBInstancesOfferingId' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceClass' =>
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
        'ProductDescription' =>
        [
          'shape' => 'String',
        ],
        'OfferingType' =>
        [
          'shape' => 'String',
        ],
        'MultiAZ' =>
        [
          'shape' => 'Boolean',
        ],
        'RecurringCharges' =>
        [
          'shape' => 'RecurringChargeList',
        ],
      ],
      'wrapper' => true,
    ],
    'ReservedDBInstancesOfferingList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ReservedDBInstancesOffering',
        'locationName' => 'ReservedDBInstancesOffering',
      ],
    ],
    'ReservedDBInstancesOfferingMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'String',
        ],
        'ReservedDBInstancesOfferings' =>
        [
          'shape' => 'ReservedDBInstancesOfferingList',
        ],
      ],
    ],
    'ReservedDBInstancesOfferingNotFoundFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'ReservedDBInstancesOfferingNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ResetDBParameterGroupMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBParameterGroupName',
      ],
      'members' =>
      [
        'DBParameterGroupName' =>
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
    'RestoreDBInstanceFromDBSnapshotMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBInstanceIdentifier',
        1 => 'DBSnapshotIdentifier',
      ],
      'members' =>
      [
        'DBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'DBSnapshotIdentifier' =>
        [
          'shape' => 'String',
        ],
        'DBInstanceClass' =>
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
        'DBSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'MultiAZ' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'PubliclyAccessible' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'AutoMinorVersionUpgrade' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'LicenseModel' =>
        [
          'shape' => 'String',
        ],
        'DBName' =>
        [
          'shape' => 'String',
        ],
        'Engine' =>
        [
          'shape' => 'String',
        ],
        'Iops' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'RestoreDBInstanceToPointInTimeMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SourceDBInstanceIdentifier',
        1 => 'TargetDBInstanceIdentifier',
      ],
      'members' =>
      [
        'SourceDBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'TargetDBInstanceIdentifier' =>
        [
          'shape' => 'String',
        ],
        'RestoreTime' =>
        [
          'shape' => 'TStamp',
        ],
        'UseLatestRestorableTime' =>
        [
          'shape' => 'Boolean',
        ],
        'DBInstanceClass' =>
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
        'DBSubnetGroupName' =>
        [
          'shape' => 'String',
        ],
        'MultiAZ' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'PubliclyAccessible' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'AutoMinorVersionUpgrade' =>
        [
          'shape' => 'BooleanOptional',
        ],
        'LicenseModel' =>
        [
          'shape' => 'String',
        ],
        'DBName' =>
        [
          'shape' => 'String',
        ],
        'Engine' =>
        [
          'shape' => 'String',
        ],
        'Iops' =>
        [
          'shape' => 'IntegerOptional',
        ],
        'OptionGroupName' =>
        [
          'shape' => 'String',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'RevokeDBSecurityGroupIngressMessage' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DBSecurityGroupName',
      ],
      'members' =>
      [
        'DBSecurityGroupName' =>
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
        'EC2SecurityGroupId' =>
        [
          'shape' => 'String',
        ],
        'EC2SecurityGroupOwnerId' =>
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
    'SnapshotQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'SnapshotQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
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
        0 => 'db-instance',
        1 => 'db-parameter-group',
        2 => 'db-security-group',
        3 => 'db-snapshot',
      ],
    ],
    'StorageQuotaExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
      'error' =>
      [
        'code' => 'StorageQuotaExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
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
    'SupportedCharacterSetsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'CharacterSet',
        'locationName' => 'CharacterSet',
      ],
    ],
    'TStamp' =>
    [
      'type' => 'timestamp',
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
        'locationName' => 'Tag',
      ],
    ],
    'TagListMessage' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TagList' =>
        [
          'shape' => 'TagList',
        ],
      ],
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
        'locationName' => 'VpcSecurityGroupMembership',
      ],
    ],
    'AddSourceIdentifierToSubscriptionResult' =>
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
    'AuthorizeDBSecurityGroupIngressResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSecurityGroup' =>
        [
          'shape' => 'DBSecurityGroup',
        ],
      ],
    ],
    'CopyDBSnapshotResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSnapshot' =>
        [
          'shape' => 'DBSnapshot',
        ],
      ],
    ],
    'CreateDBInstanceResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstance' =>
        [
          'shape' => 'DBInstance',
        ],
      ],
    ],
    'CreateDBInstanceReadReplicaResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstance' =>
        [
          'shape' => 'DBInstance',
        ],
      ],
    ],
    'CreateDBParameterGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBParameterGroup' =>
        [
          'shape' => 'DBParameterGroup',
        ],
      ],
    ],
    'CreateDBSecurityGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSecurityGroup' =>
        [
          'shape' => 'DBSecurityGroup',
        ],
      ],
    ],
    'CreateDBSnapshotResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSnapshot' =>
        [
          'shape' => 'DBSnapshot',
        ],
      ],
    ],
    'CreateDBSubnetGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSubnetGroup' =>
        [
          'shape' => 'DBSubnetGroup',
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
    'CreateOptionGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OptionGroup' =>
        [
          'shape' => 'OptionGroup',
        ],
      ],
    ],
    'DeleteDBInstanceResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstance' =>
        [
          'shape' => 'DBInstance',
        ],
      ],
    ],
    'DeleteDBSnapshotResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSnapshot' =>
        [
          'shape' => 'DBSnapshot',
        ],
      ],
    ],
    'DeleteEventSubscriptionResult' =>
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
    'DescribeEngineDefaultParametersResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'EngineDefaults' =>
        [
          'shape' => 'EngineDefaults',
        ],
      ],
    ],
    'ModifyDBInstanceResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstance' =>
        [
          'shape' => 'DBInstance',
        ],
      ],
    ],
    'ModifyDBSubnetGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSubnetGroup' =>
        [
          'shape' => 'DBSubnetGroup',
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
    'ModifyOptionGroupResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OptionGroup' =>
        [
          'shape' => 'OptionGroup',
        ],
      ],
    ],
    'PromoteReadReplicaResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstance' =>
        [
          'shape' => 'DBInstance',
        ],
      ],
    ],
    'PurchaseReservedDBInstancesOfferingResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ReservedDBInstance' =>
        [
          'shape' => 'ReservedDBInstance',
        ],
      ],
    ],
    'RebootDBInstanceResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstance' =>
        [
          'shape' => 'DBInstance',
        ],
      ],
    ],
    'RemoveSourceIdentifierFromSubscriptionResult' =>
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
    'RestoreDBInstanceFromDBSnapshotResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstance' =>
        [
          'shape' => 'DBInstance',
        ],
      ],
    ],
    'RestoreDBInstanceToPointInTimeResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBInstance' =>
        [
          'shape' => 'DBInstance',
        ],
      ],
    ],
    'RevokeDBSecurityGroupIngressResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DBSecurityGroup' =>
        [
          'shape' => 'DBSecurityGroup',
        ],
      ],
    ],
  ],
];