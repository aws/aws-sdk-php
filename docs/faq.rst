================================
Frequently Asked Questions (FAQ)
================================

What methods are available on a client?
---------------------------------------

The AWS SDK for PHP utilizes service descriptions and dynamic
`magic __call() methods <http://www.php.net/manual/en/language.oop5.overloading.php#object.call>`_ to execute API
operations. Every magic method supported by a client is documented in the docblock of a client class using ``@method``
annotations. Several PHP IDEs, including `PHPStorm <http://www.jetbrains.com/phpstorm/>`_ and
`Zend Studio <http://www.zend.com/en/products/studio/>`_, are able to autocomplete based on ``@method`` annotations.
You can find a full list of methods available for a web service client in the
`API documentation <http://docs.aws.amazon.com/aws-sdk-php-2/latest/index.html>`_ of the client or in the
`user guide <http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/index.html>`_ for that client.

For example, the Amazon S3 client supports the following operations: :ref:`S3_operations`

What do I do about a cURL SSL certificate error?
------------------------------------------------

This issue can occur when using an out of date CA bundle with cURL and SSL. You
can get around this issue by updating the CA bundle on your server or downloading
a more up to date CA bundle from the `cURL website directly <http://curl.haxx.se/ca/cacert.pem>`_.

Simply download a more up to date CA bundle somewhere on your system and instruct the
SDK to use that CA bundle rather than the default. You can configure the SDK to
use a more up to date CA bundle by specifying the ``ssl.certificate_authority``
in a client's factory method or the configuration settings used with
``Aws\Common\Aws``.

.. code-block:: php

    $aws = Aws\Common\Aws::factory(array(
        'region' => 'us-west-2',
        'key'    => '****',
        'secret' => '****',
        'ssl.certificate_authority' => '/path/to/updated/cacert.pem'
    ));

You can find out more about how cURL bundles the CA bundle here: http://curl.haxx.se/docs/caextract.html

How do I disable SSL?
---------------------

.. warning::

    Because SSL requires all data to be encrypted and requires more TCP packets to complete a connection handshake than
    just TCP, disabling SSL may provide a small performance improvement. However, with SSL disabled, all data is sent
    over the wire unencrypted. Before disabling SSL, you must carefully consider the security implications and the
    potential for eavesdropping over the network.

You can disable SSL by setting the ``scheme`` parameter in a client factory method to 'http'.

.. code-block:: php

    $client = Aws\DynamoDb\DynamoDbClient::factory(array(
        'region' => 'us-west-2',
        'scheme' => 'http'
    ));

How can I make the SDK faster?
------------------------------

See :doc:`performance` for more information.

Why can't I upload or download files greater than 2GB?
------------------------------------------------------

Because PHP's integer type is signed and many platforms use 32-bit integers, the
AWS SDK for PHP does not correctly handle files larger than 2GB on a 32-bit stack
(where "stack" includes CPU, OS, web server, and PHP binary). This is a
`well-known PHP issue <http://www.google.com/search?q=php+2gb+32-bit>`_. In the
case of Microsoft® Windows®, there are no official builds of PHP that support
64-bit integers.

The recommended solution is to use a `64-bit Linux stack <http://aws.amazon.com/amazon-linux-ami/>`_,
such as the 64-bit Amazon Linux AMI with the latest version of PHP installed.

For more information, please see: `PHP filesize :Return values <http://docs.php.net/manual/en/function.filesize.php#refsect1-function.filesize-returnvalues>`_.

How can I see what data is sent over the wire?
----------------------------------------------

You can attach a ``Guzzle\Plugin\Log\LogPlugin`` to any client to see all request and
response data sent over the wire. The LogPlugin works with any logger that implements
the ``Guzzle\Log\LogAdapterInterface`` interface (currently Monolog, ZF1, ZF2).

If you just want to quickly see what data is being sent over the wire, you can
simply attach a debug log plugin to your client.

.. code-block:: php

    use Guzzle\Plugin\Log\LogPlugin;

    // Create an Amazon S3 client
    $s3Client = S3Client::factory();

    // Add a debug log plugin
    $s3Client->addSubscriber(LogPlugin::getDebugPlugin());

For more complex logging or logging to a file, you can build a LogPlugin manually.

.. code-block:: php

    use Guzzle\Common\Log\MonologLogAdapter;
    use Guzzle\Plugin\Log\LogPlugin;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    // Create a log channel
    $log = new Logger('aws');
    $log->pushHandler(new StreamHandler('/path/to/your.log', Logger::WARNING));

    // Create a log adapter for Monolog
    $logger = new MonologLogAdapter($log);

    // Create the LogPlugin
    $logPlugin = new LogPlugin($logger);

    // Create an Amazon S3 client
    $s3Client = S3Client::factory();

    // Add the LogPlugin to the client
    $s3Client->addSubscriber($logPlugin);

You can find out more about the LogPlugin on the Guzzle website: http://guzzlephp.org/guide/plugins.html#log-plugin

How can I set arbitrary headers on a request?
---------------------------------------------

You can add any arbitrary headers to a service operation by setting the ``command.headers`` value. The following example
shows how to add an ``X-Foo-Baz`` header to an Amazon S3 PutObject operation.

.. code-block:: php

    $s3Client = S3Client::factory();
    $s3Client->putObject(array(
        'Key'    => 'test',
        'Bucket' => 'mybucket',
        'command.headers' => array(
            'X-Foo-Baz' => 'Bar'
        )
    ));

