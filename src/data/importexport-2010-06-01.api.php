<?php return [
  'metadata' => [
    'apiVersion' => '2010-06-01',
    'endpointPrefix' => 'importexport',
    'globalEndpoint' => 'importexport.amazonaws.com',
    'serviceFullName' => 'AWS Import/Export',
    'signatureVersion' => 'v2',
    'xmlNamespace' => 'http://importexport.amazonaws.com/doc/2010-06-01/',
    'protocol' => 'query',
  ],
  'operations' => [
    'CancelJob' => [
      'name' => 'CancelJob',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/?Operation=CancelJob',
      ],
      'input' => [
        'shape' => 'CancelJobInput',
      ],
      'output' => [
        'shape' => 'CancelJobOutput',
        'resultWrapper' => 'CancelJobResult',
      ],
      'errors' => [
        [
          'shape' => 'InvalidJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'ExpiredJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'CanceledJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'UnableToCancelJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
      ],
    ],
    'CreateJob' => [
      'name' => 'CreateJob',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/?Operation=CreateJob',
      ],
      'input' => [
        'shape' => 'CreateJobInput',
      ],
      'output' => [
        'shape' => 'CreateJobOutput',
        'resultWrapper' => 'CreateJobResult',
      ],
      'errors' => [
        [
          'shape' => 'MissingParameterException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidParameterException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidParameterException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidAddressException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidManifestFieldException',
          'exception' => true,
        ],
        [
          'shape' => 'MissingManifestFieldException',
          'exception' => true,
        ],
        [
          'shape' => 'NoSuchBucketException',
          'exception' => true,
        ],
        [
          'shape' => 'MissingCustomsException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidCustomsException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidFileSystemException',
          'exception' => true,
        ],
        [
          'shape' => 'MultipleRegionsException',
          'exception' => true,
        ],
        [
          'shape' => 'BucketPermissionException',
          'exception' => true,
        ],
        [
          'shape' => 'MalformedManifestException',
          'exception' => true,
        ],
      ],
    ],
    'GetStatus' => [
      'name' => 'GetStatus',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/?Operation=GetStatus',
      ],
      'input' => [
        'shape' => 'GetStatusInput',
      ],
      'output' => [
        'shape' => 'GetStatusOutput',
        'resultWrapper' => 'GetStatusResult',
      ],
      'errors' => [
        [
          'shape' => 'InvalidJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'ExpiredJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'CanceledJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
      ],
    ],
    'ListJobs' => [
      'name' => 'ListJobs',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/?Operation=ListJobs',
      ],
      'input' => [
        'shape' => 'ListJobsInput',
      ],
      'output' => [
        'shape' => 'ListJobsOutput',
        'resultWrapper' => 'ListJobsResult',
      ],
      'errors' => [
        [
          'shape' => 'InvalidParameterException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
      ],
    ],
    'UpdateJob' => [
      'name' => 'UpdateJob',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/?Operation=UpdateJob',
      ],
      'input' => [
        'shape' => 'UpdateJobInput',
      ],
      'output' => [
        'shape' => 'UpdateJobOutput',
        'resultWrapper' => 'UpdateJobResult',
      ],
      'errors' => [
        [
          'shape' => 'MissingParameterException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidParameterException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidAccessKeyIdException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidAddressException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidManifestFieldException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'MissingManifestFieldException',
          'exception' => true,
        ],
        [
          'shape' => 'NoSuchBucketException',
          'exception' => true,
        ],
        [
          'shape' => 'ExpiredJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'CanceledJobIdException',
          'exception' => true,
        ],
        [
          'shape' => 'MissingCustomsException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidCustomsException',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidFileSystemException',
          'exception' => true,
        ],
        [
          'shape' => 'MultipleRegionsException',
          'exception' => true,
        ],
        [
          'shape' => 'BucketPermissionException',
          'exception' => true,
        ],
        [
          'shape' => 'MalformedManifestException',
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' => [
    'AwsShippingAddress' => [
      'type' => 'string',
    ],
    'BucketPermissionException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'CancelJobInput' => [
      'type' => 'structure',
      'required' => [
        'JobId',
      ],
      'members' => [
        'JobId' => [
          'shape' => 'JobId',
        ],
      ],
    ],
    'CancelJobOutput' => [
      'type' => 'structure',
      'members' => [
        'Success' => [
          'shape' => 'Success',
        ],
      ],
    ],
    'CanceledJobIdException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'Carrier' => [
      'type' => 'string',
    ],
    'CreateJobInput' => [
      'type' => 'structure',
      'required' => [
        'JobType',
        'Manifest',
        'ValidateOnly',
      ],
      'members' => [
        'JobType' => [
          'shape' => 'JobType',
        ],
        'Manifest' => [
          'shape' => 'Manifest',
        ],
        'ManifestAddendum' => [
          'shape' => 'ManifestAddendum',
        ],
        'ValidateOnly' => [
          'shape' => 'ValidateOnly',
        ],
      ],
    ],
    'CreateJobOutput' => [
      'type' => 'structure',
      'members' => [
        'JobId' => [
          'shape' => 'JobId',
        ],
        'JobType' => [
          'shape' => 'JobType',
        ],
        'AwsShippingAddress' => [
          'shape' => 'AwsShippingAddress',
        ],
        'Signature' => [
          'shape' => 'Signature',
        ],
        'SignatureFileContents' => [
          'shape' => 'SignatureFileContents',
        ],
        'WarningMessage' => [
          'shape' => 'WarningMessage',
        ],
      ],
    ],
    'CreationDate' => [
      'type' => 'timestamp',
    ],
    'CurrentManifest' => [
      'type' => 'string',
    ],
    'ErrorCount' => [
      'type' => 'integer',
    ],
    'ErrorMessage' => [
      'type' => 'string',
    ],
    'ExpiredJobIdException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'GetStatusInput' => [
      'type' => 'structure',
      'required' => [
        'JobId',
      ],
      'members' => [
        'JobId' => [
          'shape' => 'JobId',
        ],
      ],
    ],
    'GetStatusOutput' => [
      'type' => 'structure',
      'members' => [
        'JobId' => [
          'shape' => 'JobId',
        ],
        'JobType' => [
          'shape' => 'JobType',
        ],
        'AwsShippingAddress' => [
          'shape' => 'AwsShippingAddress',
        ],
        'LocationCode' => [
          'shape' => 'LocationCode',
        ],
        'LocationMessage' => [
          'shape' => 'LocationMessage',
        ],
        'ProgressCode' => [
          'shape' => 'ProgressCode',
        ],
        'ProgressMessage' => [
          'shape' => 'ProgressMessage',
        ],
        'Carrier' => [
          'shape' => 'Carrier',
        ],
        'TrackingNumber' => [
          'shape' => 'TrackingNumber',
        ],
        'LogBucket' => [
          'shape' => 'LogBucket',
        ],
        'LogKey' => [
          'shape' => 'LogKey',
        ],
        'ErrorCount' => [
          'shape' => 'ErrorCount',
        ],
        'Signature' => [
          'shape' => 'Signature',
        ],
        'SignatureFileContents' => [
          'shape' => 'Signature',
        ],
        'CurrentManifest' => [
          'shape' => 'CurrentManifest',
        ],
        'CreationDate' => [
          'shape' => 'CreationDate',
        ],
      ],
    ],
    'InvalidAccessKeyIdException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidAddressException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidCustomsException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidFileSystemException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidJobIdException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidManifestFieldException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'InvalidParameterException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'IsCanceled' => [
      'type' => 'boolean',
    ],
    'IsTruncated' => [
      'type' => 'boolean',
    ],
    'Job' => [
      'type' => 'structure',
      'members' => [
        'JobId' => [
          'shape' => 'JobId',
        ],
        'CreationDate' => [
          'shape' => 'CreationDate',
        ],
        'IsCanceled' => [
          'shape' => 'IsCanceled',
        ],
        'JobType' => [
          'shape' => 'JobType',
        ],
      ],
    ],
    'JobId' => [
      'type' => 'string',
    ],
    'JobType' => [
      'type' => 'string',
      'enum' => [
        'Import',
        'Export',
      ],
    ],
    'JobsList' => [
      'type' => 'list',
      'member' => [
        'shape' => 'Job',
      ],
    ],
    'ListJobsInput' => [
      'type' => 'structure',
      'members' => [
        'MaxJobs' => [
          'shape' => 'MaxJobs',
        ],
        'Marker' => [
          'shape' => 'Marker',
        ],
      ],
    ],
    'ListJobsOutput' => [
      'type' => 'structure',
      'members' => [
        'Jobs' => [
          'shape' => 'JobsList',
        ],
        'IsTruncated' => [
          'shape' => 'IsTruncated',
        ],
      ],
    ],
    'LocationCode' => [
      'type' => 'string',
    ],
    'LocationMessage' => [
      'type' => 'string',
    ],
    'LogBucket' => [
      'type' => 'string',
    ],
    'LogKey' => [
      'type' => 'string',
    ],
    'MalformedManifestException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'Manifest' => [
      'type' => 'string',
    ],
    'ManifestAddendum' => [
      'type' => 'string',
    ],
    'Marker' => [
      'type' => 'string',
    ],
    'MaxJobs' => [
      'type' => 'integer',
    ],
    'MissingCustomsException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'MissingManifestFieldException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'MissingParameterException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'MultipleRegionsException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'NoSuchBucketException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'ProgressCode' => [
      'type' => 'string',
    ],
    'ProgressMessage' => [
      'type' => 'string',
    ],
    'Signature' => [
      'type' => 'string',
    ],
    'SignatureFileContents' => [
      'type' => 'string',
    ],
    'Success' => [
      'type' => 'boolean',
    ],
    'TrackingNumber' => [
      'type' => 'string',
    ],
    'UnableToCancelJobIdException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'UpdateJobInput' => [
      'type' => 'structure',
      'required' => [
        'JobId',
        'Manifest',
        'JobType',
        'ValidateOnly',
      ],
      'members' => [
        'JobId' => [
          'shape' => 'JobId',
        ],
        'Manifest' => [
          'shape' => 'Manifest',
        ],
        'JobType' => [
          'shape' => 'JobType',
        ],
        'ValidateOnly' => [
          'shape' => 'ValidateOnly',
        ],
      ],
    ],
    'UpdateJobOutput' => [
      'type' => 'structure',
      'members' => [
        'Success' => [
          'shape' => 'Success',
        ],
        'WarningMessage' => [
          'shape' => 'WarningMessage',
        ],
      ],
    ],
    'ValidateOnly' => [
      'type' => 'boolean',
    ],
    'WarningMessage' => [
      'type' => 'string',
    ],
  ],
];
