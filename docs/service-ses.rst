==============
|service_name|
==============

.. |service_name| replace:: Amazon Simple Email Service (SES)
.. _`documentation website`: http://aws.amazon.com/documentation/ses/

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Ses\SesClient;

    $client = SesClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => 'us-east-1'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`email`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('ses');
    // Or: $client = $aws->get('Ses');

-----

*More documentation coming soon.*

-----
