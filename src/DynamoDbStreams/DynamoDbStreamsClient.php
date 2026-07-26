<?php
namespace Aws\DynamoDbStreams;

use Aws\AwsClient;
use Aws\DynamoDb\DynamoDbClient;

/**
 * This client is used to interact with the **Amazon DynamoDb Streams** service.
 *
 * @method \Aws\Result describeStream(array $args = [])
 * @phpstan-method \Aws\Result describeStream(array{
 *     StreamArn?: string,
 *     Limit?: int,
 *     ExclusiveStartShardId?: string,
 *     ShardFilter?: array{Type?: 'CHILD_SHARDS', ShardId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStreamAsync(array{
 *     StreamArn?: string,
 *     Limit?: int,
 *     ExclusiveStartShardId?: string,
 *     ShardFilter?: array{Type?: 'CHILD_SHARDS', ShardId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRecords(array $args = [])
 * @phpstan-method \Aws\Result getRecords(array{ShardIterator?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecordsAsync(array{ShardIterator?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result getShardIterator(array $args = [])
 * @phpstan-method \Aws\Result getShardIterator(array{
 *     StreamArn?: string,
 *     ShardId?: string,
 *     ShardIteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'LATEST'|'TRIM_HORIZON',
 *     SequenceNumber?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getShardIteratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getShardIteratorAsync(array{
 *     StreamArn?: string,
 *     ShardId?: string,
 *     ShardIteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'LATEST'|'TRIM_HORIZON',
 *     SequenceNumber?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStreams(array $args = [])
 * @phpstan-method \Aws\Result listStreams(array{TableName?: string, Limit?: int, ExclusiveStartStreamArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamsAsync(array{TableName?: string, Limit?: int, ExclusiveStartStreamArn?: string, ...} $args = [])
 */
class DynamoDbStreamsClient extends AwsClient
{
    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['retries']['default'] = 11;
        $args['retries']['fn'] = [DynamoDbClient::class, '_applyRetryConfig'];

        return $args;
    }
}