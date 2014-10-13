<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2012-06-01',
    'checksumFormat' => 'sha256',
    'endpointPrefix' => 'glacier',
    'serviceFullName' => 'Amazon Glacier',
    'signatureVersion' => 'v4',
    'protocol' => 'rest-json',
  ],
  'operations' =>
  [
    'AbortMultipartUpload' =>
    [
      'name' => 'AbortMultipartUpload',
      'http' =>
      [
        'method' => 'DELETE',
        'requestUri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
        'responseCode' => 204,
      ],
      'input' =>
      [
        'shape' => 'AbortMultipartUploadInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CompleteMultipartUpload' =>
    [
      'name' => 'CompleteMultipartUpload',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'CompleteMultipartUploadInput',
      ],
      'output' =>
      [
        'shape' => 'ArchiveCreationOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateVault' =>
    [
      'name' => 'CreateVault',
      'http' =>
      [
        'method' => 'PUT',
        'requestUri' => '/{accountId}/vaults/{vaultName}',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'CreateVaultInput',
      ],
      'output' =>
      [
        'shape' => 'CreateVaultOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteArchive' =>
    [
      'name' => 'DeleteArchive',
      'http' =>
      [
        'method' => 'DELETE',
        'requestUri' => '/{accountId}/vaults/{vaultName}/archives/{archiveId}',
        'responseCode' => 204,
      ],
      'input' =>
      [
        'shape' => 'DeleteArchiveInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteVault' =>
    [
      'name' => 'DeleteVault',
      'http' =>
      [
        'method' => 'DELETE',
        'requestUri' => '/{accountId}/vaults/{vaultName}',
        'responseCode' => 204,
      ],
      'input' =>
      [
        'shape' => 'DeleteVaultInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteVaultNotifications' =>
    [
      'name' => 'DeleteVaultNotifications',
      'http' =>
      [
        'method' => 'DELETE',
        'requestUri' => '/{accountId}/vaults/{vaultName}/notification-configuration',
        'responseCode' => 204,
      ],
      'input' =>
      [
        'shape' => 'DeleteVaultNotificationsInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeJob' =>
    [
      'name' => 'DescribeJob',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/{accountId}/vaults/{vaultName}/jobs/{jobId}',
      ],
      'input' =>
      [
        'shape' => 'DescribeJobInput',
      ],
      'output' =>
      [
        'shape' => 'GlacierJobDescription',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeVault' =>
    [
      'name' => 'DescribeVault',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/{accountId}/vaults/{vaultName}',
      ],
      'input' =>
      [
        'shape' => 'DescribeVaultInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeVaultOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetJobOutput' =>
    [
      'name' => 'GetJobOutput',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/{accountId}/vaults/{vaultName}/jobs/{jobId}/output',
      ],
      'input' =>
      [
        'shape' => 'GetJobOutputInput',
      ],
      'output' =>
      [
        'shape' => 'GetJobOutputOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetVaultNotifications' =>
    [
      'name' => 'GetVaultNotifications',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/{accountId}/vaults/{vaultName}/notification-configuration',
      ],
      'input' =>
      [
        'shape' => 'GetVaultNotificationsInput',
      ],
      'output' =>
      [
        'shape' => 'GetVaultNotificationsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'InitiateJob' =>
    [
      'name' => 'InitiateJob',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/{accountId}/vaults/{vaultName}/jobs',
        'responseCode' => 202,
      ],
      'input' =>
      [
        'shape' => 'InitiateJobInput',
      ],
      'output' =>
      [
        'shape' => 'InitiateJobOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'InitiateMultipartUpload' =>
    [
      'name' => 'InitiateMultipartUpload',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/{accountId}/vaults/{vaultName}/multipart-uploads',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'InitiateMultipartUploadInput',
      ],
      'output' =>
      [
        'shape' => 'InitiateMultipartUploadOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListJobs' =>
    [
      'name' => 'ListJobs',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/{accountId}/vaults/{vaultName}/jobs',
      ],
      'input' =>
      [
        'shape' => 'ListJobsInput',
      ],
      'output' =>
      [
        'shape' => 'ListJobsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListMultipartUploads' =>
    [
      'name' => 'ListMultipartUploads',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/{accountId}/vaults/{vaultName}/multipart-uploads',
      ],
      'input' =>
      [
        'shape' => 'ListMultipartUploadsInput',
      ],
      'output' =>
      [
        'shape' => 'ListMultipartUploadsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListParts' =>
    [
      'name' => 'ListParts',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
      ],
      'input' =>
      [
        'shape' => 'ListPartsInput',
      ],
      'output' =>
      [
        'shape' => 'ListPartsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListVaults' =>
    [
      'name' => 'ListVaults',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/{accountId}/vaults',
      ],
      'input' =>
      [
        'shape' => 'ListVaultsInput',
      ],
      'output' =>
      [
        'shape' => 'ListVaultsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetVaultNotifications' =>
    [
      'name' => 'SetVaultNotifications',
      'http' =>
      [
        'method' => 'PUT',
        'requestUri' => '/{accountId}/vaults/{vaultName}/notification-configuration',
        'responseCode' => 204,
      ],
      'input' =>
      [
        'shape' => 'SetVaultNotificationsInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UploadArchive' =>
    [
      'name' => 'UploadArchive',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/{accountId}/vaults/{vaultName}/archives',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'UploadArchiveInput',
      ],
      'output' =>
      [
        'shape' => 'ArchiveCreationOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'RequestTimeoutException',
          'error' =>
          [
            'httpStatusCode' => 408,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UploadMultipartPart' =>
    [
      'name' => 'UploadMultipartPart',
      'http' =>
      [
        'method' => 'PUT',
        'requestUri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
        'responseCode' => 204,
      ],
      'input' =>
      [
        'shape' => 'UploadMultipartPartInput',
      ],
      'output' =>
      [
        'shape' => 'UploadMultipartPartOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MissingParameterValueException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'RequestTimeoutException',
          'error' =>
          [
            'httpStatusCode' => 408,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'ServiceUnavailableException',
          'error' =>
          [
            'httpStatusCode' => 500,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'AbortMultipartUploadInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'uploadId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'uploadId',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
        2 => 'uploadId',
      ],
    ],
    'ActionCode' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ArchiveRetrieval',
        1 => 'InventoryRetrieval',
      ],
    ],
    'ArchiveCreationOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'location' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Location',
        ],
        'checksum' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-sha256-tree-hash',
        ],
        'archiveId' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-archive-id',
        ],
      ],
    ],
    'CompleteMultipartUploadInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'uploadId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'uploadId',
        ],
        'archiveSize' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-archive-size',
        ],
        'checksum' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-sha256-tree-hash',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
        2 => 'uploadId',
      ],
    ],
    'CreateVaultInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
    ],
    'CreateVaultOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'location' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Location',
        ],
      ],
    ],
    'DateTime' =>
    [
      'type' => 'string',
    ],
    'DeleteArchiveInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'archiveId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'archiveId',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
        2 => 'archiveId',
      ],
    ],
    'DeleteVaultInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
    ],
    'DeleteVaultNotificationsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
    ],
    'DescribeJobInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'jobId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'jobId',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
        2 => 'jobId',
      ],
    ],
    'DescribeVaultInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
    ],
    'DescribeVaultOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'VaultARN' =>
        [
          'shape' => 'string',
        ],
        'VaultName' =>
        [
          'shape' => 'string',
        ],
        'CreationDate' =>
        [
          'shape' => 'string',
        ],
        'LastInventoryDate' =>
        [
          'shape' => 'string',
        ],
        'NumberOfArchives' =>
        [
          'shape' => 'long',
        ],
        'SizeInBytes' =>
        [
          'shape' => 'long',
        ],
      ],
    ],
    'GetJobOutputInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'jobId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'jobId',
        ],
        'range' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Range',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
        2 => 'jobId',
      ],
    ],
    'GetJobOutputOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'body' =>
        [
          'shape' => 'Stream',
        ],
        'checksum' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-sha256-tree-hash',
        ],
        'status' =>
        [
          'shape' => 'httpstatus',
          'location' => 'statusCode',
        ],
        'contentRange' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Content-Range',
        ],
        'acceptRanges' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Accept-Ranges',
        ],
        'contentType' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Content-Type',
        ],
        'archiveDescription' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-archive-description',
        ],
      ],
      'payload' => 'body',
    ],
    'GetVaultNotificationsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
    ],
    'GetVaultNotificationsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'vaultNotificationConfig' =>
        [
          'shape' => 'VaultNotificationConfig',
        ],
      ],
      'payload' => 'vaultNotificationConfig',
    ],
    'GlacierJobDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'JobId' =>
        [
          'shape' => 'string',
        ],
        'JobDescription' =>
        [
          'shape' => 'string',
        ],
        'Action' =>
        [
          'shape' => 'ActionCode',
        ],
        'ArchiveId' =>
        [
          'shape' => 'string',
        ],
        'VaultARN' =>
        [
          'shape' => 'string',
        ],
        'CreationDate' =>
        [
          'shape' => 'string',
        ],
        'Completed' =>
        [
          'shape' => 'boolean',
        ],
        'StatusCode' =>
        [
          'shape' => 'StatusCode',
        ],
        'StatusMessage' =>
        [
          'shape' => 'string',
        ],
        'ArchiveSizeInBytes' =>
        [
          'shape' => 'Size',
        ],
        'InventorySizeInBytes' =>
        [
          'shape' => 'Size',
        ],
        'SNSTopic' =>
        [
          'shape' => 'string',
        ],
        'CompletionDate' =>
        [
          'shape' => 'string',
        ],
        'SHA256TreeHash' =>
        [
          'shape' => 'string',
        ],
        'ArchiveSHA256TreeHash' =>
        [
          'shape' => 'string',
        ],
        'RetrievalByteRange' =>
        [
          'shape' => 'string',
        ],
        'InventoryRetrievalParameters' =>
        [
          'shape' => 'InventoryRetrievalJobDescription',
        ],
      ],
    ],
    'InitiateJobInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'jobParameters' =>
        [
          'shape' => 'JobParameters',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
      'payload' => 'jobParameters',
    ],
    'InitiateJobOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'location' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Location',
        ],
        'jobId' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-job-id',
        ],
      ],
    ],
    'InitiateMultipartUploadInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'archiveDescription' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-archive-description',
        ],
        'partSize' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-part-size',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
    ],
    'InitiateMultipartUploadOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'location' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Location',
        ],
        'uploadId' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-multipart-upload-id',
        ],
      ],
    ],
    'InvalidParameterValueException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'type' =>
        [
          'shape' => 'string',
        ],
        'code' =>
        [
          'shape' => 'string',
        ],
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InventoryRetrievalJobDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Format' =>
        [
          'shape' => 'string',
        ],
        'StartDate' =>
        [
          'shape' => 'DateTime',
        ],
        'EndDate' =>
        [
          'shape' => 'DateTime',
        ],
        'Limit' =>
        [
          'shape' => 'string',
        ],
        'Marker' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'InventoryRetrievalJobInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StartDate' =>
        [
          'shape' => 'string',
        ],
        'EndDate' =>
        [
          'shape' => 'string',
        ],
        'Limit' =>
        [
          'shape' => 'string',
        ],
        'Marker' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'JobList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'GlacierJobDescription',
      ],
    ],
    'JobParameters' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Format' =>
        [
          'shape' => 'string',
        ],
        'Type' =>
        [
          'shape' => 'string',
        ],
        'ArchiveId' =>
        [
          'shape' => 'string',
        ],
        'Description' =>
        [
          'shape' => 'string',
        ],
        'SNSTopic' =>
        [
          'shape' => 'string',
        ],
        'RetrievalByteRange' =>
        [
          'shape' => 'string',
        ],
        'InventoryRetrievalParameters' =>
        [
          'shape' => 'InventoryRetrievalJobInput',
        ],
      ],
    ],
    'LimitExceededException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'type' =>
        [
          'shape' => 'string',
        ],
        'code' =>
        [
          'shape' => 'string',
        ],
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'ListJobsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'limit' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'limit',
        ],
        'marker' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'marker',
        ],
        'statuscode' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'statuscode',
        ],
        'completed' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'completed',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
    ],
    'ListJobsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'JobList' =>
        [
          'shape' => 'JobList',
        ],
        'Marker' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'ListMultipartUploadsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'marker' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'marker',
        ],
        'limit' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'limit',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
    ],
    'ListMultipartUploadsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UploadsList' =>
        [
          'shape' => 'UploadsList',
        ],
        'Marker' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'ListPartsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'uploadId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'uploadId',
        ],
        'marker' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'marker',
        ],
        'limit' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'limit',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
        2 => 'uploadId',
      ],
    ],
    'ListPartsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MultipartUploadId' =>
        [
          'shape' => 'string',
        ],
        'VaultARN' =>
        [
          'shape' => 'string',
        ],
        'ArchiveDescription' =>
        [
          'shape' => 'string',
        ],
        'PartSizeInBytes' =>
        [
          'shape' => 'long',
        ],
        'CreationDate' =>
        [
          'shape' => 'string',
        ],
        'Parts' =>
        [
          'shape' => 'PartList',
        ],
        'Marker' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'ListVaultsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'marker' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'marker',
        ],
        'limit' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'limit',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
      ],
    ],
    'ListVaultsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'VaultList' =>
        [
          'shape' => 'VaultList',
        ],
        'Marker' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'MissingParameterValueException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'type' =>
        [
          'shape' => 'string',
        ],
        'code' =>
        [
          'shape' => 'string',
        ],
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'NotificationEventList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'string',
      ],
    ],
    'PartList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'PartListElement',
      ],
    ],
    'PartListElement' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'RangeInBytes' =>
        [
          'shape' => 'string',
        ],
        'SHA256TreeHash' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'RequestTimeoutException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'type' =>
        [
          'shape' => 'string',
        ],
        'code' =>
        [
          'shape' => 'string',
        ],
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 408,
      ],
      'exception' => true,
    ],
    'ResourceNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'type' =>
        [
          'shape' => 'string',
        ],
        'code' =>
        [
          'shape' => 'string',
        ],
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'ServiceUnavailableException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'type' =>
        [
          'shape' => 'string',
        ],
        'code' =>
        [
          'shape' => 'string',
        ],
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 500,
      ],
      'exception' => true,
    ],
    'SetVaultNotificationsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'vaultNotificationConfig' =>
        [
          'shape' => 'VaultNotificationConfig',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
      ],
      'payload' => 'vaultNotificationConfig',
    ],
    'Size' =>
    [
      'type' => 'long',
    ],
    'StatusCode' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'InProgress',
        1 => 'Succeeded',
        2 => 'Failed',
      ],
    ],
    'Stream' =>
    [
      'type' => 'blob',
      'streaming' => true,
    ],
    'UploadArchiveInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'archiveDescription' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-archive-description',
        ],
        'checksum' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-sha256-tree-hash',
        ],
        'body' =>
        [
          'shape' => 'Stream',
        ],
      ],
      'required' =>
      [
        0 => 'vaultName',
        1 => 'accountId',
      ],
      'payload' => 'body',
    ],
    'UploadListElement' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MultipartUploadId' =>
        [
          'shape' => 'string',
        ],
        'VaultARN' =>
        [
          'shape' => 'string',
        ],
        'ArchiveDescription' =>
        [
          'shape' => 'string',
        ],
        'PartSizeInBytes' =>
        [
          'shape' => 'long',
        ],
        'CreationDate' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'UploadMultipartPartInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'accountId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'accountId',
        ],
        'vaultName' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'vaultName',
        ],
        'uploadId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'uploadId',
        ],
        'checksum' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-sha256-tree-hash',
        ],
        'range' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Content-Range',
        ],
        'body' =>
        [
          'shape' => 'Stream',
        ],
      ],
      'required' =>
      [
        0 => 'accountId',
        1 => 'vaultName',
        2 => 'uploadId',
      ],
      'payload' => 'body',
    ],
    'UploadMultipartPartOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'checksum' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'x-amz-sha256-tree-hash',
        ],
      ],
    ],
    'UploadsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'UploadListElement',
      ],
    ],
    'VaultList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DescribeVaultOutput',
      ],
    ],
    'VaultNotificationConfig' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SNSTopic' =>
        [
          'shape' => 'string',
        ],
        'Events' =>
        [
          'shape' => 'NotificationEventList',
        ],
      ],
    ],
    'boolean' =>
    [
      'type' => 'boolean',
    ],
    'httpstatus' =>
    [
      'type' => 'integer',
    ],
    'long' =>
    [
      'type' => 'long',
    ],
    'string' =>
    [
      'type' => 'string',
    ],
  ],
];