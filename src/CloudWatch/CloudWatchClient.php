<?php
namespace Aws\CloudWatch;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch** service.
 *
 * @method \Aws\Result deleteAlarms(array $args = [])
 * @method \Aws\Result describeAlarmHistory(array $args = [])
 * @method \Aws\Result describeAlarms(array $args = [])
 * @method \Aws\Result describeAlarmsForMetric(array $args = [])
 * @method \Aws\Result disableAlarmActions(array $args = [])
 * @method \Aws\Result enableAlarmActions(array $args = [])
 * @method \Aws\Result getMetricStatistics(array $args = [])
 * @method \Aws\Result listMetrics(array $args = [])
 * @method \Aws\Result putMetricAlarm(array $args = [])
 * @method \Aws\Result putMetricData(array $args = [])
 * @method \Aws\Result setAlarmState(array $args = [])
 */
class CloudWatchClient extends AwsClient {}
