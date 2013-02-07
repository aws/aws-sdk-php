==============
|service_name|
==============

.. |service_name| replace:: Amazon Elastic Transcoder
.. _`documentation website`: http://aws.amazon.com/documentation/elastictranscoder/

.. include:: _snippets/service_intro.txt

.. code-block:: php

    use Aws\ElasticTranscoder\ElasticTranscoder;

    $client = ElasticTranscoderClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>'
    ));

.. admonition:: |service_name| supports the following region values

    :regions:`elastictranscoder`

.. include:: _snippets/service_intro_service_locator.txt

.. code-block:: php

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/my_config.json');
    $client = $aws->get('elastictranscoder');
    // Or: $client = $aws->get('ElasticTranscoder');

-----

*More documentation coming soon.*

-----
