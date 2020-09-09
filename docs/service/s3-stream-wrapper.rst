========================
Amazon S3 Stream Wrapper
========================

Introduction
------------

The Amazon S3 stream wrapper allows you to store and retrieve data from Amazon
S3 using built-in PHP functions like ``file_get_contents``, ``fopen``,
``copy``, ``rename``, ``unlink``, ``mkdir``, ``rmdir``, etc.

You need to register the Amazon S3 stream wrapper in order to use it:

.. code-block:: php

    $client = new Aws\S3\S3Client([/** options **/]);

    // Register the stream wrapper from an S3Client object
    $client->registerStreamWrapper();

This allows you to access buckets and objects stored in Amazon S3 using the
``s3://`` protocol. The "s3" stream wrapper accepts strings that contain a
bucket name followed by a forward slash and an optional object key or prefix:
``s3://<bucket>[/<key-or-prefix>]``.

.. note::

    The stream wrapper is designed for working with objects and buckets on which
    you have at least read permission. This means that your user should have
    permission to execute ``ListBucket`` on any buckets and ``GetObject`` on any
    object with which you need to interact. For use cases where you do not have
    this permission level, it is recommended that you use S3 client operations
    directly.

Downloading data
----------------

You can grab the contents of an object using ``file_get_contents``. Be careful
with this function though; it loads the entire contents of the object into
memory.

.. code-block:: php

    // Download the body of the "key" object in the "bucket" bucket
    $data = file_get_contents('s3://bucket/key');

Use ``fopen()`` when working with larger files or if you need to stream data
from Amazon S3.

.. code-block:: php

    // Open a stream in read-only mode
    if ($stream = fopen('s3://bucket/key', 'r')) {
        // While the stream is still open
        while (!feof($stream)) {
            // Read 1024 bytes from the stream
            echo fread($stream, 1024);
        }
        // Be sure to close the stream resource when you're done with it
        fclose($stream);
    }

.. note::

    File write errors are only returned when a call to ``fflush`` is made. These errors are not returned when an un-flushed ``fclose`` is called. The return value for ``fclose`` will be true if it closes the stream, regardless of any errors in response to its internal ``fflush``. These errors are also not returned when calling ``file_put_contents`` due to how it is implemented by PHP.

Opening Seekable streams
~~~~~~~~~~~~~~~~~~~~~~~~

Streams opened in "r" mode only allow data to be read from the stream, and are
not seekable by default. This is so that data can be downloaded from Amazon S3
in a truly streaming manner where previously read bytes do not need to be
buffered into memory. If you need a stream to be seekable, you can pass
``seekable`` into the `stream context options <http://www.php.net/manual/en/function.stream-context-create.php>`_
of a function.

.. code-block:: php

    $context = stream_context_create([
        's3' => ['seekable' => true]
    ]);

    if ($stream = fopen('s3://bucket/key', 'r', false, $context)) {
        // Read bytes from the stream
        fread($stream, 1024);
        // Seek back to the beginning of the stream
        fseek($stream, 0);
        // Read the same bytes that were previously read
        fread($stream, 1024);
        fclose($stream);
    }

Opening seekable streams allows you to seek only to bytes that were previously
read. You cannot skip ahead to bytes that have not yet been read from the
remote server. In order to allow previously read data to recalled, data is
buffered in a PHP temp stream using a stream decorator. When the amount of
cached data exceed 2MB, the data in the temp stream will transfer from memory
to disk. Keep this in mind when downloading large files from Amazon S3 using
the ``seekable`` stream context setting.

Uploading data
--------------

Data can be uploaded to Amazon S3 using ``file_put_contents()``.

.. code-block:: php

    file_put_contents('s3://bucket/key', 'Hello!');

You can upload larger files by streaming data using ``fopen()`` and a "w", "x",
or "a" stream access mode. The Amazon S3 stream wrapper does **not** support
simultaneous read and write streams (e.g. "r+", "w+", etc). This is because the
HTTP protocol does not allow simultaneous reading and writing.

.. code-block:: php

    $stream = fopen('s3://bucket/key', 'w');
    fwrite($stream, 'Hello!');
    fclose($stream);

.. note::

    Because Amazon S3 requires a Content-Length header to be specified before
    the payload of a request is sent, the data to be uploaded in a PutObject
    operation is internally buffered using a PHP temp stream until the stream
    is flushed or closed.

.. note::

    File write errors are only returned when a call to ``fflush`` is made. These errors are not returned when an un-flushed ``fclose`` is called. The return value for ``fclose`` will be true if it closes the stream, regardless of any errors in response to its internal ``fflush``. These errors are also not returned when calling ``file_put_contents`` due to how it is implemented by PHP.

fopen modes
-----------

PHP's `fopen() <http://php.net/manual/en/function.fopen.php>`_ function
requires that a ``$mode`` option is specified. The mode option specifies
whether or not data can be read or written to a stream and if the file must
exist when opening a stream. The Amazon S3 stream wrapper supports the
following modes:

