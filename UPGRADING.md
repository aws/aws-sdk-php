Upgrading Guide
===============

Upgrade from 2.2 to 2.3
-----------------------

### DynamoDB Client

The newly released 2012-08-10 API version of the Amazon DynamoDB service includes the new Local Secondary Indexes
feature, but also introduces breaking changes to the API. The most notable change is in the way that you specify keys
when creating tables and retrieving items. Version 2.3 of the SDK now ships with 2 versions of the DynamoDB service
description, one for the new 2012-08-10 API and one for the next most recent 2011-12-05 API. The SDK defaults to using
the newest API version, so DynamoDB users may experience a breaking change to their projects when upgrading. This can be
easily fixed by switching back to the 2011-12-05 API by using the new `version` configuration setting when instantiating
the DynamoDB client.

```php
use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
    'key'     => '<aws access key>',
    'secret'  => '<aws secret key>',
    'region'  => '<region name>',
    'version' => '2011-12-05'
));
```

If you are using a config file with `Aws\Common\Aws`, then you can modify your file like the following.

```json
{
    "includes": ["_aws"],
    "services": {
        "default_settings": {
            "params": {
                "key": "<aws access key>",
                "secret": "<aws secret key>",
                "region": "<region name>"
            }
        },
        "dynamodb": {
            "extends": "dynamodb",
            "params": {
                "version": "2011-12-05"
            }
        }
    }
}
```

The [SDK user guide](http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/index.html) has a guide and examples for both
versions of the API.

Upgrade from 2.0 to 2.1
-----------------------

### General

Service descriptions are now versioned under the Resources/ directory of each client.

### Waiters

Waiters now require an associative array as input for the underlying operation performed by a waiter. The configuration
system for waiters under 2.0.x utilized strings to determine the parameters used to create an operation. For example,
when waiting for an object to exist with Amazon S3, you would pass a string containing the bucket name concatenated
with the object name using a '/' separator (e.g. 'foo/baz'). In the 2.1 release, these parameters are now more
explicitly tied to the underlying operation utilized by a waiter. For example, to use the ObjectExists waiter of
Amazon S3 pass an associative array of `array('Bucket' => 'foo', 'Key' => 'baz')`. These options match the option names
and rules associated with the HeadObject operation performed by the waiter. The API documentation of each client
describes the waiters associated with the client and what underlying operation is responsible for waiting on the
resource. Waiter specific options like the maximum number of attempts (max_attempts) or interval to wait between
retries (interval) can be specified in this same configuration array by prefixing the keys with `waiter.`.

Waiters can also be invoked using magic methods on the client. These magic methods are listed in each client's docblock
using `@method` tags.

```php
$s3Client->waitUntilObjectExists(array(
    'Bucket' => 'foo',
    'Key' => 'bar',
    'waiter.max_attempts' => 3
));
```
