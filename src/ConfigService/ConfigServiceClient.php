<?php
namespace Aws\ConfigService;

use Aws\AwsClient;

/**
 * This client is used to interact with AWS Config.
 *
 * @method \Aws\Result deleteDeliveryChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeliveryChannelAsync(array $args = [])
 * @method \Aws\Result deliverConfigSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deliverConfigSnapshotAsync(array $args = [])
 * @method \Aws\Result describeConfigurationRecorderStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationRecorderStatusAsync(array $args = [])
 * @method \Aws\Result describeConfigurationRecorders(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationRecordersAsync(array $args = [])
 * @method \Aws\Result describeDeliveryChannelStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDeliveryChannelStatusAsync(array $args = [])
 * @method \Aws\Result describeDeliveryChannels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDeliveryChannelsAsync(array $args = [])
 * @method \Aws\Result getResourceConfigHistory(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceConfigHistoryAsync(array $args = [])
 * @method \Aws\Result listDiscoveredResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDiscoveredResourcesAsync(array $args = [])
 * @method \Aws\Result putConfigurationRecorder(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationRecorderAsync(array $args = [])
 * @method \Aws\Result putDeliveryChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putDeliveryChannelAsync(array $args = [])
 * @method \Aws\Result startConfigurationRecorder(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startConfigurationRecorderAsync(array $args = [])
 * @method \Aws\Result stopConfigurationRecorder(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopConfigurationRecorderAsync(array $args = [])
 */
class ConfigServiceClient extends AwsClient {}
