===============
Basic SDK Usage
===============

This guide focuses on basic usage patterns of the **AWS SDK for PHP**. This
guide assumes that you have already :doc:`downloaded and installed the SDK
<installation>` and retrieved your `AWS access keys
<http://aws.amazon.com/developers/access-keys/>`_.

Including the SDK
-----------------

No matter which technique you have used to to install the SDK, you can include
the SDK into your code with just a single ``require`` statement. Please refer to
the following table for the PHP code that best fits your installation technique.
Please replace any instances of ``/path/to/`` with the actual path on your system.

========================== =====================================================
Installation Technique     Require Statement
========================== =====================================================
Using Composer             ``require '/path/to/vendor/autoload.php';``
-------------------------- -----------------------------------------------------
Using the Phar             ``require '/path/to/aws.phar';``
-------------------------- -----------------------------------------------------
Using the Zip              ``require '/path/to/aws-autoloader.php';``
========================== =====================================================

For the remainder of this guide, we will show examples that assume the Composer
installation method. If you are using a different installation method, then you
can refer back to this section to substitute in the proper ``require`` code.

Usage Summary
-------------

The basic usage pattern of the SDK is that you instantiate a **Client** object
for the AWS service you want to interact with. Client objects have methods that
correspond one-to-one with operations in the service's API. To execute a
particular operation, you call its corresponding method, which either returns an
array-like **Result** object on success, or throws an **Exception** on failure.

Creating a client
-----------------

You can create a client by passing an associative array of options to a
client's constructor.

.. code-block:: php

    <?php
    // Include the SDK using the Composer autoloader
    require 'vendor/autoload.php';

    $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-east-1'
    ]);

Notice that we did **not** explicitly provide credentials to the client. That's
because the credentials should be detected by the SDK from either
:ref:`environment variables <environment_credentials>` (via
``AWS_ACCESS_KEY_ID`` and ``AWS_SECRET_ACCESS_KEY``), an
:ref:`AWS credentials INI file <credential_profiles>` in your HOME
directory, AWS Identity and Access Management (IAM)
:ref:`instance profile credentials <instance_profile_credentials>`, or
:ref:`credential providers <credential_provider>`.

All of the general client configuration options are described in detail in
the :doc:`configuration guide </guide/configuration>`. The array of options
provided to a client may vary based on which client you are creating. These
custom client configuration options are described in the
`API documentation <http://docs.aws.amazon.com/aws-sdk-php/latest/>`_ of each
client.

.. _sdk-class:

Using the Sdk class
-------------------

The ``Aws\Sdk`` class acts as a client factory and is used to manage shared
configuration options across multiple clients. The same options that can be
provided to a specific client constructor can also be supplied to the
``Aws\Sdk`` class. These options are then applied to each client constructor.

.. code-block:: php

    // Use the us-west-2 region and latest version of each client.
    $sharedConfig = [
        'region'  => 'us-west-2',
        'version' => 'latest'
    ];

    // Create an SDK class used to share configuration across clients.
    $sdk = new Aws\Sdk($sharedConfig);

    // Create an Amazon S3 client using the shared configuration data.
    $client = $sdk->createS3();

Options that are shared across all clients are placed in root-level key-value
pairs. Service-specific configuration data can be provided in a key that is the
same as the namespace of a service (e.g., "S3", "DynamoDb", etc.).

.. code-block:: php

    $sdk = new Aws\Sdk([
        'region'   => 'us-west-2',
        'version'  => 'latest',
        'DynamoDb' => [
            'region' => 'eu-central-1'
        ]
    ]);

    // Creating a DynamoDb client will use the "eu-central-1" region.
    $client = $sdk->createDynamoDb();

Service-specific configuration values are a union of the service-specific
values and the root-level values (i.e., service-specific values are
shallow-merged onto root level values).

.. tip::

    It is highly recommended that you use the ``Sdk`` class to create clients
    if you are utilizing multiple client instances in your application. The
    ``Sdk`` class will automatically utilize the same HTTP client for each SDK
    client, allowing SDK clients for different services to perform non-blocking
    HTTP requests. If the SDK clients do not use the same HTTP client, then
    HTTP requests sent by the SDK client may cause inter-service promise
    orchestration to block.

Executing service operations
----------------------------

You can execute a service operation by calling the method of the same name on
a client object. For example, to perform the Amazon S3 `PutObject operation
<http://docs.aws.amazon.com/AmazonS3/latest/API/RESTObjectPUT.html>`_, you must
call the ``Aws\S3\S3Client::putObject()`` method.

.. code-block:: php

    // Use an Aws\Sdk class to create the S3Client object.
    $s3Client = $sdk->createS3();

    // Send a PutObject request and get the result object.
    $result = $s3Client->putObject([
        'Bucket' => 'my-bucket',
        'Key'    => 'my-key',
        'Body'   => 'this is the body!'
    ]);

    // Download the contents of the object.
    $result = $s3Client->getObject([
        'Bucket' => 'my-bucket',
        'Key'    => 'my-key'
    ]);

    // Print the body of the result by indexing into the result object.
    echo $result['Body'];

Operations available to a client and the structure of the input and output are
defined at runtime based on a service description file. When creating a client,
you must provide a version (e.g., `"2006-03-01"` or `"latest"`). The SDK will
find the corresponding configuration file based on the provided version.

Operation methods like ``putObject()`` all accept a single argument -- an
associative array representing the parameters of the operation. The structure
of this array (and the structure of the result object) is defined for each
operation in the SDK's API Documentation (e.g., see the API docs for
`putObject operation <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#putobject>`__).

