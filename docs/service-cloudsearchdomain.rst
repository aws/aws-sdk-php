====================================================================================
Amazon CloudSearch Domains
====================================================================================

This guide focuses on the AWS SDK for PHP client for Amazon CloudSearch domains. The ``CloudSearchDomainClient`` allows
you to search and upload documents to your CloudSearch domains. This guide assumes that you have already downloaded and
installed the AWS SDK for PHP. See :doc:`installation` for more information on getting started.

Creating a client
-----------------

First you need to create a client object using one of the following techniques.

Factory method
~~~~~~~~~~~~~~

Similar to the way other service clients are used, you can instantiate the ``CloudSearchDomainClient`` with the
``Aws\CloudSearchDomain\CloudSearchDomainClient::factory()`` method.

.. code-block:: php

    use Aws\CloudSearchDomain\CloudSearchDomainClient;

    $client = CloudSearchDomainClient::factory(array(
        'profile'  => '<profile in your aws credentials file>',
        'endpoint' => '<your cloudsearch domain endpoint>'
    ));

The ``CloudSearchDomainClient`` is unlike other clients, because it does not require you to provide a region. Instead,
you must provide the ``endpoint`` option, which represents the domain's endpoint. Domain endpoints are unique to each
domain, and you can get it using the `DescribeDomains operation
<http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.CloudSearch.CloudSearchClient.html#_describeDomains>`_ of the
:doc:`Amazon CloudSearch configuration client<service-cloudsearch>`.

Service builder
~~~~~~~~~~~~~~~

Again, similar to other service clients, you can use the service builder to instantiate the client. This allows you to
specify credentials and other configuration settings in a configuration file. These settings can then be shared across
all clients so that you only have to specify your settings once.

.. code-block:: php

    use Aws\Common\Aws;

    // Create a service builder using a configuration file
    $aws = Aws::factory('/path/to/my_config.json');

    // Get the client from the builder
    $client = $aws->get('CloudSearchDomain');

**Note:** This assumes that your configuration file has been setup to include the ``endpoint`` option for the
CloudSearch Domain service. If it is not, you can provide it manually when calling ``get()``.

.. code-block:: php

    $client = $aws->get('cloudsearchdomain', array(
        'endpoint' => '<your cloudsearch domain endpoint>'
    ));

For more information about configuration files, see :doc:`configuration`.

Unauthenticated requests
~~~~~~~~~~~~~~~~~~~~~~~~

The ``CloudSearchDomainClient`` can also be used without credentials if you have configured your domain's policy to
allow anonymous access. To make the ``CloudSearchDomainClient`` anonymous, set ``'credentials'`` to ``false``.

.. code-block:: php

    // Using the client factory
    $domainClient = $client = CloudSearchDomainClient::factory(array(
        'endpoint'    => '<your cloudsearch domain endpoint>'
        'credentials' => false,
    ));

    // Using the service builder
    $domainClient = $aws->get('cloudsearchdomain', array(
        'endpoint'    => '<your cloudsearch domain endpoint>'
        'credentials' => false,
    ));

**Note:** Credentials work the same way with the ``CloudSearchDomainClient`` as they do with other clients. To learn
more, see :doc:`credentials`.

Using the client
----------------

Here is an example of a simple search.

.. code-block:: php

    // Use the search operation
    $result = $domainClient->search(array('query' => 'foobar'));
    $hitCount = $result->getPath('hits/found');
    echo "Number of Hits: {$hitCount}\n";

You can find more information on the parameters supported in the Search operation by reading the API reference.

.. apiref:: CloudSearchDomain
