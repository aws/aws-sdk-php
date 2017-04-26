======================================
Using Dead Letter Queues in Amazon SQS
======================================

A dead letter queue is one that other (source) queues can target for messages that can't be processed successfully. You can set aside and isolate these messages in the dead letter queue to determine why their processing did not succeed. You must individually configure each source queue that sends messages to a dead letter queue. Multiple queues can target a single dead letter queue.

To learn more, see `Using Amazon SQS Dead Letter Queues <http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/sqs-dead-letter-queues.html>`_.

The example below shows how to:

* Enable a dead letter queue using `SetQueueAttributes <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sqs-2012-11-05.html#setqueueattributes>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Enable a Dead Letter Queue
--------------------------

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
        $result = $client->setQueueAttributes([
            'Attributes' => [
                'RedrivePolicy' => "{\"deadLetterTargetArn\":\"DEAD_LETTER_QUEUE_ARN\",\"maxReceiveCount\":\"10\"}"
            ],
            'QueueUrl' => $queueUrl // REQUIRED
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
