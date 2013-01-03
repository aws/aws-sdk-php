===============
Amazon DynamoDB
===============

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\DynamoDb\DynamoDbClient;

    $client = DynamoDbClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => 'us-west-2'
    ));

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('dynamodb');

.. |service_name| replace:: Amazon DynamoDB

*More documentation coming soon.*
