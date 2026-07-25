<?php
namespace Aws\KinesisVideoSignalingChannels;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video Signaling Channels** service.
 * @method \Aws\Result getIceServerConfig(array $args = [])
 * @phpstan-method \Aws\Result getIceServerConfig(array{ChannelARN?: string, ClientId?: string, Service?: 'TURN', Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIceServerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIceServerConfigAsync(array{ChannelARN?: string, ClientId?: string, Service?: 'TURN', Username?: string, ...} $args = [])
 * @method \Aws\Result sendAlexaOfferToMaster(array $args = [])
 * @phpstan-method \Aws\Result sendAlexaOfferToMaster(array{ChannelARN?: string, SenderClientId?: string, MessagePayload?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendAlexaOfferToMasterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendAlexaOfferToMasterAsync(array{ChannelARN?: string, SenderClientId?: string, MessagePayload?: string, ...} $args = [])
 */
class KinesisVideoSignalingChannelsClient extends AwsClient {}
