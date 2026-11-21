# Extensibility and testing

Status: **Implemented in development source, subject to change**

V4 separates generated service APIs from replaceable runtime components.
Applications customize behavior through stable extension points instead of
forking generated clients or depending on cURL callbacks.

## Extension layers

V4 exposes these extension points:

- Credential and identity providers.
- HTTP clients and lower-level transports.
- Protocol implementations and protocol resolvers.
- Retry strategies.
- Interceptors around serialization, signing, transmission, deserialization,
  and completion.
- Plugins that configure one client or one operation call.

Client configuration is immutable, so extensions are added to a copy:

```php
$config = $config
    ->withInterceptor($interceptor)
    ->withPlugin($plugin);
```

Call-scoped plugins can be attached through `RequestOverrideConfig` when a
behavior should affect only one operation.

For hook selection, PSR-7 message access, retry behavior, redaction, and
streaming-body safety, see
[Inspecting requests and responses](interceptors.md).

## Unit testing generated clients

Each generated service client has a sibling interface containing its typed
operations, paginators, and waiters. Application code can depend on that
interface and create a PHPUnit mock:

```php
use Aws\S3\Output\PutObjectOutput;
use Aws\S3\S3ClientInterface;

$client = $this->createMock(S3ClientInterface::class);
$client->expects(self::once())
    ->method('putObject')
    ->willReturn(new PutObjectOutput(eTag: '"test-etag"'));
```

The concrete `S3Client` remains final and implements `S3ClientInterface`.
Tests can replace the client without sending a request or reproducing the
runtime pipeline.

Application constructors can use the service interface:

```php
use Aws\S3\S3ClientInterface;

final class ObjectStore
{
    public function __construct(
        private readonly S3ClientInterface $s3,
    ) {}
}
```

Generated configurations accept implementations of
`Smithy\Protocol\ProtocolInterface` and
`Smithy\Client\Protocol\ProtocolResolverInterface`. Generated AWS clients
select a protocol from service metadata by default.

## Full-pipeline testing

A custom `HttpClientInterface` can be injected into a generated service
configuration:

```php
$client = new S3Client(new S3ClientConfig(
    region: 'us-west-2',
    credentials: $testCredentials,
    httpClient: $fakeHttpClient,
));
```

This supports recording requests and returning deterministic HTTP responses
without changing generated operations. A dedicated HTTP response queue and
request-history API is not yet settled.

## Concurrency requirements

Injected dependencies may be used by several fibers at once. Shared
interceptors and plugins should not store one operation's mutable state in
instance properties. Test doubles should also support the concurrency model
they are intended to exercise.

## Endpoint customization

The underlying Smithy runtime has an endpoint-resolver abstraction, while
generated AWS clients own compiled service endpoint rules and service-specific
parameters. The safe public API for custom endpoints on generated clients is
still being designed.
