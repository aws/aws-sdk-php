==========
Paginators
==========

Introduction
------------

Some AWS service operations are paginated and respond with truncated results.
For example, Amazon S3's ``ListObjects`` operation only returns up to 1000
objects at a time. Operations like these (typically prefixed with "list" or
"describe") require making subsequent requests with token (or marker) parameters
to retrieve the entire set of results.

**Paginators** are a feature of the SDK that act as an abstraction over
this process to make it easier for developers to use paginated APIs. A Paginator
is essentially an iterator of results. They are created via the
``getPaginator()`` method of the client. When you call ``getPaginator()``, you
must provide the name of the operation and the operation's arguments (in the
same way as when you execute an operation). You can iterate over a Paginator
object using ``foreach`` to get individual ``Aws\Result`` objects.

.. code-block:: php

    $results = $s3Client->getPaginator('ListObjects', ['Bucket' => 'my-bucket']);

    foreach ($results as $result) {
        foreach ($result['Contents'] as $object) {
            echo $object['Key'] . "\n";
        }
    }

Paginator Objects
-----------------

The actual object returned by ``getPaginator()`` method is an instance of the
``Aws\ResultPaginator`` class. This class implements PHP's native ``Iterator``
interface, which is why it works with ``foreach``. It can also be used with
iterator functions, like ``iterator_to_array``, and integrates well with
`SPL iterators <http://www.php.net/manual/en/spl.iterators.php>`_ like the
``LimitIterator`` object.

Paginator objects only hold one "page" of results at a time and are executed
lazily. This means that they make only as many requests as they need to yield
the current page of results. For example, The S3 ``ListObjects`` operation only
returns up to 1000 objects at a time, so if your bucket has ~10000 objects, then
the paginator would need to do 10 requests total. When you iterate through the
results, the first request is executed when you start iterating, the second in
the second iteration of the loop, and so forth.

Enumerating Data from Results
-----------------------------

Paginator objects have a method called ``search()``, which allows you to create
iterators for data within a set of results. When you call ``search()``, you must
provide a :doc:`JMESPath expression <jmespath>` to specify what data to extract.
Calling ``search()`` returns an iterator that yields the results of the
expression on each page of results. This is evaluated lazily, as you iterate
through the returned iterator.

The following example is equivalent to the preceding code sample, but uses the
``ResultPaginator::search()``, method to be more concise.

.. code-block:: php

    $results = $s3Client->getPaginator('ListObjects', ['Bucket' => 'my-bucket']);
    foreach ($results->search('Contents[].Key') as $key) {
        echo $key . "\n";
    }

You can also limit the number of items you want returned by using the second
argument of ``search()``.

.. code-block:: php

    $keys = $results->search('Contents[].Key', 2500);

JMESPath expressions allow you to do fairly complex things. For example, if you
wanted to print all of the object keys and common prefixes (i.e., do an ``ls``
of a bucket), you could do the following.

.. code-block:: php

    // List all prefixes ("directories") and objects ("files") in the bucket.
    $results = $s3Client->getPaginator('ListObjects', [
        'Bucket'    => 'my-bucket',
        'Delimiter' => '/'
    ]);
    foreach ($paginator->search('[CommonPrefixes[].Prefix, Contents[].Key][]') as $item) {
        echo $item . "\n";
    }
