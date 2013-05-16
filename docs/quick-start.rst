===========
Quick Start
===========

Including the SDK
-----------------

No matter which :doc:`installation method <installation>` you are using, the SDK can be included into your project or
script with a single include (or require) statement. Please refer to the following table for the code that best fits
your installation method. Please replace any instances of ``/path/to/`` with the actual path on your system.

========================== =============================================================================================
Installation Method        Include Statement
========================== =============================================================================================
Using Composer             ``require '/path/to/vendor/autoload.php';``
-------------------------- ---------------------------------------------------------------------------------------------
Using the Phar             ``require '/path/to/aws.phar';``
-------------------------- ---------------------------------------------------------------------------------------------
Using the Zip              ``require '/path/to/aws-autoloader.php';``
-------------------------- ---------------------------------------------------------------------------------------------
Using PEAR                 ``require 'AWSSDKforPHP/aws.phar';``
========================== =============================================================================================

For the remainder of this guide, we will show examples that use the Composer installation method. If you are using a
different installation method, then you can refer to this section and substitute in the proper code.

Creating a client
-----------------

You can quickly get up and running by using a web service client's factory method to instantiate clients as needed.

.. code-block:: php

    <?php

    // Include the SDK using the Composer autoloader
    require 'vendor/autoload.php';

    use Aws\S3\S3Client;

    // Instantiate the S3 client with your AWS credentials and desired AWS region
    $client = S3Client::factory(array(
        'key'    => 'your-aws-access-key-id',
        'secret' => 'your-aws-secret-access-key',
    ));

**Note:** Instantiating a client without providing credentials causes the client to attempt to retrieve `IAM Instance
Profile credentials
<http://docs.amazonwebservices.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances>`_.

Commands
--------

You can then invoke service operations on the client by calling the operation name and providing an associative array
of parameters. Service operation methods like Amazon S3's ``createBucket()`` don't actually exist on a client. These
methods are implemented using the ``__call()`` magic method of a client. These magic methods are derived from a Guzzle
`service description <http://guzzlephp.org/guide/service/service_descriptions.html>`_ present in the
client's namespace in the ``Resources`` directory. You can use the `API documentation
<http://docs.amazonwebservices.com/aws-sdk-php-2/latest/>`_ or directly view the service description to see what
operations are available, what parameters can be set for an operation, what values are provided in the response model,
and what exceptions are thrown by calling the operation.

.. code-block:: php

    $bucket = 'my-bucket';

    $result = $client->createBucket(array(
        'Bucket' => $bucket
    ));

    // Wait until the bucket is created
    $client->waitUntil('BucketExists', array('Bucket' => $bucket));

.. _qs-executing-commands:

Executing commands
~~~~~~~~~~~~~~~~~~

Commands can be executed in two ways: using the shorthand syntax via the ``__call()`` magic methods (as shown in the
preceding example) or using the expanded syntax via the ``getCommand()`` method of the client object.

.. code-block:: php

    // The shorthand syntax (via __call())
    $result = $client->createBucket(array(/* ... */));

    // The expanded syntax (via getCommand())
    $command = $client->getCommand('CreateBucket', array(/* ... */));
    $result = $command->getResult();

When using the expanded syntax, a ``Command`` object is returned from ``getCommand()``, which encapsulates the request
and response of the HTTP request to AWS. From the ``Command`` object, you can call the ``getResult()`` method or the
``execute()`` method to execute the command and get the parsed result. Additionally, you can call the ``getRequest()``
and ``getResponse()`` methods (after the command has been executed) to get information about the request and response,
respectively (e.g., the status code or the raw response, headers sent in the request, etc.).

The ``Command`` object also supports a chainable syntax and can also be useful when you want to manipulate the request
before execution.

.. code-block:: php

    $result = $client->getCommand('ListObjects')
        ->set('MaxKeys', 50)
        ->set('Prefix', 'foo/baz/')
        ->getResult();

It also allows for executing multiple commands in parallel.

.. code-block:: php

    $ops = array();
    $ops[] = $client->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'Bar'));
    $ops[] = $client->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'Baz'));
    $client->execute($ops);

Response models
~~~~~~~~~~~~~~~

.. include:: _snippets/models-intro.txt

To learn more about how to work with models, please read the detailed guide to :doc:`feature-models`.

