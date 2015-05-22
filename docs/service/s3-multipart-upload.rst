===========================
Amazon S3 Multipart Uploads
===========================

With a single ``PutObject`` operation, you can upload objects up to 5 GB in
size. However, by using the multipart uploads (e.g., ``CreateMultipartUpload``,
``UploadPart``, ``CompleteMultipartUpload``, ``AbortMultipartUpload``), you can
upload object up to 5 TB in size.

Multipart uploads are designed to improve the upload experience for larger
objects. With it you can upload objects in parts that can be uploaded
independently, in any order, and in parallel. You can use a multipart upload
for objects from 5 MB to 5 TB in size.

Amazon S3 customers are encouraged to use multipart uploads for objects greater
than 100 MB.

The MultipartUploader object
----------------------------

The SDK has a special ``MultipartUploader`` object to make the multipart upload
process as easy as possible.

.. code-block:: php

    use Aws\S3\MultipartUploader;
    use Aws\Exception\MultipartUploadException;

    $uploader = new MultipartUploader($s3Client, '/path/to/large/file.zip', [
        'bucket' => 'your-bucket',
        'key'    => 'my-file.zip',
    ]);

    try {
        $uploader->upload();
        echo "Upload complete.\n";
    } catch (MultipartUploadException $e) {
        echo $e->getMessage() . "\n";
    }

Recovering from errors
----------------------

When an error occurs during the multipart upload process, a ``MultipartUploadException``
is thrown. This exception provides access to the ``UploadState`` object, which contains
information about the multipart upload's progress. The ``UploadState`` can be used to
resume an upload that failed to complete.

.. code-block:: php

    $source = '/path/to/large/file.zip';
    $uploader = new MultipartUploader($s3Client, $source, [
        'bucket' => 'your-bucket',
        'key'    => 'my-file.zip',
    ]);

    do {
        try {
            $result = $uploader->upload();
        } catch (MultipartUploadException $e) {
            $uploader = new MultipartUploader($s3Client, $source, [
                'state' => $e->getState(),
            ]);
        }
    } while (!isset($result));

``UploadState`` objects are also serializable, so it is possible to resume an
upload in a different process.

Aborting a multipart upload
~~~~~~~~~~~~~~~~~~~~~~~~~~~

Sometimes, you may not want to resume, though, and would rather just abort the
upload when an error occurs. This is also easy using the data contained in the
``UploadState`` object.

.. code-block:: php

    try {
        $result = $uploader->upload();
    } catch (MultipartUploadException $e) {
        // State contains the "Bucket", "Key", and "UploadId"
        $params = $e->getState()->getId();
        $result = $s3Client->abortMultipartUpload($params);
    }

Asynchronous multipart uploads
------------------------------

Calling ``upload()`` on the ``MultipartUploader`` is a blocking request. If you are
working in an asynchronous context, you can get a :doc:`Promise <guide/promises>`
for the multipart upload.

.. code-block:: php

    $source = '/path/to/large/file.zip';
    $uploader = new MultipartUploader($s3Client, $source, [
        'bucket' => 'your-bucket',
        'key'    => 'my-file.zip',
    ]);

    $promise = $uploader->promise();

Configuration
-------------

The ``MultipartUploader`` object constructor accepts the following arguments:

``$client``
    The ``Aws\ClientInterface`` object to use for performing the transfers.
    This should be an instance of ``Aws\S3\S3Client``.

``$source``
    The source data being uploaded. This can be a path or URL to a (e.g.,
    ``/path/to/file.jpg``), a resource handle (e.g., ``fopen('/path/to/file.jpg', 'r)``),
    or an instance of a `PSR-7 stream <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Psr.Http.Message.StreamInterface.html>`_

``$config``
    An associative array of configuration options for the multipart upload.

The following configuration options are valid:

**acl**
    (``string``) ACL to set on the object being upload. Objects are private by
    default.
**before_complete**
    (``callable``) Callback to invoke before the ``CompleteMultipartUpload``
    operation. The callback should have a function signature like
    ``function (Aws\Command $command) {...}``.
**before_initiate**
    (``callable``) Callback to invoke before the ``CreateMultipartUpload``
    operation. The callback should have a function signature like
    ``function (Aws\Command $command) {...}``.
**before_upload**
    (``callable``) Callback to invoke before any ``UploadPart`` operations. The
    callback should have a function signature like
    ``function (Aws\Command $command) {...}``.
**bucket**
    (``string``, *required*) Name of the bucket to which the object is being uploaded.
**concurrency**
    (``int``, *default*: ``int(5)``) Maximum number of concurrent ``UploadPart``
    operations allowed during the multipart upload.
**key**
    (``string``, *required*) Key to use for the object being uploaded.
**part_size**
    (``int``, *default*: ``int(5242880)``) Part size, in bytes, to use when doing a
    multipart upload. This must between 5 MB and 5 GB, inclusive.
**state**
    (``Aws\Multipart\UploadState``) An object that represents the state of the
    multipart upload and that is used to resume a previous upload. When this
    option is provided, the ``bucket``, ``key``, and ``part_size`` options
    are ignored.
