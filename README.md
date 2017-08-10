# AWS SDK for PHP - Version 3

[![@awsforphp on Twitter](http://img.shields.io/badge/twitter-%40awsforphp-blue.svg?style=flat)](https://twitter.com/awsforphp)
[![Total Downloads](https://img.shields.io/packagist/dt/aws/aws-sdk-php.svg?style=flat)](https://packagist.org/packages/aws/aws-sdk-php)
[![Build Status](https://img.shields.io/travis/aws/aws-sdk-php.svg?style=flat)](https://travis-ci.org/aws/aws-sdk-php)
[![Apache 2 License](https://img.shields.io/packagist/l/aws/aws-sdk-php.svg?style=flat)](http://aws.amazon.com/apache-2-0/)
[![Gitter](https://badges.gitter.im/aws/aws-sdk-php.svg)](https://gitter.im/aws/aws-sdk-php?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)
[![codecov](https://codecov.io/gh/aws/aws-sdk-php/branch/master/graph/badge.svg)](https://codecov.io/gh/aws/aws-sdk-php)

The **AWS SDK for PHP** makes it easy for developers to access [Amazon Web
Services][aws] in their PHP code, and build robust applications and software
using services like Amazon S3, Amazon DynamoDB, Amazon Glacier, etc. You can
get started in minutes by [installing the SDK through Composer][docs-installation]
or by downloading a single zip or phar file from our [latest release][latest-release].

## Resources

* [User Guide][docs-guide] – For both getting started and in-depth SDK usage information
* [API Docs][docs-api] – For details about operations, parameters, and responses
* [Blog][sdk-blog] – Tips & tricks, articles, and announcements
* [Sample Project][sdk-sample] - A quick, sample project to help get you started
* [Forum][sdk-forum] – Ask questions, get help, and give feedback
* [Issues][sdk-issues] – Report issues, submit pull requests, and get involved
  (see [Apache 2.0 License][sdk-license])
* [@awsforphp][sdk-twitter] – Follow us on Twitter

## Getting Help

Please use these community resources for getting help. We use the GitHub issues for tracking bugs and feature requests and have limited bandwidth to address them.

* Ask a question on [StackOverflow](https://stackoverflow.com/) and tag it with [`aws-php-sdk`](http://stackoverflow.com/questions/tagged/aws-php-sdk)
* Come join the AWS SDK for PHP [gitter](https://gitter.im/aws/aws-sdk-php)
* Open a support ticket with [AWS Support](https://console.aws.amazon.com/support/home/)
* If it turns out that you may have found a bug, please [open an issue](https://github.com/aws/aws-sdk-php/issues/new)

## Opening Issues

If you encounter a bug with `aws-sdk-php` we would like to hear about it. Search the existing issues and try to make sure your problem doesn’t already exist before opening a new issue. It’s helpful if you include the version of `aws-sdk-php`, PHP version and OS you’re using. Please include a stack trace and reduced repro case when appropriate, too.

The GitHub issues are intended for bug reports and feature requests. For help and questions with using `aws-sdk-php` please make use of the resources listed in the Getting Help section. There are limited resources available for handling issues and by keeping the list of open issues lean we can respond in a timely manner.

## Features

* Provides easy-to-use HTTP clients for all supported AWS
  [services][docs-services], [regions][docs-rande], and authentication
  protocols.
* Is built on [Guzzle][guzzle-docs], and utilizes many of its features,
  including persistent connections, asynchronous requests, middlewares, etc.
* Provides convenience features including easy result pagination via
  [Paginators][docs-paginators], [Waiters][docs-waiters], and simple
  [Result objects][docs-results].
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
   sign up for an AWS account and retrieve your [AWS credentials][docs-signup].
1. **Minimum requirements** – To run the SDK, your system will need to meet the
   [minimum requirements][docs-requirements], including having **PHP >= 5.5**
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
   the basic concepts.

## Quick Examples

### Create an Amazon S3 client

```php
<?php
// Require the Composer autoloader.
require 'vendor/autoload.php';

use Aws\S3\S3Client;

// Instantiate an Amazon S3 client.
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'us-west-2'
]);
```

### Upload a file to Amazon S3

```php
<?php
// Upload a publicly accessible file. The file size and type are determined by the SDK.
try {
    $s3->putObject([
        'Bucket' => 'my-bucket',
        'Key'    => 'my-object',
        'Body'   => fopen('/path/to/file', 'r'),
        'ACL'    => 'public-read',
    ]);
} catch (Aws\S3\Exception\S3Exception $e) {
    echo "There was an error uploading the file.\n";
}
```

### Related AWS Projects

* [AWS Service Provider for Laravel][mod-laravel]
* [AWS SDK ZF2 Module][mod-zf2]
* [AWS Service Provider for Silex][mod-silex]
* [AWS SDK Bundle for Symfony][mod-symfony]
* [Amazon SNS Message Validator for PHP][sns-validator] - SNS validator without requiring SDK
* [Guzzle Version 6][guzzle-docs] – PHP HTTP client and framework
* For Version 2 of the SDK:
  * [User Guide][docs-guide-v2]
  * [API Docs][docs-api-v2]
* Other [AWS SDKs & Tools][aws-tools] (e.g., js, cli, ruby, python, java, etc.)

[sdk-website]: http://aws.amazon.com/sdkforphp
[sdk-forum]: https://forums.aws.amazon.com/forum.jspa?forumID=80
[sdk-issues]: https://github.com/aws/aws-sdk-php/issues
[sdk-license]: http://aws.amazon.com/apache2.0/
[sdk-blog]: http://blogs.aws.amazon.com/php
[sdk-twitter]: https://twitter.com/awsforphp
[sdk-sample]: http://aws.amazon.com/developers/getting-started/php

[install-packagist]: https://packagist.org/packages/aws/aws-sdk-php
[latest-release]: https://github.com/aws/aws-sdk-php/releases

[docs-api]: http://docs.aws.amazon.com/aws-sdk-php/v3/api/index.html
[docs-guide]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/index.html
[docs-api-v2]: http://docs.aws.amazon.com/aws-sdk-php/v2/api/index.html
[docs-guide-v2]: http://docs.aws.amazon.com/aws-sdk-php/v2/guide/index.html
[docs-contribution]: https://github.com/aws/aws-sdk-php/blob/master/CONTRIBUTING.md
[docs-migration]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/migration.html
[docs-signup]: http://aws.amazon.com/developers/access-keys/
[docs-requirements]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/requirements.html
[docs-installation]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/installation.html
[docs-quickstart]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/#getting-started
[docs-paginators]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/paginators.html
[docs-waiters]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/waiters.html
[docs-results]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/basic-usage.html#result-objects
[docs-exceptions]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/quick-start.html#error-handling
[docs-wire-logging]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/faq.html#how-can-i-see-what-data-is-sent-over-the-wire
[docs-ddbsh]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/service/dynamodb-session-handler.html
[docs-services]: https://aws.amazon.com/products/
[docs-rande]: http://docs.aws.amazon.com/general/latest/gr/rande.html
[docs-streamwrapper]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/service/s3-stream-wrapper.html
[docs-s3-transfer]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/service/s3-transfer.html
[docs-s3-multipart]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/service/s3-multipart-upload.html

[aws]: http://aws.amazon.com
[aws-iam-credentials]: http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances
[aws-tools]: http://aws.amazon.com/tools
[guzzle-docs]: http://guzzlephp.org
[composer]: http://getcomposer.org
[packagist]: http://packagist.org
[psr-7]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-7-http-message.md
[psr-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md
[psr-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[psr-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md

[mod-laravel]: https://github.com/aws/aws-sdk-php-laravel
[mod-zf2]: https://github.com/aws/aws-sdk-php-zf2
[mod-silex]: https://github.com/aws/aws-sdk-php-silex
[mod-symfony]: https://github.com/aws/aws-sdk-php-symfony
[sns-validator]: https://github.com/aws/aws-php-sns-message-validator
