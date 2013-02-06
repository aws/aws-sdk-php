==============
|service_name|
==============

.. |service_name| replace:: Elastic Load Balancing

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\ElasticLoadBalancing\ElasticLoadBalancingClient;

    $client = ElasticLoadBalancingClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => 'us-west-2'
    ));

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('elasticloadbalancing');
    // Or: $client = $aws->get('ElasticLoadBalancing');

*More documentation coming soon.*
