=============
Configuration
=============

This guide describes client constructor options. These options can be provided
in a client constructor or to the ``Aws\Sdk`` class. The array of options
provided to a specific type of client may vary based on which client you are
creating. These custom client configuration options are described in the
`API documentation <http://docs.aws.amazon.com/aws-sdk-php/latest/>`_ of each
client.


.. contents:: Configuration Options
    :depth: 1
    :local:


The following example shows how to pass options into an Amazon S3 client
constructor.

.. code-block:: php

    use Aws\S3\S3Client;

    $options = [
        'region'            => 'us-west-2',
        'version'           => '2006-03-01',
        'signature_version' => 'v4'
    ];

    $s3Client = new S3Client($options);

Refer to the :doc:`basic usage guide </getting-started/basic-usage>` for more
information on constructing clients.


api_provider
~~~~~~~~~~~~

:Type: ``callable``

A PHP callable that accepts a type, service, and version argument, and returns
an array of corresponding configuration data. The type value can be one of
``api``, ``waiter``, or ``paginator``.

By default, the SDK will use an instance of ``Aws\Api\FileSystemApiProvider``
that loads API files from the ``src/data`` folder of the SDK.


credentials
~~~~~~~~~~~

:Type: ``array|Aws\CacheInterface|Aws\Credentials\CredentialsInterface|bool|callable``

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

    // Only load credentials from environment variables.
    $provider = CredentialProvider::env();

    $s3 = new Aws\S3\S3Client([
        'version'     => 'latest',
        'region'      => 'us-west-2',
        'credentials' => $provider
    ]);

Pass an instance of ``Aws\CacheInterface`` to cache the values returned by the
default provider chain across multiple processes.

.. code-block:: php

    use Aws\DoctrineCacheAdapter;
    use Aws\S3\S3Client;
    use Doctrine\Common\Cache\ApcuCache;

    $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => 'us-west-2',
        'credentials' => new DoctrineCacheAdapter(new ApcuCache),
    ]);

You can find more information about providing credentials to a client in the
:doc:`credentials` guide.

.. note::

    Credentials are loaded and validated lazily when they are used.


debug
~~~~~

:Type: ``bool|array``

Outputs debug information about each transfer. Debug information contains
information about each state change of a transaction as it is prepared and sent
over the wire. Also included in the debug output is information of the specific
HTTP handler used by a client (e.g., debug cURL output).

Set to ``true`` to display debug information when sending requests.

.. code-block:: php

    $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-west-2',
        'debug'   => true
    ]);

    // Perform an operation to see the debug output.
    $s3->listBuckets();

Alternatively, you can provide an associative array with the following keys:

logfn (callable)
    Function that is invoked with log messages. By default, PHP's ``echo``
    function will be utilized.

stream_size (int)
    When the size of a stream is greater than this number, the stream data will
    not be logged. Set to ``0`` to not log any stream data.

scrub_auth (bool)
    Set to ``false`` to disable the scrubbing of auth data from the logged
    messages (meaning your AWS Access Key ID and signature will be passed
    through to the ``logfn``).

http (bool)
    Set to ``false`` to disable the "debug" feature of lower level HTTP
    handlers (e.g., verbose curl output).

auth_headers (array)
    Set to a key-value mapping of headers you would like to replace mapped to
    the value you would like to replace them with. These values are not used
    unless ``scrub_auth`` is set to ``true``.

auth_strings (array)
    Set to a key-value mapping of regular expressions to mapped to their
    replacements. These values will be used by the authentication data scrubber
    if ``scrub_auth`` is set to ``true``.

.. code-block:: php

    $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-west-2',
        'debug'   => [
            'logfn'        => function ($msg) { echo $msg . "\n"; },
            'stream_size'  => 0,
            'scrub_auth'   => true,
            'http'         => true,
            'auth_headers' => [
                'X-My-Secret-Header' => '[REDACTED]',
            ],
            'auth_strings' => [
                '/SuperSecret=[A-Za-z0-9]{20}/i' => 'SuperSecret=[REDACTED]',
            ],
        ]
    ]);

    // Perform an operation to see the debug output.
    $s3->listBuckets();

