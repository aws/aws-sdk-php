===============
Command Objects
===============

The SDK uses the `command pattern <http://en.wikipedia.org/wiki/Command_pattern>`_
to encapsulate the parameters and handler that will be used to transfer an HTTP
request at a later point in time.

Implicit use of commands
------------------------

If you examine any client class, you will see that the methods corresponding to
API operations do not actually exist. They are implemented using the
``__call()`` magic method. These pseudo-methods are actually shortcuts that
encapsulate the SDK's use of command objects.

You do not typically need to interact with command objects directly. When you
call methods like ``Aws\S3\S3Client::putObject()``, the SDK actually creates an
``Aws\CommandInterface`` object based on the provided parameters, executes the
command, and returns a populated ``Aws\ResultInterface`` object (or throws an
exception on error). A similar flow occurs when calling any of the ``Async``
methods of a client (e.g., ``Aws\S3\S3Client::putObjectAsync()``): the client
creates a command based on the provided parameters, serializes an HTTP request,
initiates the request, and returns a promise.

The following examples are functionally equivalent:

.. code-block:: php

    $s3Client = new Aws\S3\S3Client([
        'version' => '2006-03-01',
        'region'  => 'us-standard'
    ]);

    $params = [
        'Bucket' => 'foo',
        'Key'    => 'baz',
        'Body'   => 'bar'
    ];

    // Using operation methods creates command implicitly.
    $result = $s3Client->putObject($params);

    // Using commands explicitly.
    $command = $s3Client->getCommand('PutObject', $params);
    $result = $s3Client->execute($command);

Command parameters
------------------

All commands support a few special parameters that are not part of a service's
API but instead control the SDK's behavior.

``@http``
~~~~~~~~~

Using this parameter, it's possible to fine tune how the underlying HTTP handler
executes the request. The options you can include in the ``@http`` parameter are
the same as the ones you can set when you instantiate the client with the
:ref:`"http" client option <config_http>`.

.. code-block:: php

    // Configures the command to be delayed by 500 milliseconds.
    $command['@http'] = [
        'delay' => 500,
    ];

``@retries``
~~~~~~~~~~~~

Like the :ref:`"retries" client option <config_retries>`, ``@retries`` controls
how many times a command may be retried before it is considered to have failed.
Set to ``0`` to disable retries.

.. code-block:: php

    // Disable retries
    $command['@retries'] = 0;

NB: If you have disabled retries on a client, you cannot selectively enable them
on individual commands passed to that client.

Creating command objects
------------------------

You can create a command using a client's ``getCommand()`` method. It does not
immediately execute or transfer an HTTP request, but is only executed when it is
passed to the ``execute()`` method of the client. This gives you the opportunity
to modify the command object before executing the command.

.. code-block:: php

    $command = $s3Client->getCommand('ListObjects');
    $command['MaxKeys'] = 50;
    $command['Prefix'] = 'foo/baz/';
    $result = $s3Client->execute($command);

    // You can also modify parameters
    $command = $s3Client->getCommand('ListObjects', [
        'MaxKeys' => 50,
        'Prefix'  => 'foo/baz/',
    ]);
    $command['MaxKeys'] = 100;
    $result = $s3Client->execute($command);

Command HandlerList
-------------------

When a command is created from a client, it is given a clone of the client's
``Aws\HandlerList`` object. The command is a given of a **clone** of the
client's handler list to allow a command to utilize custom middlewares and
handlers that do not affect other commands executed by the client.

What this means is that you can use a different HTTP client per/command
(e.g., ``Aws\MockHandler``) and add custom behavior per/command through
middleware. The following example uses a ``MockHandler`` to create mock results
instead of sending actual HTTP requests.

.. code-block:: php

    use Aws\Result;
    use Aws\MockHandler;

    // Create a mock handler.
    $mock = new MockHandler();
    // Enqueue a mock result to the handler.
    $mock->append(new Result(['foo' => 'bar']));
    // Create a "ListObjects" command.
    $command = $s3Client->getCommand('ListObjects');
    // Associate the mock handler with the command.
    $command->getHandlerList()->setHandler($mock);
    // Executing the command will use the mock handler, which will return the
    // mocked result object.
    $result = $client->execute($command);

    echo $result['foo']; // Outputs 'bar'

In addition to changing the handler used by the command, you can also inject
custom middleware to the command. The following example uses the ``tap``
middleware, which functions as an observer in the handler list.

.. code-block:: php

    use Aws\CommandInterface;
    use Aws\Middleware;
    use Psr\Http\Message\RequestInterface;

    $command = $s3Client->getCommand('ListObjects');
    $list = $command->getHandlerList();

    // Create a middleware that just dumps the command and request that is
    // about to be sent.
    $middleware = Middleware::tap(
        function (CommandInterface $command, RequestInterface $request) {
            var_dump($command->toArray());
            var_dump($request);
        }
    );

    // Append the middleware to the "sign" step of the handler list. The sign
    // step is the last step before transferring an HTTP request.
    $list->append('sign', $middleware);

    // Now transfer the command and see the var_dump data.
    $s3Client->execute($command);

