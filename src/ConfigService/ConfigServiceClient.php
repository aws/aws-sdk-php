<?php
namespace Aws\ConfigService;

use Aws\AwsClient;

/**
 * This client is used to interact with AWS Config.
 *
 * @method \Aws\Result deleteDeliveryChannel(array $args = [])
 * @method \Aws\Result deliverConfigSnapshot(array $args = [])
 * @method \Aws\Result describeConfigurationRecorderStatus(array $args = [])
 * @method \Aws\Result describeConfigurationRecorders(array $args = [])
 * @method \Aws\Result describeDeliveryChannelStatus(array $args = [])
 * @method \Aws\Result describeDeliveryChannels(array $args = [])
 * @method \Aws\Result getResourceConfigHistory(array $args = [])
 * @method \Aws\Result listDiscoveredResources(array $args = [])
 * @method \Aws\Result putConfigurationRecorder(array $args = [])
 * @method \Aws\Result putDeliveryChannel(array $args = [])
 * @method \Aws\Result startConfigurationRecorder(array $args = [])
 * @method \Aws\Result stopConfigurationRecorder(array $args = [])
 */
class ConfigServiceClient extends AwsClient {}
