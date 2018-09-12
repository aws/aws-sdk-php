.. Copyright 2010-2018 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

==========================
Using Queues in Amazon SQS
==========================

.. meta::
   :description: Create or delete Amazon SQS queues, and return lists and URLs for queues.
   :keywords: Amazon SQS, AWS SDK for PHP examples

To learn about Amazon SQS queues, see `How Amazon SQS Queues Work <http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/sqs-how-it-works.html>`_.

The examples below show how to:

* Return a list of your queues using `ListQueues <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sqs-2012-11-05.html#listqueues>`_.
* Create a new queue using `CreateQueue <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sqs-2012-11-05.html#createqueue>`_.
* Return the URL of an existing queue using `GetQueueUrl <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sqs-2012-11-05.html#getqueueurl>`_.
* Delete a specified queue using `DeleteQueue <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sqs-2012-11-05.html#deletequeue>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Return a List of Queues
-----------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Sqs\SqsClient;
    use Aws\Exception\AwsException;

    $client = new SqsClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2012-11-05'
    ]);
    try {
        $result = $client->listQueues();
        foreach ($result->get('QueueUrls') as $queueUrl) {
            echo "$queueUrl\n";
        }
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Create a Queue
--------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Sqs\SqsClient;
    use Aws\Exception\AwsException;

    $queueName = "SQS_QUEUE_NAME";
    $client = new SqsClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2012-11-05'
    ]);
    try {
        $result = $client->createQueue(array(
            'QueueName' => $queueName,
            'Attributes' => array(
                'DelaySeconds' => 5,
                'MaximumMessageSize' => 4096, // 4 KB
            ),
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Return the URL of a Queue
-------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Sqs\SqsClient;
    use Aws\Exception\AwsException;

    $queueName = "SQS_QUEUE_NAME";
    $client = new SqsClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2012-11-05'
    ]);
    try {
        $result = $client->getQueueUrl([
            'QueueName' => $queueName // REQUIRED
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Delete a Queue
--------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Sqs\SqsClient;
    use Aws\Exception\AwsException;

    $queueUrl = "SQS_QUEUE_URL";
    $client = new SqsClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2012-11-05'
    ]);
    try {
        $result = $client->deleteQueue([
            'QueueUrl' => $queueUrl // REQUIRED
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
