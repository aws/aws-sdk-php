==============
|service_name|
==============

.. |service_name| replace:: Amazon Simple Queue Service (Amazon SQS)
.. _`documentation website`: http://aws.amazon.com/documentation/sqs/

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Sqs\SqsClient;

    $client = SqsClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`sqs`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('sqs');
    // Or: $client = $aws->get('Sqs');

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
