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
                'extends' => 'default_settings',
                'class'   => 'Aws\DynamoDb\DynamoDbClient'
            ),
            's3' => array(
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The SDK needs your AWS Access Key ID and Secret Access Key in order to make requests to AWS. However, you are not
required to provide your credentials at the time you instantiate the SDK or service client.

Using Environment Credentials
-----------------------------

If you do not provide credentials, the SDK will attempt to find credentials in your environment by checking in
``$_SERVER`` and using the ``getenv()`` function to look for the ``AWS_ACCESS_KEY_ID`` and ``AWS_SECRET_KEY``
environment variables.

If you are hosting your application on AWS Elastic Beanstalk, you can set the ``AWS_ACCESS_KEY_ID`` and
``AWS_SECRET_KEY`` environment variables through the AWS Elastic Beanstalk console so that the SDK can use those
credentials automatically.

Using Instance Profile Credentials
----------------------------------

If you do not provide credentials and there are no environment credentials available, the SDK will attempt to retrieve
`IAM Instance Profile credentials <http://docs.amazonwebservices.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances>`_.
These credentials are only available on Amazon EC2 instances configured with an Instance Profile.

If absolutely no credentials are provided or found, you will receive an
``Aws\Common\Exception\InstanceProfileCredentialsException`` when you try to make a request.

Manually Setting Credentials
----------------------------

You can also manually set your credentials after the service client has been instantiated by using the ``Credentials``
object.

.. code-block:: php

    <?php

    require 'vendor/autoload.php';

    use Aws\S3\S3Client;

    $s3 = S3Client::factory();
    $credentials = $s3->getCredentials();
    $credentials->setAccessKeyId('your-aws-access-key-id');
    $credentials->setSecretKey('your-aws-secret-access-key');
