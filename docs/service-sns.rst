==============
|service_name|
==============

.. |service_name| replace:: Amazon Simple Notification Service (SNS)

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Sns\SnsClient;

    $client = SnsClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`sns`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('sns');
    // Or: $client = $aws->get('Sns');

*More documentation coming soon.*
