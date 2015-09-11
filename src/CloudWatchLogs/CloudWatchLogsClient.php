<?php
namespace Aws\CloudWatchLogs;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Logs** service.
 *
 * @method \Aws\Result createLogGroup(array $args = [])
 * @method \Aws\Result createLogStream(array $args = [])
 * @method \Aws\Result deleteDestination(array $args = [])
 * @method \Aws\Result deleteLogGroup(array $args = [])
 * @method \Aws\Result deleteLogStream(array $args = [])
 * @method \Aws\Result deleteMetricFilter(array $args = [])
 * @method \Aws\Result deleteRetentionPolicy(array $args = [])
 * @method \Aws\Result deleteSubscriptionFilter(array $args = [])
 * @method \Aws\Result describeDestinations(array $args = [])
 * @method \Aws\Result describeLogGroups(array $args = [])
 * @method \Aws\Result describeLogStreams(array $args = [])
 * @method \Aws\Result describeMetricFilters(array $args = [])
 * @method \Aws\Result describeSubscriptionFilters(array $args = [])
 * @method \Aws\Result filterLogEvents(array $args = [])
 * @method \Aws\Result getLogEvents(array $args = [])
 * @method \Aws\Result putDestination(array $args = [])
 * @method \Aws\Result putDestinationPolicy(array $args = [])
 * @method \Aws\Result putLogEvents(array $args = [])
 * @method \Aws\Result putMetricFilter(array $args = [])
 * @method \Aws\Result putRetentionPolicy(array $args = [])
 * @method \Aws\Result putSubscriptionFilter(array $args = [])
 * @method \Aws\Result testMetricFilter(array $args = [])
 */
class CloudWatchLogsClient extends AwsClient {}
