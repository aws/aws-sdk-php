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

The most common scenario is creating a pre-signed URL to GET an object. The
easiest way to do this is to use the ``getObjectUrl`` method of the Amazon S3
client. This same method can also be used to get an unsigned URL of a public
S3 object.

.. S3/Integration/S3_20060301_Test.php testGetObjectUrl

You can also create pre-signed URLs for any Amazon S3 operation using the
``getCommand`` method for creating a Guzzle command object and then calling the
``createPresignedUrl()`` method on the command.

.. S3/Integration/S3_20060301_Test.php testCreatePresignedUrlFromCommand

If you need more flexibility in creating your pre-signed URL, then you can
create a pre-signed URL for a completely custom
``Guzzle\Http\Message\RequestInterface`` object. You can use the ``get()``,
``post()``, ``head()``, ``put()``, and ``delete()`` methods of a client object
to easily create a Guzzle request object.

.. S3/Integration/S3_20060301_Test.php testCreatePresignedUrl
