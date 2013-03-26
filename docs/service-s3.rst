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

Cleaning up
-----------

Now that we've taken a tour of how you can use the Amazon S3 client, let's clean up any resources we may have created.

.. example:: S3/Integration/S3_20060301_Test.php testCleanUpBucket
