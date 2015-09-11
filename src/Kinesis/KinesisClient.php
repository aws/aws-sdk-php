<?php
namespace Aws\Kinesis;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis** service.
 *
 * @method \Aws\Result addTagsToStream(array $args = [])
 * @method \Aws\Result createStream(array $args = [])
 * @method \Aws\Result deleteStream(array $args = [])
 * @method \Aws\Result describeStream(array $args = [])
 * @method \Aws\Result getRecords(array $args = [])
 * @method \Aws\Result getShardIterator(array $args = [])
 * @method \Aws\Result listStreams(array $args = [])
 * @method \Aws\Result listTagsForStream(array $args = [])
 * @method \Aws\Result mergeShards(array $args = [])
 * @method \Aws\Result putRecord(array $args = [])
 * @method \Aws\Result putRecords(array $args = [])
 * @method \Aws\Result removeTagsFromStream(array $args = [])
 * @method \Aws\Result splitShard(array $args = [])
 */
class KinesisClient extends AwsClient {}
