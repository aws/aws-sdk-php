=====================
Getting Started Guide
=====================

This "Getting Started Guide" focuses on basic usage of the **AWS SDK for PHP**.
After reading through this material, you should be familiar with the SDK and be
able to start using the SDK in your application. This guide assumes that you
have already :doc:`downloaded and installed the SDK <installation>` and
retrieved your `AWS access keys <http://aws.amazon.com/developers/access-keys/>`_.


Including the SDK
-----------------

No matter which technique you have used to to install the SDK, the SDK can be
included into your project or script with just a single ``require`` statement.
Please refer to the following table for the PHP code that best fits your
installation technique. Please replace any instances of ``/path/to/`` with the
actual path on your system.

========================== ===================================================
Installation Technique     Include Statement
========================== ===================================================
Using Composer             ``require '/path/to/vendor/autoload.php';``
-------------------------- ---------------------------------------------------
Using the Phar             ``require '/path/to/aws.phar';``
-------------------------- ---------------------------------------------------
Using the Zip              ``require '/path/to/aws-autoloader.php';``
========================== ===================================================

For the remainder of this guide, we will show examples that use the Composer
installation method. If you are using a different installation method, then you
can refer to this section and substitute in the proper code.


Creating a client
-----------------

You can create a client by passing an associative array of options to a
client constructor.

.. code-block:: php

    <?php
    // Include the SDK using the Composer autoloader
    require 'vendor/autoload.php';

    $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-west-2'
    ]);

Notice that we did **not** provide credentials to the client. That's because
the credentials should come from either
:ref:`environment variables <environment_credentials>` (via
``AWS_ACCESS_KEY_ID`` and ``AWS_SECRET_ACCESS_KEY``), an
:ref:`AWS credentials ini file <credential_profiles>` in your HOME
directory, AWS Identity and Access Management
:ref:`instance profile credentials <instance_profile_credentials>`, or
:ref:`credential providers <credential_provider>`. As a last resort, you can
hardcode your credentials by passing the ``key``, ``secret``, and ``token``
key value pairs in the ``credentials`` client configuration setting array.

All of the general client configuration options are described in detail in
the :doc:`configuration guide <configuration>`. The array of options provided
to a client may vary based on which client you are creating. These custom
client configuration options are described in the
`API documentation <http://docs.aws.amazon.com/aws-sdk-php/latest/>`_ of each
client.


Using the Sdk class
-------------------

The ``Aws\Sdk`` class is used to manage shared configuration options across
multiple clients. For example, the ``Aws\Sdk`` class will automatically ensure
that each client it creates shares the same RingPHP adapter, allowing the
clients to send future requests concurrently.

The same options that can be provided to a specific client constructor can also
be supplied to the ``Aws\Sdk`` class. These options are then applied to each
client constructor.

.. code-block:: php

    // Use the us-west-2 region and latest version of each client.
    $sharedConfig = [
        'region'  => 'us-west-2',
        'version' => 'latest'
    ];

    // Create an SDK class used to share configuration across clients.
    $sdk = new Aws\Sdk($sharedConfig);

    // Create an Amazon SQS client using the shared configuration data.
    $client = $sdk->createSqs();

Options that are shared across all clients are placed in root-level key value
pairs. Service specific configuration data can be provided in a key that is the
namespace of a service (e.g., "S3", "DynamoDb", etc.).

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

Service specific configuration values are a union of the service specific
values and the root-level values (i.e., service specific values are shallow
merged onto root level values).


Performing service operations
-----------------------------

.. include:: _snippets/performing-operations.txt

To learn about performing operations in more detail, including using command
objects, see :doc:`commands`.


Response objects
----------------

.. include:: _snippets/models-intro.txt

To learn more about how to work with modeled responses, read the detailed guide
to :doc:`response-objects`.


Error handling
--------------

When you preform an operation, and it succeeds, it will return a modeled
response. If there was an error with the request, then an exception is thrown.
For this reason, you should use ``try``/``catch`` blocks around your operations
if you need to handle errors in your code. The SDK throws service-specific
exceptions when a server-side error occurs.

In the following example, the ``Aws\S3\S3Client`` is used. If there is an
error, the exception thrown will be of the type ``Aws\S3\Exception\S3Exception``.

.. code-block:: php

    try {
        $s3Client->createBucket(array(
            'Bucket' => 'my-bucket'
        ));
    } catch (\Aws\S3\Exception\S3Exception $e) {
        // The bucket couldn't be created
        echo $e->getMessage();
    }

Exceptions thrown by the SDK like this all extend the
``ServiceResponseException`` class, which has some custom methods that might
help you discover what went wrong.


Paginators
----------

To learn more about how to use and configure iterators, please read the
detailed guide to :doc:`iterators`.


Waiters
-------

To learn more about how to use and configure waiters, please read the detailed
guide to :doc:`waiters`.
