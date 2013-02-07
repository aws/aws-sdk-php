==============
|service_name|
==============

.. |service_name| replace:: Amazon SimpleDB
.. _`documentation website`: http://aws.amazon.com/documentation/simpledb/

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\SimpleDb\SimpleDbClient;

    $client = SimpleDbClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`sdb`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('sdb');
    // Or: $client = $aws->get('SimpleDb');

-----

*More documentation coming soon.*

-----
