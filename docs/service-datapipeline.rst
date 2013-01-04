=================
AWS Data Pipeline
=================

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\DataPipeline\DataPipelineClient;

    $client = DataPipelineClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => 'us-east-1'
    ));

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('datapipeline');

.. |service_name| replace:: AWS Data Pipeline

*More documentation coming soon.*
