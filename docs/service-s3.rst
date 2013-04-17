.. service:: S3

Creating a bucket
-----------------

Now that we've created a client object, let's create a bucket. This bucket will be used throughout the remainder of this
guide.

.. example:: S3/Integration/S3_20060301_Test.php testBucketAlreadyExists

If you run the above code example unaltered, you'll probably trigger the following exception::

    PHP Fatal error:  Uncaught Aws\S3\Exception\BucketAlreadyExistsException: AWS Error
    Code: BucketAlreadyExists, Status Code: 409, AWS Request ID: D94E6394791E98A4,
    AWS Error Type: client, AWS Error Message: The requested bucket name is not
    available. The bucket namespace is shared by all users of the system. Please select
    a different name and try again.

This is because bucket names in Amazon S3 reside in a global namespace. You'll need to change the actual name of the
bucket used in the examples of this tutorial in order for them to work correctly.

Creating a bucket in another region
-----------------------------------

The above example creates a bucket in the standard US-EAST-1 region. You can change the bucket location by passing a
``LocationConstraint`` value.

.. example:: S3/Integration/S3_20060301_Test.php testCreateBucketInRegion

You'll notice in the above example that we are using the ``Aws\Common\Enum\Region`` object to provide the ``US_WEST_2``
constant. The SDK provides various Enum classes under the ``Aws\Common\Enum`` namespace that can be useful for
remembering available values and ensuring you do not enter a typo.

.. note::

    Using the enum classes is not required. You could just pass 'us-west-2' in the ``LocationConstraint`` key.

Waiting until the bucket exists
-------------------------------

Now that we've created a bucket, let's force our application to wait until the bucket exists. This can be done easily
using a *waiter*. The following snippet of code will poll the bucket until it exists or the maximum number of
polling attempts are completed.

.. example:: S3/Integration/S3_20060301_Test.php testWaitUntilBucketExists

Uploading objects
-----------------

Now that you've created a bucket, let's put some data in it. The following example creates an object in your bucket
called data.txt that contains 'Hello!'.

.. example:: S3/Integration/S3_20060301_Test.php testPutObject

The AWS SDK for PHP will attempt to automatically determine the most appropriate Content-Type header used to store the
object. If you are using a less common file extension and your Content-Type header is not added automatically, you can
add a Content-Type header by passing a ``ContentType`` option to the operation.

Uploading a file
~~~~~~~~~~~~~~~~

The above example uploaded text data to your object. You can alternatively upload the contents of a file by passing
the ``SourceFile`` option. Let's also put some metadata on the object.

.. example:: S3/Integration/S3_20060301_Test.php testPutObjectFromFile

Uploading from a stream
~~~~~~~~~~~~~~~~~~~~~~~

Alternatively, you can pass a resource returned from an ``fopen`` call to the ``Body`` parameter.

.. example:: S3/Integration/S3_20060301_Test.php testPutObjectFromStream

Because the AWS SDK for PHP is built around Guzzle, you can also pass an EntityBody object.

.. example:: S3/Integration/S3_20060301_Test.php testPutObjectFromEntityBody

Listing your buckets
--------------------

You can list all of the buckets owned by your account using the ``listBuckets`` method.

.. example:: S3/Integration/S3_20060301_Test.php testListBuckets

All service operation calls using the AWS SDK for PHP return a ``Guzzle\Service\Resource\Model`` object. This object
contains all of the data returned from the service in a normalized array like object. The object also contains a
``get()`` method used to retrieve values from the model by name, and a ``getPath()`` method that can be used to
retrieve nested values.

.. example:: S3/Integration/S3_20060301_Test.php testListBucketsWithGetPath

Listing objects in your buckets
-------------------------------

Listing objects is a lot easier in the new SDK thanks to *iterators*. You can list all of the objects in a bucket using
the ``ListObjectsIterator``.

.. example:: S3/Integration/S3_20060301_Test.php testListObjectsWithIterator

Iterators will handle sending any required subsequent requests when a response is truncated. The ListObjects iterator
works with other parameters too.

.. code-block:: php

    $iterator = $client->getIterator('ListObjects', array(
        'Bucket' => $bucket,
        'Prefix' => 'foo'
    ));

    foreach ($iterator as $object) {
        echo $object['Key'] . "\n";
    }

You can convert any iterator to an array using the ``toArray()`` method of the iterator.

.. note::

    Converting an iterator to an array will load the entire contents of the iterator into memory.

