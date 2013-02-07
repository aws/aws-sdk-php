.. service:: sqs

Creating a queue
----------------

Now, let's create a queue. You can create a standard queue by just providing a name. Make sure to get the queue's URL
from the result.

.. code-block:: php

    $result = $client->createQueue(array('QueueName' => 'my-queue'));
    $queueUrl = $result->get('QueueUrl');

You can also set attributes on your queue when you create it.

.. code-block:: php

    use Aws\Common\Enum\Size;
    use Aws\Sqs\Enum\QueueAttribute;

    $result = $client->createQueue(array(
        'QueueName'   => 'my-queue',
        'Attributes'  => array(
            QueueAttribute::DELAY_SECONDS        => 15,
            QueueAttribute::MAXIMUM_MESSAGE_SIZE => 4 * Size::KB,
        ),
    ));
    $queueUrl = $result->get('QueueUrl');

You can also set queue attributes later.

.. code-block:: php

    use Aws\Common\Enum\Time;

    $result = $client->setQueueAttributes(array(
        'QueueUrl'   => $queueUrl,
        'Attributes' => array(
            QueueAttribute::VISIBILITY_TIMEOUT => 2 * Time::MINUTES,
        ),
    ));

.. note:: More documentation coming soon.
