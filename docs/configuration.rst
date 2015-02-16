=============
Configuration
=============

This guide describes client constructor options. These options can be provided
in a client constructor or to the ``Aws\Sdk`` class. The following example
shows how to pass options into an Amazon S3 client constructor.

.. code-block:: php

    use Aws\S3\S3Client;

    $options = [
        'region'            => 'us-west-2',
        'version'           => '2006-03-01',
        'signature_version' => 'v4'
    ];

    $s3Client = new S3Client($options);

Refer to the :doc:`getting started guide <getting-started>` for more
information on constructing clients.


api_provider
~~~~~~~~~~~~

:Type: ``callable``

A PHP callable that accepts a type, service, and version argument, and returns
an array of corresponding configuration data. The type value can be one of
``api``, ``waiter``, or ``paginator``.

By default, the SDK will use an instance of ``Aws\Api\FileSystemApiProvider``
that loads credentials from the ``src/data`` folder of the SDK.


client
~~~~~~

:Type: ``callable|GuzzleHttp\ClientInterface``

A function that accepts an array of options and returns a
``GuzzleHttp\ClientInterface``, or a ``GuzzleHttp\ClientInterface`` client used
to transfer requests over the wire.

.. note::

    If you do not specify a client and use the ``Aws\Sdk`` class to create
    clients, then the SDK will create a new client that uses a shared Ring
    HTTP handler.

.. code-block:: php

    use Aws\S3\S3Client;
    use GuzzleHttp\Client;

    // Create a custom Guzzle client.
    $myClient = new Client();

    // Pass the Guzzle client into an Amazon S3 client.
    $s3 = new S3Client([
        'version' => 'latest',
        'region'  => 'us-west-2',
        'client'  => $myClient
    ]);

    $clientFactory = function (array $options) {
        return new Client([
            // 'handler' => $myCustomHandler
        ]);
    };

    $s3 = new S3Client([
        'version' => 'latest',
        'region'  => 'us-west-2',
        'client'  => $clientFactory
    ]);


credentials
~~~~~~~~~~~

:Type: ``array|Aws\Credentials\CredentialsInterface|bool|callable``

If you do not provide a ``credentials`` option, the SDK will attempt to load
credentials from your environment in the following order:

1. Load credentials from :ref:`environment variables <environment_credentials>`
2. Load credentials from a :ref:`credentials ini file <credential_profiles>`
3. Load credentials from an :ref:`IAM instance profile <instance_profile_credentials>`.

You can provide an associative array of "key", "secret", and "token" key value
pairs to use :ref:`hardcoded credentials <hardcoded_credentials>`.

.. code-block:: php

    // Hardcoded credentials.
    $s3 = new Aws\S3\S3Client([
        'version'     => 'latest',
        'region'      => 'us-west-2',
        'credentials' => [
            'key'    => 'abc',
            'secret' => '123'
        ]
    ]);

Pass an ``Aws\Credentials\CredentialsInterface`` object to use a specific
credentials instance.

.. code-block:: php

    $credentials = new Aws\Credentials\Credentials('key', 'secret');

    $s3 = new Aws\S3\S3Client([
        'version'     => 'latest',
        'region'      => 'us-west-2',
        'credentials' => $credentials
    ]);

Pass `false` to utilize null credentials and not sign requests.

.. code-block:: php

    $s3 = new Aws\S3\S3Client([
        'version'     => 'latest',
        'region'      => 'us-west-2',
        'credentials' => false
    ]);

Pass a callable :ref:`credential provider <credential_provider>` function to
create credentials using a function.

.. code-block:: php

    use Aws\Credentials\CredentialProvider;

    $provider = CredentialProvider::env();
    $s3 = new Aws\S3\S3Client([
        'version'     => 'latest',
        'region'      => 'us-west-2',
        'credentials' => $provider
    ]);

You can find more information about providing credentials to a client in the
:doc:`credentials` guide.


debug
~~~~~

:Type: ``bool|resource``

Set to ``true`` to display debug information when sending requests. Provide a
stream resource to write debug information to a specific resource.

Debug information contains information about each state change of a transaction
as it is prepared and sent over the wire. Also included in the debug output
is information of the specific RingPHP adapter used by a client (e.g., debug
cURL output).

.. code-block:: php

    // Write debug output to STDOUT
    $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-west-2',
        'debug'   => true
    ]);

    $s3->listBuckets();

Running the above example will have output similar to
:download:`this example <_downloads/debug-example.txt>`.


endpoint
~~~~~~~~

:Type: ``string``

The full URI of the webservice. This is only required when connecting to a
custom endpoint (e.g., a local version of Amazon S3 or Amazon DynamoDB
local).

Here's an example of connecting to `Amazon DynamoDB Local <http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/Tools.DynamoDBLocal.html>`_:

.. code-block:: php

    $client = new Aws\DynamoDb\DynamoDbClient([
        'version'  => '2012-08-10',
        'region'   => 'us-east-1'
        'endpoint' => 'http://localhost:8000'
    ]);

See http://docs.aws.amazon.com/general/latest/gr/rande.html for a list of
available regions and endpoints.


