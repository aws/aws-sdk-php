<?php
return [
  'pagination' =>
  [
    'ListHealthChecks' =>
    [
      'input_token' => 'Marker',
      'output_token' => 'NextMarker',
      'more_results' => 'IsTruncated',
      'limit_key' => 'MaxItems',
      'result_key' => 'HealthChecks',
    ],
    'ListHostedZones' =>
    [
      'input_token' => 'Marker',
      'output_token' => 'NextMarker',
      'more_results' => 'IsTruncated',
      'limit_key' => 'MaxItems',
      'result_key' => 'HostedZones',
    ],
    'ListResourceRecordSets' =>
    [
      'more_results' => 'IsTruncated',
      'limit_key' => 'MaxItems',
      'result_key' => 'ResourceRecordSets',
      'input_token' =>
      [
        0 => 'StartRecordName',
        1 => 'StartRecordType',
        2 => 'StartRecordIdentifier',
      ],
      'output_token' =>
      [
        0 => 'NextRecordName',
        1 => 'NextRecordType',
        2 => 'NextRecordIdentifier',
      ],
    ],
  ],
];