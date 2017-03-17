=====================================
Working with Amazon CloudWatch Alarms
=====================================

An Amazon CloudWatch alarm watches a single metric over a time period you specify, and performs one or more actions based on the value of the metric relative to a given threshold over a number of time periods.

The examples below show how to:

* Describe an alarm using `DescribeAlarms <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-monitoring-2010-08-01.html#describealarms>`_.
* Create an alarm using `PutMetricAlarm <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-monitoring-2010-08-01.html#putmetricalarm>`_.
* Delete an alarm using `DeleteAlarms <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-monitoring-2010-08-01.html#deletealarms>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Describe Alarms
---------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\CloudWatch\CloudWatchClient;
    use Aws\Exception\AwsException;

    $client = new CloudWatchClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-08-01'
    ]);
    try {
        $result = $client->describeAlarms([
        ]);
        foreach ($result['MetricAlarms'] as $alarm) {
            echo $alarm['AlarmName'] . "\n";
        }
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Create an Alarm
---------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\CloudWatch\CloudWatchClient;
    use Aws\Exception\AwsException;

    $client = new CloudWatchClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-08-01'
    ]);
    try {
        $result = $client->putMetricAlarm(array(
            // AlarmName is required
            'AlarmName' => 'string',
            // MetricName is required
            'MetricName' => 'string',
            // Namespace is required
            'Namespace' => 'string',
            // Statistic is required
            //string: SampleCount | Average | Sum | Minimum | Maximum
            'Statistic' => 'string',
            // Period is required
            'Period' => integer,
            'Unit' => 'Count/Second',
            // EvaluationPeriods is required
            'EvaluationPeriods' => integer,
            // Threshold is required
            'Threshold' => interger,
            // ComparisonOperator is required
            // string: GreaterThanOrEqualToThreshold | GreaterThanThreshold | LessThanThreshold | LessThanOrEqualToThreshold
            'ComparisonOperator' => 'string',
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Delete Alarms
-------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\CloudWatch\CloudWatchClient;
    use Aws\Exception\AwsException;

    $alarmName = "<ALARM_NAME>";
    $client = new CloudWatchClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-08-01'
    ]);
    try {
        $result = $client->deleteAlarms([
            'AlarmNames' => [$alarmName] // REQUIRED
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
