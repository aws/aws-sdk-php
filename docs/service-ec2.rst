==============
|service_name|
==============

.. |service_name| replace:: Amazon EC2
.. _`documentation website`: http://aws.amazon.com/documentation/ec2/

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\Ec2\Ec2Client;

    $client = Ec2Client::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`ec2`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('ec2');
    // Or: $client = $aws->get('Ec2');

-----

*More documentation coming soon.*

-----
