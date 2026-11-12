# Migration from V3

Status: **Early design exploration**

V4 is a new major version. Compatibility details and migration tooling have not
been finalized.

## Proposed operation-call change

V3 accepts associative arrays and returns result objects accessed like arrays:

```php
$result = $s3->putObject([
    'Bucket' => 'example-bucket',
    'Key' => 'example.txt',
    'Body' => 'contents',
]);

echo $result['ETag'], "\n";
```

Example output:

```text
"5891b5b522d5df086d0ff0b110fbd9d2"
```

The proposed V4 API primarily uses generated constructors and typed output
properties:

```php
$result = $s3->putObject(new PutObjectRequest(
    bucket: 'example-bucket',
    key: 'example.txt',
    body: 'contents',
));

echo $result->eTag, "\n";
```

Example output:

```text
"5891b5b522d5df086d0ff0b110fbd9d2"
```

For compatibility with array-oriented application boundaries, generated
inputs and outputs expose `fromArray()` and `toArray()` through
`ArraySerializableTrait`:

```php
$input = PutObjectRequest::fromArray([
    'Bucket' => 'example-bucket',
    'Key' => 'example.txt',
    'Body' => 'contents',
]);

$result = $s3->putObject($input);

$v3CompatibleOutput = $result->toArray();
```

Separately, generated outputs use `ReadonlyArrayAccessTrait` to retain direct
V3-style access by modeled member name:

```php
if (isset($result['ETag'])) {
    echo $result['ETag'], "\n";
}
```

Example output:

```text
"5891b5b522d5df086d0ff0b110fbd9d2"
```

This access operates on the typed output directly and does not require
`toArray()`. Conversion methods are migration boundaries for code that needs
actual arrays. Generated operations still require typed input classes.

## Proposed configuration change

V3 configuration is array-based:

```php
$s3 = new S3Client([
    'version' => 'latest',
    'region' => 'us-west-2',
]);
```

The proposed V4 API uses a service configuration object:

```php
$s3 = new S3Client(new S3ClientConfig(
    region: 'us-west-2',
));
```

## Client dependencies

V4 generates a service interface for each concrete client. Generated concrete
clients are final. Application services that mock or replace a client should
accept the generated interface:

```php
use Aws\S3\S3ClientInterface;

final class ObjectUploader
{
    public function __construct(
        private readonly S3ClientInterface $s3,
    ) {}
}
```

`S3ClientInterface` declares the typed S3 operations, paginators, and waiters.
`S3Client` implements this interface.

## Expected migration areas

Applications may need to update:

- Client construction and configuration.
- Operation input construction.
- Output member access.
- Exception handling.
- Paginator and waiter usage.
- Middleware or handler customization.
- Client type declarations, test doubles, and HTTP mocking.
- Framework integrations.
- Promise-based concurrency and batching.
- Streaming uploads, downloads, and transfer helpers.
- Successful response metadata accessed through V3's `@metadata`.
- Custom endpoints, endpoint discovery, and specialized signing workflows.

## Open migration decisions

The following decisions remain open:

- Availability and scope of an automated migration tool.
- Final namespace and naming rules.
- Feature-by-feature migration timelines.
- Side-by-side V3 and V4 installation.
- V4 APIs for presigned URLs and high-level S3 transfers.

The proposal includes generated `fromArray()` and `toArray()` methods for
V3-shaped arrays. Generated operations accept typed inputs.