.. tip::

    The debug output is extremely useful when diagnosing issues in the AWS
    SDK for PHP. Please provide the debug output for an isolated failure case
    when opening issues on the SDK.


.. _config_stats:

stats
~~~~~

:Type: ``bool|array``

Binds transfer statistics to errors and results returned by SDK operations.

Set to ``true`` to gather transfer statistics on requests sent.

.. code-block:: php

    $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-west-2',
        'stats'   => true
    ]);

    // Perform an operation.
    $result = $s3->listBuckets();
    // Inspect the stats.
    $stats = $result['@metadata']['transferStats'];

Alternatively, you can provide an associative array with the following keys:

retries (bool)
    Set to ``true`` to enable reporting on retries attempted. Retry statistics
    are collected by default and returned

http (bool)
    Set to ``true`` to enable collecting statistics from lower level HTTP
    adapters (e.g., values returned in GuzzleHttp\TransferStats). HTTP handlers
    must support an __on_transfer_stats option for this to have an effect. HTTP
    stats are returned as an indexed array of associative arrays; each
    associative array contains the transfer stats returned for a request by the
    client's HTTP handler. Disabled by default.

    If a request was retried, each request's transfer
    stats will be returned, with
    ``$result['@metadata']['transferStats']['http'][0]`` containing the stats
    for the first request, ``$result['@metadata']['transferStats']['http'][1]``
    containing the statistics for the second request, etc.

timer (bool)
    Set to ``true`` to enable a command timer that reports the total wall clock
    time spent on an operation in seconds. Disabled by default.

.. code-block:: php

    $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-west-2',
        'stats'   => [
            'retries'      => true,
            'timer'        => false,
            'http'         => true,
        ]
    ]);

    // Perform an operation.
    $result = $s3->listBuckets();
    // Inspect the HTTP transfer stats.
    $stats = $result['@metadata']['transferStats']['http'];
    // Inspect the number of retries attempted.
    $stats = $result['@metadata']['transferStats']['retries_attempted'];
    // Inspect the total backoff delay inserted between retries.
    $stats = $result['@metadata']['transferStats']['total_retry_delay'];


endpoint
~~~~~~~~

:Type: ``string``

The full URI of the webservice. This is only required when connecting to a
custom endpoint (e.g., a local version of Amazon S3 or
`Amazon DynamoDB Local <http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/Tools.DynamoDBLocal.html>`_).

Here's an example of connecting to Amazon DynamoDB Local:

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

Here's an example of how to create a minimal endpoint provider:

.. code-block:: php

    $provider = function (array $params) {
        if ($params['service'] == 'foo') {
            return ['endpoint' => $params['region'] . '.example.com'];
        }
        // Return null when the provider cannot handle the parameters.
        return null;
    });


handler
~~~~~~~

:Type: ``callable``

A handler that accepts a command object, request object and returns a promise
(``GuzzleHttp\Promise\PromiseInterface``) that is fulfilled with an
``Aws\ResultInterface`` object or rejected with an
``Aws\Exception\AwsException``. A handler does not accept a next handler as it
is terminal and expected to fulfill a command. If no handler is provided, a
default Guzzle handler will be utilized.

You can use the ``Aws\MockHandler`` to return mocked results or throw mock
exceptions. You enqueue results or exceptions, and the MockHandler will dequeue
them in FIFO order.

.. code-block:: php

    use Aws\Result;
    use Aws\MockHandler;
    use Aws\DynamoDb\DynamoDbClient;
    use Aws\CommandInterface;
    use Psr\Http\Message\RequestInterface;
    use Aws\Exception\AwsException;

    $mock = new MockHandler();

    // Return a mocked result.
    $mock->append(new Result(['foo' => 'bar']));

    // You can provide a function to invoke. Here we throw a mock exception.
    $mock->append(function (CommandInterface $cmd, RequestInterface $req) {
        return new AwsException('Mock exception', $cmd);
    });

    // Create a client with the mock handler.
    $client = new DynamoDbClient([
        'region'  => 'us-west-2',
        'version' => 'latest',
        'handler' => $mock
    ]);

    // Result object response will contain ['foo' => 'bar']
    $result = $client->listTables();

    // This will throw the exception that was enqueued
    $client->listTables();


.. _config_http:

http
~~~~

:Type: ``array``

