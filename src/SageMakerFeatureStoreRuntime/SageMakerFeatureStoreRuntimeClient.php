<?php
namespace Aws\SageMakerFeatureStoreRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Feature Store Runtime** service.
 * @method \Aws\Result batchGetRecord(array $args = [])
 * @phpstan-method \Aws\Result batchGetRecord(array{
 *     Identifiers?: list<array{
 *         FeatureGroupName?: string,
 *         RecordIdentifiersValueAsString?: list<string>,
 *         FeatureNames?: list<string>,
 *         ...,
 *     }>,
 *     ExpirationTimeResponse?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetRecordAsync(array{
 *     Identifiers?: list<array{
 *         FeatureGroupName?: string,
 *         RecordIdentifiersValueAsString?: list<string>,
 *         FeatureNames?: list<string>,
 *         ...,
 *     }>,
 *     ExpirationTimeResponse?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchWriteRecord(array $args = [])
 * @phpstan-method \Aws\Result batchWriteRecord(array{
 *     Entries?: list<array{
 *         FeatureGroupName?: string,
 *         Record?: list<array>,
 *         TargetStores?: list<'OfflineStore'|'OnlineStore'>,
 *         TtlDuration?: array,
 *         ...,
 *     }>,
 *     TtlDuration?: array{Unit?: 'Days'|'Hours'|'Minutes'|'Seconds'|'Weeks', Value?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchWriteRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchWriteRecordAsync(array{
 *     Entries?: list<array{
 *         FeatureGroupName?: string,
 *         Record?: list<array>,
 *         TargetStores?: list<'OfflineStore'|'OnlineStore'>,
 *         TtlDuration?: array,
 *         ...,
 *     }>,
 *     TtlDuration?: array{Unit?: 'Days'|'Hours'|'Minutes'|'Seconds'|'Weeks', Value?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteRecord(array $args = [])
 * @phpstan-method \Aws\Result deleteRecord(array{
 *     FeatureGroupName?: string,
 *     RecordIdentifierValueAsString?: string,
 *     EventTime?: string,
 *     TargetStores?: list<'OfflineStore'|'OnlineStore'>,
 *     DeletionMode?: 'HardDelete'|'SoftDelete',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecordAsync(array{
 *     FeatureGroupName?: string,
 *     RecordIdentifierValueAsString?: string,
 *     EventTime?: string,
 *     TargetStores?: list<'OfflineStore'|'OnlineStore'>,
 *     DeletionMode?: 'HardDelete'|'SoftDelete',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRecord(array $args = [])
 * @phpstan-method \Aws\Result getRecord(array{
 *     FeatureGroupName?: string,
 *     RecordIdentifierValueAsString?: string,
 *     FeatureNames?: list<string>,
 *     ExpirationTimeResponse?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecordAsync(array{
 *     FeatureGroupName?: string,
 *     RecordIdentifierValueAsString?: string,
 *     FeatureNames?: list<string>,
 *     ExpirationTimeResponse?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecords(array $args = [])
 * @phpstan-method \Aws\Result listRecords(array{FeatureGroupName?: string, MaxResults?: int, NextToken?: string, IncludeSoftDeletedRecords?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecordsAsync(array{FeatureGroupName?: string, MaxResults?: int, NextToken?: string, IncludeSoftDeletedRecords?: bool, ...} $args = [])
 * @method \Aws\Result putRecord(array $args = [])
 * @phpstan-method \Aws\Result putRecord(array{
 *     FeatureGroupName?: string,
 *     Record?: list<array{FeatureName?: string, ValueAsString?: string, ValueAsStringList?: list<string>, ...}>,
 *     TargetStores?: list<'OfflineStore'|'OnlineStore'>,
 *     TtlDuration?: array{Unit?: 'Days'|'Hours'|'Minutes'|'Seconds'|'Weeks', Value?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRecordAsync(array{
 *     FeatureGroupName?: string,
 *     Record?: list<array{FeatureName?: string, ValueAsString?: string, ValueAsStringList?: list<string>, ...}>,
 *     TargetStores?: list<'OfflineStore'|'OnlineStore'>,
 *     TtlDuration?: array{Unit?: 'Days'|'Hours'|'Minutes'|'Seconds'|'Weeks', Value?: int, ...},
 *     ...,
 * } $args = [])
 */
class SageMakerFeatureStoreRuntimeClient extends AwsClient {}
