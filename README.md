# AWS SDK for PHP 2

The **AWS SDK for PHP** enables PHP developers to easily interface with AWS services and build solutions with Amazon
Simple Storage Service (Amazon S3), Amazon DynamoDB, Amazon Glacier, and more. With the AWS SDK for PHP, developers can
get started in minutes by using Composer – by requiring the `aws/aws-sdk-php` package – or by downloading a [single
phar file](http://pear.amazonwebservices.com/get/aws.phar).

* [AWS SDK for PHP website](http://aws.amazon.com/sdkforphp)
* [API documentation](http://docs.amazonwebservices.com/aws-sdk-php-2/latest/)
* [AWS SDK for PHP forum](https://forums.aws.amazon.com/forum.jspa?forumID=80)
* [Issue Tracker](https://github.com/aws/aws-sdk-php/issues)
* [AWS SDK for PHP on Packagist](https://packagist.org/packages/aws/aws-sdk-php)
* [License](http://aws.amazon.com/apache2.0/)

## Table of Contents

1. **[New Features](#new-features)**
1. **[Before Using the SDK](#before-using-the-sdk)**
    * [Signing Up for AWS](#signing-up-for-aws)
        * [To sign up for AWS](#to-sign-up-for-aws)
        * [To view your AWS credentials](#to-view-your-aws-credentials)
    * [Getting your AWS credentials](#getting-your-aws-credentials)
    * [Minimum requirements](#minimum-requirements)
1. **[Installing the SDK](#installing-the-sdk)**
    * [Installing via Composer](#installing-via-composer)
    * [Installing via Phar](#installing-via-phar)
    * [Installing via PEAR](#installing-via-pear)
1. **[Using the SDK](#using-the-sdk)**
    * [Quick Start](#quick-start)
    * [Using the Service Builder](#using-the-service-builder)
    * [Configuration](#configuration)
    * [Using a Custom Configuration File](#using-a-custom-configuration-file)
1. **[More Examples](#more-examples)**
1. **[Contributing to the SDK](#contributing-to-the-sdk)**

## New Features

- [PHP 5.3 namespaces](http://php.net/namespaces)
- Follows [PSR-0, PSR-1, and PSR-2 standards](http://php-fig.org)
- Built on [Guzzle](http://guzzlephp.org) and utilizes the Guzzle feature set
- Persistent connection management for both serial and parallel requests
- Event hooks (via [Symfony2 EventDispatcher](http://symfony.com/doc/2.0/components/event_dispatcher/introduction.html))
  for event-driven, custom behavior
- Request and response entity bodies are stored in `php://temp` streams to reduce memory usage
- Transient networking and cURL failures are automatically retried using truncated exponential backoff
- Plug-ins for over-the-wire logging and response caching
- "Waiter" objects that allow you to poll a resource until it is in a desired state
- Resource iterator objects for easily iterating over paginated responses
- Service-specific sets of exceptions
- Modelled responses with a simpler interface
- Grouped constants (Enums) for service parameter options
- Flexible request batching system
- Service builder/container that supports easy configuration and dependency injection
- Full unit test suite with extensive code coverage
- [Composer](http://getcomposer.org) support for installing and autoloading SDK dependencies
- [Phing](http://phing.info) `build.xml` for installing dev tools, driving testing, and producing `.phar` files
- Fast Amazon DynamoDB batch PutItem and DeleteItem system
- Multipart upload system for Amazon Simple Storage Service (Amazon S3) and Amazon Glacier that can be paused and
  resumed.
- Redesigned DynamoDB Session Handler
- Improved multi-region support

## Before Using the SDK

There is some basic information you need to know before you get started using the SDK.

### Signing Up for AWS

Before you begin, you need to create an account. When you sign up for AWS, AWS signs your account up for all services.
You are charged only for the services you use.

#### To sign up for AWS

1. Go to http://aws.amazon.com and click **Sign Up Now**.
1. Follow the on-screen instructions.

AWS sends you a confirmation email after the sign-up process is complete. At any time, you can view your current account
activity and manage your account at http://aws.amazon.com/account. From the **My Account** page, you can view current
charges and account activity and download usage reports.

#### To view your AWS credentials

1. Go to http://aws.amazon.com/.
1. Click **My Account/Console**, and then click **Security Credentials**.
1. Under **Your Account**, click **Security Credentials**.
1. In the spaces provided, type your user name and password, and then click **Sign in using our secure server**.
1. Under **Access Credentials**, on the **Access Keys** tab, your access key ID is displayed. To view your secret key,
   under **Secret Access Key**, click **Show**.

Your secret key must remain a secret that is known only by you and AWS. Keep it confidential in order to protect your
account. Store it securely in a safe place, and never email it. Do not share it outside your organization, even if an
inquiry appears to come from AWS or Amazon.com. No one who legitimately represents Amazon will ever ask you for your
secret key.

### Getting your AWS credentials

In order to use the AWS SDK for PHP, you need your AWS Access Key ID and Secret Access Key.

To get your AWS Access Key ID and Secret Access Key

- Go to http://aws.amazon.com/.
- Click **Account** and then click **Security Credentials**. The Security Credentials page displays (you might be
  prompted to log in).
- Scroll down to Access Credentials and make sure the **Access Keys** tab is selected. The AWS Access Key ID appears in
  the Access Key column.
- To view the Secret Access Key, click **Show**.

**Important: your Secret Access Key is a secret**, which only you and AWS should know. It is important to keep it
confidential to protect your account. Store it securely in a safe place. Never include it in your requests to AWS, and
never e-mail it to anyone. Do not share it outside your organization, even if an inquiry appears to come from AWS or
Amazon.com. No one who legitimately represents Amazon will ever ask you for your Secret Access Key.

### Minimum requirements

Aside from a baseline understanding of object-oriented programming in PHP (including PHP 5.3 namespaces), there are a
few minimum system requirements to start using the AWS SDK for PHP 2. The extensions listed are common and are installed
with PHP 5.3 by default in most environments.

- Minimum requirements
    - PHP 5.3.3+ compiled with the cURL extension
    - A recent version of cURL 7.16.2+ compiled with OpenSSL and zlib
- To use Amazon CloudFront private distributions, you must have the [OpenSSL PHP extension](http://us2.php.net/openssl)
  (which is not the same as any low-level OpenSSL libraries you may have installed on your system) to sign private
  CloudFront URLs.
- To improve the overall performance of your PHP environment, as well as to enable in-memory caching, it is **highly
  recommended** that you install an [opcode cache](https://secure.wikimedia.org/wikipedia/en/wiki/PHP_accelerator) such
  as [APC](http://php.net/apc), [XCache](http://xcache.lighttpd.net), or another extension that can be used by
  [Doctrine\Common\Cache](https://github.com/doctrine/common/tree/master/lib/Doctrine/Common/Cache>). For APC, it is
  recommended that you set the `apc.shm_size` INI setting to be `64MB` or higher.

## Installing the SDK

### Installing via Composer

Using [Composer](http://getcomposer.org) is the recommended way to install the AWS SDK for PHP 2. Composer is
dependency management tool for PHP that allows you to declare the dependencies your project needs and installs them into
your project. In order to use the AWS SDK for PHP 2 through Composer, you must do the following:

1. Add `"aws/aws-sdk-php"` as a dependency in your project's `composer.json` file.

    ```json
        {
            "require": {
                "aws/aws-sdk-php": "2.*"
            }
        }
    ```

    Consider tightening your dependencies to a known version when deploying mission critical applications (e.g.,
    `2.0.*`).

1. Download and install Composer.

        curl -s "http://getcomposer.org/installer" | php

1. Install your dependencies.

        php composer.phar install

1. Require Composer's autoloader.

    Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries
    that it downloads. To use it, just add the following line to your code's bootstrap process.

        require '/path/to/sdk/vendor/autoload.php';

You can find out more on how to install Composer, configure autoloading, and other best-practices for defining
dependencies at [getcomposer.org](http://getcomposer.org).

### Installing via Phar

Each release of the AWS SDK for PHP ships with a pre-packaged [phar](<http://php.net/manual/en/book.phar.php) file
containing all of the classes and dependencies you need to run the SDK. Additionally, the phar file automatically
registers a class autoloader for the AWS SDK for PHP and all of its dependencies when included. Bundled with the phar
file are the following required and suggested libraries:

-  [Guzzle](https://github.com/guzzle/guzzle) for HTTP requests
-  [Symfony2 EventDispatcher](http://symfony.com/doc/master/components/event_dispatcher/introduction.html) for events
-  [Monolog](https://github.com/seldaek/monolog) for logging
-  [Doctrine](https://github.com/doctrine/common) for caching

You can download the packaged Phar at http://pear.amazonwebservices.com/get/aws.phar. Simply include it in your scripts
to get started:

    require 'aws.phar';

**Note:** If you are using PHP with the Suhosin patch (especially common on Ubuntu and Debian distributions), you will
need to enable the use of phars in the `suhosin.ini`. Without this, including a phar file in your code will cause it to
silently fail. You should modify the `suhosin.ini` file by adding the line:

    suhosin.executor.include.whitelist = phar

### Installing via PEAR

[PEAR](http://pear.php.net), which stands for *PHP Extension and Application Repository*, is a framework and
distribution system for reusable PHP components. It is the PHP equivalent of other package management solutions
like Yum that install packages system-wide.

PEAR packages are easy to install, and are available in your PHP environment path so that they are accessible to
any PHP project. PEAR packages are not specific to your project, but rather to the machine they're installed on.

From the command-line, you can install the SDK with PEAR as follows. _**Note:** You may need to use `sudo` for the
following command._

    pear -D auto_discover=1 install pear.amazonwebservices.com/sdk

Once the SDK has been installed via PEAR, you can load the phar into your project with:

    require 'AWSSDKforPHP/aws.phar';

## Using the SDK

### Quick Start

You can quickly get up and running by using a web service client's factory method to instantiate clients as needed.

```php
<?php

// Include the SDK along with your other project dependencies
// using the Composer autoloader
require 'vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;
use Aws\Common\Enum\Region;

// Instantiate the DynamoDB client with your AWS credentials
$client = DynamoDbClient::factory(array(
    'key'    => 'your-aws-access-key-id',
    'secret' => 'your-aws-secret-access-key',
    'region' => Region::US_WEST_2
));

$table = 'posts';

// Create a "posts" table
$result = $client->createTable(array(
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
$client->waitUntil('TableExists', array('TableName' => $table));

echo "The {$table} table has been created.\n";
```

**Note:** Instantiating a client without providing credentials causes the client to attempt to retrieve [IAM Instance
Profile credentials](http://docs.amazonwebservices.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances).

The preceding syntax for creating a table should look familiar to those who have used the first AWS SDK. One difference
is that **every** service operation (or "command") now accepts *only a single array* as an argument.

The `createTable()` method doesn't actually exist on the client. It is implemented using the ``__call()`` magic method
of the client and acts as a shortcut to instantiate a command, execute the command, and retrieve the result.

```php
<?php

// The shortcut via __call
$result = $client->createTable(array(/* ... */));

// The command based syntax
$command = $client->getCommand('CreateTable', array(/* ... */));
$result = $command->getResult();
```

When using the command based syntax, the return value is a "Command" object, which encapsulates the request and response
of the call to AWS. From the command object, you can call the `getResult()` method (as in the preceding example) or the
`execute()` method to get the parsed result, or you can call the `getResponse()` method if you need to get information
about the response (e.g., the status code or the raw response).

The command object can also be useful when you want to manipulate the request before execution or need to execute
several commands in parallel. It also supports a chainable syntax.

```php
<?php

$result = $client->getCommand('ListTables')
    ->set('Limit', 5)
    ->set('ExclusiveStartTableName', 'some-table-name')
    ->getResult();
```

### Using the Service Builder

When using the SDK, you have the option to use individual factory methods for each client or the `Aws\Common\Aws` class
to build your clients. The `Aws\Common\Aws` class is a service builder and dependency injection container for the SDK
and is the recommended way for instantiating clients. The service builder allows you to share configuration options
between multiple services and pre-wires short service names with the appropriate client class.

The following example shows how to use the service builder to retrieve a `Aws\DynamoDb\DynamoDbClient` and perform the
`GetItem` operation using the command syntax.

Passing an associative array of parameters as the first or second argument of `Aws\Common\Aws::factory()` treats the
parameters as shared across all clients generated by the builder. In the example, we tell the service builder to use
the same credentials for every client.

**Note:** Unlike the prior SDK, service clients throw exceptions for failed requests. Be sure to use `try` and `catch`
blocks appropriately.

```php
<?php

// Include the SDK using the phar
require 'aws.phar';

use Aws\Common\Aws;
use Aws\Common\Enum\Region;
use Aws\DynamoDb\Exception\DynamoDbException;

// Create a service building using shared credentials for each service
$aws = Aws::factory(array(
    'key'    => 'your-aws-access-key-id',
    'secret' => 'your-aws-secret-access-key',
    'region' => Region::US_WEST_2
));

// Retrieve the DynamoDB client by its short name from the service builder
$client = $aws->get('dynamodb');

// Get an item from the "posts"
try {
    $result = $client->getItem(array(
        'TableName' => 'posts',
        'Key' => $client->formatAttributes(array(
            'HashKeyElement' => 'using-dynamodb-with-the-php-sdk'
        )),
        'ConsistentRead' => true
    ));

    print_r($result['Item']);
} catch (DynamoDbException $e) {
    echo 'The item could not be retrieved.';
}
```

Passing an associative array of parameters to the first or second argument of `Aws\Common\Aws::factory()` will treat the
parameters as shared parameters across all clients generated by the builder. In the above example, we are telling the
service builder to use the same credentials for every client.

### Configuration

When passing an array of parameters to the first argument of `Aws\Common\Aws::factory()`, the service builder loads the
default `aws-config.php` file and merge the array of shared parameters into the default configuration.

Excerpt from `src/Aws/Common/Resources/aws-config.php`:

```php
<?php
return array(
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
```

The `aws-config.php` file provides default configuration settings for associating client classes with service names.
This file tells the `Aws\Common\Aws` service builder which class to instantiate when you reference a client by name.

None of the service configurations have defined `key` or `secret` settings. Unless you wish to use IAM Instance Profile
credentials, you will need to supply credentials to the service builder in order to use access credentials with each
client. For example, the code sample in *Using the Service Builder* is using the default aws-config.json file and
merging shared credentials into each client by passing an array into the first argument of `Aws\Common\Aws::factory()`.

### Using a Custom Configuration File

You can use a custom configuration file that allows you to create custom named clients with pre-configured settings.

Let's say you want to use the default `aws-config.php` settings, but you want to supply your keys using a configuration
file. Each service defined in the default configuration file extends from `default_settings` service. You can create a
custom configuration file that extends the default configuration file and add credentials to the `default_settings`
service:

```php
<?php
return array(
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
```

You can use your custom configuration file with the `Aws\Common\Aws` class by passing the full path to the configuration
file in the first argument of the `factory()` method:

```php
<?php

require 'aws.phar';
use Aws\Common\Aws;

$aws = Aws::factory('/path/to/custom/config.php');
```

You can create custom named services if you need to use multiple accounts with the same service:

```php
<?php
return array(
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
```

If you prefer JSON syntax, you can define your configuration in JSON format instead of PHP.

```json
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
```

## More Examples

### Uploading a File to Amazon S3

```php
<?php

require 'vendor/autoload.php';

use Aws\Common\Aws;
use Aws\S3\Enum\CannedAcl;
use Aws\S3\Exception\S3Exception;

// Instantiate an S3 client
$s3 = Aws::factory('/path/to/config.php')->get('s3');

// Upload a publicly accessible file. File size, file type, and md5 hash are automatically calculated by the SDK
try {
    $s3->putObject(array(
        'Bucket' => 'my-bucket',
        'Key'    => 'my-object',
        'Body'   => fopen('/path/to/file', 'r'),
        'ACL'    => CannedAcl::PUBLIC_READ
    ));
} catch (S3Exception $e) {
    echo "The file was not uploaded.\n";
}
```

### List the Names of Every Object in Your Amazon S3 Account

```php
<?php

require 'vendor/autoload.php';

use Aws\Common\Aws;

// Instantiate an S3 client
$s3 = Aws::factory('/path/to/config.php')->get('s3');

foreach ($s3->getIterator('ListBuckets') as $bucket) {
    foreach ($s3->getIterator('ListObjects', array('Bucket' => $bucket['Name'])) as $object) {
        echo $bucket['Name'] . '/' . $object['Key'] . PHP_EOL;
    }
}
```

### Upload a Large File to Amazon S3 in 10 MB Parts

```php
<?php

require 'vendor/autoload.php';

use Aws\Common\Aws;
use Aws\Common\Enum\Size;
use Aws\Common\Exception\MultipartUploadException;
use Aws\S3\Model\MultipartUpload\UploadBuilder;

// Instantiate an S3 client
$s3 = Aws::factory('/path/to/config.php')->get('s3');

// Prepare the upload parameters
$uploader = UploadBuilder::newInstance()
    ->setClient($s3)
    ->setSource('/path/to/large/file.mov')
    ->setBucket('my-bucket')
    ->setKey('my-object-key')
    ->setMinPartSize(10 * Size::MB)
    ->build();

// Perform the upload. Abort the upload if something goes wrong
try {
    $uploader->upload();
    echo "Upload complete.\n";
} catch (MultipartUploadException $e) {
    $uploader->abort();
    echo "Upload failed.\n";
}
```

## Contributing to the SDK

We work hard to provide a high-quality and useful SDK, and we greatly value feedback and contributions from our
community. Whether it's a new feature, correction, or additional documentation, we welcome your pull requests. With
version 2 of the SDK, we've tried to make our development even more open than before. Please submit any
[issues](https://github.com/aws/aws-sdk-php/issues) or [pull requests](https://github.com/aws/aws-sdk-php/pulls) through
GitHub. Here are a few things to keep in mind for your contributions:

1. The SDK is released under the [Apache license](http://aws.amazon.com/apache2.0/). Any code you submit will be
   released under that license. For substantial contributions, we may ask you to sign a [Contributor License Agreement
   (CLA)](http://en.wikipedia.org/wiki/Contributor_License_Agreement).
2. We follow the [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md),
   [PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md), and
   [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) recommendations
   from the [PHP Framework Interop Group](http://php-fig.org). Please submit code that follows these standards. The
   [PHP CS Fixer](http://cs.sensiolabs.org/) tool can be helpful for formatting your code.
3. We maintain a high percentage of code coverage in our unit tests. If you make changes to the code, please add,
   update, and/or remove unit (and integration) tests as appropriate.
4. We do not accept pull requests that change `client.php` files (i.e., `src/Aws/*/Resources/client.php`). We generate
   these files based on our internal knowledge of the AWS services.
5. If your code does not conform to the PSR standards or does not include adequate tests, we may ask you to update your
   pull requests before we accept them. We also reserve the right to deny any pull requests that do not align with our
   standards or goals.
6. If you would like to implement support for an AWS service that is not yet available in the SDK, please talk to us
   beforehand to avoid any duplication of effort.
