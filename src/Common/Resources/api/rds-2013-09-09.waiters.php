<?php
return [
  'waiters' =>
  [
    '__default__' =>
    [
      'interval' => 30,
      'max_attempts' => 60,
    ],
    '__DBInstanceState' =>
    [
      'operation' => 'DescribeDBInstances',
      'acceptor_path' => 'DBInstances[].DBInstanceStatus',
      'acceptor_type' => 'output',
    ],
    'DBInstanceAvailable' =>
    [
      'extends' => '__DBInstanceState',
      'success_value' => 'available',
      'failure_value' =>
      [
        0 => 'deleted',
        1 => 'deleting',
        2 => 'failed',
        3 => 'incompatible-restore',
        4 => 'incompatible-parameters',
        5 => 'incompatible-parameters',
        6 => 'incompatible-restore',
      ],
    ],
    'DBInstanceDeleted' =>
    [
      'extends' => '__DBInstanceState',
      'success_value' => 'deleted',
      'failure_value' =>
      [
        0 => 'creating',
        1 => 'modifying',
        2 => 'rebooting',
        3 => 'resetting-master-credentials',
      ],
    ],
  ],
];