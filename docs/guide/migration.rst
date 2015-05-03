===============
Migration Guide
===============

This guide shows how to migrate your code to use version 3 of the AWS SDK for
PHP and how the new version differs from the version 2 of the SDK.

.. note::

    The basic usage pattern of the SDK (i.e., ``$result = $client->operation($params);``)
    has not changed from version 2 to version 3. This should result in a fairly
    smooth migration.

Introduction
------------

Version 3 of the SDK represents a significant effort to improve the capabilities
of the SDK, incorporate 2 years of customer feedback, upgrade our dependencies,
and adopt the latest PHP standards.

What's New?
-----------

- Follows the `PSR-4 and PSR-7 standards <http://php-fig.org>`_.
- Built on `Guzzle 6 <http://guzzlephp.org>`_.

  - Decoupled HTTP layer so that Guzzle 5 is also supported.
  - Swappable HTTP handlers, including non-cURL options like a PHP stream
    wrapper handler.

- Asynchronous requests.

  - Features like *waiters* and *multipart uploaders* can also be used
    asynchronously.
  - Asynchronous workflows can be created using *promises* and *coroutines*.
  - Improved performance of concurrent/batched requests.

- Middleware system for customizing service client behavior.
- Flexible *paginators* for iterating through paginated results.
- Ability to query data from *result* and *paginator* objects with *JMESPath*.
- Easy debugging via the ``'debug'`` configuration option.

What's Different?
-----------------

Project Dependencies
~~~~~~~~~~~~~~~~~~~~

The dependencies of the SDK have changed a little in this version.

- The SDK now requires PHP 5.5+. We use `generators <http://php.net/manual/en/language.generators.overview.php>`_
  liberally within the SDK code.
- We've upgraded the SDK to use `Guzzle 6 <http://guzzlephp.org>`_ (or 5), which
  provides the underlying HTTP client implementation used by the SDK to send
  requests to the AWS services. The latest version of Guzzle brings with it a
  number of improvements, including asynchronous requests, swappable HTTP
  handlers, PSR-7 compliance, better performance, and more.
- The PSR-7 package from the PHP-FIG (``psr/http-message``) defines interfaces
  for representing HTTP requests, HTTP responses, URLs, and streams. These
  interfaces are used across the SDK and Guzzle, which provides interoperability
  with other PSR-7 compliant packages.
- Guzzle's PSR-7 implementation (``guzzlehttp/psr7``) provides an implementation
  of the interfaces in PSR-7, as well as a number of helpful classes and
  functions to go along with it. Both the SDK and Guzzle 6 rely on this package
  heavily.
- Guzzle's `Promises/A+ <https://promisesaplus.com/>`_ implementation
  (``guzzlehttp/promises``) is used throughout the SDK and Guzzle to provide
  interfaces for managing asynchronous requests and coroutines. While Guzzle's
  multi-cURL HTTP handler ultimately implements the non-blocking I/O model that
  allows for asynchronous requests, this package provides the ability to program
  within that paradigm.
- The PHP implementation of JMESPath (``mtdowling/jmespath.php``) is used in the
  SDK to provide the data querying ability of the ``Aws\Result::search()`` and
  ``Aws\ResultPaginator::search()`` methods.

Region & Version Options Required
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

When instantiating a client, you must specify both the ``'region'`` and
``'version'`` options. In version 2 of the SDK, ``'version'`` was completely
optional, and ``'region'`` was sometimes optional. In version 3, both are always
required. Being explicit about both of these options allows you to lock into the
API version and region you are coding against. When new API versions are created
or new regions become available, you will be isolated from those changes until
you explicitly update your configuration.

Client Instantiation
~~~~~~~~~~~~~~~~~~~~

In version 3 of the SDK, the way you instantiate a client has changed. Instead
of the ``factory`` methods in version 2, you can simply instantiate a client
with the ``new`` keyword.

.. code-block:: php

    use Aws\DynamoDb\DynamoDbClient;

    // Version 2 style
    $client = DynamoDbClient::factory([
        'region'  => 'us-east-2'
    ]);

    // Version 3 style
    $client = new DynamoDbClient([
        'region'  => 'us-east-2',
        'version' => '2012-08-10'
    ]);

.. note::

    Instantiating a client using the ``factory()`` method still works, it is
    just considered deprecated.

Comparing Code Samples from Both SDKs
-------------------------------------

Example: Amazon S3 ListObjects Operation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

From Version 2 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: php

    <?php

    require '/path/to/vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    $s3 = S3Client::factory([
        'profile' => 'my-credential-profile',
        'region'  => 'us-east-1'
    ]);

    try {
        $result = $s3->listObjects([
            'Bucket' => 'my-bucket-name',
            'Key'    => 'my-object-key'
        ]);

        foreach ($result['Contents'] as $object) {
            echo $object['Key'] . "\n";
        }
    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }

From Version 3 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

Key differences:

- Use ``new`` instead of ``factory()`` to instantiate the client.
- The ``'version'`` option is required during instantiation.

.. code-block:: php

    <?php

    require '/path/to/vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    $s3 = new S3Client([
        'profile' => 'my-credential-profile',
        'region'  => 'us-east-1',
        'version' => '2006-03-01'
    ]);

    try {
        $result = $s3->listObjects([
            'Bucket' => 'my-bucket-name',
            'Key'    => 'my-object-key'
        ]);

        foreach ($result['Contents'] as $object) {
            echo $object['Key'] . "\n";
        }
    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }
