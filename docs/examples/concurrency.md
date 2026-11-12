# Concurrent operations

Status: **Illustrative proposal**

```php
use Aws\S3\Input\HeadObjectRequest;
use Smithy\Async\Async;

$keys = [
    'documents/first.txt',
    'documents/second.txt',
    'documents/third.txt',
];

$metadata = Async::map(
    $keys,
    static fn(string $key) => $s3->headObject(new HeadObjectRequest(
        bucket: 'example-bucket',
        key: $key,
    )),
    concurrency: 10,
);

foreach ($metadata as $index => $output) {
    printf("%s: %d bytes\n", $keys[$index], $output->contentLength);
}
```

Example output:

```text
documents/first.txt: 1024 bytes
documents/second.txt: 2048 bytes
documents/third.txt: 4096 bytes
```

## What this illustrates

- Generated operation methods remain synchronous-looking.
- Fiber-based concurrency is explicit at the call site.
- Bounded mapping avoids starting an unbounded number of requests.
- Results preserve input order.
