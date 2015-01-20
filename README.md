# AWS SDK for PHP

[![Latest Stable Version](https://poser.pugx.org/aws/aws-sdk-php/version.svg)](https://packagist.org/packages/aws/aws-sdk-php)
[![Total Downloads](https://poser.pugx.org/aws/aws-sdk-php/d/total.svg)](https://packagist.org/packages/aws/aws-sdk-php)
[![Build Status](https://travis-ci.org/aws/aws-sdk-php.png)](https://travis-ci.org/aws/aws-sdk-php)
[![Gitter](https://badges.gitter.im/Join Chat.svg)](https://gitter.im/aws/aws-sdk-php?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)

The **AWS SDK for PHP** enables PHP developers to use [Amazon Web Services][aws]
in their PHP code, and build robust applications and software using services
like Amazon S3, Amazon DynamoDB, Amazon Glacier, etc. You can get started in
minutes by [installing the SDK through Composer][docs-installation] or by
downloading a single zip or phar file from our [latest release][latest-release].

## Resources

* [User Guide][docs-guide] – For in-depth getting started and usage information
* [API Docs][docs-api] – For operations, parameters, responses, and examples
* [Blog][sdk-blog] – Tips & tricks, articles, and announcements
* [Sample Project][sdk-sample] - A quick, sample project to help get you started
* [Forum][sdk-forum] – Ask questions, get help, and give feedback
* [Issues][sdk-issues] – Report issues and submit pull requests
  (see [Apache 2.0 License][sdk-license])
* [@awsforphp][sdk-twitter] – Follow us on Twitter

## Installing

The recommended way to install the AWS SDK for PHP is through Composer.

1. Install Composer:

        curl -sS https://getcomposer.org/installer | php

2. Next, run the Composer command to install the latest stable version of
   the AWS SDK for PHP:

        composer require aws/aws-sdk-php

3. After installing, you need to require Composer's autoloader in your app:

        require 'vendor/autoload.php';

More installation instructions can be found in the
[User Guide][docs-installation].

## Features

* Provides easy-to-use HTTP clients for all supported AWS
  [services][docs-services], [regions][docs-rande], and authentication
  protocols.
* Is built on [Guzzle v5][guzzle-docs], and utilizes many of its features, including
  persistent connections, concurrent requests, events and plugins, etc.
* Provides convenience features including easy response pagination via
  [Iterators][docs-iterators], resource [Waiters][docs-waiters], and simple
  [modelled responses][docs-models].
* Provides a [multipart uploader tool][docs-s3-multipart] for Amazon S3 and
  Amazon Glacier that can be paused and resumed.
* Provides an [Amazon S3 Stream Wrapper][docs-streamwrapper], so that you can
  use PHP's native file handling functions to interact with your S3 buckets and
  objects like a local filesystem.
* Provides the [Amazon DynamoDB Session Handler][docs-ddbsh] for easily scaling
  sessions on a fast, NoSQL database.
* Automatically uses [IAM Instance Profile Credentials][aws-iam-credentials] on
  configured Amazon EC2 instances.

## Getting Started

1. **Sign up for AWS** – Before you begin, you need to
   [sign up for an AWS account][docs-signup] and retrieve your AWS credentials.
1. **Minimum requirements** – To run the SDK, your system will need to meet the
   [minimum requirements][docs-requirements], including having **PHP >= 5.5.0**
   compiled with the cURL extension and cURL 7.16.2+ compiled with a TLS
   backend (e.g., NSS or OpenSSL).
1. **Install the SDK** – Using [Composer] is the recommended way to install the
   AWS SDK for PHP. The SDK is available via [Packagist] under the
   [`aws/aws-sdk-php`][install-packagist] package. Please see the
   [Installation section of the User Guide][docs-installation] for more
   detailed information about installing the SDK through Composer and other
   means.
1. **Using the SDK** – The best way to become familiar with how to use the SDK
   is to read the [User Guide][docs-guide]. The
   [Getting Started Guide][docs-quickstart] will help you become familiar with
   the basic concepts, and there are also specific guides for each of the
   [supported services][docs-services].

## Quick Examples

### Create an Amazon S3 client

```php
<?php
// Require the Composer autoloader.
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\S3Exception;

// Instantiate an Amazon S3 client.
$s3 = S3Client::factory([
    'version' => 'latest',
    'region'  => 'us-west-2'
]);
```

### Upload a file to Amazon S3

```php
<?php
// Upload a publicly accessible file. The file size, file type, and MD5 hash
// are automatically calculated by the SDK.
try {
    $s3->putObject([
        'Bucket' => 'my-bucket',
        'Key'    => 'my-object',
        'Body'   => fopen('/path/to/file', 'r'),
        'ACL'    => 'public-read',
    ]);
} catch (S3Exception $e) {
    echo "There was an error uploading the file.\n";
}
```

### Related Projects

* [AWS Service Provider for Laravel][mod-laravel]
* [AWS SDK ZF2 Module][mod-zf2]
* [AWS Service Provider for Silex][mod-silex]
* [Guzzle v5][guzzle-docs] – PHP HTTP client and framework
* Other [AWS SDKs & Tools][aws-tools] (e.g., js, cli, ruby, python, java, etc.)

[sdk-website]: http://aws.amazon.com/sdkforphp
[sdk-forum]: https://forums.aws.amazon.com/forum.jspa?forumID=80
[sdk-issues]: https://github.com/aws/aws-sdk-php/issues
[sdk-license]: http://aws.amazon.com/apache2.0/
[sdk-blog]: http://blogs.aws.amazon.com/php
[sdk-twitter]: https://twitter.com/awsforphp
[sdk-sample]: http://aws.amazon.com/developers/getting-started/php

[install-packagist]: https://packagist.org/packages/aws/aws-sdk-php
[latest-release]: https://github.com/aws/aws-sdk-php/releases/latest

[docs-api]: http://docs.aws.amazon.com/aws-sdk-php/v3/api/index.html
[docs-guide]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html
[docs-contribution]: https://github.com/aws/aws-sdk-php/blob/master/CONTRIBUTING.md
[docs-performance]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/performance.html
[docs-migration]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/migration-guide.html
[docs-signup]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/awssignup.html
[docs-requirements]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/requirements.html
[docs-installation]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/installation.html
[docs-quickstart]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/quick-start.html
[docs-iterators]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/quick-start.html#iterators
[docs-waiters]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/feature-waiters.html
[docs-models]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/feature-models.html
[docs-exceptions]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/quick-start.html#error-handling
[docs-wire-logging]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/faq.html#how-can-i-see-what-data-is-sent-over-the-wire
[docs-services]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html#supported-services
[docs-ddbsh]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/feature-dynamodb-session-handler.html
[docs-rande]: http://docs.aws.amazon.com/general/latest/gr/rande.html
[docs-streamwrapper]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-s3.html#amazon-s3-stream-wrapper
[docs-s3-sync]: http://blogs.aws.amazon.com/php/post/Tx2W9JAA7RXVOXA/Syncing-Data-with-Amazon-S3
[docs-s3-multipart]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-s3.html#uploading-large-files-using-multipart-uploads

[aws]: http://aws.amazon.com
[aws-iam-credentials]: http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances
[aws-tools]: http://aws.amazon.com/tools
[guzzle]: https://github.com/guzzle/guzzle3
[guzzle-docs]: https://guzzlephp.org
[composer]: http://getcomposer.org
[packagist]: http://packagist.org
[psr-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md
[psr-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[psr-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md

[mod-laravel]: https://github.com/aws/aws-sdk-php-laravel
[mod-zf2]: https://github.com/aws/aws-sdk-php-zf2
[mod-silex]: https://github.com/aws/aws-sdk-php-silex
