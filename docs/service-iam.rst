==============
|service_name|
==============

.. |service_name| replace:: AWS Identity and Access Management (IAM)
.. _`documentation website`: http://aws.amazon.com/documentation/iam/

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Iam\IamClient;

    $client = IamClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>'
    ));

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('iam');
    // Or: $client = $aws->get('Iam');

.. note:: More documentation coming soon.
