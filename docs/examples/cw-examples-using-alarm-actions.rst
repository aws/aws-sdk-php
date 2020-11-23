.. Copyright 2010-2018 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

=================================================
Using Alarm Actions with Amazon CloudWatch Alarms
=================================================

.. meta::
   :description: Create CloudWatch alarms that automatically stop, terminate, reboot, or recover EC2 instances.
   :keywords: Amazon Cloudwatch, AWS SDK for PHP examples

Using alarm actions, you can create alarms that automatically stop, terminate, reboot, or recover your Amazon EC2 instances. You can use the stop or terminate actions when you no longer need an instance to be running. You can use the reboot and recover actions to automatically reboot those instances.

The examples below show how to:

* Enable actions for specified alarms using `EnableAlarmActions <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-monitoring-2010-08-01.html#enablealarmactions>`_.
* Disable actions for specified alarms using `DisableAlarmActions <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-monitoring-2010-08-01.html#disablealarmactions>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Enable Alarm Actions
--------------------

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
        $result = $client->enableAlarmActions([
            'AlarmNames' => array($alarmName) //REQUIRED
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Disable Alarm Actions
---------------------

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
        $result = $client->disableAlarmActions([
            'AlarmNames' => array($alarmName) //REQUIRED
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
