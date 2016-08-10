===
FAQ
===


What methods are available on a client?
---------------------------------------

The AWS SDK for PHP utilizes service descriptions and dynamic
`magic __call() methods <http://www.php.net/manual/en/language.oop5.overloading.php#object.call>`_
to execute API operations. You can find a full list of methods available for a
web service client in the `API documentation <http://docs.aws.amazon.com/aws-sdk-php/v3/api/index.html>`_
of the client.


What do I do about a cURL SSL certificate error?
------------------------------------------------

This issue can occur when using an out of date CA bundle with cURL and SSL. You
can get around this issue by updating the CA bundle on your server or
downloading a more up to date CA bundle from the
`cURL website directly <http://curl.haxx.se/docs/caextract.html>`_.

The SDK will by default use the CA bundle that is configured when PHP is
compiled. You can change the default CA bundle used by PHP by modifying the
``openssl.cafile`` PHP ini configuration setting to be set to the path a CA
file on disk.


What API versions are available for a client?
---------------------------------------------

A ``version`` option is required when creating a client. A list of available
API versions can be found on each client's API documentation page:
http://docs.aws.amazon.com/aws-sdk-php/v3/api/index.html. If you are unable to
load a specific API version, then you may need to update your copy of the SDK.

You may provide the string ``latest`` to the "version" configuration value to
utilize the most recent available API version that your client's API provider
can find (the default api_provider will scan the ``src/data`` directory of the
SDK for API models).

.. warning::

    Using ``latest`` in a production application is not recommended because
    pulling in a new minor version of the SDK that includes an API update could
    break your production application.


What regions versions are available for a client?
-------------------------------------------------

A ``region`` option is required when creating a client, and is specified using
a string value. A list of available regions an endpoints can be found at:
http://docs.aws.amazon.com/general/latest/gr/rande.html

.. code-block:: php

    // Set the region to the EU (Frankfurt) region.
    $s3 = new Aws\S3\S3Client([
        'region'  => 'eu-central-1',
        'version' => '2006-03-01'
    ]);


Why can't I upload or download files greater than 2GB?
------------------------------------------------------

Because PHP's integer type is signed and many platforms use 32-bit integers, the
AWS SDK for PHP does not correctly handle files larger than 2GB on a 32-bit
stack (where "stack" includes CPU, OS, web server, and PHP binary). This is a
`well-known PHP issue <http://www.google.com/search?q=php+2gb+32-bit>`_. In the
case of Microsoft® Windows®, only builds of PHP 7 support 64-bit integers.

The recommended solution is to use a `64-bit Linux stack <http://aws.amazon.com/amazon-linux-ami/>`_,
such as the 64-bit Amazon Linux AMI with the latest version of PHP installed.

For more information, please see: `PHP filesize: Return values <http://docs.php.net/manual/en/function.filesize.php#refsect1-function.filesize-returnvalues>`_.


How can I see what data is sent over the wire?
----------------------------------------------

You can get debug information, including the data sent over the wire, using the
``debug`` option in a client constructor. When this option is set to ``true``
all of the mutations of the command being executed, the request being sent, the
response being received, and the result be processed will be emitted to STDOUT.
This includes the data that is sent and received over the wire.

.. code-block:: php

    $s3Client = new Aws\S3\S3Client([
        'region'  => 'us-standard',
        'version' => '2006-03-01',
        'debug'   => true
    ]);


How can I set arbitrary headers on a request?
---------------------------------------------

You can add any arbitrary headers to a service operation by adding a custom
middleware to the ``Aws\HandlerList`` of an ``Aws\CommandInterface`` or
``Aws\ClientInterface``. The following example shows how to add an
``X-Foo-Baz`` header to a specific Amazon S3 PutObject operation using the
``Aws\Middleware::mapRequest`` helper method.

See :ref:`map-request` for more information.


How can I sign an arbitrary request?
------------------------------------

You can sign an arbitrary `PSR-7 request
<https://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Psr.Http.Message.RequestInterface.html>`_
using the SDK's `SignatureV4 class
<https://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.Signature.SignatureV4.html>`_.

See :doc:`service/cloudsearch-custom-requests` for a full example of how to do
so.

How can I modify a command before sending it?
---------------------------------------------

You can modify a command before sending it by adding a custom
middleware to the ``Aws\HandlerList`` of an ``Aws\CommandInterface`` or
``Aws\ClientInterface``. The following example shows how to add custom command
parameters to a command before it is sent, essentially adding default options.
This example uses the ``Aws\Middleware::mapCommand`` helper method.

See :ref:`map-command` for more information.


What is a CredentialsException?
-------------------------------

If you are seeing a ``Aws\Exception\CredentialsException`` while while using
the SDK, then this means that the SDK was not provided with any credentials and
was unable to find credentials in the environment.

