<?php
return array (
    'name' => 'glacier',
    'apiVersion' => '2012-06-01',
    'operations' => array(
        'AbortMultipartUpload' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'uploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'responseClass' => 'Guzzle\\Http\\Message\\Response',
            'responseNotes' => 'Returns a Guzzle HTTP response object',
            'responseType' => 'class',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
        ),
        'CompleteMultipartUpload' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'POST',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'uploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'archiveSize' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'rename' => 'x-amz-archive-size',
                ),
                'checksum' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'rename' => 'x-amz-sha256-tree-hash',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
        ),
        'CreateVault' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
            ),
            'httpMethod' => 'PUT',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}',
        ),
        'DeleteArchive' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'archiveId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'responseClass' => 'Guzzle\\Http\\Message\\Response',
            'responseNotes' => 'Returns a Guzzle HTTP response object',
            'responseType' => 'class',
            'uri' => '/{accountId}/vaults/{vaultName}/archives/{archiveId}',
        ),
        'DeleteVault' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'responseClass' => 'Guzzle\\Http\\Message\\Response',
            'responseNotes' => 'Returns a Guzzle HTTP response object',
            'responseType' => 'class',
            'uri' => '/{accountId}/vaults/{vaultName}',
        ),
        'DeleteVaultNotifications' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'responseClass' => 'Guzzle\\Http\\Message\\Response',
            'responseNotes' => 'Returns a Guzzle HTTP response object',
            'responseType' => 'class',
            'uri' => '/{accountId}/vaults/{vaultName}/notification-configuration',
        ),
        'DescribeJob' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'GET',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/jobs/{jobId}',
        ),
        'DescribeVault' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'GET',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}',
        ),
        'GetJobOutput' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'GET',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'range' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'rename' => 'Range',
                ),
            ),
            'responseClass' => 'Guzzle\\Http\\Message\\Response',
            'responseNotes' => 'Returns a Guzzle HTTP response object',
            'responseType' => 'class',
            'uri' => '/{accountId}/vaults/{vaultName}/jobs/{jobId}/output',
        ),
        'GetVaultNotifications' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'GET',
            'parameters' => array(
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/notification-configuration',
        ),
        'InitiateJob' => array(
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'POST',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Format' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Type' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ArchiveId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SNSTopic' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/jobs',
        ),
        'InitiateMultipartUpload' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'POST',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'archiveDescription' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'rename' => 'x-amz-archive-description',
                ),
                'partSize' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'rename' => 'x-amz-part-size',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads',
        ),
        'ListJobs' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'GET',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'limit' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'statuscode' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'completed' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/jobs',
        ),
        'ListMultipartUploads' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'GET',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'uploadIdMarker' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'limit' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads',
        ),
        'ListParts' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'GET',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'uploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'limit' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
        ),
        'ListVaults' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'GET',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'limit' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults',
        ),
        'SetVaultNotifications' => array(
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'PUT',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SNSTopic' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Events' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'type' => 'string',
                    ),
                ),
            ),
            'responseClass' => 'Guzzle\\Http\\Message\\Response',
            'responseNotes' => 'Returns a Guzzle HTTP response object',
            'responseType' => 'class',
            'uri' => '/{accountId}/vaults/{vaultName}/notification-configuration',
        ),
        'UploadArchive' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'RequestTimeoutException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'POST',
            'parameters' => array(
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'archiveDescription' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'rename' => 'x-amz-archive-description',
                ),
                'checksum' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'rename' => 'x-amz-sha256-tree-hash',
                ),
                'body' => array(
                    'type' => 'string',
                    'location' => 'body',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/archives',
        ),
        'UploadMultipartPart' => array(
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'class' => 'RequestTimeoutException',
                ),
                array(
                    'class' => 'ServiceUnavailableException',
                ),
            ),
            'httpMethod' => 'PUT',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'uploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'checksum' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'rename' => 'x-amz-sha256-tree-hash',
                ),
                'range' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'rename' => 'Content-Range',
                ),
                'body' => array(
                    'type' => 'string',
                    'location' => 'body',
                ),
            ),
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
        ),
    ),
);
