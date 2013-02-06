==============
|service_name|
==============

.. |service_name| replace:: AWS Data Pipeline

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\DataPipeline\DataPipelineClient;

    $client = DataPipelineClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>'
    ));

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('datapipeline');
    // Or: $client = $aws->get('DataPipeline');

*More documentation coming soon.*