If you instantiate a client *without* credentials, on the first time that you
perform a service operation, the SDK will attempt to find credentials. It first
checks in some specific environment variables, then it looks for instance
profile credentials, which are only available on configured Amazon EC2
instances. If absolutely no credentials are provided or found, an
``Aws\Exception\CredentialsException`` is thrown.

If you are seeing this error and you are intending to use instance profile
credentials, then you need to make sure that the Amazon EC2 instance that the
SDK is running on is configured with an appropriate IAM role.

If you are seeing this error and you are **not** intending to use instance
profile credentials, then you need to make sure that you are properly providing
credentials to the SDK.

For more information, see :doc:`/guide/credentials`.


Does the SDK work on HHVM?
--------------------------

The SDK does not currently run on HHVM, and won't be able to until the
`issue with the yield semantics in HHVM <https://github.com/facebook/hhvm/issues/6807>`_
is resolved.


How do I disable SSL?
---------------------

You can disable SSL by setting the ``scheme`` parameter in a client factory
method to 'http'. It is important to note that not all services support
``http`` access. Please see `regions and endpoints <http://docs.aws.amazon.com/general/latest/gr/rande.html>`_
for a list of regions, endpoints, and the supported schemes.

.. code-block:: php

    $client = new Aws\DynamoDb\DynamoDbClient([
        'version' => '2012-08-10',
        'region'  => 'us-west-2',
        'scheme'  => 'http'
    ]);

.. warning::

    Because SSL requires all data to be encrypted and requires more TCP packets
    to complete a connection handshake than just TCP, disabling SSL may provide
    a small performance improvement. However, with SSL disabled, all data is
    sent over the wire unencrypted. Before disabling SSL, you must carefully
    consider the security implications and the potential for eavesdropping over
    the network.


What do I do about a "Parse error"?
-----------------------------------

The PHP engine will throw parsing errors when it encounters syntax it does not
understand. This is almost always encountered when attempting to run code that
was written for a different version of PHP.

If you encounter a parsing error, please check your system and make sure it
fulfills the SDK's :doc:`/getting-started/requirements`.


Why is the S3 client decompressing gzipped files?
-------------------------------------------------

Some HTTP handlers -- including the default Guzzle 6 HTTP handler -- will
inflate compressed response bodies by default. This behavior can be overridden
by setting the :ref:`http_decode_content` HTTP option to ``false``. For
backwards compatibility reasons, this default cannot be changed, but it is
recommended that you disable content decoding at the S3 client level.

See :ref:`http_decode_content` for an example of how to disable automatic
content decoding.


How do I disable body signing in S3?
------------------------------------

You can disable body signing by setting the ``ContentSHA256`` parameter in
command object to ``Aws\Signature\S3SignatureV4::UNSIGNED_PAYLOAD``. Then PHP SDK will use it as
the 'x-amz-content-sha-256' header and the body checksum in the canonical request.

.. code-block:: php

    $s3Client = new Aws\S3\S3Client([
        'version' => '2006-03-01',
        'region'  => 'us-standard'
    ]);

    $params = [
        'Bucket' => 'foo',
        'Key'    => 'baz',
        'ContentSHA256' => Aws\Signature\S3SignatureV4::UNSIGNED_PAYLOAD
    ];

    // Using operation methods creates command implicitly.
    $result = $s3Client->putObject($params);

    // Using commands explicitly.
    $command = $s3Client->getCommand('PutObject', $params);
    $result = $s3Client->execute($command);

How is retry scheme handled in PHP SDK?
---------------------------------------

PHP SDK has a ``RetryMiddleware`` that handles retry behavior. In terms of 5xx HTTP
status codes for server errors, SDK retries on 500, 502, 503 and 504.

Throttling exceptions including ``RequestLimitExceeded``, ``Throttling``,
``ProvisionedThroughputExceededException``, ``ThrottlingException``, ``RequestThrottled``
and ``BandwidthLimitExceeded`` are handled with retries as well.

SDK also integrates exponential delay with backoff and jitter algorithm in retry scheme. Furthermore,
default retry behavior is configured as ``3`` for all services except dynamoDB, which is ``10``.

How to handle exception with Error code?
----------------------------------------

Besides SDK customized Exception classes, each Aws Service Client has its own exception class that
inherits from `Aws\Exception\AwsException <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.Exception.AwsException.html>`_.
You can determine more specific error types to catch with the API specific errors listed under the
``Errors`` section of each method.

Error Code information is available with `getAwsErrorCode() <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.Exception.AwsException.html#_getAwsErrorCode>`_
from ``Aws\Exception\AwsException``.

.. code-block:: php

    $sns = new \Aws\Sns\SnsClient([
        'region' => 'us-west-2',
        'version' => 'latest',
    ]);

    try {
        $sns->publish([
            // parameters
            ...
        ]);
        // do something
    } catch (SnsException $e) {
        switch ($e->getAwsErrorCode()) {
            case 'EndpointDisabled':
            case 'NotFound':
                // do something
                break;
        }
    }
