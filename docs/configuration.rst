Configuration
=============

When passing an array of parameters to the first argument of ``Aws\Common\Aws::factory()``, the service builder loads
the default ``aws-config.php`` file and merge the array of shared parameters into the default configuration.

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

.. note::

    Instantiating a client without providing credentials causes the client to attempt to retrieve `IAM Instance Profile
    credentials <http://docs.amazonwebservices.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances>`_.

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

    require 'aws.phar';

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
