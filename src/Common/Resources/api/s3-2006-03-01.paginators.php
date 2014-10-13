<?php
return [
  'pagination' =>
  [
    'ListBuckets' =>
    [
      'result_key' => 'Buckets',
    ],
    'ListMultipartUploads' =>
    [
      'limit_key' => 'MaxUploads',
      'more_results' => 'IsTruncated',
      'output_token' =>
      [
        0 => 'NextKeyMarker',
        1 => 'NextUploadIdMarker',
      ],
      'input_token' =>
      [
        0 => 'KeyMarker',
        1 => 'UploadIdMarker',
      ],
      'result_key' =>
      [
        0 => 'Uploads',
        1 => 'CommonPrefixes',
      ],
    ],
    'ListObjectVersions' =>
    [
      'more_results' => 'IsTruncated',
      'limit_key' => 'MaxKeys',
      'output_token' =>
      [
        0 => 'NextKeyMarker',
        1 => 'NextVersionIdMarker',
      ],
      'input_token' =>
      [
        0 => 'KeyMarker',
        1 => 'VersionIdMarker',
      ],
      'result_key' =>
      [
        0 => 'Versions',
        1 => 'DeleteMarkers',
        2 => 'CommonPrefixes',
      ],
    ],
    'ListObjects' =>
    [
      'more_results' => 'IsTruncated',
      'limit_key' => 'MaxKeys',
      'output_token' => 'NextMarker || Contents[-1].Key',
      'input_token' => 'Marker',
      'result_key' =>
      [
        0 => 'Contents',
        1 => 'CommonPrefixes',
      ],
    ],
    'ListParts' =>
    [
      'more_results' => 'IsTruncated',
      'limit_key' => 'MaxParts',
      'output_token' => 'NextPartNumberMarker',
      'input_token' => 'PartNumberMarker',
      'result_key' => 'Parts',
    ],
  ],
];