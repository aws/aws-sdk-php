=============
Configuration
=============

The AWS SDK for PHP can be configured in many ways to suit your needs. This
guide describes each client constructor setting.


Creating a Client
-----------------

You can create a client by passing an associative array of options to a
client's constructor.

.. code-block:: php

    $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-west-2'
    ]);

All of the general client configuration options are described in detail below.
The array of options provided to a client may vary based on which client you
are creating. These custom client configuration options are described in the
`API documentation <http://docs.aws.amazon.com/aws-sdk-php/latest/>`_ of each
client.


Configuration Options
---------------------


api_provider
~~~~~~~~~~~~

:Type: ``callable``

An optional PHP callable that accepts a type, service, and version argument,
and returns an array of corresponding configuration data. The type value can
be one of api, waiter, or paginator.


client
~~~~~~

:Type: ``GuzzleHttp\ClientInterface|bool``

Optional Guzzle client used to transfer requests over the wire. Set to true
or do not specify a client, and the SDK will create a new client that uses a
shared Ring HTTP handler with other clients.


credentials
~~~~~~~~~~~

:Type: ``array|Aws\Credentials\CredentialsInterface|bool|callable``

An ``Aws\Credentials\CredentialsInterface`` object to use with each, an
associative array of "key", "secret", and "token" key value pairs,
`false` to utilize null credentials, or a callable credentials
provider function to create credentials using a function. If no
credentials are provided, the SDK will attempt to load them from the
environment.


debug
~~~~~

:Type: ``bool|resource``

Set to true to display debug information when sending requests. Provide a
stream resource to write debug information to a specific resource.


defaults
~~~~~~~~

:Type: ``array``

An associative array of default parameters to pass to each operation created
by the client.


endpoint
~~~~~~~~

:Type: ``string``

The full URI of the webservice. This is only required when connecting to a
custom endpoint (e.g., a local version of Amazon S3 or Amazon DynamoDB
local).


endpoint_provider
~~~~~~~~~~~~~~~~~

:Type: ``callable``

An optional PHP callable that accepts a hash of options including a service
and region key and returns a hash of endpoint data, of which the endpoint key
is required.


http
~~~~

:Type: ``array``

Set to an array of Guzzle client request options (e.g., proxy, verify, etc.).
See http://docs.guzzlephp.org/en/latest/clients.html#request-options for a
list of available options.


profile
~~~~~~~

:Type: ``string``

Allows you to specify which profile to use when credentials are created from
the AWS credentials file in your HOME directory. This setting overrides the
AWS_PROFILE environment variable. Note: Specifying "profile" will cause the
"credentials" key to be ignored.


region
~~~~~~

:Type: ``string``
:Required: true

Region to connect to. See http://docs.aws.amazon.com/general/latest/gr/rande.html
for a list of available regions.


retries
~~~~~~~

:Type: ``int``
:Default: ``int(3)``

Configures the maximum number of allowed retries for a client. Pass ``0`` to
disable retries.


retry_logger
~~~~~~~~~~~~

:Type: ``string|resource``

When the string "debug" is provided, all retries will be logged to STDOUT.
Provide a `PSR-3 logger <http://www.php-fig.org/psr/psr-3/>`_ to log
retries to a specific logger instance.


ringphp_handler
~~~~~~~~~~~~~~~

:Type: ``callable``

`RingPHP <http://ringphp.readthedocs.org/en/latest/>`_ handler used to
transfer HTTP requests.


scheme
~~~~~~

:Type: ``string``
:Default: ``string(5) "https"``

URI scheme to use when connecting connect.


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
name, and region, and returns a ``Aws\Signature\SignatureInterface`` object.
This provider is used to create signers utilized by the client.


signature_version
~~~~~~~~~~~~~~~~~

:Type: ``string``

A string representing a custom signature version to use with a service
(e.g., v4, s3, v2). Note that per/operation signature version MAY override
this requested signature version.


validate
~~~~~~~~

:Type: ``bool``
:Default: ``bool(true)``

Set to false to disable client-side parameter validation.


version
~~~~~~~

:Type: ``string``
:Required: true

The version of the webservice to utilize (e.g., ``2006-03-01``).