Using the service builder
-------------------------

When using the SDK, you have the option to use individual factory methods for each client or the ``Aws\Common\Aws``
class to build your clients. The ``Aws\Common\Aws`` class is a service builder and dependency injection container for
the SDK and is the recommended way for instantiating clients. The service builder allows you to share configuration
options between multiple services and pre-wires short service names with the appropriate client class.

The following example shows how to use the service builder to retrieve a ``Aws\DynamoDb\DynamoDbClient`` and perform the
``GetItem`` operation using the command syntax.

Passing an associative array of parameters as the first or second argument of ``Aws\Common\Aws::factory()`` treats the
parameters as shared across all clients generated by the builder. In the example, we tell the service builder to use the
same credentials for every client.

.. code-block:: php

    <?php

    require 'vendor/autoload.php';

    use Aws\Common\Aws;
    use Aws\Common\Enum\Region;
    use Aws\DynamoDb\Exception\DynamoDbException;

    // Create a service building using shared credentials for each service
    $aws = Aws::factory(array(
        'key'    => 'your-aws-access-key-id',
        'secret' => 'your-aws-secret-access-key',
        'region' => Region::US_WEST_2
    ));

    // Retrieve the DynamoDB client by its short name from the service builder
    $client = $aws->get('dynamodb');

    // Get an item from the "posts"
    try {
        $result = $client->getItem(array(
            'TableName' => 'posts',
            'Key' => $client->formatAttributes(array(
                'HashKeyElement' => 'using-dynamodb-with-the-php-sdk'
            )),
            'ConsistentRead' => true
        ));

        print_r($result['Item']);
    } catch (DynamoDbException $e) {
        echo 'The item could not be retrieved.';
    }

Passing an associative array of parameters to the first or second argument of ``Aws\Common\Aws::factory()`` will treat
the parameters as shared parameters across all clients generated by the builder. In the above example, we are telling
the service builder to use the same credentials for every client.

Error handling
--------------

An exception is thrown when an error is encountered. Be sure to use try/catch blocks when implementing error handling
logic in your applications. The SDK throws service specific exceptions when a server-side error occurs.

.. code-block:: php

    use Aws\Common\Aws;
    use Aws\S3\Exception\BucketAlreadyExistsException;

    $aws = Aws::factory('/path/to/my_config.json');
    $s3 = $aws->get('s3');

    try {
        $s3->createBucket(array('Bucket' => 'my-bucket'));
    } catch (BucketAlreadyExistsException $e) {
        echo 'That bucket already exists! ' . $e->getMessage() . "\n";
    }

The HTTP response to the ``createBucket()`` method will receive a ``409 Conflict`` response with a
``BucketAlreadyExists`` error code. When the SDK sees the error code it will attempt to throw a named exception that
matches the name of the HTTP response error code. You can see a full list of supported exceptions for each client by
looking in the Exception/ directory of a client namespace. For example, src/Aws/S3/Exception contains many different
exception classes::

    .
    ├── AccessDeniedException.php
    ├── AccountProblemException.php
    ├── AmbiguousGrantByEmailAddressException.php
    ├── BadDigestException.php
    ├── BucketAlreadyExistsException.php
    ├── BucketAlreadyOwnedByYouException.php
    ├── BucketNotEmptyException.php
    [...]

Waiters
-------

.. include:: _snippets/waiters-intro.txt

To learn more about how to use and configure waiters, please read the detailed guide to :doc:`feature-waiters`.

Iterators
---------

Some AWS operations will return a paginated result set that requires subsequent requests in order to retrieve an entire
result. The AWS SDK for PHP includes *iterators* that handle the process of sending subsequent requests. Use the
``getIterator()`` method of a client object in order to retrieve an iterator for a particular command.

.. code-block:: php

    $iterator = $client->getIterator('ListObjects', array('Bucket' => 'my-bucket'));

    foreach ($iterator as $object) {
        echo $object['Key'] . "\n";
    }

The ``getIterator()`` method accepts either a command object or the name of an operation as the first argument. The
second argument is only used when passing a string and instructs the client on what actual operation to execute.

.. code-block:: php

    $command = $client->getCommand('ListObjects', array('Bucket' => 'my-bucket'));
    $iterator = $client->getIterator($command);
