# Typed operations

Status: **Proposed and subject to change**

V4 service clients are designed around generated input and output classes
instead of associative arrays.

## Calling an operation

```php
use Aws\S3\Input\PutObjectRequest;
use Smithy\Http\Message\ResourceRequestStream;

$result = $s3->putObject(new PutObjectRequest(
    bucket: 'example-bucket',
    key: 'documents/report.txt',
    body: ResourceRequestStream::fromFile('/path/to/report.txt'),
    contentType: 'text/plain',
));

printf("Uploaded object with ETag %s\n", $result->eTag);
```

Example output:

```text
Uploaded object with ETag "5891b5b522d5df086d0ff0b110fbd9d2"
```

The operation signature communicates both sides of the call:

```php
public function putObject(
    PutObjectRequest $input,
    ?RequestOverrideConfig $overrides = null,
): PutObjectOutput;
```

The second argument carries runtime behavior that applies only to this call.
See [Per-request and HTTP configuration](request-configuration.md).

## Empty inputs

Operations with no modeled input members may omit the input object:

```php
$settings = $lambda->getAccountSettings();

echo $settings->accountUsage?->functionCount;
```

Example output:

```text
12
```

## Modeled enums

Modeled enum members are represented by generated enum-like types. Constructors
also accept their wire values where that improves usability:

```php
use Aws\S3\Shape\StorageClass;

$request = new PutObjectRequest(
    bucket: 'example-bucket',
    key: 'archive.zip',
    body: $stream,
    storageClass: StorageClass::standard(),
);
```

`StorageClass::fromValue()` preserves an unrecognized service value so newer
enum values can pass through an older generated client.

## Array interoperability

Generated structures use `ArraySerializableTrait`, which exposes
`fromArray()` and `toArray()`. This allows array-oriented application
boundaries to adopt typed operation signatures without changing all their data
at once.

`fromArray()` accepts V3-style modeled member names and recursively hydrates
nested generated shapes:

```php
use Aws\S3\Input\PutObjectRequest;

$request = PutObjectRequest::fromArray([
    'Bucket' => 'example-bucket',
    'Key' => 'example.txt',
    'Body' => 'contents',
]);

$result = $s3->putObject($request);
```

Independently of conversion, generated outputs use
`ReadonlyArrayAccessTrait`. They support both typed property access and direct,
read-only array access using modeled member names:

```php
echo $result->eTag, "\n";

if (isset($result['ETag'])) {
    echo $result['ETag'], "\n";
}
```

Example output:

```text
"5891b5b522d5df086d0ff0b110fbd9d2"
"5891b5b522d5df086d0ff0b110fbd9d2"
```

This array syntax reads the typed output object directly. It does not call or
require `toArray()`.

Complete output shapes can be converted recursively when an integration needs
an actual array value:

```php
$data = $result->toArray();
```

Nested structures, collections, enums, unions, big numbers, timestamps, and
document values are converted according to their generated schemas.

## Modeled runtime behavior

When a Smithy operation marks an unset input member as an idempotency token,
the client supplies a token before serialization. Modeled request compression
and checksum behavior is likewise installed from operation metadata.

## Sensitive values

Generated shapes use Smithy sensitivity metadata when producing debug, string,
JSON, and PHP serialization representations. Sensitive members are replaced
with a redacted marker instead of exposing their values.

Redaction is a logging safeguard, not a substitute for treating input and
output objects as sensitive application data.

## Immutability

Input and output members are read-only after construction. Array access on
outputs is also read-only. This makes request values safe to reuse across
retries and easier to reason about in interceptors and concurrent workflows.
