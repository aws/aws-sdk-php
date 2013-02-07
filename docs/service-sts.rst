==============
|service_name|
==============

.. |service_name| replace:: AWS Security Token Service (STS)
.. _`documentation website`: http://aws.amazon.com/documentation/iam/

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Sts\StsClient;

    $client = StsClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`sts`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('sts');
    // Or: $client = $aws->get('Sts');

.. note:: More documentation coming soon.