= =============================================================================
r A read only stream where the file must already exist.
w A write only stream. If the file already exists it will be overwritten.
a A write only stream. If the file already exists, it will be downloaded to a
  temporary stream and any writes to
  the stream will be appended to any previously uploaded data.
x A write only stream. An error is raised if the file does not already exist.
= =============================================================================

Other object functions
----------------------

Stream wrappers allow many different built-in PHP functions to work with a
custom system like Amazon S3. Here are some of the functions that the Amazon S3
stream wrapper allows you to perform with objects stored in Amazon S3.

=============== ================================================================
unlink()        Delete an object from a bucket.

                .. code-block:: php

                    // Delete an object from a bucket
                    unlink('s3://bucket/key');

                You can pass in any options available to the ``DeleteObject``
                operation to modify how the object is deleted (e.g. specifying
                a specific object version).

                .. code-block:: php

                    // Delete a specific version of an object from a bucket
                    unlink('s3://bucket/key', stream_context_create([
                        's3' => ['VersionId' => '123']
                    ]);

filesize()      Get the size of an object.

                .. code-block:: php

                    // Get the Content-Length of an object
                    $size = filesize('s3://bucket/key', );

is_file()       Checks if a URL is a file.

                .. code-block:: php

                    if (is_file('s3://bucket/key')) {
                        echo 'It is a file!';
                    }

file_exists()   Checks if an object exists.

                .. code-block:: php

                    if (file_exists('s3://bucket/key')) {
                        echo 'It exists!';
                    }

filetype()      Checks if a URL maps to a file or bucket (dir).
file()          Load the contents of an object in an array of lines. You can
                pass in any options available to the ``GetObject`` operation to
                modify how the file is downloaded.
filemtime()     Get the last modified date of an object.
rename()        Rename an object by copying the object then deleting the
                original. You can pass in options available to the
                ``CopyObject`` and ``DeleteObject`` operations to the stream
                context parameters to modify how the object is copied and
                deleted.

=============== ================================================================

.. note::

    While ``copy`` will generally work with the S3 stream wrapper, some errors
    may not be properly reported due to the internals of the ``copy`` function
    in PHP. It is recommended that you use an instance of `Aws\S3\ObjectCopier
    <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.S3.ObjectCopier.html>`_
    instead.

Working with buckets
--------------------

You can modify and browse Amazon S3 buckets similar to how PHP allows the
modification and traversal of directories on your filesystem.

Here's an example of creating a bucket:

.. code-block:: php

    mkdir('s3://bucket');

You can pass in stream context options to the ``mkdir()`` method to modify how
the bucket is created using the parameters available to the `CreateBucket
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.S3.S3Client.html#_createBucket>`_
operation.

.. code-block:: php

    // Create a bucket in the EU region
    mkdir('s3://bucket', stream_context_create([
        's3' => ['LocationConstraint' => 'eu-west-1']
    ]);

You can delete buckets using the ``rmdir()`` function.

.. code-block:: php

    // Delete a bucket
    rmdir('s3://bucket');

.. note::

    A bucket can only be deleted if it is empty.

Listing the contents of a bucket
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The `opendir() <http://www.php.net/manual/en/function.opendir.php>`_,
`readdir() <http://www.php.net/manual/en/function.readdir.php>`_,
`rewinddir() <http://www.php.net/manual/en/function.rewinddir.php>`_, and
`closedir() <http://php.net/manual/en/function.closedir.php>`_ PHP functions
can be used with the Amazon S3 stream wrapper to traverse the contents of a
bucket. You can pass in parameters available to the
`ListObjects <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.S3.S3Client.html#_listObjects>`_
operation as custom stream context options to the ``opendir()`` function to
modify how objects are listed.

.. code-block:: php

    $dir = "s3://bucket/";

    if (is_dir($dir) && ($dh = opendir($dir))) {
        while (($file = readdir($dh)) !== false) {
            echo "filename: {$file} : filetype: " . filetype($dir . $file) . "\n";
        }
        closedir($dh);
    }

You can recursively list each object and prefix in a bucket using PHP's
`RecursiveDirectoryIterator <http://php.net/manual/en/class.recursivedirectoryiterator.php>`_.

.. code-block:: php

    $dir = 's3://bucket';
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

    foreach ($iterator as $file) {
        echo $file->getType() . ': ' . $file . "\n";
    }

Another way to list the contents of a bucket recursively that incurs fewer
HTTP requests, is to use the ``Aws\recursive_dir_iterator($path, $context = null)``
function.

.. code-block:: php

    <?php
    require 'vendor/autoload.php';

    $iter = Aws\recursive_dir_iterator('s3://bucket/key');
    foreach ($iter as $filename) {
        echo $filename . "\n";
    }

Stream context options
----------------------

You can customize the client used by the stream wrapper or the cache used to
cache previously loaded information about buckets and keys by passing in custom
stream context options.

The stream wrapper supports the following stream context options on every
operation:

``client``
    The ``Aws\AwsClientInterface`` object to use to execute commands.

``cache``
    An instance of ``Aws\CacheInterface`` to use to cache previously obtained
    file stats. The stream wrapper will use an in-memory LRU cache by default.