endpoint_provider
~~~~~~~~~~~~~~~~~

:Type: ``callable``

An optional PHP callable that accepts a hash of options including a "service"
and "region" key and returns ``NULL`` or a hash of endpoint data, of which the
"endpoint" key is required.


http
~~~~

:Type: ``array``

Set to an array of Guzzle client request options (e.g., proxy, verify, etc.).
See http://docs.guzzlephp.org/en/latest/clients.html#request-options for a
list of available options. The following are examples of some of the more
common request options you may need to set.


SSL/TLS certificate verification
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

You can customize the peer SSL/TLS certificate verification behavior of the SDK
using the ``verify`` ``http`` option.

* Set to ``true`` to enable SSL/TLS peer certificate verification and use the
  default CA bundle provided by operating system.
* Set to ``false`` to disable peer certificate verification (this is
  insecure!).
* Set to a string to provide the path to a CA cert bundle to enable
  verification using a custom CA bundle.

If the CA bundle cannot be found for your system and you receive an error,
then you will need to provide the path to a CA bundle to the SDK. If you do not
need a specific CA bundle, then Mozilla provides a commonly used CA bundle
which can be downloaded `here <https://raw.githubusercontent.com/bagder/ca-bundle/master/ca-bundle.crt>`_
(this is maintained by the maintainer of cURL). Once you have a CA bundle
available on disk, you can set the ``openssl.cafile`` PHP ini setting to point
to the path to the file, allowing you to omit the ``verify`` request option.
Much more detail on SSL certificates can be found on the
`cURL website <http://curl.haxx.se/docs/sslcerts.html>`_.

.. code-block:: php

    use Aws\DynamoDb\DynamoDbClient;

    // Use a custom CA bundle.
    $client = new DynamoDbClient([
        'region'  => 'us-west-2',
        'version' => 'latest',
        'http'    => [
            'verify' => '/path/to/my/cert.pem'
        ]
    ]);

    // Disable SSL/TLS verification.
    $client = new DynamoDbClient([
        'region'  => 'us-west-2',
        'version' => 'latest',
        'http'    => [
            'verify' => false
        ]
    ]);


Using a proxy
^^^^^^^^^^^^^

You can connect to an AWS service through a proxy using the ``proxy`` ``http``
option. You can provide proxy URLs that contain a scheme, username, and
password. For example, ``"http://username:password@192.168.16.1:10"``.

.. code-block:: php

    use Aws\DynamoDb\DynamoDbClient;

    // Send requests through a proxy.
    $client = new DynamoDbClient([
        'region'  => 'us-west-2',
        'version' => 'latest',
        'http'    => [
            'proxy' => 'http://192.168.16.1:10'
        ]
    ]);

You can use the ``HTTP_PROXY`` environment variable to configure an "http"
protocol specific proxy, and the ``HTTPS_PROXY`` environment variable to
configure an "https" specific proxy.

See http://docs.guzzlephp.org/en/latest/clients.html#proxy for more information
on configuring a Guzzle client proxy.


Timeouts
^^^^^^^^

You can modify the timeout settings of the SDK by configuring the ``timeout``
and ``connect_timeout`` ``http`` options.

``timeout`` is a float describing the timeout of the request in seconds. Use
``0`` to wait indefinitely (the default behavior).

.. code-block:: php

    use Aws\DynamoDb\DynamoDbClient;

    // Timeout after 5 seconds.
    $client = new DynamoDbClient([
        'region'  => 'us-west-2',
        'version' => 'latest',
        'http'    => [
            'timeout' => 5
        ]
    ]);

``connect_timeout`` is a float describing the number of seconds to wait while
trying to connect to a server. Use 0 to wait indefinitely (the default
behavior).

.. code-block:: php

    use Aws\DynamoDb\DynamoDbClient;

    // Timeout after attempting to connect for 5 seconds.
    $client = new DynamoDbClient([
        'region'  => 'us-west-2',
        'version' => 'latest',
        'http'    => [
            'connect_timeout' => 5
        ]
    ]);


profile
~~~~~~~

:Type: ``string``

Allows you to specify which profile to use when credentials are created from
the AWS credentials file in your HOME directory. This setting overrides the
``AWS_PROFILE`` environment variable. Note: Specifying "profile" will cause
the "credentials" key to be ignored.

.. code-block:: php

    // Use the "production" profile from your credentials file.
    $ec2 = new Aws\Ec2\Ec2Client([
        'version' => '2014-10-01',
        'region'  => 'us-west-2',
        'profile' => 'production'
    ]);

See :doc:`credentials` for more information on configuring credentials and the
INI file format.


region
~~~~~~

:Type: ``string``
:Required: true

Region to connect to. See http://docs.aws.amazon.com/general/latest/gr/rande.html
for a list of available regions.

.. code-block:: php

    // Set the region to the EU (Frankfurt) region.
    $s3 = new Aws\S3\S3Client([
        'region'  => 'eu-central-1',
        'version' => '2006-03-01'
    ]);


retries
~~~~~~~

:Type: ``int``
:Default: ``int(3)``

