# Streaming and checksums

Status: **Implemented in development source, subject to change**

Streaming blob members accept strings or PSR-7 streams. The HTTP runtime can
upload and download incrementally so application memory does not need to scale
with the full payload.

## Upload a file

A file can be represented by a replayable request stream:

```php
use Aws\S3\Input\PutObjectRequest;
use Smithy\Http\Message\ResourceRequestStream;

$result = $s3->putObject(new PutObjectRequest(
    bucket: 'example-bucket',
    key: 'backups/database.dump',
    body: ResourceRequestStream::fromFile('/var/backups/database.dump'),
));
```

The lazy file opener allows a retry to reopen the body from its beginning.
A raw `fopen()` resource is not a valid modeled body. Wrap it in a
`StreamInterface` implementation.

## Consume a response body

Streaming outputs expose `string|StreamInterface`. Applications should handle
both and close streams after use:

```php
use Psr\Http\Message\StreamInterface;

$body = $downloaded->body;
$destination = fopen('/tmp/download.bin', 'wb');

try {
    if ($body instanceof StreamInterface) {
        while (!$body->eof()) {
            fwrite($destination, $body->read(64 * 1024));
        }
    } else {
        fwrite($destination, $body);
    }
} finally {
    if ($body instanceof StreamInterface) {
        $body->close();
    }
    fclose($destination);
}
```

Casting or echoing a stream consumes its remaining contents and may materialize
the full value. Incremental reads are preferable for large bodies.

## Backpressure and limits

The HTTP client exposes limits for response buffering, response size,
decompressed response size, read inactivity, and upload/download buffer sizes.
These can be configured for a client or overridden per request. See
[Per-request and HTTP configuration](request-configuration.md).

Concurrent streaming workflows should bound the number of active operations.
An unconsumed response can retain connection and buffering resources.

## Flexible checksums

Services with modeled checksum support can calculate request checksums and
validate response checksums. The client settings are:

```php
$config = new S3ClientConfig(
    region: 'us-west-2',
    requestChecksumCalculation: 'when_supported',
    responseChecksumValidation: 'when_supported',
);
```

Each setting accepts:

- `when_supported` to use modeled optional checksum support.
- `when_required` to apply checksums only when required by the operation.

Response checksum validation occurs as a streaming body is consumed. A
checksum mismatch surfaces during the read that detects it, after the
operation method returns.

Automatically checksumming a non-seekable streaming request body requires
request trailers. Until trailer support is available for that path,
applications must provide a checksum explicitly or use a seekable/replayable
body.
