# AWS SDK for PHP

The AWS SDK for PHP enables PHP developers to build solutions with Amazon Simple Storage Service (Amazon S3), Amazon DynamoDB, Amazon Elastic Compute Cloud (Amazon EC2), Amazon DynamoDB, and more. With the AWS SDK for PHP, developers can get started in minutes with a single, downloadable phar, or by using [Composer](http://getcomposer.org).

## Version 2

A recent version 2 rewrite of the AWS SDK for PHP provides developers with a more extendable, easy to use, and performant client. The new version of the SDK utilizes [Guzzle](http://guzzlephp.org), a PHP HTTP client framework that provides various performance boosts such as persistent connection management and an extendable plugin system.

## Features

* Rewritten using PHP 5.3 and namespaces to be PSR-0, PSR-1, and PSR-2 compliant
* Persistent connection management for both serial and parallel requests
* [Symfony2 EventDispatcher](http://symfony.com/doc/master/components/event_dispatcher/introduction.html) hooks that allow for extremely customizable client behavior
* All request and response entity bodies are stored in php://temp streams that help protect you from running out of memory
* Transient networking failures are automatically retried using truncated exponential backoff
* You can utilize the various [plugins provided by Guzzle](http://guzzlephp.org/tour/http.html#plugins-for-common-http-request-behavior), including caching and over the wire logging
* Includes a "waiter" system that allows you to poll a resource until it is in a predefined state (e.g. wait for an Amazon DynamoDB table to become active)
* Includes iterators so that you can easily iterate over paginated responses without having to manually send subsequent requests
* Service specific exceptions are thrown when an error occurs

## Minimum Requirements

* You have a valid AWS account, and you've already signed up for the services you want to use
* PHP 5.3.2+ compiled with the cURL extension
* A recent version of cURL 7.16.2+ compiled with OpenSSL and zlib

## Getting Started

### Signing up for Amazon Web Services

Before you can begin, you must sign up for each service you want to use.

To sign up for a service:

* Go to the home page for the service. You can find a list of services on
  [aws.amazon.com/products](http://aws.amazon.com/products).
* Click the Sign Up button on the top right corner of the page. If you don't already have an AWS account, you
  are prompted to create one as part of the sign up process.
* Follow the on-screen instructions.
* AWS sends you a confirmation e-mail after the sign-up process is complete. At any time, you can view your
  current account activity and manage your account by going to [aws.amazon.com](http://aws.amazon.com) and
  clicking "Your Account".

### Installing

#### Installing via Composer

The recommended way to install the AWS SDK for PHP is through [Composer](http://getcomposer.org).

1. Add ``"amazonwebservices/aws-sdk-for-php"`` as a dependency in your project's ``composer.json`` file:

        {
            "require": {
                "amazonwebservices/aws-sdk-for-php": "*"
            }
        }

    Consider tightening your dependencies to a known version when deploying mission critical applications (e.g. ``2.0.*``).

2. Download and install Composer:

        curl -s http://getcomposer.org/installer | php

3. Install your dependencies:

        php composer.phar install

4. Require Composer's autoloader

    Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process:

        require 'vendor/autoload.php';

You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org).

#### Installing via phar

Each release of the AWS SDK for PHP ships with a pre-packaged phar file containing all of the classes you will need to run the SDK. Including the phar in your scripts automatically registers a class autoloader for the AWS SDK for PHP and all of its dependencies.  Bundled with the phar file are other required libraries or libraries that you might find useful:

 - [Guzzle](https://github.com/guzzle/guzzle) for HTTP requests
 - [Symfony2 EventDispatcher](http://symfony.com/doc/master/components/event_dispatcher/introduction.html) for events
 - [Monolog](https://github.com/seldaek/monolog) for logging
 - [Doctrine\Common](https://github.com/doctrine/common) for caching

## Using the SDK

### Quick Start

You can quickly get up and running by using a web service client's factory method to instantiate clients as needed.

    <?php

    // Include the SDK using the phar
    require 'aws.phar';

    use Aws\DynamoDb\DynamoDbClient;

    // Instantiate the DynamoDB client with your AWS credentials
    $client = DynamoDbClient::factory(array(
        'access_key_id'     => 'your-aws-access-key-id',
        'secret_access_key' => 'your-aws-secret-access-key'
    ));

    $table = 'posts';

    // Create a "posts" table
    $client->createTable(array(
        'TableName' => $table,
        'KeySchema' => array(
            'HashKeyElement' => array(
                'AttributeName' => 'slug',
                'AttributeType' => 'S'
            )
        ),
        'ProvisionedThroughput' => array(
            'ReadCapacityUnits'  => 10,
            'WriteCapacityUnits' => 5
        )
    ));

    // Wait until the table is created and active
    $client->waitUntil('TableExists', $table);

    echo "The {$table} table has been created.\n";

Note: Instantiating a client without providing credentials will cause the client to attempt to retrieve [IAM Instance Profile credentials](http://docs.amazonwebservices.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances).

The syntax above (**"shorthand"** syntax) for creating a table should look familiar to those who have used the SDK prior to version 2.0. One difference is that *every* service operation (or "command") now accepts only a single array as an argument.

Borrowed from the Guzzle framework, the SDK now supports a new **"command"** syntax for defining commands. The command approach  is a more object-oriented and chainable approach to building requests to AWS services, and it can be especially useful when you want to manipulate the command object before execution or need to execute several commands in parallel.

The following shows how to perform a DynamoDB `ListTables` command using both syntax forms:

    // "shorthand" syntax
    $result = $client->listTables(array('Limit' => 5));

    // "command" syntax
    $command = $client->getCommand('ListTables');
    $command->set('Limit', 5);
    $result = $command->execute();

### Using the Service Builder

When using the SDK, you have the option to use individual factory methods for each client or the `Aws\Common\Aws` class to build your clients. The ``Aws\Common\Aws`` class is a service builder and dependency injection container for the SDK and is the recommended way for instantiating clients. This class allows you to share configuration options between multiple services and pre-wires short service names with the appropriate client class.

Below is an example showing how to use the service builder to retrieve a ``Aws\DynamoDb\DynamoDbClient`` and how to perform the `GetItem` operation using the command syntax.

Note: Unlike the prior SDK, service clients throw exceptions for failed requests. Be sure to use `try` and `catch` blocks appropriately.

    <?php

    // Include the SDK using the phar
    require 'aws.phar';

    use Aws\Common\Aws;
    use Aws\DynamoDb\Exception\DynamoDbException;

    // Create a service building using shared credentials for each service
    $aws = Aws::factory(array(
        'access_key_id'     => 'your-aws-access-key-id',
        'secret_access_key' => 'your-aws-secret-access-key'
    ));

    // Retrieve the DynamoDB client by its short name from the service builder
    $client = $aws->get('dynamo_db');

    // Get an item from the "posts" table using the command syntax
    try {
        $result = $client->getCommand('GetItem')
            ->set('TableName', 'posts')
            ->set('Key', $client->formatAttributes(array(
                'HashKeyElement' => 'using-dynamodb-with-the-php-sdk'
            ))
            ->set('ConsistentRead', true)
            ->execute();

        print_r($result);
    } catch (DynamoDbException $e) {
        echo 'The item could not be retrieved.';
    }

Passing an associative array of parameters to the first or second argument of ``Aws\Common\Aws::factory()`` will treat the parameters as shared parameters across all clients generated by the builder. In the above example, we are telling the service builder to use the same credentials for every client.

### Configuration

When passing an array of parameters to the first argument of ``Aws\Common\Aws::factory()``, the service builder will load the default ``aws-config.json`` file and merge the array of shared parameters into the default configuration.

Excerpt from src/Aws/Common/aws-config.json:

    {
        "services": {
            "default_settings": {
                "params": {}
            },
            "dynamo_db": {
                "extends": "default_settings",
                "class": "Aws\\DynamoDb\\DynamoDbClient"
            },
            "sts": {
                "extends": "default_settings",
                "class": "Aws\\Sts\\StsClient"
            }
        }
    }

The aws-config.json file provides default configuration settings for associating client classes with service names.  This file tells the ``Aws\Common\Aws`` service builder which class the instantiate when you reference a client by name.

None of the service configurations have defined ``access_key_id`` or ``secret_access_key`` settings.  Unless you wish to use IAM Instance Profile credentials, you will need to supply credentials to the service builder in order to use access credentials with each client. For example, the code sample in _Using the Service Builder_ is using the default aws-config.json file and merging shared credentials into each client by passing an array into the first argument of ``Aws\Common\Aws::factory()``.

### Using a custom configuration file

You can use a custom configuration file that allows you to create custom named clients with pre-configured settings.

Let's say you want to use the default ``aws-config.json`` settings, but you want to supply your keys using a configuration file.  Each service defined in the default configuration file extends from ``default_settings`` service.  You can create a custom configuration file that extends the default configuration file and add credentials to the ``default_settings`` service:

    {
        "extends": ["/path/to/src/Aws/Common/aws-config.json"],
        "services": {
            "default_settings": {
                "params": {
                    "access_key_id": "your-aws-access-key-id",
                    "secret_access_key": "your-aws-secret-access-key"
                }
            }
        }
    }

You can use your custom configuration file with ``Aws\Common\Aws`` by passing the full path to the configuration file in the first argument of the ``factory()`` method:

    <?php

    require 'aws.phar';

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/custom_config.json');

You can create custom named services if you need to use multiple accounts with the same service:

     {
         "extends": ["/path/to/src/Aws/Common/aws-config.json"],
         "services": {
             "lorem.dynamo_db": {
                 "extends": "dynamo_db",
                 "params": {
                     "access_key_id": "foo",
                     "secret_access_key": "baz"
                 }
             },
             "ipsum.dynamo_db": {
                 "extends": "dynamo_db",
                 "params": {
                     "access_key_id": "abc",
                     "secret_access_key": "123"
                 }
              }
         }
     }

## Additional Information

* AWS SDK for PHP: <http://aws.amazon.com/sdkforphp>
* Documentation: <http://docs.amazonwebservices.com/AWSSDKforPHP/latest/>
* License: <http://aws.amazon.com/apache2.0/>
* Forums: <http://aws.amazon.com/forums>
