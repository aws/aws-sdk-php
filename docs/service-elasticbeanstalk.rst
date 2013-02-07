==============
|service_name|
==============

.. |service_name| replace:: AWS Elastic Beanstalk
.. _`documentation website`: http://aws.amazon.com/documentation/elasticbeanstalk/

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\ElasticBeanstalk\ElasticBeanstalkClient;

    $client = ElasticBeanstalkClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`elasticbeanstalk`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('elasticbeanstalk');
    // Or: $client = $aws->get('ElasticBeanstalk');

-----

*More documentation coming soon.*

-----
