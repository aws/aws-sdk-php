================================
AWS Security Token Service (STS)
================================

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Sts\StsClient;

    $client = StsClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>'
    ));

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('sts');

.. |service_name| replace:: AWS Security Token Service

*More documentation coming soon.*
