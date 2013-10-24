Configuration
=============

When passing an array of parameters to the first argument of ``Aws\Common\Aws::factory()``, the service builder loads
the default ``aws-config.php`` file and merges the array of shared parameters into the default configuration.

Excerpt from ``src/Aws/Common/Resources/aws-config.php``:

.. code-block:: php

    <?php return array(
        'services' => array(
            'default_settings' => array(
                'params' => array()
            ),
            'dynamodb' => array(
                'alias'   => 'DynamoDb',
                'extends' => 'default_settings',
                'class'   => 'Aws\DynamoDb\DynamoDbClient'
            ),
            's3' => array(
                'alias'   => 'S3',
                'extends' => 'default_settings',
                'class'   => 'Aws\S3\S3Client'
            )
        )
    );

The ``aws-config.php`` file provides default configuration settings for associating client classes with service names.
This file tells the ``Aws\Common\Aws`` service builder which class to instantiate when you reference a client by name.

You can supply your credentials and other configuration settings to the service builder so that each client is
instantiated with those settings. To do this, pass an array of settings (including your ``key`` and ``secret``) into the
first argument of ``Aws\Common\Aws::factory()``.

Using a Custom Configuration File
---------------------------------

You can use a custom configuration file that allows you to create custom named clients with pre-configured settings.

Let's say you want to use the default ``aws-config.php`` settings, but you want to supply your keys using a
configuration file. Each service defined in the default configuration file extends from ``default_settings`` service.
You can create a custom configuration file that extends the default configuration file and add credentials to the
``default_settings`` service:

.. code-block:: php

    <?php return array(
        'includes' => array('_aws'),
        'services' => array(
            'default_settings' => array(
                'params' => array(
                    'key'    => 'your-aws-access-key-id',
                    'secret' => 'your-aws-secret-access-key',
                    'region' => 'us-west-2'
                )
            )
        )
    );

Make sure to include the ``'includes' => array('_aws'),`` line in your configuration file, because this extends the
default configuration that makes all of the service clients available to the service builder. If this is missing, then
you will get an exception when trying to retrieve a service client.

You can use your custom configuration file with the ``Aws\Common\Aws`` class by passing the full path to the
configuration file in the first argument of the ``factory()`` method:

.. code-block:: php

    <?php

    require 'vendor/autoload.php';

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/custom/config.php');

You can create custom named services if you need to use multiple accounts with the same service:

.. code-block:: php

    <?php return array(
        'includes' => array('_aws'),
        'services' => array(
            'foo.dynamodb' => array(
                'extends' => 'dynamodb',
                'params'  => array(
                    'key'    => 'your-aws-access-key-id-for-foo',
                    'secret' => 'your-aws-secret-access-key-for-foo',
                    'region' => 'us-west-2'
                )
            ),
            'bar.dynamodb' => array(
                'extends' => 'dynamodb',
                'params'  => array(
                    'key'    => 'your-aws-access-key-id-for-bar',
                    'secret' => 'your-aws-secret-access-key-for-bar',
                    'region' => 'us-west-2'
                )
            )
        )
    );

If you prefer JSON syntax, you can define your configuration in JSON format instead of PHP.

.. code-block:: js

    {
        "includes": ["_aws"],
        "services": {
            "default_settings": {
                "params": {
                    "key": "your-aws-access-key-id",
                    "secret": "your-aws-secret-access-key",
                    "region": "us-west-2"
                }
            }
        }
    }

What Happens If You Do Not Provide Credentials?
-----------------------------------------------

The SDK needs your AWS Access Key ID and Secret Access Key in order to make requests to AWS. However, you are not
required to provide your credentials at the time you instantiate the SDK or service client.

Using Environment Credentials
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

If you do not provide credentials, the SDK will attempt to find credentials in your environment by checking in
``$_SERVER`` and using the ``getenv()`` function to look for the ``AWS_ACCESS_KEY_ID`` and ``AWS_SECRET_KEY``
environment variables.

If you are hosting your application on AWS Elastic Beanstalk, you can set the ``AWS_ACCESS_KEY_ID`` and
``AWS_SECRET_KEY`` environment variables through the AWS Elastic Beanstalk console so that the SDK can use those
credentials automatically.

Using Instance Profile Credentials
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

If you do not provide credentials and there are no environment credentials available, the SDK will attempt to retrieve
`IAM Instance Profile credentials <http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances>`_.
These credentials are only available on Amazon EC2 instances configured with an IAM role.

If absolutely no credentials are provided or found, you will receive an
``Aws\Common\Exception\InstanceProfileCredentialsException`` when you try to make a request.

Instance Profile Credentials are not supported by every service. `Please check if the service you are using supports
temporary credentials <http://docs.aws.amazon.com/STS/latest/UsingSTS/UsingTokens.html>`_.

Manually Setting Credentials
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

You can also manually set your credentials after the service client has been instantiated. To do this, use the
``setCredentials()`` method to set an entirely new ``Credentials`` object for the client.

.. code-block:: php

    <?php

    require 'vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\Common\Credentials\Credentials;

    $s3 = S3Client::factory();

    $newCredentials = new Credentials('your-aws-access-key-id', 'your-aws-secret-access-key');
    $s3->setCredentials($newCredentials);

Setting a region
----------------

Some clients require a ``region`` configuration setting. You can find out if the client you are using requires a region
and the regions available to a client by consulting the documentation for that particular client
(see :ref:`supported-services`).

Here's an example of creating an Amazon DynamoDB client that uses the ``us-west-1`` region:

.. code-block:: php

    require 'vendor/autoload.php';

    use Aws\DynamoDb\DynamoDbClient;

    // Create a client that uses the us-west-1 region
    $client = DynamoDbClient::factory(array(
        'key'    => 'abc',
        'secret' => '123',
        'region' => 'us-west-1'
    ));

Setting a custom endpoint
~~~~~~~~~~~~~~~~~~~~~~~~~

You can specify a completely customized endpoint for a client using the client's ``base_url`` option. If the client you
are using requires a region, then must still specify the name of the region using the ``region`` option. Setting a
custom endpoint can be useful if you're using a mock web server that emulates a web service, you're testing against a
private beta endpoint, or you are trying to a use a region not yet supported by the SDK.

Here's an example of creating an Amazon DynamoDB client that uses a completely customized endpoint:

.. code-block:: php

    require 'vendor/autoload.php';

    use Aws\DynamoDb\DynamoDbClient;

    // Create a client that that contacts a completely customized base URL
    $client = DynamoDbClient::factory(array(
        'base_url' => 'http://my-custom-url',
        'region'   => 'my-region-1',
        'key'      => 'abc',
        'secret'   => '123'
    ));

If your custom endpoint uses signature version 4 and must be signed with custom signature scoping values, then you can
specify the signature scoping values using ``signature.service`` (the scoped name of the service) and
``signature.region`` (the region that you are contacting). These values are typically not required.

Using a proxy
~~~~~~~~~~~~~

You can send requests with the AWS SDK for PHP through a proxy using the "request options" of a client. These
"request options" are applied to each HTTP request sent from the client. One of the option settings that can be
specified is the `proxy` option.

Request options are passed to a client through the client's factory method:

.. code-block:: php

    use Aws\S3\S3Client;

    $s3 = S3Client::factory(array(
        'request.options' => array(
            'proxy' => '127.0.0.1:123'
        )
    ));

The above example tells the client that all requests should be proxied through an HTTP proxy located at the
`127.0.0.1` IP address using port `123`.

You can supply a username and password when specifying your proxy setting if needed, using the format of
``username:password@host:port``.
