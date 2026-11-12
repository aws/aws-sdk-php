# AWS SDK for PHP V4: Design preview

> [!IMPORTANT]
> AWS SDK for PHP V4 is in development. This branch publishes design
> documentation and illustrative examples. Continue using V3 for production.
> The V4 implementation and Composer package remain unreleased.

This branch defines the proposed developer experience for the next major
version of the AWS SDK for PHP. PHP developers can review API shapes before
the implementation is published.

[Version 3](https://github.com/aws/aws-sdk-php/tree/master) remains the
supported AWS SDK for PHP.

## Preview status

| Area | Status |
| --- | --- |
| SDK implementation | Unreleased |
| Composer package | Unreleased |
| API compatibility | Unstable |
| Production support | V3 only |
| Branch contents | Design documentation and examples |

Names, signatures, behavior, and examples on this branch are proposals. They
may change or be removed before V4 is released.

## Design goals

V4 design goals:

- Typed client configuration, operation inputs, and operation outputs.
- APIs that work naturally with modern PHP and static-analysis tools.
- Explicit cooperative concurrency with ordinary synchronous-looking client
  methods.
- Migration paths for applications that still exchange V3-shaped arrays.
- Service behavior generated from Smithy models.
- First-class pagination, waiters, retries, authentication, endpoint
  resolution, streaming, and checksums.
- Clear extension points without requiring application code to depend on
  transport internals.

See the [design overview](docs/design-overview.md) for more context.

## Illustrative example

Running this illustrative snippet requires the future V4 implementation.

```php
use Aws\S3\Input\PutObjectRequest;
use Aws\S3\S3Client;
use Aws\S3\S3ClientConfig;

$s3 = new S3Client(new S3ClientConfig(
    region: 'us-west-2',
));

$result = $s3->putObject(new PutObjectRequest(
    bucket: 'example-bucket',
    key: 'notes/example.txt',
    body: 'Hello from the proposed V4 API.',
));

echo $result->eTag;

if (isset($result['ETag'])) {
    echo $result['ETag'];
}
```

Operation outputs use `ReadonlyArrayAccessTrait`, so modeled members can be
inspected directly with V3-style array syntax without first converting the
output to an array. Array access is read-only.

Separately, generated structures expose `fromArray()` and `toArray()` for
application boundaries that consume or produce actual arrays:

```php
$input = PutObjectRequest::fromArray([
    'Bucket' => 'example-bucket',
    'Key' => 'notes/example.txt',
    'Body' => 'Hello from the proposed V4 API.',
]);

$result = $s3->putObject($input);

$resultArray = $result->toArray();
```

## Explore the proposal

- [Design overview](docs/design-overview.md)
- [Client configuration](docs/client-configuration.md)
- [Typed operations](docs/typed-operations.md)
- [Concurrency](docs/concurrency.md)
- [Credentials and regions](docs/credentials-and-regions.md)
- [Per-request and HTTP configuration](docs/request-configuration.md)
- [Streaming and checksums](docs/streaming-and-checksums.md)
- [Pagination and waiters](docs/pagination-and-waiters.md)
- [Errors and retries](docs/errors-and-retries.md)
- [Inspecting requests and responses](docs/interceptors.md)
- [Extensibility and testing](docs/extensibility-and-testing.md)
- [Migration from V3](docs/migration-from-v3.md)
- [Feature coverage and open design areas](docs/feature-coverage.md)
- [Illustrative examples](docs/examples/README.md)

## Share feedback

Feedback priorities include API ergonomics, migration from V3, framework
integration, testability, and missing PHP use cases.

Read [How to provide feedback](docs/feedback.md), then start or join a
[GitHub Discussion](https://github.com/aws/aws-sdk-php/discussions).

Please report potential security issues privately as described in
[SECURITY.md](SECURITY.md).

## License

This documentation is licensed under the Apache License 2.0. See
[LICENSE](LICENSE).
