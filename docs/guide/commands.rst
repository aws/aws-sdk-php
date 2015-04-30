===============
Command Objects
===============

Command objects are useful for performing :ref:`performing operations
concurrently <concurrent_commands>`, using the command event system, and
sending asynchronous requests.


Typical SDK usage
-----------------


A peek under the hood
---------------------

If you examine a client class, you will see that the methods corresponding to
the operations do not actually exist. They are implemented using the
``__call()`` magic method behavior. These pseudo-methods are actually shortcuts
that encapsulate the SDK's — and the underlying Guzzle library's — use of
command objects.

For example, you could perform the same ``DescribeTable`` operation from the
preceding section using command objects:

.. code-block:: php

    $command = $dynamoDbClient->getCommand('DescribeTable', [
        'TableName' => 'YourTableName',
    ]);

    $result = $dynamoDbClient->execute($command);

A **Command** is an object that represents the execution of a service
operation. Command objects are an abstraction of the process of formatting a
request to a service, executing the request, receiving the response, and
formatting the results. Commands are created and executed by the client and
contain references to **Request** and **Response** objects.


Using command objects
---------------------

Using the magic-methods for performing operations is preferred for typical use
cases, but command objects provide greater flexibility and access to additional
data.


Manipulating command objects before execution
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

When you create a command using a client's ``getCommand()`` method, it does not
immediately execute. Because commands are lazily executed, it is possible to
pass the command object around and add or modify the parameters. The following
examples show how to work with command objects:

.. code-block:: php

    // You can add parameters after instantiation
    $command = $s3Client->getCommand('ListObjects');
    $command[MaxKeys'] = 50;
    $command['Prefix'] = 'foo/baz/';
    $result = $s3Client->execute($command);

    // You can also modify parameters
    $command = $s3Client->getCommand('ListObjects', [
        'MaxKeys' => 50,
        'Prefix'  => 'foo/baz/',
    ]);
    $command['MaxKeys'] = 100;
    $result = $s3Client->execute($command);

Take a look at the `API docs for commands
<http://docs.aws.amazon.com/aws-sdk-php/v3/api/GuzzleHttp/Command/Command.html>`_.
for more information on the PHP API.


.. _concurrent_commands:

Executing commands concurrently
-------------------------------

You can send commands concurrently using the asynchronous features of Guzzle.
Setting the ``@future`` option of a command to true will create a futue result
object that is completed asynchronously. This allows you to create multiple
futures and have them send HTTP request concurrently when the underlying HTTP
handler transfers the requests.

.. code-block:: php

    use Aws\S3\Exception\S3Exception;

    // Create a future result. This call returns almost immediately.
    $futureResult = $s3Client->listBuckets(['@future' => true]);

    // Do other stuff...
    // ...

    // Block until the result is ready.
    try {
        $result = $futureResult->wait();
    } catch (S3Exception $e) {
        echo $e->getMessage();
    }

When a future result is used in a blocking manner (whether by accessing the
result as a normal result object or explicitly calling the ``wait()`` method),
the result will complete and an exception could be raised if an error was
encountered while completing the request.

When using the SDK with an event loop library, you will not want to block on
results, but rather use the ``then()`` method of a result to access a promise
that is resolved or rejected when the operation completes.

.. code-block:: php

    $futureResult = $s3Client->listBuckets(['@future' => true]);
    $futureResult->then(
        function ($result) {
            echo 'Got a result: ' . var_export($result, true);
        },
        function ($error) {
            echo 'Got an error: ' . $error->getMessage();
        }
    );

If you want to send a large number of requests concurrently and wait until all
of the requests have completed, then you should use the ``executeAll`` method
of a client. The ``executeAll`` method takes an iterator or array that contains
command object and sends them concurrently using a fixed pool size. As commands
complete, more are added to the pool of requests.

.. code-block:: php

    use GuzzleHttp\Command\Event\ProcessEvent;

    $generator = function ($total) use ($s3Client) {
        while ($i-- > 0) {
            yield $s3Client->getCommand('ListBuckets');
        }
    };

    $s3Client->executeAll($generator(10), [
        'process' => function (ProcessEvent $e) {
            if ($e->getException()) {
                echo 'Got error: ' . $e->getException()->getMessage();
            } else {
                echo 'Got result: ' . var_export($e->getResult(), true);
            }
        }
    ]);