Set to an array of HTTP options that are applied to HTTP requests and transfers
created by the SDK.

The SDK supports the following configuration options:


.. _http_connect_timeout:

connect_timeout
^^^^^^^^^^^^^^^

A float describing the number of seconds to wait while trying to connect to a
server. Use ``60`` to wait indefinitely (the default behavior).

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


.. _http_debug:

debug
^^^^^

:Type: ``bool|resource``

Instructs the underlying HTTP handler to output debug information. The debug
information provided by different HTTP handlers will vary.

* Pass ``true`` to write debug output to STDOUT.
* Pass a ``resource`` as returned by ``fopen`` to write debug output to a
  specific PHP stream resource.


.. _http_decode_content:

decode_content
^^^^^^^^^^^^^^

:Type: ``bool``

Instructs the underlying HTTP handler to inflate the body of compressed
responses. When not enabled, compressed response bodies may be inflated with a
``GuzzleHttp\Psr7\InflateStream``.

.. note::

    Content decoding is enabled by default in the SDK's default HTTP handler,
    and for backwards compatibility reasons this default cannot be changed. If
    you store compressed files in S3, it is recommended that you disable content
    decoding at the S3 client level.

    .. code-block:: php

        use Aws\S3\S3Client;
        use GuzzleHttp\Psr7\InflateStream;

        $client = new S3Client([
            'region'  => 'us-west-2',
            'version' => 'latest',
            'http'    => ['decode_content' => false],
        ]);

        $result = $client->getObject([
            'Bucket' => 'my-bucket',
            'Key'    => 'massize_gzipped_file.tgz'
        ]);

        $compressedBody = $result['Body']; // This content is still gzipped.
        $inflatedBody = new InflateStream($result['Body']); // This is now readable.


.. _http_delay:

delay
^^^^^

:Type: ``int``

The number of milliseconds to delay before sending the request. This is often
used for delaying before retrying a request.


.. _http_progress:

progress
^^^^^^^^

:Type: ``callable``

Defines a function to invoke when transfer progress is made. The function
accepts the following arguments:

1. The total number of bytes expected to be downloaded.
2. The number of bytes downloaded so far.
3. The number of bytes expected to be uploaded.
4. The number of bytes uploaded so far.

.. code-block:: php

    use Aws\S3\S3Client;

    $client = new S3Client([
        'region'  => 'us-west-2',
        'version' => 'latest'
    ]);

    // Apply the http option to a specific command using the "@http"
    // command parameter.
    $result = $client->getObject([
        'Bucket' => 'my-bucket',
        'Key'    => 'large.mov',
        '@http' => [
            'progress' => function ($expectedDl, $dl, $expectedUl, $ul) {
                printf(
                    "%s of %s downloaded, %s of %s uploaded.\n",
                    $expectedDl,
                    $dl,
                    $expectedUl,
                    $ul
                );
            }
        ]
    ]);


.. _http_proxy:

proxy
^^^^^

:Type: ``string|array``

You can connect to an AWS service through a proxy using the ``proxy`` option.

* Provide a string value to connect to a proxy for all types of URIs. The proxy
  string value can contain a scheme, username, and password. For example,
  ``"http://username:password@192.168.16.1:10"``.

* Provide an associative array of proxy settings where the key is the
  scheme of the URI, and the value is the proxy for the given URI (i.e., you
  can give different proxies for "http" and "https" endpoints).

.. code-block:: php

    use Aws\DynamoDb\DynamoDbClient;

    // Send requests through a single proxy.
    $client = new DynamoDbClient([
        'region'  => 'us-west-2',
        'version' => 'latest',
        'http'    => [
            'proxy' => 'http://192.168.16.1:10'
        ]
    ]);

    // Send requests through a a different proxy per/scheme
    $client = new DynamoDbClient([
        'region'  => 'us-west-2',
        'version' => 'latest',
        'http'    => [
            'proxy' =>
                'http' => 'tcp://192.168.16.1:10',
                'https' => 'tcp://192.168.16.1:11',
            ]
        ]
    ]);

You can use the ``HTTP_PROXY`` environment variable to configure an "http"
protocol specific proxy, and the ``HTTPS_PROXY`` environment variable to
configure an "https" specific proxy.


.. _http_sink:

