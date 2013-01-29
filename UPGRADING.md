Upgrade from 2.0 to 2.1
=======================

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
