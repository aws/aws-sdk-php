<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2010-06-01',
    'endpointPrefix' => 'importexport',
    'globalEndpoint' => 'importexport.amazonaws.com',
    'serviceFullName' => 'AWS Import/Export',
    'signatureVersion' => 'v2',
    'xmlNamespace' => 'http://importexport.amazonaws.com/doc/2010-06-01/',
    'protocol' => 'query',
  ],
  'operations' =>
  [
    'CancelJob' =>
    [
      'name' => 'CancelJob',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/?Operation=CancelJob',
      ],
      'input' =>
      [
        'shape' => 'CancelJobInput',
      ],
      'output' =>
      [
        'shape' => 'CancelJobOutput',
        'resultWrapper' => 'CancelJobResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidJobIdException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ExpiredJobIdException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'CanceledJobIdException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'UnableToCancelJobIdException',
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
      ],
    ],
    'CreateJob' =>
    [
      'name' => 'CreateJob',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/?Operation=CreateJob',
      ],
      'input' =>
      [
        'shape' => 'CreateJobInput',
      ],
      'output' =>
      [
        'shape' => 'CreateJobOutput',
        'resultWrapper' => 'CreateJobResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'MissingParameterException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidParameterException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InvalidAddressException',
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'InvalidManifestFieldException',
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'MissingManifestFieldException',
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'NoSuchBucketException',
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'MissingCustomsException',
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'InvalidCustomsException',
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'InvalidFileSystemException',
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'MultipleRegionsException',
          'exception' => true,
        ],
        12 =>
        [
          'shape' => 'BucketPermissionException',
          'exception' => true,
        ],
        13 =>
        [
          'shape' => 'MalformedManifestException',
          'exception' => true,
        ],
      ],
    ],
    'GetStatus' =>
    [
      'name' => 'GetStatus',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/?Operation=GetStatus',
      ],
      'input' =>
      [
        'shape' => 'GetStatusInput',
      ],
      'output' =>
      [
        'shape' => 'GetStatusOutput',
        'resultWrapper' => 'GetStatusResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidJobIdException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ExpiredJobIdException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'CanceledJobIdException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
      ],
    ],
    'ListJobs' =>
    [
      'name' => 'ListJobs',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/?Operation=ListJobs',
      ],
      'input' =>
      [
        'shape' => 'ListJobsInput',
      ],
      'output' =>
      [
        'shape' => 'ListJobsOutput',
        'resultWrapper' => 'ListJobsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateJob' =>
    [
      'name' => 'UpdateJob',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/?Operation=UpdateJob',
      ],
      'input' =>
      [
        'shape' => 'UpdateJobInput',
      ],
      'output' =>
      [
        'shape' => 'UpdateJobOutput',
        'resultWrapper' => 'UpdateJobResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'MissingParameterException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidAddressException',
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InvalidManifestFieldException',
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'InvalidJobIdException',
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'MissingManifestFieldException',
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'NoSuchBucketException',
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'ExpiredJobIdException',
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'CanceledJobIdException',
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'MissingCustomsException',
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'InvalidCustomsException',
          'exception' => true,
        ],
        12 =>
        [
          'shape' => 'InvalidFileSystemException',
          'exception' => true,
        ],
        13 =>
        [
          'shape' => 'MultipleRegionsException',
          'exception' => true,
        ],
        14 =>
        [
          'shape' => 'BucketPermissionException',
          'exception' => true,
        ],
        15 =>
        [
          'shape' => 'MalformedManifestException',
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'AwsShippingAddress' =>
    [
      'type' => 'string',
    ],
    'BucketPermissionException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'CancelJobInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'JobId',
      ],
      'members' =>
      [
        'JobId' =>
        [
          'shape' => 'JobId',
        ],
      ],
    ],
    'CancelJobOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Success' =>
        [
          'shape' => 'Success',
        ],
      ],
    ],
    'CanceledJobIdException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'Carrier' =>
    [
      'type' => 'string',
    ],
    'CreateJobInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'JobType',
        1 => 'Manifest',
        2 => 'ValidateOnly',
      ],
      'members' =>
      [
        'JobType' =>
        [
          'shape' => 'JobType',
        ],
        'Manifest' =>
        [
          'shape' => 'Manifest',
        ],
        'ManifestAddendum' =>
        [
          'shape' => 'ManifestAddendum',
        ],
        'ValidateOnly' =>
        [
          'shape' => 'ValidateOnly',
        ],
      ],
    ],
    'CreateJobOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'JobId' =>
        [
          'shape' => 'JobId',
        ],
        'JobType' =>
        [
          'shape' => 'JobType',
        ],
        'AwsShippingAddress' =>
        [
          'shape' => 'AwsShippingAddress',
        ],
        'Signature' =>
        [
          'shape' => 'Signature',
        ],
        'SignatureFileContents' =>
        [
          'shape' => 'SignatureFileContents',
        ],
        'WarningMessage' =>
        [
          'shape' => 'WarningMessage',
        ],
      ],
    ],
    'CreationDate' =>
    [
      'type' => 'timestamp',
    ],
    'CurrentManifest' =>
    [
      'type' => 'string',
    ],
    'ErrorCount' =>
    [
      'type' => 'integer',
    ],
    'ErrorMessage' =>
    [
      'type' => 'string',
    ],
    'ExpiredJobIdException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'GetStatusInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'JobId',
      ],
      'members' =>
      [
        'JobId' =>
        [
          'shape' => 'JobId',
        ],
      ],
    ],
    'GetStatusOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'JobId' =>
        [
          'shape' => 'JobId',
        ],
        'JobType' =>
        [
          'shape' => 'JobType',
        ],
        'AwsShippingAddress' =>
        [
          'shape' => 'AwsShippingAddress',
        ],
        'LocationCode' =>
        [
          'shape' => 'LocationCode',
        ],
        'LocationMessage' =>
        [
          'shape' => 'LocationMessage',
        ],
        'ProgressCode' =>
        [
          'shape' => 'ProgressCode',
        ],
        'ProgressMessage' =>
        [
          'shape' => 'ProgressMessage',
        ],
        'Carrier' =>
        [
          'shape' => 'Carrier',
        ],
        'TrackingNumber' =>
        [
          'shape' => 'TrackingNumber',
        ],
        'LogBucket' =>
        [
          'shape' => 'LogBucket',
        ],
        'LogKey' =>
        [
          'shape' => 'LogKey',
        ],
        'ErrorCount' =>
        [
          'shape' => 'ErrorCount',
        ],
        'Signature' =>
        [
          'shape' => 'Signature',
        ],
        'SignatureFileContents' =>
        [
          'shape' => 'Signature',
        ],
        'CurrentManifest' =>
        [
          'shape' => 'CurrentManifest',
        ],
        'CreationDate' =>
        [
          'shape' => 'CreationDate',
        ],
      ],
    ],
    'InvalidAccessKeyIdException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidAddressException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidCustomsException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidFileSystemException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidJobIdException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidManifestFieldException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidParameterException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'IsCanceled' =>
    [
      'type' => 'boolean',
    ],
    'IsTruncated' =>
    [
      'type' => 'boolean',
    ],
    'Job' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'JobId' =>
        [
          'shape' => 'JobId',
        ],
        'CreationDate' =>
        [
          'shape' => 'CreationDate',
        ],
        'IsCanceled' =>
        [
          'shape' => 'IsCanceled',
        ],
        'JobType' =>
        [
          'shape' => 'JobType',
        ],
      ],
    ],
    'JobId' =>
    [
      'type' => 'string',
    ],
    'JobType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'Import',
        1 => 'Export',
      ],
    ],
    'JobsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Job',
      ],
    ],
    'ListJobsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MaxJobs' =>
        [
          'shape' => 'MaxJobs',
        ],
        'Marker' =>
        [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListJobsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Jobs' =>
        [
          'shape' => 'JobsList',
        ],
        'IsTruncated' =>
        [
          'shape' => 'IsTruncated',
        ],
      ],
    ],
    'LocationCode' =>
    [
      'type' => 'string',
    ],
    'LocationMessage' =>
    [
      'type' => 'string',
    ],
    'LogBucket' =>
    [
      'type' => 'string',
    ],
    'LogKey' =>
    [
      'type' => 'string',
    ],
    'MalformedManifestException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'Manifest' =>
    [
      'type' => 'string',
    ],
    'ManifestAddendum' =>
    [
      'type' => 'string',
    ],
    'Marker' =>
    [
      'type' => 'string',
    ],
    'MaxJobs' =>
    [
      'type' => 'integer',
    ],
    'MissingCustomsException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'MissingManifestFieldException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'MissingParameterException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'MultipleRegionsException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'NoSuchBucketException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'ProgressCode' =>
    [
      'type' => 'string',
    ],
    'ProgressMessage' =>
    [
      'type' => 'string',
    ],
    'Signature' =>
    [
      'type' => 'string',
    ],
    'SignatureFileContents' =>
    [
      'type' => 'string',
    ],
    'Success' =>
    [
      'type' => 'boolean',
    ],
    'TrackingNumber' =>
    [
      'type' => 'string',
    ],
    'UnableToCancelJobIdException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'UpdateJobInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'JobId',
        1 => 'Manifest',
        2 => 'JobType',
        3 => 'ValidateOnly',
      ],
      'members' =>
      [
        'JobId' =>
        [
          'shape' => 'JobId',
        ],
        'Manifest' =>
        [
          'shape' => 'Manifest',
        ],
        'JobType' =>
        [
          'shape' => 'JobType',
        ],
        'ValidateOnly' =>
        [
          'shape' => 'ValidateOnly',
        ],
      ],
    ],
    'UpdateJobOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Success' =>
        [
          'shape' => 'Success',
        ],
        'WarningMessage' =>
        [
          'shape' => 'WarningMessage',
        ],
      ],
    ],
    'ValidateOnly' =>
    [
      'type' => 'boolean',
    ],
    'WarningMessage' =>
    [
      'type' => 'string',
    ],
  ],
];