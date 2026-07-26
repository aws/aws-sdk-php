<?php
namespace Aws\Kinesis;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis** service.
 *
 * @method \Aws\Result addTagsToStream(array $args = [])
 * @phpstan-method \Aws\Result addTagsToStream(array{StreamName?: string, Tags?: array<string, string>, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToStreamAsync(array{StreamName?: string, Tags?: array<string, string>, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result createStream(array $args = [])
 * @phpstan-method \Aws\Result createStream(array{
 *     StreamName?: string,
 *     ShardCount?: int,
 *     StreamModeDetails?: array{StreamMode?: 'ON_DEMAND'|'PROVISIONED', ...},
 *     Tags?: array<string, string>,
 *     WarmThroughputMiBps?: int,
 *     MaxRecordSizeInKiB?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamAsync(array{
 *     StreamName?: string,
 *     ShardCount?: int,
 *     StreamModeDetails?: array{StreamMode?: 'ON_DEMAND'|'PROVISIONED', ...},
 *     Tags?: array<string, string>,
 *     WarmThroughputMiBps?: int,
 *     MaxRecordSizeInKiB?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result decreaseStreamRetentionPeriod(array $args = [])
 * @phpstan-method \Aws\Result decreaseStreamRetentionPeriod(array{StreamName?: string, RetentionPeriodHours?: int, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise decreaseStreamRetentionPeriodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise decreaseStreamRetentionPeriodAsync(array{StreamName?: string, RetentionPeriodHours?: int, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result deleteStream(array $args = [])
 * @phpstan-method \Aws\Result deleteStream(array{StreamName?: string, EnforceConsumerDeletion?: bool, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStreamAsync(array{StreamName?: string, EnforceConsumerDeletion?: bool, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result deregisterStreamConsumer(array $args = [])
 * @phpstan-method \Aws\Result deregisterStreamConsumer(array{StreamARN?: string, ConsumerName?: string, ConsumerARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterStreamConsumerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterStreamConsumerAsync(array{StreamARN?: string, ConsumerName?: string, ConsumerARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result describeAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result describeAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result describeLimits(array $args = [])
 * @phpstan-method \Aws\Result describeLimits(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLimitsAsync(array{...} $args = [])
 * @method \Aws\Result describeStream(array $args = [])
 * @phpstan-method \Aws\Result describeStream(array{
 *     StreamName?: string,
 *     Limit?: int,
 *     ExclusiveStartShardId?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStreamAsync(array{
 *     StreamName?: string,
 *     Limit?: int,
 *     ExclusiveStartShardId?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeStreamConsumer(array $args = [])
 * @phpstan-method \Aws\Result describeStreamConsumer(array{StreamARN?: string, ConsumerName?: string, ConsumerARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStreamConsumerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStreamConsumerAsync(array{StreamARN?: string, ConsumerName?: string, ConsumerARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result describeStreamSummary(array $args = [])
 * @phpstan-method \Aws\Result describeStreamSummary(array{StreamName?: string, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStreamSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStreamSummaryAsync(array{StreamName?: string, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result disableEnhancedMonitoring(array $args = [])
 * @phpstan-method \Aws\Result disableEnhancedMonitoring(array{
 *     StreamName?: string,
 *     ShardLevelMetrics?: list<'ALL'|'IncomingBytes'|'IncomingRecords'|'IteratorAgeMilliseconds'|'OutgoingBytes'|'OutgoingRecords'|'ReadProvisionedThroughputExceeded'|'WriteProvisionedThroughputExceeded'>,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disableEnhancedMonitoringAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableEnhancedMonitoringAsync(array{
 *     StreamName?: string,
 *     ShardLevelMetrics?: list<'ALL'|'IncomingBytes'|'IncomingRecords'|'IteratorAgeMilliseconds'|'OutgoingBytes'|'OutgoingRecords'|'ReadProvisionedThroughputExceeded'|'WriteProvisionedThroughputExceeded'>,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableEnhancedMonitoring(array $args = [])
 * @phpstan-method \Aws\Result enableEnhancedMonitoring(array{
 *     StreamName?: string,
 *     ShardLevelMetrics?: list<'ALL'|'IncomingBytes'|'IncomingRecords'|'IteratorAgeMilliseconds'|'OutgoingBytes'|'OutgoingRecords'|'ReadProvisionedThroughputExceeded'|'WriteProvisionedThroughputExceeded'>,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableEnhancedMonitoringAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableEnhancedMonitoringAsync(array{
 *     StreamName?: string,
 *     ShardLevelMetrics?: list<'ALL'|'IncomingBytes'|'IncomingRecords'|'IteratorAgeMilliseconds'|'OutgoingBytes'|'OutgoingRecords'|'ReadProvisionedThroughputExceeded'|'WriteProvisionedThroughputExceeded'>,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRecords(array $args = [])
 * @phpstan-method \Aws\Result getRecords(array{ShardIterator?: string, Limit?: int, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecordsAsync(array{ShardIterator?: string, Limit?: int, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result getShardIterator(array $args = [])
 * @phpstan-method \Aws\Result getShardIterator(array{
 *     StreamName?: string,
 *     ShardId?: string,
 *     ShardIteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'AT_TIMESTAMP'|'LATEST'|'TRIM_HORIZON',
 *     StartingSequenceNumber?: string,
 *     Timestamp?: int|string|\DateTimeInterface,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getShardIteratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getShardIteratorAsync(array{
 *     StreamName?: string,
 *     ShardId?: string,
 *     ShardIteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'AT_TIMESTAMP'|'LATEST'|'TRIM_HORIZON',
 *     StartingSequenceNumber?: string,
 *     Timestamp?: int|string|\DateTimeInterface,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result increaseStreamRetentionPeriod(array $args = [])
 * @phpstan-method \Aws\Result increaseStreamRetentionPeriod(array{StreamName?: string, RetentionPeriodHours?: int, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise increaseStreamRetentionPeriodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise increaseStreamRetentionPeriodAsync(array{StreamName?: string, RetentionPeriodHours?: int, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result listShards(array $args = [])
 * @phpstan-method \Aws\Result listShards(array{
 *     StreamName?: string,
 *     NextToken?: string,
 *     ExclusiveStartShardId?: string,
 *     MaxResults?: int,
 *     StreamCreationTimestamp?: int|string|\DateTimeInterface,
 *     ShardFilter?: array{
 *         Type?: 'AFTER_SHARD_ID'|'AT_LATEST'|'AT_TIMESTAMP'|'AT_TRIM_HORIZON'|'FROM_TIMESTAMP'|'FROM_TRIM_HORIZON',
 *         ShardId?: string,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listShardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listShardsAsync(array{
 *     StreamName?: string,
 *     NextToken?: string,
 *     ExclusiveStartShardId?: string,
 *     MaxResults?: int,
 *     StreamCreationTimestamp?: int|string|\DateTimeInterface,
 *     ShardFilter?: array{
 *         Type?: 'AFTER_SHARD_ID'|'AT_LATEST'|'AT_TIMESTAMP'|'AT_TRIM_HORIZON'|'FROM_TIMESTAMP'|'FROM_TRIM_HORIZON',
 *         ShardId?: string,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStreamConsumers(array $args = [])
 * @phpstan-method \Aws\Result listStreamConsumers(array{
 *     StreamARN?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StreamCreationTimestamp?: int|string|\DateTimeInterface,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamConsumersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamConsumersAsync(array{
 *     StreamARN?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StreamCreationTimestamp?: int|string|\DateTimeInterface,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStreams(array $args = [])
 * @phpstan-method \Aws\Result listStreams(array{Limit?: int, ExclusiveStartStreamName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamsAsync(array{Limit?: int, ExclusiveStartStreamName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result listTagsForStream(array $args = [])
 * @phpstan-method \Aws\Result listTagsForStream(array{
 *     StreamName?: string,
 *     ExclusiveStartTagKey?: string,
 *     Limit?: int,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForStreamAsync(array{
 *     StreamName?: string,
 *     ExclusiveStartTagKey?: string,
 *     Limit?: int,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result mergeShards(array $args = [])
 * @phpstan-method \Aws\Result mergeShards(array{
 *     StreamName?: string,
 *     ShardToMerge?: string,
 *     AdjacentShardToMerge?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise mergeShardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise mergeShardsAsync(array{
 *     StreamName?: string,
 *     ShardToMerge?: string,
 *     AdjacentShardToMerge?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRecord(array $args = [])
 * @phpstan-method \Aws\Result putRecord(array{
 *     StreamName?: string,
 *     Data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     PartitionKey?: string,
 *     ExplicitHashKey?: string,
 *     SequenceNumberForOrdering?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRecordAsync(array{
 *     StreamName?: string,
 *     Data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     PartitionKey?: string,
 *     ExplicitHashKey?: string,
 *     SequenceNumberForOrdering?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRecords(array $args = [])
 * @phpstan-method \Aws\Result putRecords(array{
 *     Records?: list<array{
 *         Data?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ExplicitHashKey?: string,
 *         PartitionKey?: string,
 *         ...,
 *     }>,
 *     StreamName?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRecordsAsync(array{
 *     Records?: list<array{
 *         Data?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ExplicitHashKey?: string,
 *         PartitionKey?: string,
 *         ...,
 *     }>,
 *     StreamName?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceARN?: string, StreamId?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceARN?: string, StreamId?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result registerStreamConsumer(array $args = [])
 * @phpstan-method \Aws\Result registerStreamConsumer(array{StreamARN?: string, ConsumerName?: string, StreamId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerStreamConsumerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerStreamConsumerAsync(array{StreamARN?: string, ConsumerName?: string, StreamId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result removeTagsFromStream(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromStream(array{StreamName?: string, TagKeys?: list<string>, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromStreamAsync(array{StreamName?: string, TagKeys?: list<string>, StreamARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result splitShard(array $args = [])
 * @phpstan-method \Aws\Result splitShard(array{
 *     StreamName?: string,
 *     ShardToSplit?: string,
 *     NewStartingHashKey?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise splitShardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise splitShardAsync(array{
 *     StreamName?: string,
 *     ShardToSplit?: string,
 *     NewStartingHashKey?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startStreamEncryption(array $args = [])
 * @phpstan-method \Aws\Result startStreamEncryption(array{
 *     StreamName?: string,
 *     EncryptionType?: 'KMS'|'NONE',
 *     KeyId?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startStreamEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startStreamEncryptionAsync(array{
 *     StreamName?: string,
 *     EncryptionType?: 'KMS'|'NONE',
 *     KeyId?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopStreamEncryption(array $args = [])
 * @phpstan-method \Aws\Result stopStreamEncryption(array{
 *     StreamName?: string,
 *     EncryptionType?: 'KMS'|'NONE',
 *     KeyId?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise stopStreamEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopStreamEncryptionAsync(array{
 *     StreamName?: string,
 *     EncryptionType?: 'KMS'|'NONE',
 *     KeyId?: string,
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{Tags?: array<string, string>, ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{Tags?: array<string, string>, ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{TagKeys?: list<string>, ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{TagKeys?: list<string>, ResourceARN?: string, StreamId?: string, ...} $args = [])
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result updateAccountSettings(array{MinimumThroughputBillingCommitment?: array{Status?: 'DISABLED'|'ENABLED', ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array{MinimumThroughputBillingCommitment?: array{Status?: 'DISABLED'|'ENABLED', ...}, ...} $args = [])
 * @method \Aws\Result updateMaxRecordSize(array $args = [])
 * @phpstan-method \Aws\Result updateMaxRecordSize(array{StreamARN?: string, StreamId?: string, MaxRecordSizeInKiB?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMaxRecordSizeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMaxRecordSizeAsync(array{StreamARN?: string, StreamId?: string, MaxRecordSizeInKiB?: int, ...} $args = [])
 * @method \Aws\Result updateShardCount(array $args = [])
 * @phpstan-method \Aws\Result updateShardCount(array{
 *     StreamName?: string,
 *     TargetShardCount?: int,
 *     ScalingType?: 'UNIFORM_SCALING',
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateShardCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateShardCountAsync(array{
 *     StreamName?: string,
 *     TargetShardCount?: int,
 *     ScalingType?: 'UNIFORM_SCALING',
 *     StreamARN?: string,
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStreamMode(array $args = [])
 * @phpstan-method \Aws\Result updateStreamMode(array{
 *     StreamARN?: string,
 *     StreamId?: string,
 *     StreamModeDetails?: array{StreamMode?: 'ON_DEMAND'|'PROVISIONED', ...},
 *     WarmThroughputMiBps?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStreamModeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStreamModeAsync(array{
 *     StreamARN?: string,
 *     StreamId?: string,
 *     StreamModeDetails?: array{StreamMode?: 'ON_DEMAND'|'PROVISIONED', ...},
 *     WarmThroughputMiBps?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStreamWarmThroughput(array $args = [])
 * @phpstan-method \Aws\Result updateStreamWarmThroughput(array{StreamARN?: string, StreamName?: string, StreamId?: string, WarmThroughputMiBps?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStreamWarmThroughputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStreamWarmThroughputAsync(array{StreamARN?: string, StreamName?: string, StreamId?: string, WarmThroughputMiBps?: int, ...} $args = [])
 */
class KinesisClient extends AwsClient {}
