<?php
return [
  'waiters' =>
  [
    '__default__' =>
    [
      'acceptor_type' => 'output',
    ],
    '__ClusterState' =>
    [
      'interval' => 60,
      'max_attempts' => 30,
      'operation' => 'DescribeClusters',
      'acceptor_path' => 'Clusters[].ClusterStatus',
    ],
    'ClusterAvailable' =>
    [
      'extends' => '__ClusterState',
      'ignore_errors' =>
      [
        0 => 'ClusterNotFound',
      ],
      'success_value' => 'available',
      'failure_value' =>
      [
        0 => 'deleting',
      ],
    ],
    'ClusterDeleted' =>
    [
      'extends' => '__ClusterState',
      'success_type' => 'error',
      'success_value' => 'ClusterNotFound',
      'failure_value' =>
      [
        0 => 'creating',
        1 => 'rebooting',
      ],
    ],
    'SnapshotAvailable' =>
    [
      'interval' => 15,
      'max_attempts' => 20,
      'operation' => 'DescribeClusterSnapshots',
      'acceptor_path' => 'Snapshots[].Status',
      'success_value' => 'available',
      'failure_value' =>
      [
        0 => 'failed',
        1 => 'deleted',
      ],
    ],
  ],
];