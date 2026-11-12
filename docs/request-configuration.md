# Per-request and HTTP configuration

Status: **Implemented in development source, subject to change**

Modeled operation input contains service data. Transport timeouts,
cancellation, retry limits, headers, and call-scoped plugins belong in a
separate request configuration.

## Per-call overrides

Every generated operation accepts an optional `RequestOverrideConfig` after
its typed input:

```php
use Aws\S3\Input\GetObjectRequest;
use Smithy\Client\RequestOverrideConfig;

$output = $s3->getObject(
    new GetObjectRequest(
        bucket: 'example-bucket',
        key: 'example.txt',
    ),
    RequestOverrideConfig::fromArray([
        '@http' => [
            'timeout' => 10.0,
            'read_timeout' => 5.0,
            'max_response_body_bytes' => 16 * 1024 * 1024,
        ],
        '@retries' => 1,
    ]),
);
```

`@retries` counts retries instead of total attempts. A value of `1` permits
the initial request and at most one retry. A value of `0` disables retries for
that call.

The supported override categories are:

| Key | Purpose |
| --- | --- |
| `@http` | HTTP options and headers |
| `@transport` | Options for a non-HTTP transport |
| `@retries` | Maximum retries for this call |
| `@auth` | Preferred authentication schemes |
| `@plugins` | Plugins applied only to this call |

`@http` and `@transport` cannot both be supplied.

## Cancellation

A cancellation signal can stop connection acquisition or an active transfer:

```php
use Smithy\Client\RequestOverrideConfig;
use Smithy\Http\Client\Cancellation\Cancellation;

$cancellation = new Cancellation();

$overrides = RequestOverrideConfig::fromArray([
    '@http' => [
        'cancellation' => $cancellation,
    ],
]);

// Another fiber, signal handler, or application callback may call:
$cancellation->cancel();
```

Cancellation is cooperative. The operation surfaces a cancellation exception
when the HTTP client observes the signal.

## Client-wide HTTP defaults

HTTP defaults and connection behavior can be configured once on the client:

```php
use Aws\S3\S3ClientConfig;
use Smithy\Http\Client\Configuration\ConnectionManagerConfiguration;
use Smithy\Http\Client\Configuration\HttpClientConfiguration;
use Smithy\Http\Client\HttpRequestOptions;

$config = new S3ClientConfig(
    region: 'us-west-2',
    httpClientConfig: new HttpClientConfiguration(
        connectionManagerConfig: new ConnectionManagerConfiguration(
            maxConcurrency: 50,
            connectionAcquireTimeout: 5.0,
        ),
        defaultOptions: new HttpRequestOptions(
            timeout: 30.0,
            readTimeout: 10.0,
            maxResponseBodyBytes: 64 * 1024 * 1024,
        ),
    ),
);
```

The HTTP options also cover proxy selection, content decoding, response
buffering, upload buffers, decompressed-body limits, and request cancellation.
Per-call `@http` values override these defaults for one operation.

Connection configuration separately controls TCP connection timeout, TLS
verification and certificates, HTTP version policy, and HTTP/2 stream limits.
TLS 1.2 is the minimum supported protocol version.

## Modeled request compression

Operations carrying Smithy's request-compression metadata can compress
eligible request bodies automatically. The AWS-wide configuration sources are:

- `AWS_DISABLE_REQUEST_COMPRESSION`
- `AWS_REQUEST_MIN_COMPRESSION_SIZE_BYTES`

The default minimum is 10,240 bytes. Compression still depends on the
operation's modeled encodings. This setting applies only to operations with
modeled compression encodings.

## Paginators and waiters

Paginator request overrides apply to every page:

```php
$pages = $s3
    ->listObjectsV2Paginated($input)
    ->withRequestOverrides($overrides);
```

Waiter configuration can apply overrides to every polling request. See
[Pagination and waiters](pagination-and-waiters.md).
