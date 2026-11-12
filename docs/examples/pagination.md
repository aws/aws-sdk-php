# Pagination and waiters

Status: **Illustrative proposal**

## Pagination

```php
use Aws\S3\Input\ListObjectsV2Request;

$pages = $s3->listObjectsV2Paginated(new ListObjectsV2Request(
    bucket: 'example-bucket',
    prefix: 'logs/',
));

foreach ($pages->withMaxItems(100) as $page) {
    foreach ($page->contents ?? [] as $object) {
        echo $object->key, "\n";
    }
}
```

Example output:

```text
logs/2026-11-10.json
logs/2026-11-11.json
logs/2026-11-12.json
```

The paginator also accepts a generated input constructed from a V3-shaped
array. Each output page can be inspected directly with read-only array access:

```php
$input = ListObjectsV2Request::fromArray([
    'Bucket' => 'example-bucket',
    'Prefix' => 'logs/',
]);

foreach ($s3->listObjectsV2Paginated($input) as $page) {
    foreach ($page['Contents'] ?? [] as $object) {
        echo $object->key, "\n";
    }
}
```

Example output:

```text
logs/2026-11-10.json
logs/2026-11-11.json
logs/2026-11-12.json
```

The `['Contents']` lookup reads the typed page directly. It does not require
calling `toArray()`.

## Waiters

```php
use Aws\Lambda\Input\GetFunctionRequest;
use Aws\Lambda\Output\GetFunctionResponse;

$result = $lambda->waitUntilFunctionExists(
    new GetFunctionRequest(functionName: 'example-function'),
    maxWaitTime: 60,
);

if ($result->output instanceof GetFunctionResponse) {
    echo $result->output->configuration?->functionArn;
}
```

Example output:

```text
arn:aws:lambda:us-east-1:123456789012:function:example-function
```
