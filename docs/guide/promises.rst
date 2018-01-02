========
Promises
========

The AWS SDK for PHP uses **promises** to allow for asynchronous workflows, and
this asynchronicity allows HTTP requests to be sent concurrently. The promise
specification used by the SDK is `Promises/A+ <https://promisesaplus.com/>`_.

What is a promise?
------------------

A *promise* represents the eventual result of an asynchronous operation. The
primary way of interacting with a promise is through its ``then`` method, which
registers callbacks to receive either a promise's eventual value or the reason
why the promise cannot be fulfilled.

The AWS SDK for PHP relies on the `guzzlehttp/promises <https://github.com/guzzle/promises>`_
Composer package for its promises implementation. Guzzle promises support
blocking and non-blocking workflows and can be used with any non-blocking event
loop.

.. note::

    HTTP requests sent concurrently in the AWS SDK for PHP are done so using a
    single thread in which non-blocking calls are used to transfer one or more
    HTTP requests while reacting to state changes (e.g., fulfilling or
    rejecting promises).

Promises in the SDK
-------------------

Promises are used throughout the SDK. For example, promises are used in most
high level abstractions provided by the SDK: :ref:`paginators <async_paginators>`,
:ref:`waiters <async_waiters>`, :ref:`command pools <command_pool>`,
:doc:`multipart uploads <../service/s3-multipart-upload>`,
:doc:`Amazon S3 directory/bucket transfers <../service/s3-transfer>`, etc.

All of the clients provided by the SDK will return promises when you invoke any
of the ``Async`` suffixed methods. For example, the following code shows how to
create a promise for getting the results of an Amazon DynamoDB ``DescribeTable``
operation.

.. code-block:: php

    $client = new Aws\DynamoDb\DynamoDbClient([
        'region'  => 'us-west-2',
        'version' => 'latest',
    ]);

    // This will create a promise that will eventually contain a result
    $promise = $client->describeTableAsync(['TableName' => 'mytable']);

Notice that you can call either ``describeTable`` or ``describeTableAsync``.
These methods are magic ``__call`` methods on a client that are powered by the
API model and ``version`` number associated with the client. By calling methods
like ``describeTable`` without the ``Async`` suffix, the client will block
while it sends an HTTP request and either return an ``Aws\ResultInterface``
object or throw an ``Aws\Exception\AwsException``. By suffixing the operation
name with ``Async`` (i.e., ``describeTableAsync``) the client will create a
promise that is eventually fulfilled with and an ``Aws\ResultInterface``
object or rejected with an ``Aws\Exception\AwsException``.

.. important::

    When the promise is returned, the result may have already arrived (for
    example when using a mock handler) or the HTTP request may not have even
    been initiated.

You can register a callback with the promise using the ``then`` method. This
method accepts two callbacks ``$onFulfilled`` and ``$onRejected``, both of
which are optional. The ``$onFulfilled`` callback is invoked if the promise
is fulfilled, and the ``$onRejected`` callback is invoked if the promise is
rejected (meaning it failed).

.. code-block:: php

    $promise->then(
        function ($value) {
            echo "The promise was fulfilled with {$value}";
        },
        function ($reason) {
            echo "The promise was rejected with {$reason}";
        }
    );

Executing commands concurrently
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Multiple promises can be composed together such that they are executed
concurrently. This can be achieved by integrating the SDK with a non-blocking
event loop, or by building up multiple promises and waiting on them to complete
concurrently.

.. code-block:: php

    use GuzzleHttp\Promise;

    $sdk = new Aws\Sdk([
        'version' => 'latest',
        'region'  => 'us-west-2'
    ]);

    $s3 = $sdk->createS3();
    $ddb = $sdk->createDynamoDb();

    $promises = [
        'buckets' => $s3->listBucketsAsync(),
        'tables'  => $ddb->listTablesAsync(),
    ];

    // Wait on both promises to complete and return the results.
    $results = Promise\unwrap($promises);

    // Notice that this method will maintain the input array keys.
    var_dump($results['buckets']->toArray());
    var_dump($results['tables']->toArray());

.. tip::

    The :ref:`CommandPool <command_pool>` provide a more powerful
    mechanism for executing multiple API operations concurrently.

Chaining promises
-----------------

One of the best aspects of promises is that they are composable, allowing you
to create transformation pipelines. Promises are composed by chaining ``then``
callbacks with subsequent ``then`` callbacks. The return value of a ``then``
method is a promise that is fulfilled or rejected based on the result of the
provided callbacks.

.. code-block:: php

    $promise = $client->describeTableAsync(['TableName' => 'mytable']);

    $promise
        ->then(
            function ($value) {
                $value['AddedAttribute'] = 'foo';
                return $value;
            },
            function ($reason) use ($client) {
                // The call failed. You can recover from the error here and
                // return a value that will be provided to the next successful
                // then() callback. Let's retry the call.
                return $client->describeTableAsync(['TableName' => 'mytable']);
            }
        )->then(
            function ($value) {
                // This is only invoked when the previous then callback is
                // fulfilled. If the previous callback returned a promise, then
                // this callback is only invoked after that promise is
                // fulfilled.
                echo $value['AddedAttribute']; // outputs "foo"
            },
            function ($reason) {
                // The previous callback was rejected (failed).
            }
        );

.. note::

    The return value of a promise callback will be the ``$value`` argument that
    is supplied to downstream promises. If you wish to provide downstream
    promise chains a value, then you must return a value in the callback
    function.

