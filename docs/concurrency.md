# Concurrency

Status: **Implemented in development source, subject to change**

V4 uses PHP fibers and a shared event loop for cooperative concurrency.
Generated operations remain ordinary synchronous-looking methods. Applications
group operation callables through `Async` APIs instead of generated
`getObjectAsync()` methods or promise objects.

## Run independent operations together

`Async::all()` runs each callable in a separate fiber, waits for every
operation, and returns results in input order:

```php
use Aws\S3\Input\HeadObjectRequest;
use Smithy\Async\Async;

[$first, $second] = Async::all(
    static fn() => $s3->headObject(new HeadObjectRequest(
        bucket: 'example-bucket',
        key: 'first.txt',
    )),
    static fn() => $s3->headObject(new HeadObjectRequest(
        bucket: 'example-bucket',
        key: 'second.txt',
    )),
);

echo $first->contentLength, "\n";
echo $second->contentLength, "\n";
```

Example output:

```text
1024
2048
```

The call blocks until the group completes and throws if an operation fails.
The exact failure and sibling-cancellation behavior is still being evaluated.

## Bound concurrency over an iterable

`Async::map()` consumes an iterable lazily and limits the number of in-flight
operations. Results remain in input order:

```php
use Aws\S3\Input\HeadObjectRequest;
use Smithy\Async\Async;

$outputs = Async::map(
    $keys,
    static fn(string $key) => $s3->headObject(new HeadObjectRequest(
        bucket: 'example-bucket',
        key: $key,
    )),
    concurrency: 10,
);
```

The default worker limit is 25 when `concurrency` is omitted. Set the bound
based on service quotas, memory use, connection capacity, and the work
performed for each item.

## Cooperative concurrency

Fibers cooperate when an operation reaches asynchronous HTTP I/O or explicitly
calls `Async::delay()`. CPU-bound PHP code does not become parallel merely
because it runs inside `Async::all()` or `Async::map()`.

Generated waiters use the same delay mechanism, so a waiter can pause without
preventing unrelated fiber work from progressing.

## HTTP connection limits

Application concurrency and transport concurrency are separate controls.
`Async::map(concurrency: 50)` permits 50 workers, while the HTTP connection
manager can independently cap concurrent requests per host:

```php
use Aws\S3\S3ClientConfig;
use Smithy\Http\Client\Configuration\ConnectionManagerConfiguration;
use Smithy\Http\Client\Configuration\HttpClientConfiguration;

$config = new S3ClientConfig(
    region: 'us-west-2',
    httpClientConfig: new HttpClientConfiguration(
        connectionManagerConfig: new ConnectionManagerConfiguration(
            maxConcurrency: 20,
        ),
    ),
);
```

The transport defaults to 100 concurrent requests per host. Requests above the
connection limit wait for capacity and are subject to the connection
acquisition timeout.

## Concurrency safety

A client can be shared by concurrent fibers. Application-provided HTTP
clients, credential providers, retry strategies, plugins, and interceptors
must also be safe for that use. Mutable per-call state should not be stored in
a single shared property on an interceptor.

Streaming responses retain transport work until their bodies are consumed or
closed. Concurrent downloads require a bounded worker count and prompt body
closure. A single response body must not be read or discarded concurrently
from multiple fibers.
