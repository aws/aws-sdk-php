<?php
namespace Aws\CognitoSync;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Cognito Sync** service.
 *
 * @method \Aws\Result bulkPublish(array $args = [])
 * @phpstan-method \Aws\Result bulkPublish(array{IdentityPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise bulkPublishAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise bulkPublishAsync(array{IdentityPoolId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataset(array{IdentityPoolId?: string, IdentityId?: string, DatasetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array{IdentityPoolId?: string, IdentityId?: string, DatasetName?: string, ...} $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @phpstan-method \Aws\Result describeDataset(array{IdentityPoolId?: string, IdentityId?: string, DatasetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetAsync(array{IdentityPoolId?: string, IdentityId?: string, DatasetName?: string, ...} $args = [])
 * @method \Aws\Result describeIdentityPoolUsage(array $args = [])
 * @phpstan-method \Aws\Result describeIdentityPoolUsage(array{IdentityPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIdentityPoolUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIdentityPoolUsageAsync(array{IdentityPoolId?: string, ...} $args = [])
 * @method \Aws\Result describeIdentityUsage(array $args = [])
 * @phpstan-method \Aws\Result describeIdentityUsage(array{IdentityPoolId?: string, IdentityId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIdentityUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIdentityUsageAsync(array{IdentityPoolId?: string, IdentityId?: string, ...} $args = [])
 * @method \Aws\Result getBulkPublishDetails(array $args = [])
 * @phpstan-method \Aws\Result getBulkPublishDetails(array{IdentityPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBulkPublishDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBulkPublishDetailsAsync(array{IdentityPoolId?: string, ...} $args = [])
 * @method \Aws\Result getCognitoEvents(array $args = [])
 * @phpstan-method \Aws\Result getCognitoEvents(array{IdentityPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCognitoEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCognitoEventsAsync(array{IdentityPoolId?: string, ...} $args = [])
 * @method \Aws\Result getIdentityPoolConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getIdentityPoolConfiguration(array{IdentityPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityPoolConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityPoolConfigurationAsync(array{IdentityPoolId?: string, ...} $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDatasets(array{IdentityPoolId?: string, IdentityId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetsAsync(array{IdentityPoolId?: string, IdentityId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listIdentityPoolUsage(array $args = [])
 * @phpstan-method \Aws\Result listIdentityPoolUsage(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentityPoolUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentityPoolUsageAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRecords(array $args = [])
 * @phpstan-method \Aws\Result listRecords(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     DatasetName?: string,
 *     LastSyncCount?: int,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SyncSessionToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecordsAsync(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     DatasetName?: string,
 *     LastSyncCount?: int,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SyncSessionToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerDevice(array $args = [])
 * @phpstan-method \Aws\Result registerDevice(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     Platform?: 'ADM'|'APNS'|'APNS_SANDBOX'|'GCM',
 *     Token?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerDeviceAsync(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     Platform?: 'ADM'|'APNS'|'APNS_SANDBOX'|'GCM',
 *     Token?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setCognitoEvents(array $args = [])
 * @phpstan-method \Aws\Result setCognitoEvents(array{IdentityPoolId?: string, Events?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setCognitoEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setCognitoEventsAsync(array{IdentityPoolId?: string, Events?: array<string, string>, ...} $args = [])
 * @method \Aws\Result setIdentityPoolConfiguration(array $args = [])
 * @phpstan-method \Aws\Result setIdentityPoolConfiguration(array{
 *     IdentityPoolId?: string,
 *     PushSync?: array{ApplicationArns?: list<string>, RoleArn?: string, ...},
 *     CognitoStreams?: array{StreamName?: string, RoleArn?: string, StreamingStatus?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setIdentityPoolConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setIdentityPoolConfigurationAsync(array{
 *     IdentityPoolId?: string,
 *     PushSync?: array{ApplicationArns?: list<string>, RoleArn?: string, ...},
 *     CognitoStreams?: array{StreamName?: string, RoleArn?: string, StreamingStatus?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result subscribeToDataset(array $args = [])
 * @phpstan-method \Aws\Result subscribeToDataset(array{IdentityPoolId?: string, IdentityId?: string, DatasetName?: string, DeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise subscribeToDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise subscribeToDatasetAsync(array{IdentityPoolId?: string, IdentityId?: string, DatasetName?: string, DeviceId?: string, ...} $args = [])
 * @method \Aws\Result unsubscribeFromDataset(array $args = [])
 * @phpstan-method \Aws\Result unsubscribeFromDataset(array{IdentityPoolId?: string, IdentityId?: string, DatasetName?: string, DeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unsubscribeFromDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unsubscribeFromDatasetAsync(array{IdentityPoolId?: string, IdentityId?: string, DatasetName?: string, DeviceId?: string, ...} $args = [])
 * @method \Aws\Result updateRecords(array $args = [])
 * @phpstan-method \Aws\Result updateRecords(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     DatasetName?: string,
 *     DeviceId?: string,
 *     RecordPatches?: list<array{
 *         Op?: 'remove'|'replace',
 *         Key?: string,
 *         Value?: string,
 *         SyncCount?: int,
 *         DeviceLastModifiedDate?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     SyncSessionToken?: string,
 *     ClientContext?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecordsAsync(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     DatasetName?: string,
 *     DeviceId?: string,
 *     RecordPatches?: list<array{
 *         Op?: 'remove'|'replace',
 *         Key?: string,
 *         Value?: string,
 *         SyncCount?: int,
 *         DeviceLastModifiedDate?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     SyncSessionToken?: string,
 *     ClientContext?: string,
 *     ...,
 * } $args = [])
 */
class CognitoSyncClient extends AwsClient {}