Rejection forwarding
~~~~~~~~~~~~~~~~~~~~

You can register a callback to invoke when a promise is rejected. If an
exception is thrown in any callback, then the promise is rejected with the
exception and the next promises in the chain will be rejected with the
exception. If you return a value successfully from an ``$onRejected`` callback,
then the next promises in the promise chain will be fulfilled with the return
value from the ``$onRejected`` callback.

Waiting on promises
-------------------

You can synchronously force promises to complete using a promise's ``wait``
method.

.. code-block:: php

    $promise = $client->listTablesAsync();
    $result = $promise->wait();

If an exception is encountered while invoking the wait function of a promise,
the promise is rejected with the exception and the exception is thrown.

.. code-block:: php

    use Aws\Exception\AwsException;

    $promise = $client->listTablesAsync();

    try {
        $result = $promise->wait();
    } catch (AwsException $e) {
        // handle the error.
    }

Calling wait on a promise that has been fulfilled will not trigger the wait
function. It will simply return the previously delivered value.

.. code-block:: php

    $promise = $client->listTablesAsync();
    $result = $promise->wait();
    assert($result === $promise->wait());

Calling wait on a promise that has been rejected will throw an exception. If
the rejection reason is an instance of ``\Exception`` the reason is thrown.
Otherwise, a ``GuzzleHttp\Promise\RejectionException`` is thrown and the reason
can be obtained by calling the ``getReason`` method of the exception.

.. note::

    API operation calls in the SDK are rejected with subclasses of the
    ``Aws\Exception\AwsException`` class. However, it is possible that the
    reason delivered to a ``then`` method is different due to the addition of
    a custom middleware that alters a rejection reason.

Cancelling promises
-------------------

Promises can be cancelled using the ``cancel()`` method of a promise. If a
promise has already been resolved, then calling ``cancel()`` will have no
effect. Cancelling a promise will cancel the promise and any promises that are
awaiting delivery from the promise. A cancelled promise is rejected with a
``GuzzleHttp\Promise\RejectionException``.

Combining promises
------------------

You can combine promises into aggregate promises to build more sophisticated
workflows. The ``guzzlehttp/promise`` package contains various functions that
can be used to combine promises.

The API documentation for all of the promise collection functions can be found
at http://docs.aws.amazon.com/aws-sdk-php/v3/api/namespace-GuzzleHttp.Promise.html.

each and each_limit
~~~~~~~~~~~~~~~~~~~

Use the :ref:`CommandPool <command_pool>` when you have a task queue of
``Aws\CommandInterface`` commands to perform concurrently with a fixed pool
size (the commands can be in memory or yielded by a lazy iterator). The
CommandPool will ensure that a fixed number of commands are sent concurrently
until the supplied iterator is exhausted.

The CommandPool only works with commands that are executed by the same client.
You can use the ``GuzzleHttp\Promise\each_limit`` function to perform send
commands of different clients concurrently using a fixed pool size.

.. code-block:: php

    use GuzzleHttp\Promise;

    $sdk = new Aws\Sdk([
        'version' => 'latest',
        'region'  => 'us-west-2'
    ]);

    $s3 = $sdk->createS3();
    $ddb = $sdk->createDynamoDb();

    // Create a generator that yields promises.
    $promiseGenerator = function () use ($s3, $ddb) {
        yield $s3->listBucketsAsync();
        yield $ddb->listTablesAsync();
        // yield other promises as needed...
    };

    // Execute the tasks yielded by the generator concurrently while limit the
    // maximum number of concurrent promises to 5.
    $promise = Promise\each_limit($promiseGenerator(), 5);

    // Waiting on an EachPromise will wait on the entire task queue to complete.
    $promise->wait();

Promise coroutines
~~~~~~~~~~~~~~~~~~

One of the more powerful features of the Guzzle promises library is that it
allows you to use promise coroutines that make writing asynchronous workflows
seem more like writing more traditional synchronous workflows. In fact, the SDK
utilizes coroutine promises in most of the high level abstractions.

Imagine you wanted to create several buckets and upload a file to the bucket
when the bucket becomes available, and you'd like to do this all concurrently
so that it happens as fast as possible. This can be easily done by combining
multiple coroutine promises together using the ``all()`` promise function.

.. code-block:: php

    use GuzzleHttp\Promise;

    $uploadFn = function ($bucket) use ($s3Client) {
        return Promise\coroutine(function () use ($bucket, $s3Client) {
            // You can capture the result by yielding inside of parens
            $result = (yield $s3Client->createBucket(['Bucket' => $bucket]));
            // Wait on the bucket to be available.
            $waiter = $s3Client->getWaiter('BucketExists', ['Bucket' => $bucket]);
            // Wait until the bucket exists.
            yield $waiter->promise();
            // Upload a file to the bucket.
            yield $s3Client->putObjectAsync([
                'Bucket' => $bucket,
                'Key'    => '_placeholder',
                'Body'   => 'Hi!'
            ]);
        });
    };

    // Create the following buckets
    $buckets = ['foo', 'baz', 'bar'];
    $promises = [];

    // Build an array of promises.
    foreach ($buckets as $bucket) {
        $promises[] = $uploadFn($bucket);
    }

    // Aggregate the promises into a single "all" promise.
    $aggregate = Promise\all($promises);

    // You can then() off of this promise or synchronously wait.
    $aggregate->wait();
