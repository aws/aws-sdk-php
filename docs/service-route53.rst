===============
Amazon Route 53
===============

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Route53\Route53Client;

    $client = Route53Client::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>'
    ));

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('route53');

.. |service_name| replace:: Amazon Route 53

*More documentation coming soon.*