.. _command_pool:

CommandPool
-----------

The ``Aws\CommandPool`` allows you to execute commands concurrently using a
iterator that yields ``Aws\CommandInterface`` objects. The ``CommandPool``
ensures that a constant number of commands are executed concurrently while
iterating over the commands in the pool (as commands complete, more are
executed to ensure a constant pool size).

Here's a very simple example of just sending a few commands using a
``CommandPool``.

.. code-block:: php

    use Aws\S3\S3Client;
    use Aws\CommandPool;

    // Create the client.
    $client = new S3Client([
        'region'  => 'us-standard',
        'version' => '2006-03-01'
    ]);

    $bucket = 'example';
    $commands = [
        $client->getCommand('HeadObject', ['Bucket' => $bucket, 'Key' => 'a']),
        $client->getCommand('HeadObject', ['Bucket' => $bucket, 'Key' => 'b']),
        $client->getCommand('HeadObject', ['Bucket' => $bucket, 'Key' => 'c'])
    ];

    $pool = new CommandPool($client, $commands);

    // Initiate the pool transfers
    $promise = $pool->promise();

    // Force the pool to complete synchronously
    $promise->wait();

That example is pretty underpowered for the ``CommandPool``. Let's try a more
complex example. Let's say you want to upload files on disk to an Amazon S3
bucket. To get a list of files from disk, we can use PHP's
``DirectoryIterator``. This iterator yields ``SplFileInfo`` objects. The
``CommandPool`` accepts an iterator that yields ``Aws\CommandInterface``
objects, so we will need to map over the ``SplFileInfo`` objects to return
``Aws\CommandInterface`` objects.

.. code-block:: php

    <?php
    require 'vendor/autoload.php';

    use Aws\Exception\AwsException;
    use Aws\S3\S3Client;
    use Aws\CommandPool;
    use Aws\CommandInterface;
    use Aws\ResultInterface;
    use GuzzleHttp\Promise\PromiseInterface;

    // Create the client.
    $client = new S3Client([
        'region'  => 'us-standard',
        'version' => '2006-03-01'
    ]);

    $fromDir = '/path/to/dir';
    $toBucket = 'my-bucket';

    // Create an iterator that yields files from a directory.
    $files = new DirectoryIterator($fromDir);

    // Create a generator that converts the SplFileInfo objects into
    // Aws\CommandInterface objects. This generator accepts the iterator that
    // yields files and the name of the bucket to upload the files to.
    $commandGenerator = function (\Iterator $files, $bucket) use ($client) {
        foreach ($files as $file) {
            // Skip "." and ".." files.
            if ($file->isDot()) {
                continue;
            }
            $filename = $file->getPath() . '/' . $file->getFilename();
            // Yield a command that will be executed by the pool.
            yield $client->getCommand('PutObject', [
                'Bucket' => $bucket,
                'Key'    => $file->getBaseName(),
                'Body'   => fopen($filename, 'r')
            ]);
        }
    };

    // Now create the generator using the files iterator.
    $commands = $commandGenerator($files, $toBucket);

    // Create a pool and provide an optional array of configuration.
    $pool = new CommandPool($client, $commands, [
        // Only send 5 files at a time (this is set to 25 by default).
        'concurrency' => 5,
        // Invoke this function before executing each command.
        'before' => function (CommandInterface $cmd, $iterKey) {
            echo "About to send {$iterKey}: "
                . print_r($cmd->toArray(), true) . "\n";
        },
        // Invoke this function for each successful transfer.
        'fulfilled' => function (
            ResultInterface $result,
            $iterKey,
            PromiseInterface $aggregatePromise
        ) {
            echo "Completed {$iterKey}: {$result}\n";
        },
        // Invoke this function for each failed transfer.
        'rejected' => function (
            AwsException $reason,
            $iterKey,
            PromiseInterface $aggregatePromise
        ) {
            echo "Failed {$iterKey}: {$reason}\n";
        },
    ]);

    // Initiate the pool transfers
    $promise = $pool->promise();

    // Force the pool to complete synchronously
    $promise->wait();

    // Or you can chain then calls off of the pool
    $promise->then(function() { echo "Done\n"; });

CommandPool configuration
~~~~~~~~~~~~~~~~~~~~~~~~~

The ``Aws\CommandPool`` constructor accepts various configuration options.

concurrency
    (callable|int) Maximum number of commands to execute concurrently.
    Provide a function to resize the pool dynamically. The function will be
    provided the current number of pending requests and is expected to return
    an integer representing the new pool size limit.

before
    (callable) function to invoke before sending each command. The before
    function accepts the command and the key of the iterator of the command.
    You can mutate the command as needed in the before function before sending
    the command.

fulfilled
    (callable) Function to invoke when a promise is fulfilled. The function is
    provided the result object, id of the iterator that the result came from,
    and the aggregate promise that can be resolved/rejected if you need to
    short-circuit the pool.

rejected
    (callable) Function to invoke when a promise is rejected. The function is
    provided an AwsException object, id of the iterator that the exception came
    from, and the aggregate promise that can be resolved/rejected if you need
    to short-circuit the pool.