Downloading objects
-------------------

You can use the ``GetObject`` operation to download an object.

.. example:: S3/Integration/S3_20060301_Test.php testGetObject

The contents of the object are stored in the ``Body`` parameter of the model object. Other parameters are stored in
model including ``ContentType``, ``ContentLength``, ``VersionId``, ``ETag``, etc...

The ``Body`` parameter stores a reference to a ``Guzzle\Http\EntityBody`` object. The SDK will store the data in a
temporary PHP stream by default. This will work for most use-cases and will automatically protect your application from
attempting to download extremely large files into memory.

The EntityBody object has other nice features that allow you to read data using streams.

.. example:: S3/Integration/S3_20060301_Test.php testGetObjectUsingEntityBody

Saving objects to a file
~~~~~~~~~~~~~~~~~~~~~~~~

You can save the contents of an object to a file by setting the SaveAs parameter.

.. example:: S3/Integration/S3_20060301_Test.php testGetObjectWithSaveAs

Uploading large files using multipart uploads
---------------------------------------------

Amazon S3 allows you to uploads large files in pieces. The AWS SDK for PHP provides an abstraction layer that makes it
easier to upload large files using multipart upload.

.. code-block:: php

    use Aws\Common\Enum\Size;
    use Aws\Common\Exception\MultipartUploadException;
    use Aws\S3\Model\MultipartUpload\UploadBuilder;

    $uploader = UploadBuilder::newInstance()
        ->setClient($client)
        ->setSource('/path/to/large/file.mov')
        ->setBucket('mybucket')
        ->setKey('my-object-key')
        ->setOption('Metadata', array('Foo' => 'Bar')),
        ->setOption('CacheControl', 'max-age=3600')
        ->build();

    // Perform the upload. Abort the upload if something goes wrong
    try {
        $uploader->upload();
        echo "Upload complete.\n";
    } catch (MultipartUploadException $e) {
        $uploader->abort();
        echo "Upload failed.\n";
    }

You can attempt to upload parts in parallel by specifying the concurrency option on the UploadBuilder object. The
following example will create a transfer object that will attempt to upload three parts in parallel until the entire
object has been uploaded.

.. code-block:: php

    $uploader = UploadBuilder::newInstance()
        ->setClient($client)
        ->setSource('/path/to/large/file.mov')
        ->setBucket('mybucket')
        ->setKey('my-object-key')
        ->setConcurrency(3)
        ->build();

Setting ACLs and Access Control Policies
----------------------------------------

You can specify a canned ACL on an object when uploading:

.. code-block:: php

    $client->putObject(array(
        'Bucket'     => 'mybucket',
        'Key'        => 'data.txt',
        'SourceFile' => '/path/to/data.txt',
        'ACL'        => 'public-read'
    ));

You can use the ``Aws\S3\Enum\CannedAcl`` object to provide canned ACL constants:

.. code-block:: php

    use Aws\S3\Enum\CannedAcl;

    $client->putObject(array(
        'Bucket'     => 'mybucket',
        'Key'        => 'data.txt',
        'SourceFile' => '/path/to/data.txt',
        'ACL'        => CannedAcl::PUBLIC_READ
    ));

You can specify more complex ACLs using the ``ACP`` parameter when sending PutObject, CopyObject, CreateBucket,
CreateMultipartUpload, PutBucketAcl, PutObjectAcl, and other operations that accept a canned ACL. Using the ``ACP``
parameter allows you specify more granular access control policies using a ``Aws\S3\Model\Acp`` object. The easiest
way to create an Acp object is through the ``Aws\S3\Model\AcpBuilder``.

.. code-block:: php

    use Aws\S3\Enum\Permission;
    use Aws\S3\Enum\Group;
    use Aws\S3\Model\AcpBuilder;

    $acp = AcpBuilder::newInstance()
        ->setOwner($myOwnerId)
        ->addGrantForEmail(Permission::READ, 'test@example.com')
        ->addGrantForUser(Permission::FULL_CONTROL, 'user-id')
        ->addGrantForGroup(Permission::READ, Group::AUTHENTICATED_USERS)
        ->build();

    $client->putObject(array(
        'Bucket'     => 'mybucket',
        'Key'        => 'data.txt',
        'SourceFile' => '/path/to/data.txt',
        'ACP'        => $acp
    ));

Creating a Pre-Signed URL
-------------------------

