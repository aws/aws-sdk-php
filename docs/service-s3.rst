.. service:: s3

Creating a bucket
-----------------

Now that we've created a client object, let's create a bucket. This bucket will be used throughout the remainder of this
guide.

.. code-block:: php

    $client->createBucket(array('Bucket' => 'mybucket'));

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

.. code-block:: php

    use Aws\Common\Enum\Region;

    $client->createBucket(array(
        'Bucket'             => 'mybucket',
        'LocationConstraint' => Region::US_WEST_2
    ));

You'll notice in the above example that we are using the ``Aws\Common\Enum\Region`` object to provide the ``US_WEST_2``
constant. The SDK provides various Enum classes under the ``Aws\Common\Enum`` namespace that can be useful for
remembering available values and ensuring you do not enter a typo.

.. note::

    Using the enum classes is not required. You could have simply pass 'us-west-2' in the ``LocationConstraint`` key.

Waiting until the bucket exists
-------------------------------

Now that we've created a bucket, let's force our application to wait until the bucket exists. This can be done easily
using a *waiter*. The following snippet of code will poll the bucket until it exists or the maximum number of
polling attempts are completed.

.. code-block:: php

    $client->waitUntilBucketExists(array('Bucket' => 'mybucket'));

Uploading objects
-----------------

Now that you've created a bucket, let's put some data in it. The following example creates an object in your bucket
called data.txt that contains 'Hello!'.

.. code-block:: php

    $client->putObject(array(
        'Bucket' => 'mybucket',
        'Key'    => 'data.txt',
        'Body'   => 'Hello!'
    ));

The AWS SDK for PHP will attempt to automatically determine the most appropriate Content-Type header used to store the
object. If you are using a less common file extension and your Content-Type header is not added automatically, you can
add a Content-Type header by passing a ``ContentType`` option to the operation.

Uploading a file
~~~~~~~~~~~~~~~~

The above example uploaded text data to your object. You can alternatively upload the contents of a file by passing
the ``SourceFile`` option. Let's also put some metadata on the object.

.. code-block:: php

    $client->putObject(array(
        'Bucket'     => 'mybucket',
        'Key'        => 'data.txt',
        'SourceFile' => '/path/to/data.txt',
        'Metadata'   => array(
            'Foo' => 'abc',
            'Baz' => '123'
        )
    ));

Uploading from a stream
~~~~~~~~~~~~~~~~~~~~~~~

Alternatively, you can pass a resource returned from an ``fopen`` call to the ``Body`` parameter.

.. code-block:: php

    $client->putObject(array(
        'Bucket' => 'mybucket',
        'Key'    => 'data.txt',
        'Body'   => fopen('/path/to/data.txt', 'r+')
    ));

Because the AWS SDK for PHP is built around Guzzle, you can also pass an EntityBody object.

.. code-block:: php

    use Guzzle\Http\EntityBody;

    $client->putObject(array(
        'Bucket' => 'mybucket',
        'Key'    => 'data.txt',
        'Body'   => EntityBody::factory(fopen('/path/to/data.txt', 'r+'))
    ));

Listing your buckets
--------------------

You can list all of the buckets owned by your account using the ``listBuckets`` method.

.. code-block:: php

    $result = $client->listBuckets()->get('Buckets');

    foreach ($result['Buckets'] as $bucket) {
        echo "{$bucket['Name']} - {$bucket['CreationDate']}\n";
    }

All service operation calls using the AWS SDK for PHP return a ``Guzzle\Service\Resource\Model`` object. This object
contains all of the data returned from the service in a normalized array like object. The object also contains a
``get()`` method used to retrieve values from the model by name, and a ``getPath()`` method that can be used to
retrieve nested values.

.. code-block:: php

    $result = $client->listBuckets();
    $id = $result->getPath('Owner/ID');

Listing objects in your buckets
-------------------------------

Listing objects is a lot easier in the new SDK thanks to *iterators*. You can list all of the objects in a bucket using
the ``ListObjectsIterator``.

.. code-block:: php

    $iterator = $client->getIterator('ListObjects', array('Bucket' => 'mybucket'));

    foreach ($iterator as $object) {
        echo $object['Key'] . "\n";
    }

Iterators will handle sending any required subsequent requests when a response is truncated. The ListObjects iterator
works with other parameters too.

.. code-block:: php

    $iterator = $client->getIterator('ListObjects', array(
        'Bucket' => 'mybucket',
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

.. code-block:: php

    $result = $client->getObject(array(
        'Bucket' => 'mybucket',
        'Key'    => 'data.txt'
    ));

    echo get_class($result['Body']);
    // >>> Guzzle\Http\EntityBody
    echo $result['Body'];
    // >>> Hello!

The contents of the object are stored in the ``Body`` parameter of the model object. Other parameters are stored in
model including ``ContentType``, ``ContentLength``, ``VersionId``, ``ETag``, etc...

The ``Body`` parameter stores a reference to a ``Guzzle\Http\EntityBody`` object. The SDK will store the data in a
temporary PHP stream by default. This will work for most use-cases and will automatically protect your application from
attempting to download extremely large files into memory.

The EntityBody object has other nice features that allow you to read data using streams.

.. code-block:: php

    // Read the body off of the underlying stream
    $result['Body']->rewind();
    while ($data = $result['Body']->read(1024)) {
        echo $data;
    }

    // Cast the body to a primitive string (loads the entire contents into memory!)
    $bodyAsString = (string) $result['Body'];

Saving objects to a file
~~~~~~~~~~~~~~~~~~~~~~~~

You can save the contents of an object to a file by setting the SaveAs parameter.

.. code-block:: php

    $result = $client->getObject(array(
        'Bucket' => 'mybucket',
        'Key'    => 'data.txt',
        'SaveAs' => '/tmp/data.txt'
    ));

The ``SaveAs`` parameter will only work with versions of Guzzle >= 3.0.7. If you are using an older version of
Guzzle, you can set the ``command.response_body`` parameter to a valid ``Guzzle\Http\EntityBodyInterface`` object.

.. code-block:: php

    use Guzzle\Http\EntityBody;

    $result = $client->getObject(array(
        'Bucket'                => 'mybucket',
        'Key'                   => 'data.txt',
        'command.response_body' => EntityBody::factory(fopen('/tmp/data.txt', 'r+'))
    ));

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

Creating a pre-signed URL requires that you build a ``Guzzle\Http\Message\RequestInterface`` object. You can use the
``get()``, ``post()``, ``head()``, ``put()``, and ``delete()`` methods of a client object to easily create a request
object.

.. code-block:: php

    $disposition = "attachment; filename=\"{$key}\"";
    $url = "{$this->bucket}/{$key}?response-content-disposition={$disposition}"
    $request = $this->client->get($url);
    $signed = $this->client->createPresignedUrl($request, '+10 minutes');
