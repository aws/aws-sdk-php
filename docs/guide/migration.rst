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

- Follows the `PSR-4 and PSR-7 standards <http://php-fig.org>`_
- Built on `Guzzle 6 <http://guzzlephp.org>`_.
  - Decoupled HTTP layer so that Guzzle 5 is also supported.
  - Swappable HTTP handlers, including non-cURL options like a PHP stream
    wrapper handler.
- Asynchronous requests.
  - Features like *waiters* and *multipart uploaders* can be used asynchronously.
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
  ``Aws\ResultPaginator::search()``.

====

.. note::

    The remainder of this guide is still being updated.

Required Regions & Versions
~~~~~~~~~~~~~~~~~~~~~~~~~~~

The `region <http://docs.aws.amazon.com/general/latest/gr/rande.html>`_ must be provided to instantiate a client
(except in the case where the service has a single endpoint like Amazon CloudFront). The AWS region you select may
affect both your performance and costs.

Client Instantiation
~~~~~~~~~~~~~~~~~~~~

Factory methods instantiate service clients and do the work of setting up the signature,
exponential backoff settings, exception handler, and so forth. At a minimum you must provide your access key, secret
key, and region to the client factory, but there are many other settings you can use to customize the client
behavior.

.. code-block:: php

    $dynamodb = Aws\DynamoDb\DynamoDbClient::factory(array(
        'key'    => 'your-aws-access-key-id',
        'secret' => 'your-aws-secret-access-key',
        'region' => 'us-west-2',
    ));

Client Configuration
~~~~~~~~~~~~~~~~~~~~

A global configuration file can be used to inject credentials into clients
automatically via the service builder. The service builder acts as a dependency injection container for the service
clients. (**Note:** The SDK does not automatically attempt to load the configuration file like in Version 1 of the
SDK.)

.. code-block:: php

    $aws = Aws\Common\Aws::factory('/path/to/custom/config.php');
    $s3 = $aws->get('s3');

This technique is the preferred way for instantiating service clients. Your ``config.php`` might look similar to the
following:

.. code-block:: php

    <?php
    return array(
        'includes' => array('_aws'),
        'services' => array(
            'default_settings' => array(
                'params' => array(
                    'key'    => 'your-aws-access-key-id',
                    'secret' => 'your-aws-secret-access-key',
                    'region' => 'us-west-2'
                )
            )
        )
    );

The line that says ``'includes' => array('_aws')`` includes the default configuration file packaged with the SDK. This
sets up all of the service clients for you so you can retrieve them by name with the ``get()`` method of the service
builder.

Iterators
~~~~~~~~~

The SDK provides iterator classes that make it easier to traverse results from list and describe type
operations. Instead of having to code solutions that perform multiple requests in a loop and keep track of tokens or
markers, the iterator classes do that for you. You can simply foreach over the iterator:

.. code-block:: php

    $objects = $s3->getIterator('ListObjects', array(
        'Bucket' => 'my-bucket-name'
    ));

    foreach ($objects as $object) {
        echo $object['Key'] . PHP_EOL;
    }

Comparing Code Samples from Both SDKs
-------------------------------------

Example 1 - Amazon S3 ListParts Operation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

From Version 1 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: php

    <?php

    require '/path/to/sdk.class.php';
    require '/path/to/config.inc.php';

    $s3 = new AmazonS3();

    $response = $s3->list_parts('my-bucket-name', 'my-object-key', 'my-upload-id', array(
        'max-parts' => 10
    ));

    if ($response->isOK())
    {
        // Loop through and display the part numbers
        foreach ($response->body->Part as $part) {
            echo "{$part->PartNumber}\n";
        }
    }
    else
    {
        echo "Error during S3 ListParts operation.\n";
    }

From Version 2 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: php

    <?php

    require '/path/to/vendor/autoload.php';

    use Aws\Common\Aws;
    use Aws\S3\Exception\S3Exception;

    $aws = Aws::factory('/path/to/config.php');
    $s3 = $aws->get('s3');

    try {
        $result = $s3->listParts(array(
            'Bucket'   => 'my-bucket-name',
            'Key'      => 'my-object-key',
            'UploadId' => 'my-upload-id',
            'MaxParts' => 10
        ));

        // Loop through and display the part numbers
        foreach ($result['Part'] as $part) {
            echo "{$part[PartNumber]}\n";
        }
    } catch (S3Exception $e) {
        echo "Error during S3 ListParts operation.\n";
    }

Example 2 - Amazon DynamoDB Scan Operation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

From Version 1 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: php

    <?php

    require '/path/to/sdk.class.php';
    require '/path/to/config.inc.php';

    $dynamo_db = new AmazonDynamoDB();

    $start_key = null;
    $people = array();

    // Perform as many Scan operations as needed to acquire all the names of people
    // that are 16 or older
    do
    {
        // Setup the parameters for the DynamoDB Scan operation
        $params = array(
            'TableName'       => 'people',
            'AttributesToGet' => array('id', 'age', 'name'),
            'ScanFilter'      => array(
                'age' => array(
                    'ComparisonOperator' =>
                        AmazonDynamoDB::CONDITION_GREATER_THAN_OR_EQUAL,
                    'AttributeValueList' => array(
                        array(AmazonDynamoDB::TYPE_NUMBER => '16')
                    )
                ),
            )
        );

        // Add the exclusive start key parameter if needed
        if ($start_key)
        {
            $params['ExclusiveStartKey'] = array(
                'HashKeyElement' => array(
                    AmazonDynamoDB::TYPE_STRING => $start_key
                )
            );

            $start_key = null;
        }

        // Perform the Scan operation and get the response
        $response = $dynamo_db->scan($params);

        // If the response succeeded, get the results
        if ($response->isOK())
        {
            foreach ($response->body->Items as $item)
            {
                $people[] = (string) $item->name->{AmazonDynamoDB::TYPE_STRING};
            }

            // Get the last evaluated key if it is provided
            if ($response->body->LastEvaluatedKey)
            {
                $start_key = (string) $response->body
                    ->LastEvaluatedKey
                    ->HashKeyElement
                    ->{AmazonDynamoDB::TYPE_STRING};
            }
        }
        else
        {
            // Throw an exception if the response was not OK (200-level)
            throw new DynamoDB_Exception('DynamoDB Scan operation failed.');
        }
    }
    while ($start_key);

    print_r($people);

From Version 2 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: php

    <?php

    require '/path/to/vendor/autoload.php';

    use Aws\Common\Aws;
    use Aws\DynamoDb\Enum\ComparisonOperator;
    use Aws\DynamoDb\Enum\Type;

    $aws = Aws::factory('/path/to/config.php');
    $dynamodb = $aws->get('dynamodb');

    // Create a ScanIterator and setup the parameters for the DynamoDB Scan operation
    $scan = $dynamodb->getIterator('Scan', array(
        'TableName'       => 'people',
        'AttributesToGet' => array('id', 'age', 'name'),
        'ScanFilter'      => array(
            'age' => array(
                'ComparisonOperator' => ComparisonOperator::GE,
                'AttributeValueList' => array(
                    array(Type::NUMBER => '16')
                )
            ),
        )
    ));

    // Perform as many Scan operations as needed to acquire all the names of people
    // that are 16 or older
    $people = array();
    foreach ($scan as $item) {
        $people[] = $item['name'][Type::STRING];
    }

    print_r($people);
