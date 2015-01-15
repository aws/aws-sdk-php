<?php return [
  'operations' => [
    'DeleteDataset' => 'Deletes the specific dataset. The dataset will be deleted permanently, and the action can\'t be undone. Datasets that this dataset was merged with will no longer report the merge. Any consequent operation on this dataset will result in a ResourceNotFoundException.',
    'DescribeDataset' => 'Gets metadata about a dataset by identity and dataset name. The credentials used to make this API call need to have access to the identity data. With Amazon Cognito Sync, each identity has access only to its own data. You should use Amazon Cognito Identity service to retrieve the credentials necessary to make this API call.',
    'DescribeIdentityPoolUsage' => 'Gets usage details (for example, data storage] about a particular identity pool.',
    'DescribeIdentityUsage' => 'Gets usage information for an identity, including number of datasets and data usage.',
    'GetIdentityPoolConfiguration' => '<p>Gets the configuration settings of an identity pool.</p>',
    'ListDatasets' => 'Lists datasets for an identity. The credentials used to make this API call need to have access to the identity data. With Amazon Cognito Sync, each identity has access only to its own data. You should use Amazon Cognito Identity service to retrieve the credentials necessary to make this API call.',
    'ListIdentityPoolUsage' => 'Gets a list of identity pools registered with Cognito.',
    'ListRecords' => 'Gets paginated records, optionally changed after a particular sync count for a dataset and identity. The credentials used to make this API call need to have access to the identity data. With Amazon Cognito Sync, each identity has access only to its own data. You should use Amazon Cognito Identity service to retrieve the credentials necessary to make this API call.',
    'RegisterDevice' => '<p>Registers a device to receive push sync notifications.</p>',
    'SetIdentityPoolConfiguration' => '<p>Sets the necessary configuration for push sync.</p>',
    'SubscribeToDataset' => '<p>Subscribes to receive notifications when a dataset is modified by another device.</p>',
    'UnsubscribeFromDataset' => '<p>Unsubscribe from receiving notifications when a dataset is modified by another device.</p>',
    'UpdateRecords' => 'Posts updates to records and add and delete records for a dataset and user. The credentials used to make this API call need to have access to the identity data. With Amazon Cognito Sync, each identity has access only to its own data. You should use Amazon Cognito Identity service to retrieve the credentials necessary to make this API call.',
  ],
  'service' => '<fullname>Amazon Cognito Sync</fullname> <p>Amazon Cognito Sync provides an AWS service and client library that enable cross-device syncing of application-related user data. High-level client libraries are available for both iOS and Android. You can use these libraries to persist data locally so that it\'s available even if the device is offline. Developer credentials don\'t need to be stored on the mobile device to access the service. You can use Amazon Cognito to obtain a normalized user ID and credentials. User data is persisted in a dataset that can store up to 1 MB of key-value pairs, and you can have up to 20 datasets per user identity.</p> <p>With Amazon Cognito Sync, the data stored for each identity is accessible only to credentials assigned to that identity. In order to use the Cognito Sync service, you need to make API calls using credentials retrieved with <a href="http://docs.aws.amazon.com/cognitoidentity/latest/APIReference/Welcome.html">Amazon Cognito Identity service</a>.</p>',
  'shapes' => [
    'ApplicationArn' => [
      'base' => NULL,
      'refs' => [
        'ApplicationArnList$member' => NULL,
      ],
    ],
    'ApplicationArnList' => [
      'base' => NULL,
      'refs' => [
        'PushSync$ApplicationArns' => '<p>List of SNS platform application ARNs that could be used by clients.</p>',
      ],
    ],
    'AssumeRoleArn' => [
      'base' => NULL,
      'refs' => [
        'PushSync$RoleArn' => '<p>A role configured to allow Cognito to call SNS on behalf of the developer.</p>',
      ],
    ],
    'Boolean' => [
      'base' => NULL,
      'refs' => [
        'ListRecordsResponse$DatasetExists' => 'Indicates whether the dataset exists.',
        'ListRecordsResponse$DatasetDeletedAfterRequestedSyncCount' => 'A boolean value specifying whether to delete the dataset locally.',
      ],
    ],
    'ClientContext' => [
      'base' => NULL,
      'refs' => [
        'UpdateRecordsRequest$ClientContext' => 'Intended to supply a device ID that will populate the <code>lastModifiedBy</code> field referenced in other methods. The <code>ClientContext</code> field is not yet implemented.',
      ],
    ],
    'Dataset' => [
      'base' => 'A collection of data for an identity pool. An identity pool can have multiple datasets. A dataset is per identity and can be general or associated with a particular entity in an application (like a saved game]. Datasets are automatically created if they don\'t exist. Data is synced by dataset, and a dataset can hold up to 1MB of key-value pairs.',
      'refs' => [
        'DatasetList$member' => NULL,
        'DeleteDatasetResponse$Dataset' => 'A collection of data for an identity pool. An identity pool can have multiple datasets. A dataset is per identity and can be general or associated with a particular entity in an application (like a saved game]. Datasets are automatically created if they don\'t exist. Data is synced by dataset, and a dataset can hold up to 1MB of key-value pairs.',
        'DescribeDatasetResponse$Dataset' => 'Metadata for a collection of data for an identity. An identity can have multiple datasets. A dataset can be general or associated with a particular entity in an application (like a saved game]. Datasets are automatically created if they don\'t exist. Data is synced by dataset, and a dataset can hold up to 1MB of key-value pairs.',
      ],
    ],
    'DatasetList' => [
      'base' => NULL,
      'refs' => [
        'ListDatasetsResponse$Datasets' => 'A set of datasets.',
      ],
    ],
    'DatasetName' => [
      'base' => NULL,
      'refs' => [
        'Dataset$DatasetName' => 'A string of up to 128 characters. Allowed characters are a-z, A-Z, 0-9, \'_\' (underscore], \'-\' (dash], and \'.\' (dot].',
        'DeleteDatasetRequest$DatasetName' => 'A string of up to 128 characters. Allowed characters are a-z, A-Z, 0-9, \'_\' (underscore], \'-\' (dash], and \'.\' (dot].',
        'DescribeDatasetRequest$DatasetName' => 'A string of up to 128 characters. Allowed characters are a-z, A-Z, 0-9, \'_\' (underscore], \'-\' (dash], and \'.\' (dot].',
        'ListRecordsRequest$DatasetName' => 'A string of up to 128 characters. Allowed characters are a-z, A-Z, 0-9, \'_\' (underscore], \'-\' (dash], and \'.\' (dot].',
        'SubscribeToDatasetRequest$DatasetName' => '<p>The name of the dataset to subcribe to.</p>',
        'UnsubscribeFromDatasetRequest$DatasetName' => '<p>The name of the dataset from which to unsubcribe.</p>',
        'UpdateRecordsRequest$DatasetName' => 'A string of up to 128 characters. Allowed characters are a-z, A-Z, 0-9, \'_\' (underscore], \'-\' (dash], and \'.\' (dot].',
      ],
    ],
    'Date' => [
      'base' => NULL,
      'refs' => [
        'Dataset$CreationDate' => 'Date on which the dataset was created.',
        'Dataset$LastModifiedDate' => 'Date when the dataset was last modified.',
        'IdentityPoolUsage$LastModifiedDate' => 'Date on which the identity pool was last modified.',
        'IdentityUsage$LastModifiedDate' => 'Date on which the identity was last modified.',
        'Record$LastModifiedDate' => 'The date on which the record was last modified.',
        'Record$DeviceLastModifiedDate' => 'The last modified date of the client device.',
        'RecordPatch$DeviceLastModifiedDate' => 'The last modified date of the client device.',
      ],
    ],
    'DeleteDatasetRequest' => [
      'base' => 'A request to delete the specific dataset.',
      'refs' => [],
    ],
    'DeleteDatasetResponse' => [
      'base' => 'Response to a successful DeleteDataset request.',
      'refs' => [],
    ],
    'DescribeDatasetRequest' => [
      'base' => 'A request for metadata about a dataset (creation date, number of records, size] by owner and dataset name.',
      'refs' => [],
    ],
    'DescribeDatasetResponse' => [
      'base' => 'Response to a successful DescribeDataset request.',
      'refs' => [],
    ],
    'DescribeIdentityPoolUsageRequest' => [
      'base' => 'A request for usage information about the identity pool.',
      'refs' => [],
    ],
    'DescribeIdentityPoolUsageResponse' => [
      'base' => 'Response to a successful DescribeIdentityPoolUsage request.',
      'refs' => [],
    ],
    'DescribeIdentityUsageRequest' => [
      'base' => 'A request for information about the usage of an identity pool.',
      'refs' => [],
    ],
    'DescribeIdentityUsageResponse' => [
      'base' => 'The response to a successful DescribeIdentityUsage request.',
      'refs' => [],
    ],
    'DeviceId' => [
      'base' => NULL,
      'refs' => [
        'RegisterDeviceResponse$DeviceId' => '<p>The unique ID generated for this device by Cognito.</p>',
        'SubscribeToDatasetRequest$DeviceId' => '<p>The unique ID generated for this device by Cognito.</p>',
        'UnsubscribeFromDatasetRequest$DeviceId' => '<p>The unique ID generated for this device by Cognito.</p>',
        'UpdateRecordsRequest$DeviceId' => '<p>The unique ID generated for this device by Cognito.</p>',
      ],
    ],
    'ExceptionMessage' => [
      'base' => NULL,
      'refs' => [
        'InternalErrorException$message' => 'Message returned by InternalErrorException.',
        'InvalidConfigurationException$message' => NULL,
        'InvalidParameterException$message' => 'Message returned by InvalidParameterException.',
        'LimitExceededException$message' => 'Message returned by LimitExceededException.',
        'NotAuthorizedException$message' => 'The message returned by a NotAuthorizedException.',
        'ResourceConflictException$message' => 'The message returned by a ResourceConflictException.',
        'ResourceNotFoundException$message' => 'Message returned by a ResourceNotFoundException.',
        'TooManyRequestsException$message' => 'Message returned by a TooManyRequestsException.',
      ],
    ],
    'GetIdentityPoolConfigurationRequest' => [
      'base' => '<p>A request to <code>GetIdentityPoolConfigurationRequest</code>.</p>',
      'refs' => [],
    ],
    'GetIdentityPoolConfigurationResponse' => [
      'base' => '<p>The response from <code>GetIdentityPoolConfigurationResponse</code>.</p>',
      'refs' => [],
    ],
    'IdentityId' => [
      'base' => NULL,
      'refs' => [
        'Dataset$IdentityId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'DeleteDatasetRequest$IdentityId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'DescribeDatasetRequest$IdentityId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'DescribeIdentityUsageRequest$IdentityId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'IdentityUsage$IdentityId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'ListDatasetsRequest$IdentityId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'ListRecordsRequest$IdentityId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'RegisterDeviceRequest$IdentityId' => '<p>The unique ID for this identity.</p>',
        'SubscribeToDatasetRequest$IdentityId' => '<p>Unique ID for this identity.</p>',
        'UnsubscribeFromDatasetRequest$IdentityId' => '<p>Unique ID for this identity.</p>',
        'UpdateRecordsRequest$IdentityId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
      ],
    ],
    'IdentityPoolId' => [
      'base' => NULL,
      'refs' => [
        'DeleteDatasetRequest$IdentityPoolId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'DescribeDatasetRequest$IdentityPoolId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'DescribeIdentityPoolUsageRequest$IdentityPoolId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'DescribeIdentityUsageRequest$IdentityPoolId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'GetIdentityPoolConfigurationRequest$IdentityPoolId' => '<p>A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. This is the ID of the pool for which to return a configuration.</p>',
        'GetIdentityPoolConfigurationResponse$IdentityPoolId' => '<p>A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito.</p>',
        'IdentityPoolUsage$IdentityPoolId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'IdentityUsage$IdentityPoolId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'ListDatasetsRequest$IdentityPoolId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'ListRecordsRequest$IdentityPoolId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
        'RegisterDeviceRequest$IdentityPoolId' => '<p>A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. Here, the ID of the pool that the identity belongs to.</p>',
        'SetIdentityPoolConfigurationRequest$IdentityPoolId' => '<p>A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. This is the ID of the pool to modify.</p>',
        'SetIdentityPoolConfigurationResponse$IdentityPoolId' => '<p>A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito.</p>',
        'SubscribeToDatasetRequest$IdentityPoolId' => '<p>A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. The ID of the pool to which the identity belongs.</p>',
        'UnsubscribeFromDatasetRequest$IdentityPoolId' => '<p>A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. The ID of the pool to which this identity belongs.</p>',
        'UpdateRecordsRequest$IdentityPoolId' => 'A name-spaced GUID (for example, us-east-1:23EC4050-6AEA-7089-A2DD-08002EXAMPLE] created by Amazon Cognito. GUID generation is unique within a region.',
      ],
    ],
    'IdentityPoolUsage' => [
      'base' => 'Usage information for the identity pool.',
      'refs' => [
        'DescribeIdentityPoolUsageResponse$IdentityPoolUsage' => 'Information about the usage of the identity pool.',
        'IdentityPoolUsageList$member' => NULL,
      ],
    ],
    'IdentityPoolUsageList' => [
      'base' => NULL,
      'refs' => [
        'ListIdentityPoolUsageResponse$IdentityPoolUsages' => 'Usage information for the identity pools.',
      ],
    ],
    'IdentityUsage' => [
      'base' => 'Usage information for the identity.',
      'refs' => [
        'DescribeIdentityUsageResponse$IdentityUsage' => 'Usage information for the identity.',
      ],
    ],
    'Integer' => [
      'base' => NULL,
      'refs' => [
        'IdentityUsage$DatasetCount' => 'Number of datasets for the identity.',
        'ListDatasetsResponse$Count' => 'Number of datasets returned.',
        'ListIdentityPoolUsageResponse$MaxResults' => 'The maximum number of results to be returned.',
        'ListIdentityPoolUsageResponse$Count' => 'Total number of identities for the identity pool.',
        'ListRecordsResponse$Count' => 'Total number of records.',
      ],
    ],
    'IntegerString' => [
      'base' => NULL,
      'refs' => [
        'ListDatasetsRequest$MaxResults' => 'The maximum number of results to be returned.',
        'ListIdentityPoolUsageRequest$MaxResults' => 'The maximum number of results to be returned.',
        'ListRecordsRequest$MaxResults' => 'The maximum number of results to be returned.',
      ],
    ],
    'InternalErrorException' => [
      'base' => 'Indicates an internal service error.',
      'refs' => [],
    ],
    'InvalidConfigurationException' => [
      'base' => NULL,
      'refs' => [],
    ],
    'InvalidParameterException' => [
      'base' => 'Thrown when a request parameter does not comply with the associated constraints.',
      'refs' => [],
    ],
    'LimitExceededException' => [
      'base' => 'Thrown when the limit on the number of objects or operations has been exceeded.',
      'refs' => [],
    ],
    'ListDatasetsRequest' => [
      'base' => 'Request for a list of datasets for an identity.',
      'refs' => [],
    ],
    'ListDatasetsResponse' => [
      'base' => 'Returned for a successful ListDatasets request.',
      'refs' => [],
    ],
    'ListIdentityPoolUsageRequest' => [
      'base' => 'A request for usage information on an identity pool.',
      'refs' => [],
    ],
    'ListIdentityPoolUsageResponse' => [
      'base' => 'Returned for a successful ListIdentityPoolUsage request.',
      'refs' => [],
    ],
    'ListRecordsRequest' => [
      'base' => 'A request for a list of records.',
      'refs' => [],
    ],
    'ListRecordsResponse' => [
      'base' => 'Returned for a successful ListRecordsRequest.',
      'refs' => [],
    ],
    'Long' => [
      'base' => NULL,
      'refs' => [
        'Dataset$DataStorage' => 'Total size in bytes of the records in this dataset.',
        'Dataset$NumRecords' => 'Number of records in this dataset.',
        'IdentityPoolUsage$SyncSessionsCount' => 'Number of sync sessions for the identity pool.',
        'IdentityPoolUsage$DataStorage' => 'Data storage information for the identity pool.',
        'IdentityUsage$DataStorage' => 'Total data storage for this identity.',
        'ListRecordsRequest$LastSyncCount' => 'The last server sync count for this record.',
        'ListRecordsResponse$DatasetSyncCount' => 'Server sync count for this dataset.',
        'Record$SyncCount' => 'The server sync count for this record.',
        'RecordPatch$SyncCount' => 'Last known server sync count for this record. Set to 0 if unknown.',
      ],
    ],
    'MergedDatasetNameList' => [
      'base' => NULL,
      'refs' => [
        'ListRecordsResponse$MergedDatasetNames' => 'Names of merged datasets.',
      ],
    ],
    'NotAuthorizedException' => [
      'base' => 'Thrown when a user is not authorized to access the requested resource.',
      'refs' => [],
    ],
    'Operation' => [
      'base' => NULL,
      'refs' => [
        'RecordPatch$Op' => 'An operation, either replace or remove.',
      ],
    ],
    'Platform' => [
      'base' => NULL,
      'refs' => [
        'RegisterDeviceRequest$Platform' => '<p>The SNS platform type (e.g. GCM, SDM, APNS, APNS_SANDBOX].</p>',
      ],
    ],
    'PushSync' => [
      'base' => '<p>Configuration options to be applied to the identity pool.</p>',
      'refs' => [
        'GetIdentityPoolConfigurationResponse$PushSync' => '<p>Configuration options applied to the identity pool.</p>',
        'SetIdentityPoolConfigurationRequest$PushSync' => '<p>Configuration options to be applied to the identity pool.</p>',
        'SetIdentityPoolConfigurationResponse$PushSync' => '<p>Configuration options applied to the identity pool.</p>',
      ],
    ],
    'PushToken' => [
      'base' => NULL,
      'refs' => [
        'RegisterDeviceRequest$Token' => '<p>The push token.</p>',
      ],
    ],
    'Record' => [
      'base' => 'The basic data structure of a dataset.',
      'refs' => [
        'RecordList$member' => NULL,
      ],
    ],
    'RecordKey' => [
      'base' => NULL,
      'refs' => [
        'Record$Key' => 'The key for the record.',
        'RecordPatch$Key' => 'The key associated with the record patch.',
      ],
    ],
    'RecordList' => [
      'base' => NULL,
      'refs' => [
        'ListRecordsResponse$Records' => 'A list of all records.',
        'UpdateRecordsResponse$Records' => 'A list of records that have been updated.',
      ],
    ],
    'RecordPatch' => [
      'base' => 'An update operation for a record.',
      'refs' => [
        'RecordPatchList$member' => NULL,
      ],
    ],
    'RecordPatchList' => [
      'base' => NULL,
      'refs' => [
        'UpdateRecordsRequest$RecordPatches' => 'A list of patch operations.',
      ],
    ],
    'RecordValue' => [
      'base' => NULL,
      'refs' => [
        'Record$Value' => 'The value for the record.',
        'RecordPatch$Value' => 'The value associated with the record patch.',
      ],
    ],
    'RegisterDeviceRequest' => [
      'base' => '<p>A request to <code>RegisterDevice</code>.</p>',
      'refs' => [],
    ],
    'RegisterDeviceResponse' => [
      'base' => '<p>Response to a <code>RegisterDevice</code> request.</p>',
      'refs' => [],
    ],
    'ResourceConflictException' => [
      'base' => 'Thrown if an update can\'t be applied because the resource was changed by another call and this would result in a conflict.',
      'refs' => [],
    ],
    'ResourceNotFoundException' => [
      'base' => 'Thrown if the resource doesn\'t exist.',
      'refs' => [],
    ],
    'SetIdentityPoolConfigurationRequest' => [
      'base' => '<p>A request to <code>SetIdentityPoolConfiguration</code>.</p>',
      'refs' => [],
    ],
    'SetIdentityPoolConfigurationResponse' => [
      'base' => '<p>Response to a <code>SetIdentityPoolConfiguration</code> request.</p>',
      'refs' => [],
    ],
    'String' => [
      'base' => NULL,
      'refs' => [
        'Dataset$LastModifiedBy' => 'The device that made the last change to this dataset.',
        'ListDatasetsRequest$NextToken' => 'A pagination token for obtaining the next page of results.',
        'ListDatasetsResponse$NextToken' => 'A pagination token for obtaining the next page of results.',
        'ListIdentityPoolUsageRequest$NextToken' => 'A pagination token for obtaining the next page of results.',
        'ListIdentityPoolUsageResponse$NextToken' => 'A pagination token for obtaining the next page of results.',
        'ListRecordsRequest$NextToken' => 'A pagination token for obtaining the next page of results.',
        'ListRecordsResponse$NextToken' => 'A pagination token for obtaining the next page of results.',
        'ListRecordsResponse$LastModifiedBy' => 'The user/device that made the last change to this record.',
        'ListRecordsResponse$SyncSessionToken' => 'A token containing a session ID, identity ID, and expiration.',
        'MergedDatasetNameList$member' => NULL,
        'Record$LastModifiedBy' => 'The user/device that made the last change to this record.',
      ],
    ],
    'SubscribeToDatasetRequest' => [
      'base' => '<p>A request to <code>SubscribeToDatasetRequest</code>.</p>',
      'refs' => [],
    ],
    'SubscribeToDatasetResponse' => [
      'base' => '<p>Response to a <code>SubscribeToDataset</code> request.</p>',
      'refs' => [],
    ],
    'SyncSessionToken' => [
      'base' => NULL,
      'refs' => [
        'ListRecordsRequest$SyncSessionToken' => 'A token containing a session ID, identity ID, and expiration.',
        'UpdateRecordsRequest$SyncSessionToken' => 'The SyncSessionToken returned by a previous call to ListRecords for this dataset and identity.',
      ],
    ],
    'TooManyRequestsException' => [
      'base' => 'Thrown if the request is throttled.',
      'refs' => [],
    ],
    'UnsubscribeFromDatasetRequest' => [
      'base' => '<p>A request to <code>UnsubscribeFromDataset</code>.</p>',
      'refs' => [],
    ],
    'UnsubscribeFromDatasetResponse' => [
      'base' => '<p>Response to an <code>UnsubscribeFromDataset</code> request.</p>',
      'refs' => [],
    ],
    'UpdateRecordsRequest' => [
      'base' => 'A request to post updates to records or add and delete records for a dataset and user.',
      'refs' => [],
    ],
    'UpdateRecordsResponse' => [
      'base' => 'Returned for a successful UpdateRecordsRequest.',
      'refs' => [],
    ],
  ],
];
