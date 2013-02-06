==============
|service_name|
==============

.. |service_name| replace:: Amazon Glacier

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Glacier\GlacierClient;

    $client = GlacierClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`glacier`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('glacier');
    // Or: $client = $aws->get('Glacier');

*More documentation coming soon.*
