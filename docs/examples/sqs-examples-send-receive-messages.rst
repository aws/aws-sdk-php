.. Copyright 2010-2018 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

============================================
Sending and Receiving Messages in Amazon SQS
============================================

.. meta::
   :description: Deliver, delete, or retrieve messages using Amazon SQS.
   :keywords: Amazon SQS, AWS SDK for PHP examples

To learn about Amazon SQS messages, see `Sending a Message to an Amazon SQS Queue <http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/sqs-send-message.html>`_ and `Receiving and Deleting a Message from an Amazon SQS Queue <http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/sqs-receive-delete-message.html>`_ in the Amazon Simple Queue Service Developer Guide.

The examples below show how to:

* Deliver a message to a specified queue using `SendMessage <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sqs-2012-11-05.html#sendmessage>`_.
* Retrieve one or more messages (up to 10) from a specified queue using `ReceiveMessage <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sqs-2012-11-05.html#receivemessage>`_.
* Delete a message from a queue using `DeleteMessage <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sqs-2012-11-05.html#deletemessage>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Send a Message
--------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Sqs\SqsClient;
    use Aws\Exception\AwsException;

    $client = new SqsClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2012-11-05'
    ]);
    $params = [
        'DelaySeconds' => 10,
        'MessageAttributes' => [
            "Title" => [
                'DataType' => "String",
                'StringValue' => "The Hitchhiker's Guide to the Galaxy"
            ],
            "Author" => [
                'DataType' => "String",
                'StringValue' => "Douglas Adams."
            ],
            "WeeksOn" => [
                'DataType' => "Number",
                'StringValue' => "6"
            ]
        ],
        'MessageBody' => "Information about current NY Times fiction bestseller for week of 12/11/2016.",
        'QueueUrl' => 'QUEUE_URL'
    ];
    try {
        $result = $client->sendMessage($params);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Receive and Delete Messages
---------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Sqs\SqsClient;
    use Aws\Exception\AwsException;

    $queueUrl = "QUEUE_URL";
    $client = new SqsClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2012-11-05'
    ]);
    try {
        $result = $client->receiveMessage(array(
            'AttributeNames' => ['SentTimestamp'],
            'MaxNumberOfMessages' => 1,
            'MessageAttributeNames' => ['All'],
            'QueueUrl' => $queueUrl, // REQUIRED
            'WaitTimeSeconds' => 0,
        ));
        if (count($result->get('Messages')) > 0) {
            var_dump($result->get('Messages')[0]);
            $result = $client->deleteMessage([
                'QueueUrl' => $queueUrl, // REQUIRED
                'ReceiptHandle' => $result->get('Messages')[0]['ReceiptHandle'] // REQUIRED
            ]);
        } else {
            echo "No messages in queue. \n";
        }
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