HTTP Handler Options
~~~~~~~~~~~~~~~~~~~~

It's also possible to fine tune how the underlying HTTP handler executes the
request by using the special ``@http`` parameter. The options you can include
in the ``@http`` parameter are the same as the ones you can set when you
instantiate the client with the :ref:`"http" client option <config_http>`.

.. code-block:: php

    // Send the request through a proxy.
    $result = $s3Client->putObject([
        'Bucket' => 'my-bucket',
        'Key'    => 'my-key',
        'Body'   => 'this is the body!',
        '@http'  => [
            'proxy' => 'http://192.168.16.1:10'
        ]
    ]);

Asynchronous Requests
---------------------

You can send commands concurrently using the asynchronous features of the SDK.
You can send requests asynchronously by suffixing an operation name with
``Async``. This will initiate the request and return a promise. The promise
will be fulfilled with the result object on success or rejected with an
exception on failure. This allows you to create multiple promises and
have them send HTTP requests concurrently when the underlying HTTP handler
transfers the requests.

.. code-block:: php

    $promise = $s3Client->listBucketsAsync();
    // Block until the result is ready.
    $result = $promise->wait();

You can force a promise to complete synchronously using the ``wait`` method of
the promise. Forcing the promise to complete will also "unwrap" the state of
the promise by default, meaning it will either return the result of the promise
or throw the exception that was encountered. When calling ``wait()`` on a
promise, the process will block until the HTTP request has completed and the
result has been populated or an exception is thrown.

When using the SDK with an event loop library, you will not want to block on
results, but rather use the ``then()`` method of a result to access a promise
that is resolved or rejected when the operation completes.

.. code-block:: php

    $promise = $s3Client->listBucketsAsync();
    $promise
        ->then(function ($result) {
            echo 'Got a result: ' . var_export($result, true);
        })
        ->otherwise(function ($reason) {
            echo 'Encountered an error: ' . $reason->getMessage();
        });

.. _result_objects:

Working with Result objects
---------------------------

Executing an successful operation will return an ``Aws\Result`` object. Instead
of returning the raw XML or JSON data of a service, the SDK coerces the response
data into an associative array structure and normalizes some aspects of the data
based on its knowledge of the specific service and the underlying response
structure.

You can access data from the result object like an associative PHP array.

.. code-block:: php

    // Use an Aws\Sdk class to create the S3Client object.
    $s3 = $sdk->createS3();
    $result = $s3->listBuckets();

    foreach ($result['Buckets'] as $bucket) {
        echo $bucket['Name'] . "\n";
    }

    // Convert the result object to a PHP array
    $array = $result->toArray();

The contents of the result object depends on the operation that was executed
and the version of a service. The result structure of each API operation is
documented in the API docs for each operation.

The SDK is integrated with `JMESPath <http://jmespath.org/>`_, a `DSL
<http://en.wikipedia.org/wiki/Domain-specific_language>`_ use to search and
manipulate JSON data, or PHP arrays, in our case. The result object contains a
``search()`` method that allows you to more declaratively extract data from the
result.

.. code-block:: php

    $s3 = $sdk->createS3();
    $result = $s3Client->listBuckets();
    // Get the name of each bucket
    $results = $result->search('Buckets[].Name');

Handling errors
---------------

Synchronous Error Handling
~~~~~~~~~~~~~~~~~~~~~~~~~~

If an error occurs while performing an operation, then an exception is thrown.
For this reason, you should use ``try``/``catch`` blocks around your operations
if you need to handle errors in your code. The SDK throws service-specific
exceptions when an error occurs.

In the following example, the ``Aws\S3\S3Client`` is used. If there is an
error, the exception thrown will be of the type ``Aws\S3\Exception\S3Exception``.
All service specific exceptions thrown by the SDK extend from the
``Aws\Exception\AwsException`` class. This class contains useful information
about the failure, including the request-id, error code, and error type.

.. code-block:: php

    use Aws\Exception\AwsException;
    use Aws\S3\Exception\S3Exception;

    try {
        $s3Client->createBucket(['Bucket' => 'my-bucket']);
    } catch (S3Exception $e) {
        // Catch an S3 specific exception.
        echo $e->getMessage();
    } catch (AwsException $e) {
        // This catches the more generic AwsException. You can grab information
        // from the exception using methods of the exception object.
        echo $e->getAwsRequestId() . "\n";
        echo $e->getAwsErrorType() . "\n";
        echo $e->getAwsErrorCode() . "\n";
    }

Async Error Handling
~~~~~~~~~~~~~~~~~~~~

Exceptions are not thrown when sending asynchronous requests. Instead, you must
use the ``then()`` or ``otherwise()`` methods of the returned promise to
receive the result or error.

.. code-block:: php

    $promise = $s3Client->createBucketAsync(['Bucket' => 'my-bucket']);

    $promise->otherwise(function ($reason) {
        var_dump($reason);
    });

    // This does the same thing as the "otherwise" function.
    $promise->then(null, function ($reason) {
        var_dump($reason);
    });

You can "unwrap" the promise and cause the exception to be thrown instead.

.. code-block:: php

    use Aws\S3\Exception\S3Exception;

    $promise = $s3Client->createBucketAsync(['Bucket' => 'my-bucket']);

    try {
        $result = $promise->wait();
    } catch (S3Exception $e) {
        echo $e->getMessage();
    }
