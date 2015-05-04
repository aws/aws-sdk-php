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
`cURL website directly <http://curl.haxx.se/ca/cacert.pem>`_.

The SDK will by default use the CA bundle that is configured when PHP is
compiled. You can change the default CA bundle used by PHP by modifying the
``openssl.cafile`` PHP ini configuration setting to be set to the path a CA
file on disk. You can find out more about how cURL bundles the CA bundle here:
http://curl.haxx.se/docs/caextract.html


How do I disable SSL?
---------------------

.. warning::

    Because SSL requires all data to be encrypted and requires more TCP packets
    to complete a connection handshake than just TCP, disabling SSL may provide
    a small performance improvement. However, with SSL disabled, all data is
    sent over the wire unencrypted. Before disabling SSL, you must carefully
    consider the security implications and the potential for eavesdropping over
    the network.

You can disable SSL by setting the ``scheme`` parameter in a client factory
method to 'http'.

.. code-block:: php

    $client = Aws\DynamoDb\DynamoDbClient::factory(array(
        'region' => 'us-west-2',
        'scheme' => 'http'
    ));


Why can't I upload or download files greater than 2GB?
------------------------------------------------------

Because PHP's integer type is signed and many platforms use 32-bit integers, the
AWS SDK for PHP does not correctly handle files larger than 2GB on a 32-bit
stack (where "stack" includes CPU, OS, web server, and PHP binary). This is a
`well-known PHP issue <http://www.google.com/search?q=php+2gb+32-bit>`_. In the
case of Microsoft® Windows®, there are no official builds of PHP that support
64-bit integers.

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

    $s3Client = S3Client::factory(['debug' => true]);


How can I set arbitrary headers on a request?
---------------------------------------------

You can add any arbitrary headers to a service operation by listening to the
command's ``prepared`` event and mutating the request object associated with
the event. The following example shows how to add an ``X-Foo-Baz`` header to an
Amazon S3 PutObject operation.

.. code-block:: php

    use GuzzleHttp\Command\Event\PreparedEvent;

    $s3Client = S3Client::factory();

    $command = $s3Client->getCommand('PutObject', [
        'Key'    => 'test',
        'Bucket' => 'mybucket'
    ));

    $command->getEmitter()->on('prepared', function (PreparedEvent $e) {
        $e->getRequest()->setHeader('X-Foo-Baz', 'Bar');
    });


Why am I seeing a "Cannot redeclare class" error?
-------------------------------------------------

We have observed this error a few times when using the ``aws.phar`` from the
CLI with APC enabled. This is due to some kind of issue with phars and APC.
Luckily there are a few ways to get around this. Please choose the one that
makes the most sense for your environment and application.

1. **Don't use APC** - PHP 5.5, for example, comes with Zend OpCache built in.
   This problem has not been observed with Zend OpCache.
2. **Disable APC for CLI** - Change the ``apc.enable_cli`` INI setting to
   ``Off``.
3. **Tell APC not to cache phars** - Change the ``apc.filters`` INI setting to
   include ``"^phar://"``.
4. **Don't use the phar** - When all else fails, you should install the SDK
   through Composer (recommended) or by using the zip file.


What is an InstanceProfileCredentialsException?
-----------------------------------------------

If you are seeing an ``Aws\Common\Exception\InstanceProfileCredentialsException``
while using the SDK, this means that the SDK was not provided with any
credentials.

If you instantiate a client *without* credentials, on the first time that you
perform a service operation, the SDK will attempt to find credentials. It first
checks in some specific environment variables, then it looks for instance
profile credentials, which are only available on configured Amazon EC2
instances. If absolutely no credentials are provided or found, an
``Aws\Common\Exception\InstanceProfileCredentialsException`` is thrown.

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
`issue with the yield syntax in HHVM <https://github.com/facebook/hhvm/issues/1627>`_
is resolved.
