=========================================
Managing Visibility Timeout in Amazon SQS
=========================================

A visibility timeout is a period of time during which Amazon SQS prevents other consuming components from receiving and processing a message. To learn more, see `Visibility Timeout <http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/sqs-visibility-timeout.html>`_.

The example below shows how to:

* Change the visibility timeout of specified messages in a queue to new values, using `ChangeMessageVisibilityBatch <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sqs-2012-11-05.html#changemessagevisibilitybatch>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Change the Visibility Timeout of Multiple Messages
--------------------------------------------------

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
            'MaxNumberOfMessages' => 10,
            'MessageAttributeNames' => ['All'],
            'QueueUrl' => $queueUrl, // REQUIRED
        ));
        $messages = $result->get('Messages');
        if ($messages != null) {
            $entries = array();
            for ($i = 0; $i < count($messages); $i++) {
                array_push($entries, [
                    'Id' => 'unique_is_msg' . $i, // REQUIRED
                    'ReceiptHandle' => $messages[$i]['ReceiptHandle'], // REQUIRED
                    'VisibilityTimeout' => 36000
                ]);
            }
            $result = $client->changeMessageVisibilityBatch([
                'Entries' => $entries,
                'QueueUrl' => $queueUrl
            ]);
            var_dump($result);
        } else {
            echo "No messages in queue \n";
        }
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
