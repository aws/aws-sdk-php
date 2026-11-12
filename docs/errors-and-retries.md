# Errors and retries

Status: **Proposed and subject to change**

V4 generates modeled exception types and retains common handling for unknown
service and transport failures.

## Modeled service errors

Modeled errors use generated exception types:

```php
use Aws\S3\Exception\NoSuchKeyException;
use Aws\S3\Exception\S3Exception;
use Aws\S3\Input\GetObjectRequest;

try {
    $result = $s3->getObject(new GetObjectRequest(
        bucket: 'example-bucket',
        key: 'missing.txt',
    ));
} catch (NoSuchKeyException $error) {
    // Handle the modeled S3 error.
} catch (S3Exception $error) {
    // Handle any other S3 service error.
}
```

Each generated service has a base exception so applications can choose between
specific and service-wide handling.

AWS service exceptions expose:

- `awsErrorCode`
- `requestId`
- `httpStatusCode`
- the Smithy-modeled error fault

## Retry configuration

Retry behavior belongs to client configuration:

```php
$s3 = new S3Client(new S3ClientConfig(
    region: 'us-west-2',
    retryMode: 'standard',
    maxAttempts: 3,
));
```

V4 distinguishes attempts from retries: three attempts permit the initial
request and up to two retries.

The standard strategy uses exponential backoff with jitter, honors bounded
`Retry-After` guidance, distinguishes throttling from other transient
failures, and uses retry quotas to avoid retry storms.

When not supplied explicitly, retry mode and maximum attempts can resolve from
`AWS_RETRY_MODE`, `AWS_MAX_ATTEMPTS`, and shared profile settings. The
implemented retry mode is `standard`. Most services default to three attempts.
DynamoDB and DynamoDB Streams default to four. Adaptive and legacy modes are
unsupported.

Call-scoped retry overrides remain outside modeled operation inputs. See
[Per-request and HTTP configuration](request-configuration.md).

## Error context

Service exceptions preserve useful request and response context while
redacting sensitive modeled values. Transport, authentication, endpoint,
serialization, cancellation, checksum, and retry failures remain
distinguishable from modeled service errors.

When retries are exhausted, the operation surfaces the underlying final error
directly.
