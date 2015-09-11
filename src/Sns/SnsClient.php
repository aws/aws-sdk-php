<?php
namespace Aws\Sns;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Simple Notification Service (Amazon SNS)**.
 *
 * @method \Aws\Result addPermission(array $args = [])
 * @method \Aws\Result confirmSubscription(array $args = [])
 * @method \Aws\Result createPlatformApplication(array $args = [])
 * @method \Aws\Result createPlatformEndpoint(array $args = [])
 * @method \Aws\Result createTopic(array $args = [])
 * @method \Aws\Result deleteEndpoint(array $args = [])
 * @method \Aws\Result deletePlatformApplication(array $args = [])
 * @method \Aws\Result deleteTopic(array $args = [])
 * @method \Aws\Result getEndpointAttributes(array $args = [])
 * @method \Aws\Result getPlatformApplicationAttributes(array $args = [])
 * @method \Aws\Result getSubscriptionAttributes(array $args = [])
 * @method \Aws\Result getTopicAttributes(array $args = [])
 * @method \Aws\Result listEndpointsByPlatformApplication(array $args = [])
 * @method \Aws\Result listPlatformApplications(array $args = [])
 * @method \Aws\Result listSubscriptions(array $args = [])
 * @method \Aws\Result listSubscriptionsByTopic(array $args = [])
 * @method \Aws\Result listTopics(array $args = [])
 * @method \Aws\Result publish(array $args = [])
 * @method \Aws\Result removePermission(array $args = [])
 * @method \Aws\Result setEndpointAttributes(array $args = [])
 * @method \Aws\Result setPlatformApplicationAttributes(array $args = [])
 * @method \Aws\Result setSubscriptionAttributes(array $args = [])
 * @method \Aws\Result setTopicAttributes(array $args = [])
 * @method \Aws\Result subscribe(array $args = [])
 * @method \Aws\Result unsubscribe(array $args = [])
 */
class SnsClient extends AwsClient {}
