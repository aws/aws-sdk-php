==============
|service_name|
==============

.. |service_name| replace:: Amazon Simple Queue Service (Amazon SQS)

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Sqs\SqsClient;

    $client = SqsClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => 'us-west-2'
    ));

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('sqs');
    // Or: $client = $aws->get('Sqs');

*More documentation coming soon.*
