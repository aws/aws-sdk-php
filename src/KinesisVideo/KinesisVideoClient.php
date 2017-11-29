<?php
namespace Aws\KinesisVideo;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video Streams** service.
 * @method \Aws\Result createStream(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamAsync(array $args = [])
 * @method \Aws\Result deleteStream(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStreamAsync(array $args = [])
 * @method \Aws\Result describeStream(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @method \Aws\Result getDataEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataEndpointAsync(array $args = [])
 * @method \Aws\Result listStreams(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @method \Aws\Result listTagsForStream(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForStreamAsync(array $args = [])
 * @method \Aws\Result tagStream(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagStreamAsync(array $args = [])
 * @method \Aws\Result untagStream(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagStreamAsync(array $args = [])
 * @method \Aws\Result updateDataRetention(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataRetentionAsync(array $args = [])
 * @method \Aws\Result updateStream(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStreamAsync(array $args = [])
 */
class KinesisVideoClient extends AwsClient {}