You can authenticate certain types of requests by passing the required information as query-string parameters instead
of using the Authorization HTTP header. This is useful for enabling direct third-party browser access to your private
Amazon S3 data, without proxying the request. The idea is to construct a "pre-signed" request and encode it as a URL
that an end-user's browser can retrieve. Additionally, you can limit a pre-signed request by specifying an expiration
time.

You can create a presigned URL for any Amazon S3 operation using the ``getCommand`` method for creating a Guzzle
command object and then calling the ``createPresignedUrl()`` method on the command.

.. example:: S3/Integration/S3_20060301_Test.php testCreatePresignedUrlFromCommand

If you need more flexibility in creating your pre-signed URL, then you can create a pre-signed URL for a completely
custom ``Guzzle\Http\Message\RequestInterface`` object. You can use the ``get()``, ``post()``, ``head()``, ``put()``,
and ``delete()`` methods of a client object to easily create a Guzzle request object.

.. example:: S3/Integration/S3_20060301_Test.php testCreatePresignedUrl

Amazon S3 stream wrapper
------------------------

The Amazon S3 stream wrapper allows you to store and retrieve data from Amazon S3 using built-in PHP functions like
``file_get_contents``, ``fopen``, ``copy``, ``rename``, ``unlink``, ``mkdir``, ``rmdir``, etc.

You need to register the Amazon S3 stream wrapper in order to use it:

.. code-block:: php

    // Register the stream wrapper from an S3Client object
    $client->registerStreamWrapper();

This allows you to access buckets and objects stored in Amazon S3 using the ``s3://`` protocol. The "s3" stream wrapper
accepts strings that contain a bucket name followed by a forward slash and an optional object key or prefix:
``s3://<bucket>[/<key-or-prefix>]``.

Downloading data
~~~~~~~~~~~~~~~~

You can grab the contents of an object using ``file_get_contents``. Be careful with this function though; it loads the
entire contents of the object into memory.

.. code-block:: php

    // Download the body of the "key" object in the "bucket" bucket
    $data = file_get_contents('s3://bucket/key');

Use ``fopen()`` when working with larger files or if you need to stream data from Amazon S3.

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

Opening Seekable streams
^^^^^^^^^^^^^^^^^^^^^^^^

Streams opened in "r" mode only allow data to be read from the stream, and are not seekable by default. This is so that
data can be downloaded from Amazon S3 in a truly streaming manner where previously read bytes do not need to be
buffered into memory. If you need a stream to be seekable, you can pass ``seekable`` into the `stream context
options <http://www.php.net/manual/en/function.stream-context-create.php>`_ of a function.

.. code-block:: php

    $context = stream_context_create(array(
        's3' => array(
            'seekable' => true
        )
    ));

    if ($stream = fopen('s3://bucket/key', 'r', false, $context)) {
        // Read bytes from the stream
        fread($stream, 1024);
        // Seek back to the beginning of the stream
        fseek($steam, 0);
        // Read the same bytes that were previously read
        fread($stream, 1024);
        fclose($stream);
    }

Opening seekable streams allows you to seek only to bytes that were previously read. You cannot skip ahead to bytes
that have not yet been read from the remote server. In order to allow previously read data to recalled, data is
buffered in a PHP temp stream using Guzzle's
`CachingEntityBody <https://github.com/guzzle/guzzle/blob/master/src/Guzzle/Http/CachingEntityBody.php>`_ decorator.
When the amount of cached data exceed 2MB, the data in the temp stream will transfer from memory to disk. Keep this in
mind when downloading large files from Amazon S3 using the ``seekable`` stream context setting.

Uploading data
~~~~~~~~~~~~~~

Data can be uploaded to Amazon S3 using ``file_put_contents()``.

.. code-block:: php

    file_put_contents('s3://bucket/key', 'Hello!');

You can upload larger files by streaming data using ``fopen()`` and a "w", "x", or "a" stream access mode. The Amazon
S3 stream wrapper does **not** support simultaneous read and write streams (e.g. "r+", "w+", etc). This is because the
HTTP protocol does not allow simultaneous reading and writing.

.. code-block:: php

    $stream = fopen('s3://bucket/key', 'w');
    fwrite($stream, 'Hello!');
    fclose($stream);

.. note::

    Because Amazon S3 requires a Content-Length header to be specified before the payload of a request is sent, the
    data to be uploaded in a PutObject operation is internally buffered using a PHP temp stream until the stream is
    flushed or closed.

fopen modes
~~~~~~~~~~~

