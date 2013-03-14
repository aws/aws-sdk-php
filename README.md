# AWS SDK for PHP 2

The **AWS SDK for PHP** enables PHP developers to easily work with [Amazon Web Services][aws] and build scalable
solutions with Amazon S3, Amazon DynamoDB, Amazon Glacier, and more. You can get started in minutes by [installing the
SDK through Composer][docs-installation] or by downloading a [single phar file][install-phar].

* [User Guide][docs-guide]
* [API Docs][docs-api]
* [SDK Homepage][sdk-website]
* [Forum][sdk-forum]
* [Issues][sdk-issues]
* [Packagist/Composer][install-packagist]
* [Contribution Guide][docs-contribution]
* [License][sdk-license]

## Features

* Provides easy-to-use HTTP clients for all supported AWS services, regions, and authentication protocols.
* Built for PHP 5.3.3+ and is compliant with [PSR-0][], [PSR-1][], and [PSR-2][].
* Easy to install through [Composer][install-packagist], [PEAR][install-pear], or the [`aws.phar`][install-phar].
* Built on [Guzzle][] and utilizes many of its features including persistent connections, parallel requests, events and
  plugins (via [Symfony2 EventDispatcher][symfony2-events]), service descriptions, [over-the-wire
  logging][docs-wire-logging], caching, flexible batching, and request retrying with truncated exponential backoff.
* Convenience features including [Iterators][docs-iterators], [Waiters][docs-waiters], Enums, [modelled
  responses][docs-models], and [service-specific exceptions][docs-exceptions].
* Multipart uploader for Amazon S3 and Amazon Glacier that can be paused and resumed.
* DynamoDB Session Handler for easily scaling sessions.
* Automatically uses [IAM Instance Profile Credentials][aws-iam-credentials] on configured Amazon EC2 instances.
* And more!

## Getting Started

1. **Sign up for AWS** – Before you begin, you need an AWS account. Please see the [Signing Up for AWS][docs-signup]
   section of the user guide for information about how to create an AWS account and retrieve your AWS credentials.
1. **Minimum requirements** – To run the SDK you will need **PHP 5.3.3+** compiled with the cURL extension and cURL
   7.16.2+ compiled with OpenSSL and zlib. For more information about the requirements and optimum settings for the SDK,
   please see the [Requirements][docs-requirements] section of the user guide.
1. **Install the SDK** – Using [Composer][] is the recommended way to install the AWS SDK for PHP. The SDK is available
   via [Packagist][] under the [`aws/aws-sdk-php`][install-packagist] package. Please see the
   [Installation][docs-installation] section of the user guide for more detailed information about installing the SDK
   through Composer and other means.
1. **Using the SDK** – The best way to become familiar with how to use the SDK is to read the [User Guide][docs-guide].
   The [Quick Start Guide][docs-quickstart] will help you become familiar with the basic concepts, and there are also
   specific guides for each of the [supported services][docs-services].

## Quick Examples

### Upload a File to Amazon S3

```php
<?php

require 'vendor/autoload.php';

use Aws\Common\Aws;
use Aws\S3\Enum\CannedAcl;
use Aws\S3\Exception\S3Exception;

// Instantiate an S3 client
$s3 = Aws::factory('/path/to/config.php')->get('s3');

// Upload a publicly accessible file. File size, file type, and MD5 hash are automatically calculated by the SDK
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

### More Examples

* [Get an object from Amazon S3 and save it to a file][example-s3-getobject]
* [Upload a large file to Amazon S3 in parts][example-s3-multipart]
* [Put an item in your Amazon DynamoDB table][example-dynamodb-putitem]
* [Send a message to your Amazon SQS queue][example-sqs-sendmessage]



[sdk-website]: http://aws.amazon.com/sdkforphp
[sdk-forum]: https://forums.aws.amazon.com/forum.jspa?forumID=8
[sdk-issues]: https://github.com/aws/aws-sdk-php/issues
[sdk-license]: http://aws.amazon.com/apache2.0/

[install-packagist]: https://packagist.org/packages/aws/aws-sdk-php
[install-phar]: http://pear.amazonwebservices.com/get/aws.phar
[install-pear]: http://pear.amazonwebservices.com

[docs-api]: http://docs.aws.amazon.com/aws-sdk-php-2/latest/index.html
[docs-guide]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/index.html
[docs-contribution]: https://github.com/aws/aws-sdk-php/blob/master/CONTRIBUTING.md
[docs-performance]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/performance.html
[docs-migration]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/migration-guide.html
[docs-signup]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/awssignup.html
[docs-requirements]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/requirements.html
[docs-installation]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/installation.html
[docs-quickstart]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/quick-start.html
[docs-iterators]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/quick-start.html#iterators
[docs-waiters]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/quick-start.html#waiters
[docs-models]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/quick-start.html#response-models
[docs-exceptions]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/quick-start.html#error-handling
[docs-wire-logging]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/faq.html#how-can-i-see-what-data-is-sent-over-the-wire
[docs-services]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/index.html#supported-services

[aws]: http://aws.amazon.com/
[aws-iam-credentials]: http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/UsingIAM.html#UsingIAMrolesWithAmazonEC2Instances
[guzzle]: http://guzzlephp.org
[composer]: http://getcomposer.org
[packagist]: http://packagist.org
[psr-0]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
[psr-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[psr-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[symfony2-events]: http://symfony.com/doc/2.0/components/event_dispatcher/introduction.html

[example-sqs-sendmessage]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-sqs.html#sending-messages
[example-s3-getobject]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-s3.html#saving-objects-to-a-file
[example-s3-multipart]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-s3.html#uploading-large-files-using-multipart-uploads
[example-dynamodb-putitem]: http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-dynamodb.html#adding-items
