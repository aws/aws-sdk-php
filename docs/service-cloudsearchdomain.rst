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
        'base_url' => '<your cloudsearch domain endpoint>',
    ));

The ``CloudSearchDomainClient`` is unlike other clients, because it does not require you to provide AWS credentials.
The only thing you need to provide is the ``base_url`` option, which represents the domain's endpoint. Domain
endpoints are unique to each domain, and you can get it by describing your domain with the :doc:`Amazon CloudSearch
configuration client <service-cloudsearch>`.

Helper method
~~~~~~~~~~~~~

An easy way to instantiate the ``CloudSearchDomainClient`` is to use the ``CloudSearchClient::getDomainClient()``
helper method. This method use the CloudSearch configuration API to retrieve the domain endpoint, and instantiates the
domain client for you.

.. code-block:: php

    use Aws\CloudSearch\CloudSearchClient;

    $configClient = CloudSearchClient::factory(array(
        'profile' => '<profile in your aws credentials file>',
        'region'  => '<region name>',
    ));

    $domainClient = $configClient->getDomainClient('<domain name>');

    // Use the search operation
    $result = $domainClient->search(array('query' => 'foobar'));
    $hitCount = $result->getPath('hits/found');
    echo "Number of Hits: {$hitCount}\n";

.. apiref:: CloudSearchDomain
