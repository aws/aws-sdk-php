==============
|service_name|
==============

.. |service_name| replace:: Elastic Load Balancing
.. _`documentation website`: http://aws.amazon.com/documentation/elasticloadbalancing/

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\ElasticLoadBalancing\ElasticLoadBalancingClient;

    $client = ElasticLoadBalancingClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`elasticloadbalancing`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('elasticloadbalancing');
    // Or: $client = $aws->get('ElasticLoadBalancing');

.. note:: More documentation coming soon.
