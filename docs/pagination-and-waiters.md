# Pagination and waiters

Status: **Proposed and subject to change**

V4 generates paginator and waiter methods from Smithy model metadata.

## Pagination

Paginator methods return a lazy iterable of typed response pages:

```php
use Aws\S3\Input\ListObjectsV2Request;

$pages = $s3->listObjectsV2Paginated(new ListObjectsV2Request(
    bucket: 'example-bucket',
    prefix: 'photos/',
));

foreach ($pages as $page) {
    foreach ($page->contents ?? [] as $object) {
        echo $object->key, "\n";
    }
}
```

Example output:

```text
photos/2026/launch.jpg
photos/2026/team.jpg
photos/2026/workshop.jpg
```

Requests are made as iteration advances. The paginator preserves the original
typed input while managing continuation tokens internally.

The paginator can also limit the total number of modeled items:

```php
foreach ($pages->withMaxItems(100) as $page) {
    // Process up to 100 objects across all fetched pages.
}
```

Per-request behavior can be applied to every page:

```php
$pages = $pages->withRequestOverrides($overrides);
```

## Waiters

Generated waiter methods bind a modeled operation to a named waiter definition:

```php
use Aws\Lambda\Input\GetFunctionRequest;
use Smithy\Client\Waiter\WaiterConfig;

$result = $lambda->waitUntilFunctionExists(
    new GetFunctionRequest(functionName: 'example-function'),
    maxWaitTime: 60,
    config: new WaiterConfig(
        minDelay: 2,
        maxDelay: 10,
        requestOverrides: $overrides,
    ),
);

$function = $result->output;
```

A waiter returns a `WaiterResult` containing either the output or modeled error
that satisfied a success acceptor. It throws when it reaches a failure state
or cannot complete within the configured time.

Waiter delays cooperate with the shared event loop, allowing unrelated
concurrent work to continue while a waiter sleeps.