PHP's `fopen() <http://php.net/manual/en/function.fopen.php>`_ function requires that a ``$mode`` option is specified.
The mode option specifies whether or not data can be read or written to a stream and if the file must exist when
opening a stream. The Amazon S3 stream wrapper supports the following modes:

= ======================================================================================================================
r A read only stream where the file must already exist.
w A write only stream. If the file already exists it will be overwritten.
a A write only stream. If the file already exists, it will be downloaded to a temporary stream and any writes to
  the stream will be appended to any previously uploaded data.
x A write only stream. An error is raised if the file does not already exist.
= ======================================================================================================================

Other object functions
~~~~~~~~~~~~~~~~~~~~~~

Stream wrappers allow many different built-in PHP functions to work with a custom system like Amazon S3. Here are some
of the functions that the Amazon S3 stream wrapper allows you to perform with objects stored in Amazon S3.

=============== ========================================================================================================
unlink()        Delete an object from a bucket.

                .. code-block:: php

                    // Delete an object from a bucket
                    unlink('s3://bucket/key');

                You can pass in any options available to the ``DeleteObject`` operation to modify how the object is
                deleted (e.g. specifying a specific object version).

                .. code-block:: php

                    // Delete a specific version of an object from a bucket
                    unlink('s3://bucket/key', stream_context_create(array(
                        's3' => array('VersionId' => '123')
                    ));

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
file()          Load the contents of an object in an array of lines. You can pass in any options available to the
                ``GetObject`` operation to modify how the file is downloaded.
filemtime()     Get the last modified date of an object.
rename()        Rename an object by copying the object then deleting the original. You can pass in options available to
                the ``CopyObject`` and ``DeleteObject`` operations to the stream context parameters to modify how the
                object is copied and deleted.
copy()          Copy an object from one location to another. You can pass options available to the ``CopyObject``
                operation into the stream context options to modify how the object is copied.

                .. code-block:: php

                    // Copy a file on Amazon S3 to another bucket
                    copy('s3://bucket/key', 's3://other_bucket/key');

=============== ========================================================================================================

Working with buckets
~~~~~~~~~~~~~~~~~~~~

You can modify and browse Amazon S3 buckets similar to how PHP allows the modification and traversal of directories on
your filesystem.

Here's an example of creating a bucket:

.. code-block:: php

    mkdir('s3://bucket');

You can pass in stream context options to the ``mkdir()`` method to modify how the bucket is created using the
parameters available to the
`CreateBucket <http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.S3.S3Client.html#_createBucket>`_ operation.

.. code-block:: php

    // Create a bucket in the EU region
    mkdir('s3://bucket', stream_context_create(array(
        's3' => array(
            'LocationConstraint' => 'eu-west-1'
        )
    ));

You can delete buckets using the ``rmdir()`` function.

.. code-block:: php

    // Delete a bucket
    rmdir('s3://bucket');

.. note::

    A bucket can only be deleted if it is empty.

Listing the contents of a bucket
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

The `opendir() <http://www.php.net/manual/en/function.opendir.php>`_,
`readdir() <http://www.php.net/manual/en/function.readdir.php>`_,
`rewinddir() <http://www.php.net/manual/en/function.rewinddir.php>`_, and
`closedir() <http://php.net/manual/en/function.closedir.php>`_ PHP functions can be used with the Amazon S3 stream
wrapper to traverse the contents of a bucket. You can pass in parameters available to the
`ListObjects <http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.S3.S3Client.html#_listObjects>`_ operation as
custom stream context options to the ``opendir()`` function to modify how objects are listed.

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

Another easy way to list the contents of the bucket is using the
`Symfony2 Finder component <http://symfony.com/doc/master/components/finder.html>`_.

.. code-block:: php

    <?php

    require 'vendor/autoload.php';

    use Symfony\Component\Finder\Finder;

    $aws = Aws\Common\Aws::factory('/path/to/config.json');
    $s3 = $aws->get('s3')->registerStreamWrapper();

    $finder = new Finder();

    // Get all files and folders (key prefixes) from "bucket" that are less than 100k
    // and have been updated in the last year
    $finder->in('s3://bucket')
        ->size('< 100K')
        ->date('since 1 year ago');

    foreach ($finder as $file) {
        echo $file->getType() . ": {$file}\n";
    }

Cleaning up
-----------

Now that we've taken a tour of how you can use the Amazon S3 client, let's clean up any resources we may have created.

.. example:: S3/Integration/S3_20060301_Test.php testCleanUpBucket