Configures the maximum number of allowed retries for a client. Pass ``0`` to
disable retries.

The following example disables retries for the Amazon DynamoDB client.

.. code-block:: php

    // Disable retries by setting "retries" to 0
    $client = new Aws\DynamoDb\DynamoDbClient([
        'version' => '2012-08-10',
        'region'  => 'us-west-2',
        'retries' => 0
    ]);


retry_logger
~~~~~~~~~~~~

:Type: ``string|Psr\Log\LoggerInterface``

When the string "debug" is provided, all retries will be logged to STDOUT.
Provide a `PSR-3 logger <http://www.php-fig.org/psr/psr-3/>`_ to log
retries to a specific logger instance. A retry is typically triggered when a
service returns some type of throttling response.

The following example uses `Monolog <https://github.com/Seldaek/monolog>`_ to
log retries. Each time the SDK retries a request, the following information
about the retry is logged: timestamp, HTTP method, URI, status code, reason
phrase, number of retries, connection time, total time, and error message.

.. code-block:: php

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use Aws\DynamoDb\DynamoDbClient;

    $logger = new Logger('retries');
    $handler = new StreamHandler('path/to/your.log', Logger::WARNING);
    $logger->pushHandler($handler);

    $client = new DynamoDbClient([
        'version'      => '2012-08-10',
        'region'       => 'us-west-2',
        'retry_logger' => $logger
    ]);


scheme
~~~~~~

:Type: ``string``
:Default: ``string(5) "https"``

URI scheme to use when connecting connect. The SDK will utilize "https"
endpoints (i.e., utilize SSL/TLS connections) by default. You can attempt to
connect to a service over an unencrypted "http" endpoint by setting ``scheme``
to "http".

.. code-block:: php

    $s3 = new Aws\S3\S3Client([
        'version' => '2006-03-01',
        'region'  => 'us-west-2',
        'scheme'  => 'http'
    ]);

See http://docs.aws.amazon.com/general/latest/gr/rande.html for a list of
endpoints whether or not a service supports the ``http`` scheme.


service
~~~~~~~

:Type: ``string``
:Required: true

Name of the service to utilize. This value will be supplied by default when
using a client provided by the SDK (i.e., ``Aws\S3\S3Client``). This option
is useful when testing a service that has not yet been published in the SDK
but you have available on disk.


signature_provider
~~~~~~~~~~~~~~~~~~

:Type: ``callable``

A callable that accepts a signature version name (e.g., v4, s3), a service
name, and region, and returns a ``Aws\Signature\SignatureInterface`` object or
``NULL``. This provider is used to create signers utilized by the client.

There are various functions provided by the SDK in the
``Aws\Signature\SignatureProvider`` class that can be used to create customized
signature providers.


signature_version
~~~~~~~~~~~~~~~~~

:Type: ``string``

A string representing a custom signature version to use with a service
(e.g., ``v4``, ``s3``, ``v2``, etc.). Note that per/operation signature version
MAY override this requested signature version if needed.

The following examples show how to configure an Amazon S3 client to use
`signature version 4 <http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html>`_:

.. code-block:: php

    // Set a preferred signature version.
    $s3 = new Aws\S3\S3Client([
        'version'           => '2006-03-01',
        'region'            => 'us-west-2',
        'signature_version' => 'v4'
    ]);

.. note::

    The ``signature_provider`` used by your client MUST be able to create the
    ``signature_version`` option you provide. The default ``signature_provider``
    used by the SDK can create signature objects for "v2", "v4", and "s3"
    signature versions.


validate
~~~~~~~~

:Type: ``bool``
:Default: ``bool(true)``

Set to false to disable client-side parameter validation. You may find that
turning validation off will slightly improve client performance, but the
difference is negligible.

.. code-block:: php

    // Disable client-side validation.
    $s3 = new Aws\S3\S3Client([
        'version'  => '2006-03-01',
        'region'   => 'eu-west-1',
        'validate' => false
    ]);


version
~~~~~~~

:Type: ``string``
:Required: true

The version of the webservice to utilize (e.g., ``2006-03-01``).

A "version" configuration value is required. Specifying a version constraint
ensures that your code will not be affected by a breaking change made to the
service. For example, when using Amazon S3, you can lock your API version to
``2006-03-01``.

.. code-block:: php

    $s3 = new Aws\S3\S3Client([
        'version' => '2006-03-01',
        'region'  => 'us-east-1'
    ]);

A list of available API versions can be found on each client's API
documentation page: http://docs.aws.amazon.com/aws-sdk-php/v3/api/index.html.
If you are unable to load a specific API version, then you may need to update
your copy of the SDK.

You may provide the string ``latest`` to the "version" configuration value to
utilize the most recent available API version that your client's API provider
can find (the default api_provider will scan the ``src/data`` directory of the
SDK for ``*.api.php`` and ``*.api.json`` files).

.. code-block:: php

    // Use the latest version available.
    $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-east-1'
    ]);

.. warning::

    Using ``latest`` in a production application is not recommended because
    pulling in a new minor version of the SDK that includes an API update could
    break your production application.
