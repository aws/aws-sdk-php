<?php
return [
  'waiters' =>
  [
    '__default__' =>
    [
      'interval' => 15,
      'max_attempts' => 40,
      'acceptor_type' => 'output',
    ],
    '__InstanceState' =>
    [
      'operation' => 'DescribeInstances',
      'acceptor_path' => 'Reservations[].Instances[].State.Name',
    ],
    'InstanceRunning' =>
    [
      'extends' => '__InstanceState',
      'success_value' => 'running',
      'failure_value' =>
      [
        0 => 'shutting-down',
        1 => 'terminated',
        2 => 'stopping',
      ],
    ],
    'InstanceStopped' =>
    [
      'extends' => '__InstanceState',
      'success_value' => 'stopped',
      'failure_value' =>
      [
        0 => 'pending',
        1 => 'terminated',
      ],
    ],
    'InstanceTerminated' =>
    [
      'extends' => '__InstanceState',
      'success_value' => 'terminated',
      'failure_value' =>
      [
        0 => 'pending',
        1 => 'stopping',
      ],
    ],
    '__ExportTaskState' =>
    [
      'operation' => 'DescribeExportTasks',
      'acceptor_path' => 'ExportTasks[].State',
    ],
    'ExportTaskCompleted' =>
    [
      'extends' => '__ExportTaskState',
      'success_value' => 'completed',
    ],
    'ExportTaskCancelled' =>
    [
      'extends' => '__ExportTaskState',
      'success_value' => 'cancelled',
    ],
    'SnapshotCompleted' =>
    [
      'operation' => 'DescribeSnapshots',
      'success_path' => 'Snapshots[].State',
      'success_value' => 'completed',
    ],
    'SubnetAvailable' =>
    [
      'operation' => 'DescribeSubnets',
      'success_path' => 'Subnets[].State',
      'success_value' => 'available',
    ],
    '__VolumeStatus' =>
    [
      'operation' => 'DescribeVolumes',
      'acceptor_path' => 'VolumeStatuses[].VolumeStatus.Status',
    ],
    'VolumeAvailable' =>
    [
      'extends' => '__VolumeStatus',
      'success_value' => 'available',
      'failure_value' =>
      [
        0 => 'deleted',
      ],
    ],
    'VolumeInUse' =>
    [
      'extends' => '__VolumeStatus',
      'success_value' => 'in-use',
      'failure_value' =>
      [
        0 => 'deleted',
      ],
    ],
    'VolumeDeleted' =>
    [
      'extends' => '__VolumeStatus',
      'success_value' => 'deleted',
    ],
    'VpcAvailable' =>
    [
      'operation' => 'DescribeVpcs',
      'success_path' => 'Vpcs[].State',
      'success_value' => 'available',
    ],
    '__VpnConnectionState' =>
    [
      'operation' => 'DescribeVpnConnections',
      'acceptor_path' => 'VpnConnections[].State',
    ],
    'VpnConnectionAvailable' =>
    [
      'extends' => '__VpnConnectionState',
      'success_value' => 'available',
      'failure_value' =>
      [
        0 => 'deleting',
        1 => 'deleted',
      ],
    ],
    'VpnConnectionDeleted' =>
    [
      'extends' => '__VpnConnectionState',
      'success_value' => 'deleted',
      'failure_value' =>
      [
        0 => 'pending',
      ],
    ],
    'BundleTaskComplete' =>
    [
      'operation' => 'DescribeBundleTasks',
      'acceptor_path' => 'BundleTasks[].State',
      'success_value' => 'complete',
      'failure_value' =>
      [
        0 => 'failed',
      ],
    ],
    '__ConversionTaskState' =>
    [
      'operation' => 'DescribeConversionTasks',
      'acceptor_path' => 'ConversionTasks[].State',
    ],
    'ConversionTaskCompleted' =>
    [
      'extends' => '__ConversionTaskState',
      'success_value' => 'completed',
      'failure_value' =>
      [
        0 => 'cancelled',
        1 => 'cancelling',
      ],
    ],
    'ConversionTaskCancelled' =>
    [
      'extends' => '__ConversionTaskState',
      'success_value' => 'cancelled',
    ],
    '__CustomerGatewayState' =>
    [
      'operation' => 'DescribeCustomerGateways',
      'acceptor_path' => 'CustomerGateways[].State',
    ],
    'CustomerGatewayAvailable' =>
    [
      'extends' => '__CustomerGatewayState',
      'success_value' => 'available',
      'failure_value' =>
      [
        0 => 'deleted',
        1 => 'deleting',
      ],
    ],
    'ConversionTaskDeleted' =>
    [
      'extends' => '__CustomerGatewayState',
      'success_value' => 'deleted',
    ],
  ],
];