sink
^^^^

:Type: ``resource|string|Psr\Http\Message\StreamInterface``

The ``sink`` option controls where the response data of an operation is
downloaded to.

* Provide a ``resource`` as returned by ``fopen`` to download the response body
  to a PHP stream.
* Provide the path to a file on disk as a ``string`` value to download the
  response body to a specific file on disk.
* Provide a ``Psr\Http\Message\StreamInterface`` to download the response body
  to a specific PSR stream object.

.. note::

    The SDK will download the response body to a PHP temp stream by default.
    This means that the data will stay in memory until the size of the body
    reaches 2MB, at which point the data will be written to a temporary file on
    disk.


.. _http_sync:

synchronous
^^^^^^^^^^^

:Type: ``bool``

The ``synchronous`` option informs the underlying HTTP handler that you intend
on blocking on the result.


.. _http_stream:

stream
^^^^^^

:Type: ``bool``

Set to ``true`` to tell the underlying HTTP handler that you wish to stream the
response body of a response from the web service rather than download it all
up-front. For example, this option is relied upon in the Amazon S3 stream
wrapper class to ensure that the data is streamed.


.. _http_timeout:

timeout
^^^^^^^

:Type: ``float``

A float describing the timeout of the request in seconds. Use ``60`` to wait
indefinitely (the default behavior).

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


.. _http_verify:

verify
^^^^^^

:Type: ``bool|string``

You can customize the peer SSL/TLS certificate verification behavior of the SDK
using the ``verify`` http option.

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


http_handler
~~~~~~~~~~~~

:Type: ``callable``

The ``http_handler`` option is used to integrate the SDK with other HTTP
clients. An ``http_handler`` option is a function that accepts a
``Psr\Http\Message\RequestInterface`` object and an array of ``http`` options
applied to the command, and returns a ``GuzzleHttp\Promise\PromiseInterface``
object that is fulfilled with a ``Psr\Http\Message\ResponseInterface`` object
or rejected with an array of the following exception data:

* ``exception``: (``\Exception``) the exception that was encountered.
* ``response``: (``Psr\Http\Message\ResponseInterface``) the response that was
  received (if any).
* ``connection_error``: (bool) set to ``true`` to mark the error as a
  connection error. Setting this value to ``true`` will also allow the SDK to
  automatically retry the operation if needed.



The SDK will automatically convert the given ``http_handler`` into a normal
``handler`` option by wrapping the provided ``http_handler`` with a
``Aws\WrappedHttpHandler`` object.

.. note::

    This option supersedes any provided ``handler`` option.


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


.. _cfg_region:

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

.. _config_retries:

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

A callable that accepts a signature version name (e.g., ``v4``), a
service name, and region, and returns a ``Aws\Signature\SignatureInterface``
object or ``NULL`` if the provider is able to create a signer for the given
parameters. This provider is used to create signers utilized by the client.

There are various functions provided by the SDK in the
``Aws\Signature\SignatureProvider`` class that can be used to create customized
signature providers.


signature_version
~~~~~~~~~~~~~~~~~

:Type: ``string``

A string representing a custom signature version to use with a service
(e.g., ``v4``, etc.). Per/operation signature version MAY override this
requested signature version if needed.

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
    used by the SDK can create signature objects for "v4" and "anonymous"
    signature versions.


ua_append
~~~~~~~~~

:Type: ``string|string[]``
:Default: ``[]``

A string or array of strings that will be added to the user-agent string passed
to the HTTP handler.


validate
~~~~~~~~

:Type: ``bool|array``
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

Set to an associative array of validation options to enable specific validation
constraints:

- ``required`` - Validate that required parameters are present (on by default).
- ``min`` - Validate the minimum length of a value (on by default).
- ``max`` - Validate the maximum length of a value.
- ``pattern`` - Validate that the value matches a regular expression.

.. code-block:: php

    // Validate only that required values are present.
    $s3 = new Aws\S3\S3Client([
        'version'  => '2006-03-01',
        'region'   => 'eu-west-1',
        'validate' => ['required' => true]
    ]);


.. _cfg_version:

version
~~~~~~~

:Type: ``string``
:Required: true

The version of the web service to utilize (e.g., ``2006-03-01``).

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
SDK for API models).

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
