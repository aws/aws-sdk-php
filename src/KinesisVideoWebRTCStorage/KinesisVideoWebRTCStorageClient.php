<?php
namespace Aws\KinesisVideoWebRTCStorage;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video WebRTC Storage** service.
 * @method \Aws\Result joinStorageSession(array $args = [])
 * @phpstan-method \Aws\Result joinStorageSession(array{channelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise joinStorageSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise joinStorageSessionAsync(array{channelArn?: string, ...} $args = [])
 * @method \Aws\Result joinStorageSessionAsViewer(array $args = [])
 * @phpstan-method \Aws\Result joinStorageSessionAsViewer(array{channelArn?: string, clientId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise joinStorageSessionAsViewerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise joinStorageSessionAsViewerAsync(array{channelArn?: string, clientId?: string, ...} $args = [])
 */
class KinesisVideoWebRTCStorageClient extends AwsClient {}
