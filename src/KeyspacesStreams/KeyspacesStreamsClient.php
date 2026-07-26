<?php
namespace Aws\KeyspacesStreams;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Keyspaces Streams** service.
 * @method \Aws\Result getRecords(array $args = [])
 * @phpstan-method \Aws\Result getRecords(array{shardIterator?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecordsAsync(array{shardIterator?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getShardIterator(array $args = [])
 * @phpstan-method \Aws\Result getShardIterator(array{
 *     streamArn?: string,
 *     shardId?: string,
 *     shardIteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'LATEST'|'TRIM_HORIZON',
 *     sequenceNumber?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getShardIteratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getShardIteratorAsync(array{
 *     streamArn?: string,
 *     shardId?: string,
 *     shardIteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'LATEST'|'TRIM_HORIZON',
 *     sequenceNumber?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getStream(array $args = [])
 * @phpstan-method \Aws\Result getStream(array{
 *     streamArn?: string,
 *     maxResults?: int,
 *     shardFilter?: array{type?: 'CHILD_SHARDS', shardId?: string, ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStreamAsync(array{
 *     streamArn?: string,
 *     maxResults?: int,
 *     shardFilter?: array{type?: 'CHILD_SHARDS', shardId?: string, ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStreams(array $args = [])
 * @phpstan-method \Aws\Result listStreams(array{keyspaceName?: string, tableName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamsAsync(array{keyspaceName?: string, tableName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 */
class KeyspacesStreamsClient extends AwsClient {}
