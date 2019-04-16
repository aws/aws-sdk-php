# AWS SDK for PHP

[![@awsforphp on Twitter](http://img.shields.io/badge/twitter-%40awsforphp-blue.svg?style=flat)](https://twitter.com/awsforphp)
[![Total Downloads](https://img.shields.io/packagist/dt/aws/aws-sdk-php.svg?style=flat)](https://packagist.org/packages/aws/aws-sdk-php)
[![Build Status](https://img.shields.io/travis/aws/aws-sdk-php.svg?style=flat)](https://travis-ci.org/aws/aws-sdk-php)
[![Apache 2 License](https://img.shields.io/packagist/l/aws/aws-sdk-php.svg?style=flat)](http://aws.amazon.com/apache-2-0/)
[![Code Climate](https://codeclimate.com/github/aws/aws-sdk-php/badges/gpa.svg)](https://codeclimate.com/github/aws/aws-sdk-php)
[![Gitter](https://badges.gitter.im/Join Chat.svg)](https://gitter.im/aws/aws-sdk-php?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)

The **AWS SDK for PHP** enables PHP developers to use [Amazon Web Services][aws]
in their PHP code, and build robust applications and software using services
like Amazon S3, Amazon DynamoDB, Amazon Glacier, etc. You can get started in
minutes by [installing the SDK through Composer][docs-installation] or by
downloading a single zip or phar file from our [latest release][latest-release].

## Deprecation Notice - S3 Signature V2

[S3 support for Signature V2 is being deprecated](https://docs.aws.amazon.com/AmazonS3/latest/dev/UsingAWSSDK.html#UsingAWSSDK-sig2-deprecation), 
after which only Signature V4 will be supported. Users of V2 of the PHP SDK will 
have to upgrade to version 2.5 or later in order to continue using S3. It is 
recommended to upgrade to version 3 of the SDK, which uses Signature V4
as a default, if possible. To use Signature V4 with version 2.5+ of the SDK, you 
can specify `signature` as a configuration option, as in the following example.

```php
    $client = S3Client::factory([
        'region' => 'us-east-2',
        'version' => 'latest',
        'signature' => 'v4'
    ]);
```

## Resources

* [User Guide][docs-guide] – For in-depth getting started and usage information
* [API Docs][docs-api] – For operations, parameters, responses, and examples
* [Blog][sdk-blog] – Tips & tricks, articles, and announcements
* [Sample Project][sdk-sample] - A quick, sample project to help get you started
* [Forum][sdk-forum] – Ask questions, get help, and give feedback
* [Issues][sdk-issues] – Report issues and submit pull requests
  (see [Apache 2.0 License][sdk-license])
* [@awsforphp][sdk-twitter] – Follow us on Twitter
* [Building Apps with Version 3 of the AWS SDK for PHP](http://youtu.be/STrtR89f5Pc) video from AWS
  re:Invent 2014

## Features

* Provides easy-to-use HTTP clients for all supported AWS
  [services][docs-services], [regions][docs-rande], and authentication
  protocols.
* Is built for PHP 5.3.3+ and is compliant with [PSR-0], [PSR-1], and [PSR-2].
* Is easy to install through [Composer][install-packagist], or by downloading
  the phar or zip file of our [latest release][latest-release].
* Is built on [Guzzle v3][guzzle], and utilizes many of its features, including
  persistent connections, parallel requests, events and plugins
  (via [Symfony2 EventDispatcher][symfony2-events]), service descriptions,
  [over-the-wire logging][docs-wire-logging], caching, flexible batching, and
  request retrying with truncated exponential backoff.
* Provides convenience features including easy response pagination via
  [Iterators][docs-iterators], resource [Waiters][docs-waiters], and simple
  [modelled responses][docs-models].
* Allows you to [sync local directories to Amazon S3 buckets][docs-s3-sync].
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
   [minimum requirements][docs-requirements], including having **PHP 5.3.3+**
   compiled with the cURL extension and cURL 7.16.2+ compiled with OpenSSL and
   zlib.
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

## Quick Example

### Upload a File to Amazon S3

```php
<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// Instantiate an S3 client
$s3 = S3Client::factory();

// Upload a publicly accessible file. The file size, file type, and MD5 hash
// are automatically calculated by the SDK.
try {
    $s3->putObject(array(
        'Bucket' => 'my-bucket',
        'Key'    => 'my-object',
        'Body'   => fopen('/path/to/file', 'r'),
        'ACL'    => 'public-read',
    ));
} catch (S3Exception $e) {
    echo "There was an error uploading the file.\n";
}
```

You can also use the even easier `upload()` method, which will automatically do
either single or multipart uploads, as needed.

```php
try {
    $resource = fopen('/path/to/file', 'r');
    $s3->upload('my-bucket', 'my-object', $resource, 'public-read');
} catch (S3Exception $e) {
    echo "There was an error uploading the file.\n";
}
```

### More Examples

* [Get an object from Amazon S3 and save it to a file][example-s3-getobject]
* [Upload a large file to Amazon S3 in parts][example-s3-multipart]
* [Put an item in your Amazon DynamoDB table][example-dynamodb-putitem]
* [Send a message to your Amazon SQS queue][example-sqs-sendmessage]
* Please browse the [User Guide][docs-guide] and [API docs][docs-api] or check
  out our [AWS SDK Development Blog][sdk-blog] for even more examples and
  tutorials.

### Related Projects

* [AWS Service Provider for Laravel][mod-laravel]
* [AWS SDK ZF2 Module][mod-zf2]
* [AWS Service Provider for Silex][mod-silex]
* [Guzzle v3][guzzle-docs] – PHP HTTP client and framework
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

[docs-api]: http://docs.aws.amazon.com/aws-sdk-php/v2/api/index.html
[docs-guide]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/index.html
[docs-contribution]: https://github.com/aws/aws-sdk-php/blob/master/CONTRIBUTING.md
[docs-performance]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/performance.html
[docs-migration]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/migration-guide.html
[docs-signup]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/awssignup.html
[docs-requirements]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/requirements.html
[docs-installation]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/installation.html
[docs-quickstart]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/quick-start.html
[docs-iterators]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/quick-start.html#iterators
[docs-waiters]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/feature-waiters.html
[docs-models]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/feature-models.html
[docs-exceptions]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/quick-start.html#error-handling
[docs-wire-logging]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/faq.html#how-can-i-see-what-data-is-sent-over-the-wire
[docs-services]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/index.html#supported-services
[docs-ddbsh]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/feature-dynamodb-session-handler.html
[docs-rande]: http://docs.aws.amazon.com/general/latest/gr/rande.html
[docs-streamwrapper]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-s3.html#amazon-s3-stream-wrapper
[docs-s3-sync]: http://blogs.aws.amazon.com/php/post/Tx2W9JAA7RXVOXA/Syncing-Data-with-Amazon-S3
[docs-s3-multipart]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-s3.html#uploading-large-files-using-multipart-uploads

[aws]: http://aws.amazon.com
[aws-iam-credentials]: http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances
[aws-tools]: http://aws.amazon.com/tools
[guzzle]: https://github.com/guzzle/guzzle3
[guzzle-docs]: https://guzzle3.readthedocs.org
[composer]: http://getcomposer.org
[packagist]: http://packagist.org
[psr-0]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
[psr-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[psr-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[symfony2-events]: http://symfony.com/doc/2.3/components/event_dispatcher/introduction.html

[example-sqs-sendmessage]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-sqs.html#sending-messages
[example-s3-getobject]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-s3.html#saving-objects-to-a-file
[example-s3-multipart]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-s3.html#uploading-large-files-using-multipart-uploads
[example-dynamodb-putitem]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-dynamodb.html#adding-items

[mod-laravel]: https://github.com/aws/aws-sdk-php-laravel
[mod-zf2]: https://github.com/aws/aws-sdk-php-zf2
[mod-silex]: https://github.com/aws/aws-sdk-php-silex
