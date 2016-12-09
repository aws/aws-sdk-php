========================
Amazon S3 Pre-Signed URL
========================

You can authenticate certain types of requests by passing the required
information as query-string parameters instead of using the Authorization HTTP
header. This is useful for enabling direct third-party browser access to your
private Amazon S3 data, without proxying the request. The idea is to construct
a "pre-signed" request and encode it as a URL that an end-user's browser can
retrieve. Additionally, you can limit a pre-signed request by specifying an
expiration time.


Creating a presigned request
----------------------------

You can get the pre-signed URL to an Amazon S3 object using the
``Aws\S3\S3Client::createPresignedRequest()`` method. This method accepts an
``Aws\CommandInterface`` object and expires timestamp and returns a pre-signed
``Psr\Http\Message\RequestInterface`` object. You can retrieve the pre-signed
URL of the object using the ``getUri()`` method of the request.

The most common scenario is creating a pre-signed URL to GET an object:

.. code-block:: php

    $s3Client = new Aws\S3\S3Client([
        'region'  => 'us-east-1',
        'version' => '2006-03-01',
    ]);

    $cmd = $s3Client->getCommand('GetObject', [
        'Bucket' => 'my-bucket',
        'Key'    => 'testKey'
    ]);

    $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');


Creating a presigned URL
------------------------

You can create pre-signed URLs for any Amazon S3 operation using the
``getCommand`` method for creating a command object and then calling the
``createPresignedRequest()`` method with the command. When ultimately sending
the request, be sure to use the same method and the same headers as the
returned request.

.. code-block:: php

    $cmd = $s3Client->getCommand('GetObject', [
        'Bucket' => 'my-bucket',
        'Key'    => 'testKey'
    ]);

    $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

    // Get the actual presigned-url
    $presignedUrl = (string) $request->getUri();


Getting the URL to an object
----------------------------

If you only need the public URL to an object stored in an Amazon S3 bucket,
then you can use the ``Aws\S3\S3Client::getObjectUrl()`` method. This method
returns an unsigned URL to the given bucket and key.

.. code-block:: php

    $url = $s3Client->getObjectUrl('my-bucket', 'my-key');

.. important::

    The URL returned by this method is not validated to ensure that the bucket
    or key exists, nor does this method ensure that the object allows
    unauthenticated access.
