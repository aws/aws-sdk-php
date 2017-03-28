==========================
Using Queues in Amazon SQS
==========================

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